<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class ProfileContoller extends Controller
{
    public function index(){
    	$user = Auth::user();

    	return view('pages/profile', ['user' => $user]);
    }

    public function update_profile(Request $request){
    	// your code to update form values
    	
    	if(!empty($request->password)){ // if password is entered
	    	$user_validation = Validator::make($request->all(), [
	    		'name' => ['required', 'string', 'max:255', 'min:3'],
	            'email' => ['required', 'string', 'email', 'max:255'],
	            'password' => ['required', 'string', 'min:6', 'confirmed'],
	    	]);
    	}else{ // if password not entered
    		$user_validation = Validator::make($request->all(), [
	    		'name' => ['required', 'string', 'max:255', 'min:3'],
	            'email' => ['required', 'string', 'email', 'max:255'],
	    	]);
    	}

    	if ($user_validation->fails()) {
    		return back()->withErrors($user_validation)
                        ->withInput();
    	}
    	
    	$user = Auth::user();
    	$user->name = $request->name;
    	if(!empty($request->password)){
    		$user->password = Hash::make($request->password);
    	}

    	$user->save();

    	$request->session()->flash('status', 'Update was done successful!');
    	return back();
    }
}

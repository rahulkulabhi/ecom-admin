<?php

namespace App\Http\Controllers\Product;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Models\Attribute;

class AttributesController extends Controller
{
    public function index(){
    	$attributes = Attribute::all();
    	return view('pages/attributes', ['attributes' => $attributes]);
    }

    public function add(){
    	return view('pages/add-attribute');
    }

    public function on_add(Request $request){
    	$validation = Validator::make($request->all(), [
    		'title' => ['required', 'string', 'max:25', 'min:3'],
    		'slug' => ['required', 'string', 'max:25', 'min:3', 'unique:attributes']
    	]);

    	if ($validation->fails()) {
    		return back()->withErrors($validation)
                        ->withInput();
    	}

    	$attribute = Attribute::create([
    		'title' => $request->title,
    		'slug' => $request->slug
    	]);

    	$request->session()->flash('status', 'Attribute added successful!');
    	return redirect()->route('show-atrributes');
    }

    public function edit($id){
    	$attribute = Attribute::find($id); //dd($attribute);
    	return view('pages/edit-attribute', ['attribute' => $attribute]);
    }

    public function on_edit(Request $request, $id){
        //dd( serialize( explode(",", $request->options) ) );
    	$attribute = Attribute::find($id);
    	if($request->slug == $attribute->slug){
    		$validation = Validator::make($request->all(), [
	    		'title' => ['required', 'string', 'max:25', 'min:3'],
	    		'slug' => ['required', 'string', 'max:25', 'min:3']
	    	]);
    	}else{
    		$validation = Validator::make($request->all(), [
	    		'title' => ['required', 'string', 'max:25', 'min:3'],
	    		'slug' => ['required', 'string', 'max:25', 'min:3', 'unique:attributes']
	    	]);
    	}

    	if ($validation->fails()) {
    		return back()->withErrors($validation)
                        ->withInput();
    	}

    	$attribute->title = $request->title;
        $attribute->slug = $request->slug;
    	$attribute->options = serialize( array_unique( explode(",", $request->options) ) );

    	$attribute->save();

    	$request->session()->flash('status', 'Update was done successful!');
    	return redirect()->route('show-atrributes');
    }

    public function delete(Request $request, $id){
    	$attribute = Attribute::find($id);
    	$attribute->delete();
    	$request->session()->flash('status', 'Attribute deleted successful!');
    	return redirect()->route('show-atrributes');
    }

}

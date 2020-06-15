<?php

namespace App\Http\Controllers\Product;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Attribute;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class ProductController extends Controller
{
	public function index(){
		$products = Product::all();
		return view('pages/products', ['products' => $products]);
	}

    public function add(){
    	$attributes = Attribute::all();
    	return view('pages/add-product', ['attributes' => $attributes]);
    }

    public function on_adding(Request $request){
    	$validation = Validator::make($request->all(), [
    		'title' => ['required', 'string', 'min:3'],
    		'slug' => ['required', 'string', 'max:25', 'min:3', 'unique:products'],
    		'type' => ['required', 'string', Rule::in(['simple', 'variable'])]
    	]);

    	if ($validation->fails()) {
    		return back()->withErrors($validation)
                        ->withInput();
    	}

    	$product = Product::create([
    		'title' => $request->title,
    		'slug' => $request->slug,
    		'description' => $request->description,
    		'type' => $request->type
    	]);

    	$request->session()->flash('status', 'Product added successful!');
    	return redirect()->route('show-products');
    }
}

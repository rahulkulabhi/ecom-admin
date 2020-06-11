<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::prefix('admin')->middleware(['auth'])->group(function(){
	Route::get('/profile', 'User\ProfileContoller@index')->name('profile');
	Route::post('/profile', 'User\ProfileContoller@update_profile')->name('edit-profile');


	Route::prefix('product')->group(function(){
		
		Route::get('/attribute', 'Product\AttributesController@index')->name('show-atrributes');

		Route::get('/attribute/edit/{id}', 'Product\AttributesController@edit')->name('edit-atrribute');
		Route::post('/attribute/edit/{id}', 'Product\AttributesController@on_edit')->name('edit-atrribute');

		Route::post('/attribute/delete/{id}', 'Product\AttributesController@delete')->name('delete-atrribute');

		Route::get('/attribute/add', 'Product\AttributesController@add')->name('add-atrribute');
		Route::post('/attribute/add', 'Product\AttributesController@on_add')->name('add-atrribute');

	});
});


Route::fallback(function () {
    return view('pages/404'); // return the view for 404
});

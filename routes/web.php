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
});


Route::fallback(function () {
    return view('pages/404'); // return the view for 404
});

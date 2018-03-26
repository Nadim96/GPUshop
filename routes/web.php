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

Route::get('/', 'FrontController@index')->name('home');
Route::get('/gpus', 'FrontController@gpus')->name('gpus');
Route::get('/gpu', 'FrontController@gpu')->name('gpu');
Auth::routes();
Route::get('/logout', 'Auth\LoginController@logout');

Route::get('/home', 'HomeController@index');
Route::resource('/cart', 'CartController');
Route::get('/cart/update/{id}', 'CartController@update');
Route::get('/cart/update/{rowId}/{removeItem}', 'CartController@update');
Route::get('/cart/destroy/{rowId}', 'CartController@destroy');

Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function() {
	Route::get('/', function(){
		return view('admin.index');
	})->name('admin.index');

	Route::resource('product', 'ProductsController');
	Route::resource('category', 'CategoriesController');
});
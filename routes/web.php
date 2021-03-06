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
Route::get('/gpu/{productId?}', 'FrontController@gpu')->name('gpu');
Auth::routes();
Route::get('/logout', 'Auth\LoginController@logout');

Route::get('/home', 'HomeController@index');
Route::resource('/cart', 'CartController');
Route::get('/cart/update/{id}', 'CartController@update');
Route::get('/cart/update/{rowId}/{removeItem}', 'CartController@update');
Route::get('/cart/destroy/{rowId}', 'CartController@destroy');


Auth::routes();


Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function() {
	Route::post('toggledeliver/{orderId}', 'OrderController@toggleDeliver')->name('toggle.deliver');
	
	Route::get('/', function(){
		if(Auth::user()->admin == 1){
			return view('admin.index');
		}else{
			return view('home');
		}
	})->name('admin.index');

	Route::resource('product', 'ProductsController');
	Route::resource('category', 'CategoriesController');
	Route::get('orders/{type?}', 'OrderController@orders');
	Route::get('klanten', 'AdressController@index');

});

Route::post('deleteuser/{userId?}', 'AdressController@destroy')->name('delete.user');
Route::post('deleteorder/{orderId?}', 'OrderController@destroy')->name('delete.order');
Route::post('deleteitem/{itemId?}', 'ProductsController@destroy')->name('delete.item');




Route::group(['middleware' => 'auth'], function(){
	Route::get('/shipping-info', 'CheckoutController@shipping')->name('checkout.shipping');
});

Route::group(['middleware' => 'auth'], function(){
	Route::get('/bestellingen', 'OrderController@mijnBestellingen');
});

Route::resource('address', 'AdressController');
Route::get('/saveOrder', 'CheckoutController@saveOrder')->name('checkout.saveOrder');

//Route::get('/checkout', 'CheckoutController@step1');

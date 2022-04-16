<?php

use Illuminate\Support\Facades\Route;
use App\Store;

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
	 $products = Store::join('categories', 'stores.category_id', '=', 'categories.id')
                              ->select('stores.*', 'categories.category_name  AS cname')
                              ->get();
        return view('home', compact('products'));
   
})->name('index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => 'auth'], function() { 

Route::get('/category', 'CategoryController@create')->name('category_form');
Route::post('/category', 'CategoryController@store')->name('category');

Route::get('/store', 'StoreController@create')->name('store_form');
Route::post('/store', 'StoreController@store')->name('store');
Route::get('/store_item', 'StoreController@store_item')->name('store_item');

//Session 
Route::get('/shopping_cart', 'StoreController@shopping_cart')->name('shopping_cart');
Route::get('/checkout', 'StoreController@checkout')->name('checkout');
Route::get('reduce/{id}', 'StoreController@destroy')->name('reduce');
Route::get('reduce_all/{id}', 'StoreController@destroy_all')->name('reduce_all');
Route::get('/add_to_cart/{id}', 'StoreController@getAddTocart')->name('add_to_cart');

//Delete and deactivate by admin
Route::get('/store_deactive/{id}', 'StoreController@store_deactive')->name('store_deactive');
Route::get('/store_delete/{id}', 'StoreController@store_delete')->name('store_delete');

//Role
Route::get('/add_role', 'RoleController@add_role')->name('add_role');
Route::post('/role', 'RoleController@store')->name('role');
Route::get('/edit_user/{id}', 'RoleController@edit_user')->name('edit_user');
Route::get('/delete_user/{id}', 'RoleController@delete_user')->name('delete_user');

//Admin
Route::get('/add_user', 'RoleController@add_user')->name('add_user');
Route::post('/add_admin', 'RoleController@add_admin')->name('add_admin');
Route::resource('user', 'RoleController');
Route::resource('user', 'RoleController');

});


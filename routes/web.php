<?php

use Illuminate\Support\Facades\Route;

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

Route::group(['middleware' => ['auth']], function () {

    Route::get('/product-categories', 'CategoryController@listCategories')->name('product-categories');
    Route::get('/new-product-categories', 'CategoryController@newCategories')->name('new-product-categories');
    Route::post('/add-product-categories', 'CategoryController@addCategories')->name('add-product-categories');
    Route::get('/delete-product-category/{category_id}', 'CategoryController@deleteCategory')->name('delete-product-category');
    Route::get('/edit-product-category', 'CategoryController@editCategory')->name('edit-product-category');

    Route::get('/list-products', 'ProductController@listProducts')->name('list-products');
    Route::get('/new-product', 'ProductController@newProduct')->name('new-product');
    Route::post('/add-product', 'ProductController@addProduct')->name('add-product');
    Route::get('/delete-product/{product_id}', 'ProductController@deleteProduct')->name('delete-product');
    Route::post('/edit-product', 'ProductController@editProduct')->name('edit-product');

    Route::get('/list-manager', 'ManagerController@listManager')->name('list-managers');
    Route::get('/new-manager', 'ManagerController@newManager')->name('new-manager');
    Route::get('/delete-manager/{user_id}', 'ManagerController@deleteManager')->name('delete-manager');
    Route::get('/dit-manager', 'ManagerController@editManager')->name('edit-manager');

});


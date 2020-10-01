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
});

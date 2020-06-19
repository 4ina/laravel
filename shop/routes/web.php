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
1. Star Rating System
2. Banners
3. Page for specific product
*/

Route::get('/', 'HomeController@index')->name('home');
Route::get('/about', function () {
    return view('about');
})->name('about');
Route::get('/services', function () {
    return view('services');
})->name('services');
Route::get('/contact', function () {
    return view('contact');
})->name('contact');


Auth::routes();
Route::group(['middleware' => 'auth'], function () {
    Route::resource('categories', 'CategoryController')->names('categories');
    Route::resource('products', 'ProductController')->names('products');
});

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

use GuzzleHttp\Client;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('home');
});

Route::middleware('locale')->group(function () {

    Route::post('language', 'LanguageController@setLang')->name('setLang');
    Route::get('/home', 'ProductController@index')->name('home');

    Route::middleware('auth')->group(function () {
        Route::prefix('/product')->group(function () {
            Route::get('search', 'ProductController@search')->name('products.search');
            Route::get('create', 'ProductController@create')->name('products.create');
            Route::post('store', 'ProductController@store')->name('products.store');
            Route::get('{id}/delete', 'ProductController@destroy')->name('products.destroy');
            Route::get('{id}/edit', 'ProductController@edit')->name('products.edit');
            Route::post('{id}/update', 'ProductController@update')->name('products.update');
        });
    });

    Route::prefix('/cart')->group(function () {
        Route::get('addToCart/{id}', 'CartController@addToCart')->name('cart.addToCart');
        Route::get('show', 'CartController@show')->name('cart.showCart');
        Route::get('{id}/remove', 'CartController@remove')->name('cart.remove');
        Route::get('{id}/plus', 'CartController@plus')->name('cart.plus');
        Route::get('{id}/subtraction', 'CartController@subtraction')->name('cart.subtraction');
    });

    Route::get('/redirect/{social}', 'SocialAuthController@redirect');
    Route::get('/callback/{social}', 'SocialAuthController@callback');
});
Auth::routes();







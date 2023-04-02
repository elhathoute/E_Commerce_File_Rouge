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
    return view('navbar');
});

Route::get('/product-card', function () {
    return view('product-card');
});

Route::get('/all-product', function () {
    return view('all-product');
});


Route::get('/checkout', function () {
    return view('checkout');
});

Route::get('/footer', function () {
    return view('footer');
});
Route::get('/add-to-card', function () {
    return view('add-to-card');
});
Route::get('/reviews', function () {
    return view('reviews');
});


<?php

use App\Http\Controllers\AuthController;
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
        return view('e-commerce.main');
    })->name('e-commerce.home');
Route::get('/about', function () {
    return view('e-commerce.about');
})->name('e-commerce.about');
Route::get('/shop', function () {
    return view('e-commerce.shop');
})->name('e-commerce.shop');
Route::get('/contact', function () {
    return view('e-commerce.contact');
})->name('e-commerce.contact');

Route::get('/login', function () {
    return view('e-commerce.login');
})->name('e-commerce.login');

Route::controller(AuthController::class)->group(function(){
    Route::get('register','register')->name('e-commerce.register');
    Route::post('registerUser','registerUser')->name('e-commerce.register_user');
});
// Route::get('/register', function () {
//     return view('e-commerce.register');
// })->name('e-commerce.register');
// Route::get('/navbar', function () {
//     return view('navbar');
// });
// Route::get('/main', function () {
//     return view('main');
// });

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



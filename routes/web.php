<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\GithubSocialiteController;
use App\Http\Controllers\LinkedinSocialiteController;

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
    })->middleware('auth')->name('e-commerce.home');


Route::controller(AuthController::class)->group(function(){
    // register
    Route::get('register','register')->name('e-commerce.register');
    Route::post('registerUser','registerUser')->name('e-commerce.register_user');
    // login
    Route::get('login','login')->name('e-commerce.login');
    Route::post('loginUser','loginUser')->name('e-commerce.login_user');
    // logout
    Route::post('logout','logout')->middleware('auth')->name('e-commerce.logout');
    // profile
    Route::get('user/profile','profile')->middleware('auth')->name('e-commerce.user.profile');
    // change address of user
    Route::patch('user/adress','change_adress_user')->middleware('auth')->name('e-commerce.change_adress_user');
    // change compte
    Route::patch('user/compte','change_compte_user')->middleware('auth')->name('e-commerce.change_compte_user');

});



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



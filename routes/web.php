<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\GithubSocialiteController;
use App\Http\Controllers\Home;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LinkedinSocialiteController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\SubCategoryController;
use App\Models\SubCategory;

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

// index
Route::get('/',[HomeController::class ,'home'])->name('e-commerce.home');
// shop
Route::get('/shop',[ShopController::class,'shop'])->name('e-commerce.shop');


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
    Route::patch('user/adress/{id}','change_adress_user')->middleware('auth')->name('e-commerce.change_adress_user');
    // change compte
    Route::patch('user/compte/{id}','change_compte_user')->middleware('auth')->name('e-commerce.change_compte_user');


});

/*---------------category------------*/

 // get category
 Route::get('category',[CategoryController::class,'index'])->middleware('auth')->name('e-commerce.category');
 //add category
 Route::post('add/category',[CategoryController::class,'store'])->middleware('auth')->name('e-commerce.add_category');
 //edit category
 Route::get('edit/category/{id}',[CategoryController::class,'edit'])->middleware('auth')->name('e-commerce.edit_category');
    //update category
    Route::patch('update/category/{id}',[CategoryController::class,'update'])->middleware('auth')->name('e-commerce.update_category');
 // delete category
 Route::delete('delete/category/{id}',[CategoryController::class,'delete'])->middleware('auth')->name('e-commerce.delete_category');

/*-----------------------------*/
/*---------------Sub-category------------*/

 // get category
 Route::get('subcategory',[SubCategoryController::class,'index'])->middleware('auth')->name('e-commerce.subcategory');
 //add category
 Route::post('add/subcategory',[SubCategoryController::class,'store'])->middleware('auth')->name('e-commerce.add_subcategory');
 //edit category
 Route::get('edit/subcategory/{id}',[SubCategoryController::class,'edit'])->middleware('auth')->name('e-commerce.edit_subcategory');
    //update category
Route::patch('update/subcategory/{id}',[SubCategoryController::class,'update'])->middleware('auth')->name('e-commerce.update_subcategory');
 // delete category
 Route::delete('delete/subcategory/{id}',[SubCategoryController::class,'delete'])->middleware('auth')->name('e-commerce.delete_subcategory');

/*-----------------------------*/


Route::get('/about', function () {
    return view('e-commerce.about');
})->name('e-commerce.about');

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



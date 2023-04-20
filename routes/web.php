<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\GithubSocialiteController;
use App\Http\Controllers\Home;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LinkedinSocialiteController;
use App\Http\Controllers\PaimentController;
use App\Http\Controllers\PanierController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ReviewController;
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
/*---------contact us---------*/
Route::get('/contact',[ContactController::class,'contact'])->name('e-commerce.contact');
Route::Post('/send-email',[ContactController::class,'sendEmail'])->name('e-commerce.send-email');

/*add review*/
Route::POST('/add_review',[ReviewController::class,'add_review'])->middleware('auth')->name('e-commerce.add_review');

// get subcategories for each category in db with ajax
Route::get('/getSubCategory',[CategoryController::class,'get_sub_category']);
// paiment create
Route::get('/orders',[PaimentController::class ,'orders'])->middleware('auth')->name('e-commerce.paiment');
// paiment store (change from panier->order)
Route::POST('/paiment/store_paiment',[PaimentController::class ,'store_paiment'])->middleware('auth')->name('e-commerce.store_paiment');

// index
Route::get('/',[HomeController::class ,'home'])->name('e-commerce.home');

// product
Route::get('/product',[ProductController::class ,'index'])->name('e-commerce.product');
//view to add product
Route::get('/product/create',[ProductController::class ,'create'])->middleware('auth')->name('e-commerce.create_product');
// view to update product
Route::get('/product/edit/{id}',[ProductController::class ,'edit'])->middleware('auth')->name('e-commerce.edit_product');
// update PRODUCT
 Route::PATCH('/product/update/{id}',[ProductController::class ,'update'])->middleware('auth')->name('e-commerce.update_product');

//add product to db
Route::post('/product/store',[ProductController::class ,'store'])->name('e-commerce.add_product');

// shop
Route::get('/shop/{parametre?}{sub_category?}',[ShopController::class,'shop'])->name('e-commerce.shop');

// show  paniers
Route::get('/panier',[PanierController::class ,'panier'])->middleware('auth')->name('e-commerce.panier');
//show one order
Route::get('/order/{id}',[PanierController::class ,'order'])->middleware('auth')->name('e-commerce.order');

//add to panier (main)
Route::get('/add_to_panier/{id}',[PanierController::class ,'add_to_panier'])->middleware('auth')->name('e-commerce.add_to_panier');
// add to wishlist (main)
Route::get('/add_to_wishlist/{id}',[PanierController::class ,'add_to_wishlist'])->middleware('auth')->name('e-commerce.add_to_wishlist');

// delete panier
Route::get('delete/panier/{id}',[PanierController::class ,'delete_panier'])->middleware('auth')->name('e-commerce.delete_panier');

// wishlist
Route::get('/wishlist',[PanierController::class ,'wishlist'])->middleware('auth')->name('e-commerce.wishlist');

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
/*-------view product---------------*/
Route::get('view/product/{id}',[ProductController::class,'view_product'])->name('e-commerce.view_product');
/*-------end view product------------*/

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

// Route::get('/contact', function () {
//     return view('e-commerce.contact');
// })->name('e-commerce.contact');

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



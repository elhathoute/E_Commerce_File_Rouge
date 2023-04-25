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
/*-------------Normal User-------------*/
// get  (Page Home)
Route::get('/',[HomeController::class ,'home'])->name('e-commerce.home');
//get about page
Route::get('/about', function () {
    return view('e-commerce.about');
})->name('e-commerce.about');


    // get view of contact us
    Route::get('/contact',[ContactController::class,'contact'])->name('e-commerce.contact');
    // send email (contact-us)
    Route::Post('/send-email',[ContactController::class,'sendEmail'])->name('e-commerce.send-email');
    //add review
    Route::POST('/add_review',[ReviewController::class,'add_review'])->middleware('auth')->name('e-commerce.add_review');
    // get view to paiment
    Route::get('/orders',[PaimentController::class ,'orders'])->middleware('auth')->name('e-commerce.paiment');
    //  store paiment (change etat of panier from panier to order)
    Route::POST('/paiment/store_paiment',[PaimentController::class ,'store_paiment'])->middleware('auth')->name('e-commerce.store_paiment');
    // part of shop (get all products in client-side)
    Route::get('/shop/{parametre?}{sub_category?}',[ShopController::class,'shop'])->name('e-commerce.shop');
    // show  paniers of user authenticated
    Route::get('/panier',[PanierController::class ,'panier'])->middleware('auth')->name('e-commerce.panier');
    //show one order of user authenticated
    Route::get('/order/{id}',[PanierController::class ,'order'])->middleware('auth')->name('e-commerce.order');
    //add to panier from user authenticated
    Route::get('/add_to_panier/{id}',[PanierController::class ,'add_to_panier'])->middleware('auth')->name('e-commerce.add_to_panier');
    // add to wishlist from user authenticated
    Route::get('/add_to_wishlist/{id}',[PanierController::class ,'add_to_wishlist'])->middleware('auth')->name('e-commerce.add_to_wishlist');
    // delete panier
    Route::get('delete/panier/{id}',[PanierController::class ,'delete_panier'])->middleware('auth')->name('e-commerce.delete_panier');
    // get all wishlist
    Route::get('/wishlist',[PanierController::class ,'wishlist'])->middleware('auth')->name('e-commerce.wishlist');
    //view product in user-side
    Route::get('view/product/{id}',[ProductController::class,'view_product'])->name('e-commerce.view_product');

/*--------------end Normal User--------*/

/*--------------Admin Role -------------*/
    Route::middleware('is_admin')->group(function(){

    // get subcategories for each category in db with ajax (in add product or update product)
    Route::get('/getSubCategory',[CategoryController::class,'get_sub_category']);
    // get products in (admin-side)
    Route::get('/product',[ProductController::class ,'index'])->name('e-commerce.product');
    //get view to add product
    Route::get('/product/create',[ProductController::class ,'create'])->middleware('auth')->name('e-commerce.create_product');
    //add product to db
    Route::post('/product/store',[ProductController::class ,'store'])->name('e-commerce.add_product');
    // view to update product
    Route::get('/product/edit/{id}',[ProductController::class ,'edit'])->middleware('auth')->name('e-commerce.edit_product');
    // update PRODUCT in db
    Route::PATCH('/product/update/{id}',[ProductController::class ,'update'])->middleware('auth')->name('e-commerce.update_product');
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
    // get sub_category
    Route::get('subcategory',[SubCategoryController::class,'index'])->middleware('auth')->name('e-commerce.subcategory');
    //add sub_category
    Route::post('add/subcategory',[SubCategoryController::class,'store'])->middleware('auth')->name('e-commerce.add_subcategory');
    //edit sub_category
    Route::get('edit/subcategory/{id}',[SubCategoryController::class,'edit'])->middleware('auth')->name('e-commerce.edit_subcategory');
        //update sub_category
    Route::patch('update/subcategory/{id}',[SubCategoryController::class,'update'])->middleware('auth')->name('e-commerce.update_subcategory');
    // delete sub_category
    Route::delete('delete/subcategory/{id}',[SubCategoryController::class,'delete'])->middleware('auth')->name('e-commerce.delete_subcategory');
    /*-----------------------------*/
    });

/*--------------END Admin---------------*/



// user-side and Admin-side

Route::controller(AuthController::class)->group(function(){
    // get form register
    Route::get('register','register')->name('e-commerce.register');
    // register user
    Route::post('registerUser','registerUser')->name('e-commerce.register_user');
    // get form login
    Route::get('login','login')->name('e-commerce.login');
    // login user
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








// Route::get('/login', function () {
//     return view('e-commerce.login');
// })->name('e-commerce.login');




// Route::get('/product-card', function () {
//     return view('product-card');
// });

// Route::get('/all-product', function () {
//     return view('all-product');
// });


// Route::get('/checkout', function () {
//     return view('checkout');
// });

// Route::get('/footer', function () {
//     return view('footer');
// });
// Route::get('/add-to-card', function () {
//     return view('add-to-card');
// });
// Route::get('/reviews', function () {
//     return view('reviews');
// });



<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    // create product
    public function create(){

        // $categories=Category::all();

        return view('e-commerce.add_product');
    }
    // index(admin)
    public function index(){

        return view('e-commerce.product');
    }

// view_one_product(user)
    public function view_product($id){
        // $product =Product::findOrFail($id)->with('sizes')->first();
        $product = Product::with('sizes','reviews','images','brande','category','sub_category')->findOrFail($id);

        return view('e-commerce.view_product',['product'=>$product]);
    }
}

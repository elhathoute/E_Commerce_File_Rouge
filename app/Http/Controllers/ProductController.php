<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function view_product($id){
        // $product =Product::findOrFail($id)->with('sizes')->first();
        $product = Product::with('sizes','reviews','images','brande','category','sub_category')->findOrFail($id);

        return view('e-commerce.view_product',['product'=>$product]);
    }
}

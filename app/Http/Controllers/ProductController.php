<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function view_product($id){
        $product =Product::findOrFail($id)->with('sizes')->first();
        return view('e-commerce.view_product',['product'=>$product]);
    }
}

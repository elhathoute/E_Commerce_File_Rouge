<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function shop(){
        // get all categories with subcategories
        $categories=Category::with('subCategories')->get();

        return view('e-commerce.shop',['categories'=>$categories]);
    }
}

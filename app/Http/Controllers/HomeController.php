<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home(){
        // get all categories with subcategories
        // $categories=Category::with('subCategories')->get();

        return view('e-commerce.main');
    }
}

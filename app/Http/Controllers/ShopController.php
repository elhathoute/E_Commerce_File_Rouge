<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use LDAP\Result;

class ShopController extends Controller
{
    public function shop(Request $request, $parametre=null,$sub_category=null){
 if($request->has('category' ) ){
    // dd($parametre);
    $category=$request->category;

    $products = Product::whereHas('category', function($q) use ($category) {
        $q->where('name', 'like', "%$category%");
    })
    ->whereHas('sub_category', function($q) use ($parametre) {
        $q->where('name', 'like', "%$parametre%");
    })
    ->with('sizes', 'reviews', 'images', 'brande', 'category', 'sub_category')
    ->paginate(4);


 }
       else if ($request->has('parametre')) {
    $parametre = $request->parametre;
    $products=Product::where('name', 'like', "%$parametre%")
    ->orWhere('description', 'like', "%$parametre%")
    ->orWhereHas('sizes', function($q) use ($parametre) {
        $q->where('size', 'like', "%$parametre%");
    })
    ->orWhereHas('brande', function($q) use ($parametre) {
        $q->where('name', 'like', "%$parametre%");
    })
    ->orWhereHas('category', function($q) use ($parametre) {
        $q->where('name', 'like', "%$parametre%");
    })
    ->orWhereHas('sub_category', function($q) use ($parametre) {
        $q->where('name', 'like', "%$parametre%");
    })
    ->with('sizes', 'reviews', 'images', 'brande', 'category', 'sub_category')
    ->paginate(4);


}
// else if($parametre==null){



// }

elseif($parametre!=null){

    $products=Product::where('name', 'like', "%$parametre%")
    ->orWhere('description', 'like', "%$parametre%")
    ->orWhereHas('sizes', function($q) use ($parametre) {
        $q->where('size', 'like', "%$parametre%");
    })
    ->orWhereHas('brande', function($q) use ($parametre) {
        $q->where('name', 'like', "%$parametre%");
    })
    ->orWhereHas('category', function($q) use ($parametre) {
        $q->where('name', 'like', "%$parametre%");
    })
    ->orWhereHas('sub_category', function($q) use ($parametre) {
        $q->where('name', 'like', "%$parametre%");
    })
    ->with('sizes', 'reviews', 'images', 'brande', 'category', 'sub_category')
    ->paginate(4);

}else{
    $products = Product::with('sizes','reviews','images','brande','category','sub_category')
    ->paginate(4);;
}

        $categories=Category::with('subCategories')->get();

        return view('e-commerce.shop',compact('categories','products'));
    }
}

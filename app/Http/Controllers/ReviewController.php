<?php

namespace App\Http\Controllers;

use App\Models\Review;
use App\Models\User;
use App\Models\Product;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function add_review(Request $request){
        $validate_data = $request->validate([
            'review'=>'required|min:5|max:500'
        ]);


        $product = Product::find($request['id_product']);

        $user = User::find(auth()->user()->id);

        $review = new Review();

        $review->review = $validate_data['review'];
        $review->product()->associate($product);
        $review->user()->associate($user);

        $review->save();

        if(!$review){
            return back()->withInput();
        }else{
            return back()->with('add_review_success');
        }
    }
}

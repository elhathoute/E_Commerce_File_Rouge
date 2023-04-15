<?php

namespace App\Http\Controllers;

use App\Models\Panier;
use App\Models\Product;
use Illuminate\Http\Request;

class PaimentController extends Controller
{
    //create
    public function create($id){

        $order = Panier::with('product')->findOrFail($id);


        return view('e-commerce.paiment_create',['order'=>$order]);
    }
    //store
    public function store_paiment($id){
        $order = Panier::findOrFail($id);

        // $product=Product::where('id','=',$order->product_id)->first();
        // dd($order->size_id);
        // dd($order->product->sizes->firstWhere('id', '=', $order->size_id)->colors->firstWhere('id', '=', $order->color_id)->pivot->where('product_id', '=', $order->product_id)->quantity);

        $qte = $order->product->sizes->firstWhere('id','=',$order->size_id)->colors->firstWhere('id','=',$order->color_id)->pivot->where('product_id', '=', $order->product->id)->value('quantity');
        $qte-=$order->quantity;

        $order->product->sizes->firstWhere('id', '=', $order->size_id)
        ->colors->firstWhere('id', '=', $order->color_id)
        ->pivot->where('product_id', '=', $order->product->id)
        ->update(['quantity' => $qte]);

        $order->etat='order';
        $order->save();

        return redirect('/user/profile');

    }
}

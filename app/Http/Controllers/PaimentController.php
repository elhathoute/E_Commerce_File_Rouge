<?php

namespace App\Http\Controllers;

use App\Models\Panier;
use App\Models\Product;
use Illuminate\Http\Request;

class PaimentController extends Controller
{
    public function orders(Request $request){
        $orders_from_array_jquery = $request->input('orders');
        $orders = json_decode($orders_from_array_jquery);



    return view('e-commerce.paiment_create',['orders'=>$orders]);

    }
    //create
    // public function create($id){

    //     $order = Panier::with('product')->findOrFail($id);


    //     return view('e-commerce.paiment_create',['order'=>$order]);
    // }
    //store
    public function store_paiment(Request $request){

        $orders =json_decode($request->orders);
    //   dd($orders);
      foreach($orders as $order){

        $id_product = $order->product_id;
        $id_size = $order->size_id;
        $id_color = $order->color_id;
        $user_id=auth()->user()->id;

        $order_db = Panier::where('product_id','=',$id_product)
        ->where('size_id','=',$id_size)
        ->where('color_id','=',$id_color)
        ->where('etat','=','panier')
        ->where('user_id','=',$user_id)->first() ;

        $qte=$order->quantity;
        $price=$order->price_product;


        // dd($order_db);
    $qte_update = $order_db->product->sizes->
    firstWhere('id','=',$id_size)->
    colors->firstWhere('id','=',$id_color)->
    pivot->where('product_id', '=', $id_product)->value('quantity');

    if($qte_update<$qte){
        return back()->with('error-qte-stock','Sorry this quantity not available in stock ! available is =>'.$qte_update);
    }else{
        $qte_update-=$qte;

    }



        $order_db->product->sizes->firstWhere('id', '=', $id_size)
        ->colors->firstWhere('id', '=', $id_color)
        ->pivot->where('product_id', '=', $id_product)
        ->update(['quantity' => $qte_update]);

        $order_db->numero=time();
        $order_db->etat='order';
        $order_db->save();
        return redirect('/user/profile');

      }
        // $order = Panier::findOrFail($id);

        // // $product=Product::where('id','=',$order->product_id)->first();
        // // dd($order->size_id);
        // // dd($order->product->sizes->firstWhere('id', '=', $order->size_id)->colors->firstWhere('id', '=', $order->color_id)->pivot->where('product_id', '=', $order->product_id)->quantity);

        // $qte = $order->product->sizes->firstWhere('id','=',$order->size_id)->colors->firstWhere('id','=',$order->color_id)->pivot->where('product_id', '=', $order->product->id)->value('quantity');
        // $qte-=$order->quantity;

        // $order->product->sizes->firstWhere('id', '=', $order->size_id)
        // ->colors->firstWhere('id', '=', $order->color_id)
        // ->pivot->where('product_id', '=', $order->product->id)
        // ->update(['quantity' => $qte]);

        // $order->etat='order';
        // $order->save();

        // return redirect('/user/profile');

    }
}

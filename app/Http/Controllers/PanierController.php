<?php

namespace App\Http\Controllers;

use App\Models\Panier;
use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PanierController extends Controller
{
    public function panier(Request $request ){
        if($request->query('panier')){
        $paniers = json_decode($request->query('panier'), true);
            foreach($paniers as $panier){
                $panier_db=new Panier();

                $panier_db->numero=time();
                $panier_db->date=Carbon::now();
                $panier_db->quantity=$panier['quantity'];
                $panier_db->color_id=$panier['color_id'];
                $panier_db->price=$panier['price_product'];
                $panier_db->size_id=$panier['size_id'];
                $panier_db->etat='panier';
                $panier_db->user_id=auth()->user()->id;
                $panier_db->product_id=$panier['id_product'];

                $panier_db->save();

/*remove quanityt if user payer*/

                // get product

                // $product=Product::findOrFail($panier['id_product']);
                // $size_id = $panier['size_id'];
                // $color_id = $panier['color_id'];

                // get qte of each product,size,color

                // $pivot = $product->sizes()->where('sizes.id', $size_id)->firstOrFail()
                // ->colors()->where('colors.id',$color_id)->firstOrFail()->pivot;

                //     $pivot->quantity -= $panier['quantity'];

                //     $pivot->save();

/*-----------------------------------------------*/

            }
            return redirect('/panier');
        }
        else{


        // get all paniers from db
        $paniers = Panier::where('user_id','=',auth()->user()->id)
        ->where('etat','=','panier')
        ->get();
        return view('e-commerce.panier',['paniers'=>$paniers]);

        }
    }
    //add to panier
    public function add_to_panier($id){
        $product=Product::findOrFail($id);

        $panier=new Panier();

        $panier->numero=time();
        $panier->date=Carbon::now();
        $panier->quantity=$product->sizes->first()->colors->where('pivot.product_id',$id)
        ->where('pivot.quantity','>','0')
        ->first()->pivot->quantity;
        $panier->color_id=$product->sizes->first()->colors->where('pivot.product_id',$id)->first()->id;
        $old_price=$product->sizes->first()->colors->where('pivot.product_id',$id)->first()->pivot->price;
        $offer=$product->sizes->first()->colors->where('pivot.product_id',$id)->first()->pivot->offer;
        $new_price=($old_price)-((($old_price)*$offer)/100);
        $panier->price=$new_price;
        $panier->size_id=$product->sizes->first()->colors->where('pivot.product_id',$id)->first()->pivot->size_id;
        $panier->etat='panier';
        $panier->user_id=auth()->user()->id;
        $panier->product_id=$id;

        $panier->save();
        if($panier){
            return redirect('/panier');
        }else{
            return redirect('/');
        }

    }
    // add wishlist
    public function add_to_wishlist($id){

        $product=Product::findOrFail($id);
        // check if product exist before
        $wishlistExist = false;
        foreach($product->paniers as $panier){
           if($panier->etat ==='wishlist'){
            $wishlistExist=true;
            break;
           }
        }
        // if product exist in wishlist
        if($wishlistExist){
            return back();
        }

        $panier=new Panier();
        // dd($product->sizes->first()->colors->where('pivot.product_id',$id)->first()->pivot->size_id);
        $panier->numero=time();
        $panier->date=Carbon::now();
        $panier->quantity=$product->sizes->first()->colors->where('pivot.product_id',$id)
        // ->where('pivot.quantity','>','0')
        ->first()->pivot->quantity;
        $panier->color_id=$product->sizes->first()->colors->where('pivot.product_id',$id)->first()->id;
        $old_price=$product->sizes->first()->colors->where('pivot.product_id',$id)->first()->pivot->price;
        $offer=$product->sizes->first()->colors->where('pivot.product_id',$id)->first()->pivot->offer;
        $new_price=($old_price)-((($old_price)*$offer)/100);
        $panier->price=$new_price;
        $panier->size_id=$product->sizes->first()->colors->where('pivot.product_id',$id)->first()->pivot->size_id;
        $panier->etat='wishlist';
        $panier->user_id=auth()->user()->id;
        $panier->product_id=$id;

        $panier->save();
        if($panier){
            return redirect('/wishlist');
        }else{
            return redirect('/');
        }
    }
    public function delete_panier($id){
        $panier=Panier::findOrFail($id);
        $panier->delete();
        if($panier){
            return back();
        }else{
            return 'error';
        }
    }
    public function wishlist(){
        $wishlists = Panier::where('user_id','=',auth()->user()->id)
        ->where('etat','=','wishlist')
        ->get();
        return view('e-commerce.wishlist',['wishlists'=>$wishlists]);

    }
    // show one order
    public function order($id){
         // get all paniers from db
         $order = Panier::where('user_id','=',auth()->user()->id)
         ->where('etat','=','order')
         ->where('id','=',$id)
         ->get();

         return view('e-commerce.order',['order'=>$order]);
    }
}

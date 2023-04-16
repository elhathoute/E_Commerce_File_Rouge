<?php

namespace App\Http\Controllers;

use App\Models\Size;
use App\Models\Color;
use App\Models\Image;
use App\Models\Brande;
use App\Models\Product;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use App\Models\DetailProduct;

class ProductController extends Controller
{

    // create product
    public function create(){

        // $categories=Category::all();

        return view('e-commerce.add_product');
    }
    // add product
    public function store(Request $request){


        // dd($brande);
        // validate data
        // $Product_Validate=$request->validate(
        //     [
        //     'name' => 'required|string',
        //     'description' => 'required|string',
        //     'type' => 'required|string',
        //     'category' => 'required|numeric',
        //     'sub-category' => 'required|numeric',
        //     'brand' => 'required|numeric',
        //     'semelle_int' => 'required|string',
        //     'semelle_ext' => 'required|string',
        //     'tige' => 'required|string',
        //     'doubleure' => 'required|string',

        //     'size-select' => 'required|array',
        //     'size-select.*' => 'required|string',
        //     'color-select' => 'required|array',
        //     'color-select.*' => 'required|string',
        //     'quantity-input' => 'required|array|size:2',
        //     'quantity-input.*' => 'required|numeric',
        //     'price-input' => 'required|array|size:2',
        //     'price-input.*' => 'required|numeric',
        //     'offer-select' => 'required|array|size:2',
        //     'offer-select.*' => 'required|string',
        //      'images'        =>'image|mimes:jpeg,png,jpg'

        //     ]
        // );

        // create new instance
        $product = new Product();
        // simple column
        $product->name = $request['name'];
        $product->description = $request['description'];
        $product->type = $request['type'];
        // get relation ship
        $category = Category::find($request['category']);
        $sub_category = SubCategory::find($request['sub-category']);
        $brande = Brande::find($request['brand']);
        // attach product to each realtionship
        $product->category()->associate($category);
        $product->sub_category()->associate($sub_category);
        $product->brande()->associate($brande);

        // save product
        $product->save();

          // verify images
          $images = $request['images'];

          if($request->hasFile('images')){
              foreach($images as $image){
                  $image_file =$image;
                  $image_file_name=time().'.'.$image_file->getClientOriginalExtension();

                  $image_file->move('assets/imageProducts',$image_file_name);

                  $new_image = new Image();
                  $new_image->image=$image_file_name;
                  $new_image->product()->associate($product);
                  $new_image->save();

                }

          }

        // save detail_product
        $detail_product = new DetailProduct();

        $detail_product->semelle_int = $request['semelle_int'];
        $detail_product->semelle_ext = $request['semelle_ext'];
        $detail_product->doubleure = $request['doubleure'];
        $detail_product->tige = $request['tige'];

        // associate detail product to product

        $detail_product->product()->associate($product);



        // save detail of product
        $detail_product->save();

        // get sizes
        $sizes = $request['size-select'];
         // get colors
         $colors = $request['color-select'];
         //get quantities
         $quantities = $request['quantity-input'];
         // get offers
         $offers = $request['offer-select'];
         // prices
         $prices = $request['price-input'];
         // attach product with sizes
         $product->sizes()->attach($sizes);


         foreach ($sizes as $key => $size) {
            // Get the size model
            $sizeModel = Size::find($size);

            // Get the color model
            $colorModel = Color::find($colors[$key]);

            // Attach the color to the size with the additional attributes
            $sizeModel->colors()->attach($colorModel, [
                'product_id' => $product->id,
                'price' => $prices[$key],
                'quantity' => $quantities[$key],
                'offer' => $offers[$key]
            ]);
        }

        return redirect('/product')->with('success-add-product','product add with success');

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

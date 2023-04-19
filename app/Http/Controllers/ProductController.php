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

    // edit
    public function edit($id){

        $product = Product::where('id','=',$id)->with('sizes', 'reviews', 'images', 'brande', 'category', 'sub_category')
        ->first();

        return view('e-commerce.edit_product',['product'=>$product]);
    }
    // update
    public function update(Request $request,$id){

        $Product_Validate=$request->validate(
            [
            'name' => 'required|string',
            'description' => 'required|string',
            'type' => 'required|string',
            'category' => 'required|numeric',
            'sub-category' => 'required|numeric',
            'brand' => 'required|numeric',
            'semelle_int' => 'required|string',
            'semelle_ext' => 'required|string',
            'tige' => 'required|string',
            'doubleure' => 'required|string',

            'size-select' => 'required|array',
            'size-select.*' => 'required|string',
            'color-select' => 'required|array',
            'color-select.*' => 'required|string',
            // 'quantity-input' => 'required|array|size:2',
            'quantity-input.*' => 'required|numeric',
            // 'price-input' => 'required|array|size:2',
            'price-input.*' => 'required|numeric',
            // 'offer-select' => 'required|array|size:2',
            'offer-select.*' => 'required|numeric',
             'images.*' =>'mimes:jpeg,png,jpg',


            ]
        );



       // Update simple columns
       $product = Product::findOrFail($id);
       $product->name = $Product_Validate['name'];
       $product->description = $Product_Validate['description'];
       $product->type = $Product_Validate['type'];
       $product->category_id = $Product_Validate['category'];
       $product->sub_category_id = $Product_Validate['sub-category'];
       $product->brande_id = $Product_Validate['brand'];
        //relationship
         // save detail_product
         $detail_product = $product->detail_product;

         $detail_product->semelle_int = $Product_Validate['semelle_int'];
         $detail_product->semelle_ext = $Product_Validate['semelle_ext'];
         $detail_product->doubleure = $Product_Validate['doubleure'];
         $detail_product->tige = $Product_Validate['tige'];

         $detail_product->save();

          if(!$request->has('existing_images')){
            $images = $Product_Validate['images'];
            //remove existing images
                $existing_images = $product->images;
                foreach($existing_images as $existing_image){
                    $existing_image->delete();

                }
                foreach($images as $image){
                    $image_file =$image;
                  //   dd(time().rand(1,10000).$image_file->getClientOriginalName());
                    $image_file_name=time().rand(1,10000).$image_file->getClientOriginalName();

                    $image_file->move('assets/imageProducts',$image_file_name);

                    $new_image = new Image();
                    $new_image->image=$image_file_name;
                    $new_image->product()->associate($product);
                    $new_image->save();
            }
        }
        // update  sizes
        $sizes = $Product_Validate['size-select'];
        // dd($sizes);
        $product->sizes()->sync($sizes);
        //get the updated colors
        $colors = $Product_Validate['color-select'];
         //get the updated quantities
         $quantities = $Product_Validate['quantity-input'];
          //get the updated prices
        $prices = $Product_Validate['price-input'];
        //get updated offers
        $offers = $Product_Validate['offer-select'];

       foreach($sizes as $key=>$size){
        // get model of  each size
        $sizeModel = Size::find($size);
        // get color model
        $colorModel = Color::find($colors[$key]);
        // dd($colorModel);
           // sync the color with this size, and set the quantity, price, and offer
    $sizeModel->colors()->wherePivot('product_id', $product->id)->sync([
        $colorModel->id => [
            'quantity' => $quantities[$key],
            'price' => $prices[$key],
            'offer' => $offers[$key],
            'product_id' => $product->id
        ],
        // add other color IDs and attributes as needed
    ]);







        // dd($sizeModel);
       }


    $product->save();
        if($product){
            return redirect('/product');
        }else{
            return back();
        }
    }

      // index(admin)
      public function index(){
        $products = Product::with('sizes', 'reviews', 'images', 'brande', 'category', 'sub_category')
        ->get();
        return view('e-commerce.product',['products'=>$products]);
    }
    // create product
    public function create(){



        return view('e-commerce.add_product');
    }
    // add product
    public function store(Request $request){


        // dd($brande);
        // validate data
        $Product_Validate=$request->validate(
            [
            'name' => 'required|string',
            'description' => 'required|string',
            'type' => 'required|string',
            'category' => 'required|numeric',
            'sub-category' => 'required|numeric',
            'brand' => 'required|numeric',
            'semelle_int' => 'required|string',
            'semelle_ext' => 'required|string',
            'tige' => 'required|string',
            'doubleure' => 'required|string',

            'size-select' => 'required|array',
            'size-select.*' => 'required|string',
            'color-select' => 'required|array',
            'color-select.*' => 'required|string',
            // 'quantity-input' => 'required|array|size:2',
            'quantity-input.*' => 'required|numeric',
            // 'price-input' => 'required|array|size:2',
            'price-input.*' => 'required|numeric',
            // 'offer-select' => 'required|array|size:2',
            'offer-select.*' => 'required|numeric',
             'images.*' =>'required|mimes:jpeg,png,jpg'

            ]
        );

        // create new instance
        $product = new Product();
        // simple column
        $product->name = $Product_Validate['name'];
        $product->description = $Product_Validate['description'];
        $product->type = $Product_Validate['type'];
        // get relation ship
        $category = Category::find($Product_Validate['category']);
        $sub_category = SubCategory::find($Product_Validate['sub-category']);
        $brande = Brande::find($Product_Validate['brand']);
        // attach product to each realtionship
        $product->category()->associate($category);
        $product->sub_category()->associate($sub_category);
        $product->brande()->associate($brande);

        // save product
        $product->save();

          // verify images
          $images = $Product_Validate['images'];

          if($request->hasFile('images')){
              foreach($images as $image){
                  $image_file =$image;
                //   dd(time().rand(1,10000).$image_file->getClientOriginalName());
                  $image_file_name=time().rand(1,10000).$image_file->getClientOriginalName();

                  $image_file->move('assets/imageProducts',$image_file_name);

                  $new_image = new Image();
                  $new_image->image=$image_file_name;
                  $new_image->product()->associate($product);
                  $new_image->save();

                }

          }

        // save detail_product
        $detail_product = new DetailProduct();

        $detail_product->semelle_int = $Product_Validate['semelle_int'];
        $detail_product->semelle_ext = $Product_Validate['semelle_ext'];
        $detail_product->doubleure = $Product_Validate['doubleure'];
        $detail_product->tige = $Product_Validate['tige'];

        // associate detail product to product

        $detail_product->product()->associate($product);



        // save detail of product
        $detail_product->save();

        // get sizes
        $sizes_unique = array_unique($Product_Validate['size-select']);
        // dd($sizes);
         // get colors
         $colors = $Product_Validate['color-select'];
         //get quantities
         $quantities = $Product_Validate['quantity-input'];
         // get offers
         $offers = $Product_Validate['offer-select'];
         // prices
         $prices = $Product_Validate['price-input'];
         // attach product with sizes
         $product->sizes()->attach($sizes_unique);

         $sizes = $Product_Validate['size-select'];

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
            if(!$product){
                return back()->with('error-add-product','product not add')->withInput();
            }else{
                return redirect('/product')->with('success-add-product','product add with success');
            }

    }


// view_one_product(user)
    public function view_product($id){
        // $product =Product::findOrFail($id)->with('sizes')->first();
        $product = Product::with('sizes','reviews','images','brande','category','sub_category')->findOrFail($id);

        return view('e-commerce.view_product',['product'=>$product]);
    }
}

@extends('layouts.master')
@section('main')
{{-- breadcrumbs --}}
<div class="page-header breadcrumb-wrap">
    <div class="container">
        <div class="breadcrumb">
            <a href="{{ route('e-commerce.home') }}" rel="nofollow">Home</a>
            <span></span>Edit Product
        </div>
    </div>
</div>
{{-- add product --}}
<div class="container mt-15 mb-15">
    <div class="container">
       {{-- alert error --}}
       @if ($errors->any())
       <div class="alert-danger text-center mb-2">
         {{ $errors->first() }}
       </div>
     @endif
        <div class="card">
          <div class="card-header">
            <h4>Edit Product</h4>
          </div>
          <div class="card-body">
{{-- {{ route('e-commerce.update_product',['$id'=>$product->id]) }} --}}
            <form action="{{ route('e-commerce.update_product',['id'=>$product->id]) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                <div class="row">
              <div class="form-group col-md-4">
                <label for="name">Name of Product:</label>
                <input required type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ $product->name }}" placeholder="Enter name of product">
                <div class="invalid-feedback">
                @error('name')
                {{ $message }}
                @enderror
              </div>
            </div>
              <div class="form-group col-md-4">
                <label for="description">Description:</label>
                <input required type="text" class="form-control @error('description') is-invalid @enderror" id="description" name="description" value="{{ $product->name }}" placeholder="Enter description">
                <div class="invalid-feedback">
                    @error('description')
                    {{ $message }}
                    @enderror
                  </div>
            </div>
              <div class="form-group col-md-4">
                <label for="type">Type:</label>

                <select class="form-control @error('type') is-invalid @enderror" id="type" name="type" >
                  <option value="">Select a type</option>
                  <option @if($product->type=='New') selected @endif value="New">New</option>
                  <option  @if($product->type=='Hot') selected @endif value="Hot">Hot</option>
                  <option  @if($product->type=='Best Seller') selected @endif value="Best Seller">Best Seller</option>
                  <option  @if($product->type=='Other') selected @endif value="Other">Other</option>
                </select>
                <div class="invalid-feedback">
                    @error('type')
                    {{ $message }}
                    @enderror
                  </div>
              </div>
            </div>
            <div class="row">
                @php
                    $categories=App\Models\Category::all();
                @endphp
              <div class="form-group col-md-4" >
                <label for="category">Category:</label>
                <select class="form-control @error('category') is-invalid @enderror" id="category" name="category">
                  <option selected  disabled>Select a category</option>
                  @foreach ($categories as $category)
                  <option @if($product->category->id==$category->id) selected @endif value="{{ $category->id }}">{{ $category->name }}</option>
                  @endforeach

                </select>
                <div class="invalid-feedback">
                    @error('category')
                    {{ $message }}
                    @enderror
                  </div>
              </div>
              <div class="form-group col-md-4">
                <label for="sub-category">Sub Category:</label>
                <select class="form-control @error('sub-category') is-invalid @enderror " id="sub-category" name="sub-category">
                  <option selected  value="{{ $product->sub_category->id }}" >{{ $product->sub_category->name }}</option>
                </select>
                <div class="invalid-feedback">
                    @error('sub-category')
                    {{ $message }}
                    @enderror
                  </div>
              </div>
              @php
                  $brandes=App\Models\Brande::all();
              @endphp
              <div class="form-group col-md-4">
                <label for="brand">Brand:</label>
                <select class="form-control @error('brand') is-invalid @enderror" id="brand" name="brand">
                    <option selected  disabled>select brande</option>
                    @foreach ($brandes as $brande )
                  <option @if($product->brande->id ==$brande->id) selected @endif value="{{ $brande->id }}">{{ $brande->name }}</option>
                  @endforeach
                </select>
                <div class="invalid-feedback">
                    @error('brand')
                    {{ $message }}
                    @enderror
                  </div>
              </div>
            </div>
            <hr>
            <div class="row mt-1">
            <div class="form-group col-md-3">
                <label for="semelle_int">Semelle Intérieure</label>
                <input required type="text" class="form-control @error('semelle_int') is-invalid @enderror" id="semelle_int" name="semelle_int" value="{{ $product->detail_product->semelle_int }}">
                <div class="invalid-feedback">
                    @error('semelle_int')
                    {{ $message }}
                    @enderror
                  </div>
            </div>
            <div class="form-group col-md-3">
                <label for="semelle_ext">Semelle Extérieure</label>
                <input required type="text" class="form-control @error('semelle_ext') is-invalid @enderror" id="semelle_ext" name="semelle_ext" value="{{$product->detail_product->semelle_ext}}">
                <div class="invalid-feedback">
                    @error('semelle_ext')
                    {{ $message }}
                    @enderror
                  </div>
            </div>
            <div class="form-group col-md-3">
                <label for="tige">Tige</label>
                <input required type="text" class="form-control @error('tige') is-invalid @enderror" id="tige" name="tige" value="{{ $product->detail_product->tige }}">
                  <div class="invalid-feedback">
                    @error('tige')
                    {{ $message }}
                    @enderror
                  </div>

            </div>
            <div class="form-group col-md-3">
                <label for="doubleure">Doublure</label>
                <input required type="text" class="form-control @error('doubleure') is-invalid @enderror" id="doubleure" name="doubleure" value="{{ $product->detail_product->doubleure }}">
                  <div class="invalid-feedback">
                    @error('doubleure')
                    {{ $message }}
                    @enderror
                  </div>
            </div>
            </div>

            <hr>
            <div id="div-product-size-color">


            <div class="row mt-2" id="attr_1" >
                @php
                    $sizes_db=App\Models\Size::all();
                @endphp
               {{-- {{ dd($sizes)}} --}}
                <div class="col-md-2 form-group">
                  <label for="size-select">Size:</label>
                  @foreach ($product->sizes as $size )

                  @foreach ($size->colors()->wherePivot('product_id', $product->id)->get() as $color )



                  <select class="form-control @error('size-select') is-invalid @enderror mt-1" id="size-select" name="size-select[]">

                    @foreach ($sizes_db as $size_db )

                    <option @if ($size->id==$size_db->id) selected @endif value="{{$size_db->id  }}">{{ $size_db->size }}</option>
                    @endforeach

                  </select>
                  @endforeach
                  @endforeach

                  <div class="invalid-feedback">
                    @error('size-select')
                    {{ $message }}
                    @enderror
                  </div>
                </div>
                {{-- @php
                    $colors=App\Models\Color::all();
                @endphp --}}
                <div class="col-md-2 form-group">
                  <label for="color-select">Color:</label>
                  @foreach ($product->sizes as $size )
                  @foreach ($size->colors()->wherePivot('product_id', $product->id)->get() as $color )



                        @php
                        //get id of colors related with sizes of product
                                    // $id_color = $size->colors()->wherePivot('product_id', $product->id)->first()->pivot->color_id ;
                                    //     $color = App\Models\Color::find($id_color);
                                        // colors in db
                                        $colors_db =App\Models\Color::all();
                        @endphp

{{-- {{ $color }} --}}
                  <select class="form-control @error('color-select') is-invalid @enderror mt-1" id="color-select" name="color-select[]">
                    <option selected disabled>select color</option>
                        @foreach ($colors_db as  $color_db)
                        <option @if($color->id==$color_db->id) selected @endif  value="{{ $color_db->id }}">{{ $color_db->name }}</option>

                        @endforeach


                  </select>
                  @endforeach
                  @endforeach


                   <div class="invalid-feedback">
                    @error('color-select')
                    {{ $message }}
                    @enderror
                  </div>
                </div>

                <div class="col-md-2 form-group">
                  <label for="quantity-input ">Quantity:</label>
                  @foreach ($product->sizes as $size )
                  @foreach ($size->colors()->wherePivot('product_id', $product->id)->get() as $color )

                  @php
                  //get qte  of colors related with sizes of product
                            //   $quantity = $size->colors()->wherePivot('product_id', $product->id)->first()->pivot->quantity ;
                            $quantity = $color->pivot->quantity;

                  @endphp

                  <input required min="0" type="number" value="{{ $quantity }}" class="form-control mt-1 @error('quantity-input') is-invalid @enderror" id="quantity-input" name="quantity-input[]" >
                    @endforeach
                    @endforeach

                  <div class="invalid-feedback">
                    @error('quantity-input')
                    {{ $message }}
                    @enderror
                  </div>
                </div>
                <div class="col-md-2 form-group">
                  <label for="price-input ">Price:</label>
                  @foreach ($product->sizes as $size )
                  @foreach ($size->colors()->wherePivot('product_id', $product->id)->get() as $color )

                  @php
                  //get price  of colors related with sizes of product
                            //   $price = $size->colors()->wherePivot('product_id', $product->id)->first()->pivot->price ;
                            $price = $color->pivot->price

                  @endphp
                  <input required min="0" type="number" value="{{ $price }}" class="form-control mt-1 @error('price-input') is-invalid @enderror" id="price-input" name="price-input[]">
                  @endforeach
                  @endforeach

                  <div class="invalid-feedback">
                    @error('price-input')
                    {{ $message }}
                    @enderror
                  </div>
                </div>
                <div class="col-md-2 form-group">
                  <label for="offer-select">Offer:</label>
                  @foreach ($product->sizes as $size )
                  @foreach ($size->colors()->wherePivot('product_id', $product->id)->get() as $color )


                  @php
                  //get offer  of colors related with sizes of product
                            //   $offer = $size->colors()->wherePivot('product_id', $product->id)->first()->pivot->offer ;
                            $offer = $color->pivot->offer;

                  @endphp
                  <select class="form-control @error('offer-select') is-invalid @enderror mt-1 " id="offer-select" name="offer-select[]">
                    <option selected disabled>select offer</option>
                    @for ($i=10;$i<100;$i+=10)
                    <option @if($offer==$i) selected @endif value="{{ $i }}">{{ $i }}% off</option>
                    @endfor
                  </select>
                  @endforeach
                  @endforeach

                  <div class="invalid-feedback">
                    @error('offer-select')
                    {{ $message }}
                    @enderror
                  </div>
                </div>

                <div class="col-md-2 form-group mt-4 d-flex flex-column justify-content-evenly">
                    <button type="button" class="btn btn-success text-dark mt-1" id="add_more_size_color"> <i class="fi-rs-add"></i></button>
                    <span class="text-danger">* Please if you need to add new size with color don't touch existing sizes</span>
                </div>
              </div>

            </div>
                <hr>

              <div class="form-group">
                <label for="images">Images:</label>
                <input  type="file" class="form-control-file @error('images') is-invalid @enderror" id="images" name="images[]" multiple>




                <div class="invalid-feedback">
                    @error('images')
                    {{ $message }}
                    @enderror
                  </div>
            </div>
              {{-- show images --}}
              {{-- {{$image->image}} --}}
              <div id="image-preview" class="d-flex my-2 row flex-wrap align-items-center justify-content-between">
              @foreach($product->images as $image)
                <div class="col-md-4">
                  <img src="{{ asset('assets/imageProducts/'.$image->image) }}" alt="">
                  <input type="hidden" name="existing_images[]" value="{{ $image->image }}">
                </div>
              @endforeach


              </div>
            <div class="text-center">
                <button type="submit" class="btn btn-primary text-center">Edit Product</button>

            </div>
                        </form>
          </div>
        </div>
      </div>

</div>

@endsection

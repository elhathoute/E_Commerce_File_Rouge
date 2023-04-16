@extends('layouts.master')
@section('main')
{{-- breadcrumbs --}}
<div class="page-header breadcrumb-wrap">
    <div class="container">
        <div class="breadcrumb">
            <a href="{{ route('e-commerce.home') }}" rel="nofollow">Home</a>
            <span></span>Add Product
        </div>
    </div>
</div>
{{-- add product --}}
<div class="container mt-15 mb-15">
    <div class="container">
        <div class="card">
          <div class="card-header">
            <h4>Add Product</h4>
          </div>
          <div class="card-body">

            <form action="{{ route('e-commerce.add_product') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
              <div class="form-group col-md-4">
                <label for="name">Name of Product:</label>
                <input required type="text" class="form-control" id="name" name="name" placeholder="Enter name of product">
              </div>
              <div class="form-group col-md-4">
                <label for="description">Description:</label>
                <input required type="text" class="form-control" id="description" name="description" placeholder="Enter description">
              </div>
              <div class="form-group col-md-4">
                <label for="type">Type:</label>
                <select class="form-control" id="type" name="type" >
                  <option value="">Select a type</option>
                  <option value="New">New</option>
                  <option value="Hot">Hot</option>
                  <option value="Best Seller">Best Seller</option>
                  <option value="Other">Other</option>
                </select>
              </div>
            </div>
            <div class="row">
                @php
                    $categories=App\Models\Category::all();
                @endphp
              <div class="form-group col-md-4" >
                <label for="category">Category:</label>
                <select class="form-control" id="category" name="category">
                  <option selected  disabled>Select a category</option>
                  @foreach ($categories as $category)
                  <option value="{{ $category->id }}">{{ $category->name }}</option>
                  @endforeach

                </select>
              </div>
              <div class="form-group col-md-4">
                <label for="sub-category">Sub Category:</label>
                <select class="form-control" id="sub-category" name="sub-category">
                  <option selected  disabled >Select a sub-category</option>

                </select>
              </div>
              @php
                  $brandes=App\Models\Brande::all();
              @endphp
              <div class="form-group col-md-4">
                <label for="brand">Brand:</label>
                <select class="form-control" id="brand" name="brand">
                    <option selected  disabled>select brande</option>
                    @foreach ($brandes as $brande )
                  <option value="{{ $brande->id }}">{{ $brande->name }}</option>
                  @endforeach
                </select>
              </div>
            </div>
            <hr>
            <div class="row mt-1">
            <div class="form-group col-md-3">
                <label for="semelle_int">Semelle Intérieure</label>
                <input required type="text" class="form-control" id="semelle_int" name="semelle_int">
            </div>
            <div class="form-group col-md-3">
                <label for="semelle_ext">Semelle Extérieure</label>
                <input required type="text" class="form-control" id="semelle_ext" name="semelle_ext">
            </div>
            <div class="form-group col-md-3">
                <label for="tige">Tige</label>
                <input required type="text" class="form-control" id="tige" name="tige">
            </div>
            <div class="form-group col-md-3">
                <label for="doubleure">Doublure</label>
                <input required type="text" class="form-control" id="doubleure" name="doubleure">
            </div>
            </div>

            <hr>
            <div id="div-product-size-color">


            <div class="row mt-2" id="attr_1" >
                @php
                    $sizes=App\Models\Size::all();
                @endphp
                <div class="col-md-2 form-group">
                  <label for="size-select">Size:</label>
                  <select class="form-control" id="size-select" name="size-select[]">
                    <option selected disabled>select size</option>
                    @foreach ($sizes as $size )
                    <option value="{{ $size->id }}">{{ $size->size }}</option>
                    @endforeach

                  </select>
                </div>
                @php
                    $colors=App\Models\Color::all();
                @endphp
                <div class="col-md-2 form-group">
                  <label for="color-select">Color:</label>
                  <select class="form-control" id="color-select" name="color-select[]">
                    <option selected disabled>select color</option>
                    @foreach ($colors as $color )
                    <option value="{{ $color->id }}">{{ $color->name }}</option>
                    @endforeach

                  </select>
                </div>

                <div class="col-md-2 form-group">
                  <label for="quantity-input">Quantity:</label>
                  <input required min="0" type="number" class="form-control" id="quantity-input" name="quantity-input[]">
                </div>
                <div class="col-md-2 form-group">
                  <label for="price-input">Price:</label>
                  <input required min="0" type="number" class="form-control" id="price-input" name="price-input[]">
                </div>
                <div class="col-md-2 form-group">
                  <label for="offer-select">Offer:</label>
                  <select class="form-control" id="offer-select" name="offer-select[]">
                    <option selected disabled>select offer</option>
                    @for ($i=10;$i<100;$i+=10)

                    <option value="{{ $i }}">{{ $i }}% off</option>
                    @endfor

                  </select>
                </div>
                <div class="col-md-2 form-group mt-4">
                  <button type="button" class="btn btn-success text-dark" id="add_more_size_color"> <i class="fi-rs-add"></i></button>
                </div>
              </div>

            </div>
                <hr>

              <div class="form-group">
                <label for="images">Images:</label>
                <input required type="file" class="form-control-file" id="images" name="images[]" multiple>
              </div>
              {{-- show images --}}
              <div id="image-preview" class="d-flex my-2 row flex-wrap align-items-center justify-content-between">

              </div>
            <div class="text-center">
                <button type="submit" class="btn btn-primary text-center">Add Product</button>

            </div>
                        </form>
          </div>
        </div>
      </div>

</div>

@endsection

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
       {{-- alert error --}}
       @if ($errors->any())
       <div class="alert-danger text-center mb-2">
         {{ $errors->first() }}
       </div>
     @endif
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
                <input required type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}" placeholder="Enter name of product">
                <div class="invalid-feedback">
                @error('name')
                {{ $message }}
                @enderror
              </div>
            </div>
              <div class="form-group col-md-4">
                <label for="description">Description:</label>
                <input required type="text" class="form-control @error('description') is-invalid @enderror" id="description" name="description" value="{{ old('description') }}" placeholder="Enter description">
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
                  <option @if(old('type')=='New') selected @endif value="New">New</option>
                  <option  @if(old('type')=='Hot') selected @endif value="Hot">Hot</option>
                  <option  @if(old('type')=='Best Seller') selected @endif value="Best Seller">Best Seller</option>
                  <option  @if(old('type')=='Other') selected @endif value="Other">Other</option>
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
                  <option @if(old('category')==$category->id) selected @endif value="{{ $category->id }}">{{ $category->name }}</option>
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
                  <option selected  disabled >Select a sub-category</option>
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
                  <option @if(old('brand')==$brande->id) selected @endif value="{{ $brande->id }}">{{ $brande->name }}</option>
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
                <input required type="text" class="form-control @error('semelle_int') is-invalid @enderror" id="semelle_int" name="semelle_int" value="{{ old('semelle_int') }}">
                <div class="invalid-feedback">
                    @error('semelle_int')
                    {{ $message }}
                    @enderror
                  </div>
            </div>
            <div class="form-group col-md-3">
                <label for="semelle_ext">Semelle Extérieure</label>
                <input required type="text" class="form-control @error('semelle_ext') is-invalid @enderror" id="semelle_ext" name="semelle_ext" value="{{ old('semelle_ext') }}">
                <div class="invalid-feedback">
                    @error('semelle_ext')
                    {{ $message }}
                    @enderror
                  </div>
            </div>
            <div class="form-group col-md-3">
                <label for="tige">Tige</label>
                <input required type="text" class="form-control @error('tige') is-invalid @enderror" id="tige" name="tige" value="{{ old('tige') }}">
                  <div class="invalid-feedback">
                    @error('tige')
                    {{ $message }}
                    @enderror
                  </div>

            </div>
            <div class="form-group col-md-3">
                <label for="doubleure">Doublure</label>
                <input required type="text" class="form-control @error('doubleure') is-invalid @enderror" id="doubleure" name="doubleure" value="{{ old('doubleure') }}">
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
                    $sizes=App\Models\Size::all();
                @endphp
                <div class="col-md-2 form-group">
                  <label for="size-select">Size:</label>
                  <select class="form-control @error('size-select') is-invalid @enderror" id="size-select" name="size-select[]">
                    <option selected disabled>select size</option>
                    @foreach ($sizes as $size )
                    <option  value="{{ $size->id }}">{{ $size->size }}</option>
                    @endforeach
                  </select>
                  <div class="invalid-feedback">
                    @error('size-select')
                    {{ $message }}
                    @enderror
                  </div>
                </div>
                @php
                    $colors=App\Models\Color::all();
                @endphp
                <div class="col-md-2 form-group">
                  <label for="color-select">Color:</label>
                  <select class="form-control @error('color-select') is-invalid @enderror" id="color-select" name="color-select[]">
                    <option selected disabled>select color</option>
                    @foreach ($colors as $color )
                    <option  value="{{ $color->id }}">{{ $color->name }}</option>
                    @endforeach

                  </select>
                   <div class="invalid-feedback">
                    @error('color-select')
                    {{ $message }}
                    @enderror
                  </div>
                </div>

                <div class="col-md-2 form-group">
                  <label for="quantity-input ">Quantity:</label>
                  <input required min="0" type="number" class="form-control @error('quantity-input') is-invalid @enderror" id="quantity-input" name="quantity-input[]" >
                   <div class="invalid-feedback">
                    @error('quantity-input')
                    {{ $message }}
                    @enderror
                  </div>
                </div>
                <div class="col-md-2 form-group">
                  <label for="price-input ">Price:</label>
                  <input required min="0" type="number" class="form-control @error('price-input') is-invalid @enderror" id="price-input" name="price-input[]">
                   <div class="invalid-feedback">
                    @error('price-input')
                    {{ $message }}
                    @enderror
                  </div>
                </div>
                <div class="col-md-2 form-group">
                  <label for="offer-select">Offer:</label>
                  <select class="form-control @error('offer-select') is-invalid @enderror" id="offer-select" name="offer-select[]">
                    <option selected disabled>select offer</option>
                    @for ($i=10;$i<100;$i+=10)
                    <option @if(old('offer')==$i) selected @endif value="{{ $i }}">{{ $i }}% off</option>
                    @endfor
                  </select>
                  <div class="invalid-feedback">
                    @error('offer-select')
                    {{ $message }}
                    @enderror
                  </div>
                </div>
                <div class="col-md-2 form-group mt-4">
                  <button type="button" class="btn btn-success text-dark" id="add_more_size_color"> <i class="fi-rs-add"></i></button>
                </div>
              </div>

            </div>
                <hr>

              <div class="form-group">
                <label for="images">Images:</label>
                <input required type="file" class="form-control-file @error('images') is-invalid @enderror" id="images" name="images[]" multiple>
                <div class="invalid-feedback">
                    @error('images')
                    {{ $message }}
                    @enderror
                  </div>
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

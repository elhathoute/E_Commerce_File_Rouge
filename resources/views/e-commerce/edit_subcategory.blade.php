
@extends('layouts.master')
@section('main')
{{-- breadcrumbs --}}
<div class="page-header breadcrumb-wrap">
    <div class="container">
        <div class="breadcrumb">
            <a href="{{ route('e-commerce.home') }}" rel="nofollow">Home</a>
            <span></span>Edit SubCategory
        </div>
    </div>
</div>
{{-- edit subcategory --}}
<div class="container mb-50 mt-50">
    <div class="col-md-5  m-auto">
        <form  id="form-update-category" method="post" action="{{ route('e-commerce.update_subcategory',['id'=>$subcategory->id]) }}" enctype="multipart/form-data">
        @csrf
        @method('PATCH')
        <div class="row">
        <div class="form-group col-12">

            <label for="name-category">Name : <span class="required">*</span> </label>
            <input type="text" required  class="form-control @error('name') is-invalid @enderror"  id="name" name="name"  placeholder="Name" value="{{ $subcategory->name }}">
            <div class="invalid-feedback">
                @error('name')
                {{ $message }}
                @enderror
              </div>
        </div>

        <div class="form-group col-12">
            <label for="image">Image : <span class="required">*</span> </label>
            <input type="file"     class="form-control @error('image') is-invalid @enderror"  id="image" name="image"  >

               @error('image')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror

              </div>


              @error('sub_category_ids')
              <div class="invalid-feedback">{{ $message }}</div>
            @enderror

            </div>
        </div>

            <div class="col-md-12 text-center">
                <button type="submit" class="btn btn-fill-out submit" name="submit" value="Submit">Save</button>
            </div>
            <div class="col-md-12 text-center mt-1">
                <a href="{{ route('e-commerce.subcategory') }}" class="btn btn-fill-out submit bg-dark" name="submit" value="Submit">back</a>
            </div>
        </form>

          </div>
</div>
@endsection

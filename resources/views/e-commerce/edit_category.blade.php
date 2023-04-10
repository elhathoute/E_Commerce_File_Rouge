
@extends('layouts.master')
@section('main')
{{-- breadcrumbs --}}
<div class="page-header breadcrumb-wrap">
    <div class="container">
        <div class="breadcrumb">
            <a href="{{ route('e-commerce.home') }}" rel="nofollow">Home</a>
            <span></span>Edit Category
        </div>
    </div>
</div>
{{-- edit category --}}
<div class="container mb-50 mt-50">
    <div class="col-md-5  m-auto">
        <form  id="form-update-category" method="post" action="{{ route('e-commerce.update_category',['id'=>$category->id]) }}" enctype="multipart/form-data">
        @csrf
        @method('PATCH')
        <div class="row">
        <div class="form-group col-12">
            {{-- <input hidden  type="number" readonly  name="id" value="{{ $category->id }}"> --}}
            <label for="name-category">Name : <span class="required">*</span> </label>
            <input type="text" required  class="form-control @error('name') is-invalid @enderror"  id="name-category-input" name="name"  placeholder="Name" value="{{ $category->name }}">
            <div class="invalid-feedback">
                @error('name')
                {{ $message }}
                @enderror
              </div>
        </div>

        <div class="form-group col-12">

            @php
               $subCategories_select = App\Models\SubCategory::orderBy('id', 'desc')->get();

            @endphp

            <label for="sub-category">Sub Category : <span class="required">*</span> </label>
            <select  class="form-control form-select @error('sub_category_ids') is-invalid @enderror select-sub-category" id="sub-category" name="sub_category_ids[]" multiple>

                @foreach ($subCategories_select as $subCategory_select)
                <option
                @foreach ( $subCategories as  $subCategory)
                @if($subCategory_select->id==$subCategory->id) selected @endif
                @endforeach
              value="{{ $subCategory_select->id }}">{{ $subCategory_select->name }}
            </option>
              @endforeach

            </select>

              @error('sub_category_ids')
              <div class="invalid-feedback">{{ $message }}</div>
            @enderror

            </div>
        </div>

            <div class="col-md-12 text-center">
                <button type="submit" class="btn btn-fill-out submit" name="submit" value="Submit">Save</button>
            </div>
            <div class="col-md-12 text-center mt-1">
                <a href="{{ route('e-commerce.category') }}" class="btn btn-fill-out submit bg-dark" name="submit" value="Submit">back</a>
            </div>
        </form>

          </div>
</div>
@endsection

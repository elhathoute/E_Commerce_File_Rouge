@extends('layouts.master')

@section('main')
{{-- breadcrumbs --}}
<div class="page-header breadcrumb-wrap">
    <div class="container">
        <div class="breadcrumb">
            <a href="{{ route('e-commerce.home') }}" rel="nofollow">Home</a>
            <span></span> Category
        </div>
    </div>
</div>
{{-- categories --}}
<div class="container mb-50 mt-50" id="categories">
    <div class="row">
        @if(Session::has('add-category-success') || Session::has('delete-category-success'))
        <div class="col-md-12 alert alert-primary text-center" role="alert">
         <strong>{{ Session::get('add-category-success') }} {{ Session::get('delete-category-success') }}</strong>
          </div>
@endif

        <div class="col-md-7  m-auto">
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0">Your Categories</h5>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Name</th>
                                    <th>SubCategory</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            @php
                         $categories=App\Models\Category::with('subCategories')->orderBy('id', 'desc')->get();

                        @endphp
                            <tbody>
                                @foreach ($categories as $category )

                                <tr>
                                    <td id="id-category-table">{{ $category->id }}</td>
                                    <td id="name-category-table">{{ $category->name }}</td>
                                    <td id="sub-category-table">
                                        @foreach ($category->subCategories as $subCategory )
                                        <li
                                        sub-cat-id-table="{{ $subCategory->id }}"
                                        >{{ $subCategory->name }}</li>

                                        @endforeach
                                    </td>

                                    <td >
                                        <div class="d-flex align-items-center justify-content-evenly">
                                        <form action=" {{ route('e-commerce.delete_category',['id'=>$category->id])  }}" method="POST" enctype="multipart/form-data">

                                        @csrf
                                        @method('DELETE')
                                            <button
                                            onclick="return confirm('Are you sure you want to delete this category!');"
                                             title="drop" type="submit" class="btn-small bg-danger trash d-block">
                                                <i class="fi-rs-trash"></i>
                                            </button>
                                        </form>

                                        <button title="edit" id="edit" type="submit" class="btn-small  bg-warning edit d-block edit-category">
                                            <i class="fi-rs-edit"></i>
                                        </button>
                                    </div>
                                    </td>

                                </tr>
                                @endforeach


                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        {{--  --}}
          {{-- add category --}}
          <div class="col-md-5  m-auto">
            <form  id="form-add-category" method="post" action="{{ route('e-commerce.add_category') }}" enctype="multipart/form-data">
            @csrf
            <div class="row">
            <div class="form-group col-12">
                <input hidden type="number" readonly value="0" name="id" id="id-category-input">
                <label for="name-category">Name : <span class="required">*</span> </label>
                <input type="text" required  class="form-control @error('name') is-invalid @enderror"  id="name-category-input" name="name"  placeholder="Name" value="{{ old('name') }}">
                <div class="invalid-feedback">
                    @error('name')
                    {{ $message }}
                    @enderror
                  </div>
            </div>

            <div class="form-group col-12">

                @php
                   $subCategories = App\Models\SubCategory::orderBy('id', 'desc')->get();

                @endphp
                <label for="sub-category">Sub Category : <span class="required">*</span> </label>
                <select id="sub-category-input" class="form-control form-select @error('sub_category_ids') is-invalid @enderror select-sub-category" id="sub-category" name="sub_category_ids[]" multiple>
                    {{-- <option value="" selected disabled>Select SubCategory</option> --}}
                    @foreach ($subCategories as $subCategory)
                      <option value="{{ $subCategory->id }}">{{ $subCategory->name }}</option>
                    @endforeach
                  </select>
                  <div class="sub-category-input d-flex  text-secondary ">

                  </div>
                  @error('sub_category_ids')
                  <div class="invalid-feedback">{{ $message }}</div>
                @enderror

                </div>
            </div>

                <div class="col-md-12 text-center">
                    <button type="submit" class="btn btn-fill-out submit" name="submit" value="Submit">Save</button>
                </div>
              </div>
            </form>
        </div>


    </div>

</div>
@endsection

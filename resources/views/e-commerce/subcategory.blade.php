@extends('layouts.master')

@section('main')

{{-- breadcrumbs --}}
<div class="page-header breadcrumb-wrap">
    <div class="container">
        <div class="breadcrumb">
            <a href="{{ route('e-commerce.home') }}" rel="nofollow">Home</a>
            <span></span> SubCategory
        </div>
    </div>
</div>
{{-- categories --}}

<div class="container mb-50 mt-50" id="subcategories">
    <div class="row flex-column-reverse-765">
        @if(Session::has('add-subcategory-success') || Session::has('delete-subcategory-success'))
        <div class="col-md-12 alert alert-primary text-center" role="alert">
         <strong>{{ Session::get('add-subcategory-success') }} {{ Session::get('delete-subcategory-success') }}</strong>
          </div>
            @endif
         <div class="col-md-7  m-auto">
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0">Your SubCategories</h5>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Name</th>
                                    <th>image</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            @php
                         $subcategories=App\Models\SubCategory::orderBy('id', 'desc')->paginate(4);

                        @endphp
                            <tbody>
                                @foreach ($subcategories as $subcategory )

                                <tr>
                                    <td>{{ $subcategory->id }}</td>
                                    <td i>{{ $subcategory->name }}</td>
                                    <td >
                                        <div class="d-flex align-items-center justify-content-center">
                                            <img
                                            style="max-width: 100px;"
                                             class="rounded border " src="{{ asset('assets/imageSubCategory/'.$subcategory->image) }}" alt="" srcset="">
                                        </div>

                                    </td>

                                    <td >
                                        <div class="d-flex align-items-center justify-content-evenly">
                                        <form action=" {{ route('e-commerce.delete_subcategory',['id'=>$subcategory->id])  }}" method="POST" enctype="multipart/form-data">

                                        @csrf
                                        @method('DELETE')
                                            <button
                                            onclick="return confirm('Are you sure you want to delete this Subcategory!');"
                                             title="drop" type="submit" class="btn-small bg-danger trash d-block">
                                                <i class="fi-rs-trash"></i>
                                            </button>
                                        </form>
                                        <form action=" {{ route('e-commerce.edit_subcategory',['id'=>$subcategory->id])  }}" method="GET" enctype="multipart/form-data">

                                        <button title="edit" id="edit-subcategory" type="submit" class="btn-small  bg-warning edit d-block edit-category">
                                            <i class="fi-rs-edit"></i>
                                        </button>
                                        </form>
                                    </div>
                                    </td>

                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="pagination d-flex align-items-center justify-content-center">
                        {{ $subcategories->links() }}
                    </div>
                </div>
            </div>
        </div>
        {{-- add --}}
        <div class="col-md-5 mb-2  my-4">
            <form  id="form-add-subcategory" method="post" action="{{ route('e-commerce.add_subcategory') }}" enctype="multipart/form-data">
            @csrf
            <div class="row">
            <div class="form-group col-12">
                {{-- <input hidden type="number" readonly value="0" name="id" id="id-category-input"> --}}
                <label for="name-category">Name : <span class="required">*</span> </label>
                <input type="text" required  class="form-control @error('name') is-invalid @enderror"  id="name" name="name"  placeholder="Name" value="{{ old('name') }}">
                <div class="invalid-feedback">
                    @error('name')
                    {{ $message }}
                    @enderror
                  </div>
            </div>

            <div class="form-group col-12">

            <label for="image">Image : <span class="required">*</span> </label>
              <input type="file"   required  class="form-control @error('image') is-invalid @enderror"  id="image" name="image"  >

                 @error('image')
                  <div class="invalid-feedback">{{ $message }}</div>
                @enderror

                </div>
            </div>

                <div class="col-md-12 text-center">
                    <button type="submit" class="btn btn-fill-out submit" name="submit" value="Submit">Save</button>
                </div>
            </form>

              </div>
        </div>
    </div>

@endsection

@extends('layouts.master')

@section('main')
{{-- breadcrumbs --}}
<div class="page-header breadcrumb-wrap">
    <div class="container">
        <div class="breadcrumb">
            <a href="{{ route('e-commerce.home') }}" rel="nofollow">Home</a>
            <span></span> Product

        </div>
    </div>
</div>
{{-- product --}}
<div class="container mt-15 mb-15">
    <div class="" id="products"  aria-labelledby="products-tab">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Your Products</h5>
                <a href="{{ route('e-commerce.create_product') }}"><i class="fi-rs-add"></i></a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>id</th>
                                <th>name</th>
                                <th>sizes</th>
                                <th>colors</th>
                                <th>category</th>
                                <th>sub_category</th>
                                <th>brand</th>
                                <th>image</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($products as  $product)

                            <tr>
                                <td>#{{ $product->id }}</td>
                                <td>{{ $product->name }}</td>
                                <td>
                                   @foreach ($product->sizes as $size )
                                    {{ $size->size }}/
                                   @endforeach
                                </td>
                                <td>
                                @foreach ($product->sizes as $size )
                                @foreach ($size->colors as $color )
                                {{ $color->name }}/
                               @endforeach
                               @endforeach
                                </td>
                                <td>{{ $product->category->name }}</td>
                                <td>{{ $product->sub_category->name }}</td>
                                <td>{{ $product->brande->name }}</td>
                                <td class="d-flex justify-content-center">

                                    <img
                                    style="max-width: 80px;border-radius: 50px"
                                     src="{{ asset('assets/imageProducts/'.$product->images->first()->image) }}" alt="" srcset="">
                                </td>
                                <td>
                                    <a href="#" class="btn-small d-block">View</a>
                                </td>
                            </tr>
                            @endforeach


                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

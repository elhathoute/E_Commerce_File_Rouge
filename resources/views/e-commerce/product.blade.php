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
                                    <div class="d-flex">
                                   @foreach ($product->sizes as $size )
                                   <div class="relative">
                                    <svg width="40px" height="40px" viewBox="-8.64 -8.64 41.28 41.28" xmlns="http://www.w3.org/2000/svg" fill="#000000"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <title></title> <g id="Complete"> <g id="Circle"> <circle cx="12" cy="12" data-name="Circle" fill="none" id="Circle-2" r="10" stroke="#908e8e" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"></circle> </g> </g> </g></svg>

                                    <span
                                   style=" position: absolute;
                                   top: 10px;
                                   left: 12px;
                                   font-weight: bold;"
                                    >  {{ $size->size }}</span>
                                   </div>

                                   @endforeach
                                </div>
                                </td>
                                @php
                                    $colors= DB::table('color_size')
                                    ->select(DB::raw('DISTINCT colors.name ,SUM(quantity) as totalQuantity'))
                                    ->join('colors','color_size.color_id','=','colors.id')
                                    ->where('product_id','=',$product->id)
                                    ->groupBy('color_id','colors.name')
                                    ->get();
                                @endphp
                                <td >
<div class="d-flex">
                                @foreach ($colors as $color )
                                <ul class="list-filter color-filter position-relative d-flex justify-content-center">


                                    <li

                                    class="active"><a class="bg-light" href="#" >
                                        <span class="product-color-{{ $color->name }}"></span></a></li>
                                    <li
                                    style="
                                     position: absolute;
                                    left: 3px;
                                    color: darkblue;
                                    top: 7px;
                                    font-size: 11px;
                                    >
                                    <span class="fw-bold">
                                    @if($color->totalQuantity<10)
                                    00{{ $color->totalQuantity }}
                                    @elseif($color->totalQuantity>=10 && $color->totalQuantity<100)
                                    0{{ $color->totalQuantity }}
                                    @else
                                    {{ $color->totalQuantity }}

                                    @endif
                                </span></li>

                                </ul>
                               @endforeach
                            </div>
                                </td>
                                <td>{{ $product->category->name }}</td>
                                <td>{{ $product->sub_category->name }}</td>
                                <td>{{ $product->brande->name }}</td>
                                <td class="d-flex justify-content-center">

                                    <img class="rotate-img-product"
                                    style="max-width: 80px;border-radius: 50px"
                                     src="{{ asset('assets/imageProducts/'.$product->images->first()->image) }}" alt="" srcset="">
                                </td>
                                <td>
                                    <a href="{{ route('e-commerce.edit_product',['id'=>$product->id]) }}" class="btn-small d-block">
                                        <i class="fi-rs-edit"></i>
                                    </a>
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

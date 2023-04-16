@extends('layouts.master')
@section('main')
{{-- breadcrumbs --}}
<div class="page-header breadcrumb-wrap">
    <div class="container">
        <div class="breadcrumb">
            <a href="{{ route('e-commerce.home') }}" rel="nofollow">Home</a>
            <span></span> Shop
        </div>
    </div>
</div>
{{-- shop --}}
<section class="mt-50 mb-50">
    <div class="container">
        <div class="row">
            <div class="col-lg-9">
                <div class="shop-product-fillter">
                    <div class="totall-product">
                        <p> We found <strong class="text-brand">{{ count($products) }}</strong> items for you!</p>
                    </div>

                </div>
                <div class="row product-grid-4">
                    @foreach ($products as $product )
                    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-6 col-6">
                        <div class="product-cart-wrap mb-30">
                            <div class="product-img-action-wrap">

                                <div class="product-img product-img-zoom">

                                    @foreach ($product->images as $image)

                                    <div>
                                        <img class="default" src="{{ asset('assets/imageProducts/'.$image->image) }} " alt="">

                                        {{-- <img class="hover-img" src="assets/imgs/shop/product-1-2.jpg" alt=""> --}}
                                    </div>
                                    @endforeach




                                </div>
                                <div class="product-action-1">
                                    <a href="{{route('e-commerce.view_product',['id'=>$product->id]) }}" aria-label="Quick view" class="action-btn hover-up"><i class="fi-rs-eye"></i></a>

                                    <a aria-label="Add To Wishlist" class="action-btn hover-up" href="{{ route('e-commerce.add_to_wishlist',['id'=>$product->id])  }}"><i class="fi-rs-heart"></i></a>
                                </div>
                                <div class="product-badges product-badges-position product-badges-mrg">
                                    <span class="hot">{{ $product->type }}</span>
                                </div>
                            </div>
                            <div class="product-content-wrap">
                                <div class="product-category d-flex justify-content-between">
                                    <a href="{{route('e-commerce.view_product',['id'=>$product->id]) }}">{{ $product->category->name }}</a>
                                    <a href="{{route('e-commerce.view_product',['id'=>$product->id]) }}">{{ $product->sub_category->name}}</a>
                                </div>
                                <div>
                                    <h3><a href="{{route('e-commerce.view_product',['id'=>$product->id]) }}">{{ $product->name }}</a></h3>

                                   <div class="d-flex justify-content-between text-dark fw-bold">
                                    <span class="badge bg-dark">
                                        @foreach ($product->sizes as $key=>$size )
                                        {{$size->size }}  @if($key != count($product->sizes) - 1)   / @endif


                                        @endforeach
                                        </span>

                                   </div>
                                    <div class="d-flex justify-content-between">
                                        @php
                                            $price_old= $product->sizes->first()->colors->where('pivot.product_id',$product->id)->first()->pivot->price;
                                            $offer= $product->sizes->first()->colors->where('pivot.product_id',$product->id)->first()->pivot->offer;
                                        @endphp
                                      <span class="text-decoration-line-through"> {{$price_old }}DH</span>
                                      <span class="text-secondary">-{{$offer}}%</span>
                                       <span class="fw-bold"> {{ ($price_old)-($price_old*(($offer)/100))}}DH</span>
                                    </div>
                                </div>

                                <div class="rating-result" title="90%">
                                    <span>
                                        {{-- <span>{{ $product->offer }}%</span> --}}
                                    </span>
                                </div>
                                {{-- <div class="product-price">
                                    <span>
                                        {{ ($product->price)-($product->price*$product->offer/(100)) }}DH
                                    </span>
                                    <span class="old-price">{{ $product->price }}DH</span>
                                </div> --}}
                                <div class="product-action-1 show">
                                    <a aria-label="Add To Cart" class="action-btn hover-up" href="{{ route('e-commerce.add_to_panier',['id'=>$product->id]) }}"><i class="fi-rs-shopping-bag-add"></i></a>
                                </div>
                            </div>
                        </div>

                    </div>
                    @endforeach
                    <div class="pagination">
                        {{ $products->links() }}
                    </div>

                </div>

            </div>
            <div class="col-lg-3 primary-sidebar sticky-sidebar">
                <div class="row">
                    <div class="col-lg-12 col-mg-6"></div>
                    <div class="col-lg-12 col-mg-6"></div>
                </div>
                <div class="widget-category mb-30">
                    <h5 class="section-title style-1 mb-30 wow fadeIn animated">Category</h5>


                    <ul class="categories">
                    <li><a href="{{ route('e-commerce.shop') }}">All</a></li>
                    </ul>
                    @foreach ($categories as $category )

                    <ul class="categories">
                        <li><a href="{{ route('e-commerce.shop',['parametre'=> $category->name ]) }}">{{ $category->name }}</a></li>

                    </ul>
                    @endforeach

                </div>



            </div>
        </div>
    </div>
</section>

@endsection

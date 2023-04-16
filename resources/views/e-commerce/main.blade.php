@extends('layouts.master')
@section('main')
@php
// men
    $products_men=App\Models\Product::select('products.*','categories.name as category','sub_categories.name as subcategory')
    ->join('categories', 'products.category_id', '=', 'categories.id')
    ->join('sub_categories', 'products.sub_category_id', '=', 'sub_categories.id')
    ->where('categories.name', '=', 'men')
    ->with('images','sizes')
    ->get();
    // women
    $products_women=App\Models\Product::select('products.*','categories.name as category','sub_categories.name as subcategory')
    ->join('categories', 'products.category_id', '=', 'categories.id')
    ->join('sub_categories', 'products.sub_category_id', '=', 'sub_categories.id')
    ->where('categories.name', '=', 'women')
    ->with('images','sizes')
    ->get();
    // children
    $products_children=App\Models\Product::select('products.*','categories.name as category','sub_categories.name as subcategory')
    ->join('categories', 'products.category_id', '=', 'categories.id')
    ->join('sub_categories', 'products.sub_category_id', '=', 'sub_categories.id')
    ->where('categories.name', '=', 'children')
    ->with('images','sizes')
    ->get();
// get all subCategories
$subCategories=App\Models\SubCategory::all();

    @endphp


{{-- section main --}}
    <section class="home-slider position-relative pt-50">
        <div class="hero-slider-1 dot-style-1 dot-style-1-position-1">
             {{-- nouveauté --}}
             <div class="single-hero-slider single-animation-wrap">
                <div class="container">
                    <div class="row align-items-center slider-animated-1">
                        <div class="col-lg-5 col-md-6">
                            <div class="hero-slider-content-2">
                                <h2 class="animated fw-900">Nouveautés</h2>
                                <a class="animated btn btn-brush btn-brush-2" href="{{ route('e-commerce.shop') }}"> Discover Now </a>
                            </div>
                        </div>
                        <div class="col-lg-7 col-md-6">
                            <div class="single-slider-img single-slider-img-1">

                                <video class="mobile-video" autoplay="true" playsinline="" preload="auto" muted="true" loop="" width="100%">
                                    <source src="https://files-bs.b-cdn.net/video/2023/0317/march_hero_mobile_767x928720p.mp4" type="video/mp4">
                                    Sorry, your browser doesn't support embedded videos.
                                </video>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
{{-- homme --}}
            <div class="single-hero-slider single-animation-wrap">
                <div class="container">
                    <div class="row align-items-center slider-animated-1">
                        <div class="col-lg-5 col-md-6">
                            <div class="hero-slider-content-2">
                                <h2 class="animated fw-900">Homme</h2>
                                <a class="animated btn btn-brush btn-brush-3" href="{{ route('e-commerce.shop') }}"> Shop Now </a>
                            </div>
                        </div>
                        <div class="col-lg-7 col-md-6">
                            <div class="single-slider-img single-slider-img-1">
                                <img class="animated slider-1-1" src="https://www.drmartens.com/medias/mens-loafers.jpg?context=bWFzdGVyfHJvb3R8MTQ5ODR8aW1hZ2UvanBlZ3xoNTcvaDlmLzEwMTcwMTU1NTY1MDg2LmpwZ3wwMTdmNjUwODI4ZWFjMjMzNDY0M2QzZDc4OTU4NTAwYzY0YjJlNGI3ZGI1Y2VkNGY1YWIwMmJhYTZkZWMyMzJi" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- women --}}
            <div class="single-hero-slider single-animation-wrap">
                <div class="container">
                    <div class="row align-items-center slider-animated-1">
                        <div class="col-lg-5 col-md-6">
                            <div class="hero-slider-content-2">
                                <h2 class="animated fw-900">Women</h2>
                                <a class="animated btn btn-brush btn-brush-3" href="{{ route('e-commerce.shop') }}"> Shop Now </a>
                            </div>
                        </div>
                        <div class="col-lg-7 col-md-6">
                            <div class="single-slider-img single-slider-img-1">
                                <img class="animated slider-1-1" src="https://www.mollini.com.au/media/wysiwyg/Trending-Biscoti-D_1.png" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- children --}}
            <div class="single-hero-slider single-animation-wrap">
                <div class="container">
                    <div class="row align-items-center slider-animated-1">
                        <div class="col-lg-5 col-md-6">
                            <div class="hero-slider-content-2">
                                <h2 class="animated fw-900">Children</h2>
                                <a class="animated btn btn-brush btn-brush-3" href="{{ route('e-commerce.shop') }}"> Shop Now </a>
                            </div>
                        </div>
                        <div class="col-lg-7 col-md-6">
                            <div class="single-slider-img single-slider-img-1">
                                <img class="animated slider-1-1" src="https://thumbs.dreamstime.com/b/kids-shoes-store-supermarket-choosing-184953573.jpg" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="slider-arrow hero-slider-1-arrow"></div>
    </section>
    <section class="featured section-padding position-relative">
        <div class="container">
            <div class="row">
                <div class="col-md-4 mb-1">
                    <div class="banner-features wow fadeIn animated hover-up">
                        <img src="assets/imgs/theme/icons/feature-1.png" alt="">
                        <h4 class="bg-1">Free Shipping</h4>
                    </div>
                </div>
                <div class="col-md-4 mb-1">
                    <div class="banner-features wow fadeIn animated hover-up">
                        <img src="assets/imgs/theme/icons/feature-2.png" alt="">
                        <h4 class="bg-3">Online Order</h4>
                    </div>
                </div>
              
             
             
                <div class="col-md-4 mb-1">
                    <div class="banner-features wow fadeIn animated hover-up">
                        <img src="assets/imgs/theme/icons/feature-6.png" alt="">
                        <h4 class="bg-6">24/7 Support</h4>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="product-tabs section-padding position-relative wow fadeIn animated">
        <div class="bg-square"></div>
        <div class="container">
            <div class="tab-header">
                <ul class="nav nav-tabs " id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="nav-tab-one" data-bs-toggle="tab" data-bs-target="#tab-one" type="button" role="tab" aria-controls="tab-one" aria-selected="true">Man</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="nav-tab-two" data-bs-toggle="tab" data-bs-target="#tab-two" type="button" role="tab" aria-controls="tab-two" aria-selected="false">Women</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="nav-tab-three" data-bs-toggle="tab" data-bs-target="#tab-three" type="button" role="tab" aria-controls="tab-three" aria-selected="false">Children</button>
                    </li>
                </ul>
                {{-- <a href="#" class="view-more d-none d-md-flex">View More<i class="fi-rs-angle-double-small-right"></i></a> --}}
            </div>
            <!--End nav-tabs-->
            <div class="tab-content wow fadeIn animated" id="myTabContent">
                <div class="tab-pane fade show active" id="tab-one" role="tabpanel" aria-labelledby="tab-one">
                    <div class="row product-grid-4">
                        @foreach ($products_men as $men )
                        <div class="col-lg-3 col-md-4 col-sm-6 col-xs-6 col-6">
                            <div class="product-cart-wrap mb-30">
                                <div class="product-img-action-wrap">

                                    <div class="product-img product-img-zoom">

                                        @foreach ($men->images as $image)

                                        <div>
                                            <img class="default" src="{{ asset('assets/imageProducts/'.$image->image) }} " alt="">

                                            {{-- <img class="hover-img" src="assets/imgs/shop/product-1-2.jpg" alt=""> --}}
                                        </div>
                                        @endforeach




                                    </div>
                                    <div class="product-action-1">
                                        <a href="{{route('e-commerce.view_product',['id'=>$men->id]) }}" aria-label="Quick view" class="action-btn hover-up"><i class="fi-rs-eye"></i></a>

                                        <a aria-label="Add To Wishlist" class="action-btn hover-up" href="{{ route('e-commerce.add_to_wishlist',['id'=>$men->id])  }}"><i class="fi-rs-heart"></i></a>
                                    </div>
                                    <div class="product-badges product-badges-position product-badges-mrg">
                                        <span class="hot">{{ $men->type }}</span>
                                    </div>
                                </div>
                                <div class="product-content-wrap">
                                    <div class="product-category d-flex justify-content-between">
                                        <a href="{{route('e-commerce.view_product',['id'=>$men->id]) }}">{{ $men->category }}</a>
                                        <a href="{{route('e-commerce.view_product',['id'=>$men->id]) }}">{{ $men->subcategory }}</a>
                                    </div>
                                    <div>
                                        <h3><a href="{{route('e-commerce.view_product',['id'=>$men->id]) }}">{{ $men->name }}</a></h3>

                                       <div class="d-flex justify-content-between text-dark fw-bold">
                                        <span class="badge bg-dark">
                                            @foreach ($men->sizes as $key=>$size )
                                            {{$size->size }}  @if($key != count($men->sizes) - 1)   / @endif


                                            @endforeach
                                            </span>

                                       </div>
                                        <div class="d-flex justify-content-between">
                                            @php
                                                $price_old= $men->sizes->first()->colors->where('pivot.product_id',$men->id)->first()->pivot->price;
                                                $offer= $men->sizes->first()->colors->where('pivot.product_id',$men->id)->first()->pivot->offer;
                                            @endphp
                                          <span class="text-decoration-line-through"> {{$price_old }}DH</span>
                                          <span class="text-secondary">-{{$offer}}%</span>
                                           <span class="fw-bold"> {{ ($price_old)-($price_old*(($offer)/100))}}DH</span>
                                        </div>
                                    </div>

                                    <div class="rating-result" title="90%">
                                        <span>
                                            {{-- <span>{{ $men->offer }}%</span> --}}
                                        </span>
                                    </div>
                                    {{-- <div class="product-price">
                                        <span>
                                            {{ ($men->price)-($men->price*$men->offer/(100)) }}DH
                                        </span>
                                        <span class="old-price">{{ $men->price }}DH</span>
                                    </div> --}}
                                    <div class="product-action-1 show">
                                        <a aria-label="Add To Cart" class="action-btn hover-up" href="{{ route('e-commerce.add_to_panier',['id'=>$men->id]) }}"><i class="fi-rs-shopping-bag-add"></i></a>
                                    </div>
                                </div>
                            </div>

                        </div>
                        @endforeach


                    </div>
                    <!--End product-grid-4-->
                </div>
                <!--En tab one (Featured)-->
                <div class="tab-pane fade" id="tab-two" role="tabpanel" aria-labelledby="tab-two">
                    <div class="row product-grid-4">
                        @foreach ($products_women as $women )


                        <div class="col-lg-3 col-md-4 col-sm-6 col-xs-6 col-6">
                            <div class="product-cart-wrap mb-30">
                                <div class="product-img-action-wrap">

                                    <div class="product-img product-img-zoom">

                                        @foreach ($women->images as $image)

                                        <div>
                                            <img class="default" src="{{ asset('assets/imageProducts/'.$image->image) }} " alt="">

                                            {{-- <img class="hover-img" src="assets/imgs/shop/product-1-2.jpg" alt=""> --}}
                                        </div>
                                        @endforeach




                                    </div>
                                    <div class="product-action-1">
                                        <a href="{{route('e-commerce.view_product',['id'=>$women->id]) }}" aria-label="Quick view" class="action-btn hover-up"><i class="fi-rs-eye"></i></a>

                                        <a aria-label="Add To Wishlist" class="action-btn hover-up" href="{{ route('e-commerce.add_to_wishlist',['id'=>$women->id])  }}"><i class="fi-rs-heart"></i></a>
                                    </div>
                                    <div class="product-badges product-badges-position product-badges-mrg">
                                        <span class="hot">{{ $women->type }}</span>
                                    </div>
                                </div>
                                <div class="product-content-wrap">
                                    <div class="product-category d-flex justify-content-between">
                                        <a href="{{route('e-commerce.view_product',['id'=>$women->id]) }}">{{ $women->category }}</a>
                                        <a href="{{route('e-commerce.view_product',['id'=>$women->id]) }}">{{ $women->subcategory }}</a>
                                    </div>
                                    <div>
                                        <h3><a href="{{route('e-commerce.view_product',['id'=>$women->id]) }}">{{ $women->name }}</a></h3>

                                       <div class="d-flex justify-content-between text-dark fw-bold">
                                        <span class="badge bg-dark">
                                            @foreach ($women->sizes as $key=>$size )
                                            {{$size->size }}  @if($key != count($women->sizes) - 1)   / @endif


                                            @endforeach
                                            </span>

                                       </div>
                                        <div class="d-flex justify-content-between">
                                            @php
                                                $price_old= $women->sizes->first()->colors->where('pivot.product_id',$women->id)->first()->pivot->price;
                                                $offer= $women->sizes->first()->colors->where('pivot.product_id',$women->id)->first()->pivot->offer;
                                            @endphp
                                          <span class="text-decoration-line-through"> {{$price_old }}DH</span>
                                          <span class="text-secondary">-{{$offer}}%</span>
                                           <span class="fw-bold"> {{ ($price_old)-($price_old*(($offer)/100))}}DH</span>
                                        </div>
                                    </div>

                                    <div class="rating-result" title="90%">
                                        <span>
                                            {{-- <span>{{ $men->offer }}%</span> --}}
                                        </span>
                                    </div>
                                    {{-- <div class="product-price">
                                        <span>
                                            {{ ($men->price)-($men->price*$men->offer/(100)) }}DH
                                        </span>
                                        <span class="old-price">{{ $men->price }}DH</span>
                                    </div> --}}
                                    <div class="product-action-1 show">
                                        <a aria-label="Add To Cart" class="action-btn hover-up" href="{{ route('e-commerce.add_to_panier',['id'=>$men->id]) }}"><i class="fi-rs-shopping-bag-add"></i></a>
                                    </div>
                                </div>
                            </div>

                        </div>

                        @endforeach

                    </div>
                    <!--End product-grid-4-->
                </div>
                <!--En tab two (Popular)-->
                <div class="tab-pane fade" id="tab-three" role="tabpanel" aria-labelledby="tab-three">
                    <div class="row product-grid-4">
                        @foreach ($products_children as $children )

                        <div class="col-lg-3 col-md-4 col-sm-6 col-xs-6 col-6">
                            <div class="product-cart-wrap mb-30">
                                <div class="product-img-action-wrap">

                                    <div class="product-img product-img-zoom">

                                        @foreach ($children->images as $image)

                                        <div>
                                            <img class="default" src="{{ asset('assets/imageProducts/'.$image->image) }} " alt="photo_product">

                                            {{-- <img class="hover-img" src="assets/imgs/shop/product-1-2.jpg" alt=""> --}}
                                        </div>
                                        @endforeach




                                    </div>
                                    <div class="product-action-1">
                                        <a href="{{route('e-commerce.view_product',['id'=>$children->id]) }}" aria-label="Quick view" class="action-btn hover-up"><i class="fi-rs-eye"></i></a>

                                        <a aria-label="Add To Wishlist" class="action-btn hover-up" href="{{ route('e-commerce.add_to_wishlist',['id'=>$children->id])  }}"><i class="fi-rs-heart"></i></a>
                                    </div>
                                    <div class="product-badges product-badges-position product-badges-mrg">
                                        <span class="hot">{{ $children->type }}</span>
                                    </div>
                                </div>
                                <div class="product-content-wrap">
                                    <div class="product-category d-flex justify-content-between">
                                        <a href="{{route('e-commerce.view_product',['id'=>$children->id]) }}">{{ $children->category }}</a>
                                        <a href="{{route('e-commerce.view_product',['id'=>$children->id]) }}">{{ $children->subcategory }}</a>
                                    </div>
                                    <div>
                                        <h3><a href="{{route('e-commerce.view_product',['id'=>$children->id]) }}">{{ $children->name }}</a></h3>

                                       <div class="d-flex justify-content-between text-dark fw-bold">
                                        <span class="badge bg-dark">
                                            @foreach ($children->sizes as $key=>$size )
                                            {{$size->size }}  @if($key != count($children->sizes) - 1)   / @endif


                                            @endforeach
                                            </span>

                                       </div>
                                        <div class="d-flex justify-content-between">
                                            @php
                                                $price_old= $children->sizes->first()->colors->where('pivot.product_id',$children->id)->first()->pivot->price;
                                                $offer= $children->sizes->first()->colors->where('pivot.product_id',$children->id)->first()->pivot->offer;
                                            @endphp
                                          <span class="text-decoration-line-through"> {{$price_old }}DH</span>
                                          <span class="text-secondary">-{{$offer}}%</span>
                                           <span class="fw-bold"> {{ ($price_old)-($price_old*(($offer)/100))}}DH</span>
                                        </div>
                                    </div>

                                    <div class="rating-result" title="90%">
                                        <span>
                                            {{-- <span>{{ $men->offer }}%</span> --}}
                                        </span>
                                    </div>
                                    {{-- <div class="product-price">
                                        <span>
                                            {{ ($men->price)-($men->price*$men->offer/(100)) }}DH
                                        </span>
                                        <span class="old-price">{{ $men->price }}DH</span>
                                    </div> --}}
                                    <div class="product-action-1 show">
                                        <a aria-label="Add To Cart" class="action-btn hover-up" href="{{ route('e-commerce.add_to_panier',['id'=>$men->id]) }}"><i class="fi-rs-shopping-bag-add"></i></a>
                                    </div>
                                </div>
                            </div>

                        </div>
                        @endforeach

                    </div>
                    <!--End product-grid-4-->
                </div>
                <!--En tab three (New added)-->
            </div>
            <!--End tab-content-->
        </div>
    </section>

    <section class="popular-categories section-padding mt-15 mb-25">
        <div class="container wow fadeIn animated">
            <h3 class="section-title mb-20"><span>Popular</span> SubCategories</h3>
            <div class="carausel-6-columns-cover position-relative">
                <div class="slider-arrow slider-arrow-2 carausel-6-columns-arrow" id="carausel-6-columns-arrows"></div>
                <div class="carausel-6-columns" id="carausel-6-columns">
                    @foreach ($subCategories as $subCategory )

                    <div class="card-1">
                        <figure class=" img-hover-scale overflow-hidden">
                            <a href="{{ route('e-commerce.shop',['parametre'=>$subCategory->name]) }}"><img src="{{ asset('assets/imageSubCategory/'.$subCategory->image) }}" alt=""></a>
                        </figure>
                        <h5><a href="{{ route('e-commerce.shop',['parametre'=>$subCategory->name]) }}">{{ $subCategory->name}}</a></h5>
                    </div>
                    @endforeach


                </div>
            </div>
        </div>
    </section>
    <section class="banners mb-15">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="banner-img wow fadeIn animated">
                        <img class="mb-4 rounded" src="{{  asset('assets/imgs/banner/menu-banner-8.png')  }}" alt="">
                        <div class="banner-text">
                            {{-- <span>Smart Offer</span>
                            <h4>Save 20% on <br>Woman Bag</h4> --}}
                            <a href="{{ route('e-commerce.shop') }}">Shop Now <i class="fi-rs-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="banner-img wow fadeIn animated">
                        <img class="mb-4 rounded" src="{{ asset('assets/imgs/banner/menu-banner-2.jpg') }}" alt="">
                        <div class="banner-text">
                            {{-- <span>Sale off</span>
                            <h4>Great Summer <br>Collection</h4> --}}
                            <a href="{{ route('e-commerce.shop') }}">Shop Now <i class="fi-rs-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 d-md-none d-lg-flex">
                    <div class="banner-img wow fadeIn animated  mb-sm-0">
                        <img class="mb-4 rounded" src="{{ asset('assets/imgs/banner/menu-banner-6.jpg') }}" alt="">
                        <div class="banner-text">
                            {{-- <span>New Arrivals</span>
                            <h4>Shop Today’s <br>Deals & Offers</h4> --}}
                            <a href="{{ route('e-commerce.shop') }}">Shop Now <i class="fi-rs-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section class="section-padding">
        <div class="container">
            <h3 class="section-title mb-20 wow fadeIn animated"><span>Featured</span> Brands</h3>
            <div class="carausel-6-columns-cover position-relative wow fadeIn animated">
                <div class="slider-arrow slider-arrow-2 carausel-6-columns-arrow" id="carausel-6-columns-3-arrows"></div>
                <div class="carausel-6-columns text-center" id="carausel-6-columns-3">
                    @php
                        $brandes=App\Models\Brande::all();
                    @endphp
                    @foreach ($brandes as $brande )

                    <div class="brand-logo">
                        <img class="img-grey-hover p-2" src="{{ asset('assets/imageBrande/'.$brande->image) }}" alt="brande">
                    </div>
                    @endforeach


                </div>
            </div>
        </div>
    </section>

@endsection


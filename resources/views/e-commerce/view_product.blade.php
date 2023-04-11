@extends('layouts.master')
@section('main')
{{-- breadcrumbs --}}






<div class="page-header breadcrumb-wrap">
    <div class="container">
        <div class="breadcrumb">
            <a href="index.html" rel="nofollow">Home</a>
            <span></span> Product
            <span></span> {{ $product->name }}
        </div>
    </div>
</div>
{{-- view product --}}
<section class="pt-50 pb-50 ">
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="product-detail accordion-detail">
                <div class="row mb-50">
                    <div class="col-md-6 col-sm-12 col-xs-12">
                        <div class="detail-gallery">
                            <span class="zoom-icon"><i class="fi-rs-search"></i></span>
                            <!-- MAIN SLIDES -->
                            <div class="product-image-slider">
                                <figure class="border-radius-10">
                                    <img src="{{ asset('assets/imgs/shop/product-16-1.jpg') }}" alt="product image">
                                </figure>
                                <figure class="border-radius-10">
                                    <img src="{{ asset('assets/imgs/shop/product-16-2.jpg') }}" alt="product image">
                                </figure>
                                <figure class="border-radius-10">
                                    <img src="{{ asset('assets/imgs/shop/product-16-3.jpg') }}" alt="product image">
                                </figure>
                                {{-- <figure class="border-radius-10">
                                    <img src="{{ asset('assets/imgs/shop/product-16-7.jpg') }}" alt="product image">
                                </figure>
                                <figure class="border-radius-10">
                                    <img src="{{ asset('assets/imgs/shop/product-16-7.jpg') }}" alt="product image">
                                </figure>
                                <figure class="border-radius-10">
                                    <img src="{{ asset('assets/imgs/shop/product-16-7.jpg') }}" alt="product image">
                                </figure>
                                <figure class="border-radius-10">
                                    <img src="{{ asset('assets/imgs/shop/product-16-7.jpg') }}" alt="product image">
                                </figure> --}}
                            </div>
                            <!-- THUMBNAILS -->
                            <div class="slider-nav-thumbnails pl-15 pr-15">
                                <div><img src="{{ asset('assets/imgs/shop/product-16-1.jpg') }}" alt="product image"></div>
                                <div><img src="{{ asset('assets/imgs/shop/product-16-2.jpg') }}" alt="product image"></div>
                                <div><img src="{{ asset('assets/imgs/shop/product-16-3.jpg') }}" alt="product image"></div>
                                {{-- <div><img src="{{ asset('assets/imgs/shop/product-16-7.jpg') }}" alt="product image"></div>
                                <div><img src="{{ asset('assets/imgs/shop/product-16-7.jpg') }}" alt="product image"></div>
                                <div><img src="{{ asset('assets/imgs/shop/product-16-7.jpg') }}" alt="product image"></div>
                                <div><img src="{{ asset('assets/imgs/shop/product-16-7.jpg') }}" alt="product image"></div> --}}
                            </div>
                        </div>
                        <!-- End Gallery -->
                        <div class="social-icons single-share">
                            <ul class="text-grey-5 d-inline-block">
                                <li><strong class="mr-10">Share this:</strong></li>
                                <li class="social-facebook"><a href="#"><img src="assets/imgs/theme/icons/icon-facebook.svg" alt=""></a></li>
                                <li class="social-twitter"> <a href="#"><img src="assets/imgs/theme/icons/icon-twitter.svg" alt=""></a></li>
                                <li class="social-instagram"><a href="#"><img src="assets/imgs/theme/icons/icon-instagram.svg" alt=""></a></li>
                                <li class="social-linkedin"><a href="#"><img src="assets/imgs/theme/icons/icon-pinterest.svg" alt=""></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-12 col-xs-12">
                        <div class="detail-info">
                            <h2 class="title-detail">{{ $product->name }}</h2>
                            <div class="product-detail-rating">
                                <div class="pro-details-brand">
                                    <span> Brand: <a href="#">Nike</a></span>
                                </div>
                                <div class="product-rate-cover text-end">
                                    <div class="product-rate d-inline-block">
                                        <div class="product-rating" style="width:90%">
                                        </div>
                                    </div>
                                    <span class="font-small ml-5 text-muted">
                                        ({{ $product->reviews->count() }})

                                    </span>
                                </div>
                            </div>
                            <div class="clearfix product-price-cover">
                                <div class="product-price primary-color float-left">
                                    <ins><span class="text-brand">{{ ($product->price)-($product->price*$product->offer/(100)) }}DH</span></ins>
                                    <ins><span class="old-price font-md ml-15">{{ $product->price }}DH</span></ins>
                                    <span class="save-price  font-md color3 ml-15">{{ $product->offer }}% Off</span>
                                </div>
                            </div>
                            <div class="bt-1 border-color-1 mt-15 mb-15"></div>
                            <div class="short-desc mb-30">
                                <span> Type :</span>
                                <span class="badge bg-danger text-white ">
                                    {{ $product->type }}
                                </span>
                            </div>

                            <div class="attr-detail attr-color mb-15">
                                <strong class="mr-10">Color</strong>
                                <ul class="list-filter color-filter">
                                    <li><a href="#" data-color="Red"><span class="product-color-red"></span></a></li>
                                    <li><a href="#" data-color="Yellow"><span class="product-color-yellow"></span></a></li>
                                    <li class="active"><a href="#" data-color="White"><span class="product-color-white"></span></a></li>
                                    <li><a href="#" data-color="Orange"><span class="product-color-orange"></span></a></li>
                                    <li><a href="#" data-color="Cyan"><span class="product-color-cyan"></span></a></li>
                                    <li><a href="#" data-color="Green"><span class="product-color-green"></span></a></li>
                                    <li><a href="#" data-color="Purple"><span class="product-color-purple"></span></a></li>
                                </ul>
                            </div>
                            <div class="attr-detail attr-size">
                                <strong class="mr-10">Size</strong>
                                <ul class="list-filter size-filter font-small">
                                    @foreach ($product->sizes as $size )

                                    @php
                                    $qte=DB::table('product_size')
                                    ->select('qte')
                                    ->where('product_id','=',$product->id)
                                    ->where('size_id','=',$size->id)
                                    ->first()
                                    ;
                                     @endphp
                                    <li><a href="#">{{ $size->size}}|<span style="color:rgb(0, 89, 255);">stock:{{ $qte->qte }}</span></a></li>

                                    @endforeach


                                </ul>
                            </div>
                            <div class="bt-1 border-color-1 mt-30 mb-30"></div>
                            <div class="detail-extralink">
                                <div class="detail-qty border radius">
                                    <a href="#" class="qty-down"><i class="fi-rs-angle-small-down"></i></a>
                                    <span class="qty-val">1</span>
                                    <a href="#" class="qty-up"><i class="fi-rs-angle-small-up"></i></a>
                                </div>
                                <div class="product-extra-link2">
                                    <button type="submit" class="button button-add-to-cart">Add to cart</button>
                                    <a aria-label="Add To Wishlist" class="action-btn hover-up" href="wishlist.php"><i class="fi-rs-heart"></i></a>

                                </div>
                            </div>
                            <ul class="product-meta font-xs color-grey mt-50">
                                <li class="mb-5">SKU: <a href="#">FWM15VKT</a></li>
                                <li class="mb-5">Tags: <a href="#" rel="tag">Cloth</a>, <a href="#" rel="tag">Women</a>, <a href="#" rel="tag">Dress</a> </li>
                                <li>Availability:<span class="in-stock text-success ml-5">8 Items In Stock</span></li>
                            </ul>
                        </div>
                        <!-- Detail Info -->
                    </div>
                </div>
                <div class="tab-style3">
                    <ul class="nav nav-tabs text-uppercase">
                        <li class="nav-item">
                            <a class="nav-link active" id="Description-tab" data-bs-toggle="tab" href="#Description">Description</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" id="Reviews-tab" data-bs-toggle="tab" href="#Reviews">Reviews ({{ $product->reviews->count() }})</a>
                        </li>
                    </ul>
                    <div class="tab-content shop_info_tab entry-main-content">
                        <div class="tab-pane fade show active" id="Description">
                            <div class="">
                                <p>
                                    {{ $product->description }}
                                </p>


                            </div>
                        </div>

                        <div class="tab-pane fade" id="Reviews">
                            <!--Comments-->
                            <div class="comments-area">
                                <div class="container">
                                <div class="row ">
                                    <div class="col-md-12 ">
                                        <h4 class="mb-30">Customer Reviews</h4>
                                        @foreach ($product->reviews as $review )

                                        <div class="comment-list">
                                            <div class="single-comment justify-content-between d-flex">
                                                <div class="user justify-content-between d-flex">
                                                    <div class="thumb text-center">
                                                        <img src="assets/imgs/page/avatar-6.jpg" alt="">
                                                        <h6><a href="#">{{  $review->user->name  }}</a></h6>
                                                        {{-- <p class="font-xxs">Since 2012</p> --}}
                                                    </div>
                                                    <div class="desc">
                                                        <div class="product-rate d-inline-block">
                                                            <div class="product-rating" style="width:90%">
                                                            </div>
                                                        </div>
                                                        <p>{{ $review->review }}</p>
                                                        <div class="d-flex justify-content-between">
                                                            <div class="d-flex align-items-center">
                                                                <p class="font-xs mr-30">{{ $review->created_at }} </p>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            @endforeach

                                            <!--single-comment -->
                                        </div>
                                    </div>

                                </div>
                            </div>
                            </div>

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
</section>
@endsection

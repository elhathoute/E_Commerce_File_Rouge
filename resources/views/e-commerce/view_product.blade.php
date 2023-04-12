@extends('layouts.master')
@section('main')
{{-- breadcrumbs --}}






<div class="page-header breadcrumb-wrap">
    <div class="container">
        <div class="breadcrumb">
            <a href="{{ route('e-commerce.home') }}" rel="nofollow">Home</a>
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
                                @foreach ($product->images as $image )

                                <figure class="border-radius-10">
                                    <img src="{{ asset('assets/imageProducts/'.$image->image) }}" alt="product image">
                                </figure>
                                @endforeach

                                {{-- <figure class="border-radius-10">
                                    <img src="{{ asset('assets/imgs/shop/product-16-2.jpg') }}" alt="product image">
                                </figure>
                                <figure class="border-radius-10">
                                    <img src="{{ asset('assets/imgs/shop/product-16-3.jpg') }}" alt="product image">
                                </figure> --}}
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
                                @foreach ($product->images as $image )

                                <div>

                                    <img src="{{ asset('assets/imageProducts/'.$image->image) }}" alt="product image">
                                </div>
                                @endforeach

                                {{-- <div><img src="{{ asset('assets/imgs/shop/product-16-2.jpg') }}" alt="product image"></div>
                                <div><img src="{{ asset('assets/imgs/shop/product-16-3.jpg') }}" alt="product image"></div> --}}
                                {{-- <div><img src="{{ asset('assets/imgs/shop/product-16-7.jpg') }}" alt="product image"></div>
                                <div><img src="{{ asset('assets/imgs/shop/product-16-7.jpg') }}" alt="product image"></div>
                                <div><img src="{{ asset('assets/imgs/shop/product-16-7.jpg') }}" alt="product image"></div>
                                <div><img src="{{ asset('assets/imgs/shop/product-16-7.jpg') }}" alt="product image"></div> --}}
                            </div>
                        </div>

                    </div>
                    <div class="col-md-6 col-sm-12 col-xs-12">
                        <div class="detail-info">
                            <h2 class="title-detail">{{ $product->name }}</h2>
                            <div class="product-detail-rating">
                                <div class="pro-details-brand">
                                    <span> Brand: <a href="#">
                                        {{ $product->brande->name }}
                                    </a></span>
                                </div>
                                <div>
                                    <span>
                                        {{-- {{ $product->brande->image }} --}}
                                        <img style="max-width: 100px;" src="{{ asset('assets/imageBrande/'.$product->brande->image) }}" alt="brande" srcset="">
                                    </span>
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


                                    @foreach ($product->sizes as $index=>$size )
                                    @foreach ($size->colors as $color)
                                    <li class="{{ $index===0 ? 'active' :'' }}"><a href="#" data-color="{{ $color->name }}"><span class="product-color-{{ $color->name }}"></span></a></li>
                                    {{-- <li><a href="#" data-color="Yellow"><span class="product-color-yellow"></span></a></li>
                                    <li class="active"><a href="#" data-color="White"><span class="product-color-white"></span></a></li>
                                    <li><a href="#" data-color="Orange"><span class="product-color-orange"></span></a></li>
                                    <li><a href="#" data-color="Cyan"><span class="product-color-cyan"></span></a></li>
                                    <li><a href="#" data-color="Green"><span class="product-color-green"></span></a></li>
                                    <li><a href="#" data-color="Purple"><span class="product-color-purple"></span></a></li> --}}
                                    @endforeach
                                    @endforeach
                                </ul>





                            </div>
                            <div class="attr-detail attr-size">
                                <strong class="mr-10">Size</strong>
                                <ul class="list-filter size-filter font-small">




                                  @php


                                    $totalQte = 0; //initialise totalQte

                                    @endphp

                                    @foreach ($product->sizes as $index=>$size )
                                    @foreach ($size->colors as $color)

                                    @php

                                    $totalQte+=$color->pivot->quantity; //calculate the total qte of sizes
                                     @endphp
                                    <li class="{{ $index === 0 ? 'active' : '' }}"><a href="#">{{ $size->size}}|<span style="color:rgb(0, 89, 255);">stock:{{ $color->pivot->quantity }}</span></a></li>

                                    @endforeach
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
                            {{--  --}}
                            <div class="d-flex align-items-center justify-content-start" id="prodcard_freeshipping" >
                                <svg width="40px" height="40px" viewBox="0 -84.4 367.054 367.054" xmlns="http://www.w3.org/2000/svg" fill="#1eff00" stroke="#1eff00" transform="rotate(180)matrix(1, 0, 0, -1, 0, 0)"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"><defs><style>.a{fill:#ffffff;}.b{fill:#211715;}.c{fill:#95cbeb;}</style></defs><path class="a" d="M112.3,85.721c-.03-10.9-.06-21.784-.088-31.982-.092,0-.144,0-.144,0a5.834,5.834,0,0,0-5.851-5.813H46.371a8.963,8.963,0,0,0-3.8.748,10.292,10.292,0,0,0-3.725,3.305c-8.6,11.635-22.68,32.524-30.414,45.643A20.748,20.748,0,0,0,5.1,108.008c-.051,12.664-.232,24.338-.343,40.214A2,2,0,0,0,2.462,150.2c-.007,3.485-.042,7.429-.07,12.5a8,8,0,0,0,7.961,8.04c8.249.038,18.679.1,19.962.1l70.528.177c1.721,0,4.95,0,11.65-.007C112.5,162.6,112.4,124.133,112.3,85.721Z"></path><path class="a" d="M66.131,33.494C60,37.077,54.65,40.288,51.293,42.444A9.2,9.2,0,0,0,47,47.927c14.48,0,46.34,0,59.217,0a5.834,5.834,0,0,1,5.851,5.813h.144c-.044-15.86-.085-30.047-.114-39.973l-3.085-.214a25.62,25.62,0,0,0-3.965,0,20.852,20.852,0,0,0-8.487,2.683C87.74,21.077,75.938,27.762,66.131,33.494Z"></path><path class="a" d="M319.648,171.019c6.927,0,17.7-.018,40.939-.014a4,4,0,0,0,4-4c-.024-40.925-.191-123.86-.216-160.526a3.989,3.989,0,0,0-3.994-3.99c-30.264,0-214.715-.045-244.307-.05a3.986,3.986,0,0,0-3.993,4c.087,30.7.425,149.04.419,164.575,32.34-.025,123.415-.086,133.071-.079"></path><path class="b" d="M283.6,141.688A27.641,27.641,0,0,0,255.41,169.7c0,16.9,11.769,28.541,28.19,28.541,17.053,0,28.189-11.748,28.189-28.541C311.789,154.494,300.207,141.688,283.6,141.688Z"></path><path class="a" d="M283.6,160.583a9.171,9.171,0,0,0-9.353,9.3c0,5.608,3.905,9.47,9.354,9.47,5.658,0,9.353-3.9,9.353-9.47A9.164,9.164,0,0,0,283.6,160.583Z"></path><path class="b" d="M65.3,141.688A27.641,27.641,0,0,0,37.107,169.7c0,16.9,11.769,28.541,28.19,28.541,17.053,0,28.189-11.748,28.189-28.541C93.486,154.494,81.905,141.688,65.3,141.688Z"></path><path class="a" d="M65.3,160.583a9.171,9.171,0,0,0-9.353,9.3c0,5.608,3.905,9.47,9.354,9.47,5.658,0,9.353-3.9,9.353-9.47A9.164,9.164,0,0,0,65.3,160.583Z"></path><path class="c" d="M97.554,63.061a3.767,3.767,0,0,0-3.768-3.748c-11.15-.012-27.447-.067-37.267-.067a9.9,9.9,0,0,0-4.021.667A9.971,9.971,0,0,0,48.992,63.3c-5.839,7.869-15.45,22.295-23.223,34.561a5.84,5.84,0,0,0,6.245,8.819C52.2,102.034,78.373,96.138,94.87,92.154a3.667,3.667,0,0,0,2.806-3.587C97.638,80.715,97.582,69.024,97.554,63.061Z"></path><path class="b" d="M7.161,147.686q.08-11.109.205-22.217.047-4.776.086-9.552.019-2.364.032-4.73a34.121,34.121,0,0,1,.16-5.117c.516-3.238,2.144-6.054,3.8-8.822q2.1-3.5,4.285-6.957,5.136-8.154,10.53-16.144,5.112-7.612,10.413-15.1c1.494-2.1,2.916-4.347,4.6-6.3a6.275,6.275,0,0,1,3.58-2.3,17.867,17.867,0,0,1,3.337-.121h56.763a5.285,5.285,0,0,1,3.174.574,3.471,3.471,0,0,1,1.531,2.839c.1,3.081,4.9,3.1,4.8,0a8.367,8.367,0,0,0-5.34-7.672c-2.124-.826-4.609-.541-6.851-.541H52.059c-2.234,0-4.541-.16-6.767.05-4.043.382-6.626,2.616-8.949,5.774-3.56,4.837-7,9.762-10.393,14.717q-5.688,8.31-11.156,16.77c-3.277,5.081-6.832,10.186-9.543,15.6A23.876,23.876,0,0,0,2.694,109.4q-.026,5.131-.073,10.263c-.065,7.255-.148,14.51-.211,21.765q-.027,3.127-.049,6.255c-.022,3.089,4.778,3.093,4.8,0Z"></path><path class="b" d="M99.954,63.061a6.33,6.33,0,0,0-2.535-4.939,7.628,7.628,0,0,0-4.847-1.21q-5.273-.008-10.544-.02-10.73-.024-21.459-.043c-3.36,0-7.344-.5-10.233,1.562-2.571,1.834-4.324,4.88-6.133,7.425-4.239,5.96-8.311,12.039-12.329,18.15q-3.274,4.98-6.486,10c-1.859,2.91-3.709,5.745-2.6,9.339a8.354,8.354,0,0,0,7,5.844,15.3,15.3,0,0,0,5.144-.7l5.29-1.213c14.811-3.391,29.631-6.746,44.425-10.21q4.65-1.091,9.3-2.2c1.7-.408,3.335-.811,4.548-2.174a6.929,6.929,0,0,0,1.58-4.948q-.051-10.352-.1-20.7-.011-1.978-.019-3.958c-.015-3.087-4.815-3.094-4.8,0q.042,8.89.085,17.779.01,2.379.023,4.758c0,1.015.359,2.779-.165,3.641-.509.837-2.026.881-2.909,1.092q-2.087.5-4.175.994c-13.281,3.142-26.59,6.165-39.894,9.2q-5.084,1.161-10.167,2.325l-4.87,1.117a6.4,6.4,0,0,1-3.531.281,3.486,3.486,0,0,1-2.1-4.435,23.573,23.573,0,0,1,2.424-3.943Q31.331,93.6,32.8,91.34q5.745-8.861,11.707-17.578c1.665-2.423,3.347-4.834,5.069-7.216.749-1.036,1.472-2.114,2.314-3.078a4.7,4.7,0,0,1,3.624-1.794c2.869-.163,5.781-.025,8.654-.02q4.936.007,9.872.02l10.2.023c3.115.006,6.261-.118,9.373.016a1.408,1.408,0,0,1,1.54,1.348C95.306,66.136,100.107,66.154,99.954,63.061Z"></path><path class="b" d="M319.648,173.419q16.588,0,33.176-.014c2.42,0,4.842.014,7.263,0a6.737,6.737,0,0,0,5.346-2.237c2.127-2.524,1.551-6.135,1.548-9.213q-.006-9.068-.018-18.134-.026-21.29-.061-42.578-.034-22.416-.07-44.833-.03-19.4-.053-38.8,0-3.889-.008-7.777c0-3.291.2-6.751-2.985-8.757C361.4-.432,357.8.086,355.059.086l-19.618,0L307.954.076,275.328.07,239.876.062,204.312.055,171.352.048,143.305.042l-20.4,0c-2.168,0-4.337-.02-6.5,0a6.542,6.542,0,0,0-6.723,6.6c-.017,1.506.009,3.014.013,4.521q.037,13.1.074,26.2l.1,34.54q.051,18.345.1,36.69.042,16.557.083,33.114.027,11.67.048,23.341,0,2.986.006,5.972a2.435,2.435,0,0,0,2.4,2.4l24.665-.018,31.7-.022,32.763-.02q13.647-.007,27.294-.015,7.909,0,15.818,0h.834c3.088,0,3.093-4.8,0-4.8q-6.979,0-13.96,0l-26.21.014-32.444.02-32.145.021-25.886.019-2.426,0,2.4,2.4q0-8.046-.025-16.091-.029-14.231-.066-28.46-.045-17.612-.092-35.224l-.1-35.924q-.042-15.5-.087-31L114.492,12.5l-.014-4.764a3.6,3.6,0,0,1,.335-2.3,2.106,2.106,0,0,1,1.884-.6l15.583,0,24.312,0,30.231.006L221,4.858l35.252.008,34,.007,30.281.006,24.1.005c5.164,0,10.331-.057,15.494,0,2.507.029,1.847,3.069,1.848,4.823q0,3.814.008,7.627.009,8.927.022,17.852.029,21,.064,42.01.035,22.077.067,44.154.029,19.281.048,38.563l0,4.026c0,1.075.321,2.774-.137,3.751-.65,1.388-2.717.912-3.919.912H351.09q-10,0-20.01.007-5.716,0-11.432.007c-3.088,0-3.094,4.8,0,4.8Z"></path><path class="b" d="M100.843,173.419q5.84,0,11.68-.007a2.4,2.4,0,1,0,0-4.8q-5.84,0-11.68.007a2.4,2.4,0,1,0,0,4.8Z"></path><path class="b" d="M27.141,145.848q-7.3,0-14.6-.03l-4.294-.01a21.688,21.688,0,0,0-4.754.1,4.4,4.4,0,0,0-3,2.441c-.618,1.318-.432,2.863-.439,4.282Q.034,156.947,0,161.258c-.017,2.756.3,5.318,1.993,7.595a10.4,10.4,0,0,0,6.357,4.079c2.748.513,5.737.226,8.524.24,4.479.024,8.96.067,13.44.07,3.088,0,3.093-4.8,0-4.8-3.209,0-6.417-.032-9.625-.049l-7.522-.04c-2.038-.01-4.084.223-5.867-.94a5.616,5.616,0,0,1-2.483-4.022,69.371,69.371,0,0,1,.021-8.131q.01-1.669.018-3.34c0-.453.049-.935,0-1.386-.119-1.211-.185.653-.4.066a25.363,25.363,0,0,0,3.791.008l4.294.01q7.3.018,14.6.03c3.089,0,3.094-4.8,0-4.8Z"></path><path class="b" d="M99.044,112.4a5.525,5.525,0,0,0-2.986-4.864c-1.739-.874-3.858-.592-5.745-.592H83.964c-1.786,0-3.936-.3-5.637.327A5.552,5.552,0,0,0,77.159,117c1.659,1.14,3.711.913,5.619.913H92a10.656,10.656,0,0,0,3.2-.235,5.541,5.541,0,0,0,3.848-5.28c.045-2.575-3.955-2.575-4,0a1.457,1.457,0,0,1-1.3,1.51,33.536,33.536,0,0,1-4.158,0H80.674c-.891,0-1.734-.179-1.924-1.2a1.483,1.483,0,0,1,.885-1.68,4.725,4.725,0,0,1,1.606-.1H93.088c.992,0,1.931.286,1.956,1.456C95.1,114.968,99.1,114.977,99.044,112.4Z"></path><path class="b" d="M124.163,155.6q7.252,0,14.506.006l27.5.014,32.423.017,29.717.014q9.474,0,18.947.007h1.2c3.088,0,3.093-4.8,0-4.8q-8.538,0-17.076,0l-28.821-.014-32.5-.017-28.549-.015q-8.265,0-16.53-.007h-.815c-3.088,0-3.094,4.8,0,4.8Z"></path><path class="b" d="M124.163,21.742l7.922,0,16.962,0,23.732.006,28.55.008,31.126.008,31.412.009,29.813.008,25.923.007,19.876,0,11.67,0H352.5c3.088,0,3.093-4.8,0-4.8l-9.364,0-18.09,0L300.5,16.989l-29.057-.008-31.319-.008-31.3-.009-29.383-.008-25.182-.007-18.822,0-10.3,0h-.971c-3.088,0-3.094,4.8,0,4.8Z"></path><path class="b" d="M317.148,155.6c11.783,0,23.566.058,35.349.058,3.088,0,3.093-4.8,0-4.8-11.783,0-23.566-.057-35.349-.058-3.089,0-3.094,4.8,0,4.8Z"></path><path class="b" d="M5.643,126.715c1.575,0,3.149.022,4.723.041l2.646.033a2.624,2.624,0,0,1,1.386.172c.757.5.547,1.539.547,2.4v18.329c0,3.089,4.8,3.094,4.8,0V131.192c0-3.131.2-6.534-2.932-8.358-1.782-1.04-3.855-.846-5.838-.87-1.777-.022-3.554-.047-5.332-.049-3.088,0-3.093,4.8,0,4.8Z"></path><path class="b" d="M49.289,48.653c.566-2.157,2.1-3.435,3.922-4.588,1.5-.948,3.005-1.873,4.518-2.791,3.995-2.422,8.023-4.788,12.062-7.135q13.338-7.751,26.845-15.206a22.213,22.213,0,0,1,7.033-2.747,15.7,15.7,0,0,1,2.712-.317c.876-.01,1.754.027,2.628.086a2.4,2.4,0,1,0,0-4.8A24.322,24.322,0,0,0,96.587,13.52c-4.706,2.3-9.232,5.068-13.792,7.643C73.652,26.325,64.534,31.542,55.552,36.98c-4.333,2.624-9.5,5.088-10.892,10.4-.785,2.99,3.843,4.266,4.629,1.276Z"></path></g></svg>
                                 <span class="mx-2 text-success">Livraison gratuite</span>
                                 </div>
                            <ul class="product-meta font-xs color-grey mt-50">

                                <li class="mb-5">Tags:
                                    <a href="#" rel="tag">{{ $product->category->name }}</a>,
                                    <a href="#" rel="tag">{{ $product->sub_category->name }}</a>
                                      </li>

                                <li>Availability:<span class="in-stock text-success ml-5">{{$totalQte  }} Items In Stock</span></li>

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
                            <div class="description">
                                <p>
                                    {{ $product->description }}
                                </p>


                            </div>
                            <hr>
                            <div class="more-detail">
                                <ul class="product-more-infor mt-30 fw-bold">
                                    <li><span >Semelle Int :</span> {{ $product->detail_product->semelle_int }}</li>
                                    <li><span>Semelle Ext :</span> {{ $product->detail_product->semelle_ext }}</li>
                                    <li><span>Tige :</span> {{ $product->detail_product->tige }}</li>
                                    <li><span>Doubleure :</span> {{ $product->detail_product->doubleure }}</li>

                                </ul>


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

@php
           $categories=App\Models\Category::with('subCategories')->get();

@endphp
@auth
@php


                            $wishlist=App\Models\Panier::where('user_id','=',auth()->user()->id)
                            ->where('etat','=','wishlist')
                            ->count();
                            $panier=App\Models\Panier::where('user_id','=',auth()->user()->id)
                            ->where('etat','=','panier')
                            ->count();
@endphp

                            @endif



<header class="header-area header-style-1 header-height-2">

    <div class="header-middle header-middle-ptb-1 d-none d-lg-block">
        <div class="container">
            <div class="header-wrap">
                <div class="logo logo-width-1">
                    <a href="{{ route('e-commerce.home') }}"><img src="{{ asset('assets/imgs/logo/logo_my_shoes.jpg') }}" alt="logo"></a>
                </div>
                <div class="header-right">
                    <div class="search-style-1">
                        <form action="{{ route('e-commerce.shop')  }}" method="GET">
                            @csrf
                            <input
                            style="background-color: #cc8d1526;"
                             type="text" name="parametre" placeholder="Name Category SubCategory Size...">
                        </form>
                    </div>

                    <div class="header-action-right">
                        <div class="header-action-2">
                            <div class="header-action-icon-2">
                                <a href="{{ route('e-commerce.wishlist') }}">
                                    <img class="svgInject" alt="Surfside Media" src="{{ asset('assets/imgs/theme/icons/icon-heart.svg') }}">
                                    <span class="pro-count blue">
                                        @auth{{ $wishlist }}@endauth
                                        @guest
                                {{ 0 }}
                                    @endguest
                                </span>


                                </a>
                            </div>
                            <div class="header-action-icon-2">
                                <a class="mini-cart-icon" href="{{ route('e-commerce.panier') }}">
                                    <img alt="Surfside Media" src="{{ asset('assets/imgs/theme/icons/icon-cart.svg') }}">
                                    <span class="pro-count blue">
                                        @auth{{ $panier }}@endauth
                                        @guest
                                {{ 0 }}
                                    @endguest
                                    </span>
                                </a>
                                {{-- <div class="cart-dropdown-wrap cart-dropdown-hm2">
                                    <ul>
                                        <li>
                                            <div class="shopping-cart-img">
                                                <a href="product-details.html"><img alt="Surfside Media" src="assets/imgs/shop/thumbnail-3.jpg"></a>
                                            </div>
                                            <div class="shopping-cart-title">
                                                <h4><a href="product-details.html">Daisy Casual Bag</a></h4>
                                                <h4><span>1 × </span>$800.00</h4>
                                            </div>
                                            <div class="shopping-cart-delete">
                                                <a href="#"><i class="fi-rs-cross-small"></i></a>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="shopping-cart-img">
                                                <a href="product-details.html"><img alt="Surfside Media" src="assets/imgs/shop/thumbnail-2.jpg"></a>
                                            </div>
                                            <div class="shopping-cart-title">
                                                <h4><a href="product-details.html">Corduroy Shirts</a></h4>
                                                <h4><span>1 × </span>$3200.00</h4>
                                            </div>
                                            <div class="shopping-cart-delete">
                                                <a href="#"><i class="fi-rs-cross-small"></i></a>
                                            </div>
                                        </li>
                                    </ul>
                                    <div class="shopping-cart-footer">
                                        <div class="shopping-cart-total">
                                            <h4>Total <span>$4000.00</span></h4>
                                        </div>
                                        <div class="shopping-cart-button">
                                            <a href="cart.html" class="outline">View cart</a>
                                            <a href="checkout.html">Checkout</a>
                                        </div>
                                    </div>
                                </div> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="header-bottom header-bottom-bg-color sticky-bar">
        <div id="container-navbar" class="container">
            <div class="header-wrap header-space-between position-relative">
                <div class="logo logo-width-1 d-block d-lg-none">
                    <a href="{{ route('e-commerce.home') }}"><img src="{{ asset('assets/imgs/logo/logo_my_shoes.jpg') }}" alt="logo"></a>
                </div>
                <div class="header-nav d-none d-lg-flex">

                    <div class="main-menu main-menu-padding-1 main-menu-lh-2 d-none d-lg-block">
                        <nav id="my-nav">
                            <ul>
                                <li class="link"><a class="a-link " href="{{ route('e-commerce.home') }}">Home </a></li>
                                <li class="link"><a  class="a-link" href="{{ route('e-commerce.about')}}">About</a></li>
                                <li class="link"><a  class="a-link"href="{{ route('e-commerce.shop') }}">Shop</a></li>
                                <li class="position-static link"><a class="a-link" href="#">Our Categories <i class="fi-rs-angle-down"></i></a>
                                    <ul class="mega-menu">
                                        @foreach ($categories as $category )

                                        <li class="sub-mega-menu sub-mega-menu-width-33">
                                            <a class="menu-title" href="{{ route('e-commerce.shop',['parametre'=>$category->name]) }}">{{ $category->name }} </a>
                                            <ul>
                                                @foreach ($category->subCategories as $subcategory)

                                                <li class="d-flex align-items-center justify-content-around">
                                                    <a class="href-collection" href="#">
                                                        <img class="image-collection"
                                                       src="{{ asset('assets/imageSubCategory/'.$subcategory->image) }}" alt="" srcset="">


                                                        </a>
                                                        <span> <a href="{{ route('e-commerce.shop',['category'=>$category->name,'sub_category'=>$subcategory->name]) }}">{{ $subcategory->name }}</a> </span>

                                                    </li>
                                                @endforeach
                                            </ul>
                                        </li>
                                        @endforeach
                                    </ul>
                                </li>
                              @guest
                                <li class="link"><a  class="a-link"href="{{ route('e-commerce.contact') }}">Contact</a></li>
                                <li class="link">
                                    <i class="fi-rs-key"></i> <a class="a-link" href="{{ route('e-commerce.login') }}"> Log In </a>


                                </li>
                                <li class="link">
                                    <i class="fi-rs-user"></i> <a class="a-link" href="{{ route('e-commerce.register') }}"> Sign Up</a>
                                </li>
                                {{-- my account --}}
                                @else
                                <li><a href="#">My Account<i class="fi-rs-angle-down"></i></a>
                                    <ul class="sub-menu">
                                        <li><a href="{{ route('e-commerce.user.profile') }}">Dashboard</a></li>
                                        @if(auth()->user()->role=="admin")
                                        <li><a href="{{ route('e-commerce.product') }}">Products</a></li>
                                        <li><a href="{{ route('e-commerce.category') }}">Categories</a></li>
                                        <li><a href="{{ route('e-commerce.subcategory') }}">SubCategories</a></li>
                                        <li><a href="#">Sizes</a></li>
                                       @endif
                                       <li>
                                        <form method="post" action="{{ route('e-commerce.logout') }}">
                                            @csrf
                                            <a type="submit" class="btn btn-logout" ><i class="fi-rs-sign-out"></i> Logout</a>
                                        </form>
                                       </li>

                                    </ul>
                                </li>


                                @endguest
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>

                <div class="header-action-right d-block d-lg-none">
                    <div class="header-action-2">

                        <div class="header-action-icon-2">
                            <a href="{{ route('e-commerce.wishlist') }}">
                                <img alt="Surfside Media" src="{{ asset('assets/imgs/theme/icons/icon-heart.svg') }}">
                                <span class="pro-count white">@auth{{ $wishlist }}@endauth
                                    @guest
                            {{ 0 }}
                                @endguest</span>

                            </a>
                        </div>
                        <div class="header-action-icon-2">
                            <a class="mini-cart-icon" href="{{ route('e-commerce.panier') }}">
                                <img alt="Surfside Media" src="{{ asset('assets/imgs/theme/icons/icon-cart.svg') }}">
                                <span class="pro-count white">

                                    @auth{{ $panier }}@endauth
                                        @guest
                                {{ 0 }}
                                    @endguest
                                </span>
                            </a>
                            {{-- <div class="cart-dropdown-wrap cart-dropdown-hm2">
                                <ul>
                                    <li>
                                        <div class="shopping-cart-img">
                                            <a href="product-details.html"><img alt="Surfside Media" src="assets/imgs/shop/thumbnail-3.jpg"></a>
                                        </div>
                                        <div class="shopping-cart-title">
                                            <h4><a href="product-details.html">Plain Striola Shirts</a></h4>
                                            <h3><span>1 × </span>$800.00</h3>
                                        </div>
                                        <div class="shopping-cart-delete">
                                            <a href="#"><i class="fi-rs-cross-small"></i></a>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="shopping-cart-img">
                                            <a href="product-details.html"><img alt="Surfside Media" src="assets/imgs/shop/thumbnail-4.jpg"></a>
                                        </div>
                                        <div class="shopping-cart-title">
                                            <h4><a href="product-details.html">Macbook Pro 2022</a></h4>
                                            <h3><span>1 × </span>$3500.00</h3>
                                        </div>
                                        <div class="shopping-cart-delete">
                                            <a href="#"><i class="fi-rs-cross-small"></i></a>
                                        </div>
                                    </li>
                                </ul>
                                <div class="shopping-cart-footer">
                                    <div class="shopping-cart-total">
                                        <h4>Total <span>$383.00</span></h4>
                                    </div>
                                    <div class="shopping-cart-button">
                                        <a href="cart.html">View cart</a>
                                        <a href="shop-checkout.php">Checkout</a>
                                    </div>
                                </div>
                            </div> --}}
                        </div>
                        <div class="header-action-icon-2 d-block d-lg-none">
                            <div class="burger-icon burger-icon-white">
                                <span class="burger-icon-top"></span>
                                <span class="burger-icon-mid"></span>
                                <span class="burger-icon-bottom"></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>




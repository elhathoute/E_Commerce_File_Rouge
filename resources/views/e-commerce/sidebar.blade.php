@php
           $categories=App\Models\Category::with('subCategories')->get();

@endphp
<div class="mobile-header-active mobile-header-wrapper-style">
    <div class="mobile-header-wrapper-inner">
        <div class="mobile-header-top">
            <div class="mobile-header-logo">
                <a href="{{ route('e-commerce.home') }}"><img src="assets/imgs/logo/logo_my_shoes.jpg" alt="logo"></a>
            </div>
            <div class="mobile-menu-close close-style-wrap close-style-position-inherit">
                <button class="close-style search-close">
                    <i class="icon-top"></i>
                    <i class="icon-bottom"></i>
                </button>
            </div>
        </div>
        <div class="mobile-header-content-area">
            <div class="mobile-search search-style-3 mobile-header-border">
                <form action="#">
                    <input type="text" placeholder="Search for Shoes…">
                    <button type="submit"><i class="fi-rs-search"></i></button>
                </form>
            </div>
            <div class="mobile-menu-wrap mobile-header-border">

                <!-- mobile menu start -->
                <nav>
                    <ul class="mobile-menu">
                        <li class="menu-item-has-children"><span class="menu-expand"></span><a href="{{ route('e-commerce.home') }}">Home</a></li>
                        <li class="menu-item-has-children"><span class="menu-expand"></span><a href="{{ route('e-commerce.shop') }}">shop</a></li>
                        <li class="menu-item-has-children"><span class="menu-expand"></span><a href="#">Our Categories</a>
                            <ul class="dropdown">
                                @foreach ($categories as $category )

                                <li class="menu-item-has-children"><span class="menu-expand"></span><a href="#">{{ $category->name }} </a>
                                    <ul class="dropdown">
                                        <!-- <li><a href="product-details.html">Dresses</a></li>
                                        <li><a href="product-details.html">Blouses & Shirts</a></li>
                                        <li><a href="product-details.html">Hoodies & Sweatshirts</a></li>
                                        <li><a href="product-details.html">Women's Sets</a></li> -->
                                        @foreach ($category->subCategories as $subcategory)

                                        <li>
                                            <a class="href-collection" href="#">
                                                <img class="image-collection"
                                                    src="https://i.pinimg.com/236x/09/78/bd/0978bd221f145046b21fa404766e5587--sneakers-fashion-fashion-shoes.jpg"
                                                    alt="">
                                                    {{ $subcategory->name }}</a>
                                        </li>
                                        @endforeach
                                    </ul>
                                </li>
                                @endforeach


                            </ul>
                        </li>
                        <li class="menu-item-has-children"><span class="menu-expand"></span><a href="{{ route('e-commerce.contact') }}">Contact</a></li>
                        @auth
                        <li class="menu-item-has-children"><a href="#">My Account</a>
                            <ul class="sub-menu  dropdown">
                                <li><a href="{{ route('e-commerce.user.profile') }}">Dashboard</a></li>
                                @if (auth()->user()->role=='admin')
                                <li><a href="#">Products</a></li>
                                <li><a href="{{ route('e-commerce.category') }}">Categories</a></li>
                                <li><a href="#">SubCategories</a></li>
                                <li><a href="#">Sizes</a></li>
                               @endif

                            </ul>
                        </li>
                        @endauth
                        {{-- <li class="menu-item-has-children"><span class="menu-expand"></span><a href="blog.html">Blog</a></li> --}}
                        <!-- <li class="menu-item-has-children"><span class="menu-expand"></span><a href="#">Language</a>
                            <ul class="dropdown">
                                <li><a href="#">English</a></li>
                                <li><a href="#">French</a></li>
                                <li><a href="#">German</a></li>
                                <li><a href="#">Spanish</a></li>
                            </ul>
                        </li> -->
                    </ul>
                </nav>
                <!-- mobile menu end -->
            </div>
            <div class="mobile-header-info-wrap mobile-header-border">

            @guest
                <div class="single-mobile-header-info">
                    <i class="fi-rs-key"></i> <a href="{{ route('e-commerce.login') }}">Log In</a>
                </div>
                <div class="single-mobile-header-info">
                    <i class="fi-rs-user"></i> <a href="{{ route('e-commerce.register') }}">Sign Up</a>
                </div>

                @else
                {{-- <div class="single-mobile-header-info">
                    <i class="fi-rs-user"></i> <strong>Hi </strong><span class="text-decoration-underline">{{ auth()->user()->name }}</span>

                </div> --}}
                <div class="single-mobile-header-info ">
                <form method="post" action="{{ route('e-commerce.logout') }}">
                    @csrf
                    <button class="btn btn-logout" ><i class="fi-rs-sign-out"></i> Logout</a>


                </form>


                </div>
            @endguest

                <!-- <div class="single-mobile-header-info">
                    <a href="#">(+1) 0000-000-000 </a>
                </div> -->
            </div>
            <div class="mobile-social-icon">
                <h5 class="mb-15 text-grey-4">Follow Us</h5>
                <a href="#"><img src="assets/imgs/theme/icons/icon-facebook.svg" alt=""></a>
                <a href="#"><img src="assets/imgs/theme/icons/icon-twitter.svg" alt=""></a>
                <a href="#"><img src="assets/imgs/theme/icons/icon-instagram.svg" alt=""></a>
                <a href="#"><img src="assets/imgs/theme/icons/icon-pinterest.svg" alt=""></a>
                <a href="#"><img src="assets/imgs/theme/icons/icon-youtube.svg" alt=""></a>
            </div>
        </div>
    </div>
</div>

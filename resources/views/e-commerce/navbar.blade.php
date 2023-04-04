<header class="header-area header-style-1 header-height-2">

    <div class="header-middle header-middle-ptb-1 d-none d-lg-block">
        <div class="container">
            <div class="header-wrap">
                <div class="logo logo-width-1">
                    <a href="{{ route('e-commerce.home') }}"><img src="assets/imgs/logo/logo_my_shoes.jpg" alt="logo"></a>
                </div>
                <div class="header-right">
                    <div class="search-style-1">
                        <form action="#">
                            <input type="text" placeholder="Search for Shoes...">
                        </form>
                    </div>

                    <div class="header-action-right">
                        <div class="header-action-2">
                            <div class="header-action-icon-2">
                                <a href="shop-wishlist.php">
                                    <img class="svgInject" alt="Surfside Media" src="assets/imgs/theme/icons/icon-heart.svg">
                                    <span class="pro-count blue">4</span>
                                </a>
                            </div>
                            <div class="header-action-icon-2">
                                <a class="mini-cart-icon" href="cart.html">
                                    <img alt="Surfside Media" src="assets/imgs/theme/icons/icon-cart.svg">
                                    <span class="pro-count blue">2</span>
                                </a>
                                <div class="cart-dropdown-wrap cart-dropdown-hm2">
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
                                </div>
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
                                <li class="link"><a class="a-link active" href="{{ route('e-commerce.home') }}">Home </a></li>
                                <li class="link"><a  class="a-link" href="{{ route('e-commerce.about')}}">About</a></li>
                                <li class="link"><a  class="a-link"href="{{ route('e-commerce.shop') }}">Shop</a></li>
                                <li class="position-static link"><a class="a-link" href="#">Our Categories <i class="fi-rs-angle-down"></i></a>
                                    <ul class="mega-menu">
                                        <li class="sub-mega-menu sub-mega-menu-width-33">
                                            <a class="menu-title" href="#">Women's </a>
                                            <ul>
                                                <!-- <li><a href="product-details.html">Dresses</a></li>
                                                <li><a href="product-details.html">Blouses & Shirts</a></li>
                                                <li><a href="product-details.html">Hoodies & Sweatshirts</a></li>
                                                <li><a href="product-details.html">Wedding Dresses</a></li>
                                                <li><a href="product-details.html">Prom Dresses</a></li>
                                                <li><a href="product-details.html">Cosplay Costumes</a></li> -->
                                                <li>
                                                    <a class="href-collection" href="#">
                                                        <img class="image-collection"
                                                            src="https://i.pinimg.com/236x/09/78/bd/0978bd221f145046b21fa404766e5587--sneakers-fashion-fashion-shoes.jpg"
                                                            alt="">
                                                        Baskets</a>
                                                </li>
                                                <li><a class="href-collection" href="#">
                                                        <img class="image-collection" src="https://th.bing.com/th/id/OIP.EtBxB-yQhMpsxLgM_IU4UgHaD4?pid=ImgDet&rs=1"
                                                            alt="">
                                                        Bottines</a></li>
                                                <li><a class="href-collection" href="#">
                                                        <img class="image-collection" src="https://i.pinimg.com/736x/cb/ac/41/cbac41f71608f2789e52a8ab7a149af2.jpg"
                                                            alt="">
                                                        Sandales</a></li>
                                                <li><a class="href-collection" href="#">
                                                        <img class="image-collection"
                                                            src="https://th.bing.com/th/id/R.34d364280dc3981976ddffedfdc3a0df?rik=7eac6%2ffExDVsQQ&pid=ImgRaw&r=0"
                                                            alt="">
                                                        Escarpins</a></li>
                                                <li><a class="href-collection" href="#">
                                                        <img class="image-collection"
                                                            src="https://i.etsystatic.com/7857639/r/il/2c1d7c/569721454/il_570xN.569721454_tj6i.jpg" alt="">
                                                        Ballerines</a></li>
                                            </ul>
                                        </li>
                                        <li class="sub-mega-menu sub-mega-menu-width-33">
                                            <a class="menu-title" href="#">Men's </a>
                                            <ul>
                                                <!-- <li><a href="product-details.html">Jackets</a></li>
                                                <li><a href="product-details.html">Casual Faux Leather</a></li>
                                                <li><a href="product-details.html">Genuine Leather</a></li>
                                                <li><a href="product-details.html">Casual Pants</a></li>
                                                <li><a href="product-details.html">Sweatpants</a></li>
                                                <li><a href="product-details.html">Harem Pants</a></li> -->
                                                <li>
                                                    <a class="href-collection" href="#">
                                                   <img class="image-collection" src="https://i.pinimg.com/236x/09/78/bd/0978bd221f145046b21fa404766e5587--sneakers-fashion-fashion-shoes.jpg" alt=""> Baskets</a>
                                                </li>
                                                <li><a class="href-collection" href="#">
                                                    <img class="image-collection" src="https://th.bing.com/th/id/OIP.EtBxB-yQhMpsxLgM_IU4UgHaD4?pid=ImgDet&rs=1" alt="">
                                                    Bottines</a></li>
                                                <li><a class="href-collection" href="#">
                                                   <img class="image-collection" src="https://th.bing.com/th/id/R.e8ab7a03b0e7c1d1dd8bf8ce4c51cb35?rik=iqXtXzEk%2fhNZpg&riu=http%3a%2f%2ffreevector.co%2fwp-content%2fuploads%2f2011%2f11%2f88794-leather-derby-shoe.png&ehk=qne8PvjyKlAYHcyfI5pHp1jFBwJTJam9tplrMRTqpE0%3d&risl=&pid=ImgRaw&r=0" alt=""> Derbies</a></li>
                                                <li><a class="href-collection" href="#">
                                                   <img class="image-collection" src="https://th.bing.com/th/id/R.edaa03ba97c24836ffab72fadbf54af3?rik=Q%2bqO66ESo0KAtg&pid=ImgRaw&r=0" alt=""> sport</a></li>
                                                <li><a class="href-collection" href="#">
                                                   <img class="image-collection" src="https://th.bing.com/th/id/R.6c56b70b68b8777996ce0cf1ed7b037f?rik=3KeDmYGPs0mxuw&riu=http%3a%2f%2f4.bp.blogspot.com%2f-fZCTkk-fLhQ%2fVAs8OWNlN0I%2fAAAAAAAAiIY%2fLGLjAO846N8%2fs1600%2fScreen%2bShot%2b2014-09-06%2bat%2b9.53.14%2bAM.png&ehk=jR55zS2BY%2bVXMQXILuUNnl3xkwX9IAElGNyPsoZVSio%3d&risl=&pid=ImgRaw&r=0" alt=""> Mocassins</a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li class="sub-mega-menu sub-mega-menu-width-33">
                                            <a class="menu-title" href="#">Children's</a>
                                            <ul>
                                                <!-- <li><a href="product-details.html">Gaming Laptops</a></li>
                                                <li><a href="product-details.html">Ultraslim Laptops</a></li>
                                                <li><a href="product-details.html">Tablets</a></li>
                                                <li><a href="product-details.html">Laptop Accessories</a></li>
                                                <li><a href="product-details.html">Tablet Accessories</a></li> -->
                                                <li>
                                                    <a class="href-collection" href="#">
                                                   <img class="image-collection" src="https://i.pinimg.com/236x/09/78/bd/0978bd221f145046b21fa404766e5587--sneakers-fashion-fashion-shoes.jpg" alt=""> Baskets</a>
                                                </li>
                                                <li><a class="href-collection" href="#">
                                                    <img class="image-collection" src="https://i.pinimg.com/736x/cb/ac/41/cbac41f71608f2789e52a8ab7a149af2.jpg" alt="">
                                                    Sandales</a></li>
                                                <li><a class="href-collection" href="#">
                                                    <img class="image-collection" src="https://th.bing.com/th/id/OIP.EtBxB-yQhMpsxLgM_IU4UgHaD4?pid=ImgDet&rs=1" alt="">
                                                    Bottines</a></li>
                                                    <li><a class="href-collection" href="#">
                                                        <img class="image-collection" src="https://i.etsystatic.com/7857639/r/il/2c1d7c/569721454/il_570xN.569721454_tj6i.jpg" alt="">
                                                        Ballerines</a></li>
                                                <li><a class="href-collection" href="#">
                                                   <img class="image-collection" src="https://thumbs.dreamstime.com/b/sleeping-slippers-couple-hand-drawn-sketch-home-shoes-pair-black-white-doodle-vector-isolated-illustration-sleeping-slippers-213350844.jpg" alt=""> Pantoufles</a></li>

                                            </ul>
                                        </li>
                                        <!-- <li class="sub-mega-menu sub-mega-menu-width-34">
                                            <div class="menu-banner-wrap">
                                                <a href="product-details.html"><img src="assets/imgs/banner/menu-banner.jpg" alt="Surfside Media"></a>
                                                <div class="menu-banner-content">
                                                    <h4>Hot deals</h4>
                                                    <h3>Don't miss<br> Trending</h3>
                                                    <div class="menu-banner-price">
                                                        <span class="new-price text-success">Save to 50%</span>
                                                    </div>
                                                    <div class="menu-banner-btn">
                                                        <a href="product-details.html">Shop now</a>
                                                    </div>
                                                </div>
                                                <div class="menu-banner-discount">
                                                    <h3>
                                                        <span>35%</span>
                                                        off
                                                    </h3>
                                                </div>
                                            </div>
                                        </li> -->
                                    </ul>
                                </li>
                                {{-- <li><a href="blog.html">Blog </a></li> --}}
                                <li class="link"><a  class="a-link"href="{{ route('e-commerce.contact') }}">Contact</a></li>
                                <li class="link">
                                    <i class="fi-rs-key"></i> <a class="a-link" href="{{ route('e-commerce.login') }}"> Log In </a>


                                </li>
                                <li class="link">
                                    <i class="fi-rs-user"></i> <a class="a-link" href="{{ route('e-commerce.register') }}"> Sign Up</a></li>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
                <!-- <div class="hotline d-none d-lg-block">
                    <p><i class="fi-rs-smartphone"></i><span>Toll Free</span> (+1) 0000-000-000 </p>
                </div> -->
                <!-- <p class="mobile-promotion">Happy <span class="text-brand">Mother's Day</span>. Big Sale Up to 40%</p> -->
                <div class="header-action-right d-block d-lg-none">
                    <div class="header-action-2">
                        <div class="header-action-icon-2">
                            <a href="shop-wishlist.php">
                                <img alt="Surfside Media" src="assets/imgs/theme/icons/icon-heart.svg">
                                <span class="pro-count white">4</span>
                            </a>
                        </div>
                        <div class="header-action-icon-2">
                            <a class="mini-cart-icon" href="cart.html">
                                <img alt="Surfside Media" src="assets/imgs/theme/icons/icon-cart.svg">
                                <span class="pro-count white">2</span>
                            </a>
                            <div class="cart-dropdown-wrap cart-dropdown-hm2">
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
                            </div>
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




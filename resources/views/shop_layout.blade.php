<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>KidolShop</title>
    <meta name="robots" content="noindex, follow" />
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- <meta name="csrf-token" content="{{ csrf_token() }}"> -->
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('public/kidolshop/images/favicon.png')}}">

    <!-- CSS
	============================================ -->

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{asset('public/kidolshop/css/vendor/bootstrap.min.css')}}">

    <!-- Icon Font CSS -->
    <link rel="stylesheet" href="{{asset('public/kidolshop/css/vendor/plazaicon.css')}}">
    <link rel="stylesheet" href="{{asset('public/kidolshop/css/vendor/themify-icons.css')}}">
    <link rel="stylesheet" href="{{asset('public/kidolshop/css/vendor/font-awesome.min.css')}}">

    <!-- Plugins CSS -->
    <link rel="stylesheet" href="{{asset('public/kidolshop/css/plugins/animate.css')}}">
    <link rel="stylesheet" href="{{asset('public/kidolshop/css/plugins/swiper-bundle.min.css')}}">
    <link rel="stylesheet" href="{{asset('public/kidolshop/css/plugins/select2.min.css')}}">

    <!-- Helper CSS -->
    <link rel="stylesheet" href="{{asset('public/kidolshop/css/helper.css')}}">
    <link rel="stylesheet" href="{{asset('public/kidolshop/css/dataTables.bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('public/kidolshop/css/responsive.bootstrap.min.css')}}">

    <!-- Main Style CSS -->
    <link rel="stylesheet" href="{{asset('public/kidolshop/css/style.css')}}">
    
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Coiny&display=swap');
    </style>

    <!-- Modernizer JS -->
    <script src="{{asset('public/kidolshop/js/vendor/modernizr-3.6.0.min.js')}}"></script>
    <!-- jQuery JS -->
    <script src="{{asset('public/kidolshop/js/vendor/jquery-3.3.1.min.js')}}" integrity="sha384-tsQFqpEReu7ZLhBV2VZlAu7zcOV+rXbYlF2cqB8txI/8aZajjp4Bqd+V6D5IgvKT" 
        crossorigin="anonymous">
    </script>
    <script src="{{asset('public/kidolshop/js/jquery.preloadinator.min.js')}}"></script>

    <!--====== Use the minified version files listed below for better performance and remove the files listed above ======-->
    <!-- <link rel="stylesheet" href="assets/css/plugins-min/plugins.min.css">
    <link rel="stylesheet" href="assets/css/style.min.css"> -->


</head>

<body data-aos-easing="ease" data-aos-duration="400" data-aos-delay="0" class="preloader-deactive">
    <div class="main-wrapper">
        <!--Top Notification Start-->
        <div class="top-notification-bar text-center">
            <div class="container">
                <div class="notification-entry">
                    <p>Nhập: SALE10 giảm 10% cho mọi đơn hàng. <a href="{{URL::to('/store')}}">Mua ngay!</a></p>
                </div>
            </div>
            <div class="notification-close">
                <button class="notification-close-btn"><i class="fa fa-times"></i></button>
            </div>
        </div>
        <!--Top Notification End-->

        <div class="preloader js-preloader flex-center">
            <div class="dots">
                <div class="dot"></div>
                <div class="dot"></div>
                <div class="dot"></div>
            </div>
        </div>

        <!--Header Section Start-->
        <?php 
            use App\Http\Controllers\CartController;
            use App\Http\Controllers\ProductController;
            use Illuminate\Support\Facades\Session;
        ?>
        <input id="quick-view-token" name="_token" type="hidden" value="{{csrf_token()}}">
        <div class="header-section d-none d-lg-block">
            <div class="main-header">
                <div class="container position-relative">
                    <div class="row align-items-center">
                        <div class="col-lg-2">
                            <div class="header-logo">
                                <a href="{{URL::to('/home')}}"><img src="{{asset('public/kidolshop/images/logo/logo.png')}}" alt=""></a>
                            </div>
                        </div>
                        <div class="col-lg-7 position-static">
                            <div class="site-main-nav">
                                <nav class="site-nav">
                                    <ul>
                                        <li><a href="{{URL::to('/home')}}">Trang chủ</a></li>
                                        <li>
                                            <a href="{{URL::to('/store')}}">Cửa hàng <span class="new">Mới</span></a>

                                            <ul class="mega-sub-menu">
                                                <li class="mega-dropdown">
                                                    <a class="mega-title" href="{{URL::to('/store')}}">Danh mục</a>

                                                    <ul class="mega-item">
                                                        @foreach($list_category as $key => $category)
                                                        <li><a href="{{URL::to('/store?show=all&category='.$category->idCategory.'&sort_by=new')}}">{{$category->CategoryName}}</a></li>
                                                        @endforeach
                                                    </ul>
                                                </li>
                                                <li class="mega-dropdown">
                                                    <a class="mega-title" href="{{URL::to('/store')}}">Thương hiệu</a>

                                                    <ul class="mega-item">
                                                        @foreach($list_brand as $key => $brand)
                                                        <li><a href="{{URL::to('/store?show=all&brand='.$brand->idBrand.'&sort_by=new')}}">{{$brand->BrandName}}</a></li>
                                                        @endforeach
                                                    </ul>
                                                </li>
                                                <li class="mega-dropdown">
                                                    <a class="mega-title" href="{{URL::to('/store')}}">Danh Mục Khác</a>

                                                    <ul class="mega-item">
                                                        <li><a href="{{URL::to('/store?show=all&sort_by=new')}}">Sản phẩm mới</a></li>
                                                        <li><a href="{{URL::to('/store?show=all&sort_by=bestsellers')}}">Sản phẩm bán chạy</a></li>
                                                        <li><a href="{{URL::to('/store?show=all&sort_by=featured')}}">Sản phẩm nổi bật</a></li>
                                                        <li><a href="{{URL::to('/store?show=all&sort_by=sale')}}">Sản phẩm đang SALE</a></li>
                                                    </ul>
                                                </li>
                                                <li class="mega-dropdown">
                                                    <a class="menu-banner" href="#">
                                                        <img src="{{asset('public/kidolshop/images/banner-navbar.jpg')}}" alt="">
                                                    </a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li><a href="{{URL::to('/blog')}}">Tin tức</a></li>
                                        <li><a href="{{URL::to('/about-us')}}">Về chúng tôi</a></li>
                                        <li><a href="{{URL::to('/contact')}}">Liên hệ</a></li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="header-meta-info" style="position:relative;">
                                <div class="header-search">
                                    <form type="GET" action="{{URL::to('/search')}}">
                                        <input type="text" name="keyword" id="search-input" placeholder="Tìm kiếm sản phẩm " autocomplete="off">
                                        <button class="search-btn"><i class="icon-search"></i></button>
                                    </form>
                                </div>
                                <ul class="search-product">

                                </ul>
                                <div class="header-account">
                                    <div class="header-account-list dropdown top-link">
                                        @if(Session::get('idCustomer'))
                                            @if(Session::get('AvatarCus') != '')
                                            <a href="#" role="button" data-toggle="dropdown"><img style="border-radius:50%;" width="70px" height="24px" src="{{asset('public/storage/kidoldash/images/customer/'.Session::get('AvatarCus'))}}" alt=""></a>
                                            @else <a href="#" role="button" data-toggle="dropdown"><i class="icon-users"></i></a> @endif
                                        <ul class="dropdown-menu">
                                            <li><a href="{{URL::to('/account')}}">Tài khoản của tôi</a></li>
                                            <li><a href="{{URL::to('/wishlist')}}">Sản phẩm yêu thích</a></li>
                                            <li><a href="{{URL::to('/ordered')}}">Đơn mua</a></li>
                                            <li><a href="{{URL::to('/logout')}}">Đăng xuất</a></li>
                                        </ul>
                                        <input type="hidden" id="idCustomer" value="{{Session::get('idCustomer')}}">
                                        @else
                                        <a href="#" role="button" data-toggle="dropdown"><i class="icon-users"></i></a>
                                        <ul class="dropdown-menu">
                                            <li><a href="{{URL::to('/register')}}">Đăng ký</a></li>
                                            <li><a href="{{URL::to('/login')}}">Đăng nhập</a></li>
                                        </ul>
                                        <input type="hidden" id="idCustomer" value="">
                                        @endif
                                    </div>
                                    <div class="header-account-list dropdown mini-cart">
                                        <?php 
                                            $get_cart_header = CartController::get_cart_header();
                                            $sum_cart = $get_cart_header['sum_cart'];
                                            $carts = $get_cart_header['get_cart_header']; 
                                            $Total = 0; 
                                        ?>
                                        @if($sum_cart > 0)
                                            <a href="#" role="button" data-toggle="dropdown">
                                                <i class="icon-shopping-bag"></i>
                                                <span class="item-count ">{{$sum_cart}}</span>
                                            </a>
                                            <ul class="dropdown-menu ">
                                                <li class="product-cart">
                                                    @foreach($carts as $key => $cart)
                                                        @php
                                                            $Total += ($cart->PriceNew * $cart->QuantityBuy);
                                                            $get_time_sale = ProductController::get_sale_pd($cart->idProduct);
                                                            $SalePrice = 0;
                                                            if($get_time_sale) $SalePrice = $cart->Price - ($cart->Price/100) * $get_time_sale->Percent;
                                                        @endphp
                                                        <div class="single-cart-box">
                                                            <div class="cart-img">
                                                                <?php $image = json_decode($cart->ImageName)[0]; ?>
                                                                <a href="{{URL::to('shop-single/'.$cart->ProductSlug)}}"><img src="{{asset('public/storage/kidoldash/images/product/'.$image)}}" alt=""></a>
                                                                <span class="pro-quantity">{{$cart->QuantityBuy}}</span>
                                                            </div>
                                                            <div class="cart-content">
                                                                <h6 class="title"><a href="{{URL::to('shop-single/'.$cart->ProductSlug)}}">{{$cart->ProductName}}</a></h6>
                                                                <span class="title" style="font-size:13px;">{{$cart->AttributeProduct}}</span>
                                                                <div class="cart-price d-flex">
                                                                    @if($SalePrice != '0')
                                                                        <span class="sale-price">{{number_format(round($SalePrice,-3),0,',','.')}}đ</span>
                                                                        <span class="regular-price">{{number_format($cart->Price,0,',','.')}}đ</span>
                                                                    @else
                                                                        <span class="sale-price">{{number_format($cart->Price,0,',','.')}}đ</span>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                            <a class="del-icon delete-pd-cart" data-id="{{$cart->idCart}}" data-token="{{csrf_token()}}"><i class="fa fa-trash"></i></a>
                                                        </div>
                                                    @endforeach
                                                </li>
                                                <li class="product-total">
                                                    <ul class="cart-total">
                                                        <li> Tổng : <span>{{number_format($Total,0,',','.')}}đ</span></li>
                                                    </ul>
                                                </li>
                                                <li class="product-btn">
                                                    <a href="{{URL::to('/cart')}}" class="btn btn-dark btn-block">Xem giỏ hàng</a>
                                                </li>
                                            </ul>
                                        @else
                                            <a href="#" role="button" data-toggle="dropdown">
                                                <i class="icon-shopping-bag"></i>
                                            </a>
                                            <ul class="dropdown-menu" style="height:250px; width:250px;">
                                                <li style="height:100%; display:flex; flex-direction:column; align-items:center; justify-content:center;">
                                                    <img src="{{asset('public/kidolshop/images/no_cart.png')}}" alt="" style="width: 80%;" class="product-image">
                                                    <span class="mt-10 d-block text-align-center">Giỏ hàng trống</span>
                                                </li>
                                            </ul>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--Header Section End-->


        <!--Header Mobile Start-->
        <div class="header-mobile d-lg-none">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-6">
                        <div class="header-logo">
                            <a href="{{URL::to('/home')}}"><img src="{{asset('public/kidolshop/images/logo/logo.png')}}" alt=""></a>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="header-meta-info">
                            <div class="header-account">
                                <div class="header-account-list dropdown top-link">
                                    @if(Session::get('idCustomer'))
                                        @if(Session::get('AvatarCus') != '')
                                        <a href="#" role="button" data-toggle="dropdown" style="top:-3px;"><img style="border-radius:50%;" width="24px" height="24px" src="{{asset('public/storage/kidoldash/images/customer/'.Session::get('AvatarCus'))}}" alt=""></a>
                                        @else <a href="#" role="button" data-toggle="dropdown"><i class="icon-users"></i></a> @endif
                                    <ul class="dropdown-menu">
                                        <li><a href="{{URL::to('/account')}}">Tài khoản của tôi</a></li>
                                        <li><a href="{{URL::to('/wishlist')}}">Sản phẩm yêu thích</a></li>
                                        <li><a href="{{URL::to('/ordered')}}">Đơn mua</a></li>
                                        <li><a href="{{URL::to('/logout')}}">Đăng xuất</a></li>
                                    </ul>
                                    <input type="hidden" id="idCustomer" value="{{Session::get('idCustomer')}}">
                                    @else
                                    <a href="#" role="button" data-toggle="dropdown"><i class="icon-users"></i></a>
                                    <ul class="dropdown-menu">
                                        <li><a href="{{URL::to('/register')}}">Đăng ký</a></li>
                                        <li><a href="{{URL::to('/login')}}">Đăng nhập</a></li>
                                    </ul>
                                    <input type="hidden" id="idCustomer" value="">
                                    @endif
                                </div>
                                <div class="header-account-list dropdown mini-cart">
                                    <?php 
                                        $get_cart_header = CartController::get_cart_header();
                                        $sum_cart = $get_cart_header['sum_cart'];
                                        $carts = $get_cart_header['get_cart_header']; 
                                        $Total = 0; 
                                    ?>
                                    @if($sum_cart > 0)
                                        <a href="#" role="button" data-toggle="dropdown">
                                            <i class="icon-shopping-bag"></i>
                                            <span class="item-count ">{{$sum_cart}}</span>
                                        </a>
                                        <ul class="dropdown-menu ">
                                            <li class="product-cart">
                                                @foreach($carts as $key => $cart)
                                                    @php
                                                        $Total += ($cart->PriceNew * $cart->QuantityBuy);
                                                        $get_time_sale = ProductController::get_sale_pd($cart->idProduct);
                                                        $SalePrice = 0;
                                                        if($get_time_sale) $SalePrice = $cart->Price - ($cart->Price/100) * $get_time_sale->Percent;
                                                    @endphp
                                                    <div class="single-cart-box">
                                                        <div class="cart-img">
                                                            <?php $image = json_decode($cart->ImageName)[0]; ?>
                                                            <a href="{{URL::to('shop-single/'.$cart->ProductSlug)}}"><img src="{{asset('public/storage/kidoldash/images/product/'.$image)}}" alt=""></a>
                                                            <span class="pro-quantity">{{$cart->QuantityBuy}}</span>
                                                        </div>
                                                        <div class="cart-content">
                                                            <h6 class="title"><a href="{{URL::to('shop-single/'.$cart->ProductSlug)}}">{{$cart->ProductName}}</a></h6>
                                                            <span class="title" style="font-size:13px;">{{$cart->AttributeProduct}}</span>
                                                            <div class="cart-price d-flex">
                                                                @if($SalePrice != '0')
                                                                    <span class="sale-price">{{number_format(round($SalePrice,-3),0,',','.')}}đ</span>
                                                                    <span class="regular-price">{{number_format($cart->Price,0,',','.')}}đ</span>
                                                                @else
                                                                    <span class="sale-price">{{number_format($cart->Price,0,',','.')}}đ</span>
                                                                @endif
                                                            </div>
                                                        </div>
                                                        <a class="del-icon delete-pd-cart" data-id="{{$cart->idCart}}" data-token="{{csrf_token()}}"><i class="fa fa-trash"></i></a>
                                                    </div>
                                                @endforeach
                                            </li>
                                            <li class="product-total">
                                                <ul class="cart-total">
                                                    <li> Tổng : <span>{{number_format($Total,0,',','.')}}đ</span></li>
                                                </ul>
                                            </li>
                                            <li class="product-btn">
                                                <a href="{{URL::to('/cart')}}" class="btn btn-dark btn-block">Xem giỏ hàng</a>
                                            </li>
                                        </ul>
                                    @else
                                        <a href="#" role="button" data-toggle="dropdown">
                                            <i class="icon-shopping-bag"></i>
                                        </a>
                                        <ul class="dropdown-menu" style="height:250px; width:250px;">
                                            <li style="height:100%; display:flex; flex-direction:column; align-items:center; justify-content:center;">
                                                <img src="{{asset('public/kidolshop/images/no_cart.png')}}" alt="" style="width: 80%;" class="product-image">
                                                <span class="mt-10 d-block text-align-center">Giỏ hàng trống</span>
                                            </li>
                                        </ul>
                                    @endif
                                </div>
                                <div class="header-account-list mobile-menu-trigger">
                                    <button id="menu-trigger">
                                        <span></span>
                                        <span></span>
                                        <span></span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--Header Mobile End-->

        <!--Header Mobile Menu Start-->
        <div class="header-mobile-menu d-lg-none">

            <a href="javascript:void(0)" class="mobile-menu-close">
                <span></span>
                <span></span>
            </a>

            <div class="header-meta-info">
                <div class="header-search">
                    <form type="GET" action="{{URL::to('/search')}}">
                        <input type="text" name="keyword" id="search-input" placeholder="Tìm kiếm sản phẩm " autocomplete="off">
                        <button class="search-btn"><i class="icon-search"></i></button>
                    </form>
                </div>
            </div>

            <div class="site-main-nav">
                <nav class="site-nav">
                    <ul class="navbar-mobile-wrapper">
                        <li><a href="{{URL::to('/home')}}">Trang chủ</a></li>
                        <li><a href="{{URL::to('/store')}}">Cửa hàng</a></li>
                        <li>
                            <a href="#">Sản phẩm <span class="new">Mới</span></a>

                            <ul class="mega-sub-menu">
                                <li class="mega-dropdown">
                                    <a class="mega-title" href="#">Danh mục</a>

                                    <ul class="mega-item">
                                        @foreach($list_category as $key => $category)
                                        <li><a href="{{URL::to('/store?show=all&category='.$category->idCategory.'&sort_by=new')}}">{{$category->CategoryName}}</a></li>
                                        @endforeach
                                    </ul>
                                </li>
                                <li class="mega-dropdown">
                                    <a class="mega-title" href="#">Thương hiệu</a>

                                    <ul class="mega-item">
                                        @foreach($list_brand as $key => $brand)
                                        <li><a href="{{URL::to('/store?show=all&brand='.$brand->idBrand.'&sort_by=new')}}">{{$brand->BrandName}}</a></li>
                                        @endforeach
                                    </ul>
                                </li>
                                <li class="mega-dropdown">
                                    <a class="mega-title" href="#">Danh mục khác</a>

                                    <ul class="mega-item">
                                        <li><a href="{{URL::to('/store?show=all&sort_by=new')}}">Sản phẩm mới</a></li>
                                        <li><a href="{{URL::to('/store?show=all&sort_by=bestsellers')}}">Sản phẩm bán chạy</a></li>
                                        <li><a href="{{URL::to('/store?show=all&sort_by=featured')}}">Sản phẩm nổi bật</a></li>
                                        <li><a href="{{URL::to('/store?show=all&sort_by=sale')}}">Sản phẩm đang SALE</a></li>
                                    </ul>
                                </li>
                                <!-- <li class="mega-dropdown">
                                    <a class="menu-banner" href="#">
                                        <img src="{{asset('public/kidolshop/images/menu-banner.jpg')}}" alt="">
                                    </a>
                                </li> -->
                            </ul>
                        </li>
                        <li><a href="{{URL::to('/blog')}}">Tin tức</a></li>
                        <li><a href="{{URL::to('/about-us')}}">Về chúng tôi</a></li>
                        <li><a href="{{URL::to('/contact')}}">Liên hệ</a></li>
                    </ul>
                </nav>
            </div>

            <div class="header-social">
                <ul class="social">
                    <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                    <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                    <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                    <li><a href="#"><i class="fa fa-pinterest"></i></a></li>
                </ul>
            </div>

        </div>
        <!--Header Mobile Menu End-->

        <div class="overlay"></div>
        <!--Overlay-->


        @yield('content')



        <!--Footer Section Start-->
        <div class="footer-area">
            <div class="container">
                <div class="footer-widget-area section-padding-6">
                    <div class="row justify-content-between">

                        <!--Footer Widget Start-->
                        <div class="col-lg-4 col-md-6">
                            <div class="footer-widget">
                                <a class="footer-logo" href="#"><img src="{{asset('public/kidolshop/images/logo/logo.png')}}" alt=""></a>
                                <div class="footer-widget-text">
                                    <p>A perfect blend of creativity, energy, communication, happiness and love. Let us arrange a smile for you. </p>
                                </div>
                                <div class="widget-social">
                                    <ul>
                                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                        <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                        <li><a href="#"><i class="fa fa-youtube"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                            <!--Footer Widget End-->
                        </div>

                        <div class="col-lg-2 col-md-4 col-sm-6">
                            <div class="footer-widget">
                                <h4 class="footer-widget-title">Information</h4>

                                <div class="footer-widget-menu">
                                    <ul>
                                        <li><a href="#">Search Terms</a></li>
                                        <li><a href="#">Advanced Search</a></li>
                                        <li><a href="#">Helps & Faqs</a></li>
                                        <li><a href="#">Store Location</a></li>
                                        <li><a href="#">Orders & Returns</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-2 col-md-4 col-sm-6">
                            <div class="footer-widget">
                                <h4 class="footer-widget-title">My Account</h4>

                                <div class="footer-widget-menu">
                                    <ul>
                                        <li><a href="#">Delivery</a></li>
                                        <li><a href="#">Legal Notice</a></li>
                                        <li><a href="#">Secure payment</a></li>
                                        <li><a href="#">Sitemap</a></li>
                                        <li><a href="about.html">About us</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-2 col-md-4 col-sm-6">
                            <div class="footer-widget">
                                <h4 class="footer-widget-title">Help</h4>

                                <div class="footer-widget-menu">
                                    <ul>
                                        <li><a href="#">FAQ’s</a></li>
                                        <li><a href="#">Pricing Plans</a></li>
                                        <li><a href="#">Track</a></li>
                                        <li><a href="#">Your Order</a></li>
                                        <li><a href="#">Returns</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-2 col-md-4 col-sm-6">
                            <div class="footer-widget">
                                <h4 class="footer-widget-title">Customer Service</h4>

                                <div class="footer-widget-menu">
                                    <ul>
                                        <li><a href="{{URL::to('/account')}}">My Account</a></li>
                                        <li><a href="#">Terms of Use</a></li>
                                        <li><a href="#">Deliveries & Returns</a></li>
                                        <li><a href="#">Gift card</a></li>
                                        <li><a href="#">Legal Notice</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <!--Footer Section End-->

        <!--Copyright Section Start-->
        <div class="copyright-section">
            <div class="container">
                <div class="copyright-wrapper text-center d-lg-flex align-items-center justify-content-between">

                    <!--Right Start-->
                    <div class="copyright-content">
                        <p>Copyright 2020 &copy; <a href="https://hasthemes.com/">HasThemes</a> . All Rights Reserved</p>
                    </div>
                    <!--Right End-->

                    <!--Right Start-->
                    <div class="copyright-payment">
                        <img src="{{asset('public/kidolshop/images/payment.png')}}" alt="">
                    </div>
                    <!--Right End-->

                </div>
            </div>
        </div>
        <!--Copyright Section End-->


        <!--Back To Start-->
        <a href="#" class="back-to-top">
            <i class="fa fa-angle-double-up"></i>
        </a>
        <!--Back To End-->

        <!-- Quick View  Start-->
        <!-- <div class="modal fade" id="exampleModal">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="quick-view-image">
                                    <img src="{{asset('public/kidolshop/images/product-single/product-1.jpg')}}" alt="">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="quick-view-content">
                                    <h4 class="product-title">Sweet Alyssum</h4>
                                    <div class="thumb-price">
                                        <span class="current-price">$19.00</span>
                                        <span class="old-price">$29.00</span>
                                        <span class="discount">-34%</span>
                                    </div>
                                    <div class="product-rating">
                                        <ul class="rating-star">
                                            <li><i class="fa fa-star-o"></i></li>
                                            <li><i class="fa fa-star-o"></i></li>
                                            <li><i class="fa fa-star-o"></i></li>
                                            <li><i class="fa fa-star-o"></i></li>
                                            <li><i class="fa fa-star-o"></i></li>
                                        </ul>
                                        <span>No reviews</span>
                                    </div>
                                    <p>On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the moment, so blinded by desire, that they cannot foresee the pain and trouble that are bound to ensue; and equal blame belongs to those who fail in their duty through weakness of will</p>

                                    <div class="quick-view-quantity-addcart d-flex flex-wrap">
                                        <form action="#">
                                            <div class="quantity d-inline-flex align-items-center">
                                                <button type="button" class="sub"><i class="ti-minus"></i></button>
                                                <input type="text" value="1" />
                                                <button type="button" class="add"><i class="ti-plus"></i></button>
                                            </div>
                                        </form>
                                        <div class="addcart-btn">
                                            <button class="btn btn-primary">Add to cart</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->
        <!--Quick View Tags End-->

        <!-- Modal Warning Compare -->
        <div class="modal fade bd-example-modal-sm" id="WarningModal" tabindex="-1" role="dialog"  aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalCenterTitle">Thông báo</h5>
                    </div>
                    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close" aria-hidden="true"></button>
                    <div class="modal-body text-center p-3 h4">
                        <h2 class="title text-primary">Chỉ có thể chọn 2 sản phẩm để so sánh!</h2>
                    </div>
                    <div class="modal-footer justify-content-center">
                        <button type="button" class="btn btn-primary btn-round" data-dismiss="modal">Đóng</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal Warning Compare -->

        <!-- Modal Add To WishList -->
        <div class="modal fade bd-example-modal-sm modal-AddToWishList" tabindex="-1" role="dialog"  aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalCenterTitle">Thông báo</h5>
                    </div>
                    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close" aria-hidden="true"></button>
                    <div class="modal-body text-center p-3 h4">
                        <div class="mb-3">
                            <i class="fa fa-check-circle text-primary" style="font-size:50px;"></i>
                        </div>Đã thêm sản phẩm vào danh sách yêu thích
                    </div>
                    <div class="modal-footer justify-content-center">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tiếp tục mua sắm</button>
                        <a href="{{URL::to('/wishlist')}}" type="button" class="btn btn-primary">Xem danh sách</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal Add To WishList -->

        <!-- Modal Compare -->
        <!-- <div class="modal fade bd-example-modal-sm modal-test" id="select-products" tabindex="-1" role="dialog"  aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-xl modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header justify-content-start">
                        <h5 class="modal-title" id="exampleModalCenterTitle">Chọn sản phẩm</h5>
                        <input type="text" id="search-pd-compare" placeholder="Tìm kiếm sản phẩm" style="width:65%; margin-left:10%;">
                    </div>
                    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close" aria-hidden="true"></button>
                    <div class="modal-body modal-compare-body row">
                        <div class="product-item col-md-3 select-pd" id="product-item-41" data-id="41">
                            <div class="product-image mb-3" id="product-image-41">
                                <label class="abc" for="chk-pd-41"><img src="{{asset('public/kidolshop/images/no_cart.png')}}" class="rounded w-100 img-fluid"></label>       
                                <div class="product-title">
                                    <div class="product-name" style="height:30px ;overflow:hidden;display:-webkit-box;">
                                        <input type="checkbox" class="checkstatus d-none" id="chk-pd-41" name="chk_product[]" value="41" data-id="41" data-name="Kem chống nắng có màu che phủ tự nhiên Lancome UV Expert BB COMPLETE 2 SPF 50+ PA++++ 30ml – Tone tự nhiên" data-price="1550000" data-img="lc6.png">
                                        <span>Kem chống nắng có màu che phủ tự nhiên Lancome UV Expert BB COMPLETE 2 SPF 50+ PA++++ 30ml – Tone tự nhiên</span>
                                    </div>
                                    <div style="text-align:center;">1.550.000đ</div>
                                </div>
                            </div>
                            <input type="hidden" name="selected_product[]" id="product-41" value="">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-round" style="color:#000; border: 1px solid #e6e6e6;" data-dismiss="modal">Đóng</button>
                        <button type="button" id="confirm" class="btn btn-primary btn-round" data-dismiss="modal" style="pointer-events: none; background-color: rgb(108, 117, 125); border:none;">Xác nhận</button>
                    </div>
                </div>
            </div>
        </div> -->
        <div class="modal fade bd-example-modal-sm modal-Compare" id="modal-Compare" tabindex="-1" role="dialog"  aria-hidden="true">
        
        </div>
        <!-- Modal Compare -->
    </div>

    <!-- JS
    ============================================ -->


    <!-- Bootstrap JS -->
    <script src="{{asset('public/kidolshop/js/vendor/popper.min.js')}}"></script>
    <script src="{{asset('public/kidolshop/js/vendor/bootstrap.min.js')}}"></script>

    <!-- Plugins JS -->
    <script src="{{asset('public/kidolshop/js/plugins/swiper-bundle.min.js')}}"></script>
    <script src="{{asset('public/kidolshop/js/plugins/jquery.countdown.min.js')}}"></script>
    <script src="{{asset('public/kidolshop/js/plugins/jquery.elevateZoom.min.js')}}"></script>
    <script src="{{asset('public/kidolshop/js/plugins/select2.min.js')}}"></script>
    <script src="{{asset('public/kidolshop/js/plugins/ajax-contact.js')}}"></script>


    <!--====== Use the minified version files listed below for better performance and remove the files listed above ======-->
    <!-- <script src="assets/js/plugins.min.js"></script> -->

    <!-- Main JS -->
    <script src="{{asset('public/kidolshop/js/main.js')}}"></script>


    <!-- Google Map js -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBQ5y0EF8dE6qwc03FcbXHJfXr4vEa7z54"></script>
    <script src="{{asset('public/kidolshop/js/map-script.js')}}"></script>
    <script src="{{asset('public/kidoldash/js/form-validate.js')}}"></script>
    <script src="{{asset('public/kidolshop/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('public/kidolshop/js/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{asset('public/kidolshop/js/dataTables.responsive.min.js')}}"></script>
    <script src="{{asset('public/kidolshop/js/responsive.bootstrap.min.js')}}"></script>

    <!-- Messenger Plugin chat Code -->
    <div id="fb-root"></div>

    <!-- Your Plugin chat code -->
    <div id="fb-customer-chat" class="fb-customerchat">
    </div>

    <script>
      var chatbox = document.getElementById('fb-customer-chat');
      chatbox.setAttribute("page_id", "102364102626836");
      chatbox.setAttribute("attribution", "biz_inbox");
    </script>

    <!-- Your SDK code -->
    <script>
      window.fbAsyncInit = function() {
        FB.init({
          xfbml            : true,
          version          : 'v15.0'
        });
      };

      (function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = 'https://connect.facebook.net/vi_VN/sdk/xfbml.customerchat.js';
        fjs.parentNode.insertBefore(js, fjs);
      }(document, 'script', 'facebook-jssdk'));
    </script>

    <!-- Modal quick view JS -->
    <script>
        $('.js-preloader').preloadinator();
        $('.js-preloader').preloadinator({
            scroll: false
        });
        $('.js-preloader').preloadinator({
            minTime: 2000
        });
        $('.js-preloader').preloadinator({
            animation: 'fadeOut',
            animationDuration: 400
        });
        
        $(document).ready(function(){  
            APP_URL = '{{url('/')}}' ;

            // Quick view sản phẩm
            $('.quick-view-pd').on('click',function(){
                var idProduct = $(this).data('id');
                var _token = $('input[name="_token"]').val();

                $.ajax({
                    url: '{{url("/quick-view-pd")}}',
                    method: 'POST',
                    data: {idProduct:idProduct, _token:_token},
                    success:function(data){
                        $('.main-wrapper').append(data);
                        $('#modal-pd-'+idProduct).modal('show');
                    }
                });
            });

            // Add to WishList
            $('.add-to-wishlist').on('click',function(){
                var idProduct = $(this).data('id');
                var _token = $('input[name="_token"]').val();
                
                if($('#idCustomer').val() == ""){
                    window.location.href = '../kidolshop/login';
                }else{
                    $.ajax({
                        url: '{{url("/add-to-wishlist")}}',
                        method: 'POST',
                        data: {idProduct:idProduct, _token:_token},
                        success:function(data){
                            $('.modal-AddToWishList').modal('show');
                        }
                    });
                } 
            });

            // Xoá 1 sp trong giỏ hàng
            $('.delete-pd-cart').on('click',function(){
                var idCart = $(this).data("id");
                var _token = $(this).data("token");

                $.ajax({
                    url: APP_URL + '/delete-pd-cart/'+idCart,
                    method: 'DELETE',
                    data: {idCart:idCart,_token:_token},
                    success:function(data){
                        location.reload();
                    }
                });
            });

            // So sánh sản phẩm
            $('.add-to-compare').on('click',function(){
                var idCategory = $(this).data('idcat');
                var idProduct = $(this).attr('id');
                var _token = $('input[name="_token"]').val();

                $.ajax({
                    url: '{{url("/modal-compare")}}',
                    method: 'POST',
                    data: {idCategory:idCategory,idProduct:idProduct, _token:_token},
                    success:function(data){
                        $('#modal-Compare').html(data);
                        $('#modal-Compare').modal('show');

                        $("#search-pd-compare").on("keyup", function() {
                            var value = $(this).val();
                            
                            $.ajax({
                                url: '{{url("/modal-compare-search")}}',
                                method: 'POST',
                                data: {idCategory:idCategory,idProduct:idProduct,value:value, _token:_token},
                                success:function(data){
                                    $('.modal-compare-body').html(data);
                                }
                            });
                        });

                        $(document).on("click",'input[type=checkbox]', function() {
                            var product_id = $(this).data("id");
                            var numberOfChecked = $('input:checkbox:checked').length;

                            if(numberOfChecked>2){
                                $('#WarningModal').modal('show');
                                $(this).prop('checked', false);
                            }else{
                                if($(this).is(":checked")){
                                    $("#product-image-"+product_id).css("border","#f379a7 3px solid");
                                    $("#product-image-"+product_id).css("border-radius","10px");
                                    $(".btn-compare").css("pointer-events","auto");
                                    $(".btn-compare").css("background-color","#f379a7");
                                    $("#product-"+product_id).val(product_id);
                                }
                                else if($(this).is(":not(:checked)")){
                                    $("#product-image-"+product_id).css("border","none");
                                    $("#product-"+product_id).val("	");
                                    $(document).ready(function(){  
                                        var $fields = $(this).find('input[name="chk_product[]"]:checked');
                                        if (!$fields.length) {
                                            $(".btn-compare").css("pointer-events","none");
                                            $(".btn-compare").css("background-color","#b9b5b5");
                                        }
                                    });
                                }
                            }
                        });

                        $('.btn-compare').on('click',function(){
                            chk_product = $("input[name='chk_product[]']:checked").map(function () {
                                return this.value;
                            }).get();
                            var cmp_pro = '';

                            for(i = 0; i < chk_product.length; i++){  
                                cmp_pro += ',' + chk_product[i];
                            }
                            window.location.href = '../kidolshop/compare?product=' +idProduct+cmp_pro;
                        });
                    }
                });
            });

            // Gợi ý tìm kiếm sản phẩm
            $('#search-input').on('keyup',function(){
                var value = $(this).val();
                var _token = $('input[name="_token"]').val();
                if(value != ''){
                    $.ajax({
                        url: '{{url("/search-suggestions")}}',
                        method: 'POST',
                        data: {value:value, _token:_token},
                        success:function(data){
                            $('.search-product').fadeIn();
                            $('.search-product').html(data);

                            $('.search-product-item').on('click',function(){
                                $('#search-input').val($(this).text());
                                $('.search-product').fadeOut();
                            });
                        }
                    });
                }else $('.search-product').fadeOut();
            });

            $('#search-input').on('blur',function(){
                $('.search-product').fadeOut();
            });

            // Bộ lọc tìm kiếm
            var category = [], tempArrayCat = [], brand = [], tempArrayBrand = [];
            url = window.location.href;

            $(".filter-product").on("click", function() 
            {
                var sort_by = $('.select-input__sort').data("sort");
                var min_price = $('.input-filter-price.min').val();
                var max_price = $('.input-filter-price.max').val();
                var min_price_filter = '';
                var max_price_filter = '';
                
                if(url.indexOf("search?keyword=") != -1){
                    var keyword = $('#keyword-link').val(); 
                    page = 'search?keyword=' +keyword;
                }else page = 'store?show=all';

                $.each( $("[data-filter='brand']:checked"), function(){
                    tempArrayBrand.push($(this).val());
                });
                tempArrayBrand.reverse();

                $.each( $("[data-filter='category']:checked"), function(){
                    tempArrayCat.push($(this).val());
                });
                tempArrayCat.reverse();
   
                if(min_price != '' && max_price != '' && parseInt(min_price) > parseInt(max_price)) $('.alert-filter-price').removeClass("d-none");
                else{
                    if(min_price != '') min_price_filter = '&priceMin=' + min_price;
                    else min_price_filter = '';

                    if(max_price != '') max_price_filter = '&priceMax=' + max_price;
                    else max_price_filter = '';

                    if(tempArrayBrand.length !== 0 && tempArrayCat.length !== 0){
                        brand += '&brand='+tempArrayBrand.toString();
                        category += '&category='+tempArrayCat.toString();
                        window.location.href = page + brand + category + min_price_filter + max_price_filter + sort_by;
                    }else if(tempArrayCat.length !== 0){
                        category += '&category='+tempArrayCat.toString();
                        window.location.href = page + category + min_price_filter + max_price_filter + sort_by;
                    }else if(tempArrayBrand.length !== 0){
                        brand += '&brand='+tempArrayBrand.toString();
                        window.location.href = page + brand + min_price_filter + max_price_filter + sort_by;
                    }else window.location.href = page + min_price_filter + max_price_filter + sort_by;
                }
            });

            $('.select-input__item').on('click',function(){
                var sort_by = $(this).data("sort");
                split_url = url.split("&sort_by");
                if(url.indexOf("?show=all") != -1 || url.indexOf("?keyword") != -1) window.location.href = split_url[0] + sort_by;
                else window.location.href = url + '?show=all' + sort_by;
            });

            $('.btn-filter-price').on('click',function(){
                var min_price = $('.input-filter-price.min').val();
                var max_price = $('.input-filter-price.max').val();
                var min_price_filter = '';
                var max_price_filter = '';

                if(min_price != '' && max_price != '' && parseInt(min_price) > parseInt(max_price)) $('.alert-filter-price').removeClass("d-none");
                else{
                    if(min_price != '') min_price_filter = '&priceMin=' + min_price;
                    else min_price_filter = '';

                    if(max_price != '') max_price_filter = '&priceMax=' + max_price;
                    else max_price_filter = '';

                    if(url.indexOf("&sort_by") != -1){
                        split_url = url.split("&sort_by");
                        if(url.indexOf("&price") != -1){
                            split_url_price = url.split("&price");                   
                            window.location.href = split_url_price[0] + min_price_filter + max_price_filter + "&sort_by" + split_url[1];
                        }
                        else window.location.href = split_url[0] + min_price_filter + max_price_filter + "&sort_by" + split_url[1];
                    }else{
                        split_url = url.split("&price");
                        if(url.indexOf("?show=all") != -1 || url.indexOf("?keyword") != -1)
                            window.location.href = split_url[0] + min_price_filter + max_price_filter;
                        else window.location.href = url + '?show=all' + min_price_filter + max_price_filter;
                    } 
                }
            });
        });
    </script>
</body>
</html>
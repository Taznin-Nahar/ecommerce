<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Home | E-Shopper</title>
    <link href="{{asset('public/frontend_resource/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('public/frontend_resource/css/font-awesome.min.css')}}" rel="stylesheet">
    <link href="{{asset('public/frontend_resource/css/prettyPhoto.css')}}" rel="stylesheet">
    <link href="{{asset('public/frontend_resource/css/price-range.css')}}" rel="stylesheet">
    <link href="{{asset('public/frontend_resource/css/animate.css')}}" rel="stylesheet">
    <link href="{{asset('public/frontend_resource/css/main.css')}}" rel="stylesheet">
    <link href="{{asset('public/frontend_resource/css/responsive.css')}}" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->       
    <link rel="shortcut icon" href="images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">
</head><!--/head-->

<body>
    <header id="header"><!--header-->
        <div class="header_top"><!--header_top-->
            <div class="container">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="contactinfo">
                            <ul class="nav nav-pills">
                                <li><a href="#"><i class="fa fa-phone"></i> +2 95 01 88 821</a></li>
                                <li><a href="#"><i class="fa fa-envelope"></i> info@domain.com</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="social-icons pull-right">
                            <ul class="nav navbar-nav">
                                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                                <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div><!--/header_top-->
        
        <div class="header-middle"><!--header-middle-->
            <div class="container">
                <div class="row">
                    <div class="col-sm-4">
                        <div class="logo pull-left">
                            <a href="{{URL::to('/')}}"><img src="{{asset('public/frontend_resource/images/home/logo.png')}}" alt="" /></a>
                        </div>
                        <div class="btn-group pull-right">
                            <div class="btn-group">
                                <button type="button" class="btn btn-default dropdown-toggle usa" data-toggle="dropdown">
                                    USA
                                    <span class="caret"></span>
                                </button>
                                <ul class="dropdown-menu">
                                    <li><a href="#">Canada</a></li>
                                    <li><a href="#">UK</a></li>
                                </ul>
                            </div>
                            
                            <div class="btn-group">
                                <button type="button" class="btn btn-default dropdown-toggle usa" data-toggle="dropdown">
                                    DOLLAR
                                    <span class="caret"></span>
                                </button>
                                <ul class="dropdown-menu">
                                    <li><a href="#">Canadian Dollar</a></li>
                                    <li><a href="#">Pound</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-8">
                        <div class="shop-menu pull-right">
                            <ul class="nav navbar-nav">
                               
                                <li><a href="{{URL::to('/checkout')}}"><i class="fa fa-crosshairs"></i> Checkout</a></li>
                                <li><a href="{{URL::to('/show-cart')}}"><i class="fa fa-shopping-cart"></i> Cart</a></li>
                                <?php 
                                    $user_id=Session::get('user_id');
                                    if ($user_id) {
                                        # code...
                                    

                                ?>
                                <li><a href="{{URL::to('/user-logout')}}"><i class="fa fa-lock"></i> logout</a></li>
                                <li>
                                  <a>  <?php echo Session::get('$user_name')?></a>

                                </li>
                                <?php
                                    }else{
                                ?>
                                <li><a href="{{URL::to('/login')}}"><i class="fa fa-lock"></i> Login</a></li>
                                <?php

                                    }
                                ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div><!--/header-middle-->

        <div class="header-bottom"><!--header-bottom-->
            <div class="container">
                <div class="row">
                    <div class="col-sm-9">
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                        </div>
                        <div class="mainmenu pull-left">
                            <ul class="nav navbar-nav collapse navbar-collapse">
                                <li><a href="{{URL::to('/')}}" class="current">Home</a></li>
                                <li class="dropdown"><a href="#">Category<i class="fa fa-angle-down"></i></a>
                                    <?php
                                        $category_data = DB::table('category')
                                                ->where('category_status',1)
                                                ->get();

                                    ?>
                                    <ul role="menu" class="sub-menu">
                                     @foreach($category_data as $vCategory)
                                         <li><a href="{{URL::to('/category-products/'.$vCategory->category_id)}}">{{$vCategory->category_name}}</a></li>
                                     @endforeach
                                    </ul>

                                        
                                        <!--  <li><a href="product-details.html">Product Details</a></li>  -->
                                       




                                        <li><a href="contact-us.html">Contact</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="search_box pull-right">
                                    <input type="text" placeholder="Search"/>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!--/header-bottom-->
            </header><!--/header-->

            @yield('main_content')

            <footer id="footer"><!--Footer-->
                <div class="footer-top">
                    <div class="row">
                        <div class="container">
                            <div class="col-sm-2">
                                <div class="companyinfo">
                                    <h2><span>e</span>-shopper</h2>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit,sed do eiusmod tempor</p>
                                </div>
                            </div>
                            <div class="col-sm-7">
                                <div class="col-sm-3">
                                    <div class="video-gallery text-center">
                                        <a href="#">
                                            <div class="iframe-img">
                                                <img src="{{asset('public/frontend_resource/images/home/iframe1.png')}}" alt="" />
                                            </div>
                                            <div class="overlay-icon">
                                                <i class="fa fa-play-circle-o"></i>
                                            </div>
                                        </a>
                                        <p>Circle of Hands</p>
                                        <h2>24 DEC 2014</h2>
                                    </div>
                                </div>

                                <div class="col-sm-3">
                                    <div class="video-gallery text-center">
                                        <a href="#">
                                            <div class="iframe-img">
                                                <img src="{{asset('public/frontend_resource/images/home/iframe2.png')}}" alt="" />
                                            </div>
                                            <div class="overlay-icon">
                                                <i class="fa fa-play-circle-o"></i>
                                            </div>
                                        </a>
                                        <p>Circle of Hands</p>
                                        <h2>24 DEC 2014</h2>
                                    </div>
                                </div>

                                <div class="col-sm-3">
                                    <div class="video-gallery text-center">
                                        <a href="#">
                                            <div class="iframe-img">
                                                <img src="{{asset('public/frontend_resource/images/home/iframe2.png')}}" alt="" />
                                            </div>
                                            <div class="overlay-icon">
                                                <i class="fa fa-play-circle-o"></i>
                                            </div>
                                        </a>
                                        <p>Circle of Hands</p>
                                        <h2>24 DEC 2014</h2>
                                    </div>
                                </div>

                                <div class="col-sm-3">
                                    <div class="video-gallery text-center">
                                        <a href="#">
                                            <div class="iframe-img">
                                                <img src="{{asset('public/frontend_resource/images/home/iframe4.png')}}" alt="" />
                                            </div>
                                            <div class="overlay-icon">
                                                <i class="fa fa-play-circle-o"></i>
                                            </div>
                                        </a>
                                        <p>Circle of Hands</p>
                                        <h2>24 DEC 2014</h2>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="address">
                                    <img src="images/home/map.png" alt="" />
                                    <p>505 S Atlantic Ave Virginia Beach, VA(Virginia)</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="footer-widget">
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-2">
                                <div class="single-widget">
                                    <h2>Service</h2>
                                    <ul class="nav nav-pills nav-stacked">
                                        <li><a href="#">Online Help</a></li>
                                        <li><a href="#">Contact Us</a></li>
                                        <li><a href="#">Order Status</a></li>
                                        <li><a href="#">Change Location</a></li>
                                        <li><a href="#">FAQ’s</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-sm-2">
                                <div class="single-widget">
                                    <h2>Quock Shop</h2>
                                    <ul class="nav nav-pills nav-stacked">
                                        <li><a href="#">T-Shirt</a></li>
                                        <li><a href="#">Mens</a></li>
                                        <li><a href="#">Womens</a></li>
                                        <li><a href="#">Gift Cards</a></li>
                                        <li><a href="#">Shoes</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-sm-2">
                                <div class="single-widget">
                                    <h2>Policies</h2>
                                    <ul class="nav nav-pills nav-stacked">
                                        <li><a href="#">Terms of Use</a></li>
                                        <li><a href="#">Privecy Policy</a></li>
                                        <li><a href="#">Refund Policy</a></li>
                                        <li><a href="#">Billing System</a></li>
                                        <li><a href="#">Ticket System</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-sm-2">
                                <div class="single-widget">
                                    <h2>About Shopper</h2>
                                    <ul class="nav nav-pills nav-stacked">
                                        <li><a href="#">Company Information</a></li>
                                        <li><a href="#">Careers</a></li>
                                        <li><a href="#">Store Location</a></li>
                                        <li><a href="#">Affillate Program</a></li>
                                        <li><a href="#">Copyright</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-sm-3 col-sm-offset-1">
                                <div class="single-widget">
                                    <h2>About Shopper</h2>
                                    <form action="#" class="searchform">
                                        <input type="text" placeholder="Your email address" />
                                        <button type="submit" class="btn btn-default"><i class="fa fa-arrow-circle-o-right"></i></button>
                                        <p>Get the most recent updates from <br />our site and be updated your self...</p>
                                    </form>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

                <div class="footer-bottom">
                    <div class="container">
                        <div class="row">
                            <p class="pull-left">Copyright © 2013 E-SHOPPER Inc. All rights reserved.</p>
                            <p class="pull-right">Designed by <span><a target="_blank" href="http://www.themeum.com">Themeum</a></span></p>
                        </div>
                    </div>
                </div>

            </footer><!--/Footer-->



            <script src="{{asset('public/frontend_resource/js/jquery.js')}}"></script>
            <script src="{{asset('public/frontend_resource/js/bootstrap.min.js')}}"></script>
            <script src="{{asset('public/frontend_resource/js/jquery.scrollUp.min.js')}}"></script>
            <script src="{{asset('public/frontend_resource/js/price-range.js')}}"></script>
            <script src="{{asset('public/frontend_resource/js/jquery.prettyPhoto.js')}}"></script>
            <script src="{{asset('public/frontend_resource/js/main.js')}}"></script>
        </body>
        </html>
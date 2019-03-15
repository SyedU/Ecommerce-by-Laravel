<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>E-BUY</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{ asset('frontend_assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend_assets/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend_assets/css/slick.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend_assets/css/meanmenu.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend_assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend_assets/css/media.css') }}">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Raleway:400,500,600,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Sacramento" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />

</head>

<body>
    <!-- Header Part Start -->
    <header id="header">
        <div class="container">
            <div class="row">
                <div class="header-content">
                    <div class="col-md-4">
                        <div class="header-left">
                            <div class="sel-box">
                                <select class="bdr">
                                    <option>ENG</option>
                                    <option>BAN</option>
                                    <option>ESP</option>
                                </select>
                            </div>
                            <div class="sel-box">
                                <select>
                                    <option>USD</option>
                                    <option>EUR</option>
                                    <option>GBP</option>
                                </select>
                            </div>
                            <div class="sel-box">
                                <a href="tel:+12345678900">Toll Free: +123 4567 8900</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-md-offset-4">
                        <div class="header-right text-right">
                            <ul>
                                <li>
                                    <a href="my-account.html"><i class="fa fa-user"></i> My Account</a>
                                </li>
                                <li>
                                    <a href="{{ url('/login') }}">Login / Register</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- Header Part End -->

    <!-- mobile menu end -->
    <nav class="mobile-menu hidden">
        <a href="index.html">
            <img src="{{ asset('frontend_assets/images/logo.png') }}" alt="logo">
        </a>
        <ul>
            <li class="">
                <a href="{{ '/' }}">
                    Home
                </a>
            </li>
            <li class="">
                <a href="about.html">
                    About
                </a>
            </li>
            <li class="">
                <a class="" href="product-grid-view-with-sidebar.html">
                    Shop
                </a>
            </li>
            <li class="">
                <a class="" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Pages
                </a>
                <ul>
                    <a class="" href="about.html">About</a>
                    <a class="" href="{{ '/cart' }}">Cart</a>
                    <a class="" href="checkout.html">Checkout</a>
                    <a class="" href="my-account.html">Login</a>
                    <a class="" href="my-account.html">Register</a>
                    <a class="" href="404.html">404</a>
                </ul>
            </li>
            <li><a href="contact.html">Contact</a></li>
        </ul>
    </nav>
    <!-- mobile menu end -->

    <!-- Navbar Part Start -->
    <nav class="navbar navbar-default hidden-xs">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html">
                    <img src="{{ asset('frontend_assets/images/logo.png') }}" alt="logo" class="img-responsive">
                </a>
            </div>
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <!--            <li class="active"><a href="index.html">Home</a></li>-->
                    <!--            <li><a href="product-grid-view.html">Men</a></li>-->
                    <!--            <li><a href="product-grid-view-with-sidebar.html">Women</a></li>-->
                    <!--            <li><a href="product-list-view-with-sidebar.html">Accesorries</a></li>-->
                    <!--            <li><a href="blog-grid-view.html">Blog</a></li>-->
                    <li class="nav-item dropdown">
                        <a href="{{ url('/') }}">
                            Home
                        </a>
                    </li>
                    <li><a class="dropdown-item" href="about.html">About</a></li>
                    <li class="nav-item dropdown">
                        <a href="product-grid-view-with-sidebar.html">
                            Shop
                        </a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Pages
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ url('/cart') }}">Cart</a>
                            <a class="dropdown-item" href="checkout.html">Checkout</a>
                            <a class="dropdown-item" href="my-account.html">Login</a>
                            <a class="dropdown-item" href="my-account.html">Register</a>
                            <a class="dropdown-item" href="404.html">404</a>
                        </div>
                    </li>
                    <li><a href="contact.html">Contact</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                  @php
                    $ip_address = $_SERVER['REMOTE_ADDR'];
                  @endphp
                    <li class="tahsan"><span><a href="#"><i class="fa fa-shopping-bag"></i>{{ Total_Cart_Item() }} items</a>
                        </span>

                        <div class="items text-left">
                            <div class="items-total">
                                <p>You have <span>02 items</span> in your shopping bag</p>
                            </div>
                            <div class="item-choose-main">
                                <div class="item-choose">
                                    <ul>
                                        <li>
                                            <img src="images/items1.png" alt="item1" class="img-responsive">
                                        </li>
                                        <li>
                                            <h3>T-shirt for Women</h3>
                                            <p>Price : $ 99.00</p>
                                            <p>Qty : 02</p>
                                        </li>
                                        <li>
                                            <i class="fa fa-trash-o"></i>
                                        </li>
                                    </ul>
                                </div>
                                <div class="item-choose">
                                    <ul>
                                        <li>
                                            <img src="images/items2.png" alt="item1" class="img-responsive">
                                        </li>
                                        <li>
                                            <h3>T-shirt for Women</h3>
                                            <p>Price : $ 99.00</p>
                                            <p>Qty : 02</p>
                                        </li>
                                        <li>
                                            <i class="fa fa-trash-o"></i>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="total-price">
                                <h3>Total <span>$ 500.00</span></h3>
                            </div>
                            <div class="items-check text-center">
                                <a href="#">view cart</a>
                                <a class="check-out" href="#">Checkout</a>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Navbar Part End -->

    <!-- mobile logo start -->
    <nav class="navbar-default visible-xs">
        <div class="container">
            <div class="navbar-header">
                <a class="navbar-brand" href="index.html">
                    <img src="images/logo.png" alt="logo" class="img-responsive">
                </a>
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <form class="search-form">
                            <div class="form-group has-feedback">
                                <input type="text" class="form-control" name="search" placeholder="search">
                                <span class="glyphicon glyphicon-search form-control-feedback"></span>
                            </div>
                        </form>
                    </li>
                    <li class="tahsan"><span><a href="#"><i class="fa fa-shopping-bag"></i> 2 Items</a>
                        </span>

                        <div class="items text-left">
                            <div class="items-total">
                                <p>You have <span>02 items</span> in your shopping bag</p>
                            </div>
                            <div class="item-choose-main">
                                <div class="item-choose">
                                    <ul>
                                        <li>
                                            <img src="images/items1.png" alt="item1" class="img-responsive">
                                        </li>
                                        <li>
                                            <h3>T-shirt for Women</h3>
                                            <p>Price : $ 99.00</p>
                                            <p>Qty : 02</p>
                                        </li>
                                        <li>
                                            <i class="fa fa-trash-o"></i>
                                        </li>
                                    </ul>
                                </div>
                                <div class="item-choose">
                                    <ul>
                                        <li>
                                            <img src="images/items2.png" alt="item1" class="img-responsive">
                                        </li>
                                        <li>
                                            <h3>T-shirt for Women</h3>
                                            <p>Price : $ 99.00</p>
                                            <p>Qty : 02</p>
                                        </li>
                                        <li>
                                            <i class="fa fa-trash-o"></i>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="total-price">
                                <h3>Total <span>$ 500.00</span></h3>
                            </div>
                            <div class="items-check text-center">
                                <a href="#">view cart</a>
                                <a class="check-out" href="#">Checkout</a>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- mobile logo end -->

	@yield('content')

        <script src="{{ asset('frontend_assets/js/jquery-1.12.4.min.js') }}"></script>
        <script src="{{ asset('frontend_assets/js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('frontend_assets/js/slick.js') }}"></script>
        <script src="{{ asset('frontend_assets/js/jquery.countdown.min.js') }}"></script>
        <script src="{{ asset('frontend_assets/js/jquery.meanmenu.min.js') }}"></script>
        <script src="{{ asset('frontend_assets/js/handleCounter.js') }}"></script>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Counter-Up/1.0.0/jquery.counterup.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
        <script src="{{ asset('frontend_assets/js/main.js') }}"></script>

  @yield('footer_scripts')

    </body>

    </html>

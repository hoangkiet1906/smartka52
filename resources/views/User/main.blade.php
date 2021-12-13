<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>SmartKa</title>
    <meta name="robots" content="noindex, follow" />
    <meta name="description"
        content="Urdan Minimal eCommerce Bootstrap 5 Template is a stunning eCommerce website template that is the best choice for any online store.">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="https://gmpg.org/xfn/11">
    <link rel="canonical" href="https://htmldemo.hasthemes.com/urdan/index.html" />
    <script>(function(w, d) { w.CollectId = "60ab5a50154f895c94bb9f7c"; var h = d.head || d.getElementsByTagName("head")[0]; var s = d.createElement("script"); s.setAttribute("type", "text/javascript"); s.async=true; s.setAttribute("src", "https://collectcdn.com/launcher.js"); h.appendChild(s); })(window, document);</script>
    <!-- Open Graph (OG) meta tags are snippets of code that control how URLs are displayed when shared on social media  -->
    <meta property="og:locale" content="en_US" />
    <meta property="og:type" content="website" />
    <meta property="og:title" content="Urdan - Minimal eCommerce HTML Template" />
    <meta property="og:url" content="https://htmldemo.hasthemes.com/urdan/index.html" />
    <meta property="og:site_name" content="Urdan - Minimal eCommerce HTML Template" />
    <!-- For the og:image content, replace the # with a link of an image -->
    <meta property="og:image" content="#" />
    <meta property="og:description"
        content="Urdan Minimal eCommerce Bootstrap 5 Template is a stunning eCommerce website template that is the best choice for any online store." />
    <!-- Add site Favicon -->
    <link rel="icon" href="{{ asset('User/assets/images/favicon/cropped-favicon-32x32.png') }}" sizes="32x32" />
    <link rel="icon" href="{{ asset('User/assets/images/favicon/cropped-favicon-192x192.png') }}" sizes="192x192" />
    <link rel="apple-touch-icon" href="{{ asset('User/assets/images/favicon/cropped-favicon-180x180.png') }}" />
    <meta name="msapplication-TileImage"
        content="{{ asset('User/assets/images/favicon/cropped-favicon-270x270.png') }}" />

    <!-- All CSS is here
 ============================================ -->
    <link rel="stylesheet" href="{{ asset('User/assets/css/vendor/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('User/assets/css/vendor/pe-icon-7-stroke.css') }}" />
    <link rel="stylesheet" href="{{ asset('User/assets/css/vendor/themify-icons.css') }}" />
    <link rel="stylesheet" href="{{ asset('User/assets/css/vendor/font-awesome.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('User/assets/css/plugins/animate.css') }}" />
    <link rel="stylesheet" href="{{ asset('User/assets/css/plugins/aos.css') }}" />
    <link rel="stylesheet" href="{{ asset('User/assets/css/plugins/magnific-popup.css') }}" />
    <link rel="stylesheet" href="{{ asset('User/assets/css/plugins/swiper.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('User/assets/css/plugins/jquery-ui.css') }}" />
    <link rel="stylesheet" href="{{ asset('User/assets/css/plugins/nice-select.css') }}" />
    <link rel="stylesheet" href="{{ asset('User/assets/css/plugins/select2.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('User/assets/css/plugins/easyzoom.css') }}" />
    <link rel="stylesheet" href="{{ asset('User/assets/css/plugins/slinky.css') }}" />
    <link rel="stylesheet" href="{{ asset('User/assets/css/style.css') }}" />
    <link rel="stylesheet" href="https://lipis.github.io/bootstrap-sweetalert/dist/sweetalert.css" />
    
</head>




<body>
    <div class="main-wrapper main-wrapper-2">
        <header class="header-area header-responsive-padding header-height-1">
            <div class="header-top d-none d-lg-block bg-gray">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-6 col-6">
                            <div class="welcome-text">
                                <p>{{ $title }} </p>
                            </div>
                        </div>
                        <div class="col-lg-6 col-6">
                            <div class="language-currency-wrap">
                                <div class="currency-wrap border-style">
                                    <a class="currency-active" href="#">$ Dollar (US) <i
                                            class=" ti-angle-down "></i></a>
                                    <div class="currency-dropdown">
                                        <ul>
                                            <li><a href="#">Taka (BDT) </a></li>
                                            <li><a href="#">Riyal (SAR) </a></li>
                                            <li><a href="#">Rupee (INR) </a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="language-wrap">
                                    <a class="language-active" href="#"><img
                                            src="{{ asset('User/assets/images/icon-img/flag.png') }}" alt=""> English
                                        <i class=" ti-angle-down "></i></a>
                                    <div class="language-dropdown">
                                        <ul>
                                            <li><a href="#"><img
                                                        src="{{ asset('User/assets/images/icon-img/flag.png') }}"
                                                        alt="">English </a></li>
                                            <li><a href="#"><img
                                                        src="{{ asset('User/assets/images/icon-img/spanish.png') }}"
                                                        alt="">Spanish</a></li>
                                            <li><a href="#"><img
                                                        src="{{ asset('User/assets/images/icon-img/arabic.png') }}"
                                                        alt="">Arabic </a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="header-bottom sticky-bar">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-3 col-md-6 col-6">
                            <div class="logo">
                                <a href="{{ route('home') }}"><img
                                        src="{{ asset('User/assets/images/logo/logo.png') }}" alt="logo"></a>
                            </div>
                        </div>
                        <div class="col-lg-6 d-none d-lg-block">
                            <div class="main-menu text-center">
                                <nav>
                                    <ul>
                                        <li><a href="{{ route('home') }}">HOME</a>

                                        </li>
                                        <li><a href="{{ route('shop') }}">SHOP</a>
                                        </li>
                                        <li><a href="#">PAGES</a>
                                            <ul class="sub-menu-style">
                                                <li><a href="{{ route('aboutUs') }}">about us </a></li>
                                                <li><a href="{{ route('cart') }}">cart page</a></li>
                                                <li><a href="{{ route('checkout') }}">checkout </a></li>
                                                <li><a href="{{ route('myaccount') }}">my account</a></li>
                                                <li><a href="{{ route('contactUs') }}">contact us </a></li>
                                            </ul>
                                        </li>
                                        <li><a href="{{ route('blog') }}">BLOG</a>
                                        </li>
                                        <li><a href="{{ route('aboutUs') }}">ABOUT</a></li>
                                        <li><a href="{{ route('contactUs') }}">CONTACT US</a></li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-6">
                            <div class="header-action-wrap">
                                <div class="header-action-style header-search-1">
                                    <a class="search-toggle" href="#">
                                        <i class="pe-7s-search s-open"></i>
                                        <i class="pe-7s-close s-close"></i>
                                    </a>
                                    <div class="search-wrap-1">
                                        <form action="#">
                                            <input placeholder="Search products…" type="text">
                                            <button class="button-search"><i class="pe-7s-search"></i></button>
                                        </form>
                                    </div>
                                </div>
                                <div class="header-action-style">
                                    <a title="Login Register" href="{{ route($login) }}"><i
                                            class="pe-7s-user"></i></a>
                                </div>
                                <div class="header-action-style">
                                    <a title="Wishlist" href="wishlist.html"><i class="pe-7s-like"></i></a>
                                </div>
                                <div class="header-action-style header-action-cart">
                                    @if ($title == 'Hi')
                                        <a class="" href="{{ route($login) }}"><i
                                                class="pe-7s-shopbag"></i></a>
                                    @else
                                        <a class="cart-active" href=""><i class="pe-7s-shopbag"></i>
                                            <span
                                                class="product-count bg-black">{{ Session::get('Scartactive')->count() }}</span>
                                        </a>
                                    @endif
                                </div>
                                <div class="header-action-style d-block d-lg-none">
                                    <a class="mobile-menu-active-button" href="#"><i class="pe-7s-menu"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- mini cart start -->
        @if ($title != 'Hi')
            <div class="sidebar-cart-active">
                <div class="sidebar-cart-all">
                    <a class="cart-close" href="#"><i class="pe-7s-close"></i></a>
                    <div class="cart-content">
                        <h3>Shopping Cart</h3>
                        <ul>
                            @php
                                $totals = 0;
                            @endphp
                            @foreach (Session::get('Scartactive') as $pa)

                                <li>
                                    <div class="cart-img">
                                        <a href="/product?id={{ $pa->id }}"><img
                                                src="{{ asset('User') }}/assets/images/product/{{ $pa->image }}"
                                                alt=""></a>
                                    </div>
                                    <div class="cart-title">
                                        <h4><a href="#">{{ $pa->name }}</a></h4>
                                        <span> {{ $pa->cartquantity }} × ${{ $pa->price }} </span>
                                    </div>
                                </li>
                                @php
                                    $totals += $pa->price * $pa->cartquantity;
                                @endphp
                            @endforeach
                        </ul>
                        <div class="cart-total">
                            <h4>Subtotal: <span>${{ $totals }}</span></h4>
                        </div>
                        <div class="cart-btn btn-hover">
                            <a class="theme-color" href="{{ route('cart') }}">view cart</a>
                        </div>
                        <div class="checkout-btn btn-hover">
                            <a class="theme-color" href="{{ route('cart') }}">checkout</a>
                        </div>
                    </div>
                </div>
            </div>
        @endif
        
            
        @yield('content')

        <footer class="footer-area">
            <div class="bg-gray-2">
                <div class="container">
                    <div class="footer-top pt-80 pb-35">
                        <div class="row">
                            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                                <div class="footer-widget footer-about mb-40">
                                    <div class="footer-logo">
                                        <a href="{{ route('home') }}"><img
                                                src="{{ asset('User/assets/images/logo/logo.png') }}" alt="logo"></a>
                                    </div>
                                    <p>SmartKa ipsum dolor sit amet, cons adipi elit, sed do eiusmod tempor incididunt ut
                                        aliqua.</p>
                                    <div class="payment-img">
                                        <a href="#"><img src="{{ asset('User/assets/images/icon-img/payment.png') }}"
                                                alt="logo"></a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                                <div class="footer-widget footer-widget-margin-1 footer-list mb-40">
                                    <h3 class="footer-title">Information</h3>
                                    <ul>
                                        <li><a href="{{ route('aboutUs') }}">About Us</a></li>
                                        <li><a href="#">Delivery Information</a></li>
                                        <li><a href="#">Privacy Policy</a></li>
                                        <li><a href="#">Terms & Conditions</a></li>
                                        <li><a href="#">Customer Service</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-6 col-sm-6 col-12">
                                <div class="footer-widget footer-list mb-40">
                                    <h3 class="footer-title">My Accound</h3>
                                    <ul>
                                        <li><a href="{{ route('myaccount') }}">My Account</a></li>
                                        <li><a href="#">Order History</a></li>
                                        <li><a href="wishlist.html">Wish List</a></li>
                                        <li><a href="#">Newsletter</a></li>
                                        <li><a href="#">Order History</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                                <div class="footer-widget footer-widget-margin-2 footer-address mb-40">
                                    <h3 class="footer-title">Get in touch</h3>
                                    <ul>
                                        <li><span>Address: </span>Your address goes here </li>
                                        <li><span>Telephone Enquiry:</span> (+84) 347898273</li>
                                        <li><span>Email: </span>joker1962002@gmail.com</li>
                                    </ul>
                                    <div class="open-time">
                                        <p>Open : <span>8:00 AM</span> - Close : <span>18:00 PM</span></p>
                                        <p>Saturday - Sunday : Close</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!-- Mobile Menu start -->
        <div class="off-canvas-active">
            <a class="off-canvas-close"><i class=" ti-close "></i></a>
            <div class="off-canvas-wrap">
                <div class="welcome-text off-canvas-margin-padding">
                    <p>{{ $title }}</p>
                </div>
                <div class="mobile-menu-wrap off-canvas-margin-padding-2">
                    <div id="mobile-menu" class="slinky-mobile-menu text-left">
                        <ul>
                            <li>
                                <a href="{{ route('home') }}">HOME</a>

                            </li>
                            <li>
                                <a href="{{ route('shop') }}">SHOP</a>

                            </li>
                            <li>
                                <a href="#">PAGES </a>
                                <ul>
                                    <li><a href="{{ route('aboutUs') }}">about us </a></li>
                                    <li><a href="{{ route('cart') }}">cart page</a></li>
                                    <li><a href="{{ route('checkout') }}">checkout </a></li>
                                    <li><a href="{{ route('myaccount') }}">my account</a></li>
                                    <li><a href="{{ route('contactUs') }}">contact us </a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="{{ route('blog') }}">BLOG </a>
                            </li>
                            <li>
                                <a href="{{ route('aboutUs') }}">ABOUT US</a>
                            </li>
                            <li>
                                <a href="{{ route('contactUs') }}">CONTACT US</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="language-currency-wrap language-currency-wrap-modify">
                    <div class="currency-wrap border-style">
                        <a class="currency-active" href="#">$ Dollar (US) <i class=" ti-angle-down "></i></a>
                        <div class="currency-dropdown">
                            <ul>
                                <li><a href="#">Taka (BDT) </a></li>
                                <li><a href="#">Riyal (SAR) </a></li>
                                <li><a href="#">Rupee (INR) </a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="language-wrap">
                        <a class="language-active" href="#"><img
                                src="{{ asset('User/assets/images/icon-img/flag.png') }}" alt=""> English <i
                                class=" ti-angle-down "></i></a>
                        <div class="language-dropdown">
                            <ul>
                                <li><a href="#"><img src="{{ asset('User/assets/images/icon-img/flag.png') }}"
                                            alt="">English </a></li>
                                <li><a href="#"><img src="{{ asset('User/assets/images/icon-img/spanish.png') }}"
                                            alt="">Spanish</a></li>
                                <li><a href="#"><img src="{{ asset('User/assets/images/icon-img/arabic.png') }}"
                                            alt="">Arabic </a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- All JS is here -->
    <script src="{{ asset('User/assets/js/vendor/modernizr-3.11.2.min.js') }}"></script>
    <script src="{{ asset('User/assets/js/vendor/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('User/assets/js/vendor/jquery-migrate-3.3.2.min.js') }}"></script>
    <script src="{{ asset('User/assets/js/vendor/popper.min.js') }}"></script>
    <script src="{{ asset('User/assets/js/vendor/bootstrap.min.js') }}"></script>
    <script src="{{ asset('User/assets/js/plugins/wow.js') }}"></script>
    <script src="{{ asset('User/assets/js/plugins/scrollup.js') }}"></script>
    <script src="{{ asset('User/assets/js/plugins/aos.js') }}"></script>
    <script src="{{ asset('User/assets/js/plugins/magnific-popup.js') }}"></script>
    <script src="{{ asset('User/assets/js/plugins/jquery.syotimer.min.js') }}"></script>
    <script src="{{ asset('User/assets/js/plugins/swiper.min.js') }}"></script>
    <script src="{{ asset('User/assets/js/plugins/imagesloaded.pkgd.min.js') }}"></script>
    <script src="{{ asset('User/assets/js/plugins/isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset('User/assets/js/plugins/jquery-ui.js') }}"></script>
    <script src="{{ asset('User/assets/js/plugins/jquery-ui-touch-punch.js') }}"></script>
    <script src="{{ asset('User/assets/js/plugins/jquery.nice-select.min.js') }}"></script>
    <script src="{{ asset('User/assets/js/plugins/waypoints.min.js') }}"></script>
    <script src="{{ asset('User/assets/js/plugins/counterup.min.js') }}"></script>
    <script src="{{ asset('User/assets/js/plugins/select2.min.js') }}"></script>
    <script src="{{ asset('User/assets/js/plugins/easyzoom.js') }}"></script>
    <script src="{{ asset('User/assets/js/plugins/slinky.min.js') }}"></script>
    <script src="{{ asset('User/assets/js/plugins/ajax-mail.js') }}"></script>
    <!-- Main JS -->
    <script src="{{ asset('User/assets/js/main.js') }}"></script>
    <script src="{{ asset('User/assets/js/all.min.js') }}"></script>
    <script src="{{ asset('User/assets/js/mic.js') }}"></script>

    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.add2cart').click(function() {
                var id = $(this).data('idpro');
                //alert(id);
                var c_cartquantity = 1;
                // pro_id_
                var c_id = $('.pro_id_' + id).val();
                var c_name = $('.pro_name_' + id).val();
                var c_price = $('.pro_price_' + id).val();
                var c_image = $('.pro_image_' + id).val();
                var _token = $('input[name="_token"]').val();
                // alert(c_name);
                $.ajax({
                    type: "post",
                    url: '{{ url('/addCartAjax') }}',
                    data: {
                        c_id: c_id,
                        c_cartquantity: c_cartquantity,
                        c_name: c_name,
                        c_price: c_price,
                        c_image: c_image,
                        _token: _token
                    },
                    //dataType: "dataType",
                    success: function(response) {
                        swal("Success", response, "success");
                    }
                });


            });
        });
    </script>
</body>

</html>

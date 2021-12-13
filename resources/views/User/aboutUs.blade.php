@extends('User.main')
@section('content')



<div class="breadcrumb-area bg-gray-4 breadcrumb-padding-1" style="background-image: url({{ asset('User/assets/images/slider/nen3.jpg')}})">
        <div class="container">
            <div class="breadcrumb-content text-center">
                <h2 data-aos="fade-up" data-aos-delay="200">About Us</h2>
                <ul data-aos="fade-up" data-aos-delay="400">
                    <li><a href="index.html">Home</a></li>
                    <li><i class="ti-angle-right"></i></li>
                    <li>About Us</li>
                </ul>
                @if (Session::get('Suser_name') != null)
                    <img id="img" style="width: 27%; position: absolute; left: 36.5%; top:-90%; border-radius:50%;"
                        src="{{ asset('User') }}/assets/images/avatar/{{ Session::get('Savatar') }}">
                @endif
            </div>
        </div>
        <div class="breadcrumb-img-1" data-aos="fade-right" data-aos-delay="200">
            <img src="{{ asset('User/assets/images/banner/light.jpg')}}" alt="">
        </div>
        <div class="breadcrumb-img-2" data-aos="fade-left" data-aos-delay="200">
            <img src="{{ asset('User/assets/images/banner/safe.jpg')}}" alt="">
        </div>
    </div>
    <div class="about-us-area pt-100 pb-100">
        <div class="container">
            <div class="row align-items-center flex-row-reverse">
                <div class="col-lg-6">
                    <div class="about-content text-center">
                        <h2 data-aos="fade-up" data-aos-delay="200">Smarthome</h2>
                        <h1 data-aos="fade-up" data-aos-delay="300">Best Smarthome</h1>
                        <p data-aos="fade-up" data-aos-delay="400">Smarthome is one of the world's largest home automation
                            retailers, becoming an easy-to-use source for affordable devices - including smart lighting
                            control, smart thermostats, smart home security, wireless cameras, doorbell cameras, door locks,
                            and much more - all of which the average do-it-yourselfer can safely install. Our team of
                            product specialists strive to deliver new, cutting-edge products at the best possible prices.
                        </p>
                        <p class="mrg-inc" data-aos="fade-up" data-aos-delay="500">Looking for smart home devices?
                            Welcome to the Smartka smart home store, where you'll find great prices on a variety of smart
                            products to automate your home?</p>
                        <div class="btn-style-3 btn-hover" data-aos="fade-up" data-aos-delay="600">
                            <a class="btn border-radius-none" href="{{ route('shop') }}">Shop Now</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="about-img" data-aos="fade-up" data-aos-delay="400">
                        <img src="{{ asset('User/assets/images/banner/about-uss.png') }}" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="banner-area pb-100">
        <div class="bg-img bg-padding-2" style="background-image:url({{ asset('User/assets/images/bg/b-2.jpg)') }}">
            <div class="container">
                <div class="banner-content-5 banner-content-5-static">
                    <span data-aos="fade-up" data-aos-delay="200" style="background-color: rgb(109, 168, 245)">Up To 10%
                        Off</span>
                    <h1 data-aos="fade-up" data-aos-delay="400">New Equipment <br>Vacuum Cleaner</h1>
                    <div class="btn-style-3 btn-hover" data-aos="fade-up" data-aos-delay="600">
                        <a class="btn border-radius-none" href="{{ route('shop') }}">Shop Now</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="testimonial-area pb-100">
        <div class="container">
            <div class="section-title-2 st-border-center text-center mb-75" data-aos="fade-up" data-aos-delay="200">
                <h2>Testimonial</h2>
            </div>
            <div class="testimonial-active swiper-container">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <div class="single-testimonial" data-aos="fade-up" data-aos-delay="200">
                            <div class="testimonial-img">
                                <img src="{{ asset('User/assets/images/testimonial/client-1.png') }}" alt="">
                            </div>
                            <p>After experiencing it, I think it is a good product, worthy of everyone's trust and use. Not
                                only the price is reasonable, the quality is also very guaranteed.</p>
                            <div class="testimonial-info">
                                <h4>Amrita Sha</h4>
                                <span> Our Client.</span>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="single-testimonial" data-aos="fade-up" data-aos-delay="400">
                            <div class="testimonial-img">
                                <img src="{{ asset('User/assets/images/testimonial/client-2.png') }}" alt="">
                            </div>
                            <p>After experiencing it, I think it is a good product, worthy of everyone's trust and use. Not
                                only the price is reasonable, the quality is also very guaranteed.</p>
                            <div class="testimonial-info">
                                <h4>Andi Lane</h4>
                                <span> Designer.</span>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="single-testimonial" data-aos="fade-up" data-aos-delay="600">
                            <div class="testimonial-img">
                                <img src="{{ asset('User/assets/images/testimonial/client-1.png') }}" alt="">
                            </div>
                            <p>After experiencing it, I think it is a good product, worthy of everyone's trust and use. Not
                                only the price is reasonable, the quality is also very guaranteed.</p>
                            <div class="testimonial-info">
                                <h4>Ted Ellison</h4>
                                <span> Developer.</span>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="single-testimonial">
                            <div class="testimonial-img">
                                <img src="{{ asset('User/assets/images/testimonial/client-2.png') }}" alt="">
                            </div>
                            <p>After experiencing it, I think it is a good product, worthy of everyone's trust and use. Not
                                only the price is reasonable, the quality is also very guaranteed.</p>
                            <div class="testimonial-info">
                                <h4>Aliah Pitts</h4>
                                <span> Customer.</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="funfact-area bg-img pt-100 pb-70"
        style="background-image:url({{ asset('User/assets/images/bg/b-4.jpg)') }}">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-3 col-sm-6 col-6">
                    <div class="single-funfact text-center mb-30" data-aos="fade-up" data-aos-delay="200">
                        <div class="funfact-img">
                            <img src="{{ asset('User/assets/images/icon-img/client.png') }}" alt="">
                        </div>
                        <h2 class="count">120</h2>
                        <span>Happy Clients</span>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-6">
                    <div class="single-funfact text-center mb-30" data-aos="fade-up" data-aos-delay="400">
                        <div class="funfact-img">
                            <img src="{{ asset('User/assets/images/icon-img/award.png') }}" alt="">
                        </div>
                        <h2 class="count">90</h2>
                        <span>Award Winning</span>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-6">
                    <div class="single-funfact text-center mb-30" data-aos="fade-up" data-aos-delay="600">
                        <div class="funfact-img">
                            <img src="{{ asset('User/assets/images/icon-img/item.png') }}" alt="">
                        </div>
                        <h2 class="count">230</h2>
                        <span>Totel Items</span>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-6">
                    <div class="single-funfact text-center mb-30 mrgn-none" data-aos="fade-up" data-aos-delay="800">
                        <div class="funfact-img">
                            <img src="{{ asset('User/assets/images/icon-img/cup.png') }}" alt="">
                        </div>
                        <h2 class="count">350</h2>
                        <span>Cups of Coffee</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="team-area pt-100 pb-70">
        <div class="container">
            <div class="section-title-2 st-border-center text-center mb-75" data-aos="fade-up" data-aos-delay="200">
                <h2>Administrators</h2>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-4 col-12">
                    <div class="single-team-wrap text-center mb-30" data-aos="fade-up" data-aos-delay="200">
                        <img src="{{ asset('User/assets/images/team/trinh.jpg') }}" alt="">
                        <div class="team-info-position">
                            <div class="team-info">
                                <h3>Trinh</h3>
                                <span>Developer</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4 col-12">
                    <div class="single-team-wrap text-center mb-30" data-aos="fade-up" data-aos-delay="400">
                        <img src="{{ asset('User/assets/images/avatar/kietr.jpg') }}" alt="">
                        <div class="team-info-position">
                            <div class="team-info">
                                <h3>Hoang Kiet</h3>
                                <span>Developer</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4 col-12">
                    <div class="single-team-wrap text-center mb-30" data-aos="fade-up" data-aos-delay="600">
                        <img src="{{ asset('User/assets/images/avatar/hai.jpg') }}" alt="">
                        <div class="team-info-position">
                            <div class="team-info">
                                <h3>Quang Hai</h3>
                                <span>Developer</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="subscribe-area pb-100">
        <div class="container">
            <div class="section-title-3 text-center mb-55" data-aos="fade-up" data-aos-delay="200">
                <h2>Join With Us!</h2>
                <p>Subscribe now to get the latest & greatest news on smart home products & receive special offers only for
                    our newsletter subscribers. Unsubscribe at any time.</p>
            </div>
            <div class="row">
                <div class="col-lg-8 offset-lg-2">
                    <div id="mc_embed_signup" class="subscribe-form" data-aos="fade-up" data-aos-delay="400">
                        <form id="mc-embedded-subscribe-form" class="validate subscribe-form-style" novalidate=""
                            target="_blank" name="mc-embedded-subscribe-form" action="">
                            <div id="mc_embed_signup_scroll" class="mc-form">
                                <input class="email" type="email" required="" placeholder="Email address…"
                                    name="EMAIL" value="">
                                <div class="mc-news" aria-hidden="true">
                                    <input type="text" value="" tabindex="-1" name="b_6bbb9b6f5827bd842d9640c82_05d85f18ef">
                                </div>
                                <div class="clear">
                                    <input id="mc-embedded-subscribe" class="button" type="submit" name="subscribe"
                                        value="Subscribe Now">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Mobile Menu start -->
    <div class="off-canvas-active">
        <a class="off-canvas-close"><i class=" ti-close "></i></a>
        <div class="off-canvas-wrap">
            <div class="welcome-text off-canvas-margin-padding">
                <p>Default Welcome Msg! </p>
            </div>
            <div class="mobile-menu-wrap off-canvas-margin-padding-2">
                <div id="mobile-menu" class="slinky-mobile-menu text-left">
                    <ul>
                        <li>
                            <a href="#">HOME</a>
                            <ul>
                                <li><a href="index.html">Home version 1 </a></li>
                                <li><a href="index-2.html">Home version 2</a></li>
                                <li><a href="index-3.html">Home version 3</a></li>
                                <li><a href="index-4.html">Home version 4</a></li>
                                <li><a href="index-5.html">Home version 5</a></li>
                                <li><a href="index-6.html">Home version 6</a></li>
                                <li><a href="index-7.html">Home version 7</a></li>
                                <li><a href="index-8.html">Home version 8</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="#">SHOP</a>
                            <ul>
                                <li>
                                    <a href="#">Shop Layout</a>
                                    <ul>
                                        <li><a href="shop.html">Standard Style</a></li>
                                        <li><a href="shop-sidebar.html">Shop Grid Sidebar</a></li>
                                        <li><a href="shop-list.html">Shop List Style</a></li>
                                        <li><a href="shop-list-sidebar.html">Shop List Sidebar</a></li>
                                        <li><a href="shop-right-sidebar.html">Shop Right Sidebar</a></li>
                                        <li><a href="shop-location.html">Store Location</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="#">Product Layout</a>
                                    <ul>
                                        <li><a href="product-details.html">Tab Style 1</a></li>
                                        <li><a href="product-details-2.html">Tab Style 2</a></li>
                                        <li><a href="product-details-gallery.html">Gallery style </a></li>
                                        <li><a href="product-details-affiliate.html">Affiliate style</a></li>
                                        <li><a href="product-details-group.html">Group Style</a></li>
                                        <li><a href="product-details-fixed-img.html">Fixed Image Style </a></li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="#">PAGES </a>
                            <ul>
                                <li><a href="about-us.html">About Us </a></li>
                                <li><a href="cart.html">Cart Page</a></li>
                                <li><a href="checkout.html">Checkout </a></li>
                                <li><a href="my-account.html">My Account</a></li>
                                <li><a href="wishlist.html">Wishlist </a></li>
                                <li><a href="compare.html">Compare </a></li>
                                <li><a href="contact-us.html">Contact us </a></li>
                                <li><a href="login-register.html">Login / Register </a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="#">BLOG </a>
                            <ul>
                                <li><a href="blog.html">Blog Standard </a></li>
                                <li><a href="blog-sidebar.html">Blog Sidebar</a></li>
                                <li><a href="blog-details.html">Blog Details</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="about-us.html">ABOUT US</a>
                        </li>
                        <li>
                            <a href="contact-us.html">CONTACT US</a>
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
                    <a class="language-active" href="#"><img src="{{ asset('User/assets/images/icon-img/flag.png') }}"
                            alt=""> English <i class=" ti-angle-down "></i></a>
                    <div class="language-dropdown">
                        <ul>
                            <li><a href="#"><img src="{{ asset('User/assets/images/icon-img/flag.png') }}" alt="">English
                                </a></li>
                            <li><a href="#"><img src="{{ asset('User/assets/images/icon-img/spanish.png') }}"
                                        alt="">Spanish</a></li>
                            <li><a href="#"><img src="{{ asset('User/assets/images/icon-img/arabic.png') }}"
                                        alt="">Arabic
                                </a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

@stop

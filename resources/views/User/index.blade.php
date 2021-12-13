@extends('User.main')
@section('content')
<?php use Carbon\Carbon;?>
<div class="slider-area">
    <div class="slider-active swiper-container">
        <div class="swiper-wrapper">
            <div class="swiper-slide">
                <div class="intro-section slider-height-1 slider-content-center bg-img single-animation-wrap slider-bg-color-2"
                    style="background-image:url({{ asset('User/assets/images/slider/nen1.jpg')}})">
                    <div class="container">
                        <div class="row">
                            <div class="col-12 hm2-slider-animation">
                                <div class="slider-content-2 slider-content-2-wrap slider-animated-2">
                                    <h3 class="animated">Up To 40% Off</h3>
                                    <h1 class="animated">Summer <br>Collection</h1>
                                    <div class="slider-btn-2 btn-hover">
                                        <a href="{{ route('shop') }}"
                                            class="btn hover-border-radius theme-color animated">
                                            Shop Now
                                        </a>
                                    </div>
                                    
                                    <img class="animated" src="{{ asset('User/assets/images/icon-img/sale.png')}}"
                                        alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="swiper-slide">
                <div class="intro-section slider-height-1 slider-content-center bg-img single-animation-wrap slider-bg-color-2"
                    style="background-image:url({{ asset('User/assets/images/slider/nen3.jpg')}})">
                    <div class="container">
                        <div class="row">
                            <div class="col-12 hm2-slider-animation">
                                <div class="slider-content-2 slider-content-2-wrap slider-animated-2">
                                    <h3 class="animated">Up To 40% Off</h3>
                                    <h1 class="animated">Summer <br>Collection</h1>
                                    <div class="slider-btn-2 btn-hover">
                                        <a href="{{ route('shop') }}"
                                            class="btn hover-border-radius theme-color animated">
                                            Shop Now
                                        </a>
                                    </div>
                                    <h2 class="animated">Furnirtre</h2>
                                    <img class="animated" src="{{ asset('User/assets/images/icon-img/time-2.png')}}"
                                        alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="home-slider-prev2 main-slider-nav2"><i class="fa fa-angle-left"></i></div>
            <div class="home-slider-next2 main-slider-nav2"><i class="fa fa-angle-right"></i></div>
        </div>
    </div>
</div>
<div class="category-area bg-gray-4 pt-95 pb-100">
    <div class="container">
        <div class="section-title-2 st-border-center text-center mb-75" data-aos="fade-up" data-aos-delay="200">
            <h2>Products Category</h2>
        </div>
        <div class="category-slider-active-2 swiper-container">
            <div class="swiper-wrapper">
                @foreach($ltags as $key => $value)
                {{-- <li><a href="{{ asset('shop')}}/{{$key}}">{{$key}}<span>{{$value}}</span></a></li>                            --}}
                <div class="swiper-slide">
                    <div class="single-category-wrap-2 text-center" data-aos="fade-up" data-aos-delay="200">
                        <div class="category-img-2">
                            <a href="{{ asset('shop')}}/{{$value->tag}}">
                                <img class="category-normal-img"
                                    src="{{ asset('User')}}/assets/images/product/{{$value->image}}" alt="">
                                <img class="category-hover-img"
                                    src="{{ asset('User')}}/assets/images/product/{{$value->image}}" alt="icon">
                            </a>
                        </div>
                        <div class="category-content-2 category-content-2-black">
                            <h4><a href="{{ asset('shop')}}/{{$value->tag}}">{{$value->tag}}</a></h4>
                        </div>
                    </div>
                </div>
                @endforeach

            </div>
        </div>
    </div>
</div>
<div class="product-area pt-95 pb-60">
    <div class="container">
        <div class="section-title-tab-wrap mb-75" data-aos="fade-up" data-aos-delay="200">
            <div class="section-title-2">
                <h2>Hot Products</h2>
            </div>
            <div class="tab-style-1 nav">
                <a class="active" href="#pro-1" data-bs-toggle="tab">New Arrivals </a>
                <a href="#pro-2" data-bs-toggle="tab" class=""> Best Sellers </a>
                <a href="#pro-3" data-bs-toggle="tab" class=""> Sale Items </a>
            </div>
        </div>
        <div class="tab-content jump">
            <div id="pro-1" class="tab-pane active">
                <div class="row">
                    @foreach($pro as $p)
                    @if ($p->status=='New Arrivals')
                    
                    <div class="col-lg-3 col-md-4 col-sm-6 col-12">
                        <div class="product-wrap mb-35" data-aos="fade-up" data-aos-delay="200">
                            <div class="product-img img-zoom mb-25">
                                <a href="/product?id={{$p->id}}">
                                    <img src="{{ asset('User')}}/assets/images/product/{{$p->image}}" alt="">
                                </a>
                                <div class="product-badge badge-top badge-right badge-pink">
                                    <span>
                                        @if ($p->status=='Sale Items')
                                            {{'-10%'}}   
                                        @endif
                                    </span>
                                </div>
                                <div class="product-action-wrap">
                                    <button class="product-action-btn-1" title="Wishlist"><i class="pe-7s-like"></i></button>
                                    <button class="product-action-btn-1" title="Quick View" data-bs-toggle="modal" data-bs-target="#exampleModal{{$p->id}}">
                                        <i class="pe-7s-look"></i>
                                    </button>
                                </div>
                                <div class="product-action-2-wrap">
                                    <form action="">
                                        @csrf
                                        <input type="hidden" name="" value="{{$p->id}}" class="pro_id_{{$p->id}}">
                                        <input type="hidden" name="" value="{{$p->name}}" class="pro_name_{{$p->id}}">
                                        <input type="hidden" name="" value="{{$p->price}}" class="pro_price_{{$p->id}}">
                                        <input type="hidden" name="" value="{{$p->image}}" class="pro_image_{{$p->id}}">
                                        <button data-idpro="{{$p->id}}"  type="button" name="add2cart" class="product-action-btn-2 add2cart" title="Add To Cart"><i class="pe-7s-cart"></i> Add to cart</button>
                                    </form>
                                </div>
                            </div>
                            <div class="product-content">
                                <h3><a href="/product?id={{$p->id}}">{{$p->name}}</a></h3>
                                <div class="product-price">
                                    @if ($p->status=='Sale Items')
                                        <span class="old-price">${{$p->price*1.1}} </span>
                                        <span class="new-price">${{$p->price}} </span>
                                    @else  
                                        <span class="new-price">${{$p->price}} </span>
                                    @endif
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Product Modal start -->
                    <div class="modal fade quickview-modal-style" id="exampleModal{{$p->id}}" tabindex="-1" role="dialog">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <a href="#" class="close" data-bs-dismiss="modal" aria-label="Close"><i class=" ti-close "></i></a>
                                </div>
                                <div class="modal-body">
                                    <div class="row gx-0">
                                        <div class="col-lg-5 col-md-5 col-12">
                                            <div class="modal-img-wrap">
                                                <img src="{{ asset('User')}}/assets/images/product/{{$p->image}}" alt="">
                                            </div>
                                        </div>
                                        <div class="col-lg-7 col-md-7 col-12">
                                            <div class="product-details-content quickview-content">
                                                <h2>{{$p->name}}</h2>
                                                <div class="product-details-price">
                                                    @if ($p->status=='Sale Items')
                                                        <span class="old-price">${{$p->price*1.1}} </span>
                                                        <span class="new-price">${{$p->price}} </span>
                                                    @else  
                                                        <span class="new-price">${{$p->price}} </span>
                                                    @endif
                                                </div>
                                                <div class="product-details-review">
                                                    <div class="product-rating">
                                                        <i class=" ti-star"></i>
                                                        <i class=" ti-star"></i>
                                                        <i class=" ti-star"></i>
                                                        <i class=" ti-star"></i>
                                                        <i class=" ti-star"></i>
                                                    </div>
                                                    <span>( {{$p->view}} Customer Review )</span>
                                                </div>
                                                <div class="product-color product-color-active product-details-color">
                                                    <span>Color :</span>
                                                    <ul>
                                                        <li><a title="Pink" class="pink" href="#">pink</a></li>
                                                        <li><a title="Yellow" class="active yellow" href="#">yellow</a></li>
                                                        <li><a title="Purple" class="purple" href="#">purple</a></li>
                                                    </ul>
                                                </div>
                                                <p>{{$p->description}}</p>
                                                <div class="product-details-action-wrap">
                                                    {{-- <div class="product-quality">
                                                        <input class="cart-plus-minus-box input-text qty text" name="qtybutton" value="1">
                                                    </div> --}}
                                                    <div class="single-product-cart btn-hover">
                                                        <a data-idpro="{{$p->id}}" type="button" name="add2cart" class="add2cart">Add to cart</a>
                                                    </div>
                                                    <div class="single-product-wishlist">
                                                        <a title="Wishlist" href="#"><i class="pe-7s-like"></i></a>
                                                    </div>
                                                    <div class="single-product-compare">
                                                        <a title="Compare" href="#"><i class="pe-7s-shuffle"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Product Modal end -->
                       
                    @endif
                    @endforeach
                </div>
            </div>
            <div id="pro-2" class="tab-pane">
                <div class="row">
                    @foreach($pro as $p)
                    @if ($p->status=='Best Sellers')
                    
                    <div class="col-lg-3 col-md-4 col-sm-6 col-12">
                        <div class="product-wrap mb-35" data-aos="fade-up" data-aos-delay="200">
                            <div class="product-img img-zoom mb-25">
                                <a href="/product?id={{$p->id}}">
                                    <img src="{{ asset('User')}}/assets/images/product/{{$p->image}}" alt="">
                                </a>
                                <div class="product-badge badge-top badge-right badge-pink">
                                    <span>
                                        @if ($p->status=='Sale Items')
                                            {{'-10%'}}   
                                        @endif
                                    </span>
                                </div>
                                <div class="product-action-wrap">
                                    <button class="product-action-btn-1" title="Wishlist"><i class="pe-7s-like"></i></button>
                                    <button class="product-action-btn-1" title="Quick View" data-bs-toggle="modal" data-bs-target="#exampleModal{{$p->id}}">
                                        <i class="pe-7s-look"></i>
                                    </button>
                                </div>
                                <div class="product-action-2-wrap">
                                    <form action="">
                                        @csrf
                                        <input type="hidden" name="" value="{{$p->id}}" class="pro_id_{{$p->id}}">
                                        <input type="hidden" name="" value="{{$p->name}}" class="pro_name_{{$p->id}}">
                                        <input type="hidden" name="" value="{{$p->price}}" class="pro_price_{{$p->id}}">
                                        <input type="hidden" name="" value="{{$p->image}}" class="pro_image_{{$p->id}}">
                                        <button data-idpro="{{$p->id}}"  type="button" name="add2cart" class="product-action-btn-2 add2cart" title="Add To Cart"><i class="pe-7s-cart"></i> Add to cart</button>
                                    </form>
                                </div>
                            </div>
                            <div class="product-content">
                                <h3><a href="/product?id={{$p->id}}">{{$p->name}}</a></h3>
                                <div class="product-price">
                                    @if ($p->status=='Sale Items')
                                        <span class="old-price">${{$p->price*1.1}} </span>
                                        <span class="new-price">${{$p->price}} </span>
                                    @else  
                                        <span class="new-price">${{$p->price}} </span>
                                    @endif
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Product Modal start -->
                    <div class="modal fade quickview-modal-style" id="exampleModal{{$p->id}}" tabindex="-1" role="dialog">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <a href="#" class="close" data-bs-dismiss="modal" aria-label="Close"><i class=" ti-close "></i></a>
                                </div>
                                <div class="modal-body">
                                    <div class="row gx-0">
                                        <div class="col-lg-5 col-md-5 col-12">
                                            <div class="modal-img-wrap">
                                                <img src="{{ asset('User')}}/assets/images/product/{{$p->image}}" alt="">
                                            </div>
                                        </div>
                                        <div class="col-lg-7 col-md-7 col-12">
                                            <div class="product-details-content quickview-content">
                                                <h2>{{$p->name}}</h2>
                                                <div class="product-details-price">
                                                    @if ($p->status=='Sale Items')
                                                        <span class="old-price">${{$p->price*1.1}} </span>
                                                        <span class="new-price">${{$p->price}} </span>
                                                    @else  
                                                        <span class="new-price">${{$p->price}} </span>
                                                    @endif
                                                </div>
                                                <div class="product-details-review">
                                                    <div class="product-rating">
                                                        <i class=" ti-star"></i>
                                                        <i class=" ti-star"></i>
                                                        <i class=" ti-star"></i>
                                                        <i class=" ti-star"></i>
                                                        <i class=" ti-star"></i>
                                                    </div>
                                                    <span>( {{$p->view}} Customer Review )</span>
                                                </div>
                                                <div class="product-color product-color-active product-details-color">
                                                    <span>Color :</span>
                                                    <ul>
                                                        <li><a title="Pink" class="pink" href="#">pink</a></li>
                                                        <li><a title="Yellow" class="active yellow" href="#">yellow</a></li>
                                                        <li><a title="Purple" class="purple" href="#">purple</a></li>
                                                    </ul>
                                                </div>
                                                <p>{{$p->description}}</p>
                                                <div class="product-details-action-wrap">
                                                    {{-- <div class="product-quality">
                                                        <input class="cart-plus-minus-box input-text qty text" name="qtybutton" value="1">
                                                    </div> --}}
                                                    <div class="single-product-cart btn-hover">
                                                        <a data-idpro="{{$p->id}}" type="button" name="add2cart" class="add2cart">Add to cart</a>
                                                    </div>
                                                    <div class="single-product-wishlist">
                                                        <a title="Wishlist" href="#"><i class="pe-7s-like"></i></a>
                                                    </div>
                                                    <div class="single-product-compare">
                                                        <a title="Compare" href="#"><i class="pe-7s-shuffle"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Product Modal end -->
                    
                       
                    @endif
                    @endforeach
                </div>
            </div>
            <div id="pro-3" class="tab-pane">
                <div class="row">
                    @foreach($pro as $p)
                    @if ($p->status=='Sale Items')
                    
                    <div class="col-lg-3 col-md-4 col-sm-6 col-12">
                        <div class="product-wrap mb-35" data-aos="fade-up" data-aos-delay="200">
                            <div class="product-img img-zoom mb-25">
                                <a href="/product?id={{$p->id}}">
                                    <img src="{{ asset('User')}}/assets/images/product/{{$p->image}}" alt="">
                                </a>
                                <div class="product-badge badge-top badge-right badge-pink">
                                    <span>
                                        @if ($p->status=='Sale Items')
                                            {{'-10%'}}   
                                        @endif
                                    </span>
                                </div>
                                <div class="product-action-wrap">
                                    <button class="product-action-btn-1" title="Wishlist"><i class="pe-7s-like"></i></button>
                                    <button class="product-action-btn-1" title="Quick View" data-bs-toggle="modal" data-bs-target="#exampleModal{{$p->id}}">
                                        <i class="pe-7s-look"></i>
                                    </button>
                                </div>
                                <div class="product-action-2-wrap">
                                    <form action="">
                                        @csrf
                                        <input type="hidden" name="" value="{{$p->id}}" class="pro_id_{{$p->id}}">
                                        <input type="hidden" name="" value="{{$p->name}}" class="pro_name_{{$p->id}}">
                                        <input type="hidden" name="" value="{{$p->price}}" class="pro_price_{{$p->id}}">
                                        <input type="hidden" name="" value="{{$p->image}}" class="pro_image_{{$p->id}}">
                                        <button data-idpro="{{$p->id}}"  type="button" name="add2cart" class="product-action-btn-2 add2cart" title="Add To Cart"><i class="pe-7s-cart"></i> Add to cart</button>
                                    </form>
                                </div>
                            </div>
                            <div class="product-content">
                                <h3><a href="/product?id={{$p->id}}">{{$p->name}}</a></h3>
                                <div class="product-price">
                                    @if ($p->status=='Sale Items')
                                        <span class="old-price">${{$p->price*1.1}} </span>
                                        <span class="new-price">${{$p->price}} </span>
                                    @else  
                                        <span class="new-price">${{$p->price}} </span>
                                    @endif
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Product Modal start -->
                    <div class="modal fade quickview-modal-style" id="exampleModal{{$p->id}}" tabindex="-1" role="dialog">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <a href="#" class="close" data-bs-dismiss="modal" aria-label="Close"><i class=" ti-close "></i></a>
                                </div>
                                <div class="modal-body">
                                    <div class="row gx-0">
                                        <div class="col-lg-5 col-md-5 col-12">
                                            <div class="modal-img-wrap">
                                                <img src="{{ asset('User')}}/assets/images/product/{{$p->image}}" alt="">
                                            </div>
                                        </div>
                                        <div class="col-lg-7 col-md-7 col-12">
                                            <div class="product-details-content quickview-content">
                                                <h2>{{$p->name}}</h2>
                                                <div class="product-details-price">
                                                    @if ($p->status=='Sale Items')
                                                        <span class="old-price">${{$p->price*1.1}} </span>
                                                        <span class="new-price">${{$p->price}} </span>
                                                    @else  
                                                        <span class="new-price">${{$p->price}} </span>
                                                    @endif
                                                </div>
                                                <div class="product-details-review">
                                                    <div class="product-rating">
                                                        <i class=" ti-star"></i>
                                                        <i class=" ti-star"></i>
                                                        <i class=" ti-star"></i>
                                                        <i class=" ti-star"></i>
                                                        <i class=" ti-star"></i>
                                                    </div>
                                                    <span>( {{$p->view}} Customer Review )</span>
                                                </div>
                                                <div class="product-color product-color-active product-details-color">
                                                    <span>Color :</span>
                                                    <ul>
                                                        <li><a title="Pink" class="pink" href="#">pink</a></li>
                                                        <li><a title="Yellow" class="active yellow" href="#">yellow</a></li>
                                                        <li><a title="Purple" class="purple" href="#">purple</a></li>
                                                    </ul>
                                                </div>
                                                <p>{{$p->description}}</p>
                                                <div class="product-details-action-wrap">
                                                    {{-- <div class="product-quality">
                                                        <input class="cart-plus-minus-box input-text qty text" name="qtybutton" value="1">
                                                    </div> --}}
                                                    <div class="single-product-cart btn-hover">
                                                        <a data-idpro="{{$p->id}}" type="button" name="add2cart" class="add2cart">Add to cart</a>
                                                    </div>
                                                    <div class="single-product-wishlist">
                                                        <a title="Wishlist" href="#"><i class="pe-7s-like"></i></a>
                                                    </div>
                                                    <div class="single-product-compare">
                                                        <a title="Compare" href="#"><i class="pe-7s-shuffle"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Product Modal end -->
                    
                       
                    @endif
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
<div class="banner-area pb-70">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-12">
                <div class="banner-wrap mb-30" data-aos="fade-up" data-aos-delay="200">
                    <a href="{{ asset('shop/Camera')}}"><img src="{{ asset('User/assets/images/banner/safe.jpg')}}"
                            alt=""></a>
                    <div class="banner-content-5">
                        <span>Up To 40% Off</span>
                        <h2>Safe Device</h2>
                        <div class="btn-style-3 btn-hover">
                            <a class="btn hover-border-radius" href="{{ asset('shop/Camera')}}">Shop Now</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-12">
                <div class="banner-wrap mb-30" data-aos="fade-up" data-aos-delay="400">
                    <a href="{{ asset('shop/Lights ')}}"><img src="{{ asset('User/assets/images/banner/light.jpg')}}"
                            alt=""></a>
                    <div class="banner-content-5">
                        <span>Up To 40% Off</span>
                        <h2>Lighting Equipment</h2>
                        <div class="btn-style-3 btn-hover">
                            <a class="btn hover-border-radius" href="{{ asset('shop/Lights ')}}">Shop Now</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="product-area pb-95">
    <div class="container">
        <div class="section-border section-border-margin-1" data-aos="fade-up" data-aos-delay="200">
            <div class="section-title-timer-wrap bg-white">
                <div class="section-title-1">
                    <h2>Deal Of The Day</h2>
                </div>
                <div id="timer-1-active" class="timer-style-1">
                    <span>End In: </span>
                    <div data-countdown="2021/8/30"></div>
                </div>
            </div>
        </div>
        <div class="product-slider-active-1 swiper-container">
            <div class="swiper-wrapper">
                @foreach($pro as $p)
                    @if ($p->status=='Sale Items')
                    <div class="swiper-slide">
                        <div class="product-wrap mb-35" data-aos="fade-up" data-aos-delay="200">
                            <div class="product-img img-zoom mb-25">
                                <a href="/product?id={{$p->id}}">
                                    <img src="{{ asset('User')}}/assets/images/product/{{$p->image}}" alt="">
                                </a>
                                <div class="product-badge badge-top badge-right badge-pink">
                                    <span>
                                        @if ($p->status=='Sale Items')
                                            {{'-10%'}}   
                                        @endif
                                    </span>
                                </div>
                                <div class="product-action-wrap">
                                    <button class="product-action-btn-1" title="Wishlist"><i class="pe-7s-like"></i></button>
                                    <button class="product-action-btn-1" title="Quick View" >
                                        <i class="pe-7s-look"></i>
                                    </button>
                                </div>
                                <div class="product-action-2-wrap">
                                    <form action="">
                                        @csrf
                                        <input type="hidden" name="" value="{{$p->id}}" class="pro_id_{{$p->id}}">
                                        <input type="hidden" name="" value="{{$p->name}}" class="pro_name_{{$p->id}}">
                                        <input type="hidden" name="" value="{{$p->price}}" class="pro_price_{{$p->id}}">
                                        <input type="hidden" name="" value="{{$p->image}}" class="pro_image_{{$p->id}}">
                                        <button data-idpro="{{$p->id}}"  type="button" name="add2cart" class="product-action-btn-2 add2cart" title="Add To Cart"><i class="pe-7s-cart"></i> Add to cart</button>
                                    </form>
                                </div>
                            </div>
                            <div class="product-content">
                                <h3><a href="/product?id={{$p->id}}">{{$p->name}}</a></h3>
                                <div class="product-price">
                                    @if ($p->status=='Sale Items')
                                        <span class="old-price">${{$p->price*1.1}} </span>
                                        <span class="new-price">${{$p->price}} </span>
                                    @else  
                                        <span class="new-price">${{$p->price}} </span>
                                    @endif
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    @endif
                    @endforeach

               
                
            </div>
            <div class="product-prev-1 product-nav-1" data-aos="fade-up" data-aos-delay="200"><i
                    class="fa fa-angle-left"></i></div>
            <div class="product-next-1 product-nav-1" data-aos="fade-up" data-aos-delay="200"><i
                    class="fa fa-angle-right"></i></div>
        </div>
    </div>
</div>
<div class="banner-area pb-100">
    <div class="bg-img bg-padding-2" style="background-image:url({{ asset('User/assets/images/slider/nen3.jpg')}})">
        <div class="container">
            <div class="banner-content-5 banner-content-5-static">
                <span data-aos="fade-up" data-aos-delay="200">Up To 40% Off</span>
                <h1 data-aos="fade-up" data-aos-delay="400">Smart Home <br> Hoàng Kiệt</h1>
                <div class="btn-style-3 btn-hover" data-aos="fade-up" data-aos-delay="600">
                    <a class="btn hover-border-radius" href="{{route('shop')}}">Shop Now</a>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="brand-logo-area pb-95">
    <div class="container">
        <div class="brand-logo-active swiper-container">
            <div class="swiper-wrapper">
                @foreach($ltags as $key => $value)
                
                <div class="swiper-slide">
                    <div class="single-brand-logo" data-aos="fade-up" data-aos-delay="1200">
                        <a href="{{ asset('shop')}}/{{$value->tag}}"><img src="{{ asset('User')}}/assets/images/product/{{$value->image}}" alt=""></a>
                    </div>
                </div>
                @endforeach

            </div>
        </div>
    </div>
</div>
<div class="blog-area pb-70">
    <div class="container">
        <div class="section-title-2 st-border-center text-center mb-75" data-aos="fade-up" data-aos-delay="200">
            <h2>Latest News</h2>
        </div>
        <div class="row">
            @foreach ($latestblogs as $blog)
            <div class="col-lg-4 col-md-6">
                <div class="blog-wrap mb-30" data-aos="fade-up" data-aos-delay="200">
                    <div class="blog-img-date-wrap mb-25">
                        <div class="blog-img">
                            <a href="{{ route("blogDe", $blog->idblog) }}"><img src="{{ asset("User/assets/images/blog/$blog->image") }}"
                                    alt=""></a>
                        </div>
                        <div class="blog-date">
                            <?php 
                                $dates = Carbon::create($blog->date);
                                echo "<h5>".date_format($dates, 'M')."<span>".$dates->day."</span></h5>"
                            ?>
                        </div>
                    </div>
                    <div class="blog-content">
                        <div class="blog-meta">
                            <ul>
                                <li><a href="#">{{ $blog->tag }}</a> , </li>
                                <li>By:<a href="#"> {{ $blog->author }}</a></li>
                            </ul>
                        </div>
                        <h3><a href="{{ route("blogDe", $blog->idblog) }}">{{ $blog->title }}</a></h3>
                        <p>{{$blog->content}}</p>
                        <div class="blog-btn-2 btn-hover">
                            <a class="btn hover-border-radius theme-color" href="{{ route("blogDe", $blog->idblog) }}">Read More</a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>




@stop()
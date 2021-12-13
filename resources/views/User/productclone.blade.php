@extends('User.main')
@section('content')

<div class="breadcrumb-area bg-gray-4 breadcrumb-padding-1" style="background-image: url({{ asset('User/assets/images/slider/nen3.jpg')}})">
    <div class="container">
        <div class="breadcrumb-content text-center">
            <h2 data-aos="fade-up" data-aos-delay="200">Product Details</h2>
            <ul data-aos="fade-up" data-aos-delay="400">
                <li><a href="index.html">Home</a></li>
                <li><i class="ti-angle-right"></i></li>
                <li>Product Details</li>
            </ul>
            @if (Session::get('Suser_name')!=null)
                <img id="img" style="width: 27%; position: absolute; left: 36.5%; top:-90%; border-radius:50%;" src="{{ asset('User')}}/assets/images/avatar/{{Session::get('Savatar')}}">
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
<div class="product-details-area pb-100 pt-100">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="product-details-img-wrap product-details-vertical-wrap" data-aos="fade-up" data-aos-delay="200">
                    <div class="product-details-small-img-wrap">
                        <div class="swiper-container product-details-small-img-slider-1 pd-small-img-style">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide">
                                    <div class="product-details-small-img">
                                        <img src="{{ asset('User')}}/assets/images/product/{{$pro[0]->image}}" alt="Product Thumnail">
                                    </div>
                                </div>
                            </div>
                        </div>  
                    </div>
                    <div class="swiper-container product-details-big-img-slider-1 pd-big-img-style">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">
                                <div class="easyzoom-style">
                                    <div class="easyzoom easyzoom--overlay">
                                        <a href="{{ asset('User')}}/assets/images/product/{{$pro[0]->image}}">
                                            <img src="{{ asset('User')}}/assets/images/product/{{$pro[0]->image}}" alt="">
                                        </a>
                                    </div>
                                    <a class="easyzoom-pop-up img-popup" href="{{ asset('User')}}/assets/images/product/{{$pro[0]->image}}">
                                        <i class="pe-7s-search"></i>
                                    </a>
                                </div>
                            </div>    
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="product-details-content" data-aos="fade-up" data-aos-delay="400">
                    <h2>{{$pro[0]->name}}</h2>
                    <div class="product-details-price">
                        @if ($pro[0]->status=='Sale Items')
                            <span class="old-price">${{$pro[0]->price*1.1}} </span>
                            <span class="new-price">${{$pro[0]->price}} </span>
                        @else  
                            <span class="new-price">${{$pro[0]->price}} </span>
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
                        <span>( {{$pro[0]->view}} Customer Review )</span>
                    </div>
                    <div class="product-color product-color-active product-details-color">
                        <span>Color :</span>
                        <ul>
                            <li><a title="Pink" class="pink" href="#">pink</a></li>
                            <li><a title="Yellow" class="active yellow" href="#">yellow</a></li>
                            <li><a title="Purple" class="purple" href="#">purple</a></li>
                        </ul>
                    </div>
                    <div class="product-details-action-wrap">
                        {{-- <div class="product-quality">
                            <input class="cart-plus-minus-box input-text qty text" name="qtybutton" value="1">
                        </div> --}}
                        <div class="single-product-cart btn-hover">
                            <form action="">
                                @csrf
                                <input type="hidden" name="" value="{{$pro[0]->id}}" class="pro_id_{{$pro[0]->id}}">
                                <input type="hidden" name="" value="{{$pro[0]->name}}" class="pro_name_{{$pro[0]->id}}">
                                <input type="hidden" name="" value="{{$pro[0]->price}}" class="pro_price_{{$pro[0]->id}}">
                                <input type="hidden" name="" value="{{$pro[0]->image}}" class="pro_image_{{$pro[0]->id}}">
                                
                            </form>
                            <a data-idpro="{{$pro[0]->id}}" type="button" name="add2cart" class="add2cart">Add to cart</a>
                        </div>
                        <div class="single-product-wishlist">
                            <a title="Wishlist" href="wishlist.html"><i class="pe-7s-like"></i></a>
                        </div>
                        <div class="single-product-compare">
                            <a title="Compare" href="#"><i class="pe-7s-shuffle"></i></a>
                        </div>
                    </div>
                    <div class="product-details-meta">
                        <ul>
                            <li><span class="title">Status:</span> {{$pro[0]->status}}</li>
                            <li><span class="title">Specifications:</span>
                                <ul>
                                    <li><a href="$pro[0]->tag">{{$pro[0]->specifications}}</a>,</li>
                                </ul>
                            </li>
                            <li><span class="title">Tags:</span>
                                <ul class="tag">
                                    <li><a href="{{ asset('shop')}}/{{$pro[0]->tag}}">{{$pro[0]->tag}}</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <div class="social-icon-style-4">
                        <a href="#"><i class="fa fa-facebook"></i></a>
                        <a href="#"><i class="fa fa-dribbble"></i></a>
                        <a href="#"><i class="fa fa-pinterest-p"></i></a>
                        <a href="#"><i class="fa fa-twitter"></i></a>
                        <a href="#"><i class="fa fa-linkedin"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="description-review-area pb-85">
    <div class="container">
        <div class="description-review-topbar nav" data-aos="fade-up" data-aos-delay="200">
            <a class="active" data-bs-toggle="tab" href="#des-details1"> Description </a>
            <a data-bs-toggle="tab" href="#des-details2" class=""> Information </a>
            <a data-bs-toggle="tab" href="#des-details3" class=""> Reviews </a>
        </div>
        <div class="tab-content">
            <div id="des-details1" class="tab-pane active">
                <div class="product-description-content text-center">
                    <p data-aos="fade-up" data-aos-delay="200">{{$pro[0]->description}}</p>
                    <p data-aos="fade-up" data-aos-delay="400">{{$pro[0]->details}}</p>
                </div>
            </div>
            <div id="des-details2" class="tab-pane">
                <div class="specification-wrap table-responsive">
                    <table>
                        <tbody>
                            <tr>
                                <td class="width1">Name</td>
                                <td>{{$pro[0]->name}}</td>
                            </tr>
                            <tr>
                                <td class="width1">Price</td>
                                <td>{{$pro[0]->price}}</td>
                            </tr>
                            <tr>
                                <td class="width1">Quantity</td>
                                <td>{{$pro[0]->quantity}}</td>
                            </tr>
                            <tr>
                                <td class="width1">Tag</td>
                                <td>{{$pro[0]->tag}}</td>
                            </tr>
                            <tr>
                                <td class="width1">Status</td>
                                <td>{{$pro[0]->status}}</td>
                            </tr>
                            
                        </tbody>
                    </table>
                </div>
            </div>
            <div id="des-details3" class="tab-pane">
                <div class="review-wrapper">
                    <h3>1 review for Sleeve Button Cowl Neck</h3>
                    <div class="single-review">
                        <div class="review-img">
                            <img src="{{ asset('User/assets/images/product-details/review-1.png')}}" alt="">
                        </div>
                        <div class="review-content">
                            <div class="review-rating">
                                <a href="#"><i class="ti-star"></i></a>
                                <a href="#"><i class="ti-star"></i></a>
                                <a href="#"><i class="ti-star"></i></a>
                                <a href="#"><i class="ti-star"></i></a>
                                <a href="#"><i class="ti-star"></i></a>
                            </div>
                            <h5><span>HasTech</span> - April 29, 2020</h5>
                            <p>Donec accumsan auctor iaculis. Sed suscipit arcu ligula, at egestas magna molestie a. Proin ac ex maximus, ultrices justo eget, sodales orci. Aliquam egestas libero ac turpis pharetra, in vehicula lacus scelerisque</p>
                        </div>
                    </div>
                </div>
                <div class="ratting-form-wrapper">
                    <h3>Add a Review</h3>
                    <p>Your email address will not be published. Required fields are marked <span>*</span></p>
                    <div class="your-rating-wrap">
                        <span>Your rating</span>
                        <div class="your-rating">
                            <a href="#"><i class="ti-star"></i></a>
                            <a href="#"><i class="ti-star"></i></a>
                            <a href="#"><i class="ti-star"></i></a>
                            <a href="#"><i class="ti-star"></i></a>
                            <a href="#"><i class="ti-star"></i></a>
                        </div>
                    </div>
                    <div class="ratting-form">
                        <form action="#">
                            <div class="row">
                                <div class="col-lg-6 col-md-6">
                                    <div class="rating-form-style mb-15">
                                        <label>Name <span>*</span></label>
                                        <input type="text">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <div class="rating-form-style mb-15">
                                        <label>Email <span>*</span></label>
                                        <input type="email">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="rating-form-style mb-15">
                                        <label>Your review <span>*</span></label>
                                        <textarea name="Your Review"></textarea>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="save-email-option">
                                        <p><input type="checkbox"> <label>Save my name, email, and website in this browser for the next time I comment.</label></p>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-submit">
                                        <input type="submit" value="Submit">
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="related-product-area pb-95">
    <div class="container">
        <div class="section-title-2 st-border-center text-center mb-75" data-aos="fade-up" data-aos-delay="200">
            <h2>Related Products</h2>
        </div>
        <div class="related-product-active swiper-container">
            <div class="swiper-wrapper">
                {{-- @foreach($pro2 as $key => $value) --}}
                @foreach($pro2 as $p)
                    {{-- {{$p->id}} --}}
                <div class="swiper-slide">
                    <div class="product-wrap" data-aos="fade-up" data-aos-delay="200">
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
                                <button class="product-action-btn-1" title="Quick View" data-bs-toggle="modal" data-bs-target="#exampleModal">
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
                                    {{-- <button data-idpro="{{$p->id}}"  type="button" name="add2cart" class="product-action-btn-2 add2cart" title="Add To Cart"><i class="pe-7s-cart"></i> Add to cart</button> --}}
                                </form>
                                <button data-idpro="{{$p->id}}"  type="button" name="add2cart" class="product-action-btn-2 add2cart" title="Add To Cart"><i class="pe-7s-cart"></i> Add to cart</button>                            </div>
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

                @endforeach

            </div>
        </div>
    </div>
</div>

@stop()
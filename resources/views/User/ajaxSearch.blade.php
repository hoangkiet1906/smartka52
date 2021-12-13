<div id="shop-1" class="tab-pane active">
    <div class="row">

        @foreach($pro as $p)
        
        <div class="col-lg-4 col-md-4 col-sm-6 col-12">
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
                        <button class="product-action-btn-2" title="Add To Cart"><i class="pe-7s-cart"></i> Add to cart</button>
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
                                        <div class="product-quality">
                                            <input class="cart-plus-minus-box input-text qty text" name="qtybutton" value="1">
                                        </div>
                                        <div class="single-product-cart btn-hover">
                                            <a href="#">Add to cart</a>
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

        @endforeach
        
    </div>
    
</div>
<div id="shop-2" class="tab-pane">

    @foreach($pro as $p)
    
    <div class="shop-list-wrap mb-30">
        <div class="row">
            <div class="col-lg-4 col-sm-5">
                <div class="product-list-img">
                    <a href="/product?id={{$p->id}}">
                        <img src="{{ asset('User')}}/assets/images/product/{{$p->image}}" alt="Product Style">
                    </a>
                    <div class="product-list-badge badge-right badge-pink">
                        <span>
                            @if ($p->status=='Sale Items')
                                {{'-10%'}}   
                            @endif
                        </span>
                    </div>
                    <div class="product-list-quickview">
                        <button class="product-action-btn-2" title="Quick View" data-bs-toggle="modal" data-bs-target="#exampleModal1{{$p->id}}">
                            <i class="pe-7s-look"></i>
                        </button>
                    </div>
                </div>
            </div>
            <div class="col-lg-8 col-sm-7">
                <div class="shop-list-content">
                    <h3><a href="/product?id={{$p->id}}">{{$p->name}}</a></h3>
                    <div class="product-price">
                        @if ($p->status=='Sale Items')
                            <span class="old-price">${{$p->price*1.1}} </span>
                            <span class="new-price">${{$p->price}} </span>
                        @else  
                            <span class="new-price">${{$p->price}} </span>
                        @endif
                    </div>
                    <div class="product-list-rating">
                        <i class=" ti-star"></i>
                        <i class=" ti-star"></i>
                        <i class=" ti-star"></i>
                        <i class=" ti-star"></i>
                        <i class=" ti-star"></i>
                    </div>
                    <p>{{$p->description}}</p>
                    <div class="product-list-action">
                        <button class="product-action-btn-3" title="Add to cart"><i class="pe-7s-cart"></i></button>
                        <button class="product-action-btn-3" title="Wishlist"><i class="pe-7s-like"></i></button>
                        <button class="product-action-btn-3" title="Compare"><i class="pe-7s-shuffle"></i></button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Product Modal start -->
    <div class="modal fade quickview-modal-style" id="exampleModal1{{$p->id}}" tabindex="-1" role="dialog">
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
                                    <div class="product-quality">
                                        <input class="cart-plus-minus-box input-text qty text" name="qtybutton" value="1">
                                    </div>
                                    <div class="single-product-cart btn-hover">
                                        <a href="#">Add to cart</a>
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
    

    @endforeach
    
</div>
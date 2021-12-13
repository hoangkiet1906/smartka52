@extends('User.main')
@section('content')

<div class="breadcrumb-area bg-gray-4 breadcrumb-padding-1" style="background-image: url({{ asset('User/assets/images/slider/nen3.jpg')}})">
    <div class="container">
        <div class="breadcrumb-content text-center">
            <h2 data-aos="fade-up" data-aos-delay="200">Shop</h2>
            <ul data-aos="fade-up" data-aos-delay="400">
                <li><a href="index.html">Home</a></li>
                <li><i class="ti-angle-right"></i></li>
                <li>Shop Sidebar</li>
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
<div class="shop-area shop-page-responsive pt-100 pb-100">
    <div class="container">
        <div class="row flex-row-reverse">
            <div class="col-lg-9">
                <div class="shop-topbar-wrapper mb-40">
                    <div class="shop-topbar-left" data-aos="fade-up" data-aos-delay="200">
                        <div class="showing-item">
       
                            <span>Showing {{count($pro)}} results</span>
                            <span class="microphone"> 
                                <i class="fa fa-microphone"></i>
                                <span class="recording-icon"></span>
                            </span>
                            
                            <style type="text/css">
                                .microphone {
                                    cursor: pointer;
                                    margin-left: 50px;
                                }

                                .microphone .recording-icon {
                                    display: none;
                                    width: 10px;
                                    height: 10px;
                                    background-color: #e22d2d;
                                    border-radius: 50%;
                                    animation: pulse 1.5s infinite linear;
                                }

                                .microphone.recording .recording-icon {
                                    display: inline-block;
                                }

                                .microphone.recording .fa-microphone {
                                    display: none;
                                }

                                @keyframes pulse {
                                    0% {
                                        box-shadow: 0 0 3px 0 rgba(173, 0, 0, .3);
                                    }
                                    65% {
                                        box-shadow: 0 0 3px 5px rgba(173, 0, 0, .3);
                                    }
                                    100% {
                                        box-shadow: 0 0 3px 5px rgba(173, 0, 0, 0);
                                    }
                                }
                            </style>
                            
                        </div>
                    </div>
                    <div class="shop-topbar-right" data-aos="fade-up" data-aos-delay="400">
                        <div class="shop-sorting-area">
                            <select class="nice-select nice-select-style-1">
                                <option>Default Sorting</option>
                                <option>Sort by price</option>
                                <option>Sort by views</option>
                            </select>
                        </div>
                        <div class="shop-view-mode nav">
                            <a class="active" href="#shop-1" data-bs-toggle="tab"><i class=" ti-layout-grid3 "></i> </a>
                            <a href="#shop-2" data-bs-toggle="tab" class=""><i class=" ti-view-list-alt "></i></a>
                        </div>
                    </div>
                </div>
                <div class="shop-bottom-area">
                    <div class="tab-content jump">
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

                                @endforeach
                                
                            </div>
                            <div class="pagination-style-1" data-aos="fade-up" data-aos-delay="200">
                                {{$pro->links()}}
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
                                                <button data-idpro="{{$p->id}}"  type="button" name="add2cart" class="product-action-btn-3 add2cart" title="Add to cart"><i class="pe-7s-cart"></i></button>
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
                            

                            @endforeach
                            
                            <div class="pagination-style-1">
                                {{$pro->links()}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="sidebar-wrapper">
                    <div class="sidebar-widget mb-40" data-aos="fade-up" data-aos-delay="200">
                        <div class="search-wrap-2">
                            <form class="search-2-form" action="/shop" method="get">
                                <input oninput="searchByName(this)" id="searchProduct" name="searchProduct" placeholder="Search*" type="text">
                                <button type="submit" class="button-search"><i class=" ti-search "></i></button>
                            </form>
                            
                            <script type="text/javascript">
                                    function searchByName(param){
                                        var searchProducts = param.value;
                                        //alert(searchProducts);
        
                                        $.ajax({
                                                type: "get",
                                                url: 'http://localhost:8000/ajaxSearch?searchProduct='+searchProducts,
                                                // data: {
                                                //     searchProduct: searchProduct
                                                // },
                                                // dataType: "json",
                                                success: function (response) {
                                                    $('.tab-content').html(response);
                                                    //console.table(response);
                                                }
                                        });
                                    }
                                
                            </script>
                        </div>
                    </div>
                    <div class="sidebar-widget sidebar-widget-border mb-40 pb-35" data-aos="fade-up" data-aos-delay="200">
                        <div class="sidebar-widget-title mb-30">
                            <h3>Filter By Price</h3>
                        </div>
                        <div class="price-filter">
                            <div id="slider-range"></div>
                            <div class="price-slider-amount">
                                <div class="label-input">
                                    <label>Price:</label>
                                    <input type="text" id="amount" name="price" placeholder="Add Your Price" />
                                </div>
                                <button type="button">Filter</button>
                            </div>
                        </div>
                    </div>
                    <div class="sidebar-widget sidebar-widget-border mb-40 pb-35" data-aos="fade-up" data-aos-delay="200">
                        <div class="sidebar-widget-title mb-25">
                            <h3>Product Categories</h3>
                        </div>
                        <div class="sidebar-list-style">
                            <ul>
                                @foreach($ltags as $key => $value)
                                <li><a href="{{ asset('shop')}}/{{$key}}">{{$key}}<span>{{$value}}</span></a></li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <div class="sidebar-widget sidebar-widget-border mb-40 pb-35" data-aos="fade-up" data-aos-delay="200">
                        <div class="sidebar-widget-title mb-25">
                            <h3>Choose Colour</h3>
                        </div>
                        <div class="sidebar-widget-color sidebar-list-style">
                            <ul>
                                <li><a class="black" href="#">Black <span>4</span></a></li>
                                <li><a class="blue" href="#">Blue <span>9</span></a></li>
                                <li><a class="brown" href="#">Brown <span>5</span></a></li>
                                <li><a class="red" href="#">Red <span>3</span></a></li>
                                <li><a class="orange" href="#">Orange <span>4</span></a></li>
                            </ul>
                        </div>
                    </div>
                    
                    <div class="sidebar-widget" data-aos="fade-up" data-aos-delay="200">
                        <div class="sidebar-widget-title mb-25">
                            <h3>Tags</h3>
                        </div>
                        <div class="sidebar-widget-tag">
                            @foreach($ltags as $key => $value)
                                <a href="{{ asset('shop')}}/{{$key}}">{{$key}}, </a>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

                                            
@stop()
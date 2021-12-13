@extends('User.main')
@section('content')
<?php use Carbon\Carbon;?>

<div class="breadcrumb-area bg-gray-4 breadcrumb-padding-1" style="background-image: url({{ asset('User/assets/images/slider/nen3.jpg')}})">
        <div class="container">
            <div class="breadcrumb-content text-center">
                <h2>Checkout </h2>
                <ul>
                    <li><a href="index.html">Home</a></li>
                    <li><i class="ti-angle-right"></i></li>
                    <li>Checkout </li>
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
    <div class="checkout-main-area pb-100 pt-100">
        <div class="container">
            <div class="customer-zone mb-20">
                <p class="cart-page-title">Change address <a class="checkout-click1" href="#">Click here to change</a></p>
                <div class="checkout-login-info">
                    <p>If you already want to change the receiving country and city, enter below.</p>

                    <div class="row">
                        <div class="col-lg-6 col-md-6">
                            <div class="sin-checkout-login">
                                <label>Your Country <span>*</span></label>
                                <input type="text" name="country" value="{{ $fcountry }}">
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <div class="sin-checkout-login">
                                <label>Your City <span>*</span></label>
                                <input type="text" name="city" value="{{ $fcity }}">
                            </div>
                        </div>
                    </div>
                    <div class="button-remember-wrap">
                        <button class="button">Update</button>

                    </div>

                </div>
            </div>
            <div class="customer-zone mb-20">
                <p class="cart-page-title">Have a coupon? <a class="checkout-click3" href="#">Click here to enter your
                        code</a></p>
                <div class="checkout-login-info3">
                    <form action="#">
                        <input type="text" placeholder="Coupon code">
                        <input type="submit" value="Apply Coupon">
                    </form>
                </div>
            </div>
            <div class="checkout-wrap pt-30">
                <div class="row">
                    <div class="col-lg-7">
                        <div class="billing-info-wrap">
                            <h3>Billing Details</h3>
                            <div class="row">
                                <div class="col-lg-6 col-md-6">
                                    <div class="billing-info mb-20">
                                        <label>Full name <abbr class="required" title="required">*</abbr></label>
                                        <input type="text" value="{{ $finfo->fullname }}" readonly="False">
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="billing-info mb-20">
                                        <label>Specific Address <abbr class="required"
                                                title="required">*</abbr></label>
                                        <input type="text" value="{{ $finfo->deliveryaddress }}" readonly="False">
                                    </div>
                                </div>

                                <div class="col-lg-12 col-md-12">
                                    <div class="billing-info mb-20">
                                        <label>Phone <abbr class="required" title="required">*</abbr></label>
                                        <input type="text" value="{{ $finfo->phone }}" readonly="False">
                                    </div>
                                </div>

                                <div class="col-lg-12 col-md-12">
                                    <div class="billing-info mb-20">
                                        <label>Email <abbr class="required" title="required">*</abbr></label>
                                        <input type="text" value="{{ $finfo->email }}" readonly="False">
                                    </div>
                                </div>
                            </div>

                            <div class="additional-info-wrap">
                                <label>Order notes</label>
                                <textarea placeholder="Notes about your order, e.g. special notes for delivery. "
                                    name="message"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-5">
                        <div class="your-order-area">
                            <h3>Your order</h3>
                            <div class="your-order-wrap gray-bg-4">
                                <div class="your-order-info-wrap">
                                    <div class="your-order-info">
                                        <ul>
                                            <li>Product <span>Total</span></li>
                                        </ul>
                                    </div>
                                    <div class="your-order-middle">
                                        <ul>
                                            @php
                                                $total = 0;
                                            @endphp
                                            @foreach ($cart as $p)
                                                <li>{{ $p->name }} X {{ $p->cartquantity }}
                                                    <span>${{ $p->price * $p->cartquantity }} </span>
                                                </li>
                                                @php
                                                    $total += $p->price * $p->cartquantity;
                                                @endphp
                                            @endforeach
                                        </ul>
                                    </div>
                                    <div class="your-order-info order-subtotal">
                                        <ul>
                                            <li>Subtotal <span>${{ $total }} </span></li>
                                        </ul>
                                    </div>
                                    <div class="your-order-info order-shipping">
                                        <ul>
                                            <li>Shipping <p>Free </p>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="your-order-info order-total">
                                        <ul>
                                            <li>Total <span>${{ $total }} </span></li>
                                        </ul>
                                    </div>
                                </div>

                                <form action="">

                                    <input type="hidden" name="" value="{{ $total }}" class="total_checkout">
                                    <div class="payment-method">
                                        <div class="pay-top sin-payment">
                                            <input id="payment_method_1" class="input-radio" type="radio"
                                                value="Direct Bank Transfer" checked="checked" name="payment_method">
                                            <label for="payment_method_1"> Direct Bank Transfer </label>
                                            <div class="payment-box payment_method_bacs">
                                                <p>Make your payment directly into our bank account. Please use your Order
                                                    ID as
                                                    the payment reference.</p>
                                            </div>
                                        </div>
                                        <div class="pay-top sin-payment">
                                            <input id="payment-method-3" class="input-radio" type="radio"
                                                value="Cash on delivery" name="payment_method">
                                            <label for="payment-method-3">Cash on delivery </label>
                                            <div class="payment-box payment_method_bacs">
                                                <p>Make your payment directly into our bank account. Please use your Order
                                                    ID as
                                                    the payment reference.</p>
                                            </div>
                                        </div>
                                        <div class="pay-top sin-payment sin-payment-3">
                                            <input id="payment-method-4" class="input-radio" type="radio" value="PayPal"
                                                name="payment_method">
                                            <label for="payment-method-4">PayPal <img alt=""
                                                    src="assets/images/icon-img/payment.png"><a href="#">What is
                                                    PayPal?</a></label>
                                            <div class="payment-box payment_method_bacs">
                                                <p>Make your payment directly into our bank account. Please use your Order
                                                    ID as
                                                    the payment reference.</p>
                                            </div>
                                        </div>
                                    </div>
                                    
                                </form>
                                @csrf
                            </div>
                            <div class="Place-order btn-hover">
                                <a type="button" class="okcheckout">Place Order</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.okcheckout').click(function() {

                var totals = $('.total_checkout').val();
                var payment_method = document.querySelector('input[name="payment_method"]:checked').value;
                var today = new Date();
                var day = today.getFullYear()+'-'+(today.getMonth()+1)+'-'+today.getDate(); 
                //var time = today.getHours() + ":" + today.getMinutes() + ":" + today.getSeconds();
                var date = day;
                $.ajax({
                    type: "post",
                    url: '{{ url('/addCheckoutAjax') }}',
                    data: {
                        totals: totals,
                        payment_method: payment_method,
                        "_token": "{{ csrf_token() }}",
                        date:date
                    },
                    //dataType: "dataType",
                    success: function(response) {
                        swal("Success", response, "success");
                    }
                    // error: function(data, textStatus, errorThrown) {
                    //     console.log(data);

                    // },
                });



            });
        });
    </script>
@stop()

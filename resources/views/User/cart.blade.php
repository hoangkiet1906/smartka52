@extends('User.main')
@section('content')

    <div class="breadcrumb-area bg-gray-4 breadcrumb-padding-1"
        style="background-image: url({{ asset('User/assets/images/slider/nen3.jpg') }})">
        <div class="container">
            <div class="breadcrumb-content text-center">
                <h2>Cart</h2>
                <ul>
                    <li><a href="index.html">Home</a></li>
                    <li><i class="ti-angle-right"></i></li>
                    <li>Cart</li>
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
    <div class="cart-area pt-100 pb-100">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <form action="#">
                        <div class="cart-table-content">
                            <div class="table-content table-responsive">
                                <table>
                                    <thead>
                                        <tr>
                                            <th class="width-thumbnail"></th>
                                            <th class="width-name">Product</th>
                                            <th class="width-price"> Price</th>
                                            <th class="width-quantity">Quantity</th>
                                            <th class="width-subtotal">Subtotal</th>
                                            <th class="width-remove"></th>
                                        </tr>
                                    </thead>
                                    <tbody class="upcart">
                                        @php
                                            $total = 0;
                                        @endphp
                                        @foreach ($cart as $p)

                                            <tr id="x{{ $p->id }}">
                                                <td class="product-thumbnail">
                                                    <a href="/product?id={{ $p->id }}"><img
                                                            src="{{ asset('User') }}/assets/images/product/{{ $p->image }}"
                                                            alt=""></a>
                                                </td>
                                                <td class="product-name">
                                                    <h5><a href="/product?id={{ $p->id }}">{{ $p->name }}</a>
                                                    </h5>
                                                </td>
                                                <td class="product-cart-price"><span
                                                        class="amount">${{ $p->price }}</span></td>
                                                <td class="product-total"><span>{{ $p->cartquantity }}</span></td>
                                                <td class="product-total">
                                                    <span>${{ $p->price * $p->cartquantity }}</span>
                                                </td>

                                                {{-- <input type="hidden" name="" value="{{$p->id}}" class="del_id_{{$p->id}}"> --}}
                                                <td class="product-remove"><a data-delpro="{{ $p->id }}"
                                                        type="button" class="delpro"><i
                                                            class=" ti-trash "></i></a></td>
                                                <form action="">
                                                    @csrf
                                                </form>
                                            </tr>
                                            @php
                                                $total += $p->price * $p->cartquantity;
                                            @endphp
                                        @endforeach



                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="cart-shiping-update-wrapper">
                                    <div class="cart-shiping-update btn-hover">
                                        <a href="#">Continue Shopping</a>
                                    </div>
                                    <div class="cart-clear-wrap">
                                        <div class="cart-clear btn-hover">
                                            <a href="{{ route('cart') }}">Update Cart</a>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-6 col-12">
                    <div class="cart-calculate-discount-wrap mb-40">
                        <h4>Calculate shipping </h4>
                        <div class="calculate-discount-content">
                            <div class="select-style mb-15">
                                <select class="select-two-active">
                                    <option>Viet Nam</option>
                                    <option>Lao</option>
                                    <option>Campuchia</option>
                                </select>
                            </div>
                            <div class="select-style mb-15">
                                <form>
                                    <select class="select-two-active" id="selectCountr">
                                        <option>State / County</option>
                                        <option value="Da Nang">Da Nang</option>
                                        <option value="Quang Binh" selected="selected">Quang Binh City</option>
                                        <option value="Ha Noi">Ha Noi</option>
                                        <option value="Ho Chi Minh City">Ho Chi Minh City</option>
                                    </select>
                                </form>
                            </div>
                            <div class="calculate-discount-btn btn-hover">
                                <a class="btn theme-color" href="#">Update</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-12">
                    <div class="cart-calculate-discount-wrap mb-40">
                        <h4>Coupon Discount </h4>
                        <div class="calculate-discount-content">
                            <p>Enter your coupon code if you have one.</p>
                            <div class="input-style">
                                <input type="text" placeholder="Coupon code">
                            </div>
                            <div class="calculate-discount-btn btn-hover">
                                <a class="btn theme-color" href="#">Apply Coupon</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12 col-12">
                    <div class="grand-total-wrap">
                        <div class="grand-total-content">
                            <h3>Subtotal <span>${{ $total }}</span></h3>
                            <div class="grand-shipping">
                                <span>Shipping</span>
                                <ul>
                                    <li><input type="radio" name="shipping" value="0" checked="checked"><label>Free
                                            shipping</label></li>

                                </ul>
                            </div>
                            <div class="shipping-country">
                                <p>Shipping to </p>
                            </div>
                            <div class="grand-total">
                                <h4>Total <span>${{ $total }}</span></h4>
                            </div>
                        </div>
                        <div class="grand-total-btn btn-hover">
                            {{-- <a class="btn theme-color" href="checkout.html">Proceed to checkout</a> --}}
                            <form action="/checkout" method="post">
                                <a class="btn theme-color">
                                    @csrf
                                    <input type="hidden" name="fcountry" value="Viet Nam" class="fcountry">
                                    <input type="hidden" name="fcity" value="" class="fcity">
                                    <input type="hidden" name="ftotalmoney" value="${{ $total }}"
                                        class="ftotalmoney">
                                    <button style="color: white" class="btn" type="submit">Proceed to
                                        checkout</button>
                                </a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.delpro').click(function() {
                var delid = $(this).data('delpro');
                var _token = $('input[name="_token"]').val();
                $.ajax({
                    type: "post",
                    url: '{{ url('/delCartAjax') }}',
                    data: {
                        delid: delid,
                        _token: _token
                    },
                    //dataType: "dataType",
                    success: function(response) {
                        $('#x' + delid).remove();
                        swal("Success", response, "success");
                    }
                });
            });
            var e = document.getElementById("selectCountr");


            function show() {
                var strUser = e.value;
                $('.shipping-country').text('Shipping to ' + strUser);
                $('.fcity').val(strUser);
            }
            e.onchange = show;
            show();
        });
    </script>
@stop()

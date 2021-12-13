@extends('User.main')
@section('content')

<div class="breadcrumb-area bg-gray-4 breadcrumb-padding-1" style="background-image: url({{ asset('User/assets/images/slider/nen3.jpg')}})">
    <div class="container">
        <div class="breadcrumb-content text-center">
            <h2>My Account </h2>
            <ul>
                <li><a href="{{route('home')}}">Home</a></li>
                <li><i class="ti-angle-right"></i></li>
                <li>My Account </li>
            </ul>
            <img id="img" style="width: 27%; position: absolute; left: 36.5%; top:-90%; border-radius:50%;" src="{{ asset('User')}}/assets/images/avatar/{{Session::get('Savatar')}}">
            
            <form style="position: absolute; left: 45%; top:250%; border-radius:50%;" action="">
                <label for="upload">UPDATE AVATAR</label>
                <input style="display:none" type='file' id="upload">
            </form>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
            <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/jquery-ui.min.js"></script>
            <script>
                function preview(input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();
                    reader.onload = function (e) { 
                    console.log(reader.result)
                    var img = new Image;
                    img.onload = function() {$('#img').attr({'src':e.target.result,'width':img.width});};
                    img.src = reader.result;
                                            }
                    reader.readAsDataURL(input.files[0]);    
                    }
                    
                }

                $("#upload").change(function(event){
                    
                $("#img").css({top: -73, left: 427});
                preview(this);
                
                var pic = document.getElementById("upload").value;
                pic = pic.substring(12, pic.length);
                $.ajax({
                    type: "post",
                    url: '{{ url('/changeAvt') }}',
                    data: {
                        pic:pic,
                        "_token": "{{ csrf_token() }}",
                    },
                    success: function (response) {
                        swal("Success", response, "success");
                    }
                });


                $("#img").draggable({ containment: 'parent',scroll: false});
                
                
               
                });
                
            </script>
        </div>
        
    </div>
    <div class="breadcrumb-img-1" data-aos="fade-right" data-aos-delay="200">
        <img src="{{ asset('User/assets/images/banner/light.jpg')}}" alt="">
    </div>
    <div class="breadcrumb-img-2" data-aos="fade-left" data-aos-delay="200">
        <img src="{{ asset('User/assets/images/banner/safe.jpg')}}" alt="">
    </div>
</div>
<!-- my account wrapper start -->
<div class="my-account-wrapper pb-100 pt-100">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <!-- My Account Page Start -->
                <div class="myaccount-page-wrapper">
                    <!-- My Account Tab Menu Start -->
                    <div class="row">
                        <div class="col-lg-3 col-md-4">
                            <div class="myaccount-tab-menu nav" role="tablist">
                                <a href="#dashboad" class="active" data-bs-toggle="tab">Dashboard</a>
                                <a href="#orders" data-bs-toggle="tab">Orders</a>
                                <a href="#payment-method" data-bs-toggle="tab">Payment Method</a>
                                <a href="#address-edit" data-bs-toggle="tab">Personal information</a>
                                <a href="#account-info" data-bs-toggle="tab">Update personal information</a>
                                <a href="{{route('login')}}">Logout</a>
                            </div>
                        </div>
                        <!-- My Account Tab Menu End -->
                        <!-- My Account Tab Content Start -->
                        <div class="col-lg-9 col-md-8">
                            @include('User.err')
                            <div class="tab-content" id="myaccountContent">
                                <!-- Single Tab Content Start -->
                                <div class="tab-pane fade show active" id="dashboad" role="tabpanel">
                                    <div class="myaccount-content">
                                        <h3>Dashboard</h3>
                                        <div class="welcome">
                                            <p>Hello, <strong>{{Session::get('Suser_name')}}</strong> (If Not <strong>{{Session::get('Suser_name')}} !</strong><a href="login-register.html" class="logout"> Logout</a>)</p>
                                        </div>

                                        <p class="mb-0">From your account dashboard. you can easily check & view your recent orders, manage your shipping and billing addresses and edit your password and account details.</p>
                                    </div>
                                </div>
                                <!-- Single Tab Content End -->
                                <!-- Single Tab Content Start -->
                                <div class="tab-pane fade" id="orders" role="tabpanel">
                                    <div class="myaccount-content">
                                        <h3>Orders</h3>
                                        <div class="myaccount-table table-responsive text-center">
                                            <table class="table table-bordered">
                                                <thead class="thead-light">
                                                    <tr>
                                                        <th>Order</th>
                                                        <th>Date</th>
                                                        <th>Status</th>
                                                        <th>Total</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($oders as $oder)
                                                    @php
                                                        $i=1;
                                                    @endphp
                                                    <tr>
                                                        <td>{{$i}}</td>
                                                        <td>{{$oder->date_checkout}}</td>
                                                        <td>{{$oder->status}}</td>
                                                        <td>${{$oder->total_money}}</td>
                                                        <td><a href="{{ route('cart') }}" class="check-btn sqr-btn ">View</a></td>
                                                    </tr>
                                                    @php
                                                        $i++;
                                                    @endphp
                                                    @endforeach
                                                    
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <!-- Single Tab Content End -->
                                
                                <!-- Single Tab Content Start -->
                                <div class="tab-pane fade" id="payment-method" role="tabpanel">
                                    <div class="myaccount-content">
                                        <h3>Payment Method</h3>
                                        @if ($oders!=null)
                                            @foreach ($oders as $oder)
                                            <p class="saved-message">{{$oder->payment_method}}</p>
                                            @endforeach
    
                                        @else
                                        <p class="saved-message">You Can't Saved Your Payment Method yet.</p>
                                        @endif
                                        
                                    </div>
                                </div>
                                <!-- Single Tab Content End -->
                                <!-- Single Tab Content Start -->
                                <div class="tab-pane fade" id="address-edit" role="tabpanel">
                                    @if($row != null)
                                        <div class="myaccount-content">
                                            <h3>Personal information</h3>
                                            <address>
                                                <p><strong>{{$row->fullname}}</strong></p>
                                                <p>{{$row->address}}</p>
                                                <p>Mobile: {{$row->phone}}</p>
                                                <p>Email: {{$row->email}}</p>
                                                <p>Delivery Address: {{$row->deliveryaddress}}</p>
                                            </address>
                                            <a href="#" class="check-btn sqr-btn "><i class="fa fa-edit"></i> Edit Personal information</a>
                                        </div>
                                    @else
                                        <div class="myaccount-content">
                                            <h3>Personal information has not been updated</h3>
                                            <a href="#" class="check-btn sqr-btn "><i class="fa fa-edit"></i> Add Personal information</a>
                                        </div>
                                    @endif

                                </div>
                                <!-- Single Tab Content End -->
                                <!-- Single Tab Content Start -->
                                <div class="tab-pane fade" id="account-info" role="tabpanel">
                                    <div class="myaccount-content">
                                        <h3>Account Details</h3>
                                        <div class="account-details-form">
                                            <form action="/upInfo">
                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <div class="single-input-item">
                                                            <label for="first-name" class="required">Full Name</label>
                                                            <input type="text" id="first-name" name="hoten"/>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="single-input-item">
                                                            <label for="last-name" class="required">Phone Number</label>
                                                            <input type="text" id="last-name" name="sdt"/>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <div class="single-input-item">
                                                            <label for="first-name" class="required">Email</label>
                                                            <input type="text" id="first-name" name="email"/>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="single-input-item">
                                                            <label for="last-name" class="required">Address</label>
                                                            <input type="text" id="last-name" name="dc"/>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="single-input-item">
                                                    <label for="display-name" class="required">Delivery Address</label>
                                                    <input type="text" id="display-name" name="dcgiaohang"/>
                                                </div>
                                                <div class="single-input-item btn-hover">
                                                    <button class="check-btn sqr-btn">Save Changes</button>
                                                </div>
                                                @csrf
                                            </form>
                                        </div>
                                    </div>
                                </div> <!-- Single Tab Content End -->
                            </div>
                        </div> <!-- My Account Tab Content End -->
                    </div>
                </div> <!-- My Account Page End -->
            </div>
        </div>
    </div>
</div>
@stop()
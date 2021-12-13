@extends('User.main')
@section('content')

<div class="breadcrumb-area bg-gray-4 breadcrumb-padding-1" style="background-image: url({{ asset('User/assets/images/slider/nen3.jpg')}})">
    <div class="container">
        <div class="breadcrumb-content text-center">
            <h2>Login - Register </h2>
            <ul>
                <li><a href="{{route('home')}}">Home</a></li>
                <li><i class="ti-angle-right"></i></li>
                <li>Login - Register </li>
            </ul>
        </div>
    </div>
    <div class="breadcrumb-img-1" data-aos="fade-right" data-aos-delay="200">
        <img src="{{ asset('User/assets/images/banner/light.jpg')}}" alt="">
    </div>
    <div class="breadcrumb-img-2" data-aos="fade-left" data-aos-delay="200">
        <img src="{{ asset('User/assets/images/banner/safe.jpg')}}" alt="">
    </div>
</div>
<div class="login-register-area pb-100 pt-95">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-12 offset-lg-2">
                <div class="login-register-wrapper">
                    <div class="login-register-tab-list nav">
                        <a class="active" data-bs-toggle="tab" href="#lg1">
                            <h4> login </h4>
                        </a>
                        <a data-bs-toggle="tab" href="#lg2">
                            <h4> register </h4>
                        </a>
                    </div>
                    <div class="tab-content">
                        <div id="lg1" class="tab-pane active">
                            <div class="login-form-container">
                                <div class="login-register-form">
                                    @include('User.err')
                                    <form action="/authlogin" method="post">
                                        
                                        {{-- {{ csrf_field() }} --}}
                                        <input type="text" name="user_name" placeholder="Username">
                                        <input type="password" name="password" placeholder="Password">
                                        <div class="login-toggle-btn">
                                            <input type="checkbox">
                                            <label>Remember me</label>
                                            <a href="#">Forgot Password?</a>
                                        </div>
                                        <div class="button-box btn-hover">
                                            <button type="submit">Login</button>
                                        </div>
                                        @csrf
                                    </form>
                                    
                                </div>
                            </div>
                        </div>
                        <div id="lg2" class="tab-pane">
                            <div class="login-form-container">
                                <div class="login-register-form">
                                    <form action="/authres" method="post">
                                        <input type="text" name="user_name" placeholder="Username">
                                        <input type="password" name="password" placeholder="Password">
                                        <input type="password" name="Cpassword" placeholder="Confirm password">
                                        <div class="button-box btn-hover">
                                            <button type="submit">Register</button>
                                        </div>
                                        @csrf
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop()
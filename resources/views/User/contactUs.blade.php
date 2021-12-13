@extends('User.main')
@section('content')




    <div class="breadcrumb-area bg-gray-4 breadcrumb-padding-1"
        style="background-image: url({{ asset('User/assets/images/slider/nen3.jpg') }})">
        <div class="container">
            <div class="breadcrumb-content text-center">
                <h2 data-aos="fade-up" data-aos-delay="200">Contact Us</h2>
                <ul data-aos="fade-up" data-aos-delay="400">
                    <li><a href="index.html">Home</a></li>
                    <li><i class="ti-angle-right"></i></li>
                    <li>Contact Us</li>
                </ul>
                @if (Session::get('Suser_name') != null)
                    <img id="img" style="width: 27%; position: absolute; left: 36.5%; top:-90%; border-radius:50%;"
                        src="{{ asset('User') }}/assets/images/avatar/{{ Session::get('Savatar') }}">
                @endif
            </div>
        </div>
        <div class="breadcrumb-img-1" data-aos="fade-right" data-aos-delay="200">
            <img src="{{ asset('User/assets/images/banner/light.jpg') }}" alt="">
        </div>
        <div class="breadcrumb-img-2" data-aos="fade-left" data-aos-delay="200">
            <img src="{{ asset('User/assets/images/banner/safe.jpg') }}" alt="">
        </div>
    </div>
    <div class="contact-us-area pt-100 pb-65">
        <div class="container">
            <div class="section-title-4 text-center mb-50" data-aos="fade-up" data-aos-delay="200">
                <h2>Our Outlet Address! Please Visit Us.</h2>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                    <div class="contact-us-info-wrap mb-30" data-aos="fade-up" data-aos-delay="200">
                        <div class="contact-us-info-title">
                            <h3>Smartka Shop</h3>
                        </div>
                        <div class="contact-us-info">
                            <p>KTX Viet-Han, Smartka Shop</p>
                            <span>Call us: +01-234567</span>
                        </div>
                        <div class="contact-us-info">
                            <p>Assistance hours: Monday – Friday</p>
                            <span>9 am to 8 pm </span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                    <div class="contact-us-info-wrap mb-30" data-aos="fade-up" data-aos-delay="400">
                        <div class="contact-us-info-title">
                            <h3>USA Shop</h3>
                        </div>
                        <div class="contact-us-info">
                            <p>97, Old Avenue, Rd No 17, USA 1213</p>
                            <span>Call us: +01-234567</span>
                        </div>
                        <div class="contact-us-info">
                            <p>Assistance hours: Monday – Friday</p>
                            <span>9 am to 8 pm </span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-12 col-12">
                    <div class="contact-us-info-wrap mb-30" data-aos="fade-up" data-aos-delay="600">
                        <div class="contact-us-info-title">
                            <h3>UK Shop</h3>
                        </div>
                        <div class="contact-us-info">
                            <p>House-33, Road-22, Block-Z, UK 129</p>
                            <span>Call us: +01-234567</span>
                        </div>
                        <div class="contact-us-info">
                            <p>Assistance hours: Monday – Friday</p>
                            <span>9 am to 8 pm </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="map pt-120" data-aos="fade-up" data-aos-delay="200">
        <iframe
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3835.7713018290697!2d108.25038101433566!3d15.973315146245218!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31421152317b3825%3A0x63aeca1a1e623d4a!2zS1RYIFZJ4buGVCAtIEjDgE4gfCBWS1U!5e0!3m2!1svi!2s!4v1635691075351!5m2!1svi!2s"
            width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
    </div>
    <div class="contact-form-area pt-90 pb-100">
        <div class="container">
            <div class="section-title-4 text-center mb-55" data-aos="fade-up" data-aos-delay="200">
                <h2>Ask Us Anything Here</h2>
            </div>
            <div class="contact-form-wrap" data-aos="fade-up" data-aos-delay="200">
                <form class="contact-form-style" id="contact-form" action="" method="post">
                    <div class="row">
                        <div class="col-lg-4">
                            <input name="name" type="text" placeholder="Name*">
                            <input name="email" type="email" placeholder="Email*">
                            <input name="phone" type="text" placeholder="Phone*">
                        </div>
                        <div class="col-lg-8">
                            <textarea class="spMess" name="message" placeholder="Message"></textarea>
                        </div>
                        <div class="col-lg-12 col-md-12 col-12 contact-us-btn btn-hover">
                            <button class="submit" type="submit">Send Message</button>
                        </div>
                    </div>
                    @csrf
                    <input type="hidden" value="{{Session::get('Suser_name')}}" class="spName">
                </form>
                {{-- <p class="form-messege"></p> --}}
            </div>
        </div>
    </div>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.submit').click(function() {
                var spName = $('.spName').val();
                var spMess = $('.spMess').val();
                $.ajax({
                    type: "post",
                    url: '{{ url('/support') }}',
                    data: {
                        spName: spName,
                        spMess: spMess,
                        "_token": "{{ csrf_token() }}",
                    },
                    //dataType: "dataType",
                    success: function(response) {
                        swal("Success", response, "success");
                    }
                });
            });
        });
    </script>

@stop

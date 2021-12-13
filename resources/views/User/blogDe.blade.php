@extends('User.main')
@section('content')

<?php use Carbon\Carbon;?>

<div class="breadcrumb-area bg-gray-4 breadcrumb-padding-1" style="background-image: url({{ asset('User/assets/images/slider/nen3.jpg')}})">
    <div class="container">
        <div class="breadcrumb-content text-center">
            <h2 data-aos="fade-up" data-aos-delay="200">Blog Details</h2>
            <ul data-aos="fade-up" data-aos-delay="400">
                <li><a href="index.html">Home</a></li>
                <li><i class="ti-angle-right"></i></li>
                <li>Blog Details</li>
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

@foreach ($blogdes as $blogde)
    

<div class="blog-details-area pt-100 pb-100">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="blog-details-wrapper">
                    <div class="blog-details-img-date-wrap mb-35" data-aos="fade-up" data-aos-delay="200">
                        <div class="blog-details-img">
                            <img src="{{ asset("User/assets/images/blog/$blogde->image") }}" alt="">
                        </div>
                        <div class="blog-details-date">
                            <?php 
                                $dates = Carbon::create($blogde->date);
                                echo "<h5>".date_format($dates, 'M')."<span>".$dates->day."</span></h5>"
                            ?>
                        </div>
                    </div>
                    <div class="blog-meta-2" data-aos="fade-up" data-aos-delay="200">
                        <ul>
                            <li><a href="#">{{ $blogde->tag }}</a>,</li>
                            <li> By : <a href="#">{{ $blogde->author }}</a></li>
                        </ul>
                    </div>
                    <h1 data-aos="fade-up" data-aos-delay="200">{{ $blogde->title }}</h1>
                    <p data-aos="fade-up" data-aos-delay="200">{{ $blogde->ct1 }}</p>
                    <blockquote class="blockquote-wrap" data-aos="fade-up" data-aos-delay="200">
                        <div class="quote-img">
                            <img src="{{ asset('User/assets/images/icon-img/quote.png')}}" alt="">
                        </div>
                        <h2>{{ $blogde->ct1 }}</h2>
                        <h4>Admin</h4>
                    </blockquote>
                    <p data-aos="fade-up" data-aos-delay="200">{{ $blogde->ct2 }}</p>
                    <div class="blog-details-middle-img-wrap">
                        <div class="row">
                            <div class="col-md-6 col-sm-6 col-12">
                                <div class="blog-details-middle-img mb-30" data-aos="fade-up" data-aos-delay="200">
                                    <img src="{{ asset("User/assets/images/blog/$blogde->image1")}}" alt="">
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6 col-12">
                                <div class="blog-details-middle-img mb-30" data-aos="fade-up" data-aos-delay="400">
                                    <img src="{{ asset("User/assets/images/blog/$blogde->image2")}}" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                    <p data-aos="fade-up" data-aos-delay="200">{{ $blogde->ct3 }}</p>
                    
   
                    <div class="tag-social-wrap">
                        <div class="tag-wrap" data-aos="fade-up" data-aos-delay="200">
                            <span>Tags:</span>
                            <ul>
                                <li><a href="#">{{ $blogde->tag }}</a>,</li>
                            </ul>
                        </div>
                        <div class="social-comment-digit-wrap" data-aos="fade-up" data-aos-delay="400">
                            <div class="social-icon-style-2">
                                <a href="#"><i class="fa fa-facebook"></i></a>
                                <a href="#"><i class="fa fa-dribbble"></i></a>
                                <a href="#"><i class="fa fa-pinterest-p"></i></a>
                            </div>
                            <div class="comment-digit">
                                <a href="#">2 <i class="fa fa-comments"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="blog-author-wrap-2" data-aos="fade-up" data-aos-delay="200">
                        <div class="blog-author-img-2">
                            <img src="{{ asset('User/assets/images/blog/blog-author.jpg')}}" alt="">
                        </div>
                        <div class="blog-author-content-2">
                            <h2>Hiii !!!!</h2>
                            <p>Welcome to our Website. Thanks for your attention. I hope it can help you to know about something. 
                                If you have questions or want to talk about something, 
                                please contact us via email omg@gmail.com or comment below.</p>
                            <div class="social-icon-style-3">
                                <a href="#"><i class="fa fa-facebook"></i></a>
                                <a href="#"><i class="fa fa-dribbble"></i></a>
                                <a href="#"><i class="fa fa-pinterest-p"></i></a>
                                <a href="#"><i class="fa fa-twitter"></i></a>
                                <a href="#"><i class="fa fa-glide-g"></i></a>
                            </div>
                        </div>
                    </div>

                    
                    <div class="blog-next-previous-post" data-aos="fade-up" data-aos-delay="200">
                        <div class="blog-prev-post-wrap">
                            <div class="blog-prev-post-icon">
                                <a href="{{ route("blogDe", $preblog->idblog) }}"><i class="fa fa-angle-left"></i></a>
                            </div>
                            <div class="blog-prev-post-content">
                                <h3><a href="{{ route("blogDe", $preblog->idblog) }}">{{ $preblog->title }}</a></h3>
                                <?php $date = Carbon::create($preblog->date); ?>
                                <span>{{ date_format($date, 'd M y') }}</span>
                            </div>
                        </div>
                        <div class="blog-next-post-wrap">
                            <div class="blog-next-post-icon">
                                <a href="{{ route("blogDe", $nextblog->idblog) }}"> <i class="fa fa-angle-right"></i> </a>
                            </div>
                            <div class="blog-next-post-content">
                                <h3><a href="{{ route("blogDe", $nextblog->idblog) }}">{{ $nextblog->title }}</a></h3>
                                <?php $date = Carbon::create($nextblog->date); ?>
                                <span>{{ date_format($date, 'd M y') }}</span>
                            </div>
                        </div>
                    </div>
{{-- comment ne --}}
                    <input type="hidden" name="comment_blog_id" id="comment_blog_id" value="{{ $blogde->idblog }}">

                    <div id='kietcode' class="blog-comment-wrapper">
                       @csrf
                       
                    </div>


                    @if ($title != 'Hi')
                    <div class="blog-comment-form-wrap">
                        <div class="blog-comment-form">
                            <form action="" method="POST">
                                @csrf
                                <div class="row">
                                   
                                    <div class="col-lg-12 col-md-12">
                                        <div class="single-blog-comment-form" data-aos="fade-up" data-aos-delay="500">
                                            <textarea placeholder="Comment" id="comment_content"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12">
                                        <div class="comment-submit-btn btn-hover">
                                            <button type="text" class="submit" id="sendcmt">Post Comment <i class=" ti-arrow-right"></i></button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    @endif

                    {{--end cmt  --}}
                </div>
            </div>
            @endforeach

   
            {{-- right --}}
            <div class="col-lg-4">
                <div class="sidebar-wrapper">
                    {{-- search --}}
                    <div class="sidebar-widget mb-50" data-aos="fade-up" data-aos-delay="200">
                        <div class="search-wrap-3">
                            <form class="search-3-form" action="{{ asset('/blog') }}" method="get">
                                <input placeholder="Search*" type="text" id="keysearch" name="keysearch">
                                <button class="button-search" type="submit"><i class="fa fa-search"></i></button>
                            </form>
                        </div>
                    </div>

                    <div class="sidebar-widget mb-50" data-aos="fade-up" data-aos-delay="200">
                        <div class="blog-author-content text-center">
                            <a href="#"><img src="{{ asset('User/assets/images/blog/blog-author.jpg')}}" alt=""></a>
                            <h2>Hi guyssss!</h2>
                            <h4>Trinhh</h4>
                            <div class="social-icon-style-1">
                                <a href="#"><i class="fa fa-facebook"></i></a>
                                <a href="#"><i class="fa fa-dribbble"></i></a>
                                <a href="#"><i class="fa fa-pinterest-p"></i></a>
                                <a href="#"><i class="fa fa-twitter"></i></a>
                                <a href="#"><i class="fa fa-glide-g"></i></a>
                            </div>
                        </div>
                    </div>

                    <div class="sidebar-widget mb-40" data-aos="fade-up" data-aos-delay="200">
                        <div class="sidebar-widget-title-2 mb-25">
                            <h3>Categories</h3>
                        </div>
                        <div class="sidebar-list-style-2">
                            <ul>
                                <li><a href="#">Blog Grid View (09)</a></li>
                                <li><a href="#">Latest blog (03)</a></li>
                                <li><a href="#">Our Blog (12)</a></li>
                            </ul>
                        </div>
                    </div>

                    <div class="sidebar-widget mb-40" data-aos="fade-up" data-aos-delay="200">
                        <div class="sidebar-widget-title-2 mb-30">
                            <h3>Latest Post</h3>
                        </div>
                        <div class="latest-post-wrap">

                            @foreach ($sDates as $dates)
                            <div class="single-latest-post">
                                <div class="latest-post-img">
                                    <a href="{{ route("blogDe", $dates->idblog) }}"><img src="{{ asset("User/assets/images/blog/$dates->image") }}" alt=""></a>
                                </div>
                                <div class="latest-post-content"> 
                                    <?php 
                                        $date = Carbon::create($dates->date);
                                    ?>
                                    <span>{{ date_format($date, 'd M y') }}</span>
                                    <h4><a href="{{ route("blogDe", $dates->idblog) }}">{{ $dates->title }}</a></h4>
                                    <div class="latest-post-btn">
                                        <a href="{{ route("blogDe", $dates->idblog) }}">Continue Reading...</a>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>

                    <div class="sidebar-widget mb-35" data-aos="fade-up" data-aos-delay="200">
                        <div class="sidebar-widget-title-2 mb-30">
                            <h3>Tags</h3>
                        </div>
                        <div class="sidebar-widget-tag-2">
                            @foreach ($protags as $tags )
                                <a href="#">{{ $tags->tag }}</a>
                            @endforeach
                            
                        </div>
                    </div>

                    <div class="sidebar-widget" data-aos="fade-up" data-aos-delay="200">
                        <div class="sidebar-banner">
                            <a href="#"><img src="{{ asset('User/assets/images/banner/banner.jpg')}}" alt=""></a>
                        </div>
                    </div> 
                </div>
            </div>


        </div>
    </div>
</div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script type="text/javascript">
    // $(document).ready(function () {
    //     alert("Hello! I am an alert box!!");
    // });
    
    $(document).ready(function () {

        loadCmtBlog();
        function loadCmtBlog() { 
            var idblog = $('#comment_blog_id').val();
            var _token = $('input[name="_token"]').val();
            
            $.ajax({ 
                url: "/loadcmtblog",
                type: 'post',
                data:{idblog:idblog,_token:_token},
               
                success:function(data){
                    // alert(idblog);
                    $('#kietcode').html(data);
                    document.getElementById('#comment_content').value.replace(document.getElementById('#comment_content').value, "");
                }
            });
        }
        $('#sendcmt').click(function (ev) {
                ev.preventDefault();
                // let content = $('#comment_content').val();
                
                var idblog = $('#comment_blog_id').val();
                var cmtcontent = $('#comment_content').val();
                var _token = $('input[name="_token"]').val();
                var today = new Date();
                var day = today.getFullYear()+'-'+(today.getMonth()+1)+'-'+today.getDate(); 
                var time = today.getHours() + ":" + today.getMinutes() + ":" + today.getSeconds();
                var date = day + ' ' +time;
                $.ajax({
                    url: "/sendcmtblog",
                    type: "post",
                    data:{ idblog:idblog, cmtcontent:cmtcontent, date:date,  _token:_token},
                    
                    success:function(dataa){
                        // alert(date);
                        // alert(idblog)
                        // alert(cmtcontent);
                        // alert(_token);
                        // alert("data");
                        //alert(dataa);
                        loadCmtBlog();
                       
                          
                        document.getElementById('#comment_content').value.replace(document.getElementById('#comment_content').value, "");
                        // $('#comment_content').style.value = "";
                        // $('#testcmt').html('<h1>da thanh cong</h1>');
                    }
                });
        }); 
        
    });
       

</script>

{{-- <script>
        
</script> --}}
@stop()
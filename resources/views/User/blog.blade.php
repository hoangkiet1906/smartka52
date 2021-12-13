<?php use Carbon\Carbon;?>

@extends('User.main')
@section('content')

<div class="breadcrumb-area bg-gray-4 breadcrumb-padding-1" style="background-image: url({{ asset('User/assets/images/slider/nen3.jpg')}})">
    <div class="container">
        <div class="breadcrumb-content text-center">
            <h2 data-aos="fade-up" data-aos-delay="200">Blog Sidebar</h2>
            <ul data-aos="fade-up" data-aos-delay="400">
                <li><a href="{{route('home')}}">Home</a></li>
                <li><i class="ti-angle-right"></i></li>
                <li>Blog Sidebar</li>
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


<div class="blog-area pt-100 pb-100">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="row">

                   {{-- show blog --}}
                    @if (empty($searchresults))                       
                    @foreach ($blogs as $blog)
                    <div class="col-md-6" >
                        <div class="blog-wrap mb-50" data-aos="fade-up" data-aos-delay="200">
                            <div class="blog-img-date-wrap mb-25">
                                <div class="blog-img">
                                    <a href="{{ route("blogDe", $blog->idblog) }}"><img src="{{ asset("User/assets/images/blog/$blog->image") }}" alt="{{ asset("$blog->image") }}"></a>
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
                                        <li><a href="#"></a>{{ $blog->tag.', ' }} </li>
                                        <li> By: <a href="#">{{ $blog->author }} </a></li>
                                    </ul>
                                </div>
                                <h3><a href="{{ route("blogDe", $blog->idblog) }}"> {{ $blog->title }}</a></h3>
                                <p>{{ $blog->content }}</p>
                                <div class="blog-btn-2 btn-hover">
                                    <a class="btn hover-border-radius theme-color" href="{{ route("blogDe", $blog->idblog) }}">Read More</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach

                    <div class="pagination-style-1" data-aos="fade-up" data-aos-delay="200">                       
                        {{$blogs->links()}}                          
                    </div>
                    @endif
                </div>
                

                {{-- search result --}}
                @if (!empty($searchresults))
                <div class="row">
                    @foreach ($searchresults as $result)
                    <div class="col-md-6" >
                        <div class="blog-wrap mb-50" data-aos="fade-up" data-aos-delay="200">
                            <div class="blog-img-date-wrap mb-25">
                                <div class="blog-img">
                                    <a href="{{ route("blogDe", $result->idblog) }}"><img src="{{ asset("User/assets/images/blog/$result->image") }}" alt="{{ asset("$result->image") }}"></a>
                                </div>
                                <div class="blog-date">
                                    <?php 
                                        $dates = Carbon::create($result->date);
                                    echo "<h5>".date_format($dates, 'M')."<span>".$dates->day."</span></h5>"
                                        ?>
                                </div> 
                            </div>
                            <div class="blog-content">
                                <div class="blog-meta">
                                    <ul>
                                        <li><a href="#"></a>{{ $result->tag.', ' }} </li>
                                        <li> By: <a href="#">{{ $result->author }} </a></li>
                                    </ul>
                                </div>
                                <h3><a href="{{ route("blogDe", $result->idblog) }}"> {{ $result->title }}</a></h3>
                                <p>{{ $result->content }}</p>
                                <div class="blog-btn-2 btn-hover">
                                    <a class="btn hover-border-radius theme-color" href="{{ route("blogDe", $result->idblog) }}">Read More</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                @endif
            </div>

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
                            <h4>Blog Writer</h4>
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
                                <li><a href="#">Latest blog (02)</a></li>
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

@stop()
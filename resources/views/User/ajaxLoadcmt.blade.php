
<h4 class="blog-dec-title" data-aos="fade-up" data-aos-delay="200">Comments</h4>
@foreach ($cmts as $cmt)
<div  class='single-comment-wrapper single-comment-border' data-aos='fade-up' data-aos-delay='400'>    
<div class="blog-comment-img">
    <img src="{{ asset('User')}}/assets/images/avatar/{{$avt[$cmt->user_name][0]->avatar}}" alt="">
</div>
<div class="blog-comment-content">
    <div class="comment-info-reply-wrap">
        <div class="comment-info">
            <span>{{ $cmt->cmtdate }}</span>
            <h4>{{ $cmt->user_name }}</h4>
        </div>
    </div>
    <p>{{ $cmt->cmtblog }}</p>
</div>
</div>
@endforeach

<h3>Reviews of some customers</h3>

    @foreach ($cmts as $cmt)
    <div class="single-review">
        <div class="review-img">
        <img src="{{ asset('User')}}/assets/images/avatar/{{$avt[$cmt->user_name][0]->avatar}}" alt="">
        </div>
        <div class="review-content">
        <div class="review-rating">
            <a href="#"><i class="ti-star"></i></a>
            <a href="#"><i class="ti-star"></i></a>
            <a href="#"><i class="ti-star"></i></a>
            <a href="#"><i class="ti-star"></i></a>
            <a href="#"><i class="ti-star"></i></a>
        </div>
        <h5><span>{{ $cmt->user_name }}</span> - {{ $cmt->cmtdatepro }}</h5>
        <p>{{ $cmt->cmtpro }}</p>
        </div>
    </div> 
    @endforeach                
                   
                    
                
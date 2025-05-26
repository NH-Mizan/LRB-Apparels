<!-- Right Sidebar -->
<div class="col-sm-2 order-3 order-sm-3">
    <div class="sticky-sidebar">
        <div class="most-popular-section">
            <h5>সবচেয়ে জনপ্রিয়</h5>
            @foreach ($topblogs as $value)
            <div class="top-popular-section">
                <a href="{{route('blog.details',$value->slug)}}">
                <img src="{{ asset($value->image)}}" alt="News Thumb">
                <div>
                    <h6>{{ $value->blogcategory ? $value->blogcategory->name : '' }}</h6>
                    <a href="{{route('blog.details',$value->slug)}}">{{$value->title}}</a>
                </div>
            </a>
            </div>
            @endforeach
        </div>
    </div>
</div>
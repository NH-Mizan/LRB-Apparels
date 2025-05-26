<!-- Right Sidebar -->
<div class="col-sm-3">
    <div class="sticky-sidebar">
        <div class="follow-header">
        <h5>FOLLOW:</h5>
            <div class="follow-top">
                <ul>
                    @foreach ($socialicons as $social)
                        <li><a href="{{ $social->link }}"><i class="{{ $social->icon }}"></i></a></li>
                    @endforeach
                </ul>
            </div>
         </div>
        <div class="most-popular-section">
            @foreach ($topblogs as $value)
            <div class="top-popular-section mb-2">
                <a href="{{route('blog.details',$value->slug)}}">
                <img src="{{ asset($value->image)}}" alt="News Thumb">
                <div>
                    <h6>{{ $value->blogcategory ? $value->blogcategory->name : '' }}</h6>
                    <a href="#">{{$value->title}}</a>
                </div>
            </a>
            </div>
            @endforeach
        </div>
    </div>
</div>

    <div class="blog-item">
        <div class="blog-img">
            <a href="{{route('blog.details',$value->slug)}}">
                <img src="{{ asset($value->image) }}" alt="">
            </a>
        </div>

        <div class="blog-content">
            <a href="{{route('blog.details',$value->slug)}}">
                 <div class="post-meta-sm"><span>{{ $value->blogcategory ? $value->blogcategory->name : '' }}</span> | {{ $value->created_at ? \Carbon\Carbon::parse($value->created_at)->format('F d, Y') : '' }}</div>
                 <div class="main-article-title-sm">“{{ Str::limit($value->title, 60) }}”</div>
                    <p>“{!! Str::limit(strip_tags($value->description), 150, '...') !!}”</p>

            </a>
            <!-- <div class="articale-date">
                <div class="blog-times">
                    <span class="date-time">
                        {{ $value->created_at ? \Carbon\Carbon::parse($value->created_at)->format('F d, Y') : '' }}
                    </span>
                </div>
                <a href="{{route('blog.details',$value->slug)}}" class="read_more">Read More</a>
            </div> -->
        </div>
    </div>
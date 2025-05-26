<!-- LEFT BODY WORK START -->
<div class="col-sm-3 order-2 order-sm-1">
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
             <div class="related-news">
                 <p>এই সংক্রান্ত আরও খবর</p>
             </div>
             <nav>
              <div class="nav nav-tabs custom-nav-tab" id="nav-tab" role="tablist">
                <button class="nav-link custom-nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true"><i class="fa-regular fa-clock"></i></button>
                <button class="nav-link custom-nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="false"><i class="fa-solid fa-star"></i></button>
              </div>
            </nav>
            <div class="tab-content" id="nav-tabContent">
              <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab" tabindex="0">
                <div class="side-news">
                    @foreach ($topblogs as $value)
                      <a href="{{route('blog.details',$value->slug)}}">
                        <div class="top-news-section d-flex mb-2">
                            <img src="{{asset($value->image)}}" alt="News Thumb">
                            <div>
                                <h6>{{ $value->blogcategory ? $value->blogcategory->name : '' }}</h6>
                                <a href="{{route('blog.details',$value->slug)}}">{{ $value->title}}</a>
                            </div>
                        </div>
                      </a>
                    @endforeach
                </div>
                </div>
              <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab" tabindex="0">
                <div class="side-news">
                    @foreach ($topblogs as $value)
                      <a href="{{route('blog.details',$value->slug)}}">
                        <div class="top-news-section d-flex mb-2">
                            <img src="{{asset($value->image)}}" alt="News Thumb">
                            <div>
                                <h6>{{ $value->blogcategory ? $value->blogcategory->name : '' }}</h6>
                                <a href="{{route('blog.details',$value->slug)}}">{{ $value->title}}</a>
                            </div>
                        </div>
                      </a>
                    @endforeach
                </div>
              </div>
            </div>
    </div> 
</div>
<!-- LEFT BODY WORK END -->
@extends('frontEnd.layouts.master')
@section('title','Photo') 
@section('content')

<section>
  <div class="container custom-container">
  
    <div class="common-headings">
        <h5>ফটো গ্যালারি </h5>
    </div>
  <div class="row custom-row photo-gallery-catagory-row content_list">
    @foreach($galleries as $gallery)
      @php
        $photogalleries = App\Models\Galleryimage::where('gallery_id',$gallery->id)->limit(1)->get(); 
       @endphp
    @foreach($photogalleries as $galleryimage)
    <div class="col-md-4 custom-padding">
      <div class="photo-catagory-single">
        <a href="{{route('gallerydetails',[$galleryimage->gallery_id])}}">
          <i class="fa fa-camera"></i>
          <div class="photo-catagory-left">
            <img class="img-fluid" src="{{asset($galleryimage->image)}}" alt="{{$galleryimage->title}}" />
          </div>
          <div class="photo-catagory-right">
            <h2>{{ Str::limit($galleryimage->title, 50) }}</h2>
          </div>
        </a>
      </div>
    </div>
    @endforeach
    @endforeach

    <!-- <div class="col-sm-12 text-center" id="show_more_main49">
      <div class="btn btn-more-details hvr-bounce-to-right">
        <span id="49" class="show_more btn btn-more" title="Load more posts">আরও অ্যালবাম</span>
        <span class="loding" style="display: none;"><span class="loding_txt">Loading...</span></span>
      </div>
    </div> -->

  </div>
</div>

</section>


@endsection

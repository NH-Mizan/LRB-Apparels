@extends('frontEnd.layouts.master')
@section('title', 'Photo')

@section('content')

<!-- Gallery Section Start -->
<section class="photo-gallery-section py-5">
    <div class="container">
        <div class="section-title text-center mb-5 wow fadeInDown" data-wow-delay="0.2s">
            <h2 class="fw-bold">Our Photo Gallery</h2>
            <p class="text-muted">Explore our recent photos with fullscreen preview and smooth animation.</p>
        </div>

        <div class="row" id="lightgallery">
            @foreach($allphotos as $key => $allphoto)
                <div class="col-md-4 col-sm-6 mb-4 wow zoomIn" data-wow-delay="0.{{ $key + 2 }}s"  data-src="{{ asset($allphoto->image) }}">
                    <div class="gallery-card position-relative overflow-hidden rounded shadow-sm">
                        <a 
                       
                           data-lg-size="1406-1390" 
                           data-sub-html="<h4>{{ $allphoto->title }}</h4>">
                            <img class="img-fluid w-100 rounded gallery-image" src="{{ asset($allphoto->image) }}" alt="{{ $allphoto->title }}">
                            <div class="icon-overlay d-flex justify-content-center align-items-center">
                                <i class="fa fa-search-plus text-white fs-3"></i>
                            </div>
                        </a>
                        <p class="mt-2 text-center fw-semibold">{{ $allphoto->title }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
<!-- Gallery Section End -->

@endsection

@push('style')
<!-- Animate.css -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
<!-- LightGallery CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/lightgallery@2.7.1/css/lightgallery-bundle.min.css">
<style>
 
</style>
@endpush

@push('script')
<!-- WOW.js -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.min.js"></script>
<script> new WOW().init(); </script>

<!-- LightGallery JS -->
<script src="https://cdn.jsdelivr.net/npm/lightgallery@2.7.1/lightgallery.umd.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/lightgallery@2.7.1/plugins/zoom/lg-zoom.umd.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/lightgallery@2.7.1/plugins/thumbnail/lg-thumbnail.umd.min.js"></script>
<script>
  
</script>
@endpush

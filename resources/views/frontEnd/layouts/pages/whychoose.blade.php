@extends('frontEnd.layouts.master')

@section('content')

<!-- PAGE TITLE START -->
<section class="custom-breadcrumb wow fadeIn" data-wow-delay="0.1s" data-wow-duration="1s">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="page-title">
                    <h2>Why Choose Us</h2>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- PAGE TITLE END -->
<section class="product-section wow fadeInUp" data-wow-delay="0.2s" data-wow-duration="1.2s">
    <div class="container">
        @foreach ($choosedata as $key => $value)
            <div class="row align-items-center mb-5 flex-wrap {{ $key % 2 == 0 ? 'flex-row-reverse' : '' }}">
                
                <!-- ICON COLUMN -->
                <div class="col-md-6 text-center">
                    <div class="choose-icon-box wow zoomIn" data-wow-delay="0.{{ $key + 2 }}s">
                        <img src="{{ $value->image }}" alt="">
                    </div>
                </div>

                <!-- CONTENT COLUMN -->
                <div class="col-md-6">
                    <div class="choose-content wow fadeInUp" data-wow-delay="0.{{ $key + 3 }}s">
                        <h4><i class="fa-regular fa-circle-check text-success me-2"></i> {{ $value->title }}</h4>
                        <p>{!! $value->description !!}</p>
                    </div>
                </div>

            </div>
        @endforeach
    </div>
</section>



@endsection

@push('script')
<!-- Animate.css & WOW.js -->


<script>
    new WOW().init();
</script>
@endpush

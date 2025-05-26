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
        <div class="row">
            @foreach ($choosedata as $key => $value)
                <div class="col-sm-6 col-lg-3">
                    <div class="about-card wow zoomIn" data-wow-delay="0.{{ $key + 3 }}s" data-wow-duration="1s">
                        <div class="choose-icon">
                            <i class="{{ $value->icon }}"></i>
                        </div>
                        <div class="about-info">
                            <h4><i class="fa-regular fa-circle-check"></i> {{ $value->title }}</h4>
                            <p>{{ $value->description }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

@endsection

@push('script')
<!-- Animate.css & WOW.js -->


<script>
    new WOW().init();
</script>
@endpush

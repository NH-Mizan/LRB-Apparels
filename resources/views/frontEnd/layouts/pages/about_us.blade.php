@extends('frontEnd.layouts.master')
@section('title', $generalsetting->meta_title)

@section('content')

<!-- PAGE TITLE START -->
<section class="custom-breadcrumb wow fadeInDown" data-wow-delay="0.2s">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="page-title text-center">
                    <h2>About Us</h2>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- PAGE TITLE END -->

<!-- ABOUT US START -->
<section class="section-padding about-section">
    <div class="container">
        @foreach ($about as $key => $value)
            <div class="row align-items-center mb-5">
                <div class="col-sm-6 wow fadeInLeft" data-wow-delay="0.3s">
                    <div class="about-content">
                        <h3>{{ $value->title }}</h3>
                        <div>{!! $value->description !!}</div>
                    </div>
                </div>
                <div class="col-sm-6 wow fadeInRight" data-wow-delay="0.3s">
                    <div class="about-image text-center">
                        <img src="{{ asset($value->image) }}" alt="{{ $value->title }}" class="img-fluid rounded shadow" />
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</section>
<!-- ABOUT US END -->

@endsection

@push('style')
<!-- Animate.css -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
<style>
   
</style>
@endpush

@push('script')
<!-- WOW.js -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.min.js"></script>
<script>
    new WOW().init();
</script>
@endpush

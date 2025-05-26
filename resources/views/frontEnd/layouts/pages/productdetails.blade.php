@extends('frontEnd.layouts.master')
@section('title', $details->title)

@section('content')

<!-- BREADCRUMB / PAGE TITLE -->
<section class="custom-breadcrumb wow fadeInDown" data-wow-delay="0.1s">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <div class="page-title">
                    <h2>{{ $details->title }}</h2>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- PRODUCT DETAILS SECTION -->
<section class="product-detail-section py-5">
    <div class="container">
        <div class="row align-items-center">

            <!-- Product Image -->
            <div class="col-md-6 wow fadeInLeft" data-wow-delay="0.2s">
                <div class="product-image text-center mb-4">
                    <img src="{{ asset($details->image) }}" class="img-fluid rounded shadow" alt="{{ $details->title }}">
                </div>
            </div>

            <!-- Product Info -->
            <div class="col-md-6 wow fadeInRight" data-wow-delay="0.3s">
                <div class="product-info">
                    <h3 class="mb-3">{{ $details->title }}</h3>
                    
                    <p class="text-muted">{!! $details->description !!}</p>

                    <div class="mt-4">
                        <a href="{{ url()->previous() }}" class="btn btn-outline-secondary rounded-pill me-2">
                            <i class="fa fa-arrow-left me-1"></i> Back
                        </a>
                        <a href="#" class="btn btn-primary rounded-pill">
                            <i class="fa fa-cart-plus me-1"></i> Add to Cart
                        </a>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

@endsection

@push('style')
<!-- Animate.css -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
<style>
    .product-detail-section {
        background-color: #fdfdfd;
    }

    .product-info h3 {
        font-weight: 600;
        font-size: 1.75rem;
    }

    .product-info p {
        font-size: 1rem;
        line-height: 1.6;
    }

    .btn {
        font-size: 0.95rem;
        padding: 10px 20px;
    }

    .product-image img {
        max-height: 400px;
        object-fit: contain;
    }
</style>
@endpush

@push('script')
<!-- WOW.js -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.min.js"></script>
<script>
    new WOW().init();
</script>
@endpush

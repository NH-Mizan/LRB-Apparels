@extends('frontEnd.layouts.master')
@section('title', $category->meta_title)

@section('content')

<!-- PAGE TITLE START -->
<section class="custom-breadcrumb wow fadeIn" data-wow-delay="0.1s" data-wow-duration="1s">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="page-title text-center">
                    <h2>{{ $category->name }}</h2>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- PAGE TITLE END -->

<!-- PRODUCTS SECTION -->
<section class="product-section wow fadeInUp" data-wow-delay="0.2s" data-wow-duration="1.2s">
    <div class="container">
        <div class="row">
            @foreach ($product as $key => $value)
                <div class="col-sm-6 col-md-4 col-lg-3 mb-4">
                    <div class="card product-card shadow-sm border-0 wow zoomIn" data-wow-delay="0.{{ $key + 3 }}s" data-wow-duration="1s">
                        <div class="product-image-wrapper">
                           <a href="{{route('product.details',$value->slug)}}"> <img src="{{ asset($value->image) }}" class="card-img-top" alt="{{ $value->title }}"></a>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">
                                <i class="fa-regular fa-circle-check text-success me-2"></i>{{ $value->title }}
                            </h5>
                            <p class="card-text small">{!! Str::limit(strip_tags($value->description), 100) !!}</p>
                            <a href="{{route('product.details',$value->slug)}}" class="btn btn-outline-primary btn-sm mt-2">Details</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

@endsection


@push('script')

<script>
    new WOW().init();
</script>
@endpush

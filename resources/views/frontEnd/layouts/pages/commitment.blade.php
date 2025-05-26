@extends('frontEnd.layouts.master')

@section('content')

<!-- PAGE TITLE START -->
<section class="custom-breadcrumb wow fadeIn" data-wow-delay="0.1s" data-wow-duration="1s">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="page-title">
                    <h2>Our Commitment</h2>
                    <p>At LRB Apparels, our commitment is to provide exceptional quality, ethical practices, and unparalleled service in every aspect of the garment production process. We prioritize transparency and sustainability, working only with manufacturers who share our values of fair labor, eco-friendly materials, and innovative craftsmanship Our dedication to building long-lasting partnerships ensures that every client receives tailored solutions, timely delivery, and products that meet the highest standards. We stand by our promise to bring your designs to life with integrity, precision, and passion.</p>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- PAGE TITLE END -->

@foreach($commitmentdata as $key => $item)
    <div class="col-sm-4 mb-4 wow fadeInUp" data-wow-delay="0.{{ $key + 3 }}s">
        <div class="commitment-card text-center h-100 p-3">
            <img src="{{ asset($item->image) }}" class="img-fluid mb-3 rounded" alt="{{ $item->title }}">
            <h5 class="fw-bold text-primary">{{ strtoupper($item->title) }}</h5>
            <ul class="list-unstyled text-muted small mt-2">
                {!! $item->description !!}
            </ul>
        </div>
    </div>
@endforeach


@endsection

@push('script')
<!-- Animate.css & WOW.js -->


<script>
    new WOW().init();
</script>
@endpush

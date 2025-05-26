@extends('frontEnd.layouts.master')

@section('content')

<!-- PAGE TITLE START -->
<section class="custom-breadcrumb wow fadeIn" data-wow-delay="0.1s" data-wow-duration="1s">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="page-title">
                    <h2>Our Commitment</h2>
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

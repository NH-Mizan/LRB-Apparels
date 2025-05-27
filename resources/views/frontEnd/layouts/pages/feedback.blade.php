@extends('frontEnd.layouts.master')

@section('content')

<!-- PAGE TITLE START -->
<section class="custom-breadcrumb wow fadeIn" data-wow-delay="0.1s" data-wow-duration="1s">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="page-title">
                    <h2>Leave Website Feedback</h2>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- PAGE TITLE END -->

<section class="feedback-section py-5">
    <div class="container">
        <div class="owl-carousel feedback-carousel owl-theme wow fadeInUp" data-wow-delay="0.2s" data-wow-duration="1.5s">
            @foreach($feedbackdata->chunk(2) as $chunk)
                <div class="item wow zoomIn" data-wow-delay="0.3s" data-wow-duration="1.2s">
                    <div class="row">
                        @foreach($chunk as $feedback)
                            <div class="col-sm-6">
                                <div class="feedback-card p-4 shadow-sm rounded mb-4 h-100 wow fadeInUp" data-wow-delay="0.4s" data-wow-duration="1s">
                                    <div class="d-flex align-items-center mb-3">
                                        <img src="{{ asset($feedback->image) }}" alt="User Image" class="rounded-circle me-3" style="width: 60px; height: 60px; object-fit: cover;">
                                        <div>
                                            <h5 class="mb-0">{{ $feedback->name }}</h5>
                                            <small class="text-muted">{{ $feedback->address }}</small>
                                        </div>
                                    </div>
                                    <p class="feedback-desc mb-0">{!! $feedback->description !!}</p>
                                </div>
                            </div>
                        @endforeach
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

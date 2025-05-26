@extends('frontEnd.layouts.master')
@section('title', $generalsetting->meta_title)

@push('seo')
@endpush

@section('content')

    <!-- Slider Section -->
    <section class="slider-section wow fadeIn" data-wow-delay="0.1s" data-wow-duration="1.2s">
        <div class="main-slider owl-carousel">
            @foreach ($sliders as $key => $value)
                <div class="slider-item">
                    <img src="{{ $value->image }}" alt="">
                </div>
            @endforeach
        </div>
    </section>

    <!-- Category Section -->
    <section class="main-slider-section wow fadeInUp" data-wow-delay="0.2s" data-wow-duration="1.2s">
        <div class="container">


            <div class="category-slider owl-carousel owl-theme">
                @foreach ($category as $key => $value)
                    <div class="item wow zoomIn" data-wow-delay="0.{{ $key + 2 }}s" data-wow-duration="1s">
                        <a href="{{ route('category', [$value->slug]) }}">
                            <div class="category-card">
                                <img src="{{ asset($value->image) }}" alt="">
                                <div class="category-title">
                                    <h4>{{ $value->name }}</h4>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Gallery Section -->
    <section class="gallery-section wow fadeInUp" data-wow-delay="0.3s" data-wow-duration="1.2s">
        <div class="container">
            <div class="license-title">
                <h2>our <span> gallery</span></h2>
            </div>

            <div class="gallery-slider owl-carousel">
                @foreach($galleries as $gallery)
                    @php
                        $photogalleries = App\Models\Galleryimage::where('gallery_id', $gallery->id)->limit(1)->get(); 
                    @endphp
                    @foreach($photogalleries as $galleryimage)
                        <div class="wow zoomInn gallery-area" data-wow-delay="0.4s" data-wow-duration="1s">
                            <a href="{{ route('gallerydetails', [$galleryimage->gallery_id]) }}">
                                <img class="img-fluid" src="{{ asset($galleryimage->image) }}" alt="{{ $galleryimage->title }}" />
                            </a>
                        </div>
                    @endforeach
                @endforeach
            </div>
        </div>
    </section>

    <!-- About LRB Apparels Section -->
    <section class="about-lrb-section wow fadeIn" data-wow-delay="0.4s" data-wow-duration="1.2s">
        <div class="container">
        <div class="license-title">
                    <h2>LRB<span> Apparels</span> </h2>
                </div>
            <div class="row">
                @php
                    $delay = 0.5;
                @endphp
                <div class="col-sm-6 col-lg-3">
                    <div class="about-card wow fadeInUp" data-wow-delay="{{ $delay }}s" data-wow-duration="1s">
                        <img src="{{ asset('/public/frontEnd/images/world.png') }}" alt="World Wide">
                        <div class="about-info">
                            <h4><i class="fa-regular fa-circle-check"></i> World wide shipment</h4>
                            <p>Delivering quality products globally with fast and safe shipping service.</p>
                        </div>
                    </div>
                </div>

                @php $delay += 0.1; @endphp
                <div class="col-sm-6 col-lg-3">
                    <div class="about-card wow fadeInUp" data-wow-delay="{{ $delay }}s" data-wow-duration="1s">
                        <img src="{{ asset('/public/frontEnd/images/images1.png') }}" alt="Best Quality">
                        <div class="about-info">
                            <h4><i class="fa-regular fa-circle-check"></i> Best Quality</h4>
                            <p>Best quality products with fast, reliable worldwide shipping and support.</p>
                        </div>
                    </div>
                </div>

                @php $delay += 0.1; @endphp
                <div class="col-sm-6 col-lg-3">
                    <div class="about-card wow fadeInUp" data-wow-delay="{{ $delay }}s" data-wow-duration="1s">
                        <img src="{{ asset('/public/frontEnd/images/best.png') }}" alt="Best Offer">
                        <div class="about-info">
                            <h4><i class="fa-regular fa-circle-check"></i> Best Offer</h4>
                            <p>Best offers on top-quality products with fast worldwide shipping service.</p>
                        </div>
                    </div>
                </div>

                @php $delay += 0.1; @endphp
                <div class="col-sm-6 col-lg-3">
                    <div class="about-card wow fadeInUp" data-wow-delay="{{ $delay }}s" data-wow-duration="1s">
                        <img src="{{ asset('/public/frontEnd/images/payment.png') }}" alt="Secure Payment">
                        <div class="about-info">
                            <h4><i class="fa-regular fa-circle-check"></i> Secure Payment</h4>
                            <p>Best offers, top quality, secure payment, and fast worldwide shipping.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- License Section -->
    <section class="wow fadeInUp" data-wow-delay="0.6s" data-wow-duration="1.2s">

        <div class="container">
            <div class="license-logo-item">
                <div class="license-title">
                  <div class="license-text">  <h2 class=""><span>LRB</span> Apparels License</h2></div>
                </div>

                <div class="row">

                    <!-- Content here -->
                    @foreach ($license as $key => $value)
                        <div class="col-sm-6 col-md-4 col-lg-2">
                            <div class="license-logo-area">
                                <img src="{{ asset($value->image) }}" alt="">
                            </div>
                        </div>
                    @endforeach
                </div>

            </div>
        </div>
        </div>
    </section>

@endsection

@push('script')
    <!-- Animate.css & WOW.js -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.min.js"></script>
    <script>
        new WOW().init();
    </script>
@endpush
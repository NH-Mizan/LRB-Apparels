@extends('frontEnd.layouts.master')
@section('title', $generalsetting->meta_title)
@section('content')
    
    @include('frontEnd.layouts.pages.leftsidebar')
    <div class="col-sm-7 order-1 order-sm-2">
        <!-- PAGE TITLE START -->
        <section class="custom-breadcrumb">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="page-title">
                            <h2>{{ $details->title }}</h2>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- PAGE TITLE END -->

        <section class="service-details-page">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="section-inner">
                            <!-- <div class="details-breadcrumb">
                                <ul id="breadcrumbs" class="breadcrumbs">
                                    <li class="item-home">
                                        <a class="bread-link bread-home" href="{{ route('home') }}" title="Home">Home</a>
                                    </li>
                                    <li class="separator separator-home"> <span></span> </li>
                                    <li class="item-cat"><a href="{{ route('blogs') }}">News & Events</a></li>
                                    <li class="separator"> <span></span> </li>
                                    <li class="item-current"><span class="bread-current bread-107"
                                            title="Smartwatch Buying Guide with Features to Look For">{{ $details->title }}</span>
                                    </li>
                                </ul>
                            </div> -->

                            <h1>{{ $details->title }}</h1>

                            <div class="service-details-image">
                                <img src="{{ asset($details->image) }}" alt="">
                            </div>

                            <div class="service-details-description">
                                {!! $details->description !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    @include('frontEnd.layouts.pages.rightsidebar')
@endsection

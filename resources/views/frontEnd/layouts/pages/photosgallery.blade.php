@extends('frontEnd.layouts.master')
@section('title', $generalsetting->meta_title)
@section('content')
    

     <!-- ======= B2B GALLERY DESIGN START ======== -->
    <section class="achievement-section home-photos">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="common-heading">
                        <h5>ফোটো গ্যালারি </h5>
                    </div>
                </div>
                <div class="col-sm-12">
                    <div class="achievement-main" id="lightgallery">
                        @foreach($bussinessgallery as $key => $value)
                        <div class="achievement-items" data-src="{{ asset($value->image) }}">
                            <div class="achievement-image">
                                <a href="">
                                <img src="{{ asset($value->image) }}" alt="">
                                </a>
                            </div>
                            
                        </div>
                        @endforeach
                    </div>
                    <!-- end-item -->


                </div>


            </div>
        </div>
    </section>
    <!-- ======= B2B GALLERY DESIGN END ======== -->
    
    
    
@endsection

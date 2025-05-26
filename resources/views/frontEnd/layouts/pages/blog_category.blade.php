@extends('frontEnd.layouts.master')
@section('title', $category->meta_title)
@section('content')
   
    @include('frontEnd.layouts.pages.leftsidebar')
    <div class="col-sm-7 order-1 order-sm-2">
        <!-- PAGE TITLE START -->
        <div class="blog-head-content">
                <h6><i class="fa-solid fa-folder-open"></i> CATEGORY : {{ $category->name }}</h6>
            </div>
        <!-- PAGE TITLE END -->

        <section class="blog-page-section articale-page">
            <div class="container-fluid">
                <div class="blog-devide">
                    @foreach ($blogs as $key => $value)
                        @include('frontEnd.layouts.pages.common_blog')
                    @endforeach
                </div>
                
            </div>
        </section>
    </div>
    @include('frontEnd.layouts.pages.rightsidebar')

@endsection


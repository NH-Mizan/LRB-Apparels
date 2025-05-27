<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>@yield('title') - {{ $generalsetting->name }}</title>
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset($generalsetting->favicon) }}" alt="Websolution IT" />
    <meta name="author" content="Websolution IT" />
    <link rel="canonical" href="" />
    @stack('seo')
    @stack('css')
    <link rel="stylesheet" href="{{ asset('public/frontEnd/css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('public/frontEnd/css/animate.css') }}" />
    <link rel="stylesheet" href="{{ asset('public/frontEnd/css/all.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('public/frontEnd/css/owl.carousel.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('public/frontEnd/css/owl.theme.default.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('public/backEnd/') }}/assets/css/toastr.min.css" />
    <link rel="stylesheet" href="{{ asset('public/frontEnd/') }}/css/lightgallery.css" />
    <link rel="stylesheet" href="{{ asset('public/frontEnd/') }}/css/twentytwenty.css" />
    <link rel="stylesheet" href="{{ asset('public/frontEnd/css/style.css?v=1.0.20') }}" />
    <link rel="stylesheet" href="{{ asset('public/frontEnd/css/responsive.css?v=1.0.20') }}" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <script src="{{ asset('public/frontEnd/js/jquery-3.7.1.min.js') }}"></script>

</head>

<body class="gotop">
    <header class="fixed-top" id="navbar_top">
        <!-- LOGO & MENU  START -->

        <!-- LOGO & MENU  END -->
        <!-- MAIN LOGO END  -->
        <div class="website-middle-logo">
            <div class="container-fluid">
                <div class="header-inner">
                    <div class="row">

                        <div class="col-sm-4">
                            <div class="logo-menu">
                                <a href="{{ route('home') }}">L<span>RB</span> APPARELS</a>
                            </div>
                        </div>

                        <div class="col-sm-4">
                            <div class="social-icon">
                                <ul>
                                    @foreach ($socialicons as $key => $value)

                                        <li><a href="{{ $value->link }}" target="_blank"><i
                                                    class="{{ $value->icon}} }}"></i></a></li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="side-bar menu-bar">
                                <a class="toggle" id="toggle">
                                    <span class="bar-one"></span>
                                    <span class="bar-two"></span>
                                    <span class="bar-three"></span>
                                </a>
                                <!-- <a class="toggle"><i class="fa-solid fa-bars "></i></a> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- MAIN LOGO START  -->

        <div class="mobile-header">
            <div class="mobile-logo">
                <div class="menu-logo">
                    <div class="logo-menu">
                        <a href="{{ route('home') }}">L<span>RB</span> APPARELS</a>
                    </div>
                </div>
                <div class="menu-bar">
                    <a class="toggle" id="toggle">
                        <span class="bar-one"></span>
                        <span class="bar-two"></span>
                        <span class="bar-three"></span>
                    </a>
                </div>
            </div>
        </div>

        <div class="mobile-menu ">
            <div class="mobile-menu-wrap">
                <div class="user-and-notification">
                    <div class="mobile-auth">
                        <ul>
                            <li>
                                <div class="logo-menu">
                                    <a href="{{ route('home') }}">L<span>RB</span> APPARELS</a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                <ul class="mobile-nav">
                    <li><a href="{{ route('home') }}"><i class="fa-solid fa-angles-right"></i> Home</a></li>
                    <li><a href="{{ route('about_us') }}"><i class="fa-solid fa-angles-right"></i> About Us</a></li>
                    <li><a href="{{ route('whychoose') }}"><i class="fa-solid fa-angles-right"></i> Why Choose Us</a>
                    </li>
                    <li><a href="{{ route('commitment') }}"><i class="fa-solid fa-angles-right"></i> Our Commitment</a>
                    </li>
                    <li class="extra"><a href="#"><i class="fa-solid fa-angles-right"></i> Products</a>
                        <ul class="sub-menu">
                            @foreach ($categories as $key => $value)
                                <li><a href="{{route('category', [$value->slug])}}"><i class="fa-solid fa-angles-right"></i>
                                        {{ $value->name }}</a></li>
                            @endforeach


                        </ul>
                    </li>
                    <li><a href="{{ route('about_us') }}"><i class="fa-solid fa-angles-right"></i> Client Assessment</a>
                    </li>
                    <li><a href="{{ route('contact') }}"><i class="fa-solid fa-angles-right"></i> Contact Us</a></li>
                    <li><a href="{{ route('feedback') }}"><i class="fa-solid fa-angles-right"></i> Leave website
                            feedback</a></li>


                </ul>
            </div>
        </div>
        <section class="search-section">
            <div class="container">
                <div class="search-box">
                    <input type="text" placeholder="Search here...">
                    <button><i class="fa-solid fa-magnifying-glass"></i></button>
                </div>
            </div>
        </section>

    </header>
    <!-- MASTER BODY WORK START -->
    <section class="master-body">
        <div class="container-fluid">
            <div class="row">
                @yield('content')
            </div>
        </div>
    </section>
    <!-- MASTER BODY WORK END -->


    <footer id="footer" class="bg-one">
        <div class="top-footer" bis_skin_checked="1">
            <div class="container" bis_skin_checked="1">
                <div class="row" bis_skin_checked="1">
                    <!-- Contact -->
                    <div class="col-lg-4 col-md-6 mb-5 mb-lg-0" bis_skin_checked="1">
                        <h3>Contact Us</h3>
                        <p>Have questions or want to speak directly? Reach out to us:</p>
                        <div class="footer-contact-info" bis_skin_checked="1">
                            <div class="contact-info-item" bis_skin_checked="1">
                                <i class="fa-solid fa-phone icon"></i>
                                <span>{{$contact->phone }}</span>
                            </div>
                            <div class="contact-info-item" bis_skin_checked="1">
                                <i class="fa-solid fa-envelope icon"></i>
                                <span>{{$contact->email }}</span>
                            </div>
                            <div class="contact-info-item" bis_skin_checked="1">
                                <i class="fa-solid fa-house icon"></i>
                                <span>{{$contact->address }}</span>
                            </div>
                        </div>
                    </div>

                    <!-- Services offered -->
                    <div class="col-lg-3 col-md-6 mb-5 mb-lg-0" bis_skin_checked="1">
                        <ul class="footer__data">
                            <li>
                                <h3>Our Products</h3>
                            </li>
                            @foreach ($categories as $key => $value)
                                <li><a href="{{route('category', [$value->slug])}}"></i>
                                        {{ $value->name }}</a></li>
                            @endforeach
                        </ul>
                    </div>

                    <!-- Quick Links -->
                    <div class="col-lg-2 col-md-6 mb-5 mb-md-0" bis_skin_checked="1">
                        <ul class="footer__data">
                            <li>
                                <h3>Quick Links</h3>
                            </li>
                            <li><a href="{{ route('about_us') }}">About Us</a></li>
                            <li><a href="whychoose">Why choose us</a></li>
                            <li><a href="contact">contact us</a></li>
                            <li><a href="">Feedback</a></li>
                        </ul>
                    </div>

                    <!-- Social Media Links -->
                    <div class="col-lg-3 col-md-6" bis_skin_checked="1">
                        <ul class="footer__data">
                            <li>
                                <h3>Connect with us</h3>
                            </li>
                            <li><a href="https://www.facebook.com/share/p/MgZRBhnSLgJUqnXm/"
                                    target="_blank">Facebook</a></li>
                            <li><a href="https://www.linkedin.com/company/essencia-sourcing/?viewAsMember=true"
                                    target="_blank">Linked In</a></li>
                            <li><a href="#" target="_blank">Twitter</a></li>
                            <li><a href="https://www.instagram.com/invites/contact/?igsh=1x0x61bwy8fit&amp;utm_content=wb5mij4"
                                    target="_blank">Instragram</a></li>
                        </ul>
                    </div>
                </div>
            </div> <!-- end container -->
        </div>
        <div class="footer-bottom">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="copyright">
                            <p> Copyright © <span>LRB Apparels</span> All rights reserved. Design &amp; Developed
                                By<a href="https://websolutionit.com/" target="_blank"> <span> Websolution IT</span></a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
<!-- Extra section  -->

    <div class="scrolltop" style="">
        <div class="scroll">
        <i class="fa-solid fa-angle-up"></i>
        </div>
    </div>
    <div class="fixed_whats">
        <a href="https://api.whatsapp.com/send?phone=8801846494272" target="_blank"><i
                class="fa-brands fa-whatsapp"></i></a>
    </div>

    <!-- Extra section End -->
    <script src="{{ asset('public/frontEnd/js/popper.min.js') }}"></script>
    <script src="{{ asset('public/frontEnd/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('public/frontEnd/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('public/frontEnd/js/isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset('public/frontEnd/js/imagesloaded.pkgd.min.js') }}"></script>
    <script src="{{ asset('public/frontEnd/js/jquery.event.move.js') }}"></script>
    <script src="{{ asset('public/frontEnd/js/lightgalleryl.min.js') }}"></script>
    <script src="{{ asset('public/frontEnd/js/jquery.twentytwenty.js') }}"></script>
    <script src="{{ asset('public/frontEnd/js/script.js') }}"></script>
    <script src="{{asset('public/backEnd/')}}/assets/js/toastr.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.min.js"></script>
    {!! Toastr::message() !!} @stack('script')
    <script>
        /*-----------------------------
                                    -------  twentytwenty  --------
                                    ------------------------------*/
        $(window).on('load', function () {
            $(".portfolio-images").twentytwenty({
                before_label: '',
                after_label: '',
                move_slider_on_hover: true,
                move_with_handle_only: true,
                click_to_move: true
            });
        });
    </script>
    @stack('script')
    <script>
        $(".toggle").on("click", function (event) {
            event.stopPropagation();
            $(".mobile-menu").toggleClass("active");
            $(this).toggleClass('show');
        });
    </script>

    <script>
        $('#portfolio').imagesLoaded(function () {
            var $grid = $('.grid').isotope({});
            $('.portfolio-isotop-btn').on('click', 'button', function () {
                $('button').removeClass("active");
                $(this).addClass("active");
                var filterValue = $(this).attr('data-filter');
                $grid.isotope({
                    filter: filterValue
                });
            });
            var $grid = $('.portfolio-inner').isotope({
                itemSelector: '.single-portfolio',
                percentPosition: true,
                masonry: {
                    columnWidth: '.single-portfolio'
                }
            });
        });
        // portfolio js end
        $('#lightgallery').lightGallery(); 
    </script>
    <script>
        $(document).ready(function () {
            $('.count-number').each(function () {
                var $this = $(this);
                var countTo = $this.text().replace('+', ''); // "+" সাইন বাদ দিয়ে সংখ্যা নেওয়া
                $({ countNum: 0 }).animate({ countNum: countTo }, {
                    duration: 3000, // ১.৫ সেকেন্ড সময়
                    easing: 'swing',
                    step: function () {
                        $this.text(Math.floor(this.countNum) + " +");
                    },
                    complete: function () {
                        $this.text(this.countNum + " +");
                    }
                });
            });
        });
    </script>
    <script>
        $(window).scroll(function () {
            if ($(this).scrollTop() > 50) {
                $(".scrolltop:hidden").stop(true, true).fadeIn();
            } else {
                $(".scrolltop").stop(true, true).fadeOut();
            }
        });
        $(function () {
            $(".scroll").click(function () {
                $("html,body").animate({
                    scrollTop: $(".gotop").offset().top
                }, "1000");
                return false;
            });
        });
    </script>
</body>

</html>
jQuery(document).ready(function () {
    "use strict";

        // main slider 
        $(".main-slider").owlCarousel({
            items: 1,
            loop: true,
            dots: false,
            autoplay: true,
            nav: true,
            autoplayHoverPause: false,
            margin: 0,
            mouseDrag: true,
            smartSpeed: 1000,
            autoplayTimeout: 5000,

            // navText: ["<i class='fa-solid fa-angle-left'></i>",
            //     "<i class='fa-solid fa-angle-right'></i>"
            // ],

            responsive: {
                0: {
                    nav: false
                },
                600: {
                    nav: false
                },
                1000: {
                    nav: false
                }
            }
        });
        // brand slider
    $("#brandCarousel").owlCarousel({
        items: 5,
        loop: true,
        dots: false,
        autoplay: true,
        nav: true,
        autoplayHoverPause: false,
        margin: 0,
        mouseDrag: true,
        smartSpeed: 1000,
        autoplayTimeout: 5000,
        navText: ["<i class='fa-solid fa-angle-double-left'></i>",
            "<i class='fa-solid fa-angle-double-right'></i>"
        ],
        responsive: {
            0: {
                items: 2,
                nav: false
            },
            600: {
                items: 3,
                nav: false
            },
            1000: {
                items: 5,
                nav: false
            }
        }
    });
    $(".achievement-carousel").owlCarousel({
        items: 4,
        loop: true,
        dots: false,
        autoplay: true,
        nav: true,
        autoplayHoverPause: false,
        margin: 0,
        mouseDrag: true,
        smartSpeed: 1000,
        autoplayTimeout: 5000,
        navText: ["<i class='fa-solid fa-angle-double-left'></i>",
            "<i class='fa-solid fa-angle-double-right'></i>"
        ],
        responsive: {
            0: {
                items: 2,
                nav: false
            },
            600: {
                items: 2,
                nav: false
            },
            1000: {
                items: 4,
                nav: false
            }
        }
    });
   
    // brand slider
    $("#testimonialCarousel").owlCarousel({
        items: 3,
        loop: true,
        dots: false,
        autoplay: true,
        nav: true,
        autoplayHoverPause: true,
        margin: 20,
        mouseDrag: true,
        smartSpeed: 1000,
        autoplayTimeout: 5000,
        navText: ["<i class='fa-solid fa-angle-double-left'></i>",
            "<i class='fa-solid fa-angle-double-right'></i>"
        ],
        responsive: {
            0: {   
                items: 1,
                nav: false
            },
            600: {  
                items: 2,
                nav: false
            },
            1000: { 
                items: 3,
                nav: false
            }
        }
    });
    $('.select2').select2();

})




$(document).ready(function(){
    $('.category-slider').owlCarousel({
        loop:true,
        margin:30,
        nav:true,
        dots: false,
        items: 3,
        autoplay: true,
        autoplayHoverPause: false,
        smartSpeed: 500,
        autoplayTimeout: 6000,
        navText: ['<i class="fa fa-angle-left"></i>', '<i class="fa fa-angle-right"></i>'],
        responsive:{
            0:{ items:2,  nav: false },
            600:{ items:3 },
            1000:{ items:5 }
        }
    });
  });


$(document).ready(function(){
    $('.gallery-slider').owlCarousel({
        loop:true,
        margin:30,
        nav:true,
        dots: true,
        items: 3,
        navText: ['<i class="fa fa-angle-left"></i>', '<i class="fa fa-angle-right"></i>'],
        responsive:{
            0:{ items:1, nav:false, },
            600:{ items:1 },
            1000:{ items:2 }
        }
    });
  });




  
document.addEventListener("DOMContentLoaded", function(){
    window.addEventListener('scroll', function() {
        if (window.scrollY >50) {
          document.getElementById('navbar_top').classList.add('fixed-top');
          // add padding top to show content behind navbar
          navbar_height = document.querySelector('.navbar').offsetHeight;
          document.body.style.paddingTop = navbar_height + 'px';
        } else {
          document.getElementById('navbar_top').classList.remove('fixed-top');
           // remove padding top from body
          document.body.style.paddingTop = '0';
        } 
    });
  });
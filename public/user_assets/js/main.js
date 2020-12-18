$(document).ready(function () {
    $('#crowd-slider').owlCarousel({
        nav: true,
        loop: true,
        margin: 0,
        autoplay: true,
        autoplaySpeed: 1000,
        autoplayTimeout: 5000,
        dots: false,
        responsive: {
            0: {
                items: 1
            }
        }
    });

    $('#banner-slider').owlCarousel({
        nav: false,
        loop: true,
        margin: 0,
        autoplay: true,
        autoplaySpeed: 3000,
        autoplayTimeout: 3000,
        dots: false,
        animateOut: 'fadeOut',
        animateIn: 'fadeIn',
        responsive: {
            0: {
                items: 1
            }
        }
    });

    if ($(window).width() < 767) {
        $(".cross").hide();
        $(".hdr-right").hide();
        $(".hamburger").click(function () {
            $(".hdr-right").slideToggle("slow", function () {
                $(".hamburger").hide();
                $(".cross").show();
            });
        });

        $(".cross").click(function () {
            $(".hdr-right").slideToggle("slow", function () {
                $(".cross").hide();
                $(".hamburger").show();
            });
        });
    }

      

});
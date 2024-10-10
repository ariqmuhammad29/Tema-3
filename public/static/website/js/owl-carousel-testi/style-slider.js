$(document).ready(function () {
    $('.owl-carousel').owlCarousel({
        loop: true,
        margin: 70,
        responsiveClass: true,
        center: true,
        nav: false,
        autoplay: false,
        responsive: {
            375: {
                items: 1,

            },
            600: {
                items: 1,

            },
            2000: {
                items: 1,

            }
        }
    })

    $('.owl-prev').click(function () {
        $('.owl-carousel').trigger('prev.owl.carousel');
    });

    $('.owl-next').click(function () {
        $('.owl-carousel').trigger('next.owl.carousel');
    });
    
});
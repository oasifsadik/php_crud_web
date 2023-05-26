$(document).ready(function() {

    // pre loader
    $(window).on('load', function() {
        $('.preloader').fadeOut(3000);
    });


    // slick sllider
    $('.slider').slick({
        autoplay: true,
        autoplaySpeed: 2000,
        dots: true
    });



    // scroll to top
    $(window).scroll(function() {
        if ($(this).scrollTop() > 250) {
            $(".scroll-to-top").fadeIn();
        } else {
            $(".scroll-to-top").fadeOut();
        }
    });
    $(".scroll-to-top").on("click", function() {
        $("html , body").animate({
            scrollTop: 0
        });
    })
});
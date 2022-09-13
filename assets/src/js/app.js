$(document).ready(function() {

    /*var lazyLoadInstance = new LazyLoad({
        elements_selector: ".lazy"
        // ... more custom settings?
    });*/

    $('.hamburger.navbar-toggler').on('click',function(){
        //console.log('hamburger');
        $(this).toggleClass('is-active')
    })
     
        
    $('.home-slider').slick({
        dots: true,
        infinite: false,
        speed: 300,
        slidesToShow: 1,
        adaptiveHeight: false 
    });
 
    $('.tolding-about__wrapper').slick({
        dots: true,
        infinite: true,
        speed: 300,
        slidesToShow: 1,
        adaptiveHeight: true
    });

    $('.trip__slider').slick({
        dots: false,
        infinite: true,
        arrows: true,
        autoplay: true,
        speed: 3000,
        slidesToShow: 1,
        adaptiveHeight: true
    });


     
   

});

 
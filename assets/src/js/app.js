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
        speed: 1000,
        slidesToShow: 1,
        adaptiveHeight: false
    });

    jQuery('<div class="quantity-nav"><div class="quantity-button quantity-up">+</div><div class="quantity-button quantity-down">-</div></div>').insertAfter('.quantity input');
    jQuery('.quantity').each(function() {
      var spinner = jQuery(this),
        input = spinner.find('input[type="number"]'),
        btnUp = spinner.find('.quantity-up'),
        btnDown = spinner.find('.quantity-down'),
        min = input.attr('min'),
        max = input.attr('max');

      btnUp.click(function() {
        var oldValue = parseFloat(input.val());
        if (oldValue >= max) {
          var newVal = oldValue;
        } else {
          var newVal = oldValue + 1;
        }
        spinner.find("input").val(newVal);
        spinner.find("input").trigger("change");
      });

      btnDown.click(function() {
        var oldValue = parseFloat(input.val());
        if (oldValue <= min) {
          var newVal = oldValue;
        } else {
          var newVal = oldValue - 1;
        }
        spinner.find("input").val(newVal);
        spinner.find("input").trigger("change");
      });

    });

    $('.totrip a').on('click', function(){
        let termin = $(this).attr('data-termin');
        let title = $(this).attr('data-title');
        let url = $(this).attr('data-url'); 
        let modal = $(this).attr('data-target'); 

        $(modal).find('input[name="nazov-zajazdu"]').val(title);
        $(modal).find('input[name="termin"]').val(termin);
        $(modal).find('input[name="url-clanku"]').val(url);

    });
     
   

});

 
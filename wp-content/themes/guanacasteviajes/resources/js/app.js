
require('./config');
const $ = require('jquery');
require('slick-carousel');
require('./vendor/jquery.magnific-popup.min.js');
require('./vendor/select2.min.js');
const hoverintent = require('hoverintent');

AOS.init({
    once: true,
});

$menu = document.querySelectorAll('.menu .menu-item-has-children'),
$btnMenu = $('.btn-menu'),
$fullMenu = $('.menu');

$menu.forEach(element => {
    hoverintent(element,
        function () {
            $(element).find('>.sub-menu').slideDown(200);
        }, function () {
            $(element).find('>.sub-menu').slideUp(200);
        }).options({
            timeout: 200,
            interval: 50
        });
});

$btnMenu.on('click', function (e) {

    $fullMenu.toggleClass('open');

});

$('select').select2();
$('select[name="product_cat"]').select2({
  placeholder: 'Category',
  allowClear: true

});
$('select[name="location"]').select2({
  placeholder: 'Location',
  allowClear: true
});
  var formFiltersTour = $('.form-filters-tour');
 $('select[name="location"]').change(function (e) {
     
      formFiltersTour.submit();
 })
  $('select[name="product_cat"]').change(function (e) {
      formFiltersTour.submit();
 })

$('.banner-slider').slick({
    dots: true,
    autoplay:true,
    autoplaySpeed:5000,
    speed: 500,
    arrows: false,
    cssEase: 'linear',
    fade: true,
    pauseOnHover: false
});

$('.tripadvisor-slider').slick({
    infinite: true,
    slidesToShow: 3,
    slidesToScroll: 1,
    speed: 500,
    arrows: true,
    dots: true,
    nextArrow:'<button class="slick-prev slick-arrow" aria-label="Previous" type="button"><i class="fas fa-angle-left"></i></button>',
    prevArrow:'<button class="slick-next slick-arrow" aria-label="Next" type="button"><i class="fas fa-angle-right"></i></button>',
    //appendArrows: '.others-arrows',
    responsive: [
    {
      breakpoint: 768,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1,
      }
    }
   ]
});
$('.slider-gallery').slick({
    infinite: true,
    slidesToShow: 5,
    slidesToScroll: 1,
    speed: 500,
    arrows: true,
    dots: true,
    autoplay:true,
    autoplaySpeed:5000,
    nextArrow:'<button class="slick-prev slick-arrow" aria-label="Previous" type="button"><i class="fas fa-angle-left"></i></button>',
    prevArrow:'<button class="slick-next slick-arrow" aria-label="Next" type="button"><i class="fas fa-angle-right"></i></button>',
    //appendArrows: '.others-arrows',
    responsive: [
    {
      breakpoint: 768,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1,
      }
    }
   ]
});

$('.slider-gallery').magnificPopup({
    delegate: '.woocommerce-product-gallery__image a', // child items selector, by clicking on it popup will open
    type: 'image',
    gallery:{
        enabled:true
      }
    
  });

$('.tour-popup-link').magnificPopup({
    type: 'inline',
    midClick: true,
    removalDelay: 500, //delay removal by X to allow out-animation
    callbacks: {
        beforeOpen: function() {

            this.st.mainClass = 'mfp-zoom-out';
            $('body').addClass('mfp-open');
        },
        beforeClose: function() {

           
            $('body').removeClass('mfp-open');
        }

    }

   
});
$('.hotel-popup-link').magnificPopup({
    type: 'inline',
    midClick: true,
    removalDelay: 500, //delay removal by X to allow out-animation
    callbacks: {
        beforeOpen: function() {

            this.st.mainClass = 'mfp-zoom-out';
            $('body').addClass('mfp-open');
        },
        beforeClose: function() {

           
            $('body').removeClass('mfp-open');
        }

    }

   
});

$('.tour-popup-link').on('click',function (e) {
      
    
    
    //$('#tour-popup').find('select[name="tours[]"] option[value="'+ $(this).attr('data-title') +'"]').attr("selected",true).change();
    $('#tour-popup').find('input[name="your-subject"]').val('Inquire for '+$(this).attr('data-title'));
    
    console.log($('#tour-popup').find('select[name="tours[]"] option[value="'+ $(this).attr('data-title') +'"]'))
    

    });

  

    $('.hotel-popup-link').on('click',function (e) {
      
     
    
      //$('#tour-popup').find('select[name="tours[]"] option[value="'+ $(this).attr('data-title') +'"]').attr("selected",true).change();
      $('#hotel-popup').find('input[name="your-subject"]').val('Inquire for '+$(this).attr('data-title') + ' Transportation');
      
      
      

      });


      var btnIncludes = $('.product-description-accordion-button');
      var IncludesContent = $('.product-description-accordion-content');
      
      IncludesContent.addClass('hidden');
  
      btnIncludes.on('click', function (e) {
          $(this)
              .next()
              .slideToggle(200);
              /*.siblings('.product-description-accordion-content')
              .slideUp(200);*/
  
      });

      $('input[data-confirm], button[data-confirm]').on('click', function(e){
        var input = $(this);
 
         input.prop('disabled','disabled');
 
         if(! confirm(input.data('confirm'))){
             e.preventDefault();
         }
     });


      // SMOOTH ANCHOR SCROLLING
    var $root = $('html, body');
    $('a.anchor').click(function(e) {
        var href = $.attr(this, 'href');
        if (typeof($(href)) != 'undefined' && $(href).length > 0) {
            var anchor = '';

            if (href.indexOf("#") != -1) {
                anchor = href.substring(href.lastIndexOf("#"));
            }

            if (anchor.length > 0) {
                console.log($(anchor).offset().top);
                console.log(anchor);
                $root.animate({
                    scrollTop: $(anchor).offset().top
                }, 500, function() {
                    window.location.hash = anchor;
                });
                e.preventDefault();
            }
        }
    });



 $(window).scroll(function () {

          if ($(this).scrollTop() > 100) {
              $('.sticky-header').addClass("open");
          } else {
              $('.sticky-header').removeClass("open");
          }

  });


console.log('cargado');


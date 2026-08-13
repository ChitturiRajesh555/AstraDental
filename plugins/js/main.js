$(function () {
  $(document).scroll(function () {
    var $nav = $(".top");
    $nav.toggleClass('scrolled', $(this).scrollTop() > $nav.height());
  });
  $(document).scroll(function () {
    var $nav = $(".navbar-nav>li>a");
    $nav.toggleClass('scrolled', $(this).scrollTop() > $nav.height());
  });
  $(document).scroll(function () {
    var $nav = $(".navbar");
    $nav.toggleClass('scrolled', $(this).scrollTop() > $nav.height());
  });
});


// scroll animation 

jQuery(function($) {
  
  var doAnimations = function() {
    
    var offset = $(window).scrollTop() + $(window).height(),
        $animatables = $('.animatable');
    
    if ($animatables.length == 0) {
      $(window).off('scroll', doAnimations);
    }
    
		$animatables.each(function(i) {
       var $animatable = $(this);
			if (($animatable.offset().top - 0) < offset) {
        $animatable.removeClass('animatable').addClass('animated');
			}
    });

	};
  
	$(window).on('scroll', doAnimations);
  $(window).trigger('scroll');

});

// scroll animation 


// scroll top 
$(window).scroll(function () {
  if ($(this).scrollTop() > 50) {
    $('.scrolltop:hidden').stop(true, true).fadeIn();
  } else {
    $('.scrolltop').stop(true, true).fadeOut();
  }
});
$(function () {
  $(".scroll").click(function () {
    $("html,body").animate({
      scrollTop: $(".thetop").offset().top
    }, "1000");
    return false
  })
});


// gallery popup 

$(document).ready(function () {
  $('.image-popup-vertical-fit').magnificPopup({
    type: 'image',
    mainClass: 'mfp-with-zoom',
    gallery: {
      enabled: true
    },
    zoom: {
      enabled: true,
      duration: 300, // duration of the effect, in milliseconds
      easing: 'ease-in-out', // CSS transition easing function
      opener: function (openerElement) {
        return openerElement.is('img') ? openerElement : openerElement.find('img');
      }
    }
  });
});

// gallery popup

// testimonials 

(function () {
  "use strict";

  var carousels = function () {
    $(".owl-carousel1").owlCarousel({
      loop: true,
      center: true,
      autoplay: true,
      autoplayTimeout: 3000,
      margin: 0,
      responsiveClass: true,
      nav: false,
      responsive: {
        0: {
          items: 1,
          nav: false
        },
        680: {
          items: 1,
          nav: false,
          loop: false
        },
        1000: {
          items: 1,
          nav: true
        }
      }
    });
  };

  (function ($) {
    carousels();
  })(jQuery);
})();
var jsTriggers = document.querySelectorAll('.js-tab-trigger'),
    jsContents = document.querySelectorAll('.js-tab-content');

jsTriggers.forEach(function(trigger) {
   trigger.addEventListener('click', function() {
      var id = this.getAttribute('data-tab'),
          content = document.querySelector('.js-tab-content[data-tab="'+id+'"]'),
          activeTrigger = document.querySelector('.js-tab-trigger.active'),
          activeContent = document.querySelector('.js-tab-content.active');
      
      activeTrigger.classList.remove('active');
      trigger.classList.add('active');
      
      activeContent.classList.remove('active');
      content.classList.add('active');
   });
});
(function ($) {
  if ($(window).width() < 992) {
    $('.desktop-js').remove();
  } else {
    $('.mobile-js').remove();
  }

    $(".hamburger").on('click', function() {
      if ($(".hamburger").hasClass('active')) {
          $(".hamburger").removeClass('active');
          $(".header .brand").removeClass('open');
          $(".modal-btn").removeClass('d-none');
          $(".header").removeClass('active');
          $("body").removeClass('lock');
          $(".wrapper__block aside.sidebar").removeClass('active');
      } else {
          $(".hamburger").addClass('active');
          $(".header .brand").addClass('open');
          $(".modal-btn").addClass('d-none');
          $(".header").addClass('active');
          $("body").addClass('lock');
          $(".wrapper__block aside.sidebar").addClass('active');
      }
  }); 
    $('.topup').on('click', function(e) {
		e.preventDefault()
		$("body,html").animate({
				scrollTop:0
			}, 800);
			return false;
	})
	window.addEventListener( "scroll" , function() {
    document.querySelector(".topup").classList.toggle("active", this.pageYOffset > 170);
  });

        // $(".modal-wrapper, .modal-close").on('click', function() {
        // $(".modal-block").removeClass('active');
        // });

        $('.box-content.slider').slick({
            dots: false,
            infinite: true,
            speed: 1000,
            slidesToShow: 1,
            // adaptiveHeight: true,
            fade: true,
            swipeToSlide: true,
          });


          
  if ($(window).width() > 990) {
    $('.team__slider.first').slick({
      dots: false,
      arrows: true,
      infinite: true,
      speed: 1000,
      slidesToShow: 1,
      fade: true,
      swipeToSlide: true,
    });
  } 
          

  $('.js-tab-trigger').click(function() {
    $('.tab-content__item.first').removeClass('first');
    var id = $(this).attr('data-tab'),
        content = $('.js-tab-content[data-tab="'+ id +'"]');
    $('.js-tab-trigger.active').removeClass('active');
    $(this).addClass('active');

    $('.js-tab-content.active').removeClass('active');
    content.addClass('active');
    if ($(window).width() > 990) {
      $('.active.team__slider[data-tab="'+ id +'"]').slick({
        settings: "slick",
        dots: false,
        arrows: true,
        infinite: true,
        speed: 1000,
        slidesToShow: 1,
        fade: true,
        swipeToSlide: true,
      });
    } 
  });
	// $.fn.animated = function(inEffect, outEffect, offset) {
	// 	$(this).each(function() {
	// 		var ths = $(this);
	// 		ths.css("opacity", "0").addClass("animated").waypoint(function(dir) {
	// 			if (dir === "down" && inEffect) {
	// 				ths.addClass(inEffect).css("opacity", "1");
  //                   ths.removeClass(outEffect);
	// 			}
                
  //               if (dir === "up" && outEffect){
  //                   ths.addClass(outEffect).css("opacity", "1");
  //                   ths.removeClass(inEffect);
  //               }
	// 		}, {
	// 			offset: offset ? offset : "95%"
	// 		});

	// 	});
	// };

  // $(".service__title").animated("fadeInUp", "fadeOutDown");
})(jQuery);








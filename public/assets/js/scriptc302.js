/* Template	:	AppsLand v1.3.1 */
;(function($){
	'use strict';
	var $win = $(window), $body = $('body');
	// Smooth scrolling using jQuery easing
	$('a.nav-item[href*="#"]:not([href="#"])').on("click", function() {
		if (location.pathname.replace(/^\//, '') === this.pathname.replace(/^\//, '') && location.hostname === this.hostname) {
		  var toHash = $(this.hash), toHashN = (this.hash.slice(1)) ? $('[name=' + this.hash.slice(1) + ']') : false;
		  toHash = toHash.length ? toHash : toHashN;
		  if (toHash.length) {
			$('html, body').animate({
			  scrollTop: (toHash.offset().top - 70)
			}, 1000, "easeInOutExpo");
			return false;
		  }
		}
	});
	
	// Nav collapse
	$('.nav-item').on("click",function() {
		$('.navbar-collapse').collapse('hide');
		$('.dropdown').removeClass('open').children('.dropdown-menu').removeAttr('style');
	});
	
	// Bootstrap Dropdown 
	var $dropdown_menu = $('.dropdown');	
	if ($dropdown_menu.length > 0 ) {
		$dropdown_menu.on("mouseover",function(){
			if ($win.width() > 991) {
				$('.dropdown-menu', this).not('.in .dropdown-menu').stop().fadeIn("400");
				$(this).addClass('open'); 
			}
		});
		$dropdown_menu.on("mouseleave",function(){
			if ($win.width() > 991) {
				$('.dropdown-menu', this).not('.in .dropdown-menu').stop().fadeOut("400");
				$(this).removeClass('open'); 
			}
		});
		$dropdown_menu.on("click",function(){
			if ($win.width() < 991) {
				$(this).children('.dropdown-menu').slideToggle(500);
				return false;
			}
		});
	}
	$win.on('resize', function() {
		$('.navbar-collapse').removeClass('in');
		$dropdown_menu.children('.dropdown-menu').fadeOut("400");
	});
	
	// navigation ScrolSpy
	$body.scrollspy({
		target: '#navigation',
		offset: 90
	});
	
	//magnificPopup	Video
	var $video_play = $('.video-play');
	if ($video_play.length > 0 ) {
		$video_play.magnificPopup({
			type: 'iframe',
			removalDelay: 160,
			preloader: true,
			fixedContentPos: false
		});
	}
	
	//magnificPopup	Content
	var $content_popup = $('.content-popup');
	if ($content_popup.length > 0 ) {
		$content_popup.magnificPopup({
			type: 'inline',
			preloader: true,
			removalDelay: 400,
			mainClass: 'mfp-fade bg-gradiant'
		});
	}
	
	
	//Carousel
	var $has_carousel = $('.has-carousel');
	if ($has_carousel.length > 0 ) {
		$has_carousel.each(function(){
		  var $self = $(this);
		  var c_item = ($self.data('items')) ? $self.data('items') : 4;
		  var c_item_t = (c_item >= 3) ? 3 : c_item;
		  var c_item_m = (c_item_t >= 2) ? 2 : c_item_t;
		  var c_delay =($self.data('delay')) ? $self.data('delay') : 6000;
		  var c_auto =($self.data('auto')) ? true : false;
		  var c_loop =($self.data('loop')) ? true : false;
		  var c_dots = ($self.data('dots')) ? true : false;
		  var c_navs = ($self.data('navs')) ? true : false;
		  var c_ctr = ($self.data('center')) ? true : false;
		  var c_mgn = ($self.data('margin')) ? $self.data('margin') : 30;
		  var c_animateOut = ($self.data('animateOut')) ? $self.data('animateOut') : 'fadeOut';
		  $self.owlCarousel({
			navText: ["<i class='fa fa-angle-left'></i>","<i class='fa fa-angle-right'></i>"],
			items: c_item, loop: c_loop, nav: c_navs, dots: c_dots, margin: c_mgn, center: c_ctr, animateOut: c_animateOut, 
			autoplay: c_auto, autoplayTimeout: c_delay, autoplaySpeed: 300, 
			responsive:{ 0:{ items:1 }, 480:{ items: c_item_m }, 768:{ items: c_item_t }, 1170:{ items: c_item } }
		  });
		});
	}

	//ImageBG
	var $imageBG = $('.imagebg');
	if ($imageBG.length > 0) {
		$imageBG.each(function(){
			var $this = $(this), 
				$that = $this.parent(),
				overlay = $this.data('overlay'),
				image = $this.children('img').attr('src');
			var olaytyp = (typeof overlay!=='undefined' && overlay!=='') ? overlay.split('-') : false;
			
			// If image found
			if (typeof image!=='undefined' && image !==''){
				if (!$that.hasClass('has-bg-image')) {
					$that.addClass('has-bg-image');
				}
				if ( olaytyp!=='' && (olaytyp[0]==='dark') ) {
					if (!$that.hasClass('light')) {
						$that.addClass('light');
					}
				}
				$this.css("background-image", 'url("'+ image +'")').addClass('bg-image-loaded');
			}
		});
	}
	
	// Video Bg Class Add
	var $videoBG = $('.video-background');
	if ($videoBG.length > 0) {
		$videoBG.each(function(){
			var $this = $(this), 
				$that = $this.parent();
			$that.addClass('has-bg-video');
		});
	}
	
	

	// FORMS
	var quoteForm = $('#contact-form');
	if (quoteForm.length > 0) {
	  if( !$().validate || !$().ajaxSubmit ) {
		  console.log('quoteForm: jQuery Form or Form Validate not Defined.');
		  return true;
	  }
	  // Quote Form - home page
	  if (quoteForm.length > 0) {
		  var selectRec = quoteForm.find('select.required'), 
		  qf_results = quoteForm.find('.form-results');
		  quoteForm.validate({
			invalidHandler: function () { qf_results.slideUp(400); },
			submitHandler: function(form) {
			  qf_results.slideUp(400);
			  $(form).ajaxSubmit({
				target: qf_results, dataType: 'json',
				success: function(data) {
				  var type = (data.result==='error') ? 'alert-danger' : 'alert-success';
				  qf_results.removeClass( 'alert-danger alert-success' ).addClass( 'alert ' + type ).html(data.message).slideDown(400);
				  if (data.result !== 'error') { $(form).clearForm(); }
				}
			  });
			}
		  });
		  selectRec.on('change', function() { $(this).valid(); });
	  }
	}
	
	// Preloader
	var $preload = $('#preloader');
	if ($preload.length > 0) {
		$(window).on('load', function() {
		  $preload.children().fadeOut(300);
		  $preload.delay(150).fadeOut(500);
		  $('body').delay(100).css({'overflow':'visible'});
		});
	}
	
	//WOW init
	new WOW().init();
	
	// particlesJS
	var $particles_js = $('#particles-js');
	if ($particles_js.length > 0 ) {
		particlesJS('particles-js',
		// Update your personal code.
        {
		  "particles": {
			"number": {
			  "value": 80,
			  "density": {
				"enable": true,
				"value_area": 800
			  }
			},
			"color": {
			  "value": "#ffffff"
			},
			"shape": {
			  "type": "circle",
			  "stroke": {
				"width": 0,
				"color": "#000000"
			  },
			  "polygon": {
				"nb_sides": 5
			  },
			  "image": {
				"src": "img/github.svg",
				"width": 100,
				"height": 100
			  }
			},
			"opacity": {
			  "value": 0.5,
			  "random": false,
			  "anim": {
				"enable": false,
				"speed": 1,
				"opacity_min": 0.1,
				"sync": false
			  }
			},
			"size": {
			  "value": 3,
			  "random": true,
			  "anim": {
				"enable": false,
				"speed": 40,
				"size_min": 0.1,
				"sync": false
			  }
			},
			"line_linked": {
			  "enable": true,
			  "distance": 150,
			  "color": "#ffffff",
			  "opacity": 0.4,
			  "width": 1.3
			},
			"move": {
			  "enable": true,
			  "speed": 6,
			  "direction": "none",
			  "random": false,
			  "straight": false,
			  "out_mode": "out",
			  "bounce": false,
			  "attract": {
				"enable": false,
				"rotateX": 600,
				"rotateY": 1200
			  }
			}
		  },
		  "interactivity": {
			"detect_on": "canvas",
			"events": {
			  "onhover": {
				"enable": true,
				"mode": "repulse"
			  },
			  "onclick": {
				"enable": true,
				"mode": "push"
			  },
			  "resize": true
			},
			"modes": {
			  "grab": {
				"distance": 400,
				"line_linked": {
				  "opacity": 1
				}
			  },
			  "bubble": {
				"distance": 400,
				"size": 40,
				"duration": 2,
				"opacity": 8,
				"speed": 3
			  },
			  "repulse": {
				"distance": 200,
				"duration": 0.4
			  },
			  "push": {
				"particles_nb": 4
			  },
			  "remove": {
				"particles_nb": 2
			  }
			}
		  },
		  "retina_detect": true
		}
		// Stop here.
      );
	}
	
	// Active page menu when click ( only for demo )
	var url = window.location.href;
	var $nav_link = $(".dropdown li a");
	$nav_link.each(function() {
		if (url === (this.href)) {
			$(this).closest("li").addClass("active");
		}
	});
	
})(jQuery);
;$(document).ready(function(){


	var $slider = $('.ngl-home .ngl-slider-wrap');

	$slider
		.slick({
			infinite: true,
			arrows: false,
			slidesToShow: 1,
			slidesToScroll: 1,
			speed: 500,
			fade: true,
			cssEase: 'linear',
			adaptiveHeight: true,
			swipe: false
		}).on('beforeChange', function(event, slick, currentSlide, nextSlide){
			$('.ngl-home .ngl-page .ngl-controlls a').removeClass('active');
			$('.ngl-home .ngl-page .ngl-controlls a').eq(nextSlide).addClass('active');

			
			$('.main-header nav li').find('a').removeClass('active');
			if ( nextSlide-1 >= 0 ) {
				$('.main-header nav li').eq(nextSlide-1).find('a').addClass('active');
			}
		});

	$('[data-slide-index]').click(function(e){
		e.preventDefault();

		var index = $(this).attr('data-slide-index');
		$slider.slick('slickGoTo', index);
	});

	$('.ngl-home .ngl-page .ngl-controlls a').click(function(e){
		e.preventDefault();
		
		var index = $(this).index();
		$slider.slick('slickGoTo', index);
	});

	$('a.next').click(function(e){
		e.preventDefault();

		$slider.slick('slickNext');
	});


});
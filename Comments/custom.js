$(document).ready(function() {
	$(".owl-carousel").owlCarousel({
		loop:true,
		items: 1,
		margin:130,
		animateIn: 'slideInUp',
		animateOut: 'slideOutUp',
		stagePadding:30,
		onTranslated: animateImgFunc,
		onChanged: animateImgClear
	});

	//Добавляем класс с анимацией изображения
	function animateImgFunc() {
		$(".owl-carousel .active .inner-testimonial img").addClass("animated fadeIn full-opacity");
	}

	//Удаляем класс с анимацией изображения
	function animateImgClear() {
		$(".owl-carousel .active .inner-testimonial img").removeClass("animated fadeIn full-opacity");
	}
});

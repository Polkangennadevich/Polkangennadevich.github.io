$(() => {
	var $sendBtn = $('.send-link'),
			$iWrapper = $('.icon-wrapper'),
			$i1 = $('.icon-1'),
			$i2 = $('.icon-2');
	
	function animationEvent() {
		var t,
				el = document.createElement('fakeelement');
        var animations = {
			animation: 'animationend',
			OAnimation: 'oAnimationEnd',
			MozAnimation: 'animationend',
			WebkitAnimation: 'webkitAnimationEnd'
		};
        for (t in animations) {
			if (el.style[t] !== undefined) {
				return animations[t];
			}
		}
    }
    $sendBtn.on('click', e => {
		$iWrapper.addClass('icon-wrapper-animation');
		$sendBtn.addClass('clicked');
		$i1.delay(90);
		$i1.fadeTo(100, 0);
		$i2.delay(90);
		$i2.fadeTo(100, 1);		
	});
    $sendBtn.on(animationEvent(), e => {
		if (e.originalEvent.animationName == 'input-shadow') {
			$sendBtn.removeClass('clicked');
		}
	});
    $iWrapper.on(animationEvent(), e => {
		if (e.originalEvent.animationName == 'icon-animation') {
			$iWrapper.removeClass('icon-wrapper-animation');
			setTimeout(reset, 1200);
		}
	});
    function reset() {
		$i1.fadeTo(250, 1);
		$i2.fadeTo(250, 0);
	}
}); // end of document ready	
	
$(() => {
	var $sendBtn2 = $('.send-link2'),
			$iWrapper = $('.icon-wrapper2'),
			$i1 = $('.icon-1'),
			$i2 = $('.icon-2');
	function animationEvent() {
		var t,
				el = document.createElement('fakeelement');
        var animations = {
			animation: 'animationend',
			OAnimation: 'oAnimationEnd',
			MozAnimation: 'animationend',
			WebkitAnimation: 'webkitAnimationEnd'
		};
        for (t in animations) {
			if (el.style[t] !== undefined) {
				return animations[t];
			}
		}
	}
    $sendBtn2.on('click', e => {
		$iWrapper.addClass('icon-wrapper-animation');
		$sendBtn2.addClass('clicked');
		$i1.delay(90);
		$i1.fadeTo(100, 0);
		$i2.delay(90);
		$i2.fadeTo(100, 1);		
	});
    $sendBtn2.on(animationEvent(), e => {
		if (e.originalEvent.animationName == 'input-shadow') {
			$sendBtn2.removeClass('clicked');
		}
	});
    $iWrapper.on(animationEvent(), e => {
		if (e.originalEvent.animationName == 'icon-animation') {
			$iWrapper.removeClass('icon-wrapper-animation');
			setTimeout(reset, 1200);
		}
	});
    function reset() {
		$i1.fadeTo(250, 1);
		$i2.fadeTo(250, 0);
    }
});

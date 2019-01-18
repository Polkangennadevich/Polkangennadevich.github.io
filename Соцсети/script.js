$(function(){ 
	var shadowOffset	=	1.08;
	var lightswitch		=	$("#switchS");
	var lightbulb		=	$("#light-bulb");
	var lightbulb2		=	$("#light-bulb2");
	var lightCenterX	=	parseInt(lightbulb.width()/2);
	var lightCenterY	=	parseInt(lightbulb.height()/2);
	var logo			=	$("#logo");
	var lightAlogo		=	$("#light-bulb, #logo");
	var logoCenterX		=	parseInt(logo.width()/2);
	var logoCenterY		=	parseInt(logo.height()/2);
	var logoshadow		=	$("#logosh");
	var logoShdwCenterX	=	parseInt(logoshadow.width()/2);
	var logoShdwCenterY	=	parseInt(logoshadow.height()/2);
	var statustext		=	$("#statustext");
	var defaulttxt		=	"Drag the light-bulb or the logo!";
	var ontxt			=	"Let there be light!";
	var offtxt			=	"Switch off the light!";
	
	statustext.text(defaulttxt);
	logoshadow.fadeTo(0,0);
	lightbulb2.fadeTo(0,0);
	moveShadow();
	
	lightAlogo.draggable({
		drag: function(event, ui){
			statustext.text("dragging " + $(this).attr("id"));
			moveShadow();
		},
		stop: function(event, ui){
			statustext.text(defaulttxt);
		}  
	});
	$(window).resize(function(){
		moveShadow();
	});

	lightswitch.click(function(){
		if(lightbulb.hasClass("off")){
			lightbulb.removeClass("off");
			lightswitch.css("backgroundPosition","0 0");
			logoshadow.stop().fadeTo(750,setOpacity(shadowDistance));
			lightbulb2.stop().fadeTo(750,1);
			statustext.text(offtxt);
		}else{
			lightbulb.addClass("off");
			lightswitch.css("backgroundPosition","-80px 0");
			logoshadow.stop().fadeTo(750,0);
			lightbulb2.stop().fadeTo(750,0);
			statustext.text(ontxt);
		}
	});
	
	lightswitch.hover(function(){
		if(lightbulb.hasClass("off")){
			statustext.text(ontxt);
		}else{
			statustext.text(offtxt);
		}
	},function(){
		statustext.text(defaulttxt);
	});

	function setOpacity(getDistance){
		if(lightbulb.hasClass("off")){
			return 0;
		}else{
			return (1.2 - getDistance /1000);
		}
	}
	
	function moveShadow(){
		lightX			=	parseInt(lightbulb.offset().left) + lightCenterX;
		lightY			=	parseInt(lightbulb.offset().top) + lightCenterY;
		logoX			=	parseInt(logo.offset().left) + logoCenterX;
		logoY			=	parseInt(logo.offset().top) + logoCenterY;
		distanceX		=	logoX - lightX;
		distanceY		=	logoY - lightY;
		distance		=	Math.sqrt(Math.pow(distanceX, 2) + Math.pow(distanceY, 2));
		shadowDistance	=	distance * shadowOffset;
		shadowPosLeft	=	(distanceX / distance * shadowDistance + lightX - logoShdwCenterX) + "px";
		shadowPosTop	=	(distanceY / distance * shadowDistance + lightY - logoShdwCenterY) + "px";
		logoshadow.css({ "left": shadowPosLeft, "top": shadowPosTop, "opacity": setOpacity(shadowDistance) });
	}
});
/**
 * Cookie plugin
 * Klaus Hartl
 */
jQuery.cookie=function(name,value,options){if(typeof value!='undefined'){options=options||{};if(value===null){value='';options.expires=-1}var expires='';if(options.expires&&(typeof options.expires=='number'||options.expires.toUTCString)){var date;if(typeof options.expires=='number'){date=new Date();date.setTime(date.getTime()+(options.expires*24*60*60*1000))}else{date=options.expires}expires='; expires='+date.toUTCString()}var path=options.path?'; path='+(options.path):'';var domain=options.domain?'; domain='+(options.domain):'';var secure=options.secure?'; secure':'';document.cookie=[name,'=',encodeURIComponent(value),expires,path,domain,secure].join('')}else{var cookieValue=null;if(document.cookie&&document.cookie!=''){var cookies=document.cookie.split(';');for(var i=0;i<cookies.length;i++){var cookie=jQuery.trim(cookies[i]);if(cookie.substring(0,name.length+1)==(name+'=')){cookieValue=decodeURIComponent(cookie.substring(name.length+1));break}}}return cookieValue}};

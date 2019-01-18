!function t(e,a,n){function i(o,r){if(!a[o]){if(!e[o]){var c="function"==typeof require&&require;if(!r&&c)return c(o,!0);if(s)return s(o,!0);var d=new Error("Cannot find module '"+o+"'");throw d.code="MODULE_NOT_FOUND",d}var f=a[o]={exports:{}};e[o][0].call(f.exports,function(t){var a=e[o][1][t];return i(a?a:t)},f,f.exports,t,e,a,n)}return a[o].exports}for(var s="function"==typeof require&&require,o=0;o<n.length;o++)i(n[o]);return i}({1:[function(t,e,a){"use strict";var n=t("./main.js"),i=t("./pages/home.js"),s=t("./pages/examples.js");
$(document).on("DOMContentLoaded",function(){switch(pageId){default:case"homepage":i.init();break;case"examples":n.init(),s.init();break;case"api":n.init()}})},{"./main.js":2,"./pages/examples.js":3,"./pages/home.js":4}],2:[function(t,e,a){"use strict";e.exports={init:function(){this.logoAnimation(),this.hamburgerIcon()},logoAnimation:function(){setTimeout(function(){new Granim({element:"#logo-canvas",direction:"left-right",opacity:[1,1],});
$(".main-header .bloc-logo").css({display:"none",visibility:"visible"}).fadeIn()},500)},hamburgerIcon:function(){
$(".hamburger-icon").click(function(){
$(this).toggleClass("open"),$(".main-nav").toggleClass("open")})}}},{}],3:[function(t,e,a){"use strict";e.exports={init:function(){this.examples.init()},examples:{init:function(){this.basic(),this.radial(),this.image(),this.imageMask(),this.interactive()},basic:function(){new Granim({element:"#canvas-basic",name:"basic-gradient",direction:"left-right",opacity:[1,1],isPausedWhenNotInView:!0,
states:{"default-state":{gradients:[["#CC32ff","#560E85"],["#0147FF","#1C0485"],["#560E85","#CC32ff"]]}}})},
radial:function(){new Granim({element:"#canvas-radial",name:"radial-gradient",direction:"radial",opacity:[1,1],isPausedWhenNotInView:!0,
states:{"default-state":{gradients:[["#CC32ff","#560E85"],["#0147FF","#1C0485"],["#560E85","#CC32ff"]]}}})},
image:function(){new Granim({element:"#canvas-image",direction:"top-bottom",opacity:[1,.5,0],isPausedWhenNotInView:!0,});}}}},{}],
4:[function(t,e,a){"use strict";e.exports={init:function(){this.verticalAlign(),this.bgAnimation()},verticalAlign:function(){function t(){var t=$("#canvas-wrapper"),e=t.find(".content-wrapper"),a=t.height(),n=e.height(),i=a/2-n/2;e.css({marginTop:i>0?i:0,visibility:"visible"})}
$(window).on("resize",t),t()},bgAnimation:function(){var t=new Granim({element:"#granim-canvas",name:"background-gradient",direction:"diagonal",stateTransitionSpeed:1e3,opacity:[1,1],
});window.innerWidth>768&&($("#dark-state").hover(function(){t.changeState("dark-state")},function(){t.changeState("default-state")}),
$("#light-state").hover(function(){t.changeState("light-state")},function(){t.changeState("default-state")}))}}},{}]},{},[1]);


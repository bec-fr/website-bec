// MAIN.JS
//--------------------------------------------------------------------------------------------------------------------------------
//This is main JS file that contains custom JS scipts and initialization used in this template*/
// -------------------------------------------------------------------------------------------------------------------------------
// 	- Template Name: Full State - Real State Template 
//	- Autor: Iwthemes
//	- Email: support@iwthemes.com
//	- Name File: main.js
//	- Version 1.4 - Updated on 14/08/2014
//	- Website: http://www.iwthemes.com 
//	- Copyright: (C) 2014
// -------------------------------------------------------------------------------------------------------------------------------


$(document).ready(function($) {

	'use strict';

 	//=================================== Nav Responsive ===============================//
    $('#menu').tinyNav({
       active: 'selected'
    });

    //=================================== Nav Superfish ===============================//

	$('ul.sf-menu').superfish();

    //=================================== efect_switcher  ===================================//
		
	jcps.slider(500, '.switcher-panel', '.set2');

	//=================================== Totop  ===================================//
	$().UItoTop({ 		
		scrollSpeed:500,
		easingType:'linear'
	});	

	//=================================== Subtmit Form  =================================//

	$('#form').submit(function(event) {  
	  event.preventDefault();  
	  var url = $(this).attr('action');  
	  var datos = $(this).serialize();  
	  $.get(url, datos, function(resultado) {  
	    $('#result').html(resultado);  
	  });  
	});  

	//=================================== Subtmit Calculator  =================================//

	$('#calculator').submit(function(event) {  
	  event.preventDefault();  
	  var url = $(this).attr('action');  
	  var datos = $(this).serialize();  
	  $.get(url, datos, function(resultado) {  
	    $('#result_calculator').html(resultado);  
	  });  
	});  

	//=================================== Form Newslleter  =================================//

  	$('#newsletterForm').submit(function(event) {  
       event.preventDefault();  
       var url = $(this).attr('action');  
       var datos = $(this).serialize();  
        $.get(url, datos, function(resultado) {  
        $('#result-newsletter').html(resultado);  
	    });  
	});  

	//=================================== jBar  ===================================//
	
	$('.jBar').hide();
	$('.jRibbon').show().removeClass('up', 500);
	$('.jTrigger').click(function(){
		$('.jRibbon').toggleClass('up', 500);
		$('.jBar').slideToggle();
	});

	//=================================== Tabs defauld  ===================================//
	$(".tab_content").hide(); //Hide all content
	$("ul.tabs li:first").addClass("active").show(); //Activate first tab
	$(".tab_content:first").show(); //Show first tab content
	
	//=================================== Tabs On Click Event  ===================================//
	$("ul.tabs li").click(function() {
		$("ul.tabs li").removeClass("active"); //Remove any "active" class
		$(this).addClass("active"); //Add "active" class to selected tab
		$(".tab_content").hide(); //Hide all tab content
		var activeTab = $(this).find("a").attr("href"); //Find the rel attribute value to identify the active tab + content
		$(activeTab).fadeIn(); //Fade in the active content
		return false;
	});
	
	//=================================== Accordion  =================================//

	$('.accordion-container').hide(); 
	$('.accordion-trigger:first').addClass('active').next().show();
	$('.accordion-trigger').click(function(){
		if( $(this).next().is(':hidden') ) { 
			$('.accordion-trigger').removeClass('active').next().slideUp();
			$(this).toggleClass('active').next().slideDown();
		}
		return false;
	});

	//=================================== Sponsors Carousel  =================================// 

	$('.sponsors').owlCarousel({
		items:6,
		loop:true,
		margin:10,
		autoplayTimeout:4000,
		autoplay:true,
		responsive:{
			320:{
				items:1
			},	
			480:{
				items:2
			},
			678:{
				items:3
			},
			960:{
				items:5
			},
			1280:{
				items:6
			}
		}
	});

	//=================================== Testimonial Carousel  =================================// 

	$('.testimonial-carousel').owlCarousel({
		items:1,
		loop:true,
		margin:10,
		autoplay:true,
		autoplayTimeout:3000,
		responsive:{	
			480:{
				items:1
			},
			678:{
				items:1
			},
			960:{
				items:1
			}
		}
	});

	//=================================== Testimonial Carousel  =================================// 

	$('#properties-carousel').owlCarousel({
		items:4,
		loop:true,
		navigation:true,
		dots:false,
		margin:30,
		autoplay:true,
		autoplayTimeout:3000,
		responsive:{
			170:{
				items:1
			},	
			500:{
				items:2
			},
			678:{
				items:2
			},
			768:{
				items:3
			},
			960:{
				items:4
			}
		}
	});
	

    //=================================== Tooltips ==================================//

	$('.sponsors, .social, .tooltip_hover').tooltip({
      selector: "[data-toggle=tooltip]",
      container: "body"
   	});

   	 //=================================== Slide Home =====================================//

      $('#slide').camera({        
          height: '650px',
          navigation: true  
      });
    
});
    
	$('#slide_details').camera({        
        height: '55.5%',
         navigation: true  
 	});
// debut 02 =================================== pannel switcher =====================================//	
	/* jQuery Content Panel Switcher JS */
var jcps = {};
jcps.fader = function(speed, target, panel) {
	jcps.show(target, panel);
    if (panel == null) {panel = ''};
	$('.switcher' + panel).click(function() {
		var _contentId = '#' + $(this).attr('id') + '-content';
		var _content = $(_contentId).html();
		if (speed == 0) {
			$(target).html(_content);
		}
		else {	
			$(target).fadeToggle(speed, function(){$(this).html(_content);}).fadeToggle(speed);
		}
	});
};
jcps.slider = function(speed, target, panel) { 
	jcps.show(target, panel);
    if (panel == null) {panel = ''};
	$('.switcher' + panel).click(function() {
		var _contentId = '#' + $(this).attr('id') + '-content';
		var _content = $(_contentId).html();
		if (speed == 0) {
			$(target).html(_content);
		}
		else {	
			$(target).slideToggle(speed, function(){$(this).html(_content);}).slideToggle(speed);
		}
	});
};
jcps.show = function (target, panel) {
$('.show').each(function() {
	if (panel == null) {
		$(target).append($(this).html() + '<br/>');
	}
	else {
		var trimPanel = panel.replace('.', '');
		if ($(this).hasClass(trimPanel) == true){$(target).append($(this).html() + '<br/>');}
	}
});
}
// fin 02 =================================== pannel switcher =====================================//	

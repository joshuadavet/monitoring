$(document).ready(function() {


	// browser window scroll (in pixels) after which the "back to top" link is shown
	var back_to_top_offset = 300;
	//browser window scroll (in pixels) after which the "back to top" link opacity is reduced
	var offset_opacity = 1200;
	//duration of the top scrolling animation (in ms)
	var scroll_top_duration = 1250;
	var $back_to_top = $('.back-to-top');
	//grab the "back to top" link
		
	//hide or show the "back to top" link
	$(window).scroll(function(){
		( $(this).scrollTop() > back_to_top_offset ) ? $back_to_top.addClass('is-visible') : $back_to_top.removeClass('is-visible fade-out');
		if( $(this).scrollTop() > offset_opacity ) { 
			$back_to_top.addClass('fade-out');
		}
	});

	//smooth scroll to top
	$back_to_top.on('click', function(event){
		event.preventDefault();
		$('body,html').animate({
			scrollTop: 0 ,
		 	}, scroll_top_duration
		);
	});


	// activate profile Modals via JQ rather than data-attributes
	$('.profileClicker').click(function( event ){
	 	event.preventDefault();
	 	// use the HREF to determine the Modal ID
		var clickTarget = $(this).attr('data-target');
		$(clickTarget).modal({
			keyboard: true,
			backdrop: true
		});
	});


	
	// Anchor Tooltip
	$(function () {
	  $('[data-toggle="tooltip"]').tooltip({
		  placement:'right',
		  trigger:'hover'
	  });
	});
	
	
	//mobile menu
	var	menuRight = document.getElementById( 'cbp-spmenu-s2' ),
		showRight = document.getElementById( 'showRight' ),
		menuLeft  = document.getElementById( 'cbp-menu-contact' ),
		showLeft  = document.getElementById( 'showLeft' ),
		body      = document.body;
	
	$('.show-right').click(function(e){
		e.stopPropagation();
		var $this = $(this).toggleClass('active');
		$(menuRight).toggleClass('cbp-spmenu-open');
		$('main').on('click',clickOut);
		function clickOut(e){
			if(!$.contains(menuRight,e.target) && $(menuRight).hasClass('cbp-spmenu-open')){
				$(menuRight).removeClass('cbp-spmenu-open');
				$(document.body).off('click',clickOut);
				$this.toggleClass('active');
			}
		}
	});
	$('.show-left').click(function(e){
		e.stopPropagation();
		var $this = $(this).toggleClass('active');
		$(menuLeft).toggleClass('cbp-spmenu-open');
		$('main').on('click',clickOut);
		function clickOut(e){
			if(!$.contains(menuLeft,e.target) && $(menuLeft).hasClass('cbp-spmenu-open')){
				$(menuLeft).removeClass('cbp-spmenu-open');
				$(document.body).off('click',clickOut);
				$this.toggleClass('active');
			}
		}
	});
	
	$('.cbp-spmenu li.has-children ul').addClass('hidden-xl-down');
	
	$('.cbp-spmenu li.has-children').click(function(event){
		$(this).toggleClass('open');
		event.preventDefault();
		$(this).find('ul').toggleClass('hidden-xl-down');
	});
	
	$('.cbp-spmenu li.has-children ul a').click(function(event){
		event.stopPropagation();//don't allow the parent to get the event in the bubbling phase
	});
	

	

	/*
	$('#doubleDeckerNext').click(function(){

	});
	*/



	// breadcrumbs open on hover rather than click
	// breadcrumbs open on hover, keep click for touch
	//TODO: Add hover for news filters
	$('.dropdown, .dropup').hover(function() {
			$(this).find('.dropdown-menu').stop(true, true).delay(100).fadeIn(250);
		}, 
		function() {
			$(this).find('.dropdown-menu').stop(true, true).delay(100).fadeOut(250);
	});


});

function searchFocus() {
	$('.site-search-control').focus( function() {
		$('li.explore').addClass('fadeOut');
	});
	$('.site-search-control').blur( function() {
		$('li.explore').removeClass('fadeOut');
	});
}

function removeExtras() {
	$('.home-video:nth-of-type(n+2), .masthead-photo:nth-of-type(n+2), .row .masthead-photo, .row .home-video, .home-video + .home-video, .masthead-photo + .masthead-photo').remove();
}

function scaleVideoContainer() {

    var height = $(window).height();
    var unitHeight = parseInt(height) + 'px';
    $('.homepage-hero-module').css('height',unitHeight);

}

function initBannerVideoSize(element){
    
    $(element).each(function(){
	   $(this).data('height', $(this).height());
	   $(this).data('width', $(this).width());
    });

    scaleBannerVideoSize(element);

}
function scaleBannerVideoSize(element){

    var windowWidth = $(window).width(),
	   windowHeight = $(window).height(),
	   videoWidth,
	   videoHeight;
    
    //console.log(windowHeight);

    $(element).each(function(){
	   var videoAspectRatio = $(this).data('height')/$(this).data('width'),
		  windowAspectRatio = windowHeight/windowWidth;

	   if (videoAspectRatio > windowAspectRatio) {
		  videoWidth = windowWidth;
		  videoHeight = videoWidth * videoAspectRatio;
		  $(this).css({'top' : -(videoHeight - windowHeight) / 2 + 'px', 'margin-left' : 0});
	   } else {
		  videoHeight = windowHeight;
		  videoWidth = videoHeight / videoAspectRatio;
		  $(this).css({'margin-top' : 0, 'margin-left' : -(videoWidth - windowWidth) / 2 + 'px'});
	   }

	   $(this).width(videoWidth).height(videoHeight);

	   $('.homepage-hero-module .video-container video').addClass('fadeIn animated');

    });




	// breadcrumbs open on hover, keep click for touch
	/*
	$('.dropdown').hover(function() {
			$(this).find('.dropdown-menu').stop(true, true).delay(100).fadeIn(250);
		}, 
		function() {
			$(this).find('.dropdown-menu').stop(true, true).delay(100).fadeOut(250);
	});
	*/
    
}


function responsiveVideoEmbed() {
	//$('iframe[src*=youtube]', 'iframe[src*=vimeo]').wrap('<div class="embed-container></div>');
	//console.log( $('iframe').length );
	//$('iframe').attr('src','[src*=youtube]').wrap('<divitis></divitis>');
}

function jumpingMenu() {
	$('.jump-menu').change(function() {
		window.location = $(this).val();
	});
}

function accordionBlock() {
	$('.accordion-toggler').click( function() {
		$(this).toggleClass('opened');
		if ( $(this).find('.panel-state-indicator').text() === "+" ) {
			$(this).find('.panel-state-indicator').html('–');
		}
		else {
			$(this).find('.panel-state-indicator').text('+');
		}
		$(this).parents('.card').next('.card').find('.accordion-toggler').toggleClass('red-top-border');
		if ( $(this).parents('.card').is(':last-child') ) {
			$(this).parents('.card').toggleClass('opened');
		}
		$(this).parents('.card-header').next('.collapse').slideToggle(250);

	});
}

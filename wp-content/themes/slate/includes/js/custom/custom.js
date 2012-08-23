jQuery(document).ready(function( $ ) { 

		
		function mainmenu(){
		$('#nav ul').css({display: "none"}); // Opera Fix
		
		$('#nav li').hover(function(){
			$(this).find('ul:first').css({visibility: "visible",display: "none"}).fadeIn(200);
			},function(){
			$(this).find('ul:first').css({visibility: "hidden"});
			});
		}
		
		mainmenu();
		
		//Wrap portfolio items
		var divs = $(".paginate-boxes li");
		for(var i = 0; i < divs.length; i+=6) {
		  divs.slice(i, i+6).wrapAll("<li class='slide-portfolio'></li>");
		}
		
		//Wrap portfolio items
		var divs = $(".paginate-boxes-inside li");
		for(var i = 0; i < divs.length; i+=6) {
		  divs.slice(i, i+6).wrapAll("<li class='slide-portfolio'></li>");
		}
		
		//Wrap blog items
		var divs = $(".home-blog li");
		for(var i = 0; i < divs.length; i+=4) {
		  divs.slice(i, i+4).wrapAll("<li class='slide-portfolio'></li>");
		}
		
		//Flexslider
		$(window).load(function() {
			$('#header-slider,#portfolio-slider,#portfolio-sidebar,#testimonial-slider,#blog-slider').flexslider({
				slideshow: false,
				animationDuration: 200 
			});
			
			$('.flexslider').flexslider();
		});
		
		// Tabs
		$("ul.tabs").tabs("div.panes > div",{effect: "fade" }); 
		
		//Sliding Boxes
		$('.fade').mosaic();
		
		$('.hidden-toggle').click(function() {
		  $('.header-hidden').slideToggle('fast', function() {
		    // Animation complete.
		  });
		  $(".header-hidden-toggle-wrap").toggleClass("show-hidden");
		});
		
		$('#sidebar-close').toggle(function () {
			$('body').addClass('sidebar-panel-open');
		    $("#sidebar-wrap").addClass("show-sidebar");
		    $(".content,.header,.page-title,.footer,.footer-widgets").addClass("content-fade");
		}, function () {
			$('body').removeClass('sidebar-panel-open');
		    $("#sidebar-wrap").removeClass("show-sidebar");
		    $(".content,.header,.page-title,.footer,.footer-widgets").removeClass("content-fade");
		});
		
		//FitVids
		$(".okvideo").fitVids();
		
		//Menu
		$('#nav').mobileMenu();
		
		//Select
		$(document).ready(function(){	
		
		    if (!$.browser.opera) {
		
		        $('select.select-menu').each(function(){
		            var title = $(this).attr('title');
		            if( $('option:selected', this).val() != ''  ) title = $('option:selected',this).text();
		            $(this)
		                .css({'z-index':10,'opacity':0,'-khtml-appearance':'none'})
		                .after('<span class="select">' + title + '</span>')
		                .change(function(){
		                    val = $('option:selected',this).text();
		                    $(this).next().text(val);
		                    })
		        });
		
		    };
				
		});				
});
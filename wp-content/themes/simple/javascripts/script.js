//JSHint Validated Custom JS Code by Designova

/*global $:false */
/*global window: false */

jQuery(document).ready(function($) {

  (function(){
    "use strict";


  $(function ($) {

      
       //Detecting viewpot dimension and calculating the adjustments of components   
       var vH = $(window).height();
       var vHperc40 = vH*40/100;
       var vHperc10 = vH*10/100;
       $('#home').css('height', vH);
       $('#intro').css('margin-top', vHperc10);
       $('.scroll-trigger').css('margin-top', vHperc40);
       //swiper optimization for large screens
       var sH = $('.swiper-slide').height();
       if(sH === 1008){
       var sHneg = sH-400;
       $('.swiper-container').css('max-height',sHneg+'px');
       }
        
    //Switching Feed Panels
    $('.feed-trigger').click(function(){
      var feedTrigger = $(this).attr('data-feed-trigger');
      $('.feed').hide();
      $('#'+feedTrigger).slideDown('slow');
      $('.feed-trigger').css('opacity','0.3');
      $(this).css('opacity','1');
    });
      
    //Home Page Animations
    setTimeout(function(){
    $('.backstretch').fadeIn();
    }, 1000);
    setTimeout(function(){
    //$('#logo').show().addClass('animated rotateIn');
    }, 1200);
  	setTimeout(function(){
    $('#intro h1').show().addClass('animated fadeInUpBig');
    }, 1500);
    setTimeout(function(){
    $('#intro h2 > span').fadeIn('slow');
    }, 3500);
    setTimeout(function(){
    $('#explore a img').fadeIn('slow');
    }, 3600);


      $('#explore a img').mouseenter(function(){
          $(this).addClass('animated pulse');
      });
      $('#explore a img').mouseleave(function(){
          $(this).removeClass('animated pulse');
      });

      //Nav highlight
      $('#mast-nav li > a').click(function(){
          $('#mast-nav li > a').removeClass('active');
          $(this).addClass('active');
      });

      

      //Parallax Init
      $(window).stellar({
          responsive: false,
          horizontalScrolling: false, // from true
          parallaxBackgrounds: false, // true

          parallaxElements: true,
          hideDistantElements: true
      });

      var page_stack = $.makeArray();
      var stack_top = 0;

      $('.page-section').waypoint(function (event, direction) {
          if (direction === 'down') 
          {
              $('#mast-nav li a').removeClass('active');
              $('#mast-nav li a[href=#'+$(this).attr('id')+']').addClass('active').execEffects(); 
              stack_top = stack_top+1; 
              page_stack[stack_top] = $(this).attr('id');
              
          } 
          else 
          {
              stack_top = stack_top-1;
              $('#mast-nav li a').removeClass('active');
              $('#mast-nav li a[href=#'+page_stack[stack_top]+']').addClass('active').execEffects();
              
          }
      },{ offset: 100 });




      //WAYPOINTS - INTERACTION
      //=======================

      //Triggering Navigation as Sticky when scrolled to second section:
      /*$('.navigation-fadeIn').waypoint(function (event, direction) {
          if (direction === 'down') {
            //$('#masthead').css('top','0px');
          } else {
              $('#masthead').css('top','-90px');
          }
      }, { offset: 10 });*/
      $('#masthead').css('top','0px');

     
      
      
  	
  });


  })();


  if($('header#masthead').hasClass('inner-page').toString() == 'true')
  {
    
    var site_url = $('#site-logo').data('site-url');
    $('#mast-nav li a').each (function(){
      if($(this).hasClass('is_onepage').toString() == 'true')
      {
        var old_url = $(this).attr('href');
        $(this).attr('href',site_url + '/' + old_url); 
      }
    });
  }

  if($('header#mobile-header').hasClass('inner-page').toString() == 'true')
  {
    
    var site_url = $('#site-logo').data('site-url');
    $('#mob-nav li a').each (function(){
      if($(this).hasClass('is_onepage').toString() == 'true')
      {
        var old_url = $(this).attr('href');
        $(this).attr('href',site_url + '/' + old_url); 
      }
    });
  }

  var navigation = responsiveNav("#nav", { // Selector: The ID of the wrapper
    animate: true, // Boolean: Use CSS3 transitions, true or false
    transition: 400, // Integer: Speed of the transition, in milliseconds
    label: "Menu", // String: Label for the navigation toggle
    insert: "after", // String: Insert the toggle before or after the navigation
    customToggle: "", // Selector: Specify the ID of a custom toggle
    openPos: "relative", // String: Position of the opened nav, relative or static
    jsClass: "js", // String: 'JS enabled' class which is added to <html> el
    init: function(){}, // Function: Init callback
    open: function(){}, // Function: Open callback
    close: function(){} // Function: Close callback
  });

  var mySwiper = new Swiper('.swiper-container',{ 
    mode:'horizontal',
    pagination: false,
    slidesPerView: 3,
    loop: true,
    calculateHeight: true
  });

  $('#contactForm').submit(function(){
      $.ajax({
      type: $("#contactForm").attr('method'),
      url: $("#contactForm").attr('action'),
      data: $("#contactForm").serialize(),
      success: function(data) {
      if(data == 'success')
      {
          $('#contactForm').each (function(){
              this.reset();
          });
          $('.launch_modal').trigger("click");
        
      }
      else
      {
        $("#infomsg").fadeIn();
        $('#infomsg').html("Oops! Something went wrong!");
      }

      }
      });
      return false;
  });

  $('p').each(function(){
      var valid_content = $(this).html();
      if(valid_content == '')
      $(this).css('display','none');
  });

  $('.sidebar li').each(function(){
      var valid_content = $(this).html();
      if(valid_content == '')
      $(this).css('display','none');
  });

  
  $('.cbp-ig-grid li').mouseenter(function(){

    var service_item_bg_img = $(this).data('bg-image');
    $(this).children('a').css('background', 'url(' + service_item_bg_img + ')  center center no-repeat');
    $(this).children('a').css('background-size', 'cover');

  });

  $('.cbp-ig-grid li').mouseleave(function(){
    $(this).children('a').css('background', '');
  });

  $('#searchform #searchsubmit').addClass('btn btn-simple highlight-on-hover');
  $('#post-comment').addClass('btn btn-simple highlight-on-hover');
  $('.comment-reply-link').addClass('btn btn-simple light-txt highlight-on-hover');
  $('input[type="submit"]').addClass('btn btn-simple light-txt highlight-on-hover');
  $('#searchform label').addClass('hidden');
  $('.blog_pagination a').addClass('btn btn-simple highlight-on-hover');

  
  
  
  	// custom
  	var width_percentage = 0.80;
	var $mast_head = $("#masthead"),
		$top_page = $("#top-page"),
		$intro_page_gallery = $("#intro-page-gallery"),
		$intro_gallery_img = $("#intro-page-gallery img"),
		$intro_page_text = $("#intro-page-text"),
		$intro_page_container = $("#intro-page-container");
  
  	function both_head(){
	  	$(".the-top-page").css("height",$(window).height()+5);
	  	$intro_page_container.css("width",$(window).width()*width_percentage);
  	}
  	
  	
  	function mast_head(){
	  	  	// persistent top page position
			$top_page.css("top","100px");
	  		//  resize top page height according to the window height
			$intro_page_gallery.css("width",$intro_page_container.width()*0.60-40).css("display","inline-block");
			$intro_gallery_img.css("width",$intro_page_gallery.width()*0.30);
			$intro_page_text.css("width",$intro_page_container.width()*0.40-20).css("display","inline-block");
  	}
  	
  	function mobi_head(){
			// persistent top page position
			$top_page.css("top","35px");
	  		//  resize top page height according to the window height
			$intro_page_text.css("display","block").css("width","100%");
			$intro_page_gallery.css("display","block").css("width","100%");
			$intro_gallery_img.css("width",$intro_page_gallery.width()*0.30);
  	}
  	
  	
  	both_head();
  	if ( $mast_head.is(":visible") )
  		mast_head();
  	else
  		mobi_head();
  
  	
  	
  	$("#mast-nav li a").click(function() {
		var _scroll_top = $($(this).attr("href")).offset().top;

		$("html,body").animate({scrollTop:_scroll_top-95},"slow","swing");
		return false;
	});
  
  	$("#scroll_down").click(function() {
  		$("#mast-nav li a[href=#introduction-page]").trigger("click").execEffects();
		return false;
	});
  
  
  	
  	
  	

  	// add window resize event listener
  	$(window).resize(function() {
  		both_head();
  		if($mast_head.is(":visible"))
  			mast_head();	  		
  		 else
  			mobi_head();
	});

  	
  	
	// navigation effects
  	$._effects_list = ["animated","fadeInUpBig","fadeInDownBig","fadeInLeftBig","fadeInRightBig"];
  	
  	var $menu_item = $("#mast-nav li a");
  	$menu_item.click(function() {
  		$(this).execEffects();
  	});
  	
    
    $(window).scroll(function() {
		if ( $(this).scrollTop()<5 ) {
			$(this).scrollTop(5);
		}
	});
  	
  	

    
    
    
});


// custom jQuery plug-ins


(function($) {
	
	
	$.fn.execEffects = function() {
  		// clear effects
  		$(".pages").clearEffects($._effects_list);
  		
  		// restart effects
  		switch (this.attr("href")) {
		case "#top-page":
			$(".top-page").addClass('animated fadeInUpBig');
			break;
		case "#introduction-page":
			$(".introduction-page-title").addClass('animated fadeInLeftBig');
			$(".introduction-page-subtext").addClass('animated fadeInRightBig');
			break;
		default:
			break;
		}
	};
	
	
	$.fn.clearEffects = function(in_array) {
	  	this.each(function() {	  	
	  		
	  		if ( in_array==null ) return false;
	  		
			var $e = $(this);
			var _classes = $e.classes();
				$e.removeClass();

			for (var i=0;i<_classes.length;i++) {
				if ( in_array.indexOf(_classes[i]) == -1 ) {
					$e.addClass(_classes[i]);
				}
			}
	  	});
	};
	
    $.fn.classes = function (callback) {
        var classes = [];
        $.each(this, function (i, v) {
            var splitClassName = v.className.split(/\s+/);
            for (var j in splitClassName) {
                var className = splitClassName[j];
                if (-1 === classes.indexOf(className)) {
                    classes.push(className);
                }
            }
        });
        if ('function' === typeof callback) {
            for (var i in classes) {
                callback(classes[i]);
            }
        }
        return classes;
    };
	

    
})(jQuery);







	


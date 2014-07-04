jQuery(document).ready(function($) {
     $(document).ready(function(){

          //Call PrettyPhoto
          $("a[data-gal^='prettyPhoto[gallery]']").prettyPhoto({
                    animation_speed: 'fast', /* fast/slow/normal */
                    slideshow: 5000, /* false OR interval time in ms */
                    autoplay_slideshow: false, /* true/false */
                    opacity: 0.80, /* Value between 0 and 1 */
                    show_title: true, /* true/false */
                    allow_resize: true, /* Resize the photos bigger than viewport. true/false */
                    default_width: 500,
                    default_height: 344,
                    counter_separator_label: '/', /* The separator for the gallery counter 1 "of" 2 */
                    theme: 'dark_square', /* light_rounded / dark_rounded / light_square / dark_square / facebook */
                    horizontal_padding: 20, /* The padding on each side of the picture */
                    hideflash: false, /* Hides all the flash object on a page, set to TRUE if flash appears over prettyPhoto */
                    wmode: 'opaque', /* Set the flash wmode attribute */
                    autoplay: true, /* Automatically start videos: True/False */
                    modal: false, /* If set to true, only the close button will close the window */
                    deeplinking: true, /* Allow prettyPhoto to update the url to enable deeplinking. */
                    overlay_gallery: true, /* If set to true, a gallery will overlay the fullscreen image on mouse over */
                    social_tools: false
          });

          $('.sortablePortfolio li a.standard-type').click(function(){
              
               var item_content = $(this).nextAll('.item-details').html();
               $('#item_container').html(item_content);
               $("html, body").animate({
                    scrollTop: $('#item_container').offset().top-175 + "px"
               }, {
                    duration: 2000,
                    easing: "easeInOutExpo"
               });
               $('#filter').slideUp(200);
               setTimeout(function() {
                
                $('#item_container .portfolio_item').slideDown(600);
               }, 300);
               

               return false;
          });

          $('#item_container .control_buttons a.close').live('click',function(){
               var empty_content = '';
               $('#item_container .portfolio_item').slideUp(600);

               setTimeout(function() {
                $('#item_container').html(empty_content);
                $('#filter').slideDown(300);
               }, 300);
               
               return false;
          });

     });

     $(window).load(function(){

          

          //Portfolio rollover
          $('div#portfolio_thumbs ul li').hover(
                    function(){ 
                              $(this).find('img[class="rollover"]').stop().animate({opacity:1},600);
                              $(this).find('div[class="item_info"]').stop().slideDown(600);
                              return false;
                    },
                    function(){
                              $(this).find('img[class="rollover"]').stop().animate({opacity:0},600);
                              $(this).find('div[class="item_info"]').stop().slideUp(600);
                              return false;
                    }
          );

          //Filter elements
          $('#portfolioFilter li a').click(function(){

                    var animation_speed = 300; //in milliseconds
                    var category = $(this).attr('class');
                    var all_elements = 'div#portfolio_thumbs ul li';
                    var inactive_elements = 'div#portfolio_thumbs ul li[data-type!=' + category + ']';
                    var active_elements = 'div#portfolio_thumbs ul li[data-type=' + category + ']';
                    var inactive_rollover = 'div#portfolio_thumbs ul li[data-type!=' + category + '] img.rollover';
                    var all_images = 'div#portfolio_thumbs ul li img';
                    var no_effect = 'div#portfolio_thumbs ul li img.noeffect';
                    var inactive_overlay = 'div#portfolio_thumbs ul li[data-type!=' + category + '] div.item_info';
                    var blocked_overlay = 'div#portfolio_thumbs ul li div.noeffect';

                    if ( category == 'all' )
                    {
                       $(no_effect).removeClass("noeffect");
                       $(blocked_overlay).removeClass("noeffect");
                       $(all_elements).find('img').stop().animate({opacity:1},animation_speed );
                    }
                    else 
                    {
                        $(no_effect).removeClass("noeffect");
                        $(blocked_overlay).removeClass("noeffect");
                        $(inactive_rollover).addClass("noeffect");
                        $(inactive_overlay).addClass("noeffect");
                        $(inactive_elements).find('img').stop().animate({opacity:0},animation_speed );
                        $(active_elements).find('img').stop().animate({opacity:1},animation_speed );
                    }

                    $('#portfolioFilter li').removeClass('active');
                    $(this).parent('li').addClass('active');

          return false;
          });


         

     });
});
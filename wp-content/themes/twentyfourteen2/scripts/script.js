(function($){
	$(function() {
		var $header_menu = $("#menu-nav"); 
		
		$header_menu.children().click(function() {
			window.location.href = $(this).find("a").attr("href");
		});
		
	});
})(jQuery);
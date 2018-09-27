$(function(){
	
	var menu = $('#masthead'),
		pos = menu.offset();
		
		$(window).scroll(function(){
			if($(this).scrollTop() > pos.top+menu.height() && menu.hasClass('default')){
				menu.fadeOut('fast', function(){
					$(this).removeClass('default').addClass('fixed').fadeIn('fast');
					$("#flyout").removeClass('default').addClass('fixed_flyout').fadeIn('fast');
				});
			} else if($(this).scrollTop() <= pos.top && menu.hasClass('fixed')){
				menu.fadeOut('fast', function(){
					$(this).removeClass('fixed').addClass('default').fadeIn('fast');
					$("#flyout").removeClass('fixed_flyout').addClass('default').fadeIn('fast');
				});
			}
		});

});
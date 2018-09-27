<script>
jQuery(document).ready(function($) {
 	$(window).bind("resize", methodToFixLayoutSKIN);
 	
 	var bgname = $("body").css('background-image');
 	
 	function methodToFixLayoutSKIN( e ) {
	    var winWidth = $(window).width();
	   	var iMaxWidth = $( '#div-gpt-ad-<?php echo cual_cat_es();?>-2000x1000' ).innerWidth();
	   /*var iMaxWidthSkin = $( '#div-gpt-ad-<?php echo cual_cat_es();?>-2000x1000 img' ).innerWidth();
	    if(iMaxWidthSkin==null) var iMaxWidthSkin = $( '#div-gpt-ad-<?php echo cual_cat_es();?>-2000x1000 ins' ).innerWidth();
	    if(iMaxWidthSkin==null) var iMaxWidthSkin = $( '#div-gpt-ad-<?php echo cual_cat_es();?>-2000x1000 iframe' ).innerWidth();*/
	    var iMaxWidthSkin = 1600;

	    var variable="-10";
	    var variable=(winWidth-iMaxWidthSkin) / 2;


		var iMaxWidth_floating = $( '.floating' ).innerWidth();
	    var variable_floating=((winWidth-iMaxWidth_floating) / 2);

	    //$('.floating').css({left: variable_floating});
	    $('#div-gpt-ad-<?php echo cual_cat_es();?>-2000x1000').css({width: (winWidth-variable)+"px" });
	    $('#div-gpt-ad-<?php echo cual_cat_es();?>-2000x1000').css({left: variable});
	   	

	}
	methodToFixLayoutSKIN();
 });
 </script>
<!-- <script>
    $(function(){
	     var myWidth = 0, myHeight = 0;
	      if (typeof (window.innerWidth) == 'number') { //Chrome
	           myWidth = window.innerWidth; 
	           myHeight = window.innerHeight;
	      } else if (document.documentElement && (document.documentElement.clientWidth || document.documentElement.clientHeight)) {
	           myWidth = document.documentElement.clientWidth; 
	           myHeight = document.documentElement.clientHeight;
	      } else if (document.body && (document.body.clientWidth || document.body.clientHeight)) { //IE9
	           myWidth = document.body.clientWidth; 
	           myHeight = document.body.clientHeight;
	      }
	      var iMaxWidth = $( '#div-gpt-ad-<?php echo cual_cat_es();?>-2000x1000' ).innerWidth();
	      var iMaxWidthSkin = $( '#div-gpt-ad-<?php echo cual_cat_es();?>-2000x1000 ins' ).innerWidth();
	      var iMaxWidth_floating = $( '#div-gpt-ad-<?php echo cual_cat_es();?>-720x300' ).innerWidth();
	      var variable="-10";
	      var variable=((myWidth-iMaxWidthSkin) / 2);
	      var variable_floating=((myWidth-iMaxWidth_floating) / 2);
	      //console.log("width: "+myWidth+" : pagination: "+pagination);
	      //alert("iMaxWidth: "+iMaxWidth );
	      //alert("variable: "+variable+" -- width: "+myWidth+" -- iMaxWidthSkin: "+iMaxWidthSkin );
	      $('#div-gpt-ad-<?php echo cual_cat_es();?>-2000x1000').animate({left: variable+ "px"}, {duration: 10});
	      $('#div-gpt-ad-<?php echo cual_cat_es();?>-720x300').animate({left: variable_floating+ "px"}, {duration: 2});
	      $("#div-gpt-ad-<?php echo cual_cat_es();?>-2000x1000").css({ width: (myWidth-variable-20)+"px" });
    });
  </script>-->

  	<script>
	$(document).ready(function() {
	 	$(window).bind("resize", methodToFixLayout);
	 	var bgname = $("body").css('background-image');
	 	function methodToFixLayout( e ) {
		    var winWidth = $(window).width();
		    //console.log("winWidth:"+winWidth); 
		    var iMaxWidth = $( '#div-gpt-ad-<?php echo cual_cat_es();?>-2000x1000' ).innerWidth();
	      //var iMaxWidthSkin = $( '#div-gpt-ad-<?php echo cual_cat_es();?>-2000x1000 ins' ).innerWidth();
	       var iMaxWidthSkin = $( '#div-gpt-ad-<?php echo cual_cat_es();?>-2000x1000 img' ).innerWidth();
      	    if(iMaxWidthSkin==null) var iMaxWidthSkin = $( '#div-gpt-ad-<?php echo cual_cat_es();?>-2000x1000 ins' ).innerWidth();
    	    if(iMaxWidthSkin==null) var iMaxWidthSkin = $( '#div-gpt-ad-<?php echo cual_cat_es();?>-2000x1000 iframe' ).innerWidth();

      	    //vaciar el background si hay skin
	   	    //if($(".skin_content_table").has("div")!="") $('body').css('background', 'none');
	   	    if($(".skin_content_table:has(div)").length){$('body').css('background-image', 'none');}


		    var variable="-10";
		    var variable=(winWidth-iMaxWidthSkin) / 2;
		    //console.log(variable);
			//console.log("width:"+(winWidth-variable)); 
			var iMaxWidth_floating = $( '.floating' ).innerWidth();
		    var variable_floating=((winWidth-iMaxWidth_floating) / 2);

		    $('.floating').css({left: variable_floating});
		    $('#div-gpt-ad-<?php echo cual_cat_es();?>-2000x1000').css({width: (winWidth-variable)+"px" });
		    $('#div-gpt-ad-<?php echo cual_cat_es();?>-2000x1000').css({left: variable});

		   	//flechas single
		   	var pos_flecha=(winWidth/2)-500-50;
		    var pos_flecha_der=(winWidth/2)+490;
		    
		    $('.navigation_single .nav-next').css({left: pos_flecha_der});
		    $('.navigation_single .nav-previous').css({left: pos_flecha});

		}
		methodToFixLayout();
	 });
	 </script>
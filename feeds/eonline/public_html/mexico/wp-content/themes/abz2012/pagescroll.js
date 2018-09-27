
	var objectGlobal = {};
	try{
		(function( $ ) {
		 $(function() {

		 	console.log('ingreso al ready');

		 
		   if($('body').hasClass('single')){

				scrolling = "<span id='scrolling'>Scrolling</span>",
				stopped = "stop";
		        
		        var scrollTotal;
		        var porc_mas_40 = 0;
				var porc_mas_75 = 0;

		      	$( window ).scroll(function() {

		      		//console.log('scroll');
		       
			       clearTimeout( $.data( this, "scrollCheck" ) );
			       $.data( this, "scrollCheck", setTimeout(function() {
		        
					$(window).scroll(function(){
					 
					    var wintop = $(window).scrollTop(), docheight = $(document).height(), winheight = $(window).height();
					    var  scrolltrigger = 0.95;
					 
					    scrollTotal =  (wintop/(docheight-winheight))*100;
					 

					});
		            if(typeof scrollTotal != 'undefined'){
		              
		              if(isNaN(scrollTotal.toFixed())){
		                scrollTotal = 0;
		              }else if(scrollTotal.toFixed() == 101){
		                scrollTotal = 100;
		              }             
		            

		               percent = scrollTotal.toFixed();

		               //console.log('percent: '+percent);

		               objectGlobal.title = $( "body" ).data("title");
		               
						if(percent>=40 && percent<=75){
							if(porc_mas_40==0) {
								console.log('PageScrolled');
								_satellite.track('PageScrolled');
								porc_mas_40=1;
							}
						}else if(percent>75 && percent<=100){
							if(porc_mas_75==0)  {
								console.log('PageScrolled_75');
								_satellite.track('PageScrolled_75');
								porc_mas_75=1;
							}
						}

		              
		            }
				}, 200) );

				});
			}

		});

		})( jQuery );
	}catch(e){
		console.dir(e);
	}

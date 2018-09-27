		<?if(is_home()){?>
				  	
					<script type="text/javascript">
					$(document).ready(function(){
						$('#omitir').css("display", "block");
						$('.floating').attr('disabled','-1'); // oculta floating
						$('#div-gpt-ad-home-floorad').attr('disabled','-1'); // oculta floor Ad

					   	
					   	$("#omitir").click(function(e){
							e.preventDefault();
							$(this).css("display", "none");
							$('#div-gpt-ad-home-960x400').css("display", "none");
							$('.floating').removeAttr('disabled');
							$('#div-gpt-ad-home-floorad').removeAttr('disabled'); // muestro floor Ad
							$('#wrapper').fadeIn(100);
						})
					});
					</script>
					<script type="text/javascript">					
						var t = setTimeout("alerta()",20000);
				
						function alerta() {
							$('#omitir').css("display", "none");
							$('#div-gpt-ad-home-960x400').css("display", "none");
							//$('.floating').css("display", "none");
							//$('.floating').removeAttr('disabled');
							$('.floating').remove();
							$('#wrapper').fadeIn(1000);
						}
					</script>
		<?}else{?>
					
					<script type="text/javascript">					
						var t = setTimeout("alerta()",20000);
				
						function alerta() {
							$('.floating').remove();
						}
					</script>
		<?}?>
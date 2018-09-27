
<?
$url = 'http://adsrv01.eonlinelatinola.com/www/delivery/ajs.php?zoneid=144';
$h = file_get_contents($url, true);
$resultado = strpos($h, "http://adsrv01.eonlinelatinola.com/www/");

if($resultado !== FALSE){
	$hay_="1";
}else {
	$hay_="0";
}

if (is_home() && $hay_=="1"){?>
		   <style>
		  	#wrapper_banner {
				width: 100%;
				height:100%;
				-webkit-font-smoothing: antialiased;
			}

			#wrapper_banner td {
				vertical-align: middle;
				text-align: center;
			}
		  .content_table{
			margin:10px auto;
			width:990px;
			height:400px;
		  }
		  .omitir{
			margin:0 auto;
			width:990px;
			height:100px;
		  }
		  </style>

		  
		   <script type="text/javascript">
			$(document).ready(function(){
				$('#wrapper').fadeOut(1000, function() {
			      $('#banner').css("display", "block");
			   	});
			   	$("#omitir").click(function(e){
					e.preventDefault();
					$(this).css("display", "none");
					$('#banner').css("display", "none");
					$('#wrapper').fadeIn(1000);
				})
			});
			</script>
			<script type="text/javascript">
					
					var t = setTimeout("alerta()",10000);
			
					function alerta() {
						//alert("HOLA");
						//location.href='index.php';
						$('#omitir').css("display", "none");
						$('#banner').css("display", "none");
						$('#wrapper').fadeIn(1000);
					}
				</script>
	<?}?>
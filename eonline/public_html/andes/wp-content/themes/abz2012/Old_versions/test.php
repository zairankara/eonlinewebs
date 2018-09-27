				<script type="text/javascript" src="/varios/modulos_extra/jquery.min.js"></script>
				<script type="text/javascript" language="javascript">
					var var_feed = 1;

					$.ajax({
					   type: "POST",
					   url: "/common/lives.php",
					   data: "var_feed="+var_feed+"&dateCache=" + new Date().getTime(), 
					   cache: false,
					   success: function(respuesta) {
					      console.log("OKasa1256"+respuesta);
					   }
					});
				</script>
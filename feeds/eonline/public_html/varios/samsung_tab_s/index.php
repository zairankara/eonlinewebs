<?
	$rand=rand(0,9000);
	$db = "preprodabzdb";
	$usuario_con = "eonline_usr";
	$password_con = "30nl1n3";
	$conectar = mysql_connect ($db, $usuario_con, $password_con) or die ("No se puede conectar con la base de datos");
	mysql_select_db("galleries",$conectar) or die('Could not select database.');
?>
<link rel="stylesheet" type="text/css" media="screen" href="/varios/samsung_tab_s/styles.css?d=<?=$rand?>" />

<div id="telefono">
	<div class="pantalla">
		<h1>LAS MEJORES VESTIDAS SOBRE LA <span>RED CARPET</span></h1>



		<!-- Varios/Samsung_patrocinio -->
		<div id='patrocinio_samsung'>
			<iframe src="/varios/samsung_tab_s/ad.php" width="175" height="25"  allowtransparency="true" frameborder="0" scrolling="no" tabindex="0" style="border: none;"></iframe>	
		</div>
	</div>
</div>
<script type="text/javascript" data-device="1">

$(window).bind("load resize", function() {
	var w=$("#telefono").width();
	$("#telefono").height(197.4*w/100);
	var h=$("#telefono").height();
	$(".img").width(w*80.7/100);
	$(".img").height(h*65/100);

	var wI=$(".img").width();
	var hI=$(".img").height();

	var wP=$(".pantalla").width();
	var hP=$(".pantalla").height();

	var ML=(wP-wI)/2;
	var MT=(hP-hI)/2;

	var MT_flechas=(hP-2)/2;
	$(".img").css( { marginLeft : ML+"px", marginTop : MT+"px" } );
	$("#img").css("display", "block");
	$("h1").css("display", "block");
	$(".nav_flechas").css( "top", MT_flechas+"px" );
	
});
</script>
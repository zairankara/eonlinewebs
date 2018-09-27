<?
	if(!isset($_COOKIE["samsung"])) setcookie("samsung","SI", time()+60, "/");
	$rand=rand(0,9000);
	$db = "preprodabzdb";
	$usuario_con = "eonline_usr";
	$password_con = "30nl1n3";
	$conectar = mysql_connect ($db, $usuario_con, $password_con) or die ("No se puede conectar con la base de datos");
	mysql_select_db("galleries",$conectar) or die('Could not select database.');
?>
<!-- FONT-FACE -->
<link rel="stylesheet" type="text/css" media="screen" href="http://la.eonline.com/mexico/wp-content/themes/abz2012/font-face/font-face.css" />
<!-- / FONT-FACE -->

<link rel="stylesheet" type="text/css" media="screen" href="http://la.eonline.com/varios/samsung_fancy/styles.css?d=<?=$rand?>" />
<script src="https://code.jquery.com/jquery-2.1.1.min.js" data-device="1"></script>
<script type='text/javascript' src='http://la.eonline.com/mexico/wp-content/plugins/instagram-for-wordpress/js/jquery.cycle.all.js'></script>

<div id="telefono">
	<div class="pantalla">
		<h1>LAS MEJORES VESTIDAS SOBRE LA <span>RED CARPET</span></h1>

		<?
		//15242
		$id_gal=15279;
		
		$limit=NULL;
		$order="pg.orden";
		$orientacion="ASC";
		$group=NULL;

		if($id_gal==NULL){
			$id_gal=" ";
		}else{
			$id_gal="AND ng.id=".$id_gal;
		}
		if($limit==NULL){
			$limit_src=" ";
		}else{
			$limit_src=" LIMIT ".$limit;
		}
		if($group==NULL){
			$group_src=" ";
		}else{
			$group_src=" GROUP by ".$group;
		}
		$sqlstr="SELECT np.*, ng.title AS title_gal, ng.id as gid FROM picture np INNER JOIN pictures_galleries pg ON pg.picture_id=np.id INNER JOIN gallery ng ON ng.id=pg.gallery_id ".$id_gal." AND pg.gallery_id=ng.id ".$group_src." ORDER by ".$order." ".$orientacion." ".$limit_src.";";
		$query=mysql_query($sqlstr) or die($sqlstr);
		
		
		echo ("<ul class='img' id='img'>");

			while($image = mysql_fetch_array($query)){
				//echo ($image["filename"]."<br>");

				$vecUrl=explode("http://",$image["filename"]);
				$desc=$image["description"];
				$titulo=$image["title"];
				$pid=$image["id"];

				if($vecUrl[1]=="")
				{
					$urlImg=$var_con[1].$image["path"]."/".$image["filename"];
				}else{
					$urlImg="http://".$vecUrl[1];
				}
				echo ("<li><img src='".$urlImg."' title='".$titulo."' width='300'/></li>");
			}
			?>
			
				
		</ul>
		<div class="nav_flechas" style="display:none;">
			<a href="#" id="prev2" onClick="//_gaq.push(['_trackEvent', 'Galeria Patrocinio Samsung Latin Billboard', 'Prev']);"><img src="http://la.eonline.com/admin2012/banners/images/prev2.png" alt="Arrow Prev"></a>
			<a href="#" id="next2" onClick="//_gaq.push(['_trackEvent', 'Galeria Patrocinio Samsung Latin Billboard', 'Next']);"><img src="http://la.eonline.com/admin2012/banners/images/next2.png" alt="Arrow Next"></a>
		</div>


		<!-- Varios/Samsung_patrocinio -->
		<div id='patrocinio_samsung'>
			<iframe src="http://la.eonline.com/varios/samsung_fancy/ad.php" width="175" height="25"  allowtransparency="true" frameborder="0" scrolling="no" tabindex="0" style="border: none;"></iframe>	
		</div>
	</div>
</div>
<script type="text/javascript" data-device="1">
$(document).ready(function($) {
	//_gaq.push(['_trackEvent','Galeria Patrocinio Samsung Latin Billboard','Ready']);

	$('#img').cycle({ 
	    fx:     'fade',
	    speed:  'fast', 
	    timeout: 0, 
	    next:   '#next2', 
	    prev:   '#prev2',
	    before: onBefore
	});
	function onBefore(curr, next, opts) {
		var nameIMG=$(this).children().attr("title");
		//_gaq.push(['_trackEvent', 'Galeria Patrocinio Samsung Latin Billboard', 'Load Image', nameIMG]);
	}

});
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
	$(".nav_flechas").css("display", "block");
	
});
</script>
<?
$ruta_concurso2="http://".$_SERVER["SERVER_NAME"]."/varios/ms_wakeup";
?>
<script type="text/javascript" src="http://la.eonline.com/varios/modulos_extra/jquery.min.js"></script>
<script type="text/javascript">
	function enviar_variables(id){
		$.post("<?=$ruta_concurso2?>/traer_data.php?rand<?=rand(0,500);?>",{pid:id},
			function(respuesta){ 
				$("#resp").html(respuesta);
				$("#fbcoments").attr("href","<?=$ruta_concurso2?>/personajes/"+id+".jpg");
			});
	}
</script>
<h3 class="widget-title wakeup">
	PERSONAJES
</h3>
<div id="resp">
	<div class="menu-wakeup" >
		<ul>
			<li><a href="javascript:enviar_variables(1);" class="active">» Abril</a></li>
			<li><a href="javascript:enviar_variables(2);">» Marco</a></li>
			<li><a href="javascript:enviar_variables(3);">» Leticia</a></li>
			<li><a href="javascript:enviar_variables(4);">» Tomás</a></li>
			<li><a href="javascript:enviar_variables(5);">» Clara</a></li>
			<li><a href="javascript:enviar_variables(6);">» Ricardo</a></li>
			<li><a href="javascript:enviar_variables(7);">» Celeste</a></li>
			<li><a href="javascript:enviar_variables(8);">» Alexis</a></li>
			<li><a href="javascript:enviar_variables(9);">» Josefina</a></li>
			<li><a href="javascript:enviar_variables(10);">» Juan</a></li>
			<li><a href="javascript:enviar_variables(11);">» Lucas</a></li>
			<li><a href="javascript:enviar_variables(12);">» Lady Ant</a></li>
			<li><a href="javascript:enviar_variables(13);">» Los Altman Brothers</a></li>
			<li><a href="javascript:enviar_variables(14);">» Johnny</a></li>
			<li><a href="javascript:enviar_variables(15);">» Érica</a></li>
			<li><a href="javascript:enviar_variables(16);">» Laura</a></li>
			<li><a href="javascript:enviar_variables(17);">» Yahir</a></li>
		</ul>
	</div>
<?=$ruta_concurso2?>/personajes/1.jpg
	<div class="content-wakeup">
		<div class="columna_izq">
			<img src="<?=$ruta_concurso2?>/personajes/1.jpg">
		</div>
		<div class="columna_der">
			<h3 class="titulo_fucsia">
				ABRIL
			</h3>
			<p>La protagonista de nuestra historia transita su adolescencia llena de dudas y contradicciones. Toca la guitarra y canta muy bien. Se encuentra en una búsqueda permanente de su propia identidad, y de sus deseos.</p>

			<p>Amante del longboard, lo usa como medio de locomoción.  Es intrépida, apasionada, impulsiva y muy talentosa. Se juega sin dudarlo por lo que quiere. La música, el arte, es lo que da sentido a su existencia.</p>

			<p>Cuando se entera de la herencia dejada por su padre, una vieja Estación de bomberos, ve en este espacio la posibilidad de armar un lugar para el arte y, sobre todo, para que sus sueños se puedan expresar y cumplir. Esto es lo que va a perseguir Abril a lo largo de toda la historia.
			</p>
		</div>
	</div>
</div>

	<div class="entry-social" style="float:left; width:600px; border-bottom:none; margin:10px 0;">
		
		<!-- AddThis Button BEGIN -->
		<div class="addthis_toolbox addthis_default_style">
		<a class="addthis_button_facebook_like" fb:like:layout="button_count"></a>
		<a class="addthis_button_tweet"></a>
		<a class="addthis_button_google_plusone" g:plusone:size="medium"></a>
		</div>
	</div><!-- .entry-meta -->

	<div style="margin-bottom:30px;">
		<div id="fb-root"></div><script src="http://connect.facebook.net/es_ES/all.js#xfbml=1"></script> 
		<fb:comments href="<?=$ruta_concurso2?>/personajes/1.jpg" width="600" id="fbcoments"></fb:comments >
	</div><!-- #FACEBOOK COMMENT -->

<?php
/**
 * Template Name: ESHOWS
 *
 * A custom page template without sidebar.
 *
 * The "Template Name:" bit above allows this to be selectable
 * from a dropdown menu on the edit page screen.
 *
 * @package WordPress
 * @subpackage Twenty_Ten
 * @since Twenty Ten 1.0
 */


get_header(); ?>
<style type="text/css">
	.bannereshows{
		position:absolute; 
		top:67px; 
		right:16px;
		z-index:500;
	}
</style>
		<div id="container" class="one-column">
			<div id="content" role="main">
				<div class="cont_one-clumn" style="position:relative;">
					<div class="bannereshows"><? echo quien_es("300","250","1");?></div>
					<h1 style="color:<?php echo cat_color(eshows);?>; margin-left: 25px !important;">E! SHOWS</h1>
					<ul id="da-thumbs" class="da-thumbs">
					<li class="eshow">
						<a href="http://la.eonline.com/mexico/category/the-kardashians">
							<img src="<?php bloginfo('template_url')?>/images/shows/Es_tan_kardashian.jpg"  alt="Es tan kardashian" title="Es tan kardashian"/>
							<div><h3>La familia demuestra que está determinada a permanecer siempre unida en esta nueva temporada.</h3></div>
						</a>
					</li>
					<!--<li class="eshow">
						 <a href="http://la.eonline.com/mexico/pagina/zonatrendymexico/">
							<img src="<?php bloginfo('template_url')?>/images/shows/zona_trendy_MEX.jpg"  alt="Zona Trendy Mexico" title="Zona Trendy Mexico"/>
							<div><h3>Si deseas contemplar muy de cerca el lifestyle de las celebridades y la socialité mexicana. No te pierdas Zona Tendy</h3></div>
						</a>
					</li>-->

					<!--<li class="eshow">
						<a href="#">
							<img src="<?php bloginfo('template_url')?>/images/shows/Erika.jpg"  alt="El Show de Erika" title="El Show de Erika"/>
							<div><h3> La presentadora venezolana quiere contagiar el buen humor con el programa 'El show de Erika, casi Late Night'</h3></div>
						</a>
					</li>-->
					
					<!--<li class="eshow">
						<a href="http://la.eonline.com/mexico/pagina/elincorrecto/">
							<img src="<?php bloginfo('template_url')?>/images/shows/incorrecto.jpg" alt="El Incorrecto"  title="El Incorrecto"/>
							<div><h3>El noticiero más ácido de la televisión mexicana.</h3></div>
						</a>
					</li>-->

						<!--<li class="eshow">
						<a href="http://la.eonline.com/mexico/pagina/lasopamexico/">
							<img src="<?php bloginfo('template_url')?>/images/shows/La_sopa.jpg" alt="La sopa" title="La sopa"/>
							<div><h3>Eduardo Videgaray hace su versión mexicana de la Sopa para reirte con su visión única, humorística y ácida de los programas de televisión de Latinoamérica.</h3></div>
						</a>
					</li> -->
						
					<li class="eshow">
						<a href="http://la.eonline.com/mexico/pagina/coffeebreak/">
							<img src="<?php bloginfo('template_url')?>/images/shows/coffe.jpg" alt="Coffee Break" title="Coffee Break"/>
							<div><h3>La hora del café ahora la podrás disfrutar con las celebridades más top y relevantes del mundo del entretenimiento latinoamericano.</h3></div>
						</a>
					</li>
					<!-- <li class="eshow">
						<a href="#">
							<img src="<?php bloginfo('template_url')?>/images/shows/Epop.jpg" alt="E pop" title="E pop"/>
							<div><h3>Renato y Lety nos preparan una explosiva malteada de la cultura pop</h3></div>
						</a>
					</li>-->
					<li class="eshow">
						<a href="#">
							<img src="<?php bloginfo('template_url')?>/images/shows/the_soup.jpg"  alt="the Soup" title="the Soup"/>
							<div><h3>Joel McHale ofrece comentarios sarcásticos y punzantes en los clips de televisión diferentes y momentos de la cultura pop de la semana.</h3></div>
						</a>
					</li>

					 <li class="eshow">
						<a href="http://la.eonline.com/mexico/category/amamos-las-pelis">
							<img src="<?php bloginfo('template_url')?>/images/shows/amamos.jpg"  alt="Amamos las pelis" title="Amamos las pelis"/>
							<div><h3> Ahora en E! tambien tenemos lo mejor de Hollywood</h3></div>
						</a>
					</li>	
					
					<!-- <li class="eshow">
						<a href="http://la.eonline.com/mexico/pagina/fashionpolicemx/">
							<img src="<?php bloginfo('template_url')?>/images/shows/fashion_police_MX.jpg"  alt="Fashion police Mexico"  title="Fashion police"/>
							<div><h3>Horacio Villalobos, Ileana Rodríguez, Olivia Peralta y JuanJo Herrera dan una mirada despiadada a la moda de las estrellas mexicanas e internacionales</h3></div>
						</a>
					</li> -->
					

					<!-- <li class="eshow">
						<a href="#">
							<img src="<?php bloginfo('template_url')?>/images/shows/the_wanted.jpg" alt="The Wanted Life" title="The Wanted Life"/>
							<div><h3>The Wanted life muestra detrás de cámara, como viven los jóvenes su mudanza de Inglaterra a EEUU.</h3></div>
						</a>
					</li> -->

					
					<!-- <li class="eshow">
						<a href="http://la.eonline.com/experience/married_to_jonas/">
							<img src="<?php bloginfo('template_url')?>/images/shows/married.jpg" alt="Married to Jonas" title="Married to Jonas"/>
							<div><h3>Kevin Jonas & Danielle Deleasa. El amor el clave de Pop.</h3></div>
						</a>
					</li> -->

					<!-- <li class="eshow">
						<a href="#">
							<img src="<?php bloginfo('template_url')?>/images/shows/chelsea_lately.jpg"  alt="Chelsea Lately" title="Chelsea Lately"/>
							<div><h3>Refrescante enfoque sobre la cultura pop y noticias del espectáculo con hilarantes invitados y entrevistas fuera de lo común.</h3></div>
						</a>
					</li> -->
					
					<li class="eshow">
						<a href="http://la.eonline.com/mexico/category/alfombraroja/">
							<img src="<?php bloginfo('template_url')?>/images/shows/alfombra_roja.jpg" alt="Alfombra Roja"  title="Alfombra Roja"/>
							<div><h3>Consigue un asiento de primera fila en los eventos más glamorosos del mundo! Desde la Alfombra Roja hasta los after parties.</h3></div>
						</a>
					</li>			
					
					<!--<li class="eshow">
						<a href="http://la.eonline.com/mexico/pagina/yosoyelartista/">
							<img src="<?php bloginfo('template_url')?>/images/shows/yosoyelartista.jpg"  alt="Yo soy el Artista" title="Yo soy el Artista"/>
							<div><h3>El reality musical Yo soy el artista del canal Telemundo Internacional. Le da la oportunidad a gente común y corriente, de convertirse en estrella a través del canto.</h3></div>
						</a>
					</li>-->
					<!--<li class="eshow">
						<a href="#">
							<img src="<?php bloginfo('template_url')?>/images/shows/younger.jpg" alt="Younger" title="Younger"/>
							<div><h3>Una mujer de 40 trata de conseguir tarbajo y lo logra haciendose pasar por una de 26.</h3></div>
						</a>
					</li>-->
				
					</ul>

				</div>
			</div><!-- #content -->
		</div><!-- #container -->

<?php get_footer(); ?>

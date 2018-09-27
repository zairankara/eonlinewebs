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
						<a href="http://la.eonline.com/venezuela/category/the-kardashians">
							<img src="<?php bloginfo('template_url')?>/images/shows/Es_tan_kardashian.jpg" alt="Es tan kardashian" title="Es tan kardashian"/>
							<div><h3>La familia demuestra que está determinada a permanecer siempre unida en esta nueva temporada.</h3></div>
						</a>
					</li> 
					<!--<li class="eshow">
						<a href="http://la.eonline.com/venezuela/pagina/zonatrendycaracas">
							<img src="<?php bloginfo('template_url')?>/images/shows/vip_caracas.jpg" alt="Vip caracas" title="Vip caracas"/>
							<div><h3>Caterina Valentino, te brinda acceso VIP a los lugares, eventos y personalidades más importantes de una de las ciudades más movidas de Latinoamérica: Caracas.</h3></div>
						</a>
					</li> -->	
					
					<!--</li>
						<li class="eshow">
						<a href="#">
							<img src="<?php bloginfo('template_url')?>/images/shows/the_soup.jpg" alt="The soup" title="The soup"/>
							<div><h3>Joel McHale ofrece comentarios sarcásticos y punzantes en los clips de televisión diferentes y momentos de la cultura pop de la semana.</h3></div>
						</a>
					</li>-->	

					<li class="eshow">
						<a href="http://la.eonline.com/venezuela/category/amamos-las-pelis">
							<img src="<?php bloginfo('template_url')?>/images/shows/amamos.jpg"  alt="Amamos las pelis" title="Amamos las pelis"/>
							<div><h3> Ahora en E! tambien tenemos lo mejor de Hollywood</h3></div>
						</a>
					</li>

					<li class="eshow">
						<a href="http://la.eonline.com/venezuela/pagina/coffeebreak/">
							<img src="<?php bloginfo('template_url')?>/images/shows/coffe.jpg" alt="coffee break" title="coffee break"/>
							<div><h3>La hora del café ahora la podrás disfrutar con las celebridades más top y relevantes del mundo del entretenimiento latinoamericano.</h3></div>
						</a>
					</li>

					

					<!--<li class="eshow">
						<a href="http://la.eonline.com/venezuela/pagina/lasopavenezuela/">
							<img src="<?php bloginfo('template_url')?>/images/shows/lasopa_venezuela2.jpg" alt="La Sopa" title="La Sopa"/>
							<div><h3>Led Varela le pone picante a La Sopa Venezolana, será el encargado de reseñar los momentos más graciosos y bizarros de la TV venezolana.</h3></div>
						</a>
					</li> -->	

					<!--<li class="eshow">
						<a href="#">
							<img src="<?php bloginfo('template_url')?>/images/shows/Epop.jpg" alt="E pop" title="E pop"/>
							<div><h3>Renato y Lety nos preparan una explosiva malteada de la cultura pop</h3></div>
						</a>
					</li>-->

					<li class="eshow">
						<a href="http://la.eonline.com/venezuela/pagina/fashionpolice">
							<img src="<?php bloginfo('template_url')?>/images/shows/fashion_police.jpg" alt="fashion police" title="fashion police"/>
							<div><h3>Joan Rivers junto a Giuliana Rancic, Kelly Osbourne y George Kotsiopoulos comentan los looks más sobresalientes de Hollywood</h3></div>
						</a>
					</li>

					<!-- <li class="eshow">
						<a href="#">
							<img src="<?php bloginfo('template_url')?>/images/shows/chelsea_lately.jpg" alt="chelsea lately" title="chelsea lately"/>
							<div><h3>Refrescante enfoque sobre la cultura pop y noticias del espectáculo con hilarantes invitados y entrevistas fuera de lo común.</h3></div>
						</a>
					</li> -->
					
					<li class="eshow">
						<a href="http://la.eonline.com/venezuela/category/alfombraroja/">
							<img src="<?php bloginfo('template_url')?>/images/shows/alfombra_roja.jpg" alt="Alfombra roja" title="Alfombra roja"/>
							<div><h3>Consigue un asiento de primera fila en los eventos más glamorosos del mundo! Desde la Alfombra Roja hasta los after parties.</h3></div>
						</a>
					
					<li class="eshow">
						<a href="#">
							<img src="<?php bloginfo('template_url')?>/images/shows/e_news.jpg" alt="Enews" title="Enews"/>
							<div><h3>Conducido por Ryan Seacrest y Giuliana Rancic, cuenta las noticias diarias más calientes de Hollywood y el mundo del espectáculo.</h3></div>
						</a>
					</li>
					<!-- <li class="eshow">
						<a href="#">
							<img src="<?php bloginfo('template_url')?>/images/shows/escape_300x300.jpg" alt="Escape Club"  title="Escape Club"/>
							<div><h3>Doce jóvenes que odian sus trabajos, o están tratando de escapar de una mala relación, quieren volver a encender sus pasiones en las playas de República Dominicana </h3></div>
						</a>
					</li>-->

					<!-- <li class="eshow">
						<a href="#">
							<img src="<?php bloginfo('template_url')?>/images/shows/Erika.jpg"  alt="El Show de Erika" title="El Show de Erika"/>
							<div><h3> La presentadora venezolana quiere contagiar el buen humor con el programa 'El show de Erika, casi Late Night'</h3></div>
						</a>
					</li> -->
					<!-- <li class="eshow">
						<a href="http://la.eonline.com/experience/married_to_jonas/">
							<img src="<?php bloginfo('template_url')?>/images/shows/married.jpg" alt="Married to jonas" title="Married to jonas"/>
							<div><h3>Kevin Jonas & Danielle Deleasa. El amor el clave de Pop.</h3></div>
						</a>
					</li> -->
					<!-- <li class="eshow">
						<a href="#">
							<img src="<?php bloginfo('template_url')?>/images/shows/the_wanted.jpg" alt="The Wanted Life"  title="The Wanted Life"/>
							<div><h3>The Wanted life muestra detrás de cámara, como viven los jóvenes su mudanza de Inglaterra a EEUU.</h3></div>
						</a>
					</li> -->	
					<!-- <li class="eshow">
						<a href="http://la.eonline.com/venezuela/pagina/yosoyelartista/">
							<img src="<?php bloginfo('template_url')?>/images/shows/yosoyelartista.jpg"  alt="Yo soy el Artista" title="Yo soy el Artista"/>
							<div><h3>El reality musical Yo soy el artista del canal Telemundo Internacional. Le da la oportunidad a gente común y corriente, de convertirse en estrella a través del canto.</h3></div>
						</a>
					</li>-->
					</ul>

				</div>
			</div><!-- #content -->
		</div><!-- #container -->

<?php get_footer(); ?>

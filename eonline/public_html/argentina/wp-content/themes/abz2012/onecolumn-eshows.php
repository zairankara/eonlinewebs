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

					<h1 style="color:<?php echo cat_color("eshows");?>; margin-left: 25px !important;">E! SHOWS</h1>
					<ul id="da-thumbs" class="da-thumbs">
					<li class="eshow">
						<a href="http://enowlatino.com/OnDemand/CUTV/zr93cgASqPjObQ4xaQ054NkItI5t3zPF/kJeLTq_hYpIDg_q2NfTdnqbJR7le_QoD">
							<img src="<?php bloginfo('template_url')?>/images/shows/Es_tan_kardashian.jpg"  alt="Es tan kardashian" title="Es tan kardashian"/>
							<div><h3>La familia de moda vuelve. Y más fuerte que nunca. No te pierdas ningún episodio de nuestra familia favorita y disfruta de los últimos, hasta quedar Kardashian..</h3></div>
						</a>
					</li>
					<!-- <li class="eshow">
						<a href="http://la.eonline.com/andes/category/wakeup">
							<img src="<?php bloginfo('template_url')?>/images/shows/wake_up.jpg" alt="" title="Wake Up"/>
							<div><h3>En “Wake Up” Abril, la protagonista, emprenderá un camino de autodescubrimiento al cual se irán uniendo poco a poco un grupo de amigos, para conquistar sus sueños y convertirse en un exitoso grupo musical.</h3></div>
						</a>
					</li> -->

					<li class="eshow">
						<a href="#">
							<img src="<?php bloginfo('template_url')?>/images/shows/e_news.jpg" alt="Enews" title="Enews"/>
							<div><h3>Conducido por Ryan Seacrest y Giuliana Rancic, cuenta las noticias diarias más calientes de Hollywood y el mundo del espectáculo.</h3></div>
						</a>
					</li>
				
					<!--  <li class="eshow">
						<a href="#">
							<img src="<?php bloginfo('template_url')?>/images/shows/latin_bites.jpg" alt="latin bites" title="latin bites"/>
							<div><h3>Disfruta de la mejor información, entrevistas y notas exclusivas del Sur de nuestro continente de la mano de Leandro Leunis.</h3></div>
						</a>
					</li>  -->

					
					<li class="eshow">
						<a href="http://la.eonline.com/argentina/pagina/coffeebreak/">
							<img src="<?php bloginfo('template_url')?>/images/shows/coffe.jpg" alt="Coffee break" title="Coffee break"/>
							<div><h3>La hora del café ahora la podrás disfrutar con las celebridades más top y relevantes del mundo del entretenimiento latinoamericano.</h3></div>
						</a>
					</li>

					<!--<li class="eshow">
						<a href="#">
							<img src="<?php bloginfo('template_url')?>/images/shows/younger.jpg" alt="Younger" title="Younger"/>
							<div><h3>Una mujer de 40 trata de conseguir tarbajo y lo logra haciendose pasar por una de 26.</h3></div>
						</a>
					</li>-->

					<!--<li class="eshow">
						<a href="#">
							<img src="<?php bloginfo('template_url')?>/images/shows/the_soup.jpg" alt="The Soup" title="The Soup"/>
							<div><h3>Joel McHale ofrece comentarios sarcásticos y punzantes en los clips de televisión diferentes y momentos de la cultura pop de la semana.</h3></div>
						</a>
					</li>-->

					<!--<li class="eshow">
						<a href="#">
							<img src="<?php bloginfo('template_url')?>/images/shows/Epop.jpg" alt="E pop" title="E pop"/>
							<div><h3>Renato y Lety nos preparan una explosiva malteada de la cultura pop</h3></div>
						</a>
					</li>-->

					<!-- <li class="eshow">
						<a href="http://la.eonline.com/argentina/pagina/fashionpolice">
							<img src="<?php bloginfo('template_url')?>/images/shows/fashion_police.jpg" alt="Fashion police" title="Fashion police"/>
							<div><h3>Joan Rivers junto a Giuliana Rancic, Kelly Osbourne y George Kotsiopoulos comentan los looks más sobresalientes de Hollywood</h3></div>
						</a>
					</li> -->
					<!-- <li class="eshow">
						<a href="#">
							<img src="<?php bloginfo('template_url')?>/images/shows/chelsea_lately.jpg" alt="Chelsea Lately" title="Chelsea Lately"/>
							<div><h3>Refrescante enfoque sobre la cultura pop y noticias del espectáculo con hilarantes invitados y entrevistas fuera de lo común.</h3></div>
						</a>
					</li> -->
					<li class="eshow">
						<a href="http://la.eonline.com/argentina/category/alfombraroja/">
							<img src="<?php bloginfo('template_url')?>/images/shows/alfombra_roja.jpg" alt="Alfombra Roja" title="Alfombra Roja"/>
							<div><h3>Consigue un asiento de primera fila en los eventos más glamorosos del mundo! Desde la Alfombra Roja hasta los after parties.</h3></div>
						</a>
					</li>	

					 <li class="eshow">
						<a href="http://la.eonline.com/argentina/category/amamos-las-pelis">
							<img src="<?php bloginfo('template_url')?>/images/shows/amamos.jpg"  alt="Amamos las pelis" title="Amamos las pelis"/>
							<div><h3> Ahora en E! tambien tenemos lo mejor de Hollywood</h3></div>
						</a>
					</li>	
					
					<!--  <li class="eshow">
						<a href="#">
							<img src="<?php bloginfo('template_url')?>/images/shows/Erika.jpg"  alt="El Show de Erika" title="El Show de Erika"/>
							<div><h3> La presentadora venezolana quiere contagiar el buen humor con el programa 'El show de Erika, casi Late Night'</h3></div>
						</a>
					</li>-->
					<!--  <li class="eshow">
						<a href="#">
							<img src="<?php bloginfo('template_url')?>/images/shows/proyect_runway_V.jpg"  alt="Proyect Runway V" title="Proyect Runway V"/>
							<div><h3>De 16 diseñadores, sólo 3 conseguirán la oportunidad de mostrar en la Semana de la Moda de Nueva York sus colecciones para uno de ellos convertirse en el ganador de Project Runway.</h3></div>
						</a>
					</li>-->	
				
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
					</li>		-->
					<!--<li class="eshow">
						<a href="http://la.eonline.com/argentina/pagina/yosoyelartista/">
							<img src="<?php bloginfo('template_url')?>/images/shows/yosoyelartista.jpg"  alt="Yo soy el Artista" title="Yo soy el Artista"/>
							<div><h3>El reality musical Yo soy el artista del canal Telemundo Internacional. Le da la oportunidad a gente común y corriente, de convertirse en estrella a través del canto.</h3></div>
						</a>
					</li>-->

					</ul>

				</div>
			</div><!-- #content -->
		</div><!-- #container -->

<?php get_footer(); ?>

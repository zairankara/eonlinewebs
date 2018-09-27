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

		<div id="container" class="one-column">
			<div id="content" role="main">
				<div class="cont_one-clumn">
					<h2 style="color:<?php echo cat_color(eshows);?>; margin-left: 25px !important;">E! SHOWS</h2>
					<ul id="da-thumbs" class="da-thumbs">
					<li class="eshow">
						<a href="http://br.eonline.com/concursos/etaoKardashian/">
							<img src="<?php bloginfo('template_url')?>/images/shows/kardashians.jpg"/>
							<div><span>Nesta temporada veremos a nova vida de solteira de Kim, os anivers&aacute;rios de Kendall e Kylie, o casamento de Khlo&eacute; e Lamar e os preparativos para a chegada do segundo filho de Kourtney.</span></div></a>
					</li>
				
					<li class="eshow">
						<a href="#">
							<img src="<?php bloginfo('template_url')?>/images/shows/vip_brasil.jpg"/>
							<div><span>Seja um convidado VIP dos eventos mais badalados do Brasil.</span></div>
						</a>
					</li>	
					<li class="eshow">
						<a href="#">
							<img src="<?php bloginfo('template_url')?>/images/shows/fashion_police.jpg"/>
							<div><span>Com a l&iacute;ngua afiada Joan Rivers, junto com Giuliana Rancic, Kelly Osbourne e George Kotsiopoulos, comentam dos looks mais marcantes de Hollywood.</span></div>
						</a>
					</li>
					<li class="eshow">
						<a href="#">
							<img src="<?php bloginfo('template_url')?>/images/shows/the_soup.jpg"/>
							<div><span>Joel McHale ofrece comentarios sarc&aacute;sticos y punzantes en los clips de televisi&oacute;n diferentes y momentos de la cultura pop de la semana</span></div>
						</a>
					</li>
					<li class="eshow">
						<a href="#">
							<img src="<?php bloginfo('template_url')?>/images/shows/chelsea_lately.jpg"/>
							<div><span>Talk-show humor&iacute;stico que foca na cultura pop e nas not&iacute;cias do showbiz com convidados famosos e outros hil&aacute;rios, com direito a entrevistas fora do comum.</span></div>
						</a>
					</li>
					<li class="eshow">
						<a href="#">
							<img src="<?php bloginfo('template_url')?>/images/shows/tapete_vermelho.jpg"/>
							<div><span>Reserve seu lugar na primeira fila dos eventos mais glamurosos do mundo! Diretamente do tapete vermelho aos after parties.</span></div>
						</a>
					</li>
					<li class="eshow">
						<a href="#">
							<img src="<?php bloginfo('template_url')?>/images/shows/love_you_14.jpg"/>
							<div><span>Um programa semanal recheado de coment&aacute;rios e opini&otilde;es  sarc&aacute;sticas de Whitney, que solta o verbo sobre tudo; do mais quente na cultura pop e mundo das celebridades a relacionamentos, sexo, dilemas da vida e muito mais.</span></div>
						</a>
					</li>	
						<li class="eshow">
						<a href="#">
							<img src="<?php bloginfo('template_url')?>/images/shows/mrs_eastwood.jpg"/>
							<div><span>Acompanhe Dina Eastwood em seu papel de m&atilde;e de duas garotas e manager de uma banda australiana em Carmel, Calif&oacute;rnia.</span></div>
						</a>
					</li>
					<li class="eshow">
						<a href="http://www.eonlineexperiences.com/married_to_jonas_br/">
							<img src="<?php bloginfo('template_url')?>/images/shows/married.jpg"/>
							<div><span>Kevin Jonas &amp; Danielle Deleasa. O amor na clave do Pop. </span></div>
						</a>
					</li>
					
					</ul>

				</div>
			</div><!-- #content -->
		</div><!-- #container -->

<?php get_footer(); ?>

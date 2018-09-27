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
					<h1 style="color:<?php echo cat_color(eshows);?>; margin-left: 25px !important;">E! SHOWS</h1><ul id="da-thumbs" class="da-thumbs">

					<li class="eshow">
						<a href="http://br.eonline.com/category/the-kardashians/">
							<img src="<?php echo esc_url( get_template_directory_uri() )?>/images/shows/Es_tan_kardashian.jpg" alt="Es tan Kardashian" title="Es tan Kardashian"/>
							<div><h3>O clã agora lida com o divórcio de Kris, a carreira de Kendall e a maternidade de Kourtney e Kim, que quer mais um bebê!.</h3></div></a>
					</li>
				
					<!-- <li class="eshow">
						<a href="#">
							<img src="<?php echo esc_url( get_template_directory_uri() )?>/images/shows/giuliana_bill.jpg" alt="Giuliana_Bill" title="Giuliana_Bill"/>
							<div><h3>Saiba de tudo da vida do casal mais adorado do E!. A apresentadora Giuliana Rancic e seu marido, Bill Rancic, nos dão um gostinho do seu dia-a-dia agitado com o filho.</h3></div>
						</a>
					</li>	 -->

					<li class="eshow">
						<a href="#">
							<img src="<?php echo esc_url( get_template_directory_uri() )?>/images/shows/enewsupdate.jpg" alt="E! News update" title="E! News update"/>
							<div><h3>Giselle Hermeto apresenta as notícias mais quentes do mundo do showbiz brasileiro e internacional, direto das festas e eventos mais quentes!.</h3></div>
						</a>
					</li>	

					<!--<li class="eshow">
						<a href="#">
							<img src="<?php echo esc_url( get_template_directory_uri() )?>/images/shows/conexao.jpg" alt="conexao" title="conexao"/>
							<div><h3>Nesta série documental, a apresentadora Gisele Hermeto irá mostrar da história da moda brasileira desde os anos 60 até os dias de hoje, com entrevistas com personalidades renomados da indústria.</h3></div>
						</a>
					</li> -->

					<li class="eshow">
						<a href="#">
							<img src="<?php echo esc_url( get_template_directory_uri() )?>/images/shows/fabulistBR.jpg" alt="fabulistBR" title="fabulistBR"/>
							<div><h3>Tudo sobre as tendências do mundo da moda, tecnologia e da vida no E!. Estreia dia 19 de outubro, 23</h3></div>
						</a>
					</li>

					<!--<li class="eshow">
						<a href="#">
							<img src="<?php echo esc_url( get_template_directory_uri() )?>/images/shows/noivas.jpg"  alt="Um Show de noiva" title="Um Show de noiva"/>
							<div><h3>Um programa que vai apresentar os vestidos de noiva mais estilosos e inovadores do Brasil.Este programa acompanha os meses de confecção, desde a ideia até a prova final, sem deixar nenhum drama dos momentos difíceis para trás.</h3></div>
						</a>
					</li>-->

					<!-- <li class="eshow">
						<a href="#">
							<img src="<?php echo esc_url( get_template_directory_uri() )?>/images/shows/fashion_police.jpg" alt="Fashion police" title="Fashion police"/>
							<div><h3>Com a língua afiada de Kathy Griffin, junto com Giuliana Rancic, Brad Goresky e Kelly Osbourne comentam os looks mais marcantes de Hollywood.</h3></div>
						</a>
					</li> -->
					<li class="eshow">
						<a href="#">
							<img src="<?php echo esc_url( get_template_directory_uri() )?>/images/shows/dashdolls.jpg"  alt="Dashdolls" title="Dashdolls"/>
							<div><h3>Quem será a nova braço direito das irmãs Kardashians na loja delas? acompanhe essa competição no E!. Toda terça-feira, 21h</h3></div>
						</a>
					</li>
					<!-- <li class="eshow">
						<a href="#">
							<img src="<?php echo esc_url( get_template_directory_uri() )?>/images/shows/chelsea_lately.jpg" alt="Chelsea Lately" title="Chelsea Lately"/>
							<div><h3>Talk-show humor&iacute;stico que foca na cultura pop e nas not&iacute;cias do showbiz com convidados famosos e outros hil&aacute;rios, com direito a entrevistas fora do comum.</h3></div>
						</a>
					</li> -->
					<!--<li class="eshow">
						<a href="#">
							<img src="<?php echo esc_url( get_template_directory_uri() )?>/images/shows/good_work.jpg" alt="Good Work" title="Good Work"/>
							<div><h3>Good Work: O mundo das transformações, plásticas e retoques de Hollywood, comandado pelo fabuloso RuPaul. Tendências de beleza, tratamentos e dicas com muito humor e convidados especiais!</h3></div>
						</a>
					</li>-->
					<!--<li class="eshow">
						<a href="#">
							<img src="<?php echo esc_url( get_template_directory_uri() )?>/images/shows/tapete_vermelho.jpg" alt="Tapete Vermelho" title="Tapete Vermelho"/>
							<div><h3>Reserve seu lugar na primeira fila dos eventos mais glamurosos do mundo! Diretamente do tapete vermelho aos after parties.</h3></div>
						</a>
					</li>-->
					<!--<li class="eshow">
						<a href="#">
							<img src="<?php echo esc_url( get_template_directory_uri() )?>/images/shows/love_you_14.jpg" alt="Love you" title="Love you"/>
							<div><h3>Um programa semanal recheado de coment&aacute;rios e opini&otilde;es  sarc&aacute;sticas de Whitney, que solta o verbo sobre tudo; do mais quente na cultura pop e mundo das celebridades a relacionamentos, sexo, dilemas da vida e muito mais.</h3></div>
						</a>
					</li>-->

					<li class="eshow">
						<a href="#">
							<img src="<?php echo esc_url( get_template_directory_uri() )?>/images/shows/IAmCait.jpg" alt="I am Cait" title="I am Cait"/>
							<div><h3>Um programa semanal recheado de coment&aacute;rios e opini&otilde;es  sarc&aacute;sticas de Whitney, que solta o verbo sobre tudo; do mais quente na cultura pop e mundo das celebridades a relacionamentos, sexo, dilemas da vida e muito mais.</h3></div>
						</a>
					</li>

					<li class="eshow">
						<a href="#">
							<img src="<?php echo esc_url( get_template_directory_uri() )?>/images/shows/Made_in_chelsea.jpg" alt="Made in Chelsea" title="Made in Chelsea"/>
							<div><h3>Conheça a vida boêmia e polêmica dos jovens ricos que vivem em Chelsea, o bairro mais glamoroso de Londres</h3></div>
						</a>
					</li>
					<li class="eshow">
						<a href="#">
							<img src="<?php echo esc_url( get_template_directory_uri() )?>/images/shows/houseofdvf.jpg" alt="House of DVF" title="House of DVF"/>
							<div><h3>Acompanhe o reality-show mais glamouroso da moda, comandado pela poderosa Diane Von Furstenberg.</h3></div>
						</a>
					</li>
					<!--<li class="eshow">
						<a href="#">
							<img src="<?php echo esc_url( get_template_directory_uri() )?>/images/shows/marry_harry.jpg" alt="I wanna Marry Harry" title="I wanna Marry Harry"/>
							<div><h3>Imagine só casar-se com um verdadeiro príncipe? Nesse divertido reality esse sonho pode virar (quase) realidade.</h3></div>
						</a>
					</li> -->
					
					</ul>

				</div>
			</div><!-- #content -->
		</div><!-- #container -->

<?php get_footer(); ?>

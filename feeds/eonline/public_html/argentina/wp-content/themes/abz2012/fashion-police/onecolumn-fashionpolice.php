<?php
	include(TEMPLATEPATH."/var_constantes.php");

	/**
	 * Template Name: FASHION POLICE 2013
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
	get_header(); 

	$playerID="2688314797001";
	$playerKey="AQ~~,AAAAFpR_2Jk~,FZYC7qwaTWO-q80Lp1hR8rX-uYpCl7IG";
	$rutaURL="http://la.eonline.com/experience/fashion-police-arg/";
?>

			<div id="content" role="main">
			<div class="cont_one-clumn" style="height: auto;">
				
							<div class="dostercios">

								<div class="modulo_fashion_arriba">
									<?include("addthis.php");?>
								</div>
								<div class="modulo_fashion">
									<iframe src="<?=$rutaURL?>index.php" width="630" height="520" scrolling="no" style="overflow: hidden"></iframe>
								</div>
								
							</div>
							<div class="untercio">
								<div class="titulo_fashion"></div>
								<div class="video_fashion">
									<div style="display:none"></div>
									<object id="myExperience" class="BrightcoveExperience">
									<param name="bgcolor" value="#FFFFFF" />
									<param name="width" value="300" />
									<param name="height" value="340" />
									<param name="playerID" value="<?=$playerID?>" />
									<param name="playerKey" value="<?=$playerKey?>" />
									<param name="isVid" value="true" />
									<param name="isUI" value="true" />
									<param name="dynamicStreaming" value="true" />
									<param name="wmode" value="opaque" />
									</object>
									<script type="text/javascript">brightcove.createExperiences();</script>
									<!-- End of Brightcove Player -->								
								</div>
								<div class="bannerFashion">
									<?php echo quien_es("300","250","1");?>
								</div>

							</div>

			</div>
			</div><!-- #content -->

<?php get_footer(); ?>
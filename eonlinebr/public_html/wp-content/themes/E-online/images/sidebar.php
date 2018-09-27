<?php
/**
 * The Sidebar containing the primary and secondary widget areas.
 *
 * @package WordPress
 * @subpackage Twenty_Ten
 * @since Twenty Ten 1.0
 */
?>

		<div id="primary" class="widget-area" role="complementary">
		<div class="cont_sidebar">
						<ul class="xoxo">
						<img src="<?php echo home_url( '/' ); ?>wp-content/themes/E-online/images/comunes/videos.gif" width="300" height="50" border="0" alt="">
						<!-- Start of Brightcove Player -->
						<object id="flashObj" width="300" height="254" classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=9,0,47,0"><param name="movie" value="http://c.brightcove.com/services/viewer/federated_f9?isVid=1" /><param name="bgcolor" value="#FFFFFF" /><param name="flashVars" value="@videoPlayer=589218135001&playerID=594129161001&playerKey=AQ%2E%2E,AAAAiStgdAk%2E,-dKmynbzLSpjfMGavnR9Ndx92eQTNfAV&domain=embed&dynamicStreaming=true" /><param name="base" value="http://admin.brightcove.com" /><param name="seamlesstabbing" value="false" /><param name="allowFullScreen" value="true" /><param name="swLiveConnect" value="true" /><param name="allowScriptAccess" value="always" /><embed src="http://c.brightcove.com/services/viewer/federated_f9?isVid=1" bgcolor="#FFFFFF" flashVars="@videoPlayer=589218135001&playerID=594129161001&playerKey=AQ%2E%2E,AAAAiStgdAk%2E,-dKmynbzLSpjfMGavnR9Ndx92eQTNfAV&domain=embed&dynamicStreaming=true" base="http://admin.brightcove.com" name="flashObj" width="300" height="254" seamlesstabbing="false" type="application/x-shockwave-flash" allowFullScreen="true" swLiveConnect="true" allowScriptAccess="always" pluginspage="http://www.macromedia.com/shockwave/download/index.cgi?P1_Prod_Version=ShockwaveFlash"></embed></object>
						</ul>
			<ul class="xoxo">

<?php
	/* When we call the dynamic_sidebar() function, it'll spit out
	 * the widgets for that widget area. If it instead returns false,
	 * then the sidebar simply doesn't exist, so we'll hard-code in
	 * some default sidebar stuff just in case.
	 */
	if ( ! dynamic_sidebar( 'primary-widget-area' ) ) : ?>
	
			<li id="search" class="widget-container widget_search">
				<?php //get_search_form(); ?>
			</li>

			<li id="archives" class="widget-container">
				<h3 class="widget-title"><?php _e( 'Archives', 'twentyten' ); ?></h3>
				<ul>
					<?php wp_get_archives( 'type=monthly' ); ?>
				</ul>
			</li>

			<li id="meta" class="widget-container">
				<h3 class="widget-title"><?php _e( 'Meta', 'twentyten' ); ?></h3>
				<ul>
					<?php wp_register(); ?>
					<li><?php wp_loginout(); ?></li>
					<?php wp_meta(); ?>
				</ul>
			</li>

		<?php endif; // end primary widget area ?>
			</ul>
		<?php 	$color_fondo="344a61";?>
		<?php 	$archivo_widget="widget";?>
		<?php if ( is_category( "alfombraroja" ) ){$color_fondo="6d5928";$archivo_widget="widget_alfombra";$ad="_alfombra";}?>
		</div>
			<ul class="xoxo">
			<IMG SRC="<?php echo home_url( '/' ); ?>wp-content/themes/E-online/images/twitter/header<?=$ad?>.gif" WIDTH="300" HEIGHT="53" BORDER="0" ALT="">
				<script src="<?php echo home_url( '/' ); ?>wp-content/themes/E-online/<?=$archivo_widget?>.js"></script>
				<script>
				new TWTR.Widget({
				  version: 2,
				  type: 'list',
				  rpp: 30,
				  interval: 6000,
				  width: 300,
				  height: 300,
				  theme: {
					shell: {
					  background: '#<?=$color_fondo?>',
					  color: '#ffffff'
					},
					tweets: {
					  background: '#ffffff',
					  color: '#a8a8a8',
					  links: '#073a73'
					}
				  },
				  features: {
					scrollbar: true,
					loop: false,
					live: true,
					hashtags: true,
					timestamp: true,
					avatars: true,
					behavior: 'all'
				  }
				}).render().setList('e_celebrity_la', 'test').start();
				</script>
			</ul>
		</div><!-- #primary .widget-area -->




<?php
	// A second sidebar for widgets, just because.
	if ( is_active_sidebar( 'secondary-widget-area' ) ) : ?>

		<div id="secondary" class="widget-area" role="complementary">
			<ul class="xoxo">
				<?php dynamic_sidebar( 'secondary-widget-area' ); ?>
			</ul>
		</div><!-- #secondary .widget-area -->

<?php endif; ?>


<div class="popular-posts " style="margin-top:8px;"><a href="<?php echo home_url( '/' ); ?>category/thetrend"><img src="<?php bloginfo('template_url')?>/images/cabezal_thetrend.jpg" alt="Cabezal The Trend"/></a></div>

<ul class="sidebar_300" style="display:block;margin-bottom:8px;">
	

	<?
	//EXTRAER the trends
	$thetrends = get_category_by_slug('thetrend');
	$ID_post_thetrends=$thetrends->term_id;
	$query_thetrends= "cat=$ID_post_thetrends&amp;orderby=date&amp;order=ASC"; //ordenacion ascendente por fecha

	query_posts($query_thetrends);
		
	$pt = 1; if (have_posts()) : the_post(); 

				// IMG POST
				$Html = get_the_content();
				//exit("<br>".$Html);
				 $extrae = '/<img (.+?)>/';
				$extrae2 = '/<img .*SRC=["\']([^ ^"^\']*)["\']/';

			    // Extraemos todas las imágenes
			    preg_match_all( $extrae  , $Html , $matches );
			    $image = $matches[1][0];
				if($image){?>
				<style>
				.foto_thetrend img{
					width: 300px;
					height: auto;
				}
				</style>
                   <a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>" style="float:left;" class="foto_thetrend">
							<img <?php echo $image;?> alt="<?php the_title(); ?>" />
					</a>
					<div class="entry-content bg_darkgray" style="width: 284px; _width: 300px;float:left; margin-bottom:10px;">
						<span class="entry-text">
								<p style="text-transform:uppercase; color:<?php echo cat_color('thetrend');?>"><?php the_title(); ?></p>												
							</span>
						</div>
				<?
				$pt++; 
				}

	
	endif;
	wp_reset_query();
	?>
	
	
</ul>

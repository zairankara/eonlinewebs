<?if(!is_page()){?>
<div id="thetrendbox">

	<h3><a href="<?php echo home_url( '/' ); ?>category/thetrend"><img src="<?php bloginfo('template_url')?>/images/cabezal_thetrend.jpg" alt="Cabezal The Trend"/></a></h3>

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

			    $image_explode=explode("title",$image);
				$image_explode=$image_explode[0];
				//exit("<br>----------".$image_explode);

				if($image){?>
				
                   <a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>" class="foto_thetrend">
							<img <?php echo $image_explode;?> alt="<?php the_title(); ?>" title="<?php the_title(); ?>" width="293"/>
					</a>
					<div style="width: 284px;_width: 300px;margin-bottom:10px; background-color: rgb(38, 38, 38) !important;padding:8px;">
							<p class="entry-text" style="text-transform:uppercase; color:<?php echo cat_color('thetrend');?>"><?php the_title(); ?></p>												
					</div>
				<?
				$pt++; 
				}

	
	endif;
	wp_reset_query();
}
echo ("</div>");
?>
	
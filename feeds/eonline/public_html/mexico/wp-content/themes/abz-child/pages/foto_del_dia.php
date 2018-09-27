<?if(!is_page()){?>
	<h3 class="cab_sidebar_fotodeldia"><a href="#">FOTO DEL DIA</a></h3>

	<?
	$IDfoto_del_dia=IDfoto_del_dia;
	$query_foto= "cat=$IDfoto_del_dia&amp;orderby=date&amp;order=ASC"; //ordenacion ascendente por fecha

	query_posts($query_foto);
		
	$p = 1; if (have_posts()) : the_post(); 

				// IMG POST
				$Html = get_the_content();
				//exit("<br>".$Html);
				 $extrae = '/<img (.+?)>/';
				$extrae2 = '/<img .*SRC=["\']([^ ^"^\']*)["\']/';

			    // Extraemos todas las imágenes
			    preg_match_all( $extrae  , $Html , $matches );
			    $image = $matches[1][0];
				if($image){?>
				
					<a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>">
						<img <?php echo $image;?> class="img-responsive" alt="" title=""/>
					</a>
					<div class="entry-content" style="float:left; padding:8px;">
						<span class="entry-text">
							<p style="color:#01aef0;"><?php the_title(); ?></p>
						</span>
					</div>
				<?
				$p++; 
				}

	
	endif;
	wp_reset_query();
	?>
	

<?}?>

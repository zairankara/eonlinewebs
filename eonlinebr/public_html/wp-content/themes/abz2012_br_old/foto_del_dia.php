<div class="popular-posts "><h3 class="widget-title">FOTO DO DIA</h3></div>

<ul class="sidebar_300" style="display:block;">
	

	<?
	$IDfoto_del_dia=29064;
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
					<style>
					.foto_dia img{
						width: 300px;
						height: auto;
					}
					</style>
                   <a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>" style="float:left;" class="foto_dia">
							<img <?php echo $image;?> width="300" alt="" />
					</a>
					<div class="entry-content bg_darkgray" style="width: 284px; _width: 300px;float:left; margin-bottom:10px;">
						<span class="entry-text">
								<p style="text-transform:uppercase;"><?php the_title(); ?></p>												
							</span>
						</div>
				<?
				$p++; 
				}

	
	endif;
	wp_reset_query();
	?>
	
	
</ul>

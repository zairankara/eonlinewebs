<?if(is_category( "amamos-las-pelis" )){?>
	<div class="popular-posts "><h3 class="widget-title" style="text-transform:uppercase; color:<?php echo cat_color('amamos-las-pelis');?>">FOTO DEL DIA</h3></div>

<div id="fotodeldiaAmamos">
	<ul class="sidebar_300" style="display:block;margin-bottom:8px;">
		<?
		$querystring_meme= "tag=amamoslaspelis-foto-del-dia&showposts=1&order=DESC"; //ordenacion ascendente por fecha

		query_posts($querystring_meme);
			
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
						.foto_TAG img{
							width: 300px;
							height: auto;
						}
						</style>
		                   <a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>" style="float:left;" class="foto_TAG">
									<img <?php echo $image;?> alt="" />
							</a>
							<div class="entry-content bg_darkgray" style="width: 284px; _width: 300px;float:left; margin-bottom:10px;">
								<span class="entry-text">
										<p style="text-transform:uppercase; color:<?php echo cat_color('amamos-las-pelis');?>"><?php the_title(); ?></p>												
									</span>
								</div>
						<?
						$pt++; 
						}
		
		endif;
		wp_reset_query();
		?>
		
	</ul>
</div>
<?}?>
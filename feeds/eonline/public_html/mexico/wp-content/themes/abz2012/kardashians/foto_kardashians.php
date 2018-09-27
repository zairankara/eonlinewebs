<?php if(is_category("the-kardashians")){?>
	<h3 style="margin-top:8px;"><a href="<?php echo home_url( '/' ); ?>category/the-kardashians" class="widget-title" style="color:#FF9C00">THE KARDASHIANS TODAY´S PICS</a></h3>


	<ul class="sidebar_300" id="fotosKardashians" style="display:block;margin-bottom:8px;">
		<?
		$querystring_cat= "tag=fotodeldiakardashians&showposts=1&order=DESC"; //ordenacion ascendente por fecha

		query_posts($querystring_cat);
			
		if (have_posts()) : the_post(); 

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
									<p style="text-transform:uppercase; color:<?php echo cat_color('the-kardashians');?>"><?php the_title(); ?></p>												
								</span>
							</div>
					<?
					$pt++; 
					}

		
		endif;
		wp_reset_query();
		?>
		
		
	</ul>

<?}?>
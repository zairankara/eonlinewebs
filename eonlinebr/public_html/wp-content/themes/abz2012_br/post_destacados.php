<div id="clients" class="imperd">
	
	<div style="float:left; width:310px; ">
		<h3 id="titulo_imperdible">IMPERDÍVEL!</h3>
		
		<!-- banner imperdible -->
		<div style="float:right; background-color:#fff;width:170px; height:30px;">
				<? echo quien_es("170","30",NULL);?>
		</div>
		<!-- /banner imperdible -->
	</div>

	 <?
	$query= "cat=$IDimperdible&showposts=4&order=DESC"; //ordenacion ascendente por fecha
	query_posts($query);
		
	$p = 1; if (have_posts()) : while (have_posts()  && $p < 5) : the_post(); 

				// IMG POST
				$Html = get_the_content();
				//exit("<br>".$Html);
				//$extrae = '/<img (.+?)>/';
				//$extrae2 = '/<img .*SRC=["\']([^ ^"^\']*)["\']/';

			    // Extraemos todas las imágenes
			    //preg_match_all( $extrae  , $Html , $matches );
			    //$image = $matches[1][0];

		    	//$image2=explode("'", $image);
		    	//$image3=$image2[1];
		    	// OLD $image_ch_explode=sacar_img_con_src($Html);

			    $image_ch_explode=url_resize_2014($Html,80);
		    
				if($image_ch_explode){?>

					<div class="client-slice">
					
							<div class='imagen_post'>
								<a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><img <?php echo $image_ch_explode?> title="<?php the_title(); ?>" alt="<?php the_title(); ?>"/></a>
							</div>
							
							<div class='tit_post'>
								<a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a>
							</div>

					</div>
				<?
				$p++; 
				}

		endwhile;
	
	endif;
	wp_reset_query();
	?>
	
</div>
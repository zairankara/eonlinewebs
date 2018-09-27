<div id="clients" class="imperd" style="background-color: #fff;">
	
	<div style="float:left; width:310px; ">
		<h3><img src="<?=$var_con[100];?>images/palavra_especialista.jpg"></h3>
	</div>

	 <?
	$query= "tag=palavra-especialista&showposts=4&order=DESC"; //ordenacion ascendente por fecha
	query_posts($query);
		
	$p = 1; if (have_posts()) : while (have_posts()  && $p < 5) : the_post(); 

				// IMG POST
				$Html = get_the_content();

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

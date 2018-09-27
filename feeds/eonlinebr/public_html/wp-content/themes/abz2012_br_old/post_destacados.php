
<div id="clients">
	
	<div style="float:left; width:310px; ">
		<div class="titulo_modulo">IMPERDÍVEL!</div>
		
		<!-- banner imperdible -->
		<div style="float:right; background-color:#fff;width:170px; height:30px;">
			<script type='text/javascript'><!--// <![CDATA[
			    OA_show(132);
			// ]]> --></script><noscript><a target='_blank' href='http://adsrv01.eonlinelatinola.com/www/delivery/ck.php?n=802c3f9'><img border='0' alt='' src='http://adsrv01.eonlinelatinola.com/www/delivery/avw.php?zoneid=132&amp;n=802c3f9' /></a></noscript>
		</div>
		<!-- /banner imperdible -->
	</div>

	 <?
	 $query= "cat=$IDimperdible&amp;orderby=date&amp;order=ASC"; //ordenacion ascendente por fecha
	 query_posts($query);
		
	$p = 1; if (have_posts()) : while (have_posts()  && $p < 5) : the_post(); 

				// IMG POST
				$Html = get_the_content();
				//exit("<br>".$Html);
				 $extrae = '/<img (.+?)>/';
				$extrae2 = '/<img .*SRC=["\']([^ ^"^\']*)["\']/';

			    // Extraemos todas las imágenes
			    preg_match_all( $extrae  , $Html , $matches );
			    $image = $matches[1][0];
				if($image){?>

					<div class="client-slice">
					
							<div class='imagen_post'>
								<a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><img <?php echo $image;?> alt="" /></a>
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

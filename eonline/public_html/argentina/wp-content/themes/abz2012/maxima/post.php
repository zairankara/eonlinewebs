<h3 style="height:85px;"><a href="<?php echo home_url( '/' ); ?>category/princesa_maxima"><img src="<?php bloginfo('template_url')?>/maxima/cab_maxima.jpg" alt="maxima" title="maxima"/></a></h3>
<ul>
 <?
	 
	//EXTRAER
	$princesa_maxima = get_category_by_slug('princesa_maxima');
	$IDprincesa_maxima=$princesa_maxima->term_id;
	$query="cat=$IDprincesa_maxima&amp;orderby=date&amp;order=ASC"; //ordenacion ascendente por fecha
	query_posts($query);
		
	$p = 1; if (have_posts()) : while (have_posts()  && $p < 5) : the_post(); ?>
		<li><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><span class="wpp-post-title"><?php the_title(); ?></span></a></li>
		<?
		$p++; 
		
		endwhile;
	endif;
	wp_reset_query();
	?>
		
</ul>

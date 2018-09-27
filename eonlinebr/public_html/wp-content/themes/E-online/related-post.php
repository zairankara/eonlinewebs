<div style="margin:20px 5px 10px 5px; clear:both;">

	<?php 
	$tags = wp_get_post_tags($post->ID);

	if ($tags) {
		$tag_ids = array();
		foreach($tags as $individual_tag) $tag_ids[] = $individual_tag->term_id;
				$args=array(
				'tag__in' => $tag_ids,
				'post__not_in' => array($post->ID),
				'showposts'=>5, // Number of related posts that will be shown.
				'caller_get_posts'=>1
				);
		$my_query = new wp_query($args);
		
		echo '<div style="font-size: 14px; font-weight:bold;color:#bd0100;margin:5px 0; padding-bottom:10px; border-bottom:1px solid #dfdfdf;">Notícias Relacionadas</div><ul>';

		if($my_query->have_posts() ) {
			while ($my_query->have_posts()) {
					$my_query->the_post();
					?>
					<li style="margin:5px 0;">
						<a title="<?php the_title_attribute(); ?>" rel="bookmark" href="<?php the_permalink() ?>" style="text-decoration:none;"><?php the_title(); ?></a>
					</li>
			<?php
			}
		}else {
			//echo '<li>No hay contenidos relacionados';
			 echo("<li>N&acirc;o h&aacute; conte&uacute;do relacionado</li>");
		}

		echo '</li></ul>';
	}
	wp_reset_query();
	?>

</div>

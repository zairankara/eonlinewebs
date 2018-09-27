<div style="margin:20px 5px 0 5px; clear:both; border-top:1px solid #dfdfdf;">

	<?php 
	$tags = wp_get_post_tags($post->ID);

	if ($tags) {
		$tag_ids = array();
		foreach($tags as $individual_tag) $tag_ids[] = $individual_tag->term_id;
				$args=array(
				'tag__in' => $tag_ids,
				'post__not_in' => array($post->ID),
				'showposts'=>3, // Number of related posts that will be shown.
				'caller_get_posts'=>1
				);
		$my_query = new wp_query($args);
		
		echo '<div style="font-size: 14px; font-weight:bold;color:#bd0100;margin:8px 0; ">Notícias Relacionadas</div><ul>';

		if($my_query->have_posts() ) {
			while ($my_query->have_posts()) {
					$my_query->the_post();
					?>
					<li style="margin: 0; line-height:16px;">
						<a title="<?php the_title_attribute(); ?>" rel="bookmark" href="<?php the_permalink() ?>" style="text-decoration:none; font-size: 11px;"><?php the_title(); ?></a>
					</li>
			<?php
			}
		}else {
			echo '<li>NÃO HÁ CONTEÚDO RELACIONADO';
		}

		echo '</li></ul>';
	}
	wp_reset_query();
	?>

</div>
<div class="post_relacionados">

	<?php
	//echo $post->ID."-----";
	$tags = wp_get_post_tags($post->ID);
	//echo var_dump($tags)."-----";

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
		
		echo '<h3 class="titulo_modulo">Notas Relacionadas</h3><ul>';

		if($my_query->have_posts() ) {
			while ($my_query->have_posts()) {
					$my_query->the_post();?>
					<li>
						<a title="<?php the_title_attribute(); ?>" rel="bookmark" href="<?php the_permalink() ?>" style="text-decoration:none;"><?php the_title(); ?></a>
					</li>
			<?php
			}
		}else {
			echo '<li>No hay contenidos relacionados';
		}

		echo '</li></ul>';
	}
	wp_reset_query();
	?>

</div>
<?
require_once($_SERVER [ 'DOCUMENT_ROOT'].'/argentina/wp-config.php');


//para poner en el loop, muestra 5 titulos de post relacionados con la primera tag del post actual
$tags = wp_get_post_tags($post->ID);
if ($tags) {
  echo 'Post relacionados';
  $first_tag = $tags[0]->term_id;
  $args=array(
    'tag__in' => array($first_tag),
    'post__not_in' => array($post->ID),
    'showposts'=>5,
    'caller_get_posts'=>1
   );
  $my_query = new WP_Query($args);
  if( $my_query->have_posts() ) {
    while ($my_query->have_posts()) : $my_query->the_post(); ?>
      <p><a href="<?php the_permalink() ?>" rel="bookmark" title="Enlace permanente a <?php the_title_attribute(); ?>"><?php the_title(); ?></a></p>
      <?php
    endwhile;
  }
}
?>


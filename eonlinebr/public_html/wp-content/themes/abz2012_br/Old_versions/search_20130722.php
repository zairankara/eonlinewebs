<?php
/**
 * The template for displaying Search Results pages.
 *
 * @package WordPress
 * @subpackage Twenty_Ten
 * @since Twenty Ten 1.0
 */

get_header(); ?>

		<div id="container">
			<div id="content" role="main">
			<div class="cont_blanco">
				<?
				// Check the query variable is available
				global $wpdb; // If not, global it so it can be read from
				$term = $_GET["s"];
				//$term = "Beyonc&eacute;";
				//$term1= htmlentities(htmlspecialchars(htmlentities($term, ENT_COMPAT | ENT_HTML401, "UTF-8")));
				$term2=htmlentities($_GET["s"], ENT_QUOTES, "UTF-8");
				$posts=$wpdb->get_results("SELECT * FROM wp_posts WHERE 1=1 
					AND (wp_posts.post_title LIKE '%".$term2."%')
					AND (wp_posts.post_password = '') 
					AND wp_posts.post_type IN ('post', 'page', 'attachment') 
					AND (wp_posts.post_status = 'publish') 
					ORDER BY wp_posts.post_date DESC LIMIT 0, 16");

				//echo($wpdb->last_query);

				$c = 0;
				$cz = 1; 
				if(count($posts) > 0) // equivalent to have_posts()
				{
					foreach($posts as $post) // equivalent to while(have_posts())
					{
						setup_postdata($post); 
						if($cz < 12){
							include (TEMPLATEPATH . '/post.php');
							
							$c++;
							$cz++; 
						}//echo '<option value="'.$post->ID.'">"'.$post->post_title.'" By: '.get_usermeta($post->post_author, 'last_name').', '.get_usermeta($post->post_author, 'first_name').' - Published: '.substr($post->post_date,0,10).'</option>';
					}
				}else {?>
								<div id="post-0" class="post no-results not-found">
									<h2 class="entry-title"><?php _e( 'Não foram encontrados resultados ', 'twentyten' ); ?></h2>
									<div class="entry-content">
										<p><?php _e( 'Desculpe, mas não encontramos o que você está procurando. Por favor, tente palavras-chave diferentes.', 'twentyten' ); ?></p>
										<?php get_search_form(); ?>
									</div><!-- .entry-content -->
								</div><!-- #post-0 -->
				<?php } ?>
			</div>
			</div><!-- #content -->
		</div><!-- #container -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>

<?php
/**
 * Template for displaying pages
 * 
 * @package bootstrap-basic
 */

get_header();

/**
 * determine main column size from actived sidebar
 */
$main_column_size = bootstrapBasicGetMainColumnSize();
?> 
<?php //get_sidebar('left'); ?> 
				<div class="col-md-8 content-area" id="main-column">
					<main id="main" class="site-main" role="main">
						<!--<aside class="grid effect-5" id="grid" >-->
							<?php
						while (have_posts()) {
							the_post();

							get_template_part('content', 'page');

							echo "\n\n";
							
							// If comments are open or we have at least one comment, load up the comment template
							/*if (comments_open() || '0' != get_comments_number()) {
								comments_template();
							}*/

							echo "\n\n";

						} //endwhile;
						?>
						<!--</aside>-->
					</main>
				</div>
<?php get_sidebar('right'); ?> 
<?php get_footer(); ?> 
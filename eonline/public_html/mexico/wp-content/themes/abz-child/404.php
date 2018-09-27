<?php get_header(); ?> 

				<div class="col-md-12 content-area" id="main-column">
					<main id="main" class="site-main" role="main">
						<section class="error-404 not-found">
							<header class="page-header">
								<h1 class="page-title"><?php _e('Oops! No pudimos encontrar su contenido. Intente nuevamente', 'bootstrap-basic'); ?></h1>
							</header><!-- .page-header -->

							<div class="page-content">
								<p><?php _e('It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'bootstrap-basic'); ?></p>

								<!--search form-->
								<form class="form-horizontal" method="get" action="<?php echo esc_url(home_url('/')); ?>" role="form">
									<div class="form-group">
										<div class="col-xs-10">
											<input type="text" name="s" value="<?php echo esc_attr(get_search_query()); ?>" placeholder="<?php echo esc_attr_x('Buscar &hellip;', 'placeholder', 'bootstrap-basic'); ?>" title="<?php echo esc_attr_x('Buscar &hellip;', 'label', 'bootstrap-basic'); ?>" class="form-control" />
										</div>
										<div class="col-xs-2">
											<button type="submit" class="btn btn-default"><?php _e('Buscar', 'bootstrap-basic'); ?></button>
										</div>
									</div>
								</form>

								<div class="row">
									<div class=" col-sm-6 col-md-9">
										<?php the_widget('WP_Widget_Recent_Posts'); ?> 
									</div>

									<div class=" col-sm-6 col-md-3">
										<?php the_widget('WP_Widget_Tag_Cloud'); ?> 
									</div>
								</div>
							</div><!-- .page-content -->
						</section><!-- .error-404 -->
					</main>
				</div>

<?php get_footer(); ?> 
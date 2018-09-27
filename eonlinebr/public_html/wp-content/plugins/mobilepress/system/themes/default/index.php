<?php get_header(); ?>
		
		<div id="contentwrap">
		
			<div id="infoblock">
			
				<h2>&Uacute;ltimas noticias</h2>
			
			</div>
			
			<?php $access_key = 1; ?>
			<?php if (have_posts()): while (have_posts()): the_post(); ?>
			
			<div class="post">

				<h2 class="title"><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" accesskey="<?php echo $access_key; $access_key++; ?>"><?php the_title(); ?></a></h2>
				<p class="subtitle"><?php the_time('j M Y') ?>. <a href="<?php the_permalink(); ?><?php mopr_check_permalink(); ?>comments=true"><?php comments_number('0 Comentarios', '1 Comentario', '% Comentarios' ); ?></a></p>
			</div>
			
			<?php endwhile; else: ?>
			
			<h2>Page Not Found</h2>
			<p>Sorry, The page you are looking for cannot be found!</p>
			
			<?php endif; ?>
			
			<?php if (mopr_check_pagination()): ?>
			
			<div id="indexpostfoot">
				<p><?php posts_nav_link(' &#183; ', 'Proxima pagina', 'Proxima pagina'); ?></p>
			</div>
			
			<?php endif; ?>
			
			<div id="pageblock">
			
				<h2>Tambien en E! Onlinelatino</h2>
			
			</div>
			
			<div class="page">
				
				<ol id="pages">
					<?php wp_list_categories('title_li='); ?>
				</ol>
				
			</div>
			
		</div>
		
<?php get_footer(); ?>

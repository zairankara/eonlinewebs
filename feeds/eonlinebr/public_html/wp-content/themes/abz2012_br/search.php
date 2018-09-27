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
				//echo("<br>ORIGINAL: ".$term2);
				/*
				//  BUSCADOR 
				$vec_elem=array();
				$vec_elem=explode(' ', $term2);
				//print_r($vec_elem);
				if(count($vec_elem)>1)
				{
					foreach($vec_elem as $elem)
					{
						if($WHERE)
						{
							$WHERE.=" OR wp_posts.post_title LIKE '%".$elem."%'";
						}else{
							$WHERE=" wp_posts.post_title LIKE '%".$elem."%'";
						}
					}
					$sql=$WHERE;

				 }
				 else{
					$sql="wp_posts.post_title LIKE '%".$term2."%'";
				 }
				 */
				$sql="wp_posts.post_title LIKE '%".$term2."%'"; //busqueda literal
				 $query="SELECT * FROM wp_posts WHERE 1=1 
					AND ($sql)
					AND (wp_posts.post_password = '') 
					AND wp_posts.post_type IN ('post', 'page', 'attachment') 
					AND (wp_posts.post_status = 'publish') 
					";

					$maxregistros=10;
					if($_GET["pageId"]>"1"){
						$desde=($_GET["pageId"]*10)-10;
						$hasta=$_GET["pageId"]*10;
					}else{
						$desde=0;
						$hasta=10;
					}

				
				//echo("offset".$offset);

				$latestposts = $wpdb->get_results( $query . " ORDER BY wp_posts.post_date DESC LIMIT ".$desde.", ".$maxregistros."" );
				$cantidad_posts=$wpdb->num_rows;

				//if($_GET["abz"]==1) echo("15:15--".$wpdb->last_query);
				//if($_GET["abz"]==1) echo("Cantidad_posts: ".$cantidad_posts);

				$c = 0;
				$cz = 1; 
				if(count($latestposts) > 0) // equivalent to have_posts()
				{
					foreach ($latestposts as $post) {
					   setup_postdata($post); 
					   include (TEMPLATEPATH . '/post.php');
					   $c++;
						$cz++; 
					}
				}else {?>
								<div id="post-0" class="post no-results not-found">
									<h2 class="entry-title"><?php _e( 'Não foram encontrados resultados ', 'twentyten' ); ?></h2>
									<div class="entry-content">
										<p><?php _e( 'Desculpe, mas não encontramos o que você está procurando. Por favor, tente palavras-chave diferentes.', 'twentyten' ); ?></p>
										<?php get_search_form(); ?>
									</div><!-- .entry-content -->
								</div><!-- #post-0 -->
				<?}?>
				
			</div>
				<div id="nav-below" class="navigation">

							<?
							$page_actual=$_GET["pageId"];

							if($page_actual<=1 || $page_actual==""){
								$proxpag=$page_actual+1;?>
								<div class="nav-next"><a href="<? echo "http://" . $_SERVER['HTTP_HOST'] . "/?s=".$_GET["s"]."&pageId=2"?>">+ Notícias</a></div>
							<?}else{
								$proxpag=$page_actual+1;
								$antpag=$page_actual-1;?>
								<div class="nav-previous"><a href="<? echo "http://" . $_SERVER['HTTP_HOST'] . "?s=".$_GET["s"]."&pageId=".$antpag.""?>">+ Voltar</a></div>
								<?if($cantidad_posts==10){?><div class="nav-next"><a href="<? echo "http://" . $_SERVER['HTTP_HOST'] . "/?s=".$_GET["s"]."&pageId=".$proxpag.""?>">+ Notícias</a></div><?}?>
							<?}?>
				</div>
			</div><!-- #content -->
		</div><!-- #container -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>


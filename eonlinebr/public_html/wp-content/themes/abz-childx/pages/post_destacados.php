<style>
article#imperdible {
	background-color: #3a5063;
    color: #ebd913;
    padding: 10px !important;
    font-family: "Oswald", "Arial Narrow", Sans-Serif;
    text-rendering: optimizeLegibility;
    font-size: 18px;
    line-height: 1.23;
    font-weight: 100;
    letter-spacing: 0.22;
    margin-right: 10px;
    width: calc(33.333% - 10px);
}
h3#titulo_imperdible{
	font-size: 24px;
    color: #ebd913;
    background-color: #1a212b;
    margin-top: 0;
    padding: 10px;
}
h3#titulo_imperdible a{
    color: #13c1eb;
}
article#imperdible .client-slice {
    float: left;
    width: 100%;
    padding: 10px 0;
    border-bottom: 1px solid #ccc;
}
article#imperdible .client-slice:last-child {
    border-bottom: none;
}
article#imperdible .client-slice {
    float: left;
    width: 100%;
    padding: 10px 0;
    border-bottom: 1px solid #ccc;
}
article#imperdible .client-slice .imagen_post {
    float: left;
    width: 80px;
    height: 60px;
    overflow: hidden;
}
article#imperdible .client-slice .tit_post {
    float: left;
    margin-left: 10px;
    width: 190px;
}
article#imperdible .client-slice .tit_post a{
	        color: #ebd913;
}
</style>

<article id="imperdible" class="col-sm-4 col-xs-12 grid-item">
	<h3 id="titulo_imperdible"><a href="/category/imperdivel/" title="Ver todas las entradas en Imperdible" rel="category tag" style="text-decoration:none;">IMPERDÍVEL!</a></h3>
	 <?
	query_posts( 'category_name=imperdivel&posts_per_page=5&orderby=date&order=DESC' );
	$p=1;
	while ( have_posts() ) : the_post();
			// IMG POST
			$Html = get_the_content();
	    	$image3=sacar_img_con_src($Html);
	    	$image_ch_explode_resize=url_resize($Html,80);

			
			if($image3){?>

					<div class="client-slice">
					
						<div class='imagen_post'>
							<a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><img src="<?php echo $image_ch_explode_resize;?>" width="80" alt="<?php the_title(); ?>" title="<?php the_title(); ?>" /></a>
						</div>
						
						<div class='tit_post'>
							<a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a>
						</div>

					</div>
			<?
			$p++; 
			}

	endwhile;
	
	wp_reset_query();
	?>
	
</article>
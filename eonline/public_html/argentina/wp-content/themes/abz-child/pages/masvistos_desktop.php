<h3 style="margin:10px 0;">MÁS LEÍDAS</h3>
<div id="mas_leidas" class="JSONdesktop">
	<div class="popular-posts">

		<?php
		foreach ($mas_leidos as $key) {

			$mas_leidas_titulo_explode = explode("|", $key[0]);
			$mas_leidas_titulo = $mas_leidas_titulo_explode[0];
			$mas_leidas_url = $key[1];
			$mas_leidas_image = $key[5];

			$image_ch_explode_resize = url_resize_sola($mas_leidas_image,420);
			?>

				<div class="client-slice col-md-12 col-sm-6 col-xs-12">

					<div class='imagen_post'>
						<a href="<?php echo $mas_leidas_url;?>" title="<?php echo $mas_leidas_titulo;?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><img src="<?php echo $image_ch_explode_resize;?>" alt="<?php echo $mas_leidas_titulo;?>" title="<?php echo $mas_leidas_titulo;?>" class="img-responsive" /></a>
					</div>

					<div class='tit_post'>
						<a href="<?php echo $mas_leidas_url;?>" title="<?php echo $mas_leidas_titulo;?>"><?php echo $mas_leidas_titulo;?></a>
					</div>

				</div>

		<?php }?>

	</div>
</div>
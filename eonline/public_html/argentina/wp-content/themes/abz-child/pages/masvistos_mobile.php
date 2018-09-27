<div id="mas_leidas_mobile">

	<?php
	foreach ($mas_leidos as $key) {

		$mas_leidas_titulo_explode = explode("|", $key[0]);
		$mas_leidas_titulo = $mas_leidas_titulo_explode[0];
		$mas_leidas_url = $key[1];
		$mas_leidas_image = $key[5];

		$image_ch_explode_resize = url_resize_sola($mas_leidas_image,130);
		?>


			<div class="media" style="width: 100%;">
				<div class="media-left">
				    <a href="<?php echo $mas_leidas_url;?>" title="<?php echo $mas_leidas_url;?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>">
				      <img class="media-object img-rounded" src="<?php echo $image_ch_explode_resize;?>" alt="Mas Leidas E!">
				    </a>
				</div>
				<div class="media-body">
				    <a href="<?php echo $mas_leidas_url;?>" title="<?php echo $mas_leidas_titulo;?>">
				    	<h4 class="media-heading"><?php echo $mas_leidas_titulo;?></h4>
				   </a>
				</div>
			</div>

			<?
		
	}?>

</div>
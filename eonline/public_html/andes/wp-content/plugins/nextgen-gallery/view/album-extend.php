<?php if (!defined ('ABSPATH')) die ('No direct access allowed'); ?>
<?php if (!empty ($galleries)) : ?>

		<?if($_GET["albumID"]==""){?>

			<div class="ngg-albumoverview">	

				<?php if ( is_page( "fotos-andes" ) ) {?>
					<p style="color:#000;"><?php echo ucwords($album->name) ?></p>
				<?php } ?>

				<!-- List of galleries -->
				<?php
				$cant=1;
				foreach ($galleries as $gallery) : 

						$vecUrl=explode("http://",$gallery->previewurl);
						$vecLink=explode("=",$gallery->pagelink);


				        if($vecUrl[2]=="")
				        {
				                $urlImg=$gallery->previewurl;
				        }else{
				                $urlImg="http://".$vecUrl[2];
								$gallery->title=utf8_encode($gallery->title);
				        }
					

						if ($cant < 4) : ?>
							<div class="ngg-album">
									<div class="ngg-albumcontent">
										<div class="ngg-thumbnail">
											<a href="/andes/galerias/?gallery=<?php echo $vecLink[2]; ?>"><img class="Thumb" src="<?php echo $urlImg; ?>" alt="<?php echo $gallery->title; ?>" title="<?php echo $gallery->title; ?>"/></a>
											<div class="ngg-albumtitle"><a href="/andes/galerias/?gallery=<?php echo $vecLink[2]; ?>"><?php echo $gallery->title; ?></a></div>
										</div>

										<div class="ngg-description">
										<p><?php echo $gallery->galdesc ?></p>
										<?php if ($gallery->counter > 0) : ?>
										<!-- <p><strong><?php echo $gallery->counter ?></strong> <?php _e('Photos', 'nggallery') ?></p> -->
										<?php endif; ?>
									</div>
								</div>
							</div>
						<?php 
						$cant++;
						endif; 

				endforeach; ?>
			 	
				
				<div style="clear:both; float:right;width:80px;"><a href="fotos-andes/?albumID=<?php echo $album->id ?>" style=" font-size:11px; text-decoration:none;">Ver más</a></div>


				<!-- Pagination -->
			 	<?php echo $pagination ?>
			 	
			</div>
			
		<?}else{?>

			<?if($album->id==$_GET["albumID"]){?>
				<div class="ngg-albumoverview">	

				<?php if ( is_page( "fotos-andes" ) ) {?>
					<p>FOTOS / <span style="color:#000;"><?php echo ucwords($album->name) ?></span></p>
				<?php } ?>

				<!-- List of galleries -->
				<?php
				$cant=1;
				foreach ($galleries as $gallery) : 

						$vecUrl=explode("http://",$gallery->previewurl);
						$vecLink=explode("=",$gallery->pagelink);


				        if($vecUrl[2]=="")
				        {
				                $urlImg=$gallery->previewurl;
				        }else{
				                $urlImg="http://".$vecUrl[2];
								$gallery->title=utf8_encode($gallery->title);
				        }
					
				        ?>
							<div class="ngg-album">
									<div class="ngg-albumcontent">
										<div class="ngg-thumbnail">
											<a href="/andes/galerias/?gallery=<?php echo $vecLink[3]; ?>"><img class="Thumb" src="<?php echo $urlImg; ?>"  alt="<?php echo $gallery->title; ?>" title="<?php echo $gallery->title; ?>"/></a>
											<div class="ngg-albumtitle"><a href="/andes/galerias/?gallery=<?php echo $vecLink[3]; ?>"><?php echo $gallery->title; ?></a></div>
										</div>

										<div class="ngg-description">
										<p><?php echo $gallery->galdesc ?></p>
										<?php if ($gallery->counter > 0) : ?>
										<!-- <p><strong><?php echo $gallery->counter ?></strong> <?php _e('Photos', 'nggallery') ?></p> -->
										<?php endif; ?>
									</div>
								</div>
							</div>
						<?php 

				endforeach; ?>

				<div style="clear:both; float:right;width:80px;"><a href="fotos-andes/" style=" font-size:11px; text-decoration:none;">Volver</a></div>


				<!-- Pagination -->
			 	<?php echo $pagination ?>
			 	
				</div>
			<?}?>

		<?}?>

<?php endif; ?>

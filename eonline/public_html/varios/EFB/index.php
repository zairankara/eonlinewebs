						<aside id="efashionfotos" class="widget">

							<h3 class="cab_sidebar_efb"><a href="<?php bloginfo('url')?>/category/efashionblogger" class="widget-title">E! FASHION BLOGGER</a></h3>

							<div class="slides_container_EFB">

								<?
								$gallery="7538";

								global $wpdb;

								$galleries = obtener_galerias($gallery, "10", "pg.orden", "ASC", NULL);
								foreach($galleries as $image)
								{?>

										<?
										$urlImg=$image["filename"];
										$vecUrl=explode("http://",$image["filename"]);
										$title=$image["title"];
										$title_gal=$image["title_gal"];

										if($vecUrl[1]=="")
										{
												$urlImg=$var_con[1].$image["path"]."/".$image["filename"];
										}else{
												$urlImg="http://".$vecUrl[1];
										}
										$urlImg=url_resize_sola($urlImg,360);
										?>
										<div class="slide"><a href="<?php bloginfo('url')?>/pagina/galerias/?gallery=<?=$gallery?>"><img src data-src="<?=$urlImg;?>" alt="<?=$title?>" title="<?=$title?>" class="img-responsive owl-lazy load" /></a></div>

								<?}?>

							</div>
							<!-- / slider -->

						</aside>
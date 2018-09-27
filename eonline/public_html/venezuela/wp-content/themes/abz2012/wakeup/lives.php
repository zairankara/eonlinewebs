					<!-- LIVESTREAMING-->
						<?
						$var_feed=$var_con[0];
						$mydb2 = new wpdb('eonline_usr','30nl1n3','eonline_argentina','preprodabzdb');
						$abmLivesRows = $mydb2->get_var("SELECT ls_".$var_feed." FROM abmLives WHERE NOW()>=desde AND NOW()<=hasta");
						$abmLivesRows2 = $mydb2->get_var("SELECT lt_".$var_feed." FROM abmLives WHERE NOW()>=desde AND NOW()<=hasta");
						$abmLivesRows_url = $mydb2->get_var("SELECT url FROM abmLives WHERE NOW()>=desde AND NOW()<=hasta");
						$abmLivesRows_is_category = $mydb2->get_var("SELECT is_category FROM abmLives WHERE NOW()>=desde AND NOW()<=hasta");
						$abmLivesRows_url=str_replace("home.php", "home_vz.php", $abmLivesRows_is_category);

						
						if($abmLivesRows2==1){
							if($abmLivesRows==1){
								$_SESSION["liveT"]="ch";
							}else{
								$_SESSION["liveT"]="gr";
							}	
						}

						if($abmLivesRows==1 && $abmLivesRows_is_category=="wakeup"){?>
							<div style="margin-left:20px; margin-top:10px; margin-bottom:10px; width:620px; height:400px;border:5px solid #000;">
								<iframe src="<?=$abmLivesRows_url?>?f=4" width="615" height="400" scrolling="no" frameborder="0" allowtransparency="allowtransparency"></iframe>
							</div>
						
						<?}?>
					<!-- / LIVESTREAMING-->
							
					<!-- LIVETWEETING-->
						<?if ($i==0 && $_SESSION["liveT"]=="gr" && $abmLivesRows_is_category=="wakeup"){?>
							    <div style="margin-left:20px; margin-top:10px; margin-bottom:10px; width:620px; height:260px; background: #E4E4E4 url(http://la.eonline.com/argentina/wp-content/themes/abz2012/images/ultimas_noticias.jpg) no-repeat bottom; border:5px solid #000;">
										 <div style="margin:5px 0; width:440px; height:250px; overflow:hidden;"><iframe src="http://la.eonline.com/argentina/wp-content/themes/abz2012/tweets.php" width="440" height="250" scrolling="no" frameborder="0" allowtransparency="allowtransparency" style="width: 440px !important;"></iframe></div>
								</div>
						<?}?>
					<!-- / LIVETWEETING-->
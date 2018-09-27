					<!-- LIVESTREAMING !-->
						<?
						$var_feed=$var_con[0];
						$mydb2 = new wpdb('eonline_usr','30nl1n3','eonline_argentina','preprodabzdb');
						$abmLivesRows = $mydb2->get_var("SELECT ls_".$var_feed." FROM abmLives WHERE NOW()>=desde AND NOW()<=hasta");
						$abmLivesRows2 = $mydb2->get_var("SELECT lt_".$var_feed." FROM abmLives WHERE NOW()>=desde AND NOW()<=hasta");
						$abmLivesRows_url = $mydb2->get_var("SELECT url_vz FROM abmLives WHERE 1");
						$abmLivesRows_is_category = $mydb2->get_var("SELECT is_category FROM abmLives WHERE 1");
						$height = $mydb2->get_var("SELECT height FROM abmLives WHERE 1");
						$desarrollo = $mydb2->get_var("SELECT desarrollo FROM abmLives WHERE 1");
						
						if(!empty($_SERVER['HTTP_CLIENT_IP'])) {
						    $ip=$_SERVER['HTTP_CLIENT_IP'];
						} elseif(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
						    $ip=$_SERVER['HTTP_X_FORWARDED_FOR'];
						} else {
						    $ip=$_SERVER['REMOTE_ADDR'];
						}

						if($desarrollo==1 && ($ip=="190.111.232.51" || $ip=="200.68.75.9" || $ip=="181.167.9.227")){
							$abmLivesRows=1;
							$abmLivesRows2=1;
						}

						if($abmLivesRows2==1){
							if($abmLivesRows==1){
								$_SESSION["liveT"]="ch";
							}else{
								$_SESSION["liveT"]="gr";
							}	
						}

						/*echo("Desarrollo :".$desarrollo);
						echo("<br>ip: ".$ip);
						echo("<br>abmLivesRows :".$abmLivesRows);
						echo("<br>abmLivesRows2: ".$abmLivesRows2);
						echo("<br>abmLivesRows_is_category :".$abmLivesRows_is_category);
						echo("<br>abmLivesRows_url: ".$abmLivesRows_url);*/

						//comentar nuevamente a las 21hs PROVISORIO!
						//echo($abmLivesRows."_".$desarrollo);
						//$abmLivesRows=1;
						//$abmLivesRows_is_category=="home";
						
						if($abmLivesRows==1 && $abmLivesRows_is_category=="home"){?>
							<div style="margin-left:20px; margin-top:10px; margin-bottom:10px; width:620px; height:<?=$height+10;?>px;border:5px solid #000;">
								<iframe src="<?=$abmLivesRows_url?>?f=1" width="615" height="<?=$height?>" scrolling="no" frameborder="0" allowtransparency="allowtransparency"></iframe>
							</div>
						
						<?}?>
					<!-- / LIVESTREAMING-->
							
					<!-- LIVETWEETING-->
						<?if (is_home() && $i==0 && $_SESSION["liveT"]=="gr" && $abmLivesRows_is_category=="home"){?>
							    <div style="margin-left:20px; margin-top:10px; margin-bottom:10px; width:620px; height:440px; background: #E4E4E4 url(http://la.eonline.com/argentina/wp-content/themes/abz2012/images/ultimas_noticias.jpg) no-repeat bottom; border:5px solid #000;">
										 <div style="margin:5px 0; width:440px; height:430px; overflow:hidden;"><iframe src="http://la.eonline.com/experience/redcarpetseason/oscar2014/timeline.php" width="440" height="430" scrolling="no" frameborder="0" allowtransparency="allowtransparency" style="width: 440px !important;"></iframe></div>
								</div>
						<?}?>
					<!-- / LIVETWEETING-->

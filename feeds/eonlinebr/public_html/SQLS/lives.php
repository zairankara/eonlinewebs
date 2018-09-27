					<!-- LIVESTREAMING-->
						<?
						function noCache() {
							header("Expires: Tue, 01 Jul 2001 06:00:00 GMT");
							header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
							header("Cache-Control: no-store, no-cache, must-revalidate");
							header("Cache-Control: post-check=0, pre-check=0", false);
							header("Pragma: no-cache");
						}
						noCache();

						$dbname="eonline_argentina";
						$dbhost="preprodabzdb";
						$dbuser="eonline_usr";
						$dbpass="30nl1n3";

						$chandle = mysql_connect($dbhost, $dbuser, $dbpass);
						if (!$chandle){
							$error = msg_error_conexion;
						}else{
							$db_selected= mysql_select_db($dbname, $chandle);
							if (!$db_selected) {
								$error = msg_error_conexion;
							}
						}
						$var_feed="99";

						$query = mysql_query("SELECT ls_".$var_feed." FROM abmLives WHERE NOW()>=desde AND NOW()<=hasta");
						$row = mysql_fetch_array($query);
						$abmLivesRows=$row[0];

						$query2 = mysql_query("SELECT lt_".$var_feed." FROM abmLives WHERE NOW()>=desde AND NOW()<=hasta");
						$row2 = mysql_fetch_array($query2);
						$abmLivesRows2=$row2[0];

						$query3 = mysql_query("SELECT url_br FROM abmLives WHERE 1");
						$row3 = mysql_fetch_array($query3);
						$abmLivesRows_url=$row3[0];

						$query4 = mysql_query("SELECT is_category FROM abmLives WHERE 1");
						$row4 = mysql_fetch_array($query4);
						$abmLivesRows_is_category=$row4[0];
						if($abmLivesRows_is_category=="alfombraroja")$abmLivesRows_is_category="tapetevermelho";

						$query5 = mysql_query("SELECT height FROM abmLives WHERE 1");
						$row5 = mysql_fetch_array($query5);
						$height=$row5[0];

						$query6 = mysql_query("SELECT desarrollo FROM abmLives WHERE 1");
						$row6 = mysql_fetch_array($query6);
						$desarrollo=$row6[0];

						$query7 = mysql_query("SELECT glamcam, glamcam_active FROM abmLives WHERE 1");
						$row7 = mysql_fetch_array($query7);


						$query8 = mysql_query("SELECT ls_mobile_br, lt_mobile_br FROM abmLives WHERE 1");
						$row8 = mysql_fetch_array($query8);
						
						if(!empty($_SERVER['HTTP_CLIENT_IP'])) {
						    $ip=$_SERVER['HTTP_CLIENT_IP'];
						} elseif(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
						    $ip=$_SERVER['HTTP_X_FORWARDED_FOR'];
						} else {
						    $ip=$_SERVER['REMOTE_ADDR'];
						}

						if($desarrollo==1 && $ip=="190.111.232.51"){
							$abmLivesRows=1;
							$abmLivesRows2=1;
						}


						if($row8["ls_mobile_br"]==0 && $_GET["varMobile"]==1 && $abmLivesRows=1){
							$abmLivesRows=0;
						}
						if($row8["lt_mobile_br"]==0 && $_GET["varMobile"]==1 && $abmLivesRows2=1){
							$abmLivesRows2=0;
						}


						if($_GET["testlive"]!=""){
							$abmLivesRows=1;
							$abmLivesRows2=1;
						}
						if($abmLivesRows2==1){
								$_SESSION["liveT"]="ch";
								echo ("<script>window.sessionStorage.setItem('ch', '1');</script>");
						}

						if($row7["glamcam_active"]==1) $glamcam=$row7["glamcam"];

						$postSlug=$_GET["Slug"];

						if ($abmLivesRows==1 && $abmLivesRows_is_category==$postSlug){?>
							<div style="margin-left:20px; margin-top:10px; margin-bottom:10px; width:620px; height:<?=$height+10;?>px;border:5px solid #000;">
								<iframe src="<?=$abmLivesRows_url?>?f=<?=$var_feed?>" width="615" height="<?=$height?>" scrolling="no" frameborder="0" allowtransparency="allowtransparency"></iframe>
							</div>
						<?}?>
					<!-- / LIVESTREAMING-->

					<!-- LIVETWEETING-->
						<?if ($abmLivesRows2==1 && $abmLivesRows_is_category==$postSlug && $_SESSION["liveT"]=="gr"){?>
							    <div style="margin-left:20px; margin-top:10px !important; margin-bottom:10px; width:620px; height:440px; background: url(http://la.eonline.com/varios/assets/red_carpet/livestreaming.png) no-repeat; border:5px solid #000; background-size: contain;">
										 <iframe src="http://br.eonline.com/experience/redcarpetseason/oscar2014/timeline.php" width="440" height="430" scrolling="no" frameborder="0" allowtransparency="allowtransparency" style="width: 70% !important;"></iframe>
								</div>
						<?}?>
					<!-- / LIVETWEETING-->

						<!-- glamcam 360-->
						<?if ($abmLivesRows==1 && $glamcam!="" && $abmLivesRows_is_category==$postSlug){?>
							<div style="margin-left:20px; margin-top:10px; margin-bottom:10px; width:620px; height:620px;border:5px solid #000;background: #000;">
									<iframe src="<?=$glamcam?>" width="610" height="610" scrolling="no" frameborder="0" allowtransparency="allowtransparency"></iframe>
							</div>
						<?}?>
					<!-- / glamcam 360-->

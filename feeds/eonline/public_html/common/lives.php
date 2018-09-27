					<!-- LIVESTREAMING-->
						<?

						/*function noCache() {
							header("Expires: Tue, 01 Jul 2001 06:00:00 GMT");
							header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
							header("Cache-Control: no-store, no-cache, must-revalidate");
							header("Cache-Control: post-check=0, pre-check=0", false);
							header("Pragma: no-cache");
						}
						noCache();*/

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
						if($_GET["var_feed"]!=""){
							$var_feed=$_GET["var_feed"];
						}else{
							$var_feed=$_POST["var_feed"];
						}

						if($_GET["varMobile"]!=""){
							$varMobile=$_GET["varMobile"];
						}else{
							$varMobile=$_POST["varMobile"];
						}


						
						switch ($var_feed) {
							case 1:
								$siglas="an";
								break;
							case 2:
								$siglas="ar";
								break;
							case 3:
								$siglas="mx";
								break;
							case 4:
								$siglas="vz";
								break;
							default:
								# code...
								break;
						}

						$query = mysql_query("SELECT ls_".$var_feed." FROM abmLives WHERE NOW()>=desde AND NOW()<=hasta");
						$row = mysql_fetch_array($query);
						$abmLivesRows=$row[0];

						$query2 = mysql_query("SELECT lt_".$var_feed." FROM abmLives WHERE NOW()>=desde AND NOW()<=hasta");
						$row2 = mysql_fetch_array($query2);
						$abmLivesRows2=$row2[0];

						$query3 = mysql_query("SELECT url_".$siglas." FROM abmLives WHERE 1");
						$row3 = mysql_fetch_array($query3);
						$abmLivesRows_url=$row3[0];

						$query4 = mysql_query("SELECT is_category FROM abmLives WHERE 1");
						$row4 = mysql_fetch_array($query4);
						$abmLivesRows_is_category=$row4[0];

						$query5 = mysql_query("SELECT height FROM abmLives WHERE 1");
						$row5 = mysql_fetch_array($query5);
						$height=$row5[0];

						$query6 = mysql_query("SELECT desarrollo FROM abmLives WHERE 1");
						$row6 = mysql_fetch_array($query6);
						$desarrollo=$row6[0];

						$query7 = mysql_query("SELECT glamcam, glamcam_active FROM abmLives WHERE 1");
						$row7 = mysql_fetch_array($query7);

						$query8 = mysql_query("SELECT ls_mobile_la, lt_mobile_la FROM abmLives WHERE 1");
						$row8 = mysql_fetch_array($query8);
						
						if(!empty($_SERVER['HTTP_CLIENT_IP'])) {
						    $ip=$_SERVER['HTTP_CLIENT_IP'];
						} elseif(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
						    $ip=$_SERVER['HTTP_X_FORWARDED_FOR'];
						} else {
						    $ip=$_SERVER['REMOTE_ADDR'];
						}
						//if($desarrollo==1 && ($ip=="190.111.232.51" || $ip=="200.68.75.9" || $ip=="181.167.9.227" || $ip=="200.63.162.6")){
						if($desarrollo==1 && $ip=="190.111.232.51"){
							$abmLivesRows=1;
							$abmLivesRows2=1;
						}

						if($row8["ls_mobile_la"]==0 && $varMobile==1 && $abmLivesRows=1){
							$abmLivesRows=0;
						}
						if($row8["lt_mobile_la"]==0 && $varMobile==1 && $abmLivesRows2=1){
							$abmLivesRows2=0;
						}

						if($_GET["testlive"]!="" || $_POST["testlive"]!=""){
							$abmLivesRows=1;
							$abmLivesRows2=1;
						}
						if($abmLivesRows2==1){
								$_SESSION["liveT"]="ch";
								echo ("<script>window.sessionStorage.setItem('ch', '1');</script>");

						}

						if($row7["glamcam_active"]==1) $glamcam=$row7["glamcam"];


						if($_GET["Slug"]!=""){
							$postSlug=$_GET["Slug"];
						}else{
							$postSlug=$_POST["Slug"];
						}

						if ($abmLivesRows==1 && $abmLivesRows_is_category==$postSlug){?>
							<style type="text/css">
							#content_lives{margin-left:15px; margin-top:10px; margin-bottom:10px; width:635px; height:<?=$height+10;?>px;border:5px solid #000;}
							</style>
							<div id="content_lives">
								<iframe src="<?=$abmLivesRows_url?>?f=<?=$var_feed?>" width="625" height="<?=$height?>" scrolling="no" frameborder="0" allowtransparency="allowtransparency"></iframe>
							</div>
						<?}?>
					<!-- / LIVESTREAMING-->

					<!-- LIVETWEETING-->
						<?if ($abmLivesRows2==1 && $abmLivesRows_is_category==$postSlug && $_SESSION["liveT"]=="gr"){?>
							    <div style="margin-left:20px; margin-top:10px !important; margin-bottom:10px; width:620px; height:440px; background: url(http://la.eonline.com/varios/assets/red_carpet/livestreaming.png) no-repeat; border:5px solid #000; background-size: contain;">
										 <!--<iframe src="http://la.eonline.com/experience/redcarpetseason/oscar2014/timeline.php" width="440" height="430" scrolling="no" frameborder="0" allowtransparency="allowtransparency" style="width: 70% !important;"></iframe>-->
										 <iframe src="http://la.eonline.com/experience/live_fromE/timeline.php" width="440" height="430" scrolling="no" frameborder="0" allowtransparency="allowtransparency" style="width: 70% !important;"></iframe>
								</div>
						<?}?>
					<!-- / LIVETWEETING-->

					<!-- glamcam 360-->
						<?if ($glamcam!="" && $abmLivesRows_is_category==$postSlug){?>
							<div style="margin-left:20px; margin-top:10px; margin-bottom:10px; width:620px; height:620px;border:5px solid #000;background: #000;">
									<iframe src="<?=$glamcam?>" width="610" height="610" scrolling="no" frameborder="0" allowtransparency="allowtransparency"></iframe>
							</div>
						<?}?>
					<!-- / glamcam 360-->

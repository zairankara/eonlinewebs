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

						$query = mysql_query("SELECT ls_".$var_feed." FROM abmLiveFromE WHERE NOW()>=desde AND NOW()<=hasta");
						$row = mysql_fetch_array($query);
						$abmLivesRows=$row[0];

						$query3 = mysql_query("SELECT url_".$siglas." FROM abmLiveFromE WHERE 1");
						$row3 = mysql_fetch_array($query3);
						$abmLivesRows_url=$row3[0];

						$query5 = mysql_query("SELECT height FROM abmLiveFromE WHERE 1");
						$row5 = mysql_fetch_array($query5);
						$height=$row5[0];

						$query2 = mysql_query("SELECT videoID FROM abmLiveFromE WHERE 1");
						$row2= mysql_fetch_array($query2);
						$videoID=$row2[0];

						$query4 = mysql_query("SELECT is_category FROM abmLiveFromE WHERE 1");
						$row4 = mysql_fetch_array($query4);
						$abmLivesRows_is_category=$row4[0];

						$query6 = mysql_query("SELECT desarrollo FROM abmLiveFromE WHERE 1");
						$row6 = mysql_fetch_array($query6);
						$desarrollo=$row6[0];

						$query77 = mysql_query("SELECT brightcove_youtube FROM abmLiveFromE WHERE 1");
						$row77= mysql_fetch_array($query77);
						$brightcove_youtube=$row77[0];

						$query88 = mysql_query("SELECT youtubeURL FROM abmLiveFromE WHERE 1");
						$row88= mysql_fetch_array($query88);
						$youtubeURL=$row88[0];

						
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
						}

						if($_GET["testlive"]!="" || $_POST["testlive"]!=""){

							$abmLivesRows=1;
						}

									
						if($abmLivesRows==1){
							$_SESSION["liveT"]="ch";
							echo ("<script>window.sessionStorage.setItem('chliveFromE', '1');</script>");
						}else{
							$_SESSION["liveT"]="gr";
						}	

						if($_GET["Slug"]!=""){
							$postSlug=$_GET["Slug"];
						}else{
							$postSlug=$_POST["Slug"];
						}
						
						$variables="&brightcove_youtube=".$brightcove_youtube."&videoID=".$videoID."&youtubeURL=".$youtubeURL;


						if ($abmLivesRows==1 && $abmLivesRows_is_category==$postSlug){?>
							<div style="margin-left:20px; margin-top:10px; margin-bottom:10px; width:620px; height:<?=$height+10;?>px;border:5px solid #000;">
								<iframe src="<?=$abmLivesRows_url?>?f=<?=$var_feed?><?=$variables?>" width="620" height="<?=$height?>" scrolling="no" frameborder="0" allowtransparency="allowtransparency"></iframe>
							</div>
						<?}?>
					<!-- / LIVESTREAMING-->

					<!-- picture in picture-->

						<?if ($abmLivesRows==1 && $abmLivesRows_is_category!=$postSlug){
							if(strpos($abmLivesRows_url, 'andes.php') !== false) {
								$new_url=str_replace('andes.php', 'pictureinpicture.php', $abmLivesRows_url);
							}elseif(strpos($abmLivesRows_url, 'argentina.php') !== false) {
								$new_url=str_replace('argentina.php', 'pictureinpicture.php', $abmLivesRows_url);
							}elseif(strpos($abmLivesRows_url, 'mexico.php') !== false) {
								$new_url=str_replace('mexico.php', 'pictureinpicture.php', $abmLivesRows_url);
							}elseif(strpos($abmLivesRows_url, 'venezuela.php') !== false) {
								$new_url=str_replace('venezuela.php', 'pictureinpicture.php', $abmLivesRows_url);
							}

							?>
							<style>#iframe_picture{width:300px; height:270px;border:5px solid rgba(0, 0, 0, .6);
							    -webkit-background-clip: padding-box; /* for Safari */
							    background-clip: padding-box; /* for IE9+, Firefox 4+, Opera, Chrome */
							    background:#fff; position:fixed; z-index:1000000; bottom:57px;left:15px;}
							    .bot_up{position:fixed; z-index:1000001;bottom: 300px; left: 300px;cursor: pointer;}</style>
							<div id="iframe_picture">
								<div class="bot_up"><img src="http://la.eonline.com/experience/live_fromE/close_button.png"/></div>
								<iframe src="<?=$new_url?>?f=<?=$var_feed?><?=$variables?>" width="300" height="270" scrolling="no" frameborder="0" allowtransparency="allowtransparency"></iframe>
							</div>
						<?}?>
					<!-- picture in picture-->

					<script>
						$(".bot_up").click(function(){
							$("#iframe_picture").remove();
						});
					</script>
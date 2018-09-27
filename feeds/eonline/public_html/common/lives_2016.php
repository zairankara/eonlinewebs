						<?php
		                $host="preprodabzdb";
                        $dbname="eonline_argentina";
                        $username="eonline_usr";
                        $password="30nl1n3";

                        $dsn = 'mysql:dbname='.$dbname.';host='.$host;

						try {
							$conection = new PDO($dsn,$username,$password);
						} catch (PDOException $e) {
							echo "Fallo de conexion ".$e->getMessage();
						}

						if($_GET["var_feed"]!=""){
							$var_feed=$_GET["var_feed"];
						}else{
							$var_feed=$_POST["var_feed"];
						}
						if($var_feed!=""){

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

						
	                        $query = $conection->query("SELECT ls_".$var_feed." FROM abmLives WHERE NOW()>=desde AND NOW()<=hasta");
	                        $fetch = $query->fetch();
	                        $abmLivesRows=$fetch[0];

	             
							$query2 = $conection->query("SELECT lt_".$var_feed." FROM abmLives WHERE NOW()>=desde AND NOW()<=hasta");
							$fetch2 = $query2->fetch(2);
							$abmLivesRows2=$fetch2[0];
	                        
							
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

							

							if($_GET["testlive"]!="" || $_POST["testlive"]!=""){
								$abmLivesRows=1;
								$abmLivesRows2=1;
							}
							if($abmLivesRows2==1){
									//$_SESSION["liveT"]="ch";
									//echo ("<script>window.sessionStorage.setItem('ch', '1');</script>");
							}

							if( $abmLivesRows==1  ||  $abmLivesRows2==1 ){

	                            $query3 = $conection->query("SELECT url_".$siglas." FROM abmLives WHERE 1");
	                            $fetch3 = $query3->fetch();
	                            $abmLivesRows_url=$fetch3[0];

	                            $query4 = $conection->query("SELECT is_category FROM abmLives WHERE 1");
	                            $fetch4 = $query4->fetch();
	                            $abmLivesRows_is_category=$fetch4[0];

	                            $query5 = $conection->query("SELECT height FROM abmLives WHERE 1");
	                            $fetch5 = $query5->fetch();
	                            $height=$fetch5[0];

	                            $query6 = $conection->query("SELECT desarrollo FROM abmLives WHERE 1");
	                            $fetch6 = $query6->fetch();
	                            $desarrollo=$fetch6[0];

	                            $query7 = $conection->query("SELECT glamcam, glamcam_active FROM abmLives WHERE 1");
	                            $fetch7 = $query7->fetch();

	                            $query8 = $conection->query("SELECT ls_mobile_la, lt_mobile_la FROM abmLives WHERE 1");
	                            $fetch8 = $query8->fetch();

	                            $query2 = $conection->query("SELECT videoID FROM abmLives WHERE 1");
                                $row2 = $query2->fetch();
                                $videoID = $row2[0];
                               
                                $query77 = $conection->query("SELECT brightcove_youtube FROM abmLives WHERE 1");
                                $row77 = $query77->fetch();
                                $brightcove_youtube = $row77[0];

                                $query88 = $conection->query("SELECT youtubeURL FROM abmLives WHERE 1");
                                $row88 = $query88->fetch();
                                $youtubeURL = $row88[0];

                                $variables="&brightcove_youtube=".$brightcove_youtube."&videoID=".$videoID."&youtubeURL=".$youtubeURL;
	                        }
	                        if($fetch8["ls_mobile_la"]==0 && $varMobile==1 && $abmLivesRows=1){
	                        	$abmLivesRows=0;
	                        }
	                        if($fetch8["lt_mobile_la"]==0 && $varMobile==1 && $abmLivesRows2=1){
	                        	$abmLivesRows2=0;
	                        }


							if($fetch7["glamcam_active"]==1) $glamcam=$fetch7["glamcam"];


							if($_GET["Slug"]!=""){
								$postSlug=$_GET["Slug"];
							}else{
								$postSlug=$_POST["Slug"];
							}

							if ($abmLivesRows==1 && $abmLivesRows_is_category==$postSlug){?>
						        <div id="content_lives" class="embed-responsive embed-responsive-16by9"><iframe src="<?php echo $abmLivesRows_url?>?f=<?php echo $var_feed;?><?php echo $variables?>" scrolling="no" class=\"embed-responsive-item\" frameborder="0" allowtransparency="allowtransparency"></iframe></div>
							<?}?>

 
	                    <?}?>

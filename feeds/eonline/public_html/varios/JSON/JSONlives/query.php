						<?php
						if($_GET["var_feed"]!=""){
							$var_feed=$_GET["var_feed"];
						}else{
							$var_feed=2;
						}
						if($var_feed!=""){

							if($_GET["varMobile"]!=""){
								$varMobile=$_GET["varMobile"];
							}else{
								$varMobile=0;
							}

							if($_GET["Slug"]!=""){
								$postSlug=$_GET["Slug"];
							}else{
								$postSlug=$_POST["Slug"];
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

							//LIVESTREAMING
									$url_lives = 'live.json';
							        $contents_lives = file_get_contents($url_lives);
							        $json_str_lives = utf8_encode($contents_lives);
							        
							        $live = json_decode($json_str_lives,true);
							        /*echo '<pre>';
							                var_dump($live);
							        echo '<pre>';*/

							        //$live[""];

									$desde = $live["desde2"];
							        $hasta = $live["hasta2"];
							        $ls = $live["ls_".$var_feed];
							        $abmLivesRows_url = $live["url_".$siglas];
							        $ls_mobile_la = $live["ls_mobile_la"];
							        $abmLivesRows_is_category = $live["is_category"];
							        $hoy_completo = date("YmdHis");

							        if($ls==1 && $hoy_completo>=$desde && $hoy_completo<=$hasta){
										$abmLivesRows=1;
							        }else{
							        	$abmLivesRows=0;
							        }

							        /*echo ("ACA: ".$abmLivesRows);
							        echo ("<br>ls: ".$ls);
							        echo ("<br>hoy_completo: ".$hoy_completo);
							        echo ("<br>desde: ".$desde);
							        echo ("<br>hasta: ".$hasta);*/

									if($_GET["testliveS"]!="" || $_POST["testliveS"]!=""){
										$abmLivesRows=1;
									}

									/*if( $abmLivesRows==1 ){
										echo ("<br>url: ".$url);
										echo ("<br>ls_mobile_la: ".$ls_mobile_la);
										echo ("<br>is_category: ".$abmLivesRows_is_category);
									}*/

									if($ls_mobile_la==0 && $varMobile==1 && $abmLivesRows=1){
			                        	$abmLivesRows=0;
			                        }
								
									if ($abmLivesRows==1 && $abmLivesRows_is_category==$postSlug){?>
								        <div id="content_lives" class="embed-responsive embed-responsive-16by9"><iframe src="<?php echo $abmLivesRows_url?>" scrolling="no" class=\"embed-responsive-item\" frameborder="0" allowtransparency="allowtransparency"></iframe></div>
									<?php }?>

							
							<?php
							//LIVE FROM E!
									$url_livefromE = 'liveFromE.json';
							        $contents_livefromE = file_get_contents($url_livefromE);
							        $json_str_livefromE = utf8_encode($contents_livefromE);
							        
							        $livefromE = json_decode($json_str_livefromE,true);

							        echo '<pre>';
							            var_dump($livefromE);
							        echo '<pre>';

 							?>

	                    <?php }?>

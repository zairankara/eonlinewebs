                        <?
                         error_reporting(E_ALL);
 ini_set("display_errors", 1);
                        /*function noCache() {
                            header("Expires: Tue, 01 Jul 2001 06:00:00 GMT");
                            header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
                            header("Cache-Control: no-store, no-cache, must-revalidate");
                            header("Cache-Control: post-check=0, pre-check=0", false);
                            header("Pragma: no-cache");
                        }
                        noCache();*/

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

                            $query = $conection->query("SELECT ls_".$var_feed." FROM abmLiveFromE WHERE NOW()>=desde AND NOW()<=hasta");
                            $fetch = $query->fetch();
                            $abmLivesRows=$fetch[0];


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
                            
                            if( $abmLivesRows==1) {


                                $query3 = $conection->query("SELECT url_" . $siglas . " FROM abmLiveFromE WHERE 1");
                                $row3 = $query3->fetch();
                                $abmLivesRows_url = $row3[0];


                                $query5 = $conection->query("SELECT height FROM abmLiveFromE WHERE 1");
                                $row5 = $query5->fetch();
                                $height = $row5[0];

                                $query2 = $conection->query("SELECT videoID FROM abmLiveFromE WHERE 1");
                                $row2 = $query2->fetch();
                                $videoID = $row2[0];

                                $query4 = $conection->query("SELECT is_category FROM abmLiveFromE WHERE 1");
                                $row4 = $query4->fetch();
                                $abmLivesRows_is_category = $row4[0];

                                $query6 = $conection->query("SELECT desarrollo FROM abmLiveFromE WHERE 1");
                                $row6 = $query6->fetch();
                                $desarrollo = $row6[0];

                                $query77 = $conection->query("SELECT brightcove_youtube FROM abmLiveFromE WHERE 1");
                                $row77 = $query77->fetch();
                                $brightcove_youtube = $row77[0];

                                $query88 = $conection->query("SELECT youtubeURL FROM abmLiveFromE WHERE 1");
                                $row88 = $query88->fetch();
                                $youtubeURL = $row88[0];

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
                                  <div id="content_livesFE" class="embed-responsive embed-responsive-16by9">
                                    <iframe src="<?=$abmLivesRows_url?>?f=<?=$var_feed;?><?=$variables?>" scrolling="no" class=\"embed-responsive-item\" frameborder="0" allowtransparency="allowtransparency"></iframe>
                                </div>
                            <?}?>


                            <?php
                            if ($abmLivesRows==1 && $abmLivesRows_is_category!=$postSlug){
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
                                <!-- picture in picture-->
                                <div id="iframe_picture">
                                    <div class="bot_up"><img src="http://la.eonline.com/experience/live_fromE/close_button.png"/></div>
                                    <iframe src="<?=$new_url?>?f=<?=$var_feed?><?=$variables?>" width="300" height="270" scrolling="no" frameborder="0" allowtransparency="allowtransparency"></iframe>
                                </div>
                                <!-- picture in picture-->
                                <script>
                                    jQuery(".bot_up").click(function(){
                                        jQuery("#iframe_picture").remove();
                                    });
                                 </script>
                            <?}
                        }?>

                    

	<?
	$cod_single="";
	$cod_slots="";
	$que_seccion_es="";
	$netDFP="8877";

	/*NEW*/
	$name_feedDFP=ucwords(NAMEFEED);
	$ConArray=conn_generico(IDFEED);
	/*NEW*/

	//EXTRAER IMPERDIBLE
	$imperdible = get_category_by_slug('imperdible');
	$IDimperdible=$imperdible->term_id;
	$IDfoto_del_dia=IDfoto_del_dia;

	//EXTRAER the trends
	$thetrends = get_category_by_slug('thetrend');
	$IDthetrends=$thetrends->term_id;

	if(is_home() || is_search()  || is_tag()){

				$name_sectionDFP="Homepage";
				$que_seccion_es="is_home";
				
				//query_posts("cat=-$IDimperdible,-$IDfoto_del_dia,-$IDthetrends");
				/*while ( have_posts() ) : the_post(); 
				$id_cod=get_the_ID();
				$cod_single.="googletag.defineSlot('/".$netDFP."/".$name_feedDFP."/Homepage/Patrocinio_post', [310, 30], 'div-gpt-ad-home-310x30-".$id_cod."').addService(googletag.pubads()).setTargeting('postid', ".$id_cod.");";
				endwhile;*/
					$cod_slots="googletag.defineSlot('/".$netDFP."/".$name_feedDFP."/Homepage/BoxBanner_1', [300, 250], 'div-gpt-ad-home-300x250-1').addService(googletag.pubads());
					googletag.defineSlot('/".$netDFP."/".$name_feedDFP."/Homepage/BoxBanner_2', [300, 250], 'div-gpt-ad-home-300x250-2').addService(googletag.pubads());
					googletag.defineSlot('/".$netDFP."/".$name_feedDFP."/Homepage/LeaderBoard', [728, 90], 'div-gpt-ad-home-728x90').addService(googletag.pubads());
					googletag.defineOutOfPageSlot('/".$netDFP."/".$name_feedDFP."/Homepage/Floating_3ros', 'div-gpt-ad-home-floating_3ros').addService(googletag.pubads());";

					$array_elem=execute_define("Homepage", $ConArray, NULL, $name_feedDFP, "Homepage", NULL, NULL);
					echo $array_elem;

				echo $cod_single;
	}elseif(is_404()){
				$name_sectionDFP="Homepage";
				$que_seccion_es="is_404";
							$cod_slots="googletag.defineSlot('/".$netDFP."/".$name_feedDFP."/Homepage/LeaderBoard', [728, 90], 'div-gpt-ad-home-728x90').addService(googletag.pubads());";

	}elseif(is_category() || is_single()){
				
				if(is_single()){

                    $name_sectionDFP="Nota";
                    $que_seccion_es="is_single";

                    $id_cod=get_the_ID();
                    $categorias="";
                    $cont=0;
                    foreach((get_the_category()) as $category) {
                         if ($cont==0) {$categorias.="[";};
                         $categorias.='"'.$category->slug.'",';
                         $envio_array[]=$category->slug;

                         $cont++;

                    }
                    //echo '---'. $cont;
                    if($cont>=1){
                        $categorias = trim($categorias, ',');
                        $categorias.="]";
                    }


					$array_elem=execute_define("Nota", $ConArray, $id_cod, $name_feedDFP, "Nota", $envio_array, NULL);
					echo $array_elem;

					$cod_slots="googletag.defineSlot('/".$netDFP."/".$name_feedDFP."/Nota/BoxBanner_1', [300, 250], 'div-gpt-ad-Post-300x250-1').addService(googletag.pubads());
					googletag.defineSlot('/".$netDFP."/".$name_feedDFP."/Nota/BoxBanner_2', [300, 250], 'div-gpt-ad-Post-300x250-2').addService(googletag.pubads());
					googletag.defineSlot('/".$netDFP."/".$name_feedDFP."/Nota/LeaderBoard', [728, 90], 'div-gpt-ad-Post-728x90').addService(googletag.pubads());
					googletag.defineOutOfPageSlot('/".$netDFP."/".$name_feedDFP."/Nota/Floating_3ros', 'div-gpt-ad-Post-floating_3ros').addService(googletag.pubads());
					googletag.pubads().setTargeting('postid', '".$id_cod."');";
                        

                   if($cont>=1) $cod_slots.="googletag.pubads().setTargeting('category_name', ".$categorias.");";

				}else{
			        $cat = get_term_by('name', single_cat_title('',false), 'category'); 
			        $postSlug=$cat->slug;
			        /*while ( have_posts() ) : the_post(); 
			          $id_cod=get_the_ID();
			          $cod_single.="googletag.defineSlot('/".$netDFP."/".$name_feedDFP."/Homepage/Patrocinio_post', [310, 30], 'div-gpt-ad-".$postSlug."-310x30-".$id_cod."').addService(googletag.pubads()).setTargeting('postid', ".$id_cod.");";
			        endwhile;*/
					
					$que_seccion_es="is_category-".$postSlug;

					switch($postSlug){
						case "enews":
							$name_sectionDFP="Enews";
							$cod_slots="googletag.defineSlot('/".$netDFP."/".$name_feedDFP."/Enews/BoxBanner_1', [300, 250], 'div-gpt-ad-enews-300x250-1').addService(googletag.pubads());
										googletag.defineSlot('/".$netDFP."/".$name_feedDFP."/Enews/BoxBanner_2', [300, 250], 'div-gpt-ad-enews-300x250-2').addService(googletag.pubads());
										googletag.defineSlot('/".$netDFP."/".$name_feedDFP."/Enews/LeaderBoard', [728, 90], 'div-gpt-ad-enews-728x90').addService(googletag.pubads());
										googletag.defineOutOfPageSlot('/".$netDFP."/".$name_feedDFP."/Enews/Floating_3ros', 'div-gpt-ad-enews-floating_3ros').addService(googletag.pubads());";
						break;
						case "imperdivel":
							$name_sectionDFP="Imperdivel";
							$cod_slots="googletag.defineSlot('/".$netDFP."/".$name_feedDFP."/Enews/BoxBanner_1', [300, 250], 'div-gpt-ad-imperdivel-300x250-1').addService(googletag.pubads());
										googletag.defineSlot('/".$netDFP."/".$name_feedDFP."/Enews/BoxBanner_2', [300, 250], 'div-gpt-ad-imperdivel-300x250-2').addService(googletag.pubads());
										googletag.defineSlot('/".$netDFP."/".$name_feedDFP."/Enews/LeaderBoard', [728, 90], 'div-gpt-ad-imperdivel-728x90').addService(googletag.pubads());
										googletag.defineOutOfPageSlot('/".$netDFP."/".$name_feedDFP."/Enews/Floating_3ros', 'div-gpt-ad-imperdivel-floating_3ros').addService(googletag.pubads());";
						break;
						case "amamos-cinema":
							$name_sectionDFP="Amamoslaspelis";
							$cod_slots="googletag.defineSlot('/".$netDFP."/".$name_feedDFP."/Enews/BoxBanner_1', [300, 250], 'div-gpt-ad-amamos-cinema-300x250-1').addService(googletag.pubads());
										googletag.defineSlot('/".$netDFP."/".$name_feedDFP."/Enews/BoxBanner_2', [300, 250], 'div-gpt-ad-amamos-cinema-300x250-2').addService(googletag.pubads());
										googletag.defineSlot('/".$netDFP."/".$name_feedDFP."/Enews/LeaderBoard', [728, 90], 'div-gpt-ad-amamos-cinema-728x90').addService(googletag.pubads());
										googletag.defineOutOfPageSlot('/".$netDFP."/".$name_feedDFP."/Amamoslaspelis/Floating_3ros', 'div-gpt-ad-amamos-cinema-floating_3ros').addService(googletag.pubads());";
						break;
						case "copa-do-mundo":
							$name_sectionDFP="Enews";
							$cod_slots="googletag.defineSlot('/".$netDFP."/".$name_feedDFP."/Enews/BoxBanner_1', [300, 250], 'div-gpt-ad-copa-do-mundo-300x250-1').addService(googletag.pubads());
										googletag.defineSlot('/".$netDFP."/".$name_feedDFP."/Enews/BoxBanner_2', [300, 250], 'div-gpt-ad-copa-do-mundo-300x250-2').addService(googletag.pubads());
										googletag.defineSlot('/".$netDFP."/".$name_feedDFP."/Enews/LeaderBoard', [728, 90], 'div-gpt-ad-copa-do-mundo-728x90').addService(googletag.pubads());
										googletag.defineOutOfPageSlot('/".$netDFP."/".$name_feedDFP."/Enews/Floating_3ros', 'div-gpt-ad-copa-do-mundo-floating_3ros').addService(googletag.pubads());";
						break;
						case "lol":
							$name_sectionDFP="Enews";
							$cod_slots="googletag.defineSlot('/".$netDFP."/".$name_feedDFP."/Enews/BoxBanner_1', [300, 250], 'div-gpt-ad-lol-300x250-1').addService(googletag.pubads());
										googletag.defineSlot('/".$netDFP."/".$name_feedDFP."/Enews/BoxBanner_2', [300, 250], 'div-gpt-ad-lol-300x250-2').addService(googletag.pubads());
										googletag.defineSlot('/".$netDFP."/".$name_feedDFP."/Enews/LeaderBoard', [728, 90], 'div-gpt-ad-lol-728x90').addService(googletag.pubads());
										googletag.defineOutOfPageSlot('/".$netDFP."/".$name_feedDFP."/Enews/Floating_3ros', 'div-gpt-ad-lol-floating_3ros').addService(googletag.pubads());";
						break;
						case "the-royals":
							$name_sectionDFP="The_Royals";
							$cod_slots="googletag.defineSlot('/".$netDFP."/".$name_feedDFP."/The_Royals/BoxBanner_1', [300, 250], 'div-gpt-ad-the-royals-300x250-1').addService(googletag.pubads());
										googletag.defineSlot('/".$netDFP."/".$name_feedDFP."/The_Royals/BoxBanner_2', [300, 250], 'div-gpt-ad-the-royals-300x250-2').addService(googletag.pubads());
										googletag.defineSlot('/".$netDFP."/".$name_feedDFP."/The_Royals/LeaderBoard', [728, 90], 'div-gpt-ad-the-royals-728x90').addService(googletag.pubads());";
						break;
						case "musica":
							$name_sectionDFP="Enews";
							$cod_slots="googletag.defineSlot('/".$netDFP."/".$name_feedDFP."/Enews/BoxBanner_1', [300, 250], 'div-gpt-ad-musica-300x250-1').addService(googletag.pubads());
										googletag.defineSlot('/".$netDFP."/".$name_feedDFP."/Enews/BoxBanner_2', [300, 250], 'div-gpt-ad-musica-300x250-2').addService(googletag.pubads());
										googletag.defineSlot('/".$netDFP."/".$name_feedDFP."/Enews/LeaderBoard', [728, 90], 'div-gpt-ad-musica-728x90').addService(googletag.pubads());";
						break;
						case "foto-del-dia-2":
							$name_sectionDFP="Enews";
							$cod_slots="googletag.defineSlot('/".$netDFP."/".$name_feedDFP."/Enews/BoxBanner_1', [300, 250], 'div-gpt-ad-foto-del-dia-2-300x250-1').addService(googletag.pubads());
										googletag.defineSlot('/".$netDFP."/".$name_feedDFP."/Enews/BoxBanner_2', [300, 250], 'div-gpt-ad-foto-del-dia-2-300x250-2').addService(googletag.pubads());
										googletag.defineSlot('/".$netDFP."/".$name_feedDFP."/Enews/LeaderBoard', [728, 90], 'div-gpt-ad-foto-del-dia-2-728x90').addService(googletag.pubads());";
						break;
						case "efashionblogger":
							$name_sectionDFP="EFashion_Blogger";
							$cod_slots="googletag.defineSlot('/".$netDFP."/".$name_feedDFP."/EFashion_Blogger/BoxBanner_1', [300, 250], 'div-gpt-ad-efashionblogger-300x250-1').addService(googletag.pubads());
										googletag.defineSlot('/".$netDFP."/".$name_feedDFP."/EFashion_Blogger/LeaderBoard', [728, 90], 'div-gpt-ad-efashionblogger-728x90').addService(googletag.pubads());
										googletag.defineOutOfPageSlot('/".$netDFP."/".$name_feedDFP."/EFashion_Blogger/Floating_3ros', 'div-gpt-ad-efashionblogger-floating_3ros').addService(googletag.pubads());";
						break;
						case "the-kardashians":
							$name_sectionDFP="Kardashians";
							$cod_slots="googletag.defineSlot('/".$netDFP."/".$name_feedDFP."/Kardashians/BoxBanner_1', [300, 250], 'div-gpt-ad-the-kardashians-300x250-1').addService(googletag.pubads());
										googletag.defineSlot('/".$netDFP."/".$name_feedDFP."/Kardashians/LeaderBoard', [728, 90], 'div-gpt-ad-the-kardashians-728x90').addService(googletag.pubads());
										googletag.defineOutOfPageSlot('/".$netDFP."/".$name_feedDFP."/Kardashians/Floating_3ros', 'div-gpt-ad-kardashians-floating_3ros').addService(googletag.pubads());";
						break;
						case "thetrend":
							$name_sectionDFP="The_Trend";
							$cod_slots="googletag.defineSlot('/".$netDFP."/".$name_feedDFP."/The_Trend/BoxBanner_1', [300, 250], 'div-gpt-ad-thetrend-300x250-1').addService(googletag.pubads());
										googletag.defineSlot('/".$netDFP."/".$name_feedDFP."/The_Trend/BoxBanner_2', [300, 250], 'div-gpt-ad-thetrend-300x250-2').addService(googletag.pubads());
										googletag.defineSlot('/".$netDFP."/".$name_feedDFP."/The_Trend/LeaderBoard', [728, 90], 'div-gpt-ad-thetrend-728x90').addService(googletag.pubads());
										googletag.defineOutOfPageSlot('/".$netDFP."/".$name_feedDFP."/The_Trend/Floating_3ros', 'div-gpt-ad-thetrend-floating_3ros').addService(googletag.pubads());";
						break;
						case "tapetevermelho":
							$name_sectionDFP="RedCarpet";
							$cod_slots="googletag.defineSlot('/".$netDFP."/".$name_feedDFP."/RedCarpet/BoxBanner_1', [300, 250], 'div-gpt-ad-tapetevermelho-300x250-1').addService(googletag.pubads());
										googletag.defineSlot('/".$netDFP."/".$name_feedDFP."/RedCarpet/BoxBanner_2', [300, 250], 'div-gpt-ad-tapetevermelho-300x250-2').addService(googletag.pubads());
										googletag.defineSlot('/".$netDFP."/".$name_feedDFP."/RedCarpet/LeaderBoard', [728, 90], 'div-gpt-ad-tapetevermelho-728x90').addService(googletag.pubads());
										googletag.defineOutOfPageSlot('/".$netDFP."/".$name_feedDFP."/RedCarpet/Floating_3ros', 'div-gpt-ad-tapetevermelho-floating_3ros').addService(googletag.pubads());";
						break;
						case "goldenglobe":
							$name_sectionDFP="RedCarpet/Golden_Globe_Awards";
							$cod_slots="googletag.defineSlot('/".$netDFP."/".$name_feedDFP."/RedCarpet/Golden_Globe_Awards/BoxBanner_1', [300, 250], 'div-gpt-ad-goldenglobe-300x250-1').addService(googletag.pubads());
										googletag.defineSlot('/".$netDFP."/".$name_feedDFP."/RedCarpet/Golden_Globe_Awards/BoxBanner_2', [300, 250], 'div-gpt-ad-goldenglobe-300x250-2').addService(googletag.pubads());
										googletag.defineSlot('/".$netDFP."/".$name_feedDFP."/RedCarpet/Golden_Globe_Awards/LeaderBoard', [728, 90], 'div-gpt-ad-goldenglobe-728x90').addService(googletag.pubads());";
						break;
						case "sag":
							$name_sectionDFP="RedCarpet/Sag_Awards";
							$cod_slots="googletag.defineSlot('/".$netDFP."/".$name_feedDFP."/RedCarpet/Sag_Awards/BoxBanner_1', [300, 250], 'div-gpt-ad-sag-300x250-1').addService(googletag.pubads());
										googletag.defineSlot('/".$netDFP."/".$name_feedDFP."/RedCarpet/Sag_Awards/BoxBanner_2', [300, 250], 'div-gpt-ad-sag-300x250-2').addService(googletag.pubads());
										googletag.defineSlot('/".$netDFP."/".$name_feedDFP."/RedCarpet/Sag_Awards/LeaderBoard', [728, 90], 'div-gpt-ad-sag-728x90').addService(googletag.pubads());";
						break;
						case "grammy":
							$name_sectionDFP="RedCarpet/Grammy_Awards";
							$cod_slots="googletag.defineSlot('/".$netDFP."/".$name_feedDFP."/RedCarpet/Grammy_Awards/BoxBanner_1', [300, 250], 'div-gpt-ad-grammy-300x250-1').addService(googletag.pubads());
										googletag.defineSlot('/".$netDFP."/".$name_feedDFP."/RedCarpet/Grammy_Awards/BoxBanner_2', [300, 250], 'div-gpt-ad-grammy-300x250-2').addService(googletag.pubads());
										googletag.defineSlot('/".$netDFP."/".$name_feedDFP."/RedCarpet/Grammy_Awards/LeaderBoard', [728, 90], 'div-gpt-ad-grammy-728x90').addService(googletag.pubads());";
						break;
						case "oscar":
							$name_sectionDFP="RedCarpet/Oscar_Awards";
							$cod_slots="googletag.defineSlot('/".$netDFP."/".$name_feedDFP."/RedCarpet/Oscar_Awards/BoxBanner_1', [300, 250], 'div-gpt-ad-oscar-300x250-1').addService(googletag.pubads());
										googletag.defineSlot('/".$netDFP."/".$name_feedDFP."/RedCarpet/Oscar_Awards/BoxBanner_2', [300, 250], 'div-gpt-ad-oscar-300x250-2').addService(googletag.pubads());
										googletag.defineSlot('/".$netDFP."/".$name_feedDFP."/RedCarpet/Oscar_Awards/LeaderBoard', [728, 90], 'div-gpt-ad-oscar-728x90').addService(googletag.pubads());";
						break;
						case "latinbillboard":
							$name_sectionDFP="RedCarpet/Latin_Billboard";
							$cod_slots="googletag.defineSlot('/".$netDFP."/".$name_feedDFP."/RedCarpet/Latin_Billboard/BoxBanner_1', [300, 250], 'div-gpt-ad-latinbillboard-300x250-1').addService(googletag.pubads());
										googletag.defineSlot('/".$netDFP."/".$name_feedDFP."/RedCarpet/Latin_Billboard/BoxBanner_2', [300, 250], 'div-gpt-ad-latinbillboard-300x250-2').addService(googletag.pubads());
										googletag.defineSlot('/".$netDFP."/".$name_feedDFP."/RedCarpet/Latin_Billboard/LeaderBoard', [728, 90], 'div-gpt-ad-latinbillboard-728x90').addService(googletag.pubads());";
						break;
						case "emmy":
							$name_sectionDFP="RedCarpet/Emmy_Awards";
							$cod_slots="googletag.defineSlot('/".$netDFP."/".$name_feedDFP."/RedCarpet/Emmy_Awards/BoxBanner_1', [300, 250], 'div-gpt-ad-emmy-300x250-1').addService(googletag.pubads());
										googletag.defineSlot('/".$netDFP."/".$name_feedDFP."/RedCarpet/Emmy_Awards/BoxBanner_2', [300, 250], 'div-gpt-ad-emmy-300x250-2').addService(googletag.pubads());
										googletag.defineSlot('/".$netDFP."/".$name_feedDFP."/RedCarpet/Emmy_Awards/LeaderBoard', [728, 90], 'div-gpt-ad-emmy-728x90').addService(googletag.pubads());
										googletag.defineOutOfPageSlot('/".$netDFP."/".$name_feedDFP."/RedCarpet/Emmy_Awards/Floating_3ros', 'div-gpt-ad-emmy-floating_3ros').addService(googletag.pubads());";
						break;
						case "e-shows":
							$name_sectionDFP="Eshows";
							$cod_slots="googletag.defineSlot('/".$netDFP."/".$name_feedDFP."/Eshows/LeaderBoard', [728, 90], 'div-gpt-ad-e-shows-728x90').addService(googletag.pubads());
										googletag.defineOutOfPageSlot('/".$netDFP."/".$name_feedDFP."/Eshows/Floating_3ros', 'div-gpt-ad-e-shows-floating_3ros').addService(googletag.pubads());";
						break;
						// FALTA DEFAULT HOME
					}

					$cod_dinamic=execute_define("Category", $ConArray, NULL, $name_feedDFP, $name_sectionDFP, NULL, $postSlug);
					echo $cod_dinamic;
				}
				echo $cod_single;

	}elseif(is_page()){
				$parent = get_page();
				$postSlug=$parent->post_name;
				//$postSlug="Page";
				switch($postSlug){
					case "glamcam360":
						$name_sectionDFP="Glamcam360";
						$cod_slots="googletag.defineSlot('/".$netDFP."/".$name_feedDFP."/Glamcam360/BoxBanner_1', [300, 250], 'div-gpt-ad-glamcam360-300x250-1').addService(googletag.pubads());
									googletag.defineSlot('/".$netDFP."/".$name_feedDFP."/Glamcam360/LeaderBoard', [728, 90], 'div-gpt-ad-glamcam360-728x90').addService(googletag.pubads());
									googletag.defineOutOfPageSlot('/".$netDFP."/".$name_feedDFP."/Glamcam360/Floating_3ros', 'div-gpt-ad-glamcam360-floating_3ros').addService(googletag.pubads());
									googletag.defineSlot('/".$netDFP."/".$name_feedDFP."/Glamcam360/Toppost', [630, 50], 'div-gpt-ad-glamcam360-630x50').addService(googletag.pubads());";
					break;
					case "eshows":
						$name_sectionDFP="Eshows";
						$cod_slots="googletag.defineSlot('/".$netDFP."/".$name_feedDFP."/Eshows/LeaderBoard', [728, 90], 'div-gpt-ad-eshows-728x90').addService(googletag.pubads());
									googletag.defineOutOfPageSlot('/".$netDFP."/".$name_feedDFP."/Eshows/Floating_3ros', 'div-gpt-ad-eshows-floating_3ros').addService(googletag.pubads());";
					break;
					case "iamcait":
						$name_sectionDFP="iamcait";
						$cod_slots="googletag.defineSlot('/".$netDFP."/".$name_feedDFP."/Enews/BoxBanner_1', [300, 250], 'div-gpt-ad-iamcait-300x250-1').addService(googletag.pubads());
									googletag.defineSlot('/".$netDFP."/".$name_feedDFP."/Enews/LeaderBoard', [728, 90], 'div-gpt-ad-iamcait-728x90').addService(googletag.pubads());
									googletag.defineOutOfPageSlot('/".$netDFP."/".$name_feedDFP."/Enews/Floating_3ros', 'div-gpt-ad-iamcait-floating_3ros').addService(googletag.pubads());";
					break;
					case "younger":
						$cod_slots="googletag.defineSlot('/".$netDFP."/".$name_feedDFP."/Enews/BoxBanner_1', [300, 250], 'div-gpt-ad-younger-300x250-1').addService(googletag.pubads());
									googletag.defineSlot('/".$netDFP."/".$name_feedDFP."/Enews/LeaderBoard', [728, 90], 'div-gpt-ad-younger-728x90').addService(googletag.pubads());
									googletag.defineOutOfPageSlot('/".$netDFP."/".$name_feedDFP."/Enews/Floating_3ros', 'div-gpt-ad-younger-floating_3ros').addService(googletag.pubads());";
					break;
					case "programas":
						$name_sectionDFP="Programacion";
						$cod_slots="googletag.defineSlot('/".$netDFP."/".$name_feedDFP."/Programacion/LeaderBoard', [728, 90], 'div-gpt-ad-programas-728x90').addService(googletag.pubads());
									googletag.defineOutOfPageSlot('/".$netDFP."/".$name_feedDFP."/Programacion/Floating_3ros', 'div-gpt-ad-programas-floating_3ros').addService(googletag.pubads());";
					break;
					case "fashionpolice":
						$name_sectionDFP="Fashion_Police";
						$cod_slots="googletag.defineSlot('/".$netDFP."/".$name_feedDFP."/Fashion_Police/BoxBanner_1', [300, 250], 'div-gpt-ad-fashionpolice-300x250-1').addService(googletag.pubads());
									googletag.defineSlot('/".$netDFP."/".$name_feedDFP."/Fashion_Police/LeaderBoard', [728, 90], 'div-gpt-ad-fashionpolice-728x90').addService(googletag.pubads());
									googletag.defineOutOfPageSlot('/".$netDFP."/".$name_feedDFP."/Fashion_Police/Floating_3ros', 'div-gpt-ad-fashionpolice-floating_3ros').addService(googletag.pubads());";
					break;
					case "coffeebreak":
						$name_sectionDFP="Coffe_Break";
						$cod_slots="googletag.defineSlot('/".$netDFP."/".$name_feedDFP."/Coffe_Break/BoxBanner_1', [300, 250], 'div-gpt-ad-coffeebreak-300x250-1').addService(googletag.pubads());
									googletag.defineSlot('/".$netDFP."/".$name_feedDFP."/Coffe_Break/LeaderBoard', [728, 90], 'div-gpt-ad-coffeebreak-728x90').addService(googletag.pubads());
									googletag.defineOutOfPageSlot('/".$netDFP."/".$name_feedDFP."/Coffe_Break/Floating_3ros', 'div-gpt-ad-coffeebreak-floating_3ros').addService(googletag.pubads());";
					break;
					
					case "galerias":
						$name_sectionDFP="Fotos";
						$cod_slots="googletag.defineSlot('/".$netDFP."/".$name_feedDFP."/Fotos/BoxBanner_1', [300, 250], 'div-gpt-ad-galerias-300x250-1').addService(googletag.pubads());
									googletag.defineSlot('/".$netDFP."/".$name_feedDFP."/Fotos/LeaderBoard', [728, 90], 'div-gpt-ad-galerias-728x90').addService(googletag.pubads());
									googletag.defineOutOfPageSlot('/".$netDFP."/".$name_feedDFP."/Fotos/Floating_3ros', 'div-gpt-ad-galerias-floating_3ros').addService(googletag.pubads());";
					break;
					case "galerias_page":
						$name_sectionDFP="Galerias";
						$idGallery=$_GET["gallery"];
						$cod_slots="googletag.defineSlot('/".$netDFP."/".$name_feedDFP."/Galerias/BoxBanner_1', [300, 250], 'div-gpt-ad-galerias_page-300x250-1').addService(googletag.pubads()).setTargeting('galleryid', ".$idGallery.");
									
									googletag.defineOutOfPageSlot('/".$netDFP."/".$name_feedDFP."/Fotos/Floating_3ros', 'div-gpt-ad-galerias_page-floating_3ros').addService(googletag.pubads());";
					break;
					case "videos":
						$name_sectionDFP="Videos";
						$cod_slots="googletag.defineSlot('/".$netDFP."/".$name_feedDFP."/Videos/LeaderBoard', [728, 90], 'div-gpt-ad-videos-728x90').addService(googletag.pubads());
									googletag.defineOutOfPageSlot('/".$netDFP."/".$name_feedDFP."/Videos/Floating_3ros', 'div-gpt-ad-videos-floating_3ros').addService(googletag.pubads());";
					break;
					case "app":
						$name_sectionDFP="Homepage";
						$cod_slots="googletag.defineOutOfPageSlot('/".$netDFP."/".$name_feedDFP."/Homepage/Floating_3ros', 'div-gpt-ad-app-floating_3ros').addService(googletag.pubads());
									googletag.defineSlot('/".$netDFP."/".$name_feedDFP."/Homepage/LeaderBoard', [728, 90], 'div-gpt-ad-app-728x90').addService(googletag.pubads());";
					break;
					case "timeline":
						$name_sectionDFP="Homepage";
						$cod_slots="googletag.defineSlot('/".$netDFP."/".$name_feedDFP."/Homepage/LeaderBoard', [728, 90], 'div-gpt-ad-timeline-728x90').addService(googletag.pubads());";
					break;
					case "contacto":
						$name_sectionDFP="Homepage";
						$cod_slots="googletag.defineSlot('/".$netDFP."/".$name_feedDFP."/Homepage/BoxBanner_1', [300, 250], 'div-gpt-ad-contacto-300x250-1').addService(googletag.pubads());
									googletag.defineSlot('/".$netDFP."/".$name_feedDFP."/Homepage/LeaderBoard', [728, 90], 'div-gpt-ad-contacto-728x90').addService(googletag.pubads());
									googletag.defineOutOfPageSlot('/".$netDFP."/".$name_feedDFP."/Homepage/Floating_3ros', 'div-gpt-ad-contacto-floating_3ros').addService(googletag.pubads());";
					break;
					case "politicas-de-privacidade":
						$name_sectionDFP="Homepage";
						$cod_slots="googletag.defineSlot('/".$netDFP."/".$name_feedDFP."/Homepage/BoxBanner_1', [300, 250], 'div-gpt-ad-politicas-de-privacidad-300x250-1').addService(googletag.pubads());
									googletag.defineSlot('/".$netDFP."/".$name_feedDFP."/Homepage/LeaderBoard', [728, 90], 'div-gpt-ad-politicas-de-privacidad-728x90').addService(googletag.pubads());
									googletag.defineOutOfPageSlot('/".$netDFP."/".$name_feedDFP."/Homepage/Floating_3ros', 'div-gpt-ad-politicas-de-privacidad-floating_3ros').addService(googletag.pubads());";
					break;
					case "terminos-de-uso":
						$name_sectionDFP="Homepage";
						$cod_slots="googletag.defineSlot('/".$netDFP."/".$name_feedDFP."/Homepage/BoxBanner_1', [300, 250], 'div-gpt-ad-terminos-de-uso-300x250-1').addService(googletag.pubads());
									googletag.defineSlot('/".$netDFP."/".$name_feedDFP."/Homepage/LeaderBoard', [728, 90], 'div-gpt-ad-terminos-de-uso-728x90').addService(googletag.pubads());
									googletag.defineOutOfPageSlot('/".$netDFP."/".$name_feedDFP."/Homepage/Floating_3ros', 'div-gpt-ad-terminos-de-uso-floating_3ros').addService(googletag.pubads());";
					break;
					case "politica-de-remocion":
						$name_sectionDFP="Homepage";
						$cod_slots="googletag.defineSlot('/".$netDFP."/".$name_feedDFP."/Homepage/BoxBanner_1', [300, 250], 'div-gpt-ad-politica-de-remocion-300x250-1').addService(googletag.pubads());
									googletag.defineSlot('/".$netDFP."/".$name_feedDFP."/Homepage/LeaderBoard', [728, 90], 'div-gpt-ad-politica-de-remocion-728x90').addService(googletag.pubads());
									googletag.defineOutOfPageSlot('/".$netDFP."/".$name_feedDFP."/Homepage/Floating_3ros', 'div-gpt-ad-politica-de-remocion-floating_3ros').addService(googletag.pubads());";
					break;
					
					default:
						$name_sectionDFP="Homepage";
						$cod_slots="googletag.defineSlot('/".$netDFP."/".$name_feedDFP."/Homepage/LeaderBoard', [728, 90], 'div-gpt-ad-home-728x90').addService(googletag.pubads());";
					break;
					// FALTA DEFAULT HOME
					
				}
				$cod_dinamic=execute_define("Page", $ConArray, NULL, $name_feedDFP, $name_sectionDFP, NULL, $postSlug);
				echo $cod_dinamic;

	}

	 $cod_slots.="googletag.defineSlot('/".$netDFP."/".$name_feedDFP."/Native_Ad_Box', [300, 250], 'div-gpt-ad-native-300x250-1').addService(googletag.pubads());
    googletag.defineSlot('/".$netDFP."/".$name_feedDFP."/Native_Ad_Box', [300, 250], 'div-gpt-ad-native-300x250-2').addService(googletag.pubads());";

	echo $cod_slots;?>

	<?php
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
        $IDfoto_del_dia=10992;

        //EXTRAER the trends
        $thetrends = get_category_by_slug('thetrend');
        $IDthetrends=$thetrends->term_id;

        if(is_home() || is_search()  || is_tag()){

                    $name_sectionDFP="Homepage";
                    $que_seccion_es="is_home";

                    $cod_slots="googletag.defineSlot('/".$netDFP."/".$name_feedDFP."/Mobile/Home/BoxBanner_1', [300, 250], 'div-gpt-ad-home-300x250-1').addService(googletag.pubads());
                    googletag.defineSlot('/".$netDFP."/".$name_feedDFP."/Mobile/Home/BoxBanner_1', [300, 250], 'div-gpt-ad-home-300x250-2').addService(googletag.pubads());
                    googletag.defineSlot('/".$netDFP."/".$name_feedDFP."/Mobile/Home/BoxBanner_1', [300, 250], 'div-gpt-ad-home-300x250-3').addService(googletag.pubads());
                    googletag.defineSlot('/".$netDFP."/".$name_feedDFP."/Mobile/Home/BoxBanner_1', [300, 250], 'div-gpt-ad-home-300x250-4').addService(googletag.pubads());
                    googletag.defineSlot('/".$netDFP."/".$name_feedDFP."/Mobile/Home/BoxBanner_1', [300, 250], 'div-gpt-ad-home-300x250-5').addService(googletag.pubads());";

                    //$array_elem=execute_define("Homepage", $ConArray, NULL, $name_feedDFP, "Homepage", NULL, NULL);
                    //echo $array_elem;

        }elseif(is_404()){
                    $name_sectionDFP="Homepage";
                    $que_seccion_es="is_404";

                    $cod_slots="googletag.defineSlot('/".$netDFP."/".$name_feedDFP."/Homepage/Header_Chico', [240, 90], 'div-gpt-ad-home-240x90').addService(googletag.pubads());
                    googletag.defineSlot('/".$netDFP."/".$name_feedDFP."/Homepage/LeaderBoard', [728, 90], 'div-gpt-ad-home-728x90').addService(googletag.pubads());";

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

                        //$array_elem=execute_define("Nota", $ConArray, $id_cod, $name_feedDFP, "Nota", $envio_array, NULL);
                        //echo $array_elem;

                        $cod_slots="googletag.defineSlot('/".$netDFP."/".$name_feedDFP."/Nota/BoxBanner_1', [300, 250], 'div-gpt-ad-Post-300x250-1').addService(googletag.pubads());
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
                                $cod_slots="";
                            break;
                            case "imperdible":
                                $name_sectionDFP="Imperdible";
                                $cod_slots="";
                            break;
                            case "amamos-las-pelis":
                                $name_sectionDFP="Amamoslaspelis";
                                $cod_slots="";
                            break;
                            case "deportes":
                                $name_sectionDFP="Enews";
                                $cod_slots="";
                            break;
                            case "lol":
                                $name_sectionDFP="Enews";
                                $cod_slots="";
                            break;
                            case "the-royals":
                                $name_sectionDFP="The_Royals";
                                $cod_slots="";
                            break;
                            case "copadelmundo":
                                $name_sectionDFP="Enews";
                                $cod_slots="";
                            break;
                            case "musica":
                                $name_sectionDFP="Enews";
                                $cod_slots="";
                            break;
                            case "marriedtojonas":
                                $name_sectionDFP="MarriedToJonas";
                                $cod_slots="";
                            break;
                            case "estrenos":
                                $name_sectionDFP="Enews";
                                $cod_slots="";
                            break;
                            case "foto-del-dia-2":
                                $name_sectionDFP="Enews";
                                $cod_slots="";
                            break;
                            case "efashionblogger":
                                $name_sectionDFP="EFashion_Blogger";
                                $cod_slots="";
                            break;
                            case "the-kardashians":
                                $name_sectionDFP="Kardashians";
                                $cod_slots="";
                            break;
                            case "thetrend":
                                $name_sectionDFP="The_Trend";
                                $cod_slots="";
                            break;
                            case "alfombraroja":
                                $name_sectionDFP="RedCarpet";
                                $cod_slots="";
                            break;
                            case "goldenglobe":
                                $name_sectionDFP="RedCarpet/Golden_Globe_Awards";
                                $cod_slots="";
                            break;
                            case "sag":
                                $name_sectionDFP="RedCarpet/Sag_Awards";
                                $cod_slots="";
                            break;
                            case "grammy":
                                $name_sectionDFP="RedCarpet/Grammy_Awards";
                                $cod_slots="";
                            break;
                            case "oscar":
                                $name_sectionDFP="RedCarpet/Oscar_Awards";
                                $cod_slots="";
                            break;
                            case "latinbillboard":
                                $name_sectionDFP="RedCarpet/Latin_Billboard";
                                $cod_slots="";
                            break;
                            case "emmy":
                                $name_sectionDFP="RedCarpet/Emmy_Awards";
                                $cod_slots="";
                            break;
                            case "e-shows":
                                $name_sectionDFP="Eshows";
                                $cod_slots="";
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

            if ($postSlug=="cambiame-el-look"){
                echo "googletag.defineSlot('/".$netDFP."/".$name_feedDFP."/Mobile/Home/BoxBanner_1', [300, 250], 'div-gpt-ad-home-300x250-1').addService(googletag.pubads());";
            }
            if ($postSlug=="live-from-e"){
                echo "googletag.defineSlot('/".$netDFP."/".$name_feedDFP."/Mobile/Home/BoxBanner_1', [300, 250], 'div-gpt-ad-".$postSlug."-300x250-1').addService(googletag.pubads());";
            }
            if ($postSlug=="wild-on"){
                echo "googletag.defineSlot('/".$netDFP."/".$name_feedDFP."/Mobile/Home/BoxBanner_1', [300, 250], 'div-gpt-ad-".$postSlug."-300x250-1').addService(googletag.pubads());";
            }
            if ($postSlug=="efitness"){
                echo "googletag.defineSlot('/".$netDFP."/".$name_feedDFP."/Mobile/Home/BoxBanner_1', [300, 250], 'div-gpt-ad-".$postSlug."-300x250-1').addService(googletag.pubads());";
            }

        }

        
        $cod_slots.="googletag.defineSlot('/".$netDFP."/".$name_feedDFP."/Mobile/Home/banner_1', [[300, 50], [320, 50]], 'div-gpt-ad-home-320x50-1').addService(googletag.pubads());
              googletag.defineOutOfPageSlot('/".$netDFP."/".$name_feedDFP."/Mobile/adhesion', 'div-gpt-ad-home-adhesion').addService(googletag.pubads());
            googletag.defineOutOfPageSlot('/".$netDFP."/".$name_feedDFP."/Mobile/Floating_3ros', 'div-gpt-ad-home-floating_3ros').addService(googletag.pubads());";

        $cod_slots.="googletag.defineSlot('/".$netDFP."/".$name_feedDFP."/Native_Ad_Box', [300, 250], 'div-gpt-ad-native-300x250-1').addService(googletag.pubads());
    googletag.defineSlot('/".$netDFP."/".$name_feedDFP."/Native_Ad_Box', [300, 250], 'div-gpt-ad-native-300x250-2').addService(googletag.pubads());";


        echo $cod_slots;
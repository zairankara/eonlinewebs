<script type='text/javascript'>
	(function() {
		var useSSL = 'https:' == document.location.protocol;
		var src = (useSSL ? 'https:' : 'http:') +
		'//www.googletagservices.com/tag/js/gpt.js';
		document.write('<scr' + 'ipt src="' + src + '"></scr' + 'ipt>');
		 //console.log("No Mobile");
	})();
</script>


<script type='text/javascript'>
<?
$cod_single="";
$cod_slots="";
$que_seccion_es="";
$netDFP="8877";

/*NEW*/
$name_feedDFP=ucwords($name_feed);
$ConArray=conn_generico($var_con[0]);
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
				
				//query_posts("cat=-$IDimperdible,-$IDfoto_del_dia,-$IDthetrends");
				/*while ( have_posts() ) : the_post(); 
				$id_cod=get_the_ID();
				$cod_single.="googletag.defineSlot('/".$netDFP."/".$name_feedDFP."/Homepage/Patrocinio_post', [310, 30], 'div-gpt-ad-home-310x30-".$id_cod."').addService(googletag.pubads()).setTargeting('postid', ".$id_cod.");";
				endwhile;*/
					$cod_slots="googletag.defineSlot('/".$netDFP."/".$name_feedDFP."/Homepage/BoxBanner_1', [300, 250], 'div-gpt-ad-home-300x250-1').addService(googletag.pubads());
					googletag.defineSlot('/".$netDFP."/".$name_feedDFP."/Homepage/BoxBanner_2', [300, 250], 'div-gpt-ad-home-300x250-2').addService(googletag.pubads());
					googletag.defineSlot('/".$netDFP."/".$name_feedDFP."/Homepage/Header_Chico', [240, 90], 'div-gpt-ad-home-240x90').addService(googletag.pubads());
					googletag.defineSlot('/".$netDFP."/".$name_feedDFP."/Homepage/LeaderBoard', [728, 90], 'div-gpt-ad-home-728x90').addService(googletag.pubads());
					googletag.defineOutOfPageSlot('/".$netDFP."/".$name_feedDFP."/Homepage/Floating_3ros', 'div-gpt-ad-home-floating_3ros').addService(googletag.pubads());";

					$array_elem=execute_define("Homepage", $ConArray, NULL, $name_feedDFP, "Homepage", NULL, NULL);
					echo $array_elem;

				echo $cod_single;
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
					$categorias = trim($categorias, ',');
					$categorias.="]";

					$array_elem=execute_define("Nota", $ConArray, $id_cod, $name_feedDFP, "Nota", $envio_array, NULL);
					echo $array_elem;

					$cod_slots="googletag.defineSlot('/".$netDFP."/".$name_feedDFP."/Nota/BoxBanner_1', [300, 250], 'div-gpt-ad-Post-300x250-1').addService(googletag.pubads());
					googletag.defineSlot('/".$netDFP."/".$name_feedDFP."/Nota/BoxBanner_2', [300, 250], 'div-gpt-ad-Post-300x250-2').addService(googletag.pubads());
					googletag.defineSlot('/".$netDFP."/".$name_feedDFP."/Nota/Header_Chico', [240, 90], 'div-gpt-ad-Post-240x90').addService(googletag.pubads());
					googletag.defineSlot('/".$netDFP."/".$name_feedDFP."/Nota/LeaderBoard', [728, 90], 'div-gpt-ad-Post-728x90').addService(googletag.pubads());
					googletag.defineOutOfPageSlot('/".$netDFP."/".$name_feedDFP."/Nota/Floating_3ros', 'div-gpt-ad-Post-floating_3ros').addService(googletag.pubads());
					googletag.pubads().setTargeting('postid', '".$id_cod."');
					googletag.pubads().setTargeting('category_name', ".$categorias.");";

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
										googletag.defineSlot('/".$netDFP."/".$name_feedDFP."/Enews/Header_Chico', [240, 90], 'div-gpt-ad-enews-240x90').addService(googletag.pubads());
										googletag.defineSlot('/".$netDFP."/".$name_feedDFP."/Enews/LeaderBoard', [728, 90], 'div-gpt-ad-enews-728x90').addService(googletag.pubads());
										googletag.defineOutOfPageSlot('/".$netDFP."/".$name_feedDFP."/Enews/Floating_3ros', 'div-gpt-ad-enews-floating_3ros').addService(googletag.pubads());";
						break;
						case "imperdible":
							$name_sectionDFP="Imperdible";
							$cod_slots="googletag.defineSlot('/".$netDFP."/".$name_feedDFP."/Enews/BoxBanner_1', [300, 250], 'div-gpt-ad-imperdible-300x250-1').addService(googletag.pubads());
										googletag.defineSlot('/".$netDFP."/".$name_feedDFP."/Enews/BoxBanner_2', [300, 250], 'div-gpt-ad-imperdible-300x250-2').addService(googletag.pubads());
										googletag.defineSlot('/".$netDFP."/".$name_feedDFP."/Enews/Header_Chico', [240, 90], 'div-gpt-ad-imperdible-240x90').addService(googletag.pubads());
										googletag.defineSlot('/".$netDFP."/".$name_feedDFP."/Enews/LeaderBoard', [728, 90], 'div-gpt-ad-imperdible-728x90').addService(googletag.pubads());
										googletag.defineOutOfPageSlot('/".$netDFP."/".$name_feedDFP."/Enews/Floating_3ros', 'div-gpt-ad-imperdible-floating_3ros').addService(googletag.pubads());";
						break;
						case "amamos-las-pelis":
							$name_sectionDFP="Amamoslaspelis";
							$cod_slots="googletag.defineSlot('/".$netDFP."/".$name_feedDFP."/Amamoslaspelis/BoxBanner_1', [300, 250], 'div-gpt-ad-amamos-las-pelis-300x250-1').addService(googletag.pubads());
										googletag.defineSlot('/".$netDFP."/".$name_feedDFP."/Enews/BoxBanner_2', [300, 250], 'div-gpt-ad-amamos-las-pelis-300x250-2').addService(googletag.pubads());
										googletag.defineSlot('/".$netDFP."/".$name_feedDFP."/Enews/Header_Chico', [240, 90], 'div-gpt-ad-amamos-las-pelis-240x90').addService(googletag.pubads());
										googletag.defineSlot('/".$netDFP."/".$name_feedDFP."/Amamoslaspelis/LeaderBoard', [728, 90], 'div-gpt-ad-amamos-las-pelis-728x90').addService(googletag.pubads());
										googletag.defineOutOfPageSlot('/".$netDFP."/".$name_feedDFP."/Amamoslaspelis/Floating_3ros', 'div-gpt-ad-amamos-las-pelis-floating_3ros').addService(googletag.pubads());
										googletag.defineSlot('/".$netDFP."/".$name_feedDFP."/Amamoslaspelis/Toppost', [630, 50], 'div-gpt-ad-amamos-las-pelis-630x50').addService(googletag.pubads());";
						break;
						case "deportes":
							$name_sectionDFP="Enews";
							$cod_slots="googletag.defineSlot('/".$netDFP."/".$name_feedDFP."/Enews/BoxBanner_1', [300, 250], 'div-gpt-ad-deportes-300x250-1').addService(googletag.pubads());
										googletag.defineSlot('/".$netDFP."/".$name_feedDFP."/Enews/BoxBanner_2', [300, 250], 'div-gpt-ad-deportes-300x250-2').addService(googletag.pubads());
										googletag.defineSlot('/".$netDFP."/".$name_feedDFP."/Enews/Header_Chico', [240, 90], 'div-gpt-ad-deportes-240x90').addService(googletag.pubads());
										googletag.defineSlot('/".$netDFP."/".$name_feedDFP."/Enews/LeaderBoard', [728, 90], 'div-gpt-ad-deportes-728x90').addService(googletag.pubads());
										googletag.defineOutOfPageSlot('/".$netDFP."/".$name_feedDFP."/Enews/Floating_3ros', 'div-gpt-ad-deportes-floating_3ros').addService(googletag.pubads());";
						break;
						case "lol":
							$name_sectionDFP="Enews";
							$cod_slots="googletag.defineSlot('/".$netDFP."/".$name_feedDFP."/Enews/BoxBanner_1', [300, 250], 'div-gpt-ad-lol-300x250-1').addService(googletag.pubads());
										googletag.defineSlot('/".$netDFP."/".$name_feedDFP."/Enews/BoxBanner_2', [300, 250], 'div-gpt-ad-lol-300x250-2').addService(googletag.pubads());
										googletag.defineSlot('/".$netDFP."/".$name_feedDFP."/Enews/Header_Chico', [240, 90], 'div-gpt-ad-lol-240x90').addService(googletag.pubads());
										googletag.defineSlot('/".$netDFP."/".$name_feedDFP."/Enews/LeaderBoard', [728, 90], 'div-gpt-ad-lol-728x90').addService(googletag.pubads());
										googletag.defineOutOfPageSlot('/".$netDFP."/".$name_feedDFP."/Enews/Floating_3ros', 'div-gpt-ad-lol-floating_3ros').addService(googletag.pubads());";
						break;
						case "the-royals":
							$name_sectionDFP="The_Royals";
							$cod_slots="googletag.defineSlot('/".$netDFP."/".$name_feedDFP."/The_Royals/BoxBanner_1', [300, 250], 'div-gpt-ad-the-royals-300x250-1').addService(googletag.pubads());
										googletag.defineSlot('/".$netDFP."/".$name_feedDFP."/The_Royals/BoxBanner_2', [300, 250], 'div-gpt-ad-the-royals-300x250-2').addService(googletag.pubads());
										googletag.defineSlot('/".$netDFP."/".$name_feedDFP."/The_Royals/Header_Chico', [240, 90], 'div-gpt-ad-the-royals-240x90').addService(googletag.pubads());
										googletag.defineSlot('/".$netDFP."/".$name_feedDFP."/The_Royals/LeaderBoard', [728, 90], 'div-gpt-ad-the-royals-728x90').addService(googletag.pubads());";
						break;
						case "copadelmundo":
							$name_sectionDFP="Enews";
							$cod_slots="googletag.defineSlot('/".$netDFP."/".$name_feedDFP."/Enews/BoxBanner_1', [300, 250], 'div-gpt-ad-copadelmundo-300x250-1').addService(googletag.pubads());
										googletag.defineSlot('/".$netDFP."/".$name_feedDFP."/Enews/BoxBanner_2', [300, 250], 'div-gpt-ad-copadelmundo-300x250-2').addService(googletag.pubads());
										googletag.defineSlot('/".$netDFP."/".$name_feedDFP."/Enews/Header_Chico', [240, 90], 'div-gpt-ad-copadelmundo-240x90').addService(googletag.pubads());
										googletag.defineSlot('/".$netDFP."/".$name_feedDFP."/Enews/LeaderBoard', [728, 90], 'div-gpt-ad-copadelmundo-728x90').addService(googletag.pubads());
										googletag.defineOutOfPageSlot('/".$netDFP."/".$name_feedDFP."/Copadelmundo/Floating_3ros', 'div-gpt-ad-copadelmundo-floating_3ros').addService(googletag.pubads());
										googletag.defineSlot('/".$netDFP."/".$name_feedDFP."/Copadelmundo/Toppost', [630, 50], 'div-gpt-ad-copadelmundo-630x50').addService(googletag.pubads());";
						break;
						case "musica":
							$name_sectionDFP="Enews";
							$cod_slots="googletag.defineSlot('/".$netDFP."/".$name_feedDFP."/Enews/BoxBanner_1', [300, 250], 'div-gpt-ad-musica-300x250-1').addService(googletag.pubads());
										googletag.defineSlot('/".$netDFP."/".$name_feedDFP."/Enews/BoxBanner_2', [300, 250], 'div-gpt-ad-musica-300x250-2').addService(googletag.pubads());
										googletag.defineSlot('/".$netDFP."/".$name_feedDFP."/Enews/Header_Chico', [240, 90], 'div-gpt-ad-musica-240x90').addService(googletag.pubads());
										googletag.defineSlot('/".$netDFP."/".$name_feedDFP."/Enews/LeaderBoard', [728, 90], 'div-gpt-ad-musica-728x90').addService(googletag.pubads());";
						break;
						case "marriedtojonas":
							$name_sectionDFP="MarriedToJonas";
							$cod_slots="googletag.defineSlot('/".$netDFP."/".$name_feedDFP."/MarriedToJonas/BoxBanner_1', [300, 250], 'div-gpt-ad-marriedtojonas-300x250-1').addService(googletag.pubads());
										googletag.defineSlot('/".$netDFP."/".$name_feedDFP."/MarriedToJonas/BoxBanner_2', [300, 250], 'div-gpt-ad-marriedtojonas-300x250-2').addService(googletag.pubads());
										googletag.defineSlot('/".$netDFP."/".$name_feedDFP."/MarriedToJonas/Header_Chico', [240, 90], 'div-gpt-ad-marriedtojonas-240x90').addService(googletag.pubads());
										googletag.defineSlot('/".$netDFP."/".$name_feedDFP."/MarriedToJonas/LeaderBoard', [728, 90], 'div-gpt-ad-marriedtojonas-728x90').addService(googletag.pubads());
										googletag.defineOutOfPageSlot('/".$netDFP."/".$name_feedDFP."/MarriedToJonas/Floating_3ros', 'div-gpt-ad-marriedtojonas-floating_3ros').addService(googletag.pubads());";
						break;
						case "estrenos":
							$name_sectionDFP="Enews";
							$cod_slots="googletag.defineSlot('/".$netDFP."/".$name_feedDFP."/Enews/BoxBanner_1', [300, 250], 'div-gpt-ad-estrenos-300x250-1').addService(googletag.pubads());
										googletag.defineSlot('/".$netDFP."/".$name_feedDFP."/Enews/BoxBanner_2', [300, 250], 'div-gpt-ad-estrenos-300x250-2').addService(googletag.pubads());
										googletag.defineSlot('/".$netDFP."/".$name_feedDFP."/Enews/Header_Chico', [240, 90], 'div-gpt-ad-estrenos-240x90').addService(googletag.pubads());
										googletag.defineSlot('/".$netDFP."/".$name_feedDFP."/Enews/LeaderBoard', [728, 90], 'div-gpt-ad-estrenos-728x90').addService(googletag.pubads());";
						break;
						case "foto-del-dia-2":
							$name_sectionDFP="Enews";
							$cod_slots="googletag.defineSlot('/".$netDFP."/".$name_feedDFP."/Enews/BoxBanner_1', [300, 250], 'div-gpt-ad-foto-del-dia-2-300x250-1').addService(googletag.pubads());
										googletag.defineSlot('/".$netDFP."/".$name_feedDFP."/Enews/BoxBanner_2', [300, 250], 'div-gpt-ad-foto-del-dia-2-300x250-2').addService(googletag.pubads());
										googletag.defineSlot('/".$netDFP."/".$name_feedDFP."/Enews/Header_Chico', [240, 90], 'div-gpt-ad-foto-del-dia-2-240x90').addService(googletag.pubads());
										googletag.defineSlot('/".$netDFP."/".$name_feedDFP."/Enews/LeaderBoard', [728, 90], 'div-gpt-ad-foto-del-dia-2-728x90').addService(googletag.pubads());";
						break;
						case "efashionblogger":
							$name_sectionDFP="EFashion_Blogger";
							$cod_slots="googletag.defineSlot('/".$netDFP."/".$name_feedDFP."/EFashion_Blogger/BoxBanner_1', [300, 250], 'div-gpt-ad-efashionblogger-300x250-1').addService(googletag.pubads());
										googletag.defineSlot('/".$netDFP."/".$name_feedDFP."/EFashion_Blogger/Header_Chico', [240, 90], 'div-gpt-ad-efashionblogger-240x90').addService(googletag.pubads());
										googletag.defineSlot('/".$netDFP."/".$name_feedDFP."/EFashion_Blogger/LeaderBoard', [728, 90], 'div-gpt-ad-efashionblogger-728x90').addService(googletag.pubads());
										googletag.defineOutOfPageSlot('/".$netDFP."/".$name_feedDFP."/EFashion_Blogger/Floating_3ros', 'div-gpt-ad-efashionblogger-floating_3ros').addService(googletag.pubads());";
						break;
						case "the-kardashians":
							$name_sectionDFP="Kardashians";
							$cod_slots="googletag.defineSlot('/".$netDFP."/".$name_feedDFP."/Kardashians/BoxBanner_1', [300, 250], 'div-gpt-ad-the-kardashians-300x250-1').addService(googletag.pubads());
										googletag.defineSlot('/".$netDFP."/".$name_feedDFP."/Kardashians/Header_Chico', [240, 90], 'div-gpt-ad-the-kardashians-240x90').addService(googletag.pubads());
										googletag.defineSlot('/".$netDFP."/".$name_feedDFP."/Kardashians/LeaderBoard', [728, 90], 'div-gpt-ad-the-kardashians-728x90').addService(googletag.pubads());
										googletag.defineOutOfPageSlot('/".$netDFP."/".$name_feedDFP."/Kardashians/Floating_3ros', 'div-gpt-ad-kardashians-floating_3ros').addService(googletag.pubads());";
						break;
						case "thetrend":
							$name_sectionDFP="The_Trend";
							$cod_slots="googletag.defineSlot('/".$netDFP."/".$name_feedDFP."/The_Trend/BoxBanner_1', [300, 250], 'div-gpt-ad-thetrend-300x250-1').addService(googletag.pubads());
										googletag.defineSlot('/".$netDFP."/".$name_feedDFP."/The_Trend/BoxBanner_2', [300, 250], 'div-gpt-ad-thetrend-300x250-2').addService(googletag.pubads());
										googletag.defineSlot('/".$netDFP."/".$name_feedDFP."/The_Trend/Header_Chico', [240, 90], 'div-gpt-ad-thetrend-240x90').addService(googletag.pubads());						
										googletag.defineSlot('/".$netDFP."/".$name_feedDFP."/The_Trend/LeaderBoard', [728, 90], 'div-gpt-ad-thetrend-728x90').addService(googletag.pubads());
										googletag.defineOutOfPageSlot('/".$netDFP."/".$name_feedDFP."/The_Trend/Floating_3ros', 'div-gpt-ad-thetrend-floating_3ros').addService(googletag.pubads());";
						break;
						case "alfombraroja":
							$name_sectionDFP="RedCarpet";
							$cod_slots="googletag.defineSlot('/".$netDFP."/".$name_feedDFP."/RedCarpet/BoxBanner_1', [300, 250], 'div-gpt-ad-alfombraroja-300x250-1').addService(googletag.pubads());
										googletag.defineSlot('/".$netDFP."/".$name_feedDFP."/RedCarpet/BoxBanner_2', [300, 250], 'div-gpt-ad-alfombraroja-300x250-2').addService(googletag.pubads());
										googletag.defineSlot('/".$netDFP."/".$name_feedDFP."/RedCarpet/Header_Chico', [240, 90], 'div-gpt-ad-alfombraroja-240x90').addService(googletag.pubads());
										googletag.defineSlot('/".$netDFP."/".$name_feedDFP."/RedCarpet/LeaderBoard', [728, 90], 'div-gpt-ad-alfombraroja-728x90').addService(googletag.pubads());
										googletag.defineOutOfPageSlot('/".$netDFP."/".$name_feedDFP."/RedCarpet/Floating_3ros', 'div-gpt-ad-alfombraroja-floating_3ros').addService(googletag.pubads());";
						break;
						case "goldenglobe":
							$name_sectionDFP="RedCarpet/Golden_Globe_Awards";
							$cod_slots="googletag.defineSlot('/".$netDFP."/".$name_feedDFP."/RedCarpet/Golden_Globe_Awards/BoxBanner_1', [300, 250], 'div-gpt-ad-goldenglobe-300x250-1').addService(googletag.pubads());
										googletag.defineSlot('/".$netDFP."/".$name_feedDFP."/RedCarpet/Golden_Globe_Awards/BoxBanner_2', [300, 250], 'div-gpt-ad-goldenglobe-300x250-2').addService(googletag.pubads());
										googletag.defineSlot('/".$netDFP."/".$name_feedDFP."/RedCarpet/Golden_Globe_Awards/Header_Chico', [240, 90], 'div-gpt-ad-goldenglobe-240x90').addService(googletag.pubads());
										googletag.defineSlot('/".$netDFP."/".$name_feedDFP."/RedCarpet/Golden_Globe_Awards/LeaderBoard', [728, 90], 'div-gpt-ad-goldenglobe-728x90').addService(googletag.pubads());";
						break;
						case "sag":
							$name_sectionDFP="RedCarpet/Sag_Awards";
							$cod_slots="googletag.defineSlot('/".$netDFP."/".$name_feedDFP."/RedCarpet/Sag_Awards/BoxBanner_1', [300, 250], 'div-gpt-ad-sag-300x250-1').addService(googletag.pubads());
										googletag.defineSlot('/".$netDFP."/".$name_feedDFP."/RedCarpet/Sag_Awards/BoxBanner_2', [300, 250], 'div-gpt-ad-sag-300x250-2').addService(googletag.pubads());
										googletag.defineSlot('/".$netDFP."/".$name_feedDFP."/RedCarpet/Sag_Awards/Header_Chico', [240, 90], 'div-gpt-ad-sag-240x90').addService(googletag.pubads());
										googletag.defineSlot('/".$netDFP."/".$name_feedDFP."/RedCarpet/Sag_Awards/LeaderBoard', [728, 90], 'div-gpt-ad-sag-728x90').addService(googletag.pubads());";
						break;
						case "grammy":
							$name_sectionDFP="RedCarpet/Grammy_Awards";
							$cod_slots="googletag.defineSlot('/".$netDFP."/".$name_feedDFP."/RedCarpet/Grammy_Awards/BoxBanner_1', [300, 250], 'div-gpt-ad-grammy-300x250-1').addService(googletag.pubads());
										googletag.defineSlot('/".$netDFP."/".$name_feedDFP."/RedCarpet/Grammy_Awards/BoxBanner_2', [300, 250], 'div-gpt-ad-grammy-300x250-2').addService(googletag.pubads());
										googletag.defineSlot('/".$netDFP."/".$name_feedDFP."/RedCarpet/Grammy_Awards/Header_Chico', [240, 90], 'div-gpt-ad-grammy-240x90').addService(googletag.pubads());
										googletag.defineSlot('/".$netDFP."/".$name_feedDFP."/RedCarpet/Grammy_Awards/LeaderBoard', [728, 90], 'div-gpt-ad-grammy-728x90').addService(googletag.pubads());";
						break;
						case "oscar":
							$name_sectionDFP="RedCarpet/Oscar_Awards";
							$cod_slots="googletag.defineSlot('/".$netDFP."/".$name_feedDFP."/RedCarpet/Oscar_Awards/BoxBanner_1', [300, 250], 'div-gpt-ad-oscar-300x250-1').addService(googletag.pubads());
										googletag.defineSlot('/".$netDFP."/".$name_feedDFP."/RedCarpet/Oscar_Awards/BoxBanner_2', [300, 250], 'div-gpt-ad-oscar-300x250-2').addService(googletag.pubads());
										googletag.defineSlot('/".$netDFP."/".$name_feedDFP."/RedCarpet/Oscar_Awards/Header_Chico', [240, 90], 'div-gpt-ad-oscar-240x90').addService(googletag.pubads());
										googletag.defineSlot('/".$netDFP."/".$name_feedDFP."/RedCarpet/Oscar_Awards/LeaderBoard', [728, 90], 'div-gpt-ad-oscar-728x90').addService(googletag.pubads());";
						break;
						case "latinbillboard":
							$name_sectionDFP="RedCarpet/Latin_Billboard";
							$cod_slots="googletag.defineSlot('/".$netDFP."/".$name_feedDFP."/RedCarpet/Latin_Billboard/BoxBanner_1', [300, 250], 'div-gpt-ad-latinbillboard-300x250-1').addService(googletag.pubads());
										googletag.defineSlot('/".$netDFP."/".$name_feedDFP."/RedCarpet/Latin_Billboard/BoxBanner_2', [300, 250], 'div-gpt-ad-latinbillboard-300x250-2').addService(googletag.pubads());
										googletag.defineSlot('/".$netDFP."/".$name_feedDFP."/RedCarpet/Latin_Billboard/Header_Chico', [240, 90], 'div-gpt-ad-latinbillboard-240x90').addService(googletag.pubads());
										googletag.defineSlot('/".$netDFP."/".$name_feedDFP."/RedCarpet/Latin_Billboard/LeaderBoard', [728, 90], 'div-gpt-ad-latinbillboard-728x90').addService(googletag.pubads());";
						break;
						case "emmy":
							$name_sectionDFP="RedCarpet/Emmy_Awards";
							$cod_slots="googletag.defineSlot('/".$netDFP."/".$name_feedDFP."/RedCarpet/Emmy_Awards/BoxBanner_1', [300, 250], 'div-gpt-ad-emmy-300x250-1').addService(googletag.pubads());
										googletag.defineSlot('/".$netDFP."/".$name_feedDFP."/RedCarpet/Emmy_Awards/BoxBanner_2', [300, 250], 'div-gpt-ad-emmy-300x250-2').addService(googletag.pubads());
										googletag.defineSlot('/".$netDFP."/".$name_feedDFP."/RedCarpet/Emmy_Awards/Header_Chico', [240, 90], 'div-gpt-ad-emmy-240x90').addService(googletag.pubads());
										googletag.defineSlot('/".$netDFP."/".$name_feedDFP."/RedCarpet/Emmy_Awards/LeaderBoard', [728, 90], 'div-gpt-ad-emmy-728x90').addService(googletag.pubads());
										googletag.defineOutOfPageSlot('/".$netDFP."/".$name_feedDFP."/RedCarpet/Emmy_Awards/Floating_3ros', 'div-gpt-ad-emmy-floating_3ros').addService(googletag.pubads());";
						break;
						case "e-shows":
							$name_sectionDFP="Eshows";
							$cod_slots="googletag.defineSlot('/".$netDFP."/".$name_feedDFP."/Eshows/BoxBanner_1', [300, 250], 'div-gpt-ad-e-shows-300x250-1').addService(googletag.pubads());
										googletag.defineSlot('/".$netDFP."/".$name_feedDFP."/Eshows/Header_Chico', [240, 90], 'div-gpt-ad-e-shows-240x90').addService(googletag.pubads());
										googletag.defineSlot('/".$netDFP."/".$name_feedDFP."/Eshows/LeaderBoard', [728, 90], 'div-gpt-ad-e-shows-728x90').addService(googletag.pubads());
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
									googletag.defineSlot('/".$netDFP."/".$name_feedDFP."/Glamcam360/Header_Chico', [240, 90], 'div-gpt-ad-glamcam360-240x90').addService(googletag.pubads());
									googletag.defineSlot('/".$netDFP."/".$name_feedDFP."/Glamcam360/LeaderBoard', [728, 90], 'div-gpt-ad-glamcam360-728x90').addService(googletag.pubads());
									googletag.defineOutOfPageSlot('/".$netDFP."/".$name_feedDFP."/Glamcam360/Floating_3ros', 'div-gpt-ad-glamcam360-floating_3ros').addService(googletag.pubads());
									googletag.defineSlot('/".$netDFP."/".$name_feedDFP."/Glamcam360/Toppost', [630, 50], 'div-gpt-ad-glamcam360-630x50').addService(googletag.pubads());";
					break;
					case "eshows":
						$name_sectionDFP="Eshows";
						$cod_slots="googletag.defineSlot('/".$netDFP."/".$name_feedDFP."/Eshows/BoxBanner_1', [300, 250], 'div-gpt-ad-eshows-300x250-1').addService(googletag.pubads());
									googletag.defineSlot('/".$netDFP."/".$name_feedDFP."/Eshows/Header_Chico', [240, 90], 'div-gpt-ad-eshows-240x90').addService(googletag.pubads());
									googletag.defineSlot('/".$netDFP."/".$name_feedDFP."/Eshows/LeaderBoard', [728, 90], 'div-gpt-ad-eshows-728x90').addService(googletag.pubads());
									googletag.defineOutOfPageSlot('/".$netDFP."/".$name_feedDFP."/Eshows/Floating_3ros', 'div-gpt-ad-eshows-floating_3ros').addService(googletag.pubads());";
					break;
					case "iamcait":
						$name_sectionDFP="iamcait";
						$cod_slots="googletag.defineSlot('/".$netDFP."/".$name_feedDFP."/Enews/BoxBanner_1', [300, 250], 'div-gpt-ad-iamcait-300x250-1').addService(googletag.pubads());
									googletag.defineSlot('/".$netDFP."/".$name_feedDFP."/Enews/Header_Chico', [240, 90], 'div-gpt-ad-iamcait-240x90').addService(googletag.pubads());
									googletag.defineSlot('/".$netDFP."/".$name_feedDFP."/Enews/LeaderBoard', [728, 90], 'div-gpt-ad-iamcait-728x90').addService(googletag.pubads());
									googletag.defineOutOfPageSlot('/".$netDFP."/".$name_feedDFP."/Enews/Floating_3ros', 'div-gpt-ad-iamcait-floating_3ros').addService(googletag.pubads());";
					break;
					case "younger":
						$cod_slots="googletag.defineSlot('/".$netDFP."/".$name_feedDFP."/Enews/BoxBanner_1', [300, 250], 'div-gpt-ad-younger-300x250-1').addService(googletag.pubads());
									googletag.defineSlot('/".$netDFP."/".$name_feedDFP."/Enews/Header_Chico', [240, 90], 'div-gpt-ad-younger-240x90').addService(googletag.pubads());
									googletag.defineSlot('/".$netDFP."/".$name_feedDFP."/Enews/LeaderBoard', [728, 90], 'div-gpt-ad-younger-728x90').addService(googletag.pubads());
									googletag.defineOutOfPageSlot('/".$netDFP."/".$name_feedDFP."/Enews/Floating_3ros', 'div-gpt-ad-younger-floating_3ros').addService(googletag.pubads());";
					break;
					case "programas":
						$name_sectionDFP="Programacion";
						$cod_slots="googletag.defineSlot('/".$netDFP."/".$name_feedDFP."/Programacion/Header_Chico', [240, 90], 'div-gpt-ad-programas-240x90').addService(googletag.pubads());
									googletag.defineSlot('/".$netDFP."/".$name_feedDFP."/Programacion/LeaderBoard', [728, 90], 'div-gpt-ad-programas-728x90').addService(googletag.pubads());
									googletag.defineOutOfPageSlot('/".$netDFP."/".$name_feedDFP."/Programacion/Floating_3ros', 'div-gpt-ad-programas-floating_3ros').addService(googletag.pubads());";
					break;
					case "fashionpolice":
						$name_sectionDFP="Fashion_Police";
						$cod_slots="googletag.defineSlot('/".$netDFP."/".$name_feedDFP."/Fashion_Police/BoxBanner_1', [300, 250], 'div-gpt-ad-fashionpolice-300x250-1').addService(googletag.pubads());
									googletag.defineSlot('/".$netDFP."/".$name_feedDFP."/Fashion_Police/Header_Chico', [240, 90], 'div-gpt-ad-fashionpolice-240x90').addService(googletag.pubads());
									googletag.defineSlot('/".$netDFP."/".$name_feedDFP."/Fashion_Police/LeaderBoard', [728, 90], 'div-gpt-ad-fashionpolice-728x90').addService(googletag.pubads());
									googletag.defineOutOfPageSlot('/".$netDFP."/".$name_feedDFP."/Fashion_Police/Floating_3ros', 'div-gpt-ad-fashionpolice-floating_3ros').addService(googletag.pubads());";
					break;
					case "coffeebreak":
						$name_sectionDFP="Coffe_Break";
						$cod_slots="googletag.defineSlot('/".$netDFP."/".$name_feedDFP."/Coffe_Break/BoxBanner_1', [300, 250], 'div-gpt-ad-coffeebreak-300x250-1').addService(googletag.pubads());
									googletag.defineSlot('/".$netDFP."/".$name_feedDFP."/Coffe_Break/Header_Chico', [240, 90], 'div-gpt-ad-coffeebreak-240x90').addService(googletag.pubads());
									googletag.defineSlot('/".$netDFP."/".$name_feedDFP."/Coffe_Break/LeaderBoard', [728, 90], 'div-gpt-ad-coffeebreak-728x90').addService(googletag.pubads());
									googletag.defineOutOfPageSlot('/".$netDFP."/".$name_feedDFP."/Coffe_Break/Floating_3ros', 'div-gpt-ad-coffeebreak-floating_3ros').addService(googletag.pubads());";
					break;
					case "zonatrendyargentina":
						$name_sectionDFP="Zona_Trendy";
						$cod_slots="googletag.defineSlot('/".$netDFP."/".$name_feedDFP."/Zona_Trendy/BoxBanner_1', [300, 250], 'div-gpt-ad-zonatrendyargentina-300x250-1').addService(googletag.pubads());
									googletag.defineSlot('/".$netDFP."/".$name_feedDFP."/Zona_Trendy/Header_Chico', [240, 90], 'div-gpt-ad-zonatrendyargentina-240x90').addService(googletag.pubads());
									googletag.defineOutOfPageSlot('/".$netDFP."/".$name_feedDFP."/Zona_Trendy/Floating_3ros', 'div-gpt-ad-zonatrendyargentina-floating_3ros').addService(googletag.pubads());
									googletag.defineSlot('/".$netDFP."/".$name_feedDFP."/Zona_Trendy/LeaderBoard', [728, 90], 'div-gpt-ad-zonatrendyargentina-728x90').addService(googletag.pubads());";
					break;
					case "epop":
						$name_sectionDFP="Epop";
						$cod_slots="googletag.defineSlot('/".$netDFP."/".$name_feedDFP."/Epop/BoxBanner_1', [300, 250], 'div-gpt-ad-epop-300x250-1').addService(googletag.pubads());
									googletag.defineSlot('/".$netDFP."/".$name_feedDFP."/Epop/Header_Chico', [240, 90], 'div-gpt-ad-epop-240x90').addService(googletag.pubads());
									googletag.defineSlot('/".$netDFP."/".$name_feedDFP."/Epop/LeaderBoard', [728, 90], 'div-gpt-ad-epop-728x90').addService(googletag.pubads());
									googletag.defineOutOfPageSlot('/".$netDFP."/".$name_feedDFP."/Epop/Floating_3ros', 'div-gpt-ad-epop-floating_3ros').addService(googletag.pubads());";
					break;
					case "fotos-argentina":
						$name_sectionDFP="Fotos";
						$cod_slots="googletag.defineSlot('/".$netDFP."/".$name_feedDFP."/Fotos/BoxBanner_1', [300, 250], 'div-gpt-ad-fotos-argentina-300x250-1').addService(googletag.pubads());
									googletag.defineSlot('/".$netDFP."/".$name_feedDFP."/Fotos/Header_Chico', [240, 90], 'div-gpt-ad-fotos-argentina-240x90').addService(googletag.pubads());
									googletag.defineSlot('/".$netDFP."/".$name_feedDFP."/Fotos/LeaderBoard', [728, 90], 'div-gpt-ad-fotos-argentina-728x90').addService(googletag.pubads());
									googletag.defineOutOfPageSlot('/".$netDFP."/".$name_feedDFP."/Fotos/Floating_3ros', 'div-gpt-ad-fotos-argentina-floating_3ros').addService(googletag.pubads());";
					break;
					case "galerias":
						$name_sectionDFP="Galerias";
						$idGallery=$_GET["gallery"];
						$cod_slots="googletag.defineSlot('/".$netDFP."/".$name_feedDFP."/Galerias/BoxBanner_1', [300, 250], 'div-gpt-ad-galerias-300x250-1').addService(googletag.pubads()).setTargeting('galleryid', ".$idGallery.");
									googletag.defineSlot('/".$netDFP."/".$name_feedDFP."/Galerias/Patrocinio', [300, 50], 'div-gpt-ad-galerias-300x50').addService(googletag.pubads()).setTargeting('galleryid', ".$idGallery.");
									googletag.defineOutOfPageSlot('/".$netDFP."/".$name_feedDFP."/Fotos/Floating_3ros', 'div-gpt-ad-galerias-floating_3ros').addService(googletag.pubads());";
					break;
					case "videos-2":
						$name_sectionDFP="Videos";
						$cod_slots="googletag.defineSlot('/".$netDFP."/".$name_feedDFP."/Videos/Header_Chico', [240, 90], 'div-gpt-ad-videos-2-240x90').addService(googletag.pubads());
									googletag.defineSlot('/".$netDFP."/".$name_feedDFP."/Videos/LeaderBoard', [728, 90], 'div-gpt-ad-videos-2-728x90').addService(googletag.pubads());
									googletag.defineOutOfPageSlot('/".$netDFP."/".$name_feedDFP."/Videos/Floating_3ros', 'div-gpt-ad-videos-2-floating_3ros').addService(googletag.pubads());";
					break;
					case "app":
						$name_sectionDFP="Homepage";
						$cod_slots="googletag.defineSlot('/".$netDFP."/".$name_feedDFP."/Homepage/Header_Chico', [240, 90], 'div-gpt-ad-app-240x90').addService(googletag.pubads());
									googletag.defineOutOfPageSlot('/".$netDFP."/".$name_feedDFP."/Homepage/Floating_3ros', 'div-gpt-ad-app-floating_3ros').addService(googletag.pubads());
									googletag.defineSlot('/".$netDFP."/".$name_feedDFP."/Homepage/LeaderBoard', [728, 90], 'div-gpt-ad-app-728x90').addService(googletag.pubads());";
					break;
					case "timeline":
						$name_sectionDFP="Homepage";
						$cod_slots="googletag.defineSlot('/".$netDFP."/".$name_feedDFP."/Homepage/Header_Chico', [240, 90], 'div-gpt-ad-timeline-240x90').addService(googletag.pubads());
									googletag.defineSlot('/".$netDFP."/".$name_feedDFP."/Homepage/LeaderBoard', [728, 90], 'div-gpt-ad-timeline-728x90').addService(googletag.pubads());";
					break;
					case "contacto":
						$name_sectionDFP="Homepage";
						$cod_slots="googletag.defineSlot('/".$netDFP."/".$name_feedDFP."/Homepage/BoxBanner_1', [300, 250], 'div-gpt-ad-contacto-300x250-1').addService(googletag.pubads());
									googletag.defineSlot('/".$netDFP."/".$name_feedDFP."/Homepage/Header_Chico', [240, 90], 'div-gpt-ad-contacto-240x90').addService(googletag.pubads());
									googletag.defineSlot('/".$netDFP."/".$name_feedDFP."/Homepage/LeaderBoard', [728, 90], 'div-gpt-ad-contacto-728x90').addService(googletag.pubads());
									googletag.defineOutOfPageSlot('/".$netDFP."/".$name_feedDFP."/Homepage/Floating_3ros', 'div-gpt-ad-contacto-floating_3ros').addService(googletag.pubads());";
					break;
					case "politicas-de-privacidad":
						$name_sectionDFP="Homepage";
						$cod_slots="googletag.defineSlot('/".$netDFP."/".$name_feedDFP."/Homepage/BoxBanner_1', [300, 250], 'div-gpt-ad-politicas-de-privacidad-300x250-1').addService(googletag.pubads());
									googletag.defineSlot('/".$netDFP."/".$name_feedDFP."/Homepage/Header_Chico', [240, 90], 'div-gpt-ad-politicas-de-privacidad-240x90').addService(googletag.pubads());
									googletag.defineSlot('/".$netDFP."/".$name_feedDFP."/Homepage/LeaderBoard', [728, 90], 'div-gpt-ad-politicas-de-privacidad-728x90').addService(googletag.pubads());
									googletag.defineOutOfPageSlot('/".$netDFP."/".$name_feedDFP."/Homepage/Floating_3ros', 'div-gpt-ad-politicas-de-privacidad-floating_3ros').addService(googletag.pubads());";
					break;
					case "terminos-de-uso":
						$name_sectionDFP="Homepage";
						$cod_slots="googletag.defineSlot('/".$netDFP."/".$name_feedDFP."/Homepage/BoxBanner_1', [300, 250], 'div-gpt-ad-terminos-de-uso-300x250-1').addService(googletag.pubads());
									googletag.defineSlot('/".$netDFP."/".$name_feedDFP."/Homepage/Header_Chico', [240, 90], 'div-gpt-ad-terminos-de-uso-240x90').addService(googletag.pubads());
									googletag.defineSlot('/".$netDFP."/".$name_feedDFP."/Homepage/LeaderBoard', [728, 90], 'div-gpt-ad-terminos-de-uso-728x90').addService(googletag.pubads());
									googletag.defineOutOfPageSlot('/".$netDFP."/".$name_feedDFP."/Homepage/Floating_3ros', 'div-gpt-ad-terminos-de-uso-floating_3ros').addService(googletag.pubads());";
					break;
					case "politica-de-remocion":
						$name_sectionDFP="Homepage";
						$cod_slots="googletag.defineSlot('/".$netDFP."/".$name_feedDFP."/Homepage/BoxBanner_1', [300, 250], 'div-gpt-ad-politica-de-remocion-300x250-1').addService(googletag.pubads());
									googletag.defineSlot('/".$netDFP."/".$name_feedDFP."/Homepage/Header_Chico', [240, 90], 'div-gpt-ad-politica-de-remocion-240x90').addService(googletag.pubads());
									googletag.defineSlot('/".$netDFP."/".$name_feedDFP."/Homepage/LeaderBoard', [728, 90], 'div-gpt-ad-politica-de-remocion-728x90').addService(googletag.pubads());
									googletag.defineOutOfPageSlot('/".$netDFP."/".$name_feedDFP."/Homepage/Floating_3ros', 'div-gpt-ad-politica-de-remocion-floating_3ros').addService(googletag.pubads());";
					break;
					case "yosoyelartista":
						$name_sectionDFP="Homepage";
						$cod_slots="googletag.defineSlot('/".$netDFP."/".$name_feedDFP."/Homepage/Header_Chico', [240, 90], 'div-gpt-ad-yosoyelartista-240x90').addService(googletag.pubads());
									googletag.defineSlot('/".$netDFP."/".$name_feedDFP."/Homepage/LeaderBoard', [728, 90], 'div-gpt-ad-yosoyelartista-728x90').addService(googletag.pubads());";
					break;
					default:
						$name_sectionDFP="Homepage";
						$cod_slots="googletag.defineSlot('/".$netDFP."/".$name_feedDFP."/Homepage/Header_Chico', [240, 90], 'div-gpt-ad-home-240x90').addService(googletag.pubads());
						googletag.defineSlot('/".$netDFP."/".$name_feedDFP."/Homepage/LeaderBoard', [728, 90], 'div-gpt-ad-home-728x90').addService(googletag.pubads());";
					break;
					// FALTA DEFAULT HOME
					
				}
				$cod_dinamic=execute_define("Page", $ConArray, NULL, $name_feedDFP, $name_sectionDFP, NULL, $postSlug);
				echo $cod_dinamic;

}

echo $cod_slots;?>
<?/*if(is_page("galerias")){?>
	googletag.pubads().enableAsyncRendering();
<?}else{?>
	googletag.pubads().enableSyncRendering();
<?}*/?>
googletag.pubads().enableSyncRendering();
googletag.pubads().enableSingleRequest();
googletag.pubads().collapseEmptyDivs();
googletag.enableServices();
</script>
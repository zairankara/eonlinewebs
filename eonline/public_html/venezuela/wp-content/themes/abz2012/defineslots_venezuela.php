<script type='text/javascript' data-device='1'>
(function() {
var useSSL = 'https:' == document.location.protocol;
var src = (useSSL ? 'https:' : 'http:') +
'//www.googletagservices.com/tag/js/gpt.js';
document.write('<scr' + 'ipt src="' + src + '"></scr' + 'ipt>');
})();
</script>

<script type='text/javascript'>
<?
$cod_single="";
$cod_slots="";

if(is_home() || is_search() || is_tag()){

				/*while ( have_posts() ) : the_post(); 
				$id_cod=get_the_ID();
				$cod_single.="googletag.defineSlot('/8877/Venezuela/Homepage/Patrocinio_post', [310, 30], 'div-gpt-ad-home-310x30-".$id_cod."').addService(googletag.pubads()).setTargeting('postid', ".$id_cod.");";
				endwhile;*/
					$cod_slots="googletag.defineSlot('/8877/Venezuela/Homepage/BoxBanner_1', [300, 250], 'div-gpt-ad-home-300x250-1').addService(googletag.pubads());
					googletag.defineSlot('/8877/Venezuela/Homepage/BoxBanner_2', [300, 250], 'div-gpt-ad-home-300x250-2').addService(googletag.pubads());
					googletag.defineSlot('/8877/Venezuela/Homepage/Floating', [720, 300], 'div-gpt-ad-home-720x300').addService(googletag.pubads());
					googletag.defineSlot('/8877/Venezuela/Homepage/Header_Chico', [240, 90], 'div-gpt-ad-home-240x90').addService(googletag.pubads());
					googletag.defineSlot('/8877/Venezuela/Homepage/Imperdible', [170, 30], 'div-gpt-ad-home-170x30').addService(googletag.pubads());
					googletag.defineSlot('/8877/Venezuela/Homepage/LeaderBoard', [728, 90], 'div-gpt-ad-home-728x90').addService(googletag.pubads());
					googletag.defineSlot('/8877/Venezuela/Homepage/PageBanner', [960, 400], 'div-gpt-ad-home-960x400').addService(googletag.pubads());
					googletag.defineSlot('/8877/Venezuela/Homepage/Pushdown', [970, 90], 'div-gpt-ad-home-970x90').addService(googletag.pubads());
					googletag.defineOutOfPageSlot('/8877/Venezuela/Homepage/Floating_3ros', 'div-gpt-ad-home-floating_3ros').addService(googletag.pubads());
					googletag.defineSlot('/8877/Venezuela/Homepage/Skin', [2000, 1000], 'div-gpt-ad-home-2000x1000').addService(googletag.pubads());
					googletag.defineSlot('/8877/Venezuela/Homepage/Billboard', [970, 31], 'div-gpt-ad-home-970x31').addService(googletag.pubads());
					googletag.defineSlot('/8877/Venezuela/Homepage/Toppost', [630, 50], 'div-gpt-ad-home-630x50').addService(googletag.pubads());";
				echo $cod_single;
}elseif(is_404()){
				$cod_slots="googletag.defineSlot('/8877/Venezuela/Homepage/Header_Chico', [240, 90], 'div-gpt-ad-home-240x90').addService(googletag.pubads());
									googletag.defineSlot('/8877/Venezuela/Homepage/LeaderBoard', [728, 90], 'div-gpt-ad-home-728x90').addService(googletag.pubads());
									googletag.defineSlot('/8877/Venezuela/Homepage/Skin', [2000, 1000], 'div-gpt-ad-home-2000x1000').addService(googletag.pubads());";

}elseif(is_category() || is_single()){
				
				if(is_single()){
					/*$array_count=explode(",", get_the_category_list( ', ' ));

					if(count($array_count)==1){
						$get_cat = get_the_category();
	  					$postSlug = $get_cat[0]->slug;
					}*/
					$categorias="";

					$cont=0;
					foreach((get_the_category()) as $category) {
						 if ($cont==0) {$categorias.="[";};
						 $categorias.='"'.$category->slug.'",';
						 $cont++;
					}
					$categorias = trim($categorias, ',');
					$categorias.="]";

					$id_cod=get_the_ID();
					//$cod_single="googletag.defineSlot('/8877/Venezuela/Homepage/Patrocinio_post', [310, 30], 'div-gpt-ad-home-310x30-".$id_cod."').addService(googletag.pubads()).setTargeting('postid', ".$id_cod.");";
					$cod_slots="googletag.defineSlot('/8877/Venezuela/Nota/BoxBanner_1', [300, 250], 'div-gpt-ad-Post-300x250-1').addService(googletag.pubads()).setTargeting('postid', '".$id_cod."');
					googletag.defineSlot('/8877/Venezuela/Nota/BoxBanner_2', [300, 250], 'div-gpt-ad-Post-300x250-2').addService(googletag.pubads()).setTargeting('postid', '".$id_cod."');
					googletag.defineSlot('/8877/Venezuela/Nota/Header_Chico', [240, 90], 'div-gpt-ad-Post-240x90').addService(googletag.pubads()).setTargeting('postid', '".$id_cod."');
					googletag.defineSlot('/8877/Venezuela/Nota/LeaderBoard', [728, 90], 'div-gpt-ad-Post-728x90').addService(googletag.pubads()).setTargeting('postid', '".$id_cod."');
					googletag.pubads().setTargeting('category_name', ".$categorias.");";
	
				}else{
			        $cat = get_term_by('name', single_cat_title('',false), 'category'); 
			        $postSlug=$cat->slug;
			        /*while ( have_posts() ) : the_post(); 
			          $id_cod=get_the_ID();
			          $cod_single.="googletag.defineSlot('/8877/Venezuela/Homepage/Patrocinio_post', [310, 30], 'div-gpt-ad-".$postSlug."-310x30-".$id_cod."').addService(googletag.pubads()).setTargeting('postid', ".$id_cod.");";
			        endwhile;*/
				
					switch($postSlug){
						case "enews":
							$cod_slots="googletag.defineSlot('/8877/Venezuela/Enews/BoxBanner_1', [300, 250], 'div-gpt-ad-enews-300x250-1').addService(googletag.pubads());
										googletag.defineSlot('/8877/Venezuela/Enews/BoxBanner_2', [300, 250], 'div-gpt-ad-enews-300x250-2').addService(googletag.pubads());
										googletag.defineSlot('/8877/Venezuela/Enews/Header_Chico', [240, 90], 'div-gpt-ad-enews-240x90').addService(googletag.pubads());
										googletag.defineSlot('/8877/Venezuela/Enews/LeaderBoard', [728, 90], 'div-gpt-ad-enews-728x90').addService(googletag.pubads());
										googletag.defineSlot('/8877/Venezuela/Enews/Floating', [720, 300], 'div-gpt-ad-enews-720x300').addService(googletag.pubads());
										googletag.defineOutOfPageSlot('/8877/Venezuela/Enews/Floating_3ros', 'div-gpt-ad-enews-floating_3ros').addService(googletag.pubads());
										googletag.defineSlot('/8877/Venezuela/Enews/Skin', [2000, 1000], 'div-gpt-ad-enews-2000x1000').addService(googletag.pubads());";
						break;
						case "marriedtojonas":
							$cod_slots="googletag.defineSlot('/8877/Venezuela/MarriedToJonas/BoxBanner_1', [300, 250], 'div-gpt-ad-marriedtojonas-300x250-1').addService(googletag.pubads());
										googletag.defineSlot('/8877/Venezuela/MarriedToJonas/BoxBanner_2', [300, 250], 'div-gpt-ad-marriedtojonas-300x250-2').addService(googletag.pubads());
										googletag.defineSlot('/8877/Venezuela/MarriedToJonas/Header_Chico', [240, 90], 'div-gpt-ad-marriedtojonas-240x90').addService(googletag.pubads());
										googletag.defineSlot('/8877/Venezuela/MarriedToJonas/LeaderBoard', [728, 90], 'div-gpt-ad-marriedtojonas-728x90').addService(googletag.pubads());
										googletag.defineOutOfPageSlot('/8877/Venezuela/MarriedToJonas/Floating_3ros', 'div-gpt-ad-marriedtojonas-floating_3ros').addService(googletag.pubads());
										googletag.defineSlot('/8877/Venezuela/MarriedToJonas/Skin', [2000, 1000], 'div-gpt-ad-marriedtojonas-2000x1000').addService(googletag.pubads());";
						break;
						case "the-royals":
							$cod_slots="googletag.defineSlot('/8877/Venezuela/The_Royals/BoxBanner_1', [300, 250], 'div-gpt-ad-the-royals-300x250-1').addService(googletag.pubads());
										googletag.defineSlot('/8877/Venezuela/The_Royals/BoxBanner_2', [300, 250], 'div-gpt-ad-the-royals-300x250-2').addService(googletag.pubads());
										googletag.defineSlot('/8877/Venezuela/The_Royals/Header_Chico', [240, 90], 'div-gpt-ad-the-royals-240x90').addService(googletag.pubads());
										googletag.defineSlot('/8877/Venezuela/The_Royals/LeaderBoard', [728, 90], 'div-gpt-ad-the-royals-728x90').addService(googletag.pubads());
										googletag.defineSlot('/8877/Venezuela/The_Royals/Skin', [2000, 1000], 'div-gpt-ad-the-royals-2000x1000').addService(googletag.pubads());";
						break;
						case "musica":
							$cod_slots="googletag.defineSlot('/8877/Venezuela/Enews/BoxBanner_1', [300, 250], 'div-gpt-ad-musica-300x250-1').addService(googletag.pubads());
										googletag.defineSlot('/8877/Venezuela/Enews/BoxBanner_2', [300, 250], 'div-gpt-ad-musica-300x250-2').addService(googletag.pubads());
										googletag.defineSlot('/8877/Venezuela/Enews/Header_Chico', [240, 90], 'div-gpt-ad-musica-240x90').addService(googletag.pubads());
										googletag.defineSlot('/8877/Venezuela/Enews/LeaderBoard', [728, 90], 'div-gpt-ad-musica-728x90').addService(googletag.pubads());
										googletag.defineSlot('/8877/Venezuela/Enews/Skin', [2000, 1000], 'div-gpt-ad-musica-2000x1000').addService(googletag.pubads());";
						break;
						case "amamos-las-pelis":
							$cod_slots="googletag.defineSlot('/8877/Venezuela/Amamoslaspelis/BoxBanner_1', [300, 250], 'div-gpt-ad-amamos-las-pelis-300x250-1').addService(googletag.pubads());
										googletag.defineSlot('/8877/Venezuela/Enews/BoxBanner_2', [300, 250], 'div-gpt-ad-amamos-las-pelis-300x250-2').addService(googletag.pubads());
										googletag.defineSlot('/8877/Venezuela/Enews/Header_Chico', [240, 90], 'div-gpt-ad-amamos-las-pelis-240x90').addService(googletag.pubads());
										googletag.defineSlot('/8877/Venezuela/Amamoslaspelis/LeaderBoard', [728, 90], 'div-gpt-ad-amamos-las-pelis-728x90').addService(googletag.pubads());
										googletag.defineSlot('/8877/Venezuela/Enews/Skin', [2000, 1000], 'div-gpt-ad-amamos-las-pelis-2000x1000').addService(googletag.pubads());
										googletag.defineOutOfPageSlot('/8877/Venezuela/Amamoslaspelis/Floating_3ros', 'div-gpt-ad-amamos-las-pelis-floating_3ros').addService(googletag.pubads());
										googletag.defineSlot('/8877/Venezuela/Amamoslaspelis/Floating', [720, 300], 'div-gpt-ad-amamos-las-pelis-720x300').addService(googletag.pubads());
										googletag.defineSlot('/8877/Venezuela/Amamoslaspelis/Toppost', [630, 50], 'div-gpt-ad-amamos-las-pelis-630x50').addService(googletag.pubads());";
						break;
						case "imperdible":
							$cod_slots="googletag.defineSlot('/8877/Venezuela/Enews/BoxBanner_1', [300, 250], 'div-gpt-ad-imperdible-300x250-1').addService(googletag.pubads());
										googletag.defineSlot('/8877/Venezuela/Enews/BoxBanner_2', [300, 250], 'div-gpt-ad-imperdible-300x250-2').addService(googletag.pubads());
										googletag.defineSlot('/8877/Venezuela/Enews/Header_Chico', [240, 90], 'div-gpt-ad-imperdible-240x90').addService(googletag.pubads());
										googletag.defineSlot('/8877/Venezuela/Enews/LeaderBoard', [728, 90], 'div-gpt-ad-imperdible-728x90').addService(googletag.pubads());
										googletag.defineSlot('/8877/Venezuela/Enews/Floating', [720, 300], 'div-gpt-ad-imperdible-720x300').addService(googletag.pubads());
										googletag.defineOutOfPageSlot('/8877/Venezuela/Enews/Floating_3ros', 'div-gpt-ad-imperdible-floating_3ros').addService(googletag.pubads());
										googletag.defineSlot('/8877/Venezuela/Enews/Skin', [2000, 1000], 'div-gpt-ad-imperdible-2000x1000').addService(googletag.pubads());";
						break;
						case "estrenos":
							$cod_slots="googletag.defineSlot('/8877/Venezuela/Enews/BoxBanner_1', [300, 250], 'div-gpt-ad-estrenos-300x250-1').addService(googletag.pubads());
										googletag.defineSlot('/8877/Venezuela/Enews/BoxBanner_2', [300, 250], 'div-gpt-ad-estrenos-300x250-2').addService(googletag.pubads());
										googletag.defineSlot('/8877/Venezuela/Enews/Header_Chico', [240, 90], 'div-gpt-ad-estrenos-240x90').addService(googletag.pubads());
										googletag.defineSlot('/8877/Venezuela/Enews/LeaderBoard', [728, 90], 'div-gpt-ad-estrenos-728x90').addService(googletag.pubads());
										googletag.defineSlot('/8877/Venezuela/Enews/Skin', [2000, 1000], 'div-gpt-ad-estrenos-2000x1000').addService(googletag.pubads());";
						break;
						case "foto-del-dia-2":
							$cod_slots="googletag.defineSlot('/8877/Venezuela/Enews/BoxBanner_1', [300, 250], 'div-gpt-ad-foto-del-dia-2-300x250-1').addService(googletag.pubads());
										googletag.defineSlot('/8877/Venezuela/Enews/BoxBanner_2', [300, 250], 'div-gpt-ad-foto-del-dia-2-300x250-2').addService(googletag.pubads());
										googletag.defineSlot('/8877/Venezuela/Enews/Header_Chico', [240, 90], 'div-gpt-ad-foto-del-dia-2-240x90').addService(googletag.pubads());
										googletag.defineSlot('/8877/Venezuela/Enews/LeaderBoard', [728, 90], 'div-gpt-ad-foto-del-dia-2-728x90').addService(googletag.pubads());
										googletag.defineSlot('/8877/Venezuela/Enews/Skin', [2000, 1000], 'div-gpt-ad-foto-del-dia-2-2000x1000').addService(googletag.pubads());";
						break;
						case "copadelmundo":
							$cod_slots="googletag.defineSlot('/8877/Venezuela/Enews/BoxBanner_1', [300, 250], 'div-gpt-ad-copadelmundo-300x250-1').addService(googletag.pubads());
										googletag.defineSlot('/8877/Venezuela/Enews/BoxBanner_2', [300, 250], 'div-gpt-ad-copadelmundo-300x250-2').addService(googletag.pubads());
										googletag.defineSlot('/8877/Venezuela/Enews/Header_Chico', [240, 90], 'div-gpt-ad-copadelmundo-240x90').addService(googletag.pubads());
										googletag.defineSlot('/8877/Venezuela/Enews/LeaderBoard', [728, 90], 'div-gpt-ad-copadelmundo-728x90').addService(googletag.pubads());
										googletag.defineSlot('/8877/Venezuela/Enews/Skin', [2000, 1000], 'div-gpt-ad-copadelmundo-2000x1000').addService(googletag.pubads());
										googletag.defineOutOfPageSlot('/8877/Venezuela/Copadelmundo/Floating_3ros', 'div-gpt-ad-copadelmundo-floating_3ros').addService(googletag.pubads());
										googletag.defineSlot('/8877/Venezuela/Copadelmundo/Floating', [720, 300], 'div-gpt-ad-copadelmundo-720x300').addService(googletag.pubads());
										googletag.defineSlot('/8877/Venezuela/Copadelmundo/Toppost', [630, 50], 'div-gpt-ad-copadelmundo-630x50').addService(googletag.pubads());";
						break;
						case "lol":
							$cod_slots="googletag.defineSlot('/8877/Venezuela/Enews/BoxBanner_1', [300, 250], 'div-gpt-ad-lol-300x250-1').addService(googletag.pubads());
										googletag.defineSlot('/8877/Venezuela/Enews/BoxBanner_2', [300, 250], 'div-gpt-ad-lol-300x250-2').addService(googletag.pubads());
										googletag.defineSlot('/8877/Venezuela/Enews/Header_Chico', [240, 90], 'div-gpt-ad-lol-240x90').addService(googletag.pubads());
										googletag.defineSlot('/8877/Venezuela/Enews/LeaderBoard', [728, 90], 'div-gpt-ad-lol-728x90').addService(googletag.pubads());
										googletag.defineSlot('/8877/Venezuela/Enews/Floating', [720, 300], 'div-gpt-ad-lol-720x300').addService(googletag.pubads());
										googletag.defineOutOfPageSlot('/8877/Venezuela/Enews/Floating_3ros', 'div-gpt-ad-lol-floating_3ros').addService(googletag.pubads());
										googletag.defineSlot('/8877/Venezuela/Enews/Skin', [2000, 1000], 'div-gpt-ad-lol-2000x1000').addService(googletag.pubads());";
						break;
						case "efashionblogger":
							$cod_slots="googletag.defineSlot('/8877/Venezuela/EFashion_Blogger/BoxBanner_1', [300, 250], 'div-gpt-ad-efashionblogger-300x250-1').addService(googletag.pubads());
										googletag.defineSlot('/8877/Venezuela/EFashion_Blogger/Header_Chico', [240, 90], 'div-gpt-ad-efashionblogger-240x90').addService(googletag.pubads());
										googletag.defineSlot('/8877/Venezuela/EFashion_Blogger/LeaderBoard', [728, 90], 'div-gpt-ad-efashionblogger-728x90').addService(googletag.pubads());
										googletag.defineSlot('/8877/Venezuela/EFashion_Blogger/Floating', [720, 300], 'div-gpt-ad-efashionblogger-720x300').addService(googletag.pubads());
										googletag.defineOutOfPageSlot('/8877/Venezuela/EFashion_Blogger/Floating_3ros', 'div-gpt-ad-efashionblogger-floating_3ros').addService(googletag.pubads());
										googletag.defineSlot('/8877/Venezuela/EFashion_Blogger/Skin', [2000, 1000], 'div-gpt-ad-efashionblogger-2000x1000').addService(googletag.pubads());";

						break;
						case "the-kardashians":
							$cod_slots="googletag.defineSlot('/8877/Venezuela/Kardashians/BoxBanner_1', [300, 250], 'div-gpt-ad-the-kardashians-300x250-1').addService(googletag.pubads());
										googletag.defineSlot('/8877/Venezuela/Kardashians/Header_Chico', [240, 90], 'div-gpt-ad-the-kardashians-240x90').addService(googletag.pubads());
										googletag.defineSlot('/8877/Venezuela/Kardashians/LeaderBoard', [728, 90], 'div-gpt-ad-the-kardashians-728x90').addService(googletag.pubads());
										googletag.defineSlot('/8877/Venezuela/Kardashians/Floating', [720, 300], 'div-gpt-ad-the-kardashians-720x300').addService(googletag.pubads());
										googletag.defineOutOfPageSlot('/8877/Venezuela/Kardashians/Floating_3ros', 'div-gpt-ad-the-kardashians-floating_3ros').addService(googletag.pubads());
										googletag.defineSlot('/8877/Venezuela/Kardashians/Skin', [2000, 1000], 'div-gpt-ad-the-kardashians-2000x1000').addService(googletag.pubads());";
						break;
						case "thetrend":
							$cod_slots="googletag.defineSlot('/8877/Venezuela/The_Trend/BoxBanner_1', [300, 250], 'div-gpt-ad-thetrend-300x250-1').addService(googletag.pubads());
										googletag.defineSlot('/8877/Venezuela/The_Trend/BoxBanner_2', [300, 250], 'div-gpt-ad-thetrend-300x250-2').addService(googletag.pubads());
										googletag.defineSlot('/8877/Venezuela/The_Trend/Header_Chico', [240, 90], 'div-gpt-ad-thetrend-240x90').addService(googletag.pubads());
										googletag.defineSlot('/8877/Venezuela/The_Trend/Floating', [720, 300], 'div-gpt-ad-thetrend-720x300').addService(googletag.pubads());
										googletag.defineSlot('/8877/Venezuela/The_Trend/LeaderBoard', [728, 90], 'div-gpt-ad-thetrend-728x90').addService(googletag.pubads());
										googletag.defineOutOfPageSlot('/8877/Venezuela/The_Trend/Floating_3ros', 'div-gpt-ad-thetrend-floating_3ros').addService(googletag.pubads());
										googletag.defineSlot('/8877/Venezuela/The_Trend/Skin', [2000, 1000], 'div-gpt-ad-thetrend-2000x1000').addService(googletag.pubads());";
						break;
						case "alfombraroja":
							$cod_slots="googletag.defineSlot('/8877/Venezuela/RedCarpet/BoxBanner_1', [300, 250], 'div-gpt-ad-alfombraroja-300x250-1').addService(googletag.pubads());
										googletag.defineSlot('/8877/Venezuela/RedCarpet/BoxBanner_2', [300, 250], 'div-gpt-ad-alfombraroja-300x250-2').addService(googletag.pubads());
										googletag.defineSlot('/8877/Venezuela/RedCarpet/Header_Chico', [240, 90], 'div-gpt-ad-alfombraroja-240x90').addService(googletag.pubads());
										googletag.defineSlot('/8877/Venezuela/RedCarpet/LeaderBoard', [728, 90], 'div-gpt-ad-alfombraroja-728x90').addService(googletag.pubads());
										googletag.defineSlot('/8877/Venezuela/RedCarpet/Floating', [720, 300], 'div-gpt-ad-alfombraroja-720x300').addService(googletag.pubads());
										googletag.defineOutOfPageSlot('/8877/Venezuela/RedCarpet/Floating_3ros', 'div-gpt-ad-alfombraroja-floating_3ros').addService(googletag.pubads());
										googletag.defineSlot('/8877/Venezuela/RedCarpet/Skin', [2000, 1000], 'div-gpt-ad-alfombraroja-2000x1000').addService(googletag.pubads());";
						break;
						case "goldenglobe":
							$cod_slots="googletag.defineSlot('/8877/Venezuela/RedCarpet/Golden_Globe_Awards/BoxBanner_1', [300, 250], 'div-gpt-ad-goldenglobe-300x250-1').addService(googletag.pubads());
										googletag.defineSlot('/8877/Venezuela/RedCarpet/Golden_Globe_Awards/BoxBanner_2', [300, 250], 'div-gpt-ad-goldenglobe-300x250-2').addService(googletag.pubads());
										googletag.defineSlot('/8877/Venezuela/RedCarpet/Golden_Globe_Awards/Header_Chico', [240, 90], 'div-gpt-ad-goldenglobe-240x90').addService(googletag.pubads());
										googletag.defineSlot('/8877/Venezuela/RedCarpet/Golden_Globe_Awards/LeaderBoard', [728, 90], 'div-gpt-ad-goldenglobe-728x90').addService(googletag.pubads());
										googletag.defineSlot('/8877/Venezuela/RedCarpet/Golden_Globe_Awards/Skin', [2000, 1000], 'div-gpt-ad-goldenglobe-2000x1000').addService(googletag.pubads());";
						break;
						case "sag":
							$cod_slots="googletag.defineSlot('/8877/Venezuela/RedCarpet/Sag_Awards/BoxBanner_1', [300, 250], 'div-gpt-ad-sag-300x250-1').addService(googletag.pubads());
										googletag.defineSlot('/8877/Venezuela/RedCarpet/Sag_Awards/BoxBanner_2', [300, 250], 'div-gpt-ad-sag-300x250-2').addService(googletag.pubads());
										googletag.defineSlot('/8877/Venezuela/RedCarpet/Sag_Awards/Header_Chico', [240, 90], 'div-gpt-ad-sag-240x90').addService(googletag.pubads());
										googletag.defineSlot('/8877/Venezuela/RedCarpet/Sag_Awards/LeaderBoard', [728, 90], 'div-gpt-ad-sag-728x90').addService(googletag.pubads());
										googletag.defineSlot('/8877/Venezuela/RedCarpet/Sag_Awards/Skin', [2000, 1000], 'div-gpt-ad-sag-2000x1000').addService(googletag.pubads());";
						break;
						case "grammy":
							$cod_slots="googletag.defineSlot('/8877/Venezuela/RedCarpet/Grammy_Awards/BoxBanner_1', [300, 250], 'div-gpt-ad-grammy-300x250-1').addService(googletag.pubads());
										googletag.defineSlot('/8877/Venezuela/RedCarpet/Grammy_Awards/BoxBanner_2', [300, 250], 'div-gpt-ad-grammy-300x250-2').addService(googletag.pubads());
										googletag.defineSlot('/8877/Venezuela/RedCarpet/Grammy_Awards/Header_Chico', [240, 90], 'div-gpt-ad-grammy-240x90').addService(googletag.pubads());
										googletag.defineSlot('/8877/Venezuela/RedCarpet/Grammy_Awards/LeaderBoard', [728, 90], 'div-gpt-ad-grammy-728x90').addService(googletag.pubads());
										googletag.defineSlot('/8877/Venezuela/RedCarpet/Grammy_Awards/Skin', [2000, 1000], 'div-gpt-ad-grammy-2000x1000').addService(googletag.pubads());";
						break;
						case "oscar":
							$cod_slots="googletag.defineSlot('/8877/Venezuela/RedCarpet/Oscar_Awards/BoxBanner_1', [300, 250], 'div-gpt-ad-oscar-300x250-1').addService(googletag.pubads());
										googletag.defineSlot('/8877/Venezuela/RedCarpet/Oscar_Awards/BoxBanner_2', [300, 250], 'div-gpt-ad-oscar-300x250-2').addService(googletag.pubads());
										googletag.defineSlot('/8877/Venezuela/RedCarpet/Oscar_Awards/Header_Chico', [240, 90], 'div-gpt-ad-oscar-240x90').addService(googletag.pubads());
										googletag.defineSlot('/8877/Venezuela/RedCarpet/Oscar_Awards/LeaderBoard', [728, 90], 'div-gpt-ad-oscar-728x90').addService(googletag.pubads());
										googletag.defineSlot('/8877/Venezuela/RedCarpet/Oscar_Awards/Skin', [2000, 1000], 'div-gpt-ad-oscar-2000x1000').addService(googletag.pubads());";
						break;
						case "latinbillboard":
							$cod_slots="googletag.defineSlot('/8877/Venezuela/RedCarpet/Latin_Billboard/BoxBanner_1', [300, 250], 'div-gpt-ad-latinbillboard-300x250-1').addService(googletag.pubads());
										googletag.defineSlot('/8877/Venezuela/RedCarpet/Latin_Billboard/BoxBanner_2', [300, 250], 'div-gpt-ad-latinbillboard-300x250-2').addService(googletag.pubads());
										googletag.defineSlot('/8877/Venezuela/RedCarpet/Latin_Billboard/Header_Chico', [240, 90], 'div-gpt-ad-latinbillboard-240x90').addService(googletag.pubads());
										googletag.defineSlot('/8877/Venezuela/RedCarpet/Latin_Billboard/LeaderBoard', [728, 90], 'div-gpt-ad-latinbillboard-728x90').addService(googletag.pubads());
										googletag.defineSlot('/8877/Venezuela/RedCarpet/Latin_Billboard/Skin', [2000, 1000], 'div-gpt-ad-latinbillboard-2000x1000').addService(googletag.pubads());";
						break;
						case "emmy":
							$cod_slots="googletag.defineSlot('/8877/Venezuela/RedCarpet/Emmy_Awards/BoxBanner_1', [300, 250], 'div-gpt-ad-emmy-300x250-1').addService(googletag.pubads());
										googletag.defineSlot('/8877/Venezuela/RedCarpet/Emmy_Awards/BoxBanner_2', [300, 250], 'div-gpt-ad-emmy-300x250-2').addService(googletag.pubads());
										googletag.defineSlot('/8877/Venezuela/RedCarpet/Emmy_Awards/Header_Chico', [240, 90], 'div-gpt-ad-emmy-240x90').addService(googletag.pubads());
										googletag.defineSlot('/8877/Venezuela/RedCarpet/Emmy_Awards/LeaderBoard', [728, 90], 'div-gpt-ad-emmy-728x90').addService(googletag.pubads());
										googletag.defineSlot('/8877/Venezuela/RedCarpet/Emmy_Awards/Floating', [720, 300], 'div-gpt-ad-emmy-720x300').addService(googletag.pubads());
										googletag.defineOutOfPageSlot('/8877/Venezuela/RedCarpet/Emmy_Awards/Floating_3ros', 'div-gpt-ad-emmy-floating_3ros').addService(googletag.pubads());
										googletag.defineSlot('/8877/Venezuela/RedCarpet/Emmy_Awards/Skin', [2000, 1000], 'div-gpt-ad-emmy-2000x1000').addService(googletag.pubads());";
						break;
						case "wakeup":
							$cod_slots="googletag.defineSlot('/8877/Venezuela/WakeUp/Boxbanner_1', [300, 250], 'div-gpt-ad-wakeup-300x250-1').addService(googletag.pubads());
										googletag.defineSlot('/8877/Venezuela/WakeUp/Header_chico', [240, 90], 'div-gpt-ad-wakeup-240x90').addService(googletag.pubads());
										googletag.defineSlot('/8877/Venezuela/WakeUp/LeaderBoard', [728, 90], 'div-gpt-ad-wakeup-728x90').addService(googletag.pubads());
										googletag.defineOutOfPageSlot('/8877/Venezuela/WakeUp/Floating_3ros', 'div-gpt-ad-wakeup-floating_3ros').addService(googletag.pubads());
										googletag.defineSlot('/8877/Venezuela/WakeUp/Skin', [2000, 1000], 'div-gpt-ad-wakeup-2000x1000').addService(googletag.pubads());";
						break;
						case "personajes-wakeup":
							$cod_slots="googletag.defineSlot('/8877/Venezuela/WakeUp/Boxbanner_1', [300, 250], 'div-gpt-ad-personajes-wakeup-300x250-1').addService(googletag.pubads());
										googletag.defineSlot('/8877/Venezuela/WakeUp/Header_chico', [240, 90], 'div-gpt-ad-personajes-wakeup-240x90').addService(googletag.pubads());
										googletag.defineSlot('/8877/Venezuela/WakeUp/LeaderBoard', [728, 90], 'div-gpt-ad-personajes-wakeup-728x90').addService(googletag.pubads());
										googletag.defineSlot('/8877/Venezuela/WakeUp/Skin', [2000, 1000], 'div-gpt-ad-personajes-wakeup-2000x1000').addService(googletag.pubads());";
						break;
						case "sinopsis":
							$cod_slots="googletag.defineSlot('/8877/Venezuela/WakeUp/Boxbanner_1', [300, 250], 'div-gpt-ad-sinopsis-300x250-1').addService(googletag.pubads());
										googletag.defineSlot('/8877/Venezuela/WakeUp/Header_chico', [240, 90], 'div-gpt-ad-sinopsis-240x90').addService(googletag.pubads());
										googletag.defineSlot('/8877/Venezuela/WakeUp/LeaderBoard', [728, 90], 'div-gpt-ad-sinopsis-728x90').addService(googletag.pubads());
										googletag.defineSlot('/8877/Venezuela/WakeUp/Skin', [2000, 1000], 'div-gpt-ad-sinopsis-2000x1000').addService(googletag.pubads());";
						break;
						case "horarios":
								$cod_slots="googletag.defineSlot('/8877/Venezuela/WakeUp/Boxbanner_1', [300, 250], 'div-gpt-ad-horarios-300x250-1').addService(googletag.pubads());
										googletag.defineSlot('/8877/Venezuela/WakeUp/Header_chico', [240, 90], 'div-gpt-ad-horarios-240x90').addService(googletag.pubads());
										googletag.defineSlot('/8877/Venezuela/WakeUp/LeaderBoard', [728, 90], 'div-gpt-ad-horarios-728x90').addService(googletag.pubads());
										googletag.defineSlot('/8877/Venezuela/WakeUp/Skin', [2000, 1000], 'div-gpt-ad-horarios-2000x1000').addService(googletag.pubads());";
						break;
						case "capitulos":
							$cod_slots="googletag.defineSlot('/8877/Venezuela/WakeUp/Boxbanner_1', [300, 250], 'div-gpt-ad-capitulos-300x250-1').addService(googletag.pubads());
										googletag.defineSlot('/8877/Venezuela/WakeUp/Header_chico', [240, 90], 'div-gpt-ad-capitulos-240x90').addService(googletag.pubads());
										googletag.defineSlot('/8877/Venezuela/WakeUp/LeaderBoard', [728, 90], 'div-gpt-ad-capitulos-728x90').addService(googletag.pubads());
										googletag.defineSlot('/8877/Venezuela/WakeUp/Skin', [2000, 1000], 'div-gpt-ad-capitulos-2000x1000').addService(googletag.pubads());";
						break;
						case "galeria-wakeup":
							$cod_slots="googletag.defineSlot('/8877/Venezuela/WakeUp/Boxbanner_1', [300, 250], 'div-gpt-ad-galeria-wakeup-300x250-1').addService(googletag.pubads());
										googletag.defineSlot('/8877/Venezuela/WakeUp/Header_chico', [240, 90], 'div-gpt-ad-galeria-wakeup-240x90').addService(googletag.pubads());
										googletag.defineSlot('/8877/Venezuela/WakeUp/LeaderBoard', [728, 90], 'div-gpt-ad-galeria-wakeup-728x90').addService(googletag.pubads());
										googletag.defineSlot('/8877/Venezuela/WakeUp/Skin', [2000, 1000], 'div-gpt-ad-galeria-wakeup-2000x1000').addService(googletag.pubads());";
						break;
						case "e-shows":
							$cod_slots="googletag.defineSlot('/8877/Venezuela/Eshows/BoxBanner_1', [300, 250], 'div-gpt-ad-e-shows-300x250-1').addService(googletag.pubads());
										googletag.defineSlot('/8877/Venezuela/Eshows/Header_Chico', [240, 90], 'div-gpt-ad-e-shows-240x90').addService(googletag.pubads());
										googletag.defineSlot('/8877/Venezuela/Eshows/LeaderBoard', [728, 90], 'div-gpt-ad-e-shows-728x90').addService(googletag.pubads());
										googletag.defineSlot('/8877/Venezuela/Eshows/Floating', [720, 300], 'div-gpt-ad-e-shows-720x300').addService(googletag.pubads());
										googletag.defineOutOfPageSlot('/8877/Venezuela/Eshows/Floating_3ros', 'div-gpt-ad-e-shows-floating_3ros').addService(googletag.pubads());
										googletag.defineSlot('/8877/Venezuela/Eshows/Skin', [2000, 1000], 'div-gpt-ad-e-shows-2000x1000').addService(googletag.pubads());";
						break;
						// FALTA DEFAULT HOME
					}		
				}
				echo $cod_single;

}elseif(is_page()){
				$parent = get_page();
				$postSlug=$parent->post_name;
				//$postSlug="Page";
				switch($postSlug){
					case "glamcam360":
						$cod_slots="googletag.defineSlot('/8877/Venezuela/Glamcam360/BoxBanner_1', [300, 250], 'div-gpt-ad-glamcam360-300x250-1').addService(googletag.pubads());
									googletag.defineSlot('/8877/Venezuela/Glamcam360/Header_Chico', [240, 90], 'div-gpt-ad-glamcam360-240x90').addService(googletag.pubads());
									googletag.defineSlot('/8877/Venezuela/Glamcam360/LeaderBoard', [728, 90], 'div-gpt-ad-glamcam360-728x90').addService(googletag.pubads());
									googletag.defineSlot('/8877/Venezuela/Glamcam360/Floating', [720, 300], 'div-gpt-ad-glamcam360-720x300').addService(googletag.pubads());
									googletag.defineOutOfPageSlot('/8877/Venezuela/Glamcam360/Floating_3ros', 'div-gpt-ad-glamcam360-floating_3ros').addService(googletag.pubads());
									googletag.defineSlot('/8877/Venezuela/Glamcam360/Toppost', [630, 50], 'div-gpt-ad-glamcam360-630x50').addService(googletag.pubads());
									googletag.defineSlot('/8877/Venezuela/Glamcam360/Skin', [2000, 1000], 'div-gpt-ad-glamcam360-2000x1000').addService(googletag.pubads());";
					break;
					case "eshows":
						$cod_slots="googletag.defineSlot('/8877/Venezuela/Eshows/BoxBanner_1', [300, 250], 'div-gpt-ad-eshows-300x250-1').addService(googletag.pubads());
									googletag.defineSlot('/8877/Venezuela/Eshows/Header_Chico', [240, 90], 'div-gpt-ad-eshows-240x90').addService(googletag.pubads());
									googletag.defineSlot('/8877/Venezuela/Eshows/LeaderBoard', [728, 90], 'div-gpt-ad-eshows-728x90').addService(googletag.pubads());
									googletag.defineSlot('/8877/Venezuela/Eshows/Floating', [720, 300], 'div-gpt-ad-eshows-720x300').addService(googletag.pubads());
									googletag.defineSlot('/8877/Venezuela/Eshows/Skin', [2000, 1000], 'div-gpt-ad-eshows-2000x1000').addService(googletag.pubads());";
					break;
					case "fashionpolice":
						$cod_slots="googletag.defineSlot('/8877/Venezuela/Fashion_Police/BoxBanner_1', [300, 250], 'div-gpt-ad-fashionpolice-300x250-1').addService(googletag.pubads());
									googletag.defineSlot('/8877/Venezuela/Fashion_Police/Header_Chico', [240, 90], 'div-gpt-ad-fashionpolice-240x90').addService(googletag.pubads());
									googletag.defineSlot('/8877/Venezuela/Fashion_Police/LeaderBoard', [728, 90], 'div-gpt-ad-fashionpolice-728x90').addService(googletag.pubads());
									googletag.defineSlot('/8877/Venezuela/Fashion_Police/Floating', [720, 300], 'div-gpt-ad-fashionpolice-720x300').addService(googletag.pubads());
									googletag.defineOutOfPageSlot('/8877/Venezuela/Fashion_Police/Floating_3ros', 'div-gpt-ad-fashionpolice-floating_3ros').addService(googletag.pubads());
									googletag.defineSlot('/8877/Venezuela/Fashion_Police/Skin', [2000, 1000], 'div-gpt-ad-fashionpolice-2000x1000').addService(googletag.pubads());";
					break;
					case "zonatrendycaracas":
						$cod_slots="googletag.defineSlot('/8877/Venezuela/Vip_Caracas/BoxBanner_1', [300, 250], 'div-gpt-ad-zonatrendycaracas-300x250-1').addService(googletag.pubads());
									googletag.defineSlot('/8877/Venezuela/Vip_Caracas/Floating', [720, 300], 'div-gpt-ad-zonatrendycaracas-720x300').addService(googletag.pubads());
									googletag.defineSlot('/8877/Venezuela/Vip_Caracas/Header_Chico', [240, 90], 'div-gpt-ad-zonatrendycaracas-240x90').addService(googletag.pubads());
									googletag.defineSlot('/8877/Venezuela/Vip_Caracas/LeaderBoard', [728, 90], 'div-gpt-ad-zonatrendycaracas-728x90').addService(googletag.pubads());
									googletag.defineOutOfPageSlot('/8877/Venezuela/Vip_Caracas/Floating_3ros', 'div-gpt-ad-zonatrendycaracas-floating_3ros').addService(googletag.pubads());
									googletag.defineSlot('/8877/Venezuela/Vip_Caracas/Skin', [2000, 1000], 'div-gpt-ad-zonatrendycaracas-2000x1000').addService(googletag.pubads());";
					break;
					case "epop":
						$cod_slots="googletag.defineSlot('/8877/Venezuela/Epop/BoxBanner_1', [300, 250], 'div-gpt-ad-epop-300x250-1').addService(googletag.pubads());
									googletag.defineSlot('/8877/Venezuela/Epop/Header_Chico', [240, 90], 'div-gpt-ad-epop-240x90').addService(googletag.pubads());
									googletag.defineSlot('/8877/Venezuela/Epop/LeaderBoard', [728, 90], 'div-gpt-ad-epop-728x90').addService(googletag.pubads());
									googletag.defineSlot('/8877/Venezuela/Epop/Floating', [720, 300], 'div-gpt-ad-epop-720x300').addService(googletag.pubads());
									googletag.defineOutOfPageSlot('/8877/Venezuela/Epop/Floating_3ros', 'div-gpt-ad-epop-floating_3ros').addService(googletag.pubads());
									googletag.defineSlot('/8877/Venezuela/Epop/Skin', [2000, 1000], 'div-gpt-ad-epop-2000x1000').addService(googletag.pubads());";
					break;
					case "coffeebreak":
						$cod_slots="googletag.defineSlot('/8877/Venezuela/Coffe_Break/BoxBanner_1', [300, 250], 'div-gpt-ad-coffeebreak-300x250-1').addService(googletag.pubads());
									googletag.defineSlot('/8877/Venezuela/Coffe_Break/Header_Chico', [240, 90], 'div-gpt-ad-coffeebreak-240x90').addService(googletag.pubads());
									googletag.defineSlot('/8877/Venezuela/Coffe_Break/LeaderBoard', [728, 90], 'div-gpt-ad-coffeebreak-728x90').addService(googletag.pubads());
									googletag.defineSlot('/8877/Venezuela/Coffe_Break/Floating', [720, 300], 'div-gpt-ad-coffeebreak-720x300').addService(googletag.pubads());
									googletag.defineOutOfPageSlot('/8877/Venezuela/Coffe_Break/Floating_3ros', 'div-gpt-ad-coffeebreak-floating_3ros').addService(googletag.pubads());
									googletag.defineSlot('/8877/Venezuela/Coffe_Break/Skin', [2000, 1000], 'div-gpt-ad-coffeebreak-2000x1000').addService(googletag.pubads());";
					break;
					case "lasopavenezuela":
						$cod_slots="googletag.defineSlot('/8877/Venezuela/La_Sopa/BoxBanner_1', [300, 250], 'div-gpt-ad-lasopavenezuela-300x250-1').addService(googletag.pubads());
									googletag.defineSlot('/8877/Venezuela/La_Sopa/Header_Chico', [240, 90], 'div-gpt-ad-lasopavenezuela-240x90').addService(googletag.pubads());
									googletag.defineSlot('/8877/Venezuela/La_Sopa/LeaderBoard', [728, 90], 'div-gpt-ad-lasopavenezuela-728x90').addService(googletag.pubads());
									googletag.defineSlot('/8877/Venezuela/La_Sopa/Floating', [720, 300], 'div-gpt-ad-lasopavenezuela-720x300').addService(googletag.pubads());
									googletag.defineOutOfPageSlot('/8877/Venezuela/La_Sopa/Floating_3ros', 'div-gpt-ad-lasopavenezuela-floating_3ros').addService(googletag.pubads());
									googletag.defineSlot('/8877/Venezuela/La_Sopa/Skin', [2000, 1000], 'div-gpt-ad-lasopavenezuela-2000x1000').addService(googletag.pubads());";
					break;
					case "programas":
						$cod_slots="googletag.defineSlot('/8877/Venezuela/Programacion/Header_Chico', [240, 90], 'div-gpt-ad-programas-240x90').addService(googletag.pubads());
									googletag.defineSlot('/8877/Venezuela/Programacion/LeaderBoard', [728, 90], 'div-gpt-ad-programas-728x90').addService(googletag.pubads());
									googletag.defineSlot('/8877/Venezuela/Programacion/Floating', [720, 300], 'div-gpt-ad-programas-720x300').addService(googletag.pubads());
									googletag.defineOutOfPageSlot('/8877/Venezuela/Programacion/Floating_3ros', 'div-gpt-ad-programas-floating_3ros').addService(googletag.pubads());
									googletag.defineSlot('/8877/Venezuela/Programacion/Skin', [2000, 1000], 'div-gpt-ad-programas-2000x1000').addService(googletag.pubads());";
					break;
					case "fotos-venezuela":
						$cod_slots="googletag.defineSlot('/8877/Venezuela/Fotos/BoxBanner_1', [300, 250], 'div-gpt-ad-fotos-venezuela-300x250-1').addService(googletag.pubads());
									googletag.defineSlot('/8877/Venezuela/Fotos/Header_Chico', [240, 90], 'div-gpt-ad-fotos-venezuela-240x90').addService(googletag.pubads());
									googletag.defineSlot('/8877/Venezuela/Fotos/LeaderBoard', [728, 90], 'div-gpt-ad-fotos-venezuela-728x90').addService(googletag.pubads());
									googletag.defineSlot('/8877/Venezuela/Fotos/Floating', [720, 300], 'div-gpt-ad-fotos-venezuela-720x300').addService(googletag.pubads());
									googletag.defineOutOfPageSlot('/8877/Venezuela/Fotos/Floating_3ros', 'div-gpt-ad-fotos-venezuela-floating_3ros').addService(googletag.pubads());
									googletag.defineSlot('/8877/Venezuela/Fotos/Skin', [2000, 1000], 'div-gpt-ad-fotos-venezuela-2000x1000').addService(googletag.pubads());";
					break;
					case "galerias":
						$idGallery=$_GET["gallery"];
						$cod_slots="googletag.defineSlot('/8877/Venezuela/Galerias/BoxBanner_1', [300, 250], 'div-gpt-ad-galerias-300x250-1').addService(googletag.pubads()).setTargeting('galleryid', ".$idGallery.");
									googletag.defineSlot('/8877/Venezuela/Galerias/Patrocinio', [300, 50], 'div-gpt-ad-galerias-300x50').addService(googletag.pubads()).setTargeting('galleryid', ".$idGallery.");
									googletag.defineSlot('/8877/Venezuela/Galerias/Header_Chico', [240, 90], 'div-gpt-ad-galerias-240x90').addService(googletag.pubads());
									googletag.defineSlot('/8877/Venezuela/Galerias/LeaderBoard', [728, 90], 'div-gpt-ad-galerias-728x90').addService(googletag.pubads());
									googletag.defineSlot('/8877/Venezuela/Galerias/Floating', [720, 300], 'div-gpt-ad-galerias-720x300').addService(googletag.pubads());
									googletag.defineOutOfPageSlot('/8877/Venezuela/Galerias/Floating_3ros', 'div-gpt-ad-galerias-floating_3ros').addService(googletag.pubads());
									googletag.defineSlot('/8877/Venezuela/Galerias/Skin', [2000, 1000], 'div-gpt-ad-galerias-2000x1000').addService(googletag.pubads());";
					break;
					case "videos-2":
						$cod_slots="googletag.defineSlot('/8877/Venezuela/Videos/Header_Chico', [240, 90], 'div-gpt-ad-videos-2-240x90').addService(googletag.pubads());
									googletag.defineSlot('/8877/Venezuela/Videos/LeaderBoard', [728, 90], 'div-gpt-ad-videos-2-728x90').addService(googletag.pubads());
									googletag.defineOutOfPageSlot('/8877/Venezuela/Videos/Floating_3ros', 'div-gpt-ad-videos-2-floating_3ros').addService(googletag.pubads());
									googletag.defineSlot('/8877/Venezuela/Videos/Skin', [2000, 1000], 'div-gpt-ad-videos-2-2000x1000').addService(googletag.pubads());";
					break;
					case "app":
						$cod_slots="googletag.defineSlot('/8877/Venezuela/Homepage/Header_Chico', [240, 90], 'div-gpt-ad-app-240x90').addService(googletag.pubads());
									googletag.defineSlot('/8877/Venezuela/Homepage/Floating', [720, 300], 'div-gpt-ad-app-720x300').addService(googletag.pubads());
									googletag.defineOutOfPageSlot('/8877/Venezuela/Homepage/Floating_3ros', 'div-gpt-ad-app-floating_3ros').addService(googletag.pubads());
									googletag.defineSlot('/8877/Venezuela/Homepage/LeaderBoard', [728, 90], 'div-gpt-ad-app-728x90').addService(googletag.pubads());";
					break;
					case "timeline":
						$cod_slots="googletag.defineSlot('/8877/Venezuela/Homepage/Header_Chico', [240, 90], 'div-gpt-ad-timeline-240x90').addService(googletag.pubads());
									googletag.defineSlot('/8877/Venezuela/Homepage/LeaderBoard', [728, 90], 'div-gpt-ad-timeline-728x90').addService(googletag.pubads());";
					break;
					case "contacto":
						$cod_slots="googletag.defineSlot('/8877/Venezuela/Homepage/BoxBanner_1', [300, 250], 'div-gpt-ad-contacto-300x250-1').addService(googletag.pubads());
									googletag.defineSlot('/8877/Venezuela/Homepage/Header_Chico', [240, 90], 'div-gpt-ad-contacto-240x90').addService(googletag.pubads());
									googletag.defineSlot('/8877/Venezuela/Homepage/LeaderBoard', [728, 90], 'div-gpt-ad-contacto-728x90').addService(googletag.pubads());
									googletag.defineSlot('/8877/Venezuela/Homepage/Floating', [720, 300], 'div-gpt-ad-contacto-720x300').addService(googletag.pubads());
									googletag.defineOutOfPageSlot('/8877/Venezuela/Homepage/Floating_3ros', 'div-gpt-ad-contacto-floating_3ros').addService(googletag.pubads());
									googletag.defineSlot('/8877/Venezuela/Homepage/Skin', [2000, 1000], 'div-gpt-ad-contacto-2000x1000').addService(googletag.pubads());";
					break;
					case "politicas-de-privacidad":
						$cod_slots="googletag.defineSlot('/8877/Venezuela/Homepage/BoxBanner_1', [300, 250], 'div-gpt-ad-politicas-de-privacidad-300x250-1').addService(googletag.pubads());
									googletag.defineSlot('/8877/Venezuela/Homepage/Header_Chico', [240, 90], 'div-gpt-ad-politicas-de-privacidad-240x90').addService(googletag.pubads());
									googletag.defineSlot('/8877/Venezuela/Homepage/LeaderBoard', [728, 90], 'div-gpt-ad-politicas-de-privacidad-728x90').addService(googletag.pubads());
									googletag.defineSlot('/8877/Venezuela/Homepage/Floating', [720, 300], 'div-gpt-ad-politicas-de-privacidad-720x300').addService(googletag.pubads());
									googletag.defineOutOfPageSlot('/8877/Venezuela/Homepage/Floating_3ros', 'div-gpt-ad-politicas-de-privacidad-floating_3ros').addService(googletag.pubads());
									googletag.defineSlot('/8877/Venezuela/Homepage/Skin', [2000, 1000], 'div-gpt-ad-politicas-de-privacidad-2000x1000').addService(googletag.pubads());";
					break;
					case "terminos-de-uso":
						$cod_slots="googletag.defineSlot('/8877/Venezuela/Homepage/BoxBanner_1', [300, 250], 'div-gpt-ad-terminos-de-uso-300x250-1').addService(googletag.pubads());
									googletag.defineSlot('/8877/Venezuela/Homepage/Header_Chico', [240, 90], 'div-gpt-ad-terminos-de-uso-240x90').addService(googletag.pubads());
									googletag.defineSlot('/8877/Venezuela/Homepage/LeaderBoard', [728, 90], 'div-gpt-ad-terminos-de-uso-728x90').addService(googletag.pubads());
									googletag.defineSlot('/8877/Venezuela/Homepage/Floating', [720, 300], 'div-gpt-ad-terminos-de-uso-720x300').addService(googletag.pubads());
									googletag.defineOutOfPageSlot('/8877/Venezuela/Homepage/Floating_3ros', 'div-gpt-ad-terminos-de-uso-floating_3ros').addService(googletag.pubads());
									googletag.defineSlot('/8877/Venezuela/Homepage/Skin', [2000, 1000], 'div-gpt-ad-terminos-de-uso-2000x1000').addService(googletag.pubads());";
					break;
					case "politica-de-remocion":
						$cod_slots="googletag.defineSlot('/8877/Venezuela/Homepage/BoxBanner_1', [300, 250], 'div-gpt-ad-politica-de-remocion-300x250-1').addService(googletag.pubads());
									googletag.defineSlot('/8877/Venezuela/Homepage/Header_Chico', [240, 90], 'div-gpt-ad-politica-de-remocion-240x90').addService(googletag.pubads());
									googletag.defineSlot('/8877/Venezuela/Homepage/LeaderBoard', [728, 90], 'div-gpt-ad-politica-de-remocion-728x90').addService(googletag.pubads());
									googletag.defineSlot('/8877/Venezuela/Homepage/Floating', [720, 300], 'div-gpt-ad-politica-de-remocion-720x300').addService(googletag.pubads());
									googletag.defineOutOfPageSlot('/8877/Venezuela/Homepage/Floating_3ros', 'div-gpt-ad-politica-de-remocion-floating_3ros').addService(googletag.pubads());
									googletag.defineSlot('/8877/Venezuela/Homepage/Skin', [2000, 1000], 'div-gpt-ad-politica-de-remocion-2000x1000').addService(googletag.pubads());";
					break;
					case "yosoyelartista":
						$cod_slots="googletag.defineSlot('/8877/Andes/Homepage/Header_Chico', [240, 90], 'div-gpt-ad-yosoyelartista-240x90').addService(googletag.pubads());
									googletag.defineSlot('/8877/Andes/Homepage/LeaderBoard', [728, 90], 'div-gpt-ad-yosoyelartista-728x90').addService(googletag.pubads());";
					break;
					default:
						$cod_slots="googletag.defineSlot('/8877/Venezuela/Homepage/Header_Chico', [240, 90], 'div-gpt-ad-home-240x90').addService(googletag.pubads());
						googletag.defineSlot('/8877/Venezuela/Homepage/LeaderBoard', [728, 90], 'div-gpt-ad-home-728x90').addService(googletag.pubads());";
					break;
					// FALTA DEFAULT HOME
				}

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
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

if(is_home() || is_search()  || is_tag()){

				/*while ( have_posts() ) : the_post(); 
				$id_cod=get_the_ID();
				$cod_single.="googletag.defineSlot('/8877/Brasil/Homepage/Patrocinio_post', [310, 30], 'div-gpt-ad-home-310x30-".$id_cod."').addService(googletag.pubads()).setTargeting('postid', ".$id_cod.");";
				endwhile;*/
					$cod_slots="googletag.defineSlot('/8877/Brasil/Homepage/BoxBanner_1', [300, 250], 'div-gpt-ad-home-300x250-1').addService(googletag.pubads());
					googletag.defineSlot('/8877/Brasil/Homepage/BoxBanner_2', [300, 250], 'div-gpt-ad-home-300x250-2').addService(googletag.pubads());
					googletag.defineSlot('/8877/Brasil/Homepage/Floating', [720, 300], 'div-gpt-ad-home-720x300').addService(googletag.pubads());
					googletag.defineOutOfPageSlot('/8877/Brasil/Homepage/Floating_3ros', 'div-gpt-ad-home-floating_3ros').addService(googletag.pubads());
					googletag.defineSlot('/8877/Brasil/Homepage/Header_Chico', [240, 90], 'div-gpt-ad-home-240x90').addService(googletag.pubads());
					googletag.defineSlot('/8877/Brasil/Homepage/Imperdible', [170, 30], 'div-gpt-ad-home-170x30').addService(googletag.pubads());
					googletag.defineSlot('/8877/Brasil/Homepage/LeaderBoard', [728, 90], 'div-gpt-ad-home-728x90').addService(googletag.pubads());
					googletag.defineSlot('/8877/Brasil/Homepage/PageBanner', [960, 400], 'div-gpt-ad-home-960x400').addService(googletag.pubads());
					googletag.defineSlot('/8877/Brasil/Homepage/Billboard', [970, 31], 'div-gpt-ad-home-970x31').addService(googletag.pubads());
					googletag.defineSlot('/8877/Brasil/Homepage/Pushdown', [970, 90], 'div-gpt-ad-home-970x90').addService(googletag.pubads());
					googletag.defineSlot('/8877/Brasil/Homepage/Skin', [2000, 1000], 'div-gpt-ad-home-2000x1000').addService(googletag.pubads());
					googletag.defineSlot('/8877/Brasil/Homepage/Toppost', [630, 50], 'div-gpt-ad-home-630x50').addService(googletag.pubads());";
				echo $cod_single;
}elseif(is_404()){
				$cod_slots="googletag.defineSlot('/8877/Brasil/Homepage/Header_Chico', [240, 90], 'div-gpt-ad-home-240x90').addService(googletag.pubads());
							googletag.defineSlot('/8877/Brasil/Homepage/LeaderBoard', [728, 90], 'div-gpt-ad-home-728x90').addService(googletag.pubads());
							googletag.defineSlot('/8877/Brasil/Homepage/Skin', [2000, 1000], 'div-gpt-ad-home-2000x1000').addService(googletag.pubads());";

}elseif(is_category() || is_single()){
				
				if(is_single()){

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

					//$array_count=explode(",", get_the_category_list( ', ' ));
					//$id_cod=get_the_ID();
					//$cod_single="googletag.defineSlot('/8877/Brasil/Nota/Patrocinio_post', [310, 30], 'div-gpt-ad-Post-310x30-".$id_cod."').addService(googletag.pubads()).setTargeting('postid', ".$id_cod.");";
					$cod_slots="googletag.defineSlot('/8877/Brasil/Nota/BoxBanner_1', [300, 250], 'div-gpt-ad-Post-300x250-1').addService(googletag.pubads()).setTargeting('postid', '".$id_cod."');
					googletag.defineSlot('/8877/Brasil/Nota/Header_Chico', [240, 90], 'div-gpt-ad-Post-240x90').addService(googletag.pubads()).setTargeting('postid', '".$id_cod."');
					googletag.defineSlot('/8877/Brasil/Nota/LeaderBoard', [728, 90], 'div-gpt-ad-Post-728x90').addService(googletag.pubads()).setTargeting('postid', '".$id_cod."');
					googletag.pubads().setTargeting('category_name', ".$categorias.");";
				}else{
			        $cat = get_term_by('name', single_cat_title('',false), 'category'); 
			        $postSlug=$cat->slug;
			        /*while ( have_posts() ) : the_post(); 
			          $id_cod=get_the_ID();
			          $cod_single.="googletag.defineSlot('/8877/Brasil/Homepage/Patrocinio_post', [310, 30], 'div-gpt-ad-".$postSlug."-310x30-".$id_cod."').addService(googletag.pubads()).setTargeting('postid', ".$id_cod.");";
			        endwhile;*/
				
					switch($postSlug){
						case "enews":
							$cod_slots="googletag.defineSlot('/8877/Brasil/Enews/BoxBanner_1', [300, 250], 'div-gpt-ad-enews-300x250-1').addService(googletag.pubads());
										googletag.defineSlot('/8877/Brasil/Enews/BoxBanner_2', [300, 250], 'div-gpt-ad-enews-300x250-2').addService(googletag.pubads());
										googletag.defineSlot('/8877/Brasil/Enews/Header_Chico', [240, 90], 'div-gpt-ad-enews-240x90').addService(googletag.pubads());
										googletag.defineSlot('/8877/Brasil/Enews/LeaderBoard', [728, 90], 'div-gpt-ad-enews-728x90').addService(googletag.pubads());
										googletag.defineSlot('/8877/Brasil/Enews/Floating', [720, 300], 'div-gpt-ad-enews-720x300').addService(googletag.pubads());
										googletag.defineOutOfPageSlot('/8877/Brasil/Enews/Floating_3ros', 'div-gpt-ad-enews-floating_3ros').addService(googletag.pubads());
										googletag.defineSlot('/8877/Brasil/Enews/Skin', [2000, 1000], 'div-gpt-ad-enews-2000x1000').addService(googletag.pubads());";
						break;
						case "noivas":
							$cod_slots="googletag.defineSlot('/8877/Brasil/Enews/BoxBanner_1', [300, 250], 'div-gpt-ad-noivas-300x250-1').addService(googletag.pubads());
										googletag.defineSlot('/8877/Brasil/Enews/BoxBanner_2', [300, 250], 'div-gpt-ad-noivas-300x250-2').addService(googletag.pubads());
										googletag.defineSlot('/8877/Brasil/Enews/Header_Chico', [240, 90], 'div-gpt-ad-noivas-240x90').addService(googletag.pubads());
										googletag.defineSlot('/8877/Brasil/Enews/LeaderBoard', [728, 90], 'div-gpt-ad-noivas-728x90').addService(googletag.pubads());
										googletag.defineSlot('/8877/Brasil/Novias/Skin', [2000, 1000], 'div-gpt-ad-noivas-2000x1000').addService(googletag.pubads());";
						break;
						case "the-royals":
							$cod_slots="googletag.defineSlot('/8877/Brasil/The_Royals/BoxBanner_1', [300, 250], 'div-gpt-ad-the-royals-300x250-1').addService(googletag.pubads());
										googletag.defineSlot('/8877/Brasil/The_Royals/BoxBanner_2', [300, 250], 'div-gpt-ad-the-royals-300x250-2').addService(googletag.pubads());
										googletag.defineSlot('/8877/Brasil/The_Royals/Header_Chico', [240, 90], 'div-gpt-ad-the-royals-240x90').addService(googletag.pubads());
										googletag.defineSlot('/8877/Brasil/The_Royals/LeaderBoard', [728, 90], 'div-gpt-ad-the-royals-728x90').addService(googletag.pubads());
										googletag.defineSlot('/8877/Brasil/The_Royals/Skin', [2000, 1000], 'div-gpt-ad-the-royals-2000x1000').addService(googletag.pubads());";
						break;
						case "carnaval2015":
							$cod_slots="googletag.defineSlot('/8877/Brasil/Enews/BoxBanner_1', [300, 250], 'div-gpt-ad-carnaval2015-300x250-1').addService(googletag.pubads());
										googletag.defineSlot('/8877/Brasil/Enews/BoxBanner_2', [300, 250], 'div-gpt-ad-carnaval2015-300x250-2').addService(googletag.pubads());
										googletag.defineSlot('/8877/Brasil/Enews/Header_Chico', [240, 90], 'div-gpt-ad-carnaval2015-240x90').addService(googletag.pubads());
										googletag.defineSlot('/8877/Brasil/Enews/LeaderBoard', [728, 90], 'div-gpt-ad-carnaval2015-728x90').addService(googletag.pubads());
										googletag.defineSlot('/8877/Brasil/Enews/Skin', [2000, 1000], 'div-gpt-ad-carnaval2015-2000x1000').addService(googletag.pubads());";
						break;
						case "amamos-cinema":
							$cod_slots="googletag.defineSlot('/8877/Brasil/Enews/BoxBanner_1', [300, 250], 'div-gpt-ad-amamos-cinema-300x250-1').addService(googletag.pubads());
										googletag.defineSlot('/8877/Brasil/Enews/BoxBanner_2', [300, 250], 'div-gpt-ad-amamos-cinema-300x250-2').addService(googletag.pubads());
										googletag.defineSlot('/8877/Brasil/Enews/Header_Chico', [240, 90], 'div-gpt-ad-amamos-cinema-240x90').addService(googletag.pubads());
										googletag.defineSlot('/8877/Brasil/Enews/LeaderBoard', [728, 90], 'div-gpt-ad-amamos-cinema-728x90').addService(googletag.pubads());
										googletag.defineSlot('/8877/Brasil/Enews/Floating', [720, 300], 'div-gpt-ad-amamos-cinema-720x300').addService(googletag.pubads());
										googletag.defineOutOfPageSlot('/8877/Brasil/Enews/Floating_3ros', 'div-gpt-ad-amamos-cinema-floating_3ros').addService(googletag.pubads());
										googletag.defineSlot('/8877/Brasil/Enews/Skin', [2000, 1000], 'div-gpt-ad-amamos-cinema-2000x1000').addService(googletag.pubads());
										googletag.defineSlot('/8877/Brasil/AmamosCinema/Toppost', [630, 50], 'div-gpt-ad-amamos-cinema-630x50').addService(googletag.pubads());";
						break;
						case "copa-do-mundo":
							$cod_slots="googletag.defineSlot('/8877/Brasil/Enews/BoxBanner_1', [300, 250], 'div-gpt-ad-copa-do-mundo-300x250-1').addService(googletag.pubads());
										googletag.defineSlot('/8877/Brasil/Enews/BoxBanner_2', [300, 250], 'div-gpt-ad-copa-do-mundo-300x250-2').addService(googletag.pubads());
										googletag.defineSlot('/8877/Brasil/Enews/Header_Chico', [240, 90], 'div-gpt-ad-copa-do-mundo-240x90').addService(googletag.pubads());
										googletag.defineSlot('/8877/Brasil/Enews/LeaderBoard', [728, 90], 'div-gpt-ad-copa-do-mundo-728x90').addService(googletag.pubads());
										googletag.defineSlot('/8877/Brasil/Enews/Skin', [2000, 1000], 'div-gpt-ad-copa-do-mundo-2000x1000').addService(googletag.pubads());
										googletag.defineSlot('/8877/Brasil/Enews/Floating', [720, 300], 'div-gpt-ad-copa-do-mundo-720x300').addService(googletag.pubads());
										googletag.defineOutOfPageSlot('/8877/Brasil/Enews/Floating_3ros', 'div-gpt-ad-copa-do-mundo-floating_3ros').addService(googletag.pubads());
										googletag.defineSlot('/8877/Brasil/Copadelmundo/Toppost', [630, 50], 'div-gpt-ad-copa-do-mundo-630x50').addService(googletag.pubads());";
						break;
						case "musica":
							$cod_slots="googletag.defineSlot('/8877/Brasil/Enews/BoxBanner_1', [300, 250], 'div-gpt-ad-musica-300x250-1').addService(googletag.pubads());
										googletag.defineSlot('/8877/Brasil/Enews/BoxBanner_2', [300, 250], 'div-gpt-ad-musica-300x250-2').addService(googletag.pubads());
										googletag.defineSlot('/8877/Brasil/Enews/Header_Chico', [240, 90], 'div-gpt-ad-musica-240x90').addService(googletag.pubads());
										googletag.defineSlot('/8877/Brasil/Enews/LeaderBoard', [728, 90], 'div-gpt-ad-musica-728x90').addService(googletag.pubads());
										googletag.defineSlot('/8877/Brasil/Enews/Skin', [2000, 1000], 'div-gpt-ad-musica-2000x1000').addService(googletag.pubads());";
						break;
						case "lol":
							$cod_slots="googletag.defineSlot('/8877/Brasil/Enews/BoxBanner_1', [300, 250], 'div-gpt-ad-lol-300x250-1').addService(googletag.pubads());
										googletag.defineSlot('/8877/Brasil/Enews/BoxBanner_2', [300, 250], 'div-gpt-ad-lol-300x250-2').addService(googletag.pubads());
										googletag.defineSlot('/8877/Brasil/Enews/Header_Chico', [240, 90], 'div-gpt-ad-lol-240x90').addService(googletag.pubads());
										googletag.defineSlot('/8877/Brasil/Enews/LeaderBoard', [728, 90], 'div-gpt-ad-lol-728x90').addService(googletag.pubads());
										googletag.defineSlot('/8877/Brasil/Enews/Skin', [2000, 1000], 'div-gpt-ad-lol-2000x1000').addService(googletag.pubads());";
						break;
						case "marriedtojonas":
							$cod_slots="googletag.defineSlot('/8877/Brasil/MarriedToJonas/BoxBanner_1', [300, 250], 'div-gpt-ad-marriedtojonas-300x250-1').addService(googletag.pubads());
										googletag.defineSlot('/8877/Brasil/MarriedToJonas/BoxBanner_2', [300, 250], 'div-gpt-ad-marriedtojonas-300x250-2').addService(googletag.pubads());
										googletag.defineSlot('/8877/Brasil/MarriedToJonas/Header_Chico', [240, 90], 'div-gpt-ad-marriedtojonas-240x90').addService(googletag.pubads());
										googletag.defineSlot('/8877/Brasil/MarriedToJonas/LeaderBoard', [728, 90], 'div-gpt-ad-marriedtojonas-728x90').addService(googletag.pubads());
										googletag.defineSlot('/8877/Brasil/MarriedToJonas/Floating', [720, 300], 'div-gpt-ad-marriedtojonas-720x300').addService(googletag.pubads());
										googletag.defineOutOfPageSlot('/8877/MarriedToJonas/Floating_3ros', 'div-gpt-ad-marriedtojonas-floating_3ros').addService(googletag.pubads());
										googletag.defineSlot('/8877/Brasil/MarriedToJonas/Skin', [2000, 1000], 'div-gpt-ad-marriedtojonas-2000x1000').addService(googletag.pubads());";
						break;
						case "estrenos":
							$cod_slots="googletag.defineSlot('/8877/Brasil/Enews/BoxBanner_1', [300, 250], 'div-gpt-ad-estrenos-300x250-1').addService(googletag.pubads());
										googletag.defineSlot('/8877/Brasil/Enews/BoxBanner_2', [300, 250], 'div-gpt-ad-estrenos-300x250-2').addService(googletag.pubads());
										googletag.defineSlot('/8877/Brasil/Enews/Header_Chico', [240, 90], 'div-gpt-ad-estrenos-240x90').addService(googletag.pubads());
										googletag.defineSlot('/8877/Brasil/Enews/LeaderBoard', [728, 90], 'div-gpt-ad-estrenos-728x90').addService(googletag.pubads());
										googletag.defineSlot('/8877/Brasil/Enews/Skin', [2000, 1000], 'div-gpt-ad-estrenos-2000x1000').addService(googletag.pubads());";
						break;
						case "imperdivel":
							$cod_slots="googletag.defineSlot('/8877/Brasil/Enews/BoxBanner_1', [300, 250], 'div-gpt-ad-imperdivel-300x250-1').addService(googletag.pubads());
										googletag.defineSlot('/8877/Brasil/Enews/BoxBanner_2', [300, 250], 'div-gpt-ad-imperdivel-300x250-2').addService(googletag.pubads());
										googletag.defineSlot('/8877/Brasil/Enews/Header_Chico', [240, 90], 'div-gpt-ad-imperdivel-240x90').addService(googletag.pubads());
										googletag.defineSlot('/8877/Brasil/Enews/LeaderBoard', [728, 90], 'div-gpt-ad-imperdivel-728x90').addService(googletag.pubads());
										googletag.defineSlot('/8877/Brasil/Enews/Skin', [2000, 1000], 'div-gpt-ad-imperdivel-2000x1000').addService(googletag.pubads());";
						break;
						case "foto-do-dia-2":
							$cod_slots="googletag.defineSlot('/8877/Brasil/Enews/BoxBanner_1', [300, 250], 'div-gpt-ad-foto-do-dia-2-300x250-1').addService(googletag.pubads());
										googletag.defineSlot('/8877/Brasil/Enews/BoxBanner_2', [300, 250], 'div-gpt-ad-foto-do-dia-2-300x250-2').addService(googletag.pubads());
										googletag.defineSlot('/8877/Brasil/Enews/Header_Chico', [240, 90], 'div-gpt-ad-foto-do-dia-2-240x90').addService(googletag.pubads());
										googletag.defineSlot('/8877/Brasil/Enews/LeaderBoard', [728, 90], 'div-gpt-ad-foto-do-dia-2-728x90').addService(googletag.pubads());
										googletag.defineSlot('/8877/Brasil/Enews/Skin', [2000, 1000], 'div-gpt-ad-foto-do-dia-2-2000x1000').addService(googletag.pubads());";
						break;
						case "efashionblogger":
							$cod_slots="googletag.defineSlot('/8877/Brasil/EFashion_Blogger/BoxBanner_1', [300, 250], 'div-gpt-ad-efashionblogger-300x250-1').addService(googletag.pubads());
										googletag.defineSlot('/8877/Brasil/EFashion_Blogger/Header_Chico', [240, 90], 'div-gpt-ad-efashionblogger-240x90').addService(googletag.pubads());
										googletag.defineSlot('/8877/Brasil/EFashion_Blogger/LeaderBoard', [728, 90], 'div-gpt-ad-efashionblogger-728x90').addService(googletag.pubads());
										googletag.defineSlot('/8877/Brasil/EFashion_Blogger/Floating', [720, 300], 'div-gpt-ad-efashionblogger-720x300').addService(googletag.pubads());
										googletag.defineOutOfPageSlot('/8877/Brasil/EFashion_Blogger/Floating_3ros', 'div-gpt-ad-efashionblogger-floating_3ros').addService(googletag.pubads());
										googletag.defineSlot('/8877/Brasil/EFashion_Blogger/Skin', [2000, 1000], 'div-gpt-ad-efashionblogger-2000x1000').addService(googletag.pubads());";

						break;
						case "the-kardashians":
							$cod_slots="googletag.defineSlot('/8877/Brasil/Kardashians/BoxBanner_1', [300, 250], 'div-gpt-ad-the-kardashians-300x250-1').addService(googletag.pubads());
										googletag.defineSlot('/8877/Brasil/Kardashians/Header_Chico', [240, 90], 'div-gpt-ad-the-kardashians-240x90').addService(googletag.pubads());
										googletag.defineSlot('/8877/Brasil/Kardashians/LeaderBoard', [728, 90], 'div-gpt-ad-the-kardashians-728x90').addService(googletag.pubads());
										googletag.defineSlot('/8877/Brasil/Kardashians/Floating', [720, 300], 'div-gpt-ad-the-kardashians-720x300').addService(googletag.pubads());
										googletag.defineOutOfPageSlot('/8877/Kardashians/Fashion_Police/Floating_3ros', 'div-gpt-ad-the-kardashians-floating_3ros').addService(googletag.pubads());
										googletag.defineSlot('/8877/Brasil/Kardashians/Skin', [2000, 1000], 'div-gpt-ad-the-kardashians-2000x1000').addService(googletag.pubads());";
						break;
						case "thetrend":
							$cod_slots="googletag.defineSlot('/8877/Brasil/The_Trend/BoxBanner_1', [300, 250], 'div-gpt-ad-thetrend-300x250-1').addService(googletag.pubads());
										googletag.defineSlot('/8877/Brasil/The_Trend/BoxBanner_2', [300, 250], 'div-gpt-ad-thetrend-300x250-2').addService(googletag.pubads());
										googletag.defineSlot('/8877/Brasil/The_Trend/Header_Chico', [240, 90], 'div-gpt-ad-thetrend-240x90').addService(googletag.pubads());
										googletag.defineSlot('/8877/Brasil/The_Trend/Floating', [720, 300], 'div-gpt-ad-thetrend-720x300').addService(googletag.pubads());
										googletag.defineOutOfPageSlot('/8877/RedCarpet/The_Trend/Floating_3ros', 'div-gpt-ad-thetrend-floating_3ros').addService(googletag.pubads());
										googletag.defineSlot('/8877/Brasil/The_Trend/LeaderBoard', [728, 90], 'div-gpt-ad-thetrend-728x90').addService(googletag.pubads());
										googletag.defineSlot('/8877/Brasil/The_Trend/Skin', [2000, 1000], 'div-gpt-ad-thetrend-2000x1000').addService(googletag.pubads());";
						break;
						case "tapetevermelho":
							$cod_slots="googletag.defineSlot('/8877/Brasil/RedCarpet/BoxBanner_1', [300, 250], 'div-gpt-ad-tapetevermelho-300x250-1').addService(googletag.pubads());
										googletag.defineSlot('/8877/Brasil/RedCarpet/BoxBanner_2', [300, 250], 'div-gpt-ad-tapetevermelho-300x250-2').addService(googletag.pubads());
										googletag.defineSlot('/8877/Brasil/RedCarpet/Header_Chico', [240, 90], 'div-gpt-ad-tapetevermelho-240x90').addService(googletag.pubads());
										googletag.defineSlot('/8877/Brasil/RedCarpet/LeaderBoard', [728, 90], 'div-gpt-ad-tapetevermelho-728x90').addService(googletag.pubads());
										googletag.defineSlot('/8877/Brasil/RedCarpet/Floating', [720, 300], 'div-gpt-ad-tapetevermelho-720x300').addService(googletag.pubads());
										googletag.defineOutOfPageSlot('/8877/RedCarpet/Fashion_Police/Floating_3ros', 'div-gpt-ad-tapetevermelho-floating_3ros').addService(googletag.pubads());
										googletag.defineSlot('/8877/Brasil/RedCarpet/Skin', [2000, 1000], 'div-gpt-ad-tapetevermelho-2000x1000').addService(googletag.pubads());";
						break;
						case "goldenglobe":
							$cod_slots="googletag.defineSlot('/8877/Brasil/RedCarpet/Golden_Globe_Awards/BoxBanner_1', [300, 250], 'div-gpt-ad-goldenglobe-300x250-1').addService(googletag.pubads());
										googletag.defineSlot('/8877/Brasil/RedCarpet/Golden_Globe_Awards/BoxBanner_2', [300, 250], 'div-gpt-ad-goldenglobe-300x250-2').addService(googletag.pubads());
										googletag.defineSlot('/8877/Brasil/RedCarpet/Golden_Globe_Awards/Header_Chico', [240, 90], 'div-gpt-ad-goldenglobe-240x90').addService(googletag.pubads());
										googletag.defineSlot('/8877/Brasil/RedCarpet/Golden_Globe_Awards/LeaderBoard', [728, 90], 'div-gpt-ad-goldenglobe-728x90').addService(googletag.pubads());
										googletag.defineSlot('/8877/Brasil/RedCarpet/Golden_Globe_Awards/Skin', [2000, 1000], 'div-gpt-ad-goldenglobe-2000x1000').addService(googletag.pubads());";
						break;
						case "sag":
							$cod_slots="googletag.defineSlot('/8877/Brasil/RedCarpet/Sag_Awards/BoxBanner_1', [300, 250], 'div-gpt-ad-sag-300x250-1').addService(googletag.pubads());
										googletag.defineSlot('/8877/Brasil/RedCarpet/Sag_Awards/BoxBanner_2', [300, 250], 'div-gpt-ad-sag-300x250-2').addService(googletag.pubads());
										googletag.defineSlot('/8877/Brasil/RedCarpet/Sag_Awards/Header_Chico', [240, 90], 'div-gpt-ad-sag-240x90').addService(googletag.pubads());
										googletag.defineSlot('/8877/Brasil/RedCarpet/Sag_Awards/LeaderBoard', [728, 90], 'div-gpt-ad-sag-728x90').addService(googletag.pubads());
										googletag.defineSlot('/8877/Brasil/RedCarpet/Sag_Awards/Skin', [2000, 1000], 'div-gpt-ad-sag-2000x1000').addService(googletag.pubads());";
						break;
						case "grammy":
							$cod_slots="googletag.defineSlot('/8877/Brasil/RedCarpet/Grammy_Awards/BoxBanner_1', [300, 250], 'div-gpt-ad-grammy-300x250-1').addService(googletag.pubads());
										googletag.defineSlot('/8877/Brasil/RedCarpet/Grammy_Awards/BoxBanner_2', [300, 250], 'div-gpt-ad-grammy-300x250-2').addService(googletag.pubads());
										googletag.defineSlot('/8877/Brasil/RedCarpet/Grammy_Awards/Header_Chico', [240, 90], 'div-gpt-ad-grammy-240x90').addService(googletag.pubads());
										googletag.defineSlot('/8877/Brasil/RedCarpet/Grammy_Awards/LeaderBoard', [728, 90], 'div-gpt-ad-grammy-728x90').addService(googletag.pubads());
										googletag.defineSlot('/8877/Brasil/RedCarpet/Grammy_Awards/Skin', [2000, 1000], 'div-gpt-ad-grammy-2000x1000').addService(googletag.pubads());";
						break;
						case "oscar":
							$cod_slots="googletag.defineSlot('/8877/Brasil/RedCarpet/Oscar_Awards/BoxBanner_1', [300, 250], 'div-gpt-ad-oscar-300x250-1').addService(googletag.pubads());
										googletag.defineSlot('/8877/Brasil/RedCarpet/Oscar_Awards/BoxBanner_2', [300, 250], 'div-gpt-ad-oscar-300x250-2').addService(googletag.pubads());
										googletag.defineSlot('/8877/Brasil/RedCarpet/Oscar_Awards/Header_Chico', [240, 90], 'div-gpt-ad-oscar-240x90').addService(googletag.pubads());
										googletag.defineSlot('/8877/Brasil/RedCarpet/Oscar_Awards/LeaderBoard', [728, 90], 'div-gpt-ad-oscar-728x90').addService(googletag.pubads());
										googletag.defineSlot('/8877/Brasil/RedCarpet/Oscar_Awards/Skin', [2000, 1000], 'div-gpt-ad-oscar-2000x1000').addService(googletag.pubads());";
						break;
						case "latinbillboard":
							$cod_slots="googletag.defineSlot('/8877/Brasil/RedCarpet/Latin_Billboard/BoxBanner_1', [300, 250], 'div-gpt-ad-latinbillboard-300x250-1').addService(googletag.pubads());
										googletag.defineSlot('/8877/Brasil/RedCarpet/Latin_Billboard/BoxBanner_2', [300, 250], 'div-gpt-ad-latinbillboard-300x250-2').addService(googletag.pubads());
										googletag.defineSlot('/8877/Brasil/RedCarpet/Latin_Billboard/Header_Chico', [240, 90], 'div-gpt-ad-latinbillboard-240x90').addService(googletag.pubads());
										googletag.defineSlot('/8877/Brasil/RedCarpet/Floating', [720, 300], 'div-gpt-ad-latinbillboard-720x300').addService(googletag.pubads());
										googletag.defineOutOfPageSlot('/8877/Brasil/RedCarpet/Floating_3ros', 'div-gpt-ad-latinbillboard-floating_3ros').addService(googletag.pubads());
										googletag.defineSlot('/8877/Brasil/RedCarpet/Latin_Billboard/LeaderBoard', [728, 90], 'div-gpt-ad-latinbillboard-728x90').addService(googletag.pubads());
										googletag.defineSlot('/8877/Brasil/RedCarpet/Latin_Billboard/Skin', [2000, 1000], 'div-gpt-ad-latinbillboard-2000x1000').addService(googletag.pubads());";
						break;
						case "emmy":
							$cod_slots="googletag.defineSlot('/8877/Brasil/RedCarpet/Emmy_Awards/BoxBanner_1', [300, 250], 'div-gpt-ad-emmy-300x250-1').addService(googletag.pubads());
										googletag.defineSlot('/8877/Brasil/RedCarpet/Emmy_Awards/BoxBanner_2', [300, 250], 'div-gpt-ad-emmy-300x250-2').addService(googletag.pubads());
										googletag.defineSlot('/8877/Brasil/RedCarpet/Emmy_Awards/Header_Chico', [240, 90], 'div-gpt-ad-emmy-240x90').addService(googletag.pubads());
										googletag.defineSlot('/8877/Brasil/RedCarpet/Emmy_Awards/LeaderBoard', [728, 90], 'div-gpt-ad-emmy-728x90').addService(googletag.pubads());
										googletag.defineSlot('/8877/Brasil/RedCarpet/Emmy_Awards/Skin', [2000, 1000], 'div-gpt-ad-emmy-2000x1000').addService(googletag.pubads());";
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
						$cod_slots="googletag.defineSlot('/8877/Brasil/glamcam360/BoxBanner_1', [300, 250], 'div-gpt-ad-glamcam360-300x250-1').addService(googletag.pubads());
									googletag.defineSlot('/8877/Brasil/glamcam360/Header_Chico', [240, 90], 'div-gpt-ad-glamcam360-240x90').addService(googletag.pubads());
									googletag.defineSlot('/8877/Brasil/glamcam360/LeaderBoard', [728, 90], 'div-gpt-ad-glamcam360-728x90').addService(googletag.pubads());
									googletag.defineSlot('/8877/Brasil/glamcam360/Floating', [720, 300], 'div-gpt-ad-glamcam360-720x300').addService(googletag.pubads());
									googletag.defineOutOfPageSlot('/8877/glamcam360/Fashion_Police/Floating_3ros', 'div-gpt-ad-glamcam360-floating_3ros').addService(googletag.pubads());
									googletag.defineSlot('/8877/Brasil/glamcam360/Skin', [2000, 1000], 'div-gpt-ad-glamcam360-2000x1000').addService(googletag.pubads());";
					break;
					case "eshows":
						$cod_slots="googletag.defineSlot('/8877/Brasil/Eshows/BoxBanner_1', [300, 250], 'div-gpt-ad-eshows-300x250-1').addService(googletag.pubads());
									googletag.defineSlot('/8877/Brasil/Eshows/Header_Chico', [240, 90], 'div-gpt-ad-eshows-240x90').addService(googletag.pubads());
									googletag.defineSlot('/8877/Brasil/Eshows/LeaderBoard', [728, 90], 'div-gpt-ad-eshows-728x90').addService(googletag.pubads());
									googletag.defineSlot('/8877/Brasil/Eshows/Floating', [720, 300], 'div-gpt-ad-eshows-720x300').addService(googletag.pubads());
									googletag.defineOutOfPageSlot('/8877/Brasil/Eshows/Floating_3ros', 'div-gpt-ad-eshows-floating_3ros').addService(googletag.pubads());
									googletag.defineSlot('/8877/Brasil/Eshows/Skin', [2000, 1000], 'div-gpt-ad-eshows-2000x1000').addService(googletag.pubads());";
					break;
					case "programas":
						$cod_slots="googletag.defineSlot('/8877/Brasil/Programacion/Header_Chico', [240, 90], 'div-gpt-ad-programas-240x90').addService(googletag.pubads());
									googletag.defineSlot('/8877/Brasil/Programacion/LeaderBoard', [728, 90], 'div-gpt-ad-programas-728x90').addService(googletag.pubads());
									googletag.defineSlot('/8877/Brasil/Programacion/Floating', [720, 300], 'div-gpt-ad-programas-720x300').addService(googletag.pubads());
									googletag.defineOutOfPageSlot('/8877/Brasil/Programacion/Floating_3ros', 'div-gpt-ad-programas-floating_3ros').addService(googletag.pubads());
									googletag.defineSlot('/8877/Brasil/Programacion/Skin', [2000, 1000], 'div-gpt-ad-programas-2000x1000').addService(googletag.pubads());";
					break;
					case "fashionpolice":
						$cod_slots="googletag.defineSlot('/8877/Brasil/Fashion_Police/BoxBanner_1', [300, 250], 'div-gpt-ad-fashionpolice-300x250-1').addService(googletag.pubads());
									googletag.defineSlot('/8877/Brasil/Fashion_Police/Header_Chico', [240, 90], 'div-gpt-ad-fashionpolice-240x90').addService(googletag.pubads());
									googletag.defineSlot('/8877/Brasil/Fashion_Police/LeaderBoard', [728, 90], 'div-gpt-ad-fashionpolice-728x90').addService(googletag.pubads());
									googletag.defineSlot('/8877/Brasil/Fashion_Police/Floating', [720, 300], 'div-gpt-ad-fashionpolice-720x300').addService(googletag.pubads());
									googletag.defineOutOfPageSlot('/8877/Brasil/Fashion_Police/Floating_3ros', 'div-gpt-ad-fashionpolice-floating_3ros').addService(googletag.pubads());
									googletag.defineSlot('/8877/Brasil/Fashion_Police/Skin', [2000, 1000], 'div-gpt-ad-fashionpolice-2000x1000').addService(googletag.pubads());";
					break;
					case "galerias_page":
						$idGallery=$_GET["gallery"];
						$cod_slots="googletag.defineSlot('/8877/Brasil/Fotos/BoxBanner_1', [300, 250], 'div-gpt-ad-galerias_page-300x250-1').addService(googletag.pubads()).setTargeting('galleryid', '".$idGallery."');";
					break;
					case "galerias":
						$cod_slots="googletag.defineSlot('/8877/Brasil/Galerias/BoxBanner_1', [300, 250], 'div-gpt-ad-galerias-300x250-1').addService(googletag.pubads());
									googletag.defineSlot('/8877/Brasil/Galerias/Header_Chico', [240, 90], 'div-gpt-ad-galerias-240x90').addService(googletag.pubads());
									googletag.defineSlot('/8877/Brasil/Galerias/LeaderBoard', [728, 90], 'div-gpt-ad-galerias-728x90').addService(googletag.pubads());
									googletag.defineOutOfPageSlot('/8877/Brasil/Galerias/Floating_3ros', 'div-gpt-ad-galerias-floating_3ros').addService(googletag.pubads());
									googletag.defineSlot('/8877/Brasil/Galerias/Skin', [2000, 1000], 'div-gpt-ad-galerias-2000x1000').addService(googletag.pubads());";
					break;
					case "videos":
						$cod_slots="googletag.defineSlot('/8877/Brasil/Videos/Header_Chico', [240, 90], 'div-gpt-ad-videos-240x90').addService(googletag.pubads());
									googletag.defineSlot('/8877/Brasil/Videos/LeaderBoard', [728, 90], 'div-gpt-ad-videos-728x90').addService(googletag.pubads());
									googletag.defineSlot('/8877/Brasil/Videos/Floating', [720, 300], 'div-gpt-ad-videos-720x300').addService(googletag.pubads());
									googletag.defineOutOfPageSlot('/8877/Brasil/Videos/Floating_3ros', 'div-gpt-ad-videos-floating_3ros').addService(googletag.pubads());
									googletag.defineSlot('/8877/Brasil/Videos/Skin', [2000, 1000], 'div-gpt-ad-videos-2000x1000').addService(googletag.pubads());";
					break;
					case "parabens-joan":
						$cod_slots="googletag.defineSlot('/8877/Brasil/parabens-joan/Header_Chico', [240, 90], 'div-gpt-ad-parabens-joan-240x90').addService(googletag.pubads());
									googletag.defineSlot('/8877/Brasil/parabens-joan/LeaderBoard', [728, 90], 'div-gpt-ad-parabens-joan-728x90').addService(googletag.pubads());
									googletag.defineSlot('/8877/Brasil/parabens-joan/Floating', [720, 300], 'div-gpt-ad-parabens-joan-720x300').addService(googletag.pubads());
									googletag.defineOutOfPageSlot('/8877/Brasil/parabens-joan/Floating_3ros', 'div-gpt-ad-parabens-joan-floating_3ros').addService(googletag.pubads());
									googletag.defineSlot('/8877/Brasil/parabens-joan/Skin', [2000, 1000], 'div-gpt-ad-parabens-joan-2000x1000').addService(googletag.pubads());";
					break;
					case "app":
						$cod_slots="googletag.defineSlot('/8877/Brasil/Homepage/Header_Chico', [240, 90], 'div-gpt-ad-app-240x90').addService(googletag.pubads());
									googletag.defineSlot('/8877/Brasil/Homepage/Floating', [720, 300], 'div-gpt-ad-app-720x300').addService(googletag.pubads());
									googletag.defineOutOfPageSlot('/8877/Brasil/Homepage/Floating_3ros', 'div-gpt-ad-app-floating_3ros').addService(googletag.pubads());
									googletag.defineSlot('/8877/Brasil/Homepage/LeaderBoard', [728, 90], 'div-gpt-ad-app-728x90').addService(googletag.pubads());";
					break;
					case "timeline":
						$cod_slots="googletag.defineSlot('/8877/Brasil/Homepage/Header_Chico', [240, 90], 'div-gpt-ad-timeline-240x90').addService(googletag.pubads());
									googletag.defineSlot('/8877/Brasil/Homepage/LeaderBoard', [728, 90], 'div-gpt-ad-timeline-728x90').addService(googletag.pubads());";
					break;
					case "contacto":
						$cod_slots="googletag.defineSlot('/8877/Brasil/Homepage/BoxBanner_1', [300, 250], 'div-gpt-ad-contacto-300x250-1').addService(googletag.pubads());
									googletag.defineSlot('/8877/Brasil/Homepage/Header_Chico', [240, 90], 'div-gpt-ad-contacto-240x90').addService(googletag.pubads());
									googletag.defineSlot('/8877/Brasil/Homepage/LeaderBoard', [728, 90], 'div-gpt-ad-contacto-728x90').addService(googletag.pubads());
									googletag.defineSlot('/8877/Brasil/Homepage/Floating', [720, 300], 'div-gpt-ad-contacto-720x300').addService(googletag.pubads());
									googletag.defineOutOfPageSlot('/8877/Brasil/Homepage/Floating_3ros', 'div-gpt-ad-contacto-floating_3ros').addService(googletag.pubads());
									googletag.defineSlot('/8877/Brasil/Homepage/Skin', [2000, 1000], 'div-gpt-ad-contacto-2000x1000').addService(googletag.pubads());";
					break;
					case "politicas-de-privacidad":
						$cod_slots="googletag.defineSlot('/8877/Brasil/Homepage/BoxBanner_1', [300, 250], 'div-gpt-ad-politicas-de-privacidad-300x250-1').addService(googletag.pubads());
									googletag.defineSlot('/8877/Brasil/Homepage/Header_Chico', [240, 90], 'div-gpt-ad-politicas-de-privacidad-240x90').addService(googletag.pubads());
									googletag.defineSlot('/8877/Brasil/Homepage/LeaderBoard', [728, 90], 'div-gpt-ad-politicas-de-privacidad-728x90').addService(googletag.pubads());
									googletag.defineSlot('/8877/Brasil/Homepage/Floating', [720, 300], 'div-gpt-ad-politicas-de-privacidad-720x300').addService(googletag.pubads());
									googletag.defineOutOfPageSlot('/8877/Brasil/Homepage/Floating_3ros', 'div-gpt-ad-politicas-de-privacidad-floating_3ros').addService(googletag.pubads());
									googletag.defineSlot('/8877/Brasil/Homepage/Skin', [2000, 1000], 'div-gpt-ad-politicas-de-privacidad-2000x1000').addService(googletag.pubads());";
					break;
					case "terminos-de-uso":
						$cod_slots="googletag.defineSlot('/8877/Brasil/Homepage/BoxBanner_1', [300, 250], 'div-gpt-ad-terminos-de-uso-300x250-1').addService(googletag.pubads());
									googletag.defineSlot('/8877/Brasil/Homepage/Header_Chico', [240, 90], 'div-gpt-ad-terminos-de-uso-240x90').addService(googletag.pubads());
									googletag.defineSlot('/8877/Brasil/Homepage/LeaderBoard', [728, 90], 'div-gpt-ad-terminos-de-uso-728x90').addService(googletag.pubads());
									googletag.defineSlot('/8877/Brasil/Homepage/Floating', [720, 300], 'div-gpt-ad-terminos-de-uso-720x300').addService(googletag.pubads());
									googletag.defineOutOfPageSlot('/8877/Brasil/Homepage/Floating_3ros', 'div-gpt-ad-politicas-de-privacidad-floating_3ros').addService(googletag.pubads());
									googletag.defineSlot('/8877/Brasil/Homepage/Skin', [2000, 1000], 'div-gpt-ad-terminos-de-uso-2000x1000').addService(googletag.pubads());";
					break;
					case "politica-de-remocion":
						$cod_slots="googletag.defineSlot('/8877/Brasil/Homepage/BoxBanner_1', [300, 250], 'div-gpt-ad-politica-de-remocion-300x250-1').addService(googletag.pubads());
									googletag.defineSlot('/8877/Brasil/Homepage/Header_Chico', [240, 90], 'div-gpt-ad-politica-de-remocion-240x90').addService(googletag.pubads());
									googletag.defineSlot('/8877/Brasil/Homepage/LeaderBoard', [728, 90], 'div-gpt-ad-politica-de-remocion-728x90').addService(googletag.pubads());
									googletag.defineSlot('/8877/Brasil/Homepage/Floating', [720, 300], 'div-gpt-ad-politica-de-remocion-720x300').addService(googletag.pubads());
									googletag.defineOutOfPageSlot('/8877/Brasil/Homepage/Floating_3ros', 'div-gpt-ad-politica-de-remocion-floating_3ros').addService(googletag.pubads());
									googletag.defineSlot('/8877/Brasil/Homepage/Skin', [2000, 1000], 'div-gpt-ad-politica-de-remocion-2000x1000').addService(googletag.pubads());";
					break;
					default:
						$cod_slots="googletag.defineSlot('/8877/Brasil/Homepage/Header_Chico', [240, 90], 'div-gpt-ad-home-240x90').addService(googletag.pubads());
						googletag.defineSlot('/8877/Brasil/Homepage/LeaderBoard', [728, 90], 'div-gpt-ad-home-728x90').addService(googletag.pubads());";
					break;// FALTA DEFAULT HOME
				}

}

echo $cod_slots;?>
<?/*if(is_page("galerias_page")){?>
	googletag.pubads().enableAsyncRendering();
<?}else{?>
	googletag.pubads().enableSyncRendering();
<?}*/?>

googletag.pubads().enableSyncRendering();
googletag.pubads().enableSingleRequest();
googletag.pubads().collapseEmptyDivs();
googletag.enableServices();
</script>

<script data-device="1">
<?if(is_single()){
	$NewCat=str_replace('"', '', $categorias);
	$NewCat=str_replace('[', '', $NewCat);
	$NewCat=str_replace(']', '', $NewCat);
	?>
	var seccionesNOTA = '<?=$NewCat?>';
<?}?>
</script>
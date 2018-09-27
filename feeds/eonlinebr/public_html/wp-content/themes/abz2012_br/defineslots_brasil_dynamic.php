<script type='text/javascript'>
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
$que_seccion_es="";
$netDFP="8877";

/*NEW*/
$name_feedDFP=ucwords($name_feed);
$ConArray=conn_generico($var_con[0]);
/*NEW*/

if(is_home() || is_search()  || is_tag()){

				$name_sectionDFP="Homepage";
				$que_seccion_es="is_home";

				/*while ( have_posts() ) : the_post(); 
				$id_cod=get_the_ID();
				$cod_single.="googletag.defineSlot('/8877/Brasil/Homepage/Patrocinio_post', [310, 30], 'div-gpt-ad-home-310x30-".$id_cod."').addService(googletag.pubads()).setTargeting('postid', ".$id_cod.");";
				endwhile;*/
					$cod_slots="googletag.defineSlot('/".$netDFP."/".$name_feedDFP."/".$name_sectionDFP."/BoxBanner_1', [300, 250], 'div-gpt-ad-home-300x250-1').addService(googletag.pubads());
					googletag.defineSlot('/".$netDFP."/".$name_feedDFP."/".$name_sectionDFP."/BoxBanner_2', [300, 250], 'div-gpt-ad-home-300x250-2').addService(googletag.pubads());
					googletag.defineSlot('/".$netDFP."/".$name_feedDFP."/".$name_sectionDFP."/Header_Chico', [240, 90], 'div-gpt-ad-home-240x90').addService(googletag.pubads());
					googletag.defineSlot('/".$netDFP."/".$name_feedDFP."/".$name_sectionDFP."/LeaderBoard', [728, 90], 'div-gpt-ad-home-728x90').addService(googletag.pubads());
					googletag.defineSlot('/".$netDFP."/".$name_feedDFP."/".$name_sectionDFP."/Rectangulo_1', [300, 100], 'div-gpt-ad-home-300x100').addService(googletag.pubads());
					googletag.defineOutOfPageSlot('/".$netDFP."/".$name_feedDFP."/".$name_sectionDFP."/Floating_3ros', 'div-gpt-ad-home-floating_3ros').addService(googletag.pubads());";

					$array_elem=execute_define("Homepage", $ConArray, NULL, $name_feedDFP, "Homepage", NULL, NULL);
					echo $array_elem;

				echo $cod_single;
}elseif(is_404()){
				$name_sectionDFP="Homepage";
				$que_seccion_es="is_404";
				
				$cod_slots="googletag.defineSlot('/".$netDFP."/".$name_feedDFP."/".$name_sectionDFP."/Header_Chico', [240, 90], 'div-gpt-ad-home-240x90').addService(googletag.pubads());
				googletag.defineSlot('/".$netDFP."/".$name_feedDFP."/".$name_sectionDFP."/LeaderBoard', [728, 90], 'div-gpt-ad-home-728x90').addService(googletag.pubads());";

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

					$cod_slots="googletag.defineSlot('/".$netDFP."/".$name_feedDFP."/".$name_sectionDFP."/Header_Chico', [240, 90], 'div-gpt-ad-Post-240x90').addService(googletag.pubads());
					googletag.defineSlot('/".$netDFP."/".$name_feedDFP."/".$name_sectionDFP."/BoxBanner_1', [300, 250], 'div-gpt-ad-Post-300x250-1').addService(googletag.pubads());
					googletag.defineSlot('/".$netDFP."/".$name_feedDFP."/".$name_sectionDFP."/BoxBanner_2', [300, 250], 'div-gpt-ad-Post-300x250-2').addService(googletag.pubads());
					googletag.defineSlot('/".$netDFP."/".$name_feedDFP."/".$name_sectionDFP."/LeaderBoard', [728, 90], 'div-gpt-ad-Post-728x90').addService(googletag.pubads());
					googletag.defineSlot('/".$netDFP."/".$name_feedDFP."/".$name_sectionDFP."/Rectangulo_1', [300, 100], 'div-gpt-ad-Post-300x100').addService(googletag.pubads());
					googletag.defineOutOfPageSlot('/".$netDFP."/".$name_feedDFP."/".$name_sectionDFP."/Floating_3ros', 'div-gpt-ad-Post-floating_3ros').addService(googletag.pubads());
					googletag.pubads().setTargeting('postid', ".$id_cod.");
					googletag.pubads().setTargeting('category_name', ".$categorias.");";


				}else{
			        $cat = get_term_by('name', single_cat_title('',false), 'category'); 
			        $postSlug=$cat->slug;
			        /*while ( have_posts() ) : the_post(); 
			          $id_cod=get_the_ID();
			          $cod_single.="googletag.defineSlot('/8877/Brasil/Homepage/Patrocinio_post', [310, 30], 'div-gpt-ad-".$postSlug."-310x30-".$id_cod."').addService(googletag.pubads()).setTargeting('postid', ".$id_cod.");";
			        endwhile;*/

			        $que_seccion_es="is_category-".$postSlug;

				
					switch($postSlug){
						case "enews":
							$name_sectionDFP="Enews";
							$cod_slots="googletag.defineSlot('/".$netDFP."/".$name_feedDFP."/".$name_sectionDFP."/BoxBanner_1', [300, 250], 'div-gpt-ad-enews-300x250-1').addService(googletag.pubads());
										googletag.defineSlot('/".$netDFP."/".$name_feedDFP."/".$name_sectionDFP."/BoxBanner_2', [300, 250], 'div-gpt-ad-enews-300x250-2').addService(googletag.pubads());
										googletag.defineSlot('/".$netDFP."/".$name_feedDFP."/".$name_sectionDFP."/LeaderBoard', [728, 90], 'div-gpt-ad-enews-728x90').addService(googletag.pubads());
										googletag.defineSlot('/".$netDFP."/".$name_feedDFP."/".$name_sectionDFP."/Header_Chico', [240, 90], 'div-gpt-ad-enews-240x90').addService(googletag.pubads());
										googletag.defineSlot('/".$netDFP."/".$name_feedDFP."/".$name_sectionDFP."/Rectangulo_1', [300, 100], 'div-gpt-ad-enews-300x100').addService(googletag.pubads());
										googletag.defineOutOfPageSlot('/".$netDFP."/".$name_feedDFP."/".$name_sectionDFP."/Floating_3ros', 'div-gpt-ad-enews-floating_3ros').addService(googletag.pubads());";
						break;
						case "noivas":
							$name_sectionDFP="Novias";
							$cod_slots="googletag.defineSlot('/".$netDFP."/".$name_feedDFP."/".$name_sectionDFP."/BoxBanner_1', [300, 250], 'div-gpt-ad-noivas-300x250-1').addService(googletag.pubads());
										googletag.defineSlot('/".$netDFP."/".$name_feedDFP."/".$name_sectionDFP."/BoxBanner_2', [300, 250], 'div-gpt-ad-noivas-300x250-2').addService(googletag.pubads());
										googletag.defineSlot('/".$netDFP."/".$name_feedDFP."/".$name_sectionDFP."/LeaderBoard', [728, 90], 'div-gpt-ad-noivas-728x90').addService(googletag.pubads());
										googletag.defineSlot('/".$netDFP."/".$name_feedDFP."/Enews/Header_Chico', [240, 90], 'div-gpt-ad-noivas-240x90').addService(googletag.pubads());
										googletag.defineSlot('/".$netDFP."/".$name_feedDFP."/".$name_sectionDFP."/Rectangulo_1', [300, 100], 'div-gpt-ad-noivas-300x100').addService(googletag.pubads());
										googletag.defineOutOfPageSlot('/".$netDFP."/".$name_feedDFP."/".$name_sectionDFP."/Floating_3ros', 'div-gpt-ad-noivas-floating_3ros').addService(googletag.pubads());";
						break;
						case "the-royals":
							$name_sectionDFP="The_Royals";
							$cod_slots="googletag.defineSlot('/".$netDFP."/".$name_feedDFP."/".$name_sectionDFP."/BoxBanner_1', [300, 250], 'div-gpt-ad-the-royals-300x250-1').addService(googletag.pubads());
										googletag.defineSlot('/".$netDFP."/".$name_feedDFP."/".$name_sectionDFP."/BoxBanner_2', [300, 250], 'div-gpt-ad-the-royals-300x250-2').addService(googletag.pubads());
										googletag.defineSlot('/".$netDFP."/".$name_feedDFP."/".$name_sectionDFP."/LeaderBoard', [728, 90], 'div-gpt-ad-the-royals-728x90').addService(googletag.pubads());
										googletag.defineSlot('/".$netDFP."/".$name_feedDFP."/".$name_sectionDFP."/Header_Chico', [240, 90], 'div-gpt-ad-the-royals-240x90').addService(googletag.pubads());
										googletag.defineSlot('/".$netDFP."/".$name_feedDFP."/".$name_sectionDFP."/Rectangulo_1', [300, 100], 'div-gpt-ad-the-royals-300x100').addService(googletag.pubads());
										googletag.defineOutOfPageSlot('/".$netDFP."/".$name_feedDFP."/".$name_sectionDFP."/Floating_3ros', 'div-gpt-ad-the-royals-floating_3ros').addService(googletag.pubads());";
						break;
						case "carnaval2015":
							$name_sectionDFP="Enews";
							$cod_slots="googletag.defineSlot('/".$netDFP."/".$name_feedDFP."/".$name_sectionDFP."/Header_Chico', [240, 90], 'div-gpt-ad-carnaval2015-240x90').addService(googletag.pubads());
										googletag.defineSlot('/".$netDFP."/".$name_feedDFP."/".$name_sectionDFP."/Rectangulo_1', [300, 100], 'div-gpt-ad-carnaval2015-300x100').addService(googletag.pubads());
										googletag.defineOutOfPageSlot('/".$netDFP."/".$name_feedDFP."/".$name_sectionDFP."/Floating_3ros', 'div-gpt-ad-carnaval2015-floating_3ros').addService(googletag.pubads());";
						break;
						case "amamos-cinema":
							$name_sectionDFP="AmamosCinema";
							$cod_slots="googletag.defineSlot('/".$netDFP."/".$name_feedDFP."/".$name_sectionDFP."/BoxBanner_1', [300, 250], 'div-gpt-ad-amamos-cinema-300x250-1').addService(googletag.pubads());
										googletag.defineSlot('/".$netDFP."/".$name_feedDFP."/".$name_sectionDFP."/BoxBanner_2', [300, 250], 'div-gpt-ad-amamos-cinema-300x250-2').addService(googletag.pubads());
										googletag.defineSlot('/".$netDFP."/".$name_feedDFP."/".$name_sectionDFP."/LeaderBoard', [728, 90], 'div-gpt-ad-amamos-cinema-728x90').addService(googletag.pubads());
										googletag.defineSlot('/".$netDFP."/".$name_feedDFP."/Enews/Header_Chico', [240, 90], 'div-gpt-ad-amamos-cinema-240x90').addService(googletag.pubads());
										googletag.defineSlot('/".$netDFP."/".$name_feedDFP."/".$name_sectionDFP."/Toppost', [630, 50], 'div-gpt-ad-amamos-cinema-630x50').addService(googletag.pubads());
										googletag.defineSlot('/".$netDFP."/".$name_feedDFP."/".$name_sectionDFP."/Rectangulo_1', [300, 100], 'div-gpt-ad-amamos-cinema-300x100').addService(googletag.pubads());
										googletag.defineOutOfPageSlot('/".$netDFP."/".$name_feedDFP."/".$name_sectionDFP."/Floating_3ros', 'div-gpt-ad-amamos-cinema-floating_3ros').addService(googletag.pubads());";
						break;
						case "musica":
							$name_sectionDFP="Musica";
							$cod_slots="googletag.defineSlot('/".$netDFP."/".$name_feedDFP."/".$name_sectionDFP."/BoxBanner_1', [300, 250], 'div-gpt-ad-musica-300x250-1').addService(googletag.pubads());
										googletag.defineSlot('/".$netDFP."/".$name_feedDFP."/".$name_sectionDFP."/BoxBanner_2', [300, 250], 'div-gpt-ad-musica-300x250-2').addService(googletag.pubads());
										googletag.defineSlot('/".$netDFP."/".$name_feedDFP."/".$name_sectionDFP."/LeaderBoard', [728, 90], 'div-gpt-ad-musica-728x90').addService(googletag.pubads());
										googletag.defineSlot('/".$netDFP."/".$name_feedDFP."/".$name_sectionDFP."/Header_Chico', [240, 90], 'div-gpt-ad-musica-240x90').addService(googletag.pubads());
										googletag.defineSlot('/".$netDFP."/".$name_feedDFP."/".$name_sectionDFP."/Rectangulo_1', [300, 100], 'div-gpt-ad-musica-300x100').addService(googletag.pubads());
										googletag.defineOutOfPageSlot('/".$netDFP."/".$name_feedDFP."/".$name_sectionDFP."/Floating_3ros', 'div-gpt-ad-musica-floating_3ros').addService(googletag.pubads());";
						break;
						case "lol":
							$name_sectionDFP="Enews";
							$cod_slots="googletag.defineSlot('/".$netDFP."/".$name_feedDFP."/".$name_sectionDFP."/BoxBanner_1', [300, 250], 'div-gpt-ad-lol-300x250-1').addService(googletag.pubads());
										googletag.defineSlot('/".$netDFP."/".$name_feedDFP."/".$name_sectionDFP."/BoxBanner_2', [300, 250], 'div-gpt-ad-lol-300x250-2').addService(googletag.pubads());
										googletag.defineSlot('/".$netDFP."/".$name_feedDFP."/".$name_sectionDFP."/LeaderBoard', [728, 90], 'div-gpt-ad-lol-728x90').addService(googletag.pubads());
										googletag.defineSlot('/".$netDFP."/".$name_feedDFP."/".$name_sectionDFP."/Header_Chico', [240, 90], 'div-gpt-ad-lol-240x90').addService(googletag.pubads());
										googletag.defineSlot('/".$netDFP."/".$name_feedDFP."/".$name_sectionDFP."/Rectangulo_1', [300, 100], 'div-gpt-ad-lol-300x100').addService(googletag.pubads());
										googletag.defineOutOfPageSlot('/".$netDFP."/".$name_feedDFP."/".$name_sectionDFP."/Floating_3ros', 'div-gpt-ad-lol-floating_3ros').addService(googletag.pubads());";
						break;
						case "marriedtojonas":
							$name_sectionDFP="MarriedToJonas";
							$cod_slots="googletag.defineSlot('/".$netDFP."/".$name_feedDFP."/".$name_sectionDFP."/BoxBanner_1', [300, 250], 'div-gpt-ad-marriedtojonas-300x250-1').addService(googletag.pubads());
										googletag.defineSlot('/".$netDFP."/".$name_feedDFP."/".$name_sectionDFP."/BoxBanner_2', [300, 250], 'div-gpt-ad-marriedtojonas-300x250-2').addService(googletag.pubads());
										googletag.defineSlot('/".$netDFP."/".$name_feedDFP."/".$name_sectionDFP."/LeaderBoard', [728, 90], 'div-gpt-ad-marriedtojonas-728x90').addService(googletag.pubads());
										googletag.defineSlot('/".$netDFP."/".$name_feedDFP."/".$name_sectionDFP."/Header_Chico', [240, 90], 'div-gpt-ad-marriedtojonas-240x90').addService(googletag.pubads());
										googletag.defineSlot('/".$netDFP."/".$name_feedDFP."/".$name_sectionDFP."/Rectangulo_1', [300, 100], 'div-gpt-ad-marriedtojonas-300x100').addService(googletag.pubads());
										googletag.defineOutOfPageSlot('/".$netDFP."/".$name_feedDFP."/".$name_sectionDFP."/Floating_3ros', 'div-gpt-ad-marriedtojonas-floating_3ros').addService(googletag.pubads());";
						break;
						case "estrenos":
							$name_sectionDFP="Enews";
							$cod_slots="googletag.defineSlot('/".$netDFP."/".$name_feedDFP."/".$name_sectionDFP."/BoxBanner_1', [300, 250], 'div-gpt-ad-estrenos-300x250-1').addService(googletag.pubads());
										googletag.defineSlot('/".$netDFP."/".$name_feedDFP."/".$name_sectionDFP."/BoxBanner_2', [300, 250], 'div-gpt-ad-estrenos-300x250-2').addService(googletag.pubads());
										googletag.defineSlot('/".$netDFP."/".$name_feedDFP."/".$name_sectionDFP."/LeaderBoard', [728, 90], 'div-gpt-ad-estrenos-728x90').addService(googletag.pubads());
										googletag.defineSlot('/".$netDFP."/".$name_feedDFP."/".$name_sectionDFP."/Header_Chico', [240, 90], 'div-gpt-ad-estrenos-240x90').addService(googletag.pubads());
										googletag.defineSlot('/".$netDFP."/".$name_feedDFP."/".$name_sectionDFP."/Rectangulo_1', [300, 100], 'div-gpt-ad-estrenos-300x100').addService(googletag.pubads());
										googletag.defineOutOfPageSlot('/".$netDFP."/".$name_feedDFP."/".$name_sectionDFP."/Floating_3ros', 'div-gpt-ad-estrenos-floating_3ros').addService(googletag.pubads());";
						break;
						case "imperdivel":
							$name_sectionDFP="Enews";
							$cod_slots="googletag.defineSlot('/".$netDFP."/".$name_feedDFP."/".$name_sectionDFP."/BoxBanner_1', [300, 250], 'div-gpt-ad-imperdivel-300x250-1').addService(googletag.pubads());
										googletag.defineSlot('/".$netDFP."/".$name_feedDFP."/".$name_sectionDFP."/BoxBanner_2', [300, 250], 'div-gpt-ad-imperdivel-300x250-2').addService(googletag.pubads());
										googletag.defineSlot('/".$netDFP."/".$name_feedDFP."/".$name_sectionDFP."/LeaderBoard', [728, 90], 'div-gpt-ad-imperdivel-728x90').addService(googletag.pubads());
										googletag.defineSlot('/".$netDFP."/".$name_feedDFP."/".$name_sectionDFP."/Header_Chico', [240, 90], 'div-gpt-ad-imperdivel-240x90').addService(googletag.pubads());
										googletag.defineSlot('/".$netDFP."/".$name_feedDFP."/".$name_sectionDFP."/Rectangulo_1', [300, 100], 'div-gpt-ad-imperdivel-300x100').addService(googletag.pubads());
										googletag.defineOutOfPageSlot('/".$netDFP."/".$name_feedDFP."/".$name_sectionDFP."/Floating_3ros', 'div-gpt-ad-imperdivel-floating_3ros').addService(googletag.pubads());";
						break;
						case "foto-do-dia-2":
							$name_sectionDFP="Enews";
							$cod_slots="googletag.defineSlot('/".$netDFP."/".$name_feedDFP."/".$name_sectionDFP."/BoxBanner_1', [300, 250], 'div-gpt-ad-foto-do-dia-2-300x250-1').addService(googletag.pubads());
										googletag.defineSlot('/".$netDFP."/".$name_feedDFP."/".$name_sectionDFP."/BoxBanner_2', [300, 250], 'div-gpt-ad-foto-do-dia-2-300x250-2').addService(googletag.pubads());
										googletag.defineSlot('/".$netDFP."/".$name_feedDFP."/".$name_sectionDFP."/LeaderBoard', [728, 90], 'div-gpt-ad-foto-do-dia-2-728x90').addService(googletag.pubads());
										googletag.defineSlot('/".$netDFP."/".$name_feedDFP."/".$name_sectionDFP."/Header_Chico', [240, 90], 'div-gpt-ad-foto-do-dia-2-240x90').addService(googletag.pubads());
										googletag.defineSlot('/".$netDFP."/".$name_feedDFP."/".$name_sectionDFP."/Rectangulo_1', [300, 100], 'div-gpt-ad-foto-do-dia-2-300x100').addService(googletag.pubads());
										googletag.defineOutOfPageSlot('/".$netDFP."/".$name_feedDFP."/".$name_sectionDFP."/Floating_3ros', 'div-gpt-ad-foto-do-dia-2-floating_3ros').addService(googletag.pubads());";
						break;
						case "efashionblogger":
							$name_sectionDFP="EFashion_Blogger";
							$cod_slots="googletag.defineSlot('/".$netDFP."/".$name_feedDFP."/".$name_sectionDFP."/BoxBanner_1', [300, 250], 'div-gpt-ad-efashionblogger-300x250-1').addService(googletag.pubads());
										googletag.defineSlot('/".$netDFP."/".$name_feedDFP."/".$name_sectionDFP."/BoxBanner_2', [300, 250], 'div-gpt-ad-efashionblogger-300x250-2').addService(googletag.pubads());
										googletag.defineSlot('/".$netDFP."/".$name_feedDFP."/".$name_sectionDFP."/LeaderBoard', [728, 90], 'div-gpt-ad-efashionblogger-728x90').addService(googletag.pubads());
										googletag.defineSlot('/".$netDFP."/".$name_feedDFP."/".$name_sectionDFP."/Header_Chico', [240, 90], 'div-gpt-ad-efashionblogger-240x90').addService(googletag.pubads());
										googletag.defineSlot('/".$netDFP."/".$name_feedDFP."/".$name_sectionDFP."/Rectangulo_1', [300, 100], 'div-gpt-ad-efashionblogger-300x100').addService(googletag.pubads());
										googletag.defineOutOfPageSlot('/".$netDFP."/".$name_feedDFP."/".$name_sectionDFP."/Floating_3ros', 'div-gpt-ad-efashionblogger-floating_3ros').addService(googletag.pubads());";
						break;							
						case "the-kardashians":
							$name_sectionDFP="Kardashians";
							$cod_slots="googletag.defineSlot('/".$netDFP."/".$name_feedDFP."/".$name_sectionDFP."/BoxBanner_1', [300, 250], 'div-gpt-ad-the-kardashians-300x250-1').addService(googletag.pubads());
										googletag.defineSlot('/".$netDFP."/".$name_feedDFP."/".$name_sectionDFP."/BoxBanner_2', [300, 250], 'div-gpt-ad-the-kardashians-300x250-2').addService(googletag.pubads());
										googletag.defineSlot('/".$netDFP."/".$name_feedDFP."/".$name_sectionDFP."/LeaderBoard', [728, 90], 'div-gpt-ad-the-kardashians-728x90').addService(googletag.pubads());
										googletag.defineSlot('/".$netDFP."/".$name_feedDFP."/".$name_sectionDFP."/Header_Chico', [240, 90], 'div-gpt-ad-the-kardashians-240x90').addService(googletag.pubads());
										googletag.defineSlot('/".$netDFP."/".$name_feedDFP."/".$name_sectionDFP."/Rectangulo_1', [300, 100], 'div-gpt-ad-the-kardashians-300x100').addService(googletag.pubads());
										googletag.defineOutOfPageSlot('/".$netDFP."/".$name_feedDFP."/".$name_sectionDFP."/Floating_3ros', 'div-gpt-ad-kardashians-floating_3ros').addService(googletag.pubads());";
						break;
						case "thetrend":
							$name_sectionDFP="The_Trend";
							$cod_slots="googletag.defineSlot('/".$netDFP."/".$name_feedDFP."/".$name_sectionDFP."/BoxBanner_1', [300, 250], 'div-gpt-ad-thetrend-300x250-1').addService(googletag.pubads());
										googletag.defineSlot('/".$netDFP."/".$name_feedDFP."/".$name_sectionDFP."/BoxBanner_2', [300, 250], 'div-gpt-ad-thetrend-300x250-2').addService(googletag.pubads());
										googletag.defineSlot('/".$netDFP."/".$name_feedDFP."/".$name_sectionDFP."/LeaderBoard', [728, 90], 'div-gpt-ad-thetrend-728x90').addService(googletag.pubads());
										googletag.defineSlot('/".$netDFP."/".$name_feedDFP."/".$name_sectionDFP."/Header_Chico', [240, 90], 'div-gpt-ad-thetrend-240x90').addService(googletag.pubads());						
										googletag.defineSlot('/".$netDFP."/".$name_feedDFP."/".$name_sectionDFP."/Rectangulo_1', [300, 100], 'div-gpt-ad-thetrend-300x100').addService(googletag.pubads());
										googletag.defineOutOfPageSlot('/".$netDFP."/".$name_feedDFP."/".$name_sectionDFP."/Floating_3ros', 'div-gpt-ad-thetrend-floating_3ros').addService(googletag.pubads());";
						break;
						case "tapetevermelho":
							$name_sectionDFP="RedCarpet";
							$cod_slots="googletag.defineSlot('/".$netDFP."/".$name_feedDFP."/".$name_sectionDFP."/BoxBanner_1', [300, 250], 'div-gpt-ad-tapetevermelho-300x250-1').addService(googletag.pubads());
										googletag.defineSlot('/".$netDFP."/".$name_feedDFP."/".$name_sectionDFP."/BoxBanner_2', [300, 250], 'div-gpt-ad-tapetevermelho-300x250-2').addService(googletag.pubads());
										googletag.defineSlot('/".$netDFP."/".$name_feedDFP."/".$name_sectionDFP."/LeaderBoard', [728, 90], 'div-gpt-ad-tapetevermelho-728x90').addService(googletag.pubads());
										googletag.defineSlot('/".$netDFP."/".$name_feedDFP."/".$name_sectionDFP."/Header_Chico', [240, 90], 'div-gpt-ad-tapetevermelho-240x90').addService(googletag.pubads());						
										googletag.defineSlot('/".$netDFP."/".$name_feedDFP."/".$name_sectionDFP."/Rectangulo_1', [300, 100], 'div-gpt-ad-tapetevermelho-300x100').addService(googletag.pubads());
										googletag.defineOutOfPageSlot('/".$netDFP."/".$name_feedDFP."/".$name_sectionDFP."/Floating_3ros', 'div-gpt-ad-tapetevermelho-floating_3ros').addService(googletag.pubads());";
						break;

						case "goldenglobe":
							$name_sectionDFP="RedCarpet/Golden_Globe_Awards";
							$cod_slots="googletag.defineSlot('/".$netDFP."/".$name_feedDFP."/".$name_sectionDFP."/BoxBanner_1', [300, 250], 'div-gpt-ad-goldenglobe-300x250-1').addService(googletag.pubads());
										googletag.defineSlot('/".$netDFP."/".$name_feedDFP."/".$name_sectionDFP."/BoxBanner_2', [300, 250], 'div-gpt-ad-goldenglobe-300x250-2').addService(googletag.pubads());
										googletag.defineSlot('/".$netDFP."/".$name_feedDFP."/".$name_sectionDFP."/LeaderBoard', [728, 90], 'div-gpt-ad-goldenglobe-728x90').addService(googletag.pubads());
										googletag.defineSlot('/".$netDFP."/".$name_feedDFP."/".$name_sectionDFP."/Header_Chico', [240, 90], 'div-gpt-ad-goldenglobe-240x90').addService(googletag.pubads());						
										googletag.defineSlot('/".$netDFP."/".$name_feedDFP."/".$name_sectionDFP."/Rectangulo_1', [300, 100], 'div-gpt-ad-goldenglobe-300x100').addService(googletag.pubads());
										googletag.defineOutOfPageSlot('/".$netDFP."/".$name_feedDFP."/".$name_sectionDFP."/Floating_3ros', 'div-gpt-ad-goldenglobe-floating_3ros').addService(googletag.pubads());";
						break;
						case "sag":
							$name_sectionDFP="RedCarpet/Sag_Awards";
							$cod_slots="googletag.defineSlot('/".$netDFP."/".$name_feedDFP."/".$name_sectionDFP."/BoxBanner_1', [300, 250], 'div-gpt-ad-sag-300x250-1').addService(googletag.pubads());
										googletag.defineSlot('/".$netDFP."/".$name_feedDFP."/".$name_sectionDFP."/BoxBanner_2', [300, 250], 'div-gpt-ad-sag-300x250-2').addService(googletag.pubads());
										googletag.defineSlot('/".$netDFP."/".$name_feedDFP."/".$name_sectionDFP."/LeaderBoard', [728, 90], 'div-gpt-ad-sag-728x90').addService(googletag.pubads());
										googletag.defineSlot('/".$netDFP."/".$name_feedDFP."/".$name_sectionDFP."/Header_Chico', [240, 90], 'div-gpt-ad-sag-240x90').addService(googletag.pubads());						
										googletag.defineSlot('/".$netDFP."/".$name_feedDFP."/".$name_sectionDFP."/Rectangulo_1', [300, 100], 'div-gpt-ad-sag-300x100').addService(googletag.pubads());
										googletag.defineOutOfPageSlot('/".$netDFP."/".$name_feedDFP."/".$name_sectionDFP."/Floating_3ros', 'div-gpt-ad-sag-floating_3ros').addService(googletag.pubads());";
						break;
						case "grammy":
							$name_sectionDFP="RedCarpet/Grammy_Awards";
							$cod_slots="googletag.defineSlot('/".$netDFP."/".$name_feedDFP."/".$name_sectionDFP."/BoxBanner_1', [300, 250], 'div-gpt-ad-grammy-300x250-1').addService(googletag.pubads());
										googletag.defineSlot('/".$netDFP."/".$name_feedDFP."/".$name_sectionDFP."/BoxBanner_2', [300, 250], 'div-gpt-ad-grammy-300x250-2').addService(googletag.pubads());
										googletag.defineSlot('/".$netDFP."/".$name_feedDFP."/".$name_sectionDFP."/LeaderBoard', [728, 90], 'div-gpt-ad-grammy-728x90').addService(googletag.pubads());
										googletag.defineSlot('/".$netDFP."/".$name_feedDFP."/".$name_sectionDFP."/Header_Chico', [240, 90], 'div-gpt-ad-grammy-240x90').addService(googletag.pubads());						
										googletag.defineSlot('/".$netDFP."/".$name_feedDFP."/".$name_sectionDFP."/Rectangulo_1', [300, 100], 'div-gpt-ad-grammy-300x100').addService(googletag.pubads());
										googletag.defineOutOfPageSlot('/".$netDFP."/".$name_feedDFP."/".$name_sectionDFP."/Floating_3ros', 'div-gpt-ad-grammy-floating_3ros').addService(googletag.pubads());";
						break;
						case "oscar":
							$name_sectionDFP="RedCarpet/Oscar_Awards";
							$cod_slots="googletag.defineSlot('/".$netDFP."/".$name_feedDFP."/".$name_sectionDFP."/BoxBanner_1', [300, 250], 'div-gpt-ad-oscar-300x250-1').addService(googletag.pubads());
										googletag.defineSlot('/".$netDFP."/".$name_feedDFP."/".$name_sectionDFP."/BoxBanner_2', [300, 250], 'div-gpt-ad-oscar-300x250-2').addService(googletag.pubads());
										googletag.defineSlot('/".$netDFP."/".$name_feedDFP."/".$name_sectionDFP."/LeaderBoard', [728, 90], 'div-gpt-ad-oscar-728x90').addService(googletag.pubads());
										googletag.defineSlot('/".$netDFP."/".$name_feedDFP."/".$name_sectionDFP."/Header_Chico', [240, 90], 'div-gpt-ad-oscar-240x90').addService(googletag.pubads());						
										googletag.defineSlot('/".$netDFP."/".$name_feedDFP."/".$name_sectionDFP."/Rectangulo_1', [300, 100], 'div-gpt-ad-oscar-300x100').addService(googletag.pubads());
										googletag.defineOutOfPageSlot('/".$netDFP."/".$name_feedDFP."/".$name_sectionDFP."/Floating_3ros', 'div-gpt-ad-oscar-floating_3ros').addService(googletag.pubads());";
						break;
						case "latinbillboard":
							$name_sectionDFP="RedCarpet/Latin_Billboard";
							$cod_slots="googletag.defineSlot('/".$netDFP."/".$name_feedDFP."/".$name_sectionDFP."/BoxBanner_1', [300, 250], 'div-gpt-ad-latinbillboard-300x250-1').addService(googletag.pubads());
										googletag.defineSlot('/".$netDFP."/".$name_feedDFP."/".$name_sectionDFP."/BoxBanner_2', [300, 250], 'div-gpt-ad-latinbillboard-300x250-2').addService(googletag.pubads());
										googletag.defineSlot('/".$netDFP."/".$name_feedDFP."/".$name_sectionDFP."/LeaderBoard', [728, 90], 'div-gpt-ad-latinbillboard-728x90').addService(googletag.pubads());
										googletag.defineSlot('/".$netDFP."/".$name_feedDFP."/".$name_sectionDFP."/Header_Chico', [240, 90], 'div-gpt-ad-latinbillboard-240x90').addService(googletag.pubads());						
										googletag.defineSlot('/".$netDFP."/".$name_feedDFP."/".$name_sectionDFP."/Rectangulo_1', [300, 100], 'div-gpt-ad-latinbillboard-300x100').addService(googletag.pubads());
										googletag.defineOutOfPageSlot('/".$netDFP."/".$name_feedDFP."/".$name_sectionDFP."/Floating_3ros', 'div-gpt-ad-latinbillboard-floating_3ros').addService(googletag.pubads());";
						break;
						case "emmy":
							$name_sectionDFP="RedCarpet/Emmy_Awards";
							$cod_slots="googletag.defineSlot('/".$netDFP."/".$name_feedDFP."/".$name_sectionDFP."/BoxBanner_1', [300, 250], 'div-gpt-ad-emmy-300x250-1').addService(googletag.pubads());
										googletag.defineSlot('/".$netDFP."/".$name_feedDFP."/".$name_sectionDFP."/BoxBanner_2', [300, 250], 'div-gpt-ad-emmy-300x250-2').addService(googletag.pubads());
										googletag.defineSlot('/".$netDFP."/".$name_feedDFP."/".$name_sectionDFP."/LeaderBoard', [728, 90], 'div-gpt-ad-emmy-728x90').addService(googletag.pubads());
										googletag.defineSlot('/".$netDFP."/".$name_feedDFP."/".$name_sectionDFP."/Header_Chico', [240, 90], 'div-gpt-ad-emmy-240x90').addService(googletag.pubads());						
										googletag.defineSlot('/".$netDFP."/".$name_feedDFP."/".$name_sectionDFP."/Rectangulo_1', [300, 100], 'div-gpt-ad-emmy-300x100').addService(googletag.pubads());
										googletag.defineOutOfPageSlot('/".$netDFP."/".$name_feedDFP."/".$name_sectionDFP."/Floating_3ros', 'div-gpt-ad-emmy-floating_3ros').addService(googletag.pubads());";
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
						$name_sectionDFP="glamcam360";
						$cod_slots="googletag.defineSlot('/".$netDFP."/".$name_feedDFP."/".$name_sectionDFP."/LeaderBoard', [728, 90], 'div-gpt-ad-".$postSlug."-728x90').addService(googletag.pubads());
									googletag.defineSlot('/".$netDFP."/".$name_feedDFP."/".$name_sectionDFP."/Header_Chico', [240, 90], 'div-gpt-ad-".$postSlug."-240x90').addService(googletag.pubads());						
									googletag.defineSlot('/".$netDFP."/".$name_feedDFP."/".$name_sectionDFP."/Rectangulo_1', [300, 100], 'div-gpt-ad-".$postSlug."-300x100').addService(googletag.pubads());
									googletag.defineOutOfPageSlot('/".$netDFP."/".$name_feedDFP."/".$name_sectionDFP."/Floating_3ros', 'div-gpt-ad-".$postSlug."-floating_3ros').addService(googletag.pubads());";
					break;
					case "iamcait":
						$name_sectionDFP="Enews";
						$cod_slots="googletag.defineSlot('/".$netDFP."/".$name_feedDFP."/".$name_sectionDFP."/LeaderBoard', [728, 90], 'div-gpt-ad-".$postSlug."-728x90').addService(googletag.pubads());
									googletag.defineSlot('/".$netDFP."/".$name_feedDFP."/".$name_sectionDFP."/Header_Chico', [240, 90], 'div-gpt-ad-".$postSlug."-240x90').addService(googletag.pubads());						
									googletag.defineSlot('/".$netDFP."/".$name_feedDFP."/".$name_sectionDFP."/LeaderBoard', [728, 90], 'div-gpt-ad-".$postSlug."-728x90').addService(googletag.pubads());
									googletag.defineOutOfPageSlot('/".$netDFP."/".$name_feedDFP."/".$name_sectionDFP."/Floating_3ros', 'div-gpt-ad-".$postSlug."-floating_3ros').addService(googletag.pubads());";
					break;
					case "younger":
						$name_sectionDFP="Enews";
						$cod_slots="googletag.defineSlot('/".$netDFP."/".$name_feedDFP."/".$name_sectionDFP."/LeaderBoard', [728, 90], 'div-gpt-ad-".$postSlug."-728x90').addService(googletag.pubads());
									googletag.defineSlot('/".$netDFP."/".$name_feedDFP."/".$name_sectionDFP."/Header_Chico', [240, 90], 'div-gpt-ad-".$postSlug."-240x90').addService(googletag.pubads());						
									googletag.defineSlot('/".$netDFP."/".$name_feedDFP."/".$name_sectionDFP."/LeaderBoard', [728, 90], 'div-gpt-ad-".$postSlug."-728x90').addService(googletag.pubads());
									googletag.defineOutOfPageSlot('/".$netDFP."/".$name_feedDFP."/".$name_sectionDFP."/Floating_3ros', 'div-gpt-ad-".$postSlug."-floating_3ros').addService(googletag.pubads());";
					break;
					case "eshows":
						$name_sectionDFP="Eshows";
						$cod_slots="googletag.defineSlot('/".$netDFP."/".$name_feedDFP."/".$name_sectionDFP."/LeaderBoard', [728, 90], 'div-gpt-ad-".$postSlug."-728x90').addService(googletag.pubads());
									googletag.defineSlot('/".$netDFP."/".$name_feedDFP."/".$name_sectionDFP."/Header_Chico', [240, 90], 'div-gpt-ad-".$postSlug."-240x90').addService(googletag.pubads());						
									googletag.defineSlot('/".$netDFP."/".$name_feedDFP."/".$name_sectionDFP."/Rectangulo_1', [300, 100], 'div-gpt-ad-".$postSlug."-300x100').addService(googletag.pubads());
									googletag.defineOutOfPageSlot('/".$netDFP."/".$name_feedDFP."/".$name_sectionDFP."/Floating_3ros', 'div-gpt-ad-".$postSlug."-floating_3ros').addService(googletag.pubads());";
					break;
					case "programas":
						$name_sectionDFP="Programacion";
						$cod_slots="googletag.defineSlot('/".$netDFP."/".$name_feedDFP."/".$name_sectionDFP."/LeaderBoard', [728, 90], 'div-gpt-ad-".$postSlug."-728x90').addService(googletag.pubads());
									googletag.defineSlot('/".$netDFP."/".$name_feedDFP."/".$name_sectionDFP."/Header_Chico', [240, 90], 'div-gpt-ad-".$postSlug."-240x90').addService(googletag.pubads());						
									googletag.defineSlot('/".$netDFP."/".$name_feedDFP."/".$name_sectionDFP."/Rectangulo_1', [300, 100], 'div-gpt-ad-".$postSlug."-300x100').addService(googletag.pubads());
									googletag.defineOutOfPageSlot('/".$netDFP."/".$name_feedDFP."/".$name_sectionDFP."/Floating_3ros', 'div-gpt-ad-".$postSlug."-floating_3ros').addService(googletag.pubads());";
					break;
					case "fashionpolice":
						$name_sectionDFP="Fashion_Police";
						$cod_slots="googletag.defineSlot('/".$netDFP."/".$name_feedDFP."/".$name_sectionDFP."/LeaderBoard', [728, 90], 'div-gpt-ad-".$postSlug."-728x90').addService(googletag.pubads());
									googletag.defineSlot('/".$netDFP."/".$name_feedDFP."/".$name_sectionDFP."/Header_Chico', [240, 90], 'div-gpt-ad-".$postSlug."-240x90').addService(googletag.pubads());						
									googletag.defineSlot('/".$netDFP."/".$name_feedDFP."/".$name_sectionDFP."/Rectangulo_1', [300, 100], 'div-gpt-ad-".$postSlug."-300x100').addService(googletag.pubads());
									googletag.defineOutOfPageSlot('/".$netDFP."/".$name_feedDFP."/".$name_sectionDFP."/Floating_3ros', 'div-gpt-ad-".$postSlug."-floating_3ros').addService(googletag.pubads());";
					break;
					/*case "galerias_page":
						$idGallery=$_GET["gallery"];
						$cod_slots="googletag.defineSlot('/8877/Brasil/Fotos/BoxBanner_1', [300, 250], 'div-gpt-ad-galerias_page-300x250-1').addService(googletag.pubads()).setTargeting('galleryid', '".$idGallery."');";
					break;*/
					case "galerias":
						$name_sectionDFP="Galerias";
						$cod_slots="googletag.defineSlot('/".$netDFP."/".$name_feedDFP."/".$name_sectionDFP."/LeaderBoard', [728, 90], 'div-gpt-ad-".$postSlug."-728x90').addService(googletag.pubads());
									googletag.defineSlot('/".$netDFP."/".$name_feedDFP."/".$name_sectionDFP."/Header_Chico', [240, 90], 'div-gpt-ad-".$postSlug."-240x90').addService(googletag.pubads());						
									googletag.defineSlot('/".$netDFP."/".$name_feedDFP."/".$name_sectionDFP."/Rectangulo_1', [300, 100], 'div-gpt-ad-".$postSlug."-300x100').addService(googletag.pubads());
									googletag.defineOutOfPageSlot('/".$netDFP."/".$name_feedDFP."/".$name_sectionDFP."/Floating_3ros', 'div-gpt-ad-".$postSlug."-floating_3ros').addService(googletag.pubads());";
					break;
					case "videos":
						$name_sectionDFP="Videos";
						$cod_slots="googletag.defineSlot('/".$netDFP."/".$name_feedDFP."/".$name_sectionDFP."/LeaderBoard', [728, 90], 'div-gpt-ad-".$postSlug."-728x90').addService(googletag.pubads());
									googletag.defineSlot('/".$netDFP."/".$name_feedDFP."/".$name_sectionDFP."/Header_Chico', [240, 90], 'div-gpt-ad-".$postSlug."-240x90').addService(googletag.pubads());						
									googletag.defineSlot('/".$netDFP."/".$name_feedDFP."/".$name_sectionDFP."/Rectangulo_1', [300, 100], 'div-gpt-ad-".$postSlug."-300x100').addService(googletag.pubads());
									googletag.defineOutOfPageSlot('/".$netDFP."/".$name_feedDFP."/".$name_sectionDFP."/Floating_3ros', 'div-gpt-ad-".$postSlug."-floating_3ros').addService(googletag.pubads());";
					break;
					case "app":
						$name_sectionDFP="Homepage";
						$cod_slots="googletag.defineSlot('/".$netDFP."/".$name_feedDFP."/".$name_sectionDFP."/LeaderBoard', [728, 90], 'div-gpt-ad-".$postSlug."-728x90').addService(googletag.pubads());
									googletag.defineSlot('/".$netDFP."/".$name_feedDFP."/".$name_sectionDFP."/Header_Chico', [240, 90], 'div-gpt-ad-".$postSlug."-240x90').addService(googletag.pubads());						
									googletag.defineSlot('/".$netDFP."/".$name_feedDFP."/".$name_sectionDFP."/Rectangulo_1', [300, 100], 'div-gpt-ad-".$postSlug."-300x100').addService(googletag.pubads());
									googletag.defineOutOfPageSlot('/".$netDFP."/".$name_feedDFP."/".$name_sectionDFP."/Floating_3ros', 'div-gpt-ad-".$postSlug."-floating_3ros').addService(googletag.pubads());";
					break;
					case "timeline":
						$name_sectionDFP="Homepage";
						$cod_slots="googletag.defineSlot('/".$netDFP."/".$name_feedDFP."/".$name_sectionDFP."/LeaderBoard', [728, 90], 'div-gpt-ad-".$postSlug."-728x90').addService(googletag.pubads());
									googletag.defineSlot('/".$netDFP."/".$name_feedDFP."/".$name_sectionDFP."/Header_Chico', [240, 90], 'div-gpt-ad-".$postSlug."-240x90').addService(googletag.pubads());						
									googletag.defineSlot('/".$netDFP."/".$name_feedDFP."/".$name_sectionDFP."/Rectangulo_1', [300, 100], 'div-gpt-ad-".$postSlug."-300x100').addService(googletag.pubads());
									googletag.defineOutOfPageSlot('/".$netDFP."/".$name_feedDFP."/".$name_sectionDFP."/Floating_3ros', 'div-gpt-ad-".$postSlug."-floating_3ros').addService(googletag.pubads());";
					break;
					case "contacto":
						$name_sectionDFP="Homepage";
						$cod_slots="googletag.defineSlot('/".$netDFP."/".$name_feedDFP."/".$name_sectionDFP."/LeaderBoard', [728, 90], 'div-gpt-ad-".$postSlug."-728x90').addService(googletag.pubads());
									googletag.defineSlot('/".$netDFP."/".$name_feedDFP."/".$name_sectionDFP."/Header_Chico', [240, 90], 'div-gpt-ad-".$postSlug."-240x90').addService(googletag.pubads());						
									googletag.defineSlot('/".$netDFP."/".$name_feedDFP."/".$name_sectionDFP."/Rectangulo_1', [300, 100], 'div-gpt-ad-".$postSlug."-300x100').addService(googletag.pubads());
									googletag.defineOutOfPageSlot('/".$netDFP."/".$name_feedDFP."/".$name_sectionDFP."/Floating_3ros', 'div-gpt-ad-".$postSlug."-floating_3ros').addService(googletag.pubads());";
					break;
					case "politicas-de-privacidad":
						$name_sectionDFP="Homepage";
						$cod_slots="googletag.defineSlot('/".$netDFP."/".$name_feedDFP."/".$name_sectionDFP."/LeaderBoard', [728, 90], 'div-gpt-ad-".$postSlug."-728x90').addService(googletag.pubads());
									googletag.defineSlot('/".$netDFP."/".$name_feedDFP."/".$name_sectionDFP."/Header_Chico', [240, 90], 'div-gpt-ad-".$postSlug."-240x90').addService(googletag.pubads());						
									googletag.defineSlot('/".$netDFP."/".$name_feedDFP."/".$name_sectionDFP."/Rectangulo_1', [300, 100], 'div-gpt-ad-".$postSlug."-300x100').addService(googletag.pubads());
									googletag.defineOutOfPageSlot('/".$netDFP."/".$name_feedDFP."/".$name_sectionDFP."/Floating_3ros', 'div-gpt-ad-".$postSlug."-floating_3ros').addService(googletag.pubads());";
					break;
					case "terminos-de-uso":
						$name_sectionDFP="Homepage";
						$cod_slots="googletag.defineSlot('/".$netDFP."/".$name_feedDFP."/".$name_sectionDFP."/LeaderBoard', [728, 90], 'div-gpt-ad-".$postSlug."-728x90').addService(googletag.pubads());
									googletag.defineSlot('/".$netDFP."/".$name_feedDFP."/".$name_sectionDFP."/Header_Chico', [240, 90], 'div-gpt-ad-".$postSlug."-240x90').addService(googletag.pubads());						
									googletag.defineSlot('/".$netDFP."/".$name_feedDFP."/".$name_sectionDFP."/Rectangulo_1', [300, 100], 'div-gpt-ad-".$postSlug."-300x100').addService(googletag.pubads());
									googletag.defineOutOfPageSlot('/".$netDFP."/".$name_feedDFP."/".$name_sectionDFP."/Floating_3ros', 'div-gpt-ad-".$postSlug."-floating_3ros').addService(googletag.pubads());";
					break;
					case "politica-de-remocion":
						$name_sectionDFP="Homepage";
						$cod_slots="googletag.defineSlot('/".$netDFP."/".$name_feedDFP."/".$name_sectionDFP."/LeaderBoard', [728, 90], 'div-gpt-ad-".$postSlug."-728x90').addService(googletag.pubads());
									googletag.defineSlot('/".$netDFP."/".$name_feedDFP."/".$name_sectionDFP."/Header_Chico', [240, 90], 'div-gpt-ad-".$postSlug."-240x90').addService(googletag.pubads());						
									googletag.defineSlot('/".$netDFP."/".$name_feedDFP."/".$name_sectionDFP."/Rectangulo_1', [300, 100], 'div-gpt-ad-".$postSlug."-300x100').addService(googletag.pubads());
									googletag.defineOutOfPageSlot('/".$netDFP."/".$name_feedDFP."/".$name_sectionDFP."/Floating_3ros', 'div-gpt-ad-".$postSlug."-floating_3ros').addService(googletag.pubads());";
					break;
					default:
						$name_sectionDFP="Homepage";
						$cod_slots="googletag.defineSlot('/".$netDFP."/".$name_feedDFP."/".$name_sectionDFP."/LeaderBoard', [728, 90], 'div-gpt-ad-home-728x90').addService(googletag.pubads());
									googletag.defineSlot('/8877/Brasil/Homepage/Header_Chico', [240, 90], 'div-gpt-ad-home-240x90').addService(googletag.pubads());
									googletag.defineSlot('/".$netDFP."/".$name_feedDFP."/".$name_sectionDFP."/Rectangulo_1', [300, 100], 'div-gpt-ad-home-300x100').addService(googletag.pubads());
									googletag.defineSlot('/8877/Brasil/Homepage/LeaderBoard', [728, 90], 'div-gpt-ad-home-728x90').addService(googletag.pubads());";
					break;// FALTA DEFAULT HOME
				}

				$cod_dinamic=execute_define("Page", $ConArray, NULL, $name_feedDFP, $name_sectionDFP, NULL, $postSlug);
				echo $cod_dinamic;

}

echo $cod_slots;?>
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
<?
	$seccion=$_POST["s"];
	//echo ($_GET["c"]."<br>");

	if($seccion=="is_home"){

					$cod_slots="googletag.defineSlot('/8877/DEV/Homepage/BoxBanner_1', [300, 250], 'div-gpt-ad-home-300x250-1').addService(googletag.pubads());
					googletag.defineSlot('/8877/DEV/Homepage/BoxBanner_2', [300, 250], 'div-gpt-ad-home-300x250-2').addService(googletag.pubads());
					googletag.defineSlot('/8877/DEV/Homepage/Header_Chico', [240, 90], 'div-gpt-ad-home-240x90').addService(googletag.pubads());
					googletag.defineSlot('/8877/DEV/Homepage/Imperdible', [170, 30], 'div-gpt-ad-home-170x30').addService(googletag.pubads());
					googletag.defineSlot('/8877/DEV/Homepage/LeaderBoard', [728, 90], 'div-gpt-ad-home-728x90').addService(googletag.pubads());
					googletag.defineSlot('/8877/DEV/Homepage/PageBanner', [960, 400], 'div-gpt-ad-home-960x400').addService(googletag.pubads());
					googletag.defineSlot('/8877/DEV/Homepage/Floating', [720, 300], 'div-gpt-ad-home-720x300').addService(googletag.pubads());
					googletag.defineSlot('/8877/DEV/Homepage/Rectangulo_1', [300, 100], 'div-gpt-ad-home-300x100-1').addService(googletag.pubads());
					googletag.defineSlot('/8877/DEV/Homepage/Rectangulo_2', [300, 100], 'div-gpt-ad-home-300x100-2').addService(googletag.pubads());
					googletag.defineSlot('/8877/DEV/Homepage/Skin', [2000, 1000], 'div-gpt-ad-home-2000x1000').addService(googletag.pubads());
					googletag.defineSlot('/8877/DEV/Homepage/Billboard', [970, 31], 'div-gpt-ad-home-970x31').addService(googletag.pubads());
					googletag.defineSlot('/8877/DEV/Homepage/Pushdown', [970, 90], 'div-gpt-ad-home-970x90').addService(googletag.pubads());
					googletag.defineOutOfPageSlot('/8877/DEV/Homepage/Floating_3ros', 'div-gpt-ad-home-floating_3ros').addService(googletag.pubads());
					googletag.defineOutOfPageSlot('/8877/DEV/Homepage/Slider', 'div-gpt-ad-home-slider').addService(googletag.pubads());
					googletag.defineSlot('/8877/DEV/Homepage/FloorAd', [1, 1], 'div-gpt-ad-home-floorad').addService(googletag.pubads());
					googletag.defineSlot('/8877/DEV/Homepage/Toppost', [630, 50], 'div-gpt-ad-home-630x50').addService(googletag.pubads());";
				
					echo $cod_slots;
					echo "googletag.pubads().enableSyncRendering();
					googletag.pubads().enableSingleRequest();
					googletag.pubads().collapseEmptyDivs();
					googletag.enableServices();";
	}
?>
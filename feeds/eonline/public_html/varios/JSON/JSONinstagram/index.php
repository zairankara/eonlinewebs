<?php	
	function getJsonToUrl($url){
		$html = file_get_contents($url);
		$code = "";
		$display_src="";
		$caption="";
		if ( preg_match_all('|window._sharedData = {(.*?)};|is' , $html , $cap, PREG_SET_ORDER ) )
		{
		    if ( preg_match_all('|"code": "(.*?)"|is', $cap[0][1], $c, PREG_SET_ORDER) )
			{
			    $code=$c;
			}
			if ( preg_match_all('|"display_src": "(.*?)"|is', $cap[0][1], $d, PREG_SET_ORDER) )
			{
			    $display_src=$d;
			}
			if ( preg_match_all('|"caption": "(.*?)"|is', $cap[0][1], $d, PREG_SET_ORDER) )
			{
			    $caption=$d;
			}
			$json = array();
			for ($i=0; $i < 6; $i++) { 
				$json[$i]['code'] = $code[$i][1];
				$json[$i]['display_src'] = $display_src[$i][1];
				$json[$i]['caption'] = $caption[$i][1];
			}
		}
		return $json;
	}
	if(date("H")<2 || date("H")>6){
		$json_string = json_encode(getJsonToUrl("https://www.instagram.com/eonlinelatino/"), JSON_FORCE_OBJECT);
		$file = '/home/eonline/public_html/varios/JSON/JSONinstagram/eonlinelatino.json';
		if(file_put_contents($file, $json_string)){
			echo "El JSON eonlinelatinose guardo correctamente.";
		}
		$json_string = json_encode(getJsonToUrl("https://www.instagram.com/eonlinebrasil/"), JSON_FORCE_OBJECT);
		$file = '/home/eonline/public_html/varios/JSON/JSONinstagram/eonlinebrasil.json';
		if(file_put_contents($file, $json_string)){
			echo "El JSON eonlinebrasil guardo correctamente.";
		}
	}
?>

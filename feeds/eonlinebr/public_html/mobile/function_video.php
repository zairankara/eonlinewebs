<?php 
function sacar_video($Html_vid){
		$tiene_video_home=0;

		//YOUTUBE $content 
		$embed2_home="";
		$embed_home="";
		$extrae_vid = '/<iframe .*src=["\']([^ ^"^\']*)["\']/';
		preg_match_all( $extrae_vid , $Html_vid , $matches_vid );
		$video = $matches_vid[1][0];
		$video=substr($video,0, 28);
		//echo($video."::VIDEO");
		 if($video=="http://www.youtube.com/embed")
		{
			$parser_vid='|\<iframe (.*?)iframe\>|is'; 

			if(preg_match($parser_vid, $Html_vid, $embed3)) 
			{ 
				$embed2_home=$embed2_home.$embed3[1];
			} 

			$embed_home=str_replace('width="570"', 'width="310"', $embed2_home);
			$embed_home=str_replace('height="370"', 'height="200"', $embed_home);
			$embed_home=str_replace('height="412"', 'height="200"', $embed_home);

			if($embed_home)  $script_video='<div class="entry-thumb"/><iframe  '.$embed_home.'iframe></div>';
			$video_youtube=1;
		}else{
			$video_youtube=0;
		}

			//VIMEO $content 
		$embed_cod22="";
		$extrae_vimeo = '/<iframe .*src=["\']([^ ^"^\']*)["\']/';
		preg_match_all( $extrae_vimeo , $Html_vid , $matches_vimeo );
		$video_vimeo = $matches_vimeo[1][0];
		$video_vimeo=substr($video_vimeo,0, 30);

		//echo($video."::VIDEO");
		 if($video_vimeo=="http://player.vimeo.com/video/")
		{
			$parser_vimeo='|\<iframe (.*?)iframe\>|is'; 

			if(preg_match($parser_vimeo, $Html_vid, $embed33)) 
			{ 
				$embed22=$embed22.$embed33[1];
			} 

			$embed_cod22=str_replace('width="570"', 'width="310"', $embed22);
			$embed_cod22=str_replace('height="370"', 'height="200"', $embed_cod22);
			$embed_cod22=str_replace('height="412"', 'height="200"', $embed_cod22);

			if($embed_cod22) $script_video='<div class="entry-thumb"/><iframe '.$embed_cod22.'iframe></div>';
			$video_vimeo=1;
		}else{
			$video_vimeo=0;
		}


		//BRIGHTCOVE
		$embed_cod="";
		$brightcove="";
		$brightcove_inicio=explode("<!-- Start of Brightcove Player -->", $Html_vid);
		$comienzo=$brightcove_inicio[1];

		$brightcove_fin=explode('<script type="text/javascript">brightcove.createExperiences();</script>', $comienzo);
		$brightcove=$brightcove_fin[0];

		if($brightcove!="") {
			$parser='|\<object (.*?)object>|is'; 
			     
			if(preg_match($parser, $brightcove, $embed1)) 
			{ 
				$embed=$embed.$embed1[1];
			} 

			$embed_cod=str_replace('<param name="width" value="480" />', '<param name="width" value="310" />', $embed);
			$embed_cod=str_replace('<param name="height" value="270" />', '<param name="height" value="200" />', $embed_cod);
			$embed_cod=str_replace('<param name="width" value="570" />', '<param name="width" value="310" />', $embed_cod);
			$embed_cod=str_replace('<param name="height" value="370" />', '<param name="height" value="200" />', $embed_cod);


			$script_video="<object ".$embed_cod."object><script type='text/javascript'>brightcove.createExperiences();</script>";
			
			$video_brigth=1;
		}else{
			$video_brigth=0;
		}

		$tiene_video=1;

		if($video_brigth==1 or $video_youtube==1 or $video_vimeo==1) {
			
		}
		//exit($script_video."-------------");
		return $script_video;

}
?>


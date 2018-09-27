<?
// MOBILE 
	if(is_single() || is_page( ) || is_attachment()){
		$id_post="reader.php?f=".$var_con[0]."&id=".get_the_ID();
	}else{
		$id_post="parser.php?f=".$var_con[0]."";
	}
	$agent="";
	$agent = $_SERVER['HTTP_USER_AGENT'];  
	$mobile=0;
	 
	if(strpos($agent, "iPhone")==TRUE){
		$mobile=1;
	}elseif(strpos($agent, "Android")==TRUE){
		$mobile=1;
	}elseif(strpos($agent, "BlackBerry")==TRUE){
		$mobile=1;
	}elseif(strpos($agent, "iPod")==TRUE){
		$mobile=1;
	}

	if(is_page("galerias") && $mobile==1){
		$var_url="http://la.eonline.com/mobile/gallery.php?f=".$var_con[0]."&gallery=".$_GET["gallery"];
		    exit("<script>location.href='".$var_url."';</script>");    

	}elseif($mobile==1){
		//header('Location:http://la.eonline.com/mobile/'.$id_post);
		$var_url2="http://la.eonline.com/mobile/".$id_post;
		exit("<script>location.href='".$var_url2."';</script>");    

	}
	?>
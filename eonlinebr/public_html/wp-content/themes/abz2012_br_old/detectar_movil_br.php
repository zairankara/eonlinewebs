<?

if(is_single() || is_page( ) || is_attachment()){
    $id_post="reader.php?id=".get_the_ID();
}else{
    $id_post="parser.php";
}

$agent="";
$agent = $_SERVER['HTTP_USER_AGENT'];  
$mobile=0;

 
if(strpos($agent, "iPhone")!== FALSE){
    $mobile=1;
}elseif(strpos($agent, "Android")!== FALSE){
    $mobile=1;
}elseif(strpos($agent, "BlackBerry")!== FALSE){
    $mobile=1;
}


if(is_page("galerias_page") && $mobile==1){
    //header("Location:http://br.eonline.com/mobile/gallery.php?gallery=".$_GET["gallery"]);
    $var_url="http://br.eonline.com/mobile/gallery.php?gallery=".$_GET["gallery"];
	echo "<script>location.href='".$var_url."';</script>";
    exit();  
}elseif($mobile==1){
    //
    $var_url2="http://br.eonline.com/mobile/".$id_post;
    //if($_GET["abz"]!=1) echo("--- ".$var_url2);
    //header('Location:http://br.eonline.com/mobile/'.$id_post);
	//exit("aca");
    exit("<script>location.href='".$var_url2."';</script>");    
}
?>
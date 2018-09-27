
<?
$agent = $_SERVER['HTTP_USER_AGENT'];

if(strpos($agent, "iPhone")== FALSE && strpos($agent, "Android")== FALSE && strpos($agent, "BlackBerry")== FALSE ){

$img ="";
$url_la ="";
}

 if(strpos($agent, "iPhone")!== FALSE){
	$url_la="https://itunes.apple.com/br/app/e!-online/id576087540?ls=1&mt=8";
	$img="iphone.jpg";
}elseif(strpos($agent, "Android")!== FALSE){
	$url_la="https://play.google.com/store/apps/details?id=com.eonline.la.Ebr";
	$img="android.jpg";
}elseif(strpos($agent, "BlackBerry")!== FALSE){
	$url_la="http://appworld.blackberry.com/webstore/content/19752303/?lang=en";
	$img="blackBerry.jpg";
}
?>


<a href="<?=$url_la;?>" target="_blank"><img src="<?=$img?>" alt=""></a>

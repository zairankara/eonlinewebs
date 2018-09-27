<?php 
error_reporting(E_ALL);
ini_set("display_errors", 1);
$ver=phpversion();
echo 'Versión actual de PHP: ' . $ver;
echo '<br>';
if($ver=="5.4.7"){
	echo 'MIA34';
}else{
	echo 'MIA30';
}
echo '<br>'.$_SERVER["SERVER_NAME"]."!";
$dom = new DOMDocument;

?>

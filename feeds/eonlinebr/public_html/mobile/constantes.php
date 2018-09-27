<?php
//error_reporting(E_ALL);
//ini_set("display_errors", 1);

$servername="http://".$_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];

$ufeed="brasil";
$feed="brasil";


$name="";
$dbname="eonlinebr_eonlinedb";
$volver="Volver";
$dbhost="preprodabzdb";
$dbuser="eonline_usr";
$dbpass="30nl1n3";

$chandle = mysql_connect($dbhost, $dbuser, $dbpass);
if (!$chandle){
		$error = msg_error_conexion;
	}else{
		$db_selected= mysql_select_db($dbname, $chandle);
		if (!$db_selected) {
			$error = msg_error_conexion;
		}
	}
echo mysql_error();

$ruta_mobile="http://br.eonline.com/mobile/";
$namefeed=ucwords($ufeed);
$var_url_desktop="http://br.eonline.com/?p=".$_GET['id'];
$urlShareFB3="?u=".$var_url_desktop;
?>
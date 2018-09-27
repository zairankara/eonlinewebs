<?
$dbhost="localhost";
$dbname="eonlinebr_eonlinedb";
$dbuser="root";
$dbpass="toor";

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
?>
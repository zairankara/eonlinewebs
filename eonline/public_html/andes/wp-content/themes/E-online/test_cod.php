<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<HTML>
 <HEAD>
  <TITLE> New Document </TITLE>
  <META NAME="Generator" CONTENT="EditPlus">
  <META NAME="Author" CONTENT="">
  <META NAME="Keywords" CONTENT="">
  <META NAME="Description" CONTENT="">
 </HEAD>

 <BODY>
 <?

	$dbhost="preprodabzdb";
	$dbname="eonline_argentina";
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

			$qwuery=mysql_query("SELECT title_str FROM abmProgram WHERE id_program=66");
			$row=mysql_fetch_array($qwuery);
			$test_tit=$row["title_str"];


			echo("<div style='padding: 5px; color: #5178bc; font: 10px/22px Tahoma, Arial; border-bottom:1px solid #001534; width:90%; margin:0 5px'><strong>   <span  style='color: #fff;'>".html_entity_decode($test_tit)." -  ".$test_tit."</span></strong></div>");?>

 </BODY>
</HTML>

<?php
session_start();
error_reporting(E_ALL&~E_NOTICE); 
ini_set("display_errors", 1);

if($_POST["feed"]=="")$_POST["feed"]="argentina"; //default DB feed!

switch($_POST["feed"])
{
 case "andes":$edition="mx";$_SESSION["feed"]="andes";break;
 case "argentina":$edition="mx";$_SESSION["feed"]="argentina";break;
 case "brasil":$edition="br";$_SESSION["feed"]="brasil";break;
 case "mexico":$edition="mx";$_SESSION["feed"]="mexico";break;
 case "venezuela":$edition="mx";$_SESSION["feed"]="venezuela";break;
 case "colombia":$edition="mx";$_SESSION["feed"]="colombia";break;
 //case "italia":$edition="it";break;
 case "us":$edition="us";$_SESSION["feed"]="argentina";break;
 default:$edition="mx";$_SESSION["feed"]="argentina";break;
}

include("classes.php");

$obj=new General();

$vecConcat = array("title" => $_POST["title"], "author" => $_POST["author"], "startDate" => $_POST["startDate"], "endDate" => $_POST["endDate"], "category" => $_POST["category"], "num" => $_POST["num"], "edition" => $edition);

$migrar=$_POST["migrar"];

switch($migrar)
{
	case "posts":
		$xmlArray=$obj->ReadWsXml(WS_PRD."/V2/blogAPI/blogs/".$_POST["id"], $vecConcat);
		$xmlArray=$obj->MigrateBlogData($xmlArray);
		break;
	case "galleries":		
		$xmlArray=$obj->ReadWsXml(WS_PRD."/V2/imageAPI/galleries/".$_POST["id"], $vecConcat);
		$xmlArray=$obj->MigrateGalleriesData($xmlArray);
		break;
	default:
		echo("No se ha seleccionado ningun Web Service para migrar. Debe ingresar la variable '?migrar' seguido de posts|galleries");
		break;
}

$closed=$obj->CloseCNX();
//echo("Closed:$closed");
?>


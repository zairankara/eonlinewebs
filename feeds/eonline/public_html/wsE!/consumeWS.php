<?php
session_start();
error_reporting(E_ALL&~E_NOTICE); 
ini_set("display_errors", 1);

if($_POST["feed"]=="")$_POST["feed"]="argentina"; //default DB feed!

switch($_POST["feed"])
{
 case "andes":$edition="co";$_SESSION["feed"]="andes";break;
 case "argentina":$edition="ar";$_SESSION["feed"]="argentina";break;
 case "brasil":$edition="br";$_SESSION["feed"]="brasil";break;
 case "mexico":$edition="mx";$_SESSION["feed"]="mexico";break;
 case "venezuela":$edition="ve";$_SESSION["feed"]="venezuela";break;
 case "colombia":$edition="co";$_SESSION["feed"]="colombia";break;
 //case "italia":$edition="it";break;
 case "us":$edition="us";$_SESSION["feed"]="argentina";break;
 default:$edition="mx";$_SESSION["feed"]="argentina";break;
}

include("classes.php");

$obj=new General();

$findShared="false";

/*for($m=0;$m<=1;$m++)
{
	if($m==1)$findShared="true";
 */
	$vecConcat = array("title" => $_POST["title"], "author" => $_POST["author"], "startDate" => $_POST["startDate"], "endDate" => $_POST["endDate"], "category" => $_POST["category"], "num" => $_POST["num"], "edition" => $edition, "findShared"=>$findShared);

	$migrar=$_POST["migrar"];

	switch($migrar)
	{
	case "posts":

		/*$fp=fopen("logs/Debug".$_SESSION["feed"]."$findShared.txt","wt");
                fwrite($fp,$vecConcat["findeShared"]);
		fclose($fp);*/

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
//}
$closed=$obj->CloseCNX();
//echo("Closed:$closed");
?>

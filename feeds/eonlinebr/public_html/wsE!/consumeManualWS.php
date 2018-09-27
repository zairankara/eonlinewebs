<?php
session_start();

if($_POST["flag"]==1)
{

	$_SESSION["ids_posted"]=$_POST["id"];
	$vecIds=array();
	if(is_numeric($_POST["id"]))
	{
		array_push($vecIds, (string)$_POST["id"] ); //only one gallery
	}else{
		if( strpos($_POST["id"], ",")===false) 
		{
			$_SESSION["informes_errors"]="Id debe ser numérico o debe ingresar numeros separados por coma, usted ingresó: ".$_POST["id"];
			header("location:".$_SERVER["PHP_SELF"]);
		}
		$vec=explode(",",$_POST["id"]); //more than one gallery
		foreach($vec as $value)array_push($vecIds, (string)$value); 
	}

	$_SESSION["informes"]="";
	$_SESSION["informes_migrados"]="";
	$_SESSION["informes_errors"]="";
	$_SESSION["report"]="";
			include("classes.php");
			$obj=new General();



	foreach($vecIds as $value) //Recorro los id /s ingresados
	{

	 $_POST["id"]=trim($value);


		if(!is_numeric($_POST["id"]))
		{
			$_SESSION["informes_errors"]="Id debe ser numérico, usted ingresó: ".$_POST["id"];
			header("location:".$_SERVER["PHP_SELF"]);
		}

		if($_POST["consumir"]!="post"&&$_POST["consumir"]!="gallery")
		{
			$_SESSION["informes_errors"]="Solo se pueden consumir posts o galleries!";
			header("location:".$_SERVER["PHP_SELF"]);
		}

		if($_SESSION["informes_errors"]=="")
		{
			$_GET["feed"]=$_POST["feed"];

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

			$vecConcat = array("edition" => $edition);

			$_GET["id"]=$_POST["id"];

			$migrar=$_POST["consumir"];

			switch($migrar)
			{
				case "post":

					$xmlArray=$obj->ReadWsXml(WS_PRD."/V2/blogAPI/blogs/".$_GET["id"], $vecConcat);
					$xmlArray=$obj->MigrateBlogData($xmlArray, "manualImport");
					if($xmlArray=="")
					{				
						$_SESSION["informes_errors"].="<br /><br />El post <b>".$_GET["id"]."</b> es inexistente.";
					}else{
						$_SESSION["informes_migrados"].="<br />".$_GET["id"]."</b>";
					}
					//exit("entra al flag5:".$_POST["id"]);

					break;
				case "gallery":		
					$xmlArray=$obj->ReadWsXml(WS_PRD."/V2/imageAPI/galleries/".$_GET["id"], $vecConcat);
					$xmlArray=$obj->MigrateGalleriesData($xmlArray, "manualImport");
					if($xmlArray=="")
					{				
						$_SESSION["informes_errors"].="<br /><br />La galería <b>".$_GET["id"]."</b> es inexistente.";
					}else{
						$_SESSION["informes_migrados"].="<br />".$_GET["id"]."</b>";
					}
					break;
				default:
					$_SESSION["informes"].="<br /><br />No se ha seleccionado ningun Web Service para migrar. Debe ingresar la variable '?migrar' seguido de posts|galleries";
					break;
			}

		}
	}
			$closed=$obj->CloseCNX();
}
?>
<html>
<title>WS Consume</title>
<head>
<style>

body{
	/*background:url('eonlinelatino.gif') top center no-repeat;*/
   background: #f5f5f7 url(imgs/bgPOST_br.jpg) no-repeat center top;
	background-position-y:-60px;
	color:#fff;
}

div{
	font-family:arial;
	font-size:14px;
	color:#ffffff;
	padding:10px;
	float:left;
}

select{
	font-family: Arial, Verdana, Helvetica, sans-serif;
	font-size: 14px;
	color: darkred;
	background-color: #FFFFFF;
	border: 1px solid #CCCCCC;
	padding:1px;
	margin: 1px;
}

.content{
	width:1024px;
	margin:100 auto auto;
	background-color: rgba(0,0,0,0.6);
	padding:1em 2em;-moz-border-radius:11px;-khtml-border-radius:11px;-webkit-border-radius:11px;border-radius:11px;border:1px solid #dfdfdf;
}

.sbm{
	background: darkred;
	color:#fff; 
	font-family:Arial, Verdana; 
	font-weight:bold;
	cursor:pointer;
	padding:5px;
}

p{
	color:red; 
	background:#fff;
	font-family:Arial, Verdana;
	font-size: 16px;
	font-style:italic;
	background-color: rgba(0,0,0,0.6);
	padding:5px;
}
</style>
</head>

<body>

<a href="consumeManualGalleries.php" style="padding:4px 6px; background-color:red; color:white;text-decoration:none;">NUEVO! PARA IMPORTAR GALERIAS HAGA CLICK AQUI</a>

<form name="ff" method="post" action="<?=$_SERVER['PHP_SELF']?>">

<input type="hidden" name="flag" value="1">

<div class="content" style="float:none;">

	<div>Solicitamos por favor que el consumo se realice <b>sólamente</b> para casos de emergencia, de esta manera evitamos consumir mas recursos sobre el servidor.</div>
	<br clear="all" />
	<div>
		Seleccione Feed:
	</div>
	<div>
		<select name="feed">
		<!--<option value="andes" <?if($_POST["feed"]=="andes")echo("SELECTED");?>>Andes</option>
		<option value="argentina" <?if($_POST["feed"]=="argentina")echo("SELECTED");?>>Argentina</option>-->
		<option value="brasil" <?if($_POST["feed"]=="brasil")echo("SELECTED");?>>Brasil</option>
		<!--<option value="mexico" <?if($_POST["feed"]=="mexico")echo("SELECTED");?>>Mexico</option>
		<option value="venezuela" <?if($_POST["feed"]=="venezuela")echo("SELECTED");?>>Venezuela</option>-->
		</select>
	</div>
	<!--<div>
		Seleccione que desea consumir:
	</div>
	<div>
		<select name="consumir">
		<option value="post" <?if($_POST["consumir"]=="post")echo("SELECTED");?>>Post</option>
		<option value="gallery" <?if($_POST["consumir"]=="gallery")echo("SELECTED");?>>Gallery</option>
		</select>
	</div>-->
	<input type="hidden" value="post" name="consumir">

	<div>
		Ingrese el ID/IDs que desea importar separados por comas (ej: 1584, 1587, 2584):
	</div>
	<br clear="all" />
	<div>
		<textarea name="id" style="width:1000px;height:50px;"><?=$_SESSION["ids_posted"]?></textarea>
	</div>
	<br clear="all" />
	<div style="float:right;">
		<input type="submit" value="Importar ahora!" class="sbm">
	</div>

	<br clear="all" />
	<?if($_SESSION["informes_migrados"]!=""){?><center><p> migrado satisfactoriamente:<?=$_SESSION["informes_migrados"]?><br /><br /></p></center><?}?>
	<?if($_SESSION["report"]!=""){?><center><p> Report:<?=$_SESSION["report"]?><br /><br /></p></center><?}?>
	<?if($_SESSION["informes_errors"]!=""){?><center><p> Errors Log:<?=$_SESSION["informes_errors"]?><br /><br /></p></center><?}?>

</div>

</form>

</body>
<html>

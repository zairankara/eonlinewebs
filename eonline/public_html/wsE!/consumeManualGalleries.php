<?php
//exit("HOLA");
//echo ("11:50 -- ".time());
session_start();

if($_POST["flag"]==1)
{
	
   	/*while ($post = each($_POST))
    {
        echo $post[0] . " = " . $post[1]."<br/>";
    }
    exit();*/
    
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

	include("classesMati.php");
	$obj=new General();
	foreach($vecIds as $value) //Recorro los id /s ingresados
	{

	 $_POST["id"]=trim($value);

		if(!is_numeric($_POST["id"]))
		{
			$_SESSION["informes_errors"]="Id debe ser numérico, usted ingresó: ".$_POST["id"];
			header("location:".$_SERVER["PHP_SELF"]);
		}

		if($_POST["id"]=="")
		{
			$_SESSION["informes_errors"]="Debe poner un ID para importar!";
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
			$edition="mx";

			$vecConcat = array("edition" => $edition);

			$_GET["id"]=$_POST["id"];

			$migrar=$_POST["consumir"];
           
            //GALLERY
            $xmlArray=$obj->ReadWsXml(WS_PRD."/V2/imageAPI/galleries/".$_GET["id"], $vecConcat);
            $xmlArray=$obj->MigrateGalleriesData2014($xmlArray, "manualImport");
            if($xmlArray=="")
            {				
                $_SESSION["informes_errors"].="<br /><br />La galería <b>".$_GET["id"]."</b> es inexistente o no fue modificado en SAGE.";
            }else{
                $_SESSION["xmlArray"]=$xmlArray;
                $_SESSION["informes_migrados"].="<br />".$_GET["id"]."</b>";
            }

            //POST
             /*$xmlArray=$obj->ReadWsXml(WS_PRD."/V2/blogAPI/blogs/".$_GET["id"], $vecConcat);
			$xmlArray=$obj->MigrateBlogData($xmlArray, "manualImport");
			if($xmlArray=="")
			{				
				$_SESSION["informes_errors"].="<br /><br />El post <b>".$_GET["id"]."</b> es inexistente o no fue modificado en SAGE.";
			}else{
				$_SESSION["informes_migrados"].="<br />".$_GET["id"]."</b>";
			}*/

		}
	}
			$closed=$obj->CloseCNX();
}
?>
<html>
<title>WS Consume Manual Galerias</title>
<head>
    <script type="text/javascript" src="efblogger/js/jquery.min.js"></script>

<!--<link rel="stylesheet" href="efblogger/style.css" />-->
<style>
form, html, body {
    margin:0;
}
body {
   background: #f5f5f7 url(imgs/bgGALLERY_la.jpg) no-repeat center top;
}
div{
	font-family:arial;
	font-size:12px;
	color:#999;
	padding:10px;
}
select{
	font-family: Arial, Verdana, Helvetica, sans-serif;
	font-size: 14px;
	color: #ee0c1c;
	background-color: #FFFFFF;
	border: 1px solid #ee0c1c;
	padding:1px;
	margin: 1px;
}
.content{
	width:700px;
	margin:175px auto auto;
	padding:1em 2em;
}
.sbm{
	background: #ee0c1c;
	color:#fff; 
	font-family:Arial, Verdana; 
	font-weight:bold;
	cursor:pointer;
	padding:5px;
    border:none;
}
p{
	color:red; 
	font-family:Arial, Verdana;
	font-size: 13px;
	font-style:italic;
	background-color: rgba(0,0,0,0.6);
	padding:10px;
}    
    p.titulo{
        font-size: 17px;
        color:white; 
        background: none;
        font-weight:bold;
        font-style:normal;
 }
textarea{
    width:680px;
    height:50px;
    border:none;
    background:#f0f0f0;
    color:#999;
    font-family:Arial, Verdana;
    padding:10px;
    font-weight:bold;
}
.reporte{
    position:absolute;
    width:250px;
    background-color: rgba(0,0,0,0.8);
    top:0;
    display:none;
}
.reporte .close{
    width:35px;
    height:35px;
    background: url(efblogger/close1.png) no-repeat;
    float:right;
    cursor:pointer;
    margin-right: -20px;
}
#feeds option{
    color: #ee0c1c;
}
</style>
</head>

<body>
<div class="reporte" id="reportes" <?if($_SESSION["informes_migrados"]!="" || $_SESSION["report"]!="" || $_SESSION["informes_errors"]!=""){?> style="display:block"<?}?>>
        <div class="close"  onclick="javascript:document.getElementById('reportes').style.display='none';"></div>
        <div class="textos">
            <p class="titulo">REPORTES</p>
            <?if($_SESSION["informes_migrados"]!=""){?><p> migrado satisfactoriamente:<?=$_SESSION["informes_migrados"]?><br /><br /></p><?}?>
            <?if($_SESSION["report"]!=""){?><p> Report:<?=$_SESSION["report"]?><br /><br /></p><?}?>
            <?if($_SESSION["informes_errors"]!=""){?><p> Errors Log:<?=$_SESSION["informes_errors"]?><br /><br /></p><?}?>
        </div>
</div>
    <form name="ff" method="post" action="<?=$_SERVER['PHP_SELF']?>">

    <input type="hidden" name="flag" value="1">
    <input type="hidden" name="consumir" value="gallery">
    <div class="content">

        <div>
            Ingrese el ID/IDs que desea importar separados por comas (ej: 1584, 1587, 2584):
        </div>
        <br clear="all" />
        <div>
            <textarea name="id"><?=$_SESSION["ids_posted"]?></textarea>
        </div>
       <!-- <br clear="all" />
        <div style="float:left;" id="feeds">
             <select name="feed">
            <option value="andes" <?if($_POST["feed"]=="andes")echo("SELECTED");?>>Andes</option>
            <option value="argentina" <?if($_POST["feed"]=="argentina")echo("SELECTED");?>>Argentina</option>
            <option value="mexico" <?if($_POST["feed"]=="mexico")echo("SELECTED");?>>Mexico</option>
            <option value="venezuela" <?if($_POST["feed"]=="venezuela")echo("SELECTED");?>>Venezuela</option>
            </select>
        </div>-->
        <div style="float:right;">
            <input type="submit" value="Importar ahora!" class="sbm">
        </div>

    </div>

    </form>

<script>
$(document).ready(function() {
 	$(window).bind("resize", methodToFixLayout);
 	function methodToFixLayout( e ) {
	 	var xHeight=$(window).height();
	 	$('.reporte').css({height: xHeight+"px" });
	}
	methodToFixLayout();

 });
 </script>
</body>
<html>

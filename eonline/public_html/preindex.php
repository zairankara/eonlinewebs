<?
/*$agent = $_SERVER['HTTP_USER_AGENT'];  
$mobile=0;
 
if(strpos($agent, "iPhone")!== FALSE){
	$mobile=1;
}elseif(strpos($agent, "Android")!== FALSE){
	$mobile=1;
}elseif(strpos($agent, "BlackBerry")!== FALSE){
	$mobile=1;
}

if($mobile==1){
	header("Location:http://la.eonline.com/preindex_mobile.php");
    exit();  
}
*/

if($_COOKIE["selectorE"]!=""){
    $pais = $_COOKIE["selectorE"];
    /*if (in_array($pais, $MX))     {$feed = "mexico";}
	elseif (in_array($pais, $VE)) {$feed = "venezuela";}
	elseif (in_array($pais, $AN)) {$feed = "andes";}
	elseif (in_array($pais, $AR)) {$feed = "argentina";}
	else                          {$feed = "";}*/
	switch ($pais) {
		case 'CO':
			$feed = "andes";
			break;
		case 'AR':
			$feed = "argentina";
			break;
		case 'MX':
			$feed = "mexico";
			break;
		case 'VZ':
			$feed = "venezuela";
			break;
		default:
			$feed = "";
			break;
	}

    if($feed!=""){
	    header("Location: http://la.eonline.com/".trim($feed));
    }
}


	// SI NO EXISTE LA COOKIE, LA GENERO Y LA GRABO--   LA COOKIE VENCE AL 1AÑO
	if($_GET["i"]!=""){
		$paiscual=base64_decode($_GET["i"]);
		$cual_array=explode("-", $paiscual);
		$pais=$cual_array[1];
		$cual=$cual_array[0];
		if($cual!="99") {
			setcookie("ubicacion","$cual",0, "/");
			setcookie("selectorE","$pais",0, "/");
		}			
		switch($cual){
			case "1":header('Location: http://la.eonline.com/andes/');break;
			case "2":header('Location: http://la.eonline.com/argentina/');break;
			case "3":header('Location: http://la.eonline.com/mexico/');break;
			case "4":header('Location: http://la.eonline.com/venezuela/');break;
			case "99":header('Location: http://br.eonline.com/');break;
		}
		exit;
	}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr" lang="es-ES">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>E! Online Latinoamérica</title>
<meta name="Keywords" content="Eonlinelatino, E! latino, E!, estrenos, gente e, latinoamerica, programacion, 100%latino, eonline, alfombra roja, galerias, foros, fotos gente, espectaculo, noticias, e! news, concursos, vota por, esta noche, e! entertainment latinoamerica, contactos, chica e!, daniela kosan, lo mas e!" />
<meta name="Description" content="E! Entertainment Television Latinoamérica. Todo el mundo del espectáculo  las 24 horas del días, los 365 días del año. Desde Hollywood para toda Latinoamérica. En sintonía con todo el continente latinoaméricano" />
<meta name="Abstract" content="E! Entertainment Television Latinoamérica. Todo el mundo del espectáculo  las 24 horas del días, los 365 días del año. Desde Hollywood para toda Latinoamérica. En sintonía con todo el continente latinoaméricano" />
<meta name="identifier-url" content="http://www.eonlinelatinola.com/"/>
<meta name="Language" content="spanish"/>
<meta name="Distribution" content="Global"/>
<meta name="revisit-after" content="1 day"/>
<meta name="Category" content="entertainment"/>
<meta name="DC.title" content="Eonlinelatino"/>
<meta name="Author" content="http://www.abzcomunicacion.com" />
<link rel="alternate" href="http://la.eonline.com/preindex.php" hreflang="x-default" />
<link rel="canonical" href="http://la.eonline.com/preindex.php" />

<?
//NUEVO GA
include($_SERVER["DOCUMENT_ROOT"]."/common/ga.php");
?>
<link href="/varios/bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
<!-- FONT-FACE -->
<link href='https://fonts.googleapis.com/css?family=Oswald:400,300,700' rel='stylesheet' type='text/css'>        
<!-- / FONT-FACE -->

<style type="text/css">
		body{
			background: #fff url(bg_preindex2014.jpg) no-repeat right top;
			margin: 0px;
			text-align:center;
			background-size: 100%;
			width:100%;
			height:100%;
		}
		html{
			width:100%;
			height:100%;
		}
		.todo{
			width:100%;
			height:100%;
			margin: auto;
			text-align:left;
			position: relative;
		}
		h1{
			font-family: "Oswald", "Arial Narrow", Sans-Serif;
			text-rendering: optimizeLegibility;
			text-transform: uppercase;
			/* letter-spacing: 1px; */
			text-decoration: none;
			font-size: 30px;
			line-height: 1.32;
			color: #000;
			font-weight: 400;
		}
		.vacio{
			    position: absolute;
			    top: 20%;
			    left: 50%;
			    width: 250px;
			    height: 100px;
			    margin-top: -50px;
			    margin-left: -120px;
		}
		.contenedor_general{
			width:150px;
			height:100px;
			margin-left:270px;
			float:left;
		}
		.contenedor_general p{
			text-indent: -9000px;
		}
		.ir{
			width: 35px;
			height:24px;
			background-color: #000;
			color:#fff;
			border: 1px solid #ccc;
			padding: 4px 8px;
			display:block;
			border:0px;
			cursor:pointer;
			float:left;
			margin-top:10px;
		}
		.footer{
			background-color: #ddd;
			color:#999;
			text-align: center;
			position: fixed;
			bottom: 0;
			width: 100%;
			    font-size: 10px;
		}
</style>
</head>

<body>
<div class="todo" id="preindex">
	<div class="vacio">
			<h1>BIENVENIDO A<BR>E! ONLINE LATINOAMÉRICA</h1>
			<div class="btn-group">
								  <a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
								    Seleccione su país
								    <span class="caret"></span>
								  </a>
								  <ul class="dropdown-menu">
								    <!-- dropdown menu links -->
								    <li><a href="preindex.php?i=<?=base64_encode("2-AR");?>">Argentina</a></li>
									<li><a href="preindex.php?i=<?=base64_encode("1-CO");?>">Aruba</a></li>
									<li><a href="preindex.php?i=<?=base64_encode("1-CO");?>">Barbados</a></li>
									<li><a href="preindex.php?i=<?=base64_encode("1-CO");?>">Bolivia</a></li>
									<li><a href="preindex.php?i=<?=base64_encode("99-BR");?>">Brasil</a></li>
									<li><a href="preindex.php?i=<?=base64_encode("1-CO");?>">Chile</a></li>
									<li><a href="preindex.php?i=<?=base64_encode("1-CO");?>">Colombia</a></li>
									<li><a href="preindex.php?i=<?=base64_encode("1-CO");?>">Costa Rica</a></li>
									<li><a href="preindex.php?i=<?=base64_encode("1-CO");?>">Curacao</a></li>
									<li><a href="preindex.php?i=<?=base64_encode("1-CO");?>">Ecuador</a></li>
									<li><a href="preindex.php?i=<?=base64_encode("1-CO");?>">El Salvador</a></li>
									<li><a href="preindex.php?i=<?=base64_encode("1-CO");?>">Guatemala</a></li>
									<li><a href="preindex.php?i=<?=base64_encode("1-CO");?>">Honduras</a></li>
									<li><a href="preindex.php?i=<?=base64_encode("3-mx");?>">México</a></li>
									<li><a href="preindex.php?i=<?=base64_encode("1-CO");?>">Nicaragua</a></li>
									<li><a href="preindex.php?i=<?=base64_encode("1-CO");?>">Panamá</a></li>
									<li><a href="preindex.php?i=<?=base64_encode("2-AR");?>">Paraguay</a></li>
									<li><a href="preindex.php?i=<?=base64_encode("1-CO");?>">Perú</a></li>
									<li><a href="preindex.php?i=<?=base64_encode("1-CO");?>">Puerto Rico</a></li>
									<li><a href="preindex.php?i=<?=base64_encode("1-CO");?>">Republica Dominicana</a></li>
									<li><a href="preindex.php?i=<?=base64_encode("1-CO");?>">Trinidad & Tobago</a></li>
									<li><a href="preindex.php?i=<?=base64_encode("2-AR");?>">Uruguay</a></li>
									<li><a href="preindex.php?i=<?=base64_encode("4-VE");?>">Venezuela</a></li>
								  </ul>
								</div>
	</div>

</div>
<div class="footer">
E! Entertainment Television Latinoamérica. Todo el mundo del espectáculo las 24 horas del días, los 365 días del año. Desde Hollywood para toda Latinoamérica. En sintonía con todo el continente latinoaméricano.
</div>
<script src="http://code.jquery.com/jquery.js"></script>
<script src="/varios/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>

<?
$dbhost="preprodabzdb";
$dbname="eonlinebr_eonlinedb";
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

function mes($mes){

	switch($mes){
		case "01":$mes="Ene";break;
		case "02":$mes="Feb";break;
		case "03":$mes="Mar";break;
		case "04":$mes="Abr";break;
		case "05":$mes="May";break;
		case "06":$mes="Jun";break;
		case "07":$mes="Jul";break;
		case "08":$mes="Ago";break;
		case "09":$mes="Sep";break;
		case "10":$mes="Oct";break;
		case "11":$mes="Nov";break;
		case "12":$mes="Dic";break;
	}
	return $mes;
}

function horario($id){

	switch($id){
					case "0" :
						$horario = "06:00";
						break;
					case "1" :
						$horario = "06:30";
						break;
					case "2" :
						$horario = "07:00";
						break;
					case "3" :
						$horario = "07:30";
						break;
					case "4" :
						$horario = "08:00";
						break;
					case "5" :
						$horario = "08:30";
						break;
					case "6" :
						$horario = "09:00";
						break;
					case "7" :
						$horario = "09:30";
						break;
					case "8" :
						$horario = "10:00";
						break;
					case "9" :
						$horario = "10:30";
						break;
					case "10" :
						$horario = "11:00";
						break;
					case "11" :
						$horario = "11:30";
						break;
					case "12" :
						$horario = "12:00";
						break;
					case "13" :
						$horario = "12:30";
						break;
					case "14" :
						$horario = "13:00";
						break;
					case "15" :
						$horario = "13:30";
						break;
					case "16" :
						$horario = "14:00";
						break;
					case "17" :
						$horario = "14:30";
						break;
					case "18" :
						$horario = "15:00";
						break;
					case "19" :
						$horario = "15:30";
						break;
					case "20" :
						$horario = "16:00";
						break;
					case "21" :
						$horario = "16:30";
						break;
					case "22" :
						$horario = "17:00";
						break;
					case "23" :
						$horario = "17:30";
						break;
					case "24" :
						$horario = "18:00";
						break;
					case "25" :
						$horario = "18:30";
						break;
					case "26" :
						$horario = "19:00";
						break;
					case "27" :
						$horario = "19:30";
						break;
					case "28" :
						$horario = "20:00";
						break;
					case "29" :
						$horario = "20:30";
						break;
					case "30" :
						$horario = "21:00";
						break;
					case "31" :
						$horario = "21:30";
						break;
					case "32" :
						$horario = "22:00";
						break;
					case "33" :
						$horario = "22:30";
						break;
					case "34" :
						$horario = "23:00";
						break;
					case "35" :
						$horario = "23:30";
						break;
					case "36" :
						$horario = "00:00";
						break;
					case "37" :
						$horario = "00:30";
						break;
					case "38" :
						$horario = "01:00";
						break;
					case "39" :
						$horario = "01:30";
						break;
					case "40" :
						$horario = "02:00";
						break;
					case "41" :
						$horario = "02:30";
						break;
					case "42" :
						$horario = "03:00";
						break;
					case "43" :
						$horario = "03:30";
						break;
					case "44" :
						$horario = "04:00";
						break;
					case "45" :
						$horario = "04:30";
						break;
					case "46" :
						$horario = "05:00";
						break;
					case "47" :
						$horario = "05:30";
						break;
	}
return $horario;
}

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN"
        "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title>E! Online Latinoamérica | Programación</title>
	<meta name="generator" content="BBEdit 9.1" />
	<meta http-equiv="Cache-Control" content="no-cache" />
	<meta http-equiv="Pragma" content="no-cache" />
	<meta http-equiv="Expires" content="0" />
	<meta name="Author" content="http://www.abzcomunicacion.com" />
	<meta name="Description" content="" />
	<meta name="Keywords" content="" />
	<link rel="author" href="http://www.abzcomunicacion.com">

<!-- estilos -->
<link rel="stylesheet" type="text/css" href="css/styles.css" />

</head>
<body>
<div id="cont_gral">

<!-- COL IZQ -->
<div class="col_izq">
	<?

	// BRASIL 
	$id_beam="5";


	//buscar los datos del beam
	$sql2 = "SELECT tz_str FROM sched_beam where id_beam = ".$id_beam;
	$query2 = mysql_query($sql2);
	$row_beam=mysql_fetch_array($query2);
	$tz_beam = $row_beam['tz_str'];

	//crear un ts para la hora de inicio del beam
	date_default_timezone_set($tz_beam);

	$hora=date("H");// DE 0 A 23
	$dia_letra=date("w");//0-DOMINGO
	if($hora>=0&&$hora<=6){
		if($dia_letra==0){
			$dia_letra=6;
		}else{
			$dia_letra=$dia_letra-1;
		}
	}
	$dia=date("d");
	$mes=date("m");
	$mes_letras=mes($mes);
	$anio=date("Y");

	?>
	<!-- Fecha -->
	<div class="fecha"><?=$dia?><span class="mes"><?=$mes_letras?></span></div>
	<!-- / Fecha -->
	
	<!-- Menu Horario -->
	<ul class="menu_horario">
		<li><a href="programacion.php?franja=1&dia=<?=$_GET["dia"]?>" title="Mañana" class="manana <?if ($_GET["franja"]=="" || $_GET["franja"]=="1") echo ("selected");?>">MAÑANA</a></li>
		<li><a href="programacion.php?franja=2&dia=<?=$_GET["dia"]?>" title="Tarde" class="tarde <?if ($_GET["franja"]=="2") echo ("selected");?>">TARDE</a></li>
		<li><a href="programacion.php?franja=3&dia=<?=$_GET["dia"]?>" title="Noche" class="noche <?if ($_GET["franja"]=="3") echo ("selected");?>">NOCHE</a></li>
		<li><a href="programacion.php?franja=4&dia=<?=$_GET["dia"]?>" title="Trasnoche" class="trasnoche <?if ($_GET["franja"]=="4") echo ("selected");?>">TRASNOCHE</a></li>
	</ul>
	<!-- / Menu Horario -->

</div>
<!-- / COL IZQ -->

<!-- COL DER -->
<div class="col_der">

	<!-- Menu Dias -->
	<div class="cont_menu_dia">
	<ul class="menu_dia">
		<li><a href="programacion.php?franja=<?=$_GET["franja"]?>&dia=1" title="Lunes" class="lunes <?if ($_GET["dia"]=="") {if($dia_letra=="1")echo ("selected");}else{if($_GET["dia"]=="1") echo ("selected");}?>">LUNES</a></li>
		<li><a href="programacion.php?franja=<?=$_GET["franja"]?>&dia=2" title="Martes" class="martes <?if ($_GET["dia"]=="") {if($dia_letra=="2")echo ("selected");}else{if($_GET["dia"]=="2") echo ("selected");}?>">MARTES</a></li>
		<li><a href="programacion.php?franja=<?=$_GET["franja"]?>&dia=3" title="Miércoles" class="miercoles <?if ($_GET["dia"]=="") {if($dia_letra=="3")echo ("selected");}else{if($_GET["dia"]=="3") echo ("selected");}?>">MIERCOLES</a></li>
		<li><a href="programacion.php?franja=<?=$_GET["franja"]?>&dia=4" title="Jueves" class="jueves <?if ($_GET["dia"]=="") {if($dia_letra=="4")echo ("selected");}else{if($_GET["dia"]=="4") echo ("selected");}?>">JUEVES</a></li>
		<li><a href="programacion.php?franja=<?=$_GET["franja"]?>&dia=5" title="Viernes" class="viernes <?if ($_GET["dia"]=="") {if($dia_letra=="5")echo ("selected");}else{if($_GET["dia"]=="5") echo ("selected");}?>">VIERNES</a></li>
		<li><a href="programacion.php?franja=<?=$_GET["franja"]?>&dia=6" title="Sábado" class="sabado <?if ($_GET["dia"]=="") {if($dia_letra=="6")echo ("selected");}else{if($_GET["dia"]=="6") echo ("selected");}?>">SABADO</a></li>
		<li><a href="programacion.php?franja=<?=$_GET["franja"]?>&dia=0" title="Domingo" class="domingo <?if ($_GET["dia"]=="") {if($dia_letra=="0")echo ("selected");}else{if($_GET["dia"]=="0") echo ("selected");}?>">DOMINGO</a></li>
	</ul>
	</div>
	<!-- / Menu Dias -->
	
	<!-- Módulos Programas -->
	<?
	if($_GET["franja"]=="" || $_GET["franja"]=="1"){
		$franja="morning";
		$inicio=0;
		$fin=12;
	}else{
		switch($_GET["franja"]){
			case "2":
				$franja="afternoon";
				$inicio=13;
				$fin=24;
			break;
			case "3":
				$franja="evening";
				$inicio=25;
				$fin=35;
			break;
			case "4":
				$franja="night";
				$inicio=36;
				$fin=47;
			break;
		
		}
	}

	
	//buscar el id de la fecha
	$sql1 = "select id_date from sched_date where day = ".$dia." and month =  ".$mes." and year = ".$anio;
	$query1=mysql_query($sql1);
	$row_date=mysql_fetch_array($query1);
	$id_date = $row_date['id_date']; 


	if($_GET["dia"]!=""){
		if($_GET["dia"]==0){$dia_inicio=7;}else{$dia_inicio=$_GET["dia"];}
		if($dia_letra==0){$dia_fin=7;}else{$dia_fin=$dia_letra;}

		$sql_dia=$id_date+($dia_inicio-$dia_fin);
	}else{
		$sql_dia=$id_date;
	}

	$sql="SELECT id_grid, ini_bol, title_program_str, chapter_program_str, title_str, p.id_program, p.content_str
	FROM sched_grid g
	LEFT JOIN sched_program p ON p.id_program = g.id_program
	WHERE g.id_date =$sql_dia AND g.id_beam =$id_beam AND id_grid>=$inicio AND id_grid<=$fin
	ORDER BY id_grid";
	//exit(" ".$sql);
	$query=mysql_query($sql);
	$cant=mysql_num_rows($query);
	$i=0;

	//echo("Cookie:".$id_beam);
	//echo("DIA:".	date("d - m -Y"));

	if($cant==0 || !isset($cant)){
			echo ("No hay registros cargados aún, intenté nuevamente mas tarde");
	}else{
			while($row=mysql_fetch_array($query))
			{
				
				$id_grid =$row["id_grid"];
				$ini_bol =$row["ini_bol"];
				$titulo =$row["title_program_str"];
				$title =$row["title_str"];
				$chapter_program_str =$row["chapter_program_str"];
				if($row['content_str']){
					$content = utf8_encode(substr($row['content_str'], 0,100)); 
					$content.=" ..."; 
				}else{
					$content="";
				}
				if($ini_bol=="1"){
				$flag=horario($id_grid);	

					?>
					<div class="modulo_prog">
						<div class="<?=$franja?>">
							<div class="hora"><?= $flag?></div>
							<div class="programa">
							<img src="imgs/programas/TrueBeauty.jpg" alt="" width="233" height="60" border="0" align="left" />
							<h1><?if($titulo) echo $titulo?><?if(isset($title) && $title!=$titulo) echo " - ".$title ?></h1>
							<?if($chapter_program_str) echo "<p><b>".$chapter_program_str."</b></p>" ?>
							<p><?if($content) echo $content ?></p>
							</div>
							<br clear="all" />
						</div>
					</div>
				<?}
				$i++;
			}
	}

	?>
	<!-- / Módulos Programas -->

</div>
<!-- / COL DER -->
<br clear="all" />

<!-- LOGOS PIE -->
<div class="logos_pie"></div>
<!-- / LOGOS PIE -->

</div>
</body>
</html>

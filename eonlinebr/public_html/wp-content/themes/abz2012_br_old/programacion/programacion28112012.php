
<script language="JavaScript" type="text/javascript">
function variables(franja, dia){
	document.getElementById("franja").value=franja;
	document.getElementById("dia").value=dia;
	document.ff.submit();
}
</script>

<?php

function mes($mes){

	switch($mes){
		case "01":$mes="Jan";break;
		case "02":$mes="Fev";break;
		case "03":$mes="Mar";break;
		case "04":$mes="Abr";break;
		case "05":$mes="Mai";break;
		case "06":$mes="Jun";break;
		case "07":$mes="Jul";break;
		case "08":$mes="Ago";break;
		case "09":$mes="Set";break;
		case "10":$mes="Out";break;
		case "11":$mes="Nov";break;
		case "12":$mes="Dez";break;
	}
	return $mes;
}

function horario($id){

	switch($id){
					case "0" :
						$horario = "06:00 am";
						break;
					case "1" :
						$horario = "06:30 am";
						break;
					case "2" :
						$horario = "07:00 am";
						break;
					case "3" :
						$horario = "07:30 am";
						break;
					case "4" :
						$horario = "08:00 am";
						break;
					case "5" :
						$horario = "08:30 am";
						break;
					case "6" :
						$horario = "09:00 am";
						break;
					case "7" :
						$horario = "09:30 am";
						break;
					case "8" :
						$horario = "10:00 am";
						break;
					case "9" :
						$horario = "10:30 am";
						break;
					case "10" :
						$horario = "11:00 am";
						break;
					case "11" :
						$horario = "11:30 am";
						break;
					case "12" :
						$horario = "12:00 pm ";
						break;
					case "13" :
						$horario = "12:30 pm ";
						break;
					case "14" :
						$horario = "01:00 pm ";
						break;
					case "15" :
						$horario = "01:30 pm";
						break;
					case "16" :
						$horario = "02:00 pm";
						break;
					case "17" :
						$horario = "02:30 pm";
						break;
					case "18" :
						$horario = "03:00 pm";
						break;
					case "19" :
						$horario = "03:30 pm";
						break;
					case "20" :
						$horario = "04:00 pm";
						break;
					case "21" :
						$horario = "04:30 pm";
						break;
					case "22" :
						$horario = "05:00 pm";
						break;
					case "23" :
						$horario = "05:30 pm";
						break;
					case "24" :
						$horario = "06:00 pm";
						break;
					case "25" :
						$horario = "06:30 pm";
						break;
					case "26" :
						$horario = "07:00 pm";
						break;
					case "27" :
						$horario = "07:30 pm";
						break;
					case "28" :
						$horario = "08:00 pm";
						break;
					case "29" :
						$horario = "08:30 pm";
						break;
					case "30" :
						$horario = "09:00 pm";
						break;
					case "31" :
						$horario = "09:30 pm";
						break;
					case "32" :
						$horario = "10:00 pm";
						break;
					case "33" :
						$horario = "10:30 pm";
						break;
					case "34" :
						$horario = "11:00 pm";
						break;
					case "35" :
						$horario = "11:30 pm";
						break;
					case "36" :
						$horario = "12:00 am";
						break;
					case "37" :
						$horario = "12:30 am";
						break;
					case "38" :
						$horario = "01:00 am";
						break;
					case "39" :
						$horario = "01:30 am";
						break;
					case "40" :
						$horario = "02:00 am";
						break;
					case "41" :
						$horario = "02:30 am";
						break;
					case "42" :
						$horario = "03:00 am";
						break;
					case "43" :
						$horario = "03:30 am";
						break;
					case "44" :
						$horario = "04:00 am";
						break;
					case "45" :
						$horario = "04:30 am";
						break;
					case "46" :
						$horario = "05:00 am";
						break;
					case "47" :
						$horario = "05:30 am";
						break;
	}
return $horario;
}

function sumar($fecha,$dias) 
{ 
		$dia = substr($fecha,0,2); 
		$mes = substr($fecha,2,2); 

		$ultimo_dia = date( "d", mktime(0, 0, 0, $mes + 1, 0, 0)); 
		$dias_adelanto = $dias; 
		$siguiente = $dia + $dias_adelanto; 

	if ($ultimo_dia < $siguiente) 
	{ 
		
		$dia_final = $siguiente - $ultimo_dia; 
		$mes++; 
		if ($mes == '13') 
		{ 
			$anio++; 
			$mes = '01'; 
		} 
		$mes_final = $dia_final.'/'.$mes; 
	} 
	else 
	{ 
		$mes_final =$siguiente."-".$mes;
	} 
return $mes_final;
} 

function suma_fechas($fecha,$ndias) 
{ 
	if (preg_match("/[0-9]{1,2}\/[0-9]{1,2}\/([0-9][0-9]){1,2}/",$fecha)) 
	list($dia,$mes,$anio)=split("/", $fecha); 
	if (preg_match("/[0-9]{1,2}-[0-9]{1,2}-([0-9][0-9]){1,2}/",$fecha)) 
	list($dia,$mes,$anio)=split("-",$fecha); 
	$nueva = mktime(0,0,0, $mes,$dia,$anio) + $ndias * 24 * 60 * 60; 
	$nuevafecha=date("d-m-Y",$nueva); 
	return ($nuevafecha); 
} 
?>

<div id="todo_prog">


<div id="cont_gral">

<!-- COL IZQ -->
<div class="col_izq">
	<?
	//CAMBIAR POR LA COOKIE


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

	$id_beam=5;

	//buscar los datos del beam
	$sql2 = "SELECT tz_str FROM sched_beam where id_beam = ".$id_beam;
	$query2 = mysql_query($sql2);
	$row_beam=mysql_fetch_array($query2);
	$tz_beam = $row_beam['tz_str'];

	//crear un ts para la hora de inicio del beam
	date_default_timezone_set($tz_beam);
	
	$dia=date("d");
	$mes=date("m");
	$mes_letras=mes($mes);
	$anio=date("Y");

	$hora=date("H");// DE 0 A 23
	$dia_letra=date("w");//0-DOMINGO
	if($hora>=0&&$hora<=6){
		if($dia_letra==0){
			$dia_letra=6;
		}else{
			$dia_letra=$dia_letra-1;
		}
	}


	//buscar el id de la fecha
	$sql1 = "SELECT id_date FROM abmDias WHERE day = ".$dia." AND month =  ".$mes." AND year = ".$anio;
	$query1=mysql_query($sql1);
	$row_date=mysql_fetch_array($query1);
	$id_date = $row_date['id_date']; 
	
	//exit($id_date." :aa");

	if($_POST["dia"]!=""){
		if($_POST["dia"]==0){$dia_inicio=7;}else{$dia_inicio=$_POST["dia"];}
		if($dia_letra==0){$dia_fin=7;}else{$dia_fin=$dia_letra;}
		$sql_dia=$id_date+($dia_inicio-$dia_fin);
	}else{
		$sql_dia=$id_date;
	}


	$fecha = date("d/m/Y"); //mes/dia/año
	$fecha_actualizada = suma_fechas($fecha,($dia_inicio-$dia_fin)); // suma 1 dia a la fecha
	$mes_new = mes(substr($fecha_actualizada,3,2)); 
	$dia_new = substr($fecha_actualizada,0,2); 
	
	if($_POST["franja"]==""){
		if($hora>=0 && $hora<6){
			$_POST["franja"]="4";
		}elseif($hora>=6 && $hora<13){
			$_POST["franja"]="1";
		}elseif($hora>=13 && $hora<18){
			$_POST["franja"]="2";
		}elseif($hora>=18 && $hora<=23){
			$_POST["franja"]="3";
		}else{
		}
	}
	?>

	<!-- Fecha -->
	<div class="fecha"><?=$dia_new?><span class="mes"><?=$mes_new?></span></div>
	<!-- / Fecha -->
	<form method="post" action="<?=$var_con[1]?>programas/" name="ff">
	
	<?if($_POST["dia"]=="")$_POST["dia"]=$dia_letra;?>

	<!-- Menu Horario -->
	<ul class="menu_horario">
		<li><a href="#" onclick="variables(1, <?=$_POST["dia"]?>);" title="Mañana" class="manana <?if ($_POST["franja"]=="1") echo ("selected");?>">MANHÃ</a></li>
		<li><a href="#" onclick="variables(2, <?=$_POST["dia"]?>);" title="Tarde" class="tarde <?if ($_POST["franja"]=="2") echo ("selected");?>">TARDE</a></li>
		<li><a href="#" onclick="variables(3, <?=$_POST["dia"]?>);" title="Noche" class="noche <?if ($_POST["franja"]=="3") echo ("selected");?>">NOITE</a></li>
		<li><a href="#" onclick="variables(4, <?=$_POST["dia"]?>);" title="Trasnoche" class="trasnoche <?if ($_POST["franja"]=="4") echo ("selected");?>">TARDE DA NOITE</a></li>
	</ul>
	<!-- / Menu Horario -->
	
</div>
<!-- / COL IZQ -->

<!-- COL DER -->
<div class="col_der">

	<!-- Menu Dias -->
	<div class="cont_menu_dia">
	<ul class="menu_dia">
		<li><a href="#" onclick="variables(<?=$_POST["franja"]?>, 1);" title="Lunes" class="lunes <?if ($_POST["dia"]=="") {if($dia_letra=="1")echo ("selected");}else{if($_POST["dia"]=="1") echo ("selected");}?>">SEGUNDA</a></li>
		<li><a href="#" onclick="variables(<?=$_POST["franja"]?>, 2);" title="Martes" class="martes <?if ($_POST["dia"]=="") {if($dia_letra=="2")echo ("selected");}else{if($_POST["dia"]=="2") echo ("selected");}?>">TERÇA</a></li>
		<li><a href="#" onclick="variables(<?=$_POST["franja"]?>, 3);" title="Miércoles" class="miercoles <?if ($_POST["dia"]=="") {if($dia_letra=="3")echo ("selected");}else{if($_POST["dia"]=="3") echo ("selected");}?>">QUARTA</a></li>
		<li><a href="#" onclick="variables(<?=$_POST["franja"]?>, 4);"  title="Jueves" class="jueves <?if ($_POST["dia"]=="") {if($dia_letra=="4")echo ("selected");}else{if($_POST["dia"]=="4") echo ("selected");}?>">QUINTA</a></li>
		<li><a href="#" onclick="variables(<?=$_POST["franja"]?>, 5);" title="Viernes" class="viernes <?if ($_POST["dia"]=="") {if($dia_letra=="5")echo ("selected");}else{if($_POST["dia"]=="5") echo ("selected");}?>">SEXTA</a></li>
		<li><a href="#" onclick="variables(<?=$_POST["franja"]?>, 6);" title="Sábado" class="sabado <?if ($_POST["dia"]=="") {if($dia_letra=="6")echo ("selected");}else{if($_POST["dia"]=="6") echo ("selected");}?>">SÁBADO</a></li>
		<li><a href="#" onclick="variables(<?=$_POST["franja"]?>, 0);" title="Domingo" class="domingo <?if ($_POST["dia"]=="") {if($dia_letra=="0")echo ("selected");}else{if($_POST["dia"]=="0") echo ("selected");}?>">DOMINGO</a></li>
	</ul>
	</div>
	<!-- / Menu Dias -->

<input type="hidden" name="dia" id="dia">
<input type="hidden" name="franja" id="franja">
</form>	
	
	<!-- Módulos Programas -->
	<?

	if($_POST["franja"]=="" || $_POST["franja"]=="1"){
		$franja="morning";
		$inicio=0;
		$fin=23;
	}else{
		switch($_POST["franja"]){
			case "2":
				$franja="afternoon";
				$inicio=24;
				$fin=48;
			break;
			case "3":
				$franja="evening";
				$inicio=48;
				$fin=70;
			break;
			case "4":
				$franja="night";
				$inicio=71;
				$fin=95;
			break;
		
		}
	}

	

	$sql="SELECT id_grid, ini_bol, title_str, content_br, p.id_program
	FROM abmGrid g
	LEFT JOIN abmProgram p ON p.id_program = g.id_program
	WHERE g.id_date =$sql_dia AND g.id_beam =$id_beam AND id_grid>=$inicio AND id_grid<=$fin
	ORDER BY id_grid";
	//echo("-".$sql);
	$query=mysql_query($sql);
	$cant=mysql_num_rows($query);
	$i=0;

	//echo("DIA:".	date("d - m -Y"));

	if($cant==0 || !isset($cant)){
			echo ("No hay registros cargados aún, intenté nuevamente mas tarde");
	}else{
			while($row=mysql_fetch_array($query))
			{
				$id_grid =$row["id_grid"];
				$ini_bol =$row["ini_bol"];
				$titulo =$row["title_str"];
				$id_program =$row["id_program"];
				$content_br =$row["content_br"];

				//buscar el id actual
				$sqlstr222="SELECT * FROM abmHoras WHERE id_grid = $id_grid";
				$query222=mysql_query($sqlstr222);
				if($row333=mysql_fetch_array($query222)){

					$hora_new =$row333["hora2"];
					$min_new =$row333["min"];
					$ampm =$row333["ampm"];
					if($min_new=="0")$min_new="00";
					if($min_new=="00")$min_new="";

				}

				if($ini_bol=="1"){
					$imagen="http://la.eonline.com/admin2012/img_prog/ch/".$id_program.".jpg";
					?>
					<div class="modulo_prog">
						<div class="<?=$franja?>">
							<div class="hora"><?=$hora_new."h ".$min_new;?></div>
							<div class="programa_img"> <a href="<? echo $path_file;?>"  target="<?=$target?>"><img src="<?=$imagen; ?>" alt="<?=$titulo;?>" width="233" height="65" border="0" align="left" /> </a></div>
							<div class="programa">
							<h1><a href="<? echo $path_file;?>"  target="<?=$target?>"><?echo $titulo?> </a></h1>
							<p><?if($content_br) echo utf8_decode($content_br);?></p>
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
</div>

<!-- G.A. -->
<script type="text/javascript">
var _gaq = _gaq || [];
                _gaq.push(
				['_setAccount', '<?=$var_con[2]?>'],
				['_trackPageview'],
				['b._setAccount', 'UA-18061947-40'],
				['b._setDomainName', 'eonline.com'],
				['b._setAllowLinker', true],
				['b._trackPageview']
                );
                setTimeout(function() { _gaq.push(['_trackEvent', 'Sin-Rebote', 'Sin-Rebote', '10 sec']); },10000);
                setTimeout(function() { _gaq.push(['b._trackEvent', 'Sin-Rebote', 'Sin-Rebote', '10 sec']); },10000);
  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();
  </script>


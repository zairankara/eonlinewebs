<?
//include($_SERVER["DOCUMENT_ROOT"]."/comscore.html");

//error_reporting(E_ALL);
//ini_set('display_errors','On');
?>

<script language="JavaScript" type="text/javascript">
function variables(franja, dia){
	document.getElementById("franja").value=franja;
	document.getElementById("dia").value=dia;
	document.ff.submit();
}
</script>

<?
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
						$horario = "06h";
						break;
					case "1" :
						$horario = "06h30";
						break;
					case "2" :
						$horario = "07h";
						break;
					case "3" :
						$horario = "07h30";
						break;
					case "4" :
						$horario = "08h";
						break;
					case "5" :
						$horario = "08h30";
						break;
					case "6" :
						$horario = "09h";
						break;
					case "7" :
						$horario = "09h30";
						break;
					case "8" :
						$horario = "10h";
						break;
					case "9" :
						$horario = "10h30";
						break;
					case "10" :
						$horario = "11h";
						break;
					case "11" :
						$horario = "11h30";
						break;
					case "12" :
						$horario = "12h ";
						break;
					case "13" :
						$horario = "12h30 ";
						break;
					case "14" :
						$horario = "13h ";
						break;
					case "15" :
						$horario = "13h30";
						break;
					case "16" :
						$horario = "14h";
						break;
					case "17" :
						$horario = "14h30";
						break;
					case "18" :
						$horario = "15h";
						break;
					case "19" :
						$horario = "15h30";
						break;
					case "20" :
						$horario = "16h";
						break;
					case "21" :
						$horario = "16h30";
						break;
					case "22" :
						$horario = "17h";
						break;
					case "23" :
						$horario = "17h30";
						break;
					case "24" :
						$horario = "18h";
						break;
					case "25" :
						$horario = "18h30";
						break;
					case "26" :
						$horario = "19h";
						break;
					case "27" :
						$horario = "19h30";
						break;
					case "28" :
						$horario = "20h";
						break;
					case "29" :
						$horario = "20h30";
						break;
					case "30" :
						$horario = "21h";
						break;
					case "31" :
						$horario = "21h30";
						break;
					case "32" :
						$horario = "22h";
						break;
					case "33" :
						$horario = "22h30";
						break;
					case "34" :
						$horario = "23h";
						break;
					case "35" :
						$horario = "23h30";
						break;
					case "36" :
						$horario = "24h";
						break;
					case "37" :
						$horario = "24h30";
						break;
					case "38" :
						$horario = "01h";
						break;
					case "39" :
						$horario = "01h30";
						break;
					case "40" :
						$horario = "02h";
						break;
					case "41" :
						$horario = "02h30";
						break;
					case "42" :
						$horario = "03h";
						break;
					case "43" :
						$horario = "03h30";
						break;
					case "44" :
						$horario = "04h";
						break;
					case "45" :
						$horario = "04h30";
						break;
					case "46" :
						$horario = "05h";
						break;
					case "47" :
						$horario = "05h30";
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
	$mydb = new wpdb('eonline_usr','30nl1n3','eonline_argentina','preprodabzdb');

	$id_beam="5";

	//buscar los datos del beam
	$sql2 = $mydb->get_results("SELECT tz_str FROM sched_beam where id_beam = ".$id_beam);
	foreach ($sql2 as $obj) :
		$tz_beam=$obj->tz_str;
	endforeach;

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
	$sql1 = $mydb->get_results("SELECT id_date FROM sched_date WHERE day = ".$dia." AND month =  ".$mes." AND year = ".$anio);
	foreach ($sql1 as $obj) :
		$id_date=$obj->id_date;
	endforeach;

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
<form method="post" action="http://br.eonline.com/programas/" name="ff">
	
	<?if($_POST["dia"]=="")$_POST["dia"]=$dia_letra;?>

	<!-- Menu Horario -->
	<ul class="menu_horario">
		<li><a href="#" onclick="variables(1, <?=$_POST["dia"]?>);"  title="Mañana" class="manana <?if ($_POST["franja"]=="1") echo ("selected");?>">MAÑANA</a></li>
		<li><a href="#" onclick="variables(2, <?=$_POST["dia"]?>);"  title="Tarde" class="tarde <?if ($_POST["franja"]=="2") echo ("selected");?>">TARDE</a></li>
		<li><a href="#" onclick="variables(3, <?=$_POST["dia"]?>);"  title="Noche" class="noche <?if ($_POST["franja"]=="3") echo ("selected");?>">NOCHE</a></li>
		<li><a href="#" onclick="variables(4, <?=$_POST["dia"]?>);" title="Trasnoche" class="trasnoche <?if ($_POST["franja"]=="4") echo ("selected");?>">TRASNOCHE</a></li>
	</ul>
	<!-- / Menu Horario -->
</div>
<!-- / COL IZQ -->

<!-- COL DER -->
<div class="col_der">

	<!-- Menu Dias -->
	<div class="cont_menu_dia">
	<ul class="menu_dia">
		<li><a href="#" onclick="variables(<?=$_POST["franja"]?>, 1);" title="Lunes" class="lunes <?if ($_POST["dia"]=="") {if($dia_letra=="1")echo ("selected");}else{if($_POST["dia"]=="1") echo ("selected");}?>">LUNES</a></li>
		<li><a href="#" onclick="variables(<?=$_POST["franja"]?>, 2);" title="Martes" class="martes <?if ($_POST["dia"]=="") {if($dia_letra=="2")echo ("selected");}else{if($_POST["dia"]=="2") echo ("selected");}?>">MARTES</a></li>
		<li><a href="#" onclick="variables(<?=$_POST["franja"]?>, 3);" title="Miércoles" class="miercoles <?if ($_POST["dia"]=="") {if($dia_letra=="3")echo ("selected");}else{if($_POST["dia"]=="3") echo ("selected");}?>">MIERCOLES</a></li>
		<li><a href="#" onclick="variables(<?=$_POST["franja"]?>, 4);"  title="Jueves" class="jueves <?if ($_POST["dia"]=="") {if($dia_letra=="4")echo ("selected");}else{if($_POST["dia"]=="4") echo ("selected");}?>">JUEVES</a></li>
		<li><a href="#" onclick="variables(<?=$_POST["franja"]?>, 5);" title="Viernes" class="viernes <?if ($_POST["dia"]=="") {if($dia_letra=="5")echo ("selected");}else{if($_POST["dia"]=="5") echo ("selected");}?>">VIERNES</a></li>
		<li><a href="#" onclick="variables(<?=$_POST["franja"]?>, 6);" title="Sábado" class="sabado <?if ($_POST["dia"]=="") {if($dia_letra=="6")echo ("selected");}else{if($_POST["dia"]=="6") echo ("selected");}?>">SABADO</a></li>
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
		$fin=12;
	}else{
		switch($_POST["franja"]){
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

	
	$sql = $mydb->get_results("SELECT id_grid, ini_bol, title_program_str, chapter_program_str, title_str, p.id_program, p.content_str_br
	FROM sched_grid g
	LEFT JOIN sched_program p ON p.id_program = g.id_program
	WHERE id_date =$sql_dia AND id_beam =$id_beam AND id_grid>=$inicio AND id_grid<=$fin
	ORDER BY id_grid");

	if(!$sql){
			echo ("No hay registros cargados aún, intenté nuevamente mas tarde");
	}else{
			foreach ($sql as $obj) :
				$id_grid =$obj->id_grid;
				$ini_bol =$obj->ini_bol;
				$titulo =$obj->title_program_str;
				$title =$obj->title_str;
				$chapter_program_str =$obj->chapter_program_str;
				
				
				if($ini_bol=="1"){
				$flag=horario($id_grid);
				
				$titulo=str_replace("(12) ","",$titulo);
				$titulo=str_replace("(14) ","",$titulo);
				$titulo=str_replace("(16) ","",$titulo);
				$titulo=str_replace("(12)","",$titulo);
				$titulo=str_replace("(14)","",$titulo);
				$titulo=str_replace("(16)","",$titulo);
				$nombre_tit=str_replace(" ","-",$titulo);
				$nombre_tit=str_replace("(12) ","",$nombre_tit);
				$nombre_tit=str_replace("(14) ","",$nombre_tit);
				$nombre_tit=str_replace("(16) ","",$nombre_tit);
				$nombre_tit=str_replace("/","-",$nombre_tit);
				$nombre_tit=str_replace("´","",$nombre_tit);
				$nombre_tit=str_replace(":","-",$nombre_tit);
				$nombre_tit=str_replace("-(SUB)","",$nombre_tit);
				$nombre_tit=str_replace("-(DUB)","",$nombre_tit);
				$nombre_tit=str_replace("-(SAT)","",$nombre_tit);

				$sql2 = $mydb->get_results("SELECT content_str_br FROM sched_program WHERE title_str=".$titulo);
				foreach ($sql2 as $obj2) :

						$content_str_br=$obj2->content_str_br;

						if($content_str_br!=""){
							$content = substr($content_str_br, 0,100)." ..."; 
						}else{
							$content="";
						}

				endforeach;


				$ruta= home_url( '/' )."wp-content/themes/E-online/programacion/imgs/programas/".$nombre_tit.".jpg";
					?>
					<div class="modulo_prog">
						<div class="<?=$franja?>">
							<div class="hora"><?=$flag?></div>
							<div class="programa_img"><img src="<?=$ruta;?>" alt="<?=$nombre_tit;?>" width="233" height="65" border="0" align="left" /></div>
							<div class="programa">
								<h1><?=$titulo?></h1>
								<?if($chapter_program_str) echo "<p><b>".$chapter_program_str."</b></p>" ?>
								<p><?=$content ?></p>
							</div>
							<br clear="all" />
						</div>
					</div>
				<?}
				$i++;
			endforeach;
	}
	?>
	<!-- / Módulos Programas -->
</div>
<!-- / COL DER -->
<br clear="all" />

<!-- LOGOS PIE -->
<!--<div class="logos_pie"></div>-->
<!-- / LOGOS PIE -->

</div>
</div>
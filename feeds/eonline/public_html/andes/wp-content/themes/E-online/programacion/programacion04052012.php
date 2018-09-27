<?include($_SERVER["DOCUMENT_ROOT"]."/comscore.html");?>

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
	$mydb = new wpdb('eonline_usr','30nl1n3','eonline_argentina','preprodabzdb');

	$id_beam="1";

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
<form method="post" action="http://la.eonline.com/andes/programas/" name="ff">
	
	<?if($_POST["dia"]=="")$_POST["dia"]=$dia_letra;?>

	<!-- Menu Horario -->
	<ul class="menu_horario">
		<li><a href="#" onclick="variables(1, <?=$_POST["dia"]?>);"  title="Mañana" class="manana <?if ($_POST["franja"]=="1") echo ("selected");?>">MAÑANA</a></li>
		<li><a href="#" onclick="variables(2, <?=$_POST["dia"]?>);"  title="Tarde" class="tarde <?if ($_POST["franja"]=="2") echo ("selected");?>">TARDE</a></li>
		<li><a href="#" onclick="variables(3, <?=$_POST["dia"]?>);"  title="Noche" class="noche <?if ($_POST["franja"]=="3") echo ("selected");?>">NOCHE</a></li>
		<li><a href="#" onclick="variables(4, <?=$_POST["dia"]?>);" title="Trasnoche" class="trasnoche <?if ($_POST["franja"]=="4") echo ("selected");?>">MADRUGADA</a></li>
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

	

	$sql = $mydb->get_results("SELECT id_grid, ini_bol, title_program_str, chapter_program_str, title_str, p.id_program, p.content_str
	FROM sched_grid g
	LEFT JOIN sched_program p ON p.id_program = g.id_program
	WHERE g.id_date =$sql_dia AND g.id_beam =$id_beam AND id_grid>=$inicio AND id_grid<=$fin
	ORDER BY id_grid");
	$i=0;

	if(!$sql){
			echo ("No hay registros cargados aún, intenté nuevamente mas tarde");
	}else{
			foreach ($sql as $obj) :
				$id_grid =$obj->id_grid;
				$ini_bol =$obj->ini_bol;
				$titulo =$obj->title_program_str;
				$title =$obj->title_str;
				$chapter_program_str =$obj->chapter_program_str;
				$content_str=$obj->content_str;

				if($content_str){
					//$content = utf8_encode(substr($row['content_str'], 0,100)); 
					$content = substr($content_str, 0,100); 
					$content.=" ..."; 
				}else{
					$content="";
				}
				//echo(" ".$franja);
				if($ini_bol=="1"){
				$flag=horario($id_grid);
				list($flag, $ampm) = split('[" "]', $flag);
				$nombre_tit=str_replace(" ","-",$titulo);
				$nombre_tit=str_replace("/","-",$nombre_tit);
				$nombre_tit=str_replace("´","",$nombre_tit);
				$nombre_tit=str_replace(":","-",$nombre_tit);
				$nombre_tit=str_replace("-(SUB)","",$nombre_tit);
				$nombre_tit=str_replace("-(DUB)","",$nombre_tit);
				$nombre_tit=str_replace("-(SAT)","",$nombre_tit);
				$chapter_program_str_array=explode(" ",$chapter_program_str);
				if($chapter_program_str_array[0]=="FASHION")$nombre_tit.="-fashion";
				if($chapter_program_str_array[0]=="LFRC")$nombre_tit.="-LFRC";

				$titulo_nuevo=utf8_encode($titulo);
				$titulo_nuevo=str_replace(" ","",$titulo_nuevo);
				$titulo_nuevo=str_replace("/","",$titulo_nuevo);
				$titulo_nuevo=str_replace("´","",$titulo_nuevo);
				$titulo_nuevo=str_replace(":","",$titulo_nuevo);
				$titulo_nuevo=str_replace(".","",$titulo_nuevo);
				$titulo_nuevo=str_replace("'","",$titulo_nuevo);
				
				$sql4 = $mydb->get_results("SELECT * FROM sched_pres WHERE titulo='".$titulo_nuevo."'");
				
				if($sql4!=""){
						
						foreach ($sql4 as $obj) :
							$imagen=$obj->id_press;
							$microsite=$obj->microsite;
							$target="_self";
							if($microsite==""){
								$path_file= get_option('siteurl') . "/program/?idPrograma=".$imagen;
							}else{
								$path_file="http://".$microsite;
								$target="_blank";
							}
						endforeach;
						
				}else{
					$imagen="000";
					$path_file="";
				}

			
				$ruta= home_url( '/' )."wp-content/themes/E-online/programacion/imgs/programas/".$nombre_tit.".jpg";
				$ruta_nuevo="http://www.eonlinesaladeprensa.com/imgs/iconos/".$imagen.".jpg";
			
			
				?>
					<div class="modulo_prog">
						<div class="<?=$franja?>">
							<div class="hora"><?= $flag?><span class="ampm"><?= $ampm?></span></div>
							<div class="programa_img"> <a href="<? echo $path_file;?>" target="<?=$target?>"><img src="<?=$ruta_nuevo; ?>" alt="<?=$imagen;?>" width="233" height="65" border="0" align="left" /> </a></div>
							<div class="programa">
							<h1><a href="<? echo $path_file;?>"  target="<?=$target?>"><?echo $titulo?> </a></h1>
							<?if($chapter_program_str) echo "<p><b>".$chapter_program_str."</b></p>" ?>
							<p><?if($content) echo $content ?></p>
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
<div class="logos_pie"></div>
<!-- / LOGOS PIE -->

</div>
</div>

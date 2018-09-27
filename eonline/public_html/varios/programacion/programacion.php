
<script language="JavaScript" type="text/javascript">
	function variables(franja, dia){
		document.getElementById("franja").value=franja;
		document.getElementById("dia").value=dia;
		document.ff.submit();
	}
</script>

<?php
//CAMBIAR POR LA COOKIE
$dsn = 'mysql:dbname='.DBNAME.';host='.DBHOST;

try {
    $conection = new PDO($dsn,DBUSER,DBPASS);
} catch (PDOException $e) {
    exit ("Fallo de conexion ".$e->getMessage());
}
exit ('USER'.DBUSER);

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
			$id_beam=IDFEED;
            exit($id_beam.'--$id_beam--');
			//buscar los datos del beam
			$sql2 = "SELECT tz_str FROM sched_beam where id_beam = ".$id_beam;
			$query2 = $conection->query($sql2);
			$row_beam=$query2->fetch();
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
			$query1=$conection->query($sql1);
			$row_date=$query1->fetch();
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
			<div class="fecha"><?php echo $dia_new?><span class="mes"><?php echo $mes_new?></span></div>
			<!-- / Fecha -->
			<form method="post" action="<?php echo URLCOMPLETA; ?>pagina/programas/" name="ff">

				<?php if ($_POST["dia"]=="")$_POST["dia"]=$dia_letra;?>

				<!-- Menu Horario -->
				<ul class="menu_horario">
					<li><a href="#" onclick="variables(1, <?php echo $_POST["dia"]?>);" title="Mañana" class="manana <?php if ($_POST["franja"]=="1") echo ("selected");?>">MAÑANA</a></li>
					<li><a href="#" onclick="variables(2, <?php echo $_POST["dia"]?>);" title="Tarde" class="tarde <?php if ($_POST["franja"]=="2") echo ("selected");?>">TARDE</a></li>
					<li><a href="#" onclick="variables(3, <?php echo $_POST["dia"]?>);" title="Noche" class="noche <?php if ($_POST["franja"]=="3") echo ("selected");?>">NOCHE</a></li>
					<li><a href="#" onclick="variables(4, <?php echo $_POST["dia"]?>);" title="Trasnoche" class="trasnoche <?php if ($_POST["franja"]=="4") echo ("selected");?>">MADRUGADA</a></li>
				</ul>
				<!-- / Menu Horario -->

		</div>
		<!-- / COL IZQ -->

		<!-- COL DER -->
		<div class="col_der">

			<!-- Menu Dias -->
			<div class="cont_menu_dia">
				<ul class="menu_dia">
					<li><a href="#" onclick="variables(<?php echo $_POST["franja"]?>, 1);" title="Lunes" class="lunes <?php if ($_POST["dia"]=="") {if($dia_letra=="1")echo ("selected");}else{if($_POST["dia"]=="1") echo ("selected");}?>">LUNES</a></li>
					<li><a href="#" onclick="variables(<?php echo $_POST["franja"]?>, 2);" title="Martes" class="martes <?php if ($_POST["dia"]=="") {if($dia_letra=="2")echo ("selected");}else{if($_POST["dia"]=="2") echo ("selected");}?>">MARTES</a></li>
					<li><a href="#" onclick="variables(<?php echo $_POST["franja"]?>, 3);" title="Miércoles" class="miercoles <?php if ($_POST["dia"]=="") {if($dia_letra=="3")echo ("selected");}else{if($_POST["dia"]=="3") echo ("selected");}?>">MIERCOLES</a></li>
					<li><a href="#" onclick="variables(<?php echo $_POST["franja"]?>, 4);"  title="Jueves" class="jueves <?php if ($_POST["dia"]=="") {if($dia_letra=="4")echo ("selected");}else{if($_POST["dia"]=="4") echo ("selected");}?>">JUEVES</a></li>
					<li><a href="#" onclick="variables(<?php echo $_POST["franja"]?>, 5);" title="Viernes" class="viernes <?php if ($_POST["dia"]=="") {if($dia_letra=="5")echo ("selected");}else{if($_POST["dia"]=="5") echo ("selected");}?>">VIERNES</a></li>
					<li><a href="#" onclick="variables(<?php echo $_POST["franja"]?>, 6);" title="Sábado" class="sabado <?php if ($_POST["dia"]=="") {if($dia_letra=="6")echo ("selected");}else{if($_POST["dia"]=="6") echo ("selected");}?>">SÁBADO</a></li>
					<li><a href="#" onclick="variables(<?php echo $_POST["franja"]?>, 0);" title="Domingo" class="domingo <?php if ($_POST["dia"]=="") {if($dia_letra=="0")echo ("selected");}else{if($_POST["dia"]=="0") echo ("selected");}?>">DOMINGO</a></li>
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



			$sql="SELECT id_grid, ini_bol, title_str, content_la, p.id_program
            FROM abmGrid g
            LEFT JOIN abmProgram p ON p.id_program = g.id_program
            WHERE g.id_date =$sql_dia AND g.id_beam =$id_beam AND id_grid>=$inicio AND id_grid<=$fin
            ORDER BY id_grid";
			//echo("-".$sql);
			$query_conn=$conection->query($sql);
			$cant=$query_conn->fetchColumn();
			$i=0;

			//echo("DIA:".	date("d - m -Y"));

			if($cant==0 || !isset($cant)){
				echo ("No hay registros cargados aún, intenté nuevamente mas tarde");
			}else{
				while($row=$query->fetch())
				{
					$id_grid =$row["id_grid"];
					$ini_bol =$row["ini_bol"];
					$titulo =$row["title_str"];
					$id_program =$row["id_program"];
					$content_la =$row["content_la"];

					//buscar el id actual
					$sqlstr222="SELECT * FROM abmHoras WHERE id_grid = $id_grid";
					$query222=$conection->query($sqlstr222);
					if($row333=$query222->fetch()){

						$hora_new =$row333["hora2"];
						$min_new =$row333["min"];
						$ampm =$row333["ampm"];
						if($min_new=="0")$min_new="00";
					}

					if($i%2==0){
						$imagen="http://la.eonline.com/admin2012/img_prog/ch/".$id_program.".jpg";
						?>
						<div class="modulo_prog">
							<div class="<?php echo $franja?>">
								<div class="hora"><?php echo $hora_new.":".$min_new;?><span class="ampm"><?php echo  $ampm?></span></div>
								<div class="programa_img"> <img src="<?php echo $imagen; ?>" alt="<?php echo $titulo;?>" width="233" height="65" border="0" align="left" alt="<?php echo $titulo?>" title="<?php echo $titulo?>"/></div>
								<div class="programa">
									<h3><?php echo $titulo?> </h3>
									<p><?php if ($content_la) echo utf8_decode($content_la);?></p>
									<h2 style="text-indent:9000px"><?php if ($content_la) echo utf8_decode($content_la);?></h2>
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
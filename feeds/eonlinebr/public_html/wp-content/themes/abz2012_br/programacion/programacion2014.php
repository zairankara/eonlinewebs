<script language="JavaScript" type="text/javascript">
function variables(dia){
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

	$id_beam=$var_con[0];
	//$id_beam=4;

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

	if($_POST["dia"]!=""){
		if($_POST["dia"]==0){$dia_inicio=7;}else{$dia_inicio=$_POST["dia"];}
		if($dia_letra==0){$dia_fin=7;}else{$dia_fin=$dia_letra;}
	}

	$fecha = date("d/m/Y"); //mes/dia/año
	$fecha_actualizada = suma_fechas($fecha,($dia_inicio-$dia_fin)); // suma 1 dia a la fecha
	$mes_new = mes(substr($fecha_actualizada,3,2));
	$mes_new2 = substr($fecha_actualizada,3,2); 
	$dia_new = substr($fecha_actualizada,0,2); 


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
			
			<!-- Fecha -->
			<form method="post" action="<?=$var_con[1]?>/programas/" name="ff">
				
				<?
				//echo("<br>".$_POST["dia"]);
				//echo("<br>".$dia_letra);
				?>
				<!-- Menu Dias -->
				<div class="cont_menu_dia">
					<ul class="menu_dia">
						<li><a href="#" onclick="variables(1);" title="Lunes" class="lunes <?if ($_POST["dia"]=="") {if($dia_letra=="1")echo ("selected");}else{if($_POST["dia"]=="1") echo ("selected");}?>">SEGUNDA</a></li>
						<li><a href="#" onclick="variables(2);" title="Martes" class="martes <?if ($_POST["dia"]=="") {if($dia_letra=="2")echo ("selected");}else{if($_POST["dia"]=="2") echo ("selected");}?>">TERÇA</a></li>
						<li><a href="#" onclick="variables(3);" title="Miércoles" class="miercoles <?if ($_POST["dia"]=="") {if($dia_letra=="3")echo ("selected");}else{if($_POST["dia"]=="3") echo ("selected");}?>">QUARTA</a></li>
						<li><a href="#" onclick="variables(4);" title="Jueves" class="jueves <?if ($_POST["dia"]=="") {if($dia_letra=="4")echo ("selected");}else{if($_POST["dia"]=="4") echo ("selected");}?>">QUINTA</a></li>
						<li><a href="#" onclick="variables(5);" title="Viernes" class="viernes <?if ($_POST["dia"]=="") {if($dia_letra=="5")echo ("selected");}else{if($_POST["dia"]=="5") echo ("selected");}?>">SEXTA</a></li>
						<li><a href="#" onclick="variables(6);" title="Sábado" class="sabado <?if ($_POST["dia"]=="") {if($dia_letra=="6")echo ("selected");}else{if($_POST["dia"]=="6") echo ("selected");}?>">SÁBADO</a></li>
						<li><a href="#" onclick="variables(0);" title="Domingo" class="domingo <?if ($_POST["dia"]=="") {if($dia_letra=="0")echo ("selected");}else{if($_POST["dia"]=="0") echo ("selected");}?>">DOMINGO</a></li>
					</ul>
					<ul class="submenu_dia">
						<li><?if(($_POST["dia"]!="" && $_POST["dia"]=="1") || ($_POST["dia"]=="" && $dia_letra=="1") ){?><p><?=$dia_new?>-<?=$mes_new?></p><?}?></li>
						<li><?if(($_POST["dia"]!="" && $_POST["dia"]=="2") || ($_POST["dia"]=="" && $dia_letra=="2") ){?><p><?=$dia_new?>-<?=$mes_new?></p><?}?></li>
						<li><?if(($_POST["dia"]!="" && $_POST["dia"]=="3") || ($_POST["dia"]=="" && $dia_letra=="3") ){?><p><?=$dia_new?>-<?=$mes_new?></p><?}?></li>
						<li><?if(($_POST["dia"]!="" && $_POST["dia"]=="4") || ($_POST["dia"]=="" && $dia_letra=="4") ){?><p><?=$dia_new?>-<?=$mes_new?></p><?}?></li>
						<li><?if(($_POST["dia"]!="" && $_POST["dia"]=="5") || ($_POST["dia"]=="" && $dia_letra=="5") ){?><p><?=$dia_new?>-<?=$mes_new?></p><?}?></li>
						<li><?if(($_POST["dia"]!="" && $_POST["dia"]=="6") || ($_POST["dia"]=="" && $dia_letra=="6") ){?><p><?=$dia_new?>-<?=$mes_new?></p><?}?></li>
						<li><?if(($_POST["dia"]!="" && $_POST["dia"]=="0") || ($_POST["dia"]=="" && $dia_letra=="0") ){?><p><?=$dia_new?>-<?=$mes_new?></p><?}?></li>
					</ul>	
				</div>
				<!-- / Menu Dias -->

				<input type="hidden" name="dia" id="dia">
			</form>	
			
			<!-- Módulos Programas -->
			<?
			$mydb333 = new wpdb('eonline_usr','30nl1n3','eonline_argentina','preprodabzdb');
			//$mydb333->show_errors();
			$sqlstr="SELECT g.ampm, g.date_hh, g.otrohora, g.date_ii, p.title_str, p.content_br, p.id_program
			FROM abmGrid_2014 g
			LEFT JOIN abmProgram p ON p.id_program = g.id_program 
			WHERE g.id_feed=$id_beam AND g.date_yy='".$anio."' AND g.date_mm='".$mes_new2."' AND g.date_dd='".$dia_new."' ORDER BY g.id_grid";
			$rows = $mydb333->get_results($sqlstr);

			//echo("DEBUG: ".$sqlstr);
			

			if($rows==""){
					echo ("No hay registros cargados aún, intenté nuevamente mas tarde");
			}else{
					
				foreach($rows as $row){
						$date_hh = $row->otrohora;
						$ampm = $row->ampm;
						$date_ii = $row->date_ii;
						$titulo = $row->title_str;
						$id_program = $row->id_program;
						$content_br = $row->content_br;
						if($date_ii=="0")$date_ii="00";
						if($date_ii=="00")$date_ii="";

						$imagen="http://la.eonline.com/admin2012/img_prog/ch/".$id_program.".jpg";
						?>
						<div class="modulo_prog">
							<div class="<?=$franja?>">
								<div class="hora"><?=$date_hh."h ".$date_ii;?><span class="ampm"></span></div>
								<div class="programa_img"> <img src="<?=$imagen; ?>" alt="<?=$titulo;?>" width="233" height="65" border="0" align="left" alt="<?echo $titulo?>" title="<?echo $titulo?>"/></div>
								<div class="programa">
								<h3 style="color:red;"><?echo $titulo?> </h3>
								<p><?if($content_br) echo utf8_decode($content_br);?></p>
								<h2 style="text-indent:9000px"><?if($content_br) echo utf8_decode($content_br);?></h2>
								</div>
								<br clear="all" />
							</div>
						</div>
					<?
				}
			}

			wp_reset_query();
			?>
			<!-- / Módulos Programas -->
		<!-- / COL DER -->
		<br clear="all" />

		<!-- LOGOS PIE -->
		<div class="logos_pie"></div>
		<!-- / LOGOS PIE -->

	</div>
</div>

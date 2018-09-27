<script language="JavaScript" type="text/javascript">
	function variables(dia){
		document.getElementById("dia").value=dia;
		document.ff.submit();
	}
</script>
<style>
    p {
        color: #4e4e4e;
        font: 11px/14px Oswald, Helvetica, Tahoma, Verdana, Sans-serif;
        text-align: left;
        margin: 0 0 5px;
    }

    #cont_gral {
        text-align: left;
        width: 950px;
        margin: 0;
        padding: 0;
    }

    #todo_prog {
        color: #4e4e4e;
        font: 11px/14px Arial, Helvetica, Tahoma, Verdana, Sans-serif;
        text-align: left;
        background-color: #fff;
        margin: 0;
        padding: 10px 0 0 9px;
    }
    /* @group COLUMNA IZQUIERDA */

    .col_izq {
        text-align: left;
        width: 123px;
        margin: 0 9px 0 0;
        padding: 0;
        float: left;
    }

    .fecha {
        color: #fff;
        font: 42px/42px Arial, Helvetica, Tahoma, Verdana, Sans-serif;
        text-align: left;
        background: #000;
        width: 110px;
        _width: 123px;
        height: 48px;
        _height: 55px;
        margin: 0 0 18px;
        padding-top: 7px;
        padding-left: 13px;
    }

    .mes {
        color: #fcff00;
        font: 23px/23px Arial, Helvetica, Tahoma, Verdana, Sans-serif;
        text-align: left;
        text-transform: uppercase;
    }

    /* @end */

    /* @group Horario */

    .menu_horario {
        margin: 0;
        padding: 0;
        list-style-type: none;
    }
    .programa h5{
        font-family: "Oswald", "Arial Narrow", Sans-Serif;
        text-rendering: optimizeLegibility; /* FF, Safari & Chrome only. */
        text-transform: uppercase;
        font-size: 16px;
    }
    .menu_horario li {
        text-align: left;
        margin: 0;
        background-color: #000;
    }

    .menu_horario a.manana,
    .menu_horario a.tarde,
    .menu_horario a.noche,
    .menu_horario a.trasnoche {
        font-family: "Oswald", "Arial Narrow", Sans-Serif;
        text-rendering: optimizeLegibility; /* FF, Safari & Chrome only. */
        text-transform: uppercase;
        font-size: 16px;
        color:#fff;
        width: 73px;
        _width: 123px;
        height: 30px;
        _height: 45px;
        margin: 0;
        display: block;
        background: url(../imgs/comunes/franjas.png) no-repeat 0 0;
        padding-left: 50px;
        padding-top: 15px;
        text-decoration: none;
    }


    .menu_horario a.tarde{
        background-position: 0 -45px;
    }

    .menu_horario a.noche{
        background-position: 0 -90px;
    }
    .menu_horario a.trasnoche{
        background-position: 0 -135px;
    }

    .menu_horario a.manana:hover,
    .menu_horario a.tarde:hover,
    .menu_horario a.noche:hover,
    .menu_horario a.trasnoche:hover{
        color: #fcff00;
    }

    .menu_horario a.selected {
        color: #fcff00;
    }
    /* @end */

    /* @group Días */

    .cont_menu_dia {
        text-align: left;
        width: 100%;
        margin: 0 0 18px;
    }

    .menu_dia,
    .submenu_dia {
        margin: 0 !important;
        padding: 0;
        list-style-type: none;
    }

    .menu_dia li {
        text-align: left;
        margin: 0;
        float: left;
        background-color: #fcff00;
        width: 14.2%;
        height: 45px;
    }

    .submenu_dia li{
        text-align: left;
        margin: 0;
        float: left;
        width: 14.2%;
        height: 33px;
    }

    .submenu_dia p{
        font-family: "Oswald", "Arial Narrow", Sans-Serif;
        text-rendering: optimizeLegibility; /* FF, Safari & Chrome only. */
        text-transform: uppercase;
        background-color: #535353;
        font-size: 18px;
        letter-spacing: -1px;
        color:#fff;
        width: 100%;
        height: 33px;
        _height: 40px;
        padding-top: 7px;
        display: block;
        float: left;
        text-decoration: none;
        text-align: center;
    }
    .menu_dia a.lunes,
    .menu_dia a.martes,
    .menu_dia a.miercoles,
    .menu_dia a.jueves,
    .menu_dia a.viernes,
    .menu_dia a.sabado,
    .menu_dia a.domingo {
        font-family: "Oswald", "Arial Narrow", Sans-Serif;
        text-rendering: optimizeLegibility; /* FF, Safari & Chrome only. */
        text-transform: uppercase;
        font-size: 18px;
        letter-spacing: -1px;
        color:#000;
        width: 100%;
        margin-top:10px;
        padding: 0;
        display: block;
        float: left;
        text-decoration: none;
        text-align: center;
    }

    .menu_dia a.lunes:hover,
    .menu_dia a.martes:hover,
    .menu_dia a.miercoles:hover,
    .menu_dia a.jueves:hover,
    .menu_dia a.viernes:hover,
    .menu_dia a.sabado:hover,
    .menu_dia a.domingo:hover {
        color:#535353;
    }
    .menu_dia a.selected {
        background-color: #000000;
        color:#fcff00;
        width: 100%;
        height: 45px;
        margin-top: 0;
        padding-top:10px;
    }
    /* @end */

    /* @group COLUMNA DERECHA */

    .col_der {
        text-align: left;
        width: 796px;
        margin: 0;
        padding: 0;
        float: left;
    }

    .modulo_prog {
        text-align: left;
        background-color: #f2f2f2;
        border-bottom: 1px solid #cacaca;
    }
    .programa_img img{
        max-width: 233px;
        margin: 0 auto;
    }
    .ocultar{
        text-indent: 9000px;
        display: none;
    }
    .morning {
        width: 781px;
        height: 65px;
        border-left: 8px solid #d95b00;
    }

    .morning .programa h3 {
        color: #d95b00 !important;
        margin: 3px 10px 0 0 !important;
        text-decoration:none;
    }
    .morning .programa h3 a{
        color: #d95b00 !important;
        margin: 3px 10px 0 0 !important;
        text-decoration:none;
    }
    .morning .programa h3 a:hover {
        text-decoration:underline;
    }


    .afternoon {
        width: 781px;
        height: 65px;
        border-left: 8px solid #bd7a23;
    }

    .afternoon .programa h3 {
        color: #bd7a23 !important;
        margin: 3px 10px 0 0 !important;
        text-decoration:none;
    }
    .afternoon .programa h3 a {
        color: #bd7a23 !important;
        margin: 3px 10px 0 0 !important;
        text-decoration:none;
    }
    .afternoon .programa h3 a:hover {
        text-decoration:underline;
    }

    .evening {
        width: 781px;
        height: 65px;
        border-left: 8px solid #a11e17;
        text-decoration:none;
    }

    .evening .programa h3 {
        color: #a11e17 !important;
        margin: 3px 10px 0 0 !important;
        text-decoration:none;
    }
    .evening .programa h3 a {
        color: #a11e17 !important;
        margin: 3px 10px 0 0 !important;
        text-decoration:none;
    }
    .evening .programa h3 a:hover {
        text-decoration:underline;
    }
    .night {
        width: 781px;
        height: 65px;
        border-left: 8px solid #3a456b;
    }

    .night .programa h3 {
        color: #3a456b !important;
        margin: 3px 10px 0 0 !important;
        text-decoration:none;
    }
    .night .programa h3 a{
        color: #3a456b !important;
        margin: 3px 10px 0 0 !important;
        text-decoration:none;
    }
    .night .programa h3 a:hover {
        text-decoration:underline;
    }

    .hora {
        color: #cfcfd0;
        font: 24px/1.32 "Oswald", Tahoma, Verdana, Helvetica, Arial, Sans-serif;
        text-rendering: optimizeLegibility; /* FF, Safari & Chrome only. */
        text-transform: uppercase;
        text-align: center;
        padding-top: 24px !important;
        float: left;
    }

    .hora span.ampm {
        font: bold 15px/15px Tahoma, Verdana, Helvetica, Arial, Sans-serif;
        text-transform: uppercase;
    }

    .programa {
        height: 65px;
        margin: 0;
        padding: 0;
        overflow: hidden;
    }

    .programa p {
        color: #4e4e4e;
        font: 11px/13px Arial, Helvetica, Tahoma, Verdana, Sans-serif !important;
        text-align: left;
    }

    @media (max-width: 767px) {
        .menu_dia a{
            font-size: 13px !important;
        }
        .submenu_dia p{
            font-size: 12px !important;
            padding-top: 10px;
        }
        .programa {
            text-align: center;
            margin-left: 0 !important;
            overflow: inherit;
                            height: auto;
            
        }
        .programa p {
            text-align: center;
        }
        .hora {
            padding-top: 14px !important;
        }
    }

    /* @end */

</style>
<?php
$dsn = 'mysql:dbname='.DBNAME.';host='.DBHOST;

try {
	$conection = new PDO($dsn,DBUSER,DBPASS);
} catch (PDOException $e) {
	exit ("Fallo de conexion ".$e->getMessage());
}
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

$id_beam=IDFEED;
//echo("id_beam: ".$id_beam);

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

<!-- Banner 320x50 / ONLY MOBILE-->
<aside class="col-xs-12 hidden-sm hidden-md hidden-lg text-center">
    <div id="div-gpt-ad-home-320x50-1" style="margin-bottom: 10px !important;" class="publicidad">
        <script type="text/javascript">
            googletag.display('div-gpt-ad-home-320x50-1');
        </script>
    </div>
</aside>
<!-- Banner 320x50 -->

		<!-- Fecha -->
		<form method="post" action="<?php echo URLCOMPLETA; ?>pagina/programas/" name="ff">

			<?
			//echo("<br>".$_POST["dia"]);
			//echo("<br>".$dia_letra);
			?>
			<!-- Menu Dias -->
			<div class="cont_menu_dia">
                <ul class="submenu_dia">
                    <li><?if(($_POST["dia"]!="" && $_POST["dia"]=="1") || ($_POST["dia"]=="" && $dia_letra=="1") ){?><p><?=$dia_new?>-<?=$mes_new?></p><?}?></li>
                    <li><?if(($_POST["dia"]!="" && $_POST["dia"]=="2") || ($_POST["dia"]=="" && $dia_letra=="2") ){?><p><?=$dia_new?>-<?=$mes_new?></p><?}?></li>
                    <li><?if(($_POST["dia"]!="" && $_POST["dia"]=="3") || ($_POST["dia"]=="" && $dia_letra=="3") ){?><p><?=$dia_new?>-<?=$mes_new?></p><?}?></li>
                    <li><?if(($_POST["dia"]!="" && $_POST["dia"]=="4") || ($_POST["dia"]=="" && $dia_letra=="4") ){?><p><?=$dia_new?>-<?=$mes_new?></p><?}?></li>
                    <li><?if(($_POST["dia"]!="" && $_POST["dia"]=="5") || ($_POST["dia"]=="" && $dia_letra=="5") ){?><p><?=$dia_new?>-<?=$mes_new?></p><?}?></li>
                    <li><?if(($_POST["dia"]!="" && $_POST["dia"]=="6") || ($_POST["dia"]=="" && $dia_letra=="6") ){?><p><?=$dia_new?>-<?=$mes_new?></p><?}?></li>
                    <li><?if(($_POST["dia"]!="" && $_POST["dia"]=="0") || ($_POST["dia"]=="" && $dia_letra=="0") ){?><p><?=$dia_new?>-<?=$mes_new?></p><?}?></li>
                </ul>
                <ul class="menu_dia">
					<li><a href="#" onclick="variables(1);" title="Lunes" class="lunes <?if ($_POST["dia"]=="") {if($dia_letra=="1")echo ("selected");}else{if($_POST["dia"]=="1") echo ("selected");}?>">LUNES</a></li>
					<li><a href="#" onclick="variables(2);" title="Martes" class="martes <?if ($_POST["dia"]=="") {if($dia_letra=="2")echo ("selected");}else{if($_POST["dia"]=="2") echo ("selected");}?>">MARTES</a></li>
					<li><a href="#" onclick="variables(3);" title="Miércoles" class="miercoles <?if ($_POST["dia"]=="") {if($dia_letra=="3")echo ("selected");}else{if($_POST["dia"]=="3") echo ("selected");}?>">MIÉRCOLES</a></li>
					<li><a href="#" onclick="variables(4);" title="Jueves" class="jueves <?if ($_POST["dia"]=="") {if($dia_letra=="4")echo ("selected");}else{if($_POST["dia"]=="4") echo ("selected");}?>">JUEVES</a></li>
					<li><a href="#" onclick="variables(5);" title="Viernes" class="viernes <?if ($_POST["dia"]=="") {if($dia_letra=="5")echo ("selected");}else{if($_POST["dia"]=="5") echo ("selected");}?>">VIERNES</a></li>
					<li><a href="#" onclick="variables(6);" title="Sábado" class="sabado <?if ($_POST["dia"]=="") {if($dia_letra=="6")echo ("selected");}else{if($_POST["dia"]=="6") echo ("selected");}?>">SÁBADO</a></li>
					<li><a href="#" onclick="variables(0);" title="Domingo" class="domingo <?if ($_POST["dia"]=="") {if($dia_letra=="0")echo ("selected");}else{if($_POST["dia"]=="0") echo ("selected");}?>">DOMINGO</a></li>
				</ul>

			</div>
			<!-- / Menu Dias -->

			<input type="hidden" name="dia" id="dia">
		</form>

		<!-- Módulos Programas -->
		<?
        $mydb333 = new wpdb('eonline_usr','30nl1n3','eonline_argentina','preprodabzdb');
        //$mydb333->show_errors();
		$sqlstr="SELECT g.ampm, g.date_hh, g.otrohora, g.date_ii, p.title_str, p.content_la, p.id_program
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
				$content_la = $row->content_la;

				if($id_beam==2){$ampm="";$date_hh = $row->date_hh;}

				$imagen="http://la.eonline.com/admin2012/img_prog/ch/".$id_program.".png";
				?>
				<div class="modulo_prog col-xs-12">
					<div class="<?=$franja?> col-xs-12">
						<div class="hora col-md-2 col-xs-12"><?=$date_hh.":".$date_ii;?><span class="ampm"><?=$ampm?></span></div>
						<div class="programa_img  col-md-3 col-xs-12"> <img src="<?=$imagen; ?>" alt="<?=$titulo;?>" width="233" height="65" border="0" class="img-responsive" title="<?echo $titulo?>"/></div>
						<div class="programa  col-md-7 col-xs-12">
							<h5><?echo $titulo?> </h5>
							<p><?if($content_la) echo utf8_decode($content_la);?></p>
							<h2 class="ocultar"><?if($content_la) echo utf8_decode($content_la);?></h2>
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

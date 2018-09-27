<? 
//an:1 arg:2 mx:3 vn:4
define( 'WP_USE_THEMES', false );

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
						$horario = "06h00";
						break;
					case "1" :
						$horario = "06h30";
						break;
					case "2" :
						$horario = "07h00";
						break;
					case "3" :
						$horario = "07h30";
						break;
					case "4" :
						$horario = "08h00";
						break;
					case "5" :
						$horario = "08h30";
						break;
					case "6" :
						$horario = "09h00";
						break;
					case "7" :
						$horario = "09h30";
						break;
					case "8" :
						$horario = "10h00";
						break;
					case "9" :
						$horario = "10h30";
						break;
					case "10" :
						$horario = "11h00";
						break;
					case "11" :
						$horario = "11h30";
						break;
					case "12" :
						$horario = "12h00 ";
						break;
					case "13" :
						$horario = "12h30 ";
						break;
					case "14" :
						$horario = "13h00 ";
						break;
					case "15" :
						$horario = "13h30";
						break;
					case "16" :
						$horario = "14h00";
						break;
					case "17" :
						$horario = "14h30";
						break;
					case "18" :
						$horario = "15h00";
						break;
					case "19" :
						$horario = "15h30";
						break;
					case "20" :
						$horario = "16h00";
						break;
					case "21" :
						$horario = "16h30";
						break;
					case "22" :
						$horario = "17h00";
						break;
					case "23" :
						$horario = "17h30";
						break;
					case "24" :
						$horario = "18h00";
						break;
					case "25" :
						$horario = "18h30";
						break;
					case "26" :
						$horario = "19h00";
						break;
					case "27" :
						$horario = "19h30";
						break;
					case "28" :
						$horario = "20h00";
						break;
					case "29" :
						$horario = "20h30";
						break;
					case "30" :
						$horario = "21h00";
						break;
					case "31" :
						$horario = "21h30";
						break;
					case "32" :
						$horario = "22h00";
						break;
					case "33" :
						$horario = "22h30";
						break;
					case "34" :
						$horario = "23h00";
						break;
					case "35" :
						$horario = "23h30";
						break;
					case "36" :
						$horario = "24h00";
						break;
					case "37" :
						$horario = "24h30";
						break;
					case "38" :
						$horario = "01h00";
						break;
					case "39" :
						$horario = "01h30";
						break;
					case "40" :
						$horario = "02h00";
						break;
					case "41" :
						$horario = "02h30";
						break;
					case "42" :
						$horario = "03h00";
						break;
					case "43" :
						$horario = "03h30";
						break;
					case "44" :
						$horario = "04h00";
						break;
					case "45" :
						$horario = "04h30";
						break;
					case "46" :
						$horario = "05h00";
						break;
					case "47" :
						$horario = "05h30";
						break;
	}
return $horario;
}


function que_id($hor, $min) {
	switch ($hor) {
		case 6 :
			$id_actual = 0;
			if ($min>=30 && $min<=59) {
				$id_actual = 1;
			}
			break;
		case 7 :
			$id_actual = 2;
			if ($min>=30 && $min<=59) {
				$id_actual = 3;
			}
			break;
		case 8 :
			$id_actual = 4;
			if ($min>=30 && $min<=59) {
				$id_actual = 5;
			}
			break;
		case 9 :
			$id_actual = 6;
			if ($min>=30 && $min<=59) {
				$id_actual = 7;
			}
			break;
		case 10 :
			$id_actual = 8;
			if ($min>=30 && $min<=59) {
				$id_actual = 9;
			}
			break;
		case 11 :
			$id_actual = 10;
			if ($min>=30 && $min<=59) {
				$id_actual = 11;
			}
			break;
		case 12 :
			$id_actual = 12;
			if ($min>=30 && $min<=59) {
				$id_actual = 13;
			}
			break;
		case 13 :
			$id_actual = 14;
			if ($min>=30 && $min<=59) {
				$id_actual = 15;
			}
			break;
		case 14 :
			$id_actual = 16;
			if ($min>=30 && $min<=59) {
				$id_actual = 17;
			}
			break;
		case 15 :
			$id_actual = 18;
			if ($min>=30 && $min<=59) {
				$id_actual = 19;
			}
			break;
		case 16 :
			$id_actual = 20;
			if ($min>=30 && $min<=59) {
				$id_actual = 21;
			}
			break;
		case 17 :
			$id_actual = 22;
			if ($min>=30 && $min<=59) {
				$id_actual = 23;
			}
			break;
		case 18 :
			$id_actual = 24;
			if ($min>=30 && $min<=59) {
				$id_actual = 25;
			}
			break;
		case 19 :
			$id_actual = 26;
			if ($min>=30 && $min<=59) {
				$id_actual = 27;
			}
			break;
		case 20 :
			$id_actual = 28;
			if ($min>=30 && $min<=59) {
				$id_actual = 29;
			}
			break;
		case 21 :
			$id_actual = 30;
			if ($min>=30 && $min<=59) {
				$id_actual = 31;
			}
			break;
		case 22 :
			$id_actual = 32;
			if ($min>=30 && $min<=59) {
				$id_actual = 33;
			}
			break;
		case 23 :
			$id_actual = 34;
			if ($min>=30 && $min<=59) {
				$id_actual = 35;
			}
			break;
		case 0 :
			$id_actual = 36;
			if ($min>=30 && $min<=59) {
				$id_actual = 37;
			}
			break;
		case 1 :
			$id_actual = 38;
			if ($min>=30 && $min<=59) {
				$id_actual = 39;
			}
			break;
		case 2 :
			$id_actual = 40;
			if ($min>=30 && $min<=59) {
				$id_actual = 41;
			}
			break;
		case 3 :
			$id_actual = 42;
			if ($min>=30 && $min<=59) {
				$id_actual = 43;
			}
			break;
		case 4 :
			$id_actual = 44;
			if ($min>=30 && $min<=59) {
				$id_actual = 45;
			}
			break;
		case 5 :
			$id_actual = 46;
			if ($min>=30 && $min<=59) {
				$id_actual = 47;
			}
			break;
	}
	return $id_actual;
}
/*ini_set("display_errors",1);
error_reporting(E_ALL);
*/
//$abs_path= "../../../wp-blog-header.php";
//include($abs_path);

$dbhost="preprodabzdb";
$dbname="eonline_argentina";
$dbuser="eonline_usr";
$dbpass="30nl1n3";

$wpdbtest_otherdb = new wpdb($dbuser, $dbpass, $dbname, $dbhost);
$wpdbtest_otherdb->show_errors();


	$id_beam="5";

	//buscar los datos del beam
	$tz_beam =$wpdbtest_otherdb->get_var("SELECT tz_str FROM sched_beam where id_beam = ".$id_beam);

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
	$anio=date("Y");
	$hora=date("G");
	$minutos=date("i");

	$id_actual2=que_id($hora, $minutos);
	//echo($hora."-".$minutos);
	//echo("ID".$id_actual2);
	//$id_actual2=37;


	//buscar el id de la fecha
	$sqlstr="select id_date from sched_date where day = $dia and month = $mes and year = $anio";
	$id_date =$wpdbtest_otherdb->get_var($sqlstr);

	//echo($hora ." - ".$minutos);

	$sqlstr2="SELECT id_grid, ini_bol, title_program_str, chapter_program_str, title_str, p.id_program, p.content_str
	FROM sched_grid g
	LEFT JOIN sched_program p ON p.id_program = g.id_program
	WHERE g.id_date =$id_date AND g.id_beam =$id_beam AND id_grid=$id_actual2
	GROUP BY title_program_str
	ORDER BY id_grid ASC";
	
	$Actual =$wpdbtest_otherdb->get_results($sqlstr2);

	foreach ($Actual as $row1) {
		$titulo1 =$row1->title_program_str;
		$titulo1=str_replace("(12) ","",$titulo1);
		$titulo1=str_replace("(14) ","",$titulo1);
		$titulo1=str_replace("(16) ","",$titulo1);

		$flag1=horario($id_actual);
		list($flag1, $ampm) = split('[" "]', $flag1);

		echo("<div style='padding: 5px; color: #FF0000; font: 14px/18px Arial; font-weight:bold;'>AGORA NO E!</div>
		<div style='width:90%; background-color: #bd0100; padding: 5px; color: #f8f8f8; font: 17px/22px Arial; -webkit-border-radius: 4px;-moz-border-radius: 4px;border-radius: 4px;'><strong>   ".$titulo1."</strong></div>");
	}


	$sqlstr="SELECT id_grid, ini_bol, title_program_str, chapter_program_str, title_str, p.id_program, p.content_str
	FROM sched_grid g
	LEFT JOIN sched_program p ON p.id_program = g.id_program
	WHERE g.id_date =$id_date AND g.id_beam =$id_beam AND id_grid>$id_actual2 
	ORDER BY id_grid ASC";

	$testRows = $wpdbtest_otherdb->get_results($sqlstr);
	$can=0;
	foreach ($testRows as $row) {
		
		$id_grid =$row->id_grid;
		$ini_bol =$row->ini_bol;
		$titulo =$row->title_program_str;
		
		$titulo=str_replace("(12) ","",$titulo);
		$titulo=str_replace("(14) ","",$titulo);
		$titulo=str_replace("(16) ","",$titulo);


		$flag=horario($id_grid);
		list($flag, $ampm) = split('[" "]', $flag);

		if($titulo!=$titulo1 && $can>0 && $titulo_anterior!=$titulo)
			echo("<div style='padding: 5px; color: #5178bc; font: 10px/22px Tahoma, Arial; border-bottom:1px solid #001534; width:90%; margin:0 5px'>".$flag. $ampm." <strong><span  style='color: #fff;'>".$titulo."</span></strong></div>");

		$can++;
		$titulo_anterior=$titulo;

	}

?>

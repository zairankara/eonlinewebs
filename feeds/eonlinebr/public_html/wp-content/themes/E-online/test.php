<?
include_once('../../../wp-config.php');
        $dbhost="preprodabzdb";
        $dbname="eonline_argentina";
        $dbuser="eonline_usr";
        $dbpass="30nl1n3";
$sqlstr="SELECT id_grid, ini_bol, title_str, p.id_program FROM abmGrid g LEFT JOIN abmProgram p ON p.id_program= g.id_program WHERE g.id_date =18 AND g.id_beam=5 AND id_grid>26 AND ini_bol=1 ORDER BY id_grid";
mysql_connect ($dbhost, $dbuser, $dbpass);
mysql_select_db ($dbname);
$query = mysql_query ($sqlstr);
while($row = mysql_fetch_array ($query))
        echo("<br />".$row["title_str"]);

include_once('../../../wp-load.php');
include_once('../../../wp-includes/wp-db.php'); 
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



/*ini_set("display_errors",1);
error_reporting(E_ALL);
*/

	$dbhost="preprodabzdb";
	$dbname="eonline_argentina";
	$dbuser="eonline_usr";
	$dbpass="30nl1n3";

	$wpdbtest_otherdb = new wpdb($dbuser, $dbpass, $dbname, $dbhost);
	$wpdbtest_otherdb->show_errors();

	$id_beam="5";

	//buscar los datos del beam
	$tz_beam =$wpdbtest_otherdb->get_var( "SELECT tz_str FROM sched_beam where id_beam = ".$id_beam);

	//crear un ts para la hora de inicio del beam
	date_default_timezone_set($tz_beam);

	$hora=date("H");// DE 0 A 23
	$dia_letra=date("w");//0-DOMINGO
	if($hora>=0 && $hora<=6){
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

	//$id_actual=que_id($hora,$minutos);

?>
<body bgcolor="#000">
<?
	//buscar el id de la fecha
	$sqlstr="SELECT id_date FROM abmDias WHERE day = $dia AND month =  $mes AND year = $anio";
	$id_date =$wpdbtest_otherdb->get_var($sqlstr);

	//buscar el id actual
	$sqlstr22="SELECT id_grid FROM abmHoras WHERE hora = $hora";
	$id_grid =$wpdbtest_otherdb->get_var($sqlstr22);

	if($minutos>=0 AND $minutos<15){
		$id_grid=$id_grid; 
	}elseif($minutos>=15 AND $minutos<30){
		$id_grid++; 
	}elseif($minutos>=30 AND $minutos<45){
		$id_grid=$id_grid+2; 
	}elseif($minutos>=45 AND $minutos<=59){
		$id_grid=$id_grid+3;
	}
	//exit($id_grid."-  ".$sqlstr22);

	$sqlstr2="SELECT title_str
	FROM abmGrid g
	LEFT JOIN abmProgram p ON p.id_program = g.id_program
	WHERE g.id_date =$id_date AND g.id_beam =$id_beam AND id_grid=$id_grid
	GROUP BY title_str
	ORDER BY id_grid";
	$Actual =$wpdbtest_otherdb->get_results($sqlstr2);

	foreach ($Actual as $row1) {
		$titulo1=$row1->title_str;

		echo("<div style='padding: 5px; color: #FF0000; font: 14px/18px Arial; font-weight:bold;'>AGORA NO E!</div>
		<div style='width:90%; background-color: #bd0100; padding: 5px; color: #f8f8f8; font: 17px/22px Arial; -webkit-border-radius: 4px;-moz-border-radius: 4px;border-radius: 4px;'><strong>   ".$titulo1."</strong></div>");
	}
	//exit();

	$sqlstr="SELECT id_grid, ini_bol, title_str, p.id_program
	FROM abmGrid g
	LEFT JOIN abmProgram p ON p.id_program= g.id_program
	WHERE g.id_date =$id_date AND g.id_beam=$id_beam AND id_grid>$id_grid AND ini_bol=1 
	ORDER BY id_grid";

	echo($sqlstr);

	$testRows = $wpdbtest_otherdb->get_results($sqlstr);
	$can=0;
	foreach ($testRows as $row) {
		
		$id_grid =$row->id_grid;
		$ini_bol =$row->ini_bol;
		$titulo =$row->title_str;
	
		//buscar el id actual
		$sqlstr22="SELECT * FROM abmHoras WHERE id_grid = $id_grid";
		$testRows33 =$wpdbtest_otherdb->get_results($sqlstr22);

		foreach ($testRows33 as $row33) {
			$hora =$row33->hora;
			$min =$row33->min;
			$ampm =$row33->ampm;
			if($min=="0")$min="00";
		}

		if($titulo!=$titulo1 && $can>0)
			echo("<div style='padding: 5px; color: #5178bc; font: 10px/22px Tahoma, Arial; border-bottom:1px solid #001534; width:90%; margin:0 5px'>".$hora.":".$min."".$ampm." <strong>   <span  style='color: #fff;'>".$titulo."</span></strong></div>");

		$can++;

	}

?>
</body>

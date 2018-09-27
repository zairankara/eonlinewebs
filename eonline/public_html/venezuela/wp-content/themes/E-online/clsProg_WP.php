<?
define( 'WP_USE_THEMES', false );

/*ini_set("display_errors",1);
error_reporting(E_ALL);*/

$abs_path= $_SERVER["DOCUMENT_ROOT"]."/argentina/";
require($abs_path.'wp-blog-header.php' );

$dbhost="preprodabzdb";
$dbname="eonline_argentina";
$dbuser="eonline_usr";
$dbpass="30nl1n3";

$wpdbtest_otherdb = new wpdb($dbuser, $dbpass, $dbname, $dbhost);
$wpdbtest_otherdb->show_errors();


include($_SERVER["DOCUMENT_ROOT"]."/comscore.html");

	$id_beam="4";

	//buscar los datos del beam

$tz_beam =$wpdbtest_otherdb->get_var( "SELECT tz_str FROM sched_beam where id_beam = ".$id_beam);

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

	//buscar el id de la fecha
$sqlstr="select id_date from sched_date where day = $dia and month =  $mes and year = $anio";
$id_date =$wpdbtest_otherdb->get_var($sqlstr);

$sqlstr="SELECT id_grid, ini_bol, title_program_str FROM sched_grid g LEFT JOIN sched_program p ON p.id_program = g.id_program WHERE g.id_date =$id_date AND g.id_beam =$id_beam ORDER BY id_grid";

$testRows = $wpdbtest_otherdb->get_results($sqlstr);

//exit($sqlstr);

$cant=0;

foreach ($testRows as $row) {
    
	$id_grid =$row->id_grid;
	$ini_bol =$row->ini_bol;
	$titulo =$row->title_program_str;

	echo("&id_grid$cant=$id_grid&ini_bol$cant=$ini_bol&titulo$cant=$titulo");
	$cant++;
}

$ancho=60*$cant;

echo("&cant=$cant&ancho=$ancho");
?>



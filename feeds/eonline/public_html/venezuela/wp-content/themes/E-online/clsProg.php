<?
$dbhost="preprodabzdb";
$dbname="eonline_argentina";
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

	//CAMBIAR POR LA COOKIE
	/*if(isset($_COOKIE['ubicacion'])){
			$sql3 = "SELECT id_beam FROM sched_beam WHERE search_str = '".$_COOKIE['ubicacion']."'";
			$query3 = mysql_query($sql3);
			$row3=mysql_fetch_array($query3);
			
			$id_beam=$_COOKIE['ubicacion'];
		}else{
			$id_beam="2";
		}
		*/
	//include($_SERVER["DOCUMENT_ROOT"]."/comscore.html");

	$id_beam="4";

	//buscar los datos del beam
	$sql2 = "SELECT tz_str FROM sched_beam where id_beam = ".$id_beam;
	$query2 = mysql_query($sql2,$chandle);
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
	$anio=date("Y");

	//buscar el id de la fecha
	$sql1 = "select id_date from sched_date where day = ".$dia." and month =  ".$mes." and year = ".$anio;
	$query1=mysql_query($sql1,$chandle);
	$row_date=mysql_fetch_array($query1);
	$id_date = $row_date['id_date']; 

$sql="SELECT id_grid, ini_bol, title_program_str, chapter_program_str, title_str, p.id_program
FROM sched_grid g
LEFT JOIN sched_program p ON p.id_program = g.id_program
WHERE g.id_date =$id_date AND g.id_beam =$id_beam
ORDER BY id_grid";
$query=mysql_query($sql,$chandle);
$cant=mysql_num_rows($query);
$ancho=60*$cant;
$i=0;

while($row=mysql_fetch_array($query))
{
	$id_grid =$row["id_grid"];
	$ini_bol =$row["ini_bol"];
	$titulo =$row["title_program_str"];

	echo("&id_grid$i=$id_grid&ini_bol$i=$ini_bol&titulo$i=$titulo");
	$i++;
}

echo("&cant=$cant&ancho=$ancho");


mysql_close($chandle);

?>

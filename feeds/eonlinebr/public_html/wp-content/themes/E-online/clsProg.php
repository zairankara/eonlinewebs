<?include($_SERVER["DOCUMENT_ROOT"]."/comscore.html");?>

<?
$dbhost="preprodabzdb";
$dbname="eonline_argentina";
$dbuser="eonline_usr";
$dbpass="30nl1n3";

$chandle2 = mysql_connect($dbhost, $dbuser, $dbpass);
if (!$chandle2){
		$error = msg_error_conexion;
	}else{
		$db_selected= mysql_select_db($dbname, $chandle2);
		if (!$db_selected) {
			$error = msg_error_conexion;
		}
	}
echo mysql_error();

	//BEAM DE BRASIL
	$id_beam="5";

	//buscar los datos del beam
	$sql2 = "SELECT tz_str FROM sched_beam where id_beam = ".$id_beam;
	$query2 = mysql_query($sql2, $chandle2);
	$row_beam=mysql_fetch_array($query2);
	$tz_beam = $row_beam['tz_str'];

	//crear un ts para la hora de inicio del beam
	date_default_timezone_set($tz_beam);

	$dia=date("d");
	$mes=date("m");
	$anio=date("Y");

	//buscar el id de la fecha
	$sql1 = "select id_date from sched_date where day = ".$dia." and month =  ".$mes." and year = ".$anio;
	//exit($sql1);
	$query1=mysql_query($sql1, $chandle2);
	$row_date=mysql_fetch_array($query1);
	$id_date = $row_date['id_date']; 

$sql="SELECT id_grid, ini_bol, title_program_str, chapter_program_str, title_str, p.id_program
FROM sched_grid g
LEFT JOIN sched_program p ON p.id_program = g.id_program
WHERE g.id_date =$id_date AND g.id_beam =$id_beam
ORDER BY id_grid";
$query=mysql_query($sql, $chandle2);
$cant=mysql_num_rows($query);
$ancho=60*$cant;
$i=0;

while($row=mysql_fetch_array($query))
{
	$id_grid =$row["id_grid"];
	$ini_bol =$row["ini_bol"];
	$titulo =$row["title_program_str"];
	$titulo=str_replace("(12)","",$titulo);
	$titulo=str_replace("(14)","",$titulo);
	$titulo=str_replace("(16)","",$titulo);


	echo("&id_grid$i=$id_grid&ini_bol$i=$ini_bol&titulo$i=$titulo");
	$i++;
}

echo("&cant=$cant&ancho=$ancho");
mysql_close($chandle2);
?>



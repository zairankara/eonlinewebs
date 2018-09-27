<?
$pid=$_POST["pid"];
$idFeed=$_POST["idFeed"];
$opcion=$_POST["opcion"];

$dbhost="preprodabzdb";
$dbname="eonline_mexico";
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

$sqlstr="SELECT * FROM abmVotosFashion WHERE pid=".$pid." AND idFeed=".$idFeed."";
$query = mysql_query($sqlstr);
$cant=mysql_num_rows($query);

if($cant>0){
	$sql="UPDATE abmVotosFashion
	SET ".$opcion." = (".$opcion."+1)
	WHERE pid = ".$pid." AND idFeed=".$idFeed."";
}else{
	$sql="INSERT INTO abmVotosFashion (pid, idFeed,$opcion) VALUES ($pid, $idFeed, '2')";
}
//exit($sql);
mysql_query($sql);


if($row=mysql_fetch_array($query)){
	$wtf=$row["wtf"];
	$like=$row["likes"];
	$id=$row["id"];
	$total=$like+$wtf;
		echo("<div style='float:left;width:140px;'><h2 style='font-size: 30px;color:#00E818; background-color:#000;text-align:center;'>".round($like*100/$total)." %</h2></div>");
		echo("<div style='float:right;width:140px;'><h2 style='font-size: 30px;color:#C20315; background-color:#000;text-align:center;'>".round($wtf*100/$total)." %</h2></div>");
		echo("<h2 style='font-size: 20px;background-color:#000;text-align:center;'><a href='/varios/fashion-police-mex/index.php?rnd=".rand(0,5000)."' target='_self' style='color:#ddd; '>PROXIMA FOTO</a></h2>");
}else{
	echo(time()." -- ".$sqlstr);
}
mysql_close();
?>

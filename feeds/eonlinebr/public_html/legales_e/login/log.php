<?
include('../includes/connection.php');
session_start ();
	$usuario = $_POST["user"];
	$pass = $_POST["pass"];
	$consulta = mysql_query("select * from abmUser_legales where usuario ='".$usuario."' and pass ='".$pass."'"); 
	$cant=mysql_num_rows($consulta);
	if($cant==1)
	{
		$_SESSION ["logeado"] = true;
		echo 1;
	}else{
		unset($_SESSION["logeado"]);
		echo $consulta;
	}
?>
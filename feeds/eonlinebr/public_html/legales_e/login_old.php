<?
include('includes/connection.php');
session_start ();
$_SESSION["logeado"] = false;
if ($_POST["flag"] == "1"){
	$usuario = $_POST["usu"];
	$pass = $_POST["pass"];
	$consulta = mysql_query("select * from abmUser_legales where usuario ='".$usuario."' and pass ='".$pass."'"); 
	$cant=mysql_num_rows($consulta);
	$mensaje = "";
	if($cant==1)
	{
		$_SESSION ["logeado"] = true;
		echo("<script>location.href='index.php';</script>");exit();
	}else{
		unset($_SESSION["logeado"]);
		$mensaje.="Sus datos de acceso son invalidos<br>";
	}
}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>ANCINE | </title>
<link href="css/style.css" rel="stylesheet" type="text/css">
</head>
<body>
	<form name="form" action="login.php" method="post" >
		<input type="hidden" name="flag" id="flag" value="1">

<div class="container_2">	
		<div class="texto1"> ACCESO ANCINE</div>

		<div class="caja1"><input type="text" name="usu" id="usu" class="text_login"> </div>
		<div class="caja2"><input type="password" name="pass" id="pass" class="text_login"> </div>
<p>A informação exigida na IN100 está relatada conforme os requisitos na IN50</p>
 		<input type="submit" name="enviar" id="enviar" value="" class="login_submit">
<div class="caja3">
	 	<?if ($mensaje != ""){
echo($mensaje);
}
?>
</div>
	

</div>
</form>
			
</body>
</html>

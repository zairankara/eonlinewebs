<?PHP
	error_reporting(1);
	session_start ();
	include('includes/connection.php');

if($_GET["d"]=="1"){
    error_reporting(0);
    session_unset($_SESSION["logged"]);
    session_unset($_SESSION["id"]);
}

if ($_POST["flag"] == "1") {

				
				 if($_POST["username"]!="" && $_POST["password"]!=""){

							 $_SESSION ["logeado"] = false;

							  $username = $_POST ["username"];
							  $password = base64_encode($_POST ["password"]);
							  $flag = $_POST ["flag"];

								$mensaje = "";


								$sql="SELECT * FROM abmUser WHERE username='$username' AND password='$password'";
								//exit($sql."--");
								$consulta=mysql_query($sql) or die("error");
								$cant=mysql_num_rows($consulta);

								if($cant==1)
								{
									$_SESSION ["logeado"] = true;
									echo("<script>location.href='main.php';</script>");
									exit();

										
								}else{
									exit("0");
									unset($_SESSION["logeado"]);
									$mensaje.="Sus datos de acceso son invalidos<br>";
								}

					}else{
							unset($_SESSION["logeado"]);
							$mensaje.="Hay campos incompletos<br>";
					}
						
}

?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Admin | </title>
<link href="css/main.css" rel="stylesheet" type="text/css">
</head>
<body>

<table width="100%" height="100%" border="0" cellspacing="0" cellpadding="0">
 <tr><td valign="middle" align="center">
				<form name="form" action="<?=$_SERVER["php_self"]?>" method="post" >
				<table width="350" height="221" border="0" cellspacing="0" cellpadding="0">
				<tr>
				<td align="center"><img src="img/logo-login-admin.png" width="310" height="70" border="0" alt=""></td>
				</tr>
				<tr>
				<td align="center" height="15" >&nbsp;</td>
				</tr>
				 <tr style="background: url(img/bg-login.gif) no-repeat;">
				 <td align="center">
								<table width="280" border="0" cellpadding="0" cellspacing="0">
									<tr>
										<td height="20">&nbsp;</td>
									</tr>
									<tr>
										<td width="100" class="txt_login">Nome de usuário</td>
									</tr>
									<tr>
										<td>
											<input name="username" id="username" type="text" class="input_login" />
										</td>
									</tr>
									<tr>
										<td class="txt_login">Senha</td>
									</tr>
									<tr>
									<td>
											<input name="password" id="password" type="password" class="input_login"  />
										</td>
									</tr>
									<tr>
										<td><input type="submit" style="border:0px;" class="button-primary" value="" /></td>
									</tr>
									<tr>
										<td height="40">&nbsp;</td>
									</tr>
								</table>

				</td>
				  </tr>
				  <tr><td align="center" style="color:red;">
					<? 
					echo ($mensaje);
					?>
				 </td>
				 </tr>

				</table>
				<INPUT TYPE="hidden" value="1" name="flag">
				</form>
</td>
</tr>
</table>
</body>
</html>
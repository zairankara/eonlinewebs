<?php
if (!isset($_COOKIE['encuestaleida_test']))setcookie("encuestaleida_test", "true", time()+2419200);

if(isset($_COOKIE['encuestaleida_test']) ){
	echo("SETEADA");
}else{
	echo("NO SETEADA");
}?>

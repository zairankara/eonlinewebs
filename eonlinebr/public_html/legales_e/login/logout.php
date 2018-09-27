<?php 
	session_start();
	unset($_SESSION["logeado"]);
	session_destroy();
?>
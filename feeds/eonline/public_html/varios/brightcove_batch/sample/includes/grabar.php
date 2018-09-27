<?php

$BASE = 'generic_db';
$USUARIO = 'eonline_usr';
$CLAVE = '30nl1n3';
$SERVER = 'preprodabzdb';

/*$BASE = 'dev';
$USUARIO = 'devuser';
$CLAVE = 'sad798a3';
$SERVER = 'localhost';*/

$mysqli = new mysqli($SERVER, $USUARIO, $CLAVE, $BASE);
if ($mysqli->connect_errno) {
      echo "Falló la conexión con MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}
$message = $_POST["message"];
$error_code = $_POST["error_code"];
$newVideo_code = $_POST["newVideo_code"];
$action = $_POST["action"];

$sql_ins = "INSERT INTO log_batch_brightcove (error_code, message, action, newVideo_code ) VALUES ( '".$error_code."', '".$message."', '".$action."', '".$newVideo_code."');";
$res = $mysqli->query($sql_ins) or die($sql_ins);
echo ("--".$res);

?>
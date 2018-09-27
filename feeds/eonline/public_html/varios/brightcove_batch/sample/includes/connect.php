<?php
      $BASE = 'generic_db';
      $USUARIO = 'eonline_usr';
      $CLAVE = '30nl1n3';
      $SERVER = 'preprodabzdb';

$mysqli = new mysqli($SERVER, $USUARIO, $CLAVE, $BASE);
if ($mysqli->connect_errno) {
      echo "Falló la conexión con MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}
if (!$mysqli->set_charset("utf8")) {
      printf("Error cargando el conjunto de caracteres utf8: %s\n", $mysqli->error);
      exit();
};
?>
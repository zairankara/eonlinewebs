<?php
//Todo HTMl que se imprima en este archivo corresponde al valor de respuesta y mostrado en el alert()
//echo 'Feed:  '.$_POST["feed"].' '.$_POST["variable"];

$conn=mysql_connect('preprodabzdb', 'eonline_usr', '30nl1n3') or die("Can't connect to mysql host");
//Select the database to use
mysql_select_db('eonline_argentina') or die("Can't connect to DB");

$query="INSERT INTO abmPolls(option_id, feed, ip) VALUES('".$_POST["variable"]."', '".$_POST["feed"]."', '".$_SERVER['REMOTE_ADDR']."')";
if(mysql_query($query))
{
  //Vote added to database
  setcookie('voted_poll_new', TRUE, time()+86400, "/", "la.eonline.com", false);  
	  echo 'MUCHAS GRACIAS POR TU RESPUESTA.';  
}
else
  echo "There was some error processing the query: ".mysql_error();
?>
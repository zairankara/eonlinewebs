<?PHP
//error_reporting(0);

  session_start ();

  if ((!isSet ($_SESSION ["logeado"])) || ($_SESSION ["logeado"] != true)) {

    header ("location: index.php");

  }

?>
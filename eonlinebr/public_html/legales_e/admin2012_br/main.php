<?
include('control.php');
include('includes/connection.php');
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
<TITLE> <?=$marca;?> .:: BackOffice v1.0 ::. </TITLE>
<META NAME="Generator" CONTENT="EditPlus">
<META NAME="Author" CONTENT=".:: Abz Comunicacion ::.">
<META NAME="Keywords" CONTENT=".:: Abz Comunicacion ::.">
<META NAME="Description" CONTENT=".:: Abz Comunicacion ::.">
<meta http-equiv="Content-Type" content="text/html;charset=utf-8" /> 
<meta http-equiv="Content-Language" content="es-ES" />
<link href="css/main.css" rel="stylesheet" type="text/css">

<!-- <script type='text/javascript' src='js/jquery-1.7.min.js'></script> -->
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script> 

<!-- MULTIUPLOAD -->
<link type="text/css" rel="stylesheet" href="upload.css" />
 <script type='text/javascript' src='js/upload.min.js'></script>
<script type='text/javascript' src='js/swfobject.js'></script>
<script type='text/javascript' src='js/myupload.js'></script>
<!-- MULTIUPLOAD -->

<!-- CALENDARIO -->
<script type="text/javascript" src="js/calendar/calendar.js"></script>
<script type="text/javascript" src="js/calendar/calendar-es.js"></script>
<script type="text/javascript" src="js/calendar/calendar-setup.js"></script>
<link rel="stylesheet" type="text/css" media="all" href="css/calendar-green.css" title="win2k-cold-1" />
<!-- CALENDARIO -->

<STYLE>
h1{
	font:bold 14px/22px Helvetica, Arial, Sans-serif;
	color:#003399;
	margin-top:20px;
}
.th{
width:124px; 
height:20px; 
text-align:center; 
padding-top:5px; 
background:#003399;
border:1px solid #ccc;
float:left;
color:white;
}
</STYLE>

<script src='table_sort/ender.js'></script>
<script src='table_sort/tablesort.js'></script>
<script>
  $(document).ready(function () {
    $('table.sort').tablesort();
  });
</script>
</head>
</HEAD>

<BODY marginwidth=0 marginheight=0 leftmargin=0 topmargin=0 bgcolor="" border="" bordercolor="">

		<table cellpadding=0 cellspacing=0 border=0 bordercolor=pink width="100%">
		<tr>
		<td colspan="3" height="90" valign="top"><img src="img/logo-login-admin.png" width="310" height="70" border="0" alt="">
		</td>
		</tr>
		<tr>
		<td valign="top" width="170" align="left">
								
								 <table cellpadding=0 cellspacing=0 border=0 width="170">
								 <tr>
								<td colspan="3" height="40" style="background: url(img/bg_menu.gif) no-repeat; padding-left:40px;">MENU</td>
								</tr>
								<tr>
								<td width="20">&nbsp;</td>
								<td width="20"><img src="img/folder.gif" width="16" height="16" border="0" alt=""></td>
								<td><a href="main.php?idMenu=1" class="txt03">Upload Files</a></td>
								</tr>
								<tr>
								<!--<td width="20">&nbsp;</td>
								<td width="20"><img src="img/folder.gif" width="16" height="16" border="0" alt=""></td>
								<td><a href="main.php?idMenu=2" class="txt03">Upload Files Shows</a></td>
								</tr>-->
								<tr>
								<td colspan="3" height="25"></td>
								</tr>
								<tr>
								<td width="20">&nbsp;</td>
								<td width="20"><img src="img/exit.png" width="16" height="16" border="0" alt=""></td>
								<td><a href="index.php?d=1" class="txt03"> Exit</a></td>
								</tr>
								</table>

		</td>
		<td valign="top" width="10"><IMG SRC="img/sombra.png" WIDTH="21" HEIGHT="487" BORDER="0" ALT=""></td>
			
		<!-- Columna Cuerpo -->
		<td valign="top"  width="100%">

								<table cellpadding=0 cellspacing=0 border=0 width="100%">
								<tr>
								<td width="15"></td>
								<td>
								<?
								switch($_GET["idMenu"]) {
									case 1:include('programacion.php');break;
									case 2:include('comerciales.php');break;
									case 3:include('shows.php');break;
									default:include('programacion.php');break;
								}
								?>
								</td>
								<td width="15"></td>
								</tr>
								</table>
				
			</td>
			</tr>
			</table>


</BODY>
</HTML>

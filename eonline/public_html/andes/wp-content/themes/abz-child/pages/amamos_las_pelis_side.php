<?php
$chandle = mysql_connect($dbhost, $dbuser, $dbpass);
if (!$chandle){
	$error = msg_error_conexion;
}else{
	$db_selected= mysql_select_db($dbname, $chandle);
	if (!$db_selected) {
		$error = msg_error_conexion;
	}
}
?>
<style>
#amamos tr{}
#amamos td{
padding:0 3px!important; 
color:#000; 
background:none !important;
text-align:left;
}
</style>
<div id="notelaspierdas">
<img src="<?=$var_con[100]?>/images/shows/sidebar_amamos.jpg" />
<table id="amamos" border=0 align=left valign=top cellpadding=2 cellspacing=1 bgcolor=CCCCCC width=100% style="font:11px Tahoma; margin-bottom:10px; Text-transform: uppercase;">
<?
$col="white";

	$sql="SELECT * FROM  abmAmamosHorarios where activate = 1 and feed = 2";
	$query = mysql_query($sql);
	while($row = mysql_fetch_array($query)){

	
	$feed=$row["feed"];
	$title=$row["title"];
	$descripcion=$row["descripcion"];
	$activate=$row["activate"];
	
?>
<tr style="background-color:<?=$col?> !important;margin-top:5px;">
<td style="padding-top:3px !important;font-weight:bold;text-transform:uppercase;">
	<?echo($title);?>
</td> 
</tr>
<tr style="background-color:<?=$col?> !important">
 <td style="padding-bottom:5px !important; color:#848484; text-transform: capitalize !important;"><?echo($descripcion);?></td>
</tr>

<?

if ($col=="white") { $col="#e9e7e7";} else {$col="white";}

}

?>

</table>
</div>
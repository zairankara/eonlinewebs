<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<HTML>
 <HEAD>
  <TITLE> New Document </TITLE>
  <META NAME="Generator" CONTENT="EditPlus">
  <META NAME="Author" CONTENT="">
  <META NAME="Keywords" CONTENT="">
  <META NAME="Description" CONTENT="">
 </HEAD>

 <BODY>
  	<?
	$mydb = new wpdb('eonline_usr','30nl1n3','eonline_argentina','preprodabzdb');
	$id_beam="5";

	$rows = $mydb->get_results("SELECT tz_str FROM sched_beam where id_beam = ".$id_beam);
	echo "<ul>";
	foreach ($rows as $obj) :
	   echo "<li>".$obj->Name."</li>";
	endforeach;
	echo "</ul>";


	//buscar los datos del beam
	$row_beam=mysql_fetch_array($rows);
	$tz_beam = $row_beam['tz_str'];

	echo ("aa".$row_beam['tz_str']."Stat: $stat");
?>

 </BODY>
</HTML>

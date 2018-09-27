<?
include('includes/connection.php');
if ($_GET['abm'] == "delete"){
$consulta= mysql_query("delete from abmFiles where id =".$_GET['id']);

echo("<script>location.href='main.php';</script>");
}





$error="";



if($_POST["flag"]==1)
{

		if($_FILES["archivo"]["tmp_name"]!="")
		{
			if( ($_FILES["archivo"]["size"] / 1024) < 5000 )
			{
					$mensaje="";
			}else{
					$mensaje="El archivo es muy extenso, no debe superar los 5 Mb.";
			}
		}else{
			$mensaje="Debe subir un archivo";
		}

		$pathinfo = pathinfo($_FILES["archivo"]["name"]);
		$extension = $pathinfo['extension'];
		$extension = strtolower($extension);

		
			
			if($mensaje==""){

				$from=explode("-", $_POST["from"]);
				$from_d=$from[0];
				$from_m=$from[1];
				$from_y=$from[2];

				$titulo=$_POST["titulo"];
				$seccion=$_POST["seccion"];
				$filename=$_FILES["archivo"]["name"];

				//$fecha=$from_y."-".$from_m."-".$from_d;
				$fecha = date("y.m.d");
				$fecha2 = $_POST["fecha"];
				$sql2="INSERT INTO abmFiles (seccion, titulo, date, date_2, file) VALUES (\"$seccion\", \"$titulo\", \"$fecha\", \"$fecha2\", \"$filename\")";
				//exit($sql2);
				$query2=mysql_query($sql2);
				$id_new=mysql_insert_id();
				$file=$id_new.".".$extension;

				//
				$flag=move_uploaded_file($_FILES["archivo"]["tmp_name"], "uploads/".$file."");
					
				//exit("---------".$flag);

				chmod("uploads/".$file."", 0777);

				if($flag == true)
				{	
					$mensaje="Archivo subido satisfactoriamente";
				}

			


		}

}

?>
<script language="javascript">
function eliminarReg(id)
{
	if(confirm("Desea borrar el siguiente video?"))
	{
		location.href="programacion.php?abm=delete&id="+id;
	}
}
</script>
<link href='table_sort/style.css' rel='stylesheet'>

<form name="forma" method="post" action="<?=$_SERVER["REQUEST_URI"]?>" enctype="multipart/form-data">

<table cellpadding="5" cellspacing="0" border="0" width="100%" style="font-size:11px;" >
<tr>
<td height="15"></td>
</tr>
<tr>
<td align="left" width="150">Choose Section</td>
<td align="left">
	<select name="seccion">
		<option value="1">Programação</option>
		<option value="2">Files Shows</option>
		<option value="3">Promoções e publicidade</option>
	</select>
</td>
</tr>
<tr>
<td align="left" width="150">Title of the document</td>
<td align="left">
	<input type="text" name="titulo">
</td>
</tr>
<tr>
<td align="left" width="150">Choose Date<br/>(year-mounth-day)</td>
<td align="left">
	<input type="text" name="fecha" id="fecha" id="fecha" style="width: 125px;margin-left:2px;" />
	<input type="image" width="25" id="fechacal" src="js/calendar/calendar.gif" style="border-style:none;">
</td>
</tr>

<tr>
<td align="left" width="150">File</td>
<td align="left">
	<input type="file" name="archivo">
</td>
</tr>
<tr>
<td align="left" colspan="3"><input type="submit" value="Upload File"></td>
</tr>
<tr>
<td height="10"></td>
</tr>
<tr>
<td colspan="2" style="color:red;"><B><?=$mensaje?></B></td>
</tr>
</table>
<input type="hidden" name="flag" value="1">

</form>
</table>


<form name="formb" method="post" action="<?=$_SERVER["REQUEST_URI"]?>" >
<input type="hidden" name="consulta" id="consulta" value="1">  
<div class='inner'>
	<div style="margin-bottom:10px;">
	<select name="filtro" id="filtro" onChange="javascript: document.forms['formb'].submit()">
	<option value="1"<? if ($_POST["filtro"] == 1){echo "SELECTED";}?>>Programação</option>
	<option value="2" <? if ($_POST["filtro"] == 2){echo "SELECTED";}?>>Files Shows</option>
	<option value="3" <? if ($_POST["filtro"] == 3){echo "SELECTED";}?>>Promoções e publicidade</option>
	</select>
	</div>
</form>

<?
$consulta =  mysql_query("select * from abmFiles where seccion = 1"); 
if ($_POST["consulta"] == 1){
if ($_POST["filtro"] == 1){
$consulta =  mysql_query("select * from abmFiles where seccion = 1");
}

if ($_POST["filtro"] == 2){
$consulta =  mysql_query("select * from abmFiles where seccion = 2");
}
if ($_POST["filtro"] == 3){
$consulta =  mysql_query("select * from abmFiles where seccion = 3");
}

}

?>


  <table class='sort' id="abajo">
    <thead>
      <tr>
        <th width=40>#</th>
    <!--    <th>Secci&oacute;n</th>-->
        <th width=140>Upload Date</th>
	<th width=140>Publish Date</th>
        <th width=40>file</th>
        <th >Title</th>
	 <th width=40>Delete</th>
      </tr>
    </thead>
    <tbody>
<?while($fila = mysql_fetch_array($consulta)){


$separar = explode('.',$fila["file"]);
$ext = strtolower($separar[1]);

?>

      <tr>
        <td><?=$fila["id"]?></td>
<!--        <td><?=$fila["seccion"]?></td>-->
        <td><?=$fila["date"]?></td>
	 <td><?=$fila["date_2"]?></td>
	 <td style="text-align:center;"> <a href="uploads/<?echo($fila['id'].'.'.$ext);?>"> 

	<?
 if ($ext == "xls"){?>
	<img src="img/xls.png" width="18" height="" border="0" alt="" style="cursor:pointer;"> </a></td>
	<?}?>

	<? if ($ext == "xlsx"){?>
	<img src="img/xlsx.png" width="18" height="" border="0" alt="" style="cursor:pointer;"> </a></td>
	<?}?>

	<? if ($ext == "pdf"){?>
	<img src="img/Pdf.png" width="18" height="" border="0" alt="" style="cursor:pointer;"> </a></td>
	<?}?>

<? if ($ext == "txt"){?>
	<img src="img/txt.png" width="18" height="" border="0" alt="" style="cursor:pointer;"> </a></td>
	<?}?>

<? if ($ext == "doc"){?>
	<img src="img/doc.png" width="18" height="" border="0" alt="" style="cursor:pointer;"> </a></td>
	<?}?>

<? if ($ext == "docx"){?>
	<img src="img/docx.png" width="18" height="" border="0" alt="" style="cursor:pointer;"> </a></td>
	<?}?>

<? if ($ext == "csv"){?>
	<img src="img/csv.gif" width="18" height="" border="0" alt="" style="cursor:pointer;"> </a></td>
	<?}?>

        <td><?=$fila["titulo"]?></td>

<td style="text-align:center;"> <a href="javascript:eliminarReg(<?=($fila['id'])?>);"><img src="img/trash.png" alt="" width="25"  border="0" title="Eliminar" /></a></td>
      </tr>
    
<?}?>
    </tbody>
  </table>
</div>

<script type="text/javascript">
Calendar.setup({ inputField : "fecha", ifFormat  : "%y-%m-%d", button : "fechacal" });
</script>

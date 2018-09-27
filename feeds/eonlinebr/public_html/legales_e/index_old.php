<?php
include('includes/connection.php');
include('control.php');
function strpos_recursive($haystack, $needle, $offset = 0, &$results = array()) {                
    $offset = strpos($haystack, $needle, $offset);
    if($offset === false) {
        return $results;            
    } else {
        $results[] = $offset;
        return strpos_recursive($haystack, $needle, ($offset + 1), $results);
    }
}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>ANCINE | </title>
<link href="css/style.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="admin2012_br/js/calendar/calendar.js"></script>
<script type="text/javascript" src="admin2012_br/js/calendar/calendar-es.js"></script>
<script type="text/javascript" src="admin2012_br/js/calendar/calendar-setup.js"></script>
<link rel="stylesheet" type="text/css" media="all" href="admin2012_br/css/calendar-green.css" title="win2k-cold-1" />
</head>
<body>

<div class="container">
<div class="logout">
	<input type="button" name="logout" id="logout" value="Logout"  onclick="location.href='login.php';" style="cursor:pointer;">
</div>	
	<div class="box1"><h1><h1>Informa&#231;&#227;o ANCINE</h1</h1></div>
	<div class="box2"><h2>Baixe aqui a grade de hor&#225;rio de               
	programa&#231;&#227;o mensal</h2> </div>
	<div class="box3"><h2>Baixe aqui a ficha de informa&#231;&#227;o com o nome do 
	programa /pa&#237;s de origem /Hora de in&#237;cio e fim do 
	programa /Epis&#243;dios /Nome /Ano do programa /
	produtor /sinopse e diretor</h2> </div> 
	<div class="box4"><h1>Promo&#231;&#245;es e publicidade</h1></div>
	<div class="box10">
		<form name="formb" id="formb" method="post" action="<?=$_SERVER["PHP_SELF"]?>" >
		Filtrar por Dia
			<input type="hidden" name="fecha" id="fecha" id="fecha" style="width: 80px;margin-left:2px;" 					onChange="document.formb.submit();">
			<input type="image" width="25" id="fechacal" src="admin2012_br/js/calendar/calendar.gif" style="border-style:none;">
		</form>
		<br/>
<?
if ($_POST["fecha"] != ""){
echo("Data: 20".$_POST["fecha"]);?>
<input type="button" name="vertodos" id="vertodos" value="Veja última" onclick="location.href='index.php';">
<?}?>
	</div>
<div class="box5">
<script type="text/javascript">
Calendar.setup({ inputField : "fecha", ifFormat  : "%y-%m-%d", button : "fechacal" });
</script>	
		<?	
		$where = "";
		if ($_POST["fecha"] != ""){
		$where = " and date_2 = '20".$_POST["fecha"]."'";	
		$limit = "";	
		}
else
{
		$limit = "limit 20";
}
		$consulta = ("select * from abmFiles where seccion = 1".$where." order by date desc ".$limit); 


		


		$consulta = mysql_query($consulta);
		
		while($fila = mysql_fetch_array($consulta)){?>
			<div class="box_download"> 
				<div class="logo1">
			
					<?
					$archivoorg = $fila["file"];
					$separar = explode('.',$fila["file"]);
					$ext = strtolower($separar[1]);
					$archivo = $fila['id'].'.'.$ext;


			$string = $archivo;
$search = '.';
$found = strpos_recursive($archivoorg, $search);
$found2 = strpos_recursive($string, $search);
if($found[1] != ""){

$archivo = substr($archivo ,0, $found2[0]);
$archivo = $archivo.'.'."csv";
}
	
					
					?>
					<a href="https://docs.google.com/gview?url=http://br.eonline.com/legales/admin2012_br/uploads/<?echo($fila['id'].'.'.$ext);?>&embedded=true" target="_blank">

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
				
					<? if ($ext == "csv"){}?>

					</a>
			</div>
			<div class="logo2"><a href="forzar_descarga.php?archivo=<?=$archivo;?>&archivoorg=<?=$archivoorg;?>&flag=1"><img src="img/download.png" alt="" width="18" style="cursor:pointer;"></a></div>
			<div class="texto"><?=$fila["titulo"]?></div>
		</div>
		<?}?>
<div style="text-align:right;padding-right:20px;margin-top:20px;">
<?//echo ($limit);?>
</div>
	 </div>


	<div class="box6">
		
			<?
			$consulta =  mysql_query("select * from abmFiles where seccion = 2 order by date desc"); 
			while($fila = mysql_fetch_array($consulta)){?>

				<div class="box_download"> 
					<div class="logo1">
						
					<?
					$archivoorg = $fila["file"];
					$separar = explode('.',$fila["file"]);
					$ext = strtolower($separar[1]);
					$archivo = $fila['id'].'.'.$ext;
					





					?>
					<a href="https://docs.google.com/gview?url=http://br.eonline.com/legales/admin2012_br/uploads/<?echo($fila['id'].'.'.$ext);?>&embedded=true" target="_blank">
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

					<? if ($ext == "csv"){}?>
					</a>
				</div>
				<div class="logo2"><a href="forzar_descarga.php?archivo=<?=$archivo;?>&archivoorg=<?=$archivoorg;?>&flag=2"><img src="img/download.png" alt="" width="18" style="cursor:pointer;"></a></div>
				<div class="texto2"><? echo strtoupper($fila["titulo"])?> </div>
			</div>

	<?}?>			
<div style="text-align:right;padding-right:20px;margin-top:20px;">
<?//echo ("limit 20");?>
</div>
	</div>



	


			<div class="box11">
			<div style="padding-left:10px;">
			<form name="formc" id="formc" method="post" action="<?=$_SERVER["PHP_SELF"]?>" >
			Filtrar por Dia
			<input type="hidden" name="fecha2" id="fecha2" style="width: 80px;margin-left:2px;" 					onChange="document.formc.submit();">
			<input type="image" width="25" id="fechacal2" src="admin2012_br/js/calendar/calendar.gif" style="border-style:none;">
			
			</form>

<script type="text/javascript">
Calendar.setup({ inputField : "fecha2", ifFormat  : "%y-%m-%d", button : "fechacal2" });
</script>

<br/>
<?
if ($_POST["fecha2"] != ""){
echo("Data: 20".$_POST["fecha2"]);?>
<input type="button" name="vertodos" id="vertodos" value="Veja última" onclick="location.href='index.php';">
<?}?>
</div>
			</div>


	<div class="box7">
		<?	
		$where = "";
		if ($_POST["fecha2"] != ""){
		$where = " and date_2 = '20".$_POST["fecha2"]."'";		
		$limit = "";	
		}
		else
		{
		$limit = "limit 20";
		}
		$consulta = ("select * from abmFiles where seccion = 3".$where." order by date desc ".$limit); 
		
			$consulta = mysql_query($consulta);
			while($fila = mysql_fetch_array($consulta)){

			$separar = explode('.',$fila["file"]);
			$archivoorg = $fila["file"];
			$ext = strtolower($separar[1]);
			$archivo = $fila['id'].'.'.$ext;

$string = $archivo;
$search = '.';
$found = strpos_recursive($string, $search);
if($found[0] != ""){
$archivo = substr($archivo ,0, $found[0]);
$archivo = $archivo.'.'."csv";
}

			?>

			<div class="box_download" style="margin-left:10px;"> 
				<div class="logo1">
	
					
					<a href="https://docs.google.com/gview?url=http://br.eonline.com/legales/admin2012_br/uploads/<?echo($fila['id'].'.'.$ext);?>&embedded=true" target="_blank">
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
		
					<? if ($ext == "csv"){}?>
					</a>
			</div>



				
				<div class="logo2"><a href="forzar_descarga.php?archivo=<?=$archivo;?>&archivoorg=<?=$archivoorg;?>&flag=3"><img src="img/download.png" alt="" width="18" style="cursor:pointer;"></a></div>
				<div class="texto2"><? echo strtoupper($fila["titulo"])?></div>
			</div>
<?}?>
		
<div style="text-align:right;padding-right:20px;margin-top:20px;">
<?//echo ($limit);?>
</div>
	</div>
</div>

			
</body>
</html>

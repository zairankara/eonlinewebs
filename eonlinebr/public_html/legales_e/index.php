<?
include('includes/connection.php');
include('control.php');
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
	<title>ANCINE | </title>
	<link href="https://fonts.googleapis.com/css?family=Lato|Oswald" rel="stylesheet">
	<link rel="stylesheet" href="css/bootstrap.min.css" />
	<link rel="stylesheet" href="css/bootstrap-datetimepicker.min.css" />
	<link href="css/style.css" rel="stylesheet" type="text/css">
</head>
<body>
	<div class="container">
		<div class="col-sm-12 header">
			<h1>Informa&#231;&#227;o ANCINE</h1>
			<h2><strong>Baixe aqui a grade de hor&#225;rio de programa&#231;&#227;o mensal</strong></h2> 
		</div>
		<div class="col-sm-12 header">
			<h2>Baixe aqui a ficha de informa&#231;&#227;o com o nome do programa /pa&#237;s de origem /Hora de in&#237;cio e fim do programa /Epis&#243;dios /Nome /Ano do programa / produtor /sinopse e diretor</h2>
		</div>		
		<div class="col-sm-12">
			<button id="logout" class="btn btn-default">Logout</button>
		</div>
		<ul class="nav nav-tabs" role="tablist">
		    <li role="presentation" id="tab1"><a id="t1" href="#home" aria-controls="home" role="tab" data-toggle="tab">Programação</a></li>
		    <li role="presentation" id="tab2"><a id="t2" href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Files Shows</a></li>
		    <li role="presentation" id="tab3"><a id="t3" href="#promo" class="tab-button" aria-controls="promo" role="tab" data-toggle="tab">Promoções e publicidade</a></li>
		</ul>
		<div class="tab-content">
			<!-- Inicio TAB 1 -->
    		<div role="tabpanel" class="tab-pane" id="home">
				<div class="col-xs-12 col-sm-8 col-md-8 col-sm-offset-2 col-md-offset-2 table-responsive">
					<div class="col-sm-12 text-center" style="margin-top: 10px;">	
						<form name="formb" id="formb" method="post" action="<?=$_SERVER["PHP_SELF"]?>">
					        <div class="form-group">
						        <div class='input-group date' id='datetimepicker'>
					    	        <input type='text' class="form-control" id="fecha" name="fecha" />
					                <span class="input-group-addon">
					                    <span class="glyphicon glyphicon-calendar"></span>
					                </span>
					            </div>
					        </div>
						</form>
					<?
					if (isset($_POST["fecha"])){
						echo("Data: ".$_POST["fecha"]);
					?>
						<input type="button" class="btn btn-default" name="vertodos" id="vertodos" value="Veja última" onclick="location.href='index.php';">
					<?}?>
					</div>
					<div class="row">
					<?
					function strpos_recursive($haystack, $needle, $offset = 0, &$results = array()) {
						$offset = strpos($haystack, $needle, $offset);
						if($offset === false) {
						    return $results;
						} 
						else{
							$results[] = $offset;
							return strpos_recursive($haystack, $needle, ($offset + 1), $results);
						}
					}
					$where = "";
					$consulta_files = "SELECT * FROM abmFiles where seccion = 1";
					$consulta_files = mysql_query($consulta_files);
					$num_total_registros = mysql_num_rows($consulta_files);
					$TAMANO_PAGINA = 10;
					if(!isset($_GET['pagina'])){
					   $inicio = 0;
					   $pagina = 1;
					}
					else {
						$pagina = $_GET["pagina"];
					   	$inicio = ($pagina - 1) * $TAMANO_PAGINA;
					}
					if (isset($_POST["fecha"])){
						$where = " and date_2 = '".$_POST["fecha"]."'";
						$limit = "";
					}
					else
					{
						$limit = "LIMIT ".$inicio.",".$TAMANO_PAGINA;
					}
					$consulta = ("select * from abmFiles where seccion = 1".$where." order by date desc ".$limit); 			
					$consulta = mysql_query($consulta);
					$total_paginas = ceil($num_total_registros / $TAMANO_PAGINA);
					while($fila = mysql_fetch_array($consulta)){
					?>
					<div class="col-sm-12 fila"> 	
						<div class="logo1 col-xs-1">				
							<?
							$archivoorg = $fila["file"];
							$separar = explode('.',$fila["file"]);
							$ext = strtolower($separar[1]);
							$archivo = $fila['id'].'.'.$ext;
							//error_reporting(E_ALL);
							//ini_set('display_errors','On');
				            $string = $archivo;
							$search = '.';
							$found = strpos_recursive($archivoorg, $search);
							$found2 = strpos_recursive($string, $search);
							if(isset($found[1])){
								$archivo = substr($archivo ,0, $found2[0]);
								$archivo = $archivo.'.'."csv";
							}
							?>				
								<? if ($ext == "csv"){?>
									<a href="https://sheet.zoho.com/sheet/view.do?url=http://br.eonline.com/legales/admin2012_br/uploads/<?echo($fila['id'].'.'.$ext);?>&name=<?php echo $fila['file']; ?>" target="_blank">
									<img src="img/csv.png" width="18" height="" border="0" alt="" style="cursor:pointer;border:none;">
								<?}else{?>									
									<a href="https://docs.google.com/gview?url=http://br.eonline.com/legales/admin2012_br/uploads/<?echo($fila['id'].'.'.$ext);?>&embedded=true" target="_blank">
								<?php } ?>									<? if ($ext == "xls"){?>
										<img src="img/xls.png" width="18" height="" border="0" alt="" style="cursor:pointer;border:none;">
									<?}
									if ($ext == "xlsx"){?>
										<img src="img/xlsx.png" width="18" height="" border="0" alt="" style="cursor:pointer;border:none;">
									<?}?>
									<? if ($ext == "pdf"){?>
										<img src="img/Pdf.png" width="18" height="" border="0" alt="" style="cursor:pointer;border:none;">
									<?}?>
									<? if ($ext == "txt"){?>
										<img src="img/txt.png" width="18" height="" border="0" alt="" style="cursor:pointer;border:none;">
									<?}?>
									<? if ($ext == "doc"){?>
										<img src="img/doc.png" width="18" height="" border="0" alt="" style="cursor:pointer;border:none;">
									<?}?>
									<? if ($ext == "docx"){?>
										<img src="img/docx.png" width="18" height="" border="0" alt="" style="cursor:pointer;border:none;">
									<?}?>
								</a>
						</div>
						<div class="logo2 col-xs-1"><a href="forzar_descarga.php?archivo=<?=$archivo;?>&archivoorg=<?=$archivoorg;?>&flag=1a"><img src="img/download.png" alt="" width="18" style="cursor:pointer;"></a></div>
						<div class="texto col-xs-10"><?=$fila["titulo"]?></div>				
					</div>
					<?}?>
            		<?php if($limit != ''){ ?>
					<div class="col-sm-12">
						<nav>
						  	<ul id="pagination" class="pagination-sm pagination"></ul>
						</nav>
					</div>
					<?php } ?>
					</div>
				</div>
			</div>
			<!-- Fin TAB 1 -->
			<!-- Inicio TAB 2 -->
			<div role="tabpanel" class="tab-pane" id="profile">				
				<div class="col-xs-12 col-sm-8 col-md-8 col-sm-offset-2 col-md-offset-2 table-responsive">
					<?
					$where = "";
					$consulta_files_s2 = "SELECT * FROM abmFiles where seccion = 2";
					$consulta_files_s2 = mysql_query($consulta_files_s2);
					$registros_s2 = mysql_num_rows($consulta_files_s2);
					$tam_pag_s2 = 10;
					if(!isset($_GET['pag_s2'])){
					   $inicio_s2 = 0;
					   $pagina_s2 = 1;
					}
					else {
						$pagina_s2 = $_GET["pag_s2"];
					   	$inicio_s2 = ($pagina_s2 - 1) * $tam_pag_s2;
					}
					$limit_s2 = "LIMIT ".$inicio_s2.",".$tam_pag_s2;
					$total_pags_s2 = ceil($registros_s2 / $tam_pag_s2);
					$sql_s2 =  mysql_query("select * from abmFiles where seccion = 2 order by date desc ".$limit_s2); 
					while($fila = mysql_fetch_array($sql_s2)){
					?>
						<div class="col-sm-12 col-md-12 fila"> 	
							<div class="logo1 col-xs-1">
								<?
								$archivoorg = $fila["file"];
								$separar = explode('.',$fila["file"]);
								$ext = strtolower($separar[1]);
								$archivo = $fila['id'].'.'.$ext;
								?>
								<? if ($ext == "csv"){?>
									<a href="https://sheet.zoho.com/sheet/view.do?url=http://br.eonline.com/legales/admin2012_br/uploads/<?echo($fila['id'].'.'.$ext);?>&name=<?php echo $fila['file']; ?>" target="_blank">
									<img src="img/csv.png" width="18" height="" border="0" alt="" style="cursor:pointer;border:none;">
								<?}else{?>									
									<a href="https://docs.google.com/gview?url=http://br.eonline.com/legales/admin2012_br/uploads/<?echo($fila['id'].'.'.$ext);?>&embedded=true" target="_blank">
								<?php } ?>
									<? if ($ext == "xls"){?>
										<img src="img/xls.png" width="18" height="" border="0" alt="" style="cursor:pointer;"> </a>
									<?}?>
									<? if ($ext == "xlsx"){?>
										<img src="img/xlsx.png" width="18" height="" border="0" alt="" style="cursor:pointer;"> </a>
									<?}?>
									<? if ($ext == "pdf"){?>
										<img src="img/Pdf.png" width="18" height="" border="0" alt="" style="cursor:pointer;"> </a>
									<?}?>
									<? if ($ext == "txt"){?>
										<img src="img/txt.png" width="18" height="" border="0" alt="" style="cursor:pointer;"> </a>
									<?}?>
									<? if ($ext == "doc"){?>
										<img src="img/doc.png" width="18" height="" border="0" alt="" style="cursor:pointer;"> </a>
									<?}?>
									<? if ($ext == "docx"){?>
										<img src="img/docx.png" width="18" height="" border="0" alt="" style="cursor:pointer;"> </a>
									<?}?>
								</a>
							</div>
							<div class="logo2 col-xs-1"><a href="forzar_descarga.php?archivo=<?=$archivo;?>&archivoorg=<?=$archivoorg;?>"><img src="img/download.png" alt="" width="18" style="cursor:pointer;"></a></div>
							<div class="texto2 col-xs-10"><? echo strtoupper($fila["titulo"])?></div>
						</div>
						<?}?>			
					<div class="col-xs-12 text-center">
						<nav>
						  	<ul id="pagination_s2" class="pagination-sm pagination"></ul>
						</nav>
					</div>
				</div>
			</div>
			<!-- Fin TAB 2 -->
			<!-- Inicio TAB 3 -->
			<div role="tabpanel" class="tab-pane" id="promo">
				<div class="col-xs-12 col-sm-8 col-md-8 col-sm-offset-2 col-md-offset-2 table-responsive">
					<div class="col-sm-12 col-md-12 text-center" style="margin-top: 10px;">	
						<form name="formb2" id="formb2" method="post" action="<?=$_SERVER["PHP_SELF"]?>">
					        <div class="form-group">
						        <div class='input-group date' id='datetimepicker2'>
					    	        <input type='text' class="form-control" id="fecha2" name="fecha2" />
					                <span class="input-group-addon">
					                    <span class="glyphicon glyphicon-calendar"></span>
					                </span>
					            </div>
					        </div>
						</form>
					<?
					if (isset($_POST["fecha2"])){
						echo("Data: ".$_POST["fecha2"]);
					?>
						<input type="button" class="btn btn-default" name="vertodos" id="vertodos" value="Veja última" onclick="location.href='index.php';">
					<?}?>
					</div>
					<div class="row">
					<?
					$where = "";
					$consulta_files_s3 = "SELECT * FROM abmFiles where seccion=3";
					$consulta_files_s3 = mysql_query($consulta_files_s3);
					$registros_s3 = mysql_num_rows($consulta_files_s3);
					$tam_pag_s3 = 10;
					if(!isset($_GET['pag_s3'])){
					   $inicio_s3 = 0;
					   $pagina_s3 = 1;
					}
					else {
						$pagina_s3 = $_GET["pag_s3"];
					   	$inicio_s3 = ($pagina_s3 - 1) * $tam_pag_s3;
					}
					if (isset($_POST["fecha2"])){
						$where = " and date_2 = '".$_POST["fecha2"]."'";
						$limit_s3 = "";
					}
					else
					{
						$limit_s3 = "LIMIT ".$inicio_s3.",".$tam_pag_s3;
					}
					$total_pags_s3 = ceil($registros_s3 / $tam_pag_s3);
					$sql_s3 =  mysql_query("select * from abmFiles where seccion=3 ".$where." order by date desc ".$limit_s3);
					while($fila = mysql_fetch_array($sql_s3)){
					?>
					<div class="col-sm-12 col-md-12 fila"> 	
						<div class="logo1 col-xs-1">		
							<?
							$archivoorg = $fila["file"];
							$separar = explode('.',$fila["file"]);
							$ext = strtolower($separar[1]);
							$archivo = $fila['id'].'.'.$ext;
							//error_reporting(E_ALL);
							//ini_set('display_errors','On');
				            $string = $archivo;
							$search = '.';
							$found = strpos_recursive($archivoorg, $search);
							$found2 = strpos_recursive($string, $search);
							if(isset($found[1])){
								$archivo = substr($archivo ,0, $found2[0]);
								$archivo = $archivo.'.'."csv";
							}
							?>		
								<? if ($ext == "csv"){?>
									<a href="https://sheet.zoho.com/sheet/view.do?url=http://br.eonline.com/legales/admin2012_br/uploads/<?echo($fila['id'].'.'.$ext);?>&name=<?php echo $fila['file']; ?>" target="_blank">
									<img src="img/csv.png" width="18" height="" border="0" alt="" style="cursor:pointer;border:none;">
								<?}else{?>									
									<a href="https://docs.google.com/gview?url=http://br.eonline.com/legales/admin2012_br/uploads/<?echo($fila['id'].'.'.$ext);?>&embedded=true" target="_blank">
								<?php } ?>
									<? if ($ext == "xls"){?>
										<img src="img/xls.png" width="18" height="" border="0" alt="" style="cursor:pointer;border:none;">
									<?}
									if ($ext == "xlsx"){?>
										<img src="img/xlsx.png" width="18" height="" border="0" alt="" style="cursor:pointer;border:none;">
									<?}?>
									<? if ($ext == "pdf"){?>
										<img src="img/Pdf.png" width="18" height="" border="0" alt="" style="cursor:pointer;border:none;">
									<?}?>
									<? if ($ext == "txt"){?>
										<img src="img/txt.png" width="18" height="" border="0" alt="" style="cursor:pointer;border:none;">
									<?}?>
									<? if ($ext == "doc"){?>
										<img src="img/doc.png" width="18" height="" border="0" alt="" style="cursor:pointer;border:none;">
									<?}?>
									<? if ($ext == "docx"){?>
										<img src="img/docx.png" width="18" height="" border="0" alt="" style="cursor:pointer;border:none;">
									<?}?>
								</a>
						</div>
						<div class="logo2 col-xs-1"><a href="forzar_descarga.php?archivo=<?=$archivo;?>&archivoorg=<?=$archivoorg;?>&flag=1a"><img src="img/download.png" alt="" width="18" style="cursor:pointer;"></a></div>
						<div class="texto col-xs-10"><?=$fila["titulo"]?></div>				
					</div>
					<?}?>					
            		<?php if($limit_s3 != ''){ ?>			
					<div class="col-xs-12 text-center">
						<nav>
						  	<ul id="pagination_s3" class="pagination-sm pagination"></ul>
						</nav>
					</div>
					<?php } ?>
					</div>
				</div>
			</div>
			<!-- Fin TAB 3 -->
		</div>
	</div>		

	<!-- SCRIPTS -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
	<script type="text/javascript" src="js/moment-with-locales.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
	<script type="text/javascript" src="js/bootstrap-datetimepicker.min.js"></script>
    <script type="text/javascript" src="js/jquery.twbsPagination.min.js" type="text/javascript"></script>
    <script type="text/javascript">
        $(function(){        	
        	if(!localStorage.logeado){
        		location.href="login.php";
        	}
        	if(localStorage.getItem('tab') == 't1'){
        		$('#tab1').addClass('active');
        		$('#home').addClass('active');
        	}
        	else{
        		$('#tab1').removeClass('active');
        		$('#home').removeClass('active');
        	}
        	if(localStorage.getItem('tab') == 't2'){
        		$('#tab2').addClass('active');
        		$('#profile').addClass('active');
        	}
        	else{
	       		$('#tab2').removeClass('active');
        		$('#profile').removeClass('active');
        	}
        	if(localStorage.getItem('tab') == 't3'){
        		$('#tab3').addClass('active');
        		$('#promo').addClass('active');
        	}
        	else{
        		$('#tab3').removeClass('active');
        		$('#promo').removeClass('active');
        	} 
            $('#datetimepicker').datetimepicker({
                locale: 'pt-br',
                viewMode: 'days',
                format: 'YYYY-MM-DD',
                widgetPositioning: {
		            horizontal: 'auto',
		            vertical: 'bottom'
		         }
            });
            $('#datetimepicker2').datetimepicker({
                locale: 'pt-br',
                viewMode: 'days',
                format: 'YYYY-MM-DD',
                widgetPositioning: {
		            horizontal: 'auto',
		            vertical: 'bottom'
		         }
            });
            $('#fecha').focusout(function(){
            	$('#formb').submit();
            	console.log($('#fecha').val());
            });
            $('#fecha2').focusout(function(){
            	$('#formb2').submit();
            	console.log($('#fecha2').val());
            });
            $('#t1').click(function(){    
            	localStorage.setItem('tab','t1'); 
            });
            $('#t2').click(function(){    
            	localStorage.setItem('tab','t2'); 
            });
            $('#t3').click(function(){
            	localStorage.setItem('tab','t3'); 
            });
            <?php if($limit != ''){ ?>
            $('#pagination').twbsPagination({
		        totalPages: <?php echo $total_paginas; ?>,
		        visiblePages: 7,
		        href: '?pagina={{number}}',
		        first:'Último',
		        prev:'Próximo',
		        next:'Anterior',
		        last:'Primeiro'
		    });
		    <?php } ?>
		    $('#pagination_s2').twbsPagination({
		        totalPages: <?php echo $total_pags_s2; ?>,
		        visiblePages: 7,
		        href: '?pag_s2={{number}}',
		        first:'Primeiro',
		        prev:'Anterior',
		        next:'Próximo',
		        last:'Último'
		    });
            <?php if($limit_s3 != ''){ ?>
		    $('#pagination_s3').twbsPagination({
		        totalPages: <?php echo $total_pags_s3; ?>,
		        visiblePages: 7,
		        href: '?pag_s3={{number}}',
		        first:'Primeiro',
		        prev:'Anterior',
		        next:'Próximo',
		        last:'Último'
		    });
		    <?php } ?>
		    $('#logout').click(function(){
		    	$.ajax({
		    		type: "POST",
		           	url:"login/logout.php",
		           	success: function(){
		           		localStorage.removeItem("logeado");
		           		location.href="login.php";
		          	}
		    	});
		    });
        });
    </script>
</body>
</html>

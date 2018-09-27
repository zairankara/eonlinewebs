<?
include("conect.php");
$cual_mina=$_GET["v"];
$rand=rand(0,999);
//SUMO VOTO
mysql_query("UPDATE `qcode_fashionpolice` SET  `votos` =  (votos+1) WHERE mina = ".$cual_mina." LIMIT 1");


$query0=mysql_query("SELECT votos FROM qcode_fashionpolice WHERE mina=1");
$row0=mysql_fetch_array($query0);
$query1=mysql_query("SELECT votos FROM qcode_fashionpolice WHERE mina=2");
$row1=mysql_fetch_array($query1);
$query2=mysql_query("SELECT votos FROM qcode_fashionpolice WHERE mina=3");
$row2=mysql_fetch_array($query2);

$total=$row0["votos"]+$row1["votos"]+$row2["votos"];
//echo($total." total");
switch ($cual_mina) {
	case 1:
		# code...
		$mina="Kristen Stewart";
		$porc=$row0["votos"]*100/$total;
		break;
	case 2:
		# code...
		$mina="Ximena Sariñana";
		$porc=$row1["votos"]*100/$total;
		break;
	case 3:
		# code...
		$mina="Emma Watson";
		$porc=$row2["votos"]*100/$total;
		break;
	
	default:
		# code...
		break;
}


?>
<!DOCTYPE html>
<html lang="es" class="no-js">
	<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
		<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
	  <title>Votos Samsung Tab S</title>
	  <meta name="Generator" content="EditPlus">
	  <meta name="Author" content="">
	  <meta name="Keywords" content="">
	  <meta name="Description" content="">
	  <link rel="stylesheet" type="text/css" href="/common/font-face/font-face.css" />

		<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
   		<script type="text/javascript" src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
        <script type="text/javascript" src="easy-pie-chart-master/excanvas.js"></script>
        <script type="text/javascript" src="easy-pie-chart-master/jquery.easy-pie-chart.js"></script>

        <link rel="stylesheet" type="text/css" href="easy-pie-chart-master/style.css" media="screen">
        <link rel="stylesheet" type="text/css" href="easy-pie-chart-master/jquery.easy-pie-chart.css" media="screen">

        <script type="text/javascript">

            var initPieChart = function() {
                $('.percentage').easyPieChart({
                    animate: 1000,
                    lineWidth: 10,
                    lineCap: "round",
                    size: 180,
                    barColor: '#ec008c'
                });
               
                //update instance after 10 sec
	
                $('.updateEasyPieChart').on('click', function(e) {
                  e.preventDefault();
                  $('.percentage, .percentage-light, .percentage-dark').each(function() {
                    var newValue = Math.round(100*Math.random());
                    $(this).data('easyPieChart').update(newValue);
                    $('span', this).text(newValue);
                  });
                });
            };
        </script>
	<style>
	body{
		margin: 0 auto;
		text-align:center;
		background: #fff;
		font-family: "DIN Web Condensed ", "DIN Web Condensed Light", "Arial Narrow", sans-serif;
		font-size: 26px !important;
		color: #666666;
		text-transform: uppercase;

	}
	.chart {
	  float: left;
	  margin: 10px auto;
	}
	.label{
		position: absolute;
		right: 10px;
		top:30px;
		background: #999;
		  z-index: 10;
		  font-size: 20px;
		  border-radius: 50%;
		  -moz-border-radius: 50%;
		  -webkit-border-radius: 50%;
		  color: #ffffff;
		  display: inline-block;
		  text-align: center;
		  line-height: 1;
		  width: 40px; 
		  height: 30px;
		  _height: 40px;
		  padding-top: 10px;

	}
	.cab{
		background:url(../cab.jpg) no-repeat center center; 
		background-size: 100%;
		width: 100%;
		min-height: 62px;
	}
	#content{
		margin: 0 auto;
		text-align:center;
		width: 100%;
		padding-bottom: 40px;
	}
	.tel_vert{
		width: 100%;
		height: auto;
		min-height: 550px;
		background:url(tablet_vertical.jpg) no-repeat top center;
		background-size: 100%; 
		 margin-top: 15px;
	}
	h1{
		font-size:22px;
		  display: inline-table;
 		margin-top: 40px;
 		margin-bottom: 10px;
	}
	canvas { background:url(mina<?=$cual_mina?>.png?r=<?=$rand?>) no-repeat center center; }
	#circulo{
		width: 180px;
		height: 180px;
		text-align:center;
		margin: 0 auto;
		margin-bottom: 10px;
		position: relative;

	}
	.tipa{
		opacity: 0.58;
		filter: alpha(opacity=58); 
	}
	a{
		font-size:20px;
		color:#666666;
		margin-top: 25px;
	}
	a:hover{
		color:#ec008c;
	}
	#ad{
		width: 160px;
		height: 70px;
		margin:0 auto;
	}
	</style>
 </head>

 <body onload="initPieChart();">
	
	<div id="content">
		<div class="cab"></div>
		<a href="http://www.eonlinelatino.com" target="">regresar a eonlinelatino.com</a>
		
		<div class="tel_vert">
			<h1>¡Gracias por tu voto!</h1>

			<div id="circulo">
				<div class="label"><?=round($porc,0)?> %</div>

				<div class="chart">
	                <div class="percentage" data-percent="<?=$porc?>"><span></span> </div>
	            </div>
			</div>
			<div id="ad">
				<iframe src="http://la.eonline.com/varios/samsung_tab_s/ad1.php" width="160" height="70"  allowtransparency="true" frameborder="0" scrolling="no" tabindex="0" style="border: none;"></iframe>	
			</div>
		</div>

	</div>
  
 </body>
</html>

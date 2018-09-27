 <!doctype html>
<html>
    <head>
    	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
   		<script type="text/javascript" src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
        <script type="text/javascript" src="easy-pie-chart-master/excanvas.js"></script>
        <script type="text/javascript" src="easy-pie-chart-master/jquery.easy-pie-chart.js"></script>

        <link rel="stylesheet" type="text/css" href="easy-pie-chart-master/style.css" media="screen">
        <link rel="stylesheet" type="text/css" href="easy-pie-chart-master/jquery.easy-pie-chart.css" media="screen">

        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <script type="text/javascript">

            var initPieChart = function() {
                $('.percentage').easyPieChart({
                    animate: 1000
                });
                $('.percentage-light').easyPieChart({
                    barColor: '#666',
                    animate: 1000
                });
                $('.percentage-dark').easyPieChart({
                    barColor: '#999',
                    animate: 1000
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
        hr{
            border:1px solid #ddd;
            width:840px;
        }
        </style>
</head>

    <body onload="initPieChart();">
    	<?
    	$conn=mysql_connect('preprodabzdb', 'eonline_usr', '30nl1n3') or die("Can't connect to mysql host");
		mysql_select_db('eonline_argentina') or die("Can't connect to DB");

		$query0=mysql_query("SELECT COUNT(*) as respuesta FROM abmPolls WHERE option_id=0 AND feed<>99 AND idEncuesta=1");
		$row0=mysql_fetch_array($query0);
		$query1=mysql_query("SELECT COUNT(*) as respuesta FROM abmPolls WHERE option_id=1 AND feed<>99 AND idEncuesta=1");
		$row1=mysql_fetch_array($query1);
		$query2=mysql_query("SELECT COUNT(*) as respuesta FROM abmPolls WHERE option_id=2 AND feed<>99 AND idEncuesta=1");
		$row2=mysql_fetch_array($query2);
        $query3=mysql_query("SELECT COUNT(*) as respuesta FROM abmPolls WHERE option_id=3 AND feed<>99 AND idEncuesta=1");
		$row3=mysql_fetch_array($query3);
		$query4=mysql_query("SELECT COUNT(*) as respuesta FROM abmPolls WHERE option_id=4 AND feed<>99 AND idEncuesta=1");
		$row4=mysql_fetch_array($query4);
		$query5=mysql_query("SELECT COUNT(*) as respuesta FROM abmPolls WHERE option_id=5 AND feed<>99 AND idEncuesta=1");
		$row5=mysql_fetch_array($query5);

		$total=$row0["respuesta"]+$row1["respuesta"]+$row2["respuesta"]+$row3["respuesta"]+$row4["respuesta"]+$row5["respuesta"];
		
		$opcion0=$row0["respuesta"];
		$porc_opcion0=$row0["respuesta"]*100/$total;
		$opcion1=$row1["respuesta"];
		$porc_opcion1=$row1["respuesta"]*100/$total;
		$opcion2=$row2["respuesta"];
		$porc_opcion2=$row2["respuesta"]*100/$total;
        $opcion3=$row3["respuesta"];
		$porc_opcion3=$row3["respuesta"]*100/$total;
		$opcion4=$row4["respuesta"];
		$porc_opcion4=$row4["respuesta"]*100/$total;
		$opcion5=$row5["respuesta"];
		$porc_opcion5=$row5["respuesta"]*100/$total;

        
//andes
$andes_query0=mysql_query("SELECT COUNT(*) as respuesta FROM abmPolls WHERE option_id=0 AND feed=1 AND idEncuesta=1");
		$andes_row0=mysql_fetch_array($andes_query0);
		$andes_query1=mysql_query("SELECT COUNT(*) as respuesta FROM abmPolls WHERE option_id=1 AND feed=1 AND idEncuesta=1");
		$andes_row1=mysql_fetch_array($andes_query1);
		$andes_query2=mysql_query("SELECT COUNT(*) as respuesta FROM abmPolls WHERE option_id=2 AND feed=1 AND idEncuesta=1");
		$andes_row2=mysql_fetch_array($andes_query2);
        $andes_query3=mysql_query("SELECT COUNT(*) as respuesta FROM abmPolls WHERE option_id=3 AND feed=1 AND idEncuesta=1");
		$andes_row3=mysql_fetch_array($andes_query3);
		$andes_query4=mysql_query("SELECT COUNT(*) as respuesta FROM abmPolls WHERE option_id=4 AND feed=1 AND idEncuesta=1");
		$andes_row4=mysql_fetch_array($andes_query4);
		$andes_query5=mysql_query("SELECT COUNT(*) as respuesta FROM abmPolls WHERE option_id=5 AND feed=1 AND idEncuesta=1");
		$andes_row5=mysql_fetch_array($andes_query5);

		               $andes_total=$andes_row0["respuesta"]+$andes_row1["respuesta"]+$andes_row2["respuesta"]+$andes_row3["respuesta"]+$andes_row4["respuesta"]+$andes_row5["respuesta"];
		
		$andes_opcion0=$andes_row0["respuesta"];
		$andes_porc_opcion0=$andes_row0["respuesta"]*100/$andes_total;
		$andes_opcion1=$andes_row1["respuesta"];
		$andes_porc_opcion1=$andes_row1["respuesta"]*100/$andes_total;
		$andes_opcion2=$andes_row2["respuesta"];
		$andes_porc_opcion2=$andes_row2["respuesta"]*100/$andes_total;
        $andes_opcion3=$andes_row3["respuesta"];
		$andes_porc_opcion3=$andes_row3["respuesta"]*100/$andes_total;
		$andes_opcion4=$andes_row4["respuesta"];
		$andes_porc_opcion4=$andes_row4["respuesta"]*100/$andes_total;
		$andes_opcion5=$andes_row5["respuesta"];
		$andes_porc_opcion5=$andes_row5["respuesta"]*100/$andes_total;


//argentina
$argentina_query0=mysql_query("SELECT COUNT(*) as respuesta FROM abmPolls WHERE option_id=0 AND feed=2 AND idEncuesta=1");
		$argentina_row0=mysql_fetch_array($argentina_query0);
		$argentina_query1=mysql_query("SELECT COUNT(*) as respuesta FROM abmPolls WHERE option_id=1 AND feed=2 AND idEncuesta=1");
		$argentina_row1=mysql_fetch_array($argentina_query1);
		$argentina_query2=mysql_query("SELECT COUNT(*) as respuesta FROM abmPolls WHERE option_id=2 AND feed=2 AND idEncuesta=1");
		$argentina_row2=mysql_fetch_array($argentina_query2);
        $argentina_query3=mysql_query("SELECT COUNT(*) as respuesta FROM abmPolls WHERE option_id=3 AND feed=2 AND idEncuesta=1");
		$argentina_row3=mysql_fetch_array($argentina_query3);
		$argentina_query4=mysql_query("SELECT COUNT(*) as respuesta FROM abmPolls WHERE option_id=4 AND feed=2 AND idEncuesta=1");
		$argentina_row4=mysql_fetch_array($argentina_query4);
		$argentina_query5=mysql_query("SELECT COUNT(*) as respuesta FROM abmPolls WHERE option_id=5 AND feed=2 AND idEncuesta=1");
		$argentina_row5=mysql_fetch_array($argentina_query5);

		                          $argentina_total=$argentina_row0["respuesta"]+$argentina_row1["respuesta"]+$argentina_row2["respuesta"]+$argentina_row3["respuesta"]+$argentina_row4["respuesta"]+$argentina_row5["respuesta"];
		
		$argentina_opcion0=$argentina_row0["respuesta"];
		$argentina_porc_opcion0=$argentina_row0["respuesta"]*100/$argentina_total;
		$argentina_opcion1=$argentina_row1["respuesta"];
		$argentina_porc_opcion1=$argentina_row1["respuesta"]*100/$argentina_total;
		$argentina_opcion2=$argentina_row2["respuesta"];
		$argentina_porc_opcion2=$argentina_row2["respuesta"]*100/$argentina_total;
        $argentina_opcion3=$argentina_row3["respuesta"];
		$argentina_porc_opcion3=$argentina_row3["respuesta"]*100/$argentina_total;
		$argentina_opcion4=$argentina_row4["respuesta"];
		$argentina_porc_opcion4=$argentina_row4["respuesta"]*100/$argentina_total;
		$argentina_opcion5=$argentina_row5["respuesta"];
		$argentina_porc_opcion5=$argentina_row5["respuesta"]*100/$argentina_total;
 
//mexico
$mexico_query0=mysql_query("SELECT COUNT(*) as respuesta FROM abmPolls WHERE option_id=0 AND feed=3 AND idEncuesta=1");
		$mexico_row0=mysql_fetch_array($mexico_query0);
		$mexico_query1=mysql_query("SELECT COUNT(*) as respuesta FROM abmPolls WHERE option_id=1 AND feed=3 AND idEncuesta=1");
		$mexico_row1=mysql_fetch_array($mexico_query1);
		$mexico_query2=mysql_query("SELECT COUNT(*) as respuesta FROM abmPolls WHERE option_id=2 AND feed=3 AND idEncuesta=1");
		$mexico_row2=mysql_fetch_array($mexico_query2);
        $mexico_query3=mysql_query("SELECT COUNT(*) as respuesta FROM abmPolls WHERE option_id=3 AND feed=3 AND idEncuesta=1");
		$mexico_row3=mysql_fetch_array($mexico_query3);
		$mexico_query4=mysql_query("SELECT COUNT(*) as respuesta FROM abmPolls WHERE option_id=4 AND feed=3 AND idEncuesta=1");
		$mexico_row4=mysql_fetch_array($mexico_query4);
		$mexico_query5=mysql_query("SELECT COUNT(*) as respuesta FROM abmPolls WHERE option_id=5 AND feed=3 AND idEncuesta=1");
		$mexico_row5=mysql_fetch_array($mexico_query5);

		                          $mexico_total=$mexico_row0["respuesta"]+$mexico_row1["respuesta"]+$mexico_row2["respuesta"]+$mexico_row3["respuesta"]+$mexico_row4["respuesta"]+$mexico_row5["respuesta"];
		
		$mexico_opcion0=$mexico_row0["respuesta"];
		$mexico_porc_opcion0=$mexico_row0["respuesta"]*100/$mexico_total;
		$mexico_opcion1=$mexico_row1["respuesta"];
		$mexico_porc_opcion1=$mexico_row1["respuesta"]*100/$mexico_total;
		$mexico_opcion2=$mexico_row2["respuesta"];
		$mexico_porc_opcion2=$mexico_row2["respuesta"]*100/$mexico_total;
        $mexico_opcion3=$mexico_row3["respuesta"];
		$mexico_porc_opcion3=$mexico_row3["respuesta"]*100/$mexico_total;
		$mexico_opcion4=$mexico_row4["respuesta"];
		$mexico_porc_opcion4=$mexico_row4["respuesta"]*100/$mexico_total;
		$mexico_opcion5=$mexico_row5["respuesta"];
		$mexico_porc_opcion5=$mexico_row5["respuesta"]*100/$mexico_total;

//venezuela
$venezuela_query0=mysql_query("SELECT COUNT(*) as respuesta FROM abmPolls WHERE option_id=0 AND feed=4 AND idEncuesta=1");
		$venezuela_row0=mysql_fetch_array($venezuela_query0);
		$venezuela_query1=mysql_query("SELECT COUNT(*) as respuesta FROM abmPolls WHERE option_id=1 AND feed=4 AND idEncuesta=1");
		$venezuela_row1=mysql_fetch_array($venezuela_query1);
		$venezuela_query2=mysql_query("SELECT COUNT(*) as respuesta FROM abmPolls WHERE option_id=2 AND feed=4 AND idEncuesta=1");
		$venezuela_row2=mysql_fetch_array($venezuela_query2);
        $venezuela_query3=mysql_query("SELECT COUNT(*) as respuesta FROM abmPolls WHERE option_id=3 AND feed=4 AND idEncuesta=1");
		$venezuela_row3=mysql_fetch_array($venezuela_query3);
		$venezuela_query4=mysql_query("SELECT COUNT(*) as respuesta FROM abmPolls WHERE option_id=4 AND feed=4 AND idEncuesta=1");
		$venezuela_row4=mysql_fetch_array($venezuela_query4);
		$venezuela_query5=mysql_query("SELECT COUNT(*) as respuesta FROM abmPolls WHERE option_id=5 AND feed=4 AND idEncuesta=1");
		$venezuela_row5=mysql_fetch_array($venezuela_query5);

		 $venezuela_total=$venezuela_row0["respuesta"]+$venezuela_row1["respuesta"]+$venezuela_row2["respuesta"]+$venezuela_row3["respuesta"]+$venezuela_row4["respuesta"]+$venezuela_row5["respuesta"];
		
		$venezuela_opcion0=$venezuela_row0["respuesta"];
		$venezuela_porc_opcion0=$venezuela_row0["respuesta"]*100/$venezuela_total;
		$venezuela_opcion1=$venezuela_row1["respuesta"];
		$venezuela_porc_opcion1=$venezuela_row1["respuesta"]*100/$venezuela_total;
		$venezuela_opcion2=$venezuela_row2["respuesta"];
		$venezuela_porc_opcion2=$venezuela_row2["respuesta"]*100/$venezuela_total;
        $venezuela_opcion3=$venezuela_row3["respuesta"];
		$venezuela_porc_opcion3=$venezuela_row3["respuesta"]*100/$venezuela_total;
		$venezuela_opcion4=$venezuela_row4["respuesta"];
		$venezuela_porc_opcion4=$venezuela_row4["respuesta"]*100/$venezuela_total;
		$venezuela_opcion5=$venezuela_row5["respuesta"];
		$venezuela_porc_opcion5=$venezuela_row5["respuesta"]*100/$venezuela_total;

//brasil
$brasil_query0=mysql_query("SELECT COUNT(*) as respuesta FROM abmPolls WHERE option_id=0 AND feed=99 AND idEncuesta=1");
		$brasil_row0=mysql_fetch_array($brasil_query0);
		$brasil_query1=mysql_query("SELECT COUNT(*) as respuesta FROM abmPolls WHERE option_id=1 AND feed=99 AND idEncuesta=1");
		$brasil_row1=mysql_fetch_array($brasil_query1);
		$brasil_query2=mysql_query("SELECT COUNT(*) as respuesta FROM abmPolls WHERE option_id=2 AND feed=99 AND idEncuesta=1");
		$brasil_row2=mysql_fetch_array($brasil_query2);
        $brasil_query3=mysql_query("SELECT COUNT(*) as respuesta FROM abmPolls WHERE option_id=3 AND feed=99 AND idEncuesta=1");
		$brasil_row3=mysql_fetch_array($brasil_query3);
		$brasil_query4=mysql_query("SELECT COUNT(*) as respuesta FROM abmPolls WHERE option_id=4 AND feed=99 AND idEncuesta=1");
		$brasil_row4=mysql_fetch_array($brasil_query4);
		$brasil_query5=mysql_query("SELECT COUNT(*) as respuesta FROM abmPolls WHERE option_id=5 AND feed=99 AND idEncuesta=1");
		$brasil_row5=mysql_fetch_array($brasil_query5);

		 $brasil_total=$brasil_row0["respuesta"]+$brasil_row1["respuesta"]+$brasil_row2["respuesta"]+$brasil_row3["respuesta"]+$brasil_row4["respuesta"]+$brasil_row5["respuesta"];
		
		$brasil_opcion0=$brasil_row0["respuesta"];
		$brasil_porc_opcion0=$brasil_row0["respuesta"]*100/$brasil_total;
		$brasil_opcion1=$brasil_row1["respuesta"];
		$brasil_porc_opcion1=$brasil_row1["respuesta"]*100/$brasil_total;
		$brasil_opcion2=$brasil_row2["respuesta"];
		$brasil_porc_opcion2=$brasil_row2["respuesta"]*100/$brasil_total;
        $brasil_opcion3=$brasil_row3["respuesta"];
		$brasil_porc_opcion3=$brasil_row3["respuesta"]*100/$brasil_total;
		$brasil_opcion4=$brasil_row4["respuesta"];
		$brasil_porc_opcion4=$brasil_row4["respuesta"]*100/$brasil_total;
		$brasil_opcion5=$brasil_row5["respuesta"];
		$brasil_porc_opcion5=$brasil_row5["respuesta"]*100/$brasil_total;
        ?>

        <div class="container">
            <h1>Encuesta NUEVO NOMBRE SHOW</h1>

			<h2 style="color:#EF1E25;">PREGUNTA: ¿Qué nombre te gustaría para un programa en el que se comenta sobre lo último en cultura pop?</h2>
            <div class="chart">
                <div class="percentage" data-percent="<?=$porc_opcion0?>"><span><?=$opcion0?></span> Votos</div>
                <div class="label"><b>E! Buzz</b><br/> <?=round($porc_opcion0,2)?> %</div>
            </div>
            <div class="chart">
                <div class="percentage" data-percent="<?=$porc_opcion1?>"><span><?=$opcion1?></span> Votos</div>
                <div class="label"><b>E! Chat</b> <br/> <?=round($porc_opcion1,2)?> %</div>
            </div>
              <div class="chart">
                <div class="percentage" data-percent="<?=$porc_opcion2?>"><span><?=$opcion2?></span> Votos</div>
                <div class="label"><b>Pulso Pop</b><br/> <?=round($porc_opcion2,2)?> %</div>
            </div>
            <div class="chart">
                <div class="percentage" data-percent="<?=$porc_opcion3?>"><span><?=$opcion3?></span> Votos</div>
                <div class="label"><b>E! News Magazine</b> <br/> <?=round($porc_opcion3,2)?> %</div>
            </div>
              <div class="chart">
                <div class="percentage" data-percent="<?=$porc_opcion4?>"><span><?=$opcion4?></span> Votos</div>
                <div class="label"><b>E! Pop</b><br/> <?=round($porc_opcion4,2)?> %</div>
            </div>
            <div class="chart">
                <div class="percentage" data-percent="<?=$porc_opcion5?>"><span><?=$opcion5?></span> Votos</div>
                <div class="label"><b>E! Pulse</b> <br/> <?=round($porc_opcion5,2)?> %</div>
            </div>

            <div style="clear:both;"></div>
            <div  style="float:left; color:#EF1E25; font-size:13px;">Votos totales: <?=$total?></div>
            <div style="clear:both;"></div>
            
            <hr>			
            <h2 style="color:#EF1E25; margin-top:15px; font-size:11px;">En Andes (<?=$andes_total?> votos)</h2>
            <div class="chart">
                <div class="percentage-light" data-percent="<?=$andes_porc_opcion0?>"><span><?=$andes_opcion0?></span> Votos</div>
                <div class="label"><b>E! Buzz</b><br/> <?=round($andes_porc_opcion0,2)?> %</div>
            </div>
            <div class="chart">
                <div class="percentage-light" data-percent="<?=$andes_porc_opcion1?>"><span><?=$andes_opcion1?></span> Votos</div>
                <div class="label"><b>E! Chat</b> <br/> <?=round($andes_porc_opcion1,2)?> %</div>
            </div>
              <div class="chart">
                <div class="percentage-light" data-percent="<?=$andes_porc_opcion2?>"><span><?=$andes_opcion2?></span> Votos</div>
                <div class="label"><b>Pulso Pop</b><br/> <?=round($andes_porc_opcion2,2)?> %</div>
            </div>
            <div class="chart">
                <div class="percentage-light" data-percent="<?=$andes_porc_opcion3?>"><span><?=$andes_opcion3?></span> Votos</div>
                <div class="label"><b>E! News Magazine</b> <br/> <?=round($andes_porc_opcion3,2)?> %</div>
            </div>
              <div class="chart">
                <div class="percentage-light" data-percent="<?=$andes_porc_opcion4?>"><span><?=$andes_opcion4?></span> Votos</div>
                <div class="label"><b>E! Pop</b><br/> <?=round($andes_porc_opcion4,2)?> %</div>
            </div>
            <div class="chart">
                <div class="percentage-light" data-percent="<?=$andes_porc_opcion5?>"><span><?=$andes_opcion5?></span> Votos</div>
                <div class="label"><b>E! Pulse</b> <br/> <?=round($andes_porc_opcion5,2)?> %</div>
            </div>
            <div style="clear:both;"></div>
            
            <hr>			
            <h2 style="color:#EF1E25; margin-top:15px; font-size:11px;">En Argentina (<?=$argentina_total?> votos)</h2>
            <div class="chart">
                <div class="percentage-light" data-percent="<?=$argentina_porc_opcion0?>"><span><?=$argentina_opcion0?></span> Votos</div>
                <div class="label"><b>E! Buzz</b><br/> <?=round($argentina_porc_opcion0,2)?> %</div>
            </div>
            <div class="chart">
                <div class="percentage-light" data-percent="<?=$argentina_porc_opcion1?>"><span><?=$argentina_opcion1?></span> Votos</div>
                <div class="label"><b>E! Chat</b> <br/> <?=round($argentina_porc_opcion1,2)?> %</div>
            </div>
              <div class="chart">
                <div class="percentage-light" data-percent="<?=$argentina_porc_opcion2?>"><span><?=$argentina_opcion2?></span> Votos</div>
                <div class="label"><b>Pulso Pop</b><br/> <?=round($argentina_porc_opcion2,2)?> %</div>
            </div>
            <div class="chart">
                <div class="percentage-light" data-percent="<?=$argentina_porc_opcion3?>"><span><?=$argentina_opcion3?></span> Votos</div>
                <div class="label"><b>E! News Magazine</b> <br/> <?=round($argentina_porc_opcion3,2)?> %</div>
            </div>
              <div class="chart">
                <div class="percentage-light" data-percent="<?=$argentina_porc_opcion4?>"><span><?=$argentina_opcion4?></span> Votos</div>
                <div class="label"><b>E! Pop</b><br/> <?=round($argentina_porc_opcion4,2)?> %</div>
            </div>
            <div class="chart">
                <div class="percentage-light" data-percent="<?=$argentina_porc_opcion5?>"><span><?=$argentina_opcion5?></span> Votos</div>
                <div class="label"><b>E! Pulse</b> <br/> <?=round($argentina_porc_opcion5,2)?> %</div>
            </div>
            <div style="clear:both;"></div>
            
                        <hr>			
            <h2 style="color:#EF1E25; margin-top:15px; font-size:11px;">En mexico (<?=$mexico_total?> votos)</h2>
            <div class="chart">
                <div class="percentage-light" data-percent="<?=$mexico_porc_opcion0?>"><span><?=$mexico_opcion0?></span> Votos</div>
                <div class="label"><b>E! Buzz</b><br/> <?=round($mexico_porc_opcion0,2)?> %</div>
            </div>
            <div class="chart">
                <div class="percentage-light" data-percent="<?=$mexico_porc_opcion1?>"><span><?=$mexico_opcion1?></span> Votos</div>
                <div class="label"><b>E! Chat</b> <br/> <?=round($mexico_porc_opcion1,2)?> %</div>
            </div>
              <div class="chart">
                <div class="percentage-light" data-percent="<?=$mexico_porc_opcion2?>"><span><?=$mexico_opcion2?></span> Votos</div>
                <div class="label"><b>Pulso Pop</b><br/> <?=round($mexico_porc_opcion2,2)?> %</div>
            </div>
            <div class="chart">
                <div class="percentage-light" data-percent="<?=$mexico_porc_opcion3?>"><span><?=$mexico_opcion3?></span> Votos</div>
                <div class="label"><b>E! News Magazine</b> <br/> <?=round($mexico_porc_opcion3,2)?> %</div>
            </div>
              <div class="chart">
                <div class="percentage-light" data-percent="<?=$mexico_porc_opcion4?>"><span><?=$mexico_opcion4?></span> Votos</div>
                <div class="label"><b>E! Pop</b><br/> <?=round($mexico_porc_opcion4,2)?> %</div>
            </div>
            <div class="chart">
                <div class="percentage-light" data-percent="<?=$mexico_porc_opcion5?>"><span><?=$mexico_opcion5?></span> Votos</div>
                <div class="label"><b>E! Pulse</b> <br/> <?=round($mexico_porc_opcion5,2)?> %</div>
            </div>
            <div style="clear:both;"></div>
            
             <hr>			
            <h2 style="color:#EF1E25; margin-top:15px; font-size:11px;">En venezuela (<?=$venezuela_total?> votos)</h2>
            <div class="chart">
                <div class="percentage-light" data-percent="<?=$venezuela_porc_opcion0?>"><span><?=$venezuela_opcion0?></span> Votos</div>
                <div class="label"><b>E! Buzz</b><br/> <?=round($venezuela_porc_opcion0,2)?> %</div>
            </div>
            <div class="chart">
                <div class="percentage-light" data-percent="<?=$venezuela_porc_opcion1?>"><span><?=$venezuela_opcion1?></span> Votos</div>
                <div class="label"><b>E! Chat</b> <br/> <?=round($venezuela_porc_opcion1,2)?> %</div>
            </div>
              <div class="chart">
                <div class="percentage-light" data-percent="<?=$venezuela_porc_opcion2?>"><span><?=$venezuela_opcion2?></span> Votos</div>
                <div class="label"><b>Pulso Pop</b><br/> <?=round($venezuela_porc_opcion2,2)?> %</div>
            </div>
            <div class="chart">
                <div class="percentage-light" data-percent="<?=$venezuela_porc_opcion3?>"><span><?=$venezuela_opcion3?></span> Votos</div>
                <div class="label"><b>E! News Magazine</b> <br/> <?=round($venezuela_porc_opcion3,2)?> %</div>
            </div>
              <div class="chart">
                <div class="percentage-light" data-percent="<?=$venezuela_porc_opcion4?>"><span><?=$venezuela_opcion4?></span> Votos</div>
                <div class="label"><b>E! Pop</b><br/> <?=round($venezuela_porc_opcion4,2)?> %</div>
            </div>
            <div class="chart">
                <div class="percentage-light" data-percent="<?=$venezuela_porc_opcion5?>"><span><?=$venezuela_opcion5?></span> Votos</div>
                <div class="label"><b>E! Pulse</b> <br/> <?=round($venezuela_porc_opcion5,2)?> %</div>
            </div>
            <div style="clear:both;"></div>
            
            
            
            
            <h2 style="color:#EF1E25; margin-top:45px;">PREGUNTA EN BRASIL: ¿Qual nome você daria para um programa que fale sobre as últimas notícias da cultura pop?</h2>
            <div class="chart">
                <div class="percentage" data-percent="<?=$brasil_porc_opcion0?>"><span><?=$brasil_opcion0?></span> Votos</div>
                <div class="label"><b>E! Pop</b><br/> <?=round($brasil_porc_opcion0,2)?> %</div>
            </div>
            <div class="chart">
                <div class="percentage" data-percent="<?=$brasil_porc_opcion1?>"><span><?=$brasil_opcion1?></span> Votos</div>
                <div class="label"><b>Top do Pop</b> <br/> <?=round($brasil_porc_opcion1,2)?> %</div>
            </div>
              <div class="chart">
                <div class="percentage" data-percent="<?=$brasil_porc_opcion2?>"><span><?=$brasil_opcion2?></span> Votos</div>
                <div class="label"><b>E! News Magazine</b><br/> <?=round($brasil_porc_opcion2,2)?> %</div>
            </div>
            <div class="chart">
                <div class="percentage" data-percent="<?=$brasil_porc_opcion3?>"><span><?=$brasil_opcion3?></span> Votos</div>
                <div class="label"><b>Pulso Pop</b> <br/> <?=round($brasil_porc_opcion3,2)?> %</div>
            </div>
              <div class="chart">
                <div class="percentage" data-percent="<?=$brasil_porc_opcion4?>"><span><?=$brasil_opcion4?></span> Votos</div>
                <div class="label"><b>Batida Pop</b><br/> <?=round($brasil_porc_opcion4,2)?> %</div>
            </div>
            <div class="chart">
                <div class="percentage" data-percent="<?=$brasil_porc_opcion5?>"><span><?=$brasil_opcion5?></span> Votos</div>
                <div class="label"><b>E! Chat</b> <br/> <?=round($brasil_porc_opcion5,2)?> %</div>
            </div>

            <div style="clear:both;"></div>
            <div  style="float:left; color:#EF1E25; font-size:13px;">Votos totales: <?=$brasil_total?></div>
            <div style="clear:both;"></div>
        </div>


    </body>
</html>

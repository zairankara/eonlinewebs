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
</head>
    <body onload="initPieChart();">
    	<?
    	$conn=mysql_connect('preprodabzdb', 'eonline_usr', '30nl1n3') or die("Can't connect to mysql host");
		//Select the database to use
		mysql_select_db('eonline_argentina') or die("Can't connect to DB");

		$query0=mysql_query("SELECT COUNT(*) as jugador FROM abmPolls WHERE option_id=0 AND idEncuesta=0");
		$row0=mysql_fetch_array($query0);
		$query1=mysql_query("SELECT COUNT(*) as actor FROM abmPolls WHERE option_id=1 AND idEncuesta=0");
		$row1=mysql_fetch_array($query1);
		$query2=mysql_query("SELECT COUNT(*) as nadador FROM abmPolls WHERE option_id=2 AND idEncuesta=0");
		$row2=mysql_fetch_array($query2);

		$total=$row0["jugador"]+$row1["actor"]+$row2["nadador"];
		
		$jugador=$row0["jugador"];
		$porc_jugador=$row0["jugador"]*100/$total;
		$actor=$row1["actor"];
		$porc_actor=$row1["actor"]*100/$total;
		$nadador=$row2["nadador"];
		$porc_nadador=$row2["nadador"]*100/$total;


		$query0=mysql_query("SELECT COUNT(*) as andes FROM abmPolls WHERE feed=1 AND idEncuesta=0");
		$row0=mysql_fetch_array($query0);
		$query1=mysql_query("SELECT COUNT(*) as argentina FROM abmPolls WHERE feed=2 AND idEncuesta=0");
		$row1=mysql_fetch_array($query1);
		$query2=mysql_query("SELECT COUNT(*) as mexico FROM abmPolls WHERE feed=3 AND idEncuesta=0");
		$row2=mysql_fetch_array($query2);
		$query3=mysql_query("SELECT COUNT(*) as venezuela FROM abmPolls WHERE feed=4 AND idEncuesta=0");
		$row3=mysql_fetch_array($query3);
		$query4=mysql_query("SELECT COUNT(*) as brasil FROM abmPolls WHERE feed=99 AND idEncuesta=0");
		$row4=mysql_fetch_array($query4);

		$total_feed=$row0["andes"]+$row1["argentina"]+$row2["mexico"]+$row3["venezuela"]+$row4["brasil"];
		
		$andes=$row0["andes"];
		$porc_andes=$row0["andes"]*100/$total_feed;

		$argentina=$row1["argentina"];
		$porc_argentina=$row1["argentina"]*100/$total_feed;

		$mexico=$row2["mexico"];
		$porc_mexico=$row2["mexico"]*100/$total_feed;
	
		$venezuela=$row3["venezuela"];
		$porc_venezuela=$row3["venezuela"]*100/$total_feed;
		
		$brasil=$row4["brasil"];
		$porc_brasil=$row4["brasil"]*100/$total_feed;


        // GANADOR POR FEED

        $query00=mysql_query("SELECT COUNT(*) as andes FROM abmPolls WHERE feed=1 AND option_id=2 AND idEncuesta=0");
        $row00=mysql_fetch_array($query00);
        $query01=mysql_query("SELECT COUNT(*) as argentina FROM abmPolls WHERE feed=2  AND option_id=2 AND idEncuesta=0");
        $row01=mysql_fetch_array($query01);
        $query02=mysql_query("SELECT COUNT(*) as mexico FROM abmPolls WHERE feed=3 AND option_id=2 AND idEncuesta=0");
        $row02=mysql_fetch_array($query02);
        $query03=mysql_query("SELECT COUNT(*) as venezuela FROM abmPolls WHERE feed=4 AND option_id=2 AND idEncuesta=0");
        $row03=mysql_fetch_array($query03);
        $query04=mysql_query("SELECT COUNT(*) as brasil FROM abmPolls WHERE feed=99 AND option_id=2 AND idEncuesta=0");
        $row04=mysql_fetch_array($query04);

        $total_feed_gan=$row00["andes"]+$row01["argentina"]+$row02["mexico"]+$row03["venezuela"]+$row04["brasil"];
        
        $andes0=$row00["andes"];
        $porc_andes0=$row00["andes"]*100/$total_feed_gan;

        $argentina0=$row01["argentina"];
        $porc_argentina0=$row01["argentina"]*100/$total_feed_gan;

        $mexico0=$row02["mexico"];
        $porc_mexico0=$row02["mexico"]*100/$total_feed_gan;
    
        $venezuela0=$row03["venezuela"];
        $porc_venezuela0=$row03["venezuela"]*100/$total_feed_gan;
        
        $brasil0=$row04["brasil"];
        $porc_brasil0=$row04["brasil"]*100/$total_feed_gan;
		
    	?>

        <div class="container">
            <h1>Encuesta RYAN LOCHTE</h1>

			<h2 style="color:#EF1E25;">PREGUNTA: ¿QUIÉN ES RYAN LOCHTE?</h2>
            <div class="chart">
                <div class="percentage" data-percent="<?=$porc_jugador?>"><span><?=$jugador?></span> Votos</div>
                <div class="label"><b>Un jugador de Fútbol</b> <br/> <?=round($porc_jugador,2)?> %</div>
            </div>
            <div class="chart">
                <div class="percentage" data-percent="<?=$porc_actor?>"><span><?=$actor?></span> Votos</div>
                <div class="label"><b>Un actor</b> <br/> <?=round($porc_actor,2)?> %</div>
            </div>
            <div class="chart">
                <div class="percentage" data-percent="<?=$porc_nadador?>"><span><?=$nadador?></span> Votos</div>
                <div class="label"><b>Un nadador</b> <br/> <?=round($porc_nadador,2)?> %</div>
            </div>
            <div style="clear:both;"></div>
           <div  style="float:left; color:#EF1E25;">Votos totales: <?=$total?></div>
            <div style="clear:both;"></div>

           <h2 style="color:#EF1E25; margin-top:15px;">POR FEED</h2>
            <div class="chart">
                <div class="percentage-light" data-percent="<?=$porc_andes?>"><span><?=$andes?></span> Votos</div>
                <div class="label"><b>ANDES</b> <br/> <?=round($porc_andes,2)?> %</div>
            </div>
            <div class="chart">
                <div class="percentage-light" data-percent="<?=$porc_argentina?>"><span><?=$argentina?></span> Votos</div>
                <div class="label"><b>ARGENTINA</b> <br/> <?=round($porc_argentina,2)?> %</div>
            </div>
            <div class="chart">
                <div class="percentage-light" data-percent="<?=$porc_mexico?>"><span><?=$mexico?></span> Votos</div>
                <div class="label"><b>MEXICO</b> <br/> <?=round($porc_mexico,2)?> %</div>
            </div>
             <div class="chart">
                <div class="percentage-light" data-percent="<?=$porc_venezuela?>"><span><?=$venezuela?></span> Votos</div>
                <div class="label"><b>VENEZUELA</b> <br/> <?=round($porc_venezuela,2)?> %</div>
            </div>
             <div class="chart">
                <div class="percentage-light" data-percent="<?=$porc_brasil?>"><span><?=$brasil?></span> Votos</div>
                <div class="label"><b>BRASIL</b> <br/> <?=round($porc_brasil,2)?> %</div>
            </div>
            <div style="clear:both;"></div>

            <h2 style="color:#EF1E25; margin-top:15px;">CONSTESTARON CORRECTAMENTE</h2>
            <div class="chart">
                <div class="percentage-dark" data-percent="<?=$porc_andes0?>"><span><?=$andes0?></span> Votos</div>
                <div class="label"><b>ANDES</b> <br/> <?=round($porc_andes0,2)?> %</div>
            </div>
            <div class="chart">
                <div class="percentage-dark" data-percent="<?=$porc_argentina0?>"><span><?=$argentina0?></span> Votos</div>
                <div class="label"><b>ARGENTINA</b> <br/> <?=round($porc_argentina0,2)?> %</div>
            </div>
            <div class="chart">
                <div class="percentage-dark" data-percent="<?=$porc_mexico0?>"><span><?=$mexico0?></span> Votos</div>
                <div class="label"><b>MEXICO</b> <br/> <?=round($porc_mexico0,2)?> %</div>
            </div>
             <div class="chart">
                <div class="percentage-dark" data-percent="<?=$porc_venezuela0?>"><span><?=$venezuela0?></span> Votos</div>
                <div class="label"><b>VENEZUELA</b> <br/> <?=round($porc_venezuela0,2)?> %</div>
            </div>
             <div class="chart">
                <div class="percentage-dark" data-percent="<?=$porc_brasil0?>"><span><?=$brasil0?></span> Votos</div>
                <div class="label"><b>BRASIL</b> <br/> <?=round($porc_brasil0,2)?> %</div>
            </div>
            <div style="clear:both;"></div>
            <div  style="float:left; color:#EF1E25;">Votos totales ganadores: <?=$total_feed_gan?></div>
            <div style="clear:both;"></div>
        </div>


    </body>
</html>

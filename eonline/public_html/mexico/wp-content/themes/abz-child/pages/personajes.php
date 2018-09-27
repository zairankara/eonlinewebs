<style type="text/css">
	#personajes{
		margin: 0 20px !important;
		font-family: Oswald;
	    height: 270px;
	    border-top: 1px solid #d7d7d7;
	    border-bottom: 1px solid #d7d7d7;
	}
	#personajes .media{
	    display: inline-block;
	    margin-right: 10px;
	    cursor: pointer;
	}
	#personajes h3, #personajes h4{
		color: #d7d7d7;
	}
	 #personajes h4{
	 	font-size:17px !important;
	 }
	#personajes a{
		text-decoration: none;
	}
	section#personajes_owl{
		margin-top: 20px;
		padding: 0 50px; 
	}
</style>
<div id="personajes" class="col-xs-12 text-center">
	<h3>ELLOS MARCAN TENDENCIA</h3>
	<section id="personajes_owl">
	<?php
	$url = '../varios/JSON/JSONpersonajes/personajes.json';
	$contents = file_get_contents($url);
	$json_str = utf8_encode($contents);
	
	$personajes = json_decode($json_str,true);

	foreach ($personajes as $key) {

		$p_nombre = $key["p_nombre"];
		$p_imagen = $key["p_imagen"];
		?>

			<article class="media">
				<a href="/<?php echo NAMEFEED;?>/?s=<?php echo $p_nombre;?>" onclick="ga('send', 'event', 'Personajes', 'Click <?php echo NAMEFEED;?>', '<?php echo $p_nombre;?>');">
					<img src="/admin2012/personajes/uploads/<?php echo $p_imagen;?>" alt="<?php echo $p_nombre;?>">
	     			<h4 class="caption"><?php echo $p_nombre;?></h4>
	     		</a>
			</article>

		<?
	}?>
	</section>
</div>
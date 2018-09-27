<?php
	if( $_SERVER['HTTP_HOST'] == "localhost" || $_SERVER['HTTP_HOST'] == "192.168.1.50" ){
        $json_str = file_get_contents('../admin2012/nom_gan_2016/nom_gan.json');
    } else {
        $url = 'http://la.eonline.com/varios/JSON/JSONnom_gan/ganadores.json';
        $contents = file_get_contents($url); 
        $json_str = utf8_encode($contents); 
    }
    $testRows = json_decode($json_str,true);
	foreach ($testRows as $row) {
		$feed =	$row['feed'];
		if($feed==99){
			$link=$row['link'];
			$titulo=$row['titulo'];
			$titulo2=$row['titulo2'];
			$imagen_host=$row['imagen'];
			if($link=="") $link="#";
			if($imagen_host=="1") {
				$imagen_host="background: url(http://la.eonline.com/admin2012/nom_gan/imgs/ryan.jpg) no-repeat;";
			}else{
				$imagen_host="background: url(http://la.eonline.com/admin2012/nom_gan/imgs/guiliana.jpg) no-repeat;";
			}
?>
			<div class="banner_gan JSON" style="<?=$imagen_host?>">
				<a href="<?=$link?>" class="tit1 <?if($imagen_host=="1") echo ("ryan");?>"><?=$titulo?></a>
				<a href="<?=$link?>" class="tit2 <?if($imagen_host=="1") echo ("ryan");?>"><?=$titulo2?></a>
			</div>
<?php
		}
	}
?>
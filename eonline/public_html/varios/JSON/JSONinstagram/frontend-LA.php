<section id='slideInstagram'>
	<?php
	$urlInstagram = 'http://la.eonline.com/varios/JSON/JSONinstagram/eonlinelatino.json';
	$contentsInstagram = file_get_contents($urlInstagram);
	$json_strInstagram = utf8_encode($contentsInstagram);

	$InstagramJSON = json_decode($json_strInstagram,true);

	foreach ($InstagramJSON as $row) {
	?>
		<div class="slide">
	        <a href="http://www.instagram.com/p/<?php echo $row["code"]?>/" target="_blank">
	            <img src="<?php echo $row["display_src"]?>" alt="eonline latino" class="img-responsive" />
	        </a>
	    </div>
	 <?}?>
</section>
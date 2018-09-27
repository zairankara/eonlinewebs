<?php
//echo '1651';
$armado_array=array();
for ($i = 1; $i < 7; $i++) {

	switch($i)
	{
		case 1: $catSage="e_news";$nameCat="enews";break;
        case 2: $catSage="alfombra_roja";$nameCat="alfombraroja";break;
		case 3: $catSage="e_fashion_blogger";$nameCat="efashionblogger";break; 
		case 4: $catSage="deportes";$nameCat="deportes";break;
		case 5: $catSage="the_kardashians";$nameCat="the-kardashians";break;
		case 6: $catSage="foto_del_dia";$nameCat="the-kardashians";break;
		
	}

	$entrada = new SimpleXmlElement(file_get_contents("http://webservices.eonline.com:/V2/blogAPI/blogs/?edition=mx&start=0&num=7&category=".$catSage."&format=xml&view=deep&api-key=eonlinelatino")); 
	$cont=0;
	foreach ($entrada->payload->items as $key ) {
		$armado_array[$nameCat][$cont]["id"]=(string)$key->id;
		$armado_array[$nameCat][$cont]["title"]=(string)$key->publishTitle;
		$armado_array[$nameCat][$cont]["nameCat"]=$nameCat;
		$armado_array[$nameCat][$cont]["image"]="http://images.eonline.com".$key->bodySegments[0]->image->filePath."/".$key->bodySegments[0]->image->source;
		//echo ("<br><br>Id Nota: ".$key->id.")");
		//echo ("<br>Url: ".$key->publishTitle);
		//echo ("<br>Titulo: ".$key->publishTitle);
		//echo ("<br>Category: ".que_cat_es($key->categories->key)."/".$key->category);
		//echo ("<br><img src='http://images.eonline.com/resize/155/155/images.eonline.com".$key->bodySegments[0]->image->filePath."/".$key->bodySegments[0]->image->source."'>");
		$cont++;
	}
}
echo '<pre>';
  var_dump($armado_array);
echo '</pre>';

$jsonData = json_encode($armado_array, JSON_FORCE_OBJECT);
file_put_contents('/home/eonline/public_html/varios/JSON/JSONsubmenues/submenues.json', $jsonData);
?>
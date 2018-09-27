
<?php
// Crear un flujo
$opciones = array(
  'http'=>array(
    'method'=>"GET",
    'header'=>"Accept-language: en\r\n" .
              "Cookie: foo=bar\r\n"
  )
);

$contexto = stream_context_create($opciones);

// Abre el fichero usando las cabeceras HTTP establecidas arriba
$fichero = file_get_contents('http://api.brightcove.com/services/library?command=find_video_by_id&video_id=2194183896001&video_fields=name,length,FLVURL&media_delivery=http&token=I0y4D_IDcpk9uTEOu-CzxevCxKestAzHfVDQ9NEsCoftDK489KCl2w..');

$explorar=explode(",",$fichero);

$name=explode(":",$explorar[0]);
echo($name[1]);
$FLVURL=explode("FLVURL:",$explorar[2]);
echo("<br>".$FLVURL[1]);
echo("<br>".$explorar[2]);
?>

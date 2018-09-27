<?php
$archivo=$_GET["archivo"];
$findme   = '/';
$pos = strpos($archivo, $findme);
if ($pos == true){
    echo("<script>alert('error al subir el archivo');</script>");
    echo("<script>javascript:history.back(1);</script>");
    exit();
}
$archivoorg=str_replace(" ", "_", $_GET["archivoorg"]);
$archivo="admin2012_br/uploads/".$archivo;
function download_file($archivo, $downloadfilename = null) {
	$downloadfilename = $downloadfilename !== null ? $downloadfilename : basename($archivo);
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename=' . $downloadfilename);
        header('Content-Transfer-Encoding: binary');
        header('Expires: 0');
        header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
        header('Pragma: public');
        header('Content-Length: ' . filesize($archivo)); 
        ob_clean();
        flush();
        readfile($archivo);	
        exit; 
}

//download_file($archivo,$archivoorg);
download_file($archivo,$archivoorg);
?>


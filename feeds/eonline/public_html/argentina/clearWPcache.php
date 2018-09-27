<?
$handle=opendir('../argentina/wp-content/cache/');
$i = 0;

while (($file = readdir($handle))!==false) {
        if($file!="."&&$file!=".."&&$file!="/"&&$file!="supercache"&&$file!="/supercache"&&$file!="meta"&&$file!="/meta")unlink("../argentina/wp-content/cache/".$file);
        }
        closedir($handle);

$fp=fopen("test.mdo", "w");
?>

<?
$handle=opendir('../mexico/wp-content/cache/');
$i = 0;

while (($file = readdir($handle))!==false) {
        if($file!="."&&$file!=".."&&$file!="/"&&$file!="supercache"&&$file!="/supercache"&&$file!="meta"&&$file!="/meta")unlink("../mexico/wp-content/cache/".$file);
        }
closedir($handle);

$fp=fopen("test.mdo","w");
?>

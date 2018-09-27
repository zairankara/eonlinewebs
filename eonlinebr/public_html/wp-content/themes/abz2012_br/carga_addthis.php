<html xmlns="http://www.w3.org/1999/xhtml" xmlns:fb="https://www.facebook.com/2008/fbml">
<head>
</head>
<body>
<?
function noCache() {
	header("Expires: Tue, 01 Jul 2001 06:00:00 GMT");
	header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
	header("Cache-Control: no-store, no-cache, must-revalidate");
	header("Cache-Control: post-check=0, pre-check=0", false);
	header("Pragma: no-cache");
}
noCache();

$purl=$_POST["purl"];
$pdesc=$_POST["pdesc"];
$ptitle = $_POST["ptitle"];
$gallery = $_POST["pgallery"];


$encodeada = urlencode($ptitle." ".$pdesc." ".$purl);

$url_share = "http://br.eonline.com/beta/&amp;gallery=".rand(0,5000)."&amp;img=".$purl."&amp;t=".$ptitle."&amp;d=".$pdesc;
$url_share2 = "http://br.eonline.com/varios/share_facebookbr.php";
$url_share3 = "http://br.eonline.com/varios/share_facebookbr.php%26rnd=".rand(0,5000)."%26gal=".$gallery."%26img=".$purl."%26nogeo=1%26t=".$ptitle."%26d=".$pdesc;

$ur_share4="?s=100&amp;p[title]=".$ptitle."&amp;p[images][0]=".$purl."&amp;p[url]=".$url_share2;
$ur_share5="?u=".$url_share2."?url=".$url_share3;

$nueva_url="?u=".$url_share;

echo("<a target='_blank' href='http://www.facebook.com/sharer.php".$ur_share5."' class='facebook-share'><span></span></a>
	<a target='_blank' href='http://twitter.com/home?status=".$encodeada."' data-url='".$purl."' data-text='".$ptitle." ".$pdesc."' class='twitter-share' data-via='eonlinelatino' data-lang='es' data-dnt='true'><span></span></a>
	<a class='addthis_button_email email-share'><span></span></a>");
?>

<!--<a target='_blank' href='https://plus.google.com/109640549139413649832?rel=author' class='plus-share' target='blank'><span></span></a>-->

</body>
</html>
<html xmlns="http://www.w3.org/1999/xhtml" xmlns:fb="https://www.facebook.com/2008/fbml">
<head>
<style>
.fb_hide_iframes iframe{left:0;}
</style>
<script src="http://connect.facebook.net/pt_BR/all.js#xfbml=1"></script>
</head>
<body><?
$purl=$_POST["purl"];
$pdesc=$_POST["pdesc"];
echo("<div id='fb-root'></div><fb:comments href='".$purl."' width='480' height='500' num_posts='2' colorscheme='dark'></fb:comments ></div>");
?>
</body>
</html>
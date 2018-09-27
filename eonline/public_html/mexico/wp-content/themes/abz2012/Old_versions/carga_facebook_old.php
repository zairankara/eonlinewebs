<html xmlns="http://www.w3.org/1999/xhtml" xmlns:fb="https://www.facebook.com/2008/fbml">
<head>
<script src="http://connect.facebook.net/es_ES/all.js#xfbml=1"></script>
<style type="text/css">
/* fix height and put a scrollbar, in case of.  */
	.fb_ltr {
	    height: 800px !important;
	    overflow-y: auto !important;
	  }
	.fb_iframe_widget span{
	    height:800px !important; 
	    overflow-y: auto !important;
	}
</style>
</head>
<body><?
$purl=$_POST["purl"];
$pdesc=$_POST["pdesc"];
//echo($purl." asasassas<br>");
//echo($pdesc." pdesc<br>");
echo("<p><iframe src='//www.facebook.com/plugins/like.php?href=".$purl."&amp;send=false&amp;layout=button_count&amp;width=120&amp;show_faces=false&amp;font&amp;colorscheme=light&amp;action=like&amp;height=21&amp;appId=494335233944829' scrolling='no' frameborder='0' style='border:none; overflow:hidden; width:120px; height:21px;' allowTransparency='true'></iframe>
	<a href='https://twitter.com/share' class='twitter-share-button' data-text='".$pdesc."' data-url='".$purl."' data-via='eonlinelatino' data-lang='es'>Twittear</a></p>
	<div style='margin-bottom:30px;'><div id='fb-root'></div><fb:comments href='".$purl."' width='480'  num_posts='5' colorscheme='dark'></fb:comments ></div>");
?>
<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>

</body>
</html>
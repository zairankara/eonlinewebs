<script type="text/javascript">

var _gaq = _gaq || [];
                _gaq.push(
                                ['_setAccount', 'UA-18061947-6'],
                                ['_trackPageview'],
                                ['b._setAccount', 'UA-18061947-40'],
                                ['b._setDomainName', 'eonline.com'],
                                ['b._setAllowLinker', true],
                                ['b._trackPageview']
                );
                setTimeout(function() { _gaq.push(['_trackEvent', 'Sin-Rebote', 'Sin-Rebote', '10 sec']); },10000);
                setTimeout(function() { _gaq.push(['b._trackEvent', 'Sin-Rebote', 'Sin-Rebote', '10 sec']); },10000);
  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();
  
  
</script>

<?

$agent="";
$agent = $_SERVER['HTTP_USER_AGENT'];  
$mobile=0;


if(strpos($agent, "iPhone")!== FALSE){
    $mobile=1;
}elseif(strpos($agent, "Android")!== FALSE){
    $mobile=1;
}elseif(strpos($agent, "BlackBerry")!== FALSE){
    $mobile=1;
}elseif(strpos($agent, "iPod")!== FALSE){
    $mobile=1;
}else {
    $mobile = "0";
}

if($_GET["noteid"]!="")
  $noteid="?p=".$_GET["noteid"];
else
  $noteid="";


# A donde vamos?
if ($mobile == "1") {
   
	if($noteid!="")
		header("Location:http://br.eonline.com/mobile/reader.php?id=".$_GET["noteid"]);
	else
	    header("Location:http://br.eonline.com/mobile/parser.php?rand=".rand(1,100));

}else {

	header("Location:http://br.eonline.com/".$noteid);
}
?>

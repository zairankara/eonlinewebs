<script type="text/javascript">
var _gaq = _gaq || [];
       _gaq.push(
            ['_setAccount', 'UA-18061947-40'],
            ['_setAllowLinker', true],
            ['_setDomainName', 'eonline.com']
      );
      setTimeout(function() { _gaq.push(['_trackEvent', 'Sin-Rebote', 'Sin-Rebote', '10 sec']); },10000);
(function() {
  var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
  ga.src = ('https:' == document.location.protocol ? 'https://' : 'http://') + 'stats.g.doubleclick.net/dc.js';
  var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
})();
</script>

<!-- 
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
-->

<?
/* cookie para fancybox encuesta 2013 */
if (!isset($_COOKIE['encuestaleidanew']))setcookie("encuestaleidanew", "true", time()+259200); //3 dias

# Pais
if($_COOKIE["selectorE"]!=""){
    $pais = $_COOKIE["selectorE"];
}else{
    $pais = trim($_SERVER['GEOIP_COUNTRY_CODE']);
    setcookie("selectorE","$pais",0, "/");
}


//$pais = trim($_SERVER['GEOIP_COUNTRY_CODE']);


$AR = array("AR", "UY", "PY");
$AN = array("CL", "NN", "AW", "BB", "BO", "CO", "CR", "CW", "EC", "SV", "GT", "HN", "NI", "PA", "PE", "PR", "DO", "TT");
$VE = array("VE", "VV");
$MX = array("MX", "MM");

if (in_array($pais, $MX))     {$feed = "mexico";}
elseif (in_array($pais, $VE)) {$feed = "venezuela";}
elseif (in_array($pais, $AN)) {$feed = "andes";}
elseif (in_array($pais, $AR)) {$feed = "argentina";}
else                          {$feed = "otros";}

//if($_GET["abz"]==1) exit("---".$feed);

/*
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
}*/


//Forzar a no detectar 3-2-2014
//$mobile=0;


if($_GET["noteid"]!="")
  $noteid="?p=".$_GET["noteid"];
else
  $noteid="";


//if($_GET["noteid"]!="" && !is_numeric($_GET["noteid"])) exit("forbiden access");

if($_GET["feed"]!="")$feed=$_GET["feed"];

switch($feed)
{
    case "mexico":$f="3";break;
    case "venezuela":$f="4";break; 
    case "andes":$f="1";break; 
    case "argentina":$f="2";break;
    case "otros":$f="3";break;
    default:break;
}
/*
# A donde vamos?
if ($mobile == "1") {
   
	if($noteid!="")
		header("Location:http://la.eonline.com/mobile/reader.php?f=".$f."&id=".$_GET["noteid"]);
	else
	 header("Location:http://la.eonline.com/mobile/parser.php?f=".$f."&rand=".rand(1,100));

}else{

	if ($feed == "otros") { 
	    header("Location:http://la.eonline.com/preindex.php"); 
  }else{
	    header("Location:http://la.eonline.com/".trim($feed).$noteid);
	}

}*/

if ($feed == "otros") { 
    header("Location:http://la.eonline.com/preindex.php"); 
}else{
    header("Location:http://la.eonline.com/".trim($feed));
}
?>
<!-- Comscore -->
<? include("/home/eonline/public_html/varios/comscore/index.php");?>

<?php
/*ini_set('display_errors','On');
error_reporting(E_ALL);*/
include("vars.inc");

class Connection
{
 public $conn="";

 private function ConnectDB()
 {
	include("config.inc");
	$conn=mysql_connect($srv, $usr, $psw);
	if(!$conn)
	{
		$stringErr=date("Ymd")."\n-------------------------\n\nLog date:".date("D j M Y G:i:s")."\n\n-------------------------\n\n".mysql_errno() . ": " . mysql_error();
		$this->saveLog("errorDB.txt",$stringErr);
		exit("ERRORDB");
	}

	if(!mysql_select_db($dbn))
	{
		$stringErr=date("Ymd")."\n-------------------------\n\nLog date:".date("D j M Y G:i:s")."\n\n-------------------------\n\n".mysql_errno() . ": " . mysql_error();
		$this->saveLog("errorDB.txt",$stringErr);
		exit("ERRORDB");
	}
 }

 protected function cnx()
 {
	$this->ConnectDB();
 }

}

class General extends Connection
{

 public function __construct() 
 {
	parent::cnx();
 }

 public function CloseCNX() 
 {
	return mysql_close();	
 }

 public function SanitizeParameters($array) {
       
            if(is_array($array)) {

                foreach($array as $key => $value) {

                    if(is_array($array[$key]))

                        $array[$key] = $this->SanitizeParameters($array[$key]);
               
                    if(is_string($array[$key]))
                        $array[$key] = mysql_real_escape_string($array[$key]);
                }           
            }

            if(is_string($array))

                $array = mysql_real_escape_string($array);
           
            return $array;
 }

 public function ReadWsXml($UrlXml, $vecConcat)
 {
	
	$concat=API_STRING_CNX;
	foreach($vecConcat as $value)
	{
		if($value!=""){	
			$concat.="&".array_search($value, $vecConcat)."=".$value;
		}
	}	

	$UrlXml=$UrlXml.$concat;
	//$this->saveLog("params.txt",$UrlXml);
	//echo("<br>".$UrlXml."<br><br>");
	
	$rndNum=rand(1,100000000);
	$ch = curl_init($UrlXml);
	$tmpFile='xmls_tmp/temp_'.$rndNum.'.xml';	
	$fp = fopen($tmpFile, "w");
	curl_setopt($ch, CURLOPT_FILE, $fp);
	curl_setopt($ch, CURLOPT_HEADER, 0);
	curl_setopt($ch, CURLOPT_HTTPHEADER, Array("User-Agent: Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.8.1.15) Gecko/20080623 Firefox/2.0.0.15") ); 
	curl_exec($ch);
	curl_close($ch);
	fclose($fp);

	$fp = fopen($tmpFile, "rb");
	$contenido = fread($fp, filesize($tmpFile));
	//$tmpFile="xmls_tmp/temp_20437050.xml";
	$xml = simplexml_load_string($contenido);
	fclose($fp);
	unlink($tmpFile);
	return $xml;
 }
 
 public function saveLog($nameFile, $strLog)
 {
	$nameFile="logs/".$_SESSION["feed"]."_".$nameFile;
	$fp=fopen($nameFile,"rt");
	$fechaFile=fgets($fp);
	fclose($fp);

	if( trim($fechaFile) == trim(date("Ymd")) ) //Only one log per day
	{
		$typeWrite="a";
	}else{
		$typeWrite="w";
	}
 
		if(!($fp=fopen($nameFile,$typeWrite)))
		{
			exit(ERR_WR." file:$nameFile");
		}else{
			$strLog=date("Ymd")."\n-------------------------\n\nLog date:".date("D j M Y G:i:s")."\n\n-------------------------\n\n".$strLog; 	
			fwrite($fp,$strLog."\n");
			fclose($fp);
		}
 }

 public function executeQuery($sqlstr)
 {
	if(!$query=mysql_query($sqlstr))
	{
		//Error debugging DB 27.10.2014
		$this->saveLog("dbErr",mysql_errno() . ": " . mysql_error()."\n\n".ERR_BQ.$sqlstr);
		//exit(ERR_BQ.$sqlstr);
	}else{

		return $query;
	}
 }

 public function existCategory($categoryId)
 {
	 //exit();
	$vecAsoc=array();

	switch($categoryId)
	{
	case "330":$idCatWP="1";break; //E! News
        case "12971":$idCatWP="4";break; //Estrenos
        case "12972":$idCatWP="5";break; //Zona E!
        case "12973":$idCatWP="3";break; //Alfombra Roja
        case "12975":$idCatWP="6";break; //Golden Globe Awards
        case "502":$idCatWP="7";break; //Sag Awards
        case "12976":$idCatWP="8";break; //Grammy Awards
        case "12977":$idCatWP="9";break; //Oscar Awards
        case "12978": //Latin Billboard
			switch($_SESSION["feed"])
			{
			case "venezuela":$idCatWP="3792";break;
			case "argentina":$idCatWP="3944";break;
			case "mexico":$idCatWP="3885";break;
			case "andes":$idCatWP="3787";break;
			}
		break;
		case "14730": //THE KARDASHIANS
			switch($_SESSION["feed"])
			{
			case "venezuela":$idCatWP="14758";break;
			case "argentina":$idCatWP="14759";break;
			case "mexico":$idCatWP="14742";break;
			case "andes":$idCatWP="14762";break;
			}
		break;
		case "15179": //AMAMOS LAS PELIS
			switch($_SESSION["feed"])
			{
			case "venezuela":$idCatWP="21781";break;
			case "argentina":$idCatWP="21573";break;
			case "mexico":$idCatWP="21974";break;
			case "andes":$idCatWP="21755";break;
			}
		break;
		case "13269": //DEPORTES
			switch($_SESSION["feed"])
			{
			case "venezuela":$idCatWP="4369";break;
			case "argentina":$idCatWP="6643";break;
			case "mexico":$idCatWP="4259";break;
			case "andes":$idCatWP="6498";break;
			}
		break;
		case "85": //LOL
			switch($_SESSION["feed"])
			{
			case "venezuela":$idCatWP="2567";break;
			case "argentina":$idCatWP="2619";break;
			case "mexico":$idCatWP="2638";break;
			case "andes":$idCatWP="2533";break;
			}
		break;
		case "15152": //COPA DEL MUNDO
			switch($_SESSION["feed"])
			{
			case "venezuela":$idCatWP="21186";break;
			case "argentina":$idCatWP="21017";break;
			case "mexico":$idCatWP="21361";break;
			case "andes":$idCatWP="21160";break;
			}
		break;
        case "12979":$idCatWP="35";break; //Emmy Awards
        case "12974": //E! Fashion Blogger
			switch($_SESSION["feed"])
	                {
	                case "venezuela":$idCatWP="3711";break;
	                case "argentina":$idCatWP="3832";break;
	                case "mexico":$idCatWP="3815";break;
	                case "andes":$idCatWP="3712";break;
	                }
		break;
		case "14501": //Imperdible
                switch($_SESSION["feed"])
                {
                case "venezuela":$idCatWP="10144";break;
                case "argentina":$idCatWP="10240";break;
                case "mexico":$idCatWP="10331";break;
                case "andes":$idCatWP="10202";break;
                }
        break;
		case "14562": //Foto del día
                switch($_SESSION["feed"])
                {
                case "venezuela":$idCatWP="10901";break;
                case "argentina":$idCatWP="10992";break;
                case "mexico":$idCatWP="11089";break;
                case "andes":$idCatWP="10958";break;
                }
        break;
        case "15381": //Musica
			switch($_SESSION["feed"])
			{
			case "venezuela":$idCatWP="26522";break;
			case "argentina":$idCatWP="26329";break;
			case "mexico":$idCatWP="26845";break;
			case "andes":$idCatWP="26482";break;
			}
		break;
		case "14710": //Thetrend
			switch($_SESSION["feed"])
			{
			case "venezuela":$idCatWP="12197";break;
			case "argentina":$idCatWP="12279";break;
			case "mexico":$idCatWP="14710";break;
			case "andes":$idCatWP="12244";break;
			}
		break;
		case "14961": //Married to jonas
			switch($_SESSION["feed"])
			{
			case "venezuela":$idCatWP="18075";break;
			case "argentina":$idCatWP="17967";break;
			case "mexico":$idCatWP="18166";break;
			case "andes":$idCatWP="18064";break;
			}
		break;
		case "14991": //WAKEUP
			switch($_SESSION["feed"])
			{
			case "venezuela":$idCatWP="18575";break;
			case "argentina":$idCatWP="18433";break;
			case "mexico":$idCatWP="18648";break;
			case "andes":$idCatWP="18540";break;
			}
		case "15200": //THE ROYALS
			switch($_SESSION["feed"])
			{
			case "venezuela":$idCatWP="29237";break;
			case "argentina":$idCatWP="29062";break;
			case "mexico":$idCatWP="29642";break;
			case "andes":$idCatWP="29177";break;
			}
		break;
		case "15545": //CUIDATE DE LA CAMARA
			switch($_SESSION["feed"])
			{
			case "mexico":$idCatWP="31174";break;
			}
		break;
		case "":$idCatWP="1";break; //E! News
	}
	
	//exit("<br />idCat:".$idCatWP);

	if($idCatWP!="")
	{
		$sqlstr="select term_taxonomy_id from wp_term_taxonomy WHERE term_id=$idCatWP";
		$query=$this->executeQuery($sqlstr);
		$row=mysql_fetch_array($query);

		$vecAsoc[0]=$idCatWP;
		$vecAsoc[1]=$row[0];
		return $vecAsoc;
		
	}else{
		$sqlstr="DELETE FROM wp_terms WHERE term_id=$categoryId";
		//echo("<br>$sqlstr");
		$this->executeQuery($sqlstr);

		$sqlstr="DELETE FROM wp_term_taxonomy WHERE term_id=$categoryId";
		$this->executeQuery($sqlstr);
		//echo("<br>$sqlstr");

		return false; //new category!
	}

 }

 public function convertSAGEDate($SAGEdate)
 {
        $vecDate=explode("T",$SAGEdate);
        $vecTime=explode("-", $vecDate[1]);
        return $vecDate[0]." ".$vecTime[0];
 }
 
 public function wasModified($table, $nameID, $fieldName, $id, $lastMod)
 {
        $sqlstr="select ".$fieldName." from $table WHERE ".$fieldName."='".$this->convertSAGEDate($lastMod)."' AND $nameID=".$id;
	//if(trim($id)=="588767")exit($sqlstr);
	//$this->saveLog("debuggingWasmodif",$sqlstr);
        $query=$this->executeQuery($sqlstr);
        return mysql_num_rows($query);
 }

 public function existsRegister($table, $nameID, $id)
 {
	$sqlstr="select $nameID from $table WHERE $nameID=$id";
	//if(trim($id)=="588767")exit($sqlstr);
	$query=$this->executeQuery($sqlstr);
	//if($id=="486360")$this->saveLog("debugging",$sqlstr." feed:".$_SESSION["feed"]." numrows:".mysql_num_rows($query)." Resource:".$query);
	return mysql_num_rows($query);
 }

 public function clearWPcache($str_debug)
 {
	//include("http://la.eonline.com/".$_SESSION["feed"]."/clearWPcache.php"); //metodo 1
	/* //metodo 2
  	$handle=opendir('../'.$_SESSION["feed"].'/wp-content/cache/');
	$i = 0;
	while (($file = readdir($handle))!==false) { 
        if($file!="."&&$file!=".."&&$file!="/"&&$file!="supercache"&&$file!="/supercache"&&$file!="meta"&&$file!="/meta")unlink("../".$_SESSION["feed"]."/wp-content/cache/".$file);
	}
	closedir($handle);
	 */
	 //metodo bash
	 //
	 /*$conn_dev=mysql_connect("localhost", "root", "");
	 mysql_select_db("clearcache");
	 switch(strtolower($_SESSION["feed"]))
	 {
	 case "argentina":$feed_status="ar";break;
	 case "andes":$feed_status="an";break;
	 case "mexico":$feed_status="mx";break;
	 case "venezuela":$feed_status="ve";break;
	 }

	 $sqlstr="UPDATE statusfeeds SET $feed_status=1";
	 //mysql_query($sqlstr);
	 mysql_close($conn_dev);
	 //$this->saveLog("debugging",$str_debug);
	  */
 }

 public function stripSlashes($str)
 {
	$str=str_replace("'","\'",$str);
	$str=str_replace("\\\\","\\",$str);
	return $str;
 }

 public function sumarHoras($SAGEdatePublish, $cantHs)
 {
 $vecDate=explode("T",$SAGEdatePublish);
 $vecD=explode("-", $vecDate[0]);
 $vecT=explode(":", $vecDate[1]);
 return ( date("Y-m-d H:i:s", mktime($vecT[0]+$cantHs, $vecT[1], substr($vecT[2],0,2), $vecD[1] , $vecD[2], $vecD[0]) ) );
 }

 public function friendlyUrl($str)
 {			
	$string = trim($str);
	$table = array(
            'Š'=>'S', 'š'=>'s', 'Đ'=>'Dj', 'đ'=>'dj', 'Ž'=>'Z', 'ž'=>'z', 'Č'=>'C', 'č'=>'c', 'Ć'=>'C', 'ć'=>'c',
            'À'=>'A', 'Á'=>'A', 'Â'=>'A', 'Ã'=>'A', 'Ä'=>'A', 'Å'=>'A', 'Æ'=>'A', 'Ç'=>'C', 'È'=>'E', 'É'=>'E',
            'Ê'=>'E', 'Ë'=>'E', 'Ì'=>'I', 'Í'=>'I', 'Î'=>'I', 'Ï'=>'I', 'Ñ'=>'N', 'Ò'=>'O', 'Ó'=>'O', 'Ô'=>'O',
            'Õ'=>'O', 'Ö'=>'O', 'Ø'=>'O', 'Ù'=>'U', 'Ú'=>'U', 'Û'=>'U', 'Ü'=>'U', 'Ý'=>'Y', 'Þ'=>'B', 'ß'=>'Ss',
            'à'=>'a', 'á'=>'a', 'â'=>'a', 'ã'=>'a', 'ä'=>'a', 'å'=>'a', 'æ'=>'a', 'ç'=>'c', 'è'=>'e', 'é'=>'e',
            'ê'=>'e', 'ë'=>'e', 'ì'=>'i', 'í'=>'i', 'î'=>'i', 'ï'=>'i', 'ð'=>'o', 'ñ'=>'n', 'ò'=>'o', 'ó'=>'o',
            'ô'=>'o', 'õ'=>'o', 'ö'=>'o', 'ø'=>'o', 'ù'=>'u', 'ú'=>'u', 'û'=>'u', 'ý'=>'y', 'ý'=>'y', 'þ'=>'b',
            'ÿ'=>'y', 'Ŕ'=>'R', 'ŕ'=>'r', '<em>'=>'', '</em>'=>'', '/' => '-', ' ' => '-'
    );

    // -- Remove duplicated spaces
    $stripped = preg_replace(array('/\s{2,}/', '/[\t\n]/'), ' ', $string);

    // -- Returns the slug
    $string=strtolower(strtr($string, $table));

    $cadena = trim($string);
    $cadena = strtr($cadena,"ABCDEFGHIJKLMNOPQRSTUVWXYZ","abcdefghijklmnopqrstuvwxyz");
    $cadena = str_replace('<i>','',$cadena);
    $cadena = str_replace('</i>','',$cadena);
    $cadena = str_replace('<b>','',$cadena);
    $cadena = str_replace('</b>','',$cadena);
    $cadena = str_replace('<u>','',$cadena);
    $cadena = str_replace('</u>','',$cadena);
    $cadena = str_replace('&eacute;','e',$cadena);
    $cadena = str_replace('&oacute;','o',$cadena);
    $cadena = str_replace('&aacute;','a',$cadena);
    $cadena = str_replace('&iacute;','i',$cadena);
    $cadena = str_replace('&uacute;','u',$cadena);
    $cadena = str_replace('&ntilde;','n',$cadena);
    $cadena = str_replace('&aacute;','a',$cadena);
    $cadena = str_replace('&eacute;','e',$cadena);
    $cadena = str_replace('&iacute;','i',$cadena);
    $cadena = str_replace('&oacute;','o',$cadena);
    $cadena = str_replace('&uacute;','a',$cadena);
    $cadena = str_replace('&atilde;','a',$cadena);
    $cadena = str_replace('&ecirc;','e',$cadena);
    $cadena = str_replace('&ccedil;','c',$cadena);
    $cadena = str_replace('&otilde;','o',$cadena);
    $cadena = str_replace('&ocirc;','o',$cadena);
    $cadena = str_replace('&agrave;','a',$cadena);
    $cadena = str_replace('&egrave;','e',$cadena);
    $cadena = str_replace('&euml;','e',$cadena);
    $cadena = str_replace('&icirc;','i',$cadena);
    $cadena = str_replace('&iuml;','i',$cadena);
    $cadena = str_replace('&oelig;','o',$cadena);
    $cadena = str_replace('&ugrave;','u',$cadena);
    $cadena = str_replace('&ucirc;','u',$cadena);
    $cadena = str_replace('&uuml;','u',$cadena);
    $cadena = str_replace('&rsquo;','s',$cadena);
    $cadena = str_replace('&acirc;','a',$cadena);
    $cadena = str_replace('&iquest;','',$cadena);
    $cadena = str_replace('&iexcl;','',$cadena);
    $cadena = preg_replace('#([^.a-z0-9]+)#i', '-', $cadena);
    $cadena = preg_replace('#-{2,}#','-',$cadena);
    $cadena = preg_replace('#-$#','',$cadena);
    $cadena = preg_replace('#^-#','',$cadena);
    $cadena = str_replace('.','',$cadena); 
	return $cadena;
 }

 public function recursiveRemove($dir) {
     $iterator = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($dir),
		                                                   RecursiveIteratorIterator::CHILD_FIRST);
      foreach ($iterator as $path) {
	      if (!$path->isDir()) {
		      unlink($path->__toString());		      
		      //$this->saveLog("lastDeletedCacheFile",$path->__toString());
		      return true;
		      break;
	      }
      }
     return false;
 }

 public function rglob($pattern='*', $path='', $flags = 0) {
     $paths=glob($path.'*', GLOB_MARK|GLOB_ONLYDIR|GLOB_NOSORT);
     $files=glob($path.$pattern, $flags);
         foreach ($paths as $path) {
	       $files=array_merge($files,$this->rglob($pattern, $path, $flags));
	 }
    return $files;
 }

 public function MigrateBlogData($xmlArray, $importType=NULL)
 {
	//if($_SESSION["feed"]=="andes")$this->saveLog("debugging",print_r($xmlArray,true));
	global $INS_POST, $EDI_POST, $INS_TAXONOMY, $INS_RELATIONSHIPS, $INS_TERMS;
	global $LOG_INS_POST, $LOG_EXI_POST;
	global $LOG_INS_POST_counter, $LOG_EXI_POST_counter;
	$vecTermTaxId=array();
	$vecTermId=array();
	$arrayMaster=array();
	if($importType=="")print_r($xmlArray); //dont show it if it comes from consumeManualWS
	$xmlArray=$this->SanitizeParameters($xmlArray);

	if($_POST["id"]!="")
	{
		$arrayMaster=$xmlArray->payload;
	}else{
		$arrayMaster=$xmlArray->payload->items;
	}
	foreach ($arrayMaster as $post) {

		/*echo("<hr /><B>MODULO</B><hr />");
		echo("<br /><br /><b>ID:</b>".$post->id);
		echo("<br /><br /><b>PublishDate:</b>".$post->publishDate);
		echo("<br /><b>lastModDate:</b>".$post->lastModDate);
		echo("<br /><br /><b>keyword:</b>".$post->keyword);*/

			//foreach ($post->author as $author)echo("<br /><br /><b>Author:</b>".htmlentities($author->name));

		/*echo("<br /><br /><b>Title:</b>".$post->title);*/

		//Text bodySegments unification
		$contentBody="";
		$counterBodys=0;

		
		if($post->displayOptions!=""){
				$Banner=str_replace("banner=","",$post->displayOptions);
				$Banner=str_replace("null", "", $Banner);
				$Banner=str_replace(";overwriteForeign=true", "", $Banner);
				$contentBody.="<span style='background-color:#950000;color:#fff;font-family:arial, tahoma, verdana;font-size:14px;font-weight:bold;padding:10px 10px 10px 20px;'>$Banner</span>";
			

		}
		//$agencyCap="";
		foreach ($post->bodySegments as $modulesText)
		{
		$agencyCap="";
			/*echo("<br /><br /><b>displayOptions:</b><br />".htmlentities($modulesText->displayOptions));*/
			$notLeftRight="";
			
			switch($modulesText->displayOptions)
			{
			case "pic:onLeft":$alignIMG="left";break;
			case "pic:onRight":$alignIMG="right";break;
			default:$notLeftRight="margin:auto;";$alignIMG="";break;
			}

			//IMAGE info ------------------------------------
			if($modulesText->imageHref!="")
			{
			$vecConcat = array();
			$imageArray=$this->ReadWsXml("http://webservices.eonline.com/".$modulesText->imageHref, $vecConcat);
			$boxContentIMG=(int)$imageArray->payload->sourceWidth+10;
			if(htmlentities(utf8_decode($imageArray->payload->agency))=="Twitter") $agencyCap="Twitter ";
			if(htmlentities(utf8_decode($imageArray->payload->agency))=="Instagram") $agencyCap="Instagram ";
			if($agencyCap=="")$agencyCap=htmlentities(utf8_decode($imageArray->payload->agency));
			//images.eonline
			$contentBody.="<div class='wp-caption align".$alignIMG."' style='width: ".$boxContentIMG."px;".$notLeftRight."'><IMG SRC='http://images.eonline.com".$imageArray->payload->filePath."/".$imageArray->payload->source."' title='".stripslashes($imageArray->payload->title)."' width='".$imageArray->payload->sourceWidth."' alt='".stripslashes($imageArray->payload->title)."'/><p class='wp-caption-text'>".$agencyCap."</p></div>";
			//$this->saveLog("debugging",$contentBody);

		        //$contentBody.="<IMG SRC='http://images.eonline.com".$imageArray->payload->filePath.$imageArray->payload->source."' title='".$imageArray->payload->title."' align='".$alignIMG."' width='".$imageArray->payload->sourceWidth."' style='padding:10px;' />";
			if($notLeftRight=="margin:auto;")$contentBody.="<br clear='all' />";
			}
			//IMAGE info ------------------------------------

			//VIDEO info ------------------------------------
			if($modulesText->videoIds!="")
			{
				//$contentBody.='<br /><br /><div style="display: block; position: relative; max-width: 100%;"><div style="padding-top: 56.25%;"><video data-video-id="'.$modulesText->videoIds.'" data-account="96980687001" data-player="553b59c3-4773-4446-8ce1-9a4199b98a2f" data-embed="default" class="video-js" controls style="width: 100%; height: 100%; position: absolute; top: 0px; bottom: 0px; right: 0px; left: 0px;"></video><script src="//players.brightcove.net/96980687001/553b59c3-4773-4446-8ce1-9a4199b98a2f_default/index.min.js"></script></div></div><br />';

				$contentBody.='<br /><br /><div style="display: block; position: relative; max-width: 100%;"><div style="padding-top: 56.25%;"><iframe src="//players.brightcove.net/96980687001/553b59c3-4773-4446-8ce1-9a4199b98a2f_default/index.html?videoId='.$modulesText->videoIds.'&muted" allowfullscreen webkitallowfullscreen mozallowfullscreen style="width: 100%; height: 100%; position: absolute; top: 0px; bottom: 0px; right: 0px; left: 0px;"></iframe></div></div><br />';
			//VIDEO info ------------------------------------
			}

			//GALLERY info ----------------------------------
			if($modulesText->galleryPreviewId!="")
			{			$contentBody.="<br /><br />[scrollGallery id=$modulesText->galleryPreviewId start=5 autoScroll=false thumbsdown=true]";
			//$contentBody.="<br /><b>galleryPreviewHref:</b><br />".$modulesText->galleryPreviewHref;
			}			
			//GALLERY info ----------------------------------

			$contentBody.="<br /><br />".$modulesText->text;
			$contentBody.="<br /><br />".$modulesText->video;

			if($counterBodys==0){
				$friendlyUrl=$this->friendlyUrl($post->title);
				$contentBody.='<br /><a class="more-link" href="http://la.eonline.com/'.$_SESSION["feed"].'/'.date('Y').'/'.$friendlyUrl.'#more-'.(int)$post->id.'"><em><!--more--></em></a>'; //read more!
				
				//30112015 adrenaline para mexico
				//if($_SESSION["feed"]=="mexico") $contentBody.='[adrenaline]';

				//19042016 adrenaline para todos los sitios
				//$contentBody.='[adrenaline]';

				//12052016 adrenaline 
				if($_SESSION["feed"]=="andes") $contentBody.='[adrenaline]';
				if($_SESSION["feed"]=="argentina") $contentBody.='[adrenaline]';
				if($_SESSION["feed"]=="mexico") $contentBody.='[adrenaline]';
				if($_SESSION["feed"]=="venezuela") $contentBody.='[adrenaline]';

			}
			$counterBodys++;
		}
			$contentBody.='<br clear="all"/>';

	$friendlyUrl=$this->friendlyUrl($post->title);	
	$contentTitle=$this->stripSlashes($post->title);
	$contentBody=$this->stripSlashes($contentBody);
	$friendlyUrl=str_replace("\\\\","\\",$friendlyUrl);
	$contentBody=str_replace("\\\\","\\",$contentBody);

	//Posts migration -------------------------------------------------------
	$post->publishDate=$this->sumarHoras($post->publishDate, 4);
	$exists=$this->existsRegister(POSTS_TABLE, POST_ID_NAME, (int)$post->id);
	if(trim($post->id)=="588767")
	{
		//exit("existe:".$exists. "conn:$conn stats:".mysql_stat($conn)); //LAST DEBUF MYSQL GONE!??
	}

	if($exists==0)
	{
		$fechahora=date('Y-m-d H:i:s');
		$sqlstr=$INS_POST." VALUES (".(int)$post->id.", '".$contentTitle."', '".$contentBody."', 'publish', 1, '".$post->publishDate."', '".$post->publishDate."', 'open', 'closed', '".$friendlyUrl."', 'post', '".$fechahora."');";
		$this->executeQuery($sqlstr);
		//echo("<br>$sqlstr");
		//$this->saveLog("debugging",$sqlstr);	
		//Excluding addthis pluging from this post
		$sqlstr="INSERT INTO wp_postmeta (post_id, meta_key, meta_value) VALUES (".(int)$post->id.", 'addthis_exclude', 'true')";
		$this->executeQuery($sqlstr);
		 
	        //Inserting advertisers to this post
		//$sqlstr="INSERT INTO wp_postmeta (post_id, meta_key, meta_value) VALUES (".(int)$post->id.",'anunciante','".$post->summary."')";
		//$this->executeQuery($sqlstr);		

		//$lastIdPost=mysql_insert_id();
		$lastIdPost=$post->id;//fixed!
		$LOG_INS_POST.=(int)$post->id." ";
		$LOG_INS_POST_counter++;
		$this->clearWPcache($sqlstr);
		$wasModified=0;
	}else{

		//Delete specific post cache-------------------------------------------------------------------------------------------
		$patternFile="../".$_SESSION["feed"]."/wp-content/cache2016/supercache/la.eonline.com/".$_SESSION["feed"].'/*/'.$friendlyUrl;
		$res=$this->rglob($patternFile,null,null);
		if(strlen($friendlyUrl)>5):
			foreach ($res as $path):
				$flagFound=$this->recursiveRemove($path);
				if($flagFound==true)break;
			endforeach;
		endif;
		
		//Delete specific post cache--------------------------------------------------------------------------------------------
		
		$wasModified=$this->wasModified( "wp_posts", "ID", "post_modified_SAGE", (int)$post->id, $post->lastModDate);
		//exit("MODIFIED: $wasModified lastModDate: $lastModDate");
		 //  $wasModified=0;
                if($wasModified==0)
                {
		$contentTitle=utf8_decode($contentTitle);
		$contentBody=utf8_decode($contentBody);
		$sqlstr=$EDI_POST." post_title='".$contentTitle."', post_content='".$contentBody."', post_date='".$post->publishDate."', post_name='".$friendlyUrl."', post_status='publish', post_modified_SAGE='".$this->convertSAGEDate($post->lastModDate)."' where ID=".$post->id;
		//exit($sqlstr);

		$this->clearWPcache($sqlstr);
		$contentTitle=utf8_decode($contentTitle);
		$lastIdPost=(int)$post->id;	
		$this->executeQuery($sqlstr);
		$LOG_EXI_POST.=(int)$post->id." ";
		$LOG_EXI_POST_counter++;

		//Deleting relationships.
		$i=0;
		$ii=0;
		$sqlstr="SELECT term_taxonomy_id FROM wp_term_relationships where object_id=".(int)$post->id;
		$consulta=$this->executeQuery($sqlstr);

			while($row=mysql_fetch_array($consulta))
			{
			$tmpCount++;
			$vecTermTaxId[$i++]=$row[0];	
			$sqlstr="SELECT term_id FROM wp_term_taxonomy where term_taxonomy_id=".$row[0];
			$consulta02=$this->executeQuery($sqlstr);
			//echo("<br />".$sqlstr);
				while($row02=mysql_fetch_array($consulta02))
				{
				$tmpCount2++;
				$vecTermId[$ii++]=$row02[0];
				//if($tmpCount2==150)exit("salio en 150! (2)");	
				}
		//if($tmpCount==150)exit("salio en 150! (1)");
			}
		switch($_SESSION["feed"])
                {
                case "venezuela":$term_id_LatinBill="3792";$term_id_EFashion="3711";break;
                case "argentina":$term_id_LatinBill="3944";$term_id_EFashion="3832";break;
                case "mexico":$term_id_LatinBill="3885";$term_id_EFashion="3815";break;
                case "andes":$term_id_LatinBill="3787";$term_id_EFashion="3712";break;
                }

		/*
ROLLBACK FIX!! DONT DELETE! Maybe other relation there were previously

foreach($vecTermId as $term_id)if($term_id!=1&&$term_id!=2&&$term_id!=3&&$term_id!=4&&$term_id!=5&&$term_id!=6&&$term_id!=7&&$term_id!=8&&$term_id!=9&&$term_id!=trim($term_id_LatinBill)&&$term_id!=trim($term_id_EFashion)&&$term_id!=35)
{
//echo("<br > latinB: $term_id_LatinBill EFash:  $term_id_EFashion TERMID: $term_id");
$this->executeQuery("DELETE FROM wp_terms WHERE term_id=$term_id");
}

		foreach($vecTermTaxId as $term_taxonomy_id)
		{
$this->executeQuery("DELETE FROM wp_term_taxonomy WHERE term_taxonomy_id=$term_taxonomy_id AND term_id NOT IN(1,2,3,4,5,6,7,8,9,$term_id_LatinBill,$term_id_EFashion,35)");
		}*/
		$sqlstr="DELETE FROM wp_term_relationships WHERE object_id=".$post->id;
		$this->executeQuery($sqlstr);

		}//wasModified

	}	
		//$this->saveLog("debugging",$LOG_INS_POST);
		if($wasModified==0)
                {
		
		if(!$post->categories)$post->categories[0]="3";

		//CATEGORIES RELATIONS ------------------
		foreach ($post->categories as $category)
		{	
			//Category asociation between sage&wp	
			$vecAsoc=$this->existCategory($category->id);

			if($vecAsoc==false)
			{
			//If exists the term, then delete it

/*ROLLBACK FIX!! DONT DELETE! Maybe other relation there were previously

			$friendlyTag=$this->friendlyUrl($category->key);
			$sqlstr="SELECT * FROM wp_terms WHERE name='".$category->key."' AND slug='".$friendlyTag."'";
			$consulta=$this->executeQuery($sqlstr);
			$row=mysql_fetch_array($consulta);
			$existe=mysql_num_row($consulta);
		
			if($existe==1&&$row["term_id"]!=1&&$row["term_id"]!=2&&$row["term_id"]!=3&&$row["term_id"]!=4&&$row["term_id"]!=5&&$row["term_id"]!=6&&$row["term_id"]!=7&&$row["term_id"]!=8&&$row["term_id"]!=9&&$row["term_id"]!=3944&&$row["term_id"]!=3832&&$row["term_id"]!=35)$this->executeQuery("DELETE FROM wp_terms WHERE term_id=".$row["term_id"]);	
*/

			//CATEGORY
			$friendlySlug=$this->friendlyUrl($category->key);
			//$sqlstr=$INS_TERMS." (".$category->id.", '".$category->key."','".$friendlySlug."');";
			$sqlstr=$INS_TERMS." ('".$category->key."', '".$friendlySlug."');";
			$this->executeQuery($sqlstr);
			$lastIdTerms=mysql_insert_id();
			//$lastIdTerms=$category->id;
			//echo("<br />1a:$sqlstr");
			if($lastIdTerms==0||$lastIdTerms=="")
			{
				$sqlstr="SELECT term_id FROM wp_terms WHERE slug='".$friendlySlug."'";
				//echo($sqlstr);
				$consulta03=$this->executeQuery($sqlstr);
				$row03=mysql_fetch_array($consulta03);
				$lastIdTerms=$row03[0];
			}	

			if($lastIdTerms!=$post->id)
			{
			$sqlstr=$INS_TAXONOMY." (".$lastIdTerms.", 'category');";
			//echo("<br>1b:".$sqlstr);
			$this->executeQuery($sqlstr);
			$lastIdTermTax=mysql_insert_id();

			if($lastIdTermTax==0||$lastIdTermTax)
			{
			$sqlstr="SELECT term_taxonomy_id FROM wp_term_taxonomy WHERE term_id=$lastIdTerms AND taxonomy='category'";
			$consulta03=$this->executeQuery($sqlstr);
			$row03=mysql_fetch_array($consulta03);
			$lastIdTermTax=$row03[0];
			}

			$sqlstr=$INS_RELATIONSHIPS." (".$lastIdPost.", ".$lastIdTermTax.");";
			//echo("<br>1c:$sqlstr");
			$this->executeQuery($sqlstr);
			}

			}else{

			$sqlstr=$INS_RELATIONSHIPS." (".$post->id.", ".$vecAsoc[1].");";
			//echo("<br>2:$sqlstr");
			$this->executeQuery($sqlstr);
				
			}
			//echo("<br>$sqlstr");
		}		
			
		//TAGS RELATIONS ---------------------
		$pos = strpos($post->keyword, ",");

		if ($pos !== false) { //more than one tag

			$vecTags=explode(",", $post->keyword);

			foreach($vecTags as $tag)
			{
			//$friendlyTag=$this->friendlyUrl($tag)."_".rand(1,5000000);
			$friendlyTag=$this->friendlyUrl($tag);
			$tag=utf8_decode(trim($tag));

			if($tag!="")
			{
			$sqlstr=$INS_TERMS." ('".$tag."','".$friendlyTag."');";
			$this->executeQuery($sqlstr);
			$lastIdTerms=mysql_insert_id();
				if($lastIdTerms==0||$lastIdTerms=="")
				{
				$sqlstr="SELECT term_id FROM wp_terms WHERE slug ='".$friendlyTag."'";
				$consulta03=$this->executeQuery($sqlstr);
				$row03=mysql_fetch_array($consulta03);
				$lastIdTerms=$row03[0];
				}
				if($lastIdTerms!=$post->id)
				{
					$sqlstr=$INS_TAXONOMY." (".$lastIdTerms.", 'post_tag');";
					$this->executeQuery($sqlstr);
					$lastIdTermTax=mysql_insert_id();

					if($lastIdTermTax==0)
					{
					$sqlstr="SELECT term_taxonomy_id FROM wp_term_taxonomy WHERE term_id=$lastIdTerms AND taxonomy='post_tag'";
					$consulta03=$this->executeQuery($sqlstr);
						if($consulta03)
						{
						$row03=mysql_fetch_array($consulta03);
						$lastIdTermTax=$row03[0];
						}else{$lastIdTermTax="0";}
					}

					$sqlstr=$INS_RELATIONSHIPS." (".$lastIdPost.", ".$lastIdTermTax.");";
					$this->executeQuery($sqlstr);
				}
			 } //end if tag not empty
			}

		}else{  //only one tag
			$friendlySlug=$this->friendlyUrl($post->keyword);
			
			if($post->keyword!="")
			{
			$sqlstr=$INS_TERMS." ('".$post->keyword."','".$friendlySlug."');";
			//echo("<br>$sqlstr");
			$this->executeQuery($sqlstr);
			$lastIdTerms=mysql_insert_id();

				if($lastIdTerms==0)
				{
				$sqlstr="SELECT term_id FROM wp_terms WHERE name='".trim($tag)."' AND slug='".$friendlySlug."'";
				$consulta03=$this->executeQuery($sqlstr);
				$row03=mysql_fetch_array($consulta03);
				$lastIdTerms=$row03[0];
				}

				if($lastIdTerms!=$post->id)
				{
					$sqlstr=$INS_TAXONOMY." (".$lastIdTerms.", 'post_tag');";
					$this->executeQuery($sqlstr);
					$lastIdTermTax=mysql_insert_id();

					if($lastIdTermTax==0)
					{
					$sqlstr="SELECT term_taxonomy_id FROM wp_term_taxonomy WHERE term_id=$lastIdTerms AND taxonomy='post_tag'";
					$consulta03=$this->executeQuery($sqlstr);
					$row03=mysql_fetch_array($consulta03);
					$lastIdTermTax=$row03[0];
					}

					$sqlstr=$INS_RELATIONSHIPS." (".$lastIdPost.", ".$lastIdTermTax.");";
					$this->executeQuery($sqlstr);
				}
			}//end if $post->keyword is not empty
		}

	}

	}//wasModified

	$_SESSION["report"]="<br>($LOG_INS_POST_counter) ".$LOG_INS_POST."\n\n"."<br><br>($LOG_EXI_POST_counter) ".$LOG_EXI_POST."\n\n";

	if($LOG_INS_POST_counter>0 || $LOG_EXI_POST_counter>0)
	$this->saveLog("lastLogPosts.txt", "($LOG_INS_POST_counter)".$LOG_INS_POST."\n\n"."($LOG_EXI_POST_counter)".$LOG_EXI_POST."\n\n");
	return $sqlstr;
 }


 public function MigrateGalleriesData($xmlArray, $importType=NULL)
 {
	//echo("<span style='color:darkblue;'>Gallery Migration (".rand(1,1000).")</span>");
	//print_r($xmlArray);
	/*exit();*/
	global $INS_ALBU, $INS_PICT, $INS_GALL, $EDI_GALL, $INS_PICT_REPEATED;
	global $LOG_INS_GALL, $LOG_EXI_GALL, $LOG_INS_IMA, $LOG_EXI_IMA, $LOG_INS_ALB, $LOG_EDI_ALB;
	global $LOG_INS_GALL_counter, $LOG_EXI_GALL_counter, $LOG_INS_IMA_counter, $LOG_EXI_IMA_counter, $LOG_INS_ALB_counter, $LOG_EDI_ALB_counter;

	if($importType=="")print_r($xmlArray);  //dont show it if it comes from consumeManualWS
	
	$albumArray = array();

	$xmlArray=$this->SanitizeParameters($xmlArray);

	if($_POST["id"]!="")
	{
		$arrayMaster=$xmlArray->payload;
	}else{
		$arrayMaster=$xmlArray->payload->items;

	}

	foreach ($arrayMaster as $gallery) 
	{
		/*
		foreach ($gallery->createBy as $author)echo("<br /><br /><b>Author:</b>".htmlentities($author->name));
		echo("<br /><br /><b>ID:</b>".$gallery->id);
		echo("<br /><br /><b>PublishDate:</b>".$gallery->publishDate);
		echo("<br /><b>lastModDate:</b>".$gallery->lastModDate);
		echo("<br /><br /><b>Title:</b>".$gallery->title);
		echo("<br /><br /><b>Agency:</b>".$gallery->imageAPI->agency);
		echo("<br /><br /><b>Agency Caption:</b>".$gallery->imageAPI->agencyCaption);
		echo("<br /><br /><b>Title:</b>".$gallery->imageAPI->title);
		echo("<br /><br /><b>Status:</b>".$gallery->imageAPI->status);
		echo("<br /><br /><b>Source:</b>".$gallery->imageAPI->source);
		echo("<br /><br /><b>href:</b>".$gallery->imageAPI->href);
		echo("<br /><br /><b>FilePath:</b>".$gallery->imageAPI->filePath);
		echo("<br /><br /><b>sourceWidth:</b>".$gallery->imageAPI->sourceWidth);
		echo("<br /><br /><b>sourceHeight:</b>".$gallery->imageAPI->sourceHeight);
		*/
				
		//Galleries migration -------------------------------
		//echo("galleryId:".$gallery->id);
		if($gallery->id==7538)
		{
		    $this->executeQuery("DELETE FROM wp_ngg_pictures WHERE galleryid=7538");
		    $this->executeQuery("DELETE FROM wp_ngg_gallery WHERE gid=7538");
		    $this->executeQuery("DELETE FROM pictures_galleries WHERE gid=7538");
		    echo("Es E! FashionBlogger");
		}

		$exists=$this->existsRegister(GALLERY_TABLE, GALLERY_ID_NAME, $gallery->id);

	    $titleGallery=mysql_real_escape_string($gallery->title);
		$friendlyUrl=$this->friendlyUrl($titleGallery);
		
		$titleGallery=str_replace("\\\\","\\",$titleGallery);
		$friendlyUrl=str_replace("\\\\","\\",$friendlyUrl);
		$fechahora2=date('Y-m-d H:i:s');

		if($exists==0)
		{	
			$sqlstr=$INS_GALL." (".$gallery->id.", '".$titleGallery."', '', '".$friendlyUrl."', '".$titleGallery."', NULL, 0, 0, 1, '".$fechahora2."');";
			//echo "ACA llega!!!: ".$sqlstr;
			//$this->saveLog("testINS_GALL",$sqlstr);
			$this->executeQuery($sqlstr);
			$LOG_INS_GALL.=$gallery->id." ";
			$LOG_INS_GALL_counter++;
			$wasModified=0;
		}else{
			$wasModified=$this->wasModified("wp_ngg_gallery", "gid", "gallery_modified_SAGE", (int)$gallery->id, $gallery->lastModDate);

            if($wasModified==0)
            {
			$sqlstr=$EDI_GALL." name='".$titleGallery."', path='".$friendlyUrl."', title='".$titleGallery."', gallery_modified_SAGE='".$gallery->lastModDate."' WHERE gid=$gallery->id";
			$this->executeQuery($sqlstr);
			$LOG_EXI_GALL.=$gallery->id." ";
			$LOG_EXI_GALL_counter++;
			}
		}


		//Galleries migration ----------------------------
		
		if($wasModified==0)
        {

		//Images migration -------------------------------
		$num_order=1;			
$cont_del=1;
		foreach ($gallery->galleryItemIds as $galleryItem)
		{	
			$exists=$this->existsRegister(PICTURES_TABLE, PICTURES_ID_NAME, $galleryItem->galleryItem->image->id);
			if($exists=="0")
			{
	    		$titlePicture=str_replace("'","\'",$galleryItem->galleryItem->title);
			$captionIMG=strip_tags(html_entity_decode(str_replace("'","\'",$galleryItem->galleryItem->caption)));
			//images.eonline
				$sqlstr=$INS_PICT.' ('.$galleryItem->galleryItem->image->id.', 0, '.$gallery->id.', "http://images.eonline.com'.$galleryItem->galleryItem->image->filePath."/".$galleryItem->galleryItem->image->source.'","'.$titlePicture.'","'.htmlentities($captionIMG).'", '.$num_order.');';
				$this->executeQuery($sqlstr);
				$LOG_INS_IMA.=$galleryItem->galleryItem->image->id." ";
				$LOG_INS_IMA_counter++;
			}else{
				
                
                //relationship with new table
				$sqlExist='SELECT pid FROM wp_ngg_pictures WHERE pid='.$galleryItem->galleryItem->image->id.' AND galleryid='.$gallery->id;
				//echo("<br>".$sqlExist);
				$cons=$this->executeQuery($sqlExist);
				if(!mysql_fetch_array($cons))
				{
					//$this->executeQuery('DELETE FROM '.PICTURES_GALLERIES_TABLE.' WHERE pid='.$galleryItem->galleryItem->image->id.' and gid='.$gallery->id);
					
					if($cont_del==1){
					// ELIMINA LAS IMAGENES RELACIONADAS
					$sqlstr_pict_gall_deb='DELETE FROM '.PICTURES_GALLERIES_TABLE.' WHERE gid='.$gallery->id;
					//echo("debug:".$sqlstr_pict_gall_deb);
					$this->executeQuery($sqlstr_pict_gall_deb);
					}

					$sqlRepe=$INS_PICT_REPEATED.' ('.$galleryItem->galleryItem->image->id.','.$gallery->id.', '.$num_order.')';
					//echo("<br>debug insert:".$sqlRepe);
					$this->executeQuery($sqlRepe);
					$cont_del++;
				}else{
                    $titlePicture=str_replace("'","\'",$galleryItem->galleryItem->title);
	    			//$captionIMG=strip_tags(html_entity_decode(str_replace("'","\'",$galleryItem->galleryItem->caption)));
                    //Es necesario actualizar el registro de IMG? 
                    $sqlNecesarioUpdate='UPDATE  `wp_ngg_pictures` SET  
                    `neworder` =  '.$num_order.', `description` =  "'.$titlePicture.'"
                    WHERE  pid='.$galleryItem->galleryItem->image->id.' AND galleryid='.$gallery->id.' AND (neworder<>'.$num_order.' OR description<>"'.$titlePicture.'") LIMIT 1;';
                   //echo("<br><br>".$sqlNecesarioUpdate);
                   $this->executeQuery($sqlNecesarioUpdate);

                }
				//relationship with new table
				$LOG_EXI_IMA.=$galleryItem->galleryItem->image->id." ";
				$LOG_EXI_IMA_counter++;
			}
            $num_order++;

		}
		
		//Images migration -------------------------------

		//Albums/categories migration -------------------------------

		foreach ($gallery->categories as $category)
		{

		$album_id=(int)$category->id;

			$galleryIdElement = array();

			//if exists album then push gallery_id into array SORTORDER field then delete repeated values from array AND then INSERT!
			$exists=$this->existsRegister(ALBUM_TABLE, ALBUM_ID_NAME, $album_id);
			$fechahora=date('Y-m-d H:i:s');
			if($exists==0)
			{
				//insert only one element in SORTORDER
				array_push($galleryIdElement, (int)$gallery->id);
			    	$titleAlbum=mysql_real_escape_string($category->name);
				$titleAlbum=$this->stripSlashes($titleAlbum);
				$titleAlbum=str_replace("\\\\","\\",$titleAlbum);

			   	$sqlstr=$INS_ALBU." (".$album_id.", '".$titleAlbum."', '', 0, '".$titleAlbum."', '".serialize($galleryIdElement)."',0,'".$fechahora."');";
				$this->executeQuery($sqlstr);
				$LOG_INS_ALB.=$album_id." ";
				$LOG_INS_ALB_counter++;		
			}else{
				//INSERT NEW ELEMENT, if it's repeated then depure array & INSERT!
				$sqlstr="SELECT sortorder FROM wp_ngg_album where id=$album_id";
				$consulta=$this->executeQuery($sqlstr);
				$row=mysql_fetch_array($consulta);
				
				$galleryIdElementRow=unserialize($row[0]);
				array_push($galleryIdElementRow, (int)$gallery->id);
				
				//Delete repeated elements
				$galleryIdElement = array_unique($galleryIdElementRow);
				$sqlstr="UPDATE wp_ngg_album SET sortorder='".serialize($galleryIdElement)."', fechahora='".$fechahora."' WHERE id=$album_id";
				$this->executeQuery($sqlstr);
				$LOG_EDI_ALB.=$album_id." ";
				$LOG_EDI_ALB_counter++;			
			}
		}

		//Albums/categories migration -------------------------------		
		
		} //wasModified
	}
$_SESSION["report"]="<br>($LOG_INS_GALL_counter)".$LOG_INS_GALL."\n\n"."<br><br>($LOG_EXI_GALL_counter)".$LOG_EXI_GALL."\n\n"."<br><br>($LOG_INS_IMA_counter)".$LOG_INS_IMA."\n\n"."<br><br>($LOG_EXI_IMA_counter)".$LOG_EXI_IMA."\n\n"."<br><br>($LOG_INS_ALB_counter)".$LOG_INS_ALB."\n\n"."<br><br>($LOG_EDI_ALB_counter)".$LOG_EDI_ALB."\n\n";

	$this->saveLog("lastLogGalleries.txt", "($LOG_INS_GALL_counter)".$LOG_INS_GALL."\n\n"."($LOG_EXI_GALL_counter)".$LOG_EXI_GALL."\n\n"."($LOG_INS_IMA_counter)".$LOG_INS_IMA."\n\n"."($LOG_EXI_IMA_counter)".$LOG_EXI_IMA."\n\n"."($LOG_INS_ALB_counter)".$LOG_INS_ALB."\n\n"."($LOG_EDI_ALB_counter)".$LOG_EDI_ALB."\n\n");
	return $sqlstr;
 }

}
?>

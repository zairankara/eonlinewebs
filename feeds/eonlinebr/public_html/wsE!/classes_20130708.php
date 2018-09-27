<?
//error_reporting(E_ALL); 
//ini_set("display_errors", 1);
include("vars.inc");

class Connection
{

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
	//exit($UrlXml);
	
	$rndNum=rand(1,100000000);
	$ch = curl_init($UrlXml);
	$tmpFile="xmls_tmp/temp_".$rndNum.".xml";
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
			exit(ERR_WR." ".$nameFile);
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
		//$this->saveLog(mysql_errno() . ": " . mysql_error()."\n\n".ERR_BQ.$sqlstr);
		//exit(ERR_BQ.$sqlstr);
	}else{

		return $query;
	}
 }

 public function existCategory($categoryId)
 {
	$vecAsoc=array();

	switch(trim($categoryId))
	{
	case "330":$idCatWP="3";break; //E! News
        case "12971":$idCatWP="4";break; //Estrenos
        case "12972":$idCatWP="5";break; //Zona E!
        case "12973":$idCatWP="6";break; //Alfombra Roja
        case "13280":$idCatWP="6";break; //Alfombra Roja
        case "12975":$idCatWP="12";break; //Golden Globe Awards
        case "502":$idCatWP="13";break; //Sag Awards
        case "12976":$idCatWP="14";break; //Grammy Awards
        case "12977":$idCatWP="15";break; //Oscar Awards
        case "12978":$idCatWP="3606";break;//Latin Billboard
        case "12979":$idCatWP="16";break; //Emmy Awards
        case "12974":$idCatWP="3413";break;//E! Fashion Blogger   
		case "14501":$idCatWP="27272";break; //Imperdible
		case "14562":$idCatWP="29064";break; //Foto del día
		case "14711":$idCatWP="33856";break; //Carnaval
		case "14730":$idCatWP="2505";break; //Os Kardashian
		case "14710":$idCatWP="36317";break; //The Trend
		case "":$idCatWP="3";break; //E! News
		default:$idCatWP="";break;
	}

	if($idCatWP!="")
	{
		$sqlstr="select term_taxonomy_id from wp_term_taxonomy WHERE term_id=$idCatWP";
		$query=$this->executeQuery($sqlstr);
		$row=mysql_fetch_array($query);

		$vecAsoc[0]=$idCatWP;
		$vecAsoc[1]=$row[0];
		return $vecAsoc;
		
	}else{
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
        //exit($sqlstr);
        $query=$this->executeQuery($sqlstr);
        return mysql_num_rows($query);
 }

 public function existsRegister($table, $nameID, $id)
 {
	$sqlstr="select $nameID from $table WHERE $nameID=$id";
	//echo($sqlstr);
	$query=$this->executeQuery($sqlstr);
	return mysql_num_rows($query);
 }

 public function clearWPcache()
 {
  	$handle=opendir('../wp-content/cache/');
	$i = 0;
	while (($file = readdir($handle))!==false) {
        if($file!="."&&$file!=".."&&$file!="/")unlink("../wp-content/cache/".$file);
	}
	closedir($handle);
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
	$cadena = trim($str);
	$cadena = strtr($cadena,"ABCDEFGHIJKLMNOPQRSTUVWXYZ","abcdefghijklmnopqrstuvwxyz");
	$cadena = str_replace('<i>','',$cadena);
	$cadena = str_replace('</i>','',$cadena);
	$cadena = str_replace('<b>','',$cadena);
        $cadena = str_replace('</b>','',$cadena);
	$cadena = str_replace('<u>','',$cadena);
        $cadena = str_replace('</u>','',$cadena);
	$cadena = preg_replace('#([^.a-z0-9]+)#i', '-', $cadena);
        $cadena = preg_replace('#-{2,}#','-',$cadena);
        $cadena = preg_replace('#-$#','',$cadena);
        $cadena = preg_replace('#^-#','',$cadena);
	$cadena = str_replace('-aacute-','a',$cadena);
        $cadena = str_replace('-eacute-','e',$cadena);
        $cadena = str_replace('-iacute-','i',$cadena);
        $cadena = str_replace('-oacute-','o',$cadena);
        $cadena = str_replace('-uacute-','a',$cadena);
        $cadena = str_replace('-ntilde','n',$cadena);
	$cadena = str_replace('-aacute','a',$cadena);
        $cadena = str_replace('-eacute','e',$cadena);
        $cadena = str_replace('-iacute','i',$cadena);
        $cadena = str_replace('-oacute','o',$cadena);
        $cadena = str_replace('-uacute','a',$cadena);
        $cadena = str_replace('-ntilde','n',$cadena);
	$cadena = str_replace('iquest-','',$cadena);
	$cadena = str_replace('.','',$cadena);	
	$cadena = str_replace('iexcl-','',$cadena);

	return $cadena;
 }

 public function MigrateBlogData($xmlArray, $importType=NULL)
 {
	//print_r($xmlArray);
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
			$contentBody.="<span style='background-color:#950000;color:#fff;font-family:arial, ahoma, verdana;font-size:14px;font-weight:bold;padding:10px 10px 10px 20px;'>$Banner</span>";

		}

		foreach ($post->bodySegments as $modulesText)
		{
			/*echo("<br /><br /><b>displayOptions:</b><br />".htmlentities($modulesText->displayOptions));*/
			$notLeftRight="";
			
			switch($modulesText->displayOptions)
			{
			case "pic:onLeft":$alignIMG="left";break;
			case "pic:onRight":$alignIMG="right";break;
			default:$alignIMG="";$notLeftRight="margin:auto;";break;
			}

			//IMAGE info ------------------------------------
			if($modulesText->imageHref!="")
			{
			$vecConcat = array();
			$imageArray=$this->ReadWsXml("http://webservices.eonline.com/".$modulesText->imageHref, $vecConcat);
			$boxContentIMG=(int)$imageArray->payload->sourceWidth+10;
                        $contentBody.="<div class='wp-caption align".$alignIMG."' style='width: ".$boxContentIMG."px;".$notLeftRight."'><IMG SRC='http://images.eonline.com".$imageArray->payload->filePath."/".$imageArray->payload->source."' title='".stripslashes($imageArray->payload->title)."' alt='".stripslashes($imageArray->payload->title)."' width='".$imageArray->payload->sourceWidth."' /><p class='wp-caption-text'>".htmlentities(utf8_decode($imageArray->payload->agency))."</p></div>";
		        //$contentBody.="<IMG SRC='http://images.eonline.com".$imageArray->payload->filePath.$imageArray->payload->source."' title='".$imageArray->payload->title."' align='".$alignIMG."' width='".$imageArray->payload->sourceWidth."' style='padding:10px;' />";
			if($notLeftRight=="margin:auto;")$contentBody.="<br clear='all' />";
			}
			//IMAGE info ------------------------------------

			//VIDEO info ------------------------------------
			if($modulesText->videoIds!="")
			{
			$contentBody.='<br /><br /><!-- Start of Brightcove Player -->
<div style="display:none"></div>
<script language="JavaScript" type="text/javascript" src="http://admin.brightcove.com/js/BrightcoveExperiences.js"></script>
<object id="myExperience'.$modulesText->videoIds.'" class="BrightcoveExperience">
  <param name="bgcolor" value="#FFFFFF" />
  <param name="width" value="570" />
  <param name="height" value="370" />
  <param name="playerID" value="773795205001" />
  <param name="playerKey" value="AQ~~,AAAAFpR_2Jk~,FZYC7qwaTWPZRpAgEIVYABg4ulQxTkb-" />
  <param name="isVid" value="true" />
  <param name="isUI" value="true" />
  <param name="dynamicStreaming" value="true" />
  <param name="@videoPlayer" value="'.$modulesText->videoIds.'" />
  <param name="wmode" value="opaque" />
</object>

<script type="text/javascript">brightcove.createExperiences();</script>

<!-- End of Brightcove Player --><br />';
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
			$contentBody.='<br /><a class="more-link" href="http://br.eonline.com/'.date('Y').'/'.$friendlyUrl.'#more-'.(int)$post->id.'"><em><!--more--></em></a>'; //read more!
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
	if($exists==0)
	{
		$sqlstr=$INS_POST." VALUES (".(int)$post->id.", '".$contentTitle."', '".$contentBody."', 'publish', 3, '".$post->publishDate."', '".$post->publishDate."', 'open', 'closed', '".$friendlyUrl."', 'post', '".$this->convertSAGEDate($post->lastModDate)."');";
		$this->executeQuery($sqlstr);
		//echo("<br>$sqlstr");
		//Excluding addthis pluging from this post
		$sqlstr="INSERT INTO wp_postmeta (post_id, meta_key, meta_value) VALUES (".(int)$post->id.", 'addthis_exclude', 'true')";
		$this->executeQuery($sqlstr);
		//$lastIdPost=mysql_insert_id();
		$lastIdPost=$post->id;
		$LOG_INS_POST.=(int)$post->id." ";
		$LOG_INS_POST_counter++;
		$this->clearWPcache();
		$wasModified=0;
	}else{
		$wasModified=$this->wasModified( "wp_posts", "ID", "post_modified_SAGE", (int)$post->id, $post->lastModDate);
		//exit("MODIFIED: $wasModified");
                if($wasModified==0)
                {
		$this->clearWPcache();
		$contentTitle=utf8_decode($contentTitle);
		$contentBody=utf8_decode($contentBody);
		$sqlstr=$EDI_POST." post_title='".$contentTitle."', post_content='".$contentBody."', post_date='".$post->publishDate."', post_name='".$friendlyUrl."', post_status='publish', post_modified_SAGE='".$this->convertSAGEDate($post->lastModDate)."' where ID=".$post->id;
		//echo($sqlstr);
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
			}
		}

		$term_id_EFashion="3413";

		/* ROLLBACK FIX!! DONT DELETE! Maybe other relation there were previously
		foreach($vecTermId as $term_id)if($term_id!=1&&$term_id!=2&&$term_id!=3&&$term_id!=4&&$term_id!=5&&$term_id!=6&&$term_id!=7&&$term_id!=8&&$term_id!=9&&$term_id!=3606&&$term_id!=3413&&$term_id!=35&&$term_id!=12&&$term_id!=13&&$term_id!=14&&$term_id!=15&&$term_id!=16)
{
$this->executeQuery("DELETE FROM wp_terms WHERE term_id=$term_id");
}*/

		/*foreach($vecTermTaxId as $term_taxonomy_id)
		{
$this->executeQuery("DELETE FROM wp_term_taxonomy WHERE term_taxonomy_id=$term_taxonomy_id AND term_id NOT IN(1,2,3,4,5,6,7,8,9,12,13,14,15,16,3606,3413,35)");
		}*/
		$sqlstr="DELETE FROM wp_term_relationships WHERE object_id=".$post->id;
		$this->executeQuery($sqlstr);

		}//wasModified

	}	
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
			//If exists the term, then delete it, ROLLBACK FIX!! DONT DELETE! Maybe other relation there were previously
			/*$friendlyTag=$this->friendlyUrl($category->key);
			$sqlstr="SELECT * FROM wp_terms WHERE name='".$category->key."' AND slug='".$friendlyTag."'";
			$consulta=$this->executeQuery($sqlstr);
			$row=mysql_fetch_array($consulta);
			$existe=mysql_num_rows($consulta);
		
			if($existe==1&&$row["term_id"]!=1&&$row["term_id"]!=2&&$row["term_id"]!=3&&$row["term_id"]!=4&&$row["term_id"]!=5&&$row["term_id"]!=6&&$row["term_id"]!=7&&$row["term_id"]!=8&&$row["term_id"]!=9&&$row["term_id"]!=12&&$row["term_id"]!=13&&$row["term_id"]!=35&&$row["term_id"]!=14&&$row["term_id"]!=15&&$row["term_id"]!=16&&$row["term_id"]!=3606&&$row["term_id"]!=3413)$this->executeQuery("DELETE FROM wp_terms WHERE term_id=".$row["term_id"]);	
			*/

			//CATEGORY
			$friendlySlug=$this->friendlyUrl($category->key);
			$sqlstr=$INS_TERMS." ('".$category->key."','".$friendlySlug."');";
			$this->executeQuery($sqlstr);
			$lastIdTerms=mysql_insert_id();
			//echo("<br /><b>$sqlstr</b> last id: $lastIdTerms");
			
			if($lastIdTerms==0||$lastIdTerms=="")
			{
			$sqlstr="SELECT term_id FROM wp_terms WHERE slug='".$friendlySlug."'";
			//echo("<br>$sqlstr");
			$consulta03=$this->executeQuery($sqlstr);
			$row03=mysql_fetch_array($consulta03);
			$lastIdTerms=$row03[0];
			}

			if($lastIdTerms!=$post->id)
			{
			$sqlstr=$INS_TAXONOMY." (".$lastIdTerms.", 'category');";
			$this->executeQuery($sqlstr);
			$lastIdTermTax=mysql_insert_id();
			//echo("<br /><b>$sqlstr</b> last id: $lastIdTermTax");
			
			if($lastIdTermTax==0)
			{
			$sqlstr="SELECT term_taxonomy_id FROM wp_term_taxonomy WHERE term_id=$lastIdTerms AND taxonomy='post_tag'";
			$consulta03=$this->executeQuery($sqlstr);
			$row03=mysql_fetch_array($consulta03);
			$lastIdTermTax=$row03[0];
			}		
			$sqlstr=$INS_RELATIONSHIPS." (".$lastIdPost.", ".$lastIdTermTax.");";
			//echo("<br>".$sqlstr);
			$this->executeQuery($sqlstr);
			}	

			}else{

			$sqlstr=$INS_RELATIONSHIPS." (".$post->id.", ".$vecAsoc[1].");";
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

			//$tag=str_replace("?","",$tag);

			$sqlstr=$INS_TERMS." ('".$tag."','".$friendlyTag."');";
			//echo("<br>$sqlstr");
			//$this->saveLog("tagsCount.txt", $sqlstr);
			$this->executeQuery($sqlstr);
			$lastIdTerms=mysql_insert_id();
			//$this->saveLog("tagsCount.txt", "inserted ID:".$lastIdTerms);
				if($lastIdTerms==0 || $lastIdTerms=="")
				{
				$sqlstr="SELECT term_id FROM wp_terms WHERE slug='".$friendlyTag."'";
				//$sqlstr="SELECT term_id FROM wp_terms WHERE name like '%".$tag."%' AND slug like '%".$friendlyTag."%'";
				$consulta03=$this->executeQuery($sqlstr);
				$row03=mysql_fetch_array($consulta03);
				$lastIdTerms=$row03[0];
		                //$this->saveLog("tagsCount.txt", "inserted ID:".$lastIdTerms);
				//NO TRAE EL POST TAG, ARRIBA NO LO INSERTA 
				}

				if($lastIdTerms!=$post->id)
				{
					$sqlstr=$INS_TAXONOMY." (".$lastIdTerms.", 'post_tag');";
					//$this->saveLog("tagsCount.txt", $sqlstr." tag:".$tag);
				//	echo("<br>$sqlstr");

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
					//echo("<br>$sqlstr");
					$this->executeQuery($sqlstr);
				}
			}

		}else{  //only one tag
			$friendlySlug=$this->friendlyUrl($post->keyword);
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
		}

	}

	}//wasModified

	$_SESSION["report"]="($LOG_INS_POST_counter)".$LOG_INS_POST."\n\n"."($LOG_EXI_POST_counter)".$LOG_EXI_POST."\n\n";

	if($LOG_INS_POST_counter>0 || $LOG_EXI_POST_counter>0)
	$this->saveLog("lastLogPosts.txt", "($LOG_INS_POST_counter)".$LOG_INS_POST."\n\n"."($LOG_EXI_POST_counter)".$LOG_EXI_POST."\n\n");
	return $sqlstr;
 }


 public function MigrateGalleriesData($xmlArray, $importType=NULL)
 {
	global $INS_ALBU, $INS_PICT, $INS_GALL, $EDI_GALL;
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

		switch($gallery->id)
		{
			case "13635":$gallery->id="14";break;
		}

		if($gallery->id==7541)
		{
		    $this->executeQuery("DELETE FROM wp_ngg_pictures WHERE galleryid=7538");
		    $this->executeQuery("DELETE FROM wp_ngg_gallery WHERE gid=7538");
		}

		$exists=$this->existsRegister(GALLERY_TABLE, GALLERY_ID_NAME, $gallery->id);

	    	$titleGallery=mysql_real_escape_string($gallery->title);
		$friendlyUrl=$this->friendlyUrl($titleGallery);
		
		$titleGallery=str_replace("\\\\","\\",$titleGallery);
		$friendlyUrl=str_replace("\\\\","\\",$friendlyUrl);

		if($exists==0)
		{	
			$sqlstr=$INS_GALL." (".$gallery->id.", '".$titleGallery."', '', '".$friendlyUrl."', '".$titleGallery."', NULL, 0, 0, 1);";
			$this->executeQuery($sqlstr);
			$LOG_INS_GALL.=$gallery->id." ";
			$LOG_INS_GALL_counter++;
			$wasModified=0;
		}else{
			$wasModified=$this->wasModified("wp_ngg_gallery", "gid", "gallery_modified_SAGE", (int)$gallery->id, $gallery->lastModDate);

                        if($wasModified==0)
                        {
			$sqlstr=$EDI_GALL." name='".$titleGallery."', path='".$friendlyUrl."', title='".$titleGallery."' WHERE gid=$gallery->id";
			$this->executeQuery($sqlstr);
			$LOG_EXI_GALL.=$gallery->id." ";
			$LOG_EXI_GALL_counter++;
			}
		}

		//Galleries migration ----------------------------

		if($wasModified==0)
                {

		//Images migration -------------------------------

		foreach ($gallery->galleryItemIds as $galleryItem)
		{	
			$exists=$this->existsRegister(PICTURES_TABLE, PICTURES_ID_NAME, $galleryItem->galleryItem->image->id);
			if($exists=="0")
			{
	    			$titlePicture=str_replace("'","\'",$galleryItem->galleryItem->title);
	    			$captionIMG=str_replace("'","\'",$galleryItem->galleryItem->caption);

				$sqlstr=$INS_PICT.' ('.$galleryItem->galleryItem->image->id.', 0, '.$gallery->id.', "http://images.eonline.com'.$galleryItem->galleryItem->image->filePath."/".$galleryItem->galleryItem->image->source.'","'.$titlePicture.'","'.htmlentities($captionIMG).'");';
				$this->executeQuery($sqlstr);
				$LOG_INS_IMA.=$galleryItem->galleryItem->image->id." ";
				$LOG_INS_IMA_counter++;
			}else{
				$LOG_EXI_IMA.=$galleryItem->galleryItem->image->id." ";
				$LOG_EXI_IMA_counter++;
			}

		}
		
		//Images migration -------------------------------

		//Albums/categories migration -------------------------------

		foreach ($gallery->categories as $category)
		{

		$album_id=(int)$category->id;

			$galleryIdElement = array();

			//if exists album then push gallery_id into array SORTORDER field then delete repeated values from array AND then INSERT!
			$exists=$this->existsRegister(ALBUM_TABLE, ALBUM_ID_NAME, $album_id);
			if($exists==0)
			{
				//insert only one element in SORTORDER
				array_push($galleryIdElement, (int)$gallery->id);
			    	$titleAlbum=mysql_real_escape_string($category->name);
				$titleAlbum=$this->stripSlashes($titleAlbum);
				$titleAlbum=str_replace("\\\\","\\",$titleAlbum);

			   	$sqlstr=$INS_ALBU." (".$album_id.", '".$titleAlbum."', '', 0, '".$titleAlbum."', '".serialize($galleryIdElement)."',0);";
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
				$sqlstr="UPDATE wp_ngg_album SET sortorder='".serialize($galleryIdElement)."' WHERE id=$album_id";
				$this->executeQuery($sqlstr);
				$LOG_EDI_ALB.=$album_id." ";
				$LOG_EDI_ALB_counter++;			
			}
		}

		//Albums/categories migration -------------------------------		
		
		} //wasModified
	}
$_SESSION["report"]="($LOG_INS_GALL_counter)".$LOG_INS_GALL."\n\n"."($LOG_EXI_GALL_counter)".$LOG_EXI_GALL."\n\n"."($LOG_INS_IMA_counter)".$LOG_INS_IMA."\n\n"."($LOG_EXI_IMA_counter)".$LOG_EXI_IMA."\n\n"."($LOG_INS_ALB_counter)".$LOG_INS_ALB."\n\n"."($LOG_EDI_ALB_counter)".$LOG_EDI_ALB."\n\n";

	$this->saveLog("lastLogGalleries.txt", "($LOG_INS_GALL_counter)".$LOG_INS_GALL."\n\n"."($LOG_EXI_GALL_counter)".$LOG_EXI_GALL."\n\n"."($LOG_INS_IMA_counter)".$LOG_INS_IMA."\n\n"."($LOG_EXI_IMA_counter)".$LOG_EXI_IMA."\n\n"."($LOG_INS_ALB_counter)".$LOG_INS_ALB."\n\n"."($LOG_EDI_ALB_counter)".$LOG_EDI_ALB."\n\n");
	return $sqlstr;
 }

}
?>

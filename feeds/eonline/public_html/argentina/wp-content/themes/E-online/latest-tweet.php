<?php

 function changeLink($string, $tags=false, $nofollow, $target){
  if($tags){
   $string = strip_tags($string);
  } else {
   if($target){
    $string = str_replace("<a", "<a target=\"_blank\"", $string);
   }
   if($nofollow){
    $string = str_replace("<a", "<a rel=\"nofollow\"", $string);
   }
  }
  return $string;
 }

 function getLatestTweet($xml, $tags=false, $nofollow=true, $target=true){

  $xmlDoc = new DOMDocument();
  $xmlDoc->load($xml);

  $x = $xmlDoc->getElementsByTagName("entry"); // get all entries

  $tweets = array();
  foreach($x as $item){
   $tweet = array();

   if($item->childNodes->length)
   {
    foreach($item->childNodes as $i){
     $tweet[$i->nodeName] = $i->nodeValue;
    }
   }
    $tweets[] = $tweet;
  }

  // if using bullets start UL here
   echo "<ul>\n";

  foreach($tweets as $tweettag){
   /********************** Getting Times (Hours/Minutes/Days) */
   $tweetdate = $tweettag["published"];
   $tweet = $tweettag["content"];
   $timedate = explode("T",$tweetdate);
   $date = $timedate[0];
   $time = substr($timedate[1],0, -1);
   $tweettime = (strtotime($date." ".$time))+3600; // This is the value of the time difference - UK + 1 hours (3600 seconds)
   $nowtime = time();
   $timeago = ($nowtime-$tweettime);
   $thehours = floor($timeago/3600);
   $theminutes = floor($timeago/60);
   $thedays = floor($timeago/86400);
   /********************* Checking the times and returning correct value */
   if($theminutes < 60){
    if($theminutes < 1){
     $timemessage =  "Less than 1 minute ago";
    } else if($theminutes == 1) {
     $timemessage = $theminutes." minute ago.";
     } else {
     $timemessage = $theminutes." minutes ago.";
     }
    } else if($theminutes > 60 && $thedays < 1){
     if($thehours == 1){
     $timemessage = $thehours." hour ago.";
     } else {
     $timemessage = $thehours." hours ago.";
     }
    } else {
     if($thedays == 1){
     $timemessage = $thedays." day ago.";
     } else {
     $timemessage = $thedays." days ago.";
     }
    }
    echo "<li>".changeLink($tweet, $tags, $nofollow, $target)."<br />\n";
    echo "<span>".$timemessage."</span></li>\n";
   }

    echo "</ul>\n";
   // if using bullets end UL here
 }

 // Usage (XML FEED, STRIP_TAGS (DEFAULT NO), NOFOLLOW (DEFAULT YES), TARGETBLANK (DEFAULT YES))
 $tweetxml = "http://search.twitter.com/search.atom?q=from:" . $twitterid . "&rpp=" . $numberoftweets . "";

 ?>

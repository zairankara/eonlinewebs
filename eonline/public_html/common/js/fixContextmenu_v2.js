(function() {
  //console.log("ejecuto js v2");
  /*document.getElementsByTagName("video").addEventListener('contextmenu',function(e){
  	e.preventDefault();
  });*/
  /*body = document.getElementsByTagName("body")[0];
 body.setAttribute("oncontextmenu", "return true;");*/

video = document.getElementsByTagName("video");
 video.setAttribute("oncontextmenu", "return false;");

}());
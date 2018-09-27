/*!
* Image Multi Upload
* http://codecanyon.net/
*
* Copyright 2010, QuanticaLabs
* You need to buy a license if you want use this script.
* http://codecanyon.net/item/image-multi-upload/119999?ref=quanticalabs
* http://codecanyon.net/wiki/buying/howto-buying/licensing/
*
* Includes jQuery JavaScript Library v1.4.2
* http://jquery.com/
*
* Copyright 2010, John Resig
* Dual licensed under the MIT or GPL Version 2 licenses.
* http://jquery.org/license
*
* Includes Uploadify v2.1.0
* Release Date: August 24, 2009
* Copyright (c) 2009 Ronnie Garcia, Travis Nickels
* Under the MIT licence
* 
* Includes Sizzle.js
* http://sizzlejs.com/
* Copyright 2010, The Dojo Foundation
* Released under the MIT, BSD, and GPL Licenses.
*
*/ 
jQuery&&function(b){b.extend(b.fn,{uploadify:function(j){b(this).each(function(){settings=b.extend({id:b(this).attr("id"),uploader:"uploadify.swf",script:"uploadify.php",expressInstall:null,folder:"",height:30,width:110,cancelImg:"cancel.png",wmode:"opaque",scriptAccess:"sameDomain",fileDataName:"Filedata",method:"POST",queueSizeLimit:999,simUploadLimit:1,queueID:false,displayData:"percentage",onInit:function(){},onSelect:function(){},onQueueFull:function(){},onCheck:function(){},onCancel:function(){},
onError:function(){},onProgress:function(){},onComplete:function(){},onAllComplete:function(){}},j);var m=location.pathname,m=m.split("/");m.pop();var m=m.join("/")+"/",c={};c.uploadifyID=settings.id;c.pagepath=m;if(settings.buttonImg)c.buttonImg=escape(settings.buttonImg);if(settings.buttonText)c.buttonText=escape(settings.buttonText);if(settings.rollover)c.rollover=true;c.script=settings.script;c.folder=escape(settings.folder);if(settings.scriptData){var o="",f;for(f in settings.scriptData)o+="&"+
f+"="+settings.scriptData[f];c.scriptData=escape(o.substr(1))}c.width=settings.width;c.height=settings.height;c.wmode=settings.wmode;c.method=settings.method;c.queueSizeLimit=settings.queueSizeLimit;c.simUploadLimit=settings.simUploadLimit;if(settings.hideButton)c.hideButton=true;if(settings.fileDesc)c.fileDesc=settings.fileDesc;if(settings.fileExt)c.fileExt=settings.fileExt;if(settings.multi)c.multi=true;if(settings.auto)c.auto=true;if(settings.sizeLimit)c.sizeLimit=settings.sizeLimit;if(settings.checkScript)c.checkScript=
settings.checkScript;if(settings.fileDataName)c.fileDataName=settings.fileDataName;if(settings.queueID)c.queueID=settings.queueID;settings.onInit()!==false&&(b(this).css("display","none"),b(this).after('<div id="'+b(this).attr("id")+'Uploader"></div>'),swfobject.embedSWF(settings.uploader,settings.id+"Uploader",settings.width,settings.height,"9.0.24",settings.expressInstall,c,{quality:"high",wmode:settings.wmode,allowScriptAccess:settings.scriptAccess}),settings.queueID==false&&b("#"+b(this).attr("id")+
"Uploader").after('<div id="'+b(this).attr("id")+'Queue" class="uploadifyQueue"></div>'));typeof settings.onOpen=="function"&&b(this).bind("uploadifyOpen",settings.onOpen);b(this).bind("uploadifySelect",{action:settings.onSelect,queueID:settings.queueID},function(a,d,l){if(a.data.action(a,d,l)!==false){var h=Math.round(l.size/1024*100)*0.01,f="KB";h>1E3&&(h=Math.round(h*0.1)*0.01,f="MB");h=h.toString().split(".");h=h.length>1?h[0]+"."+h[1].substr(0,2):h[0];fileName=l.name.length>20?l.name.substr(0,
20)+"...":l.name;queue="#"+b(this).attr("id")+"Queue";a.data.queueID&&(queue="#"+a.data.queueID);b(queue).append('<div id="'+b(this).attr("id")+d+'" class="uploadifyQueueItem"><div class="cancel"><a href="javascript:jQuery(\'#'+b(this).attr("id")+"').uploadifyCancel('"+d+'\')"><img src="'+settings.cancelImg+'" border="0" /></a></div><span class="fileName">'+fileName+" ("+h+f+')</span><span class="percentage"></span><div class="uploadifyProgress"><div id="'+b(this).attr("id")+d+'ProgressBar" class="uploadifyProgressBar"><\!--Progress Bar--\></div></div></div>')}});
typeof settings.onSelectOnce=="function"&&b(this).bind("uploadifySelectOnce",settings.onSelectOnce);b(this).bind("uploadifyQueueFull",{action:settings.onQueueFull},function(a,b){a.data.action(a,b)!==false&&alert("The queue is full.  The max size is "+b+".")});b(this).bind("uploadifyCheckExist",{action:settings.onCheck},function(a,d,l,h,f){var c={},c=l;c.folder=m+h;if(f)for(var j in l)var o=j;b.post(d,c,function(c){for(var j in c)a.data.action(a,d,l,h,f)!==false&&(confirm("Do you want to replace the file "+
c[j]+"?")||document.getElementById(b(a.target).attr("id")+"Uploader").cancelFileUpload(j,true,true));f?document.getElementById(b(a.target).attr("id")+"Uploader").startFileUpload(o,true):document.getElementById(b(a.target).attr("id")+"Uploader").startFileUpload(null,true)},"json")});b(this).bind("uploadifyCancel",{action:settings.onCancel},function(a,d,f,h,c){a.data.action(a,d,f,h,c)!==false&&b("#"+b(this).attr("id")+d).fadeOut(c==true?0:250,function(){b(this).remove()})});typeof settings.onClearQueue==
"function"&&b(this).bind("uploadifyClearQueue",settings.onClearQueue);var a=[];b(this).bind("uploadifyError",{action:settings.onError},function(f,d,c,h){f.data.action(f,d,c,h)!==false&&(a.push([d,c,h]),b("#"+b(this).attr("id")+d+" .percentage").text(" - "+h.type+" Error"),b("#"+b(this).attr("id")+d).addClass("uploadifyError"))});b(this).bind("uploadifyProgress",{action:settings.onProgress,toDisplay:settings.displayData},function(a,d,f,c){a.data.action(a,d,f,c)!==false&&(b("#"+b(this).attr("id")+d+
"ProgressBar").css("width",c.percentage+"%"),a.data.toDisplay=="percentage"&&(displayData=" - "+c.percentage+"%"),a.data.toDisplay=="speed"&&(displayData=" - "+c.speed+"KB/s"),a.data.toDisplay==null&&(displayData=" "),b("#"+b(this).attr("id")+d+" .percentage").text(displayData))});b(this).bind("uploadifyComplete",{action:settings.onComplete},function(a,d,c,f,j){a.data.action(a,d,c,unescape(f),j)!==false&&(b("#"+b(this).attr("id")+d+" .percentage").text(" - Completed"),b("#"+b(this).attr("id")+d).fadeOut(250,
function(){b(this).remove()}))});typeof settings.onAllComplete=="function"&&b(this).bind("uploadifyAllComplete",{action:settings.onAllComplete},function(b,d){b.data.action(b,d)!==false&&(a=[])})})},uploadifySettings:function(j,m,c){var o=false;b(this).each(function(){if(j=="scriptData"&&m!=null){var a=c?m:b.extend(settings.scriptData,m),d="",f;for(f in a)d+="&"+f+"="+escape(a[f]);m=d.substr(1)}o=document.getElementById(b(this).attr("id")+"Uploader").updateSettings(j,m)});if(m==null){if(j=="scriptData"){for(var f=
unescape(o).split("&"),a={},r=0;r<f.length;r++){var d=f[r].split("=");a[d[0]]=d[1]}o=a}return o}},uploadifyUpload:function(j){b(this).each(function(){document.getElementById(b(this).attr("id")+"Uploader").startFileUpload(j,false)})},uploadifyCancel:function(j){b(this).each(function(){document.getElementById(b(this).attr("id")+"Uploader").cancelFileUpload(j,true,false)})},uploadifyClearQueue:function(){b(this).each(function(){document.getElementById(b(this).attr("id")+"Uploader").clearFileUploadQueue(false)})}})}(jQuery);
var swfobject=function(){function b(){if(!A){try{var a=g.getElementsByTagName("body")[0].appendChild(g.createElement("span"));a.parentNode.removeChild(a)}catch(b){return}A=true;for(var a=H.length,k=0;k<a;k++)H[k]()}}function j(a){A?a():H[H.length]=a}function m(a){if(typeof e.addEventListener!=n)e.addEventListener("load",a,false);else if(typeof g.addEventListener!=n)g.addEventListener("load",a,false);else if(typeof e.attachEvent!=n)G(e,"onload",a);else if(typeof e.onload=="function"){var b=e.onload;
e.onload=function(){b();a()}}else e.onload=a}function c(){var a=g.getElementsByTagName("body")[0],b=g.createElement(t);b.setAttribute("type",u);var k=a.appendChild(b);if(k){var N=0;(function(){if(typeof k.GetVariable!=n){var g=k.GetVariable("$version");if(g)g=g.split(" ")[1].split(","),i.pv=[parseInt(g[0],10),parseInt(g[1],10),parseInt(g[2],10)]}else if(N<10){N++;setTimeout(arguments.callee,10);return}a.removeChild(b);k=null;o()})()}else o()}function o(){var b=z.length;if(b>0)for(var B=0;B<b;B++){var k=
z[B].id,g=z[B].callbackFn,c={success:false,id:k};if(i.pv[0]>0){var e=p(k);if(e)if(y(z[B].swfVersion)&&!(i.wk&&i.wk<312)){if(v(k,true),g)c.success=true,c.ref=f(k),g(c)}else if(z[B].expressInstall&&a()){c={};c.data=z[B].expressInstall;c.width=e.getAttribute("width")||"0";c.height=e.getAttribute("height")||"0";if(e.getAttribute("class"))c.styleclass=e.getAttribute("class");if(e.getAttribute("align"))c.align=e.getAttribute("align");for(var O={},e=e.getElementsByTagName("param"),u=e.length,h=0;h<u;h++)e[h].getAttribute("name").toLowerCase()!=
"movie"&&(O[e[h].getAttribute("name")]=e[h].getAttribute("value"));r(c,O,k,g)}else d(e),g&&g(c)}else if(v(k,true),g){if((k=f(k))&&typeof k.SetVariable!=n)c.success=true,c.ref=k;g(c)}}}function f(a){var b=null;if((a=p(a))&&a.nodeName=="OBJECT")typeof a.SetVariable!=n?b=a:(a=a.getElementsByTagName(t)[0])&&(b=a);return b}function a(){return!I&&y("6.0.65")&&(i.win||i.mac)&&!(i.wk&&i.wk<312)}function r(a,b,k,c){I=true;L=c||null;P={success:false,id:k};var d=p(k);if(d){d.nodeName=="OBJECT"?(F=l(d),J=null):
(F=d,J=k);a.id=q;if(typeof a.width==n||!/%$/.test(a.width)&&parseInt(a.width,10)<310)a.width="310";if(typeof a.height==n||!/%$/.test(a.height)&&parseInt(a.height,10)<137)a.height="137";g.title=g.title.slice(0,47)+" - Flash Player Installation";c=i.ie&&i.win?"ActiveX":"PlugIn";c="MMredirectURL="+e.location.toString().replace(/&/g,"%26")+"&MMplayerType="+c+"&MMdoctitle="+g.title;typeof b.flashvars!=n?b.flashvars+="&"+c:b.flashvars=c;if(i.ie&&i.win&&d.readyState!=4)c=g.createElement("div"),k+="SWFObjectNew",
c.setAttribute("id",k),d.parentNode.insertBefore(c,d),d.style.display="none",function(){d.readyState==4?d.parentNode.removeChild(d):setTimeout(arguments.callee,10)}();h(a,b,k)}}function d(a){if(i.ie&&i.win&&a.readyState!=4){var b=g.createElement("div");a.parentNode.insertBefore(b,a);b.parentNode.replaceChild(l(a),b);a.style.display="none";(function(){a.readyState==4?a.parentNode.removeChild(a):setTimeout(arguments.callee,10)})()}else a.parentNode.replaceChild(l(a),a)}function l(a){var b=g.createElement("div");
if(i.win&&i.ie)b.innerHTML=a.innerHTML;else if(a=a.getElementsByTagName(t)[0])if(a=a.childNodes)for(var k=a.length,c=0;c<k;c++)!(a[c].nodeType==1&&a[c].nodeName=="PARAM")&&a[c].nodeType!=8&&b.appendChild(a[c].cloneNode(true));return b}function h(a,b,k){var c,d=p(k);if(i.wk&&i.wk<312)return c;if(d){if(typeof a.id==n)a.id=k;if(i.ie&&i.win){var e="",f;for(f in a)if(a[f]!=Object.prototype[f])f.toLowerCase()=="data"?b.movie=a[f]:f.toLowerCase()=="styleclass"?e+=' class="'+a[f]+'"':f.toLowerCase()!="classid"&&
(e+=" "+f+'="'+a[f]+'"');f="";for(var h in b)b[h]!=Object.prototype[h]&&(f+='<param name="'+h+'" value="'+b[h]+'" />');d.outerHTML='<object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000"'+e+">"+f+"</object>";K[K.length]=a.id;c=p(a.id)}else{h=g.createElement(t);h.setAttribute("type",u);for(var q in a)a[q]!=Object.prototype[q]&&(q.toLowerCase()=="styleclass"?h.setAttribute("class",a[q]):q.toLowerCase()!="classid"&&h.setAttribute(q,a[q]));for(e in b)b[e]!=Object.prototype[e]&&e.toLowerCase()!=
"movie"&&(a=h,f=e,q=b[e],k=g.createElement("param"),k.setAttribute("name",f),k.setAttribute("value",q),a.appendChild(k));d.parentNode.replaceChild(h,d);c=h}}return c}function D(a){var b=p(a);if(b&&b.nodeName=="OBJECT")i.ie&&i.win?(b.style.display="none",function(){if(b.readyState==4){var c=p(a);if(c){for(var g in c)typeof c[g]=="function"&&(c[g]=null);c.parentNode.removeChild(c)}}else setTimeout(arguments.callee,10)}()):b.parentNode.removeChild(b)}function p(a){var b=null;try{b=g.getElementById(a)}catch(c){}return b}
function G(a,b,c){a.attachEvent(b,c);C[C.length]=[a,b,c]}function y(a){var b=i.pv,a=a.split(".");a[0]=parseInt(a[0],10);a[1]=parseInt(a[1],10)||0;a[2]=parseInt(a[2],10)||0;return b[0]>a[0]||b[0]==a[0]&&b[1]>a[1]||b[0]==a[0]&&b[1]==a[1]&&b[2]>=a[2]?true:false}function E(a,b,c,e){if(!i.ie||!i.mac){var d=g.getElementsByTagName("head")[0];if(d){c=c&&typeof c=="string"?c:"screen";e&&(M=w=null);if(!w||M!=c)e=g.createElement("style"),e.setAttribute("type","text/css"),e.setAttribute("media",c),w=d.appendChild(e),
i.ie&&i.win&&typeof g.styleSheets!=n&&g.styleSheets.length>0&&(w=g.styleSheets[g.styleSheets.length-1]),M=c;i.ie&&i.win?w&&typeof w.addRule==t&&w.addRule(a,b):w&&typeof g.createTextNode!=n&&w.appendChild(g.createTextNode(a+" {"+b+"}"))}}}function v(a,b){if(Q){var c=b?"visible":"hidden";A&&p(a)?p(a).style.visibility=c:E("#"+a,"visibility:"+c)}}function x(a){return/[\\\"<>\.;]/.exec(a)!=null&&typeof encodeURIComponent!=n?encodeURIComponent(a):a}var n="undefined",t="object",u="application/x-shockwave-flash",
q="SWFObjectExprInst",e=window,g=document,s=navigator,R=false,H=[function(){R?c():o()}],z=[],K=[],C=[],F,J,L,P,A=false,I=false,w,M,Q=true,i=function(){var a=typeof g.getElementById!=n&&typeof g.getElementsByTagName!=n&&typeof g.createElement!=n,b=s.userAgent.toLowerCase(),c=s.platform.toLowerCase(),d=c?/win/.test(c):/win/.test(b),c=c?/mac/.test(c):/mac/.test(b),b=/webkit/.test(b)?parseFloat(b.replace(/^.*webkit\/(\d+(\.\d+)?).*$/,"$1")):false,f=!+"\u000b1",i=[0,0,0],h=null;if(typeof s.plugins!=n&&
typeof s.plugins["Shockwave Flash"]==t){if((h=s.plugins["Shockwave Flash"].description)&&!(typeof s.mimeTypes!=n&&s.mimeTypes[u]&&!s.mimeTypes[u].enabledPlugin))R=true,f=false,h=h.replace(/^.*\s+(\S+\s+\S+$)/,"$1"),i[0]=parseInt(h.replace(/^(.*)\..*$/,"$1"),10),i[1]=parseInt(h.replace(/^.*\.(.*)\s.*$/,"$1"),10),i[2]=/[a-zA-Z]/.test(h)?parseInt(h.replace(/^.*[a-zA-Z]+(.*)$/,"$1"),10):0}else if(typeof e.ActiveXObject!=n)try{var q=new ActiveXObject("ShockwaveFlash.ShockwaveFlash");if(q&&(h=q.GetVariable("$version")))f=
true,h=h.split(" ")[1].split(","),i=[parseInt(h[0],10),parseInt(h[1],10),parseInt(h[2],10)]}catch(j){}return{w3:a,pv:i,wk:b,ie:f,win:d,mac:c}}();(function(){i.w3&&((typeof g.readyState!=n&&g.readyState=="complete"||typeof g.readyState==n&&(g.getElementsByTagName("body")[0]||g.body))&&b(),A||(typeof g.addEventListener!=n&&g.addEventListener("DOMContentLoaded",b,false),i.ie&&i.win&&(g.attachEvent("onreadystatechange",function(){g.readyState=="complete"&&(g.detachEvent("onreadystatechange",arguments.callee),
b())}),e==top&&function(){if(!A){try{g.documentElement.doScroll("left")}catch(a){setTimeout(arguments.callee,0);return}b()}}()),i.wk&&function(){A||(/loaded|complete/.test(g.readyState)?b():setTimeout(arguments.callee,0))}(),m(b)))})();(function(){i.ie&&i.win&&window.attachEvent("onunload",function(){for(var a=C.length,b=0;b<a;b++)C[b][0].detachEvent(C[b][1],C[b][2]);a=K.length;for(b=0;b<a;b++)D(K[b]);for(var c in i)i[c]=null;i=null;for(var e in swfobject)swfobject[e]=null;swfobject=null})})();return{registerObject:function(a,
b,c,e){if(i.w3&&a&&b){var d={};d.id=a;d.swfVersion=b;d.expressInstall=c;d.callbackFn=e;z[z.length]=d;v(a,false)}else e&&e({success:false,id:a})},getObjectById:function(a){if(i.w3)return f(a)},embedSWF:function(b,c,e,d,g,f,q,u,l,m){var o={success:false,id:c};i.w3&&!(i.wk&&i.wk<312)&&b&&c&&e&&d&&g?(v(c,false),j(function(){e+="";d+="";var i={};if(l&&typeof l===t)for(var j in l)i[j]=l[j];i.data=b;i.width=e;i.height=d;j={};if(u&&typeof u===t)for(var p in u)j[p]=u[p];if(q&&typeof q===t)for(var s in q)typeof j.flashvars!=
n?j.flashvars+="&"+s+"="+q[s]:j.flashvars=s+"="+q[s];if(y(g))p=h(i,j,c),i.id==c&&v(c,true),o.success=true,o.ref=p;else if(f&&a()){i.data=f;r(i,j,c,m);return}else v(c,true);m&&m(o)})):m&&m(o)},switchOffAutoHideShow:function(){Q=false},ua:i,getFlashPlayerVersion:function(){return{major:i.pv[0],minor:i.pv[1],release:i.pv[2]}},hasFlashPlayerVersion:y,createSWF:function(a,b,c){if(i.w3)return h(a,b,c)},showExpressInstall:function(b,c,e,d){i.w3&&a()&&r(b,c,e,d)},removeSWF:function(a){i.w3&&D(a)},createCSS:function(a,
b,c,e){i.w3&&E(a,b,c,e)},addDomLoadEvent:j,addLoadEvent:m,getQueryParamValue:function(a){var b=g.location.search||g.location.hash;if(b){/\?/.test(b)&&(b=b.split("?")[1]);if(a==null)return x(b);for(var b=b.split("&"),c=0;c<b.length;c++)if(b[c].substring(0,b[c].indexOf("="))==a)return x(b[c].substring(b[c].indexOf("=")+1))}return""},expressInstallCallback:function(){if(I){var a=p(q);if(a&&F){a.parentNode.replaceChild(F,a);if(J&&(v(J,true),i.ie&&i.win))F.style.display="block";L&&L(P)}I=false}}}}();
jQuery(document).ready(function(b){function j(b,a){return Math.round(Math.round(b*Math.pow(10,a+1))/Math.pow(10,1))/Math.pow(10,a)}function m(c){if(typeof c.attr("data")!="undefined"){var a=c.uploadifySettings("scriptData"),j=eval("({"+c.attr("data")+"})"),d="",l;for(l in j)d+="'"+l+"':",d+=j[l].substr(0,9)=="selector:"?"'"+b(j[l].substr(9).toString()).val()+"',":"'"+j[l]+"',";d=d.substr(0,d.length-1);d=eval("({"+d+"})");c.uploadifySettings("scriptData",b.extend(a,d))}}function c(b){b.preventDefault()}
function o(f){f.preventDefault();var a=f.data.uploader;m(a);if((typeof a.attr("queueId")!="undefined"?b("#"+a.attr("queueId")):b("#"+a.attr("id")+"Queue")).children().length>0){for(var f=a.uploadifySettings("scriptData"),j=b(this).serializeArray(),d={},l=0;l<j.length;l++)d[j[l].name]=j[l].value;a.uploadifySettings("scriptData",b.extend(f,d));typeof a.attr("ajaxLoaderId")!="undefined"&&b("#"+a.attr("ajaxLoaderId")).css("display","inline");b(this).bind("submit",c);a.uploadifyUpload()}else if(typeof a.attr("ajax")!=
"undefined"&&a.attr("ajax")=="true"){var f=b(this).serializeArray(),j=b(this).attr("action"),d=b(this).attr("method"),h=b(this);typeof a.attr("ajaxLoaderId")!="undefined"&&b("#"+a.attr("ajaxLoaderId")).css("display","inline");b.ajax({url:j,data:f,type:d,async:false,success:function(c){typeof a.attr("ajaxInfoId")!="undefined"&&(b("#"+a.attr("ajaxInfoId")).html(""),b("#"+a.attr("ajaxInfoId")).html(c).css("display","block"));h[0].reset();b("[name='IMUFiles[]']").remove();typeof a.attr("queueId")!="undefined"?
b("#"+a.attr("queueId")).html(""):b("#"+a.attr("id")+"Queue").html("");typeof a.attr("ajaxLoaderId")!="undefined"&&b("#"+a.attr("ajaxLoaderId")).css("display","none");h.one("submit",{uploader:a},o)}})}else b(this).submit()}b(".IMU").each(function(f){var a=b(this);a.attr("id","IMU"+f);if(typeof a.attr("startOn")!="undefined")if(a.attr("startOn")=="manually")a.after("<input type='button' value='"+(typeof a.attr("buttonCaption")=="undefined"?"":a.attr("buttonCaption"))+"' id='IMU"+f+"start' class='uploadButton' />"),
b("#IMU"+f+"start").click(function(){m(a);a.uploadifyUpload()});else if(a.attr("startOn").substr(0,8)=="onSubmit")b("#"+a.attr("startOn").substr(9)).one("submit",{uploader:a},o);f="";if(typeof a.attr("fileExt")!="undefined")for(var r=a.attr("fileExt").split(","),d=0;d<r.length;d++)f+="*."+r[d],d+1<r.length&&(f+=";");r="";typeof a.attr("fileDesc")!="undefined"&&(r=a.attr("fileDesc"));d="";typeof a.attr("button")!="undefined"&&(d=a.attr("button"));var l=120;typeof a.attr("bwidth")!="undefined"&&(l=
a.attr("bwidth"));var h=30;typeof a.attr("bheight")!="undefined"&&(h=a.attr("bheight"));var D="SELECT FILES";typeof a.attr("buttonText")!="undefined"&&(D=a.attr("buttonText"));var p="";typeof a.attr("queueId")!="undefined"&&(p=a.attr("queueId"));var G="";typeof a.attr("maxSize")!="undefined"&&(G=a.attr("maxSize"));var y="upload.php";typeof a.attr("uploadScript")!="undefined"&&(y=a.attr("uploadScript"));var E="transparent";typeof a.attr("wmode")!="undefined"&&(E=a.attr("wmode"));var v=999;typeof a.attr("filesLimit")!=
"undefined"&&(v=a.attr("filesLimit"));var x="";typeof a.attr("sessionId")!="undefined"&&(x=a.attr("sessionId"));var n="false";typeof a.attr("ajax")!="undefined"&&(n=a.attr("ajax"));var t="post";typeof a.attr("method")!="undefined"&&(t=a.attr("method"));x="'action':'upload', 'path':'"+a.attr("path")+"', 'PHPSESSID':'"+x+"'";typeof a.attr("thumbnails")!="undefined"&&(x+=", 'thumbnails':'"+a.attr("thumbnails")+"'");typeof a.attr("thumbnailsFolders")!="undefined"&&(x+=", 'thumbnailsFolders':'"+a.attr("thumbnailsFolders")+
"'");a.uploadify({uploader:"js/upload.swf",script:y,scriptData:eval("({"+x+"})"),queueID:p,cancelImg:"close.png",displayData:a.attr("onprogress")=="speed"?"speed":"percentage",fileExt:f,fileDesc:r,method:t,buttonImg:d,buttonText:D,wmode:E,width:l,height:h,sizeLimit:G,hideButton:a.attr("hideButton")=="true"?true:false,auto:a.attr("startOn")=="auto"?true:false,multi:a.attr("multi")=="true"?true:false,queueSizeLimit:v,onSelect:function(c,d){a.attr("multi")!="true"&&b("#"+d).html()!=""&&(p!=""?b("#"+
p).html(""):b("#"+a.attr("id")+"Queue").html(""))},onSelectOnce:function(){a.attr("startOn")=="auto"&&m(a)},onComplete:function(c,d,e,g){c=b.parseJSON(g);if(typeof c.error!="undefined")return b("#"+a.attr("id")+d).html(c.error),false;else if(a.attr("startOn").substr(0,8)=="onSubmit"&&b("#"+a.attr("startOn").substr(9)).append("<input type='hidden' name='IMUFiles[]' value='"+c.filename.replace("'","%27")+"' />"),a.attr("afterUpload")=="link"||a.attr("afterUpload")=="filename"||a.attr("afterUpload")==
"image"||a.attr("afterUpload")=="none"){b("#"+a.attr("id")+d+" .uploadifyProgress").animate({opacity:0},500,function(){b(this).remove()});b("#"+a.attr("id")+d).html((a.attr("allowRemove")=="true"?"<div class='cancel'><input class='button_cancel' name='removeFile' filename='"+c.filename.replace("'","%27")+"' type='button'></div>":"")+(a.attr("afterUpload")=="link"||a.attr("afterUpload")=="image"?"<a href='"+c.path+c.filename.replace("'","%27")+"' target='_blank'>":"")+(a.attr("afterUpload")=="image"&&
(c.extension.toLowerCase()=="jpg"||c.extension.toLowerCase()=="jpeg"||c.extension.toLowerCase()=="bmp"||c.extension.toLowerCase()=="png"||c.extension.toLowerCase()=="tiff"||c.extension.toLowerCase()=="gif")?"<img class='uploadedImage' src='"+c.path+c.filename.replace("'","%27")+"' />":a.attr("afterUpload")!="none"?"<span class='fileName'>"+e.name+"</span>":"")+(a.attr("afterUpload")=="link"||a.attr("afterUpload")=="image"?"</a>":""));if(typeof a.attr("thumbnailsAfterUpload")!="undefined"){var g=a.attr("thumbnailsAfterUpload").split(","),
f=[];typeof a.attr("thumbnailsFolders")!="undefined"&&(f=a.attr("thumbnailsFolders").split(","));for(var h=0;h<g.length;h++)display=b.trim(g[h]),folder=b.trim(f[h])==""?a.attr("path"):b.trim(f[h]),display!="filename"&&display!="image"&&display!="link"?b("#"+a.attr("id")+d).append("<span class='afterUploadThumbnail'>"+display+"</span>"):b("#"+a.attr("id")+d).append("<span class='afterUploadThumbnail'>"+(display=="link"||display=="image"?"<a href='"+folder+c.thumbnails[h].replace("'","%27")+"' target='_blank'>":
"")+(display=="image"&&(c.extension.toLowerCase()=="jpg"||c.extension.toLowerCase()=="jpeg"||c.extension.toLowerCase()=="bmp"||c.extension.toLowerCase()=="png"||c.extension.toLowerCase()=="tiff"||c.extension.toLowerCase()=="gif")?"<img class='uploadedThumbnail' src='"+folder+c.thumbnails[h].replace("'","%27")+"' />":"<span class='fileName'>thumb"+h+"_"+e.name+"</span>")+(display=="link"||display=="image"?"</a>":"")+"</span>")}return false}},onAllComplete:function(d,f){if(typeof a.attr("afterUpload")!=
"undefined"&&a.attr("afterUpload")!="link"&&a.attr("afterUpload")!="filename"&&a.attr("afterUpload")!="image"&&a.attr("afterUpload")!="none"){var e=a.attr("afterUpload"),e=e.replace("IMUfilesUploaded",f.filesUploaded),e=e.replace("IMUerrors",f.errors),e=e.replace("IMUtotalSizeB",f.allBytesLoaded),e=e.replace("IMUtotalSizeKB",j(f.allBytesLoaded/1024,2)),e=e.replace("IMUtotalSizeMB",j(f.allBytesLoaded/1024/1024,2)),e=e.replace("IMUtotalSizeGB",j(f.allBytesLoaded/1024/1024/1024,2)),e=e.replace("IMUspeedB",
j(Math.round(f.speed*1024),2)),e=e.replace("IMUspeedKB",j(Math.round(f.speed),2)),e=e.replace("IMUspeedMB",j(Math.round(f.speed/1024),2)),e=e.replace("IMUspeedGB",j(Math.round(f.speed/1024/1024),2));b("#"+a.attr("id")+"Queue").html(e)}if(a.attr("startOn").substr(0,8)=="onSubmit"){var g=b("#"+a.attr("startOn").substr(9));g.unbind("submit",c);if(n=="true"){var f=g.serializeArray(),e=g.attr("action"),h=g.attr("method");typeof a.attr("ajaxLoaderId")!="undefined"&&b("#"+a.attr("ajaxLoaderId")).css("display",
"inline");b.ajax({url:e,data:f,type:h,async:false,success:function(c){typeof a.attr("ajaxInfoId")!="undefined"&&(b("#"+a.attr("ajaxInfoId")).html(""),b("#"+a.attr("ajaxInfoId")).html(c).css("display","block"));g[0].reset();b("[name='IMUFiles[]']").remove();typeof a.attr("queueId")!="undefined"?b("#"+a.attr("queueId")).html(""):b("#"+a.attr("id")+"Queue").html("");typeof a.attr("ajaxLoaderId")!="undefined"&&b("#"+a.attr("ajaxLoaderId")).css("display","none");g.one("submit",{uploader:a},o)}})}else g.submit()}},
onError:function(){}});a.attr("allowRemove")=="true"&&b("#"+(p!=""?p:a.attr("id")+"Queue")+" [name=removeFile]").live("click",function(){var c=b(this);if(typeof a.attr("removeData")!="undefined"){var d=eval("({"+a.attr("removeData")+"})"),e="",f;for(f in d)e+="'"+f+"':",e+=d[f].substr(0,9)=="selector:"?"'"+b(d[f].substr(9).toString()).val()+"',":"'"+d[f]+"',";e=e.substr(0,e.length-1);e=eval("({"+e+"})")}b.ajax({url:y,data:"action=remove&filename="+c.attr("fileName")+(typeof e!="undefined"?"&"+b.param(e):
""),type:"POST",async:false,success:function(a){a!=""?alert(a):c.parent().parent().animate({opacity:0},500,function(){b(this).remove()})}})})})});
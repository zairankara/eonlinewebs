function returnCurrentTime() {
	currentDate = new Date();
	hours = currentDate.getHours();
	minutes = currentDate.getMinutes();
	seconds = currentDate.getSeconds();
	meridian = "am";
	if(hours > 11) { meridian = "pm"; }
	if(hours > 12) { hours -= 12; }
	if(hours == 0) { hours = 12; }
	if(minutes < 10) { minutes = "0" + minutes; }
	if(seconds < 10) { seconds = "0" + seconds; }
	return hours + ":" + minutes + "." + "<span style='font-size:8pt;'>" + seconds + "</span>" + meridian + " ";
	
}
function trace(eventString) {
	eventString = eventString.toString();
	eventString = eventString.replace(/</g,"&lt;");
	eventString = eventString.replace(/>/g,"&gt;");
	eventString = eventString.replace(/"/g,"&quot;");
	document.getElementById('trace').innerHTML = returnCurrentTime() + eventString + "<br />\n" + document.getElementById('trace').innerHTML;
}
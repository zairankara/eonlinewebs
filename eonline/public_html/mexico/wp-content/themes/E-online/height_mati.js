function calcHeight() 
{ 
//find the height of the internal page 
var the_height= 
document.getElementById('the_iframe').contentWindo w. 
document.body.scrollHeight; 

//change the height of the iframe 
document.getElementById('the_iframe').height= 
the_height; 
} 

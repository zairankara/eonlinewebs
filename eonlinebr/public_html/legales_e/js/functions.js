// Archivo:  	wk_funciones.js
// Version :	1.0
// Fecha:	Junio 22 2004
// Autor:	all@wikot.com
// Funcion: 	JavaScript Document
// 		Este archivo rene un Pool de funciones Javascript tiles a la hora de hacer validaciones de formularios


// JavaScript Document
function Browser() {
	var ua, s, i;
	this.isIE    = false;
	this.isNS    = false;
	this.version = null;
	ua = navigator.userAgent;
	s = "MSIE";
	if ((i = ua.indexOf(s)) >= 0) {
		this.isIE = true;
		this.version = parseFloat(ua.substr(i + s.length));
		return;
	}
	s = "Netscape6/";
	if ((i = ua.indexOf(s)) >= 0) {
		this.isNS = true;
		this.version = parseFloat(ua.substr(i + s.length));
		return;
	}
// Exploradores con motor Gecko
	s = "Gecko";
	if ((i = ua.indexOf(s)) >= 0) {
		this.isNS = true;
		this.version = 6.1;
		return;
	}
//Opera se utiliza el mismo modelo que internet explorer (investigando)
	s = "Opera";
	if ((i = ua.indexOf(s)) == 0) {
		this.isIE = true;
		this.version = parseFloat(ua.substr(i + s.length));
		return;
	}
}
var browser = new Browser();


function tooltip(event,id){
	if (browser.isIE) {
		document.getElementById(id).attachEvent("onmouseover", toolShow);
		document.getElementById(id).attachEvent("onmouseout",   toolHide);
		document.getElementById(id).attachEvent("onmousemove",   toolFollow);
		window.event.cancelBubble = true;
		window.event.returnValue = false;
		document.getElementById(event.srcElement.getAttribute('name')).style.zIndex = 999;
	}
	if (browser.isNS) {
		document.getElementById(id).addEventListener("mouseover", toolShow, true);
		document.getElementById(id).addEventListener("mouseout",   toolHide, true);
		document.getElementById(id).addEventListener("mousemove",   toolFollow, true);
		event.preventDefault();
		document.getElementById(event.target.getAttribute('name')).style.zIndex = 999;
	}
	//document.getElementById(id).style.zIndex+1;
}


// el nombre del objeto de donde sale el tooltip debe ser el ID de lo que se quiere que sea tooltip
function toolFollow (event) {
	if (browser.isIE) {
		x = window.event.clientX
		y = window.event.clientY
		document.getElementById(window.event.srcElement.getAttribute('name')).style.left = x+10+"px";
	    document.getElementById(window.event.srcElement.getAttribute('name')).style.top = y+10+"px";
	}
	if (browser.isNS) {
		x = event.clientX + window.scrollX;
		y = event.clientY + window.scrollY;
		document.getElementById(event.target.getAttribute('name')).style.left = x+10+"px";
	    document.getElementById(event.target.getAttribute('name')).style.top = y+10+"px";
	}
	
}

function toolShow(event) { 

if (browser.isIE) {
		x = window.event.clientX
		y = window.event.clientY
		document.getElementById(window.event.srcElement.getAttribute('name')).style.left = x+10+"px";
	    document.getElementById(window.event.srcElement.getAttribute('name')).style.top = y+10+"px";
	}
	if (browser.isNS) {
		x = event.clientX + window.scrollX;
		y = event.clientY + window.scrollY;
		document.getElementById(event.target.getAttribute('name')).style.left = x+10+"px";
	    document.getElementById(event.target.getAttribute('name')).style.top = y+10+"px";
	}
		
	if (browser.isIE) {
		document.getElementById(window.event.srcElement.getAttribute('name')).style.display = 'block';
		window.event.cancelBubble = true;
		window.event.returnValue = false;
	}
	if (browser.isNS) {
		document.getElementById(event.target.getAttribute('name')).style.display = 'block';
		event.preventDefault();
	}
}

function toolHide(event) {
	
	if (browser.isIE) {
		document.getElementById(window.event.srcElement.getAttribute('name')).style.display = 'none';
		window.event.cancelBubble = true;
		window.event.returnValue = false;
	}
	if (browser.isNS) {
		document.getElementById(event.target.getAttribute('name')).style.display = 'none';
		event.preventDefault();
	}
}


function IsNumeric(sText, fName, fReq)
// Verifica que una cadena solamente contenga caracteres num?icos
//PARAM1 sText: El texto a validar
//PARAM2 fName: El nombre del campo a validar. Este par?etro se utiliza para mostrar el mensaje de error
//PARAM3 fReq: Se usa para indicar si un campo es requerido o no
//@autor: Nelio

{
	if(fReq&&sText.length==0) {
		alert("El campo " + fName + " es requerido");
		return false;
	} else {
		if(sText.search(/^[-]?[0-9]+$/)==-1){
			 alert("El campo " + fName + " sólo puede contener caracteres numéricos");
			 return false;
		}
		return true;
	}
}

function IsDecimal(sText, fName, fReq)
// Verifica que una cadena solamente contenga caracteres num?icos
//PARAM1 sText: El texto a validar
//PARAM2 fName: El nombre del campo a validar. Este par?etro se utiliza para mostrar el mensaje de error
//PARAM3 fReq: Se usa para indicar si un campo es requerido o no
//@autor: Nelio
{
	if(fReq&&sText.length==0) {
		alert("El campo " + fName + " es requerido");
		return false;
	} else {
		sText=sText.replace(/,/,'.');	
		if(sText.search(/^[-]?([1-9]{1}[0-9]{0,}((\.)[0-9]+)?|0(\.[0-9]+)?|\.[0-9]{1,})$/)==-1){
			 alert("El campo " + fName + " sólo puede contener caracteres numéricos");
			 return false;
		}
		return true;
	}
}

function isRequiredrte(FieldControl,fName){
//Verifica que un campo de tipo Rich Text Box tenga un valor distinto de ""
//FieldControl: El nombre del campo HTML
//fName: El nombre del campo a validar. Este par?etro se utiliza para mostrar el mensaje de error
//@autor: Andrea y Tonny
alert(document.frames[FieldControl].value);
	if ((document.frames[FieldControl].getValue()=='') ||  (document.frames[FieldControl].getValue()=='<P>&nbsp;</P>')){
		alert("El campo "+fName+" es requerido");
		return false;
	}else{
		return true;
	}
}

function IsAlpha(sText, fName, fReq)
// Verifica que una cadena solamente contenga caracteres alfabeticos
//PARAM1 sText: El texto a validar
//PARAM2 fName: El nombre del campo a validar. Este par?etro se utiliza para mostrar el mensaje de error
//PARAM3 fReq: Se usa para indicar si un campo es requerido o no
//@autor: Nelio
{
	if(fReq&&sText.length==0) {
		alert("El campo " + fName + " es requerido");
		return false;
	} else {
		var ValidChars = " abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ?????";
		for (i=0;i<sText.length;i++) { 
		  if (ValidChars.indexOf(sText.charAt(i)) == -1) {
			 alert("El campo " + fName + " sólo puede contener caracteres alfabéticos");
			 return false;
		  }
		}
		return true;
	}
}

function IsAlphaNumeric(sText, fName, fReq)
// Verifica que una cadena solamente contenga caracteres alfabeticos
//PARAM1 sText: El texto a validar
//PARAM2 fName: El nombre del campo a validar. Este par?etro se utiliza para mostrar el mensaje de error
//PARAM3 fReq: Se usa para indicar si un campo es requerido o no
//@autor: Nelio
{
	if(fReq&&sText.length==0) {
		alert("El campo " + fName + " es requerido");
		return false;
	} else {
		var ValidChars = " .,0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ?????";
		for (i=0;i<sText.length;i++) { 
		  if (ValidChars.indexOf(sText.charAt(i)) == -1) {
			 alert("El campo " + fName + " s?o puede contener caracteres alfanuméricos");
			 return false;
		  }
		}
		return true;
	}
}

function isMailAddress(sText, fName, fReq) 
// Verifica que una cadena sea una direcci? de correo electr?ico v?ida
//PARAM1 sText: El texto a validar
//PARAM2 fName: El nombre del campo a validar. Este par?etro se utiliza para mostrar el mensaje de error
//PARAM3 fReq: Se usa para indicar si un campo es requerido o no
//@autor: Nelio
{
	if(fReq&&sText.length==0) {
		alert("El campo " + fName + " es requerido");
	  
		return false;
	} else {
		if(sText.search(/^\w+((-\w+)|(\.\w+))*\@[A-Za-z0-9]+((\.|-)[A-Za-z0-9]+)*\.[A-Za-z0-9]+$/) == -1) {
			alert("El campo " + fName + " no contiene una dirección de correo electrónico válida");
			return false;
		}
	}
	return true;
}
//----------------- QUITAR ESPACIOS EN BLANCO ---------------------------
String.prototype.trim = function() { return this.replace(/^\s+|\s+$/, ''); };
function trim(s) 
{
	var temp="";
  	for (var i=0; i<s.length; i++)
    {
	 	if (s.substring(i,i+1) == ' ')
			var o=0;	     
		else
		  temp = temp+s.substring(i,i+1);	 
	}
  	return temp;
}

function isRequiredEditor(Field, fName) 
// Verifica que un campo (cualquiera que sea tipo Radio, Text, Select, etc) tenga algn valor distinto de ""
//PARAM1 Field: El nombre del campo del editor
//PARAM2 fName: El nombre del campo a validar. Este parametro se utiliza para mostrar el mensaje de error
//@autor: Randy y Carlos y lares vio.....
{
	var editor = FCKeditorAPI.GetInstance(Field) ;
    var texto = editor.EditorDocument.body.innerHTML.trim();
	texto = texto.replace(/<br>/g,'');
	texto = texto.replace(/<p>/g,'');
	texto = texto.replace(/<\/p>/g,'');
	texto = texto.replace(/&nbsp;/g,'');
	if (texto.trim()=='')	{
			alert("El campo " + fName + " es requerido");
			return false;
	} else return true;
}


function isRequired(FieldControl, fName) 
// Verifica que un campo (cualquiera que sea tipo Radio, Text, Select, etc) tenga algn valor distinto de ""
//PARAM1 FieldControl: El nombre del campo HTML
//PARAM2 fName: El nombre del campo a validar. Este par?etro se utiliza para mostrar el mensaje de error
//@autor: Nelio
{
	switch (FieldControl.type) {
		
		case "radio": 
						for(i=0;i<FieldControl.length;i++) {
							if(FieldControl[i].checked) return true;
						}
						alert("El campo " + fName + " es requerido");
						FieldControl.focus();
						return false;
						break;
		case "checkbox": 
						if(FieldControl.checked) return true;
						alert("El campo " + fName + " es requerido");
						FieldControl.focus();
						return false;
						break;	
		case "text":
		
		case "password":
		
		case "textarea":
		
		case "file":
						if (FieldControl.value.length==0 || !trim(FieldControl.value)) {
							alert("El campo " + fName + " es requerido");	
							FieldControl.value="";
							FieldControl.focus();
							return false;
						} 	
						break;
		case "hidden":
						if (FieldControl.value.length==0) {
							alert("El campo " + fName + " es requerido");	
							return false;
						}
						break;
		case "select-one":
		case "select-multiple":
						if (FieldControl[FieldControl.selectedIndex].value=="" || FieldControl.selectedIndex==-1) {
							FieldControl.focus();
							alert("El campo " + fName + " es requerido");	
							return false;
						}
						break;
	}
	return true;
}

function checkPassword(pass, repass, fName) {
	if(pass.length==0) {
		alert("El campo " + fName + " es requerido");
		return false;
	} else if (repass.length==0) {
		alert("Debe introducir la confirmación de la clave o contraseña"); 
		return false;
	} else if (pass!=repass) {
		alert("La clave o contraseña y la confirmación no coinciden");
		return false;
	}
	return true;
}

// Fecha:	Junio de 2004
// Funcion Desplegar. Mens
function desplegar(id,titulo,iconOff, iconOn) {
// Parametros: 	id:	 	id del element en el documento html
//				titulo:	titulo del item
//				iconOff: icono a utilizar cuando no esta desplegada la informacion pueden ser rutas de imagenes
//				iconOn:	 icono a utilizar cuando este desplegada la informacion
					
   // Busqueda del elemento
   obj=document.getElementById(id);
   // Chequea el despliegue
   visible=(obj.style.display!="none");
   text = "";
   if (visible) { 	
   	obj.style.display="none"; 	text = iconOff +" "+ titulo;      
   } else {  
   	obj.style.display="block";    text = iconOn +" "+ titulo;
   }
  // Reescribe el context del <a></a>
  document.getElementById("x" + id).innerHTML = text;
  
// Ejemplo de uso
// <tr>
//	<td><a id="x3" href="#" onClick="desplegar('3','T?ulo','<img src=\'images\\pic_ico_flech_entrar.gif\' border=\'0\'>','<img src=\'images\\pic_ico_flech_up.gif\' border=\'0\'>')"><img src="images\pic_ico_flech_entrar.gif" border="0"> T&iacute;tulo</a></td>
//	</tr>
// <tr id="3" style="display:none"> -- Importante esta sentencia --
//		<td>
//				<table>
//					<tr><td>Link 1</td></tr>
//					<tr><td>Link 2</td></tr>
//					<tr><td>Link 3</td></tr>
//				</table>
//		</td>
//	</tr>
}// function desplegar

// Fecha:	Junio de 2004
// Funcion Element. Registro

function Element(codPadre,codHijo,nombreHijo){
	this.codPadre = codPadre;
	this.codHijo = codHijo;
	this.nombreHijo = nombreHijo;
}//function Element

// Fecha:	Junio de 2004
// Funcion onLoadCombo. Selects

function onLoadCombo(cmbOrigen, cmbDestino, aInfo){
// Precondicion: 	cmbOrigen guarda alguna relacion con cmbDestino esta se tienen en el 
//					arreglo aInfo con la informacion de carga para el cmbDestino
//Parametros:		cmbOrigen - Select con la informacion de Origen al cambiar cambia la informacion del
//					cmbDestino - Select
//					aInfo:	arreglo de registrod de la forma Element definida anteriormente					

var i = 0;
var j = 0;

	cmbDestino.length = aInfo.length;
	cmbDestino.options[j] = new Option ('Seleccione.', '-1');
	cmbDestino.options[j].selected=true;
	
	//cmbDestino.options[j].selected=true;
	idToFind = cmbOrigen.options[cmbOrigen.selectedIndex].value;
	while(i<aInfo.length){
		if(idToFind==aInfo[i].codPadre){
			j++; cmbDestino.options[j] = new Option (aInfo[i].nombreHijo, aInfo[i].codHijo);
		}
	i++;
	}	
	cmbDestino.length = j+1;
	

}//function onLoadCombo

// Fecha:	Junio de 2004
// Funcion redimensionarCombo. Selects
function redimensionarCombo(cmb){
//Redimensiona los selects que se cargan de modo dinamico
//Parametros: cmb:	Select a redimensionar
	cmb.length = 1;
	cmb.options[0] = new Option ('Seleccione.', -1);
	
}//function redimensionarCombo


function confirmar_eliminar(texto){
// Envia un alert al usuario indicandole que se va a eliminar una informaci?
// PARAM1 text indica en el mensaje que es lo que se va a eliminar ejemplo: Usuario(s)
// Version :	1.0
// Fecha: 19/08/2004		
	return(confirm(texto));
}

function confirm_activate_poll(status,page){
	if(status == '1'){
		//La encuesta estaba inactiva	
		if (confirm("Al activar esta encuesta se cerrará automáticamente cualquier otra encuesta que esté activa en estos momentos. \n\r¿Está seguro que desea continuar?")){
			document.location.href=page+"&status="+status;
		}
	}else{
		//La encuesta estaba activa
		if (confirm("Al cerrar esta encuesta no podrá ser reactivada. \n\r¿Está seguro que desea continuar?")){
			document.location.href=page+"&status="+status;
		}
	}
}

function validar_password(fPassword1,fPassword2,Nombre1,Nombre2,Caracteres){
// Verifica que una cadena solamente contenga una cantidad de caracteres especifica
// PARAM1 fPassword1: El texto a validar (STRING)
// PARAM2 fPassword2: El texto a validar (STRING)
// PARAM3 Nombre1: El nombre del campo a validar. Este par?etro se utiliza para mostrar el mensaje de error (STRING)
// PARAM4 Nombre2: El nombre del campo a validar. Este par?etro se utiliza para mostrar el mensaje de error (STRING)
// PARAM5 Caracteres: Cantidad de Caracteres (STRING)
// Version :	1.0
// Fecha: 19/08/2004
// @autor: Tonny Goncalves
	if (fPassword1.length < Caracteres){
		alert("El campo "+Nombre1+" debe ser mayor o igual a "+Caracteres);
		return false;
	}
	if (fPassword1!=fPassword2){
		alert("El campo "+Nombre1+" y "+Nombre2+" deben ser iguales");
		return false;
	}
	return true;
}

function validar_fechas(date_one,date_two,mensaje){
// Verifica Entre dos Timestamps, uno inicial sea menor a uno final
// PARAM1 $date_one (TIMESTAMP)
// PARAM2 $date_two (TIMESTAMP)
// PARAM3 $mensaje  (STRING)
// Version :	1.0
// Fecha: 19/08/2004
// @autor: Tonny Goncalves       
    anoi=parseInt(date_one.substr(0,4),10);
	anof=parseInt(date_two.substr(0,4),10);
	
	mesi=parseInt(date_one.substr(4,2),10);
	mesf=parseInt(date_two.substr(4,2),10);
	
	diai=parseInt(date_one.substr(6,2),10);
	diaf=parseInt(date_two.substr(6,2),10);

	if (mesi<10){ mesi="0"+mesi; }
	if (mesf<10){ mesf="0"+mesf; }
	if (diai<10){ diai="0"+diai; }
	if (diaf<10){ diaf="0"+diaf; }
	vari=String(anoi)+String(mesi)+String(diai);
	varf=String(anof)+String(mesf)+String(diaf);
   	if (parseInt(vari)>parseInt(varf)){	 
		alert(mensaje);       
		return false;
	}else{
		return true;//true
	}	
}

function FechaValida(date,mensaje) {
// Verifica un Timestamps que sea una fecha valida ejem: 31-02-2004
// PARAM1 $date (TIMESTAMP)
// PARAM3 $mensaje  (STRING)
// Version :	1.0
// Fecha: 26/08/2004
// @autor: Tonny Goncalves - Amora
	
  var fecha=parseInt(date,10)
	
	if ((isNaN(fecha))||(date.length<6)){  
	
		alert(mensaje);
	 	return false;
	} else { 

  
	aaaa = parseInt(date.substr(0,4),10);
	mm   = parseInt(date.substr(4,2),10);
	dd   = parseInt(date.substr(6,2),10);	
	var feb = 29;
	if((parseInt(aaaa)%4)!=0) feb=28; 
		
	var meses = new Array(31,feb,31,30,31,30,31,31,30,31,30,31); 

	if(parseInt(dd) > meses[parseInt(mm)-1]){
	  
		alert(mensaje);
	 	return false;
	}else{
		return true;			
	}
	}
}//function FechaValida


function changeDate(parte,valor, destino){
// Construye el valor de la fecha en formato yyyymmddhhmmss
// Param: parte = parte de la fecha a tratar
// Param: valor = valor asignado a esa parte de la fecha
// Param destino = campo ocultop donde se almacena la fecha con el formato
// Autor : Amora 

switch(parte.toUpperCase()){
	
	case "YYYY" :    
				destino.value = valor.value + destino.value.substring(4);	
		  	break;    
		  
	case "MM" :    
		  		destino.value = destino.value.substring(0,4) + valor.value + destino.value.substring(6);		
		  	break;    

	case "DD" :    
		  		destino.value = destino.value.substring(0,6) + valor.value + destino.value.substring(8);		
			break;    
	
	case "HH" :    
				destino.value = destino.value.substring(0,8) + valor.value + destino.value.substring(10);
		  	break;    
		  
	case "MIN" :  
				destino.value = destino.value.substring(0,10) + valor.value + destino.value.substring(12);  
		  break;    

	case "SS" :    
				destino.value = destino.value.substring(0,12) + valor.value ;
		  break;    

	
}//fswitch

}//function changeDate

function disableAll(form){
	var n=document.forms[form].elements.length;
	var elem=document.forms[form].elements;
	for(i=0;i<n;i++){
		if(elem[i].type!="button" && elem[i].type!="submit" && elem[i].name!='_coment_edit')
			elem[i].disabled=true;
	}
}

function makeTime(fhora,fminutos,fhorario,fhidden){
	var hora=fhora[fhora.selectedIndex].value;
	var minutos=fminutos[fminutos.selectedIndex].value;
	var horario=fhorario[fhorario.selectedIndex].value;
	
	if(horario>0) hora=parseInt(hora)+12;
	if(hora<10) hora="0"+hora;
	if(minutos<10) minutos="0"+minutos;
	
	fhidden.value=hora+minutos+"00";
	return true;
}

function makeDate(ffecha,fname,req,faux){
	faux.value=ffecha.value;
	var validate=true;
	if(req) validate=isRequired(ffecha,fname);
	
	if(validate){
		var fecha=ffecha.value;
		//quitar los /
		if(fecha!="" && fecha.indexOf('/')>=0){
			while(fecha!=fecha.replace('/','')) fecha=fecha.replace('/','');
			var dia=fecha.substring(0,2);
			var mes=fecha.substring(2,4);
			var agno=fecha.substring(4);
		
			ffecha.value=agno+mes+dia;
		}
		return true;
	}
	return false;
}

function makeDateTime(ffecha,fname,fhora,fminutos,fhorario,req,faux){
	faux.value=ffecha.value;
	var validate=true;
	if(req) validate=isRequired(ffecha,fname);
	
	if(validate){
		var fecha=ffecha.value;
		//quitar los /
		if(fecha!="" && fecha.indexOf('/')>=0){
			while(fecha!=fecha.replace('/','')) fecha=fecha.replace('/','');
			var dia=fecha.substring(0,2);
			var mes=fecha.substring(2,4);
			var agno=fecha.substring(4);
		
			ffecha.value=agno+mes+dia;
		}
		
		var hora=fhora[fhora.selectedIndex].value;
		var minutos=fminutos[fminutos.selectedIndex].value;
		var horario=fhorario[fhorario.selectedIndex].value;
		
		if(horario>0) hora=parseInt(hora)+12;
		if(hora<10) hora="0"+hora;
		if(minutos<10) minutos="0"+minutos;
		
		ffecha.value+=hora+minutos+"00";
		return true;
	}
	return false;
}

function rollBack(a,b){
	a.value=b.value;
	return false;
}
// ajax functions
function createRequest(){
	var http_request=false;
	if(window.XMLHttpRequest){ // Mozilla, Safari,...
		http_request = new XMLHttpRequest();
		if (http_request.overrideMimeType) {
			http_request.overrideMimeType('text/xml');
		}
	}else if(window.ActiveXObject){ // IE
		try{
			http_request = new ActiveXObject("Msxml2.XMLHTTP");
		}catch(e){
			try{
				http_request = new ActiveXObject("Microsoft.XMLHTTP");
			}catch(e){}
		}
	}
	return http_request;
}

function makeRequest(url,function_handler,type,xx) {
	var http_request = createRequest();
	
	if (!http_request) {
		alert('Falla :( No es posible crear una instancia XMLHTTP');
		return false;
	}
	http_request.onreadystatechange = function (){
		if (http_request.readyState == 4) {
			if (http_request.status == 200) {
				var doc = null;
				
				if(type == 'xml')doc = http_request.responseXML;
				else doc = http_request.responseText;
				
				function_handler(doc,xx);
			}else{
				alert('Hubo problemas con la petición Error: '+http_request.status);
			}
		}
	}
	http_request.open('GET', url, true);
	http_request.send(null);
}

function isMayor(valor1,valor2){
	if(parseInt(valor1)>=parseInt(valor2))
		return true;
	else {
		alert("La Fecha Inicio debe ser menor a la Fecha Fin");
	    return false;
	}
}

function isFecha(FieldControl, fName){
	if (FieldControl.value=="") {
		alert("El campo " + fName + " es requerido");	
		FieldControl.focus();
		return false;
	} 
	else 
	   return true;
}

function isLink(FieldControl, fName){
	if (FieldControl.value=="http://") {
		alert("El campo " + fName + " es requerido");	
	FieldControl.focus();
		return false;
	} 
	else 
	   return true;
}
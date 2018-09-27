function validate_schedule(f){
	return (false ) || 
		   (isRequired(f.ARCHIVE,'Archivo Excel') &&
		    true) || 
		   (false);
}

function validate_program(f){
	return ( false ) || (  
		isRequired(f.title,'Título') && 
		isRequiredArchive(f,'ARCHIVE','Imagen') &&
		isRequired(f.content,'Contenido') &&
		 true) || ( 
		 false);
}

function isRequiredFoto(f){
	if (f.PHOTO.value.length==0){
		if (f.PHOTO_ACTION.value=="DEL"){
			return (isRequired(f.PHOTO,'Foto'));
		}else{
			return (isRequired(f.PHOTO_AUX,'Foto'));
		}
	}else{
		return true;	
	}
}

function isRequiredArchive(f,field,text){
	if (f[field].value.length==0){
		if (f[field+'_ACTION'].value=="DEL"){
			return (isRequired(f[field],text));
		}else{
			return (isRequired(f[field+'_AUX'],text));
		}
	}else{
		return true;	
	}
}

/************/

function validate_user(f){
	return ( false ) || (  
		isRequired(f.username,'Nombre') && 
		isRequired(f.login,'Usuario') && 
		isMailAddress(f.email.value,"E-mail",true) && 
		isRequired(f.password,'Clave') && 
		isRequired(f.profile_id,'Perfil') &&
		 true) || ( 
		 false);
}

function validate_password(f){
	return ( false ) || (  
		isRequired(f.login,'Usuario') && 
		isRequired(f.password,'Clave Actual') && 
		checkPassword(f.new_password.value, f.confirmation.value, 'Nueva Clave') &&
		 true) || ( 
		 false);
}

function validate_profile(f){
	return ( false ) || (  
		isRequired(f.profile,'Perfil') &&
		 true) || ( 
		 false);
}

function validate_permission(f){
	return ( false ) || (  
		isRequired(f.title,'Nombre') && 
		isRequired(f.module_id,'Módulo') &&
		isRequired(f.permission,'Permiso') &&
		 true) || ( 
		 false);
}

function validate_access(f){
	return ( false ) || (  
		isRequired(f.username,'Usuario') && 
		isRequired(f.password,'Clave') &&
		 true) || ( 
		 false);
}


function MM_openBrWindow(theURL,winName,features) {
  window.open(theURL,winName,features);
}

function set_show(input_chars) {
	show(input_chars);
}
function set_clear(input_chars) {
	clear(input_chars);
}

function show(input_chars) {
	if (document.getElementById(input_chars).value!=""){
		if (input_chars.indexOf('ARCHIVE') < 0) {
			document.getElementById('DISPLAY_'+input_chars).src=document.getElementById(input_chars).value;
			document.getElementById('DISPLAY_'+input_chars).style.display = '';
			document.getElementById('TD_DISPLAY_'+input_chars).style.display = '';
		}else{
			document.getElementById('TD_DISPLAY_'+input_chars).style.display = 'none';	
		}
	}
	if (document.getElementById(input_chars+"_AUX").value!=""){
		document.getElementById(input_chars+"_ACTION").value="DEL";
	}
}

function clear(input_chars) {
	if (document.getElementById('TD_DISPLAY_'+input_chars).style.display == ''){
		confirmation = confirm('Está seguro que desea eliminar este archivo?'); 
		if (confirmation==true){
			document.getElementById('TD_DISPLAY_'+input_chars).style.display = 'none';
			//document.getElementById('DISPLAY_'+input_chars).style.display = 'none';
			if (document.getElementById(input_chars+'_AUX').value!="") { 
				action="DEL";
			}else{
				action="";
			}
			document.getElementById('TD_'+input_chars).innerHTML="<input name='"+input_chars+"_ACTION' id='"+input_chars+"_ACTION' type='hidden' class='input' value='"+action+"'><input name='"+input_chars+"_AUX' id='"+input_chars+"_AUX' type='hidden' class='input' value='"+ document.getElementById(input_chars+'_AUX').value +"'><table border='0' cellspacing='0' cellpadding='0'><tr><td><input name='"+input_chars+"' id='"+input_chars+"' type='file' class='input' value='' onChange='set_show(\""+ input_chars +"\");'>&nbsp;</td><td><div class='UILinkButton'><input name='delfile2' type='button' class='UILinkButton_A' onClick='set_clear(\""+ input_chars +"\");' value='Eliminar' /><div class='UILinkButton_RW'><div class='UILinkButton_R'></div></div></div></td></tr></table>";
		}
	}
}

function show_length(input_content,input_chars) {
	document.getElementById(input_chars).disabled=false;
    document.getElementById(input_chars).value=document.getElementById(input_content).value.length;
	document.getElementById(input_chars).disabled=true;
}


/************/

function confirm_delete(text1,text2){
	atleastone='false';
	var checkboxes = document.form.elements['id[]'];
	var chequeados = 0;
	if(checkboxes.length==undefined)
		if(checkboxes.checked==true)
			atleastone='true';
	for(i=0;i<checkboxes.length;i++)
	while ((atleastone=='false') && (i<checkboxes.length)){
	   if (checkboxes[i].checked==true) atleastone='true';
		i++;
		}	
		
	//alert("atleastone:"+atleastone);
	if (atleastone=='true'){
		answer = confirm(text2);
		if (answer !=0)	return true;
		else return false;
	}else{
		alert(text1);
		return false;			
	}
}
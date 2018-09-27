<html>
<title>WS Consume</title>
<head>
<style>

body{
	background:url('eonlinelatino.gif') top center no-repeat;
	color:#fff;
}

div{
	font-family:arial;
	font-size:14px;
	color:#ffffff;
	padding:10px;
	float:left;
}

select{
	font-family: Arial, Verdana, Helvetica, sans-serif;
	font-size: 14px;
	color: darkred;
	background-color: #FFFFFF;
	border: 1px solid #CCCCCC;
	padding:1px;
	margin: 1px;
}

.content{
	width:1024px;
	margin:100 auto auto;
	background-color: rgba(0,0,0,0.6);
	padding:1em 2em;-moz-border-radius:11px;-khtml-border-radius:11px;-webkit-border-radius:11px;border-radius:11px;border:1px solid #dfdfdf;
}

.sbm{
	background: darkred;
	color:#fff; 
	font-family:Arial, Verdana; 
	font-weight:bold;
	cursor:pointer;
	padding:5px;
}

p{
	color:red; 
	background:#fff;
	font-family:Arial, Verdana;
	font-size: 16px;
	font-style:italic;
	background-color: rgba(0,0,0,0.6);
	padding:5px;
}
</style>
</head>

<body>

<form name="ff" method="post" action="/wsE!/consumeManualWS.php">

<input type="hidden" name="flag" value="1">

<div class="content" style="float:none;">

	<div>Solicitamos por favor que el consumo se realice <b>sólamente</b> para casos de emergencia, de esta manera evitamos consumir mas recursos sobre el servidor.</div>
	<br clear="all" />
	<div>
		Seleccione Feed:
	</div>
	<div>
		<select name="feed">
		<!--<option value="andes" >Andes</option>
		<option value="argentina" >Argentina</option>-->
		<option value="brasil" SELECTED>Brasil</option>
		<!--<option value="mexico" >Mexico</option>
		<option value="venezuela" >Venezuela</option>-->
		</select>
	</div>
	<div>
		Seleccione que desea consumir:
	</div>
	<div>
		<select name="consumir">
		<option value="post" SELECTED>Post</option>
		<option value="gallery" >Gallery</option>
		</select>
	</div>
	<div>
		Ingrese el ID/IDs que desea importar separados por comas (ej: 1584, 1587, 2584):
	</div>
	<br clear="all" />
	<div>
		<textarea name="id" style="width:1000px;height:50px;">516428</textarea>
	</div>
	<br clear="all" />
	<div style="float:right;">
		<input type="submit" value="Importar ahora!" class="sbm">
	</div>

	<br clear="all" />
	<center><p> migrado satisfactoriamente:<br />516428</b><br /><br /></p></center>	<center><p> Report:(1)Inserted Posts:

516428 

(0)Edited Posts:



<br /><br /></p></center>	
</div>

</form>

</body>
<html>

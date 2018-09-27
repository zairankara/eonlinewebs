<?
include('includes/connection.php');
session_start ();
  if ((isSet ($_SESSION ["logeado"])) || ($_SESSION ["logeado"] == true)) {
    header ("location: index.php");
  }
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
	<title>ANCINE | </title>
	<link rel="stylesheet" href="css/bootstrap.min.css" />
	<link rel="stylesheet" href="css/bootstrap-datetimepicker.min.css" />
	<link rel="stylesheet" href="css/font-awesome.min.css" />
	<link href="css/style.css" rel="stylesheet" type="text/css">
</head>
<body>
	<div class="container">
		<div class="row text-center">
			<div class="col-xs-12 col-md-6 col-md-offset-3" id="caja-login">
				<h2>ACCESO ANCINE</h2>
				<form id="user-form" autocomplete="off">
				  <div class="form-group">
				    <div class="input-group">
				    	<div class="input-group-addon"><i class="fa fa-user" aria-hidden="true"></i></div>
				    	<input type="text" class="form-control" id="user" placeholder="Usuário">
				    </div>
				  </div>
				  <div class="form-group">
				    <div class="input-group">
				    	<div class="input-group-addon"><i class="fa fa-key" aria-hidden="true"></i></div>
				    	<input type="password" class="form-control" id="pass" placeholder="Senha">
				    </div>
				  </div>
				  <span id="error" class="alert alert-danger">Seus dados de acesso estão incorretas.</span>
				  <p>A informação exigida na IN100 está relatada conforme os requisitos na IN50</p>
				  <button type="submit" class="btn btn-default" id="entrar">ENTRAR</button>
				</form>
			</div>
		</div>
	</div>
<!-- SCRIPTS -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
	<script type="text/javascript" src="js/moment-with-locales.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
	<script type="text/javascript" src="js/bootstrap-datetimepicker.min.js"></script>
	<script src="js/modernizr.min.js"></script>
    <script src="js/jquery.validate.min.js"></script>
    <script src="js/additional-methods.min.js"></script>
    <script type="text/javascript">
        $(function () {
        	if(localStorage.logeado){
        		location.href="index.php";
        	}
            $('#datetimepicker2').datetimepicker({
                locale: 'pt-br',
                viewMode: 'days',
                format: 'YYYY-MM-DD',
                widgetPositioning: {
		            horizontal: 'auto',
		            vertical: 'bottom'
		         }
            });
            $('#fecha').focusout(function(){
            	$('#formb').submit();
            	console.log($('#fecha').val());
            });
            $("#user-form").validate({
		    	rules: {
		        	user: {
		          		required: true
		        	},
		        	pass: {
		          		required: true
		        	}
		      	},
		      	messages: {
		        	user: {
		          		required: "Você deve digitar um nome de usuário."
		        	},
		        	pass: {
		          		required: "Você deve digitar uma senha."
		        	}
		      	},
		      	submitHandler: function(){
		          	$.ajax({
		            	type: "POST",
		            	url:"login/log.php",
		            	data: {
		                	user:$('#user').val(),
		                	pass:$('#pass').val()
		            	},
		            	success: function(result){
		            		console.log(result);
		            		if(result == 1){
		            			localStorage.setItem('logeado', true);
		              			location.href="index.php";
		              		}
		              		else{
		              			console.log(result);
		              			$('#error').show();
		              		}
		            	}
		          	});
		      	}
		  	});
        });
    </script>
</body>
</html>
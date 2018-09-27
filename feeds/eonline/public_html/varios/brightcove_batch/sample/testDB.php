<!DOCTYPE html>
<html>
<head>
      <title>TEST</title>
     
</head>
<body>
		<div id="debug"></div>
		<script src="http://la.eonline.com/varios/brightcove_batch/sample/includes/jquery-1.12.4.min.js" ></script>
      <script type="text/javascript">
	      $(document).ready(function(){
	      	$.ajax({
	              type:"POST",
	              cache: false,
	              url:"http://la.eonline.com/varios/brightcove_batch/sample/includes/grabar.php",
	              data: {
	                    message: "mensaje",
	                    error_code: "error",
	                    newVideo_code: "3333",
	                    action: "create"
	              },
	              success: function(result){
	                    //console.log(result);
	                    $("#debug").html("OK: "+result);
	                    console.log('OK');

	              },
	              error: function(result){
	                    //console.log(result);
	                    $("#debug").html("ERROR: "+result);
	                    console.log('ERROR');
	              }
	        });
	      })
      </script>
</body>
</html>
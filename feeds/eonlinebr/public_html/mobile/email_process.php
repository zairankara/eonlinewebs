<?	$url = $_POST["url_mail"];
	$email = $_POST["email_addthis"];



	$body="<span style='color:black;'>E! Online Brasil recomenda o seguinte Post:</span><br/>";
	$body.="<span style='color:black;'> ".$url."</span><br/>";
	$body.="<span style='color:black;'>muito obrigado</span>";
	


//SMTP needs accurate times, and the PHP time zone MUST be set
//This should be done in your php.ini, but this is how to do it if you don't have access to that
date_default_timezone_set('Etc/UTC');

require 'class.phpmailer.php';
//Create a new PHPMailer instance
$mail = new PHPMailer();
//Tell PHPMailer to use SMTP
//$mail->IsSMTP();
//Enable SMTP debugging
// 0 = off (for production use)
// 1 = client messages
// 2 = client and server messages
$mail->SMTPDebug  = 2;
//Ask for HTML-friendly debug output
$mail->Debugoutput = 'html';
//$mail->SMTPSecure = "tsl";
//Set the hostname of the mail server
$mail->Host       = "smtp.gmail.com";
//Set the SMTP port number - likely to be 25, 465 or 587
$mail->Port       = 587;
//Whether to use SMTP authentication
$mail->SMTPAuth   = true;
//Username to use for SMTP authentication
$mail->Username   = "cuentaeonlinelatino@gmail.com";
//Password to use for SMTP authentication
$mail->Password   = "Mercadeo7";
//Set who the message is to be sent from
$mail->SetFrom('cuentaeonlinelatino@gmail.com', 'Ebrasil Web');
//Set an alternative reply-to address
//ail->AddReplyTo('replyto@example.com','First Last');
//Set who the message is to be sent to
	$mail->AddAddress($email,$email);


//Set the subject line
$mail->Subject = 'Recomenda';
//Read an HTML message body from an external file, convert referenced images to embedded, convert HTML into a basic plain-text alternative body
$mail->MsgHTML(file_get_contents('contents.html'), dirname(__FILE__));
//Replace the plain text body with one created manually
$mail->Body = $body;
$mail->AltBody = 'This is a plain-text message body';


$exito = $mail->Send();

//Si el mensaje no ha podido ser enviado se realizaran 4 intentos mas como mucho 
//para intentar enviar el mensaje, cada intento se hara 5 segundos despues 
//del anterior, para ello se usa la funcion sleep	
$intentos=1; 
while ((!$exito) && ($intentos < 5)) {
sleep(5);
 	//echo $mail->ErrorInfo;
 	$exito = $mail->Send();
 	$intentos=$intentos+1;	

}
//Send the message, check for errors
if($exito) {
  	echo("<script>location.href='".$url."&m=1'; </script>");
}

?>
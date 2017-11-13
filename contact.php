<?php

if(isset($_POST['email'])) {

    $email_to = "ipeters@apprende.cl";
 
    $email_subject = "desde apprende.cl";

 
    function died($error) {
  
 
        echo $error."<br /><br />"; 
 
        die();
 
    }
 
     
 
    // validation expected data exists
 
    if(!isset($_POST['name']) ||
 
        !isset($_POST['email']) ||
 
        !isset($_POST['message'])) {
 
        died('Lo sentimos, hemos tenido un error al enviar su consulta');       
 
    }
 
     
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];
 
 
    $email_message = "El siguente detalle de informacion \n\n";
 
     
 
    function clean_string($string) { 
      $bad = array("content-type","bcc:","to:","cc:","href");
      return str_replace($bad,"",$string);
    } 
 
    $email_message .= "Name: ".clean_string($name)."\n";
 
    $email_message .= "Email: ".clean_string($email)."\n";
 
    $email_message .= "Message: ".clean_string($message)."\n";

 
	// create email headers
	 
	$headers = 'From: '.$email."\r\n".
	 
	'Reply-To: '.$email."\r\n" .
	 
	'X-Mailer: PHP/' . phpversion();
	 
	@mail($email_to, $email_subject, $email_message, $headers);  
    header("Location: index.html");
}
 
?>

<?php

// Replace this with your own email address
$siteOwnersEmail = 'dlopezr1313@gmail.com';


if($_POST) {

   $name = trim(stripslashes($_POST['contactName']));
   $email = trim(stripslashes($_POST['contactEmail']));
   $subject = trim(stripslashes($_POST['contactSubject']));
   $contact_message = trim(stripslashes($_POST['contactMessage']));

   // Check Name
	if (strlen($name) < 2) {
		$error['name'] = "Por favor ingresa tu nombre.";
	}
	// Check Email
	if (!preg_match('/^[a-z0-9&\'\.\-_\+]+@[a-z0-9\-]+\.([a-z0-9\-]+\.)*+[a-z]{2}/is', $email)) {
		$error['email'] = "Por favor ingresa un email valido.";
	}
	// Check Message
	if (strlen($contact_message) < 15) {
		$error['message'] = "Por favor, introduzca su mensaje. Debe tener al menos 15 caracteres.";
	}
	// Check Message
	if (strlen($subject) < 1) {
		$error['message'] = "Por favor, indica si podrás asistir.";
	}


   // Set Message
   $message .= "Email de: " . $name . "<br />";
   $message .= "Email: " . $email . "<br />";
   $message .= "Asiste a la boda: " . $subject . "<br />";
   $message .= "Mensage: <br />";
   $message .= $contact_message;
   $message .= "<br /> ----- <br />Este correo electrónico se envió desde tu invitación dígital. <br />";

   // Set From: header
   $from =  $name . " <" . $email . ">";

   // Email Headers
	$headers = "From: " . $from . "\r\n";
	$headers .= "Reply-To: ". $email . "\r\n";
 	$headers .= "MIME-Version: 1.0\r\n";
	$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";


   if (!$error) {

      ini_set("sendmail_from", $siteOwnersEmail); // for windows server
      $mail = mail($siteOwnersEmail, $subject, $message, $headers);

		if ($mail) { echo "Email, enviado con éxito."; }
      else { echo "Algo salió mal. Inténtalo de nuevo."; }
		
	} # end if - no validation error

	else {

		$response = (isset($error['name'])) ? $error['Nombre'] . "<br /> \n" : null;
		$response .= (isset($error['email'])) ? $error['Email'] . "<br /> \n" : null;
		$response .= (isset($error['subject'])) ? $error['Asistencia'] . "<br /> \n" : null;
		$response .= (isset($error['message'])) ? $error['Mensaje'] . "<br />" : null;
		
		echo $response;

	} # end if - there was a validation error

}

?>
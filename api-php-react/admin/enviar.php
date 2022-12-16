<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer-master/src/Exception.php';
require 'PHPMailer-master/src/PHPMailer.php';
require 'PHPMailer-master/src/SMTP.php';


function enviar_correo($correo,$enviar){
    $devuelta = "";
    $mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = 0;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'mail.enso-learning.com.co';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'recuperar@enso-learning.com.co';                     //SMTP username
    $mail->Password   = '$ensorecuperar$';                               //SMTP password
    $mail->SMTPSecure = 'ssl';            //Enable implicit TLS encryption
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('recuperar@enso-learning.com.co', 'Soporte Enso-Learning');
    $mail->addAddress($enviar,$enviar);     //Add a recipient             //Name is optional
    $mail->addReplyTo('info@example.com', 'no devolver');

    //Attachments
    // $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
    // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'envio de correo';
    $mail->Body    = $correo;
    $mail->AltBody = 'errors';

    $mail->send();
     $devuelta = true;
} catch (Exception $e) {
    $devuelta = false;
}
return $devuelta;
}
?>
<?php

$apellido = $_POST['apellido'];
$email = $_POST['email'];

$mensaje = $_POST['mensaje'];

$body = "Nombre: " . $apellido .  "<br>Correo: " . $email . "<br>Mensaje: " . $mensaje;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

 

//mandar correo
       

$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = 0 ;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'andreatrebin@gmail.com';                     //SMTP username
    $mail->Password   = 'zmmtyqmxggbiwely';                               //SMTP password
    $mail->SMTPSecure = 'tls';            //Enable implicit TLS encryption
    $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('andreatrebin@gmail.com', 'Andrea Cabrera CV');
    $mail->addAddress('consultas@cocinacasera.website', 'Mailer');     //Add a recipient
    //$mail->addAddress('ellen@example.com');               //Name is optional
    //$mail->addReplyTo('info@example.com', 'Information');
    //$mail->addCC('cc@example.com');
    //$mail->addBCC('bcc@example.com');

    //Attachments
    //$mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
    //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name



    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Correo de contacto';
    $mail->Body    = 'Nombre: ' . $apellido . '<br/>Correo: ' . $email . '<br/>' . $mensaje;
    //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    echo '<script> 
        alert ("El mensaje se envió con éxito");
        window.history.go(-1);
        </script>';

} catch (Exception $e) {
    echo 'Hubo un error: ' , $mail->ErrorInfo;}

?>
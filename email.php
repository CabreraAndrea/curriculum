<?php

$apellido = $_POST['apellido'];
$email = $_POST['email'];
$mensaje = $_POST['mensaje'];

$destinatario = "consultas@cocinacasera.website";
$asunto = "Contacto desde nuestra web";

$carta = "De: $apellido \n";
$carta .= "Correo: $email \n";
$carta .= "Mensaje:  $mensaje \n";

mail($destinatario, $asunto, $carta);
?>
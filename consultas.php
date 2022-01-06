<?php 

// Llamando a los campos
	$nombre = $_POST['nombre'];
	$correo = $_POST['correo'];
	$telefono = $_POST['telefono'];
	$mensaje = $_POST['mensaje'];

// Datos para el correo
	$destinatario = "info_book@mail.com";
	$asunto = "Contacto desde nuestra web";

	$carta = "De: $nombre \n";
	$carta .= "Correo: $correo \n";
	$carta .= "Telefeono: $telefono \n";
	$carta .= "Mensaje : $mensaje";

// Enviando mensaje
	mail($destinatario, $asunto, $carta);
	header('Location: /Bookwedit/mensaje_de_envio.html');

?>
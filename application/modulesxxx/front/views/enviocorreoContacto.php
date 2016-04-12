<?php






	$mensaje  = "DATOS DEL CONTACTO: \n\n". "Nombre: ".$_POST["nombre"] . "\nAsunto: " . $_POST["asunto"]. "\nTelefono: " . $_POST["telefono"];
	$mensaje .= "\nE-mail: ". $_POST["email"]. "\nComentarios: ". $_POST["comentario"]."\n\n";


	$mensaje = htmlspecialchars($mensaje);
	$mensaje = stripslashes($mensaje);


	$to = "mahpsa@carterainmobiliaria.com.pe";
	$to2 = "gamunaxx@gmail.com";
	$to3 = "raul@studiomanda.pe";
	$subject = "WEB-CONTACTO";
	$header = "WEB-CONTACTO";
	$retval = mail($to, $subject, $mensaje, $header);
	$retval2 = mail($to2, $subject, $mensaje, $header);
	$retval3 = mail($to3, $subject, $mensaje, $header);

	













?>
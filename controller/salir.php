<?php
	//Destruimos la sesión por completo
	session_destroy();
	//Borramos los valores de las variables de sesión
	session_unset();
	//Redirigimos al index
	//header("Location: index.php");
?>
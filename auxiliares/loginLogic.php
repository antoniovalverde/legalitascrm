<?php
	//Incluimos las funciones
	include_once("funciones.inc");

	// Ejecutamos las validaciones. Almacenaremos todos los resultados en un array de errores
	$error = array();
	ValidarUser($_REQUEST['usuario'], $error);
	
	// En PHP5 se considera "Vacio" a un array vacio
	//if(empty($error) && $_REQUEST['usuario'] == 'admin') {
	if(empty($error)) {

		if($_REQUEST['password'] != ''){

			//Cogemos la contrase�a encriptada
			$hash = verificarusuario($_REQUEST['usuario']);
		
			if(password_verify($_REQUEST['password'], $hash)){
			
				session_start();
				$_SESSION['usuario'] = verificarnombre($_REQUEST['usuario']);
			
				header("Location: /legalitascrm/controller/adminController.php");
				
			}else{
				array_push($error, "La contraseña no es correcta");
				//Contrase�a incorrecta y volvemos al formulario.
				include_once("./vistas/login.php");
			}
		}else{
			array_push($error, "La contraseña no puede estar vacía");
		}
	}else{
	    // Si ha habido algun error, volveremos al formulario para mostrar en que nos hemos equivocado
		array_push($error, "Error inesperado");
	}
?>

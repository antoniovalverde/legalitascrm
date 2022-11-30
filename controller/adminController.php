<?php
	include ("../auxiliares/funciones.inc");
	//Se crea la sesión
	session_start();
	//Si no se crearon en el paso anterior las variables de sesión correspondientes al admin nos mandará al index.
	if(!isset($_SESSION["usuario"])){
		header("Location: ../index.php");
	}else{
		//Pruebas
	}
	
	// Incluimos la cabecera general, archivos necesarios y el archivo con las funciones
	include_once("../config.php");
	//Cabecera del admin
	include_once("../vistas/layouts/cabeceraAdmin.php");
	//Contenido dinámico
	// ACT contendra la opción elegida
	$act = $_REQUEST["act"];

	// Navegacion entre zonas
	switch($act) {
		case "Usuarios": include_once("../vistas/layouts/usuariosAdmin.php"); break;				// Usuarios
		case "Contratos": include_once("../vistas/layouts/contratosAdmin.php"); break;				// Contratos
		case "Salir": include_once("../controller/salir.php"); 
					  echo '<script type="text/JavaScript"> location.reload(); </script>'; break;	// Salir
		
		default: include_once("../vistas/layouts/dashboardAdmin.php"); 								//Por defecto
	}

	//Footer
	include_once("../vistas/layouts/footer.php");
?>
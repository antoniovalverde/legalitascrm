<?php
	//Si existe alguna sesion la destruimos
	if(isset($_SESSION["usuario"])){
		session_unset();
		session_destroy();
	}
	
	// Incluimos el archivo con las funciones y el de gestión de errores.
	include_once("auxiliares/funciones.inc");
	include_once("config.php");

	//Se carga el archivo que gestiona la validación del login en el caso de haber tratado de loguearse.
	if(isset($_POST['entrar'])){
		include('auxiliares/loginLogic.php');
	}
	//Formulario de ingreso
	include_once("vistas/login.php");
?>
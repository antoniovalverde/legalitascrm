<?php
	 // Inicializamos las variables que vamos a usar
	 // Navegacion
	 if(!isset($_REQUEST["act"])) {
	     $_REQUEST["act"] = "";
	 }  
	 
	 //Por si aún no existe la variable...
	 if(!isset($error)) {
	     $error = array();
	 }
?>
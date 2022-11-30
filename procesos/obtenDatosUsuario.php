<?php 
//Proceso para obtener los datos de un Usuario	
	require_once "../clases/conexion.php";
	require_once "../clases/crud.php";

	$obj= new crud();

	echo json_encode($obj->obtenDatosUsuario($_POST['idusuario']));

 ?>
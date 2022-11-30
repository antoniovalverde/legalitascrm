<?php 
//Proceso Eliminar Usuario
	require_once "../clases/conexion.php";
	require_once "../clases/crud.php";

	$obj= new crud();

	echo $obj->eliminarUsuario($_POST['id_usuario']);

 ?>
<?php 
//Proceso Agregar Usuario
	require_once "../clases/conexion.php";
	require_once "../clases/crud.php";
	$obj= new crud();

	$hash = crypt($_POST['pass1'], 'rl');

	$datos=array(
		$_POST['nombre'],
		$_POST['mail'],
		$hash,
		$_POST['perfil']
	);

	echo $obj->agregarUsuario($datos);
	

 ?>
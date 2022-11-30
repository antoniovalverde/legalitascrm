 <?php 
//Proceso actualizar
	require_once "../clases/conexion.php";
	require_once "../clases/crud.php";
	$obj= new crud();
	
	if($_POST['passchange'] == 1){
		$hash = crypt($_POST['pass1U'], 'rl');
	}else{
		$hash = $_POST['pass1U'];
	}

	$datos=array(
		$_POST['idU'],
		$_POST['nombreU'],
		$_POST['mailU'],
		$hash,
		$_POST['perfilU']		
	);

	echo $obj->actualizarUsuario($datos);
	

 ?>
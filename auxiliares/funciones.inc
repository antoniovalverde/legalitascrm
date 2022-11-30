<?php

// ***********************
// Funciones de BBDD

	//Función para conectar a la base de datos
	function conexion(){
		try{
			//conexion con el servidor de base de datos y selección de la base de datos concreta
			$conectar = new PDO('mysql:host=localhost;dbname=crmlumar', 'crmlumar', 'Lualforce.82');
		}catch(PDOException $e){
			echo 'Error conectando con la base de datos: ' . $e->getMessage();
		}
	}
	
	//Función para desconectar de la base de datos
	function desconexion(){
		global $conectar, $registro;	
		$conectar = null;
		$registro = null;
	}	

	//Función para verificar la existencia de un usuarios
	function existeusuario($usuario){
		try{
			//Primero abrimos la conexión con la base de datos
			//conexion con el servidor de base de datos y selección de la base de datos concreta
			$conectar = new PDO('mysql:host=localhost;dbname=crmlumar', 'crmlumar', 'Lualforce.82');
		
			$conectar->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			//A continuación
		
			$sql="SELECT * FROM users WHERE mail_user like :usuario";
		
			$registro = $conectar->prepare($sql);
			$registro->bindParam(':usuario', $usuario);		
			//$registro->execute(array(':usuario'=>$usuario));
			$registro->execute();
		
			//Con esto comprobamos si se han generado resultados
			$count=$registro->rowCount();
			
			desconexion();
		
			if($count){
				return 1;
			}else{
				return 0;
			}
		}catch(PDOException $e){
			echo 'Error conectando con la base de datos: ' . $e->getMessage();
		}
	}

	//Función para verificar la entrada de usuarios
	function verificarusuario($usuario){
		try{
			//Primero abrimos la conexión con la base de datos
			//conexion con el servidor de base de datos y selección de la base de datos concreta
			$conectar = new PDO('mysql:host=localhost;dbname=crmlumar', 'crmlumar', 'Lualforce.82');
		
			$conectar->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			//A continuación
		
			$sql="SELECT pass_user FROM users WHERE mail_user like :usuario";
		
			$registro = $conectar->prepare($sql);
			$registro->bindParam(':usuario', $usuario);		
			$registro->execute();
		
			$row = $registro->fetch();
			
			desconexion();
		
			return $row['pass_user'];
		
		}catch(PDOException $e){
			echo 'Error conectando con la base de datos: ' . $e->getMessage();
		}
	}

	//Función para coger el nombre del usuario
	function verificarnombre($usuario){
		try{
			//Primero abrimos la conexión con la base de datos
			//conexion con el servidor de base de datos y selección de la base de datos concreta
			$conectar = new PDO('mysql:host=localhost;dbname=crmlumar', 'crmlumar', 'Lualforce.82');
		
			$conectar->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			//A continuación
		
			$sql="SELECT nombre_user FROM users WHERE mail_user like :usuario";
		
			$registro = $conectar->prepare($sql);
			$registro->bindParam(':usuario', $usuario);		
			$registro->execute();
		
			$row = $registro->fetch();
			
			desconexion();
		
			return $row['nombre_user'];
		
		}catch(PDOException $e){
			echo 'Error conectando con la base de datos: ' . $e->getMessage();
		}
	}
	
// *****************
// Funciones Logicas
	
	//funcion para verificar que dentro del arreglo global $_SESSION existe el nombre del usuario
	function verificar_usuario(){
		//continuar una sesion iniciada
		//session_start();
		
		//comprobar la existencia del usuario
		if (!isset($_SESSION['usuario'])){

		}else{
			return true;
		}
	}
	
// ***********************
// Funciones de Validacion
	
	//Función de validación de registro de usuario
	function Validar_DatosRegistro($req, &$error) {
    	validarUsuario($req["login"], $error);
		validarPassword($req["password1"], $req["password2"], $error);
	}

	//Validar Usuario en Registro
	function validarUsuario($usuario, &$errorArray) {
			// Simplemente no debe de ser nulo
		if (trim($usuario) == "") {
		    array_push($errorArray, "El Usuario no puede estar vacio");
		}else{
			$existe = existeusuario($usuario);
			if ($existe == 1){
				array_push($errorArray, "El Usuario ya existe");
			}
		}
	}
	
	//Validar Usuario en Login
	function validarUser($usuario, &$errorArray) {
			// Simplemente no debe de ser nulo
		if (trim($usuario) == "") {
		    array_push($errorArray, "El Usuario no puede estar vacio");
		}else{
			$existe = existeusuario($usuario);
			if ($existe == 1){
				//Si todo va bien el array de errores seguirá vacío
			}else{
				array_push($errorArray, "El Usuario no existe");
			}
		}
	}
	
	//Validar Password de login de usuario
	function validarPass($pass1, &$errorArray) {
	
		//Comprobamos que no estén vacíos
		if (trim($pass1) == "") {
		    array_push($errorArray, "El Password no coincide");
		}
	}	

// *************************
// Funciones de Presentacion
	
	//Mostrar error en Usuario
	function muestraErrorUsuario($errores) {
		foreach ($errores as $error) {
		    if($error == "El Usuario no puede estar vacio")	echo "<span style=\"color:red;font-weight: bold\">El Usuario no puede estar vacio.</span>";
			if($error == "El Usuario ya existe")	echo "<span style=\"color:red;font-weight: bold\">El Usuario ya existe.</span>";
			if($error == "El Usuario no existe")	echo "<span style=\"color:red;font-weight: bold\">El Usuario no existe.</span>";
			if($error == "Usuario Bloqueado") echo "<span style=\"color:red;font-weight: bold\">Usuario Bloqueado.</span>";
		}
	}
	
	//Mostrar error en Password
	function muestraErrorPassword($errores) {
		foreach ($errores as $error) {
		    if($error == "La contraseña no puede estar vacía")	echo "<span style=\"color:red;\">La contraseña no puede estar vacía.</span>";
		    if($error == "Los Passwords no coinciden")	echo "<span style=\"color:red;\">Los Passwords no coinciden.</span>";
			if($error == "La contraseña no es correcta") echo "<span style=\"color:red;\">La contraseña no es corecta.</span>";		
		}
	}

	//Comprobar errores
	function compruebaErrores($error) {
	    if (sizeof($error) > 0) {
	        echo "<p><span style='color:red; font-weight: bold'>Error al introducir los datos</span></p>";
	    }
	}
?>
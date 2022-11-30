<?php 
//Clase crud
	class crud{

		//Agregar Usuario
		public function agregarUsuario($datos){
			$obj= new conectar();
			$conexion=$obj->conexion();
		
			$sql="INSERT INTO users (nombre_user, mail_user, pass_user, perfil_user)
									VALUES ('$datos[0]',
											'$datos[1]',
											'$datos[2]',
											'$datos[3]'								
											)";
			return mysqli_query($conexion,$sql);
		}

		//Eliminar Usuario
		public function eliminarUsuario($id){
			$obj= new conectar();
			$conexion=$obj->conexion();

			$sql="DELETE FROM users			
						WHERE id_user='$id'";
						
			return mysqli_query($conexion,$sql);
		}

		//Obtener datos de Usuario
		public function obtenDatosUsuario($idusuario){
			$obj= new conectar();
			$conexion=$obj->conexion();
		
			$sql="SELECT *
					from users 
					where id_user='$idusuario'";
			$result=mysqli_query($conexion,$sql);
			$ver=mysqli_fetch_row($result);
		
			$datos=array(
				'id_usuario' => $ver[0],
				'nombre' => $ver[1],
				'mail' => $ver[2],
				'pass' => $ver[3],
				'perfil' => $ver[4]
				);
			return $datos;
		}

		//Actualizar datos de Usuario
		public function actualizarUsuario($datos){
			$obj= new conectar();
			$conexion=$obj->conexion();
		
			$sql="UPDATE users SET nombre_user='$datos[1]',
				    	  		   mail_user='$datos[2]',
								   pass_user='$datos[3]',
								   perfil_user='$datos[4]'			
						WHERE id_user='$datos[0]'";
								
			return mysqli_query($conexion,$sql);
		}

	}

 ?>
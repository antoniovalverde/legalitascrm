<?php 
//Clase Conectar
	class conectar{
		//Función conexión que sirve para pasar los datos de conexión a la BBDD
		public function conexion(){
			$conexion=mysqli_connect('localhost',
										'crmlumar',
										'Lualforce.82',
										'crmlumar');
										
			mysqli_set_charset($conexion, 'utf8');

			return $conexion;
		}
	}


 ?>
<?php 
	
	function conexion($h, $u, $p ,$bd){

		/**
		 * La mejor forma de conexion es a travez de PDO
		 * PHP Object Data
		 */
		if (!($enlace = mysqli_connect($h, $u, $p ,$bd))) {
			die("Fallo conexion ERROR");
		}else{
			return $enlace;
		}
	}

	function cerrrConexion($enlace){
		mysql_close($enlace);
	}

 ?>
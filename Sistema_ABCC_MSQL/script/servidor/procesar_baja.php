<?php 
	include('conexion.php');

	$h = 'localhost';
    $u = 'root';
    $p = '';
	$bd = 'bd_escuela';

	$enlace = conexion($h, $u, $p ,$bd);

	//var_dump($enlace);

	$num_control = $_GET["id"];
	


	$sql = "DELETE FROM alumnos WHERE num_control = '$num_control'";

	$res = mysqli_query($enlace, $sql);

	if ($res) {
		header('Location:../../vista/eliminar_registro.php');
	} else {
		echo "Error de acceso";
		
	}
 ?>
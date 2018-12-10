<?php 
	include('conexion.php');

	$h = 'localhost';
    $u = 'root';
    $p = '';
	$bd = 'bd_escuela';

	$enlace = conexion($h, $u, $p ,$bd);

	//var_dump($enlace);

	$usuario = $_POST["txtUsuario"];
	$contra = $_POST["txtContra"];

	$sql = "INSERT INTO usuarios VALUES ('$usuario', MD5('$contra'))";
	$res = mysqli_query($enlace, $sql);
	if ($res) {
		header('Location:../../vista/login.html');
	} else {
		echo '<script>alert("El usuario ya existe")</script>';
	}	
 ?>
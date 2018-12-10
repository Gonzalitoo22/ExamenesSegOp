<?php 
	include('conexion.php');

	$h = 'localhost';
    $u = 'root';
    $p = '';
	$bd = 'bd_escuela';

	$enlace = conexion($h, $u, $p ,$bd);

	//var_dump($enlace);

	$num_control = $_POST["txt_num_control"];
	$nombre = $_POST["txt_nombre"];
	$primer_ap = $_POST["txt_primer_ap"];
	$segundo_ap = $_POST["txt_segundo_ap"];
	$semestre = $_POST["txt_semestre"];
	$edad = $_POST["txt_edad"];
	$carrera = $_POST["txt_carrera"];



	$sql = "INSERT INTO alumnos VALUES ('$num_control','$nombre','$primer_ap','$segundo_ap',$edad,$semestre,'$carrera')";

	$res = mysqli_query($enlace, $sql);

	if ($res) {
		header('Location:../../vista/menu_principal.php');
	} else {
		echo "Error de acceso";
		
	}
 ?>
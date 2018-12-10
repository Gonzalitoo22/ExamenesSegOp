

<?php 
	include('conexion.php');

	$h = 'localhost';
    $u = 'root';
    $p = '';
	$bd = 'bd_escuela';

	$enlace = conexion($h, $u, $p ,$bd);

	$usuario = $_POST["txt_usuario"];
	$contraseña = $_POST["txt_contraseña"];

	//Validaciones
	//cifado/desifrado
	//Procedimeito par validar usario
	//SELECT * FROM txt_contraseña WHERE usuario = x AND contraseña =x;

	$sql = "SELECT * FROM usuarios WHERE usuario = '$usuario' AND password = '$contraseña'";

	$res = mysqli_query($enlace, $sql);
	//var_dump($res);

	if (mysqli_num_rows($res) == 1) {
		session_start();
		$_SESSION['activa'] = true;
		$_SESSION['usuario'] = strtoupper($usuario);
		header("Location:../../vista/menu_principal.php");
	} else {
		header("Location:../../vista/login.html");
		//echo "Error de acceso";
	}


 ?>
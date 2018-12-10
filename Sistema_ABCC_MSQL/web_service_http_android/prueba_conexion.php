<?php
	//require_once('conexion_BD.php');
	//$conexion = new Conexion();

	$conexion = mysqli_connect("localhost", "root", "", "bd_escuela")
							or die(mysql_error());
	$respuesta = array();

	$sql = "SELECT * FROM alumnos";
	$consulta = mysqli_query($conexion, $sql);

	if (mysqli_num_rows($consulta) > 0) {
		$respuesta["alumnos"] = array();
		while ($fila = mysqli_fetch_assoc($consulta)) {
			$alumnos = array();

			$alumnos["nc"] = $fila["num_Control"];
			$alumnos["n"] = $fila["nombre"];
			$alumnos["pa"] = $fila["primerAp"];
			$alumnos["sa"] = $fila["segundoAp"];
			$alumnos["e"] = $fila["edad"];
			$alumnos["s"] = $fila["semestre"];
			$alumnos["c"] = $fila["carrera"];
			array_push($respuesta["alumnos"], $alumnos);
		}
		$respuesta['exito'] = 1;
		echo json_encode($respuesta);
	}else{
		$respuesta['exito'] = 0;
		$respuesta['msj'] = "No hay registros";
		echo json_encode($respuesta);
	}
?>
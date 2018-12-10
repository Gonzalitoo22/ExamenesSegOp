<?php
	if (!($conexion = mysqli_connect('localhost', 'root', '', 'bd_escuela'))) 
		die("Fallo en conexion !!!, ERROR: " . mysqli_connect_error());

	//echo json_encode($conexion);

	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		$cadena_json = file_get_contents('php://input');
										//recibe informacion por HTTP, en este caso una cadena JSON

		$datos = json_decode($cadena_json, true);

		
		$dato = $datos['dato'];

		$sql = "SELECT * FROM alumnos";

		//echo json_encode($sql);

		$resultado = mysqli_query($conexion, $sql);
		if (mysqli_num_rows($resultado) > 0) {
			$respuesta["alumnos"] = array();
			while ($fila = mysqli_fetch_assoc($resultado)) {
				$alumno = array();

				$alumno["nc"] = $fila["num_Control"];
				$alumno["n"] = $fila["nombre"];
				$alumno["pa"] = $fila["primerAp"];
				$alumno["sa"] = $fila["segundoAp"];
				$alumno["e"] = $fila["edad"];
				$alumno["s"] = $fila["semestre"];
				$alumno["c"] = $fila["carrera"];
				array_push($respuesta["alumnos"], $alumno);
			}
			$respuesta['exito'] = 1;
			echo json_encode($respuesta);
		}else{
			$respuesta['exito'] = 0;
			$respuesta['msj'] = 'Error en la consulta';
			echo json_encode($respuesta);
		}

	}
?>
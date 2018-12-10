<?php
	if (!($conexion = mysqli_connect('localhost', 'root', '', 'bd_escuela'))) 
		die("Fallo en conexion !!!, ERROR: " . mysqli_connect_error());

	//echo json_encode($conexion);

	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		$cadena_json = file_get_contents('php://input');
										//recibe informacion por HTTP, en este caso una cadena JSON

		$datos = json_decode($cadena_json, true);

		$sql = "SELECT * FROM usuarios";

		//echo json_encode($sql);

		$resultado = mysqli_query($conexion, $sql);
		if (mysqli_num_rows($resultado) > 0) {
			$respuesta["usuarios"] = array();
			while ($fila = mysqli_fetch_assoc($resultado)) {
				$usuario = array();

				$usuario["usuar"] = $fila["usuario"];
				$usuario["contra"] = $fila["password"];
				array_push($respuesta["usuarios"], $usuario);
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
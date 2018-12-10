<?php
  session_start();
  if (!$_SESSION['activa'] == true) {
    header('Location: login.html');
  }else{

  }
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<form method="POST" action="procesar_busqueda.php">
		<label>Numero de control: </label>
		<input type="text" name="caja_num_control" placeholder="Dejar en blanco para mostrar todos los registros">
		<br>
		<label>Nombre: </label>
		<input type="text" name="caja_nombre" placeholder="Dejar en blanco para mostrar todos los registros">
		<br>
		<input type="submit" name="">
	</form>
</body>
</html>
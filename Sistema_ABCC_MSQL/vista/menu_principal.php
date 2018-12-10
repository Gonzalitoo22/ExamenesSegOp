<?php
  session_start();
  if (!$_SESSION['activa'] == true) {
    header('Location: login.html');
  }else{

  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Sistema ABCC</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">Ménu principal <span><?php echo ' BIENVENIDO: ' .$_SESSION['usuario']; ?></span> </a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="#">Inicio</a></li>
      <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#"> Alumnos <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="formulario_altas_alumnos.php">Agregar</a></li>
          <li><a href="buscar_registro.php">Buscar</a></li>
          <li><a href="eliminar_registro.php">Eliminar</a></li>
          <li><a href="modificar_registro.php">Modificar</a></li>
        </ul>
      </li>
      <li class="active"><a href="../script/servidor/cerrar_sesion.php">Cerrar sesion</a></li>
    </ul>
  </div>
</nav>
  
<div class="container">
</div>

</body>
</html>

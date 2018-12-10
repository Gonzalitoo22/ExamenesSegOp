<?php
  session_start();
  if (!$_SESSION['activa'] == true) {
    header('Location: login.html');
  }else{

  }
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Eliminar alumnos</title>
	<link rel="stylesheet" href="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
</head>
<body>
    <div class="container">
        <h2>Bajas alumnos</h2>
        <form method="POST" action="../script/servidor/procesar_baja.php">
            <div class="form-group">
                <div class="form-group">
                    <label>Num. Control:</label>
                    <input type="text" class="form-control" placeholder="Ej. 15070110" name="txt_num_control">
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Buscar</button>
        </form>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Num. Control</th>
                    <th>Nombre</th>
                    <th>Primer apellido</th>
                    <th>Segundo apellido</th>
                    <th>Edad</th>
                    <th>Semestre</th>
                    <th>Carrera</th>
                </tr>
            </thead>
    
    
	<?php 
    include("../script/servidor/conexion.php");
    $h = 'localhost';
    $u = 'root';
    $p = '';
    $bd = 'bd_escuela';

    $enlace = conexion($h, $u, $p ,$bd);

    $sql = "SELECT * FROM alumnos";

    $resultado = mysqli_query($enlace,$sql);

    //var_dump($resultado);

    if (mysqli_num_rows($resultado) > 0) {
        while ($fila = mysqli_fetch_array($resultado)) {
             
    ?>
            <tbody>
                <tr>
                    <td><?php echo $fila[0] ?></td>
                    <td><?php echo $fila[1] ?></td>
                    <td><?php echo $fila[2] ?></td>
                    <td><?php echo $fila[3] ?></td>
                    <td><?php echo $fila[4] ?></td>
                    <td><?php echo $fila[5] ?></td>
                    <td><?php echo $fila[6] ?></td> 
                    <td><?php echo "<a href='../script/servidor/procesar_baja.php?id=$fila[0]'>ELIMINAR</a>" ?></td> 
            </tbody>
    <?php              
    }
    }else{
      echo "No hay registros";
    }
   ?>
        </table>
        <br>
        <a href="menu_principal.php">Regresar</a>
    </div>
</body>
</html>
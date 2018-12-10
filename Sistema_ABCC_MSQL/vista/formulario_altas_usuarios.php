<!DOCTYPE html>
<html lang="es">
<head>
  <title>Altas alumnos</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>


</head>
<body>

<div class="container">
  <h2>Altas usuarios</h2>
  <form  method="POST" action="../script/servidor/procesar_altas_usuarios.php">
    <div class="form-group">
     
         <div class="form-group">
          <label>Usuario:</label>
          <input type="text" class="form-control" placeholder="Ej. Gonzalo" name="txtUsuario">
          <small class="form-text text-muted">Campo obligatorio</small>
        </div>

       <div class="form-group">
          <label>Contraseña:</label>
          <input type="text" class="form-control" placeholder="Ej. Gonzalo" name="txtContra">
          <small class="form-text text-muted">Campo obligatorio</small>
        </div>

    <button type="submit" class="btn btn-primary">Submit</button>
    <br>
  </form>
  <table class="table table-bordered">
    <thead>
      <tr>
        <th>Usuarios</th>
        <th>Contraseña</th>
      </tr>
    </thead>
    
      <?php 
        include("../script/servidor/conexion.php");
        $h = 'localhost';
        $u = 'root';
        $p = '';
        $bd = 'bd_escuela';

        $enlace = conexion($h, $u, $p ,$bd);

        $sql = "SELECT * FROM usuarios";

        $resultado = mysqli_query($enlace,$sql);

    
        if (mysqli_num_rows($resultado) > 0) {
          while ($fila = mysqli_fetch_array($resultado)) {
      ?>
        <tbody>
            <tr>
              <td><?php echo $fila[0] ?></td>
              <td><?php echo $fila[1] ?></td>
            </tr>
        </tbody>
            
      <?php
        }
      }
        else{
          echo "No hay registros";
        }
      ?>
  </table> 
  <br>
  <a href="menu_principal.php">Regresar</a>
</div>

</body>
</html>

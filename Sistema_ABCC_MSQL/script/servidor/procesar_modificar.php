<?php
 
    if (isset($_GET['editar'])) {
      $editar_nc = $_GET['editar'];
      $sql= "SELECT * FROM alumnos WHERE num_Control ='$editar_nc'";
      $resultado = mysqli_query($enlace,$sql);
      $fila = mysqli_fetch_array($resultado);
      $numero = $fila['num_Control'];
      $nombre = $fila['nombre'];
      $primer_ap = $fila['primerAp'];
      $segundo_ap = $fila['segundoAp'];
      $edad = $fila['edad'];
      $semestre = $fila['semestre'];   
      $carrera = $fila['carrera'];
    }
		
?>

<br>

 <form  method="POST" action="">
    <div class="form-group">
     
          <div class="form-group">
          <label>Nombre:</label>
          <input type="text" class="form-control" name="txt_nombre" value="<?php echo $nombre; ?>">
          <small class="form-text text-muted">Campo obligatorio</small>
        </div>

        <div class="form-group">
          <label>Primera apellido:</label>
          <input type="text" class="form-control" name="txt_primer_ap" value="<?php echo $primer_ap; ?>">
          <small class="form-text text-muted">Campo obligatorio</small>
        </div>

        <div class="form-group">
          <label>Segundo apellido:</label>
          <input type="text" class="form-control" name="txt_segundo_ap" value="<?php echo $segundo_ap; ?>">
          <small class="form-text text-muted">Campo obligatorio</small>
        </div>

        <div class="form-group">
          <label>Edad:</label>
          <input type="text" class="form-control" name="txt_edad" value="<?php echo $edad; ?>">
          <small class="form-text text-muted">Campo obligatorio</small>
        </div>

         <div class="form-group">
          <label>Semestre:</label>
          <input type="text" class="form-control" name="txt_semestre" value="<?php echo $semestre; ?>">
          <small class="form-text text-muted">Campo obligatorio</small>
        </div>
        
         <div class="form-group">
          <label>Carrera:</label>
          <input type="text" class="form-control" name="txt_carrera" value="<?php echo $carrera; ?>">
          <small class="form-text text-muted">Campo obligatorio</small>
        </div>
    <button type="submit" name="actualizar" class="btn btn-primary">Actualizar</button>
  </form>

  <?php
    
    if (isset($_POST['actualizar'])) {
      $actualizar_nombre=$_POST['txt_nombre'];
      $actualizar_primer_ap=$_POST['txt_primer_ap'];
      $actualizar_segundo_ap=$_POST['txt_segundo_ap'];
      $actualizar_edad=$_POST['txt_edad'];
      $actualizar_semestre=$_POST['txt_semestre'];
      $actualizar_carrera=$_POST['txt_carrera'];

      $sql="UPDATE alumnos SET nombre ='$actualizar_nombre',primerAp ='$actualizar_primer_ap',segundoAp ='$actualizar_segundo_ap', edad='$actualizar_edad', semestre='$actualizar_semestre', carrera='$actualizar_carrera' WHERE num_Control='$editar_nc' ";
    
  	
  	  $resultado = mysqli_query($enlace,$sql);
  	  
      if ($resultado) {
        header('Location: modificar_registro.php');
      } else {
        echo "Error de acceso";
    
      }
    }
  ?>
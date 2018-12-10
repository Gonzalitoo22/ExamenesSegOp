
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
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
		require_once('menu_principal.php');

		include("../script/servidor/conexion.php");
    	$h = 'localhost';
    	$u = 'root';
    	$p = '';
    	$bd = 'bd_escuela';

    	$enlace = conexion($h, $u, $p ,$bd);
    	$nc = $_POST['caja_num_control'];
    	$sql = "SELECT * FROM alumnos";
    	if (strlen($nc) >0) {
    		$sql = "SELECT * FROM alumnos WHERE num_Control LIKE '$nc'";
    	}
    	

    	$resultado = mysqli_query($enlace,$sql);

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
                    </tr>
            	</tbody>
    <?php              
    		}
    	}else{
      		echo "No hay registros";
    	}
   
    
	?>
	</table>
    <br>
</body>
</html>
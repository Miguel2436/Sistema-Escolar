<!DOCTYPE html>
<html>
<head>
	<title>Tabla Materia</title>
</head>
<body>
	<form align="center" action="ReadTableMateria.php">
	<input type="submit" value="Actualizar">	
	</form>
	<table align="center">
		<tr>
			<th style="border: 1px solid black">IdMateria</th>
			<th style="border: 1px solid black">Materia</th>
		</tr>
		<?php
			include 'conexion.php';
			$array = array();
			$select = "SELECT * FROM materia";	
			$resultado = mysqli_query($conexion,$select);
			
			while($registro = mysqli_fetch_array($resultado,MYSQLI_ASSOC)){
				$registro['Nombre'] = utf8_encode($registro['Nombre']);

				echo "<tr>";
				echo "<td style='border: 1px solid black; text-align: center;'>".$registro['IdMateria']."</td>";
				echo "<td style='border: 1px solid black; text-align: center;'>".$registro['Nombre']."</td>";
				echo "</tr>";
			}
			mysqli_close($conexion);
		?>
	</table>
	<form align="center" action="formulario.php">
		<input type="submit" value="Volver">	
	</form>
</body>
</html>
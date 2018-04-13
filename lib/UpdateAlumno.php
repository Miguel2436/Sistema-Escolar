<?php session_start();?>
<?php if(!isset($_SESSION['user'])){header("location:/sistemaescolar/iniciarSesion.html");}?>
<!DOCTYPE html>
<html>
<head>
	<title>Modificar Alumno</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="css/estilo2.css">
	<meta name="keywords" content="">
 	<meta charset="utf-8">
 	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
</head>
<body>
	<div class="iniciarSesion">
    	<div class="contenformulario">
			<?php
				include 'conexion.php';
				if(isset($_POST['IdAlumno'])) {
					$IdAlumno = $_POST['IdAlumno'];
					$QueryChecaAlumno = "SELECT IdAlumno FROM Alumno WHERE IdAlumno = '$IdAlumno'";
					$ResultadoQueryChecaAlumno = mysqli_query($conexion, $QueryChecaAlumno);
					if (mysqli_num_rows($ResultadoQueryChecaAlumno) > 0) {
						if (isset($_POST['Nombre'])) {
							$Nombre = utf8_decode($_POST['Nombre']);
							$QueryUpdateNombre = "UPDATE Alumno SET Nombre = '".$Nombre."' WHERE IdAlumno = '$IdAlumno'";
							if (!mysqli_query($conexion, $QueryUpdateNombre)) {
								echo "<script type='text/javascript'>alert('".mysqli_error($conexion)."');</script>";
							}
						}
						if (isset($_POST['Apellido_P'])) {
							$Apellido_P = utf8_decode($_POST['Apellido_P']);
							mysqli_query($conexion, "UPDATE Alumno SET 'Apellido_P' = ''$Apellido_P'' WHERE IdAlumno = '$IdAlumno'");
						}
						if (isset($_POST['Apellido_M'])) {
							$Apellido_M = utf8_decode($_POST['Apellido_M']);
							mysqli_query($conexion, "UPDATE Alumno SET 'Apellido_M' = ''$Apellido_M'' WHERE IdAlumno = '$IdAlumno'");
						}			
					}
					else {
						echo "<script type='text/javascript'>alert('IdAlumno erroneo');</script>";
					}
				}
				$QuerySelectAlumno = "SELECT * FROM Alumno";
				$ResultadoQuerySelectAlumno = mysqli_query($conexion, $QuerySelectAlumno);
				
				echo "<table align='center'> <tr> <th>IdAlumno</th><th>Nombre</th><th>Apellido_P</th><th>Apellido_M</th></tr>";
				while ($Filas = mysqli_fetch_array($ResultadoQuerySelectAlumno, MYSQL_ASSOC)) { 
					echo "<tr><td>".$Filas['IdAlumno']."</td>";
					echo "<td>".utf8_decode($Filas['Nombre'])."</td>";
					echo "<td>".utf8_decode($Filas['Apellido_P'])."</td>";
					echo "<td>".utf8_decode($Filas['Apellido_M'])."</td></tr>";
				}
				echo "</table>";
			?>
			<form align='center' action="UpdateAlumno.php" method="POST">
				<input type="text" name="IdAlumno" placeholder="IdAlumno">
				<input type="text" name="Nombre" placeholder="Nombre">
				<input type="text" name="Apellido_P" placeholder="ApellidoPaterno">
				<input type="text" name="Apellido_M" placeholder="ApellidoMaterno">
				<input type="submit" name="Modificar" value="Modificar">
			</form>
		</div>
	</div>
</body>
</html>

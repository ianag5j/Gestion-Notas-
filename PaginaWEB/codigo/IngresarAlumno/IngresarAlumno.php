<?php
	include_once("../../bd.php");
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Ingresar Alumno</title>
</head>
<body>

	<div>
		<h1>Ingresar Alumno</h1>
	</div>

	<form action="recibeDatosAlumno.php" method="post">

			<div>
				<p>DNI:</p>
				<input type="number" name="DNI" placeholder="DNI alumno"/>

			</div>

			<div>
				<p>nombre:</p>
				<input type="text" name="nombre" placeholder="Su nombre"/>
			</div>

			<div>
				<p>Apellido:</p>
				<input type="text" name="apellido" placeholder="Su apellido"/>
			</div>

			<div>
				<p>Email:</p>
				<input type="email" name="Email" placeholder="Su Email"/>
			</div>

			<div>
				Seleccione su curso:
				<?php
					$consultaCursos = "SELECT * from cursos";
					$resultado = $BD->query($consultaCursos);
					if ($resultado->num_rows > 0) 
					{
					   	echo "<select name='Curso' id='cbxCurso'>";
					   	echo "<option value='0'> Cursos </option>";
					    while($fila = $resultado->fetch_assoc()) 
					    {
					    	echo "<option value=". $fila["id"]."> "	.$fila["anno"]. "º" . $fila["division"] . "  </option>";
					    }
					    echo "</select>";
					} 
				?>
			</div>
			<br>
			<br>
			<input type="submit" name="IngresarAlumno" value="Ingresar Alumno">
	</form>

</body>
</html>

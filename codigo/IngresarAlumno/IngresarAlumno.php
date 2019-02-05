<?php
	include_once("../../bd.php");
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">

	<!--SCRIPT-->
	<script language="javascript" src="../../js/jquery-3.1.1.min.js"></script>

	<!--Framework-->
	<link rel="stylesheet" href="../../css/bootstrap.css">

	<!--Diseño basico-->
	<link rel="stylesheet" href="../../css/diseno.css">

	<title>Ingresar Alumno</title>
</head>
<body>
	<a href="../../index.php"> <img class="imagen"  src="../../Extra\LogoColegio.png" alt="Logo del colegio E.T. N°36" width="100px"> </a> <br>

	<form action="recibeDatosAlumno.php" method="post">
		<div class="container">
			<h1>Ingresar Alumno</h1>
		<div class="form-group">
			<div>
				<p>DNI:</p>
				<input class="form-control " type="number" name="DNI" placeholder="DNI alumno"/>

			</div>

			<div>
				<p>nombre:</p>
				<input class="form-control " type="text" name="nombre" placeholder="Su nombre"/>
			</div>

			<div>
				<p>Apellido:</p>
				<input class="form-control " type="text" name="apellido" placeholder="Su apellido"/>
			</div>

			<div>
				<p>Email:</p>
				<input class="form-control " type="email" name="Email" placeholder="Su Email"/>
			</div>

			<div>
				<label for="Curso">Seleccione su curso:</label>
				<select class="form-control "
				<?php
					$consultaCursos = "SELECT * from cursos";
					$resultado = $BD->query($consultaCursos);
					if ($resultado->num_rows > 0)
					{
					   	echo " name='Curso' id='cbxCurso'>";
					   	echo "<option value='0'> Cursos </option>";
					    while($fila = $resultado->fetch_assoc())
					    {
					    	echo "<option value=". $fila["id"]."> "	.$fila["anno"]. "º" . $fila["division"] . "  </option>";
					    }
					}
				?>
				</select>
			</div>
			<br>
			<br>
			<input class="form-control " type="submit" name="IngresarAlumno" value="Ingresar Alumno">
			</div>
			</div>
	</form>

</body>
</html>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>registrar profesor</title>
</head>
<body>

	<div>
		<h1>Registrar Profesor</h1>
	</div>

	<form action="recibeDatosProfesor.php" method="get">

			<div>
				<p>contraseña:</p>
				<input type="password" name="contraseña" placeholder="Su contraseña"/>

			</div>

			<div>
				<p>repetir contraseña:</p>
				<input type="password" name="contraseñaVerificacion" placeholder="Repetir contraseña"/>
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
			<br>
			<br>
			<input type="submit" name="registrarProfesor" value="registrarse">
	</form>

</body>
</html>

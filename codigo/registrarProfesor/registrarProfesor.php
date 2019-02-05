<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>registrar profesor</title>
	<!--El viewport es para el diseño responsable(osea que
     este para distintos dispositivos, resoluciones)-->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <!--Framework-->
    <link rel="stylesheet" href="../../css/bootstrap.css">

		<!--Diseño basico-->
		<link rel="stylesheet" href="../../css/diseno.css">

	<script language="javascript" src="js/jquery-3.1.1.min.js"></script>
</head>
<body>
	<a href="../../index.php"> <img class="imagen"  src="../../Extra\LogoColegio.png" alt="Logo del colegio E.T. N°36" width="100px"> </a> <br>
	<form action="recibeDatosProfesor.php" method="get">
		<div class="container">
			<h1>Registrar Profesor</h1>
		<div class="form-group">
			<div>
				<p>contraseña:</p>
				<input class="form-control" type="password" name="contraseña" placeholder="Su contraseña"/>

			</div>

			<div>
				<p>repetir contraseña:</p>
				<input class="form-control" type="password" name="contraseñaVerificacion" placeholder="Repetir contraseña"/>
			</div>

			<div>
				<p>nombre:</p>
				<input class="form-control" type="text" name="nombre" placeholder="Su nombre"/>
			</div>

			<div>
				<p>Apellido:</p>
				<input class="form-control" type="text" name="apellido" placeholder="Su apellido"/>
			</div>

			<div>
				<p>Email:</p>
				<input class="form-control" type="email" name="Email" placeholder="Su Email"/>
			</div>
			<br>
			<br>
			<input class="form-control" type="submit" name="registrarProfesor" value="registrarse">
			</div>
			</div>
	</form>
	<script src="../../assests/js/bootstrap.js">
	</script>
</body>
</html>

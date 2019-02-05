<?php
	include_once ("bd.php");
	include_once('codigo/clases/alumno.php');
	include_once('codigo/clases/Nota.php');
?>

<!DOCTYPE html>
<html>
<head>
	<!--El viewport es para el diseño responsable(osea que
     este para distintos dispositivos, resoluciones)-->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <!--Framework-->
    <link rel="stylesheet" href="css/bootstrap.css">

		<!--Diseño basico-->
		<link rel="stylesheet" href="../../css/diseno.css">

	<script language="javascript" src="js/jquery-3.1.1.min.js"></script>
	<meta charset="utf-8">
	<title></title>
	<script language="javascript">
			$(document).ready(function(){
				$("#cbxCurso").change(function () {

					$("#cbxCurso option:selected").each(function () {
						id = $(this).val();
						$.post("getMateria.php", { id: id }, function(data){
							$("#cbxMateria").html(data);
						});
					});
				})
			});
	</script>
</head>
<body>
	   <!-- Titulo -->
    <h1><div class="Titulo"> </div>Escuela Tecnica N°36 D.E. 15 "Almirante Guillermo Brown"</h1>

    <!-- Barra Navegacion -->
     <nav class="navbar navbar-expand-sm navbar-expand-md navbar-expand-lg navbar-light bg-light">
  		<a class="navbar-brand" href="codigo/registrarProfesor/registrarProfesor.php">Registrarse</a>
  		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    	<span class="navbar-toggler-icon"></span>
  		</button>

  		<div class="collapse navbar-collapse" id="navbarSupportedContent">
    	<ul class="navbar-nav mr-auto">
      		
					<li class="nav-item active">
        	<a class="navbar-brand" href="codigo/ingresarAlumno/ingresarAlumno.php">Agregar Alumno <span class="sr-only">(current)</span></a>
      		</li>
					<li class="nav-item">
        	<a class="navbar-brand" href="codigo/modificarAlumno/modificarAlumno.php">Modificar Alumno</a>
      		</li>
      		<li class="nav-item">
       		<a class="navbar-brand" href="codigo/subirNota/subirNota.php">Subir Notas</a>
      		</li>
      		<li class="nav-item">
        	<a class="navbar-brand" href="VerProfesor.html">Ver Profesor</a>
      		</li>
      		<li class="nav-item">
        	<form id="verNotasMateria" name="verNotasMateria" action="codigo/verNotasXMateria/recibeDatosVerNotasMateria.php" method="POST">
			<div>
			<?php
				$consultaCursos = "SELECT * from cursos";
				$resultado = $BD->query($consultaCursos);
				if ($resultado->num_rows > 0)
				{
				   	echo "<select class='form-control' name='idCurso' id='cbxCurso'>";
				   	echo "<option value='0'> Cursos </option>";
				    while($fila = $resultado->fetch_assoc())
				    {
				    	echo "<option value=". $fila["id"]."> "	.$fila["anno"]. "º" . $fila["division"] . "  </option>";
				    }
				    echo "</select>";
				}
			?>
			</div>
			</li>
			<li>
			<div>
				<select class="form-control" name="idMateria" id="cbxMateria"></select>
			</div>
			<li>
			<input type="submit" id="verNotasMateria" name="verNotasMateria" value="Ver Notas" />
			</li>
			</form>
			</li>



    	</ul>
    	</div>
	</nav>
	<img class="imagenindex" src="Extra\LogoColegio.png" alt="Logo del colegio E.T. N°36"> <br>



	<script src="../../assests/js/bootstrap.js">
	</script>

	<img width="100px" align="right" src="../../extra/frog.gif" alt="meme piola" id="memepiola">
</body>
</html>

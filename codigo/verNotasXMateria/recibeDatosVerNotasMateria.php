<?php
	include_once("../clases/materia.php");
	include_once("../../bd.php");
	$idMateria = $_POST['idMateria'];
	$idCurso = $_POST['idCurso'];
	if ($idCurso = 0 or $idMateria = 0)	//redirige a la pag anterior si esta vacio un valor
	{
		 echo '<meta http-equiv="Refresh" content="1;url=../../index.php">';
            echo '<script language="javascript">alert("Seleccione un curso y una materia.");</script>';
	}
?>


<html>
<head>
	<meta charset="utf-8">
	<!--El viewport es para el diseño responsable(osea que
     este para distintos dispositivos, resoluciones)-->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <!--Framework-->
    <link rel="stylesheet" href="../../assets/css/bootstrap.css">
		<!--Diseño basico-->
		<link rel="stylesheet" href="../../css/diseno.css">

	<?php
		$idMateria = $_POST['idMateria'];
		$resultadoNombreCurso = $BD->query("select nombre from materias where idMaterias = $idMateria");
		if ($resultadoNombreCurso->num_rows > 0) {
			while ($fila = $resultadoNombreCurso->fetch_assoc()) {
				$nombreCurso = $fila["nombre"];
				echo "<title>Notas de $nombreCurso </title>";
			}
		}
	?>

</head>
<body>
	<a href="../../index.php"> <img class="imagen"  src="../../Extra\LogoColegio.png" alt="Logo del colegio E.T. N°36" width="100px"> </a> <br>

	<?php

	$idMateria = $_POST['idMateria'];
	$idCurso = $_POST['idCurso'];

	$AlumnosDelCurso = "select * from alumnos where cursos_id = $idCurso order by apellido";
	$resultadoAlumno = $BD->query($AlumnosDelCurso);
	if ($resultadoAlumno->num_rows > 0)
	{
		$cantMaxNotas1 = 0; 
	    while($fila = $resultadoAlumno->fetch_assoc())
	    {
	    	$dni = $fila["DNI"];

	    	$consultaCantNotas = "select count(*) from notas where alumnos_DNI =$dni and trimestre = 1";
	    	$resultadoCantNotas = $BD->query($consultaCantNotas);
	    	while($fila = $resultadoCantNotas->fetch_assoc())
	    	{
	    		$cantidadNotas = $fila["count(*)"];
	    		if($cantidadNotas> $cantMaxNotas1)
	    		{
	    			$cantMaxNotas1 = $cantidadNotas;
	    		}
	    	}
	    }
	}

	if ($resultadoAlumno->num_rows > 0)
	{
		$cantMaxNotas2 = 0; 
	    while($fila = $resultadoAlumno->fetch_assoc())
	    {
	    	$dni = $fila["DNI"];

	    	$consultaCantNotas2 = "select count(*) from notas where alumnos_DNI =$dni and trimestre = 2";
	    	$resultadoCantNotas2 = $BD->query($consultaCantNotas2);
	    	while($fila = $resultadoCantNotas2->fetch_assoc())
	    	{
	    		$cantidadNotas2 = $fila["count(*)"];
	    		if($cantidadNotas2> $cantMaxNotas2)
	    		{
	    			$cantMaxNotas2 = $cantidadNotas2;
	    		}
	    	}
	    }
	}

	if ($resultadoAlumno->num_rows > 0)
	{
		$cantMaxNotas3 = 0; 
	    while($fila = $resultadoAlumno->fetch_assoc())
	    {
	    	$dni = $fila["DNI"];

	    	$consultaCantNotas3 = "select count(*) from notas where alumnos_DNI =$dni and trimestre = 3";
	    	$resultadoCantNotas3 = $BD->query($consultaCantNotas3);
	    	while($fila = $resultadoCantNotas3->fetch_assoc())
	    	{
	    		$cantidadNotas3 = $fila["count(*)"];
	    		if($cantidadNotas3> $cantMaxNotas3)
	    		{
	    			$cantMaxNotas3 = $cantidadNotas3;
	    		}
	    	}
	    }
	}

	echo "$cantMaxNotas1";

	echo "<div class='container'>
		<div class='table-responsive'>
			<table class='table table-bordered table-hover table-condensed'>
			<thead class='thead-dark'>
          <tr class='info'>
            <th>#</th>
            <th>Apellido</th>
            <th>Nombre</th>
            <th colspan='$cantMaxNotas1' >1º Trimestre</th>
            <th colspan='$cantMaxNotas2'>2º Trimestre</th>
            <th colspan='$cantMaxNotas3'>3º Trimestre</th>
          </tr>
        </thead>";
        

	$idMateria = $_POST['idMateria'];
	$idCurso = $_POST['idCurso'];


	echo "<h1>Notas:</h1> <br>";
	$AlumnosDelCurso = "select * from alumnos where cursos_id = $idCurso order by apellido";
	$resultadoAlumno = $BD->query($AlumnosDelCurso);
	if ($resultadoAlumno->num_rows > 0)
	{
		$cont=0;
	    while($fila = $resultadoAlumno->fetch_assoc())
	    {

	    	$cont = $cont+1;
	    	$apellido = $fila["Apellido"];
	    	$nombre = $fila["Nombre"];
	    	

	    	echo "<tbody>
	          	<tr>
	            <th scope='row'>$cont</th>
	            <td> $apellido</td>
	            <td> $nombre</td>
	            ";
	    	$DNI = $fila["DNI"];

	    	//primer trimestre
	    	$consultaNotaPrimer = "select * from notas where alumnos_dni = $DNI and trimestre = 1";
	    	$resultadoNotaPrimer = $BD->query($consultaNotaPrimer);
	    	if ($resultadoNotaPrimer->num_rows > 0)
			{
				//----------------------En proceso---------------------------
				//espacio en blanco para las notas
				$cantNotasAlumno = "select count(*) from notas where alumnos_DNI = $DNI";
				$resultadocantNotasAlumno1 = $BD->query($cantNotasAlumno);
				while ($fila = $resultadocantNotasAlumno1->fetch_assoc()) 
				{
					$cantidadNotasAlumno1 = $fila["cont(*)"];

					$notasSubidasAlumno = 0;
				    while($fila = $resultadoNotaPrimer->fetch_assoc())
				    {	
				    	$puntaje = $fila["puntaje"];
				    	echo "<td>
				    		$puntaje
				    		";
				    	$notasSubidasAlumno = $notasSubidasAlumno +1;
					}
				}
			   	
				
	    		echo"</td>";
	    		
	    	}

	    	//segundo trimestre

	    	$consultaNotaSegundo = "select * from notas where alumnos_dni = $DNI and trimestre = 2";
	    	$resultadoNotaSegundo = $BD->query($consultaNotaSegundo);
	    	if ($resultadoNotaSegundo->num_rows > 0)
			{
			   	
			    while($fila = $resultadoNotaSegundo->fetch_assoc())
			    {	
			    	$puntaje = $fila["puntaje"];
			    	echo "<td>
			    		$puntaje
			    		";
				}
	    		echo"</td>";
	    	}

	    	//Tercer trimestre

	    	$consultaNotaTercero = "select * from notas where alumnos_dni = $DNI and trimestre = 3";
	    	$resultadoNotaTercero = $BD->query($consultaNotaTercero);
	    	if ($resultadoNotaTercero->num_rows > 0)
			{
			   	
			    while($fila = $resultadoNotaTercero->fetch_assoc())
			    {	
			    	$puntaje = $fila["puntaje"];
			    	echo "<td>
			    		$puntaje
			    		";
				}
	    		echo"</td>";
	    	}

	    	echo "</tr>
	    	 </tbody>";
	}
}
	else
	{
		echo "NO se encontraron notas para la materia";
	}
	/*
	$materia = new materia($idMateria,$BD);
	$materia->verNotasmateria($BD);
	*/

?>

				</table>
		</div>
	</div>
	<script src="../../assests/js/bootstrap.js">
	</script>
</body>
</html>

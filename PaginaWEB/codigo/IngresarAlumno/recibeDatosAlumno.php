<?php
	include_once("../../BD.php");
	$DNI = $_POST['DNI'];
	$nombre = $_POST['nombre'];
	$apellido = $_POST['apellido'];
	$Email = $_POST['Email'];
	$idCurso   = $_POST['Curso'];

	if($DNI>0 and $nombre!='' and $apellido!='' and $Email!='' and $idCurso!=0)
		{
			$insert = "insert into alumnos values($DNI,'$nombre','$apellido','$Email',$idCurso)";
			if ($BD->query($insert)) {
				echo "alumno ingesado a la BD";
			}
			else
			{
				echo "error al ingresar al alumno intentelo de nuevo";
				header("Location: ingresarAlumno.php");
			}
		}
	else
		{
			echo "Rellene todos los campos";
			header("Location: ingresarAlumno.php");
		}


?>

<?php

//obtener los datos del profesor que se esta registrando
	$contraseña = $_GET['contraseña'];
	$contraseñaVerificacion = $_GET['contraseñaVerificacion'];
	$nombre = $_GET['nombre'];
	$apellido = $_GET['apellido'];
	$Email = $_GET['Email'];
//obtiene el boton que toco
	include_once("../clases/Profesor.php");
	include_once("../../BD.php");
	$accion = $_GET['registrarProfesor'];

	if($contraseña!='' and $nombre!='' and $contraseñaVerificacion!='' and $apellido!='' and $Email!='')
		{
			if($contraseña==$contraseñaVerificacion)
			{
				$profe = new Profesor($nombre, $apellido, $contraseña, $Email);
				$profe->agregarBD($BD);
			}
			else
			{
				echo "Las contraseñas no coinciden";
				header("Location: registrarProfesor.php");
				echo '<script language="javascript"> alert("Las contraseñas no coinciden"); </script>'; //NO SALE ALERTA A PULIR
			}
		}
	else
		{
			echo "Rellene todos los campos";
			header("Location: registrarProfesor.php");
		}


?>

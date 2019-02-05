<?php
	include_once("../clases/materia.php");
	include_once("../../bd.php");
	$idMateria = $_POST['idMateria'];
	$idCurso = $_POST['idCurso'];
	if ($idCurso != 0 and $idMateria != 0) 
	{
		echo "<h1>Notas:</h1> <br>";
		$materia = new materia($idMateria,$BD);
		$materia->verNotasmateria($BD);
	}
	else
	{
		header("Location: ../../index.php");
	}
?>
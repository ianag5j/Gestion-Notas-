<?php
	
	include_once 'bd.php';
	
	$idCurso = $_POST['id'];
	//Q2echo "$idCurso";
	$consultaMaterias = "SELECT idMaterias,nombre FROM materias WHERE cursos_id = '$idCurso' ORDER BY nombre";
	$resultadoMaterias = $BD->query($consultaMaterias);
	$html= "<option value='0'>Materias</option>";
	
	while($rowM = $resultadoMaterias->fetch_assoc())
	{
		$html.= "<option value='".$rowM['idMaterias']."'>".$rowM['nombre']."</option>";
	}
	
	echo $html;
?>		
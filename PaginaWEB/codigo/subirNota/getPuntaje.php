<?php
	$idTipos = $_POST['idTipos'];
	echo "$idTipos";

	$html= "<option value='0'>Puntaje</option>";

	if($idTipos==1)
	{

		for ($i=1; $i < 11; $i++) 
		{ 
			$html.="<option value='$i'> $i </option>";
		}
		
	}
	else
	{
		$html.="<option value='regular'> Regular </option>";
		$html.="<option value='bien'> Bien </option>";
		$html.="<option value='muy bien'> Muy Bien </option>";
	}
	echo $html;
?>		
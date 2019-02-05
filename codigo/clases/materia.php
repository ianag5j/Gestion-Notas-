<?php
	
	include_once("nota.php");

	class materia
	{
		private $idMateria;
		private $nombre;
		private $cursosId;
		private $profesorPass;

		private $notas;
		function __construct($idMateria,$BD)
		{
			$this->idMateria = $idMateria;
			$consultaMateria = "select nombre,cursos_id,profesores_Pass from materias where idMaterias = $idMateria";
			$resultadoMateria = $BD->query($consultaMateria);
			if ($resultadoMateria->num_rows > 0) 
			{
			    while($fila = $resultadoMateria->fetch_assoc()) 
			    {
					$this->nombre =$fila["nombre"];
					$this->cursosId =  $fila["cursos_id"];
					$this->profesorPass = $fila["profesores_Pass"];
			    }

			    /*
			    PARA IMPLEMENTACION (Array de objetos)
			    $consultaNotas = "select idNotas from notas where materias_id = $idMateria";
			    $resultadoNotas = $BD->query($consultaNotas);
			    if ($resultadoNotas->num_rows > 0) 
			    {
			    	$i = NULL;
			    	while($filaNota = $resultadoNotas->fetch_assoc()) 
				    {
				    	$nota = $i+1;
						$nota = new nota($filaNota["idNotas"]);
						$notas.=$nota;
				    }
			    }
			    */
			}
			else
			{
				echo "Materia no encontrada";
			}
		}

		public function verNotasmateria ($BD)
		{
			$consultaNotas = "select idNotas from notas where materias_id = $this->idMateria";
			$resultado = $BD->query($consultaNotas);
			if($resultado->num_rows > 0)
			{
				while($filaNota = $resultado->fetch_assoc()) 
			    {
			    	$idNota = $filaNota["idNotas"];
					$nota = new nota($idNota,$BD);
					$nota->MostrarNota();
			    }
			}
			else
			{
				echo "0 notas subidas";
			}
		}
	}

?>
<?php

	class Curso
	{
		private $idCurso;
		private $anno;
		private $division;

		function __construct($idCurso,$BD)
		{
			$this->idCurso = $idCurso;
			$consultaIdCurso = $BD->query("select anno,division from cursos where id=$idCurso");
		    if ($consultaIdCurso->num_rows > 0) 
		    {
		        while ($fila = $consultaIdCurso->fetch_assoc()) 
		        {
		          $this->anno = $fila["anno"];
		          $this->division = $fila["division"];
		        }
		    }
		}

		//Gets

		public function getIdCurso()
		{
			return $idCurso;
		}

		public function getAnno()
		{
			return $anno;
		}

		public function getDivision()
		{
			return $division;
		}
	}
?>
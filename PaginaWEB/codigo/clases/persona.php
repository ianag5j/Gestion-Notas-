<?php
	/**
	* 
	*/
	class persona
	{
	
		private $nombre;
		private $apellido;
		private $dni;
		private $telefono;
		
		public function cargarFromDB($bd,$dni)
		{
			$consulta = query("SELECT * FROM persona WHERE dni=$dni");
			if($bd->$consulta !=1)
			{
				echo "0 reultados";
			}
			else
			{

			}
		}

		public function __construct($nombre,$apellido,$dni,$telefono)
		{
			$this->nombre = $nombre;
			$this->apellido = $apellido;
			$this->dni = $dni;
			$this->telefono = $telefono;
		}
		
		public function agregar($bd)
		{
			if($bd -> query("insert into persona values ('$this->dni', '$this->nombre', '$this->apellido', '$this->telefono');") != 1)
			{
				echo("no se pudo ingresar los datos");
			}
		}

		public function borrar($bd)
		{
			if($bd -> query("delete from persona where dni='$this->dni'") !=1)
			{
				echo("no se pudo boorar a la persona");
			}
		}
		
		static public function mostrarTodaspersonas($bd)
		{
			$consulta = "SELECT * from persona";
			$resultado = $bd->query($consulta);

			if ($resultado->num_rows > 0) {
			   
			    while($fila = $resultado->fetch_assoc()) {
			        echo "Nombre: " . $fila["nombre"]. " - Apellido: " . $fila["apellido"]. " DNI:" . $fila["dni"]. "<br> <hr>";
			    }
			} 
			else 
			{
			    echo "0 results";
			}
		}
		
		public function mostrarPersona($bd)
		{
			$consulta = "SELECT * from persona where dni='$this->dni'";
			$resultado = $bd->query($consulta);

			if ($resultado->num_rows > 0) {

			   	
			    while($fila = $resultado->fetch_assoc()) {
			    echo "Nombre: " . $fila["nombre"]. " - Apellido: " . $fila["apellido"]. " DNI:" . $fila["dni"]. "<br> <hr>";
			    }
			} 
			else 
			{
			    echo "0 results";
			}
		}

		public function saludar()
		{
			echo "hola soy $this->nombre";
		}

		public function setNombre($nombre)
		{
			$this->nombre = $nombre;
		}

		public function getNombre()
		{
			return $nombre;
		}

		public function chau()
		{
			echo "NV by: $this->nombre";	
		}
	}

?>
<?php
  class Profesor
  {
    private $nombre;
    private $apellido;
    private $contrasenna;
    private $Email;



    /*
    private $materias = ['materias' => getArrayMaterias() ];

    foreach ($materias as $materia) {
      echo $materia->nombre;
    }
    */
    public function __construct($nombre, $apellido, $contrasenna, $Email)
    {
      $this->Email = $Email;
      $this->nombre = $nombre;
      $this->apellido = $apellido;
      $this->contrasenna = $contrasenna;
    }

    static public function mostrarTodas($BD)
		{
			$r = $BD ->query("SELECT * FROM Profesor");
			$i=0;
			while ($fila=$r ->fetch_array())
			{
				echo "El alumno solicitado es: $fila[1] $fila[2] con DNI:$fila[0], con E-mail:$fila[3] <br><hr>";
			}
		}

    public function agregarBD($BD)
    {
      $sqlInsert=("INSERT INTO profesores VALUES('$this->contrasenna','$this->nombre','$this->apellido','$this->Email')" );

      if  ($BD->query($sqlInsert) === TRUE)
      {
        echo "<br> ||Se creo un nuevo usuario $this->nombre|| <br>";
      }
      else
      {
        echo "Error ". $sqlInsert ."<br>". $BD->error;
      }
    }
  }

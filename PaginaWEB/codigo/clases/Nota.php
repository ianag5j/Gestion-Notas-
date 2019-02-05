<?php

  include_once("/../../bd.php");
  include_once("alumno.php");
 class Nota
 {

 	//ATRIBUTOS
  private $idNotas;
 	private $puntaje;
 	private $trimestre;
  private $alumnos_dni;
  private $idMaterias;
  private $idTipos;
  //alumno
  private $alumno;
 	//CONSTRUCTOR

 	function __construct($idNotas,$BD)
 	{
 		  $this->idNotas = $idNotas;
      $consultaNotas = "select puntaje,trimestre,alumnos_dni,materias_id,tipos_id from notas where idNotas = $idNotas";
      $resultado = $BD->query($consultaNotas);
      if ($resultado->num_rows > 0) 
      {
        while($fila = $resultado->fetch_assoc()) 
        {
          $this->puntaje = $fila["puntaje"];
          $this->trimestre =  $fila["trimestre"];
          $this->alumnos_dni = $fila["alumnos_dni"];
          $this->idMaterias = $fila["materias_id"];
          $this->idTipos = $fila["tipos_id"];
        }

        $this->alumno = new alumno($this->alumnos_dni,$BD);
      }
      else
      {
        echo "Nota no encontrada";
      }
 	}

 	//METODOS

  public function MostrarNota()
  {
    $alumno = $this->alumno;
    $alumno->mostrarfila();
    echo " puntaje: $this->puntaje <br>";
  }

 	public function agregarNota ($bd)
  {

    $sqlINSERT_NOTAS="INSERT INTO Nota VALUES($this -> trimestre, $this -> puntaje, '$this -> materia', $this -> promedio)" ;

      echo "----------------------------------------------<br>";

    if  ($bd->query($sqlINSERT_NOTAS)=== TRUE)
    {

      echo "<br> Se agrego una nueva Nota: <br>";

    } else
    {

      echo "Error ". $sqlINSERT ."<br>". $bd->error;

    }

      echo "----------------------------------------------<br>";
  }

  public function eliminarNota ($bd,$ID)
  {
    $sqlDELETE="DELETE FROM Nota WHERE ID='$ID'";

    echo "----------------------------------------------<br>";

    if ($bd->query($sqlDELETE)===TRUE)
    {

      echo " <br> Se elimino la Nota: <br>";

    }else
    {

      echo "Error " . $sql . "<br> " . $bd->error;

    }

      echo "----------------------------------------------<br>";
	}

  public function actualizarNota ($bd,$puntaje, $ID)
  {
    $sqlUpdate = "UPDATE Nota SET puntaje = 'puntaje' WHERE dni = 'PARAMETRO_A_ESPERAR'";

    	echo "----------------------------------------------<br>";

    if($bd->query($sqlUpdate) === TRUE)
    {

      echo "<br> Se modifico la Nota <br>";

    }
    else
    {

        echo "Error " . $sqlUpdate . "<br>" . $bd->error;

    }

    	echo "----------------------------------------------<br>";
  }

  static public function mostrarTodasNotas ($bd)
  {

    $r=$bd->query("select * from Notas");
    $i=0;
    while($fila=$r->fetch_array())
    {
      $n[$i] = new Notas($fila['Trimestre'],$fila['promedio']);
      $n[$i]->mostrarfila();
      echo "<br>";
      $i++;
    }
  }
 }
?>

<?php
  include_once("Curso.php");

class alumno 
{
	private $dni;
	private $nombre;
	private $apellido;
	private $email;
	//curso:
  private $curso;

	
  public function __construct($dni,$BD)
  {
    $consultaDNI = $BD->query("select dni,nombre,apellido,email,cursos_id from alumnos where dni=$dni;");
        
    if ($consultaDNI->num_rows > 0) 
    {
      while ($fila = $consultaDNI->fetch_assoc()) 
      {
        $this->dni = $fila["dni"];
        $this->nombre = $fila["nombre"];
        $this->apellido = $fila["apellido"];
        $this->email = $fila["email"];
        $idCurso = $fila["cursos_id"];
      }

      $curso = new curso($idCurso,$BD);
    }

  }

	public function cargarAlumno ($bd)
	{
    	$INSERTALUMNO="INSERT INTO Alumno VALUES($this->dni, '$this->nombre', '$this->apellido', '$this->mail)'" ;
    	if  ($bd->query($INSERTALUMNO)=== TRUE)
    	{
      	echo "<br> Se creo un nuevo usuario: <br>";
      	echo "----------------------------------------------<br>";
    	}else 
    	{
      	echo "Error ". $INSERTALUMNO ."<br>". $bd->error;
    	}
  }

    public function eliminarAlumno ($bd,$dni) 
 	{
      $DELETE="DELETE FROM Alumno WHERE dni='$dni'";
        echo "----------------------------------------------<br>";
      if ($bd->query($DELETE)===TRUE) 
      {
        echo " <br> Se elimino al Alumno: <br>";
      }else
      {
        echo "Error " . $DELETE . "<br> " . $bd->error;
      }
        echo "----------------------------------------------<br>";
  }

	public function mostrarfila()
	{
    echo "$this->nombre $this->apellido $this->dni $this->email";
  }

  static public function mostrartodoslosAlumnos ($bd)
  {
    $r=$bd->query("select * from Alumno");
    $i=0;
    while($fila=$r->fetch_array())
    {
      $p[$i] = new Alumno($fila['nombre'],$fila['apellido'],$fila['dni'],$fila['email']);
      $p[$i]->mostrarfila();
      echo "<br>";
      $i++;
    }
  }

//UPDATES
  public function updatearAlumnoNombre($bd,$dni,$nombre)
  {
    $UPDATE="UPDATE Alumno SET nombre=$nombre WHERE dni=$dni";
    if ($bd->query($UPDATE)===TRUE) {
      echo " <br> Se actualizo nombre: <br>";
      echo "----------------------------------------------<br>";
    }else 
    {
      echo "Error " . $UPDATE . "<br> " . $bd->error;
    }
  }

  public function updatearAlumnoApellido($bd,$dni,$apellido)
  {
    $UPDATE="UPDATE Alumno SET apellido=$apellido WHERE dni=$dni";
    if ($bd->query($UPDATE)===TRUE) {
      echo " <br> Se actualizo el apellido: <br>";
      echo "----------------------------------------------<br>";
    }else 
    {
      echo "Error " . $UPDATE . "<br> " . $bd->error;
    }
  }

  public function updatearAlumnoEmail($bd,$dni,$mail)
  {
    $UPDATE="UPDATE Alumno SET mail=$mail WHERE dni=$dni";
    if ($bd->query($UPDATE)===TRUE) {
      echo " <br> Se actualizo el mail: <br>";
      echo "----------------------------------------------<br>";
    }else 
    {
      echo "Error " . $UPDATE . "<br> " . $bd->error;
    }
  }

  public function updatearAlumnoDNI($bd,$dni,$dni1)
  {
    $UPDATE="UPDATE Alumno SET dni=$dni1 WHERE dni=$dni";
    if ($bd->query($UPDATE)===TRUE) {
      echo " <br> Se actualizo: <br>";
      echo "----------------------------------------------<br>";
    }else 
    {
      echo "Error " . $UPDATE . "<br> " . $bd->error;
    }
  }

}
?>
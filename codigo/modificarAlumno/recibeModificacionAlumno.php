<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <?php
      include_once("../../BD.php");
      $DNI = $_POST['DNI'];
      $nombre = $_POST['nombre'];
      $apellido = $_POST['apellido'];
      $Email = $_POST['Email'];
      $idCurso   = $_POST['Curso'];

      if(empty($DNI) || empty($nombre) || empty($apellido) || empty($Email) || empty($idCurso))
      {
        echo '<meta http-equiv="Refresh" content="1;url=modificarAlumno.php">';
        echo '<script language="javascript">alert("Rellene todas las casillas");</script>';
      }
      else {
        $consultaDNI = "SELECT DNI FROM alumnos WHERE DNI = '$DNI'";
        $resultado = $BD->query($consultaDNI);
        
        if ($resultado->num_rows > 0)
				{
				    while($fila = $resultado->fetch_assoc())
				    {
				    	 $DNIbd = $fila["DNI"];
				    }
				}

        if ($DNIbd == $DNI) {

          $updateAlumno = "UPDATE alumnos SET Nombre = '$nombre', Apellido = '$apellido', Email = '$Email', cursos_id = '$idCurso' WHERE DNI = '$DNI'";
          $BD->query($updateAlumno);
          echo '<meta http-equiv="Refresh" content="1;url=../../index.php">';        
          echo '<script language="javascript">alert("Se actualizaron los datos correctamente");</script>';
          }
        else {
          echo '<meta http-equiv="Refresh" content="1;url=modificarAlumno.php">';
          echo '<script language="javascript">alert("EL DNI no coincide con ningún alumno.");</script>';
          
        }
      }
     ?>
  </body>
</html>

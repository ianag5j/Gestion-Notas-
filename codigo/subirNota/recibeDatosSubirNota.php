<?php

$idCurso   = $_POST['cbxCurso'];
$idMateria = $_POST['cbxMateria'];
$idTipo    = $_POST['cbxTipos'];
$puntaje   = $_POST['cbxPuntuacion'];
$trimestre = $_POST['trimestre'];
$dniAlumno = $_POST['dniAlumno'];
$pass      = $_POST['pass'];

include '../../BD.php';
include '../clases/alumno.php';

if ($idCurso != 0 and $idMateria != 0 and $idTipo != 0 and $puntaje != '' and $trimestre != 0 and $dniAlumno != 0  and $pass != '') 
{
    $consultaPass = $BD->query("select profesores_pass from materias where idMaterias= $idMateria");
    
    if ($consultaPass->num_rows > 0) 
    {
        while ($fila = $consultaPass->fetch_assoc()) 
        {
            $passBD = $fila["profesores_pass"];
        }
    }
    
    if ($passBD == $pass) 
    {
        $consultaDNI = $BD->query("select dni from alumnos where dni=$dniAlumno and cursos_id = $idCurso;");
        
        if ($consultaDNI->num_rows > 0) 
        {
            while ($fila = $consultaDNI->fetch_assoc()) 
            {
                $dniBD = $fila["dni"];
            }
        }
        
        
        if ($dniBD == $dniAlumno) 
        {
           
            $BD->query("insert into notas(puntaje,trimestre,materias_id,tipos_id,alumnos_dni) values('$puntaje',$trimestre,$idMateria,$idTipo,$dniAlumno)");
            echo '<meta http-equiv="Refresh" content="1;url=../../index.php">';
            echo '<script language="javascript">alert("Nota subida correctamente.");</script>';
        }
        else
        {
            echo '<meta http-equiv="Refresh" content="1;url=subirNota.php">';
            echo '<script language="javascript">alert("DNI inexistente.");</script>';
        }
        
    } 
    else 
    {
        echo '<meta http-equiv="Refresh" content="1;url=subirNota.php">';
        echo '<script language="javascript">alert("Contraseña incorrecta.");</script>';
    }
    
} 
else 
{
    echo '<meta http-equiv="Refresh" content="0;url=subirNota.php">';
    echo '<script language="javascript">alert("Rellene todas las casillas.");</script>';

 }

?>
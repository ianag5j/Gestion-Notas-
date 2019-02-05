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


if ($idCurso != 0 and $idMateria != 0 and $idTipo != 0 and $puntaje != 0 and $trimestre != 0 and $dniAlumno != '' and $pass != '') 
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
            echo "Nota subida";
            $BD->query("insert into notas(puntaje,trimestre,materias_id,tipos_id,alumnos_dni) values('$puntaje',$trimestre,$idMateria,$idTipo,$dniAlumno)");
        }
        
    } 
    else 
    {
        echo "Contraseña incorrecta";
    }
    
} 
else 
{
    header("Location: subirNota.php");

 }

?>
<?php
	include_once("../../bd.php");
?>
<html>
	<head>
		<title>Subir nota</title>
		
		<script language="javascript" src="../../js/jquery-3.1.1.min.js"></script>
		
		<!-- codigo para mostrar las materias dependiendo el curso -->
		<script language="javascript">
			$(document).ready(function(){
				$("#cbxCurso").change(function () {
					
					$("#cbxCurso option:selected").each(function () {
						id = $(this).val();
						$.post("getMateria.php", { id: id }, function(data){
							$("#cbxMateria").html(data);
						});            
					});
				})
			});
		</script>
		<!-- codigo para mostrar los puntajes dependiendo el tipo de nota -->
		<script language="javascript">
			$(document).ready(function(){
				$("#cbxTipos").change(function () {
					
					$("#cbxTipos option:selected").each(function () {
						idTipos = $(this).val();
						$.post("getPuntaje.php", { idTipos: idTipos }, function(data){
							$("#cbxPuntuacion").html(data);
						});            
					});
				})
			});
		</script>		
	</head>
	
	<body>
		<h1>Subir Nota</h1>
		<form id="subirNota" name="subirNota" action="recibeDatosSubirNota.php" method="POST">
			<!-- mostrar los cursos -->
			<div>
				Seleccione su curso:
				<?php
					$consultaCursos = "SELECT * from cursos";
					$resultado = $BD->query($consultaCursos);
					if ($resultado->num_rows > 0) 
					{
					   	echo "<select name='cbxCurso' id='cbxCurso'>";
					   	echo "<option value='0'> Cursos </option>";
					    while($fila = $resultado->fetch_assoc()) 
					    {
					    	echo "<option value=". $fila["id"]."> "	.$fila["anno"]. "º" . $fila["division"] . "  </option>";
					    }
					    echo "</select>";
					} 
				?>
			</div>
			<br>
			<!-- mostrar materias dependiendo del curso elegido -->
			<div>
				Seleccione una Materia :
				<select name="cbxMateria" id="cbxMateria"></select>
			</div>
			<!-- mostrar los tipos de notas -->
			<div>
				Seleccione el tipo de ...
				<?php
					$consultaTipos = "SELECT * from tipos";
					$resultadoTipos = $BD->query($consultaTipos);
					if ($resultadoTipos->num_rows > 0) 
					{
					   	echo "<select name='cbxTipos' id='cbxTipos'>";
					   	echo "<option value='0'> Tipos </option>";
					    while($fila = $resultadoTipos->fetch_assoc()) 
					    {
					    	echo "<option value=". $fila["idTipos"]."> " .$fila["tipo"]. " </option>";
					    }
					    echo "</select>";
					} 
				?>
			</div>
			<!-- mostrar las puntuaciones dependiendo del tipo de nota elegido -->
			<div>
				Seleccione una Puntuacion : 
				<select name="cbxPuntuacion" id="cbxPuntuacion"></select>
			</div>
			<!-- mostrar trimestres -->
			<div>
				Seleccione el trimestre :
				<select name="trimestre" id="trimestre">
					<option value="0">Trimestres</option>
					<option value="1">1</option>
					<option value="2">2</option>
					<option value="3">3</option>
				</select>
			</div>
			<!-- ingresar dni alumno y contraseña profesor-->
			<div>
				ingrese DNI alumno:	
				<input type="text" name="dniAlumno" placeholder="DNI"/>
				<br>
				ingrese contraseña:  
				<input type="password" name="pass" placeholder="Contraseña Profesor"/>
			</div>
			

			<input type="submit" id="enviar" name="enviar" value="Subir Nota " />
		</form>
	</body>
</html>

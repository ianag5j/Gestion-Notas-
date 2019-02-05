<?php
	include_once("../../bd.php");
?>
<html>
	<head>
		<title>Subir nota</title>
		<meta charset="utf-8">
		<script language="javascript" src="../../js/jquery-3.1.1.min.js"></script>
		<!--El viewport es para el diseño responsable(osea que
	     este para distintos dispositivos, resoluciones)-->
	    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

	    <!--Framework-->
	    <link rel="stylesheet" href="../../css/bootstrap.css">

			<!--Diseño basico-->
			<link rel="stylesheet" href="../../css/diseno.css">

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

		<a href="../../index.php"> <img class="imagen"  src="../../Extra\LogoColegio.png" alt="Logo del colegio E.T. N°36" width="100px"> </a> <br>

		<div class="container">
			<h1>Subir Nota</h1>
      <br>

      <form id="subirNota" name="subirNota" action="recibeDatosSubirNota.php" method="POST">

					<!--Selecciona el CURSO-->
        <div class="form-group">
          <label for="nota">Curso:</label>
				<?php
					$consultaCursos = "SELECT * from cursos";
					$resultado = $BD->query($consultaCursos);
					if ($resultado->num_rows > 0)
					{
					   	echo "<select class='form-control' name='cbxCurso' id='cbxCurso'>";
					   	echo "<option value='0'> Cursos </option>";
					    while($fila = $resultado->fetch_assoc())
					    {
					    	echo "<option value=". $fila["id"]."> "	.$fila["anno"]. "º" . $fila["division"] . "  </option>";
					    }
					    echo "</select>";
					}
				?>
			</div>

					<!--Selecciona la MATERIA -->
          <div class="form-group">
            <label for="option">Elige una materia:</label>
              <select class="form-control" name="cbxMateria" id="cbxMateria"></select>
          </div>

					<!--Selecciona el TIPO DE NOTA -->
          <div>
				        <label for="option">Seleccione el tipo de nota:</label>
				        <?php
					           $consultaTipos = "SELECT * from tipos";
					           $resultadoTipos = $BD->query($consultaTipos);
					           if ($resultadoTipos->num_rows > 0)
					           {
					   	              echo "<select class='form-control' name='cbxTipos' id='cbxTipos'>";
					   	              echo "<option value='0'> Tipos </option>";
					                  while($fila = $resultadoTipos->fetch_assoc())
					                  {
					    	                    echo "<option value=". $fila["idTipos"]."> " .$fila["tipo"]. " </option>";
					                  }
					                  echo "</select>";
					           }
				        ?>
			    </div>

					<!--Selecciona el TRIMESTRE -->
          <div>
				        <label for="option">Seleccione el trimestre: </label>
				        <select class="form-control" name="trimestre" id="trimestre">
					             <option value="0">Trimestres</option>
					             <option value="1">1er</option>
					             <option value="2">2do</option>
					             <option value="3">3er</option>
				        </select>
			    </div>

					<!--Selecciona la PUNTUACION -->
          <div class="form-group">
            <label for="nota">Puntuacion:</label>
              <select class="form-control" name="cbxPuntuacion" id="cbxPuntuacion"></select>
          </div>

					<!--Ingresa el DNI del alumnoy la CONTRASEÑA DEL PROFESOR -->
          <div class="form-group">
            <label for="dni">DNI:</label>
            <input class="form-control" name="dniAlumno" id="dni" type="text" placeholder="DNI:">
            <label for="password">Contraseña de Profesor:</label>
            <input class="form-control" name="pass" id="password" type="password" placeholder="Contraseña">

          </div>

					<!--BOTON PARA SUBIR LOS DATOS -->
          <div class="form-group">
			<!-------------------------------------------ENVIAR DE IAN---------------------------------------->
			<input type="submit" id="enviar" name="enviar" value="Subir Nota " />
			<!-------------------------------------------ENVIAR DE IAN---------------------------------------->
          </div>

          <p class="help-block"><i> Recuerde de llenar todo correctamente. </i></p>
      </form>
    </div>
		<script src="../../assests/js/bootstrap.js">
		</script>
	</body>
</html>

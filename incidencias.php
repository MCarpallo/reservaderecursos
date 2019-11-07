<!DOCTYPE html>
<html>
<head>
	<title>Creación de Incidencias</title>
		<link rel="stylesheet" type="text/css" href="estilos2.css">
		
</head>
<body>


<h1>Página de incidencias</h1>
<form action="procesos/incidencias.proc.php" method="post">


<textarea name="dsc_incidencias" id="dsc_incidencias" rows="10" cols="40" placeholder="Explica que incidencia ha ocurrido: "></textarea><br>

<input type="submit" name="enviar">

</form>


<?php
session_start();

$id_recurso_incidencia = $_REQUEST['id'];

$_SESSION['id_recursos_incidencia']=$id_recurso_incidencia;

  ?>
</body>
</html>
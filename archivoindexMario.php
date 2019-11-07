<!DOCTYPE html>
<html>
<head>
	<title>Test</title>
</head>
<body>


<?php
error_reporting(E_ALL ^ E_NOTICE); 
$link = mysqli_connect('localhost', 'root', '', 'reserva_recursos');


session_start();
$usuario = $_SESSION['username'];

if(isset($usuario)){
// error_reporting(E_ALL ^ E_NOTICE); 

echo 'Estás logeado como'.$usuario; 
			
	$consulta = "SELECT * FROM recursos ORDER BY $orden ASC;";


//Código php para conectar a la base de datos

//Consulta que selecciona todo de la tabla "recursos"

$query = mysqli_query($link, $consulta);

//Aqui hacemos los filtros para seleccionar nombre, descripción y nombre de la foto.
while ($ver=mysqli_fetch_array($query)) {

	

	
	echo "<div class='cajaF'>";
	echo "<img class='imagen' src='".$ver['id_recurso']."'>";
	
	echo "<h3 class='nombre'>".$ver['nombre_recursos'];
	echo "<h3 class='desc'>".$ver['cantidad_material'];
	echo "<h3 class='fecha'>".$ver['fecha'];
	echo "<h3 class='fecha'>".$ver['numero_restante'];
	echo "</div>";
}
}else{	
	echo "Algo falla";
}
?>
</body>
</html>

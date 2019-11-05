<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

	<?php 

//Iniciar la sesión para pillar la variable del usuario y comprobar si está logeado o no.
	session_start();
	$usuario = $_SESSION['username'];
		include 'procesos/connection.php';
	if(isset($usuario)){
echo "<br>";
echo "Estás logeado como ".$usuario;
echo "<br>";

echo "<a href='procesos/cerrar.php'>Cerrar Sesión </a>";

//Query para recoger todos los recursos de la tabla recursos
		$query= "SELECT * FROM recursos";
		$result=mysqli_query($db,$query);
		echo"<form method='get' ";
		echo"<select name='recursos'>";
			echo "<option value=''>RECURSOS</option>";

			//Este bucle lo que hará es recorrer todas las opciones de la tabla de recursos y irá mostrandolos seguidos de un botón para reservar o liberar, dependiendo de como estén.
			while ($row=mysqli_fetch_array($result)) {
				$index_recurso = "procesos/reservas.php?nombre=".$row['nombre_recurso'];
				$liberar = "procesos/liberar.php?nombre=".$row['nombre_recurso'];
				$incidencia = "incidencias.php?id=".$row['id_recursos'];
				echo "".$row['nombre_recurso']; 


				//Hacemos un if para los botones de reservar/liberar
			if ($row['id_disponible']==1) {
				echo "<a href='$index_recurso'> Reservar </a> <br>";				
			}else {
				error_reporting(E_ALL ^ E_NOTICE); 

				//----------------Mismo procedimiento que en liberar.php---------------/	

		        $id_recursos=$row['id_recursos'];  

				$hora_reservaid="hora_reserva".$id_recursos;


				$hora_reserva = $_SESSION[$hora_reservaid];

				$fecha_reservaid="fecha_reserva".$id_recursos;
				$fecha_reserva = $_SESSION[$fecha_reservaid];

				//--------------------------------------------------------/
				$query2 = "SELECT * FROM reserva WHERE `fecha_ini`='$fecha_reserva' AND `hora_ini`='$hora_reserva'";
				$result2=mysqli_query($db,$query2);

				while ($row2=mysqli_fetch_array($result2)) {
						
						$id_usu_reserva = $row2['id_usu'];
						}

			$id_usu = $_SESSION['id_usuario'];

			if ($id_usu==$id_usu_reserva) {
			echo "<a href='$liberar'>Liberar </a>";
			echo "<a href='$incidencia'>Crear Incidencia </a><br>";

			}else{
				echo "<a>  Reservado por otro profesor </a><br>";
			}


			}
			
			
			



			}
		echo "</select><br>";
		echo "</form>";

		//En el caso de que no esté logeado le saldrá un mensaje de que se tiene que logear.
}else{

echo "Porfavor, tienes que inciar sesión en la página del login:";

echo "<a href='login.php'>Iniciar Sesión </a>";

}


	?>



</body>
</html>
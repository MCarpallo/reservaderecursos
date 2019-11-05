<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

	<?php 
		//session_start();
		include 'procesos/connection.php';
		session_start();
		$usuario = $_SESSION['username'];
echo "<br>";
echo "Estás logeado como ".$usuario;
echo "<br>";

		$query= "SELECT * FROM recursos";
		$result=mysqli_query($db,$query);
		echo"<form method='get' ";
		echo"<select name='recursos'>";
			echo "<option value=''>RECURSOS</option>";
			while ($row=mysqli_fetch_array($result)) {
				$index_recurso = "reservas.php?nombre=".$row['nombre_recurso'];
				$liberar = "liberar.php?nombre=".$row['nombre_recurso'];
				echo "".$row['nombre_recurso']; echo "<a href='$index_recurso'> RESERVAR </a>";echo " ----- "; ;echo "<a href='$liberar'>Liberar </a><br>";" ";
			}
		echo "</select><br>";
		echo "</form>";
		
	?>



</body>
</html>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

	<?php 
		session_start();
		include 'procesos/connection.php';

		$query= "SELECT * FROM recursos";
		$result=mysqli_query($db,$query);

		echo"<form method='get' action='reservas.php' ";

		echo"<select name='recursos'>";

			echo "<option value=''>RECURSOS</option>";
			while ($row=mysqli_fetch_array($result)) {

				$index_recurso = "reservas.php?nombre=".$row['nombre_recursos'];

				echo "".$row['nombre_recursos']." ".$row['cantidad_material']." ".$row['fecha']." ".$row['numero_restante']; echo "<a href='$index_recurso'> RESERVAR </a> <br>";

			}
		echo "</select><br>";
		echo "</form>";
	?>



</body>
</html>
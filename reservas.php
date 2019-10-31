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
				echo "".$row['nombre_recursos']."<a href='reservas.php'";
				$_SESSION['nombre_recurso'] = $row['nombre_recursos'];
			}
		echo "</select><br>";
		echo "</form>";
	?>



</body>
</html>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

	<?php 
		//session_start();
		include 'procesos/connection.php';
		

		$query= "SELECT * FROM incidencias";
		$result=mysqli_query($db,$query);



		

			echo "<h2>Incidencias</h2>";
			while ($row=mysqli_fetch_array($result)) {

				$solucion_in = "solucionar.php?id_incidencia=".$row['id_incidencia'];

				$id=$row['id_recursos'];
				$rec="SELECT nombre_recurso FROM recursos WHERE id_recursos =$id";

				$result2=mysqli_query($db,$rec);
				$row2=mysqli_fetch_array($result2);

        		$nom=$row2['nombre_recurso'];    

        		echo "$nom ---- ";

				echo " ".$row['dsc_incidencia']."";
				echo "<a href='$solucion_in'> Solucionar </a>";



			}
		


		
	?>



</body>
</html>


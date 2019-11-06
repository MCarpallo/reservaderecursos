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



		
		//Muestra todas las incidencias creadas
			echo "<h2>Incidencias</h2>";
			while ($row=mysqli_fetch_array($result)) {

				$solucion_in = "solucionar.php?id_incidencia=".$row['id_incidencia'];

				$id=$row['id_recursos'];
				$rec="SELECT nombre_recurso FROM recursos WHERE id_recursos =$id";

				$result2=mysqli_query($db,$rec);
				$row2=mysqli_fetch_array($result2);

        		$nom=$row2['nombre_recurso'];    
        		// Dependiendo de si la incidencia esta solucionada o no, en el caso de que este solucionada te la muestra en verde y no aparece el boton de solucionar,en caso contrario aparece en rojo y aparece el boton de solucionar
        		if ($row['estado']==1){
        		echo "<h4 style='color:#47CF30;'>$nom ---- ".$row['dsc_incidencia']."";

			}else if ($row['estado']==0){
				echo "<h4 style='color:#F00F0F;'>$nom ---- ".$row['dsc_incidencia']."<a href='$solucion_in'> Solucionar </a></h4>";
			}

			}
		


		
	?>



</body>
</html>


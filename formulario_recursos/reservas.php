<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

	<?php 
		include 'procesos/connection.php';

	 if (!isset($_REQUEST['nombre'])) {

      $mult=0;
    }else{
      $mult=$_REQUEST['nombre'];
    }

	
	echo "$mult";

	$sql="UPDATE `recursos` SET `id_disponible`=2 WHERE `nombre_recurso`='$mult'";
	
	echo "$sql";
	$result=mysqli_query($db,$sql);

	?>



</body>
</html>
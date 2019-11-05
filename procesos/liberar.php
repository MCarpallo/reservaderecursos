<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

	

	<?php 
		include 'connection.php';
	 if (!isset($_REQUEST['nombre'])) {
      $mult=0;
    }else{
      $mult=$_REQUEST['nombre'];
    }
	
	echo "$mult";
	$sql="UPDATE `recursos` SET `id_disponible`=1 WHERE `nombre_recurso`='$mult'";
	
	echo "$sql";
	$result=mysqli_query($db,$sql);

	//Modificacion de la tabla recursos

	//Seleccionar el id de recurso para la sesion

	$conn="SELECT id_recursos FROM recursos WHERE nombre_recurso='$mult'";

        $result2=mysqli_query($db,$conn);

        $row2=mysqli_fetch_array($result2);

        $id_recursos=$row2['id_recursos'];  

session_start();
$hora_reservaid="hora_reserva".$id_recursos;
$hora_reserva = $_SESSION[$hora_reservaid];


$fecha_reservaid="fecha_reserva".$id_recursos;
$fecha_reserva = $_SESSION[$fecha_reservaid];

$date = date('y,m,d');

$hora = date('h:i:s');

$sql="UPDATE `reserva` SET `fecha_fin`= '$date' WHERE `fecha_ini`='$fecha_reserva' AND `hora_ini`='$hora_reserva' AND `id_recursos` = '$id_recursos'";
	
	echo "$sql";
	$result=mysqli_query($db,$sql);


$sql="UPDATE `reserva` SET `hora_fin`= '$hora_reserva' WHERE `fecha_ini`='$fecha_reserva' AND `hora_ini`='$hora_reserva' AND `id_recursos` = '$id_recursos'";
	
	echo "$sql";
	$result=mysqli_query($db,$sql);

	?>



</body>
</html>
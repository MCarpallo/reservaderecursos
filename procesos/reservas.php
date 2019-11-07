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
	$sql="UPDATE `recursos` SET `id_disponible`=2 WHERE `nombre_recurso`='$mult'";
	
	echo "$sql";
	$result=mysqli_query($db,$sql);

$date = date('y,m,d');

$hora = date('h:i:s');


$conn="SELECT id_recursos FROM recursos WHERE nombre_recurso='$mult'";

        $result2=mysqli_query($db,$conn);

        $row2=mysqli_fetch_array($result2);

        $id_recursos=$row2['id_recursos'];    



session_start();

$id_usu = $_SESSION['id_usuario'];

	$query = "INSERT INTO reserva (fecha_ini, hora_ini, id_usu, id_recursos) VALUES ('$date', '$hora', '$id_usu', '$id_recursos')";

	$result = mysqli_query($db,$query);

	//Testeos para concatenar horas y fechas con id de recursos:

	$hora_reservaid="hora_reserva".$id_recursos;
	$_SESSION[$hora_reservaid]=$hora;

	$fecha_reservaid="fecha_reserva".$id_recursos;
	$_SESSION[$fecha_reservaid]=$date;



	?>



</body>
</html>
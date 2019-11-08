
<?php

include 'procesos/connection.php'; 

if (!isset($_REQUEST['id_incidencia'])) {

      $id_incidencia=0;
    }else{
      $id_incidencia=$_REQUEST['id_incidencia'];
    }

$sql="UPDATE `incidencias` SET `estado`=1 WHERE `id_incidencia`='$id_incidencia'";
	
	echo "$sql";
	$result=mysqli_query($db,$sql);

$sql2="SELECT id_recursos FROM incidencias WHERE id_incidencia ='$id_incidencia'";
	$result2=mysqli_query($db,$sql2);


while ($row=mysqli_fetch_array($result2)) {
echo $row['id_recursos'];
$id_recursos = $row['id_recursos'];
}

$sql3 = "UPDATE `recursos` SET `id_disponible`=1 WHERE `id_recursos`='$id_recursos'";

$result3=mysqli_query($db,$sql3);

header("location: sol_incidencia.php");
?>
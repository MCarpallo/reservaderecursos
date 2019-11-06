
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


?>
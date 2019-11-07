<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="estilos2.css">
</head>
<body>

<style type="text/css">
  body{background:#A8A8A8;}
   </style>
   <style>
body {
    font-family: "Segoe UI", sans-serif;
    font-size:100%;
/*    background-image:url(./prism.png); */
}

.menu {
	margin-top: 70%;
}

.sidebar {
    position: fixed;
    height: 100%;
    width: 0;
    top: 0;
    left: 0;
    z-index: 1;
    background-color: #00324b;
    overflow-x: hidden;
    transition: 0.4s;
    padding: 1rem 0;
    box-sizing:border-box;
}

.sidebar .boton-cerrar {
    position: absolute;
    top: 0.5rem;
    right: 1rem;
    font-size: 2rem;
    display: block;
    padding: 0;
    line-height: 1.5rem;
    margin: 0;
    height: 32px;
    width: 32px;
    text-align: center;
    vertical-align: top;
}

.sidebar ul, .sidebar li{
    margin:0;
    padding:0;
    list-style:none inside;
}

.sidebar ul {
    margin: 4rem auto;
    display: block;
    width: 80%;
    min-width:200px;
}

.sidebar a {
    display: block;
    font-size: 120%;
    color: #eee;
    text-decoration: none;
    
}

.sidebar a:hover{
    color:#fff;
    background-color: #f90;

}

h1 {
    color:#f90;
    font-size:180%;
    font-weight:normal;
}
#contenido {
    transition: margin-left .4s;
    padding: 1rem;
}

.abrir-cerrar {
    color: #2E88C7;
    font-size:1rem;   
}

#abrir {
    
}
#cerrar {
    display:none;
}
</style>
</head>
<body>

<div id="sidebar" class="sidebar">
    <a href="#" class="boton-cerrar" onclick="ocultar()">&times;</a>
<ul class="menu" style="
    margin-top: 138%;">
    <br>
    <li><a href="./login.php">Login</a></li>
    <br>
    <li><a href="./formulario_de_recursos.php">Formulario Reservas</a></li>
    <br>

<?php
session_start();


	if(isset($_SESSION['username'])){
	$usuario = $_SESSION['username'];
}

	if(isset($usuario)){
		if ($usuario == "admin") {
			
			echo '<li><a href="incidencias_admin.php">Incidencias</a></li>';

}
			}

?>

    
    <!-- <li><a href="#">Opción 4</a></li> -->
</ul>
  
</div>

<div id="contenido">
  <p><a href="" target="_blank"><a alt="Recursos reservas" style="border-width: 0px"/></a></p>
  <h1>Menú</h1>
  <a id="abrir" class="abrir-cerrar" href="javascript:void(0)" onclick="mostrar()">Abrir menu</a><a id="cerrar" class="abrir-cerrar" href="#" onclick="ocultar()">Cerrar menu</a>
</div>

<script>
function mostrar() {
    document.getElementById("sidebar").style.width = "300px";
    document.getElementById("contenido").style.marginLeft = "300px";
    document.getElementById("abrir").style.display = "none";
    document.getElementById("cerrar").style.display = "inline";
}

function ocultar() {
    document.getElementById("sidebar").style.width = "0";
    document.getElementById("contenido").style.marginLeft = "0";
    document.getElementById("abrir").style.display = "inline";
    document.getElementById("cerrar").style.display = "none";
}
</script>
	
	<?php 

	if(isset($_SESSION['username'])){
	$usuario = $_SESSION['username'];
}

	if(isset($usuario)){
echo "<br>";
echo "Estás logeado como ".$usuario;
echo "<br>";

echo "<a href='procesos/cerrar.php'>Cerrar Sesión </a>";

		//session_start();
		include 'procesos/connection.php';
		

		$query= "SELECT * FROM incidencias";
		$result=mysqli_query($db,$query);



		
		//Muestra todas las incidencias creadas
			echo "<h2>Incidencias</h2>";

			echo "<div class='cuadrado'";
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
			
				;
			}

			}
		}else{

echo "Porfavor, tienes que inciar sesión en la página del login: ";

echo "<a href='login.php'>Iniciar Sesión </a>";

}


		
	?></div>


</body>
</html>



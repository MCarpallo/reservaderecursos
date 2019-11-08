<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="estilos2.css">
    <link rel="stylesheet" type="text/css" href="tabla.css">
</head>
<body>

<style type="text/css">
  body{background:url(https://www.elsetge.cat/myimg/f/145-1452323_nature-landscape-sky-clouds-himalayas-mountain-minimalist-nature.jpg)no-repeat fixed center;
  }
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
    <li><a href="./historial.php">Historial</a></li>
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
echo "<div class='derecha'>";
echo "<br>";
echo "Estás logeado como ".$usuario;
echo "<br>";
echo "<a href='procesos/cerrar.php'>Cerrar Sesión </a>";

echo "</div>";


		//session_start();
		include 'procesos/connection.php';
		

echo "<form action='historial.php' method='post'>
    <select name='usuario'>
        <option value=''>Todos</option>
        <option value='admin'>Admin</option>
        <option value='Aaron'>Aaron</option>
        <option value='fernando'>Fernando</option>
        <option value='Mario'>Mario</option>
    </select>
    <input type='submit' name='subir' value='Filtrar' class='btnfiltrar'/> 
</form>";

if (!isset($_POST['usuario'])) {
            $usu='';
        }else{
            $usu=$_POST['usuario'];
        }


if ($usu=='') {
    # code...

		$query= "SELECT * from Usuarios inner join reserva on usuarios.id_usu=reserva.id_usu
inner join recursos on recursos.id_recursos=reserva.id_recursos ORDER BY reserva.fecha_ini DESC";
		$result=mysqli_query($db,$query);




		//Muestra todas las incidencias creadas
			echo "<div class='cuadrado'";

            echo '<div id="main-container">
            <h1 style="margin-top:-10%;">Historial de reservas </h1>
        <table>
            <thead>
                <tr>
                    <th>Recurso</th><th>Fecha Inicio</th><th>Fecha Final</th><th>Usuario</th>
                </tr>
                </thead>';


			while ($row=mysqli_fetch_array($result)) {

                $recurso=$row['nombre_recurso'];
                 echo "<tr style='background-color:rgba(97,245,112,0.80);'>";   
                    echo "<td><h4'>$recurso</td>"."<td>".$row['fecha_ini']."<td><h4'>".$row['fecha_fin']."</td><td>".$row['user']."</td></tr>";

			
			}
                echo "</tr>
        </table>
    </div>";
}else{

        $query= "SELECT * from Usuarios inner join reserva on usuarios.id_usu=reserva.id_usu
inner join recursos on recursos.id_recursos=reserva.id_recursos WHERE user='$usu' ORDER BY reserva.fecha_ini DESC";
        $result=mysqli_query($db,$query);




        //Muestra todas las incidencias creadas
            echo "<div class='cuadrado'";

            echo '<div id="main-container">
            <h1 style="margin-top:-10%;">Historial de reservas </h1>
        <table>
            <thead>
                <tr>
                    <th>Recurso</th><th>Fecha Inicio</th><th>Fecha Final</th><th>Usuario</th>
                </tr>
                </thead>';


            while ($row=mysqli_fetch_array($result)) {

                $recurso=$row['nombre_recurso'];
                 echo "<tr style='background-color:rgba(97,245,112,0.80);'>";   
                    echo "<td><h4'>$recurso</td>"."<td>".$row['fecha_ini']."<td><h4'>".$row['fecha_fin']."</td><td>".$row['user']."</td></tr>";

            
            }
                echo "</tr>
        </table>
    </div>";
}
            

			
		}else{

echo "Porfavor, tienes que inciar sesión en la página del login: ";

echo "<a href='login.php'>Iniciar Sesión </a>";

}


		
	?></div>


</body>
</html>



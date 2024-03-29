<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="estilos2.css">
    <link rel="stylesheet" type="text/css" href="tabla.css">
</head>
<body>

   </style>
   <style>
body {
    font-family: "Segoe UI", sans-serif;
    font-size:100%;
    background:url(https://www.elsetge.cat/myimg/f/145-1452323_nature-landscape-sky-clouds-himalayas-mountain-minimalist-nature.jpg)no-repeat fixed center;
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

//Iniciar la sesión para pillar la variable del usuario y comprobar si está logeado o no.
	//session_start();

	if(isset($_SESSION['username'])){
	$usuario = $_SESSION['username'];
}

		include 'procesos/connection.php';
	if(isset($usuario)){
       echo"<div class='derecha'>";
echo "<br>";
echo "Estás logeado como ".$usuario;
echo "<br>";
echo "<a href='procesos/cerrar.php'>Cerrar Sesión </a>";
echo "</div>";


echo "<form action='formulario_de_recursos.php' method='post'>
    <select name='recurso'>
        <option value=''>Todos</option>
        <option value='Sala Multidisciplinar'>Sala Multidisciplinar</option>
        <option value='Sala Informatica'>Sala Informatica</option>
        <option value='Taller Cocina'>Taller Cocina</option>
        <option value='Despacho Entrevista'>Despacho Entrevista</option>
        <option value='Salon Actos'>Salon Actos</option>
        <option value='Sala Reuniones'>Sala Reuniones</option>
        <option value='Proyector Portatil'>Proyector Portatil</option>
        <option value='Portatil'>Portatil</option>
        <option value='Movil'>Movil</option>
    </select>
    <input type='submit' name='subir' value='Filtrar' class='btnfiltrar'/> 
</form>";


//Query para recoger todos los recursos de la tabla recursos
$estadoin = 1;
		$query= "SELECT * FROM recursos";
		$result=mysqli_query($db,$query);
		echo"<form method='get' ";
		echo"<select name='recursos'>";

			//Este bucle lo que hará es recorrer todas las opciones de la tabla de recursos y irá mostrandolos seguidos de un botón para reservar o liberar, dependiendo de como estén.
if (!isset($_POST['recurso'])) {
            $nom='';
        }else{
            $nom=$_POST['recurso'];
        }

if($nom==''){
            echo "<table>
            <thead>
                <tr>
                    <th>Recurso</th><th>Estado</th>
                </tr>
            </thead>";
			while ($row=mysqli_fetch_array($result)) {
				$index_recurso = "procesos/reservas.php?nombre=".$row['nombre_recurso'];
				$liberar = "procesos/liberar.php?nombre=".$row['nombre_recurso'];
				$incidencia = "incidencias.php?id=".$row['id_recursos'];
				



                echo "<tr>
                <td style='background-color:rgba(149,145,140,0.90);'>";

				echo "".$row['nombre_recurso']; 

                echo "</td>";

				//Hacemos un if para los botones de reservar/liberar
			if ($row['id_disponible']==1) {

                echo "<td style='background-color:rgba(97,245,112,0.75);'>";
				echo "<a href='$index_recurso'> Reservar </a> <br>";	
                echo "</td> </tr> ";


			}else {
				error_reporting(E_ALL ^ E_NOTICE); 

				//----------------Mismo procedimiento que en liberar.php---------------/	

		        $id_recursos=$row['id_recursos'];  

				$hora_reservaid="hora_reserva".$id_recursos;


				$hora_reserva = $_SESSION[$hora_reservaid];

				$fecha_reservaid="fecha_reserva".$id_recursos;
				$fecha_reserva = $_SESSION[$fecha_reservaid];

				//--------------------------------------------------------/
				$query2 = "SELECT * FROM reserva WHERE `fecha_ini`='$fecha_reserva' AND `hora_ini`='$hora_reserva'";
				$result2=mysqli_query($db,$query2);

				while ($row2=mysqli_fetch_array($result2)) {
						
						$id_usu_reserva = $row2['id_usu'];
						}

			$id_usu = $_SESSION['id_usuario'];
            



            $id_recurso_inc = $row['id_recursos'];
                $query3 = "SELECT * FROM incidencias WHERE `id_recursos`='$id_recurso_inc' ";
                $result3=mysqli_query($db,$query3);


             while ($row3=mysqli_fetch_array($result3)) {
                    $estadoin=$row3['estado'];

                }

                

            //Aqui comparamos el id del usuario logeado con el id del usuario de la reserva. Si es el mismo, puede tener opción a crear incidencia o a liberarlo. 
			if ($id_usu==$id_usu_reserva) {


            //Comprobar si el recurso está en incidencia o no
                
           
               

              


                if ($estadoin == 0) {
                    echo "<td style='background-color:rgba(253,47,56,0.85);'>";
            echo "<p>En Incidencia</p>";
            echo "</td> </tr> ";
                }else{

                 echo "<td style='background-color:rgba(255,135,0,0.85);'>";
			echo "<a href='$liberar'>Liberar </a>";
            echo "----";

			echo "<a href='$incidencia' style>Crear Incidencia </a><br>";
            echo "</td> </tr> ";
        }
            //Si no es así, el usuario solo verá el mensaje de que ha sido reservado por otro profesor. 
			}else{

                if ($estadoin == 0) {
                    echo "<td style='background-color:rgba(253,47,56,0.85);'>";

            echo "<p>En Incidencia</p>";
            echo "</td> </tr> ";
                }else{
                echo "<td style='background-color:rgba(253,47,56,0.85);'>";
				echo "<a>  Reservado por otro profesor </a><br>";
                echo "</td> </tr> ";
            }
			}

            

			}
			
			
			



			}

		echo "</select><br>";
		echo "</form>";

        //El else de aqui abajo es para los filtros
 }else{

     echo "<table>
            <thead>
                <tr>
                    <th>Recurso</th><th>Estado</th>
                </tr>
            </thead>";
    $query2="SELECT id_tipo_recurso FROM tipo_recurso WHERE Nombre_tipo_recurso='$nom' ";
        $result2=mysqli_query($db,$query2);
        $row2=mysqli_fetch_array($result2);
        $id_tipo=$row2['id_tipo_recurso'];

        $query= "SELECT * FROM recursos WHERE id_tipo_recurso='$id_tipo' ";
        $result=mysqli_query($db,$query);

        echo"<form method='get' ";

        echo"<select name='recursos'>";

            echo "<option value=''>RECURSOS</option>";
            while ($row=mysqli_fetch_array($result)) {

                $index_recurso = "procesos/reservas.php?nombre=".$row['nombre_recurso'];
                $liberar = "procesos/liberar.php?nombre=".$row['nombre_recurso'];

               echo "<tr>
                <td style='background-color:rgba(149,145,140,0.90);'>";

                echo "".$row['nombre_recurso']; 

                echo "</td>";

                //Hacemos un if para los botones de reservar/liberar
            if ($row['id_disponible']==1) {

                echo "<td style='background-color:rgba(97,245,112,0.75);'>";
                echo "<a href='$index_recurso'> Reservar </a> <br>";    
                echo "</td> </tr> ";


            }else {
                error_reporting(E_ALL ^ E_NOTICE); 

                //----------------Mismo procedimiento que en liberar.php---------------/    

                $id_recursos=$row['id_recursos'];  

                $hora_reservaid="hora_reserva".$id_recursos;


                $hora_reserva = $_SESSION[$hora_reservaid];

                $fecha_reservaid="fecha_reserva".$id_recursos;
                $fecha_reserva = $_SESSION[$fecha_reservaid];

                //--------------------------------------------------------/
                $query2 = "SELECT * FROM reserva WHERE `fecha_ini`='$fecha_reserva' AND `hora_ini`='$hora_reserva'";
                $result2=mysqli_query($db,$query2);

                while ($row2=mysqli_fetch_array($result2)) {
                        
                        $id_usu_reserva = $row2['id_usu'];
                        }

            $id_usu = $_SESSION['id_usuario'];
            



            $id_recurso_inc = $row['id_recursos'];
                $query3 = "SELECT * FROM incidencias WHERE `id_recursos`='$id_recurso_inc' ";
                $result3=mysqli_query($db,$query3);


             while ($row3=mysqli_fetch_array($result3)) {
                    $estadoin=$row3['estado'];

                }

                

            //Aqui comparamos el id del usuario logeado con el id del usuario de la reserva. Si es el mismo, puede tener opción a crear incidencia o a liberarlo. 
            if ($id_usu==$id_usu_reserva) {


            //Comprobar si el recurso está en incidencia o no
                
           
               

              


                if ($estadoin == 0) {
                    echo "<td style='background-color:rgba(253,47,56,0.85);'>";
            echo "<p>En Incidencia</p>";
            echo "</td> </tr> ";
                }else{

                 echo "<td style='background-color:rgba(255,135,0,0.85);'>";
            echo "<a href='$liberar'>Liberar </a>";
            echo "----";

            echo "<a href='$incidencia' style>Crear Incidencia </a><br>";
            echo "</td> </tr> ";
        }
            //Si no es así, el usuario solo verá el mensaje de que ha sido reservado por otro profesor. 
            }else{

                if ($estadoin == 0) {
                    echo "<td style='background-color:rgba(253,47,56,0.85);'>";

            echo "<p>En Incidencia</p>";
            echo "</td> </tr> ";
                }else{
                echo "<td style='background-color:rgba(253,47,56,0.85);'>";
                echo "<a>  Reservado por otro profesor </a><br>";
                echo "</td> </tr> ";
            }
            }

            

            }
            
            
            



            }

        echo "</select><br>";
        echo "</form>";


 }


		//En el caso de que no esté logeado le saldrá un mensaje de que se tiene que logear.
}else{

echo "Porfavor, tienes que inciar sesión en la página del login: ";

echo "<a href='login.php'>Iniciar Sesión </a>";

}


	?>



</body>
</html>
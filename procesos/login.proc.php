<?php 
//iniciar sesion y obtener el usuario y la contraseña del formulario.

session_start();
$conexion = mysqli_connect('localhost', 'root', '', 'reserva_recursos3');

$usuario = $_POST ['user'];
$clave = $_POST ['password'];


//Pasamos a MD5 la contraseña para poder compararla con la base de datos
$claveMD5 = md5($clave);

//Creamos la consulta que nos buscará si existe ese usuario con esa contraseña y devolverá cuantas coincidencias (1 o 0).
$query = "SELECT COUNT(*) as contar FROM usuarios where user = '$usuario' AND password = '$claveMD5'";
$consulta = mysqli_query($conexion,$query);

//Esto lo que hace es contar los arrays de la consulta, si encuentra usuario y contraseña buenos debería soltar 1, si no, soltará un 0.
$array = mysqli_fetch_array($consulta);

//Hacemos un if para mostrar si funciona o no comparando.

if($array['contar']>0) {
	echo "Todo funciona correctamente";

	// En el caso de que funcione esto lo que hace es asignar un valor a la sesion con el nombre de usuario para en la página "misitio" poder ver el usuario.
	

	$_SESSION['username'] = $usuario;
	echo "Funciona";
 	header("location: ../formulario_de_recursos.php");


//----Aquí lo que haré es sacar la id de usuario para utilizarla en el archivo de reservas.php"------//
 	$query2= "SELECT id_usu FROM usuarios WHERE user='$usuario'";
	$result=mysqli_query($conexion,$query2);

	while ($row=mysqli_fetch_array($result)) {
		$_SESSION['id_usuario']=$row['id_usu'];
		}

//--------------------------------------------------------------------------------------------------//
	}else {
		echo "Usuario incorrecto";
		//header("location: login.php?usuario=".base64_encode($usuario));
		exit;
	}


?>
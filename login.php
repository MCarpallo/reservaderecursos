<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
</head>
<body>
<form action="login.proc.php" method="POST" name="form" onsubmit="">
	<p id = "mensaje" class="mensaje"></p>
	<a>Usuario: </a><input type="text" id="user" name="user" placeholder= "Usuario"> 
	<br> <br>
	<a>Password: </a><input type="text" id ="password"name="password" placeholder="Password"> 
	<br> <br>
	<button type="submit">Iniciar Sesion</button><br>
</form>
</body>
</html>
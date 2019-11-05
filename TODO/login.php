<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
  <link rel="stylesheet" type="text/css" href="estilos.css">
	<script type="text/javascript" src="javascript.js"></script> 
</head>
<body>
<div class="page">
  <div class="container">
    <div class="left">
      <div class="login">Login</div>
      <div class="eula">Reserva de Recursos</div>
    </div>
    <div class="right">
      <svg viewBox="0 0 320 300">
        <defs>
          <linearGradient
                          inkscape:collect="always"
                          id="linearGradient"
                          x1="13"
                          y1="193.49992"
                          x2="307"
                          y2="193.49992"
                          gradientUnits="userSpaceOnUse">
            <stop
                  style="stop-color:#ff00ff;"
                  offset="0"
                  id="stop876" />
            <stop
                  style="stop-color:#ff0000;"
                  offset="1"
                  id="stop878" />
          </linearGradient>
        </defs>
        <path d="m 40,120.00016 239.99984,-3.2e-4 c 0,0 24.99263,0.79932 25.00016,35.00016 0.008,34.20084 -25.00016,35 -25.00016,35 h -239.99984 c 0,-0.0205 -25,4.01348 -25,38.5 0,34.48652 25,38.5 25,38.5 h 215 c 0,0 20,-0.99604 20,-25 0,-24.00396 -20,-25 -20,-25 h -190 c 0,0 -20,1.71033 -20,25 0,24.00396 20,25 20,25 h 168.57143" />
      </svg>
      <div class="form">
      	<form action="procesos/login.proc.php" method="POST">
      	 
        <label for="user">User</label>
        <input type="user" id="user" name="user">
        <label for="password">Password</label>
        <input type="password" id="password" name="password">
        <!-- <button type="submit">Iniciar Sesion</button><br> -->
        <input type="submit" id="submit" value="Submit">
        </form>
      </div>
    </div>
  </div>
</div>

</body>
</html>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8"/>
		  <!-- Bootstrap CSS -->
		  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link rel="stylesheet" href="css/estilo.css">
    <link rel="stylesheet" href="css/wsp.css">
    <link rel="stylesheet" href="/css/all.css" >
	<title>Formulario de registro</title>
	<link rel="stylesheet" type="text/css" href="./css/estilos.css">
	<script type="text/javascript"  href="./js/scripts.js"></script>
</head>
<body>
<header>
		<img src="./imagenes/logo.png" id="logo">
		<a href="./carritodecompras.php" title="ver carrito de compras">
			<img src="./imagenes/carrito.png">
		</a>
	</header>

	<nav class="menu2">
	  <menu>
	  <button type="button" class="btn btn-outline-secondary text-white " onclick="window.location.href='./'">Inicio</button>
         
	    <?php
	    if(isset($_SESSION['Usuario'])){ ?>
		<button type="button" class="btn btn-outline-secondary text-white " onclick="window.location.href='./login/cerrar.php'">Cerrar sesión</button>
          
         <?php
          } else { ?>
          <button type="button" class="btn btn-outline-secondary text-white " onclick="window.location.href='./login.php'">Iniciar Sesion</button>
          
	    <?php
          } 
         ?>
	  </menu>
	</nav>
	
	<section>
	<form id="formulariousuario" method="post" action="registraru.php">
		
    
		<label for="nombre"><h2>Nombre</h2></label><br>
		<input type="text" id="nombre" name="nombre" placeholder="Nombre" ><br>
		

        <label for="apellido"><h2>Apellido</h2></label><br>
		<input type="text" id="apellido" name="apellido" placeholder="Apellido" ><br>
		
		<h2>Sexo</h2>
		<table>
		<tr>
		<td>&nbsp;</td>
			<td>
			<label for="male">Masculino</label>	<input type="radio" id="male" name="sexo" value="M" >	
		    </td>
		<td>&nbsp;</td>
			<td>
			<label for="female">Femenino</label> <input type="radio" id="female" name="sexo" value="F">
		    </td>
			<td>&nbsp;</td>
			<td>
			<label for="other">Otro</label> <input type="radio" id="other" name="sexo" value="O">
		    </td>
		</tr>
		</table>
        
    


        <label for="pais"><h2>Pais</h2><h2></h2></label><br>
		<input type="text" id="pais" name="pais" placeholder="pais" ><br>
        

        <label for="fecha"><h2>Fecha de Nacimiento</h2></label><br>
		<input type="date" id="fechanacimiento" name="fechanacimiento" ><br>
        

        <label for="usuario"><h2>Usuario</h2></label><br>
		<input type="text" id="usuario" name="usuario" placeholder="usuario" ><br>
		

		<label for="password"><h2>Password</h2></label><br>
		<input type="password" id="password" name="password" placeholder="password" ><br>


        <input type="submit" name="aceptar" value="Crear Cuenta" class="aceptar">
	</form>
	</section>
	
</body>
</html>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8"/>
				  <!-- Bootstrap CSS -->
				  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link rel="stylesheet" href="css/estilo.css">
    <link rel="stylesheet" href="css/wsp.css">
    <link rel="stylesheet" href="/css/all.css" >
	<title>Entrada</title>
	<link rel="stylesheet" type="text/css" href="./css/estilos.css">
	<script type="text/javascript"  href="./js/scripts.js"></script>
</head>
<body>
<header>
		<img src="./imagenes/logo.png" id="logo">

	</header>
	<section>
	<nav class="menu2">
	  <menu>
	  <button type="button" class="btn btn-outline-secondary text-white " onclick="window.location.href='./admin/agregarproducto.php'">Agregar</button>
	  <button type="button" class="btn btn-outline-secondary text-white " onclick="window.location.href='./admin.php'">Administracion</button>
	  <button type="button" class="btn btn-outline-secondary text-white " onclick="window.location.href='./login/cerrar.php'">Salir</button>
	  <!--
	  <li><a href="./admin/agregarproducto.php" >Agregar</a></li>
	  <li><a href="./login/cerrar.php">Salir</a></li>-->
	  </menu>
	</nav>
	<center><h1>Modificar Producto</h1></center>
	<section>
	<form id="formularioe" method="post" action="registraentrada.php">

		<?php
		session_start();
		include 'conexion.php';
		
		$re=$con->query("select idProducto, nombre from productos where estado=1")or die(mysql_error());
		
		?>

		<label for="producto"><h2>Producto</h2>  </label>
		<br>
		<select name="producto">
			<?php
		    while ($f=$re->fetch_array()){
			?>
				<option value="<?php echo $f['idProducto'];?>">
				        <?php echo $f['nombre']; ?>
				</option>
			<?php
			}
			?>
			
        </select>
		<br>
		<label for="Precio"><h2>Precio </h2></label><br>
		<input type="text" id="precio" name="precio" placeholder="Precio"><br>

		<label for="Cantidad"><h2>Cantidad</h2> </label><br>
		<input type="text" id="cantidad" name="cantidad" placeholder="Cantidad"><br>

		<label for="fecha"><h2>Fecha de Compra</h2> </label><br>
		<input type="date" id="fecha" name="fecha" ><br>
    
		<br>
        <input type="submit" name="aceptar" value="Aceptar" class="aceptar">
	</form>
	</section>
	
</body>
</html>
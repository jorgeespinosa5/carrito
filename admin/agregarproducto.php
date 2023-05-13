<?php
session_start();
	include "../conexion.php";
	if(isset($_SESSION['Usuario'])){

	}else{
		header("Location: ../login.php");
	}
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8"/>
			  <!-- Bootstrap CSS -->
			  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link rel="stylesheet" href="css/estilo.css">
    <link rel="stylesheet" href="css/wsp.css">
    <link rel="stylesheet" href="/css/all.css" >
	<title>Agregar Producto</title>
	<link rel="stylesheet" type="text/css" href="../css/estilos.css">
	<script type="text/javascript" src="./js/jquery-1.10.2.js"></script>
	<script type="text/javascript"  src="./js/scripts.js"></script>
</head>
<body>
	<header>
		<img src="../imagenes/logo.png" id="logo">

	</header>
	<section>
	<nav class="menu2">
	  <menu>
	  <button type="button" class="btn btn-outline-secondary text-white " onclick="window.location.href='../entradas.php'">Entradas</button>
	  <button type="button" class="btn btn-outline-secondary text-white " onclick="window.location.href='../admin.php'">Administracion</button>
	  <button type="button" class="btn btn-outline-secondary text-white " onclick="window.location.href='../login/cerrar.php'">Salir</button>
	  <!--
	  <li><a href="./admin/agregarproducto.php" >Agregar</a></li>
	  <li><a href="./login/cerrar.php">Salir</a></li>-->
	  </menu>
	</nav>
	<!--
	<nav class="menu2">
	  <menu>
	    <li><a href="./">Inicio</a></li>
		<li><a href="../admin.php">Ultimas Compras</a></li>
	    <li><a href="#" class="selected">Agregar</a></li>
	    <li><a href="./login/cerrar.php">Salir</a></li>
	  </menu>
	</nav>
-->
	<center><h1>Agregar un Nuevo Producto</h1></center>
	<form action="altaproducto.php" method = "post" enctype="multipart/form-data">
		<fieldset>
			<h2>Nombre</h2><br>
			<input type="text" name="nombre">
		</fieldset>
		<fieldset>
		<h2>Imagen</h2><br>
			<input type="file" name="file">
		</fieldset>
		<fieldset>
		<br><h2>Precio</h2><br>
			<input type="text" name="precio">
		</fieldset>
		<fieldset>
		<h2>Cantidad Minima</h2><br>
			<input type="text" name="minimo">
		</fieldset>
		<br>
		<fieldset>
		<select name="estado">
        <option value="1">Activo</option>
		<option value="0">Inactivo</option>
        </select>
	    </fieldset>
		<center><input type="submit" name="accion" value="Enviar" class="aceptar"></center>
	</form>	
	
		</form>
	</section>
</body>
</html>
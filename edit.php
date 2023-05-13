<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
				  <!-- Bootstrap CSS -->
				  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link rel="stylesheet" href="css/estilo.css">
    <link rel="stylesheet" href="css/wsp.css">
    <link rel="stylesheet" href="/css/all.css" >
<title>Formulario para actualizar productos | Ejemplo</title>
    <link rel="stylesheet" type="text/css" href="css/main.css" />
    <link rel="stylesheet" href="assets/css/bootstrap.min.css" type="text/css"/>
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
<?php
    include "conexion.php";
    $id=$_GET['id'];
	$re=$con->query("select * from productos where idProducto=".$id)or die(mysql_error());

	while ($f=$re->fetch_array()){
		$id=$f['idProducto'];
		$nombre=$f['nombre'];
		$precio=$f['precio'];
		$estado=$f['estado'];
	}
    
   
?>
<center><h1>Actualizar Producto</h1></center>
<form id="formulario" method="post" action="process.php">

<fieldset>ID :<br>
<input type="text" name="eprodid" placeholder="Product ID" id="eprodid" value="<?php echo $id;?>" readonly/>
</fieldset>

<fieldset>Nombre del producto :<br>
<input type="text" name="eprodname" placeholder="Product Title" id="eprodname" value="<?php echo $nombre;?>"/>
</fieldset>

<fieldset>Precio :<br>
<input type="text" name="eprecio" placeholder="Precio" id="eprecio" value="<?php echo $precio;?>"/>
</fieldset>

<fieldset>Estado :<br>
<select name="estado" id="estado">
<?php
	if($estado== 1){
?>
	<option value = 1>Activado</option>
	<option value = 0>Desactivado</option>
<?php 
}else {
?>	
	<option value = 0>Desactivado</option>
	<option value = 1>Activado</option>
<?php
}
?>
</select>
</fieldset>

		
<fieldset>
<input type="submit" name="aceptar" value="Actualizar" class="aceptar">
</fieldset>

	</form>
</div><br /><br /><br />
</body>
</html>
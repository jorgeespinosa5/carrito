<?php
	session_start();
	include "./conexion.php";
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
	<title>Ticket Compras</title>
	<link rel="stylesheet" type="text/css" href="./css/estilos.css">
	<script type="text/javascript" src="http://code.jquery.com/jquery-1.10.2.min.js"></script>
	<script type="text/javascript"  href="./js/scripts.js"></script>
</head>
<body>
	<header>
		<img src="./imagenes/logo.png" id="logo">
	</header>
	<nav class="menu2">
	  <menu>
	  <button type="button" class="btn btn-outline-secondary text-white " onclick="window.location.href='./index.php'">Inicio</button>
 
	  </menu>
	</nav>
	
	<?php
	if ($_REQUEST['rechazado'] == 1){
		?>
		<center><h1>Lo Sentimos</h1></center>
		<center><h2>No hay existencia sificiente para algunos de los productos que desea comprar</h2></center>
<?php
	} else {
	?>
	<center><h1>Gracias por su preferencia</h1></center>
	<?php
	}
	?>
	<center><h1>SU COMPRA</h1></center>
	<table border = '0px' width='100%'>
		<tr>
			<td>Id</td>
			<td>Nombre</td>
			<td>Precio</td>
			<td>Cantidad</td>
			<td>Subtotal</td>
		</tr>
		
		<?php
			$re = $con->query("SELECT compras.productoId as Id, 
			productos.nombre as Nombre, 
			compras.precio as Precio,
			compras.cantidad as Cantidad, 
			compras.subtotal as Subtotal 
			FROM compras JOIN productos 
			ON compras.productoId = productos.idProducto 
			WHERE compras.numeroventa =".$_REQUEST['numventa']." order by id");
			
			while ($f=mysqli_fetch_array($re)){
				echo '<tr>
					<td>'.$f['Id'].'</td>
					<td>'.$f['Nombre'].'</td>
					<td>'.$f['Precio'].'</td>
					<td>'.$f['Cantidad'].'</td>
					<td>'.$f['Subtotal'].'</td>
		</tr>';
			}
		?>
	</table>
	</section>
	</body>
	</html>
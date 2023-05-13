<?php
session_start();
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
	<title>LA LIBRERIA</title>
	<link rel="stylesheet" type="text/css" href="./css/estilos.css">
	<script type="text/javascript" src="http://code.jquery.com/jquery-1.10.2.min.js"></script>
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
		
	<?php
		include 'conexion.php';
		$re=$con->query("select * from productos where estado=1")or die(mysql_error());
		while ($f=$re->fetch_array()) {
		?>
			<div class="producto">
			<center>
				<?php
                if ($f['existencia']>0) {
				?>

				<img src="./productos/<?php echo $f['imagen'];?>"><br>
				<span><?php echo $f['nombre'];?></span><br>
				<a href="./detalles.php?id=<?php  echo $f['idProducto'];?>">ver</a>

				<?php
				}
				else{
				?>	
                <img style="position:absolute ; opacity: 0.8;" src="./productos/sold-out.png" width="100" height="100">
                <img src="./productos/<?php echo $f['imagen'];?>"><br>
				<span><?php echo $f['nombre'];?></span><br>
				<p>Agotado</p>

				<?php
				}
				?>
				
				
			

			</center>
		</div>
	<?php
		}
	?>
		
	</section>
</body>
</html>
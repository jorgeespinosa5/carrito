<?php
session_start();
	include "conexion.php";
	if(isset($_SESSION['Usuario'])){

	}else{
		header("Location: ./login.php?Error=Acceso denegado");
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
	<title>Panel de Administración</title>
	<link rel="stylesheet" type="text/css" href="./css/estilos.css">
	<script type="text/javascript" src="http://code.jquery.com/jquery-1.10.2.min.js"></script>
	<script type="text/javascript"  href="./js/scripts.js"></script>
</head>
<body>
	<header>
		<img src="./imagenes/logo.png" id="logo">
	</header>
	<section>
	<nav class="menu2">
	  <menu>
	  <button type="button" class="btn btn-outline-secondary text-white " onclick="window.location.href='./entradas.php'">Entradas</button>
	  <button type="button" class="btn btn-outline-secondary text-white " onclick="window.location.href='./admin/agregarproducto.php'">Agregar</button>
	  <button type="button" class="btn btn-outline-secondary text-white " onclick="window.location.href='./login/cerrar.php'">Salir</button>
	  <!--
	  <li><a href="./admin/agregarproducto.php" >Agregar</a></li>
	  <li><a href="./login/cerrar.php">Salir</a></li>-->
	  </menu>
	</nav>

	<center><h1>Últimas Compras</h1></center>
	<table border="0px" width="100%">	
		<tr>
		    <td>Nombre</td>
		    <td>Imagen</td>
		    <td>Precio</td>
			<td>Existencia</td>
			<td>Estado</td>
			<td>Acciones</td>
		</tr>	

		<?php
			$re=$con->query("select * from productos") or die(mysql_error());
			$numeroventa=0;
			
			while ($f=mysqli_fetch_array($re)) {
				    $id=$f['idProducto'];
					echo '<tr>
					    <td>'.$f['nombre'].'</td>
					    <td><img src="./productos/'.$f['imagen'].'"width="100px" height="100px"/></td>
						<td>'.$f['precio'].'</td>
						<td>'.$f['existencia'].'</td>
						<td>'.$f['estado'].'</td>';
						echo "<td> <a href='edit.php?id=$id' id='popedit'>Editar</a></td>";
						if ($f['existencia']<=$f['reorden']) {
							echo '<td><img src="./productos/agotado.png" "width="25px" height="25px"</td>';
						}

					
                    echo'
					</tr>';
			}
		?>
	</table>
	</section>
</body>
</html>
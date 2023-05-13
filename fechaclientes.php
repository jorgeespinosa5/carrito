<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8"/>
	    	  <!-- Bootstrap CSS -->
			  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link rel="stylesheet" href="css/estilo.css">
    <link rel="stylesheet" href="css/wsp.css">
    <link rel="stylesheet" href="/css/all.css" >
	<title>Panel de Seleccion</title>
	<link rel="stylesheet" type="text/css" href="./css/estilos.css">
	<script type="text/javascript" src="./js/jquery-1.10.2.js"></script>
	<script type="text/javascript"  src="./js/scripts.js"></script>
</head>
<body>
	<header>
		<img src="./imagenes/logo.png" id="logo">

	</header>
	<section>
	<nav class="menu2">
	  <menu>
	  <button type="button" class="btn btn-outline-secondary text-white " onclick="window.location.href='./dashboard.php'">Panel</button>
      <button type="button" class="btn btn-outline-secondary text-white " onclick="window.location.href='./login/cerrar.php'">Salir</button>
	    
	  </menu>
	</nav>

	<center><h1> Grafica | Reporte de Ventas por Clientes</h1>
	<form  action="grafClientes.php" method = "get" >
		<fieldset>
			Fecha inicial: <br>
			<input type="date" name="fechai">
		</fieldset>

		<fieldset>
			Fecha Final:<br>
			<input type="date" name="fechaf">
		</fieldset>

		<input type="submit" name="accion" value="Verificar" class="aceptar">
	</form>	
	</center>
		</form>
        <br> <br> <br>
	

	<center><h1> Grafica | Reporte de Ventas por Productos</h1>  
	<form  action="grafProductos.php" method = "get" >
		<fieldset>
			Fecha inicial: <br>
			<input type="date" name="fechai">
		</fieldset>

		<fieldset>
			Fecha Final:<br>
			<input type="date" name="fechaf">
		</fieldset>

		<input type="submit" name="accion" value="Verificar" class="aceptar">
	</form>	
	</center>
		</form>
    <br> <br> <br>



	<center><h1>PDF | Reporte de Ventas por Libros </h1>
	<form  action="plantilla.php" method = "get" target="_blank">
		<fieldset>
			Fecha inicial: <br>
			<input type="date" name="fechai">
		</fieldset>

		<fieldset>
			Fecha Final:<br>
			<input type="date" name="fechaf">
		</fieldset>

		<input type="submit" name="accion" value="Verificar" class="aceptar">
	</form>	
	</center>
		</form>
		<br> <br><br> 

		<center><h1>PDF | Reporte de Ventas Generales </h1>
	<form  action="ventasgeneral.php"  target="_blank">

		<input type="submit" name="accion" value="Verificar" class="aceptar">
	</form>	
	</center>
		</form>
	</section>
	<br> <br> <br><br> <br> <br>
    

</body>
</html>

<?php
include("./fusioncharts/integrations/php/fusioncharts-wrapper/fusioncharts.php");

?>

<html>
<head>
<meta charset="utf-8"/>
<title>Grafica Productos</title>   
	    	  <!-- Bootstrap CSS -->
			  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link rel="stylesheet" href="css/estilo.css">
    <link rel="stylesheet" href="css/wsp.css">
    <link rel="stylesheet" href="/css/all.css" > 
<script type="text/javascript" src="https://cdn.fusioncharts.com/fusioncharts/latest/fusioncharts.js"></script>
<script type="text/javascript" src="https://cdn.fusioncharts.com/fusioncharts/latest/themes/fusioncharts.theme.candy.js"></script>
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
      <button type="button" class="btn btn-outline-secondary text-white " onclick="window.location.href='./fechaclientes.php'">Reportes</button>
      <button type="button" class="btn btn-outline-secondary text-white " onclick="window.location.href='./login/cerrar.php'">Salir</button>
	    
	  </menu>
	</nav>
    <center><h1>Reporte de Ventas por Libros del <?php echo ($_GET['fechai']) ?> al <?php echo ($_GET['fechaf']) ?> </h1></center>
<?php
// Chart Configuration stored in Associative Array
$arrChartConfig = array(
        "chart" => array(
            "caption" => "Libros",  // titulo
            "subCaption" => "Total comprado", // Subtitulo
            "xAxisName" => "Nombre del Libro", // eje x
            "yAxisName" => "Cantidad $", // eje y
            "numberSuffix" => "$", // etiqueta numero
            "theme" => "candy" // tema de la grafica 
        )
    );

include 'conexion.php';
$re=$con->query("
SELECT sum(compras.subtotal) as total, productos.nombre 
FROM compras join productos 
	on compras.productoId=productos.idproducto 
    WHERE fecha 
    between '".$_GET['fechai']."' AND '".$_GET['fechaf']."'
    group by productos.idproducto;

") or die(mysql_error());

$arrLabelValueData = array();

while ($f=mysqli_fetch_array($re)) {
array_push($arrLabelValueData, array("label" =>$f['nombre'], "value" => $f['total']));
}


$arrChartConfig["data"] = $arrLabelValueData;

// JSON Encode the data to retrieve the string containing the JSON representation of the data in the array.
$jsonEncodedData = json_encode($arrChartConfig);

// chart object
$Chart = new FusionCharts("column3d", "MyFirstChart" , "900", "600", "chart-container", "json", $jsonEncodedData);

// Render the chart
$Chart->render();
?>
<center>
    <div id="chart-container">Chart will render here!</div>
</center>

</body>
</html>
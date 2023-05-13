
<?php
include("./fusioncharts/integrations/php/fusioncharts-wrapper/fusioncharts.php");

?>

<html>
<head>
<title>Grafica</title>    
<script type="text/javascript" src="https://cdn.fusioncharts.com/fusioncharts/latest/fusioncharts.js"></script>
<script type="text/javascript" src="https://cdn.fusioncharts.com/fusioncharts/latest/themes/fusioncharts.theme.candy.js"></script>
</head>
<body>
<?php
// Chart Configuration stored in Associative Array
$arrChartConfig = array(
        "chart" => array(
            "caption" => "Articulos",  // titulo
            "subCaption" => "Existencia", // Subtitulo
            "xAxisName" => "Productos", // eje x
            "yAxisName" => "Piezas", // eje y
            "numberSuffix" => "Pz", // etiqueta numero
            "theme" => "candy" // tema de la grafica 
        )
    );

include 'conexion.php';
$re=$con->query("select sum(compras.subtotal) as total, productos from productos where estado = 1") or die(mysql_error());

$arrLabelValueData = array();

while ($f=mysqli_fetch_array($re)) {
array_push($arrLabelValueData, array("label" =>$f['nombre'], "value" => $f['existencia']));
}


$arrChartConfig["data"] = $arrLabelValueData;

// JSON Encode the data to retrieve the string containing the JSON representation of the data in the array.
$jsonEncodedData = json_encode($arrChartConfig);

// chart object
$Chart = new FusionCharts("column3d", "MyFirstChart" , "700", "400", "chart-container", "json", $jsonEncodedData);

// Render the chart
$Chart->render();
?>
<center>
    <div id="chart-container">Chart will render here!</div>
</center>

</body>
</html>


<?php
include("./fusioncharts/integrations/php/fusioncharts-wrapper/fusioncharts.php");

?>

<html>
<head>
<title>Ventas de productos</title>    
<script type="text/javascript" src="https://cdn.fusioncharts.com/fusioncharts/latest/fusioncharts.js"></script>
<script type="text/javascript" src="https://cdn.fusioncharts.com/fusioncharts/latest/themes/fusioncharts.theme.fusion.js"></script>
</head>
<body>
<?php
// Chart Configuration stored in Associative Array
$arrChartConfig = array(
        "chart" => array(
            "caption" => "Paises Top Ventas",  // titulo
            "subCaption" => "Jorge Antonio Covarrubias Espinosa", // Subtitulo
            "xAxisName" => "Country", // eje x
            "yAxisName" => "Reserves (MMbbl)", // eje y
            "numberSuffix" => "K", // etiqueta numero
            "theme" => "fusion" // tema de la grafica 
        )
    );
    // An array of hash objects which stores data
    $arrChartData = array(
["Mexico", "290"], // 0,0- 0,1
["Estados Unidos", "260"],     // 1,0- 1,1
["Canada", "180"],    // 2,0- 2,1
["Argentina", "140"],     //  3,0- 3,1
["Chile", "115"],   //  4,0- 4,1
["El Salvador", "100"],      //   5,0- 5,1
["Honduras", "30"],        //  6,0- 6,1
["Colombia", "30"]      //  7,0- 7-1
);

$arrLabelValueData = array();

    // Pushing labels and values
    for($i = 0; $i < count($arrChartData); $i++) {
        array_push($arrLabelValueData, array(
            "label" => $arrChartData[$i][0], "value" => $arrChartData[$i][1]
        ));
    }
    
    $arrChartConfig["data"] = $arrLabelValueData;

    // JSON Encode the data to retrieve the string containing the JSON representation of the data in the array.
    $jsonEncodedData = json_encode($arrChartConfig);

    // chart object
    $Chart = new FusionCharts("pie3d", "MyFirstChart" , "700", "400", "chart-container", "json", $jsonEncodedData);

    // Render the chart
    $Chart->render();
    ?>
    <center>
        <div id="chart-container">Chart will render here!</div>
    </center>

</body>
</html>
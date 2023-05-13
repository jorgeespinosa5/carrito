<?php 
ob_start(); 
include "conexion.php";
?>


<!DOCTYPE html>

<html>
<head>

	<meta charset="utf-8"/>
    	  <!-- Bootstrap CSS -->
	  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link rel="stylesheet" href="css/estilo.css">
    <link rel="stylesheet" href="css/wsp.css">
    <link rel="stylesheet" href="/css/all.css" >
	<title>Reporte General</title>
	<link rel="stylesheet" type="text/css" href="./css/estilos.css">
	<script type="text/javascript" src="./js/jquery-1.10.2.js"></script>
	<script type="text/javascript"  src="./js/scripts.js"></script>
    <script type="text/javascript" src="https://cdn.fusioncharts.com/fusioncharts/latest/fusioncharts.js"></script>
    <script type="text/javascript" src="https://cdn.fusioncharts.com/fusioncharts/latest/themes/fusioncharts.theme.candy.js"></script>

</head>

<body>
   
   <section>
    <h2>LA LIBRERIA &nbsp; </h2> 
	<center><h1>Tabla de Ventas</h1></center>
   <table border="1px" width="100%">	
		<tr>
		    <td><h3>Numero de Venta</h3></td>
			<td><h3>Nombre del Libro</h3></td>
            <td><h3>Cantidad</h3></td>
			<td><h3>Subtotal</h3></td>
            <td><h3>Fecha</h3></td>
			<td><h3>Nombre del cliente</h3></td>
		</tr>	

		<?php
        $re=$con->query("
        SELECT numeroventa, productos.nombre as nlib, cantidad, subtotal, fecha, usuarios.nombre as nclient
        FROM compras JOIN usuarios
        on compras.usuarioID = usuarios.idUsuario
        JOIN productos
        on compras.productoID = productos.idProducto
        order by  numeroventa asc;
        ");

        while ($f=$re->fetch_array()) {
				   
            echo '<tr>
                <td>'.$f['numeroventa'].'</td>
                <td>'.$f['nlib'].'</td>
                <td>'.$f['cantidad'].'</td>
                <td>'.$f['subtotal'].'</td>
                <td>'.$f['fecha'].'</td>
                <td> '.$f['nclient'].'</td>';	
            echo'</tr>';
    }

		?>
	</table>
	</section>



</body>
</html>


<?php
require_once 'dompdf/autoload.inc.php';
use Dompdf\Dompdf;
$dompdf = new DOMPDF();
$dompdf->load_html(ob_get_clean());
$dompdf->set_paper(array(0,0,720,1280));
$dompdf->render();
//----------------unicamente si queremos que el archivo se guarde en el sevidor-------------
$pdf = $dompdf->output();
$filename = "ejemplo.pdf";
//Donde guardar el documento
$rutaGuardado = "./archivos/";
//------------------------------------------------------------------------------------------

$dompdf->stream('ficheroEjemplo.pdf',array('Attachment'=>0));
//file_put_contents( $rutaGuardado.$filename, $pdf);

?>
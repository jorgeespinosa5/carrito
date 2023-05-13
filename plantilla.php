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
	<title>Reporte de Ventas</title>
	<link rel="stylesheet" type="text/css" href="./css/estilos.css">
	<script type="text/javascript" src="./js/jquery-1.10.2.js"></script>
	<script type="text/javascript"  src="./js/scripts.js"></script>
    <script type="text/javascript" src="https://cdn.fusioncharts.com/fusioncharts/latest/fusioncharts.js"></script>
    <script type="text/javascript" src="https://cdn.fusioncharts.com/fusioncharts/latest/themes/fusioncharts.theme.candy.js"></script>

</head>

<body>
   
   <section>
    <h2>LA LIBRERIA &nbsp; </h2>  Reporte del <?php echo ($_GET['fechai']) ?> al <?php echo ($_GET['fechaf'])?>
	<center><h1>Tabla de productos</h1></center>
   <table border="1px" width="100%">	
		<tr>
		    <td><h3>Nombre</h3></td>
			<td><h3>Total</h3></td>
		</tr>	

		<?php
			$re=$con->query("
				SELECT sum(compras.subtotal) as total, productos.nombre 
				FROM compras JOIN productos
				on compras.productoId=productos.idproducto 
				WHERE fecha 
				between '".$_GET['fechai']."' AND '".$_GET['fechaf']."'
				group by productos.idproducto;
				");

			while ($f=$re->fetch_array()) {
				   
					echo '<tr>
					    <td>'.$f['nombre'].'</td>
						<td> $'.$f['total'].'</td>';	
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
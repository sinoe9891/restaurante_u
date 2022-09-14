<?php
date_default_timezone_set('America/Tegucigalpa');
include '../inc/conexion.php';
require_once __DIR__ . '/vendor/autoload.php';
require_once 'model.php';
require_once 'convertidor/convertidor.php';
require_once 'convertidor/convertidor_fecha.php';
$modelonumero = new modelonumero();
$modelofecha = new modelofecha();
$stylesheet = file_get_contents('css/style.css');

if (isset($_GET['ID'])) {
	$user_id = $_GET['ID'];
	include '../inc/conexion.php';
	// $consulta1 = $conn->query("SELECT * FROM info_cai a, info_empresa b where a.id_empresa = b.id_empresa");
	$consulta1 = $conn->query("SELECT * FROM `facturas` WHERE no_factura = '$user_id'");
	//while el id_cuota_pagada
	while ($row = $consulta1->fetch_assoc()) {
		$datetime = $row['datetime'];
	}
	$solicitudes = getCobro($user_id);
	// $len = 16;
	// $new_str1 = str_pad($rango_inicial, $len, "0", STR_PAD_LEFT);
	// $new_str2 = str_pad($rango_final, $len, "0", STR_PAD_LEFT);
	// $cuatro1 = substr($new_str1, 15, 5);
	// $cuatro2 = substr($new_str2, 15, 5);
	if ($solicitudes->num_rows > 0) {
		echo 'hola';
		while ($row = $solicitudes->fetch_assoc()) {
			$datetime = $row['datetime'];

			$html .= '<div class="main_factura" >
			<div class="main-container">
			<div class="container_factura">
			<h5>Factura</h5>
			<p>Dirección</p>
			<p>RTN: RTN</p>
			<p>Tel. +504 3182-8143</p>
			<hr style="border-style: dashed">
			<p>FACTURA <span class="factura">' . $user_id . '<span></p>
			<hr>
			<p>CAI</p>
			<p></p>
			<!--<p>Rango autorizado: </p>-->
			<hr>
			<p>Fecha de autorización: </p>
			<p>Fecha límite de emisión: </p>
			<hr>
			<p>Rango inicial: </p>
			<p>Rango final: </p>
			<hr>
			<p>COrreo</p>
			<hr>
			<p>Usuario: </p>
			<p>Fecha: </p>
			<p>Hora: </p>
			<hr>
			<div class="center">
				<table class="center-factura">
					<tr>
						<th>Por L. </th>
						<td></td>
					</tr>
					<tr>
						<th>Fecha</th>
						<td></td>
					</tr>
					<tr>
						<th>Contrato</th>
						<td></td>
					</tr>
				</table>
			</div>
			<hr>
			<p>Cliente:</p>
			<p class="info"></p>
			<hr>
			
			';
			try {
				// $mpdf = new \Mpdf\Mpdf(['format' => 'Legal']);
				// son mm 
				$mpdf = new \Mpdf\Mpdf(['format' => [75.9989, 355.6]]);
				$mpdf->adjustFontDescLineheight = 1.2;
				// $mpdf->SetMargins(10, 250, 10);
				$mpdf->AddPageByArray([
					'margin-left' => 2.5,
					'margin-right' => 2.5,
					'margin-top' => 11,
					'margin-bottom' => 0,
				]);
				$mpdf->SetAutoPageBreak(true, 25);
				// $mpdf->debug = true;
				// ob_end_clean();
				$mpdf->WriteHTML($stylesheet, 1);
				$mpdf->WriteHTML($html);
				$mpdf->Output("Factura.pdf", "D");
				$nombrefactura = "Factura.pdf";
				// $mpdf->Output("facturas/" . ucwords(strtolower($nombrefactura)), "F");
				//si no existe el directorio factura se debe crear el directorio

				// $mpdf->Output("Contrato ".$bloque .'-'. $numero .' '. ucwords(strtolower($nombre)) . ".pdf", "D");
			} catch (\Mpdf\MpdfException $e) { // Note: safer fully qualified exception 
				//       name used for catch
				// Process the exception, log, print etc.
				echo $e->getMessage();
			}
			//convertir pdf a jpg
			// $im = imagecreatefromjpeg('galería/Nota de Duelo '.ucwords(strtolower($row['nombres'].' '.$row['apellidos'])).'.jpg');
			// $mpdf->Output("galería/Nota de Duelo ".ucwords(strtolower($row['nombres'].' '.$row['apellidos'])).".jpg", "F");

		}
	}
}

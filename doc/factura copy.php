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
	$consulta1 = $conn->query("SELECT * FROM `facturas` WHERE id_orden = '$user_id'");
	//while el id_cuota_pagada
	while ($row = $consulta1->fetch_assoc()) {
		$datetime = $row['datetime'];
	}
	$solicitudes = getCobro($user_id);
	$len = 16;
	// $new_str1 = str_pad($rango_inicial, $len, "0", STR_PAD_LEFT);
	// $new_str2 = str_pad($rango_final, $len, "0", STR_PAD_LEFT);
	// $cuatro1 = substr($new_str1, 15, 5);
	// $cuatro2 = substr($new_str2, 15, 5);
	if ($solicitudes->num_rows > 0) {
		while ($row = $solicitudes->fetch_assoc()) {
			$datetime = $row['datetime'];
			
			$html .= '<div class="main_factura" >
			<div class="main-container">
			<div class="container_factura">
			<h5>' . $datetime . '</h5>
			<p>' . $direccion . '</p>
			<p>RTN: ' . $rtn . '</p>
			<p>Tel. ' . $telefono . '</p>
			<hr style="border-style: dashed">
			<p>FACTURA <span class="factura">' . $no_factura . '<span></p>
			<hr>
			<p>CAI</p>
			<p>' . $cai . '</p>
			<!--<p>Rango autorizado: ' . $rango_autorizado . '</p>-->
			<hr>
			<p>Fecha de autorización: ' . $fecha_emision . '</p>
			<p>Fecha límite de emisión: ' . $fecha_limite . '</p>
			<hr>
			<p>Rango inicial: ' . $rango_inicial . '</p>
			<p>Rango final: ' . $rango_final . '</p>
			<hr>
			<p>' . $correo . '</p>
			<hr>
			<p>Usuario: ' .  $usuario . '</p>
			<p>Fecha: ' .  date('d/m/Y', strtotime($fecha_pago)) . '</p>
			<p>Hora: ' .   date('H:i:s a', strtotime($hora_pago))  . '</p>
			<hr>
			<div class="center">
				<table class="center-factura">
					<tr>
						<th>Por L. </th>
						<td>' . number_format($cantidad_pagada, 2, '.', ',') . '</td>
					</tr>
					<tr>
						<th>Fecha</th>
						<td>' . date('d/m/Y', strtotime($fecha_pagada)) . '</td>
					</tr>
					<tr>
						<th>Contrato</th>
						<td>' . $id_contrato_compra . '</td>
					</tr>
				</table>
			</div>
			<hr>
			<p>Cliente:</p>
			<p class="info">' . $nombre_completo . '</p>
			<hr>
			<div >
				<table class="saldos">
					<tr>
						<th>Saldo anterior L.</th>
						<td>' . number_format(($saldoanterior), 2, '.', ',') . '</td>
					</tr>
					<tr>
						<th>Interes a la fecha </th>
						<td>0.00</td>
					</tr>
					<tr>
						<th>Mora L. </th>
						<td>0.00</td>
					</tr>
					<tr>
						<th>Descuento L</th>
						<td>0.00</td>
					</tr>
					<tr>
						<th>Valor Exento L.</th>
						<td>0.00</td>
					</tr>
					<tr>
						<th>Valor gravado L</th>
						<td>0.00</td>
					</tr>
					<tr>
						<th>ISV 15% L.</th>
						<td>0.00</td>
					</tr>
					<tr>
						<th>Total L.</th>
						<td>0.00</td>
					</tr>
					
				</table>
			</div>
			<hr>
			<div >
				<table class="saldos">
					<tr>
						<th>Pago intereses L.</th>
						<td>0.00</td>
					</tr>
					<tr>
						<th>Pago Ints. Mora.L.</th>
						<td>0.00</td>
					</tr>
					<tr>
						<th>Abono a capital L.</th>
						<td>0.00</td>
					</tr>
					<tr>
						<th>Ampliacion L.</th>
						<td>0.00</td>
					</tr>
					<tr>
						<th>Nuevo saldo L.</th>
						<td>' . number_format($monto_restante, 2, '.', ',') . '</td>
					</tr>
				</table>
			</div>
			<hr>
			<p class="exo">Datos del adquiriente exonerado</p><br>
			<p class="exoneracion">Numero de orden de compra excenta __________________________</p>
			<p class="exoneracion">Numero constancia de registro de exonerados _________________</p>
			<p class="exoneracion">Numero de registro de SAG _________________________________ _____________________________________________________________</p>
			<hr>
			<table class="saldos">
				<tr>
					<th>Vencimiento</th>
					dar formanto a $fecha_vencimiento
					<td>' .  date('d/m/Y', strtotime($fecha_vencimiento)) . '</td>
				</tr>
			</table>
			<hr>
			<p>La clave de prestamo es:<br>LOT2203-01-31</p><br>
			</div>
			</div>
			</div>';
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
				$mpdf->Output("Factura " . $id_contrato_compra . '-' . $id_cobro . '-' . $id_registro . ".pdf", "I");
				$nombrefactura = "Factura-" . $id_contrato_compra . '-' . $id_cobro . '-' . $id_registro . ".pdf";
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

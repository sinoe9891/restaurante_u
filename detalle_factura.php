<?php
date_default_timezone_set('America/Tegucigalpa');
include 'inc/templates/header.php';
include 'inc/conexion.php';
// include 'inc/sesiones.php';
session_start();
$name = $_SESSION['nombre_usuario'];
$id_user = $_SESSION['id'];

if (isset($_GET['ID'])) {
	$ID = $_GET['ID'];
} else {
	header('Location: ordenes_admin');
}

$today = getdate();
$hora = $today["hours"];
if ($hora < 6) {
	$saludo = " Hoy has madrugado mucho... ";
} elseif ($hora < 12) {
	$saludo = " Buenos días ";
} elseif ($hora <= 18) {
	$saludo = "Buenas Tardes ";
} else {
	$saludo = "Buenas Noches ";
}

$consulta = $conn->query("SELECT * FROM `facturas` order by no_factura DESC LIMIT 1");
// $contador = 1;
$ultimaorden = 0;

$sql = "SELECT * FROM `ordenes` order by id_orden DESC LIMIT 1";

if ($result=mysqli_query($conn,$sql)) {
    $rowcount=mysqli_num_rows($result);
	if ($rowcount > 0) {
		while ($solicitud = $consulta->fetch_array()) {
			$ultimaorden = $solicitud['no_factura'];
		}
	}else{
		$ultimaorden = 0;
	}
}

?>

<body>
	<div class="container-xxl bg-white p-0">
		<!-- Spinner Start -->
		<!-- <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
			<div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
				<span class="sr-only">Loading...</span>
			</div>
		</div> -->
		<!-- Spinner End -->


		<!-- Navbar & Hero Start -->
		<div class="container-xxl position-relative p-0">
			<?php
			include 'inc/templates/navbar-admin.php';
			?>

			<div class="container-xxl py-5 bg-dark hero-header mb-5">
				<div class="container my-5 py-5">
					<div class="row ">
						<div class="col-lg-12 text-center text-lg-start">
							<h6 class="display-3 text-white animated text-center" style="font-size: 40px;"><?php echo $saludo . $_SESSION["nombre_usuario"]; ?></h6>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- Navbar & Hero End -->


		<!-- Service Start -->
		<div class="container-xxl py-5">
			<div class="container">
				<section class="section clientes">
					<div class="card">
						<div class="card-body">
							<form action="inc/models/insert.php" name="formulario" method="post">
								<?php
									$orden = $conn->query("SELECT * FROM ordenes a, main_users b WHERE a.id_orden = $ID and b.id = a.id_mesero");
									$contador = 1;
									$total = 0;
									while ($solicitud = $orden->fetch_array()) {
										$datetime = $solicitud['datetime'];
										$id_mesa = $solicitud['id_mesa'];
										$id_mesero = $solicitud['id_mesero'];
										$username = $solicitud['usuario_name'];
										$apellidos = $solicitud['apellidos'];
										$estado = $solicitud['estado'];
										if ($estado == 'cola') {
											$estadoFactura = 'En Proceso';
											$color = 'bg-success';
										} elseif ($estado == 'cancelada') {
											$estadoFactura = 'Cancelada';
											$color = 'bg-secondary';
											$ver = 'display:none';
										} elseif ($estado == 'concluida') {
											$estadoFactura = 'Pendiente';
											$color = 'bg-success';
											$ver = '';
										} elseif ($estado == 'pagada') {
											$estadoFactura = 'Pagada';
											$color = 'bg-success';
											$ver = 'display:none';
										}elseif ($estado == ''){
											$estadoFactura = '';
											$color = 'bg-success';
											$ver = '';
										}
									};
								?>
								<h3>Factura No. #<?php echo $ultimaorden + 1 ?> <?php echo '| <span style="color:green;">'.$estadoFactura.'</span>' ?></h3>
								<h5>Fecha: <?php echo $datetime ?></h5>
								<h5>Mesero: <?php echo $username . ' ' . $apellidos ?></h5>
								<h5>Mesa: <?php echo $id_mesa ?></h5>
								<table class="table table-striped" id="table1">
									<thead>
										<tr>
											<th>No.</th>
											<th>Producto</th>
											<th>Oferta</th>
											<th>Precio</th>
											<!-- <th>Estado</th> -->
											<!-- <th>Acciones</th> -->
										</tr>
									</thead>
									<tbody>

										<?php
										$consulta = $conn->query("SELECT * FROM orden_detalle a, menu b WHERE a.id_orden_detalle = $ID and b.id = a.id_plato;");
										$contador = 1;
										$total = 0;
										while ($solicitud = $consulta->fetch_array()) {
											$nombre = $solicitud['nombre'];
											$precio = $solicitud['precio'];
											$precioplato = $solicitud['precio'];
											$oferta = $solicitud['oferta'];
											$precio_oferta = $solicitud['precio_oferta'];
											if ($oferta == 1) {
												$precio = $precioplato;
												$check = 'L. '.$precioplato.' ✅ ';
											} else {
												$precio = $precioplato;
												$check = 'L. 00.00';
											}
										?>
											<tr id="solicitud:<?php echo $solicitud['id'] ?>">
												<td><?php echo $contador++; ?></td>
												<td><?php echo $nombre; ?></td>
												<td><?php echo $check; ?></td>
												<td><?php echo 'L. ' . $precio ?></td>
											</tr>
										<?php
											$total += $precio;
										}

										?>
									</tbody>
									<thead>
										<tr>
											<th></th>
											<th></th>
											<th style="text-align: right;">Subtotal</th>
											<th><?php
												echo 'L. ' . sprintf('%.2f', $total);
												// echo 'L. ' . sprintf('%.2f', $total);
												?></th>
										</tr>
										<tr>
											<th></th>
											<th></th>
											<th style="text-align: right;">Impuesto</th>
											<th><?php
												$impuesto = 0.15;
												$impuestototal = $total * $impuesto;
												echo 'L. ' . sprintf('%.2f', ($impuestototal));
												// echo 'L. ' . sprintf('%.2f', $total);
												?></th>
										</tr>
										<tr>
											<th></th>
											<th></th>
											<th style="text-align: right;">Total</th>
											<th><?php
												$grantotal = $total + $impuestototal;
												$descuento = 0;
												$propina = 0;
												echo 'L. ' . sprintf('%.2f', $grantotal);
												?></th>
										</tr>
									</thead>
									<?php
									// echo '<br>Total' . $total . '<br>';


									?>

								</table>
								<div class="col-12 d-flex justify-content-end">
									<input type="hidden" class="btn btn-primary me-1 mb-1" name="id_orden" value="<?php echo $ID ?>">
									<input type="hidden" class="btn btn-primary me-1 mb-1" name="datetime" value="<?php echo $datetime  ?>">
									<input type="hidden" class="btn btn-primary me-1 mb-1" name="idmesero" value="<?php echo $id_mesero ?>">
									<input type="hidden" class="btn btn-primary me-1 mb-1" name="total" value="<?php echo $total ?>">
									<input type="hidden" class="btn btn-primary me-1 mb-1" name="descuento" value="<?php echo $descuento ?>">
									<input type="hidden" class="btn btn-primary me-1 mb-1" name="propina" value="<?php echo $propina ?>">
									<input type="hidden" class="btn btn-primary me-1 mb-1" name="grantotal" value="<?php echo $grantotal ?>">
									<input type="hidden" class="btn btn-primary me-1 mb-1" name="impuestototal" value="<?php echo $impuestototal ?>">
									<input type="hidden" class="btn btn-primary me-1 mb-1" name="accion" value="facturacrear">
									<div class="btn btn-primary me-1 mb-1" style='<?php echo $ver ?>' onclick="enviarFactura()" value="Cocinar">Pagar</div>
									<a href="ordenes_admin">
										<div class="btn btn-secondary me-1 mb-1">Regresar</div>
									</a>


								</div>
							</form>
						</div>
					</div>
				</section>
			</div>
		</div>
		<!-- Service End -->
		<?php
		include 'inc/templates/footer.php';
		if (isset($_GET['del'])) {
			if ($_GET['del'] == 1) {
				echo "<script>
				console.log('Hola');
				Swal.fire({
					icon: 'success',
					title: 'Pago realizado!',
					text: 'El pago fue realizado correctamente',
					position: 'center',
					showConfirmButton: true
				}).then(function () {
					// window.location = 'usuarios.php';
				});
			</script>";
			} elseif ($_GET['del'] == 0) {
				echo "<script>
				Swal.fire({
					icon: 'error',
					title: 'Oops...',
					text: 'El pago no se pudo realizar'
				}).then(function () {
					// window.location = 'usuarios.php';
				});
				</script>";
			}
		}
		?>
		<script>
			function enviarFactura() {
				console.log("eliminar");
				Swal.fire({
					title: 'Seguro(a)?',
					text: "Todo lo que el cliente solicitó esta en la factura?",
					icon: 'warning',
					showCancelButton: true,
					confirmButtonColor: '#3085d6',
					cancelButtonColor: '#d33',
					confirmButtonText: 'Sí, ordenar!',
					cancelButtonText: 'Cancelar'
				}).then((result) => {
					if (result.isConfirmed) {
						document.formulario.submit()
						// window.location = 'inc/models/insert.php';
					} else if (result.isDenied) {
						Swal.fire('No sé ordenó', '', 'info')
					}
				})
			}
		</script>
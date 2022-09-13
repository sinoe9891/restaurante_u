<?php
date_default_timezone_set('America/Tegucigalpa');
include 'inc/templates/header.php';
include 'inc/conexion.php';
// include 'inc/sesiones.php';
session_start();
$name = $_SESSION['nombre_usuario'];
$accion = $_POST['accion'];
$id_user = $_SESSION['id'];
$idmesa = $_POST['mesa'];
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
$consulta = $conn->query("SELECT * FROM `ordenes` order by id_orden DESC LIMIT 1");
// $contador = 1;
$ultimaorden = 0;

$sql = "SELECT * FROM `ordenes` order by id_orden DESC LIMIT 1";

if ($result=mysqli_query($conn,$sql)) {
    $rowcount=mysqli_num_rows($result);
	if ($rowcount > 0) {
		while ($solicitud = $consulta->fetch_array()) {
			$ultimaorden = $solicitud['id_orden'];
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
			include 'inc/templates/navbar-mesero.php';
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
								<H1>Orden #<?php echo $ultimaorden + 1 ?></H1>
								<table class="table table-striped" id="table1">
									<thead>
										<tr>
											<th>No.</th>
											<th>Producto</th>
											<th>Precio</th>
											<!-- <th>Estado</th> -->
											<!-- <th>Acciones</th> -->
										</tr>
									</thead>
									<tbody>
										<?php
										if ($accion === 'newOrden') {
											// include '../conexion.php';
											$mesa = $_POST['mesa'];
											$mesero = $_POST['mesero'];
											// $checkBox = implode(',', $_POST['menu']);

											// echo $mesa . ' Mesa</br>';
											// echo $mesero . ' Mesero</br>';
											$DateAndTime = date('Y-m-d h:i:s', time());
											$date = date('Y-m-d', time());
											$total = 0;
											$contador = 1;
											foreach ($_POST['menu'] as $key => $val) {
												$consulta = $conn->query("SELECT * FROM `menu` WHERE id = $val");
												// $contador = 1;
												while ($solicitud = $consulta->fetch_array()) {
													$nombre = $solicitud['nombre'];
													$id_plato = $solicitud['id'];
													$precio = $solicitud['precio'];
													//insert into
													$total +=  $precio;
										?>

													<tr id="solicitud:<?php echo $solicitud['id'] ?>">
														<td><?php echo $contador++; ?></td>
														<td><?php echo $nombre ?></td>
														<td><?php echo 'L.' . $precio ?></td>
														<input type="hidden" class="btn btn-primary me-1 mb-1" id="tipo" name="menuplato[]" value="<?php echo $id_plato ?>">

												<?php

												}
											}
												?>
									</tbody>
									<thead>
										<tr>
											<th></th>
											<th>Total</th>
											<th><?php


												echo 'L.' . sprintf('%.2f', $total);



												?></th>
										</tr>
									</thead>
								<?php
											// echo '<br>Total' . $total . '<br>';
										}

								?>

								</table>
								<div class="col-12 d-flex justify-content-end">
									<input type="hidden" class="btn btn-primary me-1 mb-1" id="tipo" name="mesa" value="<?php echo $idmesa ?>">
									<input type="hidden" class="btn btn-primary me-1 mb-1" id="tipo" name="mesero" value="<?php echo $id_user ?>">
									<input type="hidden" class="btn btn-primary me-1 mb-1" id="tipo" name="accion" value="newOrden">
									<!-- <input type="submit" class="btn btn-primary me-1 mb-1" name="name" value="Cocinar" onclick="enviarorden()"> -->
									<div class="btn btn-primary me-1 mb-1" onclick="enviarorden()" value="Cocinar">Ordenar</div>
									<a href="mesas_mesero">
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
					title: '¡Usuario Eliminado!',
					text: 'El usuario fue eliminado correctamente',
					position: 'center',
					showConfirmButton: true
				}).then(function () {
					// window.location = 'usuarios.php';
				});
			</script>";
			} elseif ($_GET['del'] == 0) {
				echo "<script>
				console.log('Hola');
				Swal.fire({
					icon: 'error',
					title: 'Oops...',
					text: 'El usuario no se pudo eliminar'
				}).then(function () {
					// window.location = 'usuarios.php';
				});
				</script>";
			}
		}
		?>
		<script>
			function enviarorden() {
				console.log("eliminar");
				Swal.fire({
					title: 'Seguro(a)?',
					text: "Todo lo que el cliente solicitó esta en la orden?",
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
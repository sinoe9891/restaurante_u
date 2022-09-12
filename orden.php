<?php
date_default_timezone_set('America/Tegucigalpa');
include 'inc/templates/header.php';
include 'inc/conexion.php';
// include 'inc/sesiones.php';
session_start();
$name = $_SESSION['nombre_usuario'];
$ordenid = $_GET['orden'];
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
							<H1>Orden #<?php echo $ordenid ?></H1>
							<table class="table table-striped" id="table1">
								<thead>
									<tr>
										<th>No.</th>
										<th>Producto</th>
										<th>Precio</th>
										<th>Estado</th>
										<th>Acciones</th>
									</tr>
								</thead>
								<tbody>
									<?php
									// while ($solicitud = $consulta->fetch_array()) {
									$consulta = $conn->query("SELECT * FROM orden_detalle a, menu b, ordenes c WHERE a.id_orden_detalle = $ordenid and b.id = a.id_plato and a.id_orden_detalle = c.id_orden ORDER BY b.nombre ASC");
									$contador = 1;
									$total = 0;
									while ($solicitud = $consulta->fetch_array()) {
										$id_orden = $solicitud['id_orden'];
										$nombre = $solicitud['nombre'];
										$precio = $solicitud['precio_plato'];
										// $apellidos = $solicitud['apellidos'];
										// $username = $solicitud['nickname'];
										// $email = $solicitud['email_user'];
										$estado = $solicitud['estado'];
										if ($estado == 'cola') {
											$estadoUser = 'En Proceso';
											$color = 'bg-success';
										} elseif ($estado == 'cancelado') {
											$estadoUser = 'Deshabilitado';
											$color = 'bg-secondary';
										}
									?>
										<tr id="solicitud:<?php echo $solicitud['id_orden'] ?>">
											<td><?php echo $contador++; ?></td>
											<td><?php echo $nombre ?></td>
											<td><?php echo 'L.' . $precio ?></td>
											<td><?php echo '<span class="badge ' . $color . '">' . $estadoUser . '</span>' ?></td>
											<td>
												<!-- <a href="edit-usuario?ID=<?php echo $solicitud['id_orden'] ?>" target="_self"><span class="badge bg-primary"><i class="fas fa-edit"></i>Editar</span></a> -->

												<span class="badge bg-danger" id="<?php echo $solicitud['id'] ?>" onclick="eliminar('<?php echo $solicitud['id_orden'] ?>')">
													<i class="fas fa-trash"></i>Eliminar
												</span>
											</td>
										</tr>
									<?php
									$total += $precio;
									}
									?>
								</tbody>
								<thead>
									<tr>
										<th></th>
										<th>Total</th>
										<th><?php 
										
										
										echo 'L.' . sprintf('%.2f',$total);
										
										
										
										?></th>
										<th></th>
										<th></th>
									</tr>
								</thead>
							</table>
							<div class="col-12 d-flex justify-content-end">
								<!-- <a href="new-usuario" class="btn btn-primary me-1 mb-1">Nuevo Registro</a> -->
								<a href="mesas_mesero">
									<div class="btn btn-secondary me-1 mb-1">Regresar</div>
								</a>
							</div>
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
			function eliminar(idusuario) {
				console.log("eliminar");
				Swal.fire({
					title: 'Seguro(a)?',
					text: "Esta acción no se puede deshacer",
					icon: 'warning',
					showCancelButton: true,
					confirmButtonColor: '#3085d6',
					cancelButtonColor: '#d33',
					confirmButtonText: 'Sí, borrar!',
					cancelButtonText: 'Cancelar'
				}).then((result) => {
					if (result.isConfirmed) {
						window.location = 'inc/models/delete.php?delete=true&id=' + idusuario;
					} else if (result.isDenied) {
						Swal.fire('Changes are not saved', '', 'info')
					}
				})
			}
		</script>
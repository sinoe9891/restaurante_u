<?php
date_default_timezone_set('America/Tegucigalpa');
include 'inc/templates/header.php';
include 'inc/conexion.php';
include 'inc/functionsquery.php';
// include 'inc/sesiones.php';
session_start();
$name = $_SESSION['nombre_usuario'];
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
							<form class="form" id="editarUsuario" method="post" action="inc/models/insert.php" role="form">
								<div class="tab-content" id="myTabContent">
									<div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">

										<div class="card-body">
											<?php
											$obtenerTodo = obtenerTodo('main_users');
											$consulta = $conn->query("SELECT * FROM mesas a WHERE id=(SELECT max(id) FROM mesas) and a.asignada = 0;");
											$numero = 1;
											while ($solicitud = $consulta->fetch_array()) {
												$id = $solicitud['id'];
												$estado = $solicitud['estado_mesa'];
												$numero_mesa = $solicitud['numero_mesa'];

												if ($estado == 'v') {
													$estadoLote = 'Vendido';
													$color = 'bg-secondary';
												} elseif ($estado == 'd') {
													$estadoLote = 'Disponible';
													$color = 'bg-success';
												} elseif ($estado == 'r') {
													$estadoLote = 'Reservado';
													$color = 'bg-info';
												}
											?>
												<div class="row">
													<div class="col-md-6 col-12">
														<div class="form-group">
															<label for="first-name-column">Número de Mesa*</label>
															<input type="number" class="form-control" id="numero_mesa" name="numero_mesa" value="<?php echo $numero_mesa + 1; ?>" readonly disabled>
															<!-- <select class="form-select" name="role" id="role">
								<?php
												$obtenerNumeroMesas = obtenerNumeroMesas();
												if ($obtenerNumeroMesas->num_rows > 0) {
													while ($row = $obtenerNumeroMesas->fetch_assoc()) {
														$id_mesa = $row['id'];
														$descripcion = $row['numero_mesa'];
														if ($id_mesa == $id) {
															echo '<option name="role" value="' . $id_mesa . '" selected>' . $descripcion . '</option>';
														} else {
															echo '<option name="role" value="' . $id_mesa . '">' . $descripcion . '</option>';
														}
													}
												}
								?>
							</select> -->
														</div>
													</div>
													<div class="col-md-6 col-12">
														<div class="form-group">
															<label for="first-name-column">Mesero</label>
															<select class="form-select" name="role" id="role">
																<?php
																$obtenerTodo = obtenerTodo('main_users');
																if ($obtenerTodo->num_rows > 0) {
																	while ($row = $obtenerTodo->fetch_assoc()) {
																		$usuario_name = $row['usuario_name'];
																		$apellidos = $row['apellidos'];
																		$id_user = $row['id'];
																		$descripcion = $row['numero_mesa'];
																		if ($id_user == $id) {
																			echo '<option name="role" value="' . $id_user . '" selected>' . $usuario_name . ' ' . $apellidos . '</option>';
																		} else {
																			echo '<option name="role" value="' . $id_user . '">' . $usuario_name . ' ' . $apellidos . '</option>';
																		}
																	}
																}
																?>
															</select>
														</div>
													</div>

													<div class="col-md-6 col-12">
														<div class="form-group">
															<label for="last-name-column">Estado</label>
															<select class="form-select" name="estado" id="estado">
																<?php
																if ($estado == 'a') {
																	echo "<option name='estado' value='a' selected>Habilitado</option>";
																	echo "<option name='estado' value='d'>Deshabilitado</option>";
																} elseif ($estado == 'd') {
																	echo "<option name='estado' value='a'>Habilitado</option>";
																	echo "<option name='estado' value='d' selected>Deshabilitado</option>";
																	$estado = 'Disponible';
																}
																?>
															</select>
														</div>
													</div>
												</div>
											<?php
											}
											?>
										</div>
									</div>
									<div class="col-12 d-flex justify-content-end">
										<input type="hidden" class="btn btn-primary me-1 mb-1" id="tipo" name="accion" value="newUsuario">
										<input class="btn btn-primary me-1 mb-1" type="submit" value="Crear" name="crear">
										<a href="mesas">
											<div class="btn btn-secondary me-1 mb-1">Regresar</div>
										</a>
									</div>
								</div>
							</form>
						</div>
					</div>
				</section>
			</div>
		</div>
		<!-- Service End -->
		<?php

		?>
		<?php
		include 'inc/templates/footer.php';

		if (isset($_GET['error'])) {
			if ($_GET['error'] == 1) {
				echo "<script>
				Swal.fire({
					icon: 'error',
					title: 'Oops...',
					text: 'No se creó usuario porque el correo ya éxiste'
				})
				</script>";
			}
		}
		if (isset($_GET['add'])) {
			if ($_GET['add'] == 1) {
				echo "<script>
				Swal.fire({
					icon: 'success',
					title: '¡Usuario Creado!',
					text: 'El usuario se ha creado correctamente',
					position: 'center',
					showConfirmButton: true
				}).then(function () {
					window.location = 'usuarios.php';
				});
			</script>";
			} elseif ($_GET['add'] == 0) {
				echo "<script>
				Swal.fire({
					icon: 'error',
					title: 'Oops...',
					text: 'Ha surgido un error!'
				})
				</script>";
			}
		}
		?>
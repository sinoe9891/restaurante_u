<?php
date_default_timezone_set('America/Tegucigalpa');
include 'inc/templates/header.php';
include 'inc/conexion.php';
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

</style>

<body>
	<div class="container-xxl bg-white p-0">
		<!-- Spinner Start -->
		<div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
			<div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
				<span class="sr-only">Loading...</span>
			</div>
		</div>
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
				<div class="text-center wow fadeInUp" data-wow-delay="0.1s">
					<h5 class="section-title ff-secondary text-center text-primary fw-normal">Administrar</h5>
					<h1 class="mb-5">Mesas</h1>
				</div>
				<section class="section clientes">
					<div class="card">
						<div class="card-body">
							<div class="row g-4">
								<div class="col-lg-3 col-sm-6 wow fadeInUp">
									<div style="text-align:center;">
										<a href="mesa?idm=<?php echo $id; ?>">
											<img class="mesa" width='200px' src="img/mesa.svg" alt="">
											<p>Mesa 1</p>
										</a>
									</div>
								</div>
								<div class="col-lg-3 col-sm-6 wow fadeInUp">
									<div style="text-align:center;">
										<a href="mesa?idm=<?php echo $id; ?>">
											<img class="mesa" width='200px' src="img/mesa.svg" alt="">
											<p>Mesa 1</p>
										</a>
									</div>
								</div>
								<div class="col-lg-3 col-sm-6 wow fadeInUp">
									<div style="text-align:center;">
										<a href="mesa?idm=<?php echo $id; ?>">
											<img class="mesa" width='200px' src="img/mesa.svg" alt="">
											<p>Mesa 1</p>
										</a>
									</div>
								</div>
								<div class="col-lg-3 col-sm-6 wow fadeInUp">
									<div style="text-align:center;">
										<a href="mesa?idm=<?php echo $id; ?>">
											<img class="mesa" width='200px' src="img/mesa.svg" alt="">
											<p>Mesa 1</p>
										</a>
									</div>
								</div>
							</div>
						</div>
						<div class="col-12 d-flex justify-content-end">
							<a href="new-usuario" class="btn btn-primary me-1 mb-1">Nuevo Registro</a>
							<a href="dashboard">
								<div class="btn btn-secondary me-1 mb-1">Regresar</div>
							</a>
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
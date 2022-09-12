<?php
include 'inc/templates/header.php';
// if (isset($_GET['cerrar_sesion'])) {
// 	$_SESSION = array();
// }
?>
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
			include 'inc/templates/navbar.php';
			?>
			<div class="container-xxl py-5 bg-dark hero-header mb-5">
				<div class="container text-center my-5 pt-5 pb-4">
				</div>
			</div>
		</div>
		<!-- Navbar & Hero End -->

		<!-- Contact Start -->
		<div class="container-xxl py-5">
			<div class="container">
				<div class="text-center wow fadeInUp" data-wow-delay="0.1s">
					<h5 class="section-title ff-secondary text-center text-primary fw-normal">Bienvenido</h5>
					<h1 class="mb-5">Iniciar Sesión</h1>
				</div>
				<div class="row g-4">
					<div class="col-sm-4">
					</div>
					<div class="col-sm-4">
						<div class="wow fadeInUp" data-wow-delay="0.2s">
							<form id="formulario" method="post">
								<div class="row g-3">
									<div class="col-12">
										<div class="form-floating">
											<input type="text" class="form-control form-control-user" id="usuario" name="usuario" aria-describedby="emailHelp" placeholder="Usuario">
											<label for="name">Usuario</label>
										</div>
									</div>
									<div class="col-12">
										<div class="form-floating">
											<input type="password" class="form-control form-control-user" id="password" name="contrasena" placeholder="Contraseña">
											<label for="email">Contraseña</label>
										</div>
									</div>
									<div class="col-12">
										<input type="hidden" id="tipo" value="login">
										<button class="btn btn-primary w-100 py-3" id="submit" type="submit">Iniciar sesión</button>
									</div>
								</div>
							</form>

						</div>
					</div>

					<div class="col-sm-4">
					</div>
				</div>
			</div>
		</div>
		<!-- Contact End -->


		<?php
		include 'inc/templates/footer.php';
		?>
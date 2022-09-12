<?php
$archivo = basename($_SERVER['PHP_SELF']);
$actualidad = str_replace(".php", "", $archivo);
?>

</style>


<nav class="navbar navbar-expand-lg navbar-dark bg-dark px-4 px-lg-5 py-3 py-lg-0">
	<a href="" class="navbar-brand p-0">
		<!-- <h1 class="text-primary m-0"><i class="fa fa-utensils me-3"></i>Restoran</h1> -->
		<img src="img/logo.png" alt="Logo">
	</a>
	<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
		<span class="fa fa-bars"></span>
	</button>
	<div class="collapse navbar-collapse" id="navbarCollapse">
		<div class="navbar-nav ms-auto py-0 pe-4">
			 <a href="." class="nav-item nav-link <?php echo $actualidad == 'index' ? 'active' : 'false' ?>">Inicio</a>
			<a href="mesas_mesero" class="nav-item nav-link <?php echo $actualidad == 'mesas_mesero' ? 'active' : '' ?>">Mesas</a>
			<!--<a href="recetas-admin" class="nav-item nav-link <?php echo $actualidad == 'recetas-admin' ? 'active' : '' ?>">Recetas</a>
			<a href="menu-admin" class="nav-item nav-link <?php echo $actualidad == 'menu-admin' ? 'active' : '' ?>">Menú</a>
			<div class="nav-item dropdown">
				<a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Analytics</a>
				<div class="dropdown-menu m-0">
					<a href="booking" class="dropdown-item">Comportamiento</a>
					<a href="team" class="dropdown-item">Adquisición</a>
					<a href="testimonial" class="dropdown-item">Balance</a>
				</div>
			</div> -->
			<!-- <a href="contact" class="nav-item nav-link">Soporte</a> -->
			<a href="ordenes" class="nav-item nav-link">Ordenes</a>
		</div>
		<a href="logout" class="btn btn-primary py-2 px-4">Cerrar Sesión</a>
	</div>
</nav>
<?php
include 'inc/templates/header.php';
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
			include 'inc/templates/navbar-admin.php';
			?>

			<div class="container-xxl py-5 bg-dark hero-header mb-5">
				<div class="container text-center my-5 pt-5 pb-4">
					<h1 class="display-3 text-white mb-3 animated slideInDown">Sobre Nosotros</h1>
					<nav aria-label="breadcrumb">
						<ol class="breadcrumb justify-content-center text-uppercase">
							<li class="breadcrumb-item"><a href="#">Inicio</a></li>
							<li class="breadcrumb-item text-white active" aria-current="page">Sobre Nosotros</li>
						</ol>
					</nav>
				</div>
			</div>
		</div>
		<!-- Navbar & Hero End -->


		<!-- About Start -->
		<!-- <div class="container-xxl py-5">
			<div class="container">
				<div class="row g-5 align-items-center">
					<div class="col-lg-6">
						<div class="row g-3">
							<div class="col-6 text-start">
								<img class="img-fluid rounded w-100 wow zoomIn" data-wow-delay="0.1s" src="img/about-1.jpg">
							</div>
							<div class="col-6 text-start">
								<img class="img-fluid rounded w-75 wow zoomIn" data-wow-delay="0.3s" src="img/about-2.jpg" style="margin-top: 25%;">
							</div>
							<div class="col-6 text-end">
								<img class="img-fluid rounded w-75 wow zoomIn" data-wow-delay="0.5s" src="img/about-3.jpg">
							</div>
							<div class="col-6 text-end">
								<img class="img-fluid rounded w-100 wow zoomIn" data-wow-delay="0.7s" src="img/about-4.jpg">
							</div>
						</div>
					</div>
					<div class="col-lg-6">
						<h5 class="section-title ff-secondary text-start text-primary fw-normal">About Us</h5>
						<h1 class="mb-4">Welcome to <i class="fa fa-utensils text-primary me-2"></i>Restoran</h1>
						<p class="mb-4">Tempor erat elitr rebum at clita. Diam dolor diam ipsum sit. Aliqu diam amet diam et eos erat ipsum et lorem et sit, sed stet lorem sit.</p>
						<p class="mb-4">Tempor erat elitr rebum at clita. Diam dolor diam ipsum sit. Aliqu diam amet diam et eos. Clita erat ipsum et lorem et sit, sed stet lorem sit clita duo justo magna dolore erat amet</p>
						<div class="row g-4 mb-4">
							<div class="col-sm-6">
								<div class="d-flex align-items-center border-start border-5 border-primary px-3">
									<h1 class="flex-shrink-0 display-5 text-primary mb-0" data-toggle="counter-up">15</h1>
									<div class="ps-4">
										<p class="mb-0">Years of</p>
										<h6 class="text-uppercase mb-0">Experience</h6>
									</div>
								</div>
							</div>
							<div class="col-sm-6">
								<div class="d-flex align-items-center border-start border-5 border-primary px-3">
									<h1 class="flex-shrink-0 display-5 text-primary mb-0" data-toggle="counter-up">50</h1>
									<div class="ps-4">
										<p class="mb-0">Popular</p>
										<h6 class="text-uppercase mb-0">Master Chefs</h6>
									</div>
								</div>
							</div>
						</div>
						<a class="btn btn-primary py-3 px-5 mt-2" href="">Read More</a>
					</div>
				</div>
			</div>
		</div> -->
		<!-- About End -->


		<!-- Team Start -->
		<div class="container-xxl pt-5 pb-3">
			<div class="container">
				<div class="text-center wow fadeInUp" data-wow-delay="0.1s">
					<h5 class="section-title ff-secondary text-center text-primary fw-normal">Miembros del Grupo</h5>
					<h1 class="mb-5">Nuestros Expertos</h1>
				</div>
				<div class="row mb-3 text-center" >
					<div class="col wow fadeInUp" data-wow-delay="0.1s">
						<div class="team-item text-center rounded overflow-hidden">
							<div class="rounded-circle overflow-hidden m-4">
								<img class="img-fluid" src="img/team-1.jpg" alt="">
							</div>
							<h5 class="mb-0">Danny Velásquez</h5>
							<small>Full Stack | UX/UI</small>
							<div class="d-flex justify-content-center mt-3">
								<a class="btn btn-square btn-primary mx-1" href=""><i class="fab fa-facebook-f"></i></a>
								<a class="btn btn-square btn-primary mx-1" href=""><i class="fab fa-twitter"></i></a>
								<a class="btn btn-square btn-primary mx-1" href=""><i class="fab fa-instagram"></i></a>
							</div>
						</div>
					</div>
					<div class="col wow fadeInUp" data-wow-delay="0.3s">
						<div class="team-item text-center rounded overflow-hidden">
							<div class="rounded-circle overflow-hidden m-4">
								<img class="img-fluid" src="img/team-2.jpg" alt="">
							</div>
							<h5 class="mb-0">Martín Bertrand</h5>
							<small>Backend | BDA </small>
							<div class="d-flex justify-content-center mt-3">
								<a class="btn btn-square btn-primary mx-1" href=""><i class="fab fa-facebook-f"></i></a>
								<a class="btn btn-square btn-primary mx-1" href=""><i class="fab fa-twitter"></i></a>
								<a class="btn btn-square btn-primary mx-1" href=""><i class="fab fa-instagram"></i></a>
							</div>
						</div>
					</div>
					<div class="col wow fadeInUp" data-wow-delay="0.5s">
						<div class="team-item text-center rounded overflow-hidden">
							<div class="rounded-circle overflow-hidden m-4">
								<img class="img-fluid" src="img/team-3.jpg" alt="">
							</div>
							<h5 class="mb-0">Kelin Ferrera</h5>
							<small>Analista</small>
							<div class="d-flex justify-content-center mt-3">
								<a class="btn btn-square btn-primary mx-1" href=""><i class="fab fa-facebook-f"></i></a>
								<a class="btn btn-square btn-primary mx-1" href=""><i class="fab fa-twitter"></i></a>
								<a class="btn btn-square btn-primary mx-1" href=""><i class="fab fa-instagram"></i></a>
							</div>
						</div>
					</div>
					<div class="col wow fadeInUp" data-wow-delay="0.7s">
						<div class="team-item text-center rounded overflow-hidden">
							<div class="rounded-circle overflow-hidden m-4">
								<img class="img-fluid" src="img/team-4.jpg" alt="">
							</div>
							<h5 class="mb-0">Patricia Nicole</h5>
							<small>UX Designer</small>
							<div class="d-flex justify-content-center mt-3">
								<a class="btn btn-square btn-primary mx-1" href=""><i class="fab fa-facebook-f"></i></a>
								<a class="btn btn-square btn-primary mx-1" href=""><i class="fab fa-twitter"></i></a>
								<a class="btn btn-square btn-primary mx-1" href=""><i class="fab fa-instagram"></i></a>
							</div>
						</div>
					</div>
					<div class="col wow fadeInUp" data-wow-delay="0.7s">
						<div class="team-item text-center rounded overflow-hidden">
							<div class="rounded-circle overflow-hidden m-4">
								<img class="img-fluid" src="img/team-5.jpg" alt="">
							</div>
							<h5 class="mb-0">Ashley Villanueva</h5>
							<small>Analista</small>
							<div class="d-flex justify-content-center mt-3">
								<a class="btn btn-square btn-primary mx-1" href=""><i class="fab fa-facebook-f"></i></a>
								<a class="btn btn-square btn-primary mx-1" href=""><i class="fab fa-twitter"></i></a>
								<a class="btn btn-square btn-primary mx-1" href=""><i class="fab fa-instagram"></i></a>
							</div>
						</div>
					</div>
					<!-- <div class="col wow fadeInUp" data-wow-delay="0.7s">
						<div class="team-item text-center rounded overflow-hidden">

						</div>
					</div> -->
				</div>
			</div>
		</div>
		<!-- Team End -->
<?php
	include 'inc/templates/footer.php';
?>
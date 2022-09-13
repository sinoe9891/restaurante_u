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
			include 'inc/templates/navbar.php';
			?>

			<div class="container-xxl py-5 bg-dark hero-header mb-5">
				<div class="container text-center my-5 pt-5 pb-4">
					<h1 class="display-3 text-white mb-3 animated slideInDown">Contact Us</h1>
					<nav aria-label="breadcrumb">
						<ol class="breadcrumb justify-content-center text-uppercase">
							<li class="breadcrumb-item"><a href="#">Home</a></li>
							<li class="breadcrumb-item"><a href="#">Pages</a></li>
							<li class="breadcrumb-item text-white active" aria-current="page">Contact</li>
						</ol>
					</nav>
				</div>
			</div>
		</div>
		<!-- Navbar & Hero End -->


		<!-- Contact Start -->
		<div class="container-xxl py-5">
			<div class="container">
				<div class="text-center wow fadeInUp" data-wow-delay="0.1s">
					<h5 class="section-title ff-secondary text-center text-primary fw-normal">Contáctenos</h5>
					<h1 class="mb-5">Contacto Para Cualquier Consulta</h1>
				</div>
				<div class="row g-4">
					<div class="col-12">
						<div class="row gy-4">
							<div class="col-md-4">
								<h5 class="section-title ff-secondary fw-normal text-start text-primary">Reservación</h5>
								<p><i class="fa fa-envelope-open text-primary me-2"></i>admisiones@unitec.edu</p>
							</div>
							<div class="col-md-4">
								<h5 class="section-title ff-secondary fw-normal text-start text-primary">General</h5>
								<p><i class="fa fa-envelope-open text-primary me-2"></i>admisiones@unitec.edu</p>
							</div>
							<div class="col-md-4">
								<h5 class="section-title ff-secondary fw-normal text-start text-primary">Soporte</h5>
								<p><i class="fa fa-envelope-open text-primary me-2"></i>tech@unitec.edu</p>
							</div>
						</div>
					</div>
					<div class="col-md-6 wow fadeIn" data-wow-delay="0.1s">
						<iframe class="position-relative rounded w-100 h-100" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3869.895822928022!2d-87.18706778465774!3d14.083326590133547!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8f6fbd2b330e1f27%3A0xf91bf3fe1d7f1152!2zQ0VVVEVDIOKAoiBDZW50cm9hbcOpcmljYQ!5e0!3m2!1ses!2shn!4v1663083397427!5m2!1ses!2shn" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
					</div>
					<div class="col-md-6">
						<div class="wow fadeInUp" data-wow-delay="0.2s">
							<form>
								<div class="row g-3">
									<div class="col-md-6">
										<div class="form-floating">
											<input type="text" class="form-control" id="name" placeholder="Your Name">
											<label for="name">Nombre</label>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-floating">
											<input type="email" class="form-control" id="email" placeholder="Your Email">
											<label for="email">Correo Electrónico</label>
										</div>
									</div>
									<div class="col-12">
										<div class="form-floating">
											<input type="text" class="form-control" id="subject" placeholder="Subject">
											<label for="subject">Asunto</label>
										</div>
									</div>
									<div class="col-12">
										<div class="form-floating">
											<textarea class="form-control" placeholder="Leave a message here" id="message" style="height: 150px"></textarea>
											<label for="message">Mensaje</label>
										</div>
									</div>
									<div class="col-12">
										<button class="btn btn-primary w-100 py-3" type="submit">Enviar Mensaje</button>
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- Contact End -->
		<?php
	include 'inc/templates/footer.php';
?>
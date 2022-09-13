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
			<!-- Navbar & Hero End -->


			<!-- Team Start -->
			<div class="container-xxl pt-5 pb-3">
				<div class="container">
					<div class="text-center wow fadeInUp" data-wow-delay="0.1s">
						<h5 class="section-title ff-secondary text-center text-primary fw-normal">Miembros del Grupo</h5>
						<h1 class="mb-5">Nuestros Expertos</h1>
					</div>
					<div class="row mb-3 text-center">
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
								<small>Backend</small>
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
								<small>BenchMarking</small>
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
			<!-- Team End -->
			<?php
			include 'inc/templates/footer.php';
			?>
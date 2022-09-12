       <!-- Footer Start -->
       <div class="container-fluid bg-dark text-light footer pt-5 mt-5 wow fadeIn" data-wow-delay="0.1s">
       	<div class="container py-5">
       		<div class="row g-5">
       			<div class="col-lg-3 col-md-6">
       				<h4 class="section-title ff-secondary text-start text-primary fw-normal mb-4">Restaurante</h4>
       				<a class="btn btn-link" href="">Nosotros</a>
       				<a class="btn btn-link" href="">Contáctanos</a>
       				<a class="btn btn-link" href="">Reservaciones</a>
       				<a class="btn btn-link" href="">Políticas de Privacidad</a>
       				<a class="btn btn-link" href="">Terminos y Condiciones</a>
       			</div>
       			<div class="col-lg-3 col-md-6">
       				<h4 class="section-title ff-secondary text-start text-primary fw-normal mb-4">Contacto</h4>
       				<p class="mb-2"><i class="fa fa-map-marker-alt me-3"></i>Bulevar Centroamérica, Tegucigalpa, HN</p>
       				<p class="mb-2"><i class="fa fa-phone-alt me-3"></i>+504 2202-4420</p>
       				<p class="mb-2"><i class="fa fa-envelope me-3"></i>admisiones@unitec.edu</p>
       				<div class="d-flex pt-2">
       					<a class="btn btn-outline-light btn-social" href=""><i class="fab fa-twitter"></i></a>
       					<a class="btn btn-outline-light btn-social" href=""><i class="fab fa-facebook-f"></i></a>
       					<a class="btn btn-outline-light btn-social" href=""><i class="fab fa-youtube"></i></a>
       					<a class="btn btn-outline-light btn-social" href=""><i class="fab fa-linkedin-in"></i></a>
       				</div>
       			</div>
       			<div class="col-lg-3 col-md-6">
       				<h4 class="section-title ff-secondary text-start text-primary fw-normal mb-4">Horario</h4>
       				<h5 class="text-light fw-normal">Lunes - Viernes</h5>
       				<p>08AM - 04PM</p>
       				<h5 class="text-light fw-normal">Sábado</h5>
       				<p>08AM - 12PM</p>
       			</div>
       			<div class="col-lg-3 col-md-6">
       				<h4 class="section-title ff-secondary text-start text-primary fw-normal mb-4">Newsletter</h4>
       				<p>Para saber más de nuestras promociones.</p>
       				<div class="position-relative mx-auto" style="max-width: 400px;">
       					<input class="form-control border-primary w-100 py-3 ps-4 pe-5" type="text" placeholder="Correo">
       					<button type="button" class="btn btn-primary py-2 position-absolute top-0 end-0 mt-2 me-2">Suscribirte</button>
       				</div>
       			</div>
       		</div>
       	</div>
       	<div class="container">
       		<div class="copyright">
       			<div class="row">
       				<div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
       					&copy; <a class="border-bottom" href="./">Bertrand Restaurant</a>, All Right Reserved.

       					<!--/*** This template is free as long as you keep the footer author’s credit link/attribution link/backlink. If you'd like to use the template without the footer author’s credit link/attribution link/backlink, you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". Thank you for your support. ***/-->
       					Designed con 💛 <a class="border-bottom" href="https://github.com/sinoe9891">IS2</a><br><br>
       					<!-- Distributed By <a class="border-bottom" href="https://themewagon.com" target="_blank">ThemeWagon</a> -->
       				</div>
       				<div class="col-md-6 text-center text-md-end">
       					<div class="footer-menu">
       						<a href="">Inicio</a>
       						<!-- <a href="">Cookies</a>
       						<a href="">Help</a>
       						<a href="">FQAs</a> -->
       					</div>
       				</div>
       			</div>
       		</div>
       	</div>
       </div>
       <!-- Footer End -->


       <!-- Back to Top -->
       <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
       </div>

       <!-- JavaScript Libraries -->
       <?php
		include 'inc/functions.php';

		$actual = obtenerPaginaActual();
		if ($actual === 'dashboard') {
			echo '<script src="js/sweetalert2.all.min.js"></script>';
		} elseif ($actual === 'login') {
			echo '<script src="js/script-login.js"></script>';
		};
		?>

       <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
       <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
       <script src="lib/wow/wow.min.js"></script>
       <script src="lib/easing/easing.min.js"></script>
       <script src="lib/waypoints/waypoints.min.js"></script>
       <script src="lib/counterup/counterup.min.js"></script>
       <script src="lib/owlcarousel/owl.carousel.min.js"></script>
       <script src="lib/tempusdominus/js/moment.min.js"></script>
       <script src="lib/tempusdominus/js/moment-timezone.min.js"></script>
       <script src="lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>
	   <script src="js/sweetalert2.all.min.js"></script>

       <!-- Template Javascript -->
       <script>
       	$('[data-toggle="counter-up"]').counterUp({
       		delay: 10,
       		time: 2000
       	});
       </script>
       <script src="js/main.js"></script>
       </body>

       </html>
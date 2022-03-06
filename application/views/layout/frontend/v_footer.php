<!-- Footer Section Begin -->
<footer class="footer-section">
	<div class="container">
		<div class="row">
			<div class="col-lg-3 col-md-6 col-sm-6">
				<div class="fs-about">
					<div class="fa-logo">
						<a href="#">
							<img src="<?= base_url() ?>template1/img/selecta2.png" alt="">
						</a>
					</div>
					<p>Selecta Photo & Videography melayani jasa foto wedding, jasa foto-prewedding, jasa foto engagement dan jasa foto studio.</p>
					<div class="fa-social">
						<a href="https://www.facebook.com/umam.muhammad.35"><i class="fa fa-facebook"></i></a>
						<a href="https://www.instagram.com/muhammad_umam_alfarizi/"><i class="fa fa-instagram"></i></a>
					</div>
				</div>
			</div>
			<div class="col-lg-3 col-md-6 col-sm-6">
				<div class="fs-widget">

				</div>
			</div>
			<div class="col-lg-3 col-md-6 col-sm-6">
				<div class="fs-widget">

				</div>
			</div>
			<div class="col-lg-3 col-md-6 col-sm-6">
				<div class="fs-widget">
					<h5>Contact Us</h5>
					<p>082118183900</p>
					<p>Jl. Katabraja Timur No.31 Malausma Majalengka</p>
					<div class="fw-subscribe">

					</div>
				</div>
			</div>
			<div class="col-lg-12">
				<div class="copyright-text">

				</div>
			</div>
		</div>
	</div>
</footer>
<!-- Footer Section End -->

<!-- Search model Begin -->
<div class="search-model">
	<div class="h-100 d-flex align-items-center justify-content-center">
		<div class="search-close-switch">+</div>
		<form class="search-model-form">
			<input type="text" id="search-input" placeholder="Search here.....">
		</form>
	</div>
</div>
<!-- Search model end -->

<!-- Js Plugins -->
<script src="<?= base_url() ?>template1/js/jquery-3.3.1.min.js"></script>
<script src="<?= base_url() ?>template1/js/bootstrap.min.js"></script>
<script src="<?= base_url() ?>template1/js/jquery.magnific-popup.min.js"></script>
<script src="<?= base_url() ?>template1/js/isotope.pkgd.min.js"></script>
<script src="<?= base_url() ?>template1/js/masonry.pkgd.min.js"></script>
<script src="<?= base_url() ?>template1/js/jquery.slicknav.js"></script>
<script src="<?= base_url() ?>template1/js/owl.carousel.min.js"></script>
<script src="<?= base_url() ?>template1/js/main.js"></script>

<script src="<?= base_url() ?>assets/bootstrap-datepicker/js/jQuery-2.1.4.min.js"></script>
<script src="<?= base_url() ?>assets/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>

<script type="text/javascript" src="http://code.jquery.com/jquery-1.7.2.min.js"></script>
<script type="text/javascript" src="http://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>

<!-- <script>
	$(document).ready(function() {
		$('.datepicker').datepicker({
			format: 'yyyy-mm-dd',
			autoclose: true,
			todayHighlight: true,
			minDate: 0,
			maxDate: 10
		});
	});
</script> -->

<script language="javascript">
	var today = new Date();
	var dd = String(today.getDate()).padStart(2, '0');
	var mm = String(today.getMonth() + 1).padStart(2, '0');
	var yyyy = today.getFullYear();

	today = yyyy + '-' + mm + '-' + dd;
	$('#date_picker').attr('min', today);
</script>

<script>
	var today = new Date();
	var dd = String(today.getDate()).padStart(2, '0');
	var mm = String(today.getMonth() + 1).padStart(2, '0');
	var yyyy = today.getFullYear();

	today = yyyy + '-' + mm + '-' + dd;
	$('#date').attr('min', today);
</script>
</body>

</html>

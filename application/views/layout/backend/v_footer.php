<!-- ============================================================== -->
<!-- footer -->
<!-- ============================================================== -->
<footer class="footer text-center text-muted">
    All Rights Reserved by Adminmart. Designed and Developed by <a href="https://wrappixel.com">WrapPixel</a>.
</footer>
<!-- ============================================================== -->
<!-- End footer -->
<!-- ============================================================== -->
</div>
<!-- ============================================================== -->
<!-- End Page wrapper  -->
<!-- ============================================================== -->
</div>
<!-- ============================================================== -->
<!-- End Wrapper -->
<!-- ============================================================== -->
<!-- End Wrapper -->
<!-- ============================================================== -->
<!-- All Jquery -->
<!-- ============================================================== -->
<script src="<?= base_url() ?>template/assets/libs/jquery/dist/jquery.min.js"></script>
<script src="<?= base_url() ?>template/assets/libs/popper.js/dist/umd/popper.min.js"></script>
<script src="<?= base_url() ?>template/assets/libs/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- apps -->
<!-- apps -->
<script src="<?= base_url() ?>template/dist/js/app-style-switcher.js"></script>
<script src="<?= base_url() ?>template/dist/js/feather.min.js"></script>
<script src="<?= base_url() ?>template/assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js"></script>
<script src="<?= base_url() ?>template/dist/js/sidebarmenu.js"></script>
<!--Custom JavaScript -->
<script src="<?= base_url() ?>template/dist/js/custom.min.js"></script>
<!--This page JavaScript -->
<script src="<?= base_url() ?>template/assets/extra-libs/c3/d3.min.js"></script>
<script src="<?= base_url() ?>template/assets/extra-libs/c3/c3.min.js"></script>
<script src="<?= base_url() ?>template/assets/libs/chartist/dist/chartist.min.js"></script>
<script src="<?= base_url() ?>template/assets/libs/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.min.js"></script>
<script src="<?= base_url() ?>template/assets/extra-libs/jvector/jquery-jvectormap-2.0.2.min.js"></script>
<script src="<?= base_url() ?>template/assets/extra-libs/jvector/jquery-jvectormap-world-mill-en.js"></script>
<script src="<?= base_url() ?>template/dist/js/pages/dashboards/dashboard1.min.js"></script>

<!--This page plugins -->
<script src="<?= base_url() ?>template/assets/extra-libs/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?= base_url() ?>template/dist/js/pages/datatable/datatable-basic.init.js"></script>
<script src="<?= base_url() ?>assets/summernote/js/jquery.min.js"></script>
<script src="<?= base_url() ?>assets/summernote/js/bootstrap.min.js"></script>
<script src="<?= base_url() ?>assets/summernote/summernote.min.js"></script>


<script type="text/javascript">
    $(document).ready(function() {
        $('#content').summernote({
            height: "300px",
            styleWithSpan: false
        });
    });
</script>
<script type="text/javascript">
    $(document).ready(function() {
        $('#contentsatu').summernote({
            height: "300px",
            styleWithSpan: false
        });
    });
</script>
<script>
    function bacaGambar(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#gambar_load').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }

    $("#preview_gambar").change(function() {
        bacaGambar(this);
    });
</script>
</body>

</html>
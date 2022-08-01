<!-- 

<footer class="sticky-footer">
<div class="container">
<div class="row no-gutters">
<div class="col-lg-6 col-sm-6">
<p class="mt-1 mb-0">&copy; Copyright 2022 <strong class="text-dark">Hunago</strong>. All Rights Reserved<br>
<small class="mt-0 mb-0">Made with <i class="fas fa-heart text-danger"></i> by <a class="text-primary" target="_blank" href="<?= site_url() ?>">Hunago</a>
</small>
</p>
</div>
<div class="col-lg-6 col-sm-6 text-right">
<div class="app">
<a href="#"><img alt="" src="<?= base_url("assets/img/google.png") ?>"></a>
<a href="#"><img alt="" src="<?= base_url("assets/img/apple.png") ?>"></a>
</div>
</div>
</div>
</div>
</footer> -->
<!-- Button trigger modal -->
<!-- Modal -->

</div>

</div>


<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <a class="btn btn-primary" href="#">Logout</a>
            </div>
        </div>
    </div>
</div>

<script src="<?= base_url("assets/vendor/jquery/jquery.min.js") ?>"></script>
<script src="<?= base_url() ?>assets/vendor/bootstrap-5/js/bootstrap.bundle.min.js"></script>

<script src="<?= base_url("assets/vendor/jquery-easing/jquery.easing.min.js") ?>"></script>

<script src="<?= base_url("assets/vendor/owl-carousel/owl.carousel.js") ?>"></script>
<script>
    var BASE_URL = baseUrl = '<?= base_url(); ?>';
    var loading_scene = new bootstrap.Modal(document.getElementById("loading_scene"), {});
    var loading = $('#loading_scene');
    var css_button = 'btn btn-block btn-danger';
    var html_loader = '<div class="row loader">\
                    <div class="col-12 loader">\
                        <div class="loadingio-spinner-double-ring-x5jbbv5x43o">\
                            <div class="ldio-wmpldorvik">\
                                <div></div>\
                                <div></div>\
                                <div>\
                                    <div></div>\
                                </div>\
                                <div>\
                                    <div></div>\
                                </div>\
                            </div>\
                        </div>\
                        <p class="size-20 fw-medium loader"> Loading... </p>\
                    </div>\
                </div>';
</script>
<script src="<?= base_url('assets/vendor/rocket-loader/rocket-loader.min.js') ?>"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery@3.4.1/dist/jquery.min.js"></script>

<script src="<?= base_url('assets/js/alert/sweetalert2.all.min.js') ?>"></script>
<script src="<?= base_url('assets/js/alert/scriptalert.js') ?>"></script>

<script src="<?= base_url("assets/js/page/function.js") ?>"></script>



<script>
    $(document).ready(function() {
        $('.js-example-basic-single').select2();
    });
</script>
<?php

if (isset($js_add) && is_array($js_add)) {
    foreach ($js_add as $js) {
        echo $js;
    }
} else {
    echo (isset($js_add) && ($js_add != "") ? $js_add : "");
}

?>
</body>

</html>
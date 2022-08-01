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
<div class="modal fade" id="modalLogin" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="modalLoginLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalLoginLabel">Login Hunago</h5>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label mb-1" style="font-size: 15px;">Username</label>
                    <input type="text" class="form-control" placeholder="Masukkan username">
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label mb-1" style="font-size: 15px;">Kata sandi</label>
                    <input type="password" class="form-control" placeholder="Masukkan kata sandi">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-tidak" data-bs-dismiss="modal">Tidak</button>
                <button type="button" class="btn btn-primary">Iya</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modalTambahVideo" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="modalLoginLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalLoginLabel">Tambah Video</h5>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label mb-1" style="font-size: 15px;">Link video</label>
                    <input type="text" class="form-control" placeholder="Masukkan username">
                </div>
                <div class="mb-3 d-flex flex-column">
                    <label for="exampleFormControlInput1" class="form-label mb-1" style="font-size: 15px;">Kategori</label>
                    <select class="form-select js-example-basic-single" aria-label="Default select example" placeholder="Pilih kategori">
                        <option selected>Pilih kategori</option>
                        <option value="1">Game</option>
                        <option value="2">Kartun</option>
                        <option value="3">Komedi</option>
                    </select>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-tidak" data-bs-dismiss="modal">Tidak</button>
                <button type="button" class="btn btn-primary">Iya</button>
            </div>
        </div>
    </div>
</div>
</div>

</div>


<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<div class="modal fade" id="modalTambahKategori" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="modalLoginLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalLoginLabel">Tambah Kategori Video</h5>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label mb-1" style="font-size: 15px;">Kategori Video</label>
                    <input type="text" class="form-control" placeholder="Masukkan kategori video">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-tidak" data-bs-dismiss="modal">Tidak</button>
                <button type="button" class="btn btn-primary">Iya</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modalManagemenVideo" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="modalLoginLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalLoginLabel">Tambah Managemen Video</h5>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label mb-1" style="font-size: 15px;">Judul</label>
                    <input type="text" class="form-control" placeholder="Masukkan judul">
                </div>
                <div class="mb-3 d-flex flex-column">
                    <label for="exampleFormControlInput1" class="form-label mb-1" style="font-size: 15px;">Kategori</label>
                    <select class="form-select js-kategori" aria-label="Default select example" placeholder="Pilih kategori">
                        <option selected>Pilih kategori</option>
                        <option value="1">Video Mix</option>
                        <option value="2">Kartun</option>
                        <option value="3">Game</option>
                    </select>
                </div>
                <div class="mb-3 d-flex flex-column">
                    <label for="exampleFormControlInput1" class="form-label mb-1" style="font-size: 15px;">Role</label>
                    <select class="form-select js-role" aria-label="Default select example" placeholder="Pilih role">
                        <option selected>Pilih role</option>
                        <option value="1">Superadmin</option>
                        <option value="2">Admin</option>
                        <option value="3">Content</option>
                    </select>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-tidak" data-bs-dismiss="modal">Tidak</button>
                <button type="button" class="btn btn-primary">Iya</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modalManagemenUser" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="modalLoginLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalLoginLabel">Tambah Managemen User</h5>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label mb-1" style="font-size: 15px;">Judul</label>
                    <input type="text" class="form-control" placeholder="Masukkan judul">
                </div>
                <div class="mb-3 d-flex flex-column">
                    <label for="exampleFormControlInput1" class="form-label mb-1" style="font-size: 15px;">Role</label>
                    <select class="form-select js-role" aria-label="Default select example" placeholder="Pilih role">
                        <option selected>Pilih role</option>
                        <option value="1">Superadmin</option>
                        <option value="2">Admin</option>
                        <option value="3">Content</option>
                    </select>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-tidak" data-bs-dismiss="modal">Tidak</button>
                <button type="button" class="btn btn-primary">Iya</button>
            </div>
        </div>
    </div>
</div>

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

<script src="<?= base_url("assets/js/custom.js") ?>"></script>
<script src="<?= base_url('assets/vendor/rocket-loader/rocket-loader.min.js') ?>"></script>
<script defer src="https://static.cloudflareinsights.com/beacon.min.js/v652eace1692a40cfa3763df669d7439c1639079717194" integrity="sha512-Gi7xpJR8tSkrpF7aordPZQlW2DLtzUlZcumS8dMQjwDHEnw9I7ZLyiOj/6tZStRBGtGgN6ceN6cMH8z7etPGlw==" data-cf-beacon='{"rayId":"73014a037fce6bc1","version":"2022.6.0","r":1,"token":"dd471ab1978346bbb991feaa79e6ce5c","si":100}' crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<script>
    $(document).ready(function() {
        $('.js-example-basic-single').select2();
    });

    $(document).ready(function() {
        $('.js-role').select2();
    });

    $(document).ready(function() {
        $('.js-kategori').select2();
    });
</script>
</body>

</html>
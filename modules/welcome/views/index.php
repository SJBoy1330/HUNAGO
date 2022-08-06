<div id="content-wrapper">
    <div class="container-fluid pt-5 pb-0">
        <div class="top-mobile-search">
            <div class="row search-welcome">
                <div class="col-md-12">
                    <form class="mobile-search">
                        <div class="input-group">
                            <input type="text" class="form-control mobile-search" placeholder="Pencarian...">
                            <div class="input-group-append">
                                <button class="btn btn-mobile-search" type="button">
                                    <i class="fa-solid fa-magnifying-glass" style="color: #828282"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div id="parent_video">
            <div id="reload_video">
                <?php if ($result) : ?>
                    <div class="top-category section-padding">
                        <?php if ($kategori) : ?>
                            <div class="row filter-welcome">
                                <div class="col-md-12">
                                    <div class="scrollmenu mb-4 base_tipe">
                                        <a onclick="get_kategori(this,'all')">
                                            <div class="tag tipe active">
                                                <span class="text-uppercase">Semua</span>
                                            </div>
                                        </a>
                                        <?php foreach ($kategori as $row) : ?>
                                            <a onclick="get_kategori(this,<?= $row->id_kategori; ?>)">
                                                <div class="tag tipe">
                                                    <span class="text-uppercase"><?= $row->nama; ?></span>
                                                </div>
                                            </a>
                                        <?php endforeach; ?>
                                    </div>
                                </div>
                            </div>
                        <?php endif; ?>
                        <hr><hr>
                        <div class="video-block section-padding" id="parenting_tipe">
                            <div class="row">
                                <div class="col-md-12 video-terbaru">
                                    <div class="main-title">
                                        <h6>Video Terbaru</h6>
                                    </div>
                                </div>
                                <?php foreach ($result as $row) : ?>
                                    <div class="col-xl-3 col-sm-6 mb-3 zoom-filter showing" data-tipe="kategori-<?= $row->id_kategori; ?>">
                                        <div class="video-card">
                                            <div class="video-card-image">
                                                <a class="play-icon" href="<?= $row->url; ?>" target="_blank"><i class="fas fa-play-circle"></i></a>
                                                <a class="image-thumbnail" href="#"><img class="img-fluid" src="<?= $row->thumbnail; ?>" alt=""></a>
                                            </div>
                                            <div class="video-card-body">
                                                <div class="video-title">
                                                    <a href="<?= site_url('video/single') ?>"><?= $row->judul; ?></a>
                                                </div>
                                                <div class="video-page text-success">
                                                    <?= $row->kategori; ?>
                                                </div>
                                                <div class="video-view">
                                                    <i class="fas fa-calendar-alt"></i>&nbsp;&nbsp;<?= nice_time($row->create_date); ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
                <?php
                if (!$result) {
                    $cnt = 0;
                } else {
                    $cnt = count($result);
                }
                ?>
                <?= vector_default(base_url('assets/img/vector/vector_video.svg'), 'Tidak ada video', 'Klik tombol pada pojok kanan bawah untuk menambahkan video!', 'vector_video', $cnt); ?>
            </div>
        </div>

    </div>
</div>
<div class="modal fade" id="modalLogin" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="modalLoginLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <form method="post" action="<?= base_url('welcome/login_proses') ?>" id="login_form" class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalLoginLabel">Login Hunago</h5>
            </div>
            <div class="modal-body">
                <div class="mb-3" id="req_username">
                    <label for="username" class="form-label mb-1" style="font-size: 15px;">Username</label>
                    <input type="text" name="username" class="form-control" id="username" placeholder="Masukkan username" autocomplete="off" style="color: #FFFFFF;">
                </div>
                <div class="mb-3" id="req_kata_sandi">
                    <label for="kata_sandi" class="form-label mb-1" style="font-size: 15px;">Kata sandi</label>
                    <input type="password" name="kata_sandi" class="form-control" id="kata_sandi" placeholder="Masukkan kata sandi" autocomplete="off" style="color: #FFFFFF;">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-tidak" data-bs-dismiss="modal">Tidak</button>
                <button type="submit" id="button_login" onclick="submit_form(this,'#login_form',2)" class="btn btn-primary">Masuk</button>
            </div>
        </form>
    </div>
</div>


<!-- <script>
    let w = window.innerWidth;
    let h = window.innerHeight;
    console.log(w + ' x ' + h);
</script> -->
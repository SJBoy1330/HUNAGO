<div id="content-wrapper">
    <div class="container-fluid pb-0">
        <div class="top-mobile-search">
            <div class="row">
                <div class="col-md-12">
                    <form class="mobile-search">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Pencarian..." style="height: 35px;">
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
        <a data-bs-toggle="modal" data-bs-target="#filterTambahTugas" class="avatar avatar-60 shadow-lg rounded-circle avatar-presensi-solid avatar-kontak position-fixed">
            <i class="fa-solid fa-plus-large size-26 text-white mt-1"></i>
        </a>
        <?php if ($result) : ?>
            <div class="top-category section-padding">
                <?php if ($kategori) : ?>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="tab">
                                <button class="tablinks active">Semua</button>
                                <?php foreach ($kategori as $row) : ?>
                                    <button class="tablinks"><?= $row->nama; ?></button>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                    <hr>
                <?php endif; ?>
                <div class="video-block section-padding">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="main-title">
                                <h6>Video Terbaru</h6>
                            </div>
                        </div>
                        <?php foreach ($result as $row) : ?>
                            <div class="col-xl-3 col-sm-6 mb-3">
                                <div class="video-card">
                                    <div class="video-card-image">
                                        <a class="play-icon" href="<?= $row->url; ?>" target="_blank"><i class="fas fa-play-circle"></i></a>
                                        <a href="#"><img class="img-fluid" src="<?= $row->thumbnail; ?>" alt=""></a>
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
        <?= vector_default(base_url('assets/img/vector/vector_video.svg'), 'Tidak ada video', 'Klik tombol pada pojok kanan bawah untuk menambahkan video!', '#vector_video', count($result)); ?>
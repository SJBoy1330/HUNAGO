<style>
    .ytp-chrome-top {
        display: none !important;
    }
</style>
<div id="content-wrapper">
    <div class="container-fluid pb-0">
        <div class="video-block section-padding">
            <div class="row">
                <?php
                if ($terkait) {
                    $css = 'col-md-8';
                } else {
                    $css = 'col-md-12';
                }
                ?>
                <div class="<?= $css; ?>">
                    <div class="single-video-left">
                        <div class="single-video">
                            <?php
                            if (strpos($row->url, "watch?v=")) {
                                $id_yt = get_id_yt($row->url);
                                $url_video = "https://www.youtube.com/embed/" . $id_yt;
                            } else {
                                $url_video = str_replace("https://youtu.be/", "https://www.youtube.com/embed/", $row->url);
                            }
                            ?>
                            <iframe type=”text/html” width="100%" height="315" src="<?= $url_video . '?modestbranding=1&amp;rel=0&amp;controls=0&amp;' ?>" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                        </div>
                        <div class="single-video-title box mb-3">
                            <h2><a href="#"><?= $row->judul; ?></a></h2>
                        </div>
                        <div class="single-video-author box mb-3">
                            <div class="float-right"><a href="<?= $row->url; ?>" target="_blank" class="btn btn-danger" type="button">Go To Youtube</a></div>
                            <?php
                            if ($row->foto != NULL) {
                                $foto = base_url('assets/photos/' . $row->foto);
                            } else {
                                $foto = base_url('assets/img/profil_default.png');
                            }
                            ?>
                            <img class="img-fluid" src="<?= $foto; ?>" alt="">
                            <p><a href="#"><strong><?= $row->nama_user; ?></strong></a> <span title="" data-placement="top" data-toggle="tooltip" data-original-title="Verified"><i class="fas fa-check-circle text-success"></i></span></p>
                            <small><?= day_from_number(date('N', strtotime($row->create_date))) . ', ' . date('d', strtotime($row->create_date)) . ' ' . month_from_number(date('m', strtotime($row->create_date))) . ' ' . date('Y', strtotime($row->create_date)); ?></small>
                        </div>
                        <?php if ($tag) : ?>
                            <div class="single-video-info-content box mb-3">
                                <p class="tags mb-0">
                                    <?php foreach ($tag as $tg) : ?>
                                        <span><a><?= $tg->nama; ?></a></span>
                                    <?php endforeach; ?>
                                </p>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
                <?php if ($terkait) : ?>
                    <div class="col-md-4">
                        <div class="single-video-right">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="main-title">
                                        <div class="btn-group float-right right-action">
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <a class="dropdown-item" href="#"><i class="fas fa-fw fa-star"></i> &nbsp; Top Rated</a>
                                                <a class="dropdown-item" href="#"><i class="fas fa-fw fa-signal"></i> &nbsp; Viewed</a>
                                                <a class="dropdown-item" href="#"><i class="fas fa-fw fa-times-circle"></i> &nbsp; Close</a>
                                            </div>
                                        </div>
                                        <h6>Up Next</h6>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <?php foreach ($terkait as $video) : ?>
                                        <div class="video-card for-redirect video-card-list">
                                            <div class="video-card-image">
                                                <a class="play-icon" href="<?= base_url('welcome/single/' . $video->id_video); ?>"><i class="fas fa-play-circle"></i></a>
                                                <a href="<?= base_url('welcome/single/' . $video->id_video); ?>"><img class="img-fluid" src="<?= $video->thumbnail; ?>" alt=""></a>
                                            </div>
                                            <div class="video-card-body">
                                                <div class="video-title">
                                                    <a href="<?= base_url('welcome/single/' . $video->id_video); ?>"><?= tampil_text($video->judul, 50); ?></a>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
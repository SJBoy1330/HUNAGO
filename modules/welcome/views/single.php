<style>
    .ytp-chrome-top {
        display: none !important;
    }
</style>
<div id="content-wrapper">
    <div class="container-fluid pb-0">
        <div class="video-block section-padding">
            <div class="row">
                <div class="col-md-8">
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
                        <div class="single-video-info-content box mb-3">
                            <p class="tags mb-0">
                                <span><a href="#">Uncharted 4</a></span>
                                <span><a href="#">Playstation 4</a></span>
                                <span><a href="#">Gameplay</a></span>
                                <span><a href="#">1080P</a></span>
                                <span><a href="#">ps4Share</a></span>
                                <span><a href="#">+ 6</a></span>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="single-video-right">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="adblock">
                                    <div class="img">
                                        Google AdSense<br>
                                        336 x 280
                                    </div>
                                </div>
                                <div class="main-title">
                                    <div class="btn-group float-right right-action">
                                        <a href="#" class="right-action-link text-gray" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            Sort by <i class="fa fa-caret-down" aria-hidden="true"></i>
                                        </a>
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
                                <div class="video-card video-card-list">
                                    <div class="video-card-image">
                                        <a class="play-icon" href="#"><i class="fas fa-play-circle"></i></a>
                                        <a href="#"><img class="img-fluid" src="<?= base_url('assets/img/v1.png') ?>" alt=""></a>
                                        <div class="time">3:50</div>
                                    </div>
                                    <div class="video-card-body">
                                        <div class="btn-group float-right right-action">
                                            <a href="#" class="right-action-link text-gray" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <a class="dropdown-item" href="#"><i class="fas fa-fw fa-star"></i> &nbsp; Top Rated</a>
                                                <a class="dropdown-item" href="#"><i class="fas fa-fw fa-signal"></i> &nbsp; Viewed</a>
                                                <a class="dropdown-item" href="#"><i class="fas fa-fw fa-times-circle"></i> &nbsp; Close</a>
                                            </div>
                                        </div>
                                        <div class="video-title">
                                            <a href="#">Here are many variati of passages of Lorem</a>
                                        </div>
                                        <div class="video-page text-success">
                                            Education <a title="" data-placement="top" data-toggle="tooltip" href="#" data-original-title="Verified"><i class="fas fa-check-circle text-success"></i></a>
                                        </div>
                                        <div class="video-view">
                                            1.8M views &nbsp;<i class="fas fa-calendar-alt"></i> 11 Months ago
                                        </div>
                                    </div>
                                </div>
                                <div class="video-card video-card-list">
                                    <div class="video-card-image">
                                        <a class="play-icon" href="#"><i class="fas fa-play-circle"></i></a>
                                        <a href="#"><img class="img-fluid" src="<?= base_url('assets/img/v2.png') ?>" alt=""></a>
                                        <div class="time">3:50</div>
                                    </div>
                                    <div class="video-card-body">
                                        <div class="btn-group float-right right-action">
                                            <a href="#" class="right-action-link text-gray" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <a class="dropdown-item" href="#"><i class="fas fa-fw fa-star"></i> &nbsp; Top Rated</a>
                                                <a class="dropdown-item" href="#"><i class="fas fa-fw fa-signal"></i> &nbsp; Viewed</a>
                                                <a class="dropdown-item" href="#"><i class="fas fa-fw fa-times-circle"></i> &nbsp; Close</a>
                                            </div>
                                        </div>
                                        <div class="video-title">
                                            <a href="#">Duis aute irure dolor in reprehenderit in.</a>
                                        </div>
                                        <div class="video-page text-success">
                                            Education <a title="" data-placement="top" data-toggle="tooltip" href="#" data-original-title="Verified"><i class="fas fa-check-circle text-success"></i></a>
                                        </div>
                                        <div class="video-view">
                                            1.8M views &nbsp;<i class="fas fa-calendar-alt"></i> 11 Months ago
                                        </div>
                                    </div>
                                </div>
                                <div class="video-card video-card-list">
                                    <div class="video-card-image">
                                        <a class="play-icon" href="#"><i class="fas fa-play-circle"></i></a>
                                        <a href="#"><img class="img-fluid" src="<?= base_url('assets/img/v3.png') ?>" alt=""></a>
                                        <div class="time">3:50</div>
                                    </div>
                                    <div class="video-card-body">
                                        <div class="btn-group float-right right-action">
                                            <a href="#" class="right-action-link text-gray" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <a class="dropdown-item" href="#"><i class="fas fa-fw fa-star"></i> &nbsp; Top Rated</a>
                                                <a class="dropdown-item" href="#"><i class="fas fa-fw fa-signal"></i> &nbsp; Viewed</a>
                                                <a class="dropdown-item" href="#"><i class="fas fa-fw fa-times-circle"></i> &nbsp; Close</a>
                                            </div>
                                        </div>
                                        <div class="video-title">
                                            <a href="#">Culpa qui officia deserunt mollit anim</a>
                                        </div>
                                        <div class="video-page text-success">
                                            Education <a title="" data-placement="top" data-toggle="tooltip" href="#" data-original-title="Verified"><i class="fas fa-check-circle text-success"></i></a>
                                        </div>
                                        <div class="video-view">
                                            1.8M views &nbsp;<i class="fas fa-calendar-alt"></i> 11 Months ago
                                        </div>
                                    </div>
                                </div>
                                <div class="video-card video-card-list">
                                    <div class="video-card-image">
                                        <a class="play-icon" href="#"><i class="fas fa-play-circle"></i></a>
                                        <a href="#"><img class="img-fluid" src="<?= base_url('assets/img/v4.png') ?>" alt=""></a>
                                        <div class="time">3:50</div>
                                    </div>
                                    <div class="video-card-body">
                                        <div class="btn-group float-right right-action">
                                            <a href="#" class="right-action-link text-gray" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <a class="dropdown-item" href="#"><i class="fas fa-fw fa-star"></i> &nbsp; Top Rated</a>
                                                <a class="dropdown-item" href="#"><i class="fas fa-fw fa-signal"></i> &nbsp; Viewed</a>
                                                <a class="dropdown-item" href="#"><i class="fas fa-fw fa-times-circle"></i> &nbsp; Close</a>
                                            </div>
                                        </div>
                                        <div class="video-title">
                                            <a href="#">Deserunt mollit anim id est laborum.</a>
                                        </div>
                                        <div class="video-page text-success">
                                            Education <a title="" data-placement="top" data-toggle="tooltip" href="#" data-original-title="Verified"><i class="fas fa-check-circle text-success"></i></a>
                                        </div>
                                        <div class="video-view">
                                            1.8M views &nbsp;<i class="fas fa-calendar-alt"></i> 11 Months ago
                                        </div>
                                    </div>
                                </div>
                                <div class="video-card video-card-list">
                                    <div class="video-card-image">
                                        <a class="play-icon" href="#"><i class="fas fa-play-circle"></i></a>
                                        <a href="#"><img class="img-fluid" src="<?= base_url('assets/img/v5.png') ?>" alt=""></a>
                                        <div class="time">3:50</div>
                                    </div>
                                    <div class="video-card-body">
                                        <div class="btn-group float-right right-action">
                                            <a href="#" class="right-action-link text-gray" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <a class="dropdown-item" href="#"><i class="fas fa-fw fa-star"></i> &nbsp; Top Rated</a>
                                                <a class="dropdown-item" href="#"><i class="fas fa-fw fa-signal"></i> &nbsp; Viewed</a>
                                                <a class="dropdown-item" href="#"><i class="fas fa-fw fa-times-circle"></i> &nbsp; Close</a>
                                            </div>
                                        </div>
                                        <div class="video-title">
                                            <a href="#">Exercitation ullamco laboris nisi ut.</a>
                                        </div>
                                        <div class="video-page text-success">
                                            Education <a title="" data-placement="top" data-toggle="tooltip" href="#" data-original-title="Verified"><i class="fas fa-check-circle text-success"></i></a>
                                        </div>
                                        <div class="video-view">
                                            1.8M views &nbsp;<i class="fas fa-calendar-alt"></i> 11 Months ago
                                        </div>
                                    </div>
                                </div>
                                <div class="video-card video-card-list">
                                    <div class="video-card-image">
                                        <a class="play-icon" href="#"><i class="fas fa-play-circle"></i></a>
                                        <a href="#"><img class="img-fluid" src="<?= base_url('assets/img/v6.png') ?>" alt=""></a>
                                        <div class="time">3:50</div>
                                    </div>
                                    <div class="video-card-body">
                                        <div class="btn-group float-right right-action">
                                            <a href="#" class="right-action-link text-gray" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <a class="dropdown-item" href="#"><i class="fas fa-fw fa-star"></i> &nbsp; Top Rated</a>
                                                <a class="dropdown-item" href="#"><i class="fas fa-fw fa-signal"></i> &nbsp; Viewed</a>
                                                <a class="dropdown-item" href="#"><i class="fas fa-fw fa-times-circle"></i> &nbsp; Close</a>
                                            </div>
                                        </div>
                                        <div class="video-title">
                                            <a href="#">There are many variations of passages of Lorem</a>
                                        </div>
                                        <div class="video-page text-success">
                                            Education <a title="" data-placement="top" data-toggle="tooltip" href="#" data-original-title="Verified"><i class="fas fa-check-circle text-success"></i></a>
                                        </div>
                                        <div class="video-view">
                                            1.8M views &nbsp;<i class="fas fa-calendar-alt"></i> 11 Months ago
                                        </div>
                                    </div>
                                </div>
                                <div class="adblock mt-0">
                                    <div class="img">
                                        Google AdSense<br>
                                        336 x 280
                                    </div>
                                </div>
                                <div class="video-card video-card-list">
                                    <div class="video-card-image">
                                        <a class="play-icon" href="#"><i class="fas fa-play-circle"></i></a>
                                        <a href="#"><img class="img-fluid" src="<?= base_url('assets/img/v2.png') ?>" alt=""></a>
                                        <div class="time">3:50</div>
                                    </div>
                                    <div class="video-card-body">
                                        <div class="btn-group float-right right-action">
                                            <a href="#" class="right-action-link text-gray" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <a class="dropdown-item" href="#"><i class="fas fa-fw fa-star"></i> &nbsp; Top Rated</a>
                                                <a class="dropdown-item" href="#"><i class="fas fa-fw fa-signal"></i> &nbsp; Viewed</a>
                                                <a class="dropdown-item" href="#"><i class="fas fa-fw fa-times-circle"></i> &nbsp; Close</a>
                                            </div>
                                        </div>
                                        <div class="video-title">
                                            <a href="#">Duis aute irure dolor in reprehenderit in.</a>
                                        </div>
                                        <div class="video-page text-success">
                                            Education <a title="" data-placement="top" data-toggle="tooltip" href="#" data-original-title="Verified"><i class="fas fa-check-circle text-success"></i></a>
                                        </div>
                                        <div class="video-view">
                                            1.8M views &nbsp;<i class="fas fa-calendar-alt"></i> 11 Months ago
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
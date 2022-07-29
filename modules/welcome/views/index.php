<style>
    /* Style the tab */
    .tab {
        overflow: hidden;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    /* Style the buttons that are used to open the tab content */
    .tab button {
        background-color: inherit;
        float: left;
        border: none;
        outline: none;
        cursor: pointer;
        padding: 5px 12px;
        transition: 0.3s;
        border-radius: 20px;
        font-weight: medium;
        background-color: #4D4D4D;
        font-weight: 600;
        color: #FFFFFF;
        margin-right: 12px;
        border: 1px solid rgba(255, 255, 255, 0.1);
    }

    /* Change background color of buttons on hover */
    .tab button:hover {
        background-color: #5D5D5D;
    }

    /* Create an active/current tablink class */
    .tab button.active {
        background-color: #FFFFFF;
        font-weight: 600;
        color: #303030;
    }

    /* Style the tab content */
    .tabcontent {
        margin-top: 1.3rem;
        display: none;
        padding: 6px 12px;
        border-top: none;
    }
</style>
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
        <div class="top-category section-padding">
            <div class="row">
                <div class="col-md-12">
                    <!-- <div class="main-title">
                        <div class="btn-group float-right right-action">
                            <a href="<?=site_url('video/single')?>" class="right-action-link text-gray" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fa fa-ellipsis-h" aria-hidden="true"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a class="dropdown-item" href="<?=site_url('video/single')?>"><i class="fas fa-fw fa-star"></i> &nbsp; Top Rated</a>
                                <a class="dropdown-item" href="<?=site_url('video/single')?>"><i class="fas fa-fw fa-signal"></i> &nbsp; Viewed</a>
                                <a class="dropdown-item" href="<?=site_url('video/single')?>"><i class="fas fa-fw fa-times-circle"></i> &nbsp; Close</a>
                            </div>
                        </div>
                        <h6>Kategori Video </h6>
                    </div> -->
                    <!-- Tab links -->
                    <div class="tab">
                        <button class="tablinks active" onclick="openCity(event, 'Semua')">Semua</button>
                        <button class="tablinks" onclick="openCity(event, 'Video')">Video Mix</button>
                        <button class="tablinks" onclick="openCity(event, 'Musik')">Musik</button>
                        <button class="tablinks" onclick="openCity(event, 'Game')">Game</button>
                        <button class="tablinks" onclick="openCity(event, 'Live')">Live</button>
                        <button class="tablinks" onclick="openCity(event, 'Kartun')">Kartun</button>
                        <button class="tablinks" onclick="openCity(event, 'Petualangan')">Game Petualangan Aksi</button>
                        <button class="tablinks" onclick="openCity(event, 'Baru')">Baru diupload</button>
                        <button class="tablinks" onclick="openCity(event, 'Ditonton')">Ditonton</button>
                        <button class="tablinks" onclick="openCity(event, 'Anda')">Baru untuk Anda</button>
                    </div>

                    <div id="Video" class="tabcontent">
                        <div class="row">
                            <div class="col-xl-3 col-sm-6 mb-3 me-0">
                                <div class="video-card">
                                    <div class="video-card-image">
                                        <a class="play-icon" href="<?=site_url('video/single')?>"><i class="fas fa-play-circle"></i></a>
                                        <a href="<?=site_url('video/single')?>"><img class="img-fluid" src="<?=base_url("assets/img/v1.png")?>" alt=""></a>
                                        <div class="time">3:50</div>
                                    </div>
                                    <div class="video-card-body">
                                        <div class="video-title">
                                            <a href="<?=site_url('video/single')?>">There are many variations of passages of Lorem</a>
                                        </div>
                                        <div class="video-page text-success">
                                            Education <a title="" data-placement="top" data-toggle="tooltip" href="<?=site_url('video/single')?>" data-original-title="Verified"><i class="fas fa-check-circle text-success"></i></a>
                                        </div>
                                        <div class="video-view">
                                            1.8M views &nbsp;<i class="fas fa-calendar-alt"></i> 11 Months ago
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-sm-6 mb-3">
                                <div class="video-card">
                                    <div class="video-card-image">
                                        <a class="play-icon" href="<?=site_url('video/single')?>"><i class="fas fa-play-circle"></i></a>
                                        <a href="<?=site_url('video/single')?>"><img class="img-fluid" src="<?=base_url("assets/img/v2.png")?>" alt=""></a>
                                        <div class="time">3:50</div>
                                    </div>
                                <div class="video-card-body">
                                    <div class="video-title">
                                        <a href="<?=site_url('video/single')?>">There are many variations of passages of Lorem</a>
                                    </div>
                                    <div class="video-page text-success">
                                        Education <a title="" data-placement="top" data-toggle="tooltip" href="<?=site_url('video/single')?>" data-original-title="Verified"><i class="fas fa-check-circle text-success"></i></a>
                                    </div>
                                    <div class="video-view">
                                        1.8M views &nbsp;<i class="fas fa-calendar-alt"></i> 11 Months ago
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="owl-carousel owl-carousel-category">
                        <div class="item">
                            <div class="category-item">
                                <a href="<?=site_url('video/single')?>">
                                    <img class="img-fluid" src="<?=base_url("assets/img/s1.png")?>" alt="">
                                    <h6>Your Life</h6>
                                    <p>74,853 views</p>
                                </a>
                            </div>
                        </div>
                        <div class="item">
                            <div class="category-item">
                                <a href="<?=site_url('video/single')?>">
                                    <img class="img-fluid" src="<?=base_url("assets/img/s2.png")?>" alt="">
                                    <h6>Unboxing Cool</h6>
                                    <p>74,853 views</p>
                                </a>
                            </div>
                        </div>
                        <div class="item">
                            <div class="category-item">
                                <a href="<?=site_url('video/single')?>">
                                <img class="img-fluid" src="<?=base_url("assets/img/s3.png")?>" alt="">
                                <h6>Service Reviewing</h6>
                                <p>74,853 views</p>
                                </a>
                            </div>
                        </div>
                        <div class="item">
                            <div class="category-item">
                                <a href="<?=site_url('video/single')?>">
                                    <img class="img-fluid" src="<?=base_url("assets/img/s4.png")?>" alt="">
                                    <h6>Gaming <span title="" data-placement="top" data-toggle="tooltip" data-original-title="Verified"><i class="fas fa-check-circle text-success"></i></span></h6>
                                    <p>74,853 views</p>
                                </a>
                            </div>
                        </div>
                        <div class="item">
                            <div class="category-item">
                                <a href="<?=site_url('video/single')?>">
                                    <img class="img-fluid" src="<?=base_url("assets/img/s5.png")?>" alt="">
                                    <h6>Technology Tutorials</h6>
                                    <p>74,853 views</p>
                                </a>
                            </div>
                        </div>
                        <div class="item">
                            <div class="category-item">
                                <a href="<?=site_url('video/single')?>">
                                    <img class="img-fluid" src="<?=base_url("assets/img/s6.png")?>" alt="">
                                    <h6>Singing</h6>
                                    <p>74,853 views</p>
                                </a>
                            </div>
                        </div>
                        <div class="item">
                            <div class="category-item">
                                <a href="<?=site_url('video/single')?>">
                                <img class="img-fluid" src="<?=base_url("assets/img/s7.png")?>" alt="">
                                <h6>Cooking</h6>
                                <p>74,853 views</p>
                                </a>
                            </div>
                        </div>
                        <div class="item">
                            <div class="category-item">
                                <a href="<?=site_url('video/single')?>">
                                    <img class="img-fluid" src="<?=base_url("assets/img/s8.png")?>" alt="">
                                    <h6>Traveling</h6>
                                    <p>74,853 views</p>
                                </a>
                            </div>
                        </div>
                        <div class="item">
                            <div class="category-item">
                                <a href="<?=site_url('video/single')?>">
                                    <img class="img-fluid" src="<?=base_url("assets/img/s1.png")?>" alt="">
                                    <h6>Education</h6>
                                    <p>74,853 views</p>
                                </a>
                            </div>
                        </div>
                        <div class="item">
                            <div class="category-item">
                                <a href="<?=site_url('video/single')?>">
                                    <img class="img-fluid" src="<?=base_url("assets/img/s2.png")?>" alt="">
                                    <h6>Noodles, Sauces & Instant Food</h6>
                                    <p>74,853 views</p>
                                </a>
                            </div>
                        </div>
                        <div class="item">
                            <div class="category-item">
                                <a href="<?=site_url('video/single')?>">
                                    <img class="img-fluid" src="<?=base_url("assets/img/s3.png")?>" alt="">
                                    <h6>Comedy <span title="" data-placement="top" data-toggle="tooltip" data-original-title="Verified"><i class="fas fa-check-circle text-success"></i></span></h6>
                                    <p>74,853 views</p>
                                </a>
                            </div>
                        </div>
                        <div class="item">
                            <div class="category-item">
                                <a href="<?=site_url('video/single')?>">
                                    <img class="img-fluid" src="<?=base_url("assets/img/s4.png")?>" alt="">
                                    <h6>Lifestyle Advice</h6>
                                    <p>74,853 views</p>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <hr>
        <div class="video-block section-padding">
            <div class="row">
                <div class="col-md-12">
                    <div class="main-title">
                        <div class="btn-group float-right right-action">
                            <a href="<?=site_url('video/single')?>" class="right-action-link text-gray" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Sort by <i class="fa fa-caret-down" aria-hidden="true"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a class="dropdown-item" href="<?=site_url('video/single')?>"><i class="fas fa-fw fa-star"></i> &nbsp; Top Rated</a>
                                <a class="dropdown-item" href="<?=site_url('video/single')?>"><i class="fas fa-fw fa-signal"></i> &nbsp; Viewed</a>
                                <a class="dropdown-item" href="<?=site_url('video/single')?>"><i class="fas fa-fw fa-times-circle"></i> &nbsp; Close</a>
                            </div>
                        </div>
                        <h6>Video Terbaru</h6>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 mb-3">
                    <div class="video-card">
                        <div class="video-card-image">
                            <a class="play-icon" href="<?=site_url('video/single')?>"><i class="fas fa-play-circle"></i></a>
                            <a href="<?=site_url('video/single')?>"><img class="img-fluid" src="<?=base_url("assets/img/v1.png")?>" alt=""></a>
                            <div class="time">3:50</div>
                        </div>
                        <div class="video-card-body">
                            <div class="video-title">
                                <a href="<?=site_url('video/single')?>">There are many variations of passages of Lorem</a>
                            </div>
                            <div class="video-page text-success">
                                Education <a title="" data-placement="top" data-toggle="tooltip" href="<?=site_url('video/single')?>" data-original-title="Verified"><i class="fas fa-check-circle text-success"></i></a>
                            </div>
                            <div class="video-view">
                                1.8M views &nbsp;<i class="fas fa-calendar-alt"></i> 11 Months ago
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 mb-3">
                    <div class="video-card">
                        <div class="video-card-image">
                            <a class="play-icon" href="<?=site_url('video/single')?>"><i class="fas fa-play-circle"></i></a>
                            <a href="<?=site_url('video/single')?>"><img class="img-fluid" src="<?=base_url("assets/img/v2.png")?>" alt=""></a>
                            <div class="time">3:50</div>
                        </div>
                    <div class="video-card-body">
                        <div class="video-title">
                            <a href="<?=site_url('video/single')?>">There are many variations of passages of Lorem</a>
                        </div>
                        <div class="video-page text-success">
                            Education <a title="" data-placement="top" data-toggle="tooltip" href="<?=site_url('video/single')?>" data-original-title="Verified"><i class="fas fa-check-circle text-success"></i></a>
                        </div>
                        <div class="video-view">
                            1.8M views &nbsp;<i class="fas fa-calendar-alt"></i> 11 Months ago
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 mb-3">
                <div class="video-card">
                    <div class="video-card-image">
                        <a class="play-icon" href="<?=site_url('video/single')?>"><i class="fas fa-play-circle"></i></a>
                        <a href="<?=site_url('video/single')?>"><img class="img-fluid" src="<?=base_url("assets/img/v3.png")?>" alt=""></a>
                        <div class="time">3:50</div>
                    </div>
                    <div class="video-card-body">
                        <div class="video-title">
                            <a href="<?=site_url('video/single')?>">There are many variations of passages of Lorem</a>
                        </div>
                        <div class="video-page text-danger">
                            Education <a title="" data-placement="top" data-toggle="tooltip" href="<?=site_url('video/single')?>" data-original-title="Unverified"><i class="fas fa-frown text-danger"></i></a>
                        </div>
                        <div class="video-view">
                            1.8M views &nbsp;<i class="fas fa-calendar-alt"></i> 11 Months ago
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 mb-3">
                <div class="video-card">
                    <div class="video-card-image">
                        <a class="play-icon" href="<?=site_url('video/single')?>"><i class="fas fa-play-circle"></i></a>
                        <a href="<?=site_url('video/single')?>"><img class="img-fluid" src="<?=base_url("assets/img/v4.png")?>" alt=""></a>
                        <div class="time">3:50</div>
                    </div>
                    <div class="video-card-body">
                        <div class="video-title">
                            <a href="<?=site_url('video/single')?>">There are many variations of passages of Lorem</a>
                        </div>
                        <div class="video-page text-success">
                            Education <a title="" data-placement="top" data-toggle="tooltip" href="<?=site_url('video/single')?>" data-original-title="Verified"><i class="fas fa-check-circle text-success"></i></a>
                        </div>
                        <div class="video-view">
                        1.8M views &nbsp;<i class="fas fa-calendar-alt"></i> 11 Months ago
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 mb-3">
                <div class="video-card">
                    <div class="video-card-image">
                        <a class="play-icon" href="<?=site_url('video/single')?>"><i class="fas fa-play-circle"></i></a>
                        <a href="<?=site_url('video/single')?>"><img class="img-fluid" src="<?=base_url("assets/img/v5.png")?>" alt=""></a>
                        <div class="time">3:50</div>
                    </div>
                <div class="video-card-body">
                    <div class="video-title">
                       <a href="<?=site_url('video/single')?>">There are many variations of passages of Lorem</a>
                    </div>
                    <div class="video-page text-success">
                        Education <a title="" data-placement="top" data-toggle="tooltip" href="<?=site_url('video/single')?>" data-original-title="Verified"><i class="fas fa-check-circle text-success"></i></a>
                    </div>
                    <div class="video-view">
                        1.8M views &nbsp;<i class="fas fa-calendar-alt"></i> 11 Months ago
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-3">
            <div class="video-card">
                <div class="video-card-image">
                    <a class="play-icon" href="<?=site_url('video/single')?>"><i class="fas fa-play-circle"></i></a>
                    <a href="<?=site_url('video/single')?>"><img class="img-fluid" src="<?=base_url("assets/img/v6.png")?>" alt=""></a>
                    <div class="time">3:50</div>
                </div>
                <div class="video-card-body">
                    <div class="video-title">
                        <a href="<?=site_url('video/single')?>">There are many variations of passages of Lorem</a>
                    </div>
                    <div class="video-page text-danger">
                        Education <a title="" data-placement="top" data-toggle="tooltip" href="<?=site_url('video/single')?>" data-original-title="Unverified"><i class="fas fa-frown text-danger"></i></a>
                    </div>
                    <div class="video-view">
                        1.8M views &nbsp;<i class="fas fa-calendar-alt"></i> 11 Months ago
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-3">
            <div class="video-card">
                <div class="video-card-image">
                    <a class="play-icon" href="<?=site_url('video/single')?>"><i class="fas fa-play-circle"></i></a>
                    <a href="<?=site_url('video/single')?>"><img class="img-fluid" src="<?=base_url("assets/img/v7.png")?>" alt=""></a>
                    <div class="time">3:50</div>
                </div>
                <div class="video-card-body">
                    <div class="video-title">
                        <a href="<?=site_url('video/single')?>">There are many variations of passages of Lorem</a>
                    </div>
                    <div class="video-page text-success">
                        Education <a title="" data-placement="top" data-toggle="tooltip" href="<?=site_url('video/single')?>" data-original-title="Verified"><i class="fas fa-check-circle text-success"></i></a>
                    </div>
                    <div class="video-view">
                        1.8M views &nbsp;<i class="fas fa-calendar-alt"></i> 11 Months ago
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-3">
            <div class="video-card">
                <div class="video-card-image">
                    <a class="play-icon" href="<?=site_url('video/single')?>"><i class="fas fa-play-circle"></i></a>
                    <a href="<?=site_url('video/single')?>"><img class="img-fluid" src="<?=base_url("assets/img/v8.png")?>" alt=""></a>
                    <div class="time">3:50</div>
                </div>
                <div class="video-card-body">
                    <div class="video-title">
                        <a href="<?=site_url('video/single')?>">There are many variations of passages of Lorem</a>
                    </div>
                    <div class="video-page text-success">
                        Education <a title="" data-placement="top" data-toggle="tooltip" href="<?=site_url('video/single')?>" data-original-title="Verified"><i class="fas fa-check-circle text-success"></i></a>
                    </div>
                    <div class="video-view">
                        1.8M views &nbsp;<i class="fas fa-calendar-alt"></i> 11 Months ago
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<hr class="mt-0">
<div class="video-block section-padding">
    <div class="row">
        <div class="col-md-12">
            <div class="main-title">
                <div class="btn-group float-right right-action">
                    <a href="<?=site_url('video/single')?>" class="right-action-link text-gray" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Sort by <i class="fa fa-caret-down" aria-hidden="true"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right">
                        <a class="dropdown-item" href="<?=site_url('video/single')?>"><i class="fas fa-fw fa-star"></i> &nbsp; Top Rated</a>
                        <a class="dropdown-item" href="<?=site_url('video/single')?>"><i class="fas fa-fw fa-signal"></i> &nbsp; Viewed</a>
                        <a class="dropdown-item" href="<?=site_url('video/single')?>"><i class="fas fa-fw fa-times-circle"></i> &nbsp; Close</a>
                    </div>
                </div>
                <h6>Kategori Video</h6>
            </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-3">
            <div class="channels-card">
                <div class="channels-card-image">
                    <a href="<?=site_url('video/single')?>"><img class="img-fluid" src="<?=base_url("assets/img/s1.png")?>" alt=""></a>
                </div>
                <div class="channels-card-body">
                    <div class="channels-title">
                        <a href="<?=site_url('video/single')?>">Nama Kategori</a>
                    </div>
                    <div class="channels-view">
                        382,323 video
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-3">
            <div class="channels-card">
                <div class="channels-card-image">
                    <a href="<?=site_url('video/single')?>"><img class="img-fluid" src="<?=base_url("assets/img/s2.png")?>" alt=""></a>
                </div>
                <div class="channels-card-body">
                    <div class="channels-title">
                        <a href="<?=site_url('video/single')?>">Nama Kategori</a>
                    </div>
                    <div class="channels-view">
                        382,323 video
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-3">
            <div class="channels-card">
                <div class="channels-card-image">
                    <a href="<?=site_url('video/single')?>"><img class="img-fluid" src="<?=base_url("assets/img/s3.png")?>" alt=""></a>
                </div>
                <div class="channels-card-body">
                    <div class="channels-title">
                        <a href="<?=site_url('video/single')?>">Channels Name <span title="" data-placement="top" data-toggle="tooltip" data-original-title="Verified"><i class="fas fa-check-circle"></i></span></a>
                    </div>
                    <div class="channels-view">
                        382,323 video
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-3">
            <div class="channels-card">
                <div class="channels-card-image">
                    <a href="<?=site_url('video/single')?>"><img class="img-fluid" src="<?=base_url("assets/img/s4.png")?>" alt=""></a>
                </div>
                <div class="channels-card-body">
                    <div class="channels-title">
                        <a href="<?=site_url('video/single')?>">Nama Kategori</a>
                    </div>
                    <div class="channels-view">
                        382,323 video
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

<script>
    function openCity(evt, cityName) {
  // Declare all variables
  var i, tabcontent, tablinks;

  // Get all elements with class="tabcontent" and hide them
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }

  // Get all elements with class="tablinks" and remove the class "active"
  tablinks = document.getElementsByClassName("tablinks");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" active", "");
  }

  // Show the current tab, and add an "active" class to the button that opened the tab
  document.getElementById(cityName).style.display = "block";
  evt.currentTarget.className += " active";
}
</script>

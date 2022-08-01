<div id="wrapper">

    <ul class="sidebar navbar-nav">
        <li class="nav-item  <?= (set_active($this->uri->segment(1), 'dashboard', $this->uri->segment(2), array())) ?>">
            <a class="nav-link" href="<?= site_url('dashboard') ?>">
                <i class="fas fa-fw fa-home"></i>
                <span>Dashboard</span>
            </a>
        </li>
        <li class="nav-item <?= (set_active($this->uri->segment(1), 'kategori_video', $this->uri->segment(2), array())) ?>">
            <a class="nav-link" href="<?= site_url('kategori_video') ?>">
                <i class="fa-duotone fa-bookmark"></i>
                <span>Kategori</span>
            </a>
        </li>
        <li class="nav-item <?= (set_active($this->uri->segment(1), 'managemen_user', $this->uri->segment(2), array())) ?>">
            <a class="nav-link" href="<?= site_url('managemen_user') ?>">
                <i class="fa-duotone fa-users"></i>
                <span>Managemen User</span>
            </a>
        </li>
        <li class="nav-item <?= (set_active($this->uri->segment(1), 'managemen_video', $this->uri->segment(2), array())) ?>">
            <a class="nav-link" href="<?= site_url('managemen_video') ?>">
                <i class="fa-duotone fa-video"></i>
                <span>Managemen Video</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="<?= site_url('welcome/logout') ?>">
                <i class="fa-duotone fa-door-open"></i>
                <span>Keluar</span>
            </a>
        </li>
        <!-- <li class="nav-item <?= (set_active($this->uri->segment(2), 'koleksi', $this->uri->segment(2), array())) ?>">
            <a class="nav-link" href="<?= site_url('video/koleksi') ?>">
                <i class="fas fa-fw fa-user-alt"></i>
                <span>Koleksi Video Saya</span>
            </a>
        </li> -->
        <!-- <li class="nav-item">
            <a class="nav-link" href="<?= site_url('video/upload') ?>">
                <i class="fas fa-fw fa-cloud-upload-alt"></i>
                <span>Upload Video</span>
            </a>
        </li> -->
    </ul>
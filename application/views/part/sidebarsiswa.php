<!-- HEADER MOBILE-->
<header class="header-mobile d-block d-lg-none">
    <div class="header-mobile__bar">
        <div class="container-fluid">
            <div class="header-mobile-inner">
                <a class="logo" href="index.html">
                    <img src="images/icon/logo.png" alt="CoolAdmin" />
                </a>
                <button class="hamburger hamburger--slider" type="button">
                    <span class="hamburger-box">
                        <span class="hamburger-inner"></span>
                    </span>
                </button>
            </div>
        </div>
    </div>
    <nav class="navbar-mobile">
        <div class="container-fluid">
        <ul class="list-unstyled navbar__list">
                <li>
                    <a href="<?= base_url('siswa/')?>">
                        <i class="fas fa-chart-bar"></i>Beranda</a>
                </li>
                <li>
                    <a href="<?= base_url('siswa/Pesan')?>">
                        <i class="fas fa-table"></i>Pesan</a>
                </li>
                <li>
                    <a href="<?= base_url('siswa/jadwalMapel/1')?>">
                        <i class="far fa-check-square"></i>Jadwal Mata pelajaran</a>
                </li>
                <li>
                    <a href="<?= base_url('siswa/tugas')?>">
                        <i class="fas fa-calendar-alt"></i>Tugas</a>
                </li>
                <li>
                    <a href="<?= base_url('siswa/materi')?>">
                        <i class="fas fa-map-marker-alt"></i>Materi</a>
                </li>
                <li>
                    <a href="<?= base_url('siswa/filterPengajar')?>">
                        <i class="fas fa-map-marker-alt"></i>Filter pengajar</a>
                </li>   
                <li>
                    <a href="<?= base_url('siswa/filterSiswa')?>">
                        <i class="fas fa-map-marker-alt"></i>Filter Siswa</a>
                </li>                 
            </ul>
        </div>
    </nav>
</header>
<!-- END HEADER MOBILE-->

<!-- MENU SIDEBAR-->
<aside class="menu-sidebar d-none d-lg-block">
    <div class="logo">
        <a href="#">
            <img src="images/icon/logo.png" alt="Cool Admin" />
        </a>
    </div>
    <div class="menu-sidebar__content js-scrollbar1">
        <nav class="navbar-sidebar">
            <ul class="list-unstyled navbar__list">
                <li class="active">
                    <a href="<?= base_url('siswa/')?>">
                        <i class="fas fa-chart-bar"></i>Beranda</a>
                </li>
                <li>
                    <a href="<?= base_url('siswa/Pesan')?>">
                        <i class="fas fa-table"></i>Pesan</a>
                </li>
                <li>
                    <a href="<?= base_url('siswa/jadwalMapel/1')?>">
                        <i class="far fa-check-square"></i>Jadwal Mata pelajaran</a>
                </li>
                <li>
                    <a href="<?= base_url('siswa/tugas')?>">
                        <i class="fas fa-calendar-alt"></i>Tugas</a>
                </li>
                <li>
                    <a href="<?= base_url('siswa/materi')?>">
                        <i class="fas fa-map-marker-alt"></i>Materi</a>
                </li>
                <li>
                    <a href="<?= base_url('siswa/filterPengajar')?>">
                        <i class="fas fa-map-marker-alt"></i>Filter pengajar</a>
                </li>   
                <li>
                    <a href="<?= base_url('siswa/filterSiswa')?>">
                        <i class="fas fa-map-marker-alt"></i>Filter Siswa</a>
                </li> 
                <li>
                    <a href="<?= base_url('siswa/ujian')?>">
                        <i class="fas fa-map-marker-alt"></i>Ujian Online</a>
                </li>                 
            </ul>
        </nav>
    </div>
</aside>
<!-- END MENU SIDEBAR-->

<!-- PAGE CONTAINER-->
<div class="page-container">
    <!-- HEADER DESKTOP-->
    <header class="header-desktop">
        <div class="section__content section__content--p30">
            <div class="container-fluid">
                <div class="header-wrap">
                    <form class="form-header" action="" method="POST">
                        
                    </form>
                    <div class="header-button">
                        <div class="noti-wrap">
                            
                        <div class="account-wrap">
                            <div class="account-item clearfix js-item-menu">
                                <div class="image">
                                    <img src="<?= base_url('assets/images/icon/user.png')?>" alt="<?= $this->session->userdata('nama')?>" />
                                </div>
                                <div class="content">
                                    <a class="js-acc-btn" href="#"><?= $this->session->userdata('nama')?></a>
                                </div>
                                <div class="account-dropdown js-dropdown">
                                    <div class="info clearfix">
                                        <div class="image">
                                            <a href="#">
                                                <img src="<?= base_url('assets/images/icon/user.png')?>" alt="<?= $this->session->userdata('nama')?>" />
                                            </a>
                                        </div>
                                        <div class="content">
                                            <h5 class="name">
                                                <a href="#"><?= $this->session->userdata('nama')?></a>
                                            </h5>
                                            <span class="email"><?= $this->session->userdata('username')?></span>
                                        </div>
                                    </div>
                                    <div class="account-dropdown__body">
                                        <div class="account-dropdown__item">
                                            <a href="<?= base_url('siswa/profile')?>">
                                                <i class="zmdi zmdi-account"></i>Account</a>
                                        </div>
                                    </div>
                                    <div class="account-dropdown__footer">
                                        <a href="<?= base_url('user/logout') ?>">
                                            <i class="zmdi zmdi-power"></i>Logout</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- HEADER DESKTOP-->

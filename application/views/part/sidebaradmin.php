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
                        <li>
                            <a href="<?= base_url('admin/')?>">
                                <i class="fas fa-chart-bar"></i>Beranda</a>
                        </li> 
                        <li>
                            <a href="<?=base_url()?>Admin/dataSiswa/1">
                                <i class="fas fa-chart-bar"></i>Siswa</a>
                        </li>
                        <li>
                            <a href="<?=base_url()?>Admin/dataPengajar">
                                <i class="fas fa-table"></i>Pengajar</a>
                        </li>
                        
                        <li>
                            <a href="<?= base_url('admin/pengumuman')?>">
                                <i class="fas fa-chart-bar"></i>pengumuman</a>
                        </li>
                        <li>
                            <a href="<?= base_url('admin/Pesan')?>">
                                <i class="fas fa-table"></i>Pesan</a>
                        </li>
                        <li>
                            <a href="<?= base_url('admin/jadwalMapel')?>">
                                <i class="far fa-check-square"></i>Jadwal Mata pelajaran</a>
                        </li>
                        <li>
                            <a href="<?= base_url('admin/Mapel')?>">
                                <i class="far fa-check-square"></i>Manajemen Mapel</a>
                        </li>
                        <li>
                            <a href="<?= base_url('admin/tugas')?>">
                                <i class="fas fa-calendar-alt"></i>Tugas</a>
                        </li>
                        <li>
                            <a href="<?= base_url('admin/materi')?>">
                                <i class="fas fa-map-marker-alt"></i>Materi</a>
                        </li>
                        <li>
                            <a href="<?= base_url('admin/filterPengajar')?>">
                                <i class="fas fa-map-marker-alt"></i>Filter Pengajar</a>
                        </li>
                        <li>
                            <a href="<?= base_url('admin/filterSiswa')?>">
                                <i class="fas fa-map-marker-alt"></i>Filter Siswa</a>
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
                                            <img src="<?= base_url('assets/images/icon/user.png')?>" alt="Admin" />
                                        </div>
                                        <div class="content">
                                            <a class="js-acc-btn" href="#"><?= 
                                            $this->session->userdata('nama');
                                            ?></a>
                                        </div>
                                        <div class="account-dropdown js-dropdown">
                                            <div class="info clearfix">
                                                <div class="image">
                                                    <a href="#">
                                                        <img src="<?= base_url('assets/images/icon/user.png')?>" alt="Admin"/>
                                                    </a>
                                                </div>
                                                <div class="content">
                                                    <h5 class="name">
                                                        <a href="#"><?= 
                                                        $this->session->userdata('nama');
                                                        ?></a>
                                                    </h5>
                                                    <span class="email"><?= 
                                                    $this->session->userdata('username');
                                                    ?></span>
                                                </div>
                                            </div>
                                            <div class="account-dropdown__body">
                                                <div class="account-dropdown__item">
                                                    <a href="<?= base_url('admin/profile')?>">
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

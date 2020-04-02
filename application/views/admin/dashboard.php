            <!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                    <div class="row">
                            <div class="col-lg-6">
                                <!-- Pengumuman Siswa-->
                                <div class="top-campaign">
                                <h3 class="title-3 m-b-30">Pengumuman Siswa</h3>
                                    <div class="table-responsive">
                                        <table class="table table-top-campaign">
                                            <tbody>
                                            <?php foreach ($pengumumansiswa as $i) {?>
                                                    <tr>
                                                        <td><a href="<?= base_url('admin/TampilPengumuman/').$i->id ?>"><?= $i->judul?></a></td>
                                                        <td><?= $i->tgl_tampil?></td>
                                                    </tr>
                                                <?php }?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <!-- Pengumuman Siswa-->
                            </div>
                            <div class="col-lg-6">
                                <!-- Pengumuman Guru-->
                                <div class="top-campaign">
                                    <h3 class="title-3 m-b-30">Pengumuman Guru</h3>
                                    <div class="table-responsive">
                                        <table class="table table-top-campaign">
                                            <tbody>
                                                <?php foreach ($pengumumanguru as $i) {?>
                                                    <tr>
                                                        <td><a href="<?= base_url('admin/TampilPengumuman/').$i->id ?>"><?= $i->judul?></a></td>
                                                        <td><?= $i->tgl_tampil?></td>
                                                    </tr>
                                                <?php }?>
                                                </tbody>
                                        </table>
                                    </div>
                                </div>
                                <!--  Pengumuman Guru-->
                            </div>
                        </div>
                </div>
            </div>
            <!-- END MAIN CONTENT-->
            <!-- END PAGE CONTAINER-->
        </div>
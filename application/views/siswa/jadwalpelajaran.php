            <!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid"> 
                        <div class="row">
                            <div class="col-lg">
                                <h3><?= $kelas[0]->nama?></h3>
                                <h3><?= $hari[$day-1]?></h3>
                                <div class="btn-group btn-group-sm pull-right" role="group" aria-label="Basic example" style="margin-bottom: 10px">
                                    <a href="<?=base_url()?>Siswa/jadwalMapel/1" class="btn btn-secondary">Senin</a>
                                    <a href="<?=base_url()?>Siswa/jadwalMapel/2" class="btn btn-secondary">Selasa</a>
                                    <a href="<?=base_url()?>Siswa/jadwalMapel/3" class="btn btn-secondary">Rabu</a>
                                    <a href="<?=base_url()?>Siswa/jadwalMapel/4" class="btn btn-secondary">Kamis</a>
                                    <a href="<?=base_url()?>Siswa/jadwalMapel/5" class="btn btn-secondary">Jumat</a>
                                </div>
                                <div class="table-responsive table--no-card m-b-40">
                                    <table class="table table-borderless table-striped table-earning">
                                        <thead>
                                            <tr>
                                                <th>Mata Pelajaran</th>
                                                <th>Pengajar</th>
                                                <th>Jam Mulai</th>
                                                <th>Jam_selesai</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php foreach ($jadwal as $key) { ?>
                                            <tr>
                                                <td><?=$key->mapel?></td>
                                                <td><?=$key->pengajar?></td>
                                                <td><?=$key->jam_mulai?></td>
                                                <td><?=$key->jam_selesai?></td>
                                            </tr>
                                        <?php }?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="copyright">
                                    <p>Copyright © 2018 Colorlib. All rights reserved. Template by <a href="https://colorlib.com">Colorlib</a>.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END MAIN CONTENT-->
            <!-- END PAGE CONTAINER-->
        </div>
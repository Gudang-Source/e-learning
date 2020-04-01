            <!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid"> 
                        <div class="row">
                            <div class="col-lg">
                                <h2 class="title-1 m-b-25">Data Siswa</h2>
                                <a href="<?=base_url()?>Admin/tambahSiswa" class="btn btn-secondary">Tambah Siswa</a>
                                <div class="btn-group btn-group-sm pull-right" role="group" aria-label="Basic example" style="margin-bottom: 10px">
                                    <a href="<?=base_url()?>Admin/dataSiswa/1" class="btn btn-secondary">Aktif</a>
                                    <a href="<?=base_url()?>Admin/dataSiswa/0" class="btn btn-secondary">Pending</a>
                                    <a href="<?=base_url()?>Admin/dataSiswa/2" class="btn btn-secondary">Blok</a>
                                    <a href="<?=base_url()?>Admin/dataSiswa/3" class="btn btn-secondary">Alumni</a>
                                    <a href="<?=base_url()?>Admin/dataSiswa/4" class="btn btn-secondary">Deleted</a>
                                </div>
                                <div class="table-responsive table--no-card m-b-40">
                                    <table class="table table-borderless table-striped table-earning">
                                        <thead>
                                            <tr>
                                                <th>NIS</th>
                                                <th>Nama</th>
                                                <th>Jenis Kelamin</th>
                                                <th>Agama</th>
                                                <th>Kelas</th>
                                                <th>Status Siswa</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php foreach ($siswa as $key) { ?>
                                            <tr>
                                                <td><?=$key->nis?></td>
                                                <td><?=$key->nama?></td>
                                                <td><?=$key->jenis_kelamin?></td>
                                                <td><?=$key->agama?></td>
                                                <td><?=$key->kelas?></td>
                                                <td>
                                                    <?php
                                                    if ($key->status_id==0) {
                                                        echo "Pending";
                                                    }elseif ($key->status_id==1) {
                                                        echo "Aktif";
                                                    }elseif ($key->status_id==2) {
                                                        echo "Blok";
                                                    }elseif ($key->status_id==3) {
                                                        echo "Alumni";
                                                    }elseif ($key->status_id==4) {
                                                        echo "Deleted";
                                                    }
                                                    ?>
                                                </td>
                                                <td>
                                                    <a href="<?=base_url()?>Admin/detailSiswa/<?=$key->id;?>">Detail</a>
                                                </td>
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
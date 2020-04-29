            <!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid"> 
                        <div class="map-data m-b-40">
                        <div class="row">
                            <div class="col-lg">
                                <h2 class="title-1 m-b-25">Data Pengajar</h2>
                                <a href="<?=base_url()?>Admin/tambahPengajar" class="btn btn-secondary">Tambah Pengajar</a>
                                <div class="btn-group btn-group-sm pull-right" role="group" aria-label="Basic example" style="margin-bottom: 10px">
                                    <a href="<?=base_url()?>Admin/dataPengajar/1" class="btn btn-secondary">Aktif</a>
                                    <a href="<?=base_url()?>Admin/dataPengajar/0" class="btn btn-secondary">Pending</a>
                                    <a href="<?=base_url()?>Admin/dataPengajar/2" class="btn btn-secondary">Blok</a>
                                </div>
                                <div class="table-responsive table--no-card m-b-40">
                                    <table class="table table-borderless table-striped table-earning">
                                        <thead>
                                            <tr>
                                                <th>Informasi Pengajar</th>
                                                <th>Alamat</th>
                                                <th>Status</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($pengajar as $key) { ?>
                                            <tr>
                                                <td><b><?=$key->nama?></b> (<?=$key->nip?>)<br><?=$key->jenis_kelamin?></td>
                                                <td><?=$key->alamat;?></td>
                                                <td>
                                                    <?php
                                                    if ($key->status_id==0) {
                                                        echo "Pending";
                                                    }elseif ($key->status_id==1) {
                                                        echo "Aktif";
                                                    }elseif ($key->status_id==2) {
                                                        echo "Blok";
                                                    }
                                                    ?>
                                                </td>
                                                <td>
                                                    <a type="button" class="btn btn-secondary btn-sm" href="<?=base_url()?>Admin/detailPengajar/<?=$key->id;?>">Detail</a>
                                                <?php if ($key->status_id==0) { ?>
                                                    <a type="button" class="btn btn-success btn-sm" href="<?=base_url()?>Admin/updateStatusPengajar/<?=$key->id;?>/1">Aktif</a>
                                                    <a type="button" class="btn btn-danger btn-sm" href="<?=base_url()?>Admin/updateStatusPengajar/<?=$key->id;?>/2">Blok</a>
                                                <?php }?>
                                                </td>
                                            </tr>
                                            <?php }?>
                                        </tbody>
                                    </table>
                                </div>
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
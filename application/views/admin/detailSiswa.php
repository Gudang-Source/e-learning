            <!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid"> 
                        <div class="row">
                            <div class="col-lg">
                                <h2 class="title-1 m-b-25">Detail Data Siswa</h2>
                                <span class="span7">Profil Siswa</span><span style="margin-bottom: 10px" class="span5 pull-right"><a href="" class="btn btn-secondary btn-sm">Edit Profile</a></span>
                                <div class="table-responsive table--no-card m-b-40">
                                    <table class="table">
                                        <?php foreach ($siswa as $key) {?>
                                        <thead>
                                            <tr>
                                                <th width="20%">NIS</th>
                                                <td><?=$key->nis?></td>
                                                <td rowspan="4" style="border: 1px solid black"></td>
                                            </tr>
                                            <tr>
                                                <th>Nama</th>
                                                <td><?=$key->nama?></td>
                                            </tr>
                                            <tr>
                                                <th>Jenis Kelamin</th>
                                                <td><?=$key->jenis_kelamin?></td>
                                            </tr>
                                            <tr>
                                                <th>Agama</th>
                                                <td><?=$key->agama?></td>
                                            </tr>
                                            <tr>
                                                <th>TTL</th>
                                                <td colspan="2"><?=$key->tempat_lahir?>, <?=date('d-m-Y',strtotime($key->nis))?></td>
                                            </tr>
                                            <tr>
                                                <th>Alamat</th>
                                                <td colspan="2"><?=$key->alamat?></td>
                                            </tr>
                                            <tr>
                                                <th>Tahun Masuk</th>
                                                <td colspan="2"><?=$key->tahun_masuk?></td>
                                            </tr>
                                            <tr>
                                                <th>Status Siswa</th>
                                                <td colspan="2">
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
                                            </tr>
                                        </thead>
                                    <?php }?>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <span class="span7">Kelas Siswa</span><span style="margin-bottom: 10px" class="span5 pull-right"><a href="" class="btn btn-secondary btn-sm">Edit Kelas</a></span>
                                <div class="table-responsive table--no-card m-b-40">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>Kelas</th>
                                                <td>Status</td>
                                            </tr>
                                        <?php foreach ($kelas as $key) {?>
                                            <tr>
                                                <td><?=$key->nama?></td>
                                                <td>
                                                    <?php if ($key->aktif == 1) {?>
                                                        <i class="icon icon-ok">Aktif</i>
                                                    <?php }?>
                                                </td>
                                            </tr>
                                        <?php }?>
                                        </thead>
                                    </table>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <span class="span7">Akun Siswa</span><span style="margin-bottom: 10px" class="span5 pull-right"><a href="" class="btn btn-secondary btn-sm">Edit Akun</a></span>
                                <div class="table-responsive table--no-card m-b-40">
                                    <table class="table">
                                        <?php foreach ($akun as $key) {?>
                                        <thead>
                                            <tr>
                                                <th width="20%">Username</th>
                                                <td><?=$key->username?></td>
                                            </tr>
                                            <tr>
                                                <th>Password</th>
                                                <td>********</td>
                                            </tr>
                                        </thead>
                                        <?php }?>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END MAIN CONTENT-->
            <!-- END PAGE CONTAINER-->
        </div>
<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <!-- MAP DATA-->
            <div class="map-data m-b-40">
                <h3 class="title-3 m-b-30">Profile</h3>
                <div class="mx-auto d-block">
                <?php if ($profile[0]->foto == null) { ?>
                        <img class="rounded-circle " src="<?=base_url('assets/images/icon/user.png') ?>" alt="Card image cap">
                        
                    <?php }else{ ?>
                        <img class="rounded-circle " src="<?=base_url('assets/images/user/'.$profile[0]->foto) ?>" alt="Card image cap">
                    
                    <?php }?>
                </div>
                
                <div class="filters">
                    <form action="<?= base_url('admin/updategambar')?>" enctype="multipart/form-data" method="post" class="row form-group">
                        <div class="col col-md-3">
                            <?php if ($this->session->flashdata('error') != null) {?>
                                <div class="sufee-alert alert with-close alert-success alert-dismissible fade show">
                                    <span class="badge badge-pill badge-success">Success</span>
                                    <?= $this->session->flashdata('error') ?>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            <?php }?>
                            <input type="file" id="file-input" name="file-input" class="form-control-file">
                        </div>
                        <div class="col-10 col-md-5">
                            <button type="submit" class="btn btn-primary btn-sm">Update Gambar</button>
                        </div>
                    </form>
                    <form action="<?=base_url('admin/updateprofile/').$this->session->userdata('id');?>" method="post">
                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label class=" form-control-label">Username</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <p class="form-control-static"><?=
                                $this->session->userdata('username');
                                ?></p>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="text-input" class=" form-control-label">NIP</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <input type="text" id="text-input" value="<?= $profile[0]->nip?>" name="NIP" placeholder="NIP" class="form-control">
                                
                            </div>
                        </div><div class="row form-group">
                            <div class="col col-md-3">
                                <label for="text-input" class=" form-control-label">Nama</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <input type="text" id="text-input" value="<?= $profile[0]->nama?>" name="Nama" placeholder="Nama" class="form-control">
                                
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label class=" form-control-label">Jenis Kelamin</label>
                            </div>
                            <div class="col col-md-9">
                                <div class="form-check">
                                    <div class="radio">
                                        <label for="radio1" class="form-check-label ">
                                            <input type="radio" id="laki" <?php if ($profile[0]->jenis_kelamin == "Laki-laki") { echo "checked=''"; }?> name="jk" value="Laki-laki" class="form-check-input">Laki-Laki
                                        </label>
                                    </div>
                                    <div class="radio">
                                        <label for="radio2" class="form-check-label ">
                                            <input type="radio" id="perempuan" <?php if ($profile[0]->jenis_kelamin == "Perempuan") { echo "checked=''"; }?> name="jk" value="Perempuan" class="form-check-input">Perempuan
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="text-input" class=" form-control-label">Tempat Lahir</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <input type="text" id="text-input" name="tempatlahir" value="<?= $profile[0]->tempat_lahir?>" placeholder="Tempat Lahir" class="form-control">
                                
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="text-input" class=" form-control-label">Tgl Lahir</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <input type="text" id="text-input" name="tgllahir" value="<?= $profile[0]->tgl_lahir?>" placeholder="Tgl Lahir" class="form-control">
                                
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="text-input" class=" form-control-label">alamat</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <input type="text" id="text-input" name="alamat" value="<?= $profile[0]->alamat?>" placeholder="alamat" class="form-control">
                            </div>
                        </div>
                        <div class="form-actions form-group">
                            <button type="submit" class="btn btn-primary btn-sm">Update</button>
                        </div>
                    </form>
                </div>
            </div>
            <!-- END MAP DATA-->
        </div>
    </div>
</div>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){
    $("#laki").click(function(){
        $("#perempuan").attr("checked", false);
        $("#laki").attr("checked", true);

    });
    $("#perempuan").click(function(){         
        $("#laki").attr("checked", false);
        $("#perempuan").attr("checked", true);
    });
});
</script>
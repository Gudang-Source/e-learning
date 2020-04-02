            <!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-8">
                         <h3 class="title-5 m-b-35">Pengumuman</h3>
                         <?php echo $this->session->flashdata('alert');?>

                        <form action="<?= base_url('admin/prosesEditPengumuman')?>" method="post" id="form_edit" enctype="multipart/form-data" class="form-horizontal">
                            <div class="card">
                                <div class="card-header">
                                    <strong>Tambah pengumuman</strong>
                                </div>
                                <div class="card-body card-block">
                                    <input type="hidden" id="text-input" name="id" placeholder="Judul" value="<?= $pengumuman[0]->id?>" class="form-control">
                                        <div class="row form-group">
                                            <div class="col col-md-3">
                                                <label for="text-input" class=" form-control-label">judul</label>
                                            </div>
                                            <div class="col-12 col-md-9">
                                                <input type="text" id="text-input" name="judul" placeholder="Judul" value="<?= $pengumuman[0]->judul?>" class="form-control">
                                                <small class="form-text text-muted">Tulislah Judul pengumuman yang sesuai dengan isi pesan</small>
                                            </div>
                                        </div>
                                        <div class="row form-group">
                                            <div class="col col-md-3">
                                                <label for="text-input" class=" form-control-label">Tanggal</label>
                                            </div>
                                            <div class="col-12 col-md-9">
                                                <input type="text" id="text-input" name="tanggal" placeholder="Tanggal Pengumuman" readonly value="<?= $pengumuman[0]->tgl_tampil?>" class="form-control">
                                            </div>
                                        </div>
                                        <div class="row form-group">
                                            <div class="col col-md-3">
                                                <label for="textarea-input" class=" form-control-label">Isi Pengumuman</label>
                                            </div>
                                            <div class="col-12 col-md-9">
                                                <textarea name="isi" id="isi"  rows="9" placeholder="Isi Pesan..." class="form-control"><?= $pengumuman[0]->konten?></textarea>
                                            </div>
                                        </div>
                                        
                                        <div class="row form-group">
                                            <div class="col col-md-3">
                                                <label class=" form-control-label">Tampil Pengajar </label>
                                            </div>
                                            <div class="col col-md-9">
                                                <div class="form-check-inline form-check">
                                                    <label for="inline-radio1" class="form-check-label">
                                                        <input <?php if ($pengumuman[0]->tampil_pengajar == 1) {?> checked <?php }?> type="radio" id="pengajartrue" name="pengajar" value="1" class="form-check-input"> Ya 
                                                    </label>
                                                    <label for="inline-radio2" class="form-check-label">
                                                        <input <?php if ($pengumuman[0]->tampil_pengajar == 0) {?> checked <?php }?> type="radio" id="pengajarfalse" name="pengajar" value="0" class="form-check-input"> Tidak 
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row form-group">
                                            <div class="col col-md-3">
                                                <label class=" form-control-label">Tampil Siswa </label>
                                            </div>
                                            <div class="col col-md-9">
                                                <div class="form-check-inline form-check">
                                                    <label for="inline-radio1" class="form-check-label">
                                                        <input <?php if ($pengumuman[0]->tampil_siswa == 1) { echo "checked=''"; }?> type="radio" id="siswatrue" name="siswa" value="1" class="form-check-input"> Ya 
                                                    </label>
                                                    <label for="inline-radio2" class="form-check-label">
                                                        <input <?php if ($pengumuman[0]->tampil_siswa == 0) { echo "checked=''"; }?> type="radio" id="siswafalse" name="siswa" value="0" class="form-check-input"> Tidak 
                                                    </label>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-primary btn-sm">
                                            <i class="fa fa-dot-circle-o"></i> Submit
                                        </button>
                                        <button type="reset" class="btn btn-danger btn-sm">
                                            <i class="fa fa-ban"></i> Reset
                                        </button>
                                    </div>
                                </div>
                            </div>        
                        </form>
                    </div>
                </div>
            </div>
            <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
            <script type="text/javascript">
            $(document).ready(function(){
                $("#siswatrue").click(function(){
                    $("#siswafalse").attr("checked", false);
                    $("#siswatrue").attr("checked", true);

                });
                $("#siswafalse").click(function(){         
                    $("#siswatrue").attr("checked", false);
                    $("#siswafalse").attr("checked", true);
                });
                $("#pengajartrue").click(function(){
                    $("#pengajarfalse").attr("checked", false);
                    $("#pengajartrue").attr("checked", true);

                });
                $("#pengajarfalse").click(function(){         
                    $("#pengajartrue").attr("checked", false);
                    $("#pengajarfalse").attr("checked", true);
                });
            });
            </script>
            <!-- END MAIN CONTENT-->
            <!-- END PAGE CONTAINER-->
        </div>
<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <!-- MAP DATA-->
            <div class="map-data m-b-40">
                <h3 class="title-3 m-b-30">Pesan / Detail Pesan</h3>
                <div class="filters">
                    <div class="row" style="margin-bottom: 10px">
                        <a href="<?=base_url()?>siswa/tambahPesan" class="btn btn-primary btn-sm">Tambah Pesan</a>
                    </div>
                    <div class="row">
                        <table class="table">
                            <?php foreach ($isi as $key) { ?>
                                <tr>
                                    <td>Dari :
                                            <span style="color: lightblue"> <?=$key->pengirim?></span>
                                    </td>
                                    <td>
                                        <p class="small"><?=$key->content?></p>
                                    </td>
                                    <td>
                                        <p class="small"><?=$key->date?></p>
                                    </td>
                                    <td>
                                        <a class="btn btn-danger btn-sm" href="<?=base_url()?>siswa/hapusPesan/<?=$key->idpesan?>/<?=$key->owner_id?>/<?=$key->sender_receiver_id?>">Hapus</a>
                                    </td>
                                </tr>
                        <?php }?>
                        </table>
                    </div>
                    
                </div>
                <div class="map-wrap m-t-45 m-b-20">
                    <div id="vmap" style="height: 284px;"></div>
                </div>
            </div>
            <!-- END MAP DATA-->
        </div>
    </div>
</div>
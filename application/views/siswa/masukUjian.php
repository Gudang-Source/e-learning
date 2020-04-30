
<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <!-- MAP DATA-->
            <div class="map-data m-b-40">
                <h3 class="title-3 m-b-30">Ujian</h3>
<!--                <p><?php //echo "<pre>"; print_r($ujian); echo "</pre>";?></p>-->
                <div class="mx-auto d-block">
                    <div class="container-fluid">
                      <div class="card card-body">
                            <form method="post" action="<?=base_url('siswa/koreksiUjian')?>/<?=$this->session->userdata('id')?>/<?=$id_ujian?>">
                                <?php $no=1; foreach ($soal_ujian as $key) {
                                    if ($key->tipe==1) {?>
                                        <div class="form-group row">
                                            <label for="inputEmail3" class="col-sm-2 col-form-label"><?=$no.'. '.$key->pertanyaan?></label>
                                            <div class="col-sm-10">
                                            <div class="form-check form-check-inline">
                                              <label class="form-check-label" for="A"><?=$key->pg_a?></label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                              <label class="form-check-label" for="B"><?=$key->pg_b?></label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                              <label class="form-check-label" for="C"><?=$key->pg_c?></label>
                                            </div>
                                              <select name="<?=$key->id_soal?>" class="form-control">
                                                  <option value="A">A</option>
                                                  <option value="B">B</option>
                                                  <option value="C">C</option>
                                              </select>
                                            </div>
                                        </div>
                                    <?}elseif ($key->tipe==2) {?>
                                        <input type="hidden" name="no<?=$no;?>">
                                        <div class="form-group row">
                                            <label for="iiii" class="col-sm-2 col-form-label"><?=$no.'. '.$key->pertanyaan?></label>
                                            <div class="col-sm-10">
                                              <textarea id="iiii" name="<?=$key->id_soal?>" class="form-control"></textarea>
                                            </div>
                                        </div>
                                    <?php }$no++;
                                } ?>
                                <button class="btn btn-primary btn-block">Kirim</button>
                            </form>
                      </div>
                    </div>
                </div>
                <br>
                
            </div>
            <!-- END MAP DATA-->
        </div>
    </div>
    
</div>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){
    $("#A").click(function(){
        $("#B").attr("checked", false);
        $("#C").attr("checked", false);
        $("#A").attr("checked", true);
    });
    $("#B").click(function(){         
        $("#A").attr("checked", false);
        $("#C").attr("checked", false);
        $("#B").attr("checked", true);
    });
    $("#C").click(function(){         
        $("#A").attr("checked", false);
        $("#C").attr("checked", true);
        $("#B").attr("checked", false);
    });
});
</script>

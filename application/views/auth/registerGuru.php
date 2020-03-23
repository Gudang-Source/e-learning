<div class="page-wrapper">
        <div class="page-content--bge5">
            <div class="container">
                <div class="login-wrap">
                    <div class="login-content">
                        <div class="login-logo">
                            <p>Register Guru</p>

                        </div>
                        <div class="login-form">
                            <form action="<?= base_url('user/prosesRegisterGuru')?>" method="post">
                                <div class="form-group">
                                    <label>Email Address</label>
                                    <input class="au-input au-input--full" type="email" name="email" placeholder="Email">
                                </div>
                                <div class="form-group">
                                    <label>Password</label>
                                    <input class="au-input au-input--full" type="password" name="password" placeholder="Password">
                                </div>
                                <div class="form-group">
                                    <label>NAMA</label>
                                    <input class="au-input au-input--full" type="text" name="nama" placeholder="nama">
                                </div>
                                <div class="form-group">
                                    <label>NIP</label>
                                    <input class="au-input au-input--full" type="text" name="nip" placeholder="NIP">
                                </div>
                                <div class="form-group">
                                    <label>tempat lahir</label>
                                    <input class="au-input au-input--full" type="text" name="tempatlahir" placeholder="tempat lahir">
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label class=" form-control-label">Jenis Kelamin</label>
                                    </div>
                                    <div class="col col-md-6">
                                        <div class="form-check">
                                            <label for="inline-radio1" class="form-check-inline form-check">
                                                <input type="radio" id="inline-radio1" name="jk" value="option1" class="form-check-input">Laki-Laki
                                            </label>
                                            <label for="inline-radio2" class="form-check-label ">
                                                <input type="radio" id="inline-radio2" name="jk" value="option2" class="form-check-input">Perempuan
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>alamat</label>
                                    <input class="au-input au-input--full" type="text" name="alamat" placeholder="alamat">
                                </div>
                                <div class="login-checkbox">
                                    <label>
                                        <input type="checkbox" name="aggree">Agree the terms and policy
                                    </label>
                                </div>
                                <button class="au-btn au-btn--block au-btn--green m-b-20" type="submit">register</button>
                            </form>
                            <div class="register-link">
                                <p>Register Sebagai?
                                    <a href="<?= base_url('user/registerGuru')?>">Guru</a> atau
                                    <a href="<?= base_url('user/registerSiswa')?>">siswa</a>
                                </p>
                            </div>
                            <div class="register-link">
                                <p>Already have account?
                                    <a href="<?= base_url('user')?>">Sign In</a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

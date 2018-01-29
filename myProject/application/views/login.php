
            <div class="container">
                <div class="row">
                    <div class="col-sm-4 col-sm-offset-1">
                        <div class="login-form"><!--login form-->
                            <h2>Hesabınıza Giriş Yapın</h2>
                            <b class="text-danger"> <?= $this->session->flashdata("mesaj");?></b><br><br>
                            <form action="<?=base_url()?>home/login" method="post">
                                <input type="email" name="email" placeholder="E-posta" />
                                <input type="password" name="password" placeholder="Şifre" />
                                <span>
							</span>
                                <button type="submit" class="btn btn-default">Giriş Yap</button>
                            </form>
                        </div><!--/login form-->
                    </div>
                    <div class="col-sm-1">
                        <h2 class="or">Yada</h2>
                    </div>
                    <div class="col-sm-4">
                        <div class="signup-form"><!--sign up form-->
                            <h2>Yeni Üye Kaydı Oluştur!</h2>
                            <span class="alert-danger"> <?= $this->session->flashdata("msj_kontrol");?></span>
                            <span class="alert-danger"> <?= $this->session->flashdata("msj_kontrol_e");?></span>
                            <span class="alert-success"> <?= $this->session->flashdata("msj_insert");?></span>
                            <span class="alert-danger"> <?= $this->session->flashdata("msj_sifre");?></span><br><br>
                            <form action="<?=base_url()?>home/kaydol" method="post">
                                <input type="text" name="name" placeholder="İsim "/>
                                <input type="text" name="surname" placeholder="Soyisim "/>
                                <input type="text" name="username" placeholder="Kullanıcı Adı"/>
                                <input type="email" name="email" placeholder="Email Adres"/>
                                <input type="password" name="password" placeholder="Şifre"/>
                                <input type="password" name="confirm" placeholder="Şifre Tekrar"/>
                                <button type="submit" class="btn btn-default">Kaydol</button>
                            </form>
                        </div><!--/sign up form-->
                    </div>
                </div>
            </div>
        <br><br><br><br>
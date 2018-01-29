

<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="col-lg-12"><br><br>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Site Ayarları
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs">
                                <li class="active"><a href="#home" data-toggle="tab" aria-expanded="true">Genel</a>
                                </li>
                                <li class=""><a href="#email" data-toggle="tab" aria-expanded="false">E-mail</a>
                                </li>
                                <li class=""><a href="#social" data-toggle="tab" aria-expanded="false">Sosyal</a>
                                </li>
                                <li class=""><a href="#about_us" data-toggle="tab" aria-expanded="false">Hakkımızda</a>
                                </li>
                                <li class=""><a href="#contact" data-toggle="tab" aria-expanded="false">İletişim</a>
                                </li>
                            </ul>

                            <!-- Tab panes -->
                            <form action="<?=base_url()?>admin/home/ayarlar_guncelle/<?=$veri[0]->id ?>" method="post">
                                <div class="tab-content">
                                    <div class="tab-pane fade active in" id="home"><br>
                                        <h4><center>Genel Ayarlar</center></h4>
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label class="control-label col-sm-2">Ad: </label>
                                                <div class="col-sm-offset-2">
                                                    <input type="text" class="form-control" value="<?=$veri[0]->name ?>" name="name" placeholder="" required>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-sm-2">Açıklama: </label>
                                                <div class="col-sm-offset-2">
                                                    <input type="text" class="form-control" value="<?=$veri[0]->description ?>" name="description" placeholder="" required>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-sm-2">Anahtar Kelimeler: </label>
                                                <div class="col-sm-offset-2">
                                                    <input type="text" class="form-control" value="<?=$veri[0]->keywords ?>" name="keywords" placeholder="" required>
                                                </div>
                                            </div><div class="form-group">
                                                <label class="control-label col-sm-2">Adres: </label>
                                                <div class="col-sm-offset-2">
                                                    <input type="text" class="form-control" value="<?=$veri[0]->address ?>" name="address" placeholder="" required>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-sm-2">Telefon:</label>
                                                <div class="col-sm-offset-2">
                                                    <input type="text" class="form-control" value="<?=$veri[0]->tel ?>" name="tel" placeholder="" required>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-sm-2">Fax:</label>
                                                <div class="col-sm-offset-2">
                                                    <input type="text" class="form-control" value="<?=$veri[0]->fax ?>" name="fax" placeholder="" required>
                                                </div>
                                            </div>


                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="email"><br>
                                        <h4><center>E-Posta Ayarları</center></h4>
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label class="control-label col-sm-2">Smtp Server:</b></label>
                                                <div class="col-sm-offset-2">
                                                    <input type="text" class="form-control" value="<?=$veri[0]->smtpserver ?>" name="smtpserver" placeholder="" required>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-sm-2">Smtp Email:</label>
                                                <div class="col-sm-offset-2">
                                                    <input type="text" class="form-control" value="<?=$veri[0]->smtpemail ?>" name="smtpemail" placeholder="" required>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-sm-2">Port:</label>
                                                <div class="col-sm-offset-2">
                                                    <input type="text" class="form-control" value="<?=$veri[0]->smtpport ?>" name="smtpport" placeholder="" required>
                                                </div>
                                            </div><div class="form-group">
                                                <label class="control-label col-sm-2">Şifre: </label>
                                                <div class="col-sm-offset-2">
                                                    <input type="password" class="form-control" value="<?=$veri[0]->password ?>" name="password" placeholder="" required>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="social"><br>
                                        <h4><center>Sosyal Medya Ayarları</center></h4>
                                        <div class="form-group">
                                            <label class="control-label col-sm-2">Facebook:</b></label>
                                            <div class="col-sm-offset-2">
                                                <input type="text" class="form-control" value="<?=$veri[0]->facebook ?>" name="facebook" placeholder="" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-2">İnstagram:</b></label>
                                            <div class="col-sm-offset-2">
                                                <input type="text" class="form-control" value="<?=$veri[0]->instagram ?>" name="instagram" placeholder="" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-2">Twitter:</b></label>
                                            <div class="col-sm-offset-2">
                                                <input type="text" class="form-control" value="<?=$veri[0]->twitter ?>" name="twitter" placeholder="" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-2">Pinterest:</b></label>
                                            <div class="col-sm-offset-2">
                                                <input type="text" class="form-control" value="<?=$veri[0]->pinterest ?>" name="pinterest" placeholder="" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="about_us"><br>
                                        <h4><center>Hakkımızda Ayarları</center></h4>
                                        <div class="form-group">
                                            <div class="">
                                                <textarea name="about_us" id="editor1" rows="10" cols="80"><?=$veri[0]->about_us ?></textarea>
                                                <script>
                                                    CKEDITOR.replace( 'editor1' );
                                                </script>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="contact"><br>
                                        <h4><center>İletişim Ayarları</center></h4>
                                        <div class="form-group">
                                            <div class="">
                                                <textarea name="contact" id="editor2" rows="10" cols="80"><?=$veri[0]->contact ?></textarea>
                                                <script>
                                                    CKEDITOR.replace( 'editor2' );
                                                </script>
                                            </div>
                                        </div>
                                    </div>
                                    <center><input class="btn btn-success" type="submit" value="Güncelle"/></center>
                                </div>
                            </form>
                        </div>

                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
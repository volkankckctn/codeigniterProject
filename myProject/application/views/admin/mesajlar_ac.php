<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">

                <p></p>
                <div class="panel panel-default">
                    <div class="panel-heading" >
                        <B><?=$veri[0]->name?></B> adlı kullanıcın mesajı
                    </div>
					<center><i class="alert-info"><?=$this->session->flashdata("msj_guncelle")?></i></center>
                    <div class="panel-body">
							
							<div class="form-group col-md-2">
				                <center>E-Mail:<center>
				            </div>
				            <div class="form-group col-md-10">
				                <?=$veri[0]->email?>
				            </div>
							<div class="form-group col-md-2">
				                <center>IP:<center>
				            </div>
				            <div class="form-group col-md-10">
				                <?=$veri[0]->ip?>
				            </div>
							<div class="form-group col-md-2">
				                <center>Mesaj Tarihi:<center>
				            </div>
				            <div class="form-group col-md-10">
				                <?=$veri[0]->date?>
				            </div>
							<div class="form-group col-md-2">
				                <center>Mesaj:<center>
				            </div>
				            <div class="form-group col-md-9">
				                <label><?=$veri[0]->message?></label>
								</div>      
							<form action="<?=base_url()?>admin/home/mesajlar_okunmadi/<?=$veri[0]->id?>" method="post">
								<div class="form-group col-md-12">
								</div>
								<button type="submit" class="btn btn-success btn-lg btn-block">Okunmadı olarak işaretle</button>
				            </form>
							<br>
							<button type="button" class="btn btn-primary btn-lg btn-block" data-toggle="modal" data-target="#exampleModal" data-whatever="@getbootstrap">Cevapla</button>

							<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
							  <div class="modal-dialog" role="document">
								<div class="modal-content">
								  <div class="modal-header">
									<h5 class="modal-title" id="exampleModalLabel">Cevabın:</h5>
									<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									  <span aria-hidden="true">&times;</span>
									</button>
								  </div>
								  <div class="modal-body">
									<form method="post" action="<?=base_url()?>admin/home/mesajlar_cevapla/<?=$veri[0]->id?>">
									  <div class="form-group">
										<label for="message-text" class="form-control-label">Mesaj:</label>
										<textarea class="form-control" name="cevap" id="message-text"></textarea>
									  </div>
									  </div>
									  <div class="modal-footer">
									<button type="button" class="btn btn-secondary" data-dismiss="modal">Kapat</button>
									<button type="submit" class="btn btn-primary">Cevapla</button>
									</form>
								  </div>
								</div>
							  </div>
							</div>
							
							
							
							
							
							
							
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
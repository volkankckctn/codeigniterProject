				<div class="col-sm-9 padding-right">
					<div class="row">  	
	    		<div class="col-sm-12">

	    			<div class="contact-form">
	    				<h2 class="title text-center">Bize Yazın...</h2>
						<i class="text-success"><?=$this->session->flashdata("msj_insert");?></i>
	    				<div class="status alert alert-success" style="display: none"></div>
				    	<form id="main-contact-form" class="contact-form row" name="contact-form" method="post" action="<?=base_url()?>home/mesaj_kaydet">
				            <div class="form-group col-md-6">
				                <input type="text" name="name" value="<?=$this->session->user_session["name"]?><?=$this->session->user_session["surname"]?>" class="form-control" required="required" placeholder="İsim - Soyisim">
				            </div>
				            <div class="form-group col-md-6">
				                <input type="email" name="email" class="form-control" value="<?=$this->session->user_session["email"]?>" required="required" placeholder="Email">
				            </div>
				            <div class="form-group col-md-12">
				                <input type="text" name="subject" class="form-control" required="required" placeholder="Konu">
				            </div>
				            <div class="form-group col-md-12">
				                <textarea name="message" id="message" required="required" class="form-control" rows="8" placeholder="Bize iletmek istediklerinizi yazın"></textarea>
				            </div>

				            <div class="form-group col-md-12">
				                <input type="submit" name="submit" class="btn btn-primary pull-right" value="Gönder">
				            </div>
				        </form>
	    			</div>
	    		</div>
	    	</div>
			<div class="social-networks col-sm-12">
	    					<h2 class="title text-center">Sosyal Medyalar</h2>
							<ul>
								<li>
									<a href="<?=$veri[0]->facebook?>"><i class="fa fa-facebook"></i></a>
								</li>
								<li>
									<a href="<?=$veri[0]->twitter?>"><i class="fa fa-twitter"></i></a>
								</li>
								<li>
									<a href="<?=$veri[0]->instagram?>"><i class="fa fa-instagram"></i></a>
								</li>
								<li>
									<a href="<?=$veri[0]->facebook?>"><i class="fa fa-youtube"></i></a>
								</li>
							</ul>
	    				</div>
				</div>
			</div>
		</div>
	</section>
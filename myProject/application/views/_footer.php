<br><br><footer id="footer"><!--Footer-->

		<div class="footer-widget">
			<div class="container">
				<div class="row">
					<div class="col-sm-2">
						<div class="single-widget">
							<h2>İletişim</h2>
							<ul class="nav nav-pills nav-stacked">
								<li><a href="<?=base_url()?>home/bize_yazin">Bize Yazın</a></li>
								<li><a href="<?=base_url()?>home/iletisim">İletişim</a></li>
								<li><a href="<?=base_url()?>home/hakkimizda">Hakkımızda</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-2">
						<div class="single-widget">
							<h2>Sosyal Medya</h2>
							<ul class="nav nav-pills nav-stacked">
								<li><a href="<?=$veri[0]->facebook?>"><i class="fa fa-facebook"></i>Facebook</a></li>
								<li><a href="<?=$veri[0]->twitter?>"><i class="fa fa-twitter"></i>Twitter</a></li>
								<li><a href="<?=$veri[0]->instagram?>"><i class="fa fa-instagram"></i>Instagram</a></li>
							</ul>
						</div>
					</div>
                    <div class="col-sm-4">
                        <div class="single-widget">
                            <h2>Bize Ulaşın</h2>
                            <ul class="nav nav-pills nav-stacked">
                                <li><a href="<?=base_url()?>home/bize_yazin"> <i class="fa fa-map-marker"></i> <?=$veri[0]->address?></a></li>
                                <li><a href="<?=base_url()?>home/bize_yazin"> <i class="fa fa-phone"></i> Tel: <?=$veri[0]->tel?></a></li>
                                <li><a href="<?=base_url()?>home/bize_yazin"> <i class="fa fa-phone-square"></i> Fax: <?=$veri[0]->fax?></a></li>
                            </ul>
                        </div>
                    </div>
					<div class="col-sm-3 col-sm-offset-1">
						<div class="single-widget">
							<h2></h2>
                            <div class="companyinfo">
                                <h2><span>volkanik</span>daglar<span>.COM</span></h2>
                            </div>
						</div>
					</div>
					
				</div>
			</div>
		</div>
		
		<div class="footer-bottom">
			<div class="container">
				<div class="row">
					<p class="pull-left">Copyright © 2017 "volkanikdaglar.com" All rights reserved.</p>
					<p class="pull-right" >Designed by volkankckctn </p>
				</div>
			</div>
		</div>
		
	</footer><!--/Footer-->
	

  
    <script src="<?=base_url()?>assets/admin/es/js/jquery.js"></script>
	<script src="<?=base_url()?>assets/admin/es/js/bootstrap.min.js"></script>
	<script src="<?=base_url()?>assets/admin/es/js/jquery.scrollUp.min.js"></script>
	<script src="<?=base_url()?>assets/admin/es/js/price-range.js"></script>
    <script src="<?=base_url()?>assets/admin/es/js/jquery.prettyPhoto.js"></script>
    <script src="<?=base_url()?>assets/admin/es/js/main.js"></script>
</body>
</html>
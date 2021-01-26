		
		<!-- footer -->
		<section class="footer">
		    <hr>
		    <div class="container">
		        <div class="row">
		        	<?php foreach($footer as $row) : ?>
		          	<div class="col-md-3">
		            	<p class="font-weight-bold"><?php echo $row->judul; ?></p>
		            	<p><?php echo $row->isi; ?></p>
		          	</div>
		        	<?php endforeach; ?>
		          	
		          	<div class="col-md-3">
		          		<div class="row">
		            	<?php foreach($rek as $row) : ?>
				        <div class="col-4">
				        	<img src="<?php echo base_url('gambar/'.$row->gambar); ?>" class="img-rek mb-3">
				        </div>
				        <div class="col-8">
				        	<span><?php echo 'A.N '.$row->nama_pemilik; ?></span>
				        	<span><?php echo $row->nomor; ?></span>
				        </div>
		            	<?php endforeach; ?>
		            	</div>
		          	</div>	

		          	<div class="col-md-3">
		            	<div class="row mt-3 justify-content-md-center">
		              		<div class="col-md-12 text-center">
		                		<img src="<?php echo base_url('assets/image/logo.jpg'); ?>" class="mx-auto img-footer">    
		              		</div>
		              		<div class="col-md-12 mt-4">
				                <div class="text-center">
				                  	<p class="footer-text">Kunjungi Kami :</p>
				                  	<?php foreach($medsos as $hasil) :  ?>
				                  	<a href="<?php echo $hasil->link; ?>"><img src="<?php echo base_url('gambar/'.$hasil->logo); ?>" class="list-img-footer"></a>
			                  		<?php endforeach; ?>
				                </div>
		              		</div>
		            	</div>
		          	</div>
		        </div>
		        <div class="row">
		          	<div class="col-md text-center mb-3">
		            	<hr>
		            	<small>Kerabat Jalan  2019</small>
		          	</div>
		        </div> 
		    </div>
	    </section>
		<!-- akhir footer -->
		<a class="to-top" href="#page-top">
			<i class="fas fa-chevron-circle-up"></i>
	  	</a>

			

		<script src="<?php echo base_url('assets/sb-admin/vendor/jquery/jquery.min.js') ?>"></script>
		<script src="<?php echo base_url('assets/jquery.lock.min.js') ?>"></script>
	    <script src="<?php echo base_url('assets/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
	    <script type="text/javascript" src="<?php echo base_url('assets/bootstrap/js/bootstrap.propper.js') ?>"></script>
	    <script type="text/javascript" src="<?php echo base_url('assets/bootstrap/js/bootstrap.min.js') ?>"></script>
	  	<script type="text/javascript" src="<?php echo base_url('assets/bootstrap/js/bootstrap.js') ?>"></script>
	    <script src="<?php echo base_url('assets/sb-admin/vendor/jquery-easing/jquery.easing.min.js') ?>"></script>
	    <script type="text/javascript">
	    	$(document).ready(function(){
	    		$
	    	});
	    </script>
  	</body>
</html>
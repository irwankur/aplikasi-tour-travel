	
	<!-- logo pesan -->
	<div class="mail">
		<a data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo" class="mail_target"><img src="<?php echo base_url('assets/image/mail.png'); ?>"></a>
	</div>
	<!-- akhir logo pesan -->
	
	<div class="modal fade" id="exampleModal" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title" id="exampleModalLabel">Kirim Pertanyaan</h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <div class="modal-body">
	        <form action="<?php echo base_url('member/mail'); ?>" method="post">
	          <div class="form-group">
	            <label for="message-text" class="col-form-label">Pesan:</label>
	            <textarea  name="pesan" class="form-control" id="message-text"></textarea>
	          </div>
	      </div>
	      <div class="modal-footer">
	        <button type="submit" name="kirim" class="btn btn-primary" id="btn-pertanyaan">Kirim Pesan</button>
	        </form>
	      </div>
	    </div>
	  </div>
	</div>

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
	
	<script type="text/javascript" src="<?php echo base_url('assets/sweetalert2.min.js'); ?>"></script>
	<script src="<?php echo base_url('assets/sb-admin/vendor/jquery/jquery.min.js') ?>"></script>
	<script src="<?php echo base_url('assets/jquery.lock.min.js') ?>"></script>
    <script src="<?php echo base_url('assets/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
    <script type="text/javascript" src="<?php echo base_url('assets/bootstrap/js/bootstrap.propper.js') ?>"></script>
    <script type="text/javascript" src="<?php echo base_url('assets/bootstrap/js/bootstrap.min.js') ?>"></script>
  	<script type="text/javascript" src="<?php echo base_url('assets/bootstrap/js/bootstrap.js') ?>"></script>
    <script src="<?php echo base_url('assets/sb-admin/vendor/jquery-easing/jquery.easing.min.js') ?>"></script>
	<script type="text/javascript">
		$(document).ready(function(){
			$("#inputHarga").lock();

			$('#inputPenumpang').bind('keyup change', function(){
	            let harga = $('#inputHarga').attr('harga');
	            let penumpang = $('#inputPenumpang').val();
	            $('#inputHarga').val(harga*penumpang);
	        });

			const flashData = $('.flash-data').data('flashdata');
	        if(flashData == 'terkirim'){
	        	Swal.fire({
					type: 'success',
					title: 'Terima Kasih',
					text: 'Komentar anda akan segera ditampilkan'
				});
	        } else if (flashData == 'pertanyaan_terkirim'){
	        	Swal.fire({
					type: 'success',
					title: 'Terima Kasih',
					text: 'Pertanyaan anda akan segera kami balas melalui email anda'
				});
	        } else if (flashData == 'order'){
	        	Swal.fire({
					type: 'success',
					title: 'Terima Kasih',
					text: 'Silahkan hubungi kami untuk proses selanjutnya'
				});
	        }
			
		});
	</script>
  </body>
</html>
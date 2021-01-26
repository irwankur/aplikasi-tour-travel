 <section>
 	<div class="container">
		<div class="row mt-3 justify-content-center">
	 		<div class="col-md text-center">
	 			<p class="align-text-bottom tujuan"><?php echo $query['tujuan']; ?></p>
	 		</div>
	 	</div>
	 	<div class="row"> 
	 		<div class="col-md info_img text-center">
	 			<img class="img_cover" src="<?php echo base_url('gambar/'.$query['cover']); ?>">
	 		</div>
	 	</div>
	 	<div class="box-tanggal">
		 	<div class="row">
		 		<div class="col-md">
					<div class="row justify-content-center">
						<?php if($query['tanggal_keberangkatan'] == 'Setiap Hari') { ?>
						<div class=" col-md-2">
							<div class="text-center border list_tanggal">
								<p class="text-tanggal">SETIAP HARI</p>
								<a href="<?php echo base_url('member/proses_order/'.$query['id_perjalanan'].'/'.$query['tanggal_keberangkatan']); ?>" class="btn btn-sm btn-warning btn-block mt-4" role="button" >PESAN</a>
							</div>
						</div>
						<?php } else {   
						$tanggal = unserialize($query['tanggal_keberangkatan']);
						$total = count($tanggal);
						$lama = unserialize($query['lama']);
						for($i=0; $i<$total; $i++) {
							$waktu = explode('-', $tanggal[$i]);
			                $tanggalAwal = date("d", mktime(0,0,0,$waktu[1],$waktu[2],$waktu[0]));
			                $tanggalAkhir = date("d", mktime(0,0,0,$waktu[1],$waktu[2],$waktu[0])+($lama[$i]-1)*60*60*24);
			                $bulan = date("M", mktime(0,0,0,$waktu[1],$waktu[2],$waktu[0])+$lama[$i]*60*60*24);
			                $tahun = date("Y", mktime(0,0,0,$waktu[1],$waktu[2],$waktu[0])+$lama[$i]*60*60*24);
						?>
						<div class=" col-md-2 mt-1">
							<div class="list_tanggal border text-center">
								<p class="text-tanggal"><?php echo $tanggalAwal." - ".$tanggalAkhir."  ".$bulan." ".$tahun; ?></p>
								<small>Keberangkatan <?php echo $i+1; ?></small>
								<a href="<?php echo base_url('member/proses_order/'.$query['id_perjalanan'].'/'.$tanggalAwal." ".$bulan." ".$tahun); ?>" class="btn btn-sm btn-warning btn-block mt-3" role="button" >PESAN</a>
							</div>
						</div>
						<?php } }?>
					</div>
				</div>
		 	</div>
	 	</div>

	 	<div class="row mt-4">
	 		<div class="col-md">
	 			<div class="keterangan border shadow-sm">
	 				<p class="text-keterangan">Keterangan</p>
	 				<p><?php echo $query['keterangan']; ?></p>
	 			</div>
	 		</div>
	 	</div>

	 	
	</div>
</section>


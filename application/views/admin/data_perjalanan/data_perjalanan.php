<div class="card mb-3">
	<div class="card-header">
	    <i class="fas fa-table"></i>
	    Data Perjalanan
	    <a href="<?php echo base_url('data_perjalanan/tambah'); ?>" class="btn btn-sm btn-success float-right">Tambah Data</a>
	</div>
	<div class="card-body">
		<div class="table-responsive data_perjalanan">
			<table id="data_tabel" class="table table-bordered">
				<thead>
					<tr>
						<th>No.</th>
						<th>Tujuan</th>
						<th>Harga</th>
						<th>Tanggal Keberangkatan</th>
						<th>Meeting Point</th>
						<th>Gambar Cover</th>
						<th>Favorit</th>
						<th>Aksi</th>
					</tr>
				</thead>
				<tbody>
					<?php 
					$no = 1;
					foreach($query as $item) : ?>
					<tr>
						<td><?php echo $no++."."; ?></td>
						<td><?php echo ucwords($item->tujuan) ?></td>
						<td><?php echo 'Rp. '.my_number_format(harga($item->harga)); ?></td>

						<?php if(empty($item->lama)) { ?>
						<td><?php echo $item->tanggal_keberangkatan; ?></td>
						<?php } else  { ?>
						<?php 
							$tanggal = unserialize($item->tanggal_keberangkatan);
							$lama = unserialize($item->lama);
						 	$total = count($tanggal);
						?>
						<td>
							<?php for($i=0; $i<$total; $i++) {
								$waktu = explode('-', $tanggal[$i]);
				                $tanggalAwal = date("d", mktime(0,0,0,$waktu[1],$waktu[2],$waktu[0]));
				                $tanggalAkhir = date("d", mktime(0,0,0,$waktu[1],$waktu[2],$waktu[0])+($lama[$i]-1)*60*60*24);
				                $bulan = date("M", mktime(0,0,0,$waktu[1],$waktu[2],$waktu[0])+$lama[$i]*60*60*24);
				                $tahun = date("Y", mktime(0,0,0,$waktu[1],$waktu[2],$waktu[0])+$lama[$i]*60*60*24);
								echo $tanggalAwal." - ".$tanggalAkhir."  ".$bulan." ".$tahun." - ".$lama[$i]." hari <br>";
							} ?>
						</td>
						<?php } ?>
						<td><?php echo $item->mepo; ?></td>
						<td><img src="<?php echo base_url('gambar/'.$item->cover) ?>" class="img-data"></td>
						<td class="text-center">
							<input type="checkbox" class="fav" value="<?php echo $item->id_perjalanan; ?>" <?php if($item->favorit == 1){ echo 'checked';} ?> >
						</td>
						<td>
							<center>
							<a href="<?php echo base_url('data_perjalanan/ubah/'.$item->id_perjalanan) ?>" class="btn btn-sm btn-warning" >Ubah</a>
							<a href="<?php echo base_url('data_perjalanan/hapus/'.$item->id_perjalanan) ?>" class="btn btn-sm btn-danger" onclick="return confirm('yakin ?');">Hapus</a>
							</center>
						</td>
					</tr>
					<?php endforeach; ?>
				</tbody>
			</table>
		</div>
	</div>
</div>



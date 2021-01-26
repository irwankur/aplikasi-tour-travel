<div class="card mb-3">
	<div class="card-header">
	    Data Keberangkatan ke <b><?php echo $query['tujuan'] ?></b>
	    <a  onclick="history.go(-1);" class="btn btn-warning btn-sm float-right">Kembali</a>
	</div>
	<div class="card-body">
		<div class="row mt-4">
			<div class="col-md">
				<div class="kelompok">
					<table id="data_tabel" class="table table-bordered">
						<thead>
							<tr>
								<th>No.</th>
								<th>Tujuan</th>
								<th>Tanggal Keberangkatan</th>
								<th>Aksi</th>
							</tr>
						</thead>
						<tbody>
							<?php 
							$no = 1; 
							$tanggal = @unserialize($query['tanggal_keberangkatan']);
							$lama = @unserialize($query['lama']);
							$total = count($lama);
							for($i=0; $i<$total; $i++) {
						 	
							?>
							<tr>
								<td><?php echo $no++.'.'; ?></td>
								<td><?php echo ucwords($query['tujuan']) ?></td>
							
								<?php if(empty($query['lama'])) { 
									$id_tanggal = "Setiap Hari"; 
									echo '<td>Setiap Hari</td>';
								} else  {
									$waktu = explode('-', $tanggal[$i]);
					                $tanggalAwal = date("d", mktime(0,0,0,$waktu[1],$waktu[2],$waktu[0]));
					                $tanggalAkhir = date("d", mktime(0,0,0,$waktu[1],$waktu[2],$waktu[0])+$lama[$i]*60*60*24);
					                $bulan = date("M", mktime(0,0,0,$waktu[1],$waktu[2],$waktu[0])+$lama[$i]*60*60*24);
					                $tahun = date("Y", mktime(0,0,0,$waktu[1],$waktu[2],$waktu[0])+$lama[$i]*60*60*24);
									$id_tanggal = $tanggalAwal." ".$bulan." ".$tahun; 
									echo '<td>'.$tanggalAwal." ".$bulan." ".$tahun.'</td>';
								}
								?>
								<td>
									<center>
									<a href="<?php echo base_url('kelompok/detail_penumpang/'.$query['id_perjalanan'].'/'.$query['tujuan'].'/'.$id_tanggal); ?>" class="btn btn-sm btn-primary" >Lihat</a>
									</center>
								</td>
							</tr>
							<?php } ?>
						</tbody>
					</table>	
				</div>
			</div>
		</div>
	</div>	
</div>

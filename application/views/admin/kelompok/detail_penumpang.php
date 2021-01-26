<div class="card mb-3">
	<div class="card-header">
	    Data Penumpang <?php echo $data['tujuan'].' - '.$data['paket']; ?>
	    <a href="<?php echo base_url('kelompok/cetak/'.$data['id_perjalanan'].'/'.$data['tujuan'].'/'.$data['paket']) ?>" target="_blank" class="btn btn-sm btn-success mb-3 float-right ml-3"><i class="fas fa-print fa-fw mr-2"></i>Cetak</a>
	    <a  onclick="history.go(-1);" class="btn btn-warning btn-sm float-right">Kembali</a>
	</div>
	<div class="card-body">
		<div class="table-responsive data_perjalanan">
			<table id="data_tabel" class="table table-bordered">
				<thead>
					<tr>
						<th>No.</th>
						<th>Nama Penumpang</th>
						<th>Email</th>
						<th>Nomor Handphone</th>
						<th>Jumlah Tiket</th>
					</tr>
				</thead>
				<tbody>
					<?php 
					$no = 1;
					$total = 0;
					foreach($query as $item) : 
						$total += $item->jumlah_penumpang;
					?>
					<tr>
						<td><?php echo $no++."."; ?></td>
						<td><?php echo ucwords($item->nama); ?></td>
						<td><?php echo $item->email; ?></td>
						<td><?php echo $item->no_handphone; ?></td>
						<td><?php echo $item->jumlah_penumpang; ?></td>
					</tr>
					<?php endforeach; ?>
				</tbody>
			</table>
		</div>
	</div>
</div>




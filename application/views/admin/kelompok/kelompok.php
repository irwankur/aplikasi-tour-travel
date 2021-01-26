<div class="card mb-3">
	<div class="card-header">
	    Data Kelompok
	</div>
	<div class="card-body">
		<div class="table-responsive data_perjalanan">
			<table id="data_tabel" class="table table-bordered">
				<thead>
					<tr>
						<th>No.</th>
						<th>Tujuan</th>
						<th>Aksi</th>
					</tr>
				</thead>
				<tbody>
					<?php 
					$no = 1;
					foreach($query as $item) : ?>
					<tr>
						<td><?php echo $no++.'.'; ?></td>
						<td><?php echo ucwords($item->tujuan) ?></td>
						<td>
							<center>
							<a href="<?php echo base_url('kelompok/detail_kelompok/'.$item->id_perjalanan) ?>" class="btn btn-sm btn-primary" >Lihat</a>
							</center>
						</td>
					</tr>
					<?php endforeach; ?>
				</tbody>
			</table>
		</div>
	</div>
</div>

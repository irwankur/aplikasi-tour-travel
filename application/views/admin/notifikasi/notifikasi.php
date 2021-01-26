<div class="card mb-3">
	<div class="card-header">
	    Data Pemberitahuan
	</div>
	<div class="card-body">
		<div class="table-responsive data_perjalanan">
			<table id="data_tabel" class="table table-bordered">
				<thead>
					<tr>
						<th class="text-center">
							<input type="checkbox" id="select_all" value="">
						</th>
						<th>No.</th>
						<th>Jenis Pemberitahuan</th>
						<th>Isi</th>
					</tr>
				</thead>
				<tbody>
					<?php 
					$no = 1;
					foreach($query as $item) : ?>
					<tr>
						<td class="text-center">
							<input type="checkbox" name="checked" class="check" id="checked" value="<?php echo $item->id_notif; ?>">
						</td>
						<td><?php echo $no++."."; ?></td>
						<td><?php echo $item->nama; ?></td>
						<td><?php echo $item->isi; ?></td>
					</tr>
					<?php endforeach; ?>
				</tbody>
			</table>
		</div>
	</div>
</div>
<div class="hapus-alert alert alert-warning" role="alert">
	<button class="btn btn-sm btn-danger pull-right" id="hapus_notif"> <i class="glyphicon glyphicon-trash"></i> Hapus</button>
  	<span class="hitung">  </span><span> Data Terpilih</span>
</div>




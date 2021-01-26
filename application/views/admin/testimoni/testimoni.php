<div class="card mb-3">
	<div class="card-header">
	    Testimoni
	</div>
	<div class="card-body">
		<div class="table-responsive data_perjalanan">
			<table  id="data_tabel" class="table table-bordered">
				<thead>
					<tr>
						<th class="text-center">
							<input type="checkbox" id="select_all" value="">
						</th>
						<th>No.</th>
						<th>Nama Penulis</th>
						<th>Isi</th>
						<th>Tanggal dibuat</th>
						<th>Aksi</th>
					</tr>
				</thead>
				<tbody>
					<?php 
					$no = 1;
					foreach($query as $item) : ?>
					<tr>
						<td class="text-center">
							<input type="checkbox" name="checked" class="check" id="checked" value="<?php echo $item->id_testimoni; ?>">
						</td>
						<td><?php echo $no++."."; ?></td>
						<td><?php echo $item->nama; ?></td>
						<td><?php echo $item->komentar; ?></td>
						<td><?php echo date('d-m-Y',$item->tanggal); ?></td>
						<td>
							<select class="form-control input-sm testimoni" data-id="<?php echo $item->id_testimoni; ?>">
								<option >Tidak Tampil</option>
								<option <?php if(!empty($item->status) && $item->status == 'Tampil') echo 'selected="selected"';  ?> >Tampil</option>
							</select>
						</td>
					</tr>
					<?php endforeach; ?>
				</tbody>
			</table>
		</div>
	</div>
</div>

			<div class="hapus-alert alert alert-warning" role="alert">
				<button class="btn btn-sm btn-danger float-right" id="hapus_testimoni"> <i class="glyphicon glyphicon-trash"></i> Hapus</button>
			  	<span class="hitung">  </span><span> Data Terpilih</span>
			</div>		
	




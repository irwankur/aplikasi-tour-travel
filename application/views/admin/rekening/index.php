<div class="card mb-3">
	<div class="card-header">
	    Informasi Rekening
	</div>
	<div class="card-body">
		<div class="table-responsive data_perjalanan">
			<table class="table table-bordered">
				<thead>
					<tr>
						<th>No.</th>
						<th>Nama Rekening</th>
						<th>Nama Pemilik</th>
						<th>Nomor Rekening</th>
						<th>Gambar</th>
						<th>Status</th>
						<th>Aksi</th>
					</tr>
				</thead>
				<tbody>
					<?php 
					$no = 1;
					foreach($query as $item) : ?>
					<tr>
						<td><?php echo $no++."."; ?></td>
						<td><?php echo $item->nama_rekening; ?></td>
						<td><?php echo $item->nama_pemilik; ?></td>
						<td><?php echo $item->nomor; ?></td>
						<td><img src="<?php echo base_url('gambar/'.$item->gambar); ?>" class="img-data"></td>
						<td>
							<select class="form-control input-sm tampil" data-id="<?php echo $item->id_rekening; ?>">
								<option >Tidak Tampil</option>
								<option <?php if(!empty($item->status) && $item->status == 'Tampil') echo 'selected="selected"';  ?> >Tampil</option>
							</select>
						</td>
						<td>
							<center>
								<a href="<?php echo base_url('rekening/ubah_rekening/'.$item->id_rekening) ?>" class="btn btn-sm btn-warning" >Ubah</a>
							</center>
						</td>
					</tr>
					<?php endforeach; ?>
				</tbody>
			</table>
		</div>
	</div>
</div>



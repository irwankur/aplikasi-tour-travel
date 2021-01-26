<div class="card mb-3">
	<div class="card-header">
	    Pengaturan Footer
	</div>
	<div class="card-body">
		<div class="table-responsive data_perjalanan">
			<table class="table table-bordered">
				<thead>
					<tr>
						<th>No.</th>
						<th>Judul</th>
						<th>Isi</th>
						<th>Aksi</th>
					</tr>
				</thead>
				<tbody>
					<?php 
					$no = 1;
					foreach($query as $item) : ?>
					<tr>
						<td><?php echo $no++."."; ?></td>
						<td><?php echo $item->judul; ?></td>
						<td><?php echo $item->isi; ?></td>
						<td>
							<center>
								<a href="<?php echo base_url('footer/ubah/'.$item->id) ?>" class="btn btn-sm btn-warning" >Ubah</a>
							</center>
						</td>
					</tr>
					<?php endforeach; ?>
				</tbody>
			</table>
		</div>
	</div>
</div>



<div class="card mb-3">
	<div class="card-header">
	    Informasi Media Sosial
	</div>
	<div class="card-body">
		<div class="table-responsive data_perjalanan">
			<form action="<?php echo base_url('medsos/ubah') ?>" method="post">
			<table class="table table-bordered">
				<thead>
					<tr>
						<th>No.</th>
						<th>Media Sosial</th>
						<th>Link</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td>1.</td>
						<td><?php echo $query[0]->nama; ?></td>
						<td><input type="text" name="<?php echo $query[0]->nama; ?>" class="form-control" value="<?php echo $query[0]->link ?>"></td>
					</tr>
					<tr>
						<td>2.</td>
						<td><?php echo $query[1]->nama; ?></td>
						<td><input type="text" name="<?php echo $query[1]->nama; ?>" class="form-control" value="<?php echo $query[1]->link ?>"></td>
					</tr>
					<tr>
						<td>3.</td>
						<td><?php echo $query[2]->nama; ?></td>
						<td><input type="text" name="<?php echo $query[2]->nama; ?>" class="form-control" value="<?php echo $query[2]->link ?>"></td>
					</tr>
					<tr>
						<td>4.</td>
						<td><?php echo $query[3]->nama; ?></td>
						<td><input type="text" name="<?php echo $query[3]->nama; ?>" class="form-control" value="<?php echo $query[3]->link ?>"></td>
					</tr>
				</tbody>
			</table>
			<button type="submit" name="ubah" class="btn btn-sm btn-success">Ubah</button>
			</form>
		</div>
	</div>
</div>



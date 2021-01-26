<div class="card mb-3">
	<div class="card-header">
	    Order
	    <a href="<?php echo base_url('order/tambah_data'); ?>" class="btn btn-sm btn-success float-right">Tambah Data</a>
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
						<th>Nama Pembeli</th>
						<th>Email</th>
						<th>Tujuan</th>
						<th>Tanggal Keberangkatan</th>
						<th>Penumpang</th>
						<th>Total Harga</th>
						<th>Status</th>
						<th>Nomor Handphone</th>
					</tr>
				</thead>
				<tbody>
					<?php 
					$no = 1;
					foreach($query as $item) : ?>
					<tr>
						<td class="text-center">
							<input type="checkbox" name="checked" class="check" value="<?php echo $item->id_order; ?>">
						</td>
						<td><?php echo $no++; ?></td>
						<td><?php echo ucwords($item->nama); ?></td>
						<td><?php echo $item->email; ?></td>
						<td><?php echo $item->tujuan; ?></td>
						<td><?php echo $item->paket; ?></td>
						<td><?php echo $item->jumlah_penumpang." Orang"; ?></td>
						<td><?php echo "Rp.".my_number_format($item->total_harga); ?></td>
						<td>
							<select class="form-control input-sm bayar" data-id="<?php echo $item->id_order; ?>" email="<?php echo $item->email; ?>">
								<option >Belum Bayar</option>
								<option <?php if(!empty($item->status) && $item->status == 'Bayar') echo 'selected="selected"';  ?> >Bayar</option>
							</select>
						</td>
						<td>
							<?php echo $item->no_handphone; ?>
						</td>
					</tr>
					<?php endforeach; ?>
				</tbody>
			</table>
		</div>
	</div>
</div>
<div class="hapus-alert alert alert-warning" role="alert">
   <button class="btn btn-sm btn-danger float-right" id="hapus_order"> <i class="glyphicon glyphicon-trash"></i> Hapus</button>
   <span class="hitung">  </span><span> Data Terpilih</span>
</div>

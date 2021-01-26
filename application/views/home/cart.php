	<div class="container-fluid">
	<?php
	if ($query = $this->cart->contents())
		{
 	?>
		<table class="table table-striped">
			<thead>
				<tr>
					<th>No.</th>
					<th>Gambar</th>
					<th>Nama Barang</th>
					<th>Harga</th>
					<th>Jumlah</th>
					<th>Total</th>
					<th class="text-center">Aksi</th>
				</tr>
			</thead>
			<tbody>
				<form method="post" action="<?php echo base_url('check_out/ubah_cart') ?>">
				<?php 
				$no =1;
				$total_semua = 0;
				foreach($query as $qr) : 
				$total_semua = $total_semua + $qr['subtotal'] ?>
				<input type="hidden" name="qr[<?php echo $qr['id'];?>][id]" value="<?php echo $qr['id'];?>" />
				<input type="hidden" name="qr[<?php echo $qr['id'];?>][rowid]" value="<?php echo $qr['rowid'];?>" />
				<input type="hidden" name="qr[<?php echo $qr['id'];?>][name]" value="<?php echo $qr['name'];?>" />
				<input type="hidden" name="qr[<?php echo $qr['id'];?>][price]" value="<?php echo $qr['price'];?>" />
				<input type="hidden" name="qr[<?php echo $qr['id'];?>][gambar]" value="<?php echo $qr['gambar'];?>" />
				<input type="hidden" name="qr[<?php echo $qr['id'];?>][qty]" value="<?php echo $qr['qty'];?>" />
				<tr>
					<td><?php echo $no++; ?></td>
					<td><img src="<?php echo $qr['gambar']; ?>" class="img-cart"></td>
					<td><?php echo $qr['name']; ?></td>
					<td><?php echo my_number_format($qr['price']); ?></td>
					<td><input class="input-sm" type="number" name="qr[<?php echo $qr['id'];?>][qty]" value="<?php echo $qr['qty']; ?>"></td>
					<td><?php echo my_number_format($qr['subtotal']); ?></td>
					<td class="text-center">
						<a href="<?php echo base_url('check_out/hapus/').$qr['rowid'] ?>" class="btn btn-xs btn-danger"><i class="glyphicon glyphicon-remove"></i></a>
					</td>
				</tr>
				<?php endforeach; ?>
				<tr>
					<td colspan="6"><h5>Total Harga : <strong><?php echo my_number_format($total_semua); ?></strong></h5></td>
					<td class="text-center">
						<button type="submit" class="btn btn-sm btn-success">Ubah</button>
						<a href="<?php echo base_url('check_out/beli') ?>"><button class="btn btn-sm btn-primary">Check Out</button></a>
					</td>
				</tr>
			</form> 
			</tbody>
		</table>
 
		<?php 
			} 
				else 
			{ 
				echo "<h3>Keranjang Belanja masih kosong</h3>";
			}
		?>
		</div>	


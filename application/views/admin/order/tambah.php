<div class="row justify-content-md-center">
    <div class="col-lg-10">
        <a href="<?php echo base_url('order'); ?>" class="tambah-data btn btn-warning btn-sm float-right">Kembali</a>
        <H4 class="mt-2">Tambah Data Order</H4>
        <hr>
        <?php echo form_open_multipart('order/tambah_aksi'); ?>
            <div class="form-group">
                <label for="nama">Nama :</label>
                <input type="text" name="nama" id="nama" class="form-control" required autofocus>
            </div>
            <div class="form-group">
                <label for="no_handphone">Nomor Handphone : </label>
                <input type="text" name="no_handphone" id="no_handphone" class="form-control" required placeholder="Nomor Handphone">
            </div>
            <div class="form-group">
                <label for="email">Email : </label>
                <input type="text" name="email" id="email" class="form-control" required placeholder="Email">
            </div>
            <div class="form-group">
                <label for="id_tujuan">Tujuan :</label>
                <select name="id_tujuan" id="id_tujuan" 
                required class="form-control">
                    <option value="">- Pilih -</option>
                    <?php foreach($query as $row) : ?>
                    <option value="<?php echo $row->id_perjalanan; ?>" tujuan="<?php echo $row->tujuan ?>" harga="<?php echo $row->harga; ?>"><?php echo ucwords($row->tujuan); ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="form-group">
                <label for="tanggal_keberangkatan">Tanggal Keberangkatan :</label>
                <select name="tanggal_keberangkatan" id="tanggal_keberangkatan" required class="form-control">
                    <option value="">- Pilih -</option>
                </select>
            </div>
            <div class="form-group">
                <label for="jumlah_tiket">Jumlah_tiket</label>
                <input type="number" name="jumlah_tiket" id="jumlah_tiket" class="form-control" value="" required>  
            </div>
            <div class="form-group">
                <label for="harga">Total Harga</label>
                <input type="hidden" name="tujuan" id="tujuan"> 
                <input type="number" name="harga" id="harga" class="form-control" placeholder="Total Harga" required>
            </div>
            <div class="form-group">
                <label for="status">Status Pembayaran :</label>
                <select name="status" id="status" class="form-control">
                    <option value="Belum Bayar">Belum Bayar</option>
                    <option value="Bayar">Bayar</option>
                </select>
            </div>
            <div class="form-group pull-right">
                <input type="submit" name="tambah" value="simpan" class="btn btn-success">
            </div>
        <?php echo form_close(); ?>
    </div>
</div>
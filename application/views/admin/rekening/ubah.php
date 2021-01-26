    <div class="row justify-content-md-center mt-3">
    <div class="col-lg-6">
        <a href="<?php echo base_url('rekening') ?>" class="tambah-data btn btn-warning btn-sm float-right">Kembali</a>
        <H4>Ubah Data Rekening</H4>
        <hr>
        <?php echo form_open_multipart('rekening/ubah_aksi'); 
        foreach($query as $item) :
        ?>
            <div class="form-group">
                <label for="nama">Nama Rekening</label>
                <input type="hidden" name="id_rekening" value="<?php echo $item->id_rekening; ?>">
                <input type="text" name="nama" id="nama" class="form-control" value="<?php echo $item->nama_rekening; ?>" required autofocus>
            </div>
            <div class="form-group">
                <label for="nomor">Nomor Rekening</label>
                <input type="number" name="nomor" id="nomor" class="form-control" value="<?php echo $item->nomor; ?>" required>
            </div>
            <div class="form-group">
                <label for="nama_pemilik">Nama Pemilik</label>
                <input type="text" name="nama_pemilik" value="<?php echo $item->nama_pemilik; ?>" class="form-control">
            </div>
            <div class="form-group">
                <label for="gambar">Gambar</label>
                <input type="hidden" name="GambarLama" value="<?php echo $item->gambar; ?>">
                <input type="file" name="gambar" id="gambar">
            </div>
            <div class="form-group">
                <img src="<?php echo base_url('gambar/'.$item->gambar); ?>" class="img-edit">
            </div>
             <div class="form-group pull-right">
                <input type="submit" name="tambah" value="simpan" class="btn btn-success">
            </div>
        <?php 
        endforeach;
        echo form_close(); ?>
    </div>
</div>
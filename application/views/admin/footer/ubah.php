<div class="row justify-content-md-center mt-3">
    <div class="col-lg-8">
        <a href="<?php echo base_url('footer') ?>" class="tambah-data btn btn-warning btn-sm float-right">Kembali</a>
        <H4>Ubah Isi Footer</H4>
        <hr>
        <?php echo form_open_multipart('footer/ubah_aksi'); 
        ?>
            <div class="form-group">
                <label for="judul">Judul</label>
                <input type="hidden" name="id" value="<?php echo $query['id']; ?>">
                <input type="text" name="judul" id="judul" class="form-control" value="<?php echo $query['judul']; ?>" required autofocus>
            </div>
            <div class="form-group">
                <label for="isi">Isi :</label>
                <textarea name="isi" id="isi" class="ckeditor form-control" required><?php echo $query['isi']; ?></textarea>  
            </div>
            <div class="form-group pull-right">
                <input type="submit" name="Ubah" value="simpan" class="btn btn-success">
            </div>
        <?php echo form_close(); ?>
    </div>
</div>
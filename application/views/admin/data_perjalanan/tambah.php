
<div class="row justify-content-md-center mt-2">
    <div class="col-lg-10">
    <a href="<?php echo base_url('data_perjalanan') ?>" class="tambah-data btn btn-warning btn-sm float-right"> Kembali</a>
    <H4>Tambah Data Perjalanan</H4>
    <hr>
    <?php echo form_open_multipart('data_perjalanan/tambah_aksi') ?>
        <div class="form-row">
           <div class="form-group col-md-6">
               <label class="font-weight-bold" for="tujuan">Tujuan</label>
               <input type="text" class="form-control" name="tujuan" id="tujuan" placeholder="Tujuan">
            </div>
            <div class="form-group col-md-6">
               <label class="font-weight-bold" for="harga">Harga</label>
               <input type="number" class="form-control" name="harga" id="harga" placeholder="Harga">
            </div>
        </div>
        
        <div class="form-group">
            <div class="form-check">
                <input class="form-check-input cek-diskon" type="checkbox" id="gridCheck">
                <label class="form-check-label font-italic" for="gridCheck">
                Ceklis jika ada diskon
                </label>
            </div>
        </div>
        <hr>
        <div class="form-group">
            <label class="font-weight-bold" for="harga_diskon">Harga Diskon</label>
            <input type="text" class="form-control hrg_diskon" name="harga_diskon" id="harga_diskon" placeholder="Harga Diskon" disabled>
        </div>

        <hr>
        <div class="form-group">
            <div class="form-check">
                <input class="form-check-input cek-input" type="checkbox" id="gridCheck">
                <label class="form-check-label font-italic" for="gridCheck">
                Ceklis jika perjalanan setiap hari
                </label>
            </div>
        </div>
        <hr>
        <div class="form-group">
            <label class="font-weight-bold" for="tanggal_keberangkatan">Tanggal Keberangkatan - Setiap Hari</label>
            <input type="text" class="form-control stp_hr" name="tanggal_keberangkatan" id="tanggal_keberangkatan" value="Setiap Hari" disabled>
        </div>

        <hr>
        <div class="form-row">
            <div class="form-group col-sm-8">
                <label class="font-weight-bold" for="tanggal_keberangkatan">Tanggal Keberangkatan</label>
                <input type="date" class="form-control tgl_brn" name="tanggal_keberangkatan[]" id="tanggal_keberangkatan">
            </div>
            <div class="form-group col-sm-4">
                <label class="font-weight-bold" for="lama">Lama</label>
                <input type="number" class="form-control tgl_brn" name="lama[]" id="lama">
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-sm-8">
                <label class="font-weight-bold" for="tanggal_keberangkatan">Tanggal Keberangkatan</label>
                <input type="date" class="form-control tgl_brn" name="tanggal_keberangkatan[]" id="tanggal_keberangkatan">
            </div>
            <div class="form-group col-sm-4">
                <label class="font-weight-bold" for="lama">Lama</label>
                <input type="number" class="form-control tgl_brn" name="lama[]" id="lama">
            </div>
        </div>
        
        <div class="form-row">
            <div class="form-group col-sm-8">
                <label class="font-weight-bold" for="tanggal_keberangkatan">Tanggal Keberangkatan</label>
                <input type="date" class="form-control tgl_brn" name="tanggal_keberangkatan[]" id="tanggal_keberangkatan">
            </div>
            <div class="form-group col-sm-4">
                <label class="font-weight-bold" for="lama">Lama</label>
                <input type="number" class="form-control tgl_brn" name="lama[]" id="lama">
            </div>
        </div>

        <div class="form-group">
            <label class="font-weight-bold" for="mepo">Meeting Point</label>
            <input type="text" class="form-control" name="mepo" id="mepo" placeholder="Meeting Point">
        </div>
        <hr>
        <div class="form-group">
            <label for="keterangan">Keterangan :</label>
            <textarea name="keterangan" id="keterangan" class="ckeditor form-control" required></textarea>  
        </div>
        <div class="form-group">
            <label class="font-weight-bold" for="gambar">Gambar</label>
            <input type="file" name="gambar" id="gambar"  required>
        </div>
      
        <button type="submit" class="btn btn-primary mb-4">Tambah</button>
    <?php echo form_close(); ?>
</div>
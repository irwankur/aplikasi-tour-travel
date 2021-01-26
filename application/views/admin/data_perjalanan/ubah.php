
<div class="row justify-content-md-center mt-3">
    <div class="col-lg-10">
        <a href="<?php echo base_url('data_perjalanan') ?>" class="tambah-data btn btn-warning btn-sm float-right"> Kembali</a>
    <H4>Ubah Data Perjalanan</H4>
    <hr>
    <?php 
    $tanggal_keberangkatan = @unserialize($query['tanggal_keberangkatan']);
    $lama = @unserialize($query['lama']);
    echo form_open_multipart('data_perjalanan/ubah_aksi');
    ?>

        <div class="form-row">
           <div class="form-group col-md-6">
               <label class="font-weight-bold" for="tujuan">Tujuan</label>
               <input type="hidden" name="id_perjalanan" value="<?php echo $query['id_perjalanan']; ?>">
               <input type="text" class="form-control" name="tujuan" id="tujuan" placeholder="Tujuan" value="<?php echo $query['tujuan'] ?>">
            </div>
            <div class="form-group col-md-6">
               <label class="font-weight-bold" for="harga">Harga</label>
               <input type="number" class="form-control" name="harga" id="harga" placeholder="Harga" value="<?php echo $query['harga'] ?>">
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
            <input type="text" class="form-control hrg_diskon" name="harga_diskon" id="harga_diskon" <?php if ($query['harga_diskon'] > 0){ echo 'value='.$query['harga_diskon'];  } ?>  disabled>
        </div>

        <hr>
        <div class="form-group">
            <div class="form-check">
                <input class="form-check-input cek-input" type="checkbox" id="gridCheck" <?php if($query['tanggal_keberangkatan'] == 'Setiap Hari'){ echo 'checked'; } ?>>
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
                <input type="date" class="form-control tgl_brn" name="tanggal_keberangkatan[]" value="<?php echo $tanggal_keberangkatan[0] ?>" id="tanggal_keberangkatan">
            </div>
            <div class="form-group col-sm-4">
                <label class="font-weight-bold" for="lama">Lama</label>
                <input type="number" class="form-control tgl_brn" name="lama[]" id="lama" value="<?php echo $lama[0] ?>">
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-sm-8">
                <label class="font-weight-bold" for="tanggal_keberangkatan">Tanggal Keberangkatan</label>
                <input type="date" class="form-control tgl_brn" name="tanggal_keberangkatan[]" <?php if (isset($tanggal_keberangkatan[1])){ echo 'value='.$tanggal_keberangkatan[1];  } ?> id="tanggal_keberangkatan">
            </div>
            <div class="form-group col-sm-4">
                <label class="font-weight-bold" for="lama">Lama</label>
                <input type="number" class="form-control tgl_brn" name="lama[]" id="lama" <?php if (isset($lama[1])){ echo 'value='.$lama[1];  } ?>>
            </div>
        </div>
        
        <div class="form-row">
            <div class="form-group col-sm-8">
                <label class="font-weight-bold" for="tanggal_keberangkatan">Tanggal Keberangkatan</label>
                <input type="date" class="form-control tgl_brn" name="tanggal_keberangkatan[]" id="tanggal_keberangkatan" <?php if (isset($tanggal_keberangkatan[2])){ echo 'value='.$tanggal_keberangkatan[2];  } ?>>
            </div>
            <div class="form-group col-sm-4">
                <label class="font-weight-bold" for="lama">Lama</label>
                <input type="number" class="form-control tgl_brn" name="lama[]" id="lama" <?php if (isset($lama[2])){ echo 'value='.$lama[2];  } ?>>
            </div>
        </div>

        <div class="form-group">
            <label class="font-weight-bold" for="mepo">Meeting Point</label>
            <input type="text" class="form-control" name="mepo" id="mepo" placeholder="Meeting Point" value="<?php echo $query['mepo'] ?>">
        </div>
        <hr>
        <div class="form-group">
            <label for="keterangan">Keterangan :</label>
            <textarea name="keterangan" id="keterangan" class="ckeditor form-control" required><?php echo $query['keterangan'] ?></textarea>  
        </div>
        
        <div class="form-group">
            <label for="gambar">Gambar</label>
            <input type="file" name="gambar" id="gambar">
            <input type="hidden" name="gambarLama" value="<?php echo $query['cover'] ?>">
            <img src="<?php echo base_url('gambar/'.$query['cover']); ?>" class="img-edit">
        </div>
        <button type="submit" class="btn btn-primary mb-4">Ubah</button>
    <?php echo form_close(); ?>
</div>
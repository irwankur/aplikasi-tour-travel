<div class="container">
  <div class="row justify-content-center">
    <div class="col-lg-8">
      <div class="card card-checkout mx-auto mt-5">
        <div class="card-header text-center">PESAN PERJALANAN</div>
        <div class="card-body">
          <form action="<?php echo base_url('member/aksi_order'); ?>" method="post">
            
            <div class="form-group">
              <label for="inputNama">Nama Lengkap</label>
              <input type="text" id="inputNama" name="nama" class="form-control" required="required">
              <input type="hidden" name="id_perjalanan" value="<?php echo $query['id_perjalanan']; ?>">
            </div>

            <div class="form-group">
              <label for="inputHP">Nomor Handphone</label>
              <input type="number" id="inputHP" name="no_hp" class="form-control" required="required">
            </div>
            
            <div class="form-group">
              <div class="form-row">
                <div class="col-md-6">
                  <label for="inputTujuan">Tujuan</label>
                  <input type="text" id="inputTujuan" name="tujuan" class="form-control" readonly value="<?php echo $query['tujuan']; ?>">
                </div>
                <div class="col-md-6">
                  <label for="inputPaket">Paket</label>
                  <input type="text" id="inputPaket" name="paket" class="form-control" readonly value="<?php echo $tanggal; ?>">
                </div>
              </div>
            </div>

            <div class="form-group">
              <div class="form-row">
                <div class="col-md-6">
                    <label for="inputPenumpang">Jumlah Penumpang</label>
                    <input type="number" id="inputPenumpang" name="jml_penumpang" min="1" class="form-control" required="required">
                </div>
                <div class="col-md-6">
                  <label for="inputHarga">Harga</label>
                  <?php if($query['harga_diskon'] == 0) { ?>
                  <input type="number" harga="<?php echo $query['harga']; ?>" placeholder="<?php echo $query['harga']; ?>" id="inputHarga" name="jml_harga" class="form-control" readonly>
                  <input type="hidden" name="harga" value="<?php echo $query['harga']; ?>">
                  <?php } else { ?>
                  <input type="number" harga="<?php echo $query['harga_diskon']; ?>" placeholder="<?php echo $query['harga_diskon']; ?>" id="inputHarga" name="jml_harga" class="form-control" readonly>
                  <input type="hidden" name="harga" value="<?php echo $query['harga_diskon']; ?>">
                  <?php } ?>
                </div>
              </div>
            </div>

            <button type="submit" class="btn btn-block btn-primary">Pesan</button>
          </form>
        </div>
      </div>    
    </div>   
  </div>
</div>

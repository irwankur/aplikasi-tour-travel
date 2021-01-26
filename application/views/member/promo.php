  <!-- content -->
  <div class="container mt-5">
    <div class="testimoni">
      <?php if(count($query) == 0 ) { ?>
        <div class="row justify-content-center">
          <div class="col-md-6  mt-5">
            <div class="kosong text-center"> 
              <p>Promo Perjalanan Kosong</p>
            </div>
          </div>
        </div>
      <?php } else { ?>
      <p class="judul">Promo Diskon Perjalanan</p>
      <div class="row justify-content-md-center">
        <?php foreach($query as $row) : 
        $tanggal_keberangkatan = @unserialize($row->tanggal_keberangkatan);
        if(is_array($tanggal_keberangkatan)){
          $jumlah = count($tanggal_keberangkatan).' Keberangkatan';  
        } else {
          $jumlah = "Keberangkatan setiap hari";
        } ?>
        <div class="col-md-4">
          <div class="card mb-4 shadow-sm">
            <img src="<?php echo base_url('gambar/'.$row->cover); ?>" class="card-img-top" alt="kerabat_jalan">
            <div class="card-body">
              <?php if($row->harga_diskon > 0) : ?>
              <p class="diskon"><?php echo ceil((($row->harga-$row->harga_diskon)/$row->harga)*100).'%'; ?></p>
              <img src="<?php echo base_url('assets/image/badge.png'); ?>" class="float-right card-badge">
              <?php endif ?>
              <h5 class="card-title"><?php echo $row->tujuan; ?></h5>
              <p class="total_keberangkatan"><?php echo $jumlah ?></p>
              <p class="mepo">Start : <?php echo $row->mepo; ?></p>
              <div class="d-flex justify-content-between align-items-center mt-2 sticky-bottom">
                <div class="btn-group">
                  <a href="<?php echo base_url('member/info/'.$row->id_perjalanan); ?>" class="btn btn-sm btn-primary">Lihat</a>
                </div>
                <?php if($row->harga_diskon > 0){ ?>
                <small class="harga-coret"><?php echo "Rp. ".my_number_format($row->harga); ?></small>
                <small class="harga"><?php echo "Rp. ".my_number_format($row->harga_diskon); ?></small>
                <?php }else { ?>
                <small class="harga"><?php echo "Rp. ".my_number_format($row->harga); ?></small>
                <?php } ?>
              </div>
            </div>
          </div>
        </div>
        <?php endforeach; ?>
      </div>  
      <?php } ?>
    </div>
  </div>
  <!-- akhir content -->
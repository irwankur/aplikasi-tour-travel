  <!-- content -->
  <div class="container mt-5">
    <p class="judul">Semua Destinasi</p>
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
            <p class="card-text">Start : <?php echo $row->mepo; ?></p>
            <p><?php echo $jumlah ?></p>
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
  </div>
  <!-- akhir content -->
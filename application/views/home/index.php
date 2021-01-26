
<!-- carousel -->
<div id="carouselExampleControls" class="carousel slide mt-2" data-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img class="d-block w-100" src="<?php echo base_url('gambar/'.$slider[0]->gambar); ?>" alt="First slide">
      <div class="carousel-caption d-none d-md-block text-slider">
        <h2><?php echo $slider[0]->judul; ?></h2>
        <h4><?php echo $slider[0]->text; ?></h4>
      </div>
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="<?php echo base_url('gambar/'.$slider[1]->gambar); ?>" alt="Second slide">
      <div class="carousel-caption d-none d-md-block">
        <h2><?php echo $slider[1]->judul; ?></h2>
        <h4><?php echo $slider[1]->text; ?></h4>
      </div>
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="<?php echo base_url('gambar/'.$slider[2]->gambar); ?>" alt="Third slide">
      <div class="carousel-caption d-none d-md-block">
        <h2><?php echo $slider[2]->judul; ?></h2>
        <h4><?php echo $slider[2]->text; ?></h4>
      </div>
    </div>
  </div> 
  <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
<!-- akhir carousel -->

<!-- content -->
<div class="container">
  <p class="judul mt-3">Destinasi Favorit</p>
  <div class="row justify-content-md-center">
    <?php foreach($favorit as $row) : 
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
              <a href="<?php echo base_url('home/info/'.$row->id_perjalanan); ?>" class="btn btn-sm btn-primary tombol">Lihat</a>
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

<!-- space -->
<section class="space">
  <div class="container">
    <div class="row">
      <div class="col-sm-12">
        <div class="row">
          <div class="col text-center">
            <div class="space-link">
              <p>BERPENGALAMAN</p>
              <img src="<?php echo base_url('assets/image/time.png'); ?>">
            </div>
          </div>
          <div class="col text-center">
             <div class="space-link">
              <p>TERPERCAYA</p>
              <img src="<?php echo base_url('assets/image/handshakes.png'); ?>">
            </div>
          </div>
          <div class="col text-center">
            <div class="space-link">
              <p>TERJANGKAU</p>
              <img src="<?php echo base_url('assets/image/hand.png'); ?>">
            </div>  
          </div>
          <div class="col text-center">
            <div class="space-link">
              <p>10+ PERJALANAN</p>
              <img src="<?php echo base_url('assets/image/gps.png'); ?>">
            </div>  
          </div> 
        </div>
      </div>
    </div>
  </div>
</section>
<!-- space -->

<!-- content 2 -->
<div class="container">
  <p class="judul mt-5">Temukan Destinasi Terbaik Anda</p>
  <div class="row">
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
              <a href="<?php echo base_url('home/info/'.$row->id_perjalanan); ?>" class="btn btn-sm btn-primary tombol">Lihat</a>
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
    <div class="col-md-12 text-center">
      <div class="lihat_semua mb-4 mt-4">
        <a href="<?php echo base_url('home/semua_perjalanan') ?>" class="btn btn-primary btn-sm tombol">Lihat Semua</a>
      </div>
    </div>
  </div>  
</div>
<!-- akhir content 2 -->

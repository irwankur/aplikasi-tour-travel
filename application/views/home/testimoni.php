<div class="container">
    <div class="testimoni">
      <?php if(count($query) == 0 ) { ?>
        <div class="row justify-content-center">
          <div class="col-md-6  mt-5">
            <div class="kosong text-center">
              <p>Belum Ada Testimoni</p>
            </div>
          </div>
        </div>
      <?php } else { ?>
      <div class="col-lg">
          <h5 class="mt-5 mb-3">Testimoni</h5>
          <?php foreach($query as $row) : ?>
          <div class="card card-testi">
            <div class="card-body">
              <blockquote class="blockquote mb-0">
                <p class="komentar"><?php echo $row->komentar; ?></p>
                <footer class="blockquote-footer penulis"><?php echo date('d-m-Y', $row->tanggal); ?> - <cite title="Source Title"><?php echo $row->nama; ?></cite></footer> 
              </blockquote>
            </div>
          </div>
          <?php endforeach; ?>
      </div>
      <div class="lihat_semua mt-5 text-center">
        <a href="<?php echo base_url('home/semua_testimoni') ?>" class="btn btn-primary btn-sm tombol">Lihat Semua</a>
      </div>
      <?php } ?>
    </div>
</div> 
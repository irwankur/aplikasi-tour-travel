<div class="container">
    <div class="testimoni">
      <div class="flash-data" data-flashdata="<?php echo $this->session->flashdata('status'); ?>">
      </div>

      <div class="col-lg">
          <p class="text-testimoni">Testimoni</p>
          <?php foreach($query as $row) : ?>
          <div class="card card-testi">
            <div class="card-body">
              <blockquote class="blockquote mb-0">
                <p class="komentar"><?php echo $row->komentar; ?></p>
                <footer class="penulis"><?php echo date('d-m-Y', $row->tanggal); ?> - <?php echo $row->nama; ?></p>
              </blockquote>
            </div>
          </div>
          <?php endforeach; ?>
          
          <?php if($status_order['status_order'] > 0) : ?>
          <div class="card mt-5">
            <div class="card-body">
              <form action="<?php echo base_url('member/input_testimoni'); ?>" method="post">
                <div class="input-group">
                  <input type="text" class="form-control kom-testi" placeholder="Silahkan isi testimoni anda" name="komentar" aria-label="Recipient's username" aria-describedby="basic-addon2" required>
                  <div class="input-group-append">
                    <button class="btn btn-success" name="tambah" type="submit" id="btn-testimoni">Tambah</button>
                  </div>
                </div>
              </form>
            </div>
          </div>
          <?php endif; ?>
      </div>
    </div>
</div>


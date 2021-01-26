
  <div class="container">

    <div class="row justify-content-center">
      <div class="login-alert">
        <div class="col-md text-center">
          <?php echo $this->session->flashdata('status'); ?>
        </div>    
      </div>  
    </div>

    <div class="card card-register mx-auto mt-5">
      <div class="card-header">DAFTAR AKUN BARU</div>
      <div class="card-body">
        <form action="<?php echo base_url('auth/daftar'); ?>" method="post">
          
          <div class="form-group">
            <div class="form-label-group">
              <input type="text" id="inputNama" name="nama" class="form-control" placeholder="Nama Lengkap" required="required" value="<?php echo set_value('nama'); ?>">
              <label for="inputNama">Nama Lengkap</label>
            </div>
            <small class="form_error"><?php echo form_error('nama') ?></small>
          </div>

          <div class="form-group">
            <div class="form-label-group">
              <input type="email" id="inputEmail" name="email" class="form-control" placeholder="Alamat Email" required="required" value="<?php echo set_value('email'); ?>">
              <label for="inputEmail">Alamat Email</label>
            </div>
            <small class="form_error"><?php echo form_error('email') ?></small>
          </div>

          <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                <div class="form-label-group">
                  <input type="password" id="inputPassword" name="password" class="form-control" placeholder="Password" required="required">
                  <label for="inputPassword">Password</label>
                </div>
                <small class="form_error"><?php echo form_error('password'); ?></small>
              </div>
              <div class="col-md-6">
                <div class="form-label-group">
                  <input type="password" id="konfirmasi_password" name="konfirmasi_password" class="form-control" placeholder="Konfirmasi Password" required="required">
                  <label for="konfirmasi_password">Konfirmasi Password</label>
                </div>
                <small class="form_error"><?php echo form_error('konfirmasi_password'); ?></small>
              </div>
            </div>
          </div>

          <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                <div class="form-label-group text-center">
                  <?php echo $img; ?>
                </div>
                <?php if($this->session->flashdata('notif') == 'salah') { 
                  echo '<p class="capca">kode yang anda masukan salah!</p>';
                } ?>
              </div>
              <div class="col-md-6 mt-2">
                <div class="form-label-group">
                  <input type="text" class="form-control" id="masukan_kode" name="kode" required placeholder="masukan kode capthca">
                  <label for="masukan_kode">Masukan Kode</label>
                </div>
              </div>
            </div>
          </div>
          <button type="submit" class="btn btn-block btn-primary">Daftar</button>
        </form>
      </div>
    </div>
  </div>

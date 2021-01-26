    <div class="container">
      <div class="row main">
        <div class="col-md-8 col-md-offset-2">
        <div class="main-login main-center">
          <form class="form-horizontal" method="post" action="<?php echo base_url('auth/daftar'); ?>">
            
            <div class="form-group">
              <label for="nama" class="control-label">Nama Lengkap</label>
              <div class="cols-sm-10">
                <div class="input-group">
                  <span class="input-group-addon"><i class="glyphicon glyphicon-user" aria-hidden="true"></i></span>
                  <input type="text" class="form-control" name="nama" id="nama"  placeholder="Masukan nama anda" value="<?php echo set_value('nama'); ?>">
                </div>
                <small class="form_error"><?php echo form_error('nama') ?></small>
              </div>
            </div>

            <div class="form-group">
              <label for="email" class="cols-sm-2 control-label">Email</label>
              <div class="cols-sm-10">
                <div class="input-group">
                  <span class="input-group-addon"><i class="glyphicon glyphicon-envelope" aria-hidden="true"></i></span>
                  <input type="text" class="form-control" name="email" id="email"  placeholder="Masukan email anda" value="<?php echo set_value('email'); ?>">
                </div>
                <small class="form_error"><?php echo form_error('email') ?></small>
              </div>
            </div>

            <div class="form-group">
              <label for="password" class="cols-sm-2 control-label">Password</label>
              <div class="cols-sm-10">
                <div class="input-group">
                  <span class="input-group-addon"><i class="glyphicon glyphicon-lock" aria-hidden="true"></i></span>
                  <input type="password" class="form-control" name="password" id="password"  placeholder="Masukan password anda">
                </div>
                 <small class="form_error"><?php echo form_error('password') ?></small>
              </div>
            </div>

            <div class="form-group">
              <label for="konfirmasi_password" class="cols-sm-2 control-label">Konfirmasi Password</label>
              <div class="cols-sm-10">
                <div class="input-group">
                  <span class="input-group-addon"><i class="glyphicon glyphicon-lock" aria-hidden="true"></i></span>
                  <input type="password" class="form-control" name="konfirmasi_password" id="konfirmasi_password"  placeholder="konfirmasi password anda">
                </div>
                <small class="form_error"><?php echo form_error('konfirmasi_password') ?></small>
              </div>
            </div>
            <div class="form-group">
              <?php echo $img; ?>
            </div>
            <?php if($this->session->flashdata('notif') == 'salah') { 
              echo '<p class="capca">kode yang anda masukan salah!</p>';
            } ?>
            <div class="form-group">
              <label for="masukan_kode">Masukan Kode :</label>
              <input type="text" class="form-control" id="masukan_kode" name="kode" required placeholder="masukan kode capthca">
            </div>

            <div class="form-group ">
              <button type="submit" class="btn btn-primary btn-lg btn-block login-button">Daftar</button>
            </div>
            <div class="login-register">
              <a href="<?php echo base_url('auth/login_member'); ?>">Login</a>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <script src="<?php echo base_url('assets/jquery.min.js') ?>"></script>
  <script src="<?php echo base_url('assets/bootstrap/js/bootstrap.min.js') ?>"></script>   
  </body>
</html>


  
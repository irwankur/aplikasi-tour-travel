    <div class="container">
      <div class="row main">
        <div class="col-md-8 col-md-offset-2">
           <div class="wrn">
            <?php if($this->session->flashdata('status') == 'failed'){ ?>
            <div class="alert alert-danger alert-dismissable" role="alert">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                <strong>Login gagal</strong> Username / Password salah         
            </div>
            <?php } else if($this->session->flashdata('status') == 'no_login'){ ?>
            <div class="alert alert-danger alert-dismissable" role="alert">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                Untuk pemesanan anda harus login         
            </div>
            <?php }else if($this->session->flashdata('status') == 'belum_aktif'){ ?>
            <div class="alert alert-danger alert-dismissable" role="alert">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                Email belum ter Registrasi.         
            </div>
            <?php }else if($this->session->flashdata('status') == 'berhasil_aktif'){ ?>
            <div class="alert alert-success alert-dismissable" role="alert">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                Selamat, Email sudah Registrasi.         
            </div>
            <?php }else if($this->session->flashdata('status') == 'email_salah'){ ?>
            <div class="alert alert-danger alert-dismissable" role="alert">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                Selamat, Email sudah Registrasi.         
            </div>
            <?php }else if($this->session->flashdata('status') == 'token_salah'){ ?>
            <div class="alert alert-danger alert-dismissable" role="alert">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                Selamat, Email sudah Registrasi.         
            </div>
            <?php }else{ ?>
            <div class="alert alert-danger alert-dismissable" role="alert">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                Untuk pemesanan tiket, harus login terlebih dahulu.         
            </div>
            <?php } ?>
          </div>
          <div class="main-login main-center">
            <form class="form-horizontal" method="post" action="<?php echo base_url('auth/login'); ?>">

              <div class="form-group">
                <label for="email" class="cols-sm-2 control-label">Email</label>
                <div class="cols-sm-10">
                  <div class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-envelope" aria-hidden="true"></i></span>
                    <input type="text" class="form-control" name="email" id="email"  placeholder="Masukan email anda">
                  </div>
                </div>
              </div>

              <div class="form-group">
                <label for="password" class="cols-sm-2 control-label">Password</label>
                <div class="cols-sm-10">
                  <div class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-lock" aria-hidden="true"></i></span>
                    <input type="password" class="form-control" name="password" id="password" placeholder="Masukan password nda">
                  </div>
                </div>
              </div>

              <div class="form-group ">
                <button type="submit" class="btn btn-primary btn-lg btn-block login-button">Masuk</button>
              </div>
              <div class="login-register">
                <span>Belum punya akun ?</span><a href="<?php echo base_url('auth/daftar'); ?>"> Daftar</a>
                <span>. Lupa Password?</span><a href="<?php echo base_url('auth/reset_password'); ?>"> Klik disini</a>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script src="<?php echo base_url('assets/jquery.min.js') ?>"></script>
  <script src="<?php echo base_url('assets/bootstrap/js/bootstrap.min.js') ?>"></script>   
  </body>
</html>


  
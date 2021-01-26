  <div class="row justify-content-center">
    <div class="login-alert">
      <div class="col-md">
        <?php if($this->session->flashdata('status') == 'pass_salah'){ ?>
        <div class="alert alert-danger alert-dismissable" role="alert">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
            Password yang anda masukan salah!        
        </div>
        <?php } if($this->session->flashdata('status') == 'pass_sama') { ?>
        <div class="alert alert-danger alert-dismissable" role="alert">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
            Password baru dan lama tidak boleh sama!        
        </div>
        <?php } ?>
      </div>    
    </div>  
  </div>
<div class="card card-login mx-auto mt-5 pb-4">
  <div class="card-header text-center">UBAH PASSWORD</div>
    <div class="card-body">
      <form action="<?php echo base_url('login_admin/ubah_password'); ?>" method="post">
        <div class="form-group">
          <div class="form-label-group">
            <input type="password" id="inputPassword" name="password" class="form-control" placeholder="Password" required="required">
            <label for="inputPassword">Password Lama</label>
          </div>
          <small class="form_error"><?php echo form_error('password') ?></small>
        </div>
        <div class="form-group">
          <div class="form-label-group">
            <input type="password" id="inputPasswordBaru" name="password_baru" class="form-control" placeholder="Password Baru" required="required">
            <label for="inputPasswordBaru">Password Baru</label>
          </div>
          <small class="form_error"><?php echo form_error('password_baru') ?></small>
        </div>
        <div class="form-group">
          <div class="form-label-group">
            <input type="password" id="Konfirmasi" name="konfirmasi_password" class="form-control" placeholder="Konfirmasi Password" required="required">
            <label for="Konfirmasi">Konfirmasi Password</label>
          </div>
          <small class="form_error"><?php echo form_error('konfirmasi_password') ?></small>
        </div>
        <button type="submit" name="login" class="btn btn-primary btn-block">Ubah</button>
      </form>
    </div>
  </div>
</div>

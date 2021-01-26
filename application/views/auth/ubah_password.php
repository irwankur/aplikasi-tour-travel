<div class="container">
  <div class="card card-login mx-auto pb-4">
    <div class="card-header text-center">
      RESET PASSWORD
      <p class="mt-2"><?php echo $this->session->userdata('reset_email') ?></p>
    </div>
    <div class="card-body">
      <form action="<?php echo base_url('auth/ubahPassword'); ?>" method="post">
        <div class="form-group">
          <div class="form-label-group">
            <input type="password" id="inputPasswordBaru" name="password" class="form-control" placeholder="Password Baru" required="required">
            <label for="inputPasswordBaru">Password Baru</label>
          </div>
          <small class="form_error"><?php echo form_error('password') ?></small>
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
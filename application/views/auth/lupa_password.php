<div class="container">
  <div class="row justify-content-center">
    <div class="login-alert">
      <div class="col-md text-center">
        <?php echo $this->session->flashdata('status'); ?>
      </div>
    </div>
  </div>

  <div class="card card-login mx-auto pb-4">
    <div class="card-header text-center">LUPA PASSWORD</div>
    <div class="card-body">
      <form action="<?php echo base_url('auth/lupa_password'); ?>" method="post">
        <div class="form-group">
          <div class="form-label-group">
            <input type="email" id="inputEmail" class="form-control" name="email" placeholder="Email" required="required" autofocus="autofocus">
            <label for="inputEmail">Masukan Email</label>
          </div>
          <small class="form_error"><?php echo form_error('email') ?></small>
        </div>
        <button type="submit" name="login" class="btn btn-primary btn-block">Kirim</button>
      </form>
      <div class="text-center mt-2">
        <a href="<?php echo base_url('auth/login_member') ?>">Kembali Login</a>
      </div>
    </div>
  </div>
</div>


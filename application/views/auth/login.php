<div class="container">
  <div class="row justify-content-center">
    <div class="login-alert">
      <div class="col-md text-center">
        <?php echo $this->session->flashdata('status'); ?>
      </div>    
    </div>  
  </div>

  <div class="card card-login mx-auto pb-4">
    <div class="card-header text-center">LOGIN MEMBER</div>
    <div class="card-body">
      <form action="<?php echo base_url('auth/login_member'); ?>" method="post">
        <div class="form-group">
          <div class="form-label-group">
            <input type="email" id="inputEmail" class="form-control" name="email" placeholder="Email" required="required" autofocus="autofocus">
            <label for="inputEmail">Email</label>
          </div>
        </div>
        <div class="form-group">
          <div class="form-label-group">
            <input type="password" id="inputPassword" name="password" class="form-control" placeholder="Password" required="required">
            <label for="inputPassword">Password</label>
          </div>
        </div>
        <button type="submit" name="login" class="btn btn-primary btn-block">Login</button>
        </form>
        <div class="text-center mt-2">
          <a href="<?php echo base_url('auth/lupa_password') ?>">Lupa Password?</a>
        </div>
    </div>
  </div>
</div>


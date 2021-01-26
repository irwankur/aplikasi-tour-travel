<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Login Admin</title>
  <!-- Custom fonts for this template-->
  <link href="<?php echo base_url('assets/sb-admin/vendor/fontawesome-free/css/all.min.css'); ?>" rel="stylesheet" type="text/css">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/style-admin.css'); ?>">
  <link href="<?php echo base_url('assets/sb-admin/css/sb-admin.css'); ?>" rel="stylesheet">
  <!-- faveicon -->
   <link rel="icon" type="image/x-icon" href="<?php  echo base_url('assets/image/favicon.ico') ?>">
</head> 

<body class="bg-dark">
  <div class="container">
    <div class="row justify-content-center mt-3">
      <div class="col-md-4 alert-login">
        <?php if($this->session->flashdata('status') == 'failed') : ?>
          <div class="alert alert-danger alert-dismissable" role="alert">
              <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
              <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
              Username / Password salah          
          </div>
        <?php endif; ?>
      </div>  
    </div>
    <div class="card card-login mx-auto pb-4">
      <div class="card-header text-center">LOGIN ADMIN</div>
      <div class="card-body">
        <form action="<?php echo base_url('login_admin/aksi_login'); ?>" method="post">
          <div class="form-group">
            <div class="form-label-group">
              <input type="text" id="inputEmail" class="form-control" name="username" placeholder="Username" required="required" autofocus="autofocus">
              <label for="inputEmail">Username</label>
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
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="<?php echo base_url('assets/sb-admin/vendor/jquery/jquery.min.js') ?>"></script>
  <script src="<?php echo base_url('assets/sb-admin/vendor/bootstrap/js/bootstrap.bundle.min.js'); ?>"></script>

  <!-- Core plugin JavaScript-->
  <script src="<?php echo base_url('assets/sb-admin/vendor/jquery-easing/jquery.easing.min.js'); ?>"></script>

</body>

</html>

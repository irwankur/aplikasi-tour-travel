    <div class="container">
      <div class="row main">
        <div class="main-login main-center">
          <p class="text-center">Ubah Data</p>
          <form class="form-horizontal" method="post" action="<?php echo base_url('auth/ubah_data'); ?>">
            
            <div class="form-group">
              <label for="nama" class="control-label">Nama Lengkap</label>
              <div class="cols-sm-10">
                <div class="input-group">
                  <span class="input-group-addon"><i class="glyphicon glyphicon-user" aria-hidden="true"></i></span>
                  <input type="text" class="form-control" name="nama" id="nama"  placeholder="Enter your Name" value="<?php echo $query['nama']; ?>">
                </div>
                <small class="form_error"><?php echo form_error('nama') ?></small>
              </div>
            </div>

            <div class="form-group">
              <label for="email" class="cols-sm-2 control-label">Email</label>
              <div class="cols-sm-10">
                <div class="input-group">
                  <span class="input-group-addon"><i class="glyphicon glyphicon-envelope" aria-hidden="true"></i></span>
                  <input type="text" class="form-control" name="email" id="email"  placeholder="Enter your Email" value="<?php echo $query['email']; ?>" readonly>
                </div>
                <small class="form_error"><?php echo form_error('email') ?></small>
              </div>
            </div>

            <div class="form-group ">
              <button type="submit" class="btn btn-primary btn-lg btn-block login-button">Ubah Data</button>
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


  
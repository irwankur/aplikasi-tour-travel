    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2">
                <div class="pesan">
                    <?php echo form_open_multipart('email'); ?>
                        <div class="form-group">
                            <label for="subjek">Subjek</label>
                            <input type="text" name="subjek" id="subjek" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="pesan">Pesan</label>
                            <textarea name="pesan" id="pesan" class="form-control" required></textarea>  
                        </div>
                        <div class="form-group">
                            <input type="submit" name="kirim" value="kirim" class="btn btn-success">
                        </div>
                    <?php echo form_close(); ?>
                </div>
            </div>
        </div>
    </div>
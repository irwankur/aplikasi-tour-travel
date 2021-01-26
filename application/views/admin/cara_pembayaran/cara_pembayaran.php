<div class="row">
    <div class="col-sm-12">
        <?php 
        echo form_open_multipart('cara_pembayaran/ubah'); 
        foreach($query as $item) :
        ?>
            <div class="form-group">
                <label for="tentang">Cara Pembayaran :</label>
                <input type="hidden" name="id" value="<?php echo $item->id; ?>">
                <textarea name="cara_pembayaran" id="cara_pembayaran" class="ckeditor form-control" required><?php echo $item->cara_pembayaran; ?></textarea>  
            </div>
            <div class="form-group">
                <input type="submit" name="submit" value="Ubah">
            </div>
        <?php 
        endforeach;
        echo form_close(); ?>
    </div>
</div>

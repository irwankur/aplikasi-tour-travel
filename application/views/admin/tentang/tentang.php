<div class="row">
	<div class="col-sm-12">
		<?php echo form_open_multipart('tentang/ubah'); 
        foreach($query as $item) :
        ?>
            <div class="form-group">
                <label for="tentang">Tentang Kami :</label>
                <input type="hidden" name="id" value="<?php echo $item->id ?>">
                <textarea name="tentang" id="tentang" class="ckeditor form-control" required><?php echo $item->tentang_kami; ?></textarea>  
            </div>
            <div class="form-group">
                <input type="submit" name="submit" value="Ubah">
            </div>
        <?php 
        endforeach;
    	echo form_close(); ?>
	</div>
</div>

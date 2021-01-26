<div class="row">
	<div class="col-sm-12">
		<?php echo form_open_multipart('promo/ubah'); 
        foreach($query as $item) :
        ?>
            <div class="form-group">
                <label for="promo">Promo :</label>
                <input type="hidden" name="id" value="<?php echo $item->id ?>">
                <textarea name="promo" id="promo" class="ckeditor form-control" required><?php echo $item->promo; ?></textarea>  
            </div>
            <div class="form-group">
                <input type="submit" name="submit" value="Ubah">
            </div>
        <?php 
        endforeach;
    	echo form_close(); ?>
	</div>
</div>

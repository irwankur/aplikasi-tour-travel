<div class="card mb-3">
    <div class="card-header">
        Slider
    </div>
    <div class="card-body">
        <div class="table-responsive data_perjalanan">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Gambar</th>
                        <th>Judul</th>
                        <th>Teks</th>
                        <th>Ubah Gambar</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    $no = 1;
                    foreach($query as $item) : ?>
                    <tr>
                        <?php echo form_open_multipart('slider/ubah'); ?>
                        <td><?php echo $no++."."; ?></td>
                        <td><img src="<?php echo base_url('gambar/'.$item->gambar); ?>" class="img-data"></td>
                        <td style="width: 150px;"><input type="text" name="judul" value="<?php echo $item->judul; ?>" class="form-control"></td>
                        <td style="width: 500px;"><input type="text" name="text" value="<?php echo $item->text; ?>" class="form-control"></td>
                        <td>
                            <input type="hidden" name="gambarLama" value="<?php echo $item->gambar; ?>">
                            <input type="hidden" name="id" value="<?php echo $item->id; ?>">
                            <input type="file" name="gambar">
                            <input type="submit" name="tambah" value="Ubah" class="btn btn-sm btn-success">
                            <?php echo form_close(); ?>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>



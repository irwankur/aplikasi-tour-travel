<div class="container">
    <div class="testimoni">
      <div class="col-lg">
          <p class="text-testimoni">Testimoni</p>
          <?php foreach($query as $row) : ?>
          <div class="card card-testi">
            <div class="card-body">
              <blockquote class="blockquote mb-0">
                <p class="komentar"><?php echo $row->komentar; ?></p>
                <footer class="blockquote-footer penulis"><?php echo date('d-m-Y', $row->tanggal); ?> - <cite title="Source Title"><?php echo $row->nama; ?></cite></footer> 
              </blockquote>
            </div>
          </div>
          <?php endforeach; ?>
      </div>
    </div>
</div> 
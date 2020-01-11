 <!-- Marketing messaging and featurettes
      ================================================== -->
      <!-- Wrap the rest of the page in another container to center all the content. -->
<div class="clearfix"></div>
  <div class="jarak">
    <div class="container marketing jarak">

    <div class="row judul">
      <div class="col-md-12 text-center">
      <h1><?php echo $title ?></h1>
      </div>
    </div>

        <!-- Three columns of text below the carousel -->
    <div class="row">
      <?php foreach($layanan as $layanan) { ?>
      <div class="col-lg-4">
        <img class="rounded-circle" src="<?php echo base_url('assets/upload/images/thumbs/'.$layanan->gambar_layanan) ?>" alt="<?php echo $layanan->judul_layanan ?>" width="140" height="140">
        <h2><?php echo $layanan->judul_layanan ?></h2>
        <p><?php echo strip_tags(character_limiter($layanan->isi_layanan,200)) ?></p>
        <p><a class="btn btn-primary" href="<?php echo base_url('layanan/read/'.$layanan->slug_layanan) ?>" role="button"><i class="fas fa-eye" aria-hidden="true"></i> Detail &raquo;</a></p>
      </div><!-- /.col-lg-4 -->
      <?php } ?>
    </div><!-- /.row -->

      <div class="row">
          <?php if(isset($paginasi) && $total > $limit) { ?>
          <div class="paginasi col-md-12 text-center">
            <div class="clearfix"></div>
          <?php echo $paginasi; } ?>
          </div>    
      </div>
      <br>
      <br>
  </div>
</div>

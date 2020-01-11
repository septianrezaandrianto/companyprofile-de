<!-- Slider -->
<div id="myCarousel" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
          <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
          <li data-target="#myCarousel" data-slide-to="1"></li>
          <li data-target="#myCarousel" data-slide-to="2"></li>
  </ol>
    <div class="carousel-inner">
      <?php $i=1; foreach ($slider as $slider) { ?>
        <div class="carousel-item <?php if($i==1) {echo 'active'; } ?>">
          <img class="first-slide" src="<?php echo base_url('assets/upload/images/asli/'.$slider->gambar_galeri) ?>" alt="<?php echo $slider->judul_galeri ?>">
            <div class="container">
              <div class="carousel-caption col-sm-6 text-left">
                <h1><?php echo $slider->judul_galeri ?></h1>
                <p><?php echo strip_tags($slider->isi_galeri) ?></p>
                <p><a class="btn btn-sm btn-primary" href="<?php echo $slider->website ?>" role="button">Sign up today</a></p>
              </div>
            </div>
          </div>
          <?php $i++; } ?>
        </div>
          <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>
    </div>

  <!-- Layanan -->
  <div class="container marketing">
  <!-- Three columns of text below the carousel -->
    <div class="row text-center">
      <?php foreach($layanan as $layanan) { ?>
        <div class="col-sm-4">
          <img class="rounded-circle" src="<?php echo base_url('assets/upload/images/thumbs/'.$layanan->gambar_layanan) ?>" alt="<?php echo $layanan->judul_layanan ?>" width="140" height="140">
          <h2><?php echo $layanan->judul_layanan ?></h2>
          <p><?php echo character_limiter($layanan->isi_layanan,50) ?></p>
          <p><a class="btn btn-primary" href="<?php echo base_url('layanan/read/'.$layanan->slug_layanan) ?>" role="button"><i class="fas fa-eye" aria-hidden="true"></i> Detail &raquo;</a></p>
        </div><!-- /.col-sm-4 -->
      <?php } ?>
    </div><!-- /.row -->
  </div>

    <!-- Artikel -->
    <div class="album py-5 bg-light">
      <div class="container">
        <div class="row judul">
          <div class="col-sm-12 text-center">
            <h1>Selamat Datang di Website Kami</h1>
          </div>
        </div>
          <div class="row">
            <?php foreach($artikel as $artikel) { ?>
            <div class="col-sm-4">
              <div class="card mb-4 box-shadow">
                <img class="card-img-top" src="<?php echo base_url('assets/upload/images/thumbs/'.$artikel->gambar_artikel) ?>" alt="<?php echo $artikel->judul_artikel ?>">
                  <div class="card-body">
                  	<h2><a href="<?php echo base_url('artikel/read/'.$artikel->slug_artikel) ?>"><?php echo $artikel->judul_artikel ?></a></h2>
                    <p class="card-text"><?php echo character_limiter(strip_tags($artikel->isi_artikel),200) ?></p>
                    <p class="text-right"><a href="<?php echo base_url('artikel/read/'.$artikel->slug_artikel) ?>" class="btn btn-success btn-sm"><i class="fas fa-eye" aria-hidden="true"></i> Detail &raquo;</a></p>
                    <!-- <div class="d-flex justify-content-between align-items-center">
                    </div> -->
                  </div>
              </div>
          </div>
            <?php } ?>
        <div class="clearfix"></div>
    </div>
    
</div>
</div>

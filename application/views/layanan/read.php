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

          <div class="col-lg-4">
            <img class="img img-responsive img-thumbnail" src="<?php echo base_url('assets/upload/images/asli/'.$layanan->gambar_layanan) ?>" alt="<?php echo $title ?>">
          </div><!-- /.col-lg-4 -->

          <div class="col-lg-8">
            <p><strong>Harga : Rp. <?php echo number_format($layanan->harga_layanan,'0',',','.') ?></strong></p>
             <?php echo $layanan->isi_layanan ?>
          </div><!-- /.col-lg-8 -->
          <div class="clearfix"></div>
        </div><!-- /.row -->
        <br>
        <br>
    </div>
  </div>

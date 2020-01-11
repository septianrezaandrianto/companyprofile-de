<div class="album py-5 bg-light">
  <div class="container">

    <div class="row judul">
      <div class="col-sm-12 text-center">
           <h1><?php echo $title ?></h1>
      </div>
    </div>

      <div class="row artikel">
        <div class="col-sm-6">      
      <!-- Map dari Google map -->
          <?php echo $konfigurasi->maps ?>
        </div>

        <div class="col-sm-6">

          <h3><?php echo $konfigurasi->namaweb ?></h3>
            <?php echo nl2br($konfigurasi->alamat) ?>
            <br><i class="fa fa-phone" aria-hidden="true"></i> <?php echo $konfigurasi->no_telepon ?>
            <br><i class="fa fa-envelope" aria-hidden="true"></i> <?php echo $konfigurasi->email ?>
            <br><i class="fa fa-check-square" aria-hidden="true"></i><a href="https://www.facebook.com/kampunginggrisparekediri_-105940247533321/" title="facebook"> <?php echo $konfigurasi->facebook ?></a>
            <br><i class="fa fa-check-square" aria-hidden="true"></i><a href="https://instagram/kampunginggrispare.kediri_" title="instagram"> <?php echo $konfigurasi->instagram ?></a>
          <hr>

          <p>
            Anda dapat menghubungi kami melalui formulir dibawah ini :
          </p>
          <form action="" method="post" accept-charset="utf-8" class="alert alert-success">
            <div class="row">
              <div class="col-sm-6">
                <div class="form-gorup">
                  <label>Nama Anda</label>
                  <input type="text" name="nama" placeholder="Nama" class="form-control" required>
                </div>
              </div> 

              <div class="col-sm-6">
                <div class="form-gorup">
                  <label>Email Anda</label>
                  <input type="email" name="email" placeholder="Email Anda" class="form-control" required>
                </div>
              </div>      

              <div class="col-sm-12">
                <div class="form-gorup">
                  <label>Pesan Anda</label>
                  <textarea name="pesan" class="form-control" placeholder="Pesan Anda"  required></textarea>
                </div>
              </div>

              &nbsp;
              <div class="col-sm-12">
                <div class="form-gorup">
                  <input type="submit" name="submit" class="btn btn-success" value="Kirim Pesan">
                </div>
              </div>
            </div>
          </form>

        </div>
        <div class="clearfix"></div>
      </div>
    <!-- end row -->
  </div>
</div>
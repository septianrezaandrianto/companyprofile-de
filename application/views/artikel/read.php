  <div class="album py-5 bg-light">
        <div class="container">

	<div class="row judul">
		<div class="col-md-12 text-center">
     	   <h1><?php echo $title ?></h1>
    	</div>
	</div>

          <div class="row artikel">
            <div class="col-md-8">
            	<p><img src="<?php echo base_url('assets/upload/images/asli/'.$artikel->gambar_artikel) ?>" alt="<?php $artikel->judul_artikel ?>" class="img img-thumbnail img-responsive"></p>
            	
                <?php echo $artikel->isi_artikel ?>
            </div>

            <div class="col-md-4">

            <aside>
            	<h3>Lainnya:</h3>
            	<ul>
                    <?php foreach($listing as $listing) { ?>
            		<li><a href="<?php echo base_url('artikel/read/'.$listing->slug_artikel) ?>"><?php echo $listing->judul_artikel ?></li>
                    <?php } ?>
            	</ul>
            </aside>
            </div>
            <div class="clearfix"></div>
          </div>

        </div>
      </div>
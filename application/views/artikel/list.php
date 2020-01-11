<div class="album py-5 bg-light">
	<div class="container">

		<div class="row judul">
			<div class="col-md-12 text-center">
     	   	<h1><?php echo $title ?></h1>
    		</div>
		</div>

    	<div class="row">

          <?php foreach($artikel as $artikel) { ?> 
          <div class="col-md-4">
            <div class="card mb-4 box-shadow">
              <img class="card-img-top" src="<?php echo base_url('assets/upload/images/thumbs/'.$artikel->gambar_artikel) ?>" alt="<?php echo $artikel->judul_artikel ?>">
                <div class="card-body">
              	 <h2><a href="<?php echo base_url('artikel/read/'.$artikel->slug_artikel) ?>"><?php echo $artikel->judul_artikel ?></a></h2>
                  <p class="card-text"><?php echo strip_tags(character_limiter($artikel->isi_artikel,200)) ?></p>
                  <p class="text-right"><a href="<?php echo base_url('artikel/read/'.$artikel->slug_artikel) ?>" class="btn btn-success btn-sm"><i class="fas fa-eye" aria-hidden="true"></i> Detail &raquo;</a></p>
                    <!-- <div class="d-flex justify-content-between align-items-center">
                    </div> -->
                </div>
            </div>
          </div>
          <?php } ?>
          <div class="clearfix"></div>

      </div>

      <div class="row">
          <?php if(isset($paginasi) && $total > $limit) { ?>
          <div class="paginasi col-md-12 text-center">
            <div class="clearfix"></div>
          <?php echo $paginasi; } ?>
          </div>    
      </div>

  </div>
</div>
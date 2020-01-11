<?php
// Site dari konfigurasi
$site_info = $this->konfigurasi_model->listing();

// Menu artikel
$menu_artikel = $this->konfigurasi_model->menu_artikel();
// Menu layanan
$menu_layanan = $this->konfigurasi_model->menu_layanan();
// Menu profile
$menu_profile = $this->konfigurasi_model->menu_profile();
?>
<nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark" id="top">
  <div class="container">
      <a class="navbar-brand" href="<?php echo base_url() ?>"><?php echo $site_info->namaweb ?></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarCollapse">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
              <a class="nav-link" href="<?php echo base_url() ?>">Home <span class="sr-only">(current)</span></a>
            </li>

          <!-- Menu artikel  -->
          <li class="nav-item dropdown">
	           <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
	          Artikel</a>
	           <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
              
              <?php foreach($menu_artikel as $menu_artikel) { ?>
	             <a class="dropdown-item" href="<?php echo base_url('artikel/kategori/'.$menu_artikel->slug_kategori) ?>"><?php echo $menu_artikel->nama_kategori ?></a>
              <?php } ?>
              <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="<?php echo base_url('artikel') ?>">Index Artikel</a>
	           </div>
	      	</li>

          <!-- Menu layanan -->
          <li class="nav-item dropdown">
             <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Service</a>
             <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
              <?php foreach($menu_layanan as $menu_layanan) { ?>
               <a class="dropdown-item" href="<?php echo base_url('layanan/read/'.$menu_layanan->slug_layanan) ?>"><?php echo $menu_layanan->judul_layanan ?></a>
              <?php } ?>
              <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="<?php echo base_url('layanan') ?>">Index Service</a>
             </div>
          </li>

          <!-- Menu profile -->
          <li class="nav-item dropdown">
             <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Profile</a>
             <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
              <?php foreach($menu_profile as $menu_profile) { ?>
               <a class="dropdown-item" href="<?php echo base_url('artikel/read/'.$menu_profile->slug_artikel) ?>"><?php echo $menu_profile->judul_artikel ?></a>
              <?php } ?>
             </div>
          </li>

          <li class="nav-item">
              <a class="nav-link" href="<?php echo base_url('kontak') ?>">Kontak</a>
          </li>

          </ul>

          <!-- <form class="form-inline mt-2 mt-md-0">
            <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-warning my-2 my-sm-0" type="submit">Search</button>
          </form> -->

        </div>
  </div>
</nav>
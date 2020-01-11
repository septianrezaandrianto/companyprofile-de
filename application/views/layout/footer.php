<?php 
// Site dari konfigurasi
$site_info = $this->konfigurasi_model->listing();
?>

<div class="clearfix"></div>
      <!-- FOOTER -->

      <footer class="footer">
      	<div class="row">
      <div class="container">
        <p class="float-right"><a href="#top">Back to top</a></p>
        <p>&copy; <?php echo date('Y') ?> Built by <strong>SRA</strong> &middot; 
          <a href="<?php echo base_url('artikel') ?>">Artikel</a> |
          <a href="<?php echo base_url('layanan') ?>">Layanan</a> |
          <a href="#">Profile Kami</a> | 
          <a href="<?php echo base_url('kontak') ?>">Kontak</a>
        </p>
    </div>
    </div>
      </footer>
    </main>

</body>

<!-- Load Javascript jQuery-->
<script src="<?php echo base_url() ?>assets/template/jquery-ui/external/jquery/jquery.js" type="text/javascript"></script>

<!-- Load Javascript Bootstrap -->
<script src="<?php echo base_url() ?>assets/template/js/bootstrap.min.js" type="text/javascript"></script>

<!-- proper js -->
<script src="<?php echo base_url() ?>assets/template/bootstrap/assets/js/vendor/popper.min.js" type="text/javascript"></script>

<!-- holder js -->
<script src="<?php echo base_url() ?>assets/template/bootstrap/assets/js/vendor/holder.min.js" type="text/javascript"></script>
</html>

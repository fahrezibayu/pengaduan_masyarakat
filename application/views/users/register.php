<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <title>Pengaduan Masyarakat</title>

    <!-- Bootstrap core CSS -->
    <link href="<?= base_url() ?>assets/webprofile/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">


    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/webprofile/css/fontawesome.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/webprofile/css/templatemo-digimedia-v3.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/webprofile/css/animated.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/webprofile/css/owl.css">
<!--

TemplateMo 568 DigiMedia

https://templatemo.com/tm-568-digimedia

-->
  </head>

<body>

  <!-- ***** Preloader Start ***** -->
  <div id="js-preloader" class="js-preloader">
    <div class="preloader-inner">
      <span class="dot"></span>
      <div class="dots">
        <span></span>
        <span></span>
        <span></span>
      </div>
    </div>
  </div>
  <!-- ***** Preloader End ***** -->


  <!-- ***** Header Area Start ***** -->
  <header class="header-area header-sticky wow slideInDown" data-wow-duration="0.75s" data-wow-delay="0s">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <nav class="main-nav">
            <!-- ***** Logo Start ***** -->
            <a href="<?= base_url('index.php/users') ?>" class="logo">
              <img src="<?= base_url() ?>assets/webprofile/images/logo-v3.png" alt="">
            </a>
            <!-- ***** Logo End ***** -->
            <!-- ***** Menu Start ***** -->
            <ul class="nav">
              <li class="scroll-to-section"><a href="#top" class="active">Home</a></li>
              <li class="scroll-to-section"><a href="#about">Tentang</a></li>
              <li class="scroll-to-section"><a href="#contact">Kontak</a></li>
              <li class="scroll-to-section"><div class="border-first-button"><a href="#contact">Login</a></div></li> 
            </ul>        
            <a class='menu-trigger'>
                <span>Menu</span>
            </a>
            <!-- ***** Menu End ***** -->
          </nav>
        </div>
      </div>
    </div>
  </header>
  <!-- ***** Header Area End ***** -->

  <div id="contact" class="contact-us section">
    <div class="container">
      <div class="row">
        <div class="col-lg-6 offset-lg-3">
          <div class="section-heading wow fadeIn" data-wow-duration="1s" data-wow-delay="0.5s">
            <h4>Form Registrasi</h4>
            <div class="line-dec"></div>
          </div>
        </div>
		<div class="col-lg-4"></div>
        <div class="col-lg-4 wow fadeInUp" data-wow-duration="0.5s" data-wow-delay="0.25s">
          <form id="contact" action="<?= base_url('index.php/users/registrasi') ?>" method="post">
            <div class="row">
              <div class="col-lg-12">
                <div class="fill-form">
                  <div class="row">
            		<h4>Silahkan isi dengan benar</h4>
                    <div class="col-lg-12">
					  <fieldset>
						<input type="text" name="nama" id="nama" placeholder="Nama Lengkap" autocomplete="on" required>
					  </fieldset>
					  <fieldset>
						<input type="text" name="username" id="username" placeholder="Username" autocomplete="on" required>
					  </fieldset>
                      <fieldset>
                        <input type="password" name="password" id="password" placeholder="Password" autocomplete="on" required>
                      </fieldset>
					  <fieldset>
							<input type="text" name="pekerjaan" id="pekerjaan" placeholder="Pekerjaan" autocomplete="on">
						</fieldset>
						<fieldset>
							<input type="text" name="alamat" id="alamat" placeholder="Alamat" autocomplete="on">
						</fieldset>
						<fieldset>
							<input type="number" name="nohp" id="nohp" placeholder="No Hp" autocomplete="on">
						</fieldset>
                    </div>
                    <div class="col-lg-12">
                      <fieldset>
                        <button type="submit" id="form-submit" class="main-button ">Registrasi</button>
                      </fieldset>
                    </div>
					</form>
				</div>
				<br> <a href="<?= base_url('index.php/users/login') ?>" title="Register"><p>BelSudahum memiliki akun?</p></a></p>
                </div>
              </div>
            </div>
        </div>
		<div class="col-lg-4"></div>
      </div>
    </div>
  </div>

  <footer>
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <p>Copyright © 2022 DigiMedia Co., Ltd. All Rights Reserved. 
          <br>Design: <a href="https://templatemo.com" target="_parent" title="free css templates">TemplateMo</a></p>
        </div>
      </div>
    </div>
  </footer>


  <!-- Scripts -->
  <script src="<?= base_url() ?>assets/webprofile/vendor/jquery/jquery.min.js"></script>
  <script src="<?= base_url() ?>assets/webprofile/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="<?= base_url() ?>assets/webprofile/js/owl-carousel.js"></script>
  <script src="<?= base_url() ?>assets/webprofile/js/animation.js"></script>
  <script src="<?= base_url() ?>assets/webprofile/js/imagesloaded.js"></script>
  <script src="<?= base_url() ?>assets/webprofile/js/custom.js"></script>

</body>
</html>

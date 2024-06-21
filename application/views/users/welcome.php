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
              <li class="scroll-to-section"><div class="border-first-button"><a href="<?= base_url('index.php/users/login') ?>">Login</a></div></li> 
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

  <div class="main-banner wow fadeIn" id="top" data-wow-duration="1s" data-wow-delay="0.5s">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="row">
            <div class="col-lg-6 align-self-center">
              <div class="left-content show-up header-text wow fadeInLeft" data-wow-duration="1s" data-wow-delay="1s">
                <div class="row">
                  <div class="col-lg-12">
                    <h6>Desa Pilangsari Kabupaten Demak</h6>
                    <h2>Sistem Pengaduan Masyarakat</h2>
                    <p>Website desa dibangun dengan tujuan sebagai media pelayanan publik resmi desa, yang dibangun dan dikelola oleh tim desa setempat. Dengan memanfaatkan website penyelenggaraan pelayanan publik dapat dilakukan secara cepat dan mudah</p>
                  </div>
                  <div class="col-lg-12">
                    <div class="border-first-button scroll-to-section">
                      <a href="#contact">Login</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-6">
              <div class="right-image wow fadeInRight" data-wow-duration="1s" data-wow-delay="0.5s">
                <img src="<?= base_url() ?>assets/webprofile/images/services-image-04.jpg" alt="">
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div id="about" class="about section">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="row">
            <div class="col-lg-6">
              <div class="about-left-image  wow fadeInLeft" data-wow-duration="1s" data-wow-delay="0.5s">
                <img src="<?= base_url() ?>assets/webprofile/images/about-dec-v3.png" alt="">
              </div>
            </div>
            <div class="col-lg-6 align-self-center  wow fadeInRight" data-wow-duration="1s" data-wow-delay="0.5s">
              <div class="about-right-content">
                <div class="section-heading">
                  <h6>Tentang Kami</h6>
                  <h4>Pengaduan <em>Masyarakat</em></h4>
                  <div class="line-dec"></div>
                </div>
                <p>Website desa dibangun dengan tujuan sebagai media pelayanan publik resmi desa, yang dibangun dan dikelola oleh tim desa setempat. Dengan memanfaatkan website penyelenggaraan pelayanan publik dapat dilakukan secara cepat dan mudah</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div id="contact" class="contact-us section">
    <div class="container">
      <div class="row">
        <div class="col-lg-6 offset-lg-3">
          <div class="section-heading wow fadeIn" data-wow-duration="1s" data-wow-delay="0.5s">
            <h6>Kontak Kami</h6>
            <h4>Hubungi Kami <em>Sekarang</em></h4>
            <div class="line-dec"></div>
          </div>
        </div>
        <div class="col-lg-12 wow fadeInUp" data-wow-duration="0.5s" data-wow-delay="0.25s">
          <form id="contact" action="" method="post">
            <div class="row">
              <div class="col-lg-12">
                <div class="contact-dec">
                  <img src="<?= base_url() ?>assets/webprofile/images/contact-dec-v3.png" alt="">
                </div>
              </div>
              <div class="col-lg-5">
                <div id="map">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3960.422663188146!2d110.54976587388815!3d-6.959365768134966!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e70ed66725a0ecd%3A0xcf6feee0d3e52426!2sBalai%20Desa%20Pilangsari!5e0!3m2!1sid!2sid!4v1718943015670!5m2!1sid!2sid" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                  <!-- <iframe src="<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3960.422663188146!2d110.54976587388815!3d-6.959365768134966!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e70ed66725a0ecd%3A0xcf6feee0d3e52426!2sBalai%20Desa%20Pilangsari!5e0!3m2!1sid!2sid!4v1718943015670!5m2!1sid!2sid" width="100%" height="636px" frameborder="0" style="border:0" allowfullscreen></iframe> -->
                </div>
              </div>
              <div class="col-lg-7">
                <div class="fill-form">
                  <div class="row">
                    <div class="col-lg-12">
                      <div class="info-post">
                        <div class="icon">
                          <img src="<?= base_url() ?>assets/webprofile/images/phone-icon.png" alt="">
                          <a href="#">0895363646690</a>
                        </div>
                      </div>
                    </div>
                    <div class="col-lg-12">
                      <div class="info-post">
                        <div class="icon">
                          <img src="<?= base_url() ?>assets/webprofile/images/email-icon.png" alt="">
                          <a href="#">pilangsarisayungdemak@gmail.com</a>
                        </div>
                      </div>
                    </div>
                    <div class="col-lg-12">
                      <div class="info-post">
                        <div class="icon">
                          <img src="<?= base_url() ?>assets/webprofile/images/location-icon.png" alt="">
                          <a href="#">Jl. Kauman-Tangkis KM 3,2 Kecamatan Sayung Kabupaten Demak.</a>
                        </div>
                      </div>
                    </div>
                    
                  </div>
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

  <footer>
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <p>Copyright © 2024 Desa Pilangsari - Pengaduan Masyarakat All Rights Reserved. 
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

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

		<style>
			/* Styling dasar untuk tabel */
			table {
				width: 100%;
				border-collapse: collapse; /* Menggabungkan batas antar sel */
				border-spacing: 0; /* Jarak antar sel */
			}

			/* Styling untuk header tabel */
			th {
				background-color: #4da6e7; /* Warna latar header */
				text-align: left;
				padding: 8px;
				color: #FFF;
				border-bottom: 1px solid #ddd; /* Garis bawah header */
			}

			/* Styling untuk sel dalam tabel */
			td {
				padding: 8px;
				border-bottom: 1px solid #ddd; /* Garis bawah sel */
			}

			/* Alternatif warna baris (zebra striping) */
			tr:nth-child(even) {
				background-color: #f9f9f9; /* Warna latar baris genap */
			}

			/* Animasi pada hover */
			tr:hover {
				background-color: #f1f1f1; /* Warna latar saat hover */
				transition: background-color 0.3s ease; /* Animasi perubahan warna */
			}

			@media screen and (max-width: 600px) {
				table {
					overflow-x: auto;
					display: block;
				}
			}
		</style>
    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/webprofile/css/fontawesome.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/webprofile/css/templatemo-digimedia-v3.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/webprofile/css/animated.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/webprofile/css/owl.css">
	<link rel="stylesheet" href="<?= base_url() ?>assets/webprofile/leatfet/leaflet.css">
	<script src="<?= base_url() ?>assets/webprofile/leatfet/leaflet.js"></script>
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
              <li class="scroll-to-section"><a href="#pengaduanmasyarakat">Pengaduan Masyarakat</a></li>
              <li class="scroll-to-section"><a href="#about">Tentang</a></li>
              <li class="scroll-to-section"><a href="#contact">Kontak</a></li>
              <li class="scroll-to-section"><div class="border-first-button"><a href="<?= site_url('index.php/users/logout') ?>">Logout</a></div></li> 
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

  <div id="pengaduanmasyarakat" class="contact-us section">
    <div class="container">
      <div class="row">
        <div class="col-lg-6 offset-lg-3">
          <div class="section-heading wow fadeIn" data-wow-duration="1s" data-wow-delay="0.5s">
            <h4>Form Pengaduan Masryarakat</h4>
            <div class="line-dec"></div>
          </div>
        </div>
        <div class="col-lg-12 wow fadeInUp" data-wow-duration="0.5s" data-wow-delay="0.25s">
          <form id="contact" action="<?= base_url('index.php/users/addpengaduan') ?>" method="post">
            <div class="row">
              <div class="col-lg-12">
                <div class="fill-form">
                  <div class="row">
            		<h4>Silahkan isi dengan benar</h4>
                    <div class="col-lg-12 mt-5">
						<div class="row">
							<div class="col-lg-6">
								<b> Jenis Pengaduan </b>
								<fieldset>
								  <select name="jenis_pengaduan" class="form-control" id="jenis_pengaduan" required>
									<option value="">Silahkan pilih jenis pengaduan</option>
									<?php 
									if ($jenispengaduan->num_rows() > 0) {
											foreach ($jenispengaduan->result() as $data) { ?>
													<option value="<?= htmlspecialchars($data->id_jenis_pengaduan) ?>"><?= htmlspecialchars($data->nama_jenis_pengaduan) ?></option>
											<?php }
									} else {
											echo '<option value="">No data available</option>';
									} ?>
								  </select>
									<small class="text-danger" style="color:red;font-size:13px;"><?= form_error('username'); ?></small>
								</fieldset>
								<br>
								<b> Media Pengaduan </b>
								<fieldset>
								  <select name="media_pengaduan" class="form-control" id="media_pengaduan" required>
									  <option value="">Silahkan pilih media pengaduan</option>
										<?php 
										if ($mediapelaporan->num_rows() > 0) {
												foreach ($mediapelaporan->result() as $data) { ?>
														<option value="<?= htmlspecialchars($data->id_media_pelaporan) ?>"><?= htmlspecialchars($data->nama_media_pelaporan) ?></option>
												<?php }
										} else {
												echo '<option value="">No data available</option>';
										} ?>
								  </select>
									<small class="text-danger" style="color:red;font-size:13px;"><?= form_error('username'); ?></small>
								</fieldset>
								<br>
								<fieldset>
								<b>Isi Pengaduan</b>
								<input type="text" name="isi_pengaduan" id="isi_pengaduan" placeholder="Isi Pengaduan" autocomplete="on" required>
								<small class="text-danger" style="color:red;font-size:13px;"><?= form_error('username'); ?></small>
							</fieldset>
							</div>
							<div class="col-lg-6">
								<b>Lokasi</b>
								<input type="hidden" class="form-control" id="lat" name="lat">
                        		<input type="hidden" class="form-control" id="long" name="long">
                        		<input type="hidden" class="form-control" id="id_user" name="id_user" value="<?= $this->fungsi->user_login()->id_user ?>">
								<div id="peta" style="height:300px; width: 100%"></div>
							</div>
						</div>
                    </div>
                    <div class="col-lg-12">
                      <fieldset>
                        <button type="submit" id="form-submit" class="main-button ">Kirim Pengaduan</button>
                      </fieldset>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
			<div class="row">
        <div class="col-lg-6 offset-lg-3">
          <div class="section-heading wow fadeIn" data-wow-duration="1s" data-wow-delay="0.5s">
            <h4>Data Pengaduan</h4>
          	<div class="line-dec"></div>
          </div>
        </div>
			</div>
			<table>
					<thead>
							<tr>
									<th>#</th>
									<th>Media Pengaduan</th>
									<th>Jenis Pengaduan</th>
									<th>Isi Pengaduan</th>
									<th>Bidang</th>
									<th>Tindak Lanjut</th>
									<th>Tindak Lanjut By</th>
									<th>Status Pengaduan</th>
							</tr>
					</thead>
					<tbody>
						<?php $no = 1;
							foreach ($pengaduan->result() as $key => $data) {
							$tindaklanjutby = $this->db->get_where('user', ['id_user' => $data->tindaklanjut_by])->row_array();
							$bidang = $this->db->get_where('tbl_bidang', ['id_bidang' => $data->id_bidang])->row_array();
						?>
								<tr>
										<td style="width: 5%;"><?= $no++ ?>.</td>
										<td><?= $data->nama_media_pelaporan ?></td>
										<td><?= $data->nama_jenis_pengaduan ?></td>
										<td><?= $data->isi_pengaduan ?></td>
										<td><?= $bidang['nama_bidang'] ?></td>
										<td><?= $data->tindaklanjut ?></td>
										<td><?= $tindaklanjutby['nama_pegawai'] ?></td>
										<td>
											<?php
												echo ($data->tindaklanjut != '') ? '<p style="color:green;font-size:14px;"><b>Sudah ditindak lanjut</b></p>' : '<p style="color:red;font-size:14px;"><b>Sedang diproses</b></p>';
											?>

										</td>
								</tr>
						<?php
						} ?>
					</tbody>

			</table>

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

  <script type="text/javascript">
	function maps(lat, long) {
		var mymap = L.map('peta').setView([lat, long], 13);
		L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoiYWRpZ3VuYXdhbnhkIiwiYSI6ImNrcWp2Yjg2cDA0ZjAydnJ1YjN0aDNnbm4ifQ.htvHCgSgN0UuV8hhZBfBfQ', {
			maxZoom: 20,
			attribution: '',
			id: 'mapbox/streets-v11',
			tileSize: 512,
			zoomOffset: -1,
			accessToken: 'pk.eyJ1IjoiYWRpZ3VuYXdhbnhkIiwiYSI6ImNrcWp2Yjg2cDA0ZjAydnJ1YjN0aDNnbm4ifQ.htvHCgSgN0UuV8hhZBfBfQ'
		}).addTo(mymap);
		L.marker([lat, long]).addTo(mymap);
		L.circle([lat, long], 550, {
			color: 'red',
			fillColor: '#f03',
			fillOpacity: 0.5
		}).addTo(mymap);
	}
	if (navigator.geolocation) { //jika navigator tersedia
            navigator.geolocation.getCurrentPosition(showPosition, showError);
        } else { //jika navigator tidak tersedia
            console.log("Geolocation is not supported by this device");
        }

        //jika location allowed
        function showPosition(position) {

            var latlong = position.coords.latitude + "," + position.coords.longitude;

            // alert(latlong);
            $("#lat").val(position.coords.latitude);
            $("#long").val(position.coords.longitude);
			maps(position.coords.latitude, position.coords.longitude);


        }

        //jika location disabled atau not allowed
        function showError(error) {

            switch (error.code) {
                case error.PERMISSION_DENIED:
                    console.log("User denied the request for Geolocation.");
                    break;
                case error.POSITION_UNAVAILABLE:
                    console.log("Location information is unavailable.");
                    break;
                case error.TIMEOUT:
                    console.log("The request to get user location timed out.");
                    break;
                case error.UNKNOWN_ERROR:
                    console.log("An unknown error occurred.");
                    break;
            }
        }
  </script>
</body>
</html>

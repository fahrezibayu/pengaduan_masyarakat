<!DOCTYPE html>
<html lang="en">
<!--code.candilkuya.com-->

<head>
    <meta charset="UTF-8">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500&display=swap" rel="stylesheet">
    <link href="style.css" rel="stylesheet">
</head>

<style>
    #clock {
        position: center;
        font-size: 50px;
        font-family: 'Montserrat', sans-serif;
        background: -webkit-linear-gradient(#2b32b2, #1488cc);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        font-weight: 50;
    }
</style>
<section class="content-header">
    <h1>Presensi
        <small>Absensi Karyawan</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-check-circle"></i> </a></li>
        <li><a href="#">Absensi</a></li> </a></li>
        <li><a href="#">Absen Masuk</a></li>

    </ol>
</section>



<center>
    <style>
        .container {
            display: grid;
            justify-content: center;
            align-items: center;
        }

        .card {
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
            transition: 0.3s;
            position: relative;
            width: 100%;
            height: auto;
            padding: 40px 0;
            background-color: #FFFFFF;
            border-radius: 5%;
        }

        .card img {
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.5);
        }
    </style>
    <div class="card" style="width: 500px;">

        <body>
            <center>
                <p id="clock"></p>
                <script>
                    setInterval(customClock, 500);

                    function customClock() {
                        var time = new Date();
                        var hrs = time.getHours();
                        var min = time.getMinutes();
                        var sec = time.getSeconds();

                        document.getElementById('clock').innerHTML = hrs + ":" + min + ":" + sec;

                    }
                </script>
            </center>
        </body>
        <div class="card-body table-responsive">
            <style>
                .icon {
                    position: absolute;
                    right: 15px;
                    top: 10px;
                    cursor: pointer;
                }
            </style>
            <div class="icon">
                <i class="fa fa-times back" style="color: #899899;"></i>
            </div>
            <script>
                // $(document).ready(function() {
                //     $.ajax({
                //         url: "<?= base_url() ?>absen/load_absen",
                //         type: "get",
                //         dataType: "html",
                //         success: function(data) {
                //             $(".card").html(data);
                //         }
                //     });
                // });
            </script>
</center>

</html>
<section class="content">
    <div class="box">
        <div class="box-body">
            <!-- <form method="POST" action="<?= base_url() ?>absen/save_absen_masuk"> -->
            <div class="row">
                <center>
                    <div class="col-md-12 take_foto">
                        <div class="callout callout-success notif_sukses">
                            <h4> <span id="text_sukses"></span> </h4>
                        </div>
                        <div class="callout callout-danger notif_gagal">
                            <h4> <span id="text_gagal"></span> </h4>
                        </div>
                        <?php
                        $pegawai = $this->db->get_where('data_karyawan', ['id_user' => $this->session->userdata('id_user')])->row_array();
                        ?>
                        <input type="hidden" class="form-control" id="lat" name="lat">
                        <input type="hidden" class="form-control" id="long" name="long">
                        <input type="hidden" class="form-control" id="id_pegawai" name="id_pegawai" value="<?= $pegawai['id_pegawai'] ?>">
                        <div id="my_camera"></div>
                        <div id="results_absen">Your captured image will appear here...</div>
                        <br />
                        <!-- <input type=button value="Take Snapshot" onClick="take_snapshot()"> -->
                        <!-- <input type="hidden" name="image" class="image-tag"> -->
                    </div>
                    <div class="col-md-6 location">
                        <h4> <b> <span id="text_lokasi"></span> </b> </h4>
                        <div id="peta" style="height:300px; width: 100%"></div>
                    </div>
                    <div class="col-md-12 text-center">
                        <br />
                        <a href="<?= base_url() ?>absen">
                            <button class="btn btn-primary" type="button"> Kembali </button>
                        </a>
                        <button class="btn btn-primary tombol-simpan" id="tombol-simpan" type="button"> Absen </button>
                    </div>
                </center>
            </div>
            <!-- </form> -->
        </div>
    </div>
    <!-- webcamjs  -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/webcamjs/1.0.25/webcam.js"></script>

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
        // let lokasi_maps = [-6.9850995, 110.4029104];
        // maps(lokasi_maps);
        // menampilkan kamera dengan menentukan ukuran, format dan kualitas 
        Webcam.set({
            width: 320,
            height: 232,
            image_format: 'jpeg',
            jpeg_quality: 90
        });

        Webcam.attach('#my_camera');
        $(".notif_sukses").hide();
        $(".notif_gagal").hide();
        $(".location").hide();
        $("#results_absen").hide();

        // jalankan aksi saat tombol register disubmit
        $(".tombol-simpan").click(function() {
            event.preventDefault();
            // membuat variabel image
            var image = '';

            //mengambil data uername dari form di atas dengan lokasi dan id pegawai
            var lat = $('#lat').val();
            var long = $('#long').val();
            var id_pegawai = $('#id_pegawai').val();


            //memasukkan data gambar ke dalam variabel image
            Webcam.snap(function(data_uri) {
                image = data_uri;
            });

            //mengirimkan data ke file action.php dengan teknik ajax
            // alert(image);
            $.ajax({
                url: '<?= base_url() ?>absen/save_absen_masuk',
                type: 'POST',
                data: {
                    lat: lat,
                    long: long,
                    id_pegawai: id_pegawai,
                    image: image

                },
                success: function(response) {
                    // alert(response);
                    var get = $.parseJSON(response);
                    var message = get.message;
                    var lat_response = get.lat;
                    var long_response = get.long;
                    $(".take_foto").removeClass("col-md-12");
                    $(".take_foto").addClass("col-md-6");
                    if (message != 'sukses') {
                        $(".notif_sukses").hide();
                        $(".notif_gagal").show();
                        $(".location").show();
                        document.getElementById('text_gagal').innerHTML = 'Maaf anda sudah melakukan absen masuk sebelumnya pada jam : '+get.jam;
                        document.getElementById('text_lokasi').innerHTML = 'Lokasi anda saat absen masuk';
                        maps(lat_response, long_response);
                    } else {
                        $("#my_camera").hide();
                        $("#results_absen").show();

                        $(".location").show();
                        document.getElementById('text_lokasi').innerHTML = 'Lokasi anda sekarang';
                        document.getElementById('text_sukses').innerHTML = 'Absen masuk berhasil pada jam : '+get.jam;
                        maps(lat, long);
                        document.getElementById('results_absen').innerHTML = '<img src="' + image + '"/>';
                        document.getElementById('tombol-simpan').disabled = true;
                        $(".notif_sukses").show();
                        $(".notif_gagal").hide();
                    }
                }
            })
        });

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
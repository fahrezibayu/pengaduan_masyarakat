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
        <div class="card-body">
            <?php
            $bulan  = date("m");
            $tahun      = date("Y");
            $d       = date("d");
            if (date("l", mktime(0, 0, 0, $bulan, $d, $tahun)) == "Sunday") {
                $warna = 'blue';
                $status = '<label class="label label-success">Libur Akhir Pekan</label>';

            ?>
                <h3> <span style="color: blue;"> Jadwal libur jadi tidak perlu untuk absen </span> </h3>
                <div>
                    <a href="#" class="btn btn-primary btn-lg" disabled>Absen Masuk</a> &emsp;
                    <a href="#" class="btn btn-primary btn-lg" disabled>Absen Pulang</a>
                </div>
            <?php } else { ?>
                <div>
                    <a href="<?= base_url('absen/add_masuk') ?>" class="btn btn-primary btn-lg">Absen Masuk</a> &emsp;
                    <a href="<?= site_url('absen/add_pulang') ?>" class="btn btn-primary btn-lg">Absen Pulang</a>
                </div>
            <?php } ?>
        </div>
</center>

</html>
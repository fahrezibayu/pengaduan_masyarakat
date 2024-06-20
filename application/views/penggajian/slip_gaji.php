<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> SLIP GAJI </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <style type="text/css" media="print">
        @page {
            size: auto;
            /* auto is the initial value */
            margin: 15mm;
            /* this affects the margin in the printer settings */

        }

        .table {
            border: 1px solid #aaa;
            text-align: left;
            font-size: x-small;
            border-collapse: collapse;
            width: 100%;
        }

        .heading {
            font-size: small;
        }

        .heading-2 {
            font-size: medium;
        }

        hr {
            margin-top: 1rem;
            margin-bottom: 1rem;
            border: 0;
            border-top: 1px solid rgba(0, 0, 0, 0.1);
        }
    </style>
</head>

<body>
    <?php
        date_default_timezone_set('Asia/Jakarta');

        function tgl_indonesia($tanggal)
        {
            $bulan = [
                1 => 'Januari',
                'Februari',
                'Maret',
                'April',
                'Mei',
                'Juni',
                'Juli',
                'Agustus',
                'September',
                'Oktober',
                'November',
                'Desember',
            ];
            $tanggalan = explode('-', $tanggal);
            return $tanggalan[2] . ' ' . $bulan[(int) $tanggalan[1]] . ' ' . $tanggalan[0];
        }
        $tanggal_pertama = date('01-m-Y', strtotime("$tahun-$bulan-01"));
        $tanggal_terakhir = date('d-m-Y', strtotime("$tanggal_pertama +1 month -1 day"));
    ?>
    <!-- HEADER -->
    <center>
        <h5>SLIP GAJI KARYAWAN</h5>
        <h5>Periode <?= $tanggal_pertama ?> - <?= $tanggal_terakhir ?> </h5>
        <hr class="mx-5">
    </center>
    <br />
    <table class="heading">
        <tr>
            <td>Nama</td>
            <td class="px-3">:</td>
            <td> <?= $karyawan ?> </td>
        </tr>
        <tr>
            <td>Jabatan</td>
            <td class="px-3">:</td>
            <td> <?= $namajabatan ?> </td>
        </tr>
        <tr>
            <td>Alamat</td>
            <td class="px-3">:</td>
            <td> <?= $alamat ?> </td>
        </tr>
        <tr>
            <td>No Hp</td>
            <td class="px-3">:</td>
            <td> <?= $nohp ?> </td>
        </tr>
    </table>
    <!-- /.HEADER -->
    <br />

    <!-- BODY -->
    <div class="row">
        <div class="col-md-6">
            <table width="100%">
                <tr>
                    <th> Penghasilan </th>
                </tr>
                <tr>
                    <td> Gaji Pokok </td>
                    <td> = </td>
                    <td> Rp.<?= number_format($gaji[0]['gaji_kotor'], 0, ',', '.') ?> </td>
                </tr>
                <tr>
                    <td> </td>
                    <td> Total (A) </td>
                    <td> Rp.<?= number_format($gaji[0]['gaji_kotor'], 0, ',', '.') ?>
                    </td>
                </tr>
            </table>
        </div>
        <div class="col-md-6">
            <table width="100%">
                <tr>
                    <th> Potongan </th>
                </tr>
                <tr>
                    <td> Potongan Terlambat </td>
                    <td> = </td>
                    <td> Rp.<?= number_format($gaji[0]['pot_terlambat'], 0, ',', '.') ?> </td>
                </tr>
                <tr>
                    <td> </td>
                    <td> Total (B) </td>
                    <td> Rp.<?= number_format($gaji[0]['pot_terlambat'], 0, ',', '.') ?> </td>
                </tr>
            </table>
        </div>
    </div>

    <!-- ./BODY -->
    <!-- FOOTER -->
    <div class="row heading" style="margin-top: 10px;margin-bottom:10px;">
        <div class="col-12">
            <div class="row">
                <h5 style="text-align: center"><b>
                        Penerimaan Bersih (A-B) = Rp.<?= number_format($gajiBersih, 0, ',', '.') ?>
                    </b></h5>

            </div>
        </div>
    </div>

    <div class="row">
        <div class="col">
            <table class="table table-sm table-bordered">
                <tr align="center">
                    <td>Hrd</td>
                    <td width="50%">Karyawan</td>
                </tr>
                <tr>
                    <td style="LINE-HEIGHT:80px; opacity:0%;">-</td>
                    <td></td>
                </tr>
            </table>
        </div>
    </div>
    <!-- FOOTER -->

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js"
        integrity="sha384-KsvD1yqQ1/1+IA7gi3P0tyJcT3vR+NdBTt13hSJ2lnve8agRGXTTyNaBYmCR/Nwi" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.min.js"
        integrity="sha384-nsg8ua9HAw1y0W1btsyWgBklPnCUAFLuTMS2G72MMONqmOymq585AcH49TLBQObG" crossorigin="anonymous">
    </script>
    <?php
    echo "<script>
                                window.print();
                                </script>";
    ?>
    <script type="text/javascript">
        window.onafterprint = window.close;
        setTimeout(
            function() {
                var url = "<?= base_url('laporan/penggajian') ?>";
                window.location = url;
            },
            1000);
    </script>
</body>

</html>

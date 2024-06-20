<?php
$this->db->select('*');
$this->db->from('data_karyawan');
$this->db->join('user', 'user.id_user = data_karyawan.id_user');
$this->db->where('data_karyawan.id_user', $this->session->userdata('id_user'));
$pegawai = $this->db->get()->row();
?>
<section class="content" style="padding: 70px;">
    <div class="row mb-2">
        <h4 class="col-xs-12 col-sm-12 mt-0">   Riwayat Absen </h4>
        <div class="col-xs-12 col-sm-12 ml-auto text-right" style="margin-bottom: 50px;">
            <form action="<?php echo site_url('report') ?>" method="post">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label> Tanggal </label>
                            <input type="date" name="tgl" id="tgl" class="form-control" required>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <button type="submit" name="search" class="btn btn-primary btn-fill btn-block">Tampilkan</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header border-bottom">

                    <!--<div class="col-xs-12 col-sm-6 ml-auto text-right mb-2">
                        <div class="dropdown d-inline">
                            <button class="btn btn-secondary dropdown-toggle" type="button" id="droprop-action" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fa fa-print"></i>
                                Export Laporan
                            </button>
                            <div class="dropdown-menu" aria-labelledby="droprop-action">
                                <a href="<?= base_url('absensi/export_pdf/' . $this->uri->segment(3) . "?bulan=$bulan&tahun=$tahun") ?>" class="dropdown-item" target="_blank"><i class="fa fa-file-pdf-o"></i> PDF</a>
                                <a href="<?= base_url('absensi/export_excel/' . $this->uri->segment(3) . "?bulan=$bulan&tahun=$tahun") ?>" class="dropdown-item" target="_blank"><i class="fa fa-file-excel-o"></i> Excel</a>
                            </div>
                        </div>
                    </div>-->
                </div>
            </div>
            <div class="card-body">
                <table class="table table-striped table-bordered" id="laporan_absensi">
                    <thead>
                        <tr>
                            <th colspan="8"> <center> <?= $pegawai->nama_pegawai ?> </center> </th>
                        </tr>
                        <tr>
                            <th>No</th>
                            <th>Tanggal</th>
                            <th>Foto Masuk</th>
                            <th>Jam Masuk</th>
                            <th>Lokasi Masuk</th>
                            <th>Foto Keluar</th>
                            <th>Jam Keluar</th>
                            <th>Lokasi Keluar</th>
                            <th>Status</th>
                        </tr>

                    </thead>
                    <tbody>
                        <?php
                        // error_reporting(0);
                        if (isset($_POST['search'])) {
                            $bulan  = $_POST['bulan'];
                            $tahun      = $_POST['tahun'];
                        } else {
                            $bulan  = date("m");
                            $tahun      = date("Y");
                        }

                        $hari       = date("d");
                        $jumlahhari = date("t", mktime(0, 0, 0, $bulan, $hari, $tahun));
                        $jam = $this->db->get('jam')->row();
                        function format_hari_tanggal($waktu)
                        {
                            $hari_array = array(
                                'Minggu',
                                'Senin',
                                'Selasa',
                                'Rabu',
                                'Kamis',
                                'Jumat',
                                'Sabtu'
                            );
                            $hr = date('w', strtotime($waktu));
                            $hari = $hari_array[$hr];
                            $tanggal = date('j', strtotime($waktu));
                            $bulan_array = array(
                                1 => 'Januari',
                                2 => 'Februari',
                                3 => 'Maret',
                                4 => 'April',
                                5 => 'Mei',
                                6 => 'Juni',
                                7 => 'Juli',
                                8 => 'Agustus',
                                9 => 'September',
                                10 => 'Oktober',
                                11 => 'November',
                                12 => 'Desember',
                            );
                            $bl = date('n', strtotime($waktu));
                            $bulan = $bulan_array[$bl];
                            $tahun = date('Y', strtotime($waktu));
                            $jam = date('H:i:s', strtotime($waktu));

                            //untuk menampilkan hari, tanggal bulan tahun jam
                            //return "$hari, $tanggal $bulan $tahun $jam";

                            //untuk menampilkan hari, tanggal bulan tahun
                            return "$hari, $tanggal $bulan $tahun";
                        }
                        // $pegawai = $this->db->get_where('data_karyawan', ['id_pegawai' => $this->session->userdata('id_user')])->row();
                        for ($d = 1; $d <= $jumlahhari; $d++) {
                            $date_month_year = '' . $tahun . '-' . $bulan . '-' . $d . '';

                            $absensi = $this->db->get_where('absen', array('id_pegawai' => $pegawai->id_pegawai, 'tgl_absen' => $date_month_year))->row();
                            if ($absensi) {
                                $foto_masuk = 'absen_masuk/' . $absensi->foto_masuk;
                                $jam_masuk = $absensi->jam_masuk;
                                $lokasi_masuk = $absensi->lat_masuk . "," . $absensi->long_masuk;
                                $foto_pulang = 'absen_keluar/' . $absensi->foto_pulang;
                                $jam_pulang = $absensi->jam_pulang;
                                $lokasi_pulang = $absensi->lat_pulang . "," . $absensi->long_pulang;
                                $lat_masuk = $absensi->lat_masuk;
                                $lat_pulang = $absensi->lat_pulang;
                                $long_masuk = $absensi->long_masuk;
                                $long_pulang = $absensi->long_pulang;

                                if ($jam_masuk < $jam->start) {
                                    $status = '<label class="label label-info">Tepat Waktu</label>';
                                } else if ($jam_masuk > $jam->start) {
                                    $status = '<label class="label label-warning">Terlambat</label>';
                                }
                            } else {
                                $foto_masuk = 'avatar-4.png';
                                $jam_masuk = ' - ';
                                $lokasi_masuk = ' - ';
                                $foto_pulang = 'avatar-5.png';
                                $jam_pulang = ' - ';
                                $lokasi_pulang = ' - ';
                                $lat_masuk = " - ";
                                $lat_pulang = " - ";
                                $long_masuk = " - ";
                                $long_pulang = " - ";
                                $status = '<label class="label label-danger">Tidak Masuk</label>';
                            }
                            if (date("l", mktime(0, 0, 0, $bulan, $d, $tahun)) == "Sunday") {
                                $warna = 'blue';
                                $status = '<label class="label label-success">Libur Akhir Pekan</label>';
                            } else {
                                $warna = 'black';
                                $background = '';
                            }
                        ?>
                            <tr style="color:<?= $warna ?>;background:'blue'">
                                <td><?= $d ?></td>
                                <td><?= format_hari_tanggal($date_month_year) ?></td>
                                <td> <img src="<?= base_url() ?>uploads/<?= $foto_masuk ?>" width="60" height="60"></td>
                                <td><?= $jam_masuk ?></td>
                                <td id="detail_lokasi_masuk" lat="<?= $lat_masuk ?>" long="<?= $long_masuk ?>"> <?= $lokasi_masuk ?> </td>
                                <td> <img src="<?= base_url() ?>uploads/<?= $foto_pulang ?>" width="60" height="60"></td>
                                <td><?= $jam_pulang ?></td>
                                <td id="detail_lokasi_pulang" lat="<?= $lat_pulang ?>" long="<?= $long_pulang ?>"> <?= $lokasi_pulang ?> </td>
                                <td><?= $status ?></td>
                            </tr>
                        <?php
                        } ?>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>
<div class="modal" id="lokasi_absen_masuk" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"> Lokasi Absen Masuk </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div id="maps_masuk" style="height:300px; width: 100%"></div>
            </div>
        </div>
    </div>
</div>
<div class="modal" id="lokasi_absen_pulang" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"> Lokasi Absen Pulang </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div id="maps_pulang" style="height:300px; width: 100%"></div>
            </div>
        </div>
    </div>
</div>
<script>
    function maps_masuk(lat, long) {
        var mymap = L.map('maps_masuk').setView([lat, long], 13);
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

    function maps_pulang(lat, long) {
        var mymap = L.map('maps_pulang').setView([lat, long], 13);
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
    $("body").on("click", "#detail_lokasi_masuk", function() {
        var lat = $(this).attr("lat");
        var long = $(this).attr("long");
        $("#lokasi_absen_masuk").modal("show");
        maps_masuk(lat, long);
    })
    $("body").on("click", "#detail_lokasi_pulang", function() {
        var lat = $(this).attr("lat");
        var long = $(this).attr("long");
        $("#lokasi_absen_pulang").modal("show");
        maps_pulang(lat, long);
    })
</script>
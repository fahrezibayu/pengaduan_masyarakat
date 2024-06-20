<section class="content-header">
	<h1>Laporan
		<small>Penggajian</small>
	</h1>
	<ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-building"></i> </a></li>
		<li><a href="#">Laporan Penggajian</a></li>

	</ol>
</section>

<!-- Main content -->
<section class="content">
<div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <form action="<?= site_url('laporan/penggajian_search') ?>" method="post">
                            <?php
                                // Mendapatkan tahun saat ini
                                $currentYear = date('Y');
                                
                                // Daftar bulan dalam array
                                $months = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
                            ?>
                            <div class="row">
                                <div class="col-6 col-md-6 col-lg-6">
                                    <div class="form-group">
                                        <label> Bulan </label>
                                        <select name="bulan" id="bulan" class="form-control select2">
                                            <?php
                                                foreach ($months as $key => $month) {
                                                    $monthValue = $key;
                                                    echo '<option value="'.$monthValue.'"> '.$month.' </option>';
                                                }
                                            ?>
                                        </select>
                                    </div>

                                </div>
                                <div class="col-6 col-md-6 col-lg-6">
                                    <div class="form-group">
                                        <label> Tahun </label>
                                        <select name="tahun" id="tahun" class="form-control select2">
                                            <?php
                                                for ($year = $currentYear; $year >= $currentYear - 10; $year--) {
                                                    echo '<option value="' . $year . '">' . $year . '</option>';
                                                }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-12 col-md-12 col-lg-12">
                                    <div class="form-group">
                                        <button type="submit" name="search" class="btn btn-primary btn-block"> <i
                                                class="fa fa-search"></i> Search </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Laporan Penggajian</h3>

                    </div>
                    <div class="box-body table-responsive">
                        <table class="table table-bordered table-striped nowrap example-class" id="table1">
                            <thead>
                                <tr class="text-sm">
                                    <th> No </th>
                                    <th> Pegawai </th>
                                    <th> Jabatan </th>
                                    <th> Gaji Pokok </th>
                                    <th> Total Hari (1 Bulan) </th>
                                    <th> Absen </th>
                                    <th> Gaji Prorata </th>
                                    <th> Total Terlambat </th>
                                    <th> Potongan Terlambat </th>
                                    <th> Total Gaji </th>
                                    <th> Action </th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                date_default_timezone_set('Asia/Jakarta');

                                function tgl_indonesia($tanggal)
                                {
                                    $bulan = array(
                                        1 => "Januari",
                                        "Februari",
                                        "Maret",
                                        "April",
                                        "Mei",
                                        "Juni",
                                        "Juli",
                                        "Agustus",
                                        "September",
                                        "Oktober",
                                        "November",
                                        "Desember"
                                    );
                                    $tanggalan = explode('-', $tanggal);
                                    return $tanggalan[2] . ' ' . $bulan[(int) $tanggalan[1]] . ' ' . $tanggalan[0];
                                }
                                $no = 1;
                                foreach ($gaji as $row) :
                                ?>
                                    <tr class="text-sm">
                                        <td> <?= $no++ ?> </td>
                                        <td> <?= $row['karyawan'] ?> </td>
                                        <td> <?= $row['jabatan'] ?> </td>
                                        <td> Rp.<?= number_format($row['gaji_pokok']) ?> </td>
                                        <td> <?= $row['totalhari'] ?> Hari </td>
                                        <td> <?= $row['absen'] ?> Hari </td>
                                        <td> Rp.<?= number_format($row['gaji_kotor']) ?> </td>
                                        <td> <?= number_format($row['t_terlambat']) ?> hari </td>
                                        <td> Rp.<?= number_format($row['pot_terlambat']) ?> </td>
                                        <td> Rp.<?= number_format($row['gaji_bersih']) ?> </td>
                                        <td class="text-center" width="160px">
                                            <a href="<?= base_url(); ?>laporan/slip_gaji/<?= $row['id_karyawan']; ?>/<?= $row['month'] ?>/<?= $row['year'] ?>" target="_blank" class="btn btn-success btn-xs">
                                                <i class="fa fa-eye"></i> Slip Gaji
                                            </a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>

                        </table>
                    </div>
                </div>
            </div>
    </div>

</section>
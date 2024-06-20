<section class="content-header">
	<h1>Laporan
		<small>Absen</small>
	</h1>
	<ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-building"></i> </a></li>
		<li><a href="#">Laporan Absen</a></li>

	</ol>
</section>

<!-- Main content -->
<section class="content">
	<div class="box">
		<div class="box-header">
			<h3 class="box-title">Laporan Absen</h3>

		</div>
		<div class="box-body table-responsive">
			<table class="table table-bordered table-striped nowrap example-class" id="table1">
				<thead>
					<tr class="text-sm">
						<th>No</th>
						<th>Nama</th>
						<th>Tgl Masuk</th>
						<th>Tgl Lahir</th>
						<th>Tempat Lahir</th>
						<th>JK</th>
						<th>Alamat</th>
						<th>No HP</th>
						<th>Email</th>
						<th>Aksi</th>
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
					foreach ($karyawan as $kr) :
					?>
						<tr class="text-sm">
							<td><?= $no++; ?></td>
							<td><?= $kr['nama_pegawai']; ?></td>
							<td><?= tgl_indonesia($kr['tgl_masuk']); ?></td>
							<td><?= tgl_indonesia($kr['tgl_lahir']); ?></td>
							<td><?= $kr['tempat_lahir']; ?></td>
							<td><?= $kr['jenis_kelamin']; ?></td>
							<td><?= $kr['alamat']; ?></td>
							<td><?= $kr['nohp']; ?></td>
							<td><?= $kr['email']; ?></td>
							<td class="text-center" width="160px">
								<a href="<?= base_url(); ?>laporan/detail_absen/<?= $kr['id_pegawai']; ?>" class="btn btn-success btn-xs">
									<i class="fa fa-eye"></i> Detail
								</a>
							</td>
						</tr>
					<?php endforeach; ?>
				</tbody>

			</table>
		</div>
	</div>
</section>
<section class="content-header">
	<h1>Laporan
		<small>Pengaduan</small>
	</h1>
	<ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-building"></i> </a></li>
		<li><a href="#">Laporan Pengaduan</a></li>

	</ol>
</section>

<!-- Main content -->
<section class="content">
	<div class="box">
		<div class="box-header">
			<h3 class="box-title">Laporan Pengaduan</h3>

		</div>
		<div class="box-body table-responsive">
			<table class="table table-bordered table-striped nowrap example-class" id="laporan_pengaduan" style="width:100%">
				<thead>
					<tr class="text-sm">
						<th>#</th>
						<th>Nama Pelopor</th>
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
					foreach ($row->result() as $key => $data):
					$tindaklanjutby = $this->db->get_where('user', ['id_user' => $data->tindaklanjut_by])->row_array();
					$bidang = $this->db->get_where('tbl_bidang', ['id_bidang' => $data->id_bidang])->row_array();
					?>
						<tr class="text-sm">
							<td style="width: 5%;"><?= $no++ ?>.</td>
                            <td><?= $data->nama_pegawai ?></td>
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
					<?php endforeach; ?>
				</tbody>

			</table>
		</div>
	</div>
</section>

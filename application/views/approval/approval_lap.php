<section class="content-header">
	<h1> Laporan Approval Cuti
	</h1>
</section>

<!-- Main content -->
<section class="content">
	<div class="row">
		<div class="col-md-12">
			<div class="box box-info">
				<div class="box-header with-border">
					<h3 class="box-title"> Filter Laporan Approval Cuti </h3>
				</div>
				<!-- /.box-header -->
				<!-- form start -->
				<form action="#" method="post">
					<div class="box-body">
						<div class="col-md-4">
							<div class="form-group">
								<label>Bulan</label>
								<select class="form-control  select2" name="bulan">
									<option value="">--Pilih Bulan--</option>
									<option value="01">Januari</option>
									<option value="02">Februari</option>
									<option value="03">Maret</option>
									<option value="04">April</option>
									<option value="05">Mei</option>
									<option value="06">Juni</option>
									<option value="07">Juli</option>
									<option value="08">Agustus</option>
									<option value="09">September</option>
									<option value="10">Oktober</option>
									<option value="11">November</option>
									<option value="12">Desember</option>
								</select>
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<label>Tahun</label>

								<select class="form-control select2" name="tahun">
									<option value="">--Pilih Tahun--</option>
									<?php $tahun = date('Y');
									for ($i = 2020; $i < $tahun + 5; $i++) { ?>
										<option value="<?php echo $i ?>"><?php echo $i ?></option>
									<?php } ?>
								</select>
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<label> Karyawan </label>
								<select name="id_pegawai" id="id_pegawai" class="form-control select2">
									<option value=""> Silahkan pilih karyawan </option>
									<?php
									foreach ($karyawan as $row) {
										echo "<option value='$row[id_user]'> $row[nama_pegawai] </option>";
									}
									?>
									<option value="all"> Semua Karyawan </option>
								</select>
							</div>
						</div>
					</div>
					<!-- /.box-body -->
					<div class="box-footer">
						<button type="submit" name="search" class="btn btn-info btn-block"><i class="fa fa-search"></i> Search </button>
					</div>
					<!-- /.box-footer -->
				</form>
			</div>
		</div>
		<div class="col-md-12">
			<div class="box">
				<div class="box-header">
					<h3 class="box-title">Daftar Approval Cuti</h3>
				</div>
				<div class="box-body table-responsive">
					<table class="table table-bordered table-striped nowrap" id="laporan_approval">
						<thead>
							<tr class="text-sm">
								<th>No</th>
								<th>Nama</th>
								<th>Departemen</th>
								<th>Keperluan Cuti</th>
								<th>Lama Cuti</th>
								<th>Mulai tgl</th>
								<th>Sampai tgl</th>
								<th>Keterangan</th>
								<th>Status</th>
							</tr>
						</thead>
						<tbody>
							<?php
							// if (isset($_POST['search'])) {
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
							foreach ($data_cuti as $cuti) :
							?>
								<tr class="text-sm">
									<?php
									// $this->db->select('created_at,user_id');
									// $this->db->from('pengajuan_cuti');
									// $this->db->where('user_id', $cuti['user_id']);
									// $this->db->where('created_at',date('d-m-Y'));
									// $result = $this->db->get_where('pengajuan_cuti', ['created_at' => date('d-m-Y')])->row_array();
									// var_dump($result);
									if ($cuti['created_at'] == date('d-m-Y')) :
									?>
										<td class="text-bold"><?= $no++ . ' <span class="label label-danger"> New</span>'; ?></td>
									<?php else : ?>
										<td class="text-bold"><?= $no++; ?></td>
									<?php endif; ?>
									<td><?= $cuti['nama_pegawai']; ?></td>
									<td><?= $cuti['ket_divisi']; ?></td>
									<td><?= $cuti['keperluan']; ?></td>
									<td><?= $cuti['lama']; ?></td>
									<td><?= $cuti['tgl_mulai']; ?></td>
									<td><?= $cuti['tgl_sampai']; ?></td>
									<td><?= $cuti['keterangan']; ?></td>
									<td>
										<?php if ($cuti['status'] == 0) : ?>
											<span class="label label-danger">Ditolak</span>
										<?php elseif ($cuti['status'] == 1) : ?>
											<span class="label label-success">Disetujui</span>
										<?php else : ?>
											<span class="label label-warning">Menunggu</span>
										<?php endif; ?>
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

<script>
	$(".status").change(function() {
		const id_cuti = $(this).data("id_cuti");
		console.log($(this).val())
		switch ($(this).val()) {
			case "1":
			case "2":
			case "0":
				$.ajax({
					url: "<?= base_url(); ?>tunggu/ubah_status",
					type: "post",
					dataType: "json",
					data: {
						id_cuti: id_cuti,
						id_user: $(this).data("iduser"),
						status: $(this).val()
					},
					success: function(data) {
						if (data.status == 200) {
							iziToast.success({
								title: 'Success',
								timeout: 3000,
								message: data.message,
								position: 'topCenter',
								transitionIn: 'flipInX',
								transitionOut: 'flipOutX'
							});
						}
					}
				});
				break;
			default:
				break;
		}
	});
</script>
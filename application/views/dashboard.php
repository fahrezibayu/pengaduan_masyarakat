<section class="content-header">
	<h1>
		Dashboard
		<small>Control Panel</small>
	</h1>

<!-- Main content -->
<section class="content">
	<div class="row">
		<div class="ccol-md-12 col-sm-12 col-xs-12">
			<div class="x_panel">
				<div class="x_content text-center">
					<div class="flex">
						<ul class="list-inline widget_profile_box">
							<li>
								<img src="<?= base_url() ?>uploads/<?= $this->fungsi->user_login()->gambar ?>" width="150" class="img-circle user-image">
							</li>
						</ul>
					</div>
					<div class="flex">
						<ul class="list-inline count2">
							<li>
								<h1 class="name">Selamat Datang</h1>
								<h3 class="name"><span class="hidden-xs"><?= $this->fungsi->user_login()->nama_pegawai ?></span></h3>
							</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-3 col-sm-6 col-xs-12">
			<div class="info-box">
				<span class="info-box-icon bg-aqua"><i class="fa fa-users"></i></span>

				<div class="info-box-content">
					<span class="info-box-text"> Total Pelapor </span>
					<span class="info-box-number"><?= $pelapor ?><small> Orang </small></span>
				</div>
				<!-- /.info-box-content -->
			</div>
			<!-- /.info-box -->
		</div>
		<!-- /.col -->
		<div class="col-md-3 col-sm-6 col-xs-12">
			<div class="info-box">
				<span class="info-box-icon bg-red"><i class="fa fa-tasks"></i></span>

				<div class="info-box-content">
					<span class="info-box-text"> Total Aduan </span>
					<span class="info-box-number"><?= $pengaduan ?><small>  </small></span>
				</div>
				<!-- /.info-box-content -->
			</div>
			<!-- /.info-box -->
		</div>
		<!-- /.col -->
		<div class="col-md-3 col-sm-6 col-xs-12">
			<div class="info-box">
				<span class="info-box-icon bg-yellow"><i class="fa fa-tasks"></i></span>

				<div class="info-box-content">
					<span class="info-box-text"> Aduan Proses </span>
					<span class="info-box-number"><?= $proses ?><small>  </small></span>
				</div>
				<!-- /.info-box-content -->
			</div>
			<!-- /.info-box -->
		</div>
		<!-- /.col -->
		<div class="col-md-3 col-sm-6 col-xs-12">
			<div class="info-box">
				<span class="info-box-icon bg-green"><i class="fa fa-tasks"></i></span>

				<div class="info-box-content">
					<span class="info-box-text"> Aduan Selesai </span>
					<span class="info-box-number"><?= $selesai ?><small>  </small></span>
				</div>
				<!-- /.info-box-content -->
			</div>
			<!-- /.info-box -->
		</div>
		<!-- /.col -->
	</div>
</section>

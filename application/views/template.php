<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Pengaduan Masyarakat</title>
	<!-- Tell the browser to be responsive to screen width -->
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<link rel="stylesheet" href="<?= base_url() ?>assets/bower_components/bootstrap/dist/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?= base_url() ?>assets/bower_components/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="<?= base_url() ?>assets/bower_components/Ionicons/css/ionicons.min.css">
	<link rel="stylesheet" href="<?= base_url() ?>assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
	<link rel="stylesheet" href="<?= base_url() ?>assets/dist/css/AdminLTE.min.css">
	<!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
	<link rel="stylesheet" href="<?= base_url() ?>assets/dist/css/skins/_all-skins.min.css">
	<link rel="stylesheet" href="<?= base_url() ?>assets/plugins/select2/dist/css/select2.min.css">
	<link rel="stylesheet" href="<?= base_url() ?>assets/plugins/jquery-ui/jquery-ui.min.css">
	<link rel="stylesheet" href="<?= base_url() ?>assets/plugins/izitoast/dist/css/iziToast.min.css">
	<!-- Google Font -->
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
	<!-- bootstrap datepicker -->
	<link rel="stylesheet" href="<?= base_url() ?>assets/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">

	<script src="<?= base_url() ?>assets/bower_components/jquery/dist/jquery.min.js"></script>
	<link rel="stylesheet" href="<?= base_url() ?>assets/leatfet/leaflet.css">
	<script src="<?= base_url() ?>assets/leatfet/leaflet.js"></script>

</head>
<style>
	.example-class th {
		vertical-align: middle;
	}
</style>

<body class="hold-transition skin-blue sidebar-mini">
	<!-- Site wrapper -->
	<div class="wrapper">

		<header class="main-header">
			<!-- Logo -->
			<a href="<?= base_url('dashboard') ?>" class="logo">
				<!-- mini logo for sidebar mini 50x50 pixels -->

				<!-- logo for regular state and mobile devices -->
				<span class="logo-mini"><b>PM</b></span>
				<span class="logo-lg" style="font-size: 10px;"><b>Pengaduan Masyarakat</span>
			</a>
			<!-- Header Navbar: style can be found in header.less -->
			<nav class="navbar navbar-static-top">
				<!-- Sidebar toggle button-->
				<a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</a>

				<div class="navbar-custom-menu">
					<ul class="nav navbar-nav">
						<!-- Tasks: style can be found in dropdown.less -->

						<!-- User Account: style can be found in dropdown.less -->
						<li class="dropdown user user-menu">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">
								<img src="<?= base_url() ?>uploads/<?= $this->fungsi->user_login()->gambar ?>" class="user-image" alt="User Image">
								<span class="hidden-xs"><?= $this->fungsi->user_login()->nama_pegawai ?></span>
							</a>
							<ul class="dropdown-menu">
								<!-- User image -->
								<li class="user-header">
									<img src="<?= base_url() ?>uploads/<?= $this->fungsi->user_login()->gambar ?>" class="img-circle" alt="User Image">

									<p>
										<?= $this->fungsi->user_login()->ket_level ?>
									</p>
								</li>

								<!-- Menu Footer-->
								<li class="user-footer">
									<div class="pull-left">
										<a href="<?= base_url('profile') ?>" class="btn btn-default btn-flat">Profile</a>
									</div>
									<div class="pull-right">
										<a href="<?= site_url('auth/logout') ?>" class="btn btn-default btn-flat bg-red">Sign out</a>
									</div>
								</li>
							</ul>
						</li>
					</ul>
				</div>
			</nav>
		</header>

		<!-- =============================================== -->

		<!-- Left side column. contains the sidebar -->
		<aside class="main-sidebar">
			<!-- sidebar: style can be found in sidebar.less -->
			<section class="sidebar">
				<!-- Sidebar user panel -->
				<div class="user-panel">
					<div class="pull-left image">
						<img src="<?= base_url() ?>uploads/<?= $this->fungsi->user_login()->gambar ?>" class="img-circle" alt="User Image">
					</div>
					<div class="pull-left info">
						<p><?= ucfirst($this->fungsi->user_login()->nama_pegawai) ?></p>
						<a href="#"><i class="fa fa-circle text-success"></i> Online</a>
					</div>
				</div>
				<!-- search form -->
				<form action="#" method="get" class="sidebar-form">
					<div class="input-group">
						<input type="text" name="q" class="form-control" placeholder="Search...">
						<span class="input-group-btn">
							<button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
							</button>
						</span>
					</div>
				</form>
				<!-- /.search form -->
				<!-- sidebar menu: : style can be found in sidebar.less -->
				<ul class="sidebar-menu" data-widget="tree">
					<li class="header">GENERAL</li>
					<li <?= $this->uri->segment(1) == 'dashboard' || $this->uri->segment(1) == '' ? 'class="active"' : '' ?>>
						<a href="<?= site_url('dashboard') ?>">
							<i class="fa fa-dashboard"></i> <span>Dashboard</span>
							<span class="pull-right-container">
							</span>
						</a>
					</li>

					<?php if ($this->fungsi->user_login()->id_level == 1) { ?>
						<li class="header">MENU MASTER</li>
						<li <?= $this->uri->segment(1) == 'mediapelaporan' ? 'class="active"' : '' ?>><a href="<?= site_url('index.php/mediapelaporan') ?>"><i class="fa fa-clock-o"></i> <span> Media Pelaporan </span></a></li>
						<li <?= $this->uri->segment(1) == 'bidang' ? 'class="active"' : '' ?>><a href="<?= site_url('index.php/bidang') ?>"><i class="fa fa-building"></i> <span>Bidang</span></a></li>
						<li <?= $this->uri->segment(1) == 'jenispengaduan' ? 'class="active"' : '' ?>><a href="<?= site_url('index.php/jenispengaduan') ?>"><i class="fa fa-user"></i> <span>Jenis Pengaduan</span></a></li>
						<li <?= $this->uri->segment(1) == 'data' ? 'class="active"' : '' ?>><a href="<?= site_url('data') ?>"><i class="fa fa-users"></i> <span>Data Karyawan</span></a></li>
						<li class="header"> LAPORAN </li>
						<li <?= $this->uri->segment(1) == 'laporan' ? 'class="active"' : '' ?>><a href="<?= site_url('index.php/laporan') ?>"><i class="fa fa-book"></i> <span> Laporan Pelaporan </span></a></li>
					<?php } ?>
				</ul>
			</section>
			<!-- /.sidebar -->
		</aside>

		<!-- =============================================== -->

		<!-- Content Wrapper. Contains page content -->
		<div class="content-wrapper">
			<?php echo $contents ?>
		</div>
		<!-- /.content-wrapper -->

		<footer class="main-footer">
			<div class="pull-right hidden-xs">

			</div>
			<strong>Copyright &copy; 2024 | Pengaduan Masyrakat</strong>
		</footer>
	</div>
	<!-- ./wrapper -->

	<!-- jQuery 3 -->
	<script src="<?= base_url() ?>assets/plugins/izitoast/dist/js/iziToast.min.js"></script>
	<script src="<?= base_url() ?>assets/plugins/jquery-ui/jquery-ui.min.js"></script>
	<script src="<?= base_url() ?>assets/plugins/select2/dist/js/select2.min.js"></script>
	<script src="<?= base_url() ?>assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
	<script src="<?= base_url() ?>assets/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
	<script src="<?= base_url() ?>assets/bower_components/fastclick/lib/fastclick.js"></script>
	<script src="<?= base_url() ?>assets/dist/js/adminlte.min.js"></script>
	<!-- <script src="<?= base_url() ?>assets/dist/js/demo.js"></script> -->
	<!-- bootstrap datepicker -->
	<script src="<?= base_url() ?>assets/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>

	<script src="<?= base_url() ?>assets/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
	<script src="<?= base_url() ?>assets/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
	<script src="<?= base_url() ?>assets/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
	<script src="<?= base_url() ?>assets/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
	<script src="<?= base_url() ?>assets/bower_components/datatables.net-bs/js/dataTables.buttons.min.js"></script>
	<script src="<?= base_url() ?>assets/bower_components/datatables.net-bs/js/buttons.print.min.js"></script>
	<script src="<?= base_url() ?>assets/bower_components/datatables.net-bs/js/buttons.flash.min.js"></script>
	<script src="<?= base_url() ?>assets/bower_components/datatables.net-bs/js/buttons.html5.min.js"></script>
	<script src="<?= base_url() ?>assets/bower_components/datatables.net-bs/js/jszip.min.js"></script>
	<script src="<?= base_url() ?>assets/bower_components/datatables.net-bs/js/pdfmake.min.js"></script>
	<script src="<?= base_url() ?>assets/bower_components/datatables.net-bs/js/vfs_fonts.js"></script>
	<script>
		$(document).ready(function() {
			$(".bulan").select2();
			$(".tahun").select2();
			$(".select2").select2();
			$('#date1').datepicker({
				autoclose: true,
				format: 'dd-mm-yyyy'
			})
			$('#date2').datepicker({
				autoclose: true,
				format: 'dd-mm-yyyy'
			})
			$('.sidebar-menu').tree()
			$('#table1').DataTable()
			$("#laporan_karyawan").DataTable({
				dom: 'Bfrtip',
				buttons: [{
						extend: 'print',
						text: 'Print',
						title: 'Daftar Karyawan',
						exportOptions: {
							columns: [0, 1, 2, 3, 4, 5, 6, 7, 8]
						}
					},
					{
						text: 'Export PDF',
						extend: 'pdf',
						filename: 'Data Karyawan',
						orientation: 'landscape', //portrait
						pageSize: 'A4', //A3 , A5 , A6 , legal , letter
						exportOptions: {
							columns: ':visible',
							search: 'applied',
							order: 'applied'
						},
						customize: function(doc) {
							doc.content.splice(0, 1);
							doc.pageMargins = [20, 60, 20, 30];
							doc.defaultStyle.fontSize = 8;
							doc.styles.tableHeader.fontSize = 8;
							doc.styles.tableHeader.nowrap = true;
							doc['header'] = (function() {
								return {
									columns: [{
										alignment: 'center',
										italics: true,
										text: 'Data Karyawan',
										fontSize: 15,
										margin: [10, 0]
									}, ],
									margin: 20
								}
							});
							var objLayout = {};
							objLayout['hLineWidth'] = function(i) {
								return .5;
							};
							objLayout['vLineWidth'] = function(i) {
								return .5;
							};
							objLayout['hLineColor'] = function(i) {
								return '#aaa';
							};
							objLayout['vLineColor'] = function(i) {
								return '#aaa';
							};
							objLayout['paddingLeft'] = function(i) {
								return 4;
							};
							objLayout['paddingRight'] = function(i) {
								return 4;
							};
							doc.content[0].layout = objLayout;
						},
						exportOptions: {
							columns: [0, 1, 2, 3, 4, 5, 6, 7, 8]
						}
					},
					{
						extend: 'excel',
						text: 'Export Excel',
						title: 'Daftar Karyawan',
						exportOptions: {
							columns: [0, 1, 2, 3, 4, 5, 6, 7, 8]
						},
						customize: function(xlsx) {
							var sheet = xlsx.xl.worksheets['sheet1.xml'];

							$('row c[r^="G"]', sheet).attr('s', '55');
							$('row c[r*="2"]', sheet).attr('s', '51');
						}
					},

				],

				"scrollY": 300,
				"scrollX": true,
				"lengthMenu": [
					[-1],
					["All"]
				],
				initComplete: function() {
					this.api().columns().every(function() {
						var column = this;
						var select = $('<select><option value=""></option></select>')
							.appendTo($(column.footer()).empty())
							.on('change', function() {
								var val = $.fn.dataTable.util.escapeRegex(
									$(this).val()
								);

								column
									.search(val ? '^' + val + '$' : '', true, false)
									.draw();
							});

						column.data().unique().sort().each(function(d, j) {
							select.append('<option>' + d + '</option>')
						});
					});
				}
			})
			$("#laporan_absensi").DataTable({
				dom: 'Bfrtip',
				buttons: [{
						extend: 'print',
						text: 'Print',
						title: 'Daftar Absensi',
						exportOptions: {
							columns: [0, 1, 3, 6, 8]
						}
					},
					{
						text: 'Export PDF',
						extend: 'pdf',
						filename: 'Data Absensi',
						orientation: 'landscape', //portrait
						pageSize: 'A4', //A3 , A5 , A6 , legal , letter
						exportOptions: {
							columns: ':visible',
							search: 'applied',
							order: 'applied'
						},
						customize: function(doc) {
							doc.content.splice(0, 1);
							doc.pageMargins = [20, 60, 20, 30];
							doc.defaultStyle.fontSize = 8;
							doc.styles.tableHeader.fontSize = 8;
							doc.styles.tableHeader.nowrap = true;
							doc['header'] = (function() {
								return {
									columns: [{
										alignment: 'center',
										italics: true,
										text: 'Data Absensi',
										fontSize: 15,
										margin: [10, 0]
									}, ],
									margin: 20
								}
							});
							var objLayout = {};
							objLayout['hLineWidth'] = function(i) {
								return .5;
							};
							objLayout['vLineWidth'] = function(i) {
								return .5;
							};
							objLayout['hLineColor'] = function(i) {
								return '#aaa';
							};
							objLayout['vLineColor'] = function(i) {
								return '#aaa';
							};
							objLayout['paddingLeft'] = function(i) {
								return 4;
							};
							objLayout['paddingRight'] = function(i) {
								return 4;
							};
							doc.content[0].layout = objLayout;
						},
						exportOptions: {
							columns: [0, 1, 3, 6, 8]
						}
					},
					{
						extend: 'excel',
						text: 'Export Excel',
						title: 'Daftar Absensi',
						exportOptions: {
							columns: [0, 1, 3, 6, 8]
						},
						customize: function(xlsx) {
							var sheet = xlsx.xl.worksheets['sheet1.xml'];

							$('row c[r^="G"]', sheet).attr('s', '55');
							$('row c[r*="2"]', sheet).attr('s', '51');
						}
					},

				],

				"scrollX": true,
				initComplete: function() {
					this.api().columns().every(function() {
						var column = this;
						var select = $('<select><option value=""></option></select>')
							.appendTo($(column.footer()).empty())
							.on('change', function() {
								var val = $.fn.dataTable.util.escapeRegex(
									$(this).val()
								);

								column
									.search(val ? '^' + val + '$' : '', true, false)
									.draw();
							});

						column.data().unique().sort().each(function(d, j) {
							select.append('<option>' + d + '</option>')
						});
					});
				}
			})
			$("#laporan_approval").DataTable({
				dom: 'Bfrtip',
				buttons: [{
						extend: 'print',
						text: 'Print',
						title: 'Daftar Approval Cuti',
						exportOptions: {
							columns: [1, 2, 3, 4, 5, 6, 7, 8]
						}
					},
					{
						extend: 'pdf',
						text: 'Export Pdf',
						title: 'Daftar Approval Cuti',
						orientation: 'landscape',
						exportOptions: {
							columns: [1, 2, 3, 4, 5, 6, 7, 8]
						},
						pageSize: 'LEGAL'
					},
					{
						extend: 'excel',
						text: 'Export Excel',
						title: 'Daftar Approval Cuti',
						exportOptions: {
							columns: [1, 2, 3, 4, 5, 6, 7, 8]
						}
					},
				],
				"lengthMenu": [
					[-1],
					["All"]
				],
				initComplete: function() {
					this.api().columns().every(function() {
						var column = this;
						var select = $('<select><option value=""></option></select>')
							.appendTo($(column.footer()).empty())
							.on('change', function() {
								var val = $.fn.dataTable.util.escapeRegex(
									$(this).val()
								);

								column
									.search(val ? '^' + val + '$' : '', true, false)
									.draw();
							});

						column.data().unique().sort().each(function(d, j) {
							select.append('<option>' + d + '</option>')
						});
					});
				}
			})
		})
		$(document).ready(function() {
			// Function to convert an img URL to data URL
			function getBase64FromImageUrl(url) {
				var img = new Image();
				img.crossOrigin = "anonymous";
				img.onload = function() {
					var canvas = document.createElement("canvas");
					canvas.width = this.width;
					canvas.height = this.height;
					var ctx = canvas.getContext("2d");
					ctx.drawImage(this, 0, 0);
					var dataURL = canvas.toDataURL("image/png");
					return dataURL.replace(/^data:image\/(png|jpg);base64,/, "");
				};
				img.src = url;
			}
			// DataTable initialisation
			$('#example').DataTable({
				"dom": '<"dt-buttons"Bf><"clear">lirtp',
				"paging": true,
				"autoWidth": true,
				"buttons": [{
					text: 'Custom PDF',
					extend: 'pdfHtml5',
					filename: 'dt_custom_pdf',
					orientation: 'landscape', //portrait
					pageSize: 'A4', //A3 , A5 , A6 , legal , letter
					exportOptions: {
						columns: ':visible',
						search: 'applied',
						order: 'applied'
					},
					customize: function(doc) {
						//Remove the title created by datatTables
						doc.content.splice(0, 1);
						//Create a date string that we use in the footer. Format is dd-mm-yyyy
						var now = new Date();
						var jsDate = now.getDate() + '-' + (now.getMonth() + 1) + '-' + now.getFullYear();
						// Logo converted to base64
						// var logo = getBase64FromImageUrl('https://datatables.net/media/images/logo.png');
						// The above call should work, but not when called from codepen.io
						// So we use a online converter and paste the string in.
						// Done on http://codebeautify.org/image-to-base64-converter
						// It's a LONG string scroll down to see the rest of the code !!!
						var logo = 'data:image/jpeg;base64,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ICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICA=';
						// A documentation reference can be found at
						// https://github.com/bpampuch/pdfmake#getting-started
						// Set page margins [left,top,right,bottom] or [horizontal,vertical]
						// or one number for equal spread
						// It's important to create enough space at the top for a header !!!
						doc.pageMargins = [20, 60, 20, 30];
						// Set the font size fot the entire document
						doc.defaultStyle.fontSize = 7;
						// Set the fontsize for the table header
						doc.styles.tableHeader.fontSize = 7;
						// Create a header object with 3 columns
						// Left side: Logo
						// Middle: brandname
						// Right side: A document title
						doc['header'] = (function() {
							return {
								columns: [{
										image: logo,
										width: 24
									},
									{
										alignment: 'left',
										italics: true,
										text: 'dataTables',
										fontSize: 18,
										margin: [10, 0]
									},
									{
										alignment: 'right',
										fontSize: 14,
										text: 'Custom PDF export with dataTables'
									}
								],
								margin: 20
							}
						});
						// Create a footer object with 2 columns
						// Left side: report creation date
						// Right side: current page and total pages
						doc['footer'] = (function(page, pages) {
							return {
								columns: [{
										alignment: 'left',
										text: ['Created on: ', {
											text: jsDate.toString()
										}]
									},
									{
										alignment: 'right',
										text: ['page ', {
											text: page.toString()
										}, ' of ', {
											text: pages.toString()
										}]
									}
								],
								margin: 20
							}
						});
						// Change dataTable layout (Table styling)
						// To use predefined layouts uncomment the line below and comment the custom lines below
						// doc.content[0].layout = 'lightHorizontalLines'; // noBorders , headerLineOnly
						var objLayout = {};
						objLayout['hLineWidth'] = function(i) {
							return .5;
						};
						objLayout['vLineWidth'] = function(i) {
							return .5;
						};
						objLayout['hLineColor'] = function(i) {
							return '#aaa';
						};
						objLayout['vLineColor'] = function(i) {
							return '#aaa';
						};
						objLayout['paddingLeft'] = function(i) {
							return 4;
						};
						objLayout['paddingRight'] = function(i) {
							return 4;
						};
						doc.content[0].layout = objLayout;
					}
				}]
			});
		});
	</script>
</body>

</html>
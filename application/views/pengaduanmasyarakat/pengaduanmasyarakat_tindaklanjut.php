<section class="content-header">
    <h1>Tindak Lanjut Pengaduan Masyarakat
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-building"></i> </a></li>
        <li class="active">Tindak Lanjut Pengaduan Masyarakat</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Tindak Lanjut Pengaduan Masyarakat</h3>
            <div class="pull-right">
                <a href="<?= site_url('index.php/pengaduanmasyarakat') ?>" class="btn btn-warning btn-flat">
                    <i class="fa fa-undo"></i> Back
                </a>
            </div>

        </div>
        <div class="box-body">
            <div class="row">
                <div class="col-md-4 col-md-offset-4">
                    <form action="" method="POST">
                        <div class="form-group ">
							<label for="no_divisi"> Bidang <small class="text-danger">*</small></label>
							<select name="bidang" id="bidang" class="select2" style="width:100%">
								<option value="">Silahkan pilih bidang</option>
								<?php 
								// Fetch all records from tbl_bidang
								$bidang_list = $this->db->get('tbl_bidang')->result();
								// Loop through the fetched records
								foreach ($bidang_list as $data) { 
									// Check if the current option should be selected
									$selected = ($data->id_bidang == $pengaduan_by_id->id_bidang) ? 'selected' : '';
									?>
									<option value="<?= htmlspecialchars($data->id_bidang) ?>" <?= $selected ?>><?= htmlspecialchars($data->nama_bidang) ?></option>
								<?php } ?>
							</select>

                            <small class="text-danger"><?= form_error('bidang'); ?></small>
                        </div>
                        <div class="form-group ">
                            <label for="no_divisi"> Tindak Lanjut <small class="text-danger">*</small></label>
                            <input type="varchar" name="tindaklanjut" class="form-control" value="<?= $pengaduan_by_id['tindaklanjut']; ?>" name="tindaklanjut" id="tindaklanjut" placeholder="Tindak Lanjut">
                            <small class="text-danger"><?= form_error('tindaklanjut'); ?></small>
                        	<input type="hidden" class="form-control" id="id_user" name="id_user" value="<?= $this->fungsi->user_login()->id_user ?>">
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-success btn-flat">
                                <i class="fa fa-paper-plane"></i> Simpan
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<script>
    $(document).ready(function() {
        $('.js-example-basic-single').select2();
    });
</script>

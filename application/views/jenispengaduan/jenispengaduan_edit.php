<section class="content-header">
    <h1>Jenis Pengaduan
        <small>Data Jenis Pengaduan</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-building"></i> </a></li>
        <li class="active">Jenis Pengaduan</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Edit Jenis Pengaduan</h3>
            <div class="pull-right">
                <a href="<?= site_url('index.php/jenispengaduan') ?>" class="btn btn-warning btn-flat">
                    <i class="fa fa-undo"></i> Back
                </a>
            </div>

        </div>
        <div class="box-body">
            <div class="row">
                <div class="col-md-4 col-md-offset-4">
                    <form action="" method="POST">
                        <div class="form-group ">
                            <label for="no_divisi">Nama Jenis Pengaduan <small class="text-danger">*</small></label>
                            <input type="varchar" name="nama_jenis_pengaduan" class="form-control" value="<?= $jenispengaduan_by_id['nama_jenis_pengaduan']; ?>" name="no_divisi" id="no_divisi" placeholder="No Divisi">
                            <small class="text-danger"><?= form_error('nama_jenis_pengaduan'); ?></small>
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
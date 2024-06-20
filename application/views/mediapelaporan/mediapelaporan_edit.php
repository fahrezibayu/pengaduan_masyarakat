<section class="content-header">
    <h1>Media Pelaporan
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-clock-o"></i> </a></li>
        <li><a href="#">Media Pelaporan</a></li>

    </ol>
</section>
<!-- Main content -->
<section class="content">
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Edit Media Pelaporan</h3>
            <div class="pull-right">
                <a href="<?= site_url('index.php/mediapelaporan') ?>" class="btn btn-warning btn-flat">
                    <i class="fa fa-undo"></i> Back
                </a>
            </div>

        </div>
        <div class="box-body">
            <div class="row">
                <div class="col-md-4 col-md-offset-4">
                    <form action="" method="POST">
                        <div class="form-group ">
                            <label for="keterangan">Nama Media Pelaporan <small class="text-danger">*</small></label>
                            <input type="varchar" name="nama_media_pelaporan" class="form-control" value="<?= $mediapelaporan_by_id['nama_media_pelaporan']; ?>" name="keterangan" id="keterangan" placeholder="Keterangan">
                            <small class="text-danger"><?= form_error('nama_media_pelaporan'); ?></small>
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
<section class="content-header">
    <h1>Karyawan
        <small>Data Karyawan</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-building"></i> </a></li>
        <li><a href="#">Data Karyawan</a></li>

    </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="box">
        <div class="box-header">
            <h3 class="box-title"><?= ucfirst($page) ?> Karyawan</h3>
            <div class="pull-right">
                <a href="<?= site_url('data') ?>" class="btn btn-warning btn-flat">
                    <i class="fa fa-undo"></i> Back
                </a>
            </div>

        </div>
        <div class="box-body">
            <div class="row">
                <div class="col-md-4 col-md-offset-4">
                    <form action="<?= site_url('index.php/data/add') ?>" method="POST">
                        <div class="form-group">
                            <label for="nama_pegawai">Nama Pegawai <small class="text-danger">*</small></label>
                            <select class="form-control select2" style="width: 338px;" name="nama_pegawai" value="<?= set_value('tgl_masuk'); ?>">
                                <option></option>
                                <?php foreach ($users as $user) : ?>
                                    <option value="<?= $user['id_user']; ?>"><?= $user['nama_pegawai']; ?></option>
                                <?php endforeach; ?>
                            </select>
                            <small class="text-danger"><?= form_error('nama_pegawai'); ?></small>
                        </div>
                        
                        <div class="form-group ">
                            <label>Alamat <small class="text-danger">*</small></label>
                            <textarea name="alamat" value="<?= set_value('alamat'); ?>" class="form-control"><?= set_value('alamat'); ?></textarea>
                            <small class="text-danger"><?= form_error('alamat'); ?></small>
                        </div>
                        <div class="form-group ">
                            <label>Nomor Hp <small class="text-danger">*</small></label>
                            <input type="text" name="nohp" value="<?= set_value('nohp'); ?>" class="form-control">
                            <small class="text-danger"><?= form_error('nohp'); ?></small>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-success btn-flat">
                                <i class="fa fa-paper-plane"></i> Simpan
                            </button>
                            <button type="Reset" class="btn btn-flat">Reset</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

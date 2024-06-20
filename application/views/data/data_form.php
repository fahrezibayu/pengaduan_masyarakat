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
                    <form action="<?= site_url('data/add') ?>" method="POST">
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
                            <label for="tgl_masuk">Tanggal Masuk <small class="text-danger">*</small></label>
                            <input type="date" name="tgl_masuk" value="<?= set_value('tgl_masuk'); ?>" class="form-control">
                        </div>
                        <div class="form-group ">
                            <label for="tgl_lahir">Tanggal Lahir <small class="text-danger">*</small></label>
                            <input type="date" name="tgl_lahir" value="<?= set_value('tgl_lahir'); ?>" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="kota">Kota Lahir <small class="text-danger">*</small></label>
                            <select class="js-example-basic-single" style="width: 338px;" name="kota" value="<?= set_value('kota'); ?>">
                                <option></option>
                                <?php foreach ($cities as $city) : ?>
                                    <option value="<?= $city['city_name']; ?>"><?= $city['city_name']; ?></option>
                                <?php endforeach; ?>
                            </select>
                            <small class="text-danger"><?= form_error('kota'); ?></small>
                        </div>
                        <div class="form-group">
                            <label>Jenis Kelamin <small class="text-danger">*</small></label>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="jenis_kelamin" value="L" name="jenis_kelamin" class="custom-control-input  d-inline">
                                <label class="custom-control-label" for="jenis_kelamin"> Laki-laki</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="jenis_kelamin" value="P" name="jenis_kelamin" class="custom-control-input d-inline">
                                <label class="custom-control-label" for="jenis_kelamin"> Perempuan</label>
                            </div>
                            <small class="text-danger"><?= form_error('jenis_kelamin'); ?></small>
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
                        <div class="form-group ">
                            <label>Email</label>
                            <input type="text" name="email" value="" class="form-control">
                            <small class="text-danger"><?= form_error('email'); ?></small>
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
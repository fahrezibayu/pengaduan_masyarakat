<section class="content-header">
    <h1>Users
        <small>Pengguna</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-user"></i> </a></li>
        <li><a href="#">Users</a></li>

    </ol>
</section>


<section class="content">
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Edit Data Users</h3>
            <div class="pull-right">
                <a href="<?= site_url('index.php/user') ?>" class="btn btn-warning btn-flat">
                    <i class="fa fa-undo"></i> Back
                </a>
            </div>
        </div>
        <div class="box-body table-responsive">
            <div class="row">
                <div class="col-md-4 col-md-offset-4">
                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="nama_pegawai">Nama Pegawai</label>
                            <input type="text" class="form-control" value="<?= $user_by_id['nama_pegawai']; ?>" name="nama_pegawai" id="nama_pegawai" placeholder="Nama Pegawai">
                            <small class="text-danger"><?= form_error('nama_pegawai'); ?></small>
                        </div>
                        <div style="display:none;" class="form-group">
                            <label for="username">Username</label>
                            <input type="text" class="form-control" value="<?= $user_by_id['username']; ?>" readonly name="username" id="username" placeholder="Username">
                            <small class="text-danger"><?= form_error('username'); ?></small>
                        </div>
                        <input type="hidden" class="form-control" value="<?= $user_by_id['password']; ?>" name="password" id="password" placeholder="Password">
						<div class="form-group">
                            <label for="alamat">Alamat</label>
                            <input type="text" class="form-control" value="<?= $user_by_id['alamat']; ?>" name="alamat" id="alamat" placeholder="Alamat">
                            <small class="text-danger"><?= form_error('alamat'); ?></small>
                        </div>
						<div class="form-group">
                            <label for="nohp">No Hp</label>
                            <input type="text" class="form-control" value="<?= $user_by_id['nohp']; ?>" name="nohp" id="nohp" placeholder="No Hp">
                            <small class="text-danger"><?= form_error('nohp'); ?></small>
                        </div>
                        <div class="form-group">
                            <label for="level">Level</label>
                            <select class="form-control" name="level" id="level">
                                <option>--Pilih--</option>
                                <?php foreach ($levels as $level) : ?>
                                    <?php if ($user_by_id['id_level'] == $level['id_level']) : ?>
                                        <option value="<?= $level['id_level']; ?>" selected><?= $level['ket_level']; ?></option>
                                    <?php else : ?>
                                        <option value="<?= $level['id_level']; ?>"><?= $level['ket_level']; ?></option>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </select>
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

<script>
    $("#span").hover(function() {
        $(this).css('cursor', 'pointer');
    });
    $("#ubah-password").click(function() {
        if ($(this).is(':checked')) {
            $("[name='password']").removeAttr("readonly");
            $("[name='konfirmasi_password']").removeAttr("readonly");
        } else {
            $("[name='password']").attr("readonly", "readonly");
            $("[name='konfirmasi_password']").attr("readonly", "readonly");
        }
    });
</script>

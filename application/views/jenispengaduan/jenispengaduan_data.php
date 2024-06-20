<section class="content-header">
    <h1>Jenis Pengaduan
        <small>Data Jenis Pengaduan</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-building"></i> </a></li>
        <li><a href="#">Jenis Pengaduan</a></li>

    </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Data Jenis Pengaduan</h3>
            <div class="pull-right">
                <a href="<?= site_url('index.php/jenispengaduan/add') ?>" class="btn btn-primary btn-flat">
                    <i class="fa fa-plus"></i> Create
                </a>
            </div>

        </div>
        <div class="box-body table-responsive">
            <table class="table table-bordered table-striped" id="table1">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nama Jenis Pengaduan</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1;
                    foreach ($row->result() as $key => $data) { ?>
                        <tr>
                            <td style="width: 5%;"><?= $no++ ?>.</td>
                            <td><?= $data->nama_jenis_pengaduan ?></td>
                            <td class="text-center" width="160px">
                                <a href="<?= site_url('index.php/jenispengaduan/edit/' . $data->id_jenis_pengaduan) ?>" class="btn btn-primary btn-xs">
                                    <i class="fa fa-pencil"></i> Edit
                                </a>
                                <a href="<?= site_url('index.php/jenispengaduan/del/' . $data->id_jenis_pengaduan) ?>" onclick="return confirm('Yakin hapus data?')" class="btn btn-danger btn-xs">
                                    <i class="fa fa-trash"></i> Delete
                                </a>
                                </form>
                            </td>

                        </tr>
                    <?php
                    } ?>
                </tbody>

            </table>
        </div>
    </div>
</section>
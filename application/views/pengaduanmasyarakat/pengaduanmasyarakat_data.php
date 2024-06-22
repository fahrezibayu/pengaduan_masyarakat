<section class="content-header">
    <h1>Pengaduan Masyarakat
        <small>Data Pengaduan Masyarakat</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-building"></i> </a></li>
        <li><a href="#">Pengaduan Masyarakat</a></li>

    </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Data Pengaduan Masyarakat</h3>

        </div>
        <div class="box-body table-responsive">
            <table class="table table-bordered table-striped" id="table1">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nama Pelopor</th>
                        <th>Media Pengaduan</th>
                        <th>Jenis Pengaduan</th>
                        <th>Isi Pengaduan</th>
                        <th>Bidang</th>
                        <th>Tindak Lanjut</th>
                        <th>Tindak Lanjut By</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1;
                    	foreach ($row->result() as $key => $data) {
						$tindaklanjutby = $this->db->get_where('user', ['id_user' => $data->tindaklanjut_by])->row_array();
						$bidang = $this->db->get_where('tbl_bidang', ['id_bidang' => $data->id_bidang])->row_array();
					?>
                        <tr>
                            <td style="width: 5%;"><?= $no++ ?>.</td>
                            <td><?= $data->nama_pegawai ?></td>
                            <td><?= $data->nama_media_pelaporan ?></td>
                            <td><?= $data->nama_jenis_pengaduan ?></td>
                            <td><?= $data->isi_pengaduan ?></td>
                            <td><?= $bidang['nama_bidang'] ?></td>
                            <td><?= $data->tindaklanjut ?></td>
                            <td><?= $tindaklanjutby['nama_pegawai'] ?></td>
                            <td class="text-center" width="160px">
                                <a href="<?= site_url('index.php/pengaduanmasyarakat/tindaklanjut/' . $data->id_pengaduan) ?>" class="btn btn-success btn-xs">
                                    <i class="fa fa-hand-grab-o"></i> Tindak Lanjut
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

<section class="content-header">
    <h1>Jam Kerja
        <small>Jam Kerja</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-clock-o"></i> </a></li>
        <li><a href="#">Jam Kerja</a></li>

    </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Jam Kerja</h3>

        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <th>No.</th>
                        <th>Jam Mulai</th>
                        <th>Jam Selesai</th>
                        <th>Aksi</th>
                    </thead>
                    <tbody>
                        <?php foreach ($jam as $i => $j) : ?>
                            <tr>
                                <td><?= ($i + 1) ?></td>
                                <td class="jam-start"><?= $j->start ?></td>
                                <td class="jam-finish"><?= $j->finish ?></td>
                                <td>
                                    <a href="#" start="<?= $j->start ?>" finish="<?= $j->finish ?>" class="btn btn-primary btn-sm btn-edit-jam" data-toggle="modal" data-target="#edit-jam" data-jam="<?= base64_encode(json_encode($j)) ?>"><i class="fa fa-edit"></i> Edit</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    </div>
    </div>

    <div class="modal-wrapper">
        <div class="modal fade" id="edit-jam" tabindex="-1" role="dialog" aria-labelledby="edit-jam-label" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <form id="form-edit-jam" action="<?= base_url('jam/update') ?>" method="post">
                        <div class="modal-header">
                            <h5 class="modal-title" id="edit-jam-label">Edit Jam <span id="edit-keterangan"></span></h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="start">Jam Mulai :</label>
                                <input type="hidden" name="id_jam" id="edit-id-jam">
                                <input type="time" name="start" id="edit-start" class="form-control" placeholder="Jam Mulai" required="reuired" />
                            </div>

                            <div class="form-group">
                                <label for="finish">Jam Selesai :</label>
                                <input type="time" name="finish" id="edit-finish" class="form-control" placeholder="Jam Selesai" required="reuired" />
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
        $('body').on('click','.btn-edit-jam',function() {
            var start = $(this).attr("start");
            var finish = $(this).attr("finish");
            $("#edit-start").val(start);
            $("#edit-finish").val(finish);
        })
    </script>
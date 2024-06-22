<style>
    .icon {
        position: absolute;
        right: 15px;
        top: 10px;
        cursor: pointer;
    }
</style>
<div class="icon">
    <i class="fa fa-times back" style="color: #899899;"></i>
</div>
<div class="p" style="padding:20px 25px;">
    <form id="data-diri">
        <div class="form-group">
            <label for="nama_pegawai">Nama Pegawai<small class="text-danger">*</small></label>
            <input type="text" name="nama_pegawai" class="form-control" id="nama_pegawai" placeholder="">
            <small class="text-danger nama_pegawai"></small>
        </div>
        <div class="form-group ">
            <label>Alamat <small class="text-danger">*</small></label>
            <textarea name="alamat" value="" class="form-control"></textarea>
        </div>
        <div class="form-group">
            <label for="nohp">No HP<small class="text-danger">*</small></label>
            <input type="text" name="nohp" class="form-control" id="nohp" placeholder="">
        </div>
        <button type="submit" class="btn btn-block btn-primary edit-data-diri">Edit Data Diri</button>
    </form>
</div>

<script>
    $(".back").click(function() {
        $(".card").css("width", "350px");
        $(".card").css("height", "400px");
        $.ajax({
            url: "<?= base_url() ?>index.php/profile/load_profile",
            type: "get",
            dataType: "html",
            success: function(data) {
                $(".card").html(data);
            }
        });
    });

    $.ajax({
        url: "<?= base_url(); ?>index.php/profile/get_data_user",
        type: "get",
        dataType: "json",
        success: function(data) {
            $("[name='nama_pegawai']").val(data.data_user.nama_pegawai);
            $("[name='alamat']").val(data.data_user.alamat);
            $("[name='nohp']").val(data.data_user.nohp);
        }
    });

    $("#data-diri").submit(function(e) {
        let nama_pegawai = $("[name='nama_pegawai']").val();
        let tgl_masuk = $("[name='tgl_masuk']").val();
        let tgl_lahir = $("[name='tgl_lahir']").val();
        let tempat_lahir = $("[name='tempat_lahir']").val();
        let jenis_kelamin = $("input[name='jenis_kelamin']:checked").val();
        let alamat = $("[name='alamat']").val();
        let nohp = $("[name='nohp']").val();
        let email = $("[name='email']").val();

        $.ajax({
            url: "<?= base_url(); ?>index.php/profile/proses_edit_data_diri",
            type: "post",
            data: {
                nama_pegawai: nama_pegawai,
                tgl_masuk: tgl_masuk,
                tgl_lahir: tgl_lahir,
                tempat_lahir: tempat_lahir,
                jenis_kelamin: jenis_kelamin,
                alamat: alamat,
                nohp: nohp,
                email: email
            },
            dataType: "json",
            success: function(data) {
                if (data.error) {
                    if (data.error.nama_pegawai) {
                        $(".nama_pegawai").html(data.error.nama_pegawai);
                    } else {
                        $(".nama_pegawai").html("");
                    }

                    if (data.error.email) {
                        $(".email").html(data.error.email);
                    } else {
                        $(".email").html("");
                    }
                } else {
                    $(".nama_pegawai").html("");
                    $(".email").html("");

                    if (data.status == 200) {
                        iziToast.success({
                            title: 'Success',
                            timeout: 3000,
                            message: data.message,
                            position: 'topCenter',
                            transitionIn: 'flipInX',
                            transitionOut: 'flipOutX'
                        });

                        setTimeout(() => {
                            window.location = "<?= base_url('index.php/profile'); ?>"
                        }, 2000);
                    } else {
                        iziToast.error({
                            title: 'Error',
                            timeout: 3000,
                            message: "Data diri gagal di ubah",
                            position: 'topCenter',
                            transitionIn: 'flipInX',
                            transitionOut: 'flipOutX'
                        });
                    }
                }
            }
        });
        e.preventDefault();
    });
</script>

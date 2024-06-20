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
        <div class="form-group">
            <label for="lokasi">Lokasi<small class="text-danger">*</small></label>
            <input type="text" name="lokasi" readonly class="form-control" id="lokasi" placeholder="">
        </div>
        <button type="submit" class="btn btn-block btn-primary edit-data-diri">Masuk</button>
    </form>
</div>
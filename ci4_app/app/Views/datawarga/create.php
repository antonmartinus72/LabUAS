<?= $this->include('layout/navbar'); ?>

<div class="form-container m-4">
    <form action="/Datawarga/save" method="POST">
        <?= csrf_field(); ?>
        <div class="row mb-3">
            <label for="nik" class="col-sm-2 col-form-label">NIK</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="nik" name="nik" autofocus>
            </div>
        </div>
        <div class="row mb-3">
            <label for="nama" class="col-sm-2 col-form-label">Nama</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="nama" name="nama">
            </div>
        </div>
        <fieldset class="row mb-3">
            <legend class="col-form-label col-sm-2 pt-0">Kelamin</legend>
            <div class="col-sm-10">
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="kelamin" id="kelaminL" value="L" checked>
                    <label class="form-check-label" for="kelaminL">
                        Laki-Laki
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="kelamin" id="KelaminP" value="P">
                    <label class="form-check-label" for="KelaminP">
                        Perempuan
                    </label>
                </div>
            </div>
        </fieldset>
        <div class="row mb-3">
            <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="alamat" name="alamat">
            </div>
        </div>
        <div class="row mb-3">
            <label for="no_rumah" class="col-sm-2 col-form-label">Nomor Rumah</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="no_rumah" name="no_rumah">
            </div>
        </div>
        <fieldset class="row mb-3">
            <legend class="col-form-label col-sm-2 pt-0">Status</legend>
            <div class="col-sm-10">
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="status" id="berkeluarga" value="1" checked>
                    <label class="form-check-label" for="berkeluarga">
                        Berkeluarga
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="status" id="belum_berkeluarga" value="0">
                    <label class="form-check-label" for="belum_berkeluarga">
                        Belum Berkeluarga
                    </label>
                </div>
            </div>
        </fieldset>
        <button type="submit" class="btn btn-primary">Tambah Data</button>
    </form>

</div>



<?= $this->include('layout/end-template'); ?>
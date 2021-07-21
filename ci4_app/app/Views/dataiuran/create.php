<?= $this->include('layout/navbar'); ?>

<div class="form-container m-4">
    <form action="/Dataiuran/save" method="POST">
        <?= csrf_field(); ?>
        <div class="row mb-3">
            <label for="nik" class="col-sm-2 col-form-label">NIK</label>
            <div class="col-sm-10">
                <input class="form-control" list="nik" name="nik" autofocus>
                <datalist id="nik">
                    <?php foreach ($warga as $key => $value) : ?>

                        <option value="<?= $value->nik; ?>"> <?= $value->nama; ?>

                        <?php endforeach; ?>
                </datalist>
            </div>
        </div>
        <div class="row mb-3">
            <label for="keterangan" class="col-sm-2 col-form-label">Keterangan</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="keterangan" name="keterangan">
            </div>
        </div>
        <div class="row mb-3">
            <label for="tanggal" class="col-sm-2 col-form-label">Tanggal Transaksi</label>
            <div class="col-sm-10">
                <input type="date" class="form-control" id="tanggal" name="tanggal">
            </div>
        </div>

        <div class="row mb-3">
            <label for="bulan" class="col-sm-2 col-form-label">Bulan & Tahun</label>
            <div class="col-sm-10">
                <input type="month" min="2018-03" value="2018-05" class="form-control" id="bulan" name="bulan" maxlength="4">
            </div>
        </div>
        <div class="row mb-3">
            <label for="jumlah" class="col-sm-2 col-form-label">Jumlah</label>
            <div class="col-sm-10">
                <input type="number" class="form-control" id="jumlah" name="jumlah" maxlength="7">
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Tambah Data</button>
    </form>

</div>



<?= $this->include('layout/end-template'); ?>
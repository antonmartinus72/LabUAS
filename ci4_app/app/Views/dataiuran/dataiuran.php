<?= $this->include('layout/navbar'); ?>
<div>

    <div class="d-flex justify-content-between">
        <div><a href="Dataiuran/create" class="me-auto btn btn-primary m-3">Tambah Iuran Warga</a></div>

    </div>
</div>
<?php if (session()->getFlashdata('pesan')) : ?>
    <div class="c-alert-success">
        <?= session()->getFlashdata('pesan'); ?>
    </div>
<?php endif; ?>
<?php if (session()->getFlashdata('pesanError')) : ?>
    <div class="c-alert-danger">
        <?= session()->getFlashdata('pesanError'); ?>
    </div>
<?php endif; ?>
<table class="table">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Nama</th>
            <th scope="col">NIK</th>
            <th scope="col">Keterangan</th>
            <th scope="col">Tanggal Transaksi</th>
            <th scope="col">Bulan</th>
            <th scope="col">Tahun</th>
            <th scope="col">Jumlah</th>
        </tr>
    </thead>
    <tbody>
        <?php $no = 1; ?>
        <?php foreach ($iuran as $key => $value) : ?>
            <tr>
                <th scope="row">
                    <?= $no;
                    $no++; ?>
                </th>
                <td><?= $value->nama; ?></td>
                <td><?= $value->nik; ?></td>
                <td><?= $value->keterangan; ?></td>
                <td><?= $value->tanggal; ?></td>
                <td><?= $value->bulan; ?></td>
                <td><?= $value->tahun; ?></td>
                <td>Rp.<?= $value->jumlah; ?></td>
            </tr>
        <?php endforeach; ?>

    </tbody>
</table>


<?= $this->include('layout/end-template'); ?>
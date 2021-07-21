<?= $this->include('layout/navbar'); ?>
<div>

    <div class="d-flex justify-content-between">
        <div><a href="datawarga/create" class="me-auto btn btn-primary m-3">Tambah Data Warga</a></div>
        <?php if (session()->getFlashdata('pesan')) : ?>
            <div class="alert alert-success" role="alert">
                <?= session()->getFlashdata('pesan'); ?>
            </div>
        <?php endif; ?>

    </div>
</div>
<table class="table">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Id</th>
            <th scope="col">NIK</th>
            <th scope="col">Nama</th>
            <th scope="col">Kelamin</th>
            <th scope="col">Alamat</th>
            <th scope="col">No. Rumah</th>
            <th scope="col">Status</th>
            <th scope="col">Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php $no = 1; ?>
        <?php foreach ($warga as $i) : ?>
            <tr>
                <th scope="row">
                    <?= $no;
                    $no++; ?>
                </th>
                <td><?= $i['id']; ?></td>
                <td><?= $i['nik']; ?></td>
                <td><?= $i['nama']; ?></td>
                <td><?= $i['kelamin']; ?></td>
                <td><?= $i['alamat']; ?></td>
                <td><?= $i['no_rumah']; ?></td>
                <td>
                    <?php if ($i['status'] == 0) {
                        echo "Tidak Berkeluarga";
                    } else {
                        echo "Berkeluarga";
                    } ?>
                </td>
                <td>
                    <a href="/Datawarga/edit/<?= $i['id']; ?>" class="btn btn-warning">Ubah</a>

                    <form action="/Datawarga/<?= $i['id']; ?>" method="POST" class="d-inline">
                        <?= csrf_field(); ?>
                        <input type="hidden" name="_method" value="DELETE">
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Hapus data ini?')">Hapus</a>

                    </form>


                </td>
            </tr>
            <?php  ?>
        <?php endforeach; ?>

    </tbody>
</table>


<?= $this->include('layout/end-template'); ?>
<?= $this->include('layout/navbar'); ?>

<table class="table">
    <thead>
        <tr class="mx-2">
            <th scope="col ">#</th>
            <th scope="col">Nama</th>
            <th scope="col">NIK</th>
            <th scope="col">Lunas</th>

        </tr>
    </thead>
    <tbody>
        <?php $no = 1; ?>
        <?php foreach ($iuran as $i) : ?>
            <tr class="mx-2">
                <th scope="row">
                    <?= $no;
                    $no++; ?>
                </th>
                <td><?= $i['nama']; ?></td>
                <td><?= $i['nik']; ?></td>
                <?php foreach ($i['bulan'] as $j) : ?>
                    <td>
                        <span class="badge bg-secondary"><?= $j == 1 ? 'Januari' : ''; ?></span>
                        <span class="badge bg-secondary"><?= $j == 2 ? 'Februari' : ''; ?></span>
                        <span class="badge bg-secondary"><?= $j == 3 ? 'Maret' : ''; ?></span>
                        <span class="badge bg-secondary"><?= $j == 4 ? 'April' : ''; ?></span>
                        <span class="badge bg-secondary"><?= $j == 5 ? 'Mei' : ''; ?></span>
                        <span class="badge bg-secondary"><?= $j == 6 ? 'Juni' : ''; ?></span>
                        <span class="badge bg-secondary"><?= $j == 7 ? 'Juli' : ''; ?></span>
                        <span class="badge bg-secondary"><?= $j == 8 ? 'Agustus' : ''; ?></span>
                        <span class="badge bg-secondary"><?= $j == 9 ? 'September' : ''; ?></span>
                        <span class="badge bg-secondary"><?= $j == 10 ? 'Oktober' : ''; ?></span>
                        <span class="badge bg-secondary"><?= $j == 11 ? 'November' : ''; ?></span>
                        <span class="badge bg-secondary"><?= $j == 12 ? 'Desember' : ''; ?></span>
                    </td>
                <?php endforeach; ?>


            </tr>
        <?php endforeach; ?>

    </tbody>
</table>


<?= $this->include('layout/end-template'); ?>
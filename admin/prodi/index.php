<?php include_once '../templates/header.php' ?>
<?php $prodi = query("SELECT * FROM tabel_prodi ORDER BY id_prodi DESC"); ?>
<?php security([1, 2]); ?>

<!-- content -->
<div class="container card shadow py-5 my-5">
    <h1 class="text-primary mb- font-title mb-5">Prodi</h1>

    <?php if (isset($_SESSION['berhasil'])) : ?>
        <div class="alert alert-primary" role="alert">
            <?= $_SESSION['berhasil']; ?>
            <?php unset($_SESSION['berhasil']) ?>
        </div>
    <?php endif ?>

    <div class="mb-3">
        <a class="btn btn-primary" href="<?= $base_url . 'admin/prodi/tambah'; ?>" role="button">Tambah</a>
    </div>

    <div class="table-responsive">
        <table class="table table-hover table-bordered" id="data-table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Prodi</th>
                    <th scope="col">Akreditasi</th>
                    <th scope="col">Keterangan</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1 ?>
                <?php foreach ($prodi as $row) : ?>
                    <tr>
                        <th scope="row"><?= $i++; ?></th>
                        <td><?= $row['prodi']; ?></td>
                        <td><?= $row['akreditasi']; ?></td>
                        <td><?= $row['keterangan']; ?></td>
                        <td class="text-nowrap">
                            <a class="btn btn-warning" href="<?= $base_url . 'admin/prodi/ubah?id=' . $row['id_prodi']; ?>" role="button">Ubah</a>

                            <button type="button" class="btn btn-danger btn-modal-delete" data-bs-toggle="modal" data-bs-target="#exampleModal" data-url="<?= $base_url . 'admin/prodi/hapus?id=' . $row['id_prodi']; ?>">
                                Hapus
                            </button>

                        </td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>

</div>
<!-- end content -->

<?php include_once '../templates/footer.php' ?>
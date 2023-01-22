<?php include_once '../templates/header.php' ?>
<?php $user = query("SELECT * FROM tabel_user ORDER BY id_user DESC"); ?>

<!-- content -->
<div class="container card shadow py-5 my-5">
    <h1 class="text-primary mb- font-title mb-5">User</h1>

    <?php if (isset($_SESSION['berhasil'])) : ?>
        <div class="alert alert-primary" role="alert">
            <?= $_SESSION['berhasil']; ?>
            <?php unset($_SESSION['berhasil']) ?>
        </div>
    <?php endif ?>

    <div class="mb-3">
        <a class="btn btn-primary" href="<?= $base_url . 'admin/user/tambah'; ?>" role="button">Tambah</a>
    </div>

    <div class="table-responsive">
        <table class="table table-hover table-bordered" id="data-table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Username</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Profil</th>
                    <th scope="col">Aktif</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1 ?>
                <?php foreach ($user as $row) : ?>
                    <tr>
                        <th scope="row"><?= $i++; ?></th>
                        <td><?= $row['username']; ?></td>
                        <td><?= $row['nama']; ?></td>
                        <td><?= $row['profil'] == 1 ? 'Superadmin' : 'Admin'; ?></td>
                        <td><?= $row['aktif'] == 1 ? 'Yes' : 'No'; ?></td>
                        <td>
                            <a class="btn btn-warning" href="<?= $base_url . 'admin/user/ubah?id=' . $row['id_user']; ?>" role="button">Ubah</a>

                            <button type="button" class="btn btn-danger btn-modal-delete" data-bs-toggle="modal" data-bs-target="#exampleModal" data-url="<?= $base_url . 'admin/user/hapus?id=' . $row['id_user']; ?>">
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
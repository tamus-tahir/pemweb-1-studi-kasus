<?php include_once '../templates/header.php' ?>

<?php

global $koneksi;
$result = mysqli_query($koneksi, "SELECT * FROM tabel_user ORDER BY id_user DESC");
$user = [];
while ($data = mysqli_fetch_assoc($result)) {
    $user[] = $data;
}

?>
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
        <table class="table table-hover table-bordered">
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

                        </td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>

</div>
<!-- end content -->

<?php include_once '../templates/footer.php' ?>
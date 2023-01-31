<?php include_once '../templates/header.php' ?>

<?php

$user = query('SELECT * FROM tabel_user');
$berita = query('SELECT * FROM tabel_berita');
$prodi = query('SELECT * FROM tabel_prodi');
$pendaftaran = query('SELECT * FROM tabel_pendaftaran');
?>

<?php security(); ?>

<!-- content -->
<div class="container card shadow py-5 my-5">
    <h1 class="text-primary mb- font-title mb-5">Dashboard</h1>

    <?php if (isset($_SESSION['berhasil'])) : ?>
        <div class="alert alert-primary" role="alert">
            <?= $_SESSION['berhasil']; ?>
            <?php unset($_SESSION['berhasil']) ?>
        </div>
    <?php endif ?>

    <?php if (isset($_SESSION['gagal'])) : ?>
        <div class="alert alert-danger" role="alert">
            <?= $_SESSION['gagal']; ?>
            <?php unset($_SESSION['gagal']) ?>
        </div>
    <?php endif ?>

    <div class="row justify-content-center g-3">

        <div class="col-md-3">
            <div class="card shadow text-center p-3">
                <h1 class="text-primary"><i class="fa-solid fa-users"></i></h1>
                <h1><?= count($user); ?></h1>
                <h6>USER</h6>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card shadow text-center p-3">
                <h1 class="text-primary"><i class="fa-solid fa-newspaper"></i></h1>
                <h1><?= count($berita); ?></h1>
                <h6>BERITA</h6>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card shadow text-center p-3">
                <h1 class="text-primary"><i class="fa-solid fa-building"></i></h1>
                <h1><?= count($prodi); ?></h1>
                <h6>PRODI</h6>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card shadow text-center p-3">
                <h1 class="text-primary"><i class="fa-solid fa-user-graduate"></i></h1>
                <h1><?= count($pendaftaran); ?></h1>
                <h6>PENDAFTARAN</h6>
            </div>
        </div>

    </div>

</div>
<!-- end content -->

<?php include_once '../templates/footer.php' ?>
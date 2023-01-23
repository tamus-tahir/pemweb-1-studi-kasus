<?php include_once '../templates/header.php' ?>

<?php security(); ?>

<!-- content -->
<div class="container card shadow py-5 my-5">
    <h1 class="text-primary mb- font-title ">Dashboard</h1>

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

</div>
<!-- end content -->

<?php include_once '../templates/footer.php' ?>
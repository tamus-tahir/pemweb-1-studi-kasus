<?php include_once '../templates/header.php' ?>
<?php include_once 'function_tambah.php' ?>

<!-- content -->
<div class="container card shadow py-5 my-5">
    <h1 class="text-primary mb- font-title mb-3">Tambah User</h1>

    <?php if (isset($_SESSION['error'])) : ?>
        <div class="alert alert-danger" role="alert">
            <?= $_SESSION['error']; ?>
            <?php unset($_SESSION['error']) ?>
        </div>
    <?php endif ?>
    <?php if (isset($_SESSION['gagal'])) : ?>
        <div class="alert alert-danger" role="alert">
            <?= $_SESSION['gagal']; ?>
            <?php unset($_SESSION['gagal']) ?>
        </div>
    <?php endif ?>

    <form method="post" action="" class="row g-3">

        <div class="col-md-6">
            <label for="nama" class="form-label">Nama <span class="text-danger">*</span></label>
            <input type="text" class="form-control" id="nama" name="nama" required>
        </div>
        <div class="col-md-6">
            <label for="username" class="form-label">Username <span class="text-danger">*</span></label>
            <input type="text" class="form-control" id="username" name="username" required>
        </div>
        <div class="col-md-6">
            <label for="password" class="form-label">Password <span class="text-danger">*</span></label>
            <input type="password" class="form-control" id="password" name="password" required>
        </div>
        <div class="col-md-6">
            <label for="konfirmasi_password" class="form-label">Konfirmasi Password <span class="text-danger">*</span></label>
            <input type="password" class="form-control" id="konfirmasi_password" name="konfirmasi_password" required>
        </div>

        <div class="col-md-4">
            <label for="profil" class="form-label">Profil <span class="text-danger">*</span></label>
            <select class="form-select" id="profil" name="profil" required>
                <option value="">-- Pilih Profil User --</option>
                <option value="1">Superadmin</option>
                <option value="2">Admin</option>
            </select>
        </div>

        <div class="col-md-4">
            <label for="aktif" class="form-label">Aktif <span class="text-danger">*</span></label>
            <select class="form-select" id="aktif" name="aktif" required>
                <option value="1">Yes</option>
                <option value="2">No</option>
            </select>
        </div>

        <div>
            <a href="<?= $base_url . 'admin/user/index'; ?>" class="btn btn-danger me-2">Kembali</a>
            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>

</div>
<!-- end content -->

<?php include_once '../templates/footer.php' ?>
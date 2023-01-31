<?php include_once 'templates/header.php' ?>
<?php $prodi = query("SELECT * FROM tabel_prodi ORDER BY id_prodi DESC"); ?>

<!-- content -->
<section class="py-5">
    <div class="container">
        <h1 class="text-center text-primary mb-5 font-title">Pendaftaran</h1>

        <div class="card shadow p-4">

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

            <form action="<?= $base_url . 'proses/pendaftaran.php'; ?>" class="row justify-content-center g-3 mb-3" method="post">

                <div class="col-md-6">
                    <label for="nama" class="form-label">Nama <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="nama" name="nama" required>
                </div>

                <div class="col-md-3">
                    <label for="gender" class="form-label">Jenis Kelamin <span class="text-danger">*</span></label>
                    <select class="form-select" id="gender" name="gender" required>
                        <option value="1">Laki-Laki</option>
                        <option value="2">Perempuan</option>
                    </select>
                </div>

                <div class="col-md-3">
                    <label for="telpon" class="form-label">Telpon <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="telpon" name="telpon" required>
                </div>

                <div class="col-md-8">
                    <label for="sekolah" class="form-label">Asal Sekolah <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="sekolah" name="sekolah" required>
                </div>

                <div class="col-md-4">
                    <label for="id_prodi" class="form-label">Prodi <span class="text-danger">*</span></label>
                    <select class="form-select" id="id_prodi" name="id_prodi" required>
                        <option value="">-- Pilih Prodi --</option>
                        <?php foreach ($prodi as $row) : ?>
                            <option value="<?= $row['id_prodi']; ?>"><?= $row['prodi']; ?></option>
                        <?php endforeach ?>
                    </select>
                </div>

                <div>
                    <button type="submit" name="submit" class="btn btn-primary">Kirim</button>
                </div>

            </form>

        </div>

    </div>
</section>
<!-- end content -->

<?php include_once 'templates/footer.php' ?>
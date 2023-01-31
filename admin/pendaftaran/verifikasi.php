<?php include_once '../templates/header.php' ?>
<?php include_once 'function_verifikasi.php' ?>
<?php security([1, 2]); ?>

<?php
$id_pendaftaran = $_GET['id'];
$pendaftaran = query("SELECT * FROM tabel_pendaftaran JOIN tabel_prodi ON tabel_prodi.id_prodi = tabel_pendaftaran.id_prodi WHERE id_pendaftaran = $id_pendaftaran")[0];
?>
<!-- content -->
<div class="container card shadow py-5 my-5">
    <h1 class="text-primary mb- font-title mb-3">Verifikasi</h1>

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

    <form action="" method="post" class="row g-3">

        <div class="col-md-8">
            <table class="table mb-3">
                <tr>
                    <td width="170">Nama</td>
                    <td width="5">:</td>
                    <td><?= $pendaftaran['nama']; ?></td>
                </tr>
                <tr>
                    <td>Telpon</td>
                    <td>:</td>
                    <td><?= $pendaftaran['telpon']; ?></td>
                </tr>
                <tr>
                    <td>Asal Sekolah</td>
                    <td>:</td>
                    <td><?= $pendaftaran['sekolah']; ?></td>
                </tr>
                <tr>
                    <td>Prodi</td>
                    <td>:</td>
                    <td><?= $pendaftaran['prodi']; ?></td>
                </tr>
                <tr>
                    <td>Tanggal pendaftaran</td>
                    <td>:</td>
                    <td><?= tanggalIndo($pendaftaran['tanggal']); ?></td>
                </tr>

            </table>
        </div>

        <div class="col-md-4">
            <label for="status" class="form-label">Verifikasi Pendaftaran <span class="text-danger">*</span></label>
            <select class="form-select" id="status" name="status" required>
                <option value="">-- Pilih Verifikasi --</option>
                <option value="1" <?= $pendaftaran['status'] == 1 ? 'selected' : ''; ?>>Belum Diverifikasi</option>
                <option value="2" <?= $pendaftaran['status'] == 2 ? 'selected' : ''; ?>>Pendaftaran Distujui</option>
                <option value="3" <?= $pendaftaran['status'] == 3 ? 'selected' : ''; ?>>Lulus</option>
                <option value="4" <?= $pendaftaran['status'] == 4 ? 'selected' : ''; ?>>Pendaftaran Ditolak</option>
            </select>
        </div>


        <input type="hidden" name="id_pendaftaran" value="<?= $pendaftaran['id_pendaftaran']; ?>">

        <div class="text-end">
            <a href="<?= $base_url . 'admin/pendaftaran/index'; ?>" class="btn btn-danger me-2">Kembali</a>
            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
        </div>

    </form>

</div>
<!-- end content -->

<?php include_once '../templates/footer.php' ?>
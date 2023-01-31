<?php include_once '../templates/header.php' ?>
<?php include_once 'function_ubah.php' ?>
<?php security([1, 2]); ?>
<?php
$id_berita = $_GET['id'];
$berita = query("SELECT * FROM tabel_berita WHERE id_berita = $id_berita")[0];
?>

<!-- content -->
<div class="container card shadow py-5 my-5">
    <h1 class="text-primary mb- font-title mb-3">Ubah Berita</h1>

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

    <form method="post" action="" class="row g-3" enctype="multipart/form-data">

        <div class="col-12">
            <label for="judul" class="form-label">Judul <span class="text-danger">*</span></label>
            <input type="text" class="form-control" id="judul" name="judul" required value="<?= $berita['judul']; ?>">
        </div>
        <div class="col-md-6">
            <label for="tanggal" class="form-label">Tanggal <span class="text-danger">*</span></label>
            <input type="date" class="form-control" id="tanggal" name="tanggal" required value="<?= $berita['tanggal']; ?>">
        </div>
        <div class="col-md-6">
            <label for="publish" class="form-label">Publish <span class="text-danger">*</span></label>
            <select class="form-select" id="publish" name="publish" required>
                <option value="1" <?= $berita['publish'] == 1 ? 'selected' : ''; ?>>Yes</option>
                <option value="2" <?= $berita['publish'] == 2 ? 'selected' : ''; ?>>No</option>
            </select>
        </div>

        <div class="col-12">
            <label for="isi" class="form-label">isi <span class="text-danger">*</span></label>
            <textarea name="isi" id="isi" class="form-control ckeditor" cols="30" rows="2" required><?= $berita['isi']; ?></textarea>
        </div>

        <div class="col-md-6">
            <label for="sampul" class="form-label">Sampul <span class="text-danger">* (Tipe PNG, JPG, JPEG, MaxSize 500Kb)</span></label>
            <input type="file" class="form-control" id="upload-img" name="sampul">
        </div>

        <img src="<?= $base_url . 'assets/uploads/' . $berita['sampul']; ?>" alt="" width="100%" height="400px" id="preview-img">

        <input type="hidden" name="sampul_lama" value="<?= $berita['sampul']; ?>">
        <input type="hidden" name="id_berita" value="<?= $berita['id_berita']; ?>">

        <div>
            <a href="<?= $base_url . 'admin/berita/index'; ?>" class="btn btn-danger me-2">Kembali</a>
            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>

</div>
<!-- end content -->

<?php include_once '../templates/footer.php' ?>
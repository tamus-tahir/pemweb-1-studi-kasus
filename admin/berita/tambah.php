<?php include_once '../templates/header.php' ?>
<?php include_once 'function_tambah.php' ?>
<?php security([1, 2]); ?>

<!-- content -->
<div class="container card shadow py-5 my-5">
    <h1 class="text-primary mb- font-title mb-3">Tambah Berita</h1>

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
            <input type="text" class="form-control" id="judul" name="judul" required>
        </div>
        <div class="col-md-6">
            <label for="tanggal" class="form-label">Tanggal <span class="text-danger">*</span></label>
            <input type="date" class="form-control" id="tanggal" name="tanggal" required>
        </div>
        <div class="col-md-6">
            <label for="publish" class="form-label">Publish <span class="text-danger">*</span></label>
            <select class="form-select" id="publish" name="publish" required>
                <option value="1">Yes</option>
                <option value="2">No</option>
            </select>
        </div>

        <div class="col-12">
            <label for="isi" class="form-label">isi <span class="text-danger">*</span></label>
            <textarea name="isi" id="isi" class="form-control ckeditor" cols="30" rows="2" required></textarea>
        </div>

        <div class="col-md-6">
            <label for="sampul" class="form-label">Sampul <span class="text-danger">* (Tipe PNG, JPG, JPEG, MaxSize 500Kb)</span></label>
            <input type="file" class="form-control" id="upload-img" name="sampul" required>
        </div>

        <img src="<?= $base_url . 'assets/images/no-image.png'; ?>" alt="" width="100%" height="400px" id="preview-img">

        <div>
            <a href="<?= $base_url . 'admin/berita/index'; ?>" class="btn btn-danger me-2">Kembali</a>
            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>

</div>
<!-- end content -->

<?php include_once '../templates/footer.php' ?>
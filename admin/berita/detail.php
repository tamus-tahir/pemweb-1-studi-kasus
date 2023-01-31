<?php include_once '../templates/header.php' ?>
<?php security([1, 2]); ?>
<?php
$id_berita = $_GET['id'];
$berita = query("SELECT * FROM tabel_berita WHERE id_berita = $id_berita")[0];
?>

<!-- content -->
<div class="container card shadow py-5 my-5">
    <h1 class="text-primary mb- font-title mb-3">Detail Berita</h1>

    <p class="fw-bold"><?= $berita['judul']; ?></p>

    <img src="<?= $base_url . 'assets/uploads/' . $berita['sampul']; ?>" alt="<?= $berita['judul']; ?>" class="w-100 rounded">

    <p class="fw-bold"><?= tanggalIndo($berita['tanggal']); ?></p>

    <div>
        <?= $berita['isi']; ?>
    </div>

    <div>
        <a href="<?= $base_url . 'admin/berita/index'; ?>" class="btn btn-danger me-2">Kembali</a>
    </div>

</div>
<!-- end content -->

<?php include_once '../templates/footer.php' ?>
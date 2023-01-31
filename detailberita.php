<?php include_once 'templates/header.php' ?>

<?php
$id_berita = $_GET['id'];
$berita = query("SELECT * FROM tabel_berita WHERE id_berita = $id_berita")[0];
?>

<!-- content -->
<section class="py-5">
    <div class="container">
        <h1 class="text-center text-primary mb-5 font-title"><?= $berita['judul']; ?></h1>

        <div class="card shadow">
            <img src="<?= $base_url . 'assets/uploads/' . $berita['sampul']; ?>" alt="<?= $berita['judul']; ?>" class="w-100 rounded mb-3">

            <div class="card-body">
                <p class="fw-bold"><?= tanggalIndo($berita['tanggal']); ?></p>

                <div>
                    <?= $berita['isi']; ?>
                </div>

                <div>
                    <a href="<?= $base_url; ?>" class="btn btn-primary me-2">Beranda</a>
                    <a href="<?= $base_url . 'berita'; ?>" class="btn btn-success me-2">Berita</a>
                </div>
            </div>

        </div>

    </div>
</section>
<!-- end content -->

<?php include_once 'templates/footer.php' ?>
<?php include_once 'templates/header.php' ?>

<!-- content -->
<section class="py-5">
    <div class="container">
        <h1 class="text-center text-primary mb-5 font-title">Berita</h1>

        <form action="" class="row justify-content-center g-3 mb-3">

            <div class="col-md-8">
                <input type="text" class="form-control" placeholder="Cari Berita ...." name="keyword">
            </div>
            <div class="col-md-2">
                <button class="btn btn-primary w-100" type="submit">Cari</button>
            </div>
            <div class="col-md-2">
                <a class="btn btn-warning w-100" type="submit" href="<?= $base_url . 'berita'; ?>">Reset</a>
            </div>

        </form>

        <?php

        if (isset($_GET['keyword'])) {
            $keyword = $_GET['keyword'];
            $berita = query("SELECT * FROM tabel_berita WHERE publish = 1 AND judul LIKE '%$keyword%' ORDER BY tanggal DESC");
        } else {
            $berita = query("SELECT * FROM tabel_berita WHERE publish = 1 ORDER BY tanggal DESC");
        }
        ?>
        <div class="row justify-content-center g-3">

            <?php foreach ($berita as $row) : ?>
                <div class="col-md-4">
                    <div class="card">
                        <img src="<?= $base_url . 'assets/uploads/' . $row['sampul']; ?>" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title"><?= $row['judul']; ?></h5>
                            <p class="card-text"><?= substr($row['isi'], 0, 200); ?> .....</p>
                            <a href="<?= $base_url . 'detailberita?id=' . $row['id_berita']; ?>" class="btn btn-primary">Selengkapnya</a>
                        </div>
                    </div>
                </div>
            <?php endforeach ?>

        </div>

    </div>
</section>
<!-- end content -->

<?php include_once 'templates/footer.php' ?>
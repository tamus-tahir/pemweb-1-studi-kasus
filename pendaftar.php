<?php include_once 'templates/header.php' ?>

<?php
if (isset($_GET['keyword'])) {
    $keyword = $_GET['keyword'];
    $pendaftaran = query("SELECT * FROM tabel_pendaftaran JOIN tabel_prodi ON tabel_prodi.id_prodi = tabel_pendaftaran.id_prodi AND telpon LIKE '%$keyword%' ORDER BY id_pendaftaran DESC");
}
?>

<!-- content -->
<section class="py-5">
    <div class="container">
        <h1 class="text-center text-primary mb-5 font-title">Cek Data</h1>


        <form action="" class="row justify-content-center g-3 mb-3">

            <div class="col-md-8">
                <input type="text" class="form-control" placeholder="Cari data berdasarkan nomor telpon" name="keyword">
            </div>
            <div class="col-md-2">
                <button class="btn btn-primary w-100" type="submit">Cari</button>
            </div>
            <div class="col-md-2">
                <a class="btn btn-warning w-100" type="submit" href="<?= $base_url . 'pendaftar'; ?>">Reset</a>
            </div>

        </form>

        <div class="card shadow mb-3 p-3">

            <!-- jika user melakukan pencarian -->
            <?php if (isset($pendaftaran)) : ?>

                <?php if ($pendaftaran) : ?>

                    <!-- jika user belum melakukan pencarian dan data ada -->
                    <?php foreach ($pendaftaran as $pendaftaran) : ?>
                        <table class="table mb-3">
                            <tr>
                                <td width="170">Nama</td>
                                <td width="5">:</td>
                                <td><?= $pendaftaran['nama']; ?></td>
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
                            <tr>
                                <td>Status</td>
                                <td>:</td>
                                <td><?= getStatus($pendaftaran['status']); ?></td>
                            </tr>
                        </table>

                    <?php endforeach ?>
                <?php else : ?>
                    <!-- jika user belum melakukan pencarian dan data tidak ada -->
                    <h6 class="text-danger">Data tidak ditemukan</h6>
                <?php endif ?>

            <?php else : ?>
                <!-- jika user  belum melakukan pencarian -->
                <h6>Lakukan pencarian data pada form input dengan memasukan nomor telpon pada saat pendaftaran</h6>
            <?php endif ?>

        </div>

    </div>
</section>
<!-- end content -->

<?php include_once 'templates/footer.php' ?>
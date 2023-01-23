<?php include_once '../../config/autoload.php' ?>

<!doctype html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="Tamus D Tahir">
    <meta name="keywords" content="Pemograman Web, Unitama, Akba">
    <meta name="description" content="Website ini merupakan studi kasus pada Mata Kuliah Pemograman Web di Universita Teknologi Akba Makassar">

    <link rel="icon" href="<?= $base_url . 'assets/images/logo.png'; ?>">

    <title>UNITAMA || <?= strtoupper($uri_segment[3]); ?></title>

    <!-- font -->
    <link href="https://fonts.googleapis.com/css2?family=Acme&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Kaushan+Script&display=swap" rel="stylesheet">
    <!-- end font -->

    <link href="<?= $base_url . 'assets/plugins/bootstrap/bootstrap.css'; ?>" rel="stylesheet">
    <link href="<?= $base_url . 'assets/plugins/datatables/dataTables.bootstrap5.min.css'; ?>" rel="stylesheet">
    <link href="<?= $base_url . 'assets/plugins/fontawesome-free-6.2.1/css/all.css'; ?>" rel="stylesheet">
    <link href="<?= $base_url . 'assets/css/style.css'; ?>" rel="stylesheet">
</head>

<body>

    <!-- nav -->
    <nav class="navbar navbar-expand-lg bg-body-tertiary bg-primary navbar-dark fw-bold">
        <div class="container">

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav ">
                    <a class="nav-link <?= $uri_segment[3] == 'dashboard' ? 'active' : ''; ?>" href="<?= $base_url . 'admin/dashboard/index'; ?>">DASHBOARD</a>

                    <!-- cek jika user adalah superadmin -->
                    <?php if ($_SESSION['profil'] == 1) : ?>
                        <a class="nav-link <?= $uri_segment[3] == 'user' ? 'active' : ''; ?>" href="<?= $base_url . 'admin/user/index'; ?>">USER</a>
                    <?php endif ?>
                    <!-- end cek jika user adalah superadmin -->


                    <a class="nav-link <?= $uri_segment[3] == 'berita' ? 'active' : ''; ?>" href="<?= $base_url . 'admin/berita/index'; ?>">BERITA</a>
                    <a class="nav-link <?= $uri_segment[3] == 'prodi' ? 'active' : ''; ?>" href="<?= $base_url . 'admin/prodi/index'; ?>">PRODI</a>

                    <a class="nav-link <?= $uri_segment[3] == 'pendaftaran' ? 'active' : ''; ?>" href="<?= $base_url . 'admin/pendaftaran/index'; ?>">PENDAFTARAN</a>

                    <a class="nav-link" href="<?= $base_url; ?>">BERANDA</a>
                    <a class="nav-link" href="" data-bs-toggle="modal" data-bs-target="#logoutModal">LOGOUT</a>
                </div>
            </div>
        </div>
    </nav>
    <!-- end nav -->
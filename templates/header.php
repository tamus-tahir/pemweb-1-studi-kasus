<?php include_once 'config/autoload.php' ?>

<!doctype html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="Tamus D Tahir">
    <meta name="keywords" content="Pemograman Web, Unitama, Akba">
    <meta name="description" content="Website ini merupakan studi kasus pada Mata Kuliah Pemograman Web di Universita Teknologi Akba Makassar">

    <link rel="icon" href="<?= $base_url . 'assets/images/logo.png'; ?>">

    <title>UNITAMA || <?= strtoupper($uri_segment[2] ? $uri_segment[2] : 'BERANDA'); ?></title>

    <!-- font -->
    <link href="https://fonts.googleapis.com/css2?family=Acme&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Kaushan+Script&display=swap" rel="stylesheet">
    <!-- end font -->

    <link href="<?= $base_url . 'assets/plugins/bootstrap/bootstrap.css'; ?>" rel="stylesheet">
    <link href="<?= $base_url . 'assets/plugins/fontawesome-free-6.2.1/css/all.css'; ?>" rel="stylesheet">
    <link href="<?= $base_url . 'assets/css/style.css'; ?>" rel="stylesheet">
</head>

<body>

    <!-- nav -->
    <nav class="navbar navbar-expand-lg bg-body-tertiary bg-primary navbar-dark fw-bold">
        <div class="container">
            <a class="navbar-brand" href="<?= $base_url; ?>">
                <img src="<?= $base_url . 'assets/images/logo-brand.png'; ?>" alt="Logo" width="160" height="40" class="d-inline-block align-text-top">
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav ms-auto">
                    <a class="nav-link <?= $uri_segment[2] == '' ? 'active' : ''; ?>" href="<?= $base_url; ?>">BERANDA</a>
                    <a class="nav-link <?= $uri_segment[2] == 'berita' || $uri_segment[2] == 'detailberita' ? 'active' : ''; ?>" href="<?= $base_url . 'berita'; ?>">BERITA</a>
                    <a class="nav-link <?= $uri_segment[2] == 'pendaftaran' ? 'active' : ''; ?>" href="<?= $base_url . 'pendaftaran'; ?>">PENDAFTARAN</a>
                    <a class="nav-link <?= $uri_segment[2] == 'pendaftar' ? 'active' : ''; ?>" href="<?= $base_url . 'pendaftar'; ?>">CEK DATA</a>

                    <!-- ini hanya muncul ketika user telah berhasil login -->
                    <?php if (isset($_SESSION['id_user'])) : ?>
                        <a class="nav-link" href="<?= $base_url . 'admin/dashboard/index'; ?>">DASHBOARD</a>
                    <?php endif ?>
                </div>
            </div>
        </div>
    </nav>
    <!-- end nav -->
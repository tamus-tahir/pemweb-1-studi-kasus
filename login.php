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

    <style>
        img {
            width: 200px;
        }

        .content {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            min-width: 350px;
        }
    </style>
</head>

<body class="bg-primary">

    <div class="content">

        <div class="text-center mb-3">
            <img src="<?= $base_url . 'assets/images/logo.png'; ?>" alt="Logo Unitama">
        </div>

        <?php if (isset($_SESSION['gagal'])) : ?>
            <div class="alert alert-danger" role="alert">
                <?= $_SESSION['gagal']; ?>
                <?php unset($_SESSION['gagal']) ?>
            </div>
        <?php endif ?>

        <form action="<?= $base_url . 'proses/login'; ?>" method="post" class="card p-3">

            <div class="mb-3">
                <label for="username" class="form-label">Username <span class="text-danger">*</span></label>
                <input type="text" class="form-control" id="username" name="username" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password <span class="text-danger">*</span></label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>

            <button type="submit" name="submit" class="btn btn-primary mb-2">Login</button>
            <a href="<?= $base_url; ?>" class="btn btn-warning me-2">Beranda</a>
        </form>

    </div>


    <!-- js -->
    <script src="assets/plugins/bootstrap/bootstrap.js"></script>
</body>

</html>
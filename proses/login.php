<?php

include_once '../config/autoload.php';

if (isset($_POST['submit'])) {

    // ambil data dari form
    $username = $_POST['username'];
    $password = $_POST['password'];

    // ambil data username pada tabel user
    $user = mysqli_query($koneksi, "SELECT * FROM tabel_user WHERE username = '$username'");

    // jika usernamenya ada 
    if ($user) {
        $data = mysqli_fetch_assoc($user);

        // verifikasi pass
        if (password_verify($password, $data['password'])) {
            // cek user aktif

            if ($data['aktif'] == 1) {
                // memberikan session
                $_SESSION['id_user'] = $data['id_user'];
                $_SESSION['profil'] = $data['profil'];
                $_SESSION['berhasil'] = $data['nama'] . ', anda telah berhasil login';
                header('location:' . $base_url . 'admin/dashboard/index');
                exit();
            } else {
                $_SESSION['gagal'] = 'Login gagal, akun anda tidak aktif!';
                header('location:' . $base_url . 'login');
                return false;
            }
        } else {
            $_SESSION['gagal'] = 'Login gagal, username atau password tidak cocok!';
            header('location:' . $base_url . 'login');
            return false;
        }
    }

    // jika error
    $error = true;
    if (isset($error)) {
        $_SESSION['gagal'] = 'Login gagal, username atau password tidak cocok!';
        header('location:' . $base_url . 'login');
    }
}

<?php

function tambah($data)
{
    global $koneksi;

    $nama   = $data['nama'];
    $username   = $data['username'];
    $password   = $data['password'];
    $passwordConfirm   = $data['konfirmasi_password'];
    $profil   = $data['profil'];
    $aktif   = $data['aktif'];

    //verifikasi username
    $data = mysqli_query($koneksi, "SELECT username FROM tabel_user WHERE username = '$username'");
    if (mysqli_fetch_assoc($data)) {
        $_SESSION['error'] = 'Username sudah digunakan';
        return false;
    }

    // verifikasi password
    if ($password != $passwordConfirm) {
        $_SESSION['error'] = 'Password dan konfirmasi password tidak sama';
        return false;
    }

    // encript password
    $password = password_hash($password, PASSWORD_DEFAULT);
    $query = "INSERT INTO tabel_user VALUES ('', '$nama', '$username', '$password', '$profil', '$aktif')";
    mysqli_query($koneksi, $query);
    return mysqli_affected_rows($koneksi);
}

if (isset($_POST['submit'])) {
    if (tambah($_POST) > 0) {
        $_SESSION['berhasil'] = 'Data berhasil dikirim';
        header('location:' . $base_url . 'admin/user/index');
    } else {
        $_SESSION['gagal'] = 'Data gagal ditambahkan';
        return false;
    }
}

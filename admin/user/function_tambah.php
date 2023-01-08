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

    // verifikasi password
    if ($password != $passwordConfirm) {
        echo 'password dan konfirmasi password tidak sama';
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
        echo 'data berhasil dikirim';
    } else {
        echo 'data gagal ditambahkan';
    }
}

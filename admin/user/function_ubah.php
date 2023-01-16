<?php

function tambah($data)
{
    global $koneksi;

    $id_user   = $data['id_user'];
    $nama   = $data['nama'];
    $username   = $data['username'];
    $password   = $data['password'];
    $passwordConfirm   = $data['konfirmasi_password'];
    $profil   = $data['profil'];
    $aktif   = $data['aktif'];

    // ambil data id_user
    $user = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT username FROM tabel_user WHERE id_user = '$id_user'"));

    // cek apakah username berubah
    if ($username != $user['username']) {
        //verifikasi username
        $data = mysqli_query($koneksi, "SELECT username FROM tabel_user WHERE username = '$username'");
        if (mysqli_fetch_assoc($data)) {
            $_SESSION['error'] = 'Username sudah digunakan';
            return false;
        }
    }


    // jika password diganti
    if ($password) {
        // verifikasi password
        if ($password != $passwordConfirm) {
            $_SESSION['error'] = 'Password dan konfirmasi password tidak sama';
            return false;
        }

        // encript password
        $password = password_hash($password, PASSWORD_DEFAULT);
        $query = "UPDATE tabel_user SET 
                nama = '$nama',
                username = '$username',
                password = '$password',
                profil = '$profil',
                aktif = '$aktif'
                WHERE id_user = $id_user
        ";
    } else {
        $query = "UPDATE tabel_user SET 
                nama = '$nama',
                username = '$username',
                profil = '$profil',
                aktif = '$aktif'
                WHERE id_user = $id_user
        ";
    }

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

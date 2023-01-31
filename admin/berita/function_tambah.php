<?php

function tambah($data)
{
    global $koneksi;

    // panggil function upload
    $sampul = upload('sampul', ['png', 'jpg', 'jpeg'], 500000, '../../assets/uploads/');

    $judul   = $data['judul'];
    $isi   = $data['isi'];
    $tanggal   = $data['tanggal'];
    $publish   = $data['publish'];

    $query = "INSERT INTO tabel_berita VALUES ('', '$judul', '$isi', '$tanggal', '$publish', '$sampul')";
    mysqli_query($koneksi, $query);
    return mysqli_affected_rows($koneksi);
}

if (isset($_POST['submit'])) {
    if (tambah($_POST) > 0) {
        $_SESSION['berhasil'] = 'Data berhasil dikirim';
        header('location:' . $base_url . 'admin/berita/index');
    } else {
        $_SESSION['gagal'] = 'Data gagal ditambahkan';
        return false;
    }
}

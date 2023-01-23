<?php

function tambah($data)
{
    global $koneksi;

    $prodi   = $data['prodi'];
    $akreditasi   = $data['akreditasi'];
    $keterangan   = $data['keterangan'];

    $query = "INSERT INTO tabel_prodi VALUES ('', '$prodi', '$akreditasi', '$keterangan')";
    mysqli_query($koneksi, $query);
    return mysqli_affected_rows($koneksi);
}

if (isset($_POST['submit'])) {
    if (tambah($_POST) > 0) {
        $_SESSION['berhasil'] = 'Data berhasil dikirim';
        header('location:' . $base_url . 'admin/prodi/index');
    } else {
        $_SESSION['gagal'] = 'Data gagal ditambahkan';
        return false;
    }
}

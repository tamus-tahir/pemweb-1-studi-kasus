<?php

include_once '../config/autoload.php';

function tambah($data)
{
    global $koneksi;

    $id_prodi   = $data['id_prodi'];
    $nama   = $data['nama'];
    $gender   = $data['gender'];
    $telpon   = $data['telpon'];
    $sekolah   = $data['sekolah'];
    $tanggal   = date('Y-m-d');
    $status = 1;

    $query = "INSERT INTO tabel_pendaftaran VALUES ('', '$id_prodi', '$nama', '$gender', '$telpon','$sekolah', '$tanggal', $status)";
    mysqli_query($koneksi, $query);
    return mysqli_affected_rows($koneksi);
}

if (isset($_POST['submit'])) {
    if (tambah($_POST) > 0) {
        $_SESSION['berhasil'] = 'Data berhasil dikirim';
    } else {
        $_SESSION['gagal'] = 'Data gagal ditambahkan';
    }
    header('location:' . $base_url . 'pendaftaran');
}

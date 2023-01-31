<?php

function tambah($data)
{
    global $koneksi;

    $id_pendaftaran   = $data['id_pendaftaran'];
    $status   = $data['status'];

    $query = "UPDATE tabel_pendaftaran SET status = '$status' WHERE id_pendaftaran = $id_pendaftaran";

    mysqli_query($koneksi, $query);
    return mysqli_affected_rows($koneksi);
}

if (isset($_POST['submit'])) {
    if (tambah($_POST) > 0) {
        $_SESSION['berhasil'] = 'Data berhasil diverifikasi';
        header('location:' . $base_url . 'admin/pendaftaran/index');
    } else {
        $_SESSION['gagal'] = 'Data gagal diverifikasi';
        return false;
    }
}

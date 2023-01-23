<?php

function tambah($data)
{
    global $koneksi;

    $id_prodi   = $data['id_prodi'];
    $prodi   = $data['prodi'];
    $akreditasi   = $data['akreditasi'];
    $keterangan   = $data['keterangan'];

    $query = "UPDATE tabel_prodi SET 
                prodi = '$prodi',
                akreditasi = '$akreditasi',
                keterangan = '$keterangan'
                WHERE id_prodi = $id_prodi
        ";

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

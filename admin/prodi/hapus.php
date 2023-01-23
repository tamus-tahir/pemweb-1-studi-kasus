<?php
require '../../config/autoload.php';
security([1, 2]);

function hapus($id_prodi)
{
    global $koneksi;
    mysqli_query($koneksi, "DELETE FROM tabel_prodi WHERE id_prodi = $id_prodi");
    return mysqli_affected_rows($koneksi);
}


if (isset($_GET['id'])) {
    if (hapus($_GET['id']) > 0) {
        $_SESSION['berhasil'] = 'Data berhasil dihapus';
        header('location:' . $base_url . 'admin/prodi/index');
    } else {
        $_SESSION['gagal'] = 'Data gagal dihapus';
        return false;
    }
}

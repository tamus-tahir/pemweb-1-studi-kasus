<?php
require '../../config/autoload.php';

function hapus($id_user)
{
    global $koneksi;
    mysqli_query($koneksi, "DELETE FROM tabel_user WHERE id_user = $id_user");
    return mysqli_affected_rows($koneksi);
}


if (isset($_GET['id'])) {
    if (hapus($_GET['id']) > 0) {
        $_SESSION['berhasil'] = 'Data berhasil dihapus';
        header('location:' . $base_url . 'admin/user/index');
    } else {
        $_SESSION['gagal'] = 'Data gagal dihapus';
        return false;
    }
}

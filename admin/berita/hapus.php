<?php
require '../../config/autoload.php';
security([1, 2]);

function hapus($id_berita)
{
    global $koneksi;
    $berita = query("SELECT * FROM tabel_berita WHERE id_berita = $id_berita")[0];
    mysqli_query($koneksi, "DELETE FROM tabel_berita WHERE id_berita = $id_berita");
    unlink('../../assets/uploads/' . $berita['sampul']);
    return mysqli_affected_rows($koneksi);
}


if (isset($_GET['id'])) {
    if (hapus($_GET['id']) > 0) {
        $_SESSION['berhasil'] = 'Data berhasil dihapus';
        header('location:' . $base_url . 'admin/berita/index');
    } else {
        $_SESSION['gagal'] = 'Data gagal dihapus';
        return false;
    }
}

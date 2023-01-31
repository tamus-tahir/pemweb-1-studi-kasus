<?php

function ubah($data)
{
    global $koneksi;

    // perikasa apakah user upload gambar
    if ($_FILES['sampul']['error'] == 4) {
        $sampul = $data['sampul_lama'];
    } else {
        // panggil function upload
        $sampul = upload('sampul', ['png', 'jpg', 'jpeg'], 500000, '../../assets/uploads/');
        if ($sampul) {
            unlink('../../assets/uploads/' . $data['sampul_lama']);
        }
    }

    $id_berita   = $data['id_berita'];
    $judul   = $data['judul'];
    $isi   = $data['isi'];
    $tanggal   = $data['tanggal'];
    $publish   = $data['publish'];

    $query = "UPDATE tabel_berita SET 
                        judul = '$judul',
                        isi = '$isi',
                        tanggal = '$tanggal',
                        publish = '$publish',
                        sampul = '$sampul'
                        WHERE id_berita = $id_berita
                    ";
    mysqli_query($koneksi, $query);
    return mysqli_affected_rows($koneksi);
}

if (isset($_POST['submit'])) {
    if (ubah($_POST) > 0) {
        $_SESSION['berhasil'] = 'Data berhasil dikirim';
        header('location:' . $base_url . 'admin/berita/index');
    } else {
        $_SESSION['gagal'] = 'Data gagal ditambahkan';
        return false;
    }
}

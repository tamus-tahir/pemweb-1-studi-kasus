<?php

function query($query)
{
    global $koneksi;
    $result = mysqli_query($koneksi, $query);
    $row = [];
    while ($data = mysqli_fetch_assoc($result)) {
        $row[] = $data;
    }

    return $row;
}

function security($param = null)
{
    global $base_url;

    if ($param) {
        if (!in_array($_SESSION['profil'], $param)) {
            $_SESSION['gagal'] = 'Anda tidak memiliki akses';
            header('location:' . $base_url . 'admin/dashboard/index');
        }
    }

    if (!$_SESSION['id_user']) {
        $_SESSION['gagal'] = 'Anda tidak memiliki akses';
        header('location:' . $base_url . 'login');
    }
}

function upload($filename, $ext, $maxSize, $location)
{
    // ===== upload file =====
    $error = $_FILES[$filename]['error'];
    $name = $_FILES[$filename]['name'];
    $size = $_FILES[$filename]['size'];
    $tmp_name = $_FILES[$filename]['tmp_name'];

    if ($error != 0) {
        $_SESSION['error'] = 'File gagal diupload';
        return false;
    }

    // tipe file yang diizinkan
    $type_file = $ext;

    // merubah nama file menjadi array
    $type_name = explode('.', $name);

    // mengambil tipe file dari index array yg terakhir
    $type_name = strtolower(end($type_name));

    // verifikasi tipe file yg diizinkan
    if (!in_array($type_name, $type_file)) {
        $_SESSION['error'] = 'Tipe file tidak diizinkan';
        return false;
    }

    // verifikasi ukuran file
    // 1000000 = 1Mb
    if ($size > $maxSize) {
        $_SESSION['error'] = 'Ukuran file terlalu besar';
        return false;
    }

    // buat nama file baru
    $new_name = time() . '.' . $type_name;

    // pindahkan file ke folder pada aplikasi
    move_uploaded_file($tmp_name, $location . $new_name);
    return $new_name;
    // ===== end upload file =====
}

function tanggalIndo($date)
{
    '2023-01-29';

    $tanggal = explode('-', $date);

    switch ($tanggal[1]) {
        case "1":
            $tanggal[1] = "Januari";
            break;
        case "2":
            $tanggal[1] = "Februari";
            break;
        case "3":
            $tanggal[1] = "Maret";
            break;
        case "4":
            $tanggal[1] = "April";
            break;
        case "5":
            $tanggal[1] = "Mei";
            break;
        case "6":
            $tanggal[1] = "Juni";
            break;
        case "7":
            $tanggal[1] = "Juli";
            break;
        case "8":
            $tanggal[1] = "Agustus";
            break;
        case "9":
            $tanggal[1] = "September";
            break;
        case "10":
            $tanggal[1] = "Oktober";
            break;
        case "11":
            $tanggal[1] = "November";
            break;
        case "12":
            $tanggal[1] = "Desember";
            break;
        default:
            $tanggal[1] = "No Date";
            break;
    }

    $tanggalBaru = $tanggal[2] . ' ' . $tanggal[1] . ' ' . $tanggal[0];
    return $tanggalBaru;
}

function getStatus($param)
{
    if ($param == 1) {
        return 'Belum Diverifikasi';
    } elseif ($param == 2) {
        return 'Pendaftaran Distujui';
    } elseif ($param == 3) {
        return 'Lulus';
    } elseif ($param == 4) {
        return 'Pendaftaran Ditolak';
    }
}

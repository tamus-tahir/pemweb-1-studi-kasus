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

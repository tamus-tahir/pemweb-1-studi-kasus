<?php
include_once 'config/autoload.php';

// berfungsi untuk nmenghapus session pada variabel tertentu
// tapi karena kita tidak menargetkan variabel, maka semua variabel akan di hapus
session_unset();

// menghapus semua variabel session
session_destroy();

// untuk lebih baik kita menggunakan keduanya session_unset dan session_destroy

header('location:' . $base_url . 'login');

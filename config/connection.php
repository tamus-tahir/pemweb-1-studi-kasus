<?php

$host = 'localhost';
$username = 'root';
$password = '';
$database = 'studikasus';

$koneksi = mysqli_connect($host, $username, $password, $database);

if ($koneksi->connect_error) {
    echo 'Koneksi database gagal: ' . mysqli_connect_error();
    die;
} else {
    // echo 'Koneksi berhasil';
}

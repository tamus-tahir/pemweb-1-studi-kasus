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

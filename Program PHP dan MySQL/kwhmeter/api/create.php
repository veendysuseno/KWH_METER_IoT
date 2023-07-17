<?php
include('../config/connection.php');

if ( isset($_POST['voltage']) && isset($_POST['current']) && isset($_POST['power']) ) {

    //Tanggal dan Waktu
    //WITA: Asia/Makassar | WIT: Asia/Jayapura
    date_default_timezone_set("Asia/Jakarta");
    $tanggal    = date('d-m-Y');
    $waktu      = date('H:i:s');

    //Mengambil data dari ESP8266
    $voltage    = $_POST['voltage'];
    $current    = $_POST['current'];
    $power      = $_POST['power'];
    $energy     = $_POST['energy'];
    $freq       = $_POST['freq'];
    $pf         = $_POST['pf'];

    $query = "INSERT INTO data VALUES (NULL,'$tanggal','$waktu',$voltage,$current,$power,$energy,$freq,$pf)";
    $create = mysqli_query($conn, $query);
    if ($create) {
        echo "Data Berhasil Tersimpan";
    } else {
        echo "Gagal Tersimpan: " . mysqli_error($conn);
    }
} else {
    echo "Data Kosong";
}

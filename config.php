<?php

//konfigurasi koneksi databse
$host = "localhost"; //Nama host server database
$username = "root"; //Username untuk akses database
$password = ""; // password untuk akses databse
$database = "idekreatif"; //nama database untuk digunakan

// membuat koneksi ke databse menggunakan mysqli
$conn = mysqli_connect($host, $username, $password, $database);

// mengecek apakah koneksi berhasil
if ($conn->connect_error) {
    // menampilkan pesan error jika koneksi gagal 
    die("Database gagal terkoneksi: " .  $conn->connect_error);
}

//jika koneksi berhasil, script akan terus berjalan tanpa pesan error
?>
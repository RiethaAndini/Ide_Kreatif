<?php

// menghuungkan file ke konfigurasi database
include("config.php");

// memulai sesi untuk menyimpan notifikasi
session_start();

// proses penambahan kategori baru
if (isset($_POST['simpan'])) {
    // mengambil data nama kategori dari form
    $category_name = $_POST['category_name'];

// query untuk menambahkan data kategori kedalam database
$query = "INSERT INTO categories (category_name) VALUES ('$category_name')";
$exec = mysqli_query($conn, $query);

// menyimpan notifikasi berhasil atau gagal ke dalam database
if ($exec) {
    $_SESSION['notification'] = [
        'type' => 'primary', // jenis notifikasi (contoh: primary untuk keberhasilan)
        'message' => 'Kategori Berhasil Ditambahkan!'
    ];
} else {
    $_SESSION['notification'] = [
        'type' => 'danger',// jenis notifikasi (contoh: danger untuk kegagalan)
        'message' => 'Gagal menambahkan kategori: ' . mysqli_error($conn)
    ];
}

// redirect kembali ke halaman utama
header('Location: kategori.php');
exit();
}

// Proses  penghapusan kategori
if (isset($_POST['delete'])) {
    // mengambil ID kategori dari paramater URL
    $catID = $_POST['catID'];

    // query untuk menghapus kategori berdasarkan id
    $exec = mysqli_query($conn, "DELETE FROM categories WHERE category_id='$catID'");

    // menyimpan notifikasi keberhasilan atau kegagalan session
    if ($exec) {
        $_SESSION['notification'] = [
            'type' => 'primary', 
            'message' => 'Kategori berhasil dihapus!'
        ];
    } else {
        $_SESSION['notification'] = [
            'type' => 'danger',
            'message' => 'Gagal menghapus kategori: ' . mysqli_error($conn)
        ];
    }
    
    // redorect kembali ke halaman kategori
    header('Location: kategori.php');
    exit();
}

// Proses  pembaruan kategori
if (isset($_POST['update'])) {
    // mengambil ID kategori dari form pembaruan
    $catID = $_POST['catID'];
    $category_name = $_POST['category_name'];

    // query untuk memperbarui data kategori berdasarkan id
    $query = "UPDATE categories SET category_name='$category_name' WHERE category_id='$catID'";
    $exec = mysqli_query($conn, $query);

    // menyimpan notifikasi keberhasilan atau kegagalan dalam session
    if ($exec) {
        $_SESSION['notification'] = [
            'type' => 'primary', 
            'message' => 'Kategori berhasil diperbarui!'
        ];
    } else {
        $_SESSION['notification'] = [
            'type' => 'danger',
            'message' => 'Gagal memperbarui kategori: ' . mysqli_error($conn)
        ];
    }
    
    // redorect kembali ke halaman kategori
    header('Location: kategori.php');
    exit();
}
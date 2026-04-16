<?php 
include './koneksi.php';

// Mengambil ID dari URL
$id = $_GET['id'];

// Menghapus data dari database
mysqli_query($conn, "DELETE FROM products WHERE id='$id'");

// Mengalihkan halaman kembali ke read.php
header("location:read.php");
?>
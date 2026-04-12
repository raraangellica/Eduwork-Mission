<?php
include 'db_config.php';



if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama      = mysqli_real_escape_string($conn, $_POST['nama_produk']);
    $harga     = $_POST['harga'];
    $deskripsi = mysqli_real_escape_string($conn, $_POST['deskripsi']);
    $stok      = mysqli_real_escape_string($conn, $_POST['Stok']);

    $error     = [];

    if (empty($nama) || empty($harga) || empty($deskripsi) || empty($stok) || $harga <= 0 || $stok <= 0 ) {
        header("Location: index.php?status=gagal");
        exit();
    }

    $query = "INSERT INTO produk (nama, harga, deskripsi, Stok) VALUES ('$nama', '$harga', '$deskripsi', '$stok')";
    
    if (mysqli_query($conn, $query)) {
        header("Location: index.php?status=sukses");
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>
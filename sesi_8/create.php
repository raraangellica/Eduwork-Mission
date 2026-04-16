<?php include './koneksi.php'; ?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Data</title>
     <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB"
      crossorigin="anonymous"
    />
</head>
<body class="bg-light">
<div class="container mt-5">
    <div class="card mx-auto shadow" style="max-width: 500px;">
        <div class="card-header bg-primary text-white">Tambah Produk Baru</div>
        <div class="card-body">
            <form method="POST">
                <div class="mb-3">
                    <label>Nama Produk</label>
                    <input type="text" name="nama_produk" placeholder="Masukan Nama Produk" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label>Harga</label>
                    <input type="number" name="harga" class="form-control" placeholder="Masukan Harga" required>
                </div>
                <div class="mb-3">
                    <label>Deskripsi</label>
                        <textarea name="deskripsi" class="form-control" rows="4" placeholder="Tulis spesifikasi lengkap barang di sini..."></textarea>
                </div>
                <div class="mb-3">
                    <label>Stok Barang</label>
                    <input type="number" name="Stok" placeholder="Masukan Jumlah Stok" class="form-control" required>
                </div>
                 <div class="mb-3">
                    <select name="kategori" id="categoryFilter" class="form-select">
                        <option value="" selected disabled>Pilih Kategori</option>
                        <option value="1">Fashion</option>
                        <option value="2">Hobi</option>
                        <option value="3">Kecantikan</option>
                        <option value="4">Makanan</option>
                        <option value="5">Minuman</option>
                    </select>
                </div>
                <button type="submit" name="submit" class="btn btn-success">Simpan Data</button>
                <a href="index.php" class="btn btn-secondary">Kembali</a>
            </form>
        </div>
    </div>
</div>

<?php
if (isset($_POST['submit'])) {
    $namaProduk = $_POST['nama_produk'];
    $harga = $_POST['harga'];
    $deskripsi = $_POST['deskripsi'];
    $stok = $_POST['Stok'];
    $kategori = $_POST['kategori'];
    mysqli_query($conn, "INSERT INTO products (nama_produk, harga, deskripsi, Stok, kategori) VALUES ('$namaProduk', '$harga', '$deskripsi', '$stok', '$kategori')");
    header("Location: read.php");
}
?>
</body>
</html>
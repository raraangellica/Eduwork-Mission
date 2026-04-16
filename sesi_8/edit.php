<?php 
include 'koneksi.php';

// Mengambil data lama berdasarkan ID agar muncul di form
$id = $_GET['id'];
$query = mysqli_query($conn, "SELECT * FROM products WHERE id='$id'");
$d = mysqli_fetch_array($query);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Data Produk</title>
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
        <div class="card-header bg-warning text-dark fw-bold">Edit Data Produk</div>
        <div class="card-body">
            <form method="POST">
                <div class="mb-3">
                    <label>Nama Produk</label>
                    <input type="text" name="nama_produk" value="<?= $d['nama_produk']; ?>" placeholder="Masukan Nama Produk Baru" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label>Harga</label>
                    <input type="number" name="harga" value="<?= $d['harga']; ?>" class="form-control" placeholder="Masukan Harga" required>
                </div>
                <div class="mb-3">
                    <label>Deskripsi</label>
                        <textarea name="deskripsi" class="form-control" rows="4" placeholder="Tulis spesifikasi baru secara lengkap barang di sini..."><?= $d['deskripsi']; ?></textarea>
                </div>
                <div class="mb-3">
                    <label>Stok Barang</label>
                    <input type="number" name="Stok" value="<?= $d['Stok']; ?>"  placeholder="Masukan Jumlah Stok" class="form-control" required>
                </div>
                 <div class="mb-3">
                    <label>Kategori</label>
                    <select name="kategori" id="categoryFilter" class="form-select ">
                        <option class="bg-warning-subtle" value="<?= $d['kategori']; ?>" selected disabled><?= ($d['kategori'] == 1) ? 'Fashion' : (($d['kategori'] == 2) ? 'Hobi' : (($d['kategori'] == 3) ? 'Kecantikan' : (($d['kategori'] == 4) ? 'Makanan' : 'Minuman'))) ?></option>
                        <option value="1">Fashion</option>
                        <option value="2">Hobi</option>
                        <option value="3">Kecantikan</option>
                        <option value="4">Makanan</option>
                        <option value="5">Minuman</option>
                    </select>
                </div>
                <div class="d-flex gap-2">
                    <button type="submit" name="update" class="btn btn-primary">Update Data</button>
                    <a href="read.php" class="btn btn-secondary">Batal</a>
                </div>
            </form>
        </div>
    </div>
</div>

<?php
// Proses Update Data
if (isset($_POST['update'])) {
    $namaProduk = $_POST['nama_produk'];
    $harga = $_POST['harga'];
    $deskripsi = $_POST['deskripsi'];
    $stok = $_POST['Stok'];
    $kategori = $_POST['kategori'];

    $result = mysqli_query($conn, "UPDATE products SET nama_produk='$namaProduk', harga='$harga', deskripsi='$deskripsi', Stok='$stok', kategori='$kategori' WHERE id='$id'");

    if ($result) {
        echo "<script>alert('Data berhasil diupdate!'); window.location='read.php';</script>";
    } else {
        echo "Gagal Update: " . mysqli_error($conn);
    }
}
?>
</body>
</html>
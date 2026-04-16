<?php include 'koneksi.php'; ?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Kelola Data</title>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB"
      crossorigin="anonymous"
    />
</head>
<body class="bg-light">
<div class="container mt-5">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>Daftar Tabel Produk</h2>
        <a href="index.php" class="btn btn-secondary btn-sm">Ke Dashboard</a>
    </div>

    <table class="table table-white table-hover shadow-sm border text-center">
        <thead class="table-dark">
            <tr>
                <th>Id Produk</th><th>Nama Produk</th><th>Harga</th><th>Deskripsi</th><th>Stok</th><th>Kategori</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $id = 1;
            $data = mysqli_query($conn, "SELECT * FROM products");
            while($d = mysqli_fetch_array($data)){
            ?>
            <tr>
                <td><?= $id++; ?></td>
                <td><?= $d['nama_produk']; ?></td>
                <td>Rp <?php echo number_format($d['harga'], 0, ',', '.'); ?></td>
                <td><?= $d['deskripsi']; ?></td>
                <td><?= $d['Stok']; ?></td>
                <td><?= ($d['kategori'] == 1) ? 'Fashion' : (($d['kategori'] == 2) ? 'Hobi' : (($d['kategori'] == 3) ? 'Kecantikan' : (($d['kategori'] == 4) ? 'Makanan' : 'Minuman'))) ?></td>
                <td>
                    <a href="edit.php?id=<?= $d['id']; ?>" class="btn btn-warning btn-sm">Edit</a>
                    <a href="hapus.php?id=<?= $d['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin hapus?')">Hapus</a>
                </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
</div>
</body>
</html>
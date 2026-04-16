<?php
require_once "./koneksi.php";

// 1. Ambil daftar kategori unik untuk filter dropdown
$sql_categories = "SELECT DISTINCT kategori FROM products WHERE kategori IS NOT NULL";
$categories_result = $conn->query($sql_categories);

// 2. Tangkap data dari filter search dan kategori
$search = isset($_GET['search']) ? mysqli_real_escape_string($conn, $_GET['search']) : '';
$filter_kategori = isset($_GET['kategori']) ? mysqli_real_escape_string($conn, $_GET['kategori']) : '';

// 3. Bangun Query SQL dinamis
$sql = "SELECT * FROM products WHERE 1=1";

if ($search != '') {
    $sql .= " AND (nama_produk LIKE '%$search%' OR deskripsi LIKE '%$search%')";
}

if ($filter_kategori != '') {
    $sql .= " AND kategori = '$filter_kategori'";
}

$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Katalog Produk</title>
    <!-- Bootstrap CSS -->
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB"
      crossorigin="anonymous"
    />
    <style>
        .card-img-top { height: 200px; object-fit: cover; }
    </style>
</head>
<body class="bg-light">

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">
        <div class="container">
            <!-- Brand di kiri -->
            <a class="navbar-brand" href="#">MyStore</a>

            <!-- Toggler untuk mobile -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Menu di kanan -->
            <div class="collapse navbar-collapse" id="navbarNav">
                <div class="dropdown ms-auto">
                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                        Menu
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton">
                        <li><a class="dropdown-item" href="./create.php">Tambah Produk</a></li>
                        <li><a class="dropdown-item" href="./read.php">Update Produk</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>

    <div class="container">
        <h2 class="text-center mb-4">Produk Terbaru</h2>
        <div class="row">
            <div>
                <!-- Form Filter & Search -->
        <form action="" method="GET" class="row g-3 mb-5">
            <div class="col-md-5">
                <input type="text" name="search" class="form-control" placeholder="Cari nama produk..." value="<?= htmlspecialchars($search) ?>">
            </div>
            <div class="col-md-4">
                <select name="kategori" class="form-select">
                    <option value="">Semua Kategori</option>
                        <?php 
                            $nama_kategori = [
                                1 => "Fashion",
                                2 => "Hobi",
                                3 => "Kecantikan",
                                4 => "Makanan",
                                5 => "Minuman" 
                            ];

                            while($cat = mysqli_fetch_assoc($categories_result)): 
                                $id = $cat['kategori'];
                                // Jika ID ada di daftar, pakai namanya. Jika tidak, tampilkan ID-nya saja.
                                $display_name = isset($nama_kategori[$id]) ? $nama_kategori[$id] : "Kategori " . $id;
                            ?>
                            <option value="<?= $id ?>" <?= ($filter_kategori == $id) ? 'selected' : '' ?>>
                                <?= $display_name ?>
                            </option>
                        <?php endwhile; ?>
                </select>
            </div>
            <div class="col-md-3 d-grid">
                <button type="submit" class="btn btn-primary">Filter & Cari</button>
            </div>
        </form>
            </div>
            
            <?php while($row = mysqli_fetch_assoc($result)): ?>
            <div class="col-md-4 mb-4">
                <div class="card h-100 shadow-sm">
                    <img src="https://media.istockphoto.com/id/1345967888/id/vektor/troli-shopping-cart-pada-template-konsep-logo-online-dan-belanja-awal-huruf-v.jpg?s=612x612&w=0&k=20&c=OMWAz7I6OAmU74ayEPXnS2WulOnW6Njj8O7_AA3x618=" class="card-img-top" alt="<?= htmlspecialchars($row['nama_produk']) ?>>">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $row['nama_produk']; ?></h5>
                        <p class="text-muted small"><?php echo $row['deskripsi']; ?></p>
                        <h5 class="text-primary">Rp <?php echo number_format($row['harga'], 0, ',', '.'); ?></h5>
                    </div>
                    <div class="card-footer bg-white border-top-0 d-grid">
                        <button class="btn btn-success">Beli Sekarang</button>
                    </div>
                </div>
            </div>
            <?php endwhile; ?>

        </div>
    </div>
     <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI"
      crossorigin="anonymous"
    ></script>
</body>
</html>
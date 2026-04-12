<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Produk</title>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB"
      crossorigin="anonymous"
    />
</head>
<body class="bg-light">
<div class="container mt-5">
    <div class="card mx-auto" style="max-width: 500px;">
        <div class="card-header bg-primary text-white">Tambah Produk Baru</div>
        <div class="card-body">
            <!-- Alert Status -->
            <?php if(isset($_GET['status'])): ?>
                <div class="alert alert-<?= ($_GET['status'] == 'sukses') ? 'success' : 'danger' ?>">
                    <?= ($_GET['status'] == 'sukses') ? "Produk berhasil disimpan!" : "Semua kolom wajib diisi!" ?>
                </div>
            <?php endif; ?>

            <form action="proses.php" method="POST" id="produkForm">
                <div class="mb-3">
                    <label class="form-label">Nama Produk</label>
                    <input id="nama_produk" type="text" name="nama_produk" class="form-control">
                </div>
                <div class="mb-3">
                    <label class="form-label">Harga</label>
                    <input id="harga" type="number" name="harga" class="form-control">
                </div>
                <div class="mb-3">
                    <label class="form-label">Deskripsi</label>
                    <textarea id="deskripsi" name="deskripsi" class="form-control" rows="3"></textarea>
                </div>
                <div class="mb-3">
                    <label class="form-label">Stok</label>
                    <input id="stock" type="number" name="Stok" class="form-control">
                </div>
                <button type="submit" class="btn btn-primary w-100">Simpan Produk</button>
            </form>
        </div>
    </div>
</div>
<script>
// 1. Ambil semua elemen dengan benar
const produkForm = document.getElementById('produkForm');
const hargaBarang = document.getElementById('harga');
const stokInput = document.getElementById('stok');

produkForm.addEventListener('submit', function (e) {
    hargaBarang.setCustomValidity('');
    stokInput.setCustomValidity('');

    if (hargaBarang.value <= 0) {
        hargaBarang.setCustomValidity('Harga barang harus lebih besar dari 0');
    }

    if (stokInput.value <= 0) {
        stokInput.setCustomValidity('Stok barang harus lebih besar dari 0');
    }

    // 4. Cek Validasi Form
    if (!produkForm.checkValidity()) {
        e.preventDefault();
        e.stopPropagation();
    }

    produkForm.classList.add('was-validated');
}, false);
</script>
</body>
</html>
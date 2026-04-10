import products from "./products.js";

const productContainer = document.getElementById("productContainer");
const searchInput = document.getElementById("searchInput");
const categoryFilter = document.getElementById("categoryFilter");
const priceSort = document.getElementById("priceSort");

function renderProducts(data) {
  productContainer.innerHTML = "";

  if (data.length === 0) {
    productContainer.innerHTML = `<p class="text-center w-100">Produk tidak ditemukan.</p>`;
    return;
  }

  data.forEach((item) => {
    productContainer.innerHTML += `
            <div class="col">
                <div class="card h-100 shadow-sm">
                    <img src="${item.gambar}" class="card-img-top" alt="${item.nama}">
                    <div class="card-body">
                        <span class="badge bg-primary mb-2">${item.kategori}</span>
                        <h5 class="card-title">${item.nama}</h5>
                        <p class="card-text text-muted">${item.deskripsi}</p>
                        <h6 class="text-danger fw-bold">Rp ${item.harga.toLocaleString("id-ID")}</h6>
                    </div>
                </div>
            </div>
        `;
  });
}

function filterData() {
  let filtered = products.filter((item) => {
    const matchSearch = item.nama
      .toLowerCase()
      .includes(searchInput.value.toLowerCase());
    const matchCategory =
      categoryFilter.value === "All" || item.kategori === categoryFilter.value;
    return matchSearch && matchCategory;
  });

  if (priceSort.value === "low") {
    filtered.sort((a, b) => a.harga - b.harga);
  } else if (priceSort.value === "high") {
    filtered.sort((a, b) => b.harga - a.harga);
  }

  renderProducts(filtered);
}

// Event Listeners
searchInput.addEventListener("input", filterData);
categoryFilter.addEventListener("change", filterData);
priceSort.addEventListener("change", filterData);

renderProducts(products);

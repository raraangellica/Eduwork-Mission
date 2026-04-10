const products = [
  {
    id: 1,
    nama: "Kopi Hitam",
    deskripsi: "Kopi robusta pilihan.",
    harga: 15000,
    kategori: "Minuman",
    gambar:
      "https://media.istockphoto.com/id/2025692222/id/foto/cangkir-gelas-kopi-espresso-dengan-latar-belakang-cokelat.jpg?s=1024x1024&w=is&k=20&c=8tEyLAHpvw7ABUVSZhyNIPAO2yTNLFb2mcm-59fVE5A=",
  },
  {
    id: 2,
    nama: "Roti Bakar",
    deskripsi: "Roti dengan selai cokelat.",
    harga: 20000,
    kategori: "Makanan",
    gambar:
      "https://media.istockphoto.com/id/1491244721/id/foto/kaya-roti-panggang-mentega-gaya-sarapan-kopitiam-tradisional-oriental-dan-vintage.jpg?s=1024x1024&w=is&k=20&c=lOsSIc8JSEbcTspBGiyaxNxN-BalIdOEG6T_2UrQ17E=",
  },
  {
    id: 3,
    nama: "Es Teh Manis",
    deskripsi: "Segar dan manis.",
    harga: 5000,
    kategori: "Minuman",
    gambar:
      "https://media.istockphoto.com/id/1156128978/id/foto/es-teh-dalam-gelas-mason-jar-tampilan-samping-terhadap-kayu-putih.jpg?s=612x612&w=0&k=20&c=Jt-B6SPOB2Pl3WBWBVpNR1GuOMiviwvwtWVizxih2rQ=",
  },
  {
    id: 4,
    nama: "Nasi Goreng",
    deskripsi: "Nasi goreng spesial telur.",
    harga: 25000,
    kategori: "Makanan",
    gambar:
      "https://media.istockphoto.com/id/1398317278/id/foto/nasi-goreng-thailand-dengan-udang-daun-bawang-jeruk-nipis-dengan-latar-belakang-kayu-tampak.jpg?s=612x612&w=0&k=20&c=H8hjF2FSGAcwdAFjeA73KZowjmUmgCbAWjHsn_68_zQ=",
  },
  {
    id: 5,
    nama: "Croissant",
    deskripsi: "Pastry renyah mentega.",
    harga: 30000,
    kategori: "Snack",
    gambar:
      "https://media.istockphoto.com/id/1418644931/id/foto/tumpukan-croissant-yang-baru-dipanggang-di-toko-roti.jpg?s=612x612&w=0&k=20&c=1tS2VLqcsnk9EcJf9mbBVuPROVVdleW7d8dqy8X9X6o=",
  },
  {
    id: 6,
    nama: "Kopi Susu",
    deskripsi: "Dari susu dan kopi arabica pilihan yang berbicara.",
    harga: 25000,
    kategori: "Minuman",
    gambar:
      "https://media.istockphoto.com/id/1152767411/id/foto/secangkir-kopi-latte-terisolasi-di-latar-belakang-putih-dengan-jalur-kliping.jpg?s=612x612&w=0&k=20&c=zsfvtxPHHkZw5z9_2o-B2jr42Iwqi6eTXrvU4cppnco=",
  },
  {
    id: 7,
    nama: "Spageti",
    deskripsi: "Spageti dengan topping keju",
    harga: 35000,
    kategori: "Makanan",
    gambar:
      "https://media.istockphoto.com/id/1975701807/id/foto/pasta-bucatini-dengan-saus-tomat-dan-daun-kemangi.jpg?s=612x612&w=0&k=20&c=F5ODpVhqt9z60re580aDNikmzEbwihQbj02ZEB0p5KI=",
  },
  {
    id: 8,
    nama: "Kentang Goreng",
    deskripsi: "Kentang goreng yang krispi abizzz",
    harga: 15000,
    kategori: "Snack",
    gambar:
      "https://media.istockphoto.com/id/614420426/id/foto/keranjang-kentang-goreng.jpg?s=612x612&w=0&k=20&c=V5yI-CffZ6ARmW7YscsVLLr5AVOnCGHGkHZJHpdd3uk=",
  },
  {
    id: 9,
    nama: "Donat",
    deskripsi: "Donat yang bolong-bolong",
    harga: 12000,
    kategori: "Snack",
    gambar:
      "https://media.istockphoto.com/id/465529983/id/foto/bidang-berbagai-jenis-donat.jpg?s=612x612&w=0&k=20&c=UZpy0zE7yhVYSl24WQUDlpTshWYLBqUSyy-PNr_GIJ0=",
  },
  {
    id: 10,
    nama: "Seafood",
    deskripsi: "Udang dan kawan-kawannya",
    harga: 45000,
    kategori: "Makanan",
    gambar:
      "https://media.istockphoto.com/id/1305699663/id/foto/piring-makanan-laut-lobster-panggang-udang-kerang-langoustines-gurita-cumi-cumi-di-atas-piring.jpg?s=612x612&w=0&k=20&c=rBd_dMCzxQ8Ohkazs0UbKSvjvQUkLxt90Yzs85RiI9c=",
  },
  {
    id: 11,
    nama: "Es Jeruk",
    deskripsi: "Jeruk yang nyegerin",
    harga: 20000,
    kategori: "Minuman",
    gambar:
      "https://media.istockphoto.com/id/915657126/id/foto/botol-kaca-jus-jeruk-ditembak-di-atas-meja-kayu-pedesaan.jpg?s=612x612&w=0&k=20&c=OWkQua2ksi88XZsEB5DpDGZEPLvvUN6vHpLTj1GV-ho=",
  },
  {
    id: 12,
    nama: "Es Doger",
    deskripsi: "Es yang khas Indonesia",
    harga: 25000,
    kategori: "Minuman",
    gambar:
      "https://media.istockphoto.com/id/2182063039/id/foto/es-doger-merupakan-minuman-es-serut-khas-indonesia-dengan-kelapa-sebagai-bahan-dasar-dan.jpg?s=612x612&w=0&k=20&c=NtCMikl1KIjjhOM461HwBtxka8c3YjXEP7eW-jJRdos=",
  },
];

export default products;

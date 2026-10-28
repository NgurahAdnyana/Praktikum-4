<?php
// File: includes/data.php

$daftarProduk = [
    [
        "nama" => "Kopi Susu Gula Aren", 
        "kategori" => "Minuman", 
        "harga" => 25000, 
        "diskon" => 10, 
        "stok" => 15, 
        "gambar" => "assets/images/kpsusugulaaren.png" // Ganti dengan nama file gambar Anda
    ],
    [
        "nama" => "Es Americano", 
        "kategori" => "Minuman", 
        "harga" => 20000, 
        "diskon" => 0, 
        "stok" => 3, 
        "gambar" => "assets/images/esamericano.png" // Ganti dengan nama file gambar Anda
    ],
    [
        "nama" => "Matcha Latte", 
        "kategori" => "Minuman", 
        "harga" => 28000, 
        "diskon" => 15, 
        "stok" => 0, 
        "gambar" => "assets/images/mattchalatte.png" // Ganti dengan nama file gambar Anda
    ],
    [
        "nama" => "Croissant Butter", 
        "kategori" => "Makanan", 
        "harga" => 22000, 
        "diskon" => 0, 
        "stok" => 8, 
        "gambar" => "assets/images/CroissantButter.png"
    ],
    [
        "nama" => "Brownies Cokelat", 
        "kategori" => "Makanan", 
        "harga" => 18000, 
        "diskon" => 5, 
        "stok" => 2, 
        "gambar" => "assets/images/BrowniesCokelat.png" // Ganti dengan nama file gambar Anda
    ],
    [
        "nama" => "Latte", 
        "kategori" => "Minuman", 
        "harga" => 15000, 
        "diskon" => 20, 
        "stok" => 12, 
        "gambar" => "assets/images/Latte.png" // Ganti dengan nama file gambar Anda
    ]
];

// Data pesanan simulasi
$daftarPesanan = [
    ["index_produk" => 0, "jumlah" => 3], 
    ["index_produk" => 3, "jumlah" => 3], 
    ["index_produk" => 5, "jumlah" => 2],  
    ["index_produk" => 1, "jumlah" => 1],  
    ["index_produk" => 2, "jumlah" => 1],  
];

// Data profil toko untuk halaman tentang
$profilToko = [
    "alamat" => "Jl. Kopi Nikmat No. 99, Bali",
    "jam_buka" => "08:00 - 22:00 WITA",
    "layanan" => ["Dine-in (Makan di tempat)", "Takeaway (Bawa pulang)", "Free WiFi", "Area Smoking & Non-Smoking"]
];
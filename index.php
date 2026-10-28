<?php
// File: index.php

require_once "includes/data.php";
require_once "includes/fungsi.php";

$halamanAktif = "index.php";
require "includes/header.php";

// Filter Kategori (Tantangan 3)
$kategoriDipilih = ""; // Ubah misal jadi "Minuman" untuk melihat filter

// Menghitung Jumlah per Kategori (Tantangan 4)
$jumlahPerKategori = [];
foreach ($daftarProduk as $item) {
    $jumlahPerKategori[$item["kategori"]] = ($jumlahPerKategori[$item["kategori"]] ?? 0) + 1;
}

// Data Tantangan 1 & 2
$produkTermurah = cariProdukTermurah($daftarProduk);
$hargaTermurahDiskon = hitungHargaDiskon($produkTermurah['harga'], $produkTermurah['diskon']);
$rataRataHarga = hitungRataRataHarga($daftarProduk);
?>

<h1><i class="fa-solid fa-mug-hot"></i> Katalog Produk NGOPAI</h1>

<div class="info-box">
    <strong><i class="fa-solid fa-chart-line"></i> Rata-rata Harga Produk:</strong> <?= formatRupiah($rataRataHarga) ?><br>
    <strong><i class="fa-solid fa-bullseye"></i> Produk Termurah:</strong> <?= $produkTermurah['nama'] ?> (<?= formatRupiah($hargaTermurahDiskon) ?>)
</div>

<div class="info-box">
    <strong><i class="fa-solid fa-layer-group"></i> Kategori Tersedia: </strong>
    <?php 
    $kategoriString = [];
    foreach ($jumlahPerKategori as $namaKategori => $jumlah) {
        $kategoriString[] = "$namaKategori ($jumlah)";
    }
    echo implode(" · ", $kategoriString);
    ?>
</div>

<?php if ($kategoriDipilih !== "") : ?>
    <h3>Menampilkan kategori: <?= $kategoriDipilih ?></h3>
<?php endif; ?>

<div class="grid-katalog">
    <?php foreach ($daftarProduk as $produk) : 
        if ($kategoriDipilih !== "" && $produk["kategori"] !== $kategoriDipilih) {
            continue; 
        }

        $hargaAkhir = hitungHargaDiskon($produk["harga"], $produk["diskon"]);
        $statusStok = getStatusStok($produk["stok"]);
    ?>
        <div class="kartu">
            <?php if ($produk["diskon"] > 0) : ?>
                <div class="badge-diskon"><i class="fa-solid fa-tag"></i> <?= $produk["diskon"] ?>% OFF</div>
            <?php endif; ?>
            
            <img src="<?= $produk["gambar"] ?>" alt="<?= $produk["nama"] ?>" class="gambar-produk">
            
            <h3 style="margin-top: 0;"><?= $produk["nama"] ?></h3>
            <p style="color: gray; margin: 0; font-size: 14px;">
                <i class="fa-solid fa-utensils"></i> <?= $produk["kategori"] ?>
            </p>
            
            <div style="margin-top: 10px;">
                <?php if ($produk["diskon"] > 0) : ?>
                    <span class="harga-coret"><?= formatRupiah($produk["harga"]) ?></span><br>
                <?php endif; ?>
                <strong style="font-size: 18px;"><?= formatRupiah($hargaAkhir) ?></strong>
            </div>
            
            <div class="status-stok" style="background-color: <?= $statusStok['warna'] ?>;">
                <?= $statusStok['teks'] ?>
            </div>
        </div>
    <?php endforeach; ?>
</div>

<?php require "includes/footer.php"; ?>
<?php
// File: pesanan.php

require_once "includes/data.php";
require_once "includes/fungsi.php";

$halamanAktif = "pesanan.php";
require "includes/header.php";

// Variabel untuk menampung berbagai totalan
$totalHargaAsliKeseluruhan = 0;
$totalDiskonProdukKeseluruhan = 0;
$totalBelanja = 0;
?>

<h1><i class="fa-solid fa-receipt"></i> Nota Pesanan</h1>

<table>
    <thead>
        <tr>
            <th>Produk</th>
            <th>Harga Asli</th>
            <th>Diskon</th>
            <th>Harga Satuan</th>
            <th>Jumlah</th>
            <th>Subtotal</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($daftarPesanan as $itemPesanan) : 
            $produk = $daftarProduk[$itemPesanan["index_produk"]];
            $hargaAsli = $produk["harga"];
            $diskonPersen = $produk["diskon"];
            
            // Perhitungan per item
            $hargaSatuan = hitungHargaDiskon($hargaAsli, $diskonPersen);
            
            $subtotalAsli = $hargaAsli * $itemPesanan["jumlah"];
            $subtotalDiskon = $hargaSatuan * $itemPesanan["jumlah"];
            $nominalDiskonProduk = $subtotalAsli - $subtotalDiskon;
            
            // Masukkan ke total keseluruhan
            $totalHargaAsliKeseluruhan += $subtotalAsli;
            $totalDiskonProdukKeseluruhan += $nominalDiskonProduk;
            $totalBelanja += $subtotalDiskon;
        ?>
        <tr>
            <td><?= $produk["nama"] ?></td>
            
            <td>
                <?php if ($diskonPersen > 0) : ?>
                    <span class="harga-coret"><?= formatRupiah($hargaAsli) ?></span>
                <?php else : ?>
                    <?= formatRupiah($hargaAsli) ?>
                <?php endif; ?>
            </td>
            
            <td>
                <?php if ($diskonPersen > 0) : ?>
                    <span style="color: #ff4d4d; font-weight: bold;"><?= $diskonPersen ?>% OFF</span>
                <?php else : ?>
                    -
                <?php endif; ?>
            </td>
            
            <td><strong><?= formatRupiah($hargaSatuan) ?></strong></td>
            <td><?= $itemPesanan["jumlah"] ?></td>
            <td><?= formatRupiah($subtotalDiskon) ?></td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<?php
// Hitung diskon belanja berdasarkan syarat total (15% jika >= 500rb, 10% jika >= 200rb)
$persenDiskonBelanja = hitungDiskonBelanja($totalBelanja);
$nominalDiskonBelanja = $totalBelanja * $persenDiskonBelanja;
$totalBayar = $totalBelanja - $nominalDiskonBelanja;
?>

<div class="info-box" style="text-align: right;">
    <!-- Rincian Totalan Sebelum Diskon Belanja Tambahan -->
    <p style="color: gray;">Total Harga Normal: <?= formatRupiah($totalHargaAsliKeseluruhan) ?></p>
    
    <?php if ($totalDiskonProdukKeseluruhan > 0) : ?>
        <p style="color: #ff4d4d;">
            Potongan Diskon Produk: - <?= formatRupiah($totalDiskonProdukKeseluruhan) ?>
        </p>
    <?php endif; ?>
    
    <p><strong>Total Belanja: <?= formatRupiah($totalBelanja) ?></strong></p>
    
    <!-- Diskon Belanja Tambahan (Syarat >= 200rb / >= 500rb) -->
    <?php if ($persenDiskonBelanja > 0) : ?>
        <p style="color: #2eb82e;">
            <strong>Diskon Belanja (<?= $persenDiskonBelanja * 100 ?>%):</strong> 
            - <?= formatRupiah($nominalDiskonBelanja) ?>
        </p>
    <?php else : ?>
        <p><strong>Diskon Belanja Tambahan:</strong> Rp 0</p>
    <?php endif; ?>
    
    <hr style="border: 1px solid var(--warna-gelap); margin: 15px 0;">
    
    <!-- Total Akhir -->
    <h2 style="margin-bottom: 0;">Total Bayar: <?= formatRupiah($totalBayar) ?></h2>
</div>

<?php require "includes/footer.php"; ?>
<?php
// File: includes/fungsi.php

function formatRupiah(int $angka): string {
    return "Rp " . number_format($angka, 0, ',', '.');
}

function hitungHargaDiskon(int $harga, int $diskonPersen): int {
    if ($diskonPersen <= 0) return $harga;
    return $harga - ($harga * $diskonPersen / 100);
}

function getStatusStok(int $stok): array {
    if ($stok == 0) {
        return ["teks" => "Habis", "warna" => "#ff4d4d"];
    } elseif ($stok >= 1 && $stok <= 4) {
        return ["teks" => "Sisa $stok", "warna" => "#e6b800"];
    } else {
        return ["teks" => "Tersedia", "warna" => "#2eb82e"];
    }
}

function hitungDiskonBelanja(int $totalBelanja): float {
    if ($totalBelanja >= 500000) return 0.15;
    if ($totalBelanja >= 200000) return 0.10;
    return 0.0;
}

function cariProdukTermurah(array $produkArray): array {
    $termurah = $produkArray[0];
    $hargaTermurah = hitungHargaDiskon($termurah['harga'], $termurah['diskon']);

    foreach ($produkArray as $item) {
        $hargaAkhir = hitungHargaDiskon($item['harga'], $item['diskon']);
        if ($hargaAkhir < $hargaTermurah) {
            $termurah = $item;
            $hargaTermurah = $hargaAkhir;
        }
    }
    return $termurah;
}

function hitungRataRataHarga(array $produkArray): int {
    if (count($produkArray) == 0) return 0;
    $totalHarga = array_sum(array_column($produkArray, "harga"));
    return (int)($totalHarga / count($produkArray));
}
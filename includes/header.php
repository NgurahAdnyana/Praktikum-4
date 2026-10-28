<?php
// File: includes/header.php

$menu = [
    "index.php" => ["judul" => "Katalog", "ikon" => "fa-solid fa-store"],
    "pesanan.php" => ["judul" => "Pesanan", "ikon" => "fa-solid fa-receipt"],
    "tentang.php" => ["judul" => "Tentang Toko", "ikon" => "fa-solid fa-circle-info"]
];
$halamanAktif = $halamanAktif ?? "index.php";
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NGOPAI - Coffee Shop</title>
    <!-- FontAwesome untuk Ikon -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --warna-gelap: #502b0f;
            --warna-terang: #FBEED7;
        }
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: var(--warna-terang);
            color: var(--warna-gelap);
            margin: 0;
            padding: 0;
        }
        nav {
            background-color: var(--warna-gelap);
            padding: 15px 20px;
        }
        nav a {
            color: var(--warna-terang);
            text-decoration: none;
            margin-right: 15px;
            font-weight: bold;
            padding: 8px 12px;
            border-radius: 5px;
            transition: 0.3s;
        }
        nav a.aktif, nav a:hover {
            background-color: var(--warna-terang);
            color: var(--warna-gelap);
        }
        nav a i {
            margin-right: 5px;
        }
        .container {
            max-width: 900px;
            margin: 20px auto;
            padding: 0 20px;
        }
        .grid-katalog {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
            gap: 20px;
            margin-top: 20px;
        }
        .kartu {
            background: white;
            border: 2px solid var(--warna-gelap);
            border-radius: 10px;
            padding: 15px;
            position: relative;
            overflow: hidden;
        }
        /* CSS untuk Gambar Produk */
        .gambar-produk {
            width: 100%;
            height: 180px;
            object-fit: cover;
            border-radius: 8px;
            margin-bottom: 15px;
            border: 1px solid #ddd;
        }
        .badge-diskon {
            position: absolute;
            top: 10px;
            right: 10px;
            background-color: #ff4d4d;
            color: white;
            padding: 5px 10px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: bold;
            z-index: 2;
            box-shadow: 0 2px 4px rgba(0,0,0,0.2);
        }
        .harga-coret {
            text-decoration: line-through;
            color: gray;
            font-size: 14px;
        }
        .status-stok {
            display: inline-block;
            padding: 4px 10px;
            border-radius: 5px;
            color: white;
            font-size: 12px;
            font-weight: bold;
            margin-top: 10px;
        }
        .info-box {
            background: rgba(80, 43, 15, 0.1);
            border-left: 4px solid var(--warna-gelap);
            padding: 10px;
            margin-bottom: 15px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            background: white;
            margin-bottom: 20px;
        }
        table, th, td {
            border: 1px solid var(--warna-gelap);
        }
        th, td {
            padding: 10px;
            text-align: left;
        }
        th {
            background-color: var(--warna-gelap);
            color: var(--warna-terang);
        }
    </style>
</head>
<body>

<nav>
    <?php foreach ($menu as $link => $item) : ?>
        <a href="<?= $link ?>" class="<?= ($halamanAktif == $link) ? 'aktif' : '' ?>">
            <i class="<?= $item['ikon'] ?>"></i> <?= $item['judul'] ?>
        </a>
    <?php endforeach; ?>
</nav>

<div class="container">
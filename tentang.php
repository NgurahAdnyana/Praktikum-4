<?php
// File: tentang.php

require_once "includes/data.php";
require_once "includes/fungsi.php";

$halamanAktif = "tentang.php";
require "includes/header.php";
?>

<h1><i class="fa-solid fa-store"></i> Tentang NGOPAI</h1>

<div class="kartu" style="max-width: 500px;">
    <p><strong><i class="fa-solid fa-location-dot"></i> Alamat:</strong> <?= $profilToko["alamat"] ?></p>
    <p><strong><i class="fa-regular fa-clock"></i> Jam Operasional:</strong> <?= $profilToko["jam_buka"] ?></p>
    
    <p><strong><i class="fa-solid fa-bell-concierge"></i> Layanan Kami:</strong></p>
    <ul style="color: gray;">
        <?php foreach ($profilToko["layanan"] as $layanan) : ?>
            <li><?= $layanan ?></li>
        <?php endforeach; ?>
    </ul>
</div>

<?php require "includes/footer.php"; ?>
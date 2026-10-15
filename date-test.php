<?php
$start = new DateTimeImmutable('2026-09-15');
$now = new DateTimeImmutable('now', new DateTimeZone('Asia/Jakarta'));
?>
<!doctype html><html lang="id"><head><meta charset="utf-8"><title>Date/Time Test</title><link rel="stylesheet" href="assets/css/style.css"></head><body class="utility-page"><main class="utility-card"><h1>Date/Time Test</h1><p>Sumber: <?= $start->format('Y-m-d') ?></p><p>Tampilan: <?= $start->format('d-m-Y') ?></p><p>Waktu Asia/Jakarta: <?= $now->format('d-m-Y H:i:s') ?></p><a href="index.php">Kembali</a></main></body></html>
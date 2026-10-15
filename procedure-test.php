<?php
function tampilkanPesan(string $message): void
{
    echo '<p>' . htmlspecialchars($message) . '</p>';
}
?>
<!doctype html><html lang="id"><head><meta charset="utf-8"><title>Procedure Style Test</title><link rel="stylesheet" href="assets/css/style.css"></head><body class="utility-page"><main class="utility-card"><h1>Function vs Procedure-style</h1><?php tampilkanPesan('Pesan ini dicetak langsung oleh function bertipe void.'); ?><p>Untuk perhitungan utama KursusKu tetap diprioritaskan function yang mengembalikan nilai.</p><a href="index.php">Kembali</a></main></body></html>
<?php
$rawName = ' Laravel Fundamental ';
$cleanName = trim($rawName);
$upperName = strtoupper($cleanName);
$lowerName = strtolower($cleanName);
$length = strlen($cleanName);
$short = substr($cleanName, 0, 7);
?>
<!doctype html><html lang="id"><head><meta charset="utf-8"><title>String Test</title><link rel="stylesheet" href="assets/css/style.css"></head><body class="utility-page"><main class="utility-card"><h1>String Function Test</h1><ul><li>trim(): <?= htmlspecialchars($cleanName) ?></li><li>strtoupper(): <?= htmlspecialchars($upperName) ?></li><li>strtolower(): <?= htmlspecialchars($lowerName) ?></li><li>strlen(): <?= $length ?></li><li>substr(): <?= htmlspecialchars($short) ?></li></ul><a href="index.php">Kembali</a></main></body></html>
<?php
$fee = 350000;
$participants = 2;
$subtotal = $fee * $participants;
$comparisonPositive = $fee > 0;
$comparisonStrict = $fee === 350000;
$message = 'Biaya: Rp ' . $fee;
?>
<!doctype html><html lang="id"><head><meta charset="utf-8"><title>Operator Test</title><link rel="stylesheet" href="assets/css/style.css"></head><body class="utility-page"><main class="utility-card"><h1>Operator PHP</h1><ul><li>Perkalian: <?= $subtotal ?></li><li>Comparison &gt; 0: <?= $comparisonPositive ? 'true' : 'false' ?></li><li>Strict ===: <?= $comparisonStrict ? 'true' : 'false' ?></li><li>Concatenation: <?= htmlspecialchars($message) ?></li></ul><a href="fee-calculator.php">Kembali ke Kalkulator</a></main></body></html>
<?php
require_once __DIR__ . '/helpers.php';

$tests = [
    ['Rupiah',       rupiah(250000),          'Rp 250.000'],
    ['Penuh',        statusKursus(25, 25),    'Penuh'],
    ['Tersedia',     statusKursus(30, 29),    'Tersedia'],
    ['Sisa kosong',  sisaKursi(20, 0),        20],
    ['Sisa penuh',   sisaKursi(25, 25),       0],
    ['Tanggal',      formatTanggal('2026-09-15'), '15-09-2026'],
];
?>
<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Test Functions - KursusKu</title>
    <style>
        body{font-family:Arial,sans-serif;background:#f5f7f6;margin:0;padding:32px;color:#16332c}
        .card{max-width:640px;margin:auto;background:#fff;padding:24px;border-radius:16px}
        .pass{color:#146c43;font-weight:bold}
        .fail{color:#a61b1b;font-weight:bold}
        table{width:100%;border-collapse:collapse;margin-top:16px}
        th,td{border-bottom:1px solid #ddd;padding:8px;text-align:left;font-size:14px}
    </style>
</head>
<body>
<main class="card">
    <h1>Hasil Test Function KursusKu</h1>
    <table>
        <tr><th>Test</th><th>Actual</th><th>Expected</th><th>Status</th></tr>
        <?php foreach ($tests as [$name, $actual, $expected]): ?>
            <?php $passed = $actual === $expected; ?>
            <tr>
                <td><?= htmlspecialchars($name) ?></td>
                <td><?= htmlspecialchars((string) $actual) ?></td>
                <td><?= htmlspecialchars((string) $expected) ?></td>
                <td class="<?= $passed ? 'pass' : 'fail' ?>"><?= $passed ? 'PASS' : 'FAIL' ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
</main>
</body>
</html>

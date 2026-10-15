<?php

declare(strict_types=1);

require __DIR__ . '/data.php';
require __DIR__ . '/helpers.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: register.php');
    exit;
}

$name = trim($_POST['name'] ?? '');
$email = trim($_POST['email'] ?? '');
$courseCode = (string) ($_POST['course_code'] ?? '');
$participantType = (string) ($_POST['participant_type'] ?? '');
$learningMode = (string) ($_POST['learning_mode'] ?? '');
$packageCount = (int) ($_POST['package_count'] ?? 1);
$notes = trim($_POST['notes'] ?? '');
$interests = $_POST['interests'] ?? [];

if (!is_array($interests)) {
    $interests = [];
}

$allowedInterestKeys = array_keys($interestOptions);
$interests = array_values(array_intersect($interests, $allowedInterestKeys));

$course = findCourse($courses, $courseCode);
$errors = [];

if ($name === '') {
    $errors[] = 'Nama wajib diisi.';
}
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors[] = 'Email tidak valid.';
}
if ($course === null) {
    $errors[] = 'Kursus tidak valid.';
}
if (!in_array($participantType, ['mahasiswa', 'guru', 'umum'], true)) {
    $errors[] = 'Tipe peserta tidak valid.';
}
if (!in_array($learningMode, ['offline', 'online', 'hybrid'], true)) {
    $errors[] = 'Metode belajar tidak valid.';
}
if ($packageCount < 1 || $packageCount > 3) {
    $errors[] = 'Jumlah paket harus antara 1 sampai 3.';
}

if ($errors !== []) {
    http_response_code(422);
    ?>
    <!doctype html>
    <html lang="id">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Data Belum Valid - KursusKu</title>
        <link rel="stylesheet" href="assets/css/style.css">
    </head>
    <body class="utility-page">
    <main class="utility-card">
        <span class="eyebrow">VALIDASI FUNDAMENTAL</span>
        <h1>Data belum dapat diproses</h1>
        <div class="alert alert-error">
            <ul>
                <?php foreach ($errors as $error): ?>
                    <li><?= e($error) ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
        <a class="button" href="register.php">Kembali ke Form</a>
    </main>
    </body>
    </html>
    <?php
    exit;
}

$discountPercent = getDiscountPercent($participantType);
$grossTotal = $course['fee'] * $packageCount;
$discountAmount = intdiv($grossTotal * $discountPercent, 100);
$finalTotal = $grossTotal - $discountAmount;
$learningModeLabel = getLearningModeLabel($learningMode);
?>
<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Ringkasan Pendaftaran - KursusKu</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body class="utility-page">
<main class="utility-card">
    <span class="eyebrow">MILESTONE 6 · RINGKASAN</span>
    <h1>Pendaftaran Berhasil Diproses</h1>

    <div class="result-grid">
        <p><b>Nama:</b><br><?= e($name) ?></p>
        <p><b>Email:</b><br><?= e($email) ?></p>
        <p><b>Kursus:</b><br><?= e($course['name']) ?></p>
        <p><b>Tipe peserta:</b><br><?= e(ucfirst($participantType)) ?></p>
        <p><b>Metode:</b><br><?= e($learningModeLabel) ?></p>
        <p><b>Jumlah paket:</b><br><?= $packageCount ?></p>
    </div>

    <h2>Rincian Biaya</h2>
    <div class="table-wrap">
        <table class="course-table compact-table">
            <tbody>
            <tr><td>Biaya satuan</td><td><?= formatRupiah((int) $course['fee']) ?></td></tr>
            <tr><td>Subtotal</td><td><?= formatRupiah($grossTotal) ?></td></tr>
            <tr><td>Diskon <?= $discountPercent ?>%</td><td>-<?= formatRupiah($discountAmount) ?></td></tr>
            <tr class="total-row"><th>Total akhir</th><th><?= formatRupiah($finalTotal) ?></th></tr>
            </tbody>
        </table>
    </div>

    <h2>Minat</h2>
    <?php if ($interests === []): ?>
        <p class="alert alert-info">Belum memilih minat.</p>
    <?php else: ?>
        <ul class="chip-list">
            <?php foreach ($interests as $interest): ?>
                <li><?= e($interestOptions[$interest]) ?></li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>

    <h2>Fasilitas</h2>
    <ul>
        <?php foreach ($facilities as $facility): ?>
            <li><?= e($facility) ?></li>
        <?php endforeach; ?>
    </ul>

    <h2>Catatan</h2>
    <p><?= e($notes !== '' ? $notes : 'Tidak ada catatan tambahan.') ?></p>

    <div class="button-row">
        <a class="button" href="register.php">Daftar Lagi</a>
        <a class="button button-secondary" href="history.php">Lihat History Dummy</a>
        <a class="button button-secondary" href="index.php">Beranda</a>
    </div>
</main>
</body>
</html>
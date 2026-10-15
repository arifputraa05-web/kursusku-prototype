<?php

declare(strict_types=1);

$name = trim($_GET['name'] ?? '');
$course = trim($_GET['course'] ?? '');
$participantType = trim($_GET['participant_type'] ?? '');
$query = $_SERVER['QUERY_STRING'] ?? '';
?>
<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Eksperimen GET - KursusKu</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body class="utility-page">
<main class="utility-card">
    <span class="eyebrow">MILESTONE 5 · GET VS POST</span>
    <h1>Eksperimen GET</h1>
    <p>Berbeda dengan POST, parameter GET tampak pada query string URL.</p>
    <?php if ($query !== ''): ?>
        <div class="formula-box">
            <strong>Query string yang diterima:</strong>
            <code>?<?= htmlspecialchars($query, ENT_QUOTES, 'UTF-8') ?></code>
            <span>Nama: <?= htmlspecialchars($name, ENT_QUOTES, 'UTF-8') ?></span>
            <span>Kursus: <?= htmlspecialchars($course, ENT_QUOTES, 'UTF-8') ?></span>
            <span>Peserta: <?= htmlspecialchars($participantType, ENT_QUOTES, 'UTF-8') ?></span>
        </div>
    <?php endif; ?>

    <form method="GET" action="get-demo.php" class="stack-form">
        <div class="field">
            <label for="get-name">Nama</label>
            <input id="get-name" name="name" type="text" required value="<?= htmlspecialchars($name, ENT_QUOTES, 'UTF-8') ?>">
        </div>
        <div class="field">
            <label for="get-course">Kursus</label>
            <select id="get-course" name="course" required>
                <option value="PHP Dasar">PHP Dasar</option>
                <option value="Web Dasar">Web Dasar</option>
                <option value="Laravel Dasar">Laravel Dasar</option>
            </select>
        </div>
        <fieldset class="field">
            <legend>Peserta</legend>
            <label><input type="radio" name="participant_type" value="mahasiswa" checked> Mahasiswa</label>
            <label><input type="radio" name="participant_type" value="umum"> Umum</label>
        </fieldset>
        <button class="button" type="submit">Kirim dengan GET</button>
    </form>

    <p class="table-note">Setelah eksperimen, form utama tetap memakai POST di <code>registration.php</code>.</p>
    <a class="text-link" href="registration.php">Kembali ke Form POST →</a>
</main>
</body>
</html>
<?php

require_once __DIR__ . '/helpers.php';

$history = [
    [
        'name' => 'Alya',
        'course' => 'Web Dasar',
        'total' => 240000
    ],

    [
        'name' => 'Bima',
        'course' => 'PHP Dasar',
        'total' => 340000
    ],

    [
        'name' => 'Citra',
        'course' => 'Laravel Fundamental',
        'total' => 500000
    ],
];

?>

<!doctype html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>History Pendaftaran - KursusKu</title>

    <link rel="stylesheet" href="assets/style.css">
</head>

<body>

<header class="site-header">

    <div class="container nav-wrap">

        <a class="brand" href="index.php">
            KursusKu
        </a>

        <nav aria-label="Navigasi utama">
            <a href="index.php">Beranda</a>
            <a href="registration.php">Daftar</a>
            <a href="history.php">History</a>
        </nav>

    </div>

</header>


<main class="container">

    <section class="page-intro">

        <p class="eyebrow">
            History
        </p>

        <h1>
            History Pendaftaran
        </h1>

        <p>
            Contoh data history pendaftaran KursusKu.
        </p>

    </section>


    <section class="form-card">

        <?php foreach ($history as $item): ?>

            <div class="summary-card">

                <h2>
                    <?= e($item['name']) ?>
                </h2>

                <p>
                    <strong>Kursus:</strong>
                    <?= e($item['course']) ?>
                </p>

                <p>
                    <strong>Total:</strong>
                    <?= formatRupiah($item['total']) ?>
                </p>

            </div>

        <?php endforeach; ?>

    </section>

</main>

</body>
</html>
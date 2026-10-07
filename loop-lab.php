<?php
require_once __DIR__ . '/helpers.php';
require_once __DIR__ . '/data.php';
?>

<!doctype html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Loop Lab - KursusKu</title>

    <link rel="stylesheet" href="assets/style.css">
</head>

<body>

<header class="site-header">

    <div class="container nav-wrap">

        <a class="brand" href="index.php">
            KursusKu
        </a>

        <nav>
            <a href="index.php">Beranda</a>
            <a href="registration.php">Daftar</a>
            <a href="history.php">History</a>
            <a href="loop-lab.php">Loop Lab</a>
        </nav>

    </div>

</header>


<main class="container">

    <section class="page-intro">

        <p class="eyebrow">
            Pertemuan 6
        </p>

        <h1>
            Loop Lab
        </h1>

        <p>
            Contoh penggunaan for, while, do-while, dan foreach.
        </p>

    </section>


    <section class="form-card">

        <!-- 1. FOR -->
        <h2>1. For</h2>

        <?php for ($i = 1; $i <= 5; $i++): ?>

            <p>
                Perulangan for ke-<?= $i ?>
            </p>

        <?php endfor; ?>


        <hr>


        <!-- 2. WHILE -->
        <h2>2. While</h2>

        <?php

        $angka = 1;

        while ($angka <= 5):

        ?>

            <p>
                Perulangan while ke-<?= $angka ?>
            </p>

        <?php

            $angka++;

        endwhile;

        ?>


        <hr>


        <!-- 3. DO WHILE -->
        <h2>3. Do While</h2>

        <?php

        $nomor = 1;

        do {
        ?>

            <p>
                Perulangan do-while ke-<?= $nomor ?>
            </p>

        <?php

            $nomor++;

        } while ($nomor <= 5);

        ?>


        <hr>


        <!-- 4. FOREACH FASILITAS -->
        <h2>4. Daftar Fasilitas</h2>

        <p>
            Daftar fasilitas ditampilkan menggunakan perulangan foreach.
        </p>

        <ul>

            <?php foreach ($facilities as $facility): ?>

                <li>
                    <?= e($facility) ?>
                </li>

            <?php endforeach; ?>

        </ul>

    </section>

</main>

</body>
</html>
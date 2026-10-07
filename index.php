<?php
// Panggil fungsi bantu dari pertemuan sebelumnya
require_once __DIR__ . '/helpers.php';

// Nilai dasar situs
$siteName = 'KursusKu';
$tagline  = 'Belajar, daftar, dan kelola kursus dalam satu tempat.';
$year     = date('Y');

// Data katalog kursus — minimal 6 kursus
$courses = [
    ['code' => 'WEB-01', 'name' => 'Web Dasar',         'fee' => 200000, 'quota' => 30, 'registered' => 12, 'start_date' => '2026-09-21'],
    ['code' => 'PHP-01', 'name' => 'PHP Dasar',         'fee' => 250000, 'quota' => 30, 'registered' => 18, 'start_date' => '2026-09-22'],
    ['code' => 'PHP-02', 'name' => 'PHP Lanjutan',      'fee' => 300000, 'quota' => 25, 'registered' => 24, 'start_date' => '2026-09-24'],
    ['code' => 'LAR-01', 'name' => 'Laravel Fundamental', 'fee' => 350000, 'quota' => 25, 'registered' => 25, 'start_date' => '2026-09-28'],
    ['code' => 'DB-01',  'name' => 'MySQL Dasar',       'fee' => 275000, 'quota' => 20, 'registered' => 0,  'start_date' => '2026-10-01'],
    ['code' => 'UI-01',  'name' => 'UI Web Dasar',      'fee' => 225000, 'quota' => 35, 'registered' => 9,  'start_date' => '2026-10-03'],
];
?>

<!doctype html>
<html lang="id">

<head>

    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title><?= htmlspecialchars($siteName) ?></title>

    <!-- CSS lama tetap dipakai -->
    <link rel="stylesheet" href="assets/css/style.css">

    <style>

        /* =====================================================
           TAMBAHAN DESIGN BERANDA KURSUSKU
           Tidak menghapus CSS lama
        ===================================================== */

        * {
            box-sizing: border-box;
        }

        html {
            scroll-behavior: smooth;
        }

        body {
            margin: 0;
            font-family: Arial, Helvetica, sans-serif;
            background: #f3f6fb;
            color: #172033;
            line-height: 1.6;
        }

        /* =========================
           HEADER
        ========================= */

        header {
            background: linear-gradient(
                135deg,
                #2563eb,
                #4f46e5,
                #5b3fe8
            );

            padding: 18px 7%;
            position: sticky;
            top: 0;
            z-index: 1000;

            box-shadow:
                0 4px 15px rgba(37, 99, 235, 0.25);
        }

        header nav {
            max-width: 1200px;
            margin: auto;

            display: flex;
            align-items: center;
            justify-content: space-between;

            gap: 15px;
            flex-wrap: wrap;
        }

        header nav a {
            color: white;
            text-decoration: none;
            font-weight: 600;

            padding: 9px 14px;
            border-radius: 8px;

            transition: 0.25s;
        }

        header nav a:hover {
            background: rgba(255, 255, 255, 0.18);
            transform: translateY(-1px);
        }

        header nav a:first-child {
            font-size: 23px;
            margin-right: auto;
        }


        /* =========================
           MAIN
        ========================= */

        main {
            max-width: 1200px;
            margin: auto;
            padding: 40px 20px 70px;
        }


        /* =========================
           SEMUA SECTION
        ========================= */

        main section {
            margin-bottom: 55px;
        }

        main section h2 {
            font-size: 30px;
            margin-bottom: 25px;
            color: #172554;
        }


        /* =========================
           HERO
        ========================= */

        #hero {
            position: relative;
            overflow: hidden;

            padding: 70px 55px;

            border-radius: 28px;

            background:
                linear-gradient(
                    135deg,
                    #2563eb 0%,
                    #4338ca 55%,
                    #5b21b6 100%
                );

            color: white;

            box-shadow:
                0 18px 45px rgba(37, 99, 235, 0.25);
        }

        #hero::before {
            content: "";
            position: absolute;

            width: 260px;
            height: 260px;

            border-radius: 50%;

            background: rgba(255,255,255,0.08);

            right: -70px;
            top: -90px;
        }

        #hero::after {
            content: "";
            position: absolute;

            width: 180px;
            height: 180px;

            border-radius: 50%;

            background: rgba(255,255,255,0.06);

            right: 160px;
            bottom: -100px;
        }

        #hero h1 {
            position: relative;
            z-index: 2;

            max-width: 800px;

            font-size: clamp(35px, 5vw, 58px);
            line-height: 1.15;

            margin: 0 0 20px;
        }

        #hero p {
            position: relative;
            z-index: 2;

            max-width: 700px;

            font-size: 18px;

            color: rgba(255,255,255,0.9);

            margin-bottom: 30px;
        }

        #hero a {
            position: relative;
            z-index: 2;

            display: inline-block;

            padding: 13px 21px;

            margin: 5px 8px 5px 0;

            border-radius: 10px;

            text-decoration: none;

            font-weight: bold;

            transition: 0.25s;
        }

        #hero > a:first-of-type {
            background: white;
            color: #3730a3;
        }

        #hero > a:first-of-type:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 20px rgba(0,0,0,0.2);
        }

        #hero .button {
            background: rgba(255,255,255,0.14);
            color: white;

            border: 1px solid rgba(255,255,255,0.4);
        }

        #hero .button:hover {
            background: rgba(255,255,255,0.23);
            transform: translateY(-3px);
        }


        /* =========================
           KEUNGGULAN
        ========================= */

        #keunggulan {
            background: white;

            padding: 35px;

            border-radius: 22px;

            border: 1px solid #d5dbe7;

            box-shadow:
                0 8px 25px rgba(15, 23, 42, 0.07);
        }

        #keunggulan > h2 {
            margin-top: 0;
        }

        #keunggulan article {
            display: inline-block;

            vertical-align: top;

            width: calc(33.333% - 17px);

            margin-right: 20px;

            padding: 25px;

            min-height: 170px;

            background: #f8faff;

            border: 2px solid #dbe3f0;

            border-radius: 16px;

            transition: 0.25s;
        }

        #keunggulan article:last-child {
            margin-right: 0;
        }

        #keunggulan article:hover {
            transform: translateY(-5px);

            border-color: #6366f1;

            box-shadow:
                0 10px 25px rgba(79,70,229,0.12);
        }

        #keunggulan h3 {
            color: #3730a3;
            margin-top: 0;
            font-size: 20px;
        }

        #keunggulan p {
            color: #526071;
        }


        /* =========================
           KATALOG
        ========================= */

        #katalog {
            background: white;

            padding: 35px;

            border-radius: 22px;

            border: 1px solid #d5dbe7;

            box-shadow:
                0 8px 25px rgba(15, 23, 42, 0.07);

            overflow-x: auto;
        }

        #katalog h2 {
            margin-top: 0;
        }

        #katalog table {
            width: 100%;

            border-collapse: separate;
            border-spacing: 0;

            overflow: hidden;

            border: 2px solid #cbd5e1;

            border-radius: 12px;

            background: white;
        }

        #katalog th {
            background: linear-gradient(
                135deg,
                #2563eb,
                #4f46e5
            );

            color: white;

            padding: 16px;

            text-align: left;

            border-right: 1px solid rgba(255,255,255,0.3);
        }

        #katalog td {
            padding: 15px 16px;

            border-top: 1px solid #cbd5e1;
            border-right: 1px solid #d9e0ea;

            color: #263244;
        }

        #katalog th:last-child,
        #katalog td:last-child {
            border-right: none;
        }

        #katalog tbody tr:nth-child(even) {
            background: #f8fafc;
        }

        #katalog tbody tr:hover {
            background: #eef4ff;
        }

        .badge-full,
        .badge-available {
            display: inline-block;

            padding: 6px 12px;

            border-radius: 20px;

            font-size: 13px;

            font-weight: bold;
        }

        .badge-full {
            background: #fee2e2;
            color: #b91c1c;

            border: 1px solid #fecaca;
        }

        .badge-available {
            background: #dcfce7;
            color: #15803d;

            border: 1px solid #bbf7d0;
        }


        /* =========================
           ALUR PENDAFTARAN
        ========================= */

        #alur {
            background: white;

            padding: 35px;

            border-radius: 22px;

            border: 1px solid #d5dbe7;

            box-shadow:
                0 8px 25px rgba(15, 23, 42, 0.07);
        }

        #alur h2 {
            margin-top: 0;
        }

        #alur ol {
            padding-left: 25px;
        }

        #alur li {
            padding: 12px 15px;

            margin-bottom: 10px;

            background: #f8faff;

            border: 1px solid #d5dff0;

            border-radius: 10px;
        }

        #alur li::marker {
            color: #4338ca;
            font-weight: bold;
        }


        /* =========================
           MEDIA
        ========================= */

        #media {
            background: white;

            padding: 35px;

            border-radius: 22px;

            border: 1px solid #d5dbe7;

            box-shadow:
                0 8px 25px rgba(15, 23, 42, 0.07);
        }

        #media h2 {
            margin-top: 0;
        }

        #media img,
        #media video {
            display: block;

            width: 100%;
            max-width: 640px;

            height: auto;

            border-radius: 16px;

            border: 2px solid #cbd5e1;

            box-shadow:
                0 8px 20px rgba(15, 23, 42, 0.12);

            margin-bottom: 20px;
        }

        #media a {
            color: #3730a3;
            font-weight: bold;
        }


        /* =========================
           KONTAK
        ========================= */

        #kontak {
            background:
                linear-gradient(
                    135deg,
                    #eef4ff,
                    #f5f3ff
                );

            padding: 35px;

            border-radius: 22px;

            border: 2px solid #cbd5e1;

            box-shadow:
                0 8px 25px rgba(15, 23, 42, 0.06);
        }

        #kontak h2 {
            margin-top: 0;
        }

        #kontak p {
            background: white;

            padding: 13px 17px;

            border: 1px solid #d5dbe7;

            border-radius: 10px;

            margin: 10px 0;
        }


        /* =========================
           FOOTER
        ========================= */

        footer {
            background: #172554;

            color: white;

            text-align: center;

            padding: 28px 20px;

            border-top: 4px solid #4f46e5;
        }

        footer small {
            opacity: 0.9;
        }


        /* =========================
           RESPONSIVE
        ========================= */

        @media (max-width: 800px) {

            header nav {
                justify-content: center;
            }

            header nav a:first-child {
                width: 100%;
                text-align: center;
                margin-right: 0;
            }

            #hero {
                padding: 45px 25px;
            }

            #hero h1 {
                font-size: 36px;
            }

            #keunggulan article {
                width: 100%;
                margin: 0 0 15px;
            }

            #katalog {
                padding: 20px;
            }

            #katalog table {
                min-width: 750px;
            }

            main {
                padding-left: 15px;
                padding-right: 15px;
            }
        }

    </style>

</head>

<body>


<!-- =========================
     HEADER
========================= -->

<header>

    <nav aria-label="Navigasi utama">

        <a href="index.php">
            <strong><?= htmlspecialchars($siteName) ?></strong>
        </a>

        <a href="#keunggulan">
            Keunggulan
        </a>

        <a href="#katalog">
            Katalog
        </a>

        <a href="registration.php">
            Daftar kursus
        </a>

        <a href="#kontak">
            Kontak
        </a>

    </nav>

</header>


<main>


    <!-- =========================
         HERO
    ========================= -->

    <section id="hero">

        <h1>
            <?= htmlspecialchars($tagline) ?>
        </h1>

        <p>
            Temukan kursus teknologi yang relevan untuk
            meningkatkan keterampilan Anda.
        </p>

        <a href="#katalog">
            Lihat Katalog Kursus
        </a>

        <br><br>

        <a class="button" href="fee-calculator.php">
            Lihat Estimasi Biaya
        </a>

        <a class="button" href="registration.php">
            Daftar Sekarang
        </a>

    </section>


    <!-- =========================
         KEUNGGULAN
    ========================= -->

    <section id="keunggulan">

        <h2>
            Mengapa Memilih KursusKu?
        </h2>

        <article>

            <h3>
                Materi Terarah
            </h3>

            <p>
                Materi disusun bertahap dari dasar
                hingga praktik.
            </p>

        </article>


        <article>

            <h3>
                Belajar dengan Proyek
            </h3>

            <p>
                Setiap tahap menghasilkan bagian nyata
                dari aplikasi.
            </p>

        </article>


        <article>

            <h3>
                Pendampingan Praktik
            </h3>

            <p>
                Mahasiswa belajar melalui demonstrasi,
                latihan, dan evaluasi.
            </p>

        </article>

    </section>


    <!-- =========================
         KATALOG
    ========================= -->

    <section id="katalog">

        <h2>
            Katalog Kursus
        </h2>

        <table>

            <thead>

                <tr>
                    <th>Kode</th>
                    <th>Nama</th>
                    <th>Biaya</th>
                    <th>Mulai</th>
                    <th>Sisa Kursi</th>
                    <th>Status</th>
                </tr>

            </thead>


            <tbody>

                <?php foreach ($courses as $course): ?>

                    <?php

                    $status = statusKursus(
                        $course['quota'],
                        $course['registered']
                    );

                    $statusClass =
                        $status === 'Penuh'
                        ? 'badge-full'
                        : 'badge-available';

                    ?>

                    <tr>

                        <td>
                            <?= htmlspecialchars($course['code']) ?>
                        </td>

                        <td>
                            <?= htmlspecialchars(trim($course['name'])) ?>
                        </td>

                        <td>
                            <strong>
                                <?= rupiah($course['fee']) ?>
                            </strong>
                        </td>

                        <td>
                            <?= formatTanggal($course['start_date']) ?>
                        </td>

                        <td>
                            <?= sisaKursi(
                                $course['quota'],
                                $course['registered']
                            ) ?>
                        </td>

                        <td>

                            <span class="<?= $statusClass ?>">
                                <?= $status ?>
                            </span>

                        </td>

                    </tr>

                <?php endforeach; ?>

            </tbody>

        </table>

    </section>


    <!-- =========================
         CARA MENDAFTAR
    ========================= -->

    <section id="alur">

        <h2>
            Cara Mendaftar
        </h2>

        <ol>

            <li>
                Pilih kursus yang diminati.
            </li>

            <li>
                Isi form pendaftaran di halaman Daftar.
            </li>

            <li>
                Periksa kembali data yang dimasukkan.
            </li>

            <li>
                Kirim pendaftaran dan tunggu konfirmasi.
            </li>

        </ol>

    </section>


    <!-- =========================
         MEDIA
    ========================= -->

    <section id="media">

        <h2>
            Kenali Program Kami
        </h2>

        <img
            src="assets/images/hero-kursus.jpg"
            alt="Kegiatan KursusKu"
            width="640"
        >


        <h3>
            Video Singkat
        </h3>

        <video controls width="640">

            <source
                src="assets/video/intro-kursus.mp4"
                type="video/mp4"
            >

            Browser Anda tidak mendukung video HTML5.

        </video>


        <p>

            Pelajari juga

            <a
                href="https://www.php.net/"
                target="_blank"
                rel="noopener"
            >
                dokumentasi PHP
            </a>.

        </p>

    </section>


    <!-- =========================
         KONTAK
    ========================= -->

    <section id="kontak">

        <h2>
            Kontak
        </h2>

        <p>
            Email: arifputraa05@gmail.com
        </p>

        <p>
            Alamat: Induring Kapau — Data Latihan
        </p>

    </section>


</main>


<!-- =========================
     FOOTER
========================= -->

<footer>

    <small>
        &copy; <?= $year ?>
        <?= htmlspecialchars($siteName) ?>.
        Semua Hak Dilindungi.
    </small>

</footer>


</body>
</html>
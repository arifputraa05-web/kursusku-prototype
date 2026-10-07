<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once __DIR__ . '/helpers.php';

// Jika halaman dibuka langsung tanpa POST,
// kembalikan ke halaman pendaftaran.
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: registration.php');
    exit;
}

// ===============================
// BACA DATA DARI FORM
// ===============================

$name = trim($_POST['name'] ?? '');
$email = trim($_POST['email'] ?? '');
$phone = trim($_POST['phone'] ?? '');
$studyProgram = trim($_POST['study_program'] ?? '');

$courseCode = $_POST['course'] ?? '';
$participantType = $_POST['participant_type'] ?? '';
$interests = $_POST['interests'] ?? [];
$note = trim($_POST['note'] ?? '');
$source = $_POST['source'] ?? '';

$learningMode = $_POST['learning_mode'] ?? '';
$packageCount = (int) ($_POST['package_count'] ?? 0);

// Pastikan interests selalu berupa array
if (!is_array($interests)) {
    $interests = [];
}

// ===============================
// VALIDASI
// ===============================

$errors = [];

// Nama
if ($name === '') {
    $errors[] = 'Nama lengkap wajib diisi.';
}

// Email
if ($email === '') {
    $errors[] = 'Email wajib diisi.';
} elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors[] = 'Format email tidak valid.';
}

// Kursus
if ($courseCode === '') {
    $errors[] = 'Kursus wajib dipilih.';
}

// Jenis peserta
$allowedParticipantTypes = [
    'mahasiswa',
    'guru',
    'umum'
];

if (!in_array($participantType, $allowedParticipantTypes, true)) {
    $errors[] = 'Jenis peserta tidak valid.';
}

// Mode belajar
$allowedLearningModes = [
    'offline',
    'online',
    'hybrid'
];

if (!in_array($learningMode, $allowedLearningModes, true)) {
    $errors[] = 'Mode belajar wajib dipilih.';
}

// Jumlah paket
if ($packageCount < 1 || $packageCount > 3) {
    $errors[] = 'Jumlah paket harus antara 1 sampai 3.';
}

// ===============================
// DATA KURSUS
// ===============================

$courses = [
    [
        'code' => 'web-dasar',
        'name' => 'Web Dasar',
        'fee' => 200000
    ],
    [
        'code' => 'php-dasar',
        'name' => 'PHP Dasar',
        'fee' => 250000
    ],
    [
        'code' => 'laravel-fundamental',
        'name' => 'Laravel Fundamental',
        'fee' => 350000
    ],
];

// Cari kursus
$course = findCourse($courses, $courseCode);

if ($course === null) {
    $errors[] = 'Kursus yang dipilih tidak ditemukan.';
}

// ===============================
// TAMPILKAN ERROR
// ===============================

if (!empty($errors)) {
    ?>
    <!doctype html>
    <html lang="id">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Data Tidak Valid - KursusKu</title>

        <link rel="stylesheet" href="assets/style.css">

        <style>
            .error-box {
                max-width: 800px;
                margin: 80px auto;
                background: #ffffff;
                border: 2px solid #dc2626;
                border-radius: 20px;
                padding: 35px;
                box-shadow: 0 15px 35px rgba(0, 0, 0, 0.08);
            }

            .error-box h1 {
                color: #b91c1c;
                margin-bottom: 20px;
            }

            .error-box ul {
                padding-left: 25px;
                line-height: 1.8;
            }

            .error-box li {
                margin-bottom: 8px;
            }
        </style>
    </head>

    <body>

        <main class="container">

            <section class="error-box">

                <h1>⚠ Data Belum Valid</h1>

                <p>
                    Periksa kembali data yang kamu masukkan.
                </p>

                <ul>
                    <?php foreach ($errors as $error): ?>
                        <li><?= e($error) ?></li>
                    <?php endforeach; ?>
                </ul>

                <br>

                <a class="btn-link" href="registration.php">
                    ← Kembali ke Form
                </a>

            </section>

        </main>

    </body>
    </html>

    <?php
    exit;
}

// ===============================
// PERHITUNGAN
// ===============================

// Menentukan persentase diskon
$discountPercent = getDiscountPercent($participantType);

// Total sebelum diskon
$grossTotal = $course['fee'] * $packageCount;

// Nominal diskon
$discountAmount = intdiv(
    $grossTotal * $discountPercent,
    100
);

// Total akhir
$finalTotal = $grossTotal - $discountAmount;

// Mode belajar
$learningModeLabel = getLearningModeLabel($learningMode);

// Minat
$interestText = !empty($interests)
    ? implode(', ', $interests)
    : 'Belum memilih minat';

?>

<!doctype html>
<html lang="id">

<head>

    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Hasil Pendaftaran - KursusKu</title>

    <link rel="stylesheet" href="assets/style.css">

    <style>

        /* ==========================================
           HALAMAN HASIL PENDAFTARAN
           ========================================== */

        body {
            background: #f4f7fb;
        }

        .result-page {
            max-width: 1100px;
            margin: 50px auto;
            padding-bottom: 60px;
        }

        /* ==========================================
           HEADER HASIL
           ========================================== */

        .result-header {
            position: relative;
            overflow: hidden;

            background: linear-gradient(
                135deg,
                #2563eb,
                #4f46e5
            );

            color: white;

            padding: 40px 45px;

            border-radius: 24px;

            margin-bottom: 28px;

            box-shadow:
                0 18px 40px rgba(37, 99, 235, 0.25);
        }

        .result-header::after {
            content: "";

            position: absolute;

            width: 180px;
            height: 180px;

            right: -50px;
            top: -80px;

            background: rgba(255,255,255,0.12);

            border-radius: 50%;
        }

        .result-header h1 {
            margin: 0 0 10px;

            font-size: 38px;

            color: white;
        }

        .result-header p {
            margin: 0;

            font-size: 17px;

            color: rgba(255,255,255,0.9);
        }

        .check-icon {
            display: inline-flex;

            width: 50px;
            height: 50px;

            align-items: center;
            justify-content: center;

            background: rgba(255,255,255,0.18);

            border-radius: 50%;

            font-size: 27px;

            margin-right: 12px;
        }

        /* ==========================================
           KARTU DATA
           ========================================== */

        .summary-card {
            background: white;

            border: 2px solid #cbd5e1;

            border-radius: 20px;

            padding: 35px 40px;

            box-shadow:
                0 12px 30px rgba(15, 23, 42, 0.08);
        }

        /* ==========================================
           DATA PENDAFTAR
           ========================================== */

        .summary-list {
            width: 100%;
            margin: 0;
        }

        .summary-list dt {
            font-size: 17px;

            font-weight: 700;

            color: #1e293b;

            padding: 17px 16px 8px;

            border-top: 2px solid #94a3b8;
        }

        .summary-list dd {
            margin: 0;

            padding: 10px 16px 18px;

            font-size: 16px;

            color: #111827;

            border-bottom: 2px solid #cbd5e1;
        }

        .summary-list dt:first-child {
            border-top: 3px solid #64748b;
        }

        .summary-list dd:last-child {
            border-bottom: 3px solid #64748b;
        }

        /* ==========================================
           PEMISAH PEMBAYARAN
           ========================================== */

        .payment-divider {
            border: 0;

            border-top: 4px solid #64748b;

            margin: 35px 0 25px;
        }

        .payment-title {
            font-size: 22px;

            font-weight: 800;

            color: #1e293b;

            margin-bottom: 15px;
        }

        /* ==========================================
           DETAIL HARGA
           ========================================== */

        .price-box {
            border: 2px solid #cbd5e1;

            border-radius: 15px;

            overflow: hidden;

            background: #f8fafc;
        }

        .price-row {
            display: flex;

            justify-content: space-between;

            align-items: center;

            padding: 17px 20px;

            border-bottom: 2px solid #cbd5e1;

            font-size: 17px;
        }

        .price-row:last-child {
            border-bottom: 0;
        }

        .price-row strong {
            color: #334155;
        }

        .price-row span {
            font-weight: 700;

            color: #0f172a;
        }

        /* ==========================================
           TOTAL AKHIR
           ========================================== */

        .final-total {
            margin-top: 18px;

            display: flex;

            justify-content: space-between;

            align-items: center;

            padding: 22px 25px;

            border: 3px solid #4f46e5;

            border-radius: 16px;

            background: #eef2ff;

            box-shadow:
                0 8px 20px rgba(79, 70, 229, 0.12);
        }

        .final-total .label {
            font-size: 20px;

            font-weight: 800;

            color: #312e81;
        }

        .final-total .amount {
            font-size: 25px;

            font-weight: 900;

            color: #4338ca;
        }

        /* ==========================================
           TOMBOL
           ========================================== */

        .result-actions {
            margin-top: 30px;

            display: flex;

            gap: 12px;

            flex-wrap: wrap;
        }

        .btn-back {
            display: inline-block;

            padding: 13px 22px;

            border-radius: 10px;

            background: #2563eb;

            color: white;

            text-decoration: none;

            font-weight: 700;

            transition: 0.2s;
        }

        .btn-back:hover {
            background: #1d4ed8;

            transform: translateY(-1px);
        }

        .btn-home {
            display: inline-block;

            padding: 13px 22px;

            border-radius: 10px;

            background: white;

            color: #334155;

            border: 2px solid #cbd5e1;

            text-decoration: none;

            font-weight: 700;
        }

        .btn-home:hover {
            background: #f1f5f9;
        }

        /* ==========================================
           RESPONSIVE
           ========================================== */

        @media (max-width: 700px) {

            .result-page {
                margin: 25px auto;
                padding: 0 15px 40px;
            }

            .result-header {
                padding: 30px 25px;
            }

            .result-header h1 {
                font-size: 28px;
            }

            .summary-card {
                padding: 25px 20px;
            }

            .price-row,
            .final-total {
                flex-direction: column;

                align-items: flex-start;

                gap: 7px;
            }

            .final-total .amount {
                font-size: 22px;
            }
        }

    </style>

</head>

<body>

<main class="container result-page">

    <!-- ==========================================
         HEADER
         ========================================== -->

    <section class="result-header">

        <h1>
            <span class="check-icon">✓</span>
            Pendaftaran Diterima
        </h1>

        <p>
            Terima kasih telah mendaftar di KursusKu.
            Silakan periksa kembali data pendaftaran Anda.
        </p>

    </section>


    <!-- ==========================================
         DATA PENDAFTAR
         ========================================== -->

    <section class="summary-card">

        <dl class="summary-list">

            <dt>Nama</dt>
            <dd><?= e($name) ?></dd>


            <dt>Email</dt>
            <dd><?= e($email) ?></dd>


            <dt>Nomor HP</dt>
            <dd><?= e($phone) ?></dd>


            <dt>Program Studi</dt>
            <dd><?= e($studyProgram) ?></dd>


            <dt>Kursus</dt>
            <dd><?= e($course['name']) ?></dd>


            <dt>Jenis Peserta</dt>
            <dd><?= e($participantType) ?></dd>


            <dt>Mode Belajar</dt>
            <dd><?= e($learningModeLabel) ?></dd>


            <dt>Jumlah Paket</dt>
            <dd><?= e((string) $packageCount) ?> Paket</dd>


            <dt>Minat</dt>
            <dd><?= e($interestText) ?></dd>


            <dt>Catatan</dt>
            <dd>
                <?= $note !== '' ? e($note) : 'Tidak ada catatan.' ?>
            </dd>


            <dt>Sumber</dt>
            <dd><?= e($source) ?></dd>

        </dl>


        <!-- ======================================
             PEMBAYARAN
             ====================================== -->

        <hr class="payment-divider">

        <div class="payment-title">
            💳 Rincian Pembayaran
        </div>


        <div class="price-box">

            <div class="price-row">

                <strong>Harga Kursus</strong>

                <span>
                    <?= formatRupiah($course['fee']) ?>
                </span>

            </div>


            <div class="price-row">

                <strong>Subtotal</strong>

                <span>
                    <?= formatRupiah($grossTotal) ?>
                </span>

            </div>


            <div class="price-row">

                <strong>Diskon <?= e((string) $discountPercent) ?>%</strong>

                <span>
                    - <?= formatRupiah($discountAmount) ?>
                </span>

            </div>

        </div>


        <!-- ======================================
             TOTAL AKHIR
             ====================================== -->

        <div class="final-total">

            <div class="label">
                Total Akhir
            </div>

            <div class="amount">
                <?= formatRupiah($finalTotal) ?>
            </div>

        </div>


        <!-- ======================================
             TOMBOL
             ====================================== -->

        <div class="result-actions">

            <a
                class="btn-back"
                href="registration.php"
            >
                ← Kembali ke Form
            </a>


            <a
                class="btn-home"
                href="index.php"
            >
                🏠 Beranda
            </a>

        </div>

    </section>

</main>

</body>
</html>
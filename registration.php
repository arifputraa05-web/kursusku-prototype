<?php
require_once __DIR__ . '/helpers.php';
require_once __DIR__ . '/data.php';
?>

<!doctype html>
<html lang="id">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Daftar Kursus - KursusKu</title>

  <link rel="stylesheet" href="assets/style.css">

  <style>
    /* ==============================
       TAMPILAN HALAMAN PENDAFTARAN
       ============================== */

    body {
      margin: 0;
      font-family: Arial, Helvetica, sans-serif;
      background: #f1f5ff;
      color: #172033;
    }

    /* Header */
    .site-header {
      background: linear-gradient(135deg, #2563eb, #4f46e5);
      padding: 18px 0;
      box-shadow: 0 4px 15px rgba(37, 99, 235, 0.25);
    }

    .container {
      width: min(1100px, 92%);
      margin: auto;
    }

    .nav-wrap {
      display: flex;
      justify-content: space-between;
      align-items: center;
      gap: 20px;
    }

    .brand {
      color: white;
      text-decoration: none;
      font-size: 24px;
      font-weight: bold;
    }

    nav {
      display: flex;
      gap: 22px;
    }

    nav a {
      color: white;
      text-decoration: none;
      font-weight: 600;
    }

    nav a:hover {
      text-decoration: underline;
    }

    /* Judul */
    .page-intro {
      margin: 45px 0 25px;
    }

    .eyebrow {
      color: #2563eb;
      font-weight: bold;
      text-transform: uppercase;
      letter-spacing: 1px;
    }

    .page-intro h1 {
      margin: 8px 0;
      font-size: 40px;
      color: #172033;
    }

    .page-intro p {
      font-size: 17px;
      color: #64748b;
    }

    /* Kartu Form */
    .form-card {
      background: white;
      border-radius: 20px;
      padding: 35px;
      margin-bottom: 50px;
      box-shadow: 0 15px 40px rgba(37, 99, 235, 0.12);
      border: 1px solid #dbe4ff;
    }

    /* Grid */
    .form-grid {
      display: grid;
      grid-template-columns: 1fr 1fr;
      gap: 22px;
    }

    .form-group {
      margin-bottom: 24px;
    }

    label,
    legend {
      font-weight: bold;
      color: #1e293b;
    }

    input[type="text"],
    input[type="email"],
    input[type="tel"],
    select,
    textarea {
      width: 100%;
      box-sizing: border-box;
      margin-top: 9px;
      padding: 14px 15px;
      border: 2px solid #cbd5e1;
      border-radius: 10px;
      background: #ffffff;
      font-size: 16px;
      color: #172033;
      transition: 0.2s;
    }

    input[type="text"]:focus,
    input[type="email"]:focus,
    input[type="tel"]:focus,
    select:focus,
    textarea:focus {
      outline: none;
      border-color: #2563eb;
      box-shadow: 0 0 0 4px rgba(37, 99, 235, 0.10);
    }

    /* Fieldset */
    fieldset.form-group {
      border: 2px solid #cbd5e1;
      border-radius: 12px;
      padding: 18px 20px;
    }

    fieldset.form-group legend {
      padding: 0 8px;
      color: #2563eb;
    }

    /* Radio dan Checkbox */
    .choice {
      display: flex;
      align-items: center;
      gap: 10px;
      margin: 12px 0;
      font-weight: normal;
      cursor: pointer;
    }

    .choice input[type="radio"],
    .choice input[type="checkbox"] {
      width: 18px;
      height: 18px;
      accent-color: #2563eb;
    }

    /* Tombol */
    .btn-primary {
      width: 100%;
      border: none;
      border-radius: 12px;
      padding: 15px 20px;
      background: linear-gradient(135deg, #2563eb, #4f46e5);
      color: white;
      font-size: 17px;
      font-weight: bold;
      cursor: pointer;
      box-shadow: 0 8px 20px rgba(37, 99, 235, 0.25);
      transition: 0.2s;
    }

    .btn-primary:hover {
      transform: translateY(-2px);
      box-shadow: 0 12px 25px rgba(37, 99, 235, 0.35);
    }

    .help {
      color: #64748b;
      display: block;
      margin-top: 6px;
    }

    /* Responsive */
    @media (max-width: 700px) {
      .nav-wrap {
        flex-direction: column;
        align-items: flex-start;
      }

      nav {
        flex-wrap: wrap;
        gap: 12px;
      }

      .form-grid {
        grid-template-columns: 1fr;
      }

      .page-intro h1 {
        font-size: 30px;
      }

      .form-card {
        padding: 22px;
      }
    }
  </style>
</head>

<body>

  <!-- ==============================
       HEADER
       ============================== -->

  <header class="site-header">

    <div class="container nav-wrap">

      <a class="brand" href="index.php">
        KursusKu
      </a>

      <nav aria-label="Navigasi utama">
        <a href="index.php">Beranda</a>
        <a href="index.php#katalog">Katalog</a>
        <a href="registration.php">Daftar</a>
      </nav>

    </div>

  </header>


  <main class="container">

    <!-- ==============================
         JUDUL HALAMAN
         ============================== -->

    <section class="page-intro">

      <p class="eyebrow">
        Pendaftaran Kursus
      </p>

      <h1>
        Mulai belajar bersama KursusKu
      </h1>

      <p>
        Gunakan data latihan. Field bertanda wajib diisi.
      </p>

    </section>


    <!-- ==============================
         FORM PENDAFTARAN
         ============================== -->

    <section class="form-card">

      <form
        action="process-registration.php"
        method="POST"
        class="registration-form"
      >

        <!-- Hidden Field -->
        <input
          type="hidden"
          name="source"
          value="week-06"
        >


        <!-- ==============================
             DATA PESERTA
             ============================== -->

        <div class="form-grid">

          <!-- Nama -->
          <div class="form-group">

            <label for="name">
              Nama Lengkap
            </label>

            <input
              id="name"
              name="name"
              type="text"
              minlength="3"
              maxlength="100"
              autocomplete="name"
              required
            >

          </div>


          <!-- Email -->
          <div class="form-group">

            <label for="email">
              Email
            </label>

            <input
              id="email"
              name="email"
              type="email"
              maxlength="120"
              autocomplete="email"
              required
            >

          </div>


          <!-- Nomor HP -->
          <div class="form-group">

            <label for="phone">
              Nomor HP
            </label>

            <input
              id="phone"
              name="phone"
              type="tel"
              maxlength="15"
              autocomplete="tel"
              placeholder="Contoh: 081234567890"
              required
            >

          </div>


          <!-- Program Studi -->
          <div class="form-group">

            <label for="study_program">
              Program Studi
            </label>

            <input
              id="study_program"
              name="study_program"
              type="text"
              maxlength="100"
              required
            >

          </div>

        </div>


        <!-- ==============================
             PILIHAN KURSUS
             ============================== -->

        <div class="form-group">

          <label for="course">
            Kursus yang Dipilih
          </label>

          <select
            id="course"
            name="course"
            required
          >

            <option value="">
              -- Pilih kursus --
            </option>

            <option value="web-dasar">
              Web Dasar - Rp200.000
            </option>

            <option value="php-dasar">
              PHP Dasar - Rp250.000
            </option>

            <option value="laravel-fundamental">
              Laravel Fundamental - Rp350.000
            </option>

          </select>

        </div>


        <!-- ==============================
             JENIS PESERTA
             ============================== -->

        <fieldset class="form-group">

          <legend>
            Jenis Peserta
          </legend>

          <label class="choice">

            <input
              type="radio"
              name="participant_type"
              value="mahasiswa"
              required
            >

            Mahasiswa

          </label>


          <label class="choice">

            <input
              type="radio"
              name="participant_type"
              value="guru"
            >

            Guru

          </label>


          <label class="choice">

            <input
              type="radio"
              name="participant_type"
              value="umum"
            >

            Umum

          </label>

        </fieldset>


        <!-- ==============================
             MODE BELAJAR
             ============================== -->

        <div class="form-group">

          <label for="learning_mode">
            Mode Belajar
          </label>

          <select
            id="learning_mode"
            name="learning_mode"
            required
          >

            <option value="">
              -- Pilih mode belajar --
            </option>

            <option value="offline">
              Tatap Muka
            </option>

            <option value="online">
              Online
            </option>

            <option value="hybrid">
              Hybrid
            </option>

          </select>

        </div>


        <!-- ==============================
             JUMLAH PAKET
             ============================== -->

        <div class="form-group">

          <label for="package_count">
            Jumlah Paket
          </label>

          <select
            id="package_count"
            name="package_count"
            required
          >

            <option value="">
              -- Pilih jumlah paket --
            </option>

            <?php for ($i = 1; $i <= 3; $i++): ?>

              <option value="<?= $i ?>">
                <?= $i ?> Paket
              </option>

            <?php endfor; ?>

          </select>

        </div>


        <!-- ==============================
             MINAT TAMBAHAN
             ============================== -->

        <fieldset class="form-group">

          <legend>
            Minat Tambahan
          </legend>


          <!-- FRONTEND -->
          <label class="choice">

            <input
              type="checkbox"
              name="interests[]"
              value="frontend"
            >

            Frontend

          </label>


          <!-- BACKEND -->
          <label class="choice">

            <input
              type="checkbox"
              name="interests[]"
              value="backend"
            >

            Backend

          </label>


          <!-- DATABASE -->
          <label class="choice">

            <input
              type="checkbox"
              name="interests[]"
              value="database"
            >

            Database

          </label>


          <!-- UI/UX -->
          <label class="choice">

            <input
              type="checkbox"
              name="interests[]"
              value="uiux"
            >

            UI/UX

          </label>

        </fieldset>


        <!-- ==============================
             CATATAN
             ============================== -->

        <div class="form-group">

          <label for="note">
            Catatan
          </label>

          <textarea
            id="note"
            name="note"
            rows="5"
            maxlength="300"
            placeholder="Tuliskan kebutuhan belajar Anda (opsional)"
          ></textarea>

          <small class="help">
            Maksimal 300 karakter.
          </small>

        </div>


        <!-- ==============================
             TOMBOL
             ============================== -->

        <button
          class="btn-primary"
          type="submit"
        >
          Kirim Pendaftaran
        </button>

      </form>

    </section>

  </main>

</body>

</html>
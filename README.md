# KursusKu Prototype

Proyek praktikum mata kuliah Bahasa Pemrograman III (PHP & MySQL) / Pemrograman Web III.
Dikerjakan bertahap dari Pertemuan 2 sampai Pertemuan 4.

## Rumus Biaya (Pertemuan 3)

```
subtotal = fee x participantCount
discount = subtotal x discountPercent / 100
total    = subtotal - discount + adminFee
```

Catatan:
- Semua nilai uang disimpan sebagai integer rupiah.
- Nilai pada `fee-calculator.php` masih hard-code (belum ada form input).
- Format rupiah hanya diterapkan saat output, bukan saat proses hitung.

Contoh perhitungan (Laravel Fundamental, 2 peserta, diskon 10%, admin 25.000):

| Komponen       | Nilai      |
|-----------------|-----------|
| Subtotal        | Rp 700.000 |
| Diskon 10%      | Rp 70.000  |
| Biaya admin     | Rp 25.000  |
| **Total akhir** | **Rp 655.000** |

## Function Reusable (Pertemuan 4)

Disimpan di `helpers.php`:

| Function | Input | Output | Tujuan |
|---|---|---|---|
| `rupiah()` | 250000 | Rp 250.000 | Menghindari format uang berulang |
| `statusKursus()` | quota, registered | Tersedia / Penuh | Memusatkan aturan status |
| `sisaKursi()` | quota, registered | angka >= 0 | Menghitung kapasitas tersisa |
| `formatTanggal()` | 2026-09-15 | 15-09-2026 | Memisahkan format simpan dan format tampil |

## Struktur Folder

```
kursusku-prototype/
|-- index.php
|-- server-time.php
|-- fee-calculator.php
|-- helpers.php
|-- test-functions.php
|-- README.md
|-- assets/
|   |-- images/
|   `-- video/
`-- evidence/
    |-- week-02/
    |-- week-03/
    `-- week-04/
```

## Cara Menjalankan

1. Salin folder `kursusku-prototype` ke `C:\laragon\www\`.
2. Aktifkan Laragon (Start All).
3. Buka `http://kursusku-prototype.test` atau `http://localhost/kursusku-prototype/`.
4. Halaman lain dapat diakses melalui:
   - `server-time.php`
   - `fee-calculator.php`
   - `test-functions.php`

## Status Pengerjaan

- [x] Milestone 2 - Landing Page KursusKu Versi 1
- [x] Milestone 3 - Kalkulator Estimasi Biaya + 5 test case manual
- [x] Milestone 4 - Katalog data-driven (array + foreach + 4 function reusable) + 6 test PASS

## AI Usage Log

| Prompt/masalah | Saran AI | Diterima/ditolak | Alasan |
|---|---|---|---|
| | | | |

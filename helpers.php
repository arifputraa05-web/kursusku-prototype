<?php
/**
 * helpers.php
 * Kumpulan function reusable untuk proyek KursusKu.
 * File ini TIDAK menghasilkan output sendiri ketika hanya di-include.
 */

/**
 * Format angka menjadi rupiah, contoh: 250000 -> "Rp 250.000"
 */
function rupiah(int $amount): string
{
    return 'Rp ' . number_format($amount, 0, ',', '.');
}

/**
 * Menentukan status kursus berdasarkan quota dan jumlah terdaftar.
 * Kursus dianggap "Penuh" jika registered >= quota.
 */
function statusKursus(int $quota, int $registered): string
{
    return $registered >= $quota ? 'Penuh' : 'Tersedia';
}

/**
 * Menghitung sisa kursi. Tidak pernah menghasilkan angka negatif.
 */
function sisaKursi(int $quota, int $registered): int
{
    return max(0, $quota - $registered);
}

/**
 * Mengubah format tanggal sumber (YYYY-MM-DD) menjadi format tampilan (DD-MM-YYYY).
 */
function formatTanggal(string $date): string
{
    $value = new DateTimeImmutable($date);
    return $value->format('d-m-Y');
}

/**
 * Mengamankan output teks dari input pengguna.
 */
function e(string $value): string
{
    return htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
}

/**
 * Format angka menjadi rupiah tanpa spasi.
 * Contoh: 250000 -> "Rp250.000"
 */
function formatRupiah(int $amount): string
{
    return 'Rp' . number_format($amount, 0, ',', '.');
}

/**
 * Mencari data kursus berdasarkan kode kursus.
 */
function findCourse(array $courses, string $code): ?array
{
    foreach ($courses as $course) {
        if ($course['code'] === $code) {
            return $course;
        }
    }

    return null;
}

/**
 * Menentukan persentase diskon berdasarkan tipe peserta.
 */
function getDiscountPercent(string $participantType): int
{
    if ($participantType === 'mahasiswa') {
        return 20;
    } elseif ($participantType === 'guru') {
        return 15;
    }

    return 0;
}

/**
 * Mengubah kode metode belajar menjadi label yang ditampilkan.
 */
function getLearningModeLabel(string $mode): string
{
    switch ($mode) {
        case 'offline':
            return 'Tatap Muka';

        case 'online':
            return 'Online';

        case 'hybrid':
            return 'Hybrid';

        default:
            return 'Tidak diketahui';
    }
}
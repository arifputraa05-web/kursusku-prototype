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

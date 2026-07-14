<?php
/**
 * Konfigurasi koneksi database.
 *
 * PENTING: kredensial asli TIDAK boleh ada di file ini / di repo GitHub.
 *
 * Urutan pengambilan kredensial:
 * 1. File config.local.php (jika ada) — file ini di-gitignore, dibuat manual
 *    langsung di server hosting (lihat README.md bagian "Deploy").
 * 2. Environment variable (DB_HOST, DB_USER, DB_PASS, DB_NAME) — jika hosting
 *    kamu mendukungnya (VPS, Railway, Render, dll).
 * 3. Default untuk development lokal (XAMPP/Laragon).
 */

if (file_exists(__DIR__ . '/config.local.php')) {
    require __DIR__ . '/config.local.php';
} else {
    $db_host = getenv('DB_HOST') ?: 'localhost';
    $db_user = getenv('DB_USER') ?: 'root';
    $db_pass = getenv('DB_PASS') ?: '';
    $db_name = getenv('DB_NAME') ?: 'perca_db';
}

$conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);

if (!$conn) {
    die("Koneksi database gagal: " . mysqli_connect_error());
}

mysqli_set_charset($conn, 'utf8mb4');

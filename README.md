# Nauli Wear — Website Pemesanan Batik Fashion

Website katalog & form pemesanan produk fashion batik, dengan dashboard admin
untuk melihat data pesanan.

## ⚠️ Catatan Keamanan Penting

Kode asli project ini punya kredensial database (host, username, password)
tertulis langsung di dalam file PHP. Itu sudah diperbaiki di struktur ini —
tapi karena kredensial itu sempat ada di file yang kamu upload, **sangat
disarankan untuk mengganti password database kamu** di panel hosting
(InfinityFree/cPanel), supaya password lama yang sudah "bocor" tidak bisa
dipakai orang lain.

## Struktur Folder

```
nauli-wear/
├── index.php              # Landing page + katalog produk
├── form.php                # Form pemesanan
├── simpan.php               # Proses simpan pesanan ke database
├── simpan_rating.php         # Proses simpan rating/ulasan (sebelumnya salah nama file, sudah diperbaiki)
├── dashboard.php             # Dashboard admin (lihat semua pesanan)
├── config.php                # Loader koneksi database (AMAN, tidak berisi kredensial asli)
├── config.local.php.example  # Contoh file kredensial — salin & isi di server
├── img/                       # Gambar produk & QRIS
├── database/
│   └── schema.sql             # Struktur tabel database
├── .github/workflows/deploy.yml  # (Opsional) auto-deploy via FTP
└── .gitignore
```

## Kenapa Tidak Bisa Pakai GitHub Pages?

GitHub Pages hanya bisa menghosting file statis (HTML/CSS/JS) dan **tidak
bisa menjalankan PHP atau MySQL**. Jadi GitHub di sini berfungsi sebagai
tempat menyimpan source code (version control), sedangkan hosting aktual
tetap harus di layanan yang mendukung PHP + MySQL, misalnya:

- InfinityFree (yang sepertinya sudah kamu pakai)
- Hostinger, Niagahoster, atau shared hosting lain
- Railway / Render (dengan Docker PHP)

## Cara Deploy

### 1. Siapkan database
1. Buat database MySQL di hosting kamu.
2. Import `database/schema.sql` lewat phpMyAdmin untuk membuat tabel `orders`.

### 2. Buat file kredensial di server (BUKAN di GitHub)
1. Salin `config.local.php.example` menjadi `config.local.php`.
2. Isi 4 variabel (`$db_host`, `$db_user`, `$db_pass`, `$db_name`) dengan
   kredensial database asli dari hosting kamu.
3. Upload `config.local.php` **langsung ke server** lewat File Manager atau
   FTP — file ini sudah ada di `.gitignore` sehingga tidak akan pernah ikut
   ter-commit ke GitHub.

### 3. Push ke GitHub
```bash
git init
git add .
git commit -m "Initial commit - Nauli Wear"
git branch -M main
git remote add origin https://github.com/USERNAME/NAMA-REPO.git
git push -u origin main
```

### 4. Upload ke hosting
Dua opsi:
- **Manual**: upload semua file (kecuali `config.local.php.example`,
  `database/`, `.github/`, `README.md`) via File Manager/FTP hosting kamu.
- **Otomatis**: gunakan workflow `.github/workflows/deploy.yml` yang sudah
  disediakan. Tambahkan 3 secrets di repo GitHub kamu
  (Settings → Secrets and variables → Actions):
  - `FTP_SERVER`
  - `FTP_USERNAME`
  - `FTP_PASSWORD`

  Setelah itu, setiap `git push` ke branch `main` akan otomatis
  mengupload file ke hosting.

## Menjalankan di Lokal (opsional, untuk testing)

Butuh XAMPP/Laragon dengan PHP + MySQL aktif:
1. Copy folder project ke `htdocs/` (XAMPP) atau `www/` (Laragon).
2. Buat database lokal, import `database/schema.sql`.
3. Buat `config.local.php` dengan kredensial lokal (biasanya
   `host: localhost`, `user: root`, `password: ""`).
4. Buka `http://localhost/nauli-wear/index.php`.

## Bug yang Sudah Diperbaiki

- Form rating di `index.php` mengarah ke `simpan_rating.php`, tapi file
  aslinya bernama `simpan.rating.php` — sehingga fitur kirim rating tidak
  pernah berfungsi. Sudah diperbaiki dengan menyesuaikan nama file.

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Pemesanan - Nauli Wear</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', Arial, sans-serif;
        }
        body {
            background: linear-gradient(135deg, #f5f7fa, #c3cfe2);
            min-height: 100vh;
            padding: 40px 20px;
        }
        .container {
            max-width: 900px;
            margin: 0 auto;
            background: white;
            padding: 30px;
            border-radius: 20px;
            box-shadow: 0 10px 25px rgba(0,0,0,0.1);
            display: flex;
            gap: 30px;
            flex-wrap: wrap;
        }
        .form-section {
            flex: 1;
            min-width: 300px;
        }
        .guide-section {
            flex: 1;
            min-width: 300px;
            background: #f9f9f9;
            padding: 20px;
            border-radius: 15px;
            border: 1px solid #e0e0e0;
        }
        h2 {
            font-size: 22px;
            margin-bottom: 20px;
            color: #222;
            border-bottom: 2px solid #ff8a00;
            padding-bottom: 8px;
            display: inline-block;
        }
        .form-group {
            margin-bottom: 15px;
        }
        label {
            display: block;
            font-size: 14px;
            font-weight: 600;
            margin-bottom: 6px;
            color: #333;
        }
        input, select, textarea {
            width: 100%;
            padding: 12px;
            border: 1px solid #ccc;
            border-radius: 8px;
            font-size: 14px;
            background: #fff;
        }
        input:focus, select:focus, textarea:focus {
            border-color: #da1b60;
            outline: none;
        }
        .btn-submit {
            width: 100%;
            padding: 14px;
            background: linear-gradient(45deg, #ff8a00, #da1b60);
            color: white;
            border: none;
            border-radius: 8px;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
            transition: 0.3s;
            margin-top: 10px;
        }
        .btn-submit:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(218, 27, 96, 0.3);
        }
        
        /* Style Tabel Panduan Ukuran Sesuai Gambar */
        .size-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
            font-size: 13px;
            background: white;
        }
        .size-table th, .size-table td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: center;
        }
        .size-table th {
            background-color: #e2e2e2;
            color: #333;
            font-weight: bold;
        }
        .size-table tr:nth-child(even) {
            background-color: #fcfcfc;
        }
        .note-text {
            font-size: 12px;
            color: #666;
            margin-top: 10px;
            line-height: 1.4;
        }
    </style>
</head>
<body>

    <div class="container">
        <!-- SEKSI KIRI: FORM DATA PEMBELIAN -->
        <div class="form-section">
            <h2>Form Pemesanan</h2>
            <form action="simpan.php" method="POST">
                <div class="form-group">
                    <label>Nama Lengkap</label>
                    <input type="text" name="nama" placeholder="Masukkan nama Anda" required>
                </div>

                <div class="form-group">
                    <label>Pilih Produk</label>
                    <select name="produk" id="produk" required onchange="cekProduk()">
                        <option value="Baju Fashion">Baju Fashion (Rp27.000 - Rp38.000)</option>
                        <option value="Gaun Modern">Gaun Modern (Rp350.000)</option>
                        <option value="Kerah Style">Kerah Style (Rp75.000)</option>
                        <option value="Bando Cantik">Bando Cantik (Rp15.000)</option>
                    </select>
                </div>

                <!-- Pilihan Ukuran Baju -->
                <div class="form-group" id="box-ukuran">
                    <label>Pilih Ukuran (Khusus Baju Fashion)</label>
                    <select name="ukuran">
                        <option value="K">Ukuran K (Maks 1 th) - Rp27.000</option>
                        <option value="O">Ukuran O (2 th) - Rp28.100</option>
                        <option value="S">Ukuran S (3 th) - Rp29.200</option>
                        <option value="M">Ukuran M (4-5 th) - Rp33.600</option>
                        <option value="L">Ukuran L (6-7 th) - Rp35.800</option>
                        <option value="RMJ">Ukuran RMJ (9-11 th) - Rp38.000</option>
                    </select>
                </div>

                <div class="form-group">
                    <label>Nomor WhatsApp</label>
                    <input type="tel" name="hp" placeholder="Contoh: 0821xxxxxxxx" required>
                </div>

                <div class="form-group">
                    <label>Metode Pembayaran</label>
                    <select name="pembayaran" required>
                        <option value="QRIS">QRIS</option>
                        <option value="Transfer Bank">Transfer Bank (SeaBank)</option>
                        <option value="COD">Bayar di Tempat (COD)</option>
                    </select>
                </div>

                <div class="form-group">
                    <label>Alamat Lengkap Pengiriman</label>
                    <textarea name="alamat" rows="3" placeholder="Nama Jalan, No. Rumah, RT/RW, Kecamatan, Kota" required></textarea>
                </div>

                <button type="submit" class="btn-submit">Konfirmasi & Bayar Sekarang</button>
            </form>
        </div>

        <!-- SEKSI KANAN: PANDUAN UKURAN BERDASARKAN GAMBAR KAMU -->
        <div class="guide-section" id="panduan-ukuran-box">
            <h2>📐 Panduan Ukuran</h2>
            <p class="note-text" style="margin-bottom: 10px; font-weight: 500;">Sesuaikan ukuran anak berdasarkan detail tabel di bawah ini:</p>
            
            <table class="size-table">
                <thead>
                    <tr>
                        <th>Ukuran</th>
                        <th>Perkiraan Usia</th>
                        <th>Lebar Dada (LD) cm</th>
                        <th>Panjang (PJ) cm</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><strong>K</strong></td>
                        <td>Maks 1 th</td>
                        <td>55</td>
                        <td>45</td>
                    </tr>
                    <tr>
                        <td><strong>O</strong></td>
                        <td>2 th</td>
                        <td>60</td>
                        <td>55</td>
                    </tr>
                    <tr>
                        <td><strong>S</strong></td>
                        <td>3 th</td>
                        <td>65</td>
                        <td>60</td>
                    </tr>
                    <tr>
                        <td><strong>M</strong></td>
                        <td>4-5 th</td>
                        <td>70</td>
                        <td>70</td>
                    </tr>
                    <tr>
                        <td><strong>L</strong></td>
                        <td>6-7 th</td>
                        <td>80</td>
                        <td>75</td>
                    </tr>
                    <tr>
                        <td><strong>RMJ</strong></td>
                        <td>9-11 th</td>
                        <td>95</td>
                        <td>85</td>
                    </tr>
                </tbody>
            </table>
            
            <p class="note-text">💡 <em>Tips: Disarankan untuk mengukur lebar dada baju yang biasa dipakai anak di rumah terlebih dahulu agar mendapatkan ukuran yang paling pas.</em></p>
        </div>
    </div>

    <script>
        // Fungsi pintar agar panduan ukuran otomatis bersembunyi jika pembeli memilih selain produk Baju
        function cekProduk() {
            var produk = document.getElementById("produk").value;
            var boxUkuran = document.getElementById("box-ukuran");
            var panduanBox = document.getElementById("panduan-ukuran-box");
            
            if(produk === "Baju Fashion") {
                boxUkuran.style.display = "block";
                panduanBox.style.display = "block";
            } else {
                boxUkuran.style.display = "none";
                panduanBox.style.display = "none";
            }
        }
        // Jalankan fungsi saat halaman pertama kali dimuat
        window.onload = cekProduk;
    </script>

</body>
</html>
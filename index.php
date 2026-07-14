<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Batik Fashion - Nauli Wear</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', Arial, sans-serif;
        }

        html {
            scroll-behavior: smooth;
        }

        body {
            background: #f5f5f5;
        }

        /* ==========================================
           STYLE 1: HALAMAN PEMBUKA (WELCOME PAGE) 
           ========================================== */
        .welcome-section {
            background: linear-gradient(135deg, #0f0c20, #24243e);
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px;
            color: #fff;
            position: relative;
            overflow: hidden;
        }

        .circle1 {
            position: absolute;
            width: 300px;
            height: 300px;
            background: radial-gradient(#ff8a00, transparent 70%);
            top: -10%;
            left: -10%;
            opacity: 0.3;
        }

        .circle2 {
            position: absolute;
            width: 400px;
            height: 400px;
            background: radial-gradient(#da1b60, transparent 70%);
            bottom: -10%;
            right: -10%;
            opacity: 0.3;
        }

        .welcome-container {
            background: rgba(255, 255, 255, 0.05);
            backdrop-filter: blur(15px);
            padding: 50px 30px;
            border-radius: 30px;
            text-align: center;
            width: 100%;
            max-width: 500px;
            box-shadow: 0 20px 50px rgba(0, 0, 0, 0.6);
            border: 1px solid rgba(255, 255, 255, 0.1);
            position: relative;
            z-index: 10;
        }

        .logo-placeholder {
            font-size: 50px;
            margin-bottom: 15px;
            animation: float 3s ease-in-out infinite;
        }

        @keyframes float {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-10px); }
        }

        .welcome-container h1 {
            font-size: 32px;
            font-weight: 700;
            margin-bottom: 10px;
            background: linear-gradient(45deg, #ff8a00, #da1b60);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .tagline {
            color: #ddd;
            font-size: 15px;
            line-height: 1.6;
            margin-bottom: 35px;
            font-weight: 300;
        }

        .features {
            display: flex;
            justify-content: space-around;
            margin-bottom: 35px;
            background: rgba(255, 255, 255, 0.03);
            padding: 15px;
            border-radius: 15px;
            border: 1px solid rgba(255, 255, 255, 0.05);
        }

        .feat-item {
            font-size: 12px;
            color: #bbb;
        }

        .feat-item div {
            font-size: 18px;
            margin-bottom: 5px;
        }

        .btn-start {
            display: block;
            width: 100%;
            padding: 16px;
            background: linear-gradient(45deg, #ff8a00, #da1b60);
            color: #fff;
            text-decoration: none;
            border-radius: 50px;
            font-size: 16px;
            font-weight: 600;
            box-shadow: 0 10px 25px rgba(218, 27, 96, 0.4);
            transition: all 0.3s ease;
        }

        .btn-start:hover {
            transform: translateY(-3px);
            box-shadow: 0 15px 30px rgba(218, 27, 96, 0.6);
            letter-spacing: 1px;
        }

        .footer-text-welcome {
            margin-top: 20px;
            font-size: 11px;
            color: #666;
        }


        /* ==========================================
           STYLE 2: KATALOG PRODUK ASLI KAMU 
           ========================================== */
        nav {
            background: black;
            color: white;
            padding: 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        nav h1 {
            font-size: 28px;
            font-weight: bold;
        }

        nav ul {
            display: flex;
            list-style: none;
            gap: 20px;
        }

        nav a {
            color: white;
            text-decoration: none;
        }

        .hero {
            height: 300px;
            background: url('https://images.unsplash.com/photo-1441986300917-64674bd600d8?q=80&w=1200');
            background-size: cover;
            background-position: center;
            display: flex;
            justify-content: center;
            align-items: center;
            color: white;
            font-size: 40px;
            font-weight: bold;
        }

        .products {
            padding: 50px 50px 20px 50px;
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 30px;
        }

        .card {
            background: white;
            width: 260px;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
            transition: 0.3s;
        }

        .card:hover {
            transform: translateY(-10px);
        }

        .card img {
            width: 100%;
            height: 280px;
            object-fit: cover;
        }

        .card-body {
            padding: 20px;
        }

        .card h2 {
            font-size: 20px;
            color: #222;
            margin-bottom: 10px;
        }

        .price {
            color: green;
            font-size: 22px;
            font-weight: bold;
            margin-bottom: 10px;
        }

        .rating {
            margin-bottom: 15px;
        }

        .card button {
            width: 100%;
            padding: 12px;
            border: none;
            background: black;
            color: white;
            border-radius: 10px;
            cursor: pointer;
            font-size: 16px;
            font-weight: bold;
            transition: 0.3s;
        }

        .card button:hover {
            background: #333;
        }

        /* ==========================================
           STYLE 3: AREA SEJAJAR (RATING & KONTAK)
           ========================================== */
        .bottom-section {
            max-width: 1100px;
            margin: 40px auto;
            padding: 0 20px;
            display: flex;
            gap: 30px;
            flex-wrap: wrap; /* Supaya otomatis turun ke bawah saat di layar HP */
        }

        .box-bottom {
            flex: 1;
            min-width: 300px; /* Batas minimal lebar box sebelum dia responsif pecah baris */
            background: white;
            padding: 30px;
            border-radius: 20px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.08);
            border: 1px solid #e0e0e0;
        }

        .box-bottom h3 {
            margin-bottom: 10px;
            color: #222;
            font-size: 20px;
        }

        .box-bottom p {
            font-size: 13px;
            color: #666;
            margin-bottom: 20px;
            line-height: 1.5;
        }

        /* Form Rating */
        .rating-box-new label {
            display: block;
            font-weight: bold;
            font-size: 14px;
            margin-bottom: 8px;
            color: #333;
        }

        .rating-box-new select {
            width: 100%;
            padding: 12px;
            border-radius: 8px;
            border: 1px solid #ccc;
            font-size: 14px;
            margin-bottom: 15px;
            background: #f9f9f9;
        }

        .btn-rating-submit {
            width: 100%;
            padding: 12px;
            border: none;
            background: #28a745;
            color: white;
            font-size: 15px;
            border-radius: 8px;
            cursor: pointer;
            font-weight: bold;
            transition: 0.3s;
        }

        .btn-rating-submit:hover {
            background: #218838;
        }

        /* Tampilan Gaya List Kontak */
        .contact-list {
            list-style: none;
            margin-top: 10px;
        }

        .contact-item {
            display: flex;
            align-items: center;
            background: #f9f9f9;
            padding: 15px;
            border-radius: 12px;
            margin-bottom: 12px;
            border: 1px solid #eee;
            transition: 0.3s;
        }

        .contact-item:hover {
            background: #f1f1f1;
            transform: translateX(5px);
        }

        .contact-icon {
            font-size: 24px;
            margin-right: 15px;
        }

        .contact-details h4 {
            font-size: 14px;
            color: #333;
            font-weight: 600;
        }

        .contact-details a {
            font-size: 15px;
            color: #0056b3;
            text-decoration: none;
            font-weight: bold;
        }

        .contact-details a:hover {
            text-decoration: underline;
        }

        footer {
            background: black;
            color: white;
            text-align: center;
            padding: 20px;
            margin-top: 40px;
            font-size: 14px;
        }
    </style>
</head>

<body>

    <!-- BAGIAN 1: HALAMAN PEMBUKA (WELCOME PAGE) -->
    <div class="welcome-section">
        <div class="circle1"></div>
        <div class="circle2"></div>

        <div class="welcome-container">
            <div class="logo-placeholder">✨👗✨</div>
            <h1>Nauli Wear</h1>
            <p class="tagline">Temukan kombinasi fashion Batik modern dan gaya kekinian pilihan terbaik Anda di sini.</p>

            <div class="features">
                <div class="feat-item"><div>🛍️</div>Kualitas Premium</div>
                <div class="feat-item"><div>⚡</div>Proses Cepat</div>
                <div class="feat-item"><div>💳</div>Bayar Aman</div>
            </div>

            <a href="#katalog-produk" class="btn-start">Mulai Belanja Now ➔</a>

            <div class="footer-text-welcome">© 2026 Nauli Wear Official Store. All Rights Reserved.</div>
        </div>
    </div>


    <!-- BAGIAN 2: HALAMAN KATALOG PRODUK TOKO -->
    <div id="katalog-produk">
        <!-- NAVBAR -->
        <nav>
            <h1>Nauli Wear</h1>
            <ul>
                <li><a href="#">Home</a></li>
                <li><a href="#katalog-produk">Produk</a></li>
                <li><a href="#kontak-kami">Kontak</a></li>
            </ul>
        </nav>

        <!-- HERO -->
        <div class="hero">
            TREND FASHION 2026
        </div>

        <!-- PRODUK -->
        <div class="products">

            <!-- BAJU -->
            <div class="card">
                <img src="img/baju.jpeg">
                <div class="card-body">
                    <h2>Baju Fashion</h2>
                    <p class="price">Rp27.000-Rp38.000</p>
                    <p class="rating">⭐⭐⭐⭐⭐</p>
                    <a href="form.php">
                        <button>Beli Sekarang</button>
                    </a>
                </div>
            </div>

            <!-- GAUN -->
            <div class="card">
                <img src="img/gaun.jpeg">
                <div class="card-body">
                    <h2>Gaun Modern</h2>
                    <p class="price">Rp350.000</p>
                    <p class="rating">⭐⭐⭐⭐⭐</p>
                    <a href="form.php">
                        <button>Beli Sekarang</button>
                    </a>
                </div>
            </div>

            <!-- KERAH -->
            <div class="card">
                <img src="img/kerah.jpeg">
                <div class="card-body">
                    <h2>Kerah Style</h2>
                    <p class="price">Rp75.000</p>
                    <p class="rating">⭐⭐⭐⭐☆</p>
                    <a href="form.php">
                        <button>Beli Sekarang</button>
                    </a>
                </div>
            </div>

            <!-- BANDO -->
            <div class="card">
                <img src="img/bando.jpeg">
                <div class="card-body">
                    <h2>Bando Cantik</h2>
                    <p class="price">Rp15.000</p>
                    <p class="rating">⭐⭐⭐⭐⭐</p>
                    <a href="form.php">
                        <button>Beli Sekarang</button>
                    </a>
                </div>
            </div>

        </div>

        <!-- ==========================================
             BARU: CONTAINER SEJAJAR (RATING & KONTAK)
             ========================================== -->
        <div class="bottom-section" id="kontak-kami">
            
            <!-- KOLOM KIRI: FORM RATING -->
            <div class="box-bottom">
                <h3>Berikan Ulasan Anda</h3>
                <p>Bagikan pengalaman berbelanja Anda di Nauli Wear untuk membantu kami terus berkembang.</p>
                
                <div class="rating-box-new">
                    <form action="simpan_rating.php" method="POST">
                        <input type="hidden" name="id_pesanan" value="0">
                        
                        <label>Bagaimana kualitas produk & layanan kami?</label>
                        <select name="rating" required>
                            <option value="5">⭐⭐⭐⭐⭐ (5 - Sangat Puas)</option>
                            <option value="4">⭐⭐⭐⭐☆ (4 - Puas)</option>
                            <option value="3">⭐⭐⭐☆☆ (3 - Cukup)</option>
                            <option value="2">⭐⭐☆☆☆ (2 - Buruk)</option>
                            <option value="1">⭐☆☆☆☆ (1 - Sangat Buruk)</option>
                        </select>
                        <button type="submit" class="btn-rating-submit">Kirim Ulasan Sekarang</button>
                    </form>
                </div>
            </div>

            <!-- KOLOM KANAN: KONTAK KAMI (LENGKAP DENGAN LINK AKTIF) -->
            <div class="box-bottom">
                <h3>Hubungi Kontak Kami</h3>
                <p>Punya pertanyaan atau ingin custom order? Silakan hubungi layanan pelanggan resmi kami di bawah ini:</p>
                
                <ul class="contact-list">
                    <!-- Item Instagram -->
                    <li class="contact-item">
                        <div class="contact-icon">📸</div>
                        <div class="contact-details">
                            <h4>Instagram Official</h4>
                            <a href="https://instagram.com/Nauli.waer" target="_blank">@Nauli.waer</a>
                        </div>
                    </li>
                    
                    <!-- Item WhatsApp -->
                    <li class="contact-item">
                        <div class="contact-icon">💬</div>
                        <div class="contact-details">
                            <h4>WhatsApp CS</h4>
                            <a href="https://wa.me/6282168859908" target="_blank">0821-6885-9908</a>
                        </div>
                    </li>
                </ul>
            </div>

        </div>

        <!-- FOOTER -->
        <footer>
            © 2026 Batik Fashion
        </footer>
    </div>

</body>

</html>
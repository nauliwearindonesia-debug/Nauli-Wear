<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once __DIR__ . '/config.php';

$nama = isset($_POST['nama']) ? trim($_POST['nama']) : '';
$produk = isset($_POST['produk']) ? trim($_POST['produk']) : '';
$hp = isset($_POST['hp']) ? trim($_POST['hp']) : '';
$alamat = isset($_POST['alamat']) ? trim($_POST['alamat']) : '';
$ukuran = (isset($_POST['ukuran']) && $_POST['ukuran'] != '') ? trim($_POST['ukuran']) : '-';
$pembayaran = isset($_POST['pembayaran']) ? trim($_POST['pembayaran']) : '';
$rating = 0;
$harga = "Rp0";

if($produk == "Baju Fashion"){
    if($ukuran == "K") { $harga = "Rp27.000"; }
    elseif($ukuran == "O") { $harga = "Rp28.100"; }
    elseif($ukuran == "S") { $harga = "Rp29.200"; }
    elseif($ukuran == "M") { $harga = "Rp33.600"; }
    elseif($ukuran == "L") { $harga = "Rp35.800"; }
    elseif($ukuran == "RMJ") { $harga = "Rp38.000"; }
}
elseif($produk == "Gaun Modern"){ $harga = "Rp350.000"; }
elseif($produk == "Kerah Style"){ $harga = "Rp75.000"; }
elseif($produk == "Bando Cantik"){ $harga = "Rp15.000"; }

$nama = mysqli_real_escape_string($conn, $nama);
$produk = mysqli_real_escape_string($conn, $produk);
$hp = mysqli_real_escape_string($conn, $hp);
$alamat = mysqli_real_escape_string($conn, $alamat);
$ukuran = mysqli_real_escape_string($conn, $ukuran);
$pembayaran = mysqli_real_escape_string($conn, $pembayaran);

$sql = "INSERT INTO orders (nama, produk, ukuran, hp, pembayaran, alamat, rating) VALUES ('$nama', '$produk', '$ukuran', '$hp', '$pembayaran', '$alamat', '$rating')";
$query = mysqli_query($conn, $sql);
$last_id = mysqli_insert_id($conn);
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Konfirmasi Pembayaran</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; font-family: Arial, sans-serif; }
        body { background: linear-gradient(135deg, #000, #444); min-height: 100vh; display: flex; justify-content: center; align-items: center; padding: 20px; }
        .box { background: white; padding: 35px; border-radius: 20px; text-align: center; width: 100%; max-width: 420px; box-shadow: 0 10px 30px rgba(0,0,0,0.3); max-height: 95vh; overflow-y: auto; }
        .box h1 { margin-bottom: 15px; font-size: 24px; }
        .box p { margin-bottom: 15px; color: #555; font-size: 14px; }
        .qris { width: 200px; margin-bottom: 15px; border-radius: 15px; }
        .detail-box { background: #f9f9f9; padding: 15px; border-radius: 10px; text-align: left; margin-bottom: 25px; font-size: 14px; }
        .detail-box div { margin-bottom: 5px; }
        .btn-home { display: block; text-decoration: none; text-align: center; margin-top: 25px; padding: 12px; background: #000; color: #fff; border-radius: 8px; font-size: 14px; font-weight: bold; transition: 0.3s; }
        .btn-home:hover { background: #333; }
    </style>
</head>
<body>
    <div class="box">
        <h1>Info Pemesanan</h1>
        <p>Terima kasih telah melakukan pemesanan!</p>

        <div class="detail-box">
            <div><strong>Produk:</strong> <?php echo htmlspecialchars($produk); ?></div>
            <?php if($ukuran != '-') { echo "<div><strong>Ukuran:</strong> " . htmlspecialchars($ukuran) . "</div>"; } ?>
            <div><strong>Total Harga:</strong> <?php echo $harga; ?></div>
            <div><strong>Metode:</strong> <?php echo htmlspecialchars($pembayaran); ?></div>
        </div>

        <?php if($pembayaran == "QRIS") { ?>
            <p>Silahkan scan QRIS di bawah ini untuk membayar:</p>
            <img src="img/qris.jpeg" class="qris">
        <?php } elseif($pembayaran == "Transfer Bank") { ?>
            <div style="background: #eef7ff; padding: 15px; border-radius: 10px; margin-bottom: 15px; font-size: 13px; text-align: left; line-height: 1.5; border: 1px solid #bce0ff;">
                <strong>Transfer ke Rekening Resmi:</strong><br>
                Bank: SeaBank<br>
                No. Rekening: <strong style="font-size: 15px; color: #0056b3;">901661474258</strong><br>
                Nama: Nauli Wear
            </div>
        <?php } else { ?>
            <div style="background: #fff3cd; padding: 15px; border-radius: 10px; margin-bottom: 15px; font-size: 13px; color: #856404; text-align: left; border: 1px solid #ffeeba;">
                📦 <strong>Metode COD Terpilih:</strong> Siapkan tunai saat kurir tiba.
            </div>
        <?php } ?>

        <a href="index.php" class="btn-home">Selesai & Kembali ke Home</a>
    </div>
</body>
</html>
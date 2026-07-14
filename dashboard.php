<?php
require_once __DIR__ . '/config.php';
$data = mysqli_query($conn, "SELECT * FROM orders");
$total = mysqli_num_rows($data);
?>

<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Dashboard Admin</title>
<style>
    * { margin:0; padding:0; box-sizing:border-box; font-family:Arial; }
    body { background:#f5f5f5; }
    nav { background:black; color:white; padding:20px; display:flex; justify-content:space-between; align-items:center; }
    nav h1 { font-size:28px; }
    .container { padding:40px; }
    .stats { display:flex; gap:20px; margin-bottom:30px; flex-wrap:wrap; }
    .card { background:white; padding:25px; border-radius:15px; box-shadow:0 5px 15px rgba(0,0,0,0.2); flex:1; min-width:250px; }
    .card h2 { font-size:20px; margin-bottom:10px; color:#555; }
    .card p { font-size:35px; font-weight:bold; color:black; }
    .table-box { background:white; border-radius:15px; overflow-x:auto; box-shadow:0 5px 15px rgba(0,0,0,0.2); }
    table { width:100%; border-collapse:collapse; min-width: 900px; }
    th { background:black; color:white; padding:15px; }
    td { padding:15px; text-align:center; border-bottom:1px solid #ddd; }
    tr:hover { background:#f1f1f1; }
    .btn { display:inline-block; margin-top:20px; padding:12px 20px; background:black; color:white; text-decoration:none; border-radius:10px; }
    .btn:hover { background:#333; }
</style>
</head>
<body>

<nav>
    <h1>Dashboard Admin</h1>
</nav>

<div class="container">
    <div class="stats">
        <div class="card">
            <h2>Total Pesanan</h2>
            <p><?php echo $total; ?></p>
        </div>
    </div>

    <div class="table-box">
        <table>
            <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>Produk</th>
                <th>Ukuran</th>
                <th>Warna</th> 
                <th>No HP</th>
                <th>Pembayaran</th> 
                <th>Alamat</th>
                <th>Rating</th> 
            </tr>

            <?php while($row = mysqli_fetch_assoc($data)) { ?>
            <tr>
                <td><?php echo $row['id']; ?></td>
                <td><?php echo $row['nama']; ?></td> <td><?php echo $row['produk']; ?></td>
                <td><?php echo $row['ukuran']; ?></td>
                <td><?php echo $row['warna']; ?></td>
                <td><?php echo $row['hp']; ?></td>
                <td><?php echo $row['pembayaran']; ?></td>
                <td><?php echo $row['alamat']; ?></td>
                <td>
                    <?php 
                    $bintang = $row['rating'];
                    for($i=1; $i<=5; $i++){
                        if($i <= $bintang){ echo "⭐"; } else { echo "☆"; }
                    }
                    ?>
                </td>
            </tr>
            <?php } ?>
        </table>
    </div>

    <a href="index.php" class="btn">← Kembali ke Home</a>
</div>

</body>
</html>
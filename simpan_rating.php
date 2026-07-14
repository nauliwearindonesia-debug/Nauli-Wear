<?php
require_once __DIR__ . '/config.php';

if (isset($_POST['id_pesanan']) && !empty($_POST['id_pesanan']) && isset($_POST['rating'])) {
    $id_pesanan = mysqli_real_escape_string($conn, $_POST['id_pesanan']);
    $rating = mysqli_real_escape_string($conn, $_POST['rating']);

    $sql = "UPDATE orders SET rating = '$rating' WHERE id = '$id_pesanan'";
    $query = mysqli_query($conn, $sql);
}

// PERBAIKAN TOTAL: Menyuruh browser mundur 2 langkah ke halaman form order utama Anda
echo "<script>
        alert('Terima kasih! Ulasan dan rating Anda telah berhasil kami simpan.');
        window.history.go(-2);
      </script>";
exit();
?>